<!doctype html>
<html lang="en" class="theme-fs-md" data-bs-theme-color="default" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ getSetting('website_name', 'BD-Expertzone') }} | @yield('title')</title>

    @if(getSetting('favicon'))
        <link rel="shortcut icon" href="{{ asset(getSetting('favicon')) }}" />
    @endif

    <style>
        :root {
            --bs-primary:
                {{ getSetting('website_color', '#007bff') }}
                !important;
            --bs-primary-rgb:
                {{ hexToRgb(getSetting('website_color', '#007bff')) }}
                !important;
        }

        /* --- Global Responsiveness Patch --- */
        @media (max-width: 1199px) {
            .container { max-width: 100% !important; padding-left: 10px !important; padding-right: 10px !important; }
            .col-lg-8, .col-lg-12, .col-lg-4, .col-md-12 { width: 100% !important; flex: 0 0 100% !important; max-width: 100% !important; }
            #dynamicDivContainer { order: 1; }
            .col-lg-4 { order: 2; margin-top: 20px; }
            .card { margin-left: 0 !important; margin-right: 0 !important; margin-bottom: 20px !important; }
            .right-sidebar-mini { top: 0 !important; height: 100vh !important; }
        }

        @media (max-width: 767px) {
            .iq-top-navbar { position: sticky !important; top: 0; z-index: 1040; width: 100%; border-bottom: 2px solid var(--bs-primary) !important; }
            .content-inner { padding-top: 10px !important; }
            .post-media-item { height: 220px !important; } 
            .navbar-list li { padding: 0 4px !important; }
            .navbar-list li .material-symbols-outlined { font-size: 24px !important; }
            .profile-header img { height: 180px !important; }
            .profile-img img.avatar-130 { width: 90px !important; height: 90px !important; margin-top: -45px !important; border: 3px solid #fff; }
            .profile-detail h3 { font-size: 20px !important; }
            .social-user-meta-list { justify-content: space-around !important; gap: 10px !important; }
            .social-user-meta-list li { flex: 1; min-width: 80px; }
            .avatar-60 { width: 45px !important; height: 45px !important; }
            .create-post-data ul { gap: 15px !important; }
            #media-grid img, #media-grid video { min-height: 150px !important; }
            body { font-size: 14px; }
            h1, h2, h3, h4, h5, h6 { line-height: 1.3; }
        }

        @media (max-width: 480px) {
            .navbar-brand .logo-title { display: none !important; }
            .avatar-48 { width: 36px !important; height: 36px !important; }
            .avatar-50 { width: 40px !important; height: 40px !important; }
            .profile-info { padding: 20px 10px !important; }
            .mobile-chat-toggle { bottom: 80px !important; right: 15px !important; width: 50px !important; height: 50px !important; }
            .mobile-chat-toggle span { font-size: 24px !important; }
        }

        html, body { overflow-x: hidden !important; width: 100%; position: relative; scroll-behavior: smooth; }
        .row { margin-left: -10px !important; margin-right: -10px !important; width: calc(100% + 20px) !important; }
        .row > * { padding-left: 10px !important; padding-right: 10px !important; }
        .card-body { padding: 15px !important; }
        .card, .col-lg-8, .col-lg-4, .right-sidebar-mini, img, .avatar-130 { transition: all 0.3s ease-in-out; }
    </style>

    @include('sweetalert::alert')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <script>
        window.Laravel = {
            csrfToken: '{{ csrf_token() }}',
            userId: {{ auth()->check() ? auth()->id() : 'null' }},
            userAvatar: '{{ auth()->check() ? (auth()->user()->avatar ? asset(auth()->user()->avatar) : asset("frontend/assets/images/user/1.jpg")) : asset("frontend/assets/images/user/1.jpg") }}'
        };

        // Ensure all AJAX requests include the CSRF token
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
    @include('user-interface.partial.style')
    @yield('page-style')

    {!! ToastMagic::styles() !!}

    @vite(['resources/js/app.js'])

    <meta name="setting_options" content='{
    "saveLocal":"sessionStorage",
    "storeKey":"socialV",
    "setting":{
      "theme_scheme_direction":{"value":"ltr"},
      "theme_scheme":{"value":"light"},
      "theme_color":{
        "colors":{
          "--customprimary":"#50b5ff",
          "--custominfo":"#d592ff"
        },
        "value":"theme-color-default"
      },
      "sidebar_type":{"value":[]},
      "sidebar_menu_style":{"value":"navs-rounded-all"},
      "footer":{"value":"default"}
    }
  }'>
</head>

