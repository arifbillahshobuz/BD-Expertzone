<style>
    /* Facebook-style Media Grid System */
    .fb-media-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 2px;
        width: 100%;
        border-radius: 10px;
        overflow: hidden;
        background-color: #e4e6eb;
    }

    [data-bs-theme="dark"] .fb-media-grid {
        background-color: #3e4042;
    }

    .fb-media-grid-item {
        position: relative;
        overflow: hidden;
        background-color: #f0f2f5;
    }

    [data-bs-theme="dark"] .fb-media-grid-item {
        background-color: #242526;
    }

    .fb-media-grid-item img,
    .fb-media-grid-item video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: filter 0.2s ease, transform 0.2s ease;
    }

    .fb-media-grid-item:hover img,
    .fb-media-grid-item:hover video {
        filter: brightness(0.92);
    }

    /* 1 Item Layout - Dynamic Blurred Ambient Backdrop matching image color */
    .fb-media-grid.grid-1 {
        width: 100%;
        border-radius: 10px;
        overflow: hidden;
        background-color: transparent;
    }

    .fb-media-grid.grid-1 .fb-media-grid-item {
        width: 100%;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background-color: transparent;
    }

    .fb-media-bg-blur {
        position: absolute;
        top: -20%;
        left: -20%;
        width: 140%;
        height: 140%;
        object-fit: cover;
        filter: blur(50px) brightness(0.75) saturate(1.3);
        pointer-events: none;
        z-index: 1;
        transform: scale(1.2);
        user-select: none;
    }

    .fb-media-main-link {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        text-decoration: none;
    }

    .fb-media-grid.grid-1 .fb-media-main-img {
        width: 100%;
        max-width: 100%;
        height: auto;
        max-height: 600px;
        object-fit: contain;
        display: block;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.35);
        border-radius: 8px;
        transition: transform 0.2s ease, filter 0.2s ease;
    }

    .fb-media-grid.grid-1 .fb-media-main-link:hover .fb-media-main-img {
        filter: brightness(0.96);
        transform: scale(1.005);
    }

    /* 2 Items Layout */
    .fb-media-grid.grid-2 .fb-media-grid-item {
        width: calc(50% - 1px);
        height: 340px;
    }

    /* 3 Items Layout (Left 1 big, Right 2 stacked) */
    .fb-media-grid.grid-3 {
        height: 360px;
    }

    .fb-media-grid.grid-3 .fb-media-col-left {
        width: calc(50% - 1px);
        height: 100%;
    }

    .fb-media-grid.grid-3 .fb-media-col-left .fb-media-grid-item {
        width: 100%;
        height: 100%;
    }

    .fb-media-grid.grid-3 .fb-media-col-right {
        width: calc(50% - 1px);
        height: 100%;
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .fb-media-grid.grid-3 .fb-media-col-right .fb-media-grid-item {
        width: 100%;
        height: calc(50% - 1px);
    }

    /* 4 Items Layout (2x2 grid) */
    .fb-media-grid.grid-4 .fb-media-grid-item {
        width: calc(50% - 1px);
        height: 200px;
    }

    /* 5+ Items Layout (Top 2, Bottom 3) */
    .fb-media-grid.grid-5-plus {
        height: 380px;
    }

    .fb-media-grid.grid-5-plus .fb-media-row-top {
        display: flex;
        width: 100%;
        height: calc(58% - 1px);
        gap: 2px;
    }

    .fb-media-grid.grid-5-plus .fb-media-row-top .fb-media-grid-item {
        width: calc(50% - 1px);
        height: 100%;
    }

    .fb-media-grid.grid-5-plus .fb-media-row-bottom {
        display: flex;
        width: 100%;
        height: calc(42% - 1px);
        gap: 2px;
    }

    .fb-media-grid.grid-5-plus .fb-media-row-bottom .fb-media-grid-item {
        width: calc(33.333% - 1.33px);
        height: 100%;
    }

    /* Overlay Badge (+N) */
    .fb-media-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        font-size: 2.2rem;
        font-weight: 700;
        transition: background-color 0.2s ease;
        z-index: 2;
        user-select: none;
    }

    .fb-media-grid-item:hover .fb-media-overlay {
        background-color: rgba(0, 0, 0, 0.72);
    }

    /* Mobile adjustments */
    @media (max-width: 576px) {
        .fb-media-grid.grid-1 .fb-media-grid-item {
            height: 360px;
            max-height: 420px;
        }

        .fb-media-grid.grid-2 .fb-media-grid-item {
            height: 240px;
        }

        .fb-media-grid.grid-3 {
            height: 260px;
        }

        .fb-media-grid.grid-4 .fb-media-grid-item {
            height: 150px;
        }

        .fb-media-grid.grid-5-plus {
            height: 280px;
        }

        .fb-media-overlay {
            font-size: 1.6rem;
        }
    }

    /* FsLightbox specific styles for full size video/image in lightbox */
    .fslightbox-source.fslightbox-video,
    .fslightbox-source.fslightbox-image {
        object-fit: contain !important;
        width: auto !important;
        height: auto !important;
        max-width: 100% !important;
        max-height: 100% !important;
    }


    .stylish-toggle-btn {
        background: linear-gradient(90deg, #f8fafc 0%, #e9ecef 100%);
        border: 1px solid #e0e0e0;
        color: #222;
        transition: background 0.2s, box-shadow 0.2s, color 0.2s;
        font-size: 1rem;
        box-shadow: 0 2px 8px 0 rgba(60, 72, 88, 0.06);
        letter-spacing: 0.01em;
    }

    .stylish-toggle-btn:hover,
    .stylish-toggle-btn:focus {
        background: linear-gradient(90deg, #e3e9f7 0%, #f1f3f6 100%);
        color: #1976d2;
        border-color: #b6c2d2;
        box-shadow: 0 4px 16px 0 rgba(25, 118, 210, 0.10);
        outline: none;
    }

    .fb-comment-bubble {
        background-color: #f0f2f5;
        border-radius: 18px;
        padding: 8px 12px;
        display: inline-block;
        max-width: 100%;
        position: relative;
    }

    /* Dark mode support if container has dark class or by default if user wants */
    [data-bs-theme="dark"] .fb-comment-bubble {
        background-color: #3a3b3c;
        color: #e4e6eb;
    }

    [data-bs-theme="dark"] .fb-comment-name {
        color: #e4e6eb;
    }

    [data-bs-theme="dark"] .fb-comment-text {
        color: #e4e6eb;
    }

    .fb-comment-name {
        font-weight: 600;
        font-size: 0.8125rem;
        color: #050505;
        line-height: 1.2;
    }

    .fb-comment-text {
        font-size: 0.9375rem;
        color: #050505;
        line-height: 1.3;
        word-break: break-all;
    }

    .fb-comment-actions {
        font-size: 0.75rem;
        margin-left: 12px;
        margin-top: 2px;
    }

    .fb-comment-actions a {
        font-weight: 700;
        color: #65676b;
        text-decoration: none;
        margin-right: 12px;
    }

    .fb-comment-actions a:hover {
        text-decoration: underline;
    }

    .fb-comment-time {
        color: #65676b;
        font-weight: 400;
    }

    .comment-item {
        position: relative;
        list-style: none;
        margin-bottom: 4px;
    }

    .reply-list {
        margin-top: 4px;
        position: relative;
        padding-left: 0;
    }

    .comment-item.is-reply {
        padding-left: 42px;
        /* Step 2: Level 1 indentation */
        position: relative;
    }

    /* Step 3: Level 2 indentation (Nested under Level 1) */
    .comment-item.is-reply .comment-item.is-reply {
        padding-left: 42px;
        margin-left: 0;
        /* Allow the second shift */
    }

    /* Stop Sliding: Level 3 and deeper stay at the same vertical level as Level 2 */
    .comment-item.is-reply .comment-item.is-reply .comment-item.is-reply {
        padding-left: 0;
        margin-left: -40px;
        /* Pull back the recursive flex shift to align with Step 3 */
    }

    /* Adjust connecting lines for 3-step logic */
    .comment-item>.d-flex>.flex-grow-1>.reply-list::before {
        content: "";
        position: absolute;
        left: -24px;
        top: -10px;
        bottom: 20px;
        width: 2px;
        background-color: #ced0d4;
    }

    /* Horizontal curved line to each reply avatar */
    .reply-list .comment-item::before {
        content: "";
        position: absolute;
        left: 18px;
        top: 16px;
        width: 20px;
        height: 20px;
        border-left: 2px solid #ced0d4;
        border-bottom: 2px solid #ced0d4;
        border-bottom-left-radius: 12px;
    }

    /* For Level 3+ sub-replies, hide the curve or adjust it to be cleaner */
    .comment-item.is-reply .comment-item.is-reply .comment-item.is-reply::before {
        left: 18px;
        display: block;
    }



    .avatar-40 {
        width: 40px;
        height: 40px;
        min-width: 40px;
    }

    .avatar-32 {
        width: 32px;
        height: 32px;
        min-width: 32px;
    }

    .avatar-24 {
        width: 24px;
        height: 24px;
        min-width: 24px;
    }

    .object-cover {
        object-fit: cover;
    }

    .add-comment-input {
        background-color: #f0f2f5;
        border: none;
        border-radius: 20px;
        padding: 6px 14px;
        font-size: 0.9375rem;
    }

    [data-bs-theme="dark"] .add-comment-input {
        background-color: #3a3b3c;
        color: #e4e6eb;
    }

    .add-comment-input:focus {
        background-color: #f0f2f5;
        box-shadow: none;
    }

    /* Author badge & Bubble Highlight */
    .fb-comment-bubble.is-author {
        background-color: #e7f3ff;
    }

    [data-bs-theme="dark"] .fb-comment-bubble.is-author {
        background-color: #203247;
    }

    .author-badge {
        background-color: #e4e6eb;
        color: #65676b;
        font-size: 0.75rem;
        padding: 1px 6px;
        border-radius: 10px;
        font-weight: 600;
        margin-left: 4px;
        display: inline-flex;
        align-items: center;
    }

    [data-bs-theme="dark"] .author-badge {
        background-color: #4e4f50;
        color: #e4e6eb;
    }

    .fb-comment-reaction-summary {
        position: absolute;
        bottom: -10px;
        right: -5px;
        background: white;
        padding: 2px 4px;
        border-radius: 10px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
        display: flex;
        align-items: center;
        gap: 2px;
        font-size: 0.75rem;
        color: #65676b;
        z-index: 2;
    }

    [data-bs-theme="dark"] .fb-comment-reaction-summary {
        background: #3e4042;
        color: #b0b3b8;
        border: 1px solid #444;
    }

    /* Force SweetAlert2 to respect vertical layout and Facebook styling */
    .fb-swal-popup {
        display: flex !important;
        flex-direction: column !important;
        align-items: stretch !important;
        padding: 1.5rem !important;
        border-radius: 12px !important;
    }

    .fb-swal-title {
        text-align: left !important;
        font-family: inherit !important;
        font-weight: 700 !important;
        font-size: 1.25rem !important;
        margin: 0 0 10px 0 !important;
        padding: 0 !important;
        border: none !important;
    }

    .fb-swal-content {
        text-align: left !important;
        font-size: 0.9375rem !important;
        color: #65676b !important;
        margin-bottom: 20px !important;
    }

    .fb-swal-actions {
        display: flex !important;
        justify-content: flex-end !important;
        gap: 8px !important;
        margin-top: 10px !important;
        width: 100% !important;
    }

    .fb-swal-confirm {
        background-color: #e41e3f !important;
        color: white !important;
        border-radius: 8px !important;
        padding: 8px 24px !important;
        font-weight: 600 !important;
        border: none !important;
        order: 2;
    }

    .fb-swal-cancel {
        background-color: #f0f2f5 !important;
        color: #050505 !important;
        border-radius: 8px !important;
        padding: 8px 24px !important;
        font-weight: 600 !important;
        border: none !important;
        order: 1;
    }

    .fb-edit-swal-input {
        border-radius: 12px !important;
        padding: 12px 16px !important;
        font-size: 0.9375rem !important;
        /* border: 1px solid #dddfe2 !important; */
        width: 90% !important;
        margin-top: 5px !important;
        box-shadow: none !important;
    }

    .fb-edit-swal-input:focus {
        border-color: #1877f2 !important;
        box-shadow: 0 0 0 2px #e7f3ff !important;
        outline: none !important;
    }

    [data-bs-theme="dark"] .fb-edit-swal-input {
        background-color: #3e4042 !important;
        color: #e4e6eb !important;
        border-color: #4e4f50 !important;
    }

    [data-bs-theme="dark"] .fb-edit-swal-input:focus {
        border-color: #2d88ff !important;
        box-shadow: 0 0 0 2px rgba(45, 136, 255, 0.2) !important;
    }

    .fb-swal-title {
        padding-top: 24px !important;
        padding-left: 24px !important;
        padding-right: 24px !important;
        text-align: left !important;
        font-size: 20px !important;
        font-weight: 700 !important;
        color: #050505 !important;
    }

    [data-bs-theme="dark"] .fb-swal-title {
        color: #e4e6eb !important;
    }

    .fb-edit-swal-container {
        padding: 0 24px !important;
        text-align: left !important;
    }

    .fb-comment-edit-textarea {
        resize: none !important;
        min-height: 100px !important;
    }
</style>

<div class="row social-post-container">
    <div class="col-sm-12 social-post">
        <div class="col-sm-12 social-post">
            <div class="card card-block card-stretch card-height">
                <div class="card-body">
                    <div class="user-post-data">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="me-3 flex-shrik-0">
                                {{-- Use asset('storage/') for user avatar, with a default fallback --}}
                                @if($post->user)
                                <a
                                    href="{{ route('user.profile.show', $post->user->username ?? $post->user->id ?? 'unknown') }}">
                                    <img src="{{ asset($post->user->avatar ?? 'frontend/assets/images/user/1.jpg') }}"
                                        alt="userimg" class="avatar-48 rounded-circle img-fluid" loading="lazy">
                                </a>
                                @else
                                <img src="{{ asset('frontend/assets/images/user/1.jpg') }}" alt="userimg"
                                    class="avatar-48 rounded-circle img-fluid" loading="lazy">
                                @endif
                            </div>

                            <div class="w-100">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        {{-- Check if user relationship exists before accessing name --}}
                                        <h6 class="mb-0 d-inline-block">
                                            @if($post->user)
                                            <a href="{{ route('user.profile.show', $post->user->username ?? $post->user->id ?? 'unknown') }}"
                                                class="text-body">{{ $post->user->name }}</a>
                                            @else
                                            Unknown User
                                            @endif
                                        </h6>
                                        <span class="d-inline-block text-primary">
                                            <svg class="align-text-bottom" width="17" height="17" viewBox="0 0 17 17"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.8457 0H4.34822C1.73547 0 0.0974121 1.84995 0.0974121 4.46789V11.5321C0.0974121 14.1501 1.72768 16 4.34822 16H11.8449C14.4663 16 16.0974 14.1501 16.0974 11.5321V4.46789C16.0974 1.84995 14.4663 0 11.8457 0Z"
                                                    fill="currentColor" />
                                                <path d="M5.09741 7.99978L7.09797 9.9995L11.0974 6.00006" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                        <span class="mb-0 d-inline-block text-capitalize fw-medium"></span>
                                        <p class="mb-0">
                                            <a href="{{ route('posts.show', $post->id) }}" class="text-muted small">
                                                {{ optional($post->created_at)->diffForHumans() ?? 'Just now' }}
                                            </a>
                                        </p>
                                    </div>
                                    <div class="card-post-toolbar">
                                        <div class="dropdown">
                                            <span class="dropdown-toggle material-symbols-outlined"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                role="button">
                                                more_horiz
                                            </span>
                                            <div class="dropdown-menu m-0 p-0">
                                                <a class="dropdown-item p-3"
                                                    href="{{ route('posts.show', $post->id) }}">
                                                    <div class="d-flex align-items-top">
                                                        <span class="material-symbols-outlined">visibility</span>
                                                        <div class="data ms-2">
                                                            <h6>View Post</h6>
                                                            <p class="mb-0">Open this post in a separate page</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item p-3" href="#">
                                                    <div class="d-flex align-items-top">
                                                        <span class="material-symbols-outlined">save</span>
                                                        <div class="data ms-2">
                                                            <h6>Save Post</h6>
                                                            <p class="mb-0">Add this to your saved items</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item p-3" href="#">
                                                    <div class="d-flex align-items-top">
                                                        <span class="material-symbols-outlined">cancel</span>
                                                        <div class="data ms-2">
                                                            <h6>Hide Post</h6>
                                                            <p class="mb-0">See fewer posts like this.</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                @php
                                                $authorId = $post->user_id ?? ($post->user->id ?? null);
                                                $isFollowing =
                                                auth()->check() &&
                                                auth()->user()->following->contains($authorId);
                                                $isFriend =
                                                auth()->check() && auth()->user()->friends->contains($authorId);
                                                $pendingRequest =
                                                auth()->check() &&
                                                auth()
                                                ->user()
                                                ->friendRequestsSent()
                                                ->where('receiver_id', $authorId)
                                                ->where('status', 'pending')
                                                ->exists();
                                                @endphp

                                                @if (auth()->check() && auth()->id() !== $authorId)
                                                <a class="dropdown-item p-3 follow-toggle-btn" href="#"
                                                    data-user-id="{{ $authorId }}"
                                                    data-following="{{ $isFollowing ? '1' : '0' }}">
                                                    <div class="d-flex align-items-top">
                                                        <span class="material-symbols-outlined">
                                                            {{ $isFollowing ? 'person_remove' : 'person_add' }}
                                                        </span>
                                                        <div class="data ms-2">
                                                            <h6>{{ $isFollowing ? 'Unfollow User' : 'Follow User' }}
                                                            </h6>
                                                            <p class="mb-0">
                                                                {{ $isFollowing ? 'Stop seeing posts but stay friends.' : 'See posts from this user.' }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item p-3 notification-toggle-btn" href="#"
                                                    data-user-id="{{ $authorId }}">
                                                    <div class="d-flex align-items-top">
                                                        <span class="material-symbols-outlined">notifications</span>
                                                        <div class="data ms-2">
                                                            <h6>Notifications</h6>
                                                            <p class="mb-0">Turn on notifications for this user's
                                                                new posts</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                @if (!$isFriend && !$pendingRequest)
                                                <a class="dropdown-item p-3 send-friend-request-btn" href="#"
                                                    data-user-id="{{ $authorId }}">
                                                    <div class="d-flex align-items-top">
                                                        <span class="material-symbols-outlined">person_add</span>
                                                        <div class="data ms-2">
                                                            <h6>Send Friend Request</h6>
                                                            <p class="mb-0">Connect with this user as a
                                                                friend.</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                @elseif ($pendingRequest)
                                                <a class="dropdown-item p-3 text-muted" href="#">
                                                    <div class="d-flex align-items-top">
                                                        <span class="material-symbols-outlined">hourglass_top</span>
                                                        <div class="data ms-2">
                                                            <h6>Friend Request Sent</h6>
                                                            <p class="mb-0">Waiting for user to accept.</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                @endif
                                                @endif
                                                @if (auth()->id() === ($post->user_id ?? ($post->user->id ?? null)))
                                                <a class="dropdown-item p-3 text-primary" href="#"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#edit-post-modal-{{ $post->id ?? '' }}">
                                                    <div class="d-flex align-items-top">
                                                        <span class="material-symbols-outlined">edit</span>
                                                        <div class="data ms-2">
                                                            <h6>Edit Post</h6>
                                                            <p class="mb-0">Edit this post</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <form action="{{ route('user.post.destroy', $post) }}" method="POST"
                                                    class="delete-post-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="dropdown-item p-3 text-danger border-0 bg-transparent text-start w-100">
                                                        <div class="d-flex align-items-top">
                                                            <span class="material-symbols-outlined">delete</span>
                                                            <div class="data ms-2">
                                                                <h6>Delete Post</h6>
                                                                <p class="mb-0 text-muted">Remove this post permanently
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </button>
                                                </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="post-content">
                            {!! $post->content ?? '' !!}
                        </div>
                    </div>

                    @php
                    // Assuming $post->media is a JSON string of paths or an array of paths
                    if (is_array($post->media)) {
                    $mediaFiles = array_values($post->media);
                    } else {
                    $mediaFiles = array_values(json_decode($post->media, true) ?: []);
                    }
                    $count = count($mediaFiles);
                    @endphp

                    @if ($count > 0)
                    <div class="user-post mt-3">
                        @if ($count == 1)
                        {{-- 1 Photo / Video --}}
                        @php
                        $ext = pathinfo($mediaFiles[0], PATHINFO_EXTENSION);
                        $isVideo = in_array(strtolower($ext), ['mp4', 'mov', 'ogg', 'webm', 'qt']);
                        @endphp
                        <div class="fb-media-grid grid-1">
                            <div class="fb-media-grid-item">
                                @if (!$isVideo)
                                {{-- Blurred background matching image color --}}
                                <img src="{{ asset($mediaFiles[0]) }}" alt="" class="fb-media-bg-blur" aria-hidden="true" loading="lazy">
                                @endif
                                <a data-fslightbox="gallery-{{ $post->id }}" href="{{ asset($mediaFiles[0]) }}" data-type="{{ $isVideo ? 'video' : 'image' }}" class="fb-media-main-link">
                                    @if ($isVideo)
                                    <video controls muted class="d-block fb-media-main-img" loading="lazy">
                                        <source src="{{ asset($mediaFiles[0]) }}" type="video/{{ strtolower($ext) === 'mov' || strtolower($ext) === 'qt' ? 'mp4' : strtolower($ext) }}">
                                        Your browser does not support the video tag.
                                    </video>
                                    @else
                                    <img src="{{ asset($mediaFiles[0]) }}" alt="post-image" class="d-block fb-media-main-img" loading="lazy">
                                    @endif
                                </a>
                            </div>
                        </div>

                        @elseif ($count == 2)
                        {{-- 2 Photos / Videos Side by Side --}}
                        <div class="fb-media-grid grid-2">
                            @foreach (array_slice($mediaFiles, 0, 2) as $index => $file)
                            @php
                            $ext = pathinfo($file, PATHINFO_EXTENSION);
                            $isVideo = in_array(strtolower($ext), ['mp4', 'mov', 'ogg', 'webm', 'qt']);
                            @endphp
                            <div class="fb-media-grid-item">
                                <a data-fslightbox="gallery-{{ $post->id }}" href="{{ asset($file) }}" data-type="{{ $isVideo ? 'video' : 'image' }}">
                                    @if ($isVideo)
                                    <video controls muted class="d-block w-100 h-100" loading="lazy">
                                        <source src="{{ asset($file) }}" type="video/{{ strtolower($ext) === 'mov' || strtolower($ext) === 'qt' ? 'mp4' : strtolower($ext) }}">
                                    </video>
                                    @else
                                    <img src="{{ asset($file) }}" alt="post-image" class="d-block w-100 h-100" loading="lazy">
                                    @endif
                                </a>
                            </div>
                            @endforeach
                        </div>

                        @elseif ($count == 3)
                        {{-- 3 Photos / Videos: Left 1 big, Right 2 stacked --}}
                        <div class="fb-media-grid grid-3">
                            @php
                            $ext0 = pathinfo($mediaFiles[0], PATHINFO_EXTENSION);
                            $isVideo0 = in_array(strtolower($ext0), ['mp4', 'mov', 'ogg', 'webm', 'qt']);
                            @endphp
                            <div class="fb-media-col-left">
                                <div class="fb-media-grid-item">
                                    <a data-fslightbox="gallery-{{ $post->id }}" href="{{ asset($mediaFiles[0]) }}" data-type="{{ $isVideo0 ? 'video' : 'image' }}">
                                        @if ($isVideo0)
                                        <video controls muted class="d-block w-100 h-100" loading="lazy">
                                            <source src="{{ asset($mediaFiles[0]) }}" type="video/{{ strtolower($ext0) === 'mov' || strtolower($ext0) === 'qt' ? 'mp4' : strtolower($ext0) }}">
                                        </video>
                                        @else
                                        <img src="{{ asset($mediaFiles[0]) }}" alt="post-image" class="d-block w-100 h-100" loading="lazy">
                                        @endif
                                    </a>
                                </div>
                            </div>
                            <div class="fb-media-col-right">
                                @foreach (array_slice($mediaFiles, 1, 2) as $index => $file)
                                @php
                                $ext = pathinfo($file, PATHINFO_EXTENSION);
                                $isVideo = in_array(strtolower($ext), ['mp4', 'mov', 'ogg', 'webm', 'qt']);
                                @endphp
                                <div class="fb-media-grid-item">
                                    <a data-fslightbox="gallery-{{ $post->id }}" href="{{ asset($file) }}" data-type="{{ $isVideo ? 'video' : 'image' }}">
                                        @if ($isVideo)
                                        <video controls muted class="d-block w-100 h-100" loading="lazy">
                                            <source src="{{ asset($file) }}" type="video/{{ strtolower($ext) === 'mov' || strtolower($ext) === 'qt' ? 'mp4' : strtolower($ext) }}">
                                        </video>
                                        @else
                                        <img src="{{ asset($file) }}" alt="post-image" class="d-block w-100 h-100" loading="lazy">
                                        @endif
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        @elseif ($count == 4)
                        {{-- 4 Photos / Videos: 2x2 Grid --}}
                        <div class="fb-media-grid grid-4">
                            @foreach (array_slice($mediaFiles, 0, 4) as $index => $file)
                            @php
                            $ext = pathinfo($file, PATHINFO_EXTENSION);
                            $isVideo = in_array(strtolower($ext), ['mp4', 'mov', 'ogg', 'webm', 'qt']);
                            @endphp
                            <div class="fb-media-grid-item">
                                <a data-fslightbox="gallery-{{ $post->id }}" href="{{ asset($file) }}" data-type="{{ $isVideo ? 'video' : 'image' }}">
                                    @if ($isVideo)
                                    <video controls muted class="d-block w-100 h-100" loading="lazy">
                                        <source src="{{ asset($file) }}" type="video/{{ strtolower($ext) === 'mov' || strtolower($ext) === 'qt' ? 'mp4' : strtolower($ext) }}">
                                    </video>
                                    @else
                                    <img src="{{ asset($file) }}" alt="post-image" class="d-block w-100 h-100" loading="lazy">
                                    @endif
                                </a>
                            </div>
                            @endforeach
                        </div>

                        @else
                        {{-- 5+ Photos / Videos: Top 2 items, Bottom 3 items (5th item has +N overlay) --}}
                        <div class="fb-media-grid grid-5-plus">
                            <div class="fb-media-row-top">
                                @foreach (array_slice($mediaFiles, 0, 2) as $index => $file)
                                @php
                                $ext = pathinfo($file, PATHINFO_EXTENSION);
                                $isVideo = in_array(strtolower($ext), ['mp4', 'mov', 'ogg', 'webm', 'qt']);
                                @endphp
                                <div class="fb-media-grid-item">
                                    <a data-fslightbox="gallery-{{ $post->id }}" href="{{ asset($file) }}" data-type="{{ $isVideo ? 'video' : 'image' }}">
                                        @if ($isVideo)
                                        <video controls muted class="d-block w-100 h-100" loading="lazy">
                                            <source src="{{ asset($file) }}" type="video/{{ strtolower($ext) === 'mov' || strtolower($ext) === 'qt' ? 'mp4' : strtolower($ext) }}">
                                        </video>
                                        @else
                                        <img src="{{ asset($file) }}" alt="post-image" class="d-block w-100 h-100" loading="lazy">
                                        @endif
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            <div class="fb-media-row-bottom">
                                @foreach (array_slice($mediaFiles, 2, 3) as $index => $file)
                                @php
                                $realIndex = $index + 2; // 2, 3, 4
                                $ext = pathinfo($file, PATHINFO_EXTENSION);
                                $isVideo = in_array(strtolower($ext), ['mp4', 'mov', 'ogg', 'webm', 'qt']);
                                $isLastVisible = ($realIndex === 4);
                                $remainingCount = $count - 5;
                                @endphp
                                <div class="fb-media-grid-item position-relative">
                                    <a data-fslightbox="gallery-{{ $post->id }}" href="{{ asset($file) }}" data-type="{{ $isVideo ? 'video' : 'image' }}">
                                        @if ($isVideo)
                                        <video controls muted class="d-block w-100 h-100" loading="lazy">
                                            <source src="{{ asset($file) }}" type="video/{{ strtolower($ext) === 'mov' || strtolower($ext) === 'qt' ? 'mp4' : strtolower($ext) }}">
                                        </video>
                                        @else
                                        <img src="{{ asset($file) }}" alt="post-image" class="d-block w-100 h-100" loading="lazy">
                                        @endif

                                        @if ($isLastVisible && $remainingCount > 0)
                                        <div class="fb-media-overlay">
                                            +{{ $remainingCount }}
                                        </div>
                                        @endif
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Hidden links for extra files (from index 5 onwards) for FsLightbox gallery --}}
                        @for ($i = 5; $i < $count; $i++)
                            @php
                            $extHidden=pathinfo($mediaFiles[$i], PATHINFO_EXTENSION);
                            $isHiddenVideo=in_array(strtolower($extHidden), ['mp4', 'mov' , 'ogg' , 'webm' , 'qt' ]);
                            @endphp
                            <a data-fslightbox="gallery-{{ $post->id }}" href="{{ asset($mediaFiles[$i]) }}" class="d-none" data-type="{{ $isHiddenVideo ? 'video' : 'image' }}"></a>
                            @endfor
                            @endif
                    </div>
                    @endif

                    <div class="post-meta-likes mt-4">
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <ul class="list-inline m-0 p-0 post-user-liked-list">
                                @foreach ($post->reactions->take(4) as $reaction)
                                <li>
                                    {{-- Use asset('storage/') for reaction user avatar, with default fallback --}}
                                    <img src="{{ asset('/' . ($reaction->user->avatar ?? 'frontend/assets/images/user/1.jpg')) }}"
                                        class="rounded-circle img-fluid userimg" loading="lazy">
                                </li>
                                @endforeach
                            </ul>
                            <div class="d-inline-flex align-items-center gap-1">
                                @if ($post->reactions_count > 0)
                                {{-- Check if first reaction user exists before accessing name --}}
                                <h6 class="m-0 font-size-14">
                                    {{ $post->reactions->first()->user->name ?? 'Someone' }}
                                </h6>
                                @if ($post->reactions_count > 1)
                                <span class="text-capitalize font-size-14 fw-medium" data-bs-toggle="modal"
                                    data-bs-target="#likemodal{{ $post->id }}">
                                    and {{ $post->reactions_count - 1 }} others liked this
                                </span>
                                @endif
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="comment-area mt-4 pt-4 border-top">
                        <div class="d-flex justify-content-between align-items-center flex-wrap" style="margin: 0 1rem;">
                            <div class="like-block position-relative d-flex align-items-center flex-shrink-0">
                                <x-reaction-button :reactable="$post" />
                            </div>
                            <div class="d-flex align-items-center gap-3 flex-shrink-0">
                                <div class="total-comment-block" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#commentcollapes{{ $post->id }}" aria-expanded="true"
                                    aria-controls="commentcollapes{{ $post->id }}">
                                    <span class="material-symbols-outlined align-text-top font-size-20">comment</span>
                                    <span class="fw-medium comment-count-{{ $post->id }}">{{ $post->comments_count }}
                                        Comment</span>
                                </div>
                                <div class="share-block d-flex align-items-center feather-icon">
                                    <a href="javascript:void(0);" data-bs-toggle="modal"
                                        data-bs-target="#share-btn-{{ $post->id }}"
                                        aria-controls="share-btn-{{ $post->id }}" class="d-flex align-items-center">
                                        <span class="material-symbols-outlined align-text-top font-size-20">share</span>
                                        <span class="ms-1 fw-medium"> Share</span>
                                        {{-- Use relationship count --}}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-4 border-top collapse show" id="commentcollapes{{ $post->id }}"
                            data-post-author-id="{{ $post->user_id }}" x-data="commentComponent({{ $post->id }})"
                            x-init="init()">


                            <ul class="list-inline m-0 p-0 comment-list" id="comment-list-{{ $post->id }}"
                                x-ref="commentList">
                                @foreach ($post->comments->where('parent_id', null) as $comment)
                                {!! view('user-interface.pages.post.partials.single_comment', compact('comment'))->render() !!}
                                @endforeach
                            </ul>
                            <div class="d-flex flex-column align-items-center justify-content-center gap-1 mt-2">
                                <button type="button"
                                    class="show-more-comments-btn d-none stylish-toggle-btn px-4 py-2 rounded-pill shadow-sm fw-semibold d-flex align-items-center gap-2"
                                    data-post-id="{{ $post->id }}" data-action="show">
                                    <span class="material-symbols-outlined align-text-bottom fs-5">expand_more</span>
                                    <span>Show more comments</span>
                                </button>
                                <button type="button"
                                    class="show-less-comments-btn d-none stylish-toggle-btn px-4 py-2 rounded-pill shadow-sm fw-semibold d-flex align-items-center gap-2"
                                    data-post-id="{{ $post->id }}" data-action="hide">
                                    <span class="material-symbols-outlined align-text-bottom fs-5">expand_less</span>
                                    <span>Hide comments</span>
                                </button>
                            </div>
                            <!-- <div class="add-comment-form-block mt-3 pt-3 border-top">
                                <div class="d-flex align-items-start gap-2">
                                    <div class="flex-shrink-0">
                                        @auth
                                        <a
                                            href="{{ route('user.profile.show', auth()->user()->username ?? auth()->id() ?? 'unknown') }}">
                                            <img src="{{ asset(auth()->user()->avatar ?? 'frontend/assets/images/user/1.jpg') }}"
                                                alt="userimg" class="avatar-40 rounded-circle object-cover"
                                                loading="lazy">
                                        </a>
                                        @else
                                        <img src="{{ asset('frontend/assets/images/user/1.jpg') }}" alt="userimg"
                                            class="avatar-40 rounded-circle object-cover" loading="lazy">
                                        @endauth
                                    </div>
                                    <div class="flex-grow-1">
                                        <form class="main-comment-form"
                                            action="{{ route('posts.comments.store', $post) }}" method="POST">
                                            @csrf
                                            <input type="text" name="content" class="form-control add-comment-input"
                                                placeholder="Write a comment..." autocomplete="off">
                                        </form>
                                        <small class="text-muted" style="font-size: 0.75rem;">Press Enter to
                                            post</small>
                                    </div>
                                </div>
                            </div> -->
                            <div class="add-comment-form-block mt-3 pt-3 border-top">
                                <div class="d-flex align-items-start gap-2">

                                    <div class="flex-shrink-0">
                                        @auth
                                        <a href="{{ route('user.profile.show', auth()->user()->username ?? auth()->id() ?? 'unknown') }}">
                                            <img src="{{ asset(auth()->user()->avatar ?? 'frontend/assets/images/user/1.jpg') }}"
                                                alt="userimg"
                                                class="avatar-40 rounded-circle object-cover"
                                                loading="lazy">
                                        </a>
                                        @else
                                        <img src="{{ asset('frontend/assets/images/user/1.jpg') }}"
                                            alt="userimg"
                                            class="avatar-40 rounded-circle object-cover"
                                            loading="lazy">
                                        @endauth
                                    </div>

                                    <div class="flex-grow-1">

                                        <form class="main-comment-form position-relative"
                                            action="{{ route('posts.comments.store', $post) }}"
                                            method="POST">

                                            @csrf

                                            <input type="text"
                                                name="content"
                                                class="form-control add-comment-input"
                                                placeholder="Write a comment..."
                                                autocomplete="off"
                                                required>

                                            <button type="submit"
                                                class="comment-send-btn"
                                                aria-label="Send comment">

                                                <svg width="20"
                                                    height="20"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">

                                                    <path d="M22 2L11 13"
                                                        stroke="currentColor"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round" />

                                                    <path d="M22 2L15 22L11 13L2 9L22 2Z"
                                                        stroke="currentColor"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round" />

                                                </svg>

                                            </button>

                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .main-comment-form {
                width: 100%;
            }

            .add-comment-input {
                height: 42px;
                padding-right: 50px !important;
                border-radius: 22px;
            }

            .comment-send-btn {
                position: absolute;
                right: 5px;
                top: 50%;
                transform: translateY(-50%);

                width: 34px;
                height: 34px;

                padding: 0;
                margin: 0;

                display: flex;
                align-items: center;
                justify-content: center;

                border: none;
                background: transparent;

                color: #1877f2;

                cursor: pointer;
                z-index: 5;
            }

            .comment-send-btn svg {
                width: 20px;
                height: 20px;
            }

            .comment-send-btn:hover {
                color: #0d65d9;
            }

            .comment-send-btn:active {
                transform: translateY(-50%) scale(0.9);
            }
        </style>
        @if (auth()->id() === ($post->user_id ?? ($post->user->id ?? null)))
        {{-- Edit Post Modal: unique per post --}}
        <div class="modal fade" id="edit-post-modal-{{ $post->id }}" tabindex="-1"
            aria-labelledby="editPostModalLabel-{{ $post->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <form class="edit-post-form" data-post-id="{{ $post->id }}"
                        action="{{ route('user.post.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title" id="editPostModalLabel-{{ $post->id }}">Edit Post</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="edit-post-content-{{ $post->id }}"
                                    class="form-label font-size-16 fw-semibold">Content</label>
                                <textarea class="form-control" id="edit-post-content-{{ $post->id }}" name="content"
                                    rows="4" placeholder="What's on your mind?">{{ $post->content }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label font-size-16 fw-semibold d-block">Update Media</label>
                                <div class="edit-media-preview-container d-flex gap-2 flex-wrap mb-2">
                                    {{-- Existing media previews could go here if we wanted to allow deleting individual
                                        ones --}}
                                </div>
                                <div class="input-group">
                                    <input type="file" name="media[]" class="form-control"
                                        id="edit-post-media-{{ $post->id }}" multiple accept="image/*,video/*">
                                    <label class="input-group-text btn btn-outline-secondary"
                                        for="edit-post-media-{{ $post->id }}">
                                        <span class="material-symbols-outlined font-size-18">add_photo_alternate</span>
                                    </label>
                                </div>
                                <small class="text-muted mt-1 d-block">Uploading new media will replace existing
                                    ones.</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                data-bs-target="#edit-post-modal-{{ $post->id }}">Cancel</button>
                            <button type="submit" class="btn btn-primary d-flex align-items-center gap-2">
                                <span class="material-symbols-outlined font-size-20">save</span>
                                Update Post
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif

        {{-- Share Modal --}}
        <div class="modal fade" id="share-btn-{{ $post->id }}" tabindex="-1"
            aria-labelledby="shareModalLabel-{{ $post->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 shadow">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-semibold" id="shareModalLabel-{{ $post->id }}">
                            <span class="material-symbols-outlined align-text-bottom me-1">share</span> Share Post
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pt-3">

                        {{-- Copy link --}}
                        <label class="form-label text-muted small fw-semibold mb-1">Post Link</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-sm rounded-start"
                                id="share-link-{{ $post->id }}" value="{{ route('posts.show', $post->id) }}" readonly>
                            <button class="btn btn-outline-primary btn-sm copy-link-btn"
                                data-target="share-link-{{ $post->id }}" type="button">
                                <span class="material-symbols-outlined"
                                    style="font-size:18px;vertical-align:-4px">content_copy</span>
                                Copy
                            </button>
                        </div>

                        {{-- Social share buttons --}}
                        <p class="text-muted small fw-semibold mb-2">Share via</p>
                        <div class="d-flex gap-2 flex-wrap">

                            {{-- WhatsApp --}}
                            <a href="https://wa.me/?text={{ urlencode(route('posts.show', $post->id)) }}"
                                target="_blank" rel="noopener"
                                class="btn btn-success btn-sm d-flex align-items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                                </svg>
                                WhatsApp
                            </a>

                            {{-- Facebook --}}
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('posts.show', $post->id)) }}"
                                target="_blank" rel="noopener"
                                class="btn btn-primary btn-sm d-flex align-items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                </svg>
                                Facebook
                            </a>

                            {{-- Twitter / X --}}
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('posts.show', $post->id)) }}&text={{ urlencode(Str::limit(strip_tags($post->content ?? ''), 100)) }}"
                                target="_blank" rel="noopener"
                                class="btn btn-dark btn-sm d-flex align-items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                                </svg>
                                X / Twitter
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <script>
            // Copy link handler for this post
            $(document).on('click', '.copy-link-btn', function() {
                var targetId = $(this).data('target');
                var input = document.getElementById(targetId);
                input.select();
                input.setSelectionRange(0, 99999);
                navigator.clipboard.writeText(input.value).then(function() {
                    var btn = $('[data-target="' + targetId + '"]');
                    btn.html('<span class="material-symbols-outlined" style="font-size:18px;vertical-align:-4px">check</span> Copied!');
                    setTimeout(function() {
                        btn.html('<span class="material-symbols-outlined" style="font-size:18px;vertical-align:-4px">content_copy</span> Copy');
                    }, 2000);
                }).catch(function() {
                    // Fallback for browsers that don't support clipboard API
                    document.execCommand('copy');
                    var btn = $('[data-target="' + targetId + '"]');
                    btn.html('<span class="material-symbols-outlined" style="font-size:18px;vertical-align:-4px">check</span> Copied!');
                    setTimeout(function() {
                        btn.html('<span class="material-symbols-outlined" style="font-size:18px;vertical-align:-4px">content_copy</span> Copy');
                    }, 2000);
                });
            });
        </script>

        <script>
            // AJAX handler for edit post form
            $(document).off('submit', '.edit-post-form').on('submit', '.edit-post-form', function(e) {
                e.preventDefault();
                var form = $(this);
                var postId = form.data('post-id');
                var modalElement = document.getElementById('edit-post-modal-' + postId);
                var modal = bootstrap.Modal.getInstance(modalElement);

                var content = form.find('textarea[name="content"]').val().trim();

                // Allow empty content if media is being uploaded, otherwise require content
                var hasMedia = form.find('input[type="file"]')[0].files.length > 0;
                if (!content && !hasMedia) {
                    form.find('textarea[name="content"]').focus();
                    return false;
                }

                var formData = new FormData(form[0]);
                form.find('button[type="submit"]').prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Updating...');

                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success || response.status === 'success') {
                            // Update post content in DOM
                            var postCard = $('#post-' + postId);
                            if (!postCard.length) {
                                postCard = $("[data-bs-target='#edit-post-modal-" + postId + "']").closest('.social-post');
                            }
                            postCard.find('.mt-4 > p.m-0').text(content);
                            // Update media if provided in response
                            if (response.media && Array.isArray(response.media)) {
                                var $mediaRow = postCard.find('.user-post .row.g-1');
                                if ($mediaRow.length) {
                                    $mediaRow.empty();
                                    var count = response.media.length;
                                    if (count > 0) {
                                        // Helper to ensure absolute URL (if not already)
                                        function absUrl(url) {
                                            if (/^(https?:)?\//.test(url)) return url;
                                            // Laravel asset() returns relative, so prefix with base
                                            var base = window.location.origin ? window.location.origin +
                                                '/' : '/';
                                            return base.replace(/\/$/, '') + '/' + url.replace(/^\//, '');
                                        }
                                        // First media item
                                        var file0 = absUrl(response.media[0]);
                                        var ext0 = file0.split('.').pop().toLowerCase();
                                        var isVideo0 = ['mp4', 'mov', 'ogg', 'webm', 'qt'].includes(ext0);
                                        var colClass0 = (count > 1 ? 'col-md-6' : 'col-12');
                                        var html0 = '<div class="' + colClass0 +
                                            '"><div class="post-media-item rounded overflow-hidden position-relative" style="height: 250px;">';
                                        html0 += '<a data-fslightbox="gallery-' + postId + '" href="' +
                                            file0 + '">';
                                        if (isVideo0) {
                                            html0 +=
                                                '<video controls muted class="d-block w-100 h-100 object-cover" loading="lazy"><source src="' +
                                                file0 + '" type="video/' + ext0 +
                                                '">Your browser does not support the video tag.</video>';
                                        } else {
                                            html0 += '<img src="' + file0 +
                                                '" alt="post-image" class="d-block w-100 h-100 object-cover" loading="lazy">';
                                        }
                                        html0 += '</a></div></div>';
                                        $mediaRow.append(html0);
                                        // Second media item (if exists)
                                        if (count > 1) {
                                            var file1 = absUrl(response.media[1]);
                                            var ext1 = file1.split('.').pop().toLowerCase();
                                            var isVideo1 = ['mp4', 'mov', 'ogg', 'webm', 'qt'].includes(
                                                ext1);
                                            var html1 =
                                                '<div class="col-md-6"><div class="post-media-item rounded overflow-hidden position-relative" style="height: 250px;">';
                                            html1 += '<a data-fslightbox="gallery-' + postId + '" href="' +
                                                file1 + '">';
                                            if (isVideo1) {
                                                html1 +=
                                                    '<video controls muted class="d-block w-100 h-100 object-cover" loading="lazy"><source src="' +
                                                    file1 + '" type="video/' + ext1 +
                                                    '">Your browser does not support the video tag.</video>';
                                            } else {
                                                html1 += '<img src="' + file1 +
                                                    '" alt="post-image" class="d-block w-100 h-100 object-cover" loading="lazy">';
                                            }
                                            // Overlay if more than 2
                                            if (count > 2) {
                                                html1 +=
                                                    '<div class="post-overlay-count position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center text-white bg-dark bg-opacity-75" style="z-index: 1;"><span class="font-size-28">+' +
                                                    (count - 2) + '</span></div>';
                                            }
                                            html1 += '</a></div></div>';
                                            $mediaRow.append(html1);
                                        }
                                        // Hidden links for all other media files for FsLightbox
                                        for (var i = 2; i < count; i++) {
                                            var file = absUrl(response.media[i]);
                                            $mediaRow.parent().append('<a data-fslightbox="gallery-' +
                                                postId + '" href="' + file + '" class="d-none"></a>');
                                        }
                                    }
                                    // Refresh FsLightbox if available
                                    if (typeof refreshFsLightbox === 'function') {
                                        refreshFsLightbox();
                                    }
                                }
                            }
                            // Hide modal and clear file input
                            if (modal) {
                                modal.hide();
                                form.find('input[type="file"]').val('');
                            }
                            // Optionally show a toast or alert
                            if (window.ToastMagic) {
                                ToastMagic.success(response.message || 'Post updated successfully!');
                            }
                            form.find('button[type="submit"]').prop('disabled', false).html('<span class="material-symbols-outlined font-size-20">save</span> Update Post');
                        } else {
                            alert(response.message || 'Failed to update post.');
                            form.find('button[type="submit"]').prop('disabled', false).html('<span class="material-symbols-outlined font-size-20">save</span> Update Post');
                        }
                    },
                    error: function(xhr) {
                        form.find('button[type="submit"]').prop('disabled', false).html('<span class="material-symbols-outlined font-size-20">save</span> Update Post');
                        let errorMsg = 'An error occurred while updating your post.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMsg = xhr.responseJSON.message;
                        } else if (xhr.responseText) {
                            try {
                                const json = JSON.parse(xhr.responseText);
                                if (json.message) errorMsg = json.message;
                            } catch (e) {}
                        }
                        alert(errorMsg);
                    },
                    complete: function() {
                        form.find('button[type="submit"]').prop('disabled', false);
                    }
                });
                return false;
            });
        </script>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fslightbox/index.js"></script>

