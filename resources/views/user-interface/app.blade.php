@extends('user-interface.layout.layout')
@section('title')
    Home
@endsection

@section('content')
    <div class="row gx-4">
        <div class="{{ auth()->check() ? 'col-lg-8' : 'col-lg-12' }}" id="dynamicDivContainer">
            @if(getSetting('show_posts', 'on') == 'on')
                <div id="content">
                    @auth
                        @include('user-interface.pages.post.add-post')
                    @endauth

                    @foreach($feedAdminPosts as $post)
                        @include('user-interface.pages.post.show-post', ['post' => $post])
                    @endforeach

                    @foreach($posts as $post)
                        @include('user-interface.pages.post.show-post', ['post' => $post])
                    @endforeach

                    <div class="d-flex justify-content-center mt-4">
                        {{ $posts->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            @else
                <div class="card p-5 text-center">
                    <h3>Posts are currently hidden.</h3>
                </div>
            @endif
        </div>

        @auth
        <div class="col-lg-4">

            {{-- Friend Requests --}}
            @if($friendRequests->count() > 0)
            <div class="card mb-3" id="friend-requests-card">
                <div class="card-header d-flex align-items-center justify-content-between py-3">
                    <h5 class="card-title mb-0 fw-semibold">
                        Friend Requests
                        <span class="badge bg-primary ms-1 rounded-pill" id="request-count-badge">
                            {{ $friendRequests->count() }}
                        </span>
                    </h5>
                    <a href="{{ route('friend.requests') }}" class="btn btn-sm btn-outline-primary">See All</a>
                </div>
                <div class="card-body pt-2 pb-1">
                    <ul class="list-unstyled m-0" id="friend-requests-list">
                        @foreach($friendRequests as $req)
                        <li class="d-flex align-items-center gap-3 pb-3 mb-2 border-bottom friend-request-item"
                            data-request-id="{{ $req->id }}">
                            <div class="position-relative flex-shrink-0">
                                <img src="{{ $req->sender->avatar ? asset($req->sender->avatar) : asset('frontend/assets/images/user/1.jpg') }}"
                                     alt="{{ $req->sender->name }}"
                                     class="avatar-50 rounded-circle object-cover">
                                @if($req->sender->isOnline())
                                    <span class="position-absolute bottom-0 end-0 bg-success rounded-circle border border-white"
                                          style="width:11px;height:11px;"></span>
                                @endif
                            </div>
                            <div class="flex-grow-1 min-width-0">
                                <a href="{{ route('user.profile.show', $req->sender->username) }}"
                                   class="fw-semibold text-dark text-decoration-none d-block text-truncate">
                                    {{ $req->sender->name }}
                                </a>
                                <small class="text-muted">{{ $req->sender->friends()->count() }} friends</small>
                                <div class="d-flex gap-2 mt-2">
                                    <button class="btn btn-primary btn-sm flex-fill accept-friend-request-btn"
                                            data-request-id="{{ $req->id }}">
                                        <span class="material-symbols-outlined" style="font-size:14px;vertical-align:-3px">check</span>
                                        Accept
                                    </button>
                                    <button class="btn btn-light btn-sm flex-fill decline-friend-request-btn"
                                            data-request-id="{{ $req->id }}">
                                        <span class="material-symbols-outlined" style="font-size:14px;vertical-align:-3px">close</span>
                                        Decline
                                    </button>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            {{-- Friends List --}}
            <div class="card mb-3">
                <div class="card-header d-flex align-items-center justify-content-between py-3">
                    <h5 class="card-title mb-0 fw-semibold">
                        Friends
                        @if($friends->count() > 0)
                            <span class="badge bg-secondary ms-1 rounded-pill">{{ $friends->count() }}</span>
                        @endif
                    </h5>
                    @if($friends->count() > 0)
                        <a href="{{ route('friends.list') }}" class="btn btn-sm btn-outline-primary">View All</a>
                    @endif
                </div>
                <div class="card-body pt-2 pb-1">
                    @if($friends->count() > 0)
                        <ul class="list-unstyled m-0">
                            @foreach($friends as $friend)
                            <li class="d-flex align-items-center gap-3 mb-3">
                                <div class="position-relative flex-shrink-0">
                                    <img src="{{ $friend->avatar ? asset($friend->avatar) : asset('frontend/assets/images/user/1.jpg') }}"
                                         alt="{{ $friend->name }}"
                                         class="avatar-45 rounded-circle object-cover">
                                    @if($friend->isOnline())
                                        <span class="position-absolute bottom-0 end-0 bg-success rounded-circle border border-white"
                                              style="width:10px;height:10px;"></span>
                                    @endif
                                </div>
                                <div class="flex-grow-1 min-width-0">
                                    <a href="{{ route('user.profile.show', $friend->username) }}"
                                       class="fw-semibold text-dark text-decoration-none d-block text-truncate">
                                        {{ $friend->name }}
                                    </a>
                                    <small class="{{ $friend->isOnline() ? 'text-success' : 'text-muted' }}">
                                        {{ $friend->isOnline() ? '● Online' : 'Offline' }}
                                    </small>
                                </div>
                                <a href="{{ route('user.profile.show', $friend->username) }}"
                                   class="btn btn-light btn-sm rounded-circle p-1" title="View Profile">
                                    <span class="material-symbols-outlined" style="font-size:18px;line-height:1.2">person</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="text-center py-4">
                            <span class="material-symbols-outlined text-muted" style="font-size:40px">group</span>
                            <p class="text-muted small mt-1 mb-0">No friends yet. Start connecting!</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Job-Based Posts (Same Designation) --}}
            <div class="card" style="position: sticky; top: 20px;">
                <div class="card-header d-flex justify-content-between py-3">
                    <h5 class="card-title mb-0 fw-semibold">
                        Jobs &mdash; {{ auth()->user()->designation->title ?? 'Same Designation' }}
                    </h5>
                </div>
                <div class="card-body pt-2 pb-1">
                    @if($jobPosts->count() > 0)
                        <ul class="list-unstyled m-0">
                            @foreach($jobPosts as $jobPost)
                            <li class="d-flex align-items-start gap-3 mb-3 border-bottom pb-2">
                                <img src="{{ $jobPost->user->avatar ? asset($jobPost->user->avatar) : asset('frontend/assets/images/user/1.jpg') }}"
                                     alt="{{ $jobPost->user->name }}"
                                     class="avatar-40 rounded-circle object-cover flex-shrink-0">
                                <div class="min-width-0">
                                    <a href="{{ route('user.profile.show', $jobPost->user->username) }}#post-{{ $jobPost->id }}"
                                       class="fw-semibold text-dark text-decoration-none small d-block">
                                        {{ Str::limit(strip_tags($jobPost->content), 50) }}
                                    </a>
                                    <small class="text-muted">by {{ $jobPost->user->name }}</small>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted small mb-2">No recent posts from peers in your designation.</p>
                    @endif
                </div>
            </div>

        </div>
        @endauth
    </div>
@endsection