<body>

    <!-- Wrapper Start -->
    @include('user-interface.partial.wrapper')
    <!-- Wrapper End-->
    <main class="main-content">
        <div class="position-relative">
            <!-- header start-->
            @include('user-interface.partial.header')
            <!-- header end -->
            <div>
                <div class="position-relative">
                </div>
                <div class="content-inner" id="page_layout" style="padding-top: 0px;">
                    <div class="container">
                        @yield('content')
                    </div>
                    <!-- Like Modal start-->
                    @include('user-interface.partial.likemodal')
                    <!-- Like Modal end-->
                </div>
            </div>
            <!-- sidebar-mini start-->
            @include('user-interface.partial.sidebar-mini')
            <!-- sidebar end -->
            <!-- popup-modal start-->
            @include('user-interface.partial.popupmodal')
            <!-- popup-modal end-->
        </div>
    </main>
    <!-- footer start-->
    @include('user-interface.partial.footer')
    <!-- footer End-->

    <!-- Settings offcanvas -->
    @include('user-interface.partial.offcanvas')

    <!-- <a class="btn btn-fixed-end btn-danger btn-icon btn-setting" id="settingbutton" data-bs-toggle="offcanvas"
        data-bs-target="#live-customizer" role="button" aria-controls="live-customizer">
        <span class="icon material-symbols-outlined animated-rotate text-white">
            settings
        </span>
    </a> -->

    <!-- Share Modal -->
    @include('user-interface.partial.share-model')

    <!-- offcanvas bottom -->
    @include('user-interface.partial.offcanvas-bottom')

    <!-- Backend Bundle JavaScript -->
    @include('user-interface.partial.script')

    {!! ToastMagic::scripts() !!}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/fslightbox/index.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        $(document).ready(function () {
            let searchTimeout;
            const container = $('#dynamicDivContainer');
            const contentDiv = $('#content');
            let originalContentHtml = "";
            if (contentDiv.length) {
                originalContentHtml = contentDiv.html();
            }

            function renderSearchUI(query, activeTab = 'post') {
                const tabsHtml = `
                    <div class="card mb-4" id="search-tabs-container">
                        <div class="card-body p-0">
                            <ul class="nav nav-tabs nav-fill border-0 mb-0" id="searchFilters" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link ${activeTab === 'post' ? 'active' : ''} search-tab-link" data-tab="post" href="javascript:void(0);">Post</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ${activeTab === 'friend' ? 'active' : ''} search-tab-link" data-tab="friend" href="javascript:void(0);">Connect</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ${activeTab === 'comment' ? 'active' : ''} search-tab-link" data-tab="comment" href="javascript:void(0);">Comment</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="search-results-content">
                        <div class="text-center py-4">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                `;
                contentDiv.html(tabsHtml);
                fetchSearchResults(query, activeTab);
            }

            function fetchSearchResults(query, tab) {
                $('#search-results-content').html('<div class="text-center py-4"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>');
                $.ajax({
                    url: "{{ route('search.index') }}",
                    data: { q: query, tab: tab },
                    success: function (res) {
                        if (res.html.trim() === '') {
                            $('#search-results-content').html('<div class="card card-block card-stretch card-height mb-4"><div class="card-body text-center p-5"><h5 class="text-muted">No results found</h5></div></div>');
                        } else {
                            $('#search-results-content').html(res.html);
                        }
                    },
                    error: function () {
                        $('#search-results-content').html('<div class="card card-block card-stretch card-height mb-4"><div class="card-body text-center text-danger p-4">Error fetching results.</div></div>');
                    }
                });
            }

            $('.search-input').on('input', function () {
                let query = $(this).val().trim();
                clearTimeout(searchTimeout);
                if (query.length === 0) {
                    if (contentDiv.length && originalContentHtml) {
                        contentDiv.html(originalContentHtml);
                    }
                    return;
                }
                searchTimeout = setTimeout(() => {
                    if (container.length === 0 || contentDiv.length === 0) {
                        window.location.href = "/?q=" + encodeURIComponent(query);
                    } else {
                        let activeTab = $('#searchFilters .active').length ? $('#searchFilters .active').data('tab') : 'post';
                        if (!$('#search-tabs-container').length) {
                            renderSearchUI(query, 'post');
                        } else {
                            fetchSearchResults(query, activeTab);
                        }
                        saveRecentSearch(query);
                    }
                }, 400);
            });

            $(document).on('click', '.search-tab-link', function (e) {
                e.preventDefault();
                $('.search-tab-link').removeClass('active');
                $(this).addClass('active');
                let query = $('.search-input').filter(function () { return $(this).val() !== ""; }).first().val() || '';
                if (!query) {
                    query = new URLSearchParams(window.location.search).get('q') || '';
                }
                let tab = $(this).data('tab');
                fetchSearchResults(query, tab);
            });

            function saveRecentSearch(query) {
                if (!query) return;
                $.ajax({
                    url: "{{ route('search.recent.save') }}",
                    method: 'POST',
                    data: { q: query }
                });
            }

            $(document).on('click', '.delete-recent-btn', function () {
                let query = $(this).data('query');
                $.post("{{ route('search.recent.delete') }}", { q: query });
                $('.delete-recent-btn[data-query="' + query + '"]').closest('.recent-search-item').remove();
                if ($('.recent-search-item').length === 0) {
                    $('.search-modal-body').html('<div class="py-3 px-3 text-center text-muted no-recent-searches">No recent searches</div>');
                }
            });

            $(document).on('click', '.clear-recent-btn, .clear-recent-btn-mobile', function () {
                $.post("{{ route('search.recent.clear') }}", {});
                $('.recent-search-item').remove();
                $('.search-modal-body').html('<div class="py-3 px-3 text-center text-muted no-recent-searches">No recent searches</div>');
            });

            $(document).on('click', '.recent-search-link', function (e) {
                e.preventDefault();
                let query = $(this).text().trim();
                $('.search-input').val(query).trigger('input');
                $('.search-modal-custom').removeClass('show');
            });

            let urlParams = new URLSearchParams(window.location.search);
            let urlQuery = urlParams.get('q');
            if (urlQuery && container.length && contentDiv.length) {
                $('.search-input').val(urlQuery);
                renderSearchUI(urlQuery, 'post');
            }
        });
    </script>

    {{-- Friend System AJAX --}}
    @auth
        <script>
            $(document).ready(function () {
                const csrfToken = '{{ csrf_token() }}';

                // ── Toast helper ──────────────────────────────────────────────────────
                function showSidebarToast(message, type) {
                    const id = 'toast_' + Date.now();
                    const toast = $(`
                    <div id="${id}" class="toast align-items-center text-white bg-${type} border-0 position-fixed"
                         style="bottom:20px;right:20px;z-index:9999;min-width:240px;" role="alert">
                        <div class="d-flex">
                            <div class="toast-body">${message}</div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                        </div>
                    </div>`);
                    $('body').append(toast);
                    const bsToast = new bootstrap.Toast(document.getElementById(id), { delay: 3000 });
                    bsToast.show();
                    setTimeout(() => toast.remove(), 3500);
                }

                // ── Accept Friend Request (sidebar) ───────────────────────────────────
                $(document).on('click', '.accept-friend-request-btn', function () {
                    const btn = $(this);
                    const requestId = btn.data('request-id');
                    const $item = btn.closest('.friend-request-item');

                    btn.prop('disabled', true).html('...');

                    $.ajax({
                        url: `/friend-request/accept/${requestId}`,
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': csrfToken },
                        success: function () {
                            $item.slideUp(300, function () {
                                $(this).remove();
                                // Hide the whole card if no more requests
                                const remaining = $('#friend-requests-list').children(':visible').length;
                                if (remaining === 0) $('#friend-requests-card').slideUp(300);
                                $('#request-count-badge').text(remaining);
                            });
                            showSidebarToast('Friend request accepted! 🎉', 'success');
                        },
                        error: function (xhr) {
                            btn.prop('disabled', false).html('<span class="material-symbols-outlined" style="font-size:14px;vertical-align:-3px">check</span> Accept');
                            showSidebarToast(xhr.responseJSON?.error || 'Something went wrong.', 'danger');
                        }
                    });
                });

                // ── Decline Friend Request (sidebar) ──────────────────────────────────
                $(document).on('click', '.decline-friend-request-btn', function () {
                    const btn = $(this);
                    const requestId = btn.data('request-id');
                    const $item = btn.closest('.friend-request-item');

                    btn.prop('disabled', true).html('...');

                    $.ajax({
                        url: `/friend-request/decline/${requestId}`,
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': csrfToken },
                        success: function () {
                            $item.slideUp(300, function () {
                                $(this).remove();
                                const remaining = $('#friend-requests-list').children(':visible').length;
                                if (remaining === 0) $('#friend-requests-card').slideUp(300);
                                $('#request-count-badge').text(remaining);
                            });
                            showSidebarToast('Request declined.', 'secondary');
                        },
                        error: function (xhr) {
                            btn.prop('disabled', false).html('<span class="material-symbols-outlined" style="font-size:14px;vertical-align:-3px">close</span> Decline');
                            showSidebarToast(xhr.responseJSON?.error || 'Something went wrong.', 'danger');
                        }
                    });
                });

                // ── Profile page: Send Friend Request ────────────────────────────────
                window.sendFriendRequest = function (userId) {
                    $.ajax({
                        url: `/friend-request/send/${userId}`,
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': csrfToken },
                        success: function () {
                            showSidebarToast('Friend request sent!', 'success');
                            $(`button[onclick*="sendFriendRequest('${userId}')"]`)
                                .prop('disabled', true)
                                .html('<i class="material-symbols-outlined me-1">schedule</i>Request Sent');
                        },
                        error: function (xhr) {
                            showSidebarToast(xhr.responseJSON?.error || 'Could not send request.', 'danger');
                        }
                    });
                };

                // ── Profile page: Accept Friend Request ──────────────────────────────
                window.acceptFriendRequest = function (userId) {
                    const $btn = $(`button[onclick*="acceptFriendRequest('${userId}')"]`);
                    const requestId = $btn.data('request-id');
                    if (!requestId) { showSidebarToast('Reload page and try again.', 'warning'); return; }
                    $.ajax({
                        url: `/friend-request/accept/${requestId}`,
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': csrfToken },
                        success: function () {
                            showSidebarToast('Friend request accepted!', 'success');
                            setTimeout(() => location.reload(), 800);
                        },
                        error: function (xhr) {
                            showSidebarToast(xhr.responseJSON?.error || 'Error.', 'danger');
                        }
                    });
                };

                // ── Profile page: Decline Friend Request ─────────────────────────────
                window.declineFriendRequest = function (userId) {
                    const $btn = $(`button[onclick*="declineFriendRequest('${userId}')"]`);
                    const requestId = $btn.data('request-id');
                    if (!requestId) { showSidebarToast('Reload page and try again.', 'warning'); return; }
                    $.ajax({
                        url: `/friend-request/decline/${requestId}`,
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': csrfToken },
                        success: function () {
                            showSidebarToast('Request declined.', 'secondary');
                            setTimeout(() => location.reload(), 800);
                        },
                        error: function (xhr) {
                            showSidebarToast(xhr.responseJSON?.error || 'Error.', 'danger');
                        }
                    });
                };

            });
        </script>
    @endauth

    @stack('scripts')

    {{-- Global Messenger Listener for Popups --}}
    @auth
    <script>
        $(document).ready(function() {
            if (typeof window.Echo !== 'undefined') {
                window.Echo.private('message.' + {{ auth()->id() }})
                    .listen('Message', (e) => {
                        console.log('New message received:', e);
                        
                        // 1. Check if the popup for this sender is open
                        const $modal = $('#chat-popup-modal');
                        const isModalOpen = $modal.hasClass('show');
                        const openUserId = $('#chat-popup-inner').find('.name').closest('.chat-popup-header').siblings('.chat-popup-body').attr('data-with-user-id');
                        
                        // We need to add data-with-user-id to the body in popup.blade.php
                        const activeChatId = window.activePopupUserId; 

                        if (activeChatId == e.from_id) {
                            // 1. Try to update Sidebar Chat Window
                            const $sidebarMessages = $('#sidebar-chat-messages');
                            if ($sidebarMessages.length && $('#sidebar-chat-view').is(':visible')) {
                                $('#no-chat-msg').remove();
                                $sidebarMessages.append(`<div class="sidebar-msg them">${e.body} <span class="time">${new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}</span></div>`);
                                $sidebarMessages.scrollTop($sidebarMessages[0].scrollHeight);
                            }
                        }

                        // 2. ALWAYS Update Sidebar History List (if function exists)
                        if (typeof window.updateSidebarContactList === 'function') {
                            window.updateSidebarContactList(
                                e.from_id, 
                                e.body, 
                                'Just now', 
                                e.sender_name, 
                                e.sender_avatar, 
                                'status-online'
                            );
                        }

                        // 3. Falling back to notification if not in active chat view
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'info',
                            title: 'New message from ' + (e.sender_name || 'a friend'),
                            showConfirmButton: false,
                            timer: 4000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.style.cursor = 'pointer';
                                toast.addEventListener('click', () => {
                                    if (typeof window.openChatPopup === 'function') {
                                        window.openChatPopup(e.from_id);
                                    }
                                });
                            }
                        });
                    });
            }
        });
    </script>
    @endauth
</body>
</html>