<!-- Your AJAX/jQuery and AlpineJS code in a regular script block -->
<script>
    // AlpineJS component definition
    window.commentComponent = function(postId) {
        return {
            addComment(data) {
                // Prevent duplicates
                if (document.getElementById(`comment-${data.id}`)) {
                    return;
                }
                // Only update comment count for main comments
                if (!data.parent_id) {
                    const countSpan = document.querySelector(`.comment-count-${postId}`);
                    if (countSpan) {
                        let currentCount = parseInt(countSpan.innerText) || 0;
                        let newCount = currentCount + 1;
                        countSpan.innerText = `${newCount} Comment${newCount !== 1 ? 's' : ''}`;
                    }
                }
                // Find correct list and prepend the comment or reply
                let commentList;
                if (data.parent_id) {
                    let replyListId = `replies-for-comment-${data.parent_id}`;
                    commentList = document.getElementById(replyListId);
                    if (!commentList) {
                        const parentLi = document.getElementById(`comment-${data.parent_id}`);
                        if (parentLi) {
                            commentList = document.createElement('ul');
                            commentList.className = 'list-unstyled ms-4';
                            commentList.id = replyListId;
                            parentLi.appendChild(commentList);
                        }
                    }
                } else {
                    commentList = document.getElementById(`comment-list-${postId}`);
                }
                if (!commentList) return;
                // If backend provides rendered HTML, use it (for replies)
                let li;
                if (data.html) {
                    const temp = document.createElement('div');
                    temp.innerHTML = data.html.trim();
                    li = temp.firstElementChild;
                    if (!li) return;
                    li.id = `comment-${data.id}`;
                } else {
                    li = document.createElement('li');
                    li.className = `mb-2 comment-item ${data.parent_id ? 'is-reply' : ''}`;
                    li.id = `comment-${data.id}`;

                    const isReply = !!data.parent_id;
                    const avatarSize = isReply ? 'avatar-32' : 'avatar-40';
                    const avatarUrl = data.user.avatar ? (data.user.avatar.startsWith('http') ? data.user.avatar : '/' + data.user.avatar) : '/frontend/assets/images/user/1.jpg';
                    const timeNow = data.created_at ? moment(data.created_at).fromNow(true) : 'just now';

                    const postAuthorId = document.getElementById(`commentcollapes${postId}`).getAttribute('data-post-author-id');
                    const isAuthor = String(data.user_id) === String(postAuthorId);

                    li.innerHTML = `
<div class="d-flex gap-2">
    <div class="flex-shrink-0">
        <img src="${avatarUrl}" alt="userimg" class="${avatarSize} rounded-circle object-cover" loading="lazy">
    </div>
    <div class="flex-grow-1">
        <div class="fb-comment-bubble ${isAuthor ? 'is-author' : ''}">
            <div class="d-flex align-items-center">
                <div class="fb-comment-name">${data.user.name}</div>
                ${isAuthor ? '<span class="author-badge">Author</span>' : ''}
            </div>
            <div class="fb-comment-text" id="comment-text-${data.id}">${data.content ? data.content : ''}</div>
        </div>
        <div class="fb-comment-actions d-flex align-items-center">
            <div class="like-data" id="reaction-block-comment-${data.id}">
                <div class="dropdown">
                    <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                        <a href="javascript:void(0);">Like</a>
                    </span>
                    <div class="dropdown-menu py-1 shadow-sm border-0" style="min-width: 250px; border-radius: 30px;">
                        <div class="d-flex px-2">
                            ${[1, 2, 3, 4, 5, 6, 7].map(i => `
                                <form action="/react/comment/${data.id}" method="POST" class="reaction-form" data-reactable-type="comment" data-reactable-id="${data.id}">
                                    <input type="hidden" name="reaction_id" value="${i}">
                                    <button type="submit" class="btn btn-link p-1 border-0 bg-transparent reaction-btn">
                                        <img src="/frontend/assets/images/icon/0${i}.png" width="24" height="24" alt="reaction">
                                    </button>
                                </form>
                            `).join('')}
                        </div>
                    </div>
                </div>
            </div>
            <span class="fb-comment-time">${timeNow}</span>

            ${(window.Laravel && window.Laravel.userId) ? `
                <div class="ms-2 dropdown">
                    <a href="javascript:void(0);" class="text-muted" data-bs-toggle="dropdown">
                        <span class="material-symbols-outlined font-size-14">more_horiz</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                        <a class="dropdown-item py-2 delete-comment-btn" href="javascript:void(0);" data-id="${data.id}">Delete</a>
                        <a class="dropdown-item py-2 edit-comment-btn" href="javascript:void(0);" data-id="${data.id}" data-content="${data.content}">Edit</a>
                    </div>
                </div>
            ` : ''}
        </div>
        <div class="collapse mt-2" id="subcomment-collapse-${data.id}">
            <div class="d-flex align-items-start gap-2">
                <img src="${window.Laravel && window.Laravel.userAvatar ? window.Laravel.userAvatar : '/frontend/assets/images/user/1.jpg'}" alt="userimg" class="avatar-32 rounded-circle object-cover" loading="lazy">
                <div class="flex-grow-1">
                    <form class="reply-form" data-comment-id="${data.id}" action="/comments/${data.id}/reply" method="POST">
                        <input type="text" name="content" class="form-control form-control-sm add-comment-input" placeholder="Write a reply..." autocomplete="off">
                    </form>
                    <small class="text-muted" style="font-size: 0.7rem;">Press Enter to post</small>
                </div>
            </div>
        </div>
        <ul class="list-unstyled reply-list" id="replies-for-comment-${data.id}"></ul>
    </div>
</div>
                    `;
                }
                // For replies, always append to the bottom of the reply list (ul#replies-for-comment-...)
                if (data.parent_id) {
                    let replyListId = `replies-for-comment-${data.parent_id}`;
                    let replyList = document.getElementById(replyListId);
                    if (replyList) {
                        replyList.appendChild(li); // Show replies in chronological order
                    }
                } else {
                    commentList.append(li); // Show main comments at bottom (or however user wants)
                }
                // Live update the comment time every minute
                const timeSpan = li.querySelector('.fw-medium.small.text-capitalize');
                if (timeSpan && data.created_at) {
                    const updateTime = () => {
                        timeSpan.textContent = moment(data.created_at).fromNow();
                    };
                    updateTime();
                    li._interval = setInterval(updateTime, 60000);
                }
            },
            init() {
                window.addEventListener(`comment-posted-${postId}`, (event) => {
                    this.addComment(event.detail.comment);
                });
                if (window.Echo) {
                    window.Echo.private('post.' + postId)
                        .listen('CommentCreated', (e) => {
                            if (e.comment) this.addComment(e.comment);
                        });
                }
            }
        }
    };

    $(document).ready(function() {
        function updateCommentButtons($commentList, showCount) {
            var $comments = $commentList.children('li');
            var $showMoreBtn = $commentList.parent().find('.show-more-comments-btn');
            var $showLessBtn = $commentList.parent().find('.show-less-comments-btn');
            if ($comments.length > showCount) {
                let hiddenCount = 0;
                $comments.each(function(i, el) {
                    if (i < showCount) $(el).show();
                    else {
                        $(el).hide();
                        hiddenCount++;
                    }
                });
                $showMoreBtn.toggleClass('d-none', hiddenCount === 0);
                $showLessBtn.addClass('d-none');
            } else {
                $comments.show();
                $showMoreBtn.addClass('d-none');
                $showLessBtn.addClass('d-none');
            }
        }
        $(document).off('click', '.show-more-comments-btn').on('click', '.show-more-comments-btn', function() {
            var postId = $(this).data('post-id');
            var $commentList = $('#comment-list-' + postId);
            var $comments = $commentList.children('li');
            $comments.show();
            $(this).addClass('d-none');
            $commentList.parent().find('.show-less-comments-btn').removeClass('d-none');
        });
        $(document).off('click', '.show-less-comments-btn').on('click', '.show-less-comments-btn', function() {
            var postId = $(this).data('post-id');
            var $commentList = $('#comment-list-' + postId);
            updateCommentButtons($commentList, 2);
        });
        $('.comment-list').each(function() {
            updateCommentButtons($(this), 2);
        });
        $(document).off('click', '.delete-comment-btn').on('click', '.delete-comment-btn', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var commentId = $(this).data('id');

            // Use SweetAlert2 for delete confirmation
            Swal.fire({
                title: 'Delete Comment',
                text: 'Are you sure you want to delete this comment?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel',
                customClass: {
                    popup: 'fb-swal-popup',
                    title: 'fb-swal-title',
                    htmlContainer: 'fb-swal-content',
                    actions: 'fb-swal-actions',
                    confirmButton: 'fb-swal-confirm',
                    cancelButton: 'fb-swal-cancel'
                },
                buttonsStyling: false,
                allowOutsideClick: false,
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/comments/' + commentId,
                        method: 'DELETE',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content') ||
                                window.Laravel
                                .csrfToken
                        },
                        success: function(response) {
                            if (response.success) {
                                // Show success message
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: 'Comment has been deleted successfully.',
                                    icon: 'success',
                                    timer: 2000,
                                    showConfirmButton: false
                                });

                                var $comment = $('#comment-' + commentId);
                                $comment.find('.comment-item').remove();
                                $("form.reply-form[data-comment-id='" + commentId +
                                    "']").closest(
                                    '.add-comment-form-block').remove();
                                $comment.remove();
                                var $countSpan = $comment.closest('.comment-area')
                                    .find(
                                        '.comment-count-' + $comment.closest(
                                            '.comment-area').data(
                                            'post-id'));
                                if ($countSpan.length) {
                                    let currentCount = parseInt($countSpan
                                        .text()) || 1;
                                    let newCount = Math.max(currentCount - 1, 0);
                                    $countSpan.text(newCount + ' Comment' + (
                                        newCount !== 1 ? 's' :
                                        ''));
                                }
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: response.message ||
                                        'Failed to delete comment.',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                        },
                        error: function(xhr) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Failed to delete comment. Please try again.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                }
            });
        });

        $(document).off('click', '.edit-comment-btn').on('click', '.edit-comment-btn', function(e) {
            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();

            var $btn = $(this);
            var commentId = $btn.data('id');
            var currentContent = $btn.data('content') || $btn.attr('data-content') || '';

            if (!currentContent) {
                currentContent = $btn.closest('.comment-item').find('.fb-comment-text').first().text().trim();
            }

            Swal.fire({
                title: 'Edit Comment',
                input: 'textarea',
                inputAttributes: {
                    'rows': 3,
                    'class': 'form-control fb-comment-edit-textarea'
                },
                inputValue: currentContent,
                showCancelButton: true,
                confirmButtonText: 'Save Changes',
                cancelButtonText: 'Cancel',
                customClass: {
                    popup: 'fb-swal-popup',
                    title: 'fb-swal-title',
                    htmlContainer: 'fb-edit-swal-container',
                    input: 'fb-edit-swal-input',
                    actions: 'fb-swal-actions',
                    confirmButton: 'fb-swal-confirm',
                    cancelButton: 'fb-swal-cancel'
                },
                buttonsStyling: false,
                reverseButtons: true,
                focusConfirm: false,
                inputValidator: (value) => {
                    if (!value || !value.trim()) {
                        return 'Please enter something!'
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    var newContent = result.value.trim();
                    $.ajax({
                        url: '/comments/' + commentId,
                        method: 'POST',
                        data: {
                            _token: window.Laravel.csrfToken,
                            _method: 'PUT',
                            content: newContent
                        },
                        success: function(response) {
                            if (response.success) {
                                var $commentItem = $btn.closest('.comment-item');
                                $commentItem.find('.fb-comment-text').first().text(response.content);
                                $commentItem.find('.edit-comment-btn').data('content', response.content).attr('data-content', response.content);

                                if (window.ToastMagic) {
                                    ToastMagic.success('Comment updated!');
                                }
                            }
                        },
                        error: function(xhr) {
                            Swal.fire('Error', 'Could not update comment.', 'error');
                        }
                    });
                }
            });
        });



        $(document).off('click', '.hide-comment-btn').on('click', '.hide-comment-btn', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var commentId = $(this).data('id');
            $.ajax({
                url: '/comments/' + commentId + '/hide',
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content') || window.Laravel
                        .csrfToken
                },
                success: function(response) {
                    if (response.success) {
                        $('#comment-' + commentId).fadeOut(200, function() {
                            $(this).remove();
                        });
                        var $comment = $('#comment-' + commentId);
                        var $countSpan = $comment.closest('.comment-area').find(
                            '.comment-count-' + $comment.closest('.comment-area').data(
                                'post-id'));
                        if ($countSpan.length) {
                            let currentCount = parseInt($countSpan.text()) || 1;
                            let newCount = Math.max(currentCount - 1, 0);
                            $countSpan.text(newCount + ' Comment' + (newCount !== 1 ? 's' :
                                ''));
                        }
                    } else {
                        alert(response.message || 'Failed to hide comment.');
                    }
                },
                error: function(xhr) {
                    alert('Failed to hide comment.');
                }
            });
            return false;
        });
        if (typeof refreshFsLightbox === 'function') {
            refreshFsLightbox();
        }
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
        // AJAX form submission handler with debug log
        // Unbind first to prevent multiple bindings if this view is included multiple times
        $(document).off('submit', '.reply-form, .main-comment-form').on('submit', '.reply-form, .main-comment-form', function(e) {
            e.preventDefault();
            let form = $(this);
            let input = form.find('input[name="content"]');
            let content = input.val().trim();
            console.log('AJAX handler triggered for comment form', form.attr('class'));
            if (!content) {
                input.focus();
                return false;
            }
            form.find('button[type="submit"]').prop('disabled', true);
            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: form.serialize(),
                success: function(response) {
                    input.val('');
                    if (response.comment) {
                        const event = new CustomEvent(
                            `comment-posted-${response.comment.post_id}`, {
                                detail: {
                                    comment: response.comment
                                }
                            });
                        window.dispatchEvent(event);
                    }
                },
                error: function(xhr) {
                    console.error('AJAX Error:', xhr.responseText);
                    let errorMsg = 'An error occurred while posting your comment.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMsg = xhr.responseJSON.message;
                    } else if (xhr.responseText) {
                        try {
                            const json = JSON.parse(xhr.responseText);
                            if (json.message) errorMsg = json.message;
                        } catch (e) {}
                    }
                    let errorBlock = form.closest('.add-comment-form-block').find(
                        '.comment-error-message');
                    if (errorBlock.length === 0) {
                        errorBlock = $(
                            '<div class="comment-error-message text-danger mt-2"></div>'
                        );
                        form.closest('.add-comment-form-block').append(errorBlock);
                    }
                    errorBlock.text(errorMsg).show();
                    setTimeout(() => errorBlock.fadeOut(), 5000);
                },
                complete: function() {
                    form.find('button[type="submit"]').prop('disabled', false);
                }
            });
            return false;
        });
    });
