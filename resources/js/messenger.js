/**
 * -----------------------------------
 * Global Variables
 * -----------------------------------
 */

var temporaryMsgId = 0;
var activeUsersIds = [];

const messageForm = $(".message-form"),
    messageInput = $(".message-input"),
    messageBoxContainer = $(".wsus__chat_area_body"),
    csrf_token = $("meta[name=csrf_token]").attr("content"),
    auth_id = $("meta[name=auth_id]").attr("content"),
    url = $("meta[name=url]").attr("content"),
    messengerContactBox = $(".messenger-contacts");

const getMessengerId = () => $("meta[name=id]").attr("content");
const setMessengerId = (id) => $("meta[name=id]").attr("content", id);

/**
 * -----------------------------------
 * Reusable Functions
 * -----------------------------------
 */

function enableChatBoxLoader() {
    $(".wsus__message_paceholder").removeClass("d-none");
}

function disableChatBoxLoader() {
    $(".wsus__chat_app").removeClass("show_info");
    $(".wsus__message_paceholder").addClass("d-none");
    $(".wsus__message_paceholder_black").addClass("d-none");
}

function imagePreview(input, selector) {
    if (input.files && input.files[0]) {
        var render = new FileReader();

        render.onload = function (e) {
            $(selector).attr("src", e.target.result);
        };

        render.readAsDataURL(input.files[0]);
    }
}

let searchPage = 1;
let noMoreDataSearch = false;
let searchTempVal = "";
let setSearchLoading = false;

function searchUsers(query) {
    if (query != searchTempVal) {
        searchPage = 1;
        noMoreDataSearch = false;
    }
    searchTempVal = query;

    if (!setSearchLoading && !noMoreDataSearch) {
        $.ajax({
            method: "GET",
            url: "/messenger/search",
            data: { query: query, page: searchPage },
            beforeSend: function () {
                setSearchLoading = true;
                let loader = `
                <div class="text-center search-loader">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                `;
                $(".user_search_list_result").append(loader);
            },
            success: function (data) {
                setSearchLoading = false;
                $(".user_search_list_result").find(".search-loader").remove();

                if (searchPage < 2) {
                    $(".user_search_list_result").html(data.records);
                } else {
                    $(".user_search_list_result").append(data.records);
                }

                noMoreDataSearch = searchPage >= data?.last_page;
                if (!noMoreDataSearch) searchPage += 1;
            },
            error: function (xhr, status, error) {
                setSearchLoading = false;
                $(".user_search_list_result").find(".search-loader").remove();
            },
        });
    }
}

function actionOnScroll(selector, callback, topScroll = false) {
    $(selector).on("scroll", function () {
        let element = $(this).get(0);
        const condition = topScroll
            ? element.scrollTop == 0
            : element.scrollTop + element.clientHeight >= element.scrollHeight;

        if (condition) {
            callback();
        }
    });
}

function debounce(callback, delay) {
    let timerId;
    return function (...args) {
        clearTimeout(timerId);
        timerId = setTimeout(() => {
            callback.apply(this, args);
        }, delay);
    };
}

/**
 * ----------------------------------------------
 * Fetch id data of user and update the view
 * ----------------------------------------------
 */

function IDinfo(id) {
    $.ajax({
        method: "GET",
        url: "/messenger/id-info",
        data: { id: id },
        beforeSend: function () {
            NProgress.start();
            enableChatBoxLoader();
        },
        success: function (data) {
            // fetch messages
            fetchMessages(data.fetch.id, true);

            $(".wsus__chat_info_gallery").html("");

            // load gallery
            if (data?.shared_photos) {
                $(".nothing_share").addClass("d-none");
                $(".wsus__chat_info_gallery").html(data.shared_photos);
            } else {
                $(".nothing_share").removeClass("d-none");
            }

            initVenobox();

            data.favorite == 1
                ? $(".favourite").addClass("active")
                : $(".favourite").removeClass("active");

            $(".messenger-header").find("img").attr("src", data.fetch.avatar);
            $(".messenger-header").find("h4").text(data.fetch.name);

            $(".messenger-info-view .user_photo")
                .find("img")
                .attr("src", data.fetch.avatar);
            $(".messenger-info-view").find(".user_name").text(data.fetch.name);
            $(".messenger-info-view")
                .find(".user_unique_name")
                .text(data.fetch.user_name);
            NProgress.done();
        },
        error: function (xhr, status, error) {
            disableChatBoxLoader();
        },
    });
}

/**
 * ----------------------------------------------
 * Send Message
 * ----------------------------------------------
 */

