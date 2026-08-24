<style>
    /* Facebook-like Header Styles */
    .iq-top-navbar {
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        width: 100% !important;
        height: 60px !important;
        background: #ffffff !important;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08) !important;
        display: flex !important;
        align-items: center !important;
        z-index: 9999 !important;
        transition: all 0.3s ease;
    }

    body {
        padding-top: 60px !important;
    }

    .navbar-inner {
        max-width: 100%;
        margin: 0 auto;
        padding: 0 16px;
    }

    /* Left Section */
    .header-left {
        width: 320px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .search-input-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }

    .search-input-wrapper .search-icon {
        position: absolute;
        left: 12px;
        color: #65676b;
        font-size: 20px;
        z-index: 5;
    }

    .search-input-wrapper .search-input {
        background-color: #f0f2f5 !important;
        border: none !important;
        font-size: 15px;
        padding-left: 40px !important;
        height: 40px;
        width: 240px;
        transition: all 0.2s ease;
        border-radius: 50px !important;
    }

    .search-input-wrapper .search-input:focus {
        background-color: #ffffff !important;
        box-shadow: 0 0 0 2px var(--bs-primary) !important;
    }

    /* Center Section */
    .header-center {
        display: flex;
        justify-content: center;
        flex: 1;
    }

    .nav-center {
        margin: 0;
        padding: 0;
        list-style: none;
        display: flex;
        flex-direction: row;
    }

    .nav-center .nav-item {
        margin: 0 4px;
        width: 100px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .nav-center .nav-link {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 8px;
        color: #65676b !important;
        transition: background-color 0.2s ease;
        position: relative;
        padding: 0;
        text-decoration: none;
    }

    .nav-center .nav-link:hover {
        background-color: #f0f2f5;
    }

    .nav-center .nav-link.active {
        color: var(--bs-primary) !important;
    }

    .nav-center .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        right: 0;
        height: 3px;
        background-color: var(--bs-primary);
        border-radius: 3px 3px 0 0;
    }

    .nav-center .nav-link .material-symbols-outlined {
        font-size: 28px;
    }

    .nav-center .nav-link.active .material-symbols-outlined {
        font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 48;
    }

    /* Right Section */
    .header-right {
        width: 320px;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 8px;
    }

    .nav-icon-btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #e4e6eb;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #050505 !important;
        position: relative;
        text-decoration: none;
        transition: background-color 0.2s ease;
        border: none;
        padding: 0;
    }

    .nav-icon-btn:hover {
        background-color: #d8dadf;
    }

    .nav-icon-btn .material-symbols-outlined {
        font-size: 22px;
    }

    .badge-count {
        position: absolute;
        top: -5px;
        right: -5px;
        background-color: #e41e3f;
        color: #ffffff;
        font-size: 11px;
        font-weight: bold;
        padding: 1px 5px;
        border-radius: 50px;
        border: 2px solid #ffffff;
        line-height: 1.2;
        min-width: 18px;
        text-align: center;
    }

    .profile-btn {
        padding: 0;
        border: none;
        background: transparent;
        display: flex;
        align-items: center;
    }

    .profile-btn img {
        border: 1px solid rgba(0, 0, 0, 0.1);
        transition: filter 0.2s ease;
    }

    .profile-btn:hover img {
        filter: brightness(0.9);
    }

    /* Dropdown Styling Fixes */
    .sub-drop {
        border-radius: 8px;
        box-shadow: 0 12px 28px 0 rgba(0, 0, 0, 0.2), 0 2px 4px 0 rgba(0, 0, 0, 0.1) !important;
        border: none;
        margin-top: 10px !important;
        padding: 8px;
        width: 360px !important;
    }

    .sub-drop-large {
        width: 400px !important;
    }

    .hover-bg:hover {
        background-color: #f2f2f2;
    }

    /* Search Modal Custom Position */
    .search-modal-custom {
        position: absolute;
        top: 100%;
        left: 0;
        width: 320px;
        background: white;
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.2);
        border-radius: 8px;
        display: none;
        z-index: 1000;
        margin-top: 8px;
    }

    .search-modal-custom.open {
        display: block;
    }

    /* Responsive & Two-Row Mobile Layout */
    @media (max-width: 1199px) {
        .iq-top-navbar {
            height: auto !important;
            padding: 0 !important;
        }

        body {
            padding-top: 110px !important;
            /* Height for two rows */
        }

        .navbar-inner {
            flex-direction: column !important;
            padding: 0 !important;
        }

        .mobile-header-row-1 {
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 0 16px;
        }

        .mobile-header-row-2 {
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            background: #ffffff;
        }

        .header-center {
            display: none !important;
        }

        .header-left,
        .header-right {
            width: auto !important;
            flex: none !important;
        }

        /* Centering icons in row 2 */
        .mobile-header-row-2 .header-right {
            width: 100% !important;
            justify-content: center !important;
            gap: 20px !important;
        }

        .nav-icon-btn {
            width: 42px !important;
            height: 42px !important;
            background: transparent !important;
        }

        .nav-icon-btn .material-symbols-outlined {
            font-size: 26px !important;
            color: #65676b !important;
        }

        .profile-btn img {
            width: 34px !important;
            height: 34px !important;
        }

        .badge-count {
            top: -2px !important;
            right: -2px !important;
            font-size: 10px !important;
        }

        /* Fixed & Centered Dropdowns for Mobile */
        .dropdown {
            position: static !important;
            /* Allow dropdown-menu to be relative to the header */
        }

        .sub-drop {
            width: 96vw !important;
            position: absolute !important;
            left: 50% !important;
            transform: translateX(-50%) !important;
            top: 110px !important;
            max-height: 75vh;
            overflow-y: auto;
            border-radius: 12px !important;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15) !important;
            margin: 0 !important;
            z-index: 10000 !important;
        }

        .sub-drop-large {
            width: 96vw !important;
        }

        .iq-friend-request h6,
        .flex-grow-1 h6 {
            font-size: 14px !important;
        }

        .iq-friend-request p,
        .flex-grow-1 p {
            font-size: 12px !important;
            margin-bottom: 5px !important;
        }

        .iq-friend-request .btn {
            padding: 6px 12px !important;
            font-size: 11px !important;
            border-radius: 6px !important;
        }
    }
