
<div class="iq-top-navbar border-bottom">
    <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar p-lg-0 mt-0">
        <div class="container-fluid navbar-inner  ">
            <div class="d-flex align-items-center pb-2 pb-lg-0 d-xl-none">
                <a href="{{ route('home') }}"
                    class="d-flex align-items-center iq-header-logo navbar-brand d-block d-xl-none">
                    @if(getSetting('header_logo'))
                        <img src="{{ asset(getSetting('header_logo')) }}" class="img-fluid" alt="logo" style="height: 40px;">
                    @else
                        <h3 class="logo-title d-none d-sm-block">{{ getSetting('app_name', 'BD-Expertzone') }}</h3>
                    @endif
                </a>
                <a class="sidebar-toggle" data-toggle="sidebar" data-active="true" href="javascript:void(0);">
                    <div class="icon material-symbols-outlined iq-burger-menu"> menu </div>
                </a>
            </div>
            <div class="d-flex align-items-center">
                <div class="d-flex align-items-center justify-content-between product-offcanvas">
                    <div class="offcanvas offcanvas-end shadow-none iq-product-menu-responsive d-none d-xl-block"
                        tabindex="-1" id="offcanvasBottomNav">
                        <div class="offcanvas-body">
                            <ul class="iq-nav-menu list-unstyled">
                                <li class="nav-item">
                                    <a class="nav-link menu-arrow justify-content-start active"
                                        href="{{ route('home') }}">
                                        <span class="nav-text">Home</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-arrow justify-content-start" data-bs-toggle="collapse"
                                        href="#storeData" role="button" aria-expanded="false"
                                        aria-controls="storeData">
                                        <span class="nav-text">Spatial job</span>
                                    </a>
                                    <ul class="iq-header-sub-menu list-unstyled collapse shadow" id="storeData">
                                        @foreach($adminPosts as $post)
                                            @if($post->category->title=== 'China Student visa' || $post->category->title=== 'China Medical visa')
                                                <li class="nav-item">
                                                    <a class="nav-link " href="../dashboard/store-category-list.html">{!! $post->content !!}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-arrow justify-content-start" data-bs-toggle="collapse"
                                        href="#storeData" role="button" aria-expanded="false"
                                        aria-controls="storeData">
                                        <span class="nav-text">Government job</span>
                                    </a>
                                    <ul class="iq-header-sub-menu list-unstyled collapse shadow" id="storeData">
                                        @foreach($adminPosts as $post)
                                            @if($post->category->title=== 'Government Jobs')
                                                <li class="nav-item">
                                            <a class="nav-link " href="../dashboard/store-category-list.html">{!! $post->content !!}</a>
                                        </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-arrow justify-content-start"
                                        href="{{ route('partner.list') }}" target="_blank">
                                        <span class="nav-text">Partner</span>
                                    </a>
                                    {{--                                    <ul class="iq-header-sub-menu list-unstyled collapse shadow" id="storeData"> --}}
                                    {{--                                        @foreach ($globalPartners as $partner) --}}
                                    {{--                                            <li class="nav-item"> --}}
                                    {{--                                                <a class="nav-link " href="../dashboard/store-category-list.html">{{ "$partner->first_name $partner->last_name"   }}</a> --}}
                                    {{--                                            </li> --}}
                                    {{--                                        @endforeach --}}
                                    {{--                                    </ul> --}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="iq-search-bar device-search position-relative d-none d-lg-block">
                    <form action="#" class="searchbox open-modal-search">
                        <a class="search-link" href="javascript:void(0);">
                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="7.82491" cy="7.82495" r="6.74142" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12.5137 12.8638L15.1567 15.5" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <input type="text" class="text search-input form-control bg-light-subtle"
                            placeholder="Search for post ...">
                    </form>
                    <div class="search-modal-custom">
                        <div class="search-modal-content">
                            <div class="py-2 px-3">
                                <div class="d-flex align-items-center justify-content-between d-lg-none w-100">
                                    <form action="#" class="searchbox w-50" data-bs-toggle="modal"
                                        data-bs-target="#searchmodal">
                                        <a class="search-link" href="javascript:void(0);">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="7.82491" cy="7.82495" r="6.74142"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M12.5137 12.8638L15.1567 15.5" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                        <input type="text" class="text search-input form-control bg-primary-subtle"
                                            placeholder="Search here...">
                                    </form>
                                    <a href="javascript:void(0);" class="material-symbols-outlined text-dark"
                                        data-bs-dismiss="modal">close</a>
                                </div>
                                    <div class="d-none d-lg-flex align-items-center justify-content-between w-100">
                                        <h4 class="modal-title" id="exampleModalFullscreenLabel">Recent</h4>
                                        <a class="text-dark clear-recent-btn" href="javascript:void(0);">Clear All</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item-header-scroll">
                                <div class="search-modal-body" id="recent-searches-container-desktop">
                                    @php
                                        $recentSearches = session()->get('recent_searches', []);
                                    @endphp
                                    @forelse($recentSearches as $search)
                                        <div class="d-flex align-items-center search-hover py-2 px-3 recent-search-item">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-40 rounded-pill bg-light d-flex align-items-center justify-content-center">
                                                    <span class="material-symbols-outlined text-muted">search</span>
                                                </div>
                                            </div>
                                            <div class="d-flex ms-3 w-100 justify-content-between align-items-center">
                                                <div class="d-flex flex-column">
                                                    <div>
                                                        <a href="javascript:void(0);" class="h6 recent-search-link">{{ $search['query'] }}</a>
                                                    </div>
                                                </div>
                                                <a href="javascript:void(0);" data-query="{{ $search['query'] }}" class="material-symbols-outlined text-dark font-size-16 delete-recent-btn">close</a>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="py-3 px-3 text-center text-muted no-recent-searches">
                                            No recent searches
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <ul class="navbar-nav navbar-list">
                <li class="nav-item d-lg-none">
                    <div class="iq-search-bar device-search">
                        <form action="#" class="searchbox open-modal-search ">
                            <a class="d-lg-none d-flex text-body" href="javascript:void(0);">
                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="7.82491" cy="7.82495" r="6.74142" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
                                    <path d="M12.5137 12.8638L15.1567 15.5" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                        </form>
                        <div class="search-modal-custom">
                            <div class="search-modal-content">
                                <div class="py-2 px-3">
                                    <div class="d-lg-none w-100">
                                        <form action="#" class="searchbox" data-bs-toggle="modal"
                                            data-bs-target="#searchmodal">
                                            <a class="search-link" href="javascript:void(0);">
                                                <svg width="16" height="17" viewBox="0 0 16 17"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="7.82491" cy="7.82495" r="6.74142"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M12.5137 12.8638L15.1567 15.5" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                            <input type="text"
                                                class="text search-input form-control bg-primary-subtle"
                                                placeholder="Search here...">
                                        </form>
                                    </div>
                                    <div class="d-none d-lg-flex align-items-center justify-content-between w-100">
                                        <h4 class="modal-title" id="exampleModalFullscreenLabel">Recent</h4>
                                        <a class="text-dark clear-recent-btn" href="javascript:void(0);">Clear All</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item-header-scroll">
                                <div class="search-modal-body" id="recent-searches-container-mobile">
                                    <div class="d-flex d-lg-none align-items-center justify-content-between w-100 p-3 pb-0">
                                        <h5 class="modal-title h4" id="exampleModalFullscreenLabel">Recent</h5>
                                        <a href="javascript:void(0);" class="text-dark clear-recent-btn-mobile">Clear All</a>
                                    </div>
                                    @php
                                        $recentSearches = session()->get('recent_searches', []);
                                    @endphp
                                    @forelse($recentSearches as $search)
                                        <div class="d-flex align-items-center search-hover py-2 px-3 recent-search-item">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-40 rounded-pill bg-light d-flex align-items-center justify-content-center">
                                                    <span class="material-symbols-outlined text-muted">search</span>
                                                </div>
                                            </div>
                                            <div class="d-flex ms-3 w-100 justify-content-between align-items-center">
                                                <div class="d-flex flex-column">
                                                    <div>
                                                        <a href="javascript:void(0);" class="h6 recent-search-link">{{ $search['query'] }}</a>
                                                    </div>
                                                </div>
                                                <a href="javascript:void(0);" data-query="{{ $search['query'] }}" class="material-symbols-outlined text-dark font-size-16 delete-recent-btn">close</a>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="py-3 px-3 text-center text-muted no-recent-searches">
                                            No recent searches
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @auth()
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle d-flex align-items-center" id="group-drop"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="material-symbols-outlined">group</span>
                        </a>
                        <div class="sub-drop sub-drop-large dropdown-menu " aria-labelledby="group-drop">
                            <div class="card shadow m-0">
                                <div class="card-header px-0 pb-0 mx-5 border-bottom">
                                    <ul class="nav nav-tabs justify-content-center w-100" id="friendTabs" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="requests-tab" data-bs-toggle="tab"
                                                data-bs-target="#requests-content" type="button" role="tab">
                                                Friend Requests
                                                @php $pendingRequests = auth()->user()->friendRequestsReceived()->where('status', 'pending')->count(); @endphp
                                                @if ($pendingRequests > 0)
                                                    <span class="badge bg-primary ms-1">{{ $pendingRequests }}</span>
                                                @endif
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="friends-tab" data-bs-toggle="tab"
                                                data-bs-target="#friends-content" type="button" role="tab">
                                                Friends
                                                @php $friendsCount = auth()->user()->friends()->count(); @endphp
                                                @if ($friendsCount > 0)
                                                    <span class="badge bg-success ms-1">{{ $friendsCount }}</span>
                                                @endif
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="friendTabsContent">
                                        <!-- Friend Requests Tab -->
                                        <div class="tab-pane fade show active" id="requests-content" role="tabpanel">
                                            <div class="item-header-scroll" id="friend-requests-list">
                                                @forelse(auth()->user()->friendRequestsReceived()->where('status', 'pending')->get() as $request)
                                                    <div class="iq-friend-request" data-request-id="{{ $request->id }}">
                                                        <div
                                                            class="iq-sub-card-big d-flex align-items-center justify-content-between mb-4">
                                                            <div class="d-flex align-items-center">
                                                                <img class="avatar-40 rounded-pill"
                                                                    src="{{ asset($request->sender->avatar ?? 'frontend/assets/images/user/1.jpg') }}"
                                                                    alt="" loading="lazy">
                                                                <div class="ms-3">
                                                                    <h6 class="mb-0">{{ $request->sender->name }}</h6>
                                                                    <p class="mb-0">
                                                                        {{ $request->sender->friends()->count() }}
                                                                        friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);"
                                                                    class="me-2 rounded bg-primary-subtle border-0 d-inline-block px-1 accept-friend-request-header-btn"
                                                                    data-request-id="{{ $request->id }}"
                                                                    data-sender-id="{{ $request->sender->id }}"
                                                                    data-sender-name="{{ $request->sender->name }}"
                                                                    data-sender-username="{{ $request->sender->username }}"
                                                                    data-sender-avatar="{{ asset($request->sender->avatar ?? 'frontend/assets/images/user/1.jpg') }}">
                                                                    <span
                                                                        class="material-symbols-outlined font-size-18 align-text-bottom">add</span>
                                                                </a>
                                                                <a href="javascript:void(0);"
                                                                    class="me-3 rounded bg-danger-subtle border-0 d-inline-block px-1 decline-friend-request-header-btn"
                                                                    data-request-id="{{ $request->id }}">
                                                                    <span
                                                                        class="material-symbols-outlined font-size-18 align-text-bottom">close</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="text-center text-muted py-4" id="no-requests-message">No
                                                        new friend requests</div>
                                                @endforelse
                                            </div>
                                            <div class="text-center">
                                                <a href="{{ route('friend.requests') }}"
                                                    class="btn btn-primary fw-500 mt-4">View All Requests</a>
                                            </div>
                                        </div>

                                        <!-- Friends Tab -->
                                        <div class="tab-pane fade" id="friends-content" role="tabpanel">
                                            <div class="item-header-scroll" id="friends-list">
                                                @forelse(auth()->user()->friends()->take(8)->get() as $friend)
                                                    <div class="iq-friend-item" data-friend-id="{{ $friend->id }}">
                                                        <div
                                                            class="iq-sub-card-big d-flex align-items-center justify-content-between mb-4">
                                                            <div class="d-flex align-items-center">
                                                                <img class="avatar-40 rounded-pill"
                                                                    src="{{ asset($friend->avatar ?? 'frontend/assets/images/user/1.jpg') }}"
                                                                    alt="" loading="lazy">
                                                                <div class="ms-3">
                                                                    <h6 class="mb-0">{{ $friend->name }}</h6>
                                                                    <p class="mb-0">{{ $friend->friends()->count() }}
                                                                        friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <a href="{{ route('user.profile.show', $friend->username) }}"
                                                                    class="me-2 rounded bg-primary-subtle border-0 d-inline-block px-1 friend-profile-btn"
                                                                    title="View Profile"
                                                                    data-friend-id="{{ $friend->id }}"
                                                                    data-friend-name="{{ $friend->name }}">
                                                                    <span
                                                                        class="material-symbols-outlined font-size-18 align-text-bottom">person</span>
                                                                </a>
                                                                <a href="javascript:void(0);"
                                                                    class="me-3 rounded bg-info-subtle border-0 d-inline-block px-1 friend-chat-btn"
                                                                    title="Send Message"
                                                                    data-friend-id="{{ $friend->id }}"
                                                                    data-friend-name="{{ $friend->name }}"
                                                                    data-friend-avatar="{{ asset($friend->avatar ?? 'frontend/assets/images/user/1.jpg') }}"
                                                                    data-friend-online="{{ $friend->isOnline() ? '1' : '0' }}">
                                                                    <span
                                                                        class="material-symbols-outlined font-size-18 align-text-bottom">chat</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="text-center text-muted py-4">No friends yet</div>
                                                @endforelse
                                            </div>
                                            <div class="text-center">
                                                <a href="{{ route('friends.list') }}"
                                                    class="btn btn-primary fw-500 mt-4">View All Friends</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0);" class="d-flex align-items-center" id="open-sidebar-messenger-header">
                            <i class="material-symbols-outlined">mail</i>
                            <span class="mobile-text d-none ms-3">Message</span>
                        </a>
                        <div class="sub-drop dropdown-menu header-notification" aria-labelledby="mail-drop">
                            <div class="card shadow m-0">
                                <div class="card-header d-flex justify-content-between px-0 pb-4 mx-5 border-bottom">
                                    <div class="header-title">
                                        <h5 class="fw-semibold">All Message</h5>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="item-header-scroll">
                                        @php
                                            // Fetch recent conversations/messages for the authenticated user
                                            $recentMessages = auth()->user()->recentMessages ?? [];
                                        @endphp
                                        @forelse($recentMessages as $message)
                                            <a href="{{ route('messenger.chat', $message->user->username) }}">
                                                <div
                                                    class="thread d-flex align-items-center justify-content-between rounded-0">
                                                    <div class="d-flex align-items-center">
                                                        <img class="avatar-40 rounded-pill align-top"
                                                            src="{{ asset($message->user->avatar ?? 'frontend/assets/images/user/1.jpg') }}"
                                                            alt="" loading="lazy">
                                                        <div class="ms-3 d-inline-block">
                                                            <h6>{{ $message->user->name }}</h6>
                                                            <small
                                                                class="fw-500 text-body">{{ Str::limit($message->body, 40) }}</small>
                                                        </div>
                                                    </div>
                                                    <small
                                                        class="text-body">{{ $message->created_at->diffForHumans() }}</small>
                                                </div>
                                            </a>
                                        @empty
                                            <div class="text-center text-muted py-4">No messages</div>
                                        @endforelse
                                    </div>
                                    <div class="m-5 mt-4">
                                        <button type="button" class="btn btn-primary fw-500 w-100"
                                            onclick="window.location.href='/messenger'">View All
                                            Messages</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @auth
                        <li class="nav-item dropdown">
                            <a href="javascript:void(0);" class="search-toggle dropdown-toggle d-flex align-items-center"
                                id="notification-drop" data-bs-toggle="dropdown">
                                <span class="material-symbols-outlined position-relative">notifications
                                    @php $unreadCount = auth()->user()->unreadNotifications->count(); @endphp
                                    @if ($unreadCount > 0)
                                        <span class="bg-primary text-white notification-badge">{{ $unreadCount }}</span>
                                    @endif
                                </span>
                            </a>
                            <div class="sub-drop dropdown-menu header-notification" aria-labelledby="notification-drop">
                                <div class="card m-0 shadow">
                                    <div class="card-header d-flex justify-content-between px-0 pb-4 mx-5 border-bottom">
                                        <div class="header-title">
                                            <h5 class="fw-semibold">Notifications</h5>
                                        </div>
                                        <h6 class="material-symbols-outlined">settings</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="item-header-scroll" id="notification-list">
                                            @forelse(auth()->user()->unreadNotifications->take(10) as $notification)
                                                @if (isset($notification->data['type']) && $notification->data['type'] === 'friend_request')
                                                    <div class="d-flex gap-3 mb-4 friend-request-notification"
                                                        data-notification-id="{{ $notification->id }}">
                                                        <img class="avatar-32 rounded-pill"
                                                            src="{{ $notification->data['avatar'] ?? asset('frontend/assets/images/user/1.jpg') }}"
                                                            alt="">
                                                        <div class="flex-grow-1">
                                                            <h6 class="font-size-14">
                                                                <span
                                                                    class="fw-semibold">{{ $notification->data['user_name'] ?? 'Someone' }}</span>
                                                                sent you a friend request.
                                                            </h6>
                                                            <small
                                                                class="text-body fw-500">{{ $notification->created_at->diffForHumans() }}</small>
                                                            <div class="d-flex gap-2 mt-2">
                                                                <button type="button"
                                                                    class="btn btn-primary btn-sm accept-friend-request-btn"
                                                                    data-request-id="{{ $notification->data['request_id'] }}"
                                                                    data-notification-id="{{ $notification->id }}"
                                                                    data-sender-id="{{ $notification->data['sender_id'] ?? $notification->data['user_id'] }}"
                                                                    data-sender-name="{{ $notification->data['user_name'] ?? 'Someone' }}"
                                                                    data-sender-username="{{ $notification->data['username'] ?? 'unknown' }}"
                                                                    data-sender-avatar="{{ $notification->data['avatar'] ?? asset('frontend/assets/images/user/1.jpg') }}">
                                                                    Accept
                                                                </button>
                                                                <button type="button"
                                                                    class="btn btn-outline-secondary btn-sm decline-friend-request-btn"
                                                                    data-request-id="{{ $notification->data['request_id'] }}"
                                                                    data-notification-id="{{ $notification->id }}">
                                                                    Decline
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <a
                                                        href="{{ $notification->data['url'] ?? route('user.profile.show', $notification->data['username'] ?? ($notification->data['follower_username'] ?? 'unknown')) }}">
                                                        <div class="d-flex gap-3 mb-4">
                                                            <img class="avatar-32 rounded-pill"
                                                                src="{{ $notification->data['avatar'] ?? asset('frontend/assets/images/user/1.jpg') }}"
                                                                alt="">
                                                            <div>
                                                                <h6 class="font-size-14">
                                                                    @if (isset($notification->data['type']) && $notification->data['type'] === 'follow')
                                                                        <span
                                                                            class="fw-semibold">{{ $notification->data['follower_name'] ?? 'Someone' }}</span>
                                                                        started following you.
                                                                    @elseif(isset($notification->data['type']) && $notification->data['type'] === 'friend_request_accepted')
                                                                        <span
                                                                            class="fw-semibold">{{ $notification->data['user_name'] ?? 'Someone' }}</span>
                                                                        accepted your friend request.
                                                                    @elseif(isset($notification->data['type']) && $notification->data['type'] === 'new_post')
                                                                        <span
                                                                            class="fw-semibold">{{ $notification->data['user_name'] ?? 'Someone' }}</span>
                                                                        posted: <span
                                                                            class="text-primary">{{ Str::limit($notification->data['content'] ?? '', 40) }}</span>
                                                                    @else
                                                                        {{ $notification->data['message'] ?? 'You have a new notification.' }}
                                                                    @endif
                                                                </h6>
                                                                <small
                                                                    class="text-body fw-500">{{ $notification->created_at->diffForHumans() }}</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                @endif
                                            @empty
                                                <div class="text-center text-muted py-4">No new notifications</div>
                                            @endforelse
                                        </div>
                                        <button type="button" class="btn btn-primary fw-500 w-100"
                                            onclick="markAllNotificationsRead()">View All Notifications</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <audio id="notification-sound" src="{{ asset('frontend/assets/sounds/notification.mp3') }}"
                            preload="auto"></audio>
                        <script>
                            // Play sound when a new notification arrives via Echo
                            if (window.Echo && window.Laravel && window.Laravel.userId) {
                                window.Echo.private('App.Models.User.' + window.Laravel.userId)
                                    .notification((notification) => {
                                        document.getElementById('notification-sound').play();
                                        // Optionally, update notification list dynamically here
                                        // location.reload(); // or use AJAX to update notification list
                                    });
                            }

                            function markAllNotificationsRead() {
                                fetch("{{ route('mark.notifications.read') }}", {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                        'Accept': 'application/json',
                                    },
                                }).then(() => location.reload());
                            }
                        </script>
                    @endauth
                    <li class="nav-item d-none d-lg-none">
                        <a href="app/chat.html" class="dropdown-toggle d-flex align-items-center" id="mail-drop-1"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-symbols-outlined">mail</i>
                            <span class="mobile-text  ms-3">Message</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown user-dropdown">
                        <a href="javascript:void(0);" class="d-flex align-items-center dropdown-toggle"
                            id="drop-down-arrow" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset(auth()->user()->avatar ?? 'frontend/assets/images/user/1.jpg') ?? '' }}"
                                class="img-fluid rounded-circle avatar-48 border border-2 me-3" alt="user"
                                loading="lazy">
                        </a>
                        <div class="sub-drop dropdown-menu caption-menu" aria-labelledby="drop-down-arrow">
                            <div class="card shadow-none m-0">
                                <div class="card-header ">
                                    <div class="header-title">
                                        <h5 class="mb-0 ">{{ auth()->user()->name ?? 'N/A' }}</h5>
                                    </div>
                                </div>
                                <div class="card-body p-0 ">
                                    <div class="d-flex align-items-center iq-sub-card border-0">
                                        <span class="material-symbols-outlined"> line_style </span>
                                        <div class="ms-3">
                                            <a href="{{ route('user.profile') }}" class="mb-0 h6"> My Profile </a>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center iq-sub-card border-0">
                                        <span class="material-symbols-outlined"> edit_note </span>
                                        <div class="ms-3">
                                            <a href="{{ route('user.edit-profile') }}" class="mb-0 h6"> Edit Profile </a>
                                        </div>
                                    </div>
                                    {{--                                <div class="d-flex align-items-center iq-sub-card border-0"> --}}
                                    {{--                                    <span class="material-symbols-outlined"> manage_accounts </span> --}}
                                    {{--                                    <div class="ms-3"> --}}
                                    {{--                                        <a href="app/account-setting.html" class="mb-0 h6"> Account settings </a> --}}
                                    {{--                                    </div> --}}
                                    {{--                                </div> --}}
                                    {{--                                <div class="d-flex align-items-center iq-sub-card border-0"> --}}
                                    {{--                                    <span class="material-symbols-outlined"> lock </span> --}}
                                    {{--                                    <div class="ms-3"> --}}
                                    {{--                                        <a href="app/privacy-setting.html" class="mb-0 h6"> Privacy Settings </a> --}}
                                    {{--                                    </div> --}}
                                    {{--                                </div> --}}
                                    <div class="d-flex align-items-center iq-sub-card">
                                        <span class="material-symbols-outlined"> login </span>
                                        <div class="ms-3">
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <a href="javascript:;"
                                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                                    class="mb-0 h6">{{ __('Sign out') }}</a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center iq-sub-card border-0">
                                        <span class="material-symbols-outlined"> line_style </span>
                                        <div class="ms-3">
                                            <a href="{{ route('user.profile') }}" class="mb-0 h6"> My Profile </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endauth
                @guest()
                    <li class="nav-item dropdown">
                        <a href="{{ route('login') }}" class="dropdown-toggle d-flex align-items-center">
                            <span>Login</span>
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
</div>