function sendMessage() {
    temporaryMsgId += 1;
    let tempID = `temp_${temporaryMsgId}`;
    let hasAttachment = !!$(".attachment-input").val();
    const inputValue = messageInput.val();

    if (inputValue.length > 0 || hasAttachment) {
        const formData = new FormData($(".message-form")[0]);
        formData.append("id", getMessengerId());
        formData.append("temporaryMsgId", tempID);
        formData.append("_token", csrf_token);

        $.ajax({
            method: "POST",
            url: "/messenger/send-message",
            data: formData,
            dataType: "JSON",
            processData: false,
            contentType: false,
            beforeSend: function () {
                // add temp message on dom
                if (hasAttachment) {
                    messageBoxContainer.append(
                        sendTempMessageCard(inputValue, tempID, true)
                    );
                } else {
                    messageBoxContainer.append(
                        sendTempMessageCard(inputValue, tempID)
                    );
                }
                $(".no_messages").addClass("d-none");
                scrollToBottom(messageBoxContainer);
                messageFormReset();
            },
            success: function (data) {
                makeSeen(true);
                // update contact item
                updateContactItem(getMessengerId());

                const tempMsgCardElement = messageBoxContainer.find(
                    `.message-card[data-id=${data.tempID}]`
                );
                tempMsgCardElement.before(data.message);
                tempMsgCardElement.remove();
                initVenobox();
            },
            error: function (xhr, status, error) {},
        });
    }
}

function sendTempMessageCard(message, tempId, attachment = false) {
    if (attachment) {
        return `
        <div class="wsus__single_chat_area message-card" data-id="${tempId}">
            <div class="wsus__single_chat chat_right">
                <div class="pre_loader">
                    <div class="spinner-border text-light" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                ${
                    message.length > 0
                        ? `<p class="messages">${message}</p>`
                        : ""
                }

                <span class="clock"><i class="fas fa-clock"></i> now</span>
            </div>
        </div>
        `;
    } else {
        return `
        <div class="wsus__single_chat_area message-card" data-id="${tempId}">
            <div class="wsus__single_chat chat_right">
                <p class="messages">${message}</p>
                <span class="clock"><i class="fas fa-clock"></i> now</span>
            </div>
        </div>
        `;
    }
}

function receiveMessageCard(e) {
    if (e.attachment) {
        return `
        <div class="wsus__single_chat_area message-card" data-id="${e.id}">
            <div class="wsus__single_chat">
            <a class="venobox" data-gall="gallery${e.id}" href="${
            e.attachment
        }">
                <img src="${e.attachment}" alt="" class="img-fluid w-100">
            </a>
                ${
                    e.body != null && e.body.length > 0
                        ? `<p class="messages">${e.body}</p>`
                        : ""
                }
            </div>
        </div>
        `;
    } else {
        return `
        <div class="wsus__single_chat_area message-card" data-id="${e.id}">
            <div class="wsus__single_chat">
                <p class="messages">${e.body}</p>
            </div>
        </div>
        `;
    }
}

function messageFormReset() {
    $(".attachment-block").addClass("d-none");

    messageForm.trigger("reset");
    var emojiElt = $("#example1").emojioneArea();
    emojiElt.data("emojioneArea").setText("");
}

/**
 * ----------------------------------------------
 * Fetch messages from database
 * ----------------------------------------------
 */

let messagesPage = 1;
let noMoreMessages = false;
let messagesLoading = false;

function fetchMessages(id, newFetch = false) {
    if (newFetch) {
        messagesPage = 1;
        noMoreMessages = false;
    }

    if (!noMoreMessages && !messagesLoading) {
        $.ajax({
            method: "GET",
            url: "/messenger/fetch-messages",
            data: {
                _token: csrf_token,
                id: id,
                page: messagesPage,
            },
            beforeSend: function () {
                messagesLoading = true;
                let loader = `
                <div class="text-center messages-loader">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                `;
                messageBoxContainer.prepend(loader);
            },
            success: function (data) {
                messagesLoading = false;
                // remove the loader
                messageBoxContainer.find(".messages-loader").remove();
                // make messages seen
                makeSeen(true);

                if (messagesPage == 1) {
                    messageBoxContainer.html(data.messages);
                    scrollToBottom(messageBoxContainer);
                } else {
                    const lastMsg = $(messageBoxContainer)
                        .find(".message-card")
                        .first();
                    const curOffset =
                        lastMsg.offset().top - messageBoxContainer.scrollTop();

                    messageBoxContainer.prepend(data.messages);
                    messageBoxContainer.scrollTop(
                        lastMsg.offset().top - curOffset
                    );
                }

                // pagination lock and page increment
                noMoreMessages = messagesPage >= data?.last_page;
                if (!noMoreMessages) messagesPage += 1;

                initVenobox();

                disableChatBoxLoader();
            },
            error: function (xhr, status, error) {
                console.log(error);
            },
        });
    }
}