</style>

<div class="iq-top-navbar">
    <div class="container-fluid navbar-inner">

        <!-- MOBILE ROW 1: Logo & Burger Menu -->
        <div class="mobile-header-row-1 d-xl-none">
            <a href="{{ route('home') }}" class="navbar-brand m-0 p-0">
                @if(getSetting('header_logo'))
                    <img src="{{ asset(getSetting('header_logo')) }}" class="img-fluid" alt="logo"
                        style="height: 36px; width: 36px; border-radius: 50%; object-fit: cover;">
                @else
                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center"
                        style="width: 36px; height: 36px;">
                        <span class="text-white fw-bold">B</span>
                    </div>
                @endif
            </a>

            <a class="sidebar-toggle nav-icon-btn" data-toggle="sidebar" data-active="true" href="javascript:void(0);">
                <span class="material-symbols-outlined">menu</span>
            </a>
        </div>

        <!-- DESKTOP NAV & MOBILE ROW 2 -->
        <nav
            class="nav navbar navbar-expand-lg p-0 w-100 d-flex align-items-center justify-content-between mobile-header-row-2">

            <!-- DESKTOP LEFT (Logo & Search) - Hidden on Mobile -->
            <div class="header-left d-none d-xl-flex">
                <a href="{{ route('home') }}" class="navbar-brand m-0 p-0 d-flex align-items-center">
                    @if(getSetting('header_logo'))
                        <img src="{{ asset(getSetting('header_logo')) }}" class="img-fluid" alt="logo"
                            style="height: 40px; width: 40px; border-radius: 50%; object-fit: cover;">
                    @else
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 40px; height: 40px;">
                            <span class="text-white fw-bold">B</span>
                        </div>
                    @endif
                </a>

                <div class="iq-search-bar device-search position-relative">
                    <form action="#" class="searchbox open-modal-search">
                        <div class="search-input-wrapper">
                            <span class="material-symbols-outlined search-icon">search</span>
                            <input type="text" class="text search-input form-control"
                                placeholder="Search BD-Expertzone">
                        </div>
                    </form>
                    <div class="search-modal-custom">
                        <div class="search-modal-content">
                            <div class="py-2 px-3 border-bottom d-flex align-items-center justify-content-between">
                                <h5 class="mb-0 small fw-bold">Recent</h5>
                                <a class="text-primary small clear-recent-btn" href="javascript:void(0);">Clear All</a>
                            </div>
                            <div class="item-header-scroll">
                                <div class="search-modal-body" id="recent-searches-container-desktop">
                                    @php
                                        $recentSearches = session()->get('recent_searches', []);
                                    @endphp
                                    @include('user-interface.pages.search.partials.recent-list', ['recentSearches' => $recentSearches])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DESKTOP CENTER - Hidden on Mobile -->
            <div class="header-center d-none d-xl-flex">
                <ul class="nav-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}"
                            title="Home">
                            <span class="material-symbols-outlined">home</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="javascript:void(0);" id="spatialJobDrop" data-bs-toggle="dropdown"
                            data-bs-display="static" title="Spatial Job">
                            <span class="material-symbols-outlined">explore</span>
                        </a>
                        <div class="dropdown-menu sub-drop" aria-labelledby="spatialJobDrop">
                            <h6 class="dropdown-header fw-bold text-dark">Spatial Jobs</h6>
                            @foreach($adminPosts as $post)
                                @if($post->category && ($post->category->title === 'China Student visa' || $post->category->title === 'China Medical visa'))
                                    <a class="dropdown-item p-2 hover-bg rounded d-flex align-items-center gap-2"
                                        href="{{ route('posts.show', $post->id) }}">
                                        <span class="material-symbols-outlined text-primary"
                                            style="font-size: 20px;">description</span>
                                        <span class="text-wrap">{!! Str::limit(strip_tags($post->content), 50) !!}</span>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="javascript:void(0);" id="govJobDrop" data-bs-toggle="dropdown"
                            data-bs-display="static" title="Government Job">
                            <span class="material-symbols-outlined">account_balance</span>
                        </a>
                        <div class="dropdown-menu sub-drop" aria-labelledby="govJobDrop">
                            <h6 class="dropdown-header fw-bold text-dark">Government Jobs</h6>
                            @foreach($adminPosts as $post)
                                @if($post->category && $post->category->title === 'Government Jobs')
                                    <a class="dropdown-item p-2 hover-bg rounded d-flex align-items-center gap-2"
                                        href="{{ route('posts.show', $post->id) }}">
                                        <span class="material-symbols-outlined text-success"
                                            style="font-size: 20px;">description</span>
                                        <span class="text-wrap">{!! Str::limit(strip_tags($post->content), 50) !!}</span>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('partner.list') ? 'active' : '' }}"
                            href="{{ route('partner.list') }}" title="Partners">
                            <span class="material-symbols-outlined">handshake</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- RIGHT: Actions (Centered on Mobile Row 2) -->
            <div class="header-right">
                @auth
                    <!-- Friend Requests -->
                    <div class="dropdown">
                        <a href="javascript:void(0);" class="nav-icon-btn" id="group-drop" data-bs-toggle="dropdown"
                            data-bs-display="static">
                            <span class="material-symbols-outlined">group</span>
                            @php $pendingRequestsCount = auth()->user()->friendRequestsReceived()->where('status', 'pending')->count(); @endphp
                            @if ($pendingRequestsCount > 0)
                                <span class="badge-count">{{ $pendingRequestsCount }}</span>
                            @endif
                        </a>
                        <div class="sub-drop sub-drop-large dropdown-menu dropdown-menu-end" aria-labelledby="group-drop">
                            <div class="card shadow-none m-0 border-0">
                                <div
                                    class="card-header d-flex justify-content-between align-items-center px-2 pb-3 border-bottom">
                                    <h5 class="fw-bold mb-0">Friend Requests</h5>
                                    <a href="{{ route('friend.requests') }}" class="text-primary small fw-semibold">View
                                        All</a>
                                </div>
                                <div class="card-body p-2">
                                    <div class="item-header-scroll" id="friend-requests-list" style="max-height: 400px;">
                                        @forelse(auth()->user()->friendRequestsReceived()->where('status', 'pending')->take(10)->get() as $request)
                                            <div class="iq-friend-request mb-2 p-2 rounded hover-bg"
                                                data-request-id="{{ $request->id }}">
                                                <div class="d-flex align-items-center gap-3">
                                                    <img class="avatar-50 rounded-circle"
                                                        src="{{ asset($request->sender->avatar ?? 'frontend/assets/images/user/1.jpg') }}"
                                                        alt="" loading="lazy">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0 fw-bold">{{ $request->sender->name }}</h6>
                                                        <p class="mb-2 small text-muted">
                                                            {{ $request->sender->friends()->count() }} mutual friends
                                                        </p>
                                                        <div class="d-flex gap-2">
                                                            <button
                                                                class="btn btn-primary btn-sm flex-grow-1 accept-friend-request-header-btn"
                                                                data-request-id="{{ $request->id }}"
                                                                data-sender-id="{{ $request->sender->id }}"
                                                                data-sender-name="{{ $request->sender->name }}"
                                                                data-sender-username="{{ $request->sender->username }}"
                                                                data-sender-avatar="{{ asset($request->sender->avatar ?? 'frontend/assets/images/user/1.jpg') }}">
                                                                Confirm
                                                            </button>
                                                            <button
                                                                class="btn btn-light btn-sm flex-grow-1 decline-friend-request-header-btn"
                                                                data-request-id="{{ $request->id }}">
                                                                Delete
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="text-center text-muted py-5" id="no-requests-message">
                                                <span
                                                    class="material-symbols-outlined font-size-40 d-block mb-2">person_add</span>
                                                No new friend requests
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Messenger -->
                    <div class="nav-item">
                        <a href="javascript:void(0);" class="nav-icon-btn messenger-sidebar-trigger">
                            <span class="material-symbols-outlined">chat</span>
                        </a>
                    </div>

                    <!-- Notifications -->
                    <div class="dropdown">
                        <a href="javascript:void(0);" class="nav-icon-btn" id="notification-drop" data-bs-toggle="dropdown"
                            data-bs-display="static">
                            <span class="material-symbols-outlined">notifications</span>
                            @php $unreadCount = auth()->user()->unreadNotifications->count(); @endphp
                            @if ($unreadCount > 0)
                                <span class="badge-count">{{ $unreadCount }}</span>
                            @endif
                        </a>
                        <div class="sub-drop dropdown-menu dropdown-menu-end" aria-labelledby="notification-drop">
                            <div class="card shadow-none m-0 border-0">
                                <div
                                    class="card-header d-flex justify-content-between align-items-center px-2 pb-3 border-bottom">
                                    <h5 class="fw-bold mb-0">Notifications</h5>
                                    <a href="javascript:void(0);" onclick="markAllNotificationsRead()"
                                        class="text-primary small">Mark all as read</a>
                                </div>
                                <div class="card-body p-1">
                                    <div class="item-header-scroll" id="notification-list" style="max-height: 400px;">
                                        @forelse(auth()->user()->unreadNotifications->take(10) as $notification)
                                            <div class="d-flex gap-3 p-2 rounded hover-bg mb-1">
                                                <img class="avatar-40 rounded-circle"
                                                    src="{{ $notification->data['avatar'] ?? asset('frontend/assets/images/user/1.jpg') }}"
                                                    alt="">
                                                <div class="flex-grow-1">
                                                    <p class="mb-0 small">
                                                        <span
                                                            class="fw-bold">{{ $notification->data['user_name'] ?? 'Someone' }}</span>
                                                        @if (isset($notification->data['type']) && $notification->data['type'] === 'friend_request')
                                                            sent you a friend request.
                                                        @elseif(isset($notification->data['type']) && $notification->data['type'] === 'follow')
                                                            started following you.
                                                        @else
                                                            {{ $notification->data['message'] ?? 'sent a notification.' }}
                                                        @endif
                                                    </p>
                                                    <small
                                                        class="text-primary">{{ $notification->created_at->diffForHumans() }}</small>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="text-center text-muted py-4">No new notifications</div>
                                        @endforelse
                                    </div>
                                    <div class="mt-2">
                                        <a href="#" class="btn btn-light btn-sm w-100 text-primary fw-bold">See all</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- User Account -->
                    <div class="dropdown">
                        <a href="javascript:void(0);" class="profile-btn" data-bs-toggle="dropdown"
                            data-bs-display="static">
                            <img src="{{ asset(auth()->user()->avatar ?? 'frontend/assets/images/user/1.jpg') }}"
                                class="avatar-40 rounded-circle" alt="user">
                        </a>
                        <div class="sub-drop dropdown-menu dropdown-menu-end" style="width: 300px !important;">
                            <div class="card shadow-none m-0 border-0">
                                <div class="card-body p-2">
                                    <a href="{{ route('user.profile') }}"
                                        class="d-flex align-items-center gap-3 p-2 rounded hover-bg text-dark text-decoration-none mb-3">
                                        <img src="{{ asset(auth()->user()->avatar ?? 'frontend/assets/images/user/1.jpg') }}"
                                            class="avatar-60 rounded-circle border" alt="user">
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0 fw-bold">{{ auth()->user()->name }}</h6>
                                            <small class="text-muted">See your profile</small>
                                        </div>
                                    </a>
                                    <hr class="my-2">
                                    <a href="{{ route('user.edit-profile') }}"
                                        class="d-flex align-items-center gap-3 p-2 rounded hover-bg text-dark text-decoration-none">
                                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center"
                                            style="width: 36px; height: 36px;">
                                            <span class="material-symbols-outlined" style="font-size: 20px;">settings</span>
                                        </div>
                                        <span class="fw-semibold">Settings & Privacy</span>
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                                        @csrf
                                        <a href="javascript:;"
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                            class="d-flex align-items-center gap-3 p-2 rounded hover-bg text-dark text-decoration-none">
                                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center"
                                                style="width: 36px; height: 36px;">
                                                <span class="material-symbols-outlined"
                                                    style="font-size: 20px;">logout</span>
                                            </div>
                                            <span class="fw-semibold">Log Out</span>
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary rounded-pill px-4 fw-bold">Log In</a>
                    <a href="{{ route('register') }}" class="btn btn-light rounded-pill px-4 fw-bold ms-2">Sign Up</a>
                @endauth
            </div>
        </nav>
    </div>
