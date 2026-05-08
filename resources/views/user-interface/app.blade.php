@extends('user-interface.layout.layout')
@section('title')
    Home
@endsection

@section('sidebar_extra')
    @auth
        <li class="nav-item static-item mt-3">
            <a class="nav-link static-item disabled" href="#" tabindex="-1">
                <span class="default-icon">Network</span>
                <span class="mini-icon">-</span>
            </a>
        </li>
        <li class="nav-item px-3">
            {{-- Friend Requests --}}
            @if($friendRequests->count() > 0)
                <div class="card shadow-none mb-3 bg-transparent border">
                    <div class="card-header d-flex align-items-center justify-content-between p-2 border-bottom">
                        <h6 class="card-title mb-0">Friend Requests</h6>
                        <a href="{{ route('friend.requests') }}" class="small">See All</a>
                    </div>
                    <div class="card-body p-2">
                        <ul class="list-unstyled m-0">
                            @foreach($friendRequests->take(3) as $req)
                                <li class="d-flex align-items-center gap-2 mb-2 pb-2 border-bottom last-child-border-0">
                                    <div class="flex-grow-1 min-width-0">
                                        <a href="{{ route('user.profile.show', $req->sender->username) }}"
                                            class="fw-semibold text-dark text-decoration-none d-block text-truncate small">
                                            {{ $req->sender->name }}
                                        </a>
                                        <div class="d-flex gap-1 mt-1">
                                            <button class="btn btn-primary btn-xs flex-fill accept-friend-request-btn py-0"
                                                data-request-id="{{ $req->id }}" style="font-size: 10px;">Accept</button>
                                            <button class="btn btn-light btn-xs flex-fill decline-friend-request-btn py-0"
                                                data-request-id="{{ $req->id }}" style="font-size: 10px;">No</button>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            {{-- Friends List --}}
            <div class="card shadow-none mb-3 bg-transparent border">
                <div class="card-header d-flex align-items-center justify-content-between p-2 border-bottom">
                    <h6 class="card-title mb-0">Friends</h6>
                    <a href="{{ route('friends.list') }}" class="small">View All</a>
                </div>
                <div class="card-body p-2">
                    @if($friends->count() > 0)
                        <ul class="list-unstyled m-0">
                            @foreach($friends->take(5) as $friend)
                                <li class="d-flex align-items-center gap-2 mb-2">
                                    <span
                                        class="status-dot {{ $friend->isOnline() ? 'bg-success' : 'bg-secondary' }} d-inline-block rounded-circle"
                                        style="width:6px;height:6px;"></span>
                                    <a href="{{ route('user.profile.show', $friend->username) }}"
                                        class="fw-medium text-dark text-decoration-none text-truncate small">
                                        {{ $friend->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted small mb-0">No friends yet.</p>
                    @endif
                </div>
            </div>

            {{-- Jobs / Same Designation --}}
            <div class="card shadow-none mb-3 bg-transparent border">
                <div class="card-header d-flex justify-content-between p-2 border-bottom">
                    <h6 class="card-title mb-0">Jobs &mdash; {{ auth()->user()->designation->title ?? 'Peers' }}</h6>
                </div>
                <div class="card-body p-2">
                    @if($jobPosts->count() > 0)
                        <ul class="list-unstyled m-0">
                            @foreach($jobPosts->take(5) as $jobPost)
                                <li class="mb-2 pb-2 border-bottom last-child-border-0">
                                    <a href="{{ route('posts.show', $jobPost->id) }}"
                                        class="text-dark text-decoration-none small d-block text-truncate">
                                        <i class="ph ph-briefcase text-primary me-1"></i>
                                        {{ Str::limit(strip_tags($jobPost->content), 40) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted small mb-0">No recent posts.</p>
                    @endif
                </div>
            </div>
        </li>
    @endauth
@endsection

@section('content')
    <div class="row gx-4">
        <div class="col-lg-12" id="dynamicDivContainer">
            @if(getSetting('show_posts', 'on') == 'on')
                <div id="content">
                    @auth
                        @include('user-interface.pages.post.add-post')
                    @endauth

                    <div id="posts-container">
                        @foreach($feedAdminPosts as $post)
                            @include('user-interface.pages.post.show-post', ['post' => $post])
                        @endforeach

                        @foreach($posts as $post)
                            @include('user-interface.pages.post.show-post', ['post' => $post])
                        @endforeach
                    </div>

                    <div id="load-more-status" class="text-center mt-4 mb-5" style="display: none;">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2 text-muted">Loading more posts...</p>
                    </div>

                    {{-- Hidden pagination for scroll logic --}}
                    <div class="d-none">
                        {{ $posts->links() }}
                    </div>
                </div>

                @push('scripts')
                    <script>
                        $(document).ready(function () {
                            let nextPageUrl = '{{ $posts->nextPageUrl() }}';
                            let loading = false;

                            $(window).scroll(function () {
                                if ($(window).scrollTop() + $(window).height() >= $(document).height() - 800) {
                                    if (nextPageUrl && !loading) {
                                        loadMorePosts();
                                    }
                                }
                            });

                            function loadMorePosts() {
                                loading = true;
                                $('#load-more-status').show();

                                $.ajax({
                                    url: nextPageUrl,
                                    type: 'get',
                                })
                                    .done(function (data) {
                                        if (data.html) {
                                            $('#posts-container').append(data.html);
                                            nextPageUrl = data.nextPageUrl;
                                            loading = false;
                                            $('#load-more-status').hide();

                                            // Refresh FsLightbox for new images/videos
                                            if (typeof refreshFsLightbox === 'function') {
                                                refreshFsLightbox();
                                            }
                                        } else {
                                            $('#load-more-status').html('<p class="text-muted">No more posts to show.</p>').show();
                                        }
                                    })
                                    .fail(function (jqXHR, ajaxOptions, thrownError) {
                                        console.error('Error loading more posts:', thrownError);
                                        loading = false;
                                        $('#load-more-status').hide();
                                    });
                            }
                        });
                    </script>
                @endpush
            @else
                <div class="card p-5 text-center">
                    <h3>Posts are currently hidden.</h3>
                </div>
            @endif
        </div>
    </div>
@endsection