@push('styles')
    <style>
        .nav-tabs .nav-link {
            border: none;
            border-bottom: 2px solid transparent;
            background: none;
            color: #6c757d;
            padding: 0.5rem 1rem;
            margin-bottom: -1px;
        }

        .nav-tabs .nav-link.active {
            color: #007bff;
            border-bottom-color: #007bff;
            background: none;
        }

        .nav-tabs .nav-link:hover {
            color: #007bff;
            border-color: transparent;
        }

        .iq-friend-request,
        .iq-friend-item {
            transition: all 0.3s ease;
        }

        .iq-friend-request:hover,
        .iq-friend-item:hover {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 8px;
            margin: -8px;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            min-width: 18px;
            height: 18px;
            border-radius: 9px;
            font-size: 11px;
            line-height: 16px;
            text-align: center;
            padding: 0 4px;
        }

        .badge {
            font-size: 0.65em;
        }

        /* Chat Modal Styles */
        .chat-container {
            display: flex;
            flex-direction: column;
        }

        .chat-messages {
            flex: 1;
            overflow-y: auto;
            padding: 1rem;
            background-color: #f8f9fa;
        }

        .chat-messages::-webkit-scrollbar {
            width: 6px;
        }

        .chat-messages::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .chat-messages::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 3px;
        }

        .chat-messages::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        .max-width-70 {
            max-width: 70%;
        }

        .friend-profile-btn:hover {
            background-color: #007bff !important;
            color: white;
        }

        .friend-chat-btn:hover {
            background-color: #17a2b8 !important;
            color: white;
        }

        .friend-profile-btn,
        .friend-chat-btn {
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .friend-profile-btn:hover span,
        .friend-chat-btn:hover span {
            color: white !important;
        }

        .accept-friend-request-header-btn:hover,
        .accept-friend-request-btn:hover {
            background-color: #28a745 !important;
            color: white !important;
        }

        .decline-friend-request-header-btn:hover,
        .decline-friend-request-btn:hover {
            background-color: #dc3545 !important;
            color: white !important;
        }

        .notification-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            min-width: 18px;
            height: 18px;
            border-radius: 50%;
            font-size: 10px;
            line-height: 18px;
            text-align: center;
            z-index: 10;
        }

        .friend-request-notification {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 8px;
            border-left: 3px solid #007bff;
        }

        .thread:hover {
            background-color: #f8f9fa;
            border-radius: 8px;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            // Friend Request Notification handlers (from notifications dropdown)
            $(document).on('click', '.accept-friend-request-btn', function(e) {
                console.log('Accept friend request button clicked');
                e.preventDefault();
                e.stopPropagation();
                var btn = $(this);
                var requestId = btn.data('request-id');
                var notificationId = btn.data('notification-id');
                var senderId = btn.data('sender-id');
                var senderName = btn.data('sender-name');
                var senderUsername = btn.data('sender-username');
                var senderAvatar = btn.data('sender-avatar');

                console.log('Request ID:', requestId, 'Notification ID:', notificationId);

                btn.prop('disabled', true);

                $.ajax({
                    url: '/friend-request/accept/' + requestId,
                    method: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            // Remove the notification
                            btn.closest('.friend-request-notification').fadeOut(300,
                                function() {
                                    $(this).remove();
                                    updateNotificationBadge();

                                    // Check if no more notifications
                                    var notificationsLeft = $('#notification-list .d-flex')
                                        .length;
                                    if (notificationsLeft === 0) {
                                        $('#notification-list').html(
                                            '<div class="text-center text-muted py-4">No new notifications</div>'
                                        );
                                    }
                                });

                            // Add the new friend to the friends list if we have the required data
                            if (senderId && senderName && senderAvatar && senderUsername) {
                                addFriendToList(senderId, senderName, senderAvatar,
                                    senderUsername);
                            }

                            // Mark notification as read
                            if (notificationId) {
                                markNotificationAsRead(notificationId);
                            }

                            if (window.ToastMagic) {
                                ToastMagic.success('Friend request accepted! ' + senderName +
                                    ' is now your friend.');
                            }
                        } else {
                            alert(response.error || 'Failed to accept friend request.');
                            btn.prop('disabled', false);
                        }
                    },
                    error: function(xhr) {
                        let errorMsg = 'Failed to accept friend request.';
                        if (xhr.responseJSON && xhr.responseJSON.error) {
                            errorMsg = xhr.responseJSON.error;
                        }
                        alert(errorMsg);
                        btn.prop('disabled', false);
                    }
                });
            });

            $(document).on('click', '.decline-friend-request-btn', function(e) {
                e.preventDefault();
                e.stopPropagation();
                var btn = $(this);
                var requestId = btn.data('request-id');
                var notificationId = btn.data('notification-id');

                btn.prop('disabled', true);

                $.ajax({
                    url: '/friend-request/decline/' + requestId,
                    method: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            // Remove the notification
                            btn.closest('.friend-request-notification').fadeOut(300,
                                function() {
                                    $(this).remove();
                                    updateNotificationBadge();

                                    // Check if no more notifications
                                    var notificationsLeft = $('#notification-list .d-flex')
                                        .length;
                                    if (notificationsLeft === 0) {
                                        $('#notification-list').html(
                                            '<div class="text-center text-muted py-4">No new notifications</div>'
                                        );
                                    }
                                });

                            // Mark notification as read
                            if (notificationId) {
                                markNotificationAsRead(notificationId);
                            }

                            if (window.ToastMagic) {
                                ToastMagic.success('Friend request declined.');
                            }
                        } else {
                            alert(response.error || 'Failed to decline friend request.');
                            btn.prop('disabled', false);
                        }
                    },
                    error: function(xhr) {
                        let errorMsg = 'Failed to decline friend request.';
                        if (xhr.responseJSON && xhr.responseJSON.error) {
                            errorMsg = xhr.responseJSON.error;
                        }
                        alert(errorMsg);
                        btn.prop('disabled', false);
                    }
                });
            });

            // Friend Request handlers (from header friend request dropdown)
            $(document).on('click', '.accept-friend-request-header-btn', function(e) {
                e.preventDefault();
                e.stopPropagation();
                var btn = $(this);
                var requestId = btn.data('request-id');
                var senderId = btn.data('sender-id');
                var senderName = btn.data('sender-name');
                var senderUsername = btn.data('sender-username');
                var senderAvatar = btn.data('sender-avatar');

                btn.prop('disabled', true);

                $.ajax({
                    url: '/friend-request/accept/' + requestId,
                    method: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            // Remove the friend request from the header dropdown
                            btn.closest('.iq-friend-request').fadeOut(300, function() {
                                $(this).remove();

                                // Check if there are no more requests
                                var requestsLeft = $(
                                        '#friend-requests-list .iq-friend-request')
                                    .length;
                                if (requestsLeft === 0) {
                                    $('#friend-requests-list').html(
                                        '<div class="text-center text-muted py-4" id="no-requests-message">No new friend requests</div>'
                                    );
                                }

                                // Update request badge count
                                updateRequestBadge();

                                // Add the new friend to the friends list
                                addFriendToList(senderId, senderName, senderAvatar,
                                    senderUsername);
                            });

                            if (window.ToastMagic) {
                                ToastMagic.success('Friend request accepted! ' + senderName +
                                    ' is now your friend.');
                            }
                        } else {
                            alert(response.error || 'Failed to accept friend request.');
                            btn.prop('disabled', false);
                        }
                    },
                    error: function(xhr) {
                        let errorMsg = 'Failed to accept friend request.';
                        if (xhr.responseJSON && xhr.responseJSON.error) {
                            errorMsg = xhr.responseJSON.error;
                        }
                        alert(errorMsg);
                        btn.prop('disabled', false);
                    }
                });
            });

            $(document).on('click', '.decline-friend-request-header-btn', function(e) {
                e.preventDefault();
                e.stopPropagation();
                var btn = $(this);
                var requestId = btn.data('request-id');

                btn.prop('disabled', true);

                $.ajax({
                    url: '/friend-request/decline/' + requestId,
                    method: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            // Remove the friend request from the header dropdown
                            btn.closest('.iq-friend-request').fadeOut(300, function() {
                                $(this).remove();

                                // Check if there are no more requests
                                var requestsLeft = $(
                                        '#friend-requests-list .iq-friend-request')
                                    .length;
                                if (requestsLeft === 0) {
                                    $('#friend-requests-list').html(
                                        '<div class="text-center text-muted py-4" id="no-requests-message">No new friend requests</div>'
                                    );
                                }

                                // Update request badge count
                                updateRequestBadge();
                            });

                            if (window.ToastMagic) {
                                ToastMagic.success('Friend request declined.');
                            }
                        } else {
                            alert(response.error || 'Failed to decline friend request.');
                            btn.prop('disabled', false);
                        }
                    },
                    error: function(xhr) {
                        let errorMsg = 'Failed to decline friend request.';
                        if (xhr.responseJSON && xhr.responseJSON.error) {
                            errorMsg = xhr.responseJSON.error;
                        }
                        alert(errorMsg);
                        btn.prop('disabled', false);
                    }
                });
            });

            // Function to update notification count
            function updateNotificationCount() {
                var count = $('#notification-list .d-flex').length;
                var badge = $('.notification-badge');
                if (count > 0) {
                    badge.text(count).show();
                } else {
                    badge.hide();
                    // Show "No notifications" message if needed
                    if (count === 0) {
                        $('#notification-list').html(
                            '<div class="text-center p-3"><p class="text-muted">No new notifications</p></div>');
                    }
                }
            }

            // Real-time notification handling (if Echo is available)
            if (window.Echo) {
                window.Echo.private('App.Models.User.' + {{ auth()->id() ?? 'null' }})
                    .notification((notification) => {
                        console.log('Received notification:', notification);

                        if (notification.type === 'friend_request') {
                            // Add new friend request notification to the notifications dropdown
                            var newNotification = `
                        <div class="d-flex gap-3 mb-4 friend-request-notification" data-notification-id="${notification.id}">
                            <img class="avatar-32 rounded-pill"
                                src="${notification.avatar || '/frontend/assets/images/user/1.jpg'}"
                                alt="">
                            <div class="flex-grow-1">
                                <h6 class="font-size-14">
                                    <span class="fw-semibold">${notification.user_name}</span>
                                    sent you a friend request.
                                </h6>
                                <small class="text-body fw-500">Just now</small>
                                <div class="d-flex gap-2 mt-2">
                                    <button type="button" 
                                            class="btn btn-primary btn-sm accept-friend-request-btn" 
                                            data-request-id="${notification.request_id}"
                                            data-notification-id="${notification.id}">
                                        Accept
                                    </button>
                                    <button type="button" 
                                            class="btn btn-outline-secondary btn-sm decline-friend-request-btn" 
                                            data-request-id="${notification.request_id}"
                                            data-notification-id="${notification.id}">
                                        Decline
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;

                            $('#notification-list').prepend(newNotification);
                            updateNotificationCount();

                            // Also add to the friend request header dropdown if it exists
                            var friendRequestDropdown = `
                                <div class="iq-friend-request" data-request-id="${notification.request_id}">
                                    <div class="iq-sub-card-big d-flex align-items-center justify-content-between mb-4">
                                        <div class="d-flex align-items-center">
                                            <img class="avatar-40 rounded-pill"
                                                src="${notification.avatar || '/frontend/assets/images/user/1.jpg'}"
                                                alt="" loading="lazy">
                                            <div class="ms-3">
                                                <h6 class="mb-0">${notification.user_name}</h6>
                                                <p class="mb-0">0 friends</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <a href="javascript:void(0);"
                                                class="me-2 rounded bg-primary-subtle border-0 d-inline-block px-1 accept-friend-request-header-btn"
                                                data-request-id="${notification.request_id}"
                                                data-sender-id="${notification.sender_id || ''}"
                                                data-sender-name="${notification.user_name}"
                                                data-sender-username="${notification.username || ''}"
                                                data-sender-avatar="${notification.avatar || '/frontend/assets/images/user/1.jpg'}">
                                                <span class="material-symbols-outlined font-size-18 align-text-bottom">add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="me-3 rounded bg-danger-subtle border-0 d-inline-block px-1 decline-friend-request-header-btn"
                                                data-request-id="${notification.request_id}">
                                                <span class="material-symbols-outlined font-size-18 align-text-bottom">close</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            `;

                            // Check if the "No new friend requests" message exists and replace it
                            var friendRequestsList = $('#friend-requests-list');
                            if (friendRequestsList.find('#no-requests-message').length > 0) {
                                friendRequestsList.html(friendRequestDropdown);
                            } else {
                                friendRequestsList.prepend(friendRequestDropdown);
                            }

                            // Update request badge count
                            updateRequestBadge();

                            // Show toast notification
                            if (window.ToastMagic) {
                                ToastMagic.info(`${notification.user_name} sent you a friend request!`);
                            }

                            // Play notification sound
                            var sound = document.getElementById('notification-sound');
                            if (sound) {
                                sound.play().catch(e => console.log('Could not play notification sound:', e));
                            }
                        }

                        if (notification.type === 'friend_request_accepted') {
                            // Show toast for accepted friend request
                            if (window.ToastMagic) {
                                ToastMagic.success(`${notification.user_name} accepted your friend request!`);
                            }

                            // Play notification sound
                            var sound = document.getElementById('notification-sound');
                            if (sound) {
                                sound.play().catch(e => console.log('Could not play notification sound:', e));
                            }
                        }

                        // Handle new message notifications
                        if (notification.type === 'new_message') {
                            // Add to message dropdown
                            var messageNotification = `
                                <a href="javascript:void(0);" onclick="openChatPopup('${notification.sender_id}', '${notification.sender_name}', '${notification.sender_avatar}', true)">
                                    <div class="thread d-flex align-items-center justify-content-between rounded-0">
                                        <div>
                                            <img class="avatar-40 rounded-pill align-top"
                                                src="${notification.sender_avatar || '/frontend/assets/images/user/1.jpg'}"
                                                alt="" loading="lazy">
                                            <div class="ms-3 d-inline-block">
                                                <h6>${notification.sender_name}</h6>
                                                <small class="fw-500 text-body">${notification.message_preview || 'New message'}</small>
                                            </div>
                                        </div>
                                        <small class="text-body">Just now</small>
                                    </div>
                                </a>
                            `;

                            // Add to message list (assuming there's a message list container)
                            var messageList = $('.item-header-scroll').first(); // Messages container
                            if (messageList.length > 0) {
                                messageList.prepend(messageNotification);
                            }

                            // Show toast notification
                            if (window.ToastMagic) {
                                ToastMagic.info(
                                    `New message from ${notification.sender_name}: ${notification.message_preview || 'New message'}`
                                );
                            }

                            // Play notification sound
                            var sound = document.getElementById('notification-sound');
                            if (sound) {
                                sound.play().catch(e => console.log('Could not play notification sound:', e));
                            }
                        }
                    });
            }

            // Helper function to update friend request badge count
            function updateRequestBadge() {
                var requestCount = $('#friend-requests-list .iq-friend-request').length;
                var badge = $('#requests-tab .badge');
                if (requestCount > 0) {
                    if (badge.length === 0) {
                        $('#requests-tab').append('<span class="badge bg-primary ms-1">' + requestCount +
                            '</span>');
                    } else {
                        badge.text(requestCount);
                    }
                } else {
                    badge.remove();
                }
            }

            // Helper function to update friends badge count
            function updateFriendsBadge() {
                var friendsCount = $('#friends-list .iq-friend-item').length;
                var badge = $('#friends-tab .badge');
                if (friendsCount > 0) {
                    if (badge.length === 0) {
                        $('#friends-tab').append('<span class="badge bg-success ms-1">' + friendsCount + '</span>');
                    } else {
                        badge.text(friendsCount);
                    }
                } else {
                    badge.remove();
                }
            }

            // Helper function to update notification badge count
            function updateNotificationBadge() {
                var notificationCount = $('#notification-list .d-flex').length;
                var badge = $('.notification-badge');
                if (notificationCount > 0) {
                    if (badge.length === 0) {
                        $('.material-symbols-outlined:contains("notifications")').append(
                            '<span class="bg-primary text-white notification-badge">' + notificationCount +
                            '</span>');
                    } else {
                        badge.text(notificationCount).show();
                    }
                } else {
                    badge.hide();
                }
            }

            // Helper function to add a new friend to the friends list
            function addFriendToList(friendId, friendName, friendAvatar, friendUsername) {
                // Check if friends list has "No friends yet" message
                var friendsList = $('#friends-list');
                var noFriendsMsg = friendsList.find('.text-center.text-muted');

                if (noFriendsMsg.length > 0) {
                    noFriendsMsg.remove();
                }

                // Create new friend item
                var newFriend = `
                    <div class="iq-friend-item" data-friend-id="${friendId}">
                        <div class="iq-sub-card-big d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex align-items-center">
                                <img class="avatar-40 rounded-pill"
                                    src="${friendAvatar}"
                                    alt="" loading="lazy">
                                <div class="ms-3">
                                    <h6 class="mb-0">${friendName}</h6>
                                    <p class="mb-0">Friends</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <a href="/profile/${friendUsername}"
                                    class="me-2 rounded bg-primary-subtle border-0 d-inline-block px-1 friend-profile-btn"
                                    title="View Profile"
                                    data-friend-id="${friendId}"
                                    data-friend-name="${friendName}">
                                    <span class="material-symbols-outlined font-size-18 align-text-bottom">person</span>
                                </a>
                                <a href="javascript:void(0);"
                                    class="me-3 rounded bg-info-subtle border-0 d-inline-block px-1 friend-chat-btn"
                                    title="Send Message"
                                    data-friend-id="${friendId}"
                                    data-friend-name="${friendName}"
                                    data-friend-avatar="${friendAvatar}">
                                    <span class="material-symbols-outlined font-size-18 align-text-bottom">chat</span>
                                </a>
                            </div>
                        </div>
                    </div>
                `;

                // Add to the beginning of friends list
                friendsList.prepend(newFriend);

                // Update friends badge count
                updateFriendsBadge();

                // Show animation
                friendsList.find('.iq-friend-item').first().hide().fadeIn(300);
            }

            // Friend request handlers from notifications dropdown
            $(document).on('click', '.accept-friend-request-btn', function(e) {
                e.preventDefault();
                e.stopPropagation();
                var btn = $(this);
                var requestId = btn.data('request-id');
                var notificationId = btn.data('notification-id');

                btn.prop('disabled', true);

                $.ajax({
                    url: '/friend-request/accept/' + requestId,
                    method: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            // Remove the notification
                            btn.closest('.friend-request-notification').fadeOut(300,
                                function() {
                                    $(this).remove();
                                    updateNotificationBadge();
                                });

                            // Mark notification as read
                            if (notificationId) {
                                markNotificationAsRead(notificationId);
                            }

                            if (window.ToastMagic) {
                                ToastMagic.success('Friend request accepted!');
                            }
                        } else {
                            alert(response.error || 'Failed to accept friend request.');
                            btn.prop('disabled', false);
                        }
                    },
                    error: function(xhr) {
                        let errorMsg = 'Failed to accept friend request.';
                        if (xhr.responseJSON && xhr.responseJSON.error) {
                            errorMsg = xhr.responseJSON.error;
                        }
                        alert(errorMsg);
                        btn.prop('disabled', false);
                    }
                });
            });

            // Helper function to mark individual notification as read
            function markNotificationAsRead(notificationId) {
                $.ajax({
                    url: '/notifications/mark-read/' + notificationId,
                    method: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log('Notification marked as read');
                        updateNotificationBadge();
                    },
                    error: function(xhr) {
                        console.log('Failed to mark notification as read');
                    }
                });
            }

            // Friend profile button handler
            $(document).on('click', '.friend-profile-btn', function(e) {
                e.preventDefault();
                e.stopPropagation();
                var friendId = $(this).data('friend-id');
                var friendName = $(this).data('friend-name');

                // Show loading indicator
                if (window.ToastMagic) {
                    ToastMagic.info('Loading ' + friendName + "'s profile...");
                }

                // Navigate to profile page
                window.location.href = $(this).attr('href');
            });

            // Friend chat button handler - Use the new popup chat system
            $(document).on('click', '.friend-chat-btn', function(e) {
                e.preventDefault();
                e.stopPropagation();
                var friendId = $(this).data('friend-id');
                var friendName = $(this).data('friend-name');
                var friendAvatar = $(this).data('friend-avatar');

                // Use the new openChatPopup function if available
                if (typeof openChatPopup === 'function') {
                    openChatPopup(friendId, friendName, friendAvatar, true);

                    if (window.ToastMagic) {
                        ToastMagic.success('Opening chat with ' + friendName);
                    }
                } else {
                    // Fallback to messenger page if popup not available
                    window.location.href = '/messenger?user=' + friendId;
                }
            });
        });
    </script>
@endpush