</div>

<audio id="notification-sound" src="{{ asset('frontend/assets/sounds/notification.mp3') }}" preload="auto"></audio>

@push('scripts')
    <script>
        $(document).ready(function () {
            // Notification Sound Logic
            if (window.Echo && window.Laravel && window.Laravel.userId) {
                window.Echo.private('App.Models.User.' + window.Laravel.userId)
                    .notification((notification) => {
                        const sound = document.getElementById('notification-sound');
                        if (sound) sound.play().catch(e => console.log('Sound play blocked'));
                    });
            }

            // Mark all as read
            window.markAllNotificationsRead = function () {
                fetch("{{ route('mark.notifications.read') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Accept': 'application/json',
                    },
                }).then(() => location.reload());
            }

            // Friend Request AJAX (Accept)
            $(document).on('click', '.accept-friend-request-header-btn', function () {
                const btn = $(this);
                const requestId = btn.data('request-id');
                const senderName = btn.data('sender-name');

                btn.prop('disabled', true).html('...');

                $.ajax({
                    url: '/friend-request/accept/' + requestId,
                    method: 'POST',
                    data: { _token: $('meta[name="csrf-token"]').attr('content') },
                    success: function (res) {
                        if (res.success) {
                            btn.closest('.iq-friend-request').fadeOut(300, function () {
                                $(this).remove();
                                if ($('#friend-requests-list .iq-friend-request').length === 0) {
                                    $('#friend-requests-list').html('<div class="text-center text-muted py-5">No new friend requests</div>');
                                }
                                // Update badge
                                const badge = $('#group-drop .badge-count');
                                if (badge.length) {
                                    const count = parseInt(badge.text()) - 1;
                                    if (count > 0) badge.text(count); else badge.remove();
                                }
                            });
                            if (window.ToastMagic) ToastMagic.success('You are now friends with ' + senderName);
                        }
                    }
                });
            });

            // Friend Request AJAX (Decline)
            $(document).on('click', '.decline-friend-request-header-btn', function () {
                const btn = $(this);
                const requestId = btn.data('request-id');

                btn.prop('disabled', true).html('...');

                $.ajax({
                    url: '/friend-request/decline/' + requestId,
                    method: 'POST',
                    data: { _token: $('meta[name="csrf-token"]').attr('content') },
                    success: function (res) {
                        if (res.success) {
                            btn.closest('.iq-friend-request').fadeOut(300, function () {
                                $(this).remove();
                                if ($('#friend-requests-list .iq-friend-request').length === 0) {
                                    $('#friend-requests-list').html('<div class="text-center text-muted py-5">No new friend requests</div>');
                                }
                                // Update badge
                                const badge = $('#group-drop .badge-count');
                                if (badge.length) {
                                    const count = parseInt(badge.text()) - 1;
                                    if (count > 0) badge.text(count); else badge.remove();
                                }
                            });
                        }
                    }
                });
            });

            // Search Input Toggle logic
            $('.search-input').on('focus', function () {
                $('.search-modal-custom').addClass('open');
            }).on('blur', function () {
                // Delay to allow clicking on recent search links
                setTimeout(() => {
                    $('.search-modal-custom').removeClass('open');
                }, 200);
            });

            // Sidebar Icon Toggle Logic
            $('[data-toggle="sidebar"]').on('click', function () {
                const icon = $(this).find('.material-symbols-outlined');
                if (icon.length) {
                    setTimeout(() => {
                        // app.js toggles the "sidebar-main" class on body
                        if ($('body').hasClass('sidebar-main')) {
                            icon.text('close');
                        } else {
                            icon.text('menu');
                        }
                    }, 50);
                }
            });

        });
    </script>
@endpush