</script>
<script>
    $(document).off('click', '.follow-toggle-btn').on('click', '.follow-toggle-btn', function(e) {
        e.preventDefault();
        var btn = $(this);
        var userId = btn.data('user-id');
        var isFollowing = btn.data('following') == 1;
        var url = isFollowing ? '/unfollow/' + userId : '/follow/' + userId;
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content') || window.Laravel.csrfToken
            },
            success: function(response) {
                btn.data('following', isFollowing ? 0 : 1);
                btn.find('.material-symbols-outlined').text(isFollowing ? 'person_add' :
                    'person_remove');
                btn.find('h6').text(isFollowing ? 'Follow User' : 'Unfollow User');
                btn.find('p').text(isFollowing ?
                    'See posts from this user.' :
                    'Stop seeing posts but stay friends.');
                if (window.ToastMagic) {
                    ToastMagic.success(response.message || (isFollowing ? 'Unfollowed!' :
                        'Followed!'));
                }
            },
            error: function(xhr) {
                alert('Action failed. Please try again.');
            }
        });
    });

    $(document).off('click', '.notification-toggle-btn').on('click', '.notification-toggle-btn', function(e) {
        e.preventDefault();
        var btn = $(this);
        var userId = btn.data('user-id');
        $.ajax({
            url: '/toggle-notification/' + userId,
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content') || window.Laravel.csrfToken
            },
            success: function(response) {
                if (window.ToastMagic) {
                    ToastMagic.success(response.message || 'Notification preference updated!');
                }
            },
            error: function(xhr) {
                alert('Failed to update notification preference.');
            }
        });
    });

    // Friend Request functionality
    $(document).off('click', '.send-friend-request-btn').on('click', '.send-friend-request-btn', function(e) {
        e.preventDefault();
        var btn = $(this);
        var userId = btn.data('user-id');

        // Disable button to prevent multiple clicks
        btn.addClass('disabled').css('pointer-events', 'none');

        $.ajax({
            url: '/friend-request/send/' + userId,
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content') || window.Laravel.csrfToken
            },
            success: function(response) {
                if (response.success) {
                    // Update the button to show "Friend Request Sent" state
                    btn.removeClass('send-friend-request-btn').addClass('text-muted');
                    btn.find('.material-symbols-outlined').text('hourglass_top');
                    btn.find('h6').text('Friend Request Sent');
                    btn.find('p').text('Waiting for user to accept.');

                    if (window.ToastMagic) {
                        ToastMagic.success('Friend request sent successfully!');
                    }
                } else {
                    // Re-enable button on failure
                    btn.removeClass('disabled').css('pointer-events', 'auto');
                    alert(response.error || 'Failed to send friend request.');
                }
            },
            error: function(xhr) {
                // Re-enable button on error
                btn.removeClass('disabled').css('pointer-events', 'auto');
                let errorMsg = 'Failed to send friend request.';
                if (xhr.responseJSON && xhr.responseJSON.error) {
                    errorMsg = xhr.responseJSON.error;
                }
                alert(errorMsg);
            }
        });
    });

    $(document).off('click', '.accept-friend-request-btn').on('click', '.accept-friend-request-btn', function(e) {
        e.preventDefault();
        var btn = $(this);
        var requestId = btn.data('request-id');

        $.ajax({
            url: '/friend-request/accept/' + requestId,
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content') || window.Laravel.csrfToken
            },
            success: function(response) {
                if (response.success) {
                    // Remove the friend request from the UI
                    btn.closest('.friend-request-item').fadeOut(300, function() {
                        $(this).remove();
                    });

                    if (window.ToastMagic) {
                        ToastMagic.success('Friend request accepted!');
                    }
                } else {
                    alert(response.error || 'Failed to accept friend request.');
                }
            },
            error: function(xhr) {
                let errorMsg = 'Failed to accept friend request.';
                if (xhr.responseJSON && xhr.responseJSON.error) {
                    errorMsg = xhr.responseJSON.error;
                }
                alert(errorMsg);
            }
        });
    });

    $(document).off('click', '.decline-friend-request-btn').on('click', '.decline-friend-request-btn', function(e) {
        e.preventDefault();
        var btn = $(this);
        var requestId = btn.data('request-id');

        $.ajax({
            url: '/friend-request/decline/' + requestId,
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content') || window.Laravel.csrfToken
            },
            success: function(response) {
                if (response.success) {
                    // Remove the friend request from the UI
                    btn.closest('.friend-request-item').fadeOut(300, function() {
                        $(this).remove();
                    });

                    if (window.ToastMagic) {
                        ToastMagic.success('Friend request declined.');
                    }
                } else {
                    alert(response.error || 'Failed to decline friend request.');
                }
            },
            error: function(xhr) {
                let errorMsg = 'Failed to decline friend request.';
                if (xhr.responseJSON && xhr.responseJSON.error) {
                    errorMsg = xhr.responseJSON.error;
                }
                alert(errorMsg);
            }
        });
    });

    // SweetAlert2 handler for post delete
    $(document).off('submit', '.delete-post-form').on('submit', '.delete-post-form', function(e) {
        e.preventDefault();
        var form = $(this);

        Swal.fire({
            title: 'Delete Post',
            text: 'Are you sure you want to delete this post?',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
            customClass: {
                popup: 'fb-swal-popup',
                title: 'fb-swal-title',
                htmlContainer: 'fb-swal-content',
                actions: 'fb-swal-actions',
                confirmButton: 'fb-swal-confirm',
                cancelButton: 'fb-swal-cancel'
            },
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                form.off('submit').submit();
            }
        });

    });
</script>

@vite(['resources/js/echo-comments.js'])