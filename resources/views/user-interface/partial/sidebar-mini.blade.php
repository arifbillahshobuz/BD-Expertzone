<div class="right-sidebar-mini">
    <div class="right-sidebar-panel p-0">
        <div class="card shadow-none m-0 h-100">
            <div class="card-body px-0 pt-0 d-flex flex-column h-100">

                {{-- Global Search Header (Always Persistent) --}}
                <div class="p-4 border-bottom bg-white sticky-top">
                    <h6 class="fw-bold m-0 text-uppercase tracking-wider"
                        style="font-size: 13px; color: var(--bs-primary)">Messenger</h6>
                    <div class="mt-3 iq-search-bar device-search ">
                        <form action="#" class="searchbox position-relative" onsubmit="return false;">
                            <a class="search-link" href="javascript:void(0);">
                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="7.82491" cy="7.82495" r="6.74142" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12.5137 12.8638L15.1567 15.5" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                            <input type="text"
                                class="text chat-search-input form-control bg-light-subtle rounded-pill border-0"
                                placeholder="Search friends...">
                        </form>
                    </div>
                </div>

                <div class="flex-grow-1 overflow-hidden d-flex flex-column" id="sidebar-view-container">
                    {{-- 1. Conversation List View --}}
                    <div id="sidebar-list-view" class="h-100 d-flex flex-column overflow-auto">
                        <div class="media-height flex-grow-1" data-scrollbar="init">
                            <div id="nav-search-results" style="display: none;"></div>
                            <div id="nav-friends">
                                <div class="wsus__mini_divider text-center my-2">
                                    <span>All Messages</span>
                                </div>

                                @auth
                                    @if (isset($sidebarFriends) && count($sidebarFriends))
                                        @foreach ($sidebarFriends as $friend)
                                            <div class="d-flex align-items-center justify-content-between chat-tabs-content sidebar-chat-item border-bottom"
                                                data-id="{{ $friend->id }}" style="cursor: pointer;"
                                                title="Chat with {{ $friend->name }}">
                                                <div class="d-flex align-items-center gap-3">
                                                    <div
                                                        class="iq-profile-avatar {{ $friend->isOnline() ? 'status-online' : 'status-offline' }}">
                                                        <img class="rounded-circle avatar-50 border" src="{{ $friend->avatar_url }}"
                                                            alt="user-img" loading="lazy">
                                                    </div>
                                                    <div class="overflow-hidden">
                                                        <h6 class="font-size-14 mb-0 fw-semibold text-truncate"
                                                            style="max-width: 150px;">{{ $friend->name }}</h6>
                                                        <p class="mb-0 font-size-12 fw-medium text-muted text-truncate"
                                                            style="max-width: 150px;">
                                                            {{ $friend->last_message ?? 'Say hi 👋' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column align-items-end">
                                                    <span
                                                        class="font-size-10 fw-medium text-muted">{{ $friend->last_message_time ?? '' }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="p-5 text-center">
                                            <div class="bg-light rounded-circle d-inline-flex p-3 mb-3">
                                                <span class="material-symbols-outlined text-muted"
                                                    style="font-size: 32px">chat_bubble</span>
                                            </div>
                                            <h6 class="font-size-14 text-muted">No Conversations</h6>
                                            <p class="small text-muted px-3">Start a chat by searching for friends above.</p>
                                        </div>
                                    @endif
                                @else
                                    <div class="p-5 text-center">
                                        <div class="bg-primary-subtle rounded-circle d-inline-flex p-3 mb-3">
                                            <span class="material-symbols-outlined text-primary"
                                                style="font-size: 32px">lock</span>
                                        </div>
                                        <h6 class="font-size-14 fw-bold">Join the Conversation</h6>
                                        <p class="small text-muted px-3 mb-4">You must be logged in to view history and chat
                                            with friends.</p>
                                        <a href="{{ route('login') }}"
                                            class="btn btn-primary btn-sm px-4 rounded-pill shadow-sm">Login Now</a>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div> {{-- End of sidebar-list-view --}}

                    {{-- 2. Active Chat View (Initially Hidden) --}}
                    <div id="sidebar-chat-view" class="h-100 d-flex flex-column overflow-hidden"
                        style="display: none !important;">
                        {{-- Header --}}
                        <div class="p-3 border-bottom d-flex align-items-center gap-2 bg-primary text-white shadow-sm">
                            <button class="btn btn-link text-white p-0 border-0 d-flex align-items-center"
                                id="close-sidebar-chat">
                                <span class="material-symbols-outlined">arrow_back</span>
                            </button>
                            <div class="iq-profile-avatar status-online" id="sidebar-chat-avatar-container">
                                <img class="rounded-circle avatar-35 border border-white" id="sidebar-chat-avatar"
                                    src="" alt="user">
                            </div>
                            <div class="overflow-hidden flex-grow-1">
                                <h6 class="font-size-14 mb-0 fw-bold text-white text-truncate" id="sidebar-chat-name">
                                    User Name</h6>
                                <p class="mb-0 font-size-11 text-white-50" id="sidebar-chat-status">Online</p>
                            </div>
                        </div>

                        {{-- Messages Area --}}
                        <div class="flex-grow-1 p-3 bg-light-subtle" id="sidebar-chat-messages"
                            style="overflow-y: auto; display: flex; flex-direction: column; gap: 10px;">
                            {{-- Messages will be loaded here --}}
                        </div>

                        {{-- Footer/Input --}}
                        <div class="p-2 border-top bg-white">
                            <form id="sidebar-chat-form" onsubmit="return false;"
                                class="d-flex gap-2 align-items-center">
                                <input type="text" id="sidebar-chat-input"
                                    class="form-control form-control-sm rounded-pill border-0 bg-light"
                                    placeholder="Type a message..." autocomplete="off">
                                <button type="submit"
                                    class="btn btn-primary btn-sm rounded-circle p-2 d-flex align-items-center justify-content-center">
                                    <span class="material-symbols-outlined" style="font-size: 18px">send</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Global Footer Button (Persistent) --}}
                <div class="p-3 bg-light border-top mt-auto">
                    <a href="{{ route('messenger.index') }}"
                        class="btn btn-primary w-100 py-2 d-flex align-items-center justify-content-center gap-2 rounded-3 shadow-sm">
                        <span class="material-symbols-outlined" style="font-size: 18px">open_in_new</span>
                        <span class="fw-semibold">Direct Messenger</span>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    .wsus__mini_divider {
        position: relative;
        z-index: 1;
    }

    .wsus__mini_divider:before {
        content: "";
        position: absolute;
        width: 100%;
        height: 1px;
        background: #eee;
        left: 0;
        top: 50%;
        z-index: -1;
    }

    .wsus__mini_divider span {
        background: #fff;
        padding: 0 10px;
        color: #999;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    [data-bs-theme="dark"] .wsus__mini_divider span {
        background: #1e1e2e;
        color: #555;
    }

    .chat-tabs-content:hover {
        background-color: rgba(80, 181, 255, 0.05);
    }

    .tracking-wider {
        letter-spacing: 0.05em;
    }

    .avatar-35 {
        width: 35px;
        height: 35px;
        object-fit: cover;
    }

    /* Chat Bubble Styles for Sidebar */
    .sidebar-msg {
        max-width: 85%;
        padding: 8px 12px;
        border-radius: 15px;
        font-size: 13px;
        line-height: 1.4;
        position: relative;
    }

    .sidebar-msg.me {
        align-self: flex-end;
        background: var(--bs-primary);
        color: #fff;
        border-bottom-right-radius: 2px;
    }

    .sidebar-msg.them {
        align-self: flex-start;
        background: #fff;
        border: 1px solid #eee;
        border-bottom-left-radius: 2px;
    }

    .sidebar-msg .time {
        font-size: 9px;
        opacity: 0.7;
        display: block;
        margin-top: 2px;
        text-align: right;
    }

    [data-bs-theme="dark"] .sidebar-msg.them {
        background: #2d2d3f;
        border-color: #444;
        color: #eee;
    }

    /* Mobile Responsiveness for Sidebar */
    @media (max-width: 1199px) {
        .right-sidebar-mini {
            position: fixed;
            right: -320px;
            top: 0; 
            z-index: 1050;
            width: 300px;
            height: 100vh;
            transition: right 0.3s ease-in-out;
            box-shadow: -5px 0 15px rgba(0,0,0,0.1);
            background: #fff;
            padding-top: 75px; 
        }
        .right-sidebar-mini.active {
            right: 0;
        }
        
        .mobile-chat-toggle {
            display: flex !important;
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            background: var(--bs-primary);
            color: white;
            border-radius: 50%;
            z-index: 1060;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            border: none;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .mobile-chat-toggle:active { transform: scale(0.9); }
        .mobile-chat-toggle span { color: white; }
    }
    
    @media (min-width: 1200px) {
        .mobile-chat-toggle { display: none !important; }
    }
    
    @media (max-width: 576px) {
        .right-sidebar-mini { width: 100%; height: 100vh; top: 0; right: -100%; }
    }
</style>

{{-- Floating Toggle for Mobile --}}
<button class="mobile-chat-toggle" id="toggle-sidebar-messenger" title="Open Messenger">
    <span class="material-symbols-outlined">chat</span>
</button>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        let currentChatUserId = null;

        // Toggle Sidebar on Mobile or from Header
        $('#toggle-sidebar-messenger, #open-sidebar-messenger-header').on('click', function(e) {
            e.preventDefault();
            $('.right-sidebar-mini').toggleClass('active');
            const isActive = $('.right-sidebar-mini').hasClass('active');
            $('#toggle-sidebar-messenger').find('span').text(isActive ? 'close' : 'chat');
        });

        // Close Sidebar when clicking outside on mobile
        $(document).on('click', function(e) {
            if ($(window).width() < 1200) {
                if (!$(e.target).closest('.right-sidebar-mini').length && !$(e.target).closest('#toggle-sidebar-messenger').length && !$(e.target).closest('#open-sidebar-messenger-header').length) {
                    $('.right-sidebar-mini').removeClass('active');
                    $('#toggle-sidebar-messenger').find('span').text('chat');
                }
            }
        });

        // 1. Unified function to open chat in sidebar
        window.openChatPopup = function (userId) {
            if (!userId) return;
            currentChatUserId = userId;
            window.activePopupUserId = userId;

            // Show Chat View, Hide List View
            $('#sidebar-list-view').attr('style', 'display: none !important');
            $('#sidebar-chat-view').attr('style', 'display: flex !important');

            // Load user info and messages
            $('#sidebar-chat-messages').html('<div class="text-center p-5"><div class="spinner-border text-primary"></div></div>');

            $.get('/messenger/popup', { user_id: userId }, function (html) {
                // We parse the HTML returned from the popup route to extract messages and user info
                const $temp = $('<div>').html(html);
                const userName = $temp.find('.name').text();
                const userAvatar = $temp.find('.chat-popup-header img').attr('src');
                const isOnline = $temp.find('.status').text().includes('Online');

                $('#sidebar-chat-name').text(userName);
                $('#sidebar-chat-avatar').attr('src', userAvatar);
                $('#sidebar-chat-status').text(isOnline ? 'Online' : 'Offline');
                $('#sidebar-chat-avatar-container').attr('class', 'iq-profile-avatar ' + (isOnline ? 'status-online' : 'status-offline'));

                // Transform messages into sidebar format
                let msgHtml = '';
                $temp.find('.chat-bubble').each(function () {
                    const isMe = $(this).hasClass('me');
                    const text = $(this).contents().get(0).nodeValue ? $(this).contents().get(0).nodeValue.trim() : "";
                    const time = $(this).find('.msg-time').text();
                    if (text) {
                        msgHtml += `<div class="sidebar-msg ${isMe ? 'me' : 'them'}">${text} <span class="time">${time}</span></div>`;
                    }
                });

                if (!msgHtml) {
                    msgHtml = '<div class="text-center p-4 text-muted small" id="no-chat-msg">Say "Hi" and start chatting!</div>';
                }

                $('#sidebar-chat-messages').html(msgHtml);
                const msgBody = document.getElementById('sidebar-chat-messages');
                msgBody.scrollTop = msgBody.scrollHeight;

                // Focus input
                $('#sidebar-chat-input').focus();
            });
        };

        // 2. Back Button Click
        $('#close-sidebar-chat').on('click', function () {
            currentChatUserId = null;
            window.activePopupUserId = null;
            $('#sidebar-chat-view').attr('style', 'display: none !important');
            $('#sidebar-list-view').attr('style', 'display: flex !important');
            // Clear search
            $('.chat-search-input').val('').trigger('input');
        });

        // 3. Send Message in Sidebar
        $('#sidebar-chat-form').on('submit', function () {
            const message = $('#sidebar-chat-input').val().trim();
            if (!message || !currentChatUserId) return;

            $('#sidebar-chat-input').val('');
            $('#no-chat-msg').remove();

            // Optimistic append to Chat Window
            const time = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
            $('#sidebar-chat-messages').append(`<div class="sidebar-msg me">${message} <span class="time">${time}</span></div>`);
            const msgBody = document.getElementById('sidebar-chat-messages');
            msgBody.scrollTop = msgBody.scrollHeight;

            // DYNAMICALLY UPDATE SIDEBAR HISTORY LIST
            if (typeof window.updateSidebarContactList === 'function') {
                window.updateSidebarContactList(currentChatUserId, message, 'Just now');
            }

            $.post('/messenger/quick-send', {
                _token: '{{ csrf_token() }}',
                to_id: currentChatUserId,
                message: message
            });
        });

        // Helper to update or prepend contact in the sidebar list
        window.updateSidebarContactList = function (userId, message, time, name = null, avatar = null, onlineClass = null) {
            const $existingItem = $(`.sidebar-chat-item[data-id="${userId}"]`);
            const userName = name || $('#sidebar-chat-name').text();
            const userAvatar = avatar || $('#sidebar-chat-avatar').attr('src');
            const isOnlineClass = onlineClass || ($('#sidebar-chat-avatar-container').hasClass('status-online') ? 'status-online' : 'status-offline');

            // 1. Remove "No Conversations" placeholder
            $('#nav-friends').find('.p-5.text-center').remove();

            if ($existingItem.length) {
                // Move to top and update message
                $existingItem.find('p').text(message);
                $existingItem.find('.font-size-10').text(time);

                // Prepend after the divider
                const $divider = $('#nav-friends').find('.wsus__mini_divider');
                if ($divider.length) { $divider.after($existingItem); }
                else { $existingItem.prependTo('#nav-friends'); }

            } else {
                // Add new item to top
                const newItem = `
                    <div class="d-flex align-items-center justify-content-between chat-tabs-content sidebar-chat-item border-bottom"
                        data-id="${userId}" style="cursor: pointer;" title="Chat with ${userName}">
                        <div class="d-flex align-items-center gap-3">
                            <div class="iq-profile-avatar ${isOnlineClass}">
                                <img class="rounded-circle avatar-50 border" src="${userAvatar}" alt="user-img" loading="lazy">
                            </div>
                            <div class="overflow-hidden">
                                <h6 class="font-size-14 mb-0 fw-semibold text-truncate" style="max-width: 150px;">${userName}</h6>
                                <p class="mb-0 font-size-12 fw-medium text-muted text-truncate" style="max-width: 150px;">${message}</p>
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-end">
                            <span class="font-size-10 fw-medium text-muted">${time}</span>
                        </div>
                    </div>`;

                // Prepend after the divider
                const $divider = $('#nav-friends').find('.wsus__mini_divider');
                if ($divider.length) {
                    $divider.after(newItem);
                } else {
                    $('#nav-friends').prepend(newItem);
                }
            }
        };

        // 4. Search Logic
        let searchTimeout;
        $('.chat-search-input').on('input', function () {
            @guest
                Swal.fire({
                    title: 'Login Required',
                    text: 'Please login to search friends and start chatting!',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Login Now',
                    confirmButtonColor: 'var(--bs-primary)',
                    cancelButtonText: 'Maybe later'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '{{ route("login") }}';
                    }
                });
                $(this).val(''); // Clear the input
                return;
            @endguest

            const query = $(this).val().trim();
            clearTimeout(searchTimeout);

            // If user starts typing, always ensure we are in the list view (hide chat)
            if (query.length > 0) {
                $('#sidebar-chat-view').attr('style', 'display: none !important');
                $('#sidebar-list-view').attr('style', 'display: flex !important');
            }

            if (query.length < 2) {
                $('#nav-search-results').hide();
                $('#nav-friends').show();
                return;
            }

            $('#nav-search-results').html('<div class="p-4 text-center"><div class="spinner-border spinner-border-sm text-primary"></div></div>').show();
            $('#nav-friends').hide();

            searchTimeout = setTimeout(() => {
                $.getJSON('/messenger/user-search', { query: query }, function (data) {
                    if (data.length === 0) {
                        $('#nav-search-results').html('<div class="p-4 text-center text-muted small">No users found.</div>');
                        return;
                    }

                    let html = '<div class="px-3 py-2 bg-light-subtle border-bottom border-top"><small class="fw-bold text-uppercase text-primary" style="font-size: 10px;">Results</small></div>';
                    data.forEach(user => {
                        html += `
                            <div class="d-flex align-items-center justify-content-between chat-tabs-content sidebar-chat-item border-bottom zoom-in"
                                data-id="${user.id}"
                                style="cursor: pointer; padding: 12px 15px;" title="Message ${user.name}">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="iq-profile-avatar ${user.is_online ? 'status-online' : 'status-offline'}">
                                        <img class="rounded-circle avatar-50 border" src="${user.avatar_url}" alt="user-img" loading="lazy">
                                    </div>
                                    <div class="overflow-hidden">
                                        <h6 class="font-size-14 mb-0 fw-semibold text-truncate" style="max-width: 140px;">${user.name}</h6>
                                        <p class="mb-0 font-size-12 fw-medium text-success">Click to message</p>
                                    </div>
                                </div>
                            </div>`;
                    });
                    $('#nav-search-results').html(html);
                });
            }, 300);
        });

        // 5. Global Event Delegation
        $(document).on('click', '.sidebar-chat-item', function (e) {
            e.preventDefault();
            const userId = $(this).attr('data-id');
            window.openChatPopup(userId);
        });

        // 6. Real-time message listener (Sync with layout.blade.php)
        // We can add a custom event handler here if layout.blade.php triggers it
    });
</script>