/**
 * ----------------------------------------------
 * Fetch Contact list from database
 * ----------------------------------------------
 */

let contactsPage = 1;
let noMoreContacts = false;
let contactLoading = false;

function getContacts() {
    if (!contactLoading && !noMoreContacts) {
        $.ajax({
            method: "GET",
            url: "messenger/fetch-contacts",
            data: { page: contactsPage },
            beforeSend: function () {
                contactLoading = true;
                let loader = `
                <div class="text-center contact-loader">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                `;
                messengerContactBox.append(loader);
            },
            success: function (data) {
                contactLoading = false;
                messengerContactBox.find(".contact-loader").remove();
                if (contactsPage < 2) {
                    messengerContactBox.html(data.contacts);
                } else {
                    messengerContactBox.append(data.contacts);
                }

                noMoreContacts = contactsPage >= data?.last_page;
                if (!noMoreContacts) contactsPage += 1;

                updateUserActiveList();
            },
            error: function (xhr, status, error) {
                contactLoading = false;
                messengerContactBox.find(".contact-loader").remove();
            },
        });
    }
}
/**
 * ----------------------------------------------
 * Update contact item
 * ----------------------------------------------
 */

function updateContactItem(user_id) {
    if (user_id != auth_id) {
        $.ajax({
            method: "GET",
            url: "/messenger/update-contact-item",
            data: { user_id: user_id },
            success: function (data) {
                messengerContactBox.find(".no_contact").remove();
                messengerContactBox
                    .find(`.messenger-list-item[data-id="${user_id}"]`)
                    .remove();
                messengerContactBox.prepend(data.contact_item);

                if (activeUsersIds.includes(+user_id)) {
                    userActive(user_id);
                }

                if (user_id == getMessengerId()) updateSelectedContent(user_id);
            },
            error: function (xhr, status, error) {},
        });
    }
}

/**
 * ----------------------------------------------
 * Make messages seen
 * ----------------------------------------------
 */
function makeSeen(status) {
    $(`.messenger-list-item[data-id="${getMessengerId()}"]`)
        .find(".unseen_count")
        .remove();
    $.ajax({
        method: "POST",
        url: "/messenger/make-seen",
        data: {
            _token: csrf_token,
            id: getMessengerId(),
        },
        success: function () {},
        error: function () {},
    });
}

/**
 * ----------------------------------------------
 * Favorite
 * ----------------------------------------------
 */
function star(user_id) {
    $(".favourite").toggleClass("active");

    $.ajax({
        method: "POST",
        url: "messenger/favorite",
        data: {
            _token: csrf_token,
            id: user_id,
        },
        success: function (data) {
            if (data.status == "added") {
                notyf.success("Added to favorite list.");
            } else {
                notyf.success("Removed from favorite list.");
            }
        },
        error: function (xhr, status, error) {},
    });
}

/**
 * ----------------------------------------------
 * Delete message
 * ----------------------------------------------
 */

function deleteMessage(message_id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: "DELETE",
                url: "/messenger/delete-message",
                data: { _token: csrf_token, message_id: message_id },
                beforeSend: function () {
                    $(`.message-card[data-id="${message_id}"]`).remove();
                },
                success: function (data) {
                    updateContactItem(getMessengerId());
                },
                error: function (xhr, status, error) {},
            });
        }
    });
}

function updateSelectedContent(user_id) {
    $(".messenger-list-item").removeClass("active");
    $(`.messenger-list-item[data-id="${user_id}"]`).addClass("active");
}

/**
 * ----------------------------------------------
 * Slide to bottom on action
 * ----------------------------------------------
 */
function scrollToBottom(container) {
    $(container)
        .stop()
        .animate({
            scrollTop: $(container)[0].scrollHeight,
        });
}

/**
 * ----------------------------------------------
 * initialize venobox.js
 * ----------------------------------------------
 */
function initVenobox() {
    $(".venobox").venobox();
}

/**
 * ----------------------------------------------
 * Play message sound
 * ----------------------------------------------
 */
function playNotificationSound() {
    const sound = new Audio(`/default/message-sound.mp3`);
    sound.play();
}

// Listen to message cannel
window.Echo.private("message." + auth_id).listen("Message", (e) => {
    console.log(e);
    if (getMessengerId() != e.from_id) {
        updateContactItem(e.from_id);
        playNotificationSound();
    }

    let message = receiveMessageCard(e);
    if (getMessengerId() == e.from_id) {
        messageBoxContainer.append(message);
        scrollToBottom(messageBoxContainer);
    }
});

// Listen to online channel
window.Echo.join("online")
    .here((users) => {
        // set active users
        setActiveUserIds(users);
        $.each(users, function (index, user) {
            userActive(user.id);
        });
    })
    .joining((user) => {
        // add user to array
        addNewUserId(user.id);
        userActive(user.id);
    })
    .leaving((user) => {
        // remove user from array
        removeUserId(user.id);
        userInactive(user.id);
    });

function updateUserActiveList() {
    $(".messenger-list-item").each(function (index, value) {
        let id = $(this).data("id");
        if (activeUsersIds.includes(id)) userActive(id);
    });
}

function userActive(id) {
    let contactItem = $(`.messenger-list-item[data-id="${id}"]`)
        .find(".img")
        .find("span");
    contactItem.removeClass("inactive");
    contactItem.addClass("active");
}

function userInactive(id) {
    let contactItem = $(`.messenger-list-item[data-id="${id}"]`)
        .find(".img")
        .find("span");
    contactItem.removeClass("active");
    contactItem.addClass("inactive");
}

// set active users id to array

function setActiveUserIds(users) {
    $.each(users, function (index, user) {
        activeUsersIds.push(user.id);
    });
}

// add new user to array
function addNewUserId(id) {
    activeUsersIds.push(id);
}

// remove user from array
function removeUserId(id) {
    let index = activeUsersIds.indexOf(id);

    if (index !== -1) {
        activeUsersIds.splice(index, 1);
    }
}

/**
 * -----------------------------------
 * On Dom Load
 * -----------------------------------
 */

$(document).ready(function () {
    getContacts();

    if (window.innerWidth < 768) {
        $("body").on("click", ".messenger-list-item", function () {
            $(".wsus__user_list").addClass("d-none");
        });

        $("body").on("click", ".back_to_list", function () {
            $(".wsus__user_list").removeClass("d-none");
        });
    }

    $("#select_file").change(function () {
        imagePreview(this, ".profile-image-preview");
    });

    // Search action on keyup
    const debouncedSearch = debounce(function () {
        const value = $(".user_search").val();
        searchUsers(value);
    }, 500);

    $(".user_search").on("keyup", function () {
        let query = $(this).val();
        if (query.length > 0) {
            debouncedSearch();
        }
    });
    // search pagination
    actionOnScroll(".user_search_list_result", function () {
        let value = $(".user_search").val();
        searchUsers(value);
    });

    // click action for messenger list item
    $("body").on("click", ".messenger-list-item", function () {
        const dataId = $(this).attr("data-id");
        updateSelectedContent(dataId);
        setMessengerId(dataId);
        IDinfo(dataId);
        messageFormReset();
    });

    //Send message
    $(".message-form").on("submit", function (e) {
        e.preventDefault();
        sendMessage();
    });

    // send attachment
    $(".attachment-input").change(function () {
        imagePreview(this, ".attachment-preview");
        $(".attachment-block").removeClass("d-none");
    });

    $(".cancel-attachment").on("click", function () {
        messageFormReset();
    });

    // message pagination
    actionOnScroll(
        ".wsus__chat_area_body",
        function () {
            fetchMessages(getMessengerId());
        },
        true
    );

    // Contacts pagination
    actionOnScroll(".messenger-contacts", function () {
        getContacts();
    });

    // add/remove to favorite
    $(".favourite").on("click", function (e) {
        e.preventDefault();
        star(getMessengerId());
    });

    // delete message
    $("body").on("click", ".dlt-message", function (e) {
        e.preventDefault();
        let id = $(this).data("id");
        deleteMessage(id);
    });

    // custom hight adjustment
    function adjustHeight() {
        var windowHeight = $(window).height();
        $(".wsus__chat_area_body").css("height", windowHeight - 120 + "px");
        $(".messenger-contacts").css("max-height", windowHeight - 393 + "px");
        $(".wsus__chat_info_gallery").css(
            "max-height",
            windowHeight - 400 + "px"
        );
        $(".user_search_list_result").css({
            height: windowHeight - 130 + "px",
        });
    }

    // Call the function initially
    adjustHeight();

    // Call the function whenever the window is resized
    $(window).resize(function () {
        adjustHeight();
    });
});
