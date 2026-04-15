import Echo from "laravel-echo";

window.Pusher = require("pusher-js");

window.Echo = new Echo({
    broadcaster: "pusher",
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true,
    encrypted: true,
});

// Listen for new comments/replies on each post
window.listenForComments = function (postId) {
    window.Echo.private("post." + postId).listen(".CommentCreated", (e) => {
        // If parent_id is null, it's a main comment
        if (!e.parent_id) {
            const commentList = document.getElementById(
                "comment-list-" + postId
            );
            if (commentList) {
                commentList.insertAdjacentHTML("beforeend", e.comment_html);
            }
        } else {
            // It's a reply or subreply
            const parent = document.querySelector(
                '[data-comment-id="' + e.parent_id + '"]'
            );
            if (parent) {
                let repliesContainer = parent
                    .closest(".comment-list-action")
                    .querySelector(".list-unstyled.ms-4");
                if (!repliesContainer) {
                    repliesContainer = document.createElement("ul");
                    repliesContainer.className = "list-unstyled ms-4";
                    parent
                        .closest(".comment-list-action")
                        .appendChild(repliesContainer);
                }
                repliesContainer.insertAdjacentHTML(
                    "beforeend",
                    e.comment_html
                );
            }
        }
    });
};
