@extends('user-interface.layout.layout')
@section('title')
    User Profile
@endsection

@section('content')
    <div class="container position-relative p-0">
        <div class="header-cover-img" style="width: 100%; overflow: hidden; position: relative;">
            <img src="{{ asset(optional($user->profile)->cover_photo ?? 'frontend/assets/images/page-img/profile-bg1.jpg') }}"
                class="img-fluid w-100" style="object-fit: cover; height: 300px;" alt="Cover Photo">
            <!-- Edit Icon -->
            <button class="btn btn-sm bg-primary rounded-pill position-absolute" style="top: 15px; right: 15px;"
                data-bs-toggle="modal" data-bs-target="#coverPhotoModal">
                <span class="material-symbols-outlined">edit</span>
            </button>
        </div>
    </div>

    <!-- Cover Photo Modal -->
    <div class="modal fade" id="coverPhotoModal" tabindex="-1" aria-labelledby="coverPhotoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('user.update-cover-photo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="coverPhotoModalLabel">Update Cover Photo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="file" name="cover_photo" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card profile-box">
                <div class="card-body">
                    <div class="row align-items-center item-header-content">
                        <div class="col-lg-4 profile-left">

                        </div>
                        <div class="col-lg-4 text-center profile-center">
                            {{-- <div class="header-avatar position-relative d-inline-block"> --}}
                            {{-- <span class="change-profile-image bg-primary rounded-pill"> --}}
                            {{-- <span
                                        class="material-symbols-outlined text-white font-size-16">photo_camera</span> --}}
                            {{-- </span> --}}
                            {{-- <img src="../assets/images/user/1.jpg" alt="user" --}} {{--
                                    class="avatar-150 border border-4 border-white rounded-3"> --}}
                            {{-- <span class="badge bg-success fw-500 letter-spacing-1 chat-status">online</span> --}}
                            {{-- </div> --}}

                            <!-- Profile Photo Section -->
                            <div class="header-avatar position-relative d-inline-block">
                                <div style="position: relative; display: inline-block;">
                                    <img src="{{ asset($user->avatar ?? 'default-avatar.jpg') }}" alt="Profile Photo"
                                        class="avatar-150 border border-4 border-white rounded-3"
                                        style="width: 150px; height: 150px; object-fit: cover;">

                                    @if ($isOwnProfile ?? true)
                                        <!-- Edit Button - Only show for own profile -->
                                        <button class="btn btn-sm bg-primary rounded-pill position-absolute"
                                            style="
                                                        top: 5px;
                                                        right: 5px;
                                                        width: 30px;
                                                        height: 30px;
                                                        padding: 0;
                                                        border-radius: 50%;
                                                        "
                                            data-bs-toggle="modal" data-bs-target="#profilePhotoModal">
                                            <span class="material-symbols-outlined">photo_camera</span>
                                        </button>
                                    @endif
                                </div>
                                <span class="badge bg-success fw-500 letter-spacing-1 chat-status">
                                    {{ $user->isOnline() ? 'online' : 'offline' }}
                                </span>
                            </div>

                            <!-- Profile Photo Modal -->
                            <div class="modal fade" id="profilePhotoModal" tabindex="-1"
                                aria-labelledby="profilePhotoModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('user.update-profile-photo') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="profilePhotoModalLabel">Update Profile Photo
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="avatar" class="form-label">Select new profile
                                                        photo</label>
                                                    <input type="file" class="form-control" id="avatar" name="avatar"
                                                        required>
                                                </div>
                                                <div class="text-center">
                                                    <img id="profilePhotoPreview"
                                                        src="{{ asset($user->avatar ?? 'default-avatar.jpg') }}"
                                                        class="img-fluid rounded-circle"
                                                        style="width: 200px; height: 200px; object-fit: cover;">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>






                            <h5 class="d-flex align-items-center justify-content-center gap-1 mb-2">
                                {{ $user->name ?? 'N/A' }} <span
                                    class="badge  bg-primary rounded-pill material-symbols-outlined font-size-14 p-0">done</span>
                            </h5>
                            <ul class="d-flex align-items-center justify-content-center gap-3 list-inline p-0 m-0">
                                @if ($user->profile && $user->profile->present_address)
                                    <li class="d-flex align-items-center gap-1">
                                        <h6 class="material-symbols-outlined font-size-14">location_on</h6>
                                        <span
                                            class="font-size-14 text-uppercase fw-500">{{ $user->profile->present_address }}</span>
                                    </li>
                                @endif
                                @if ($user->email)
                                    <li class="d-flex align-items-center gap-1">
                                        <h6 class="material-symbols-outlined font-size-14">email</h6>
                                        <a href="mailto:{{ $user->email }}"
                                            class="font-size-14 fw-500 text-body">{{ $user->email }}</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="col-lg-4 profile-right">
                            <ul class="user-meta list-inline p-0 d-flex align-items-center justify-content-center">
                                <li>
                                    <h5>{{ $stats['posts_count'] }}</h5>Posts
                                </li>
                                <li>
                                    <h5>{{ number_format($stats['total_views']) }}</h5>Views
                                </li>
                                <li>
                                    <h5>{{ $stats['friends_count'] }}</h5>Friends
                                </li>
                            </ul>

                            <!-- Profile Action Buttons -->
                            <div class="text-center mt-3">
                                @if ($isOwnProfile ?? true)
                                    <!-- Own Profile - Show Edit Profile Button -->
                                    <a href="{{ route('user.edit-profile') }}" class="btn btn-primary btn-sm">
                                        <i class="material-symbols-outlined me-1">edit</i>Edit Profile
                                    </a>
                                @else
                                    <!-- Other User's Profile - Show Friend Actions -->
                                    <div class="d-flex gap-2 justify-content-center">
                                        @if ($friendshipStatus == 'friends')
                                            <button class="btn btn-success btn-sm" disabled>
                                                <i class="material-symbols-outlined me-1">done</i>Friends
                                            </button>
                                            <button class="btn btn-primary btn-sm"
                                                onclick="openChatModal('{{ $user->id }}', '{{ $user->name }}', '{{ asset($user->avatar ?? 'default-avatar.jpg') }}')">
                                                <i class="material-symbols-outlined me-1">message</i>Message
                                            </button>
                                        @elseif($friendshipStatus == 'request_sent')
                                            <button class="btn btn-secondary btn-sm" disabled>
                                                <i class="material-symbols-outlined me-1">schedule</i>Request Sent
                                            </button>
                                        @elseif($friendshipStatus == 'request_received')
                                            <button class="btn btn-success btn-sm"
                                                onclick="acceptFriendRequest('{{ $user->id }}')">
                                                <i class="material-symbols-outlined me-1">person_add</i>Accept Request
                                            </button>
                                            <button class="btn btn-outline-secondary btn-sm"
                                                onclick="declineFriendRequest('{{ $user->id }}')">
                                                <i class="material-symbols-outlined me-1">person_remove</i>Decline
                                            </button>
                                        @else
                                            <button class="btn btn-primary btn-sm"
                                                onclick="sendFriendRequest('{{ $user->id }}')">
                                                <i class="material-symbols-outlined me-1">person_add</i>Add Friend
                                            </button>
                                            <button class="btn btn-outline-primary btn-sm"
                                                onclick="openChatModal('{{ $user->id }}', '{{ $user->name }}', '{{ asset($user->avatar ?? 'default-avatar.jpg') }}')">
                                                <i class="material-symbols-outlined me-1">message</i>Message
                                            </button>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body p-0">
                    <div class="user-tabing item-list-tabs">
                        <ul class="nav nav-pills d-flex align-items-center justify-content-center profile-feed-items p-0 m-0 rounded"
                            role="tablist">
                            <li class="nav-item col-12 col-sm-3" role="presentation">
                                <a class="nav-link active d-flex flex-md-column align-items-center flex-row justify-content-center gap-2"
                                    href="#pills-timeline-tab" data-bs-toggle="pill" data-bs-target="#timeline" role="button"
                                    aria-selected="true">
                                    <span class="icon rounded-3"><span
                                            class="material-symbols-outlined">timeline</span></span>
                                    <p class="mb-0 mt-0 mt-md-3">Timeline</p>
                                </a>
                            </li>
                            <li class="nav-item col-12 col-sm-3" role="presentation">
                                <a class="nav-link d-flex flex-md-column align-items-center flex-row justify-content-center gap-2"
                                    href="#pills-about-tab" data-bs-toggle="pill" data-bs-target="#about" role="button"
                                    aria-selected="false" tabindex="-1">
                                    <span class="icon rounded-3"><span
                                            class="material-symbols-outlined">person</span></span>
                                    <p class="mb-0 mt-0 mt-md-3">About</p>
                                </a>
                            </li>
                            <li class="nav-item col-12 col-sm-3" role="presentation">
                                <a class="nav-link d-flex flex-md-column align-items-center flex-row justify-content-center gap-2"
                                    href="#pills-friends-tab" data-bs-toggle="pill" data-bs-target="#friends"
                                    role="button" aria-selected="false" tabindex="-1">
                                    <span class="icon rounded-3"><span
                                            class="material-symbols-outlined">group</span></span>
                                    <p class="mb-0 mt-0 mt-md-3">Friends</p>
                                </a>
                            </li>
                            <li class="nav-item col-12 col-sm-3" role="presentation">
                                <a class="nav-link d-flex flex-md-column align-items-center flex-row justify-content-center gap-2"
                                    href="#pills-photos-tab" data-bs-toggle="pill" data-bs-target="#photos"
                                    role="button" aria-selected="false" tabindex="-1">
                                    <span class="icon rounded-3"><span
                                            class="material-symbols-outlined">photo_library</span></span>
                                    <p class="mb-0 mt-0 mt-md-3">Photos</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="timeline" role="tabpanel">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <!-- Post end-->
                                    @if ($isOwnProfile)
                                        @include('user-interface.pages.post.add-post')
                                    @endif
                                    <!-- post end -->
                                    <!-- show post -->
                                    <div class="row social-post-container">
                                        @foreach ($posts as $post)
                                            <div class="col-sm-12 social-post">
                                                <div class="card card-block card-stretch">
                                                    <div class="card-body">
                                                        <div class="user-post-data">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div class="me-3 flex-shrik-0">
                                                                    <img src="{{ auth()->user()->avatar ?? '' }}"
                                                                        alt="userimg"
                                                                        class="avatar-48 rounded-circle img-fluid"
                                                                        loading="lazy">
                                                                </div>

                                                                <div class="w-100">
                                                                    <div
                                                                        class="d-flex align-items-center justify-content-between">
                                                                        <div>
                                                                            <h6 class="mb-0 d-inline-block ">
                                                                                {{ $post->user->name ?? '' }}</h6>
                                                                            <span class="d-inline-block text-primary">
                                                                                <svg class="align-text-bottom"
                                                                                    width="17" height="17"
                                                                                    viewBox="0 0 17 17" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path fill-rule="evenodd"
                                                                                        clip-rule="evenodd"
                                                                                        d="M11.8457 0H4.34822C1.73547 0 0.0974121 1.84995 0.0974121 4.46789V11.5321C0.0974121 14.1501 1.72768 16 4.34822 16H11.8449C14.4663 16 16.0974 14.1501 16.0974 11.5321V4.46789C16.0974 1.84995 14.4663 0 11.8457 0Z"
                                                                                        fill="currentColor" />
                                                                                    <path
                                                                                        d="M5.09741 7.99978L7.09797 9.9995L11.0974 6.00006"
                                                                                        stroke="white" stroke-width="1.5"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                </svg>
                                                                            </span>
                                                                            <span
                                                                                class="mb-0 d-inline-block text-capitalize fw-medium"></span>
                                                                            <p class="mb-0"></p>
                                                                        </div>
                                                                        <div class="card-post-toolbar">
                                                                            <div class="dropdown">
                                                                                <span
                                                                                    class="dropdown-toggle material-symbols-outlined"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-haspopup="true"
                                                                                    aria-expanded="false" role="button">
                                                                                    more_horiz
                                                                                </span>
                                                                                <div class="dropdown-menu m-0 p-0">
                                                                                    <a class="dropdown-item p-3"
                                                                                        href="#">
                                                                                        <div
                                                                                            class="d-flex align-items-top">
                                                                                            <span
                                                                                                class="material-symbols-outlined">
                                                                                                save
                                                                                            </span>
                                                                                            <div class="data ms-2">
                                                                                                <h6>Save Post</h6>
                                                                                                <p class="mb-0">Add this
                                                                                                    to your
                                                                                                    saved items</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                    <a class="dropdown-item p-3"
                                                                                        href="#">
                                                                                        <div
                                                                                            class="d-flex align-items-top">
                                                                                            <span
                                                                                                class="material-symbols-outlined">
                                                                                                cancel
                                                                                            </span>
                                                                                            <div class="data ms-2">
                                                                                                <h6>Hide Post</h6>
                                                                                                <p class="mb-0">See fewer
                                                                                                    posts
                                                                                                    like this.</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                    <a class="dropdown-item p-3"
                                                                                        href="#">
                                                                                        <div
                                                                                            class="d-flex align-items-top">
                                                                                            <span
                                                                                                class="material-symbols-outlined">
                                                                                                person_remove
                                                                                            </span>
                                                                                            <div class="data ms-2">
                                                                                                <h6>Unfollow User</h6>
                                                                                                <p class="mb-0">Stop
                                                                                                    seeing
                                                                                                    posts but stay friends.
                                                                                                </p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                    <a class="dropdown-item p-3"
                                                                                        href="#">
                                                                                        <div
                                                                                            class="d-flex align-items-top">
                                                                                            <span
                                                                                                class="material-symbols-outlined">
                                                                                                notifications
                                                                                            </span>
                                                                                            <div class="data ms-2">
                                                                                                <h6>Notifications</h6>
                                                                                                <p class="mb-0">Turn on
                                                                                                    notifications for this
                                                                                                    post</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-4">
                                                            <p class="m-0">{{ $post->content }}</p>
                                                        </div>
                                                        @php
                                                            if (is_array($post->media)) {
                                                                $mediaFiles = $post->media;
                                                            } else {
                                                                $mediaFiles = json_decode($post->media, true) ?: [];
                                                            }
                                                            $count = count($mediaFiles);
                                                        @endphp

                                                        @if ($count > 0)
                                                            <div class="user-post mt-4">
                                                                <div class="row g-1">
                                                                    <div class="{{ $count > 1 ? 'col-md-6' : 'col-12' }}">
                                                                        <div class="post-media-item rounded overflow-hidden position-relative"
                                                                            style="height: 450px;">
                                                                            {{-- Use asset('storage/' . $path) for correct URL --}}
                                                                            <a data-fslightbox="gallery-{{ $post->id }}"
                                                                                href="{{ asset($mediaFiles[0]) }}">
                                                                                @php
                                                                                    $fileExtension = pathinfo(
                                                                                        $mediaFiles[0],
                                                                                        PATHINFO_EXTENSION,
                                                                                    );
                                                                                    $isVideo = in_array(
                                                                                        $fileExtension,
                                                                                        [
                                                                                            'mp4',
                                                                                            'mov',
                                                                                            'ogg',
                                                                                            'webm',
                                                                                            'qt',
                                                                                        ],
                                                                                    );
                                                                                @endphp

                                                                                @if ($isVideo)
                                                                                    <video controls muted
                                                                                        class="d-block w-100 h-100 object-cover"
                                                                                        loading="lazy">
                                                                                        <source
                                                                                            src="{{ asset($mediaFiles[0]) }}"
                                                                                            type="video/{{ $fileExtension }}">
                                                                                        Your browser does not support the
                                                                                        video tag.
                                                                                    </video>
                                                                                @else
                                                                                    <img src="{{ asset($mediaFiles[0]) }}"
                                                                                        alt="post-image"
                                                                                        class="d-block w-100 h-100 object-cover"
                                                                                        loading="lazy">
                                                                                @endif
                                                                            </a>
                                                                        </div>
                                                                    </div>

                                                                    @if ($count > 1)
                                                                        <div class="col-md-6">
                                                                            <div class="post-media-item rounded overflow-hidden position-relative"
                                                                                style="height: 250px;">
                                                                                <a data-fslightbox="gallery-{{ $post->id }}"
                                                                                    href="{{ asset($mediaFiles[1]) }}">
                                                                                    @php
                                                                                        $fileExtension = pathinfo(
                                                                                            $mediaFiles[1],
                                                                                            PATHINFO_EXTENSION,
                                                                                        );
                                                                                        $isVideo = in_array(
                                                                                            $fileExtension,
                                                                                            [
                                                                                                'mp4',
                                                                                                'mov',
                                                                                                'ogg',
                                                                                                'webm',
                                                                                                'qt',
                                                                                            ],
                                                                                        );
                                                                                    @endphp

                                                                                    @if ($isVideo)
                                                                                        <video controls muted
                                                                                            class="d-block w-100 h-100 object-cover"
                                                                                            loading="lazy">
                                                                                            <source
                                                                                                src="{{ asset($mediaFiles[1]) }}"
                                                                                                type="video/{{ $fileExtension }}">
                                                                                            Your browser does not support
                                                                                            the video tag.
                                                                                        </video>
                                                                                    @else
                                                                                        <img src="{{ asset($mediaFiles[1]) }}"
                                                                                            alt="post-image"
                                                                                            class="d-block w-100 h-100 object-cover"
                                                                                            loading="lazy">
                                                                                    @endif
                                                                                    @if ($count > 2)
                                                                                        <div class="post-overlay-count position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center text-white bg-dark bg-opacity-75"
                                                                                            style="z-index: 1;">
                                                                                            <span
                                                                                                class="font-size-28">+{{ $count - 2 }}</span>
                                                                                        </div>
                                                                                    @endif
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    @for ($i = 2; $i < $count; $i++)
                                                                        <a data-fslightbox="gallery-{{ $post->id }}"
                                                                            href="{{ asset($mediaFiles[$i]) }}"
                                                                            class="d-none"></a>
                                                                    @endfor

                                                                </div> {{-- End of .row --}}
                                                            </div> {{-- End of .user-post --}}
                                                        @endif

                                                        <div class="post-meta-likes mt-4">
                                                            <!-- User avatars who liked the post -->
                                                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                                                <ul class="list-inline m-0 p-0 post-user-liked-list">
                                                                    @foreach ($post->reactions->take(4) as $reaction)
                                                                        <li>
                                                                            <img src="{{ $reaction->user->avatar }}"
                                                                                class="rounded-circle img-fluid userimg"
                                                                                loading="lazy">
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="d-inline-flex align-items-center gap-1">
                                                                    @if ($post->reactions->count() > 0)
                                                                        <h6 class="m-0 font-size-14">
                                                                            {{ $post->reactions->first()->user->name }}
                                                                        </h6>
                                                                        @if ($post->reactions->count() > 1)
                                                                            <span
                                                                                class="text-capitalize font-size-14 fw-medium"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#likemodal{{ $post->id }}">
                                                                                and {{ $post->reactions->count() - 1 }}
                                                                                others liked this
                                                                            </span>
                                                                        @endif
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="comment-area mt-4 pt-4 border-top">
                                                            <div
                                                                class="d-flex justify-content-between align-items-center flex-wrap">
                                                                <!-- Reaction button component -->
                                                                <div class="reaction-block-{{ $post->id }}">
                                                                    <x-reaction-button :reactable="$post" />
                                                                </div>

                                                                <!-- Comment and share buttons -->
                                                                <div class="d-flex align-items-center gap-3 flex-shrink-0">
                                                                    <div class="total-comment-block"
                                                                        data-bs-toggle="collapse"
                                                                        data-bs-target="#commentcollapes{{ $post->id }}">
                                                                        <span
                                                                            class="material-symbols-outlined align-text-top font-size-20">comment</span>
                                                                        <span
                                                                            class="fw-medium cursor-pointer">Comments</span>
                                                                        @if ($post->comments->count() > 0)
                                                                            <span
                                                                                class="fw-medium">({{ $post->comments->count() }})</span>
                                                                        @endif
                                                                    </div>
                                                                    <div class="share-block">
                                                                        <a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#share-btn-{{ $post->id }}">
                                                                            <span
                                                                                class="material-symbols-outlined align-text-top font-size-20">share</span>
                                                                            <span class="ms-1 fw-medium">Share</span>
                                                                            @if ($post->shares_count > 0 ?? '')
                                                                                <span
                                                                                    class="fw-medium">({{ $post->shares_count ?? '' }})</span>
                                                                            @endif
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Comments section -->
                                                        <div class="collapse mt-4 pt-4 border-top"
                                                            id="commentcollapes{{ $post->id }}">
                                                            @if ($post->comments->count() > 0)
                                                                <ul class="list-inline m-0 p-0 comment-list">
                                                                    @foreach ($post->comments->where('parent_id', null) as $comment)
                                                                        <li class="mb-3">
                                                                            <div class="comment-list-block">
                                                                                <div
                                                                                    class="d-flex align-items-center gap-3">
                                                                                    <div
                                                                                        class="comment-list-user-img flex-shrink-0">
                                                                                        <img src="{{ $comment->user->avatar ?? 'frontend/assets/images/user/1.jpg' }}"
                                                                                            alt="userimg"
                                                                                            class="avatar-48 rounded-circle img-fluid"
                                                                                            loading="lazy">
                                                                                    </div>
                                                                                    <div class="comment-list-user-data">
                                                                                        <div
                                                                                            class="d-inline-flex align-items-center gap-1 flex-wrap">
                                                                                            <h6 class="m-0">
                                                                                                {{ $comment->user->name }}
                                                                                            </h6>
                                                                                            <span
                                                                                                class="d-inline-block text-primary">
                                                                                                <svg class="align-text-bottom"
                                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                                    width="17"
                                                                                                    height="17"
                                                                                                    viewBox="0 0 17 17"
                                                                                                    fill="none">
                                                                                                    <path
                                                                                                        fill-rule="evenodd"
                                                                                                        clip-rule="evenodd"
                                                                                                        d="M12.2483 0.216553H4.75081C2.13805 0.216553 0.5 2.0665 0.5 4.68444V11.7487C0.5 14.3666 2.13027 16.2166 4.75081 16.2166H12.2475C14.8689 16.2166 16.5 14.3666 16.5 11.7487V4.68444C16.5 2.0665 14.8689 0.216553 12.2483 0.216553Z"
                                                                                                        fill="currentColor" />
                                                                                                    <path
                                                                                                        d="M5.5 8.21627L7.50056 10.216L11.5 6.21655"
                                                                                                        stroke="white"
                                                                                                        stroke-width="1.5"
                                                                                                        stroke-linecap="round"
                                                                                                        stroke-linejoin="round" />
                                                                                                </svg>
                                                                                            </span>
                                                                                            <span
                                                                                                class="fw-medium small text-capitalize">
                                                                                                {{ $comment->created_at->diffForHumans() ?? '' }}
                                                                                            </span>
                                                                                        </div>
                                                                                        <p class="mb-1">
                                                                                            {{ $comment->content }}</p>
                                                                                        <div
                                                                                            class="comment-list-action mt-2">
                                                                                            <ul
                                                                                                class="list-inline m-0 p-0 d-flex align-items-center gap-2">
                                                                                                <li>
                                                                                                    <x-reaction-button
                                                                                                        :reactable="$comment"
                                                                                                        small="true" />
                                                                                                </li>
                                                                                                <li>
                                                                                                    <span
                                                                                                        class="fw-medium small"
                                                                                                        data-bs-toggle="collapse"
                                                                                                        data-bs-target="#subcomment-collapse-{{ $comment->id }}"
                                                                                                        role="button">
                                                                                                        Reply
                                                                                                    </span>
                                                                                                </li>
                                                                                            </ul>
                                                                                            <!-- Subcomment form -->
                                                                                            <div class="add-comment-form-block collapse mt-3"
                                                                                                id="subcomment-collapse-{{ $comment->id }}">
                                                                                                <div
                                                                                                    class="d-flex align-items-center gap-3">
                                                                                                    <div
                                                                                                        class="flex-shrink-0">

                                                                                                        <img src="{{ auth()->user()->avatar ?? 'frontend/assets/images/user/1.jpg' }}"
                                                                                                            alt="userimg"
                                                                                                            class="avatar-48 rounded-circle img-fluid"
                                                                                                            loading="lazy">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="add-comment-form">
                                                                                                        <form
                                                                                                            action="{{ route('comments.reply', $comment) }}"
                                                                                                            method="POST">
                                                                                                            @csrf
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                name="content"
                                                                                                                class="form-control"
                                                                                                                placeholder="Write a reply...">
                                                                                                            <button
                                                                                                                type="submit"
                                                                                                                class="btn btn-primary font-size-12 text-capitalize px-5">
                                                                                                                Post
                                                                                                            </button>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            @if ($comment->replies && $comment->replies->count())
                                                                                                <ul
                                                                                                    class="list-unstyled ms-4">
                                                                                                    @include(
                                                                                                        'user-interface.pages.post.partials.comment_replies',
                                                                                                        [
                                                                                                            'comments' =>
                                                                                                                $comment->replies,
                                                                                                        ]
                                                                                                    )
                                                                                                </ul>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif

                                                            <!-- Add comment form -->
                                                            <div class="add-comment-form-block">
                                                                <div class="d-flex align-items-center gap-3">
                                                                    <div class="flex-shrink-0">
                                                                        <img src="{{ auth()->user()->avatar ?? 'N/A' }}"
                                                                            alt="userimg"
                                                                            class="avatar-48 rounded-circle img-fluid"
                                                                            loading="lazy">
                                                                    </div>
                                                                    <div class="add-comment-form">
                                                                        <form
                                                                            action="{{ route('posts.comments.store', $post) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <input type="text" name="content"
                                                                                class="form-control"
                                                                                placeholder="Write a Comment...">
                                                                            <button type="submit"
                                                                                class="btn btn-primary font-size-12 text-capitalize px-5">
                                                                                Post
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- show post end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="about" role="tabpanel">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-pills basic-info-items list-inline d-block p-0 m-0" role="tablist">
                                        <li>
                                            <a class="nav-link active" href="#v-pills-basicinfo-tab"
                                                data-bs-toggle="pill" data-bs-target="#v-pills-basicinfo-tab"
                                                role="button" aria-selected="true">Contact and Basic Info</a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#v-pills-details-tab" data-bs-toggle="pill"
                                                data-bs-target="#v-pills-details-tab" role="button"
                                                aria-selected="false" tabindex="-1">Hobbies and Interests</a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#v-pills-family-tab" data-bs-toggle="pill"
                                                data-bs-target="#v-pills-family" role="button" aria-selected="false"
                                                tabindex="-1">Family and Relationship</a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#v-pills-work-tab" data-bs-toggle="pill"
                                                data-bs-target="#v-pills-work-tab" role="button" aria-selected="false"
                                                tabindex="-1">Work and Education</a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#v-pills-lived-tab" data-bs-toggle="pill"
                                                data-bs-target="#v-pills-lived-tab" role="button" aria-selected="false"
                                                tabindex="-1">Places You've Lived</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 ps-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="v-pills-basicinfo-tab" role="tabpanel"
                                            aria-labelledby="v-pills-basicinfo-tab">
                                            <h4>Personal Info</h4>
                                            <hr>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>About Me:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">Hi, I’m James, I’m 36 and I work as a Digital
                                                        Designer for the “Daydreams” Agency in Pier 56</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Email:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">Bnijohn@gmail.com</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Mobile:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">(001) 4544 565 456</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Address:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">United States of America</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Social Link:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">www.bootstrap.com</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Birth Date:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">24 January</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Birth Year:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">1994</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Birthplace:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">Austin, Texas, USA</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Lives in:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">San Francisco, California, USA</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Gender:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">Female</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Interested in:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">Designing</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>language:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">English, French</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Joined:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">April 31st, 2014</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Status:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">Married</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Phone Number:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">(044) 555 - 4369 - 8957</p>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-3">
                                                    <h6>Political Incline:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">Democrat</p>
                                                </div>
                                            </div>
                                            <h4 class="mt-2">Websites and Social Links</h4>
                                            <hr>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Website:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">www.bootstrap.com</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Social Link:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">www.bootstrap.com</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-details-tab" role="tabpanel"
                                            aria-labelledby="v-pills-details-tab">
                                            <h4 class="mt-2">Hobbies and Interests</h4>
                                            <hr>
                                            <h6 class="mb-1">Hobbies:</h6>
                                            <p>Hi, I’m Bni, I’m 26 and I work as a Web Designer for the iqonicdesign.I like
                                                to ride the bike to work, swimming, and working out. I also like reading
                                                design magazines, go to museums, and binge watching a good tv show while
                                                it’s raining outside.</p>
                                            <h6 class="mt-2 mb-1">Favourite TV Shows:</h6>
                                            <p>Breaking Good, RedDevil, People of Interest, The Running Dead, Found,
                                                American Guy.</p>
                                            <h6 class="mt-2 mb-1">Favourite Movies:</h6>
                                            <p>Idiocratic, The Scarred Wizard and the Fire Crown, Crime Squad, Ferrum Man.
                                            </p>
                                            <h6 class="mt-2 mb-1">Favourite Games:</h6>
                                            <p>The First of Us, Assassin’s Squad, Dark Assylum, NMAK16, Last Cause 4, Grand
                                                Snatch Auto.</p>
                                            <h6 class="mt-2 mb-1">Favourite Music Bands / Artists:</h6>
                                            <p>Iron Maid, DC/AC, Megablow, The Ill, Kung Fighters, System of a Revenge.</p>
                                            <h6 class="mt-2 mb-1">Favourite Books:</h6>
                                            <p>The Crime of the Century, Egiptian Mythology 101, The Scarred Wizard, Lord of
                                                the Wings, Amongst Gods, The Oracle, A Tale of Air and Water.</p>
                                            <h6 class="mt-2 mb-1">Favourite Writers:</h6>
                                            <p>Martin T. Georgeston, Jhonathan R. Token, Ivana Rowle, Alexandria Platt,
                                                Marcus Roth.</p>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-family" role="tabpanel">
                                            <h4 class="mb-3">Relationship</h4>
                                            <ul class="suggestions-lists m-0 p-0">
                                                <li class="d-flex mb-4 align-items-center">
                                                    <div class="user-img img-fluid"><span
                                                            class="material-symbols-outlined md-18">
                                                            add
                                                        </span>
                                                    </div>
                                                    <div class="media-support-info ms-3">
                                                        <h6>Add Your Relationship Status</h6>
                                                    </div>
                                                </li>
                                            </ul>
                                            <h4 class="mt-3 mb-3">Family Members</h4>
                                            <ul class="suggestions-lists m-0 p-0">
                                                <li class="d-flex mb-4 align-items-center">
                                                    <div class="user-img img-fluid"><span
                                                            class="material-symbols-outlined md-18">
                                                            add
                                                        </span>
                                                    </div>
                                                    <div class="media-support-info ms-3">
                                                        <h6>Add Family Members</h6>
                                                    </div>
                                                </li>
                                                <li class="d-flex mb-4 align-items-center justify-content-between">
                                                    <div class="user-img img-fluid"><img
                                                            src="../assets/images/user/01.jpg" alt="story-img"
                                                            class="rounded-circle avatar-40"></div>
                                                    <div class="w-100">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="ms-3">
                                                                <h6>Paul Molive</h6>
                                                                <p class="mb-0">Brother</p>
                                                            </div>
                                                            <div class="edit-relation"><a href="#"
                                                                    class="d-flex align-items-center"><span
                                                                        class="material-symbols-outlined me-2 md-18">
                                                                        edit
                                                                    </span>Edit</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between mb-4  align-items-center">
                                                    <div class="user-img img-fluid"><img
                                                            src="../assets/images/user/02.jpg" alt="story-img"
                                                            class="rounded-circle avatar-40" loading="lazy">
                                                    </div>
                                                    <div class="w-100">
                                                        <div class="d-flex flex-wrap justify-content-between">
                                                            <div class=" ms-3">
                                                                <h6>Anna Mull</h6>
                                                                <p class="mb-0">Sister</p>
                                                            </div>
                                                            <div class="edit-relation "><a href="#"
                                                                    class="d-flex align-items-center"><span
                                                                        class="material-symbols-outlined me-2 md-18">
                                                                        edit
                                                                    </span>Edit</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="d-flex mb-4 align-items-center justify-content-between">
                                                    <div class="user-img img-fluid"><img
                                                            src="../assets/images/user/03.jpg" alt="story-img"
                                                            class="rounded-circle avatar-40" loading="lazy">
                                                    </div>
                                                    <div class="w-100">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="ms-3">
                                                                <h6>Paige Turner</h6>
                                                                <p class="mb-0">Cousin</p>
                                                            </div>
                                                            <div class="edit-relation"><a href="#"
                                                                    class="d-flex align-items-center"><span
                                                                        class="material-symbols-outlined me-2 md-18">
                                                                        edit
                                                                    </span>Edit</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-work-tab" role="tabpanel"
                                            aria-labelledby="v-pills-work-tab">
                                            <h4 class="mb-3">Work</h4>
                                            <ul class="suggestions-lists m-0 p-0">
                                                <li class="d-flex justify-content-between mb-4  align-items-center">
                                                    <div class="user-img img-fluid"><span
                                                            class="material-symbols-outlined md-18">
                                                            add
                                                        </span>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h6>Add Work Place</h6>
                                                    </div>
                                                </li>
                                                <li class="d-flex mb-4 align-items-center justify-content-between">
                                                    <div class="user-img img-fluid"><img
                                                            src="../assets/images/user/01.jpg" alt="story-img"
                                                            class="rounded-circle avatar-40" loading="lazy">
                                                    </div>
                                                    <div class="w-100">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="ms-3">
                                                                <h6>Themeforest</h6>
                                                                <p class="mb-0">Web Designer</p>
                                                            </div>
                                                            <div class="edit-relation"><a href="#"
                                                                    class="d-flex align-items-center"><span
                                                                        class="material-symbols-outlined me-2 md-18">
                                                                        edit
                                                                    </span>Edit</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="d-flex mb-4 align-items-center justify-content-between">
                                                    <div class="user-img img-fluid"><img
                                                            src="../assets/images/user/02.jpg" alt="story-img"
                                                            class="rounded-circle avatar-40" loading="lazy">
                                                    </div>
                                                    <div class="w-100">
                                                        <div class="d-flex flex-wrap justify-content-between">
                                                            <div class="ms-3">
                                                                <h6>iqonicdesign</h6>
                                                                <p class="mb-0">Web Developer</p>
                                                            </div>
                                                            <div class="edit-relation"><a href="#"
                                                                    class="d-flex align-items-center"><span
                                                                        class="material-symbols-outlined me-2 md-18">
                                                                        edit
                                                                    </span>Edit</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="d-flex mb-4 align-items-center justify-content-between">
                                                    <div class="user-img img-fluid"><img
                                                            src="../assets/images/user/03.jpg" alt="story-img"
                                                            class="rounded-circle avatar-40" loading="lazy">
                                                    </div>
                                                    <div class="w-100">
                                                        <div class="d-flex flex-wrap justify-content-between">
                                                            <div class="ms-3">
                                                                <h6>W3school</h6>
                                                                <p class="mb-0">Designer</p>
                                                            </div>
                                                            <div class="edit-relation"><a href="#"
                                                                    class="d-flex align-items-center"><span
                                                                        class="material-symbols-outlined me-2 md-18">
                                                                        edit
                                                                    </span>Edit</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <h4 class="mb-3">Professional Skills</h4>
                                            <ul class="suggestions-lists m-0 p-0">
                                                <li class="d-flex mb-4 align-items-center">
                                                    <div class="user-img img-fluid"><span
                                                            class="material-symbols-outlined md-18">
                                                            add
                                                        </span>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h6>Add Professional Skills</h6>
                                                    </div>
                                                </li>
                                            </ul>
                                            <h4 class="mt-3 mb-3">College</h4>
                                            <ul class="suggestions-lists m-0 p-0">
                                                <li class="d-flex mb-4 align-items-center">
                                                    <div class="user-img img-fluid"><span
                                                            class="material-symbols-outlined md-18">
                                                            add
                                                        </span>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h6>Add College</h6>
                                                    </div>
                                                </li>
                                                <li class="d-flex mb-4 align-items-center">
                                                    <div class="user-img img-fluid"><img
                                                            src="../assets/images/user/01.jpg" alt="story-img"
                                                            class="rounded-circle avatar-40" loading="lazy">
                                                    </div>
                                                    <div class="w-100">
                                                        <div class="d-flex flex-wrap justify-content-between">
                                                            <div class="ms-3">
                                                                <h6>Lorem ipsum</h6>
                                                                <p class="mb-0">USA</p>
                                                            </div>
                                                            <div class="edit-relation"><a href="#"
                                                                    class="d-flex align-items-center"><span
                                                                        class="material-symbols-outlined me-2 md-18">
                                                                        edit
                                                                    </span>Edit</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-lived-tab" role="tabpanel"
                                            aria-labelledby="v-pills-lived-tab">
                                            <h4 class="mb-3">Current City and Hometown</h4>
                                            <ul class="suggestions-lists m-0 p-0">
                                                <li class="d-flex mb-4 align-items-center justify-content-between">
                                                    <div class="user-img img-fluid"><img
                                                            src="../assets/images/user/01.jpg" alt="story-img"
                                                            loading="lazy" class="rounded-circle avatar-40">
                                                    </div>
                                                    <div class="w-100">
                                                        <div class="d-flex flex-wrap justify-content-between">
                                                            <div class="ms-3">
                                                                <h6>Georgia</h6>
                                                                <p class="mb-0">Georgia State</p>
                                                            </div>
                                                            <div class="edit-relation"><a href="#"
                                                                    class="d-flex align-items-center"><span
                                                                        class="material-symbols-outlined me-2 md-18">
                                                                        edit
                                                                    </span>Edit</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="d-flex mb-4 align-items-center justify-content-between">
                                                    <div class="user-img img-fluid"><img
                                                            src="../assets/images/user/02.jpg" alt="story-img"
                                                            class="rounded-circle avatar-40" loading="lazy">
                                                    </div>
                                                    <div class="w-100">
                                                        <div class="d-flex flex-wrap justify-content-between">
                                                            <div class="ms-3">
                                                                <h6>Atlanta</h6>
                                                                <p class="mb-0">Atlanta City</p>
                                                            </div>
                                                            <div class="edit-relation"><a href="#"
                                                                    class="d-flex align-items-center"><span
                                                                        class="material-symbols-outlined me-2 md-18">
                                                                        edit
                                                                    </span>Edit</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <h4 class="mt-3 mb-3">Other Places Lived</h4>
                                            <ul class="suggestions-lists m-0 p-0">
                                                <li class="d-flex mb-4 align-items-center">
                                                    <div class="user-img img-fluid"><span
                                                            class="material-symbols-outlined md-18">
                                                            add
                                                        </span>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h6>Add Place</h6>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="friends" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <h2>Friends</h2>
                            <div class="friend-list-tab mt-2">
                                <ul class="nav nav-pills d-flex align-items-center justify-content-left list-item-tabs p-0 mb-2"
                                    id="friends-tab" role="tablist">
                                    <li>
                                        <a class="nav-link active" data-bs-toggle="pill" href="#pill-all-friends"
                                            data-bs-target="#all-friends" aria-selected="true" role="tab">All
                                            Friends</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" data-bs-toggle="pill" href="#pill-recently-add"
                                            data-bs-target="#recently-add" aria-selected="false" tabindex="-1"
                                            role="tab">Recently Added</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" data-bs-toggle="pill" href="#pill-closefriends"
                                            data-bs-target="#closefriends" aria-selected="false" tabindex="-1"
                                            role="tab">
                                            Close friends</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" data-bs-toggle="pill" href="#pill-home"
                                            data-bs-target="#home-town" aria-selected="false" tabindex="-1"
                                            role="tab">
                                            Home/Town</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" data-bs-toggle="pill" href="#pill-following"
                                            data-bs-target="#following" aria-selected="false" tabindex="-1"
                                            role="tab">Following</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="friends-tab-content">
                                    <div class="tab-pane fade show active" id="all-friends" role="tabpanel">
                                        <div class="card-body p-0">
                                            <div class="row">
                                                @forelse($user->friends as $friend)
                                                    <div class="col-md-6 col-lg-6 mb-3">
                                                        <div class="iq-friendlist-block">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div class="d-flex align-items-center">
                                                                    <a
                                                                        href="{{ route('user.profile.show', $friend->username) }}">
                                                                        <img src="{{ asset($friend->avatar ?? 'default-avatar.jpg') }}"
                                                                            alt="profile-img"
                                                                            class="img-fluid avatar-50 rounded-circle"
                                                                            loading="lazy">
                                                                    </a>
                                                                    <div class="friend-info ms-3">
                                                                        <h5>{{ $friend->name }}</h5>
                                                                        <p class="mb-0">
                                                                            {{ $friend->friends()->count() }} friends</p>
                                                                        @if ($friend->isOnline())
                                                                            <span class="badge bg-success">Online</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="card-header-toolbar d-flex align-items-center">
                                                                    <div class="dropdown">
                                                                        <span
                                                                            class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                            id="dropdownMenuButton{{ $loop->index }}"
                                                                            data-bs-toggle="dropdown" aria-expanded="true"
                                                                            role="button">
                                                                            <i class="material-symbols-outlined me-2">
                                                                                done
                                                                            </i> Friend
                                                                        </span>
                                                                        <div class="dropdown-menu dropdown-menu-right"
                                                                            aria-labelledby="dropdownMenuButton{{ $loop->index }}">
                                                                            <a class="dropdown-item"
                                                                                href="{{ route('user.profile.show', $friend->username) }}">
                                                                                View Profile
                                                                            </a>
                                                                            <a class="dropdown-item" href="#"
                                                                                onclick="openChatModal('{{ $friend->id }}', '{{ $friend->name }}', '{{ asset($friend->avatar ?? 'default-avatar.jpg') }}')">
                                                                                Send Message
                                                                            </a>
                                                                            <a class="dropdown-item"
                                                                                href="#">Unfollow</a>
                                                                            <a class="dropdown-item text-danger"
                                                                                href="#"
                                                                                onclick="confirmUnfriend({{ $friend->id }})">Unfriend</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="col-12 text-center py-5">
                                                        <div class="empty-state">
                                                            <span class="material-symbols-outlined"
                                                                style="font-size: 64px; color: #ccc;">
                                                                group
                                                            </span>
                                                            <h4 class="mt-3 text-muted">No Friends Yet</h4>
                                                            <p class="text-muted">Start connecting with people to build
                                                                your network!</p>
                                                            <a href="{{ route('home') }}" class="btn btn-primary">
                                                                Find Friends
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/07.jpg" alt="profile-img" class="img-fluid">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Paul Molive</h5>
                                        <p class="mb-0">10 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton03" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton03">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/08.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Gail Forcewind</h5>
                                        <p class="mb-0">20 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton04" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton04">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/09.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Paige Turner</h5>
                                        <p class="mb-0">12 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton05" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton05">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/10.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>b Frapples</h5>
                                        <p class="mb-0">6 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton06" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton06">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/13.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Walter Melon</h5>
                                        <p class="mb-0">30 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton07" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton07">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/14.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Barb Ackue</h5>
                                        <p class="mb-0">14 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton08" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton08">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/15.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Buck Kinnear</h5>
                                        <p class="mb-0">16 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton09" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton09">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/16.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Ira Membrit</h5>
                                        <p class="mb-0">22 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton10" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton10">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/17.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Shonda Leer</h5>
                                        <p class="mb-0">10 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton11" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton11">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/18.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>ock Lee</h5>
                                        <p class="mb-0">18 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton12" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton12">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/19.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Maya Didas</h5>
                                        <p class="mb-0">40 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton13" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton13">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/05.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Rick O'Shea</h5>
                                        <p class="mb-0">50 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton14" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton14">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/06.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Pete Sariya</h5>
                                        <p class="mb-0">5 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton15" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton15">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/07.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Monty Carlo</h5>
                                        <p class="mb-0">2 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton16" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton16">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/08.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Sal Monella</h5>
                                        <p class="mb-0">0 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton17" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton17">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/09.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Sue Vaneer</h5>
                                        <p class="mb-0">25 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton18" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton18">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/10.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Cliff Hanger</h5>
                                        <p class="mb-0">18 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton19" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton19">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/05.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Barb Dwyer</h5>
                                        <p class="mb-0">23 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton20" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton20">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/06.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Terry Aki</h5>
                                        <p class="mb-0">8 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton21" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton21">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/13.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Cory Ander</h5>
                                        <p class="mb-0">7 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton22" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton22">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/14.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Robin Banks</h5>
                                        <p class="mb-0">14 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton23" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton23">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/15.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Jimmy Changa</h5>
                                        <p class="mb-0">10 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton24" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton24">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/16.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Barry Wine</h5>
                                        <p class="mb-0">18 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton25" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton25">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/17.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Poppa Cherry</h5>
                                        <p class="mb-0">16 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton26" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton26">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/18.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Zack Lee</h5>
                                        <p class="mb-0">33 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton27" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton27">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/19.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Don Stairs</h5>
                                        <p class="mb-0">15 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton28" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton28">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/05.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Peter Pants</h5>
                                        <p class="mb-0">12 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton29" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton29">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/06.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Hal Appeno </h5>
                                        <p class="mb-0">13 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton30" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton30">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="recently-add" role="tabpanel">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/15.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>{{ $friend->name ?? 'Friend Name' }}</h5>
                                        <p class="mb-0">{{ $friend->friendsCount ?? 0 }} friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton35" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton35">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/16.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Holly Graham</h5>
                                        <p class="mb-0">8 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton36" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton36">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/17.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Tara Zona</h5>
                                        <p class="mb-0">5 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton37" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton37">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/18.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Barry Cade</h5>
                                        <p class="mb-0">20 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton38" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton38">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="closefriends" role="tabpanel">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/19.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Bud Wiser</h5>
                                        <p class="mb-0">32 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton39" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton39">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/05.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Otto Matic</h5>
                                        <p class="mb-0">9 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton40" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton40">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/06.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Peter Pants</h5>
                                        <p class="mb-0">2 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton41" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton41">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/07.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Zack Lee</h5>
                                        <p class="mb-0">15 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton42" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton42">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/08.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Barry Wine</h5>
                                        <p class="mb-0">36 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton43" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton43">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/09.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Robin Banks</h5>
                                        <p class="mb-0">22 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton44" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton44">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/10.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Cory Ander</h5>
                                        <p class="mb-0">18 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton45" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton45">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/15.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Moe Fugga</h5>
                                        <p class="mb-0">12 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton46" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton46">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/16.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Polly Tech</h5>
                                        <p class="mb-0">30 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton47" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton47">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/17.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Hal Appeno</h5>
                                        <p class="mb-0">25 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton48" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton48">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="home-town" role="tabpanel">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/18.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Paul Molive</h5>
                                        <p class="mb-0">14 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton49" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton49">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/19.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Paige Turner</h5>
                                        <p class="mb-0">8 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton50" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton50">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/05.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Barb Ackue</h5>
                                        <p class="mb-0">23 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton51" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton51">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/06.jpg" alt="profile-img" class="img-fluid">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Ira Membrit</h5>
                                        <p class="mb-0">16 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton52" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton52">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/07.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Maya Didas</h5>
                                        <p class="mb-0">12 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton53" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton53">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="following" role="tabpanel">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/05.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Maya Didas</h5>
                                        <p class="mb-0">20 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton54" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton54">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/06.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Monty Carlo</h5>
                                        <p class="mb-0">3 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton55" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton55">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/07.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Cliff Hanger</h5>
                                        <p class="mb-0">20 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton56" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton56">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/08.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>b Ackue</h5>
                                        <p class="mb-0">12 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton57" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton57">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/09.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Bob Frapples</h5>
                                        <p class="mb-0">12 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton58" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton58">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/10.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Anna Mull</h5>
                                        <p class="mb-0">6 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton59" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton59">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/15.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>ry Wine</h5>
                                        <p class="mb-0">15 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton60" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton60">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/16.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Don Stairs</h5>
                                        <p class="mb-0">12 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton61" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton61">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/17.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Peter Pants</h5>
                                        <p class="mb-0">8 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton62" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton62">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/18.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Polly Tech</h5>
                                        <p class="mb-0">18 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton63" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton63">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/19.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Tara Zona</h5>
                                        <p class="mb-0">30 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton64" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton64">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/05.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Arty Ficial</h5>
                                        <p class="mb-0">15 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton65" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton65">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/06.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Bill Emia</h5>
                                        <p class="mb-0">25 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton66" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton66">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/07.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Bill Yerds</h5>
                                        <p class="mb-0">9 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton67" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton67">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="iq-friendlist-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../assets/images/user/08.jpg" alt="profile-img" class="img-fluid"
                                            loading="lazy">
                                    </a>
                                    <div class="friend-info ms-3">
                                        <h5>Matt Innae</h5>
                                        <p class="mb-0">19 friends</p>
                                    </div>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                            id="dropdownMenuButton68" data-bs-toggle="dropdown" aria-expanded="true"
                                            role="button">
                                            <i class="material-symbols-outlined me-2">
                                                done
                                            </i> Friend
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton68">
                                            <a class="dropdown-item" href="#">Get
                                                Notification</a>
                                            <a class="dropdown-item" href="#">Close
                                                Friend</a>
                                            <a class="dropdown-item" href="#">Unfollow</a>
                                            <a class="dropdown-item" href="#">Unfriend</a>
                                            <a class="dropdown-item" href="#">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="tab-pane fade" id="photos" role="tabpanel">
        <div class="card">
            <div class="card-body">
                <h2>Photos</h2>
                <div class="friend-list-tab mt-2">
                    <ul class="nav nav-pills d-flex align-items-center justify-content-left list-item-tabs p-0 mb-2"
                        role="tablist">
                        <li>
                            <a class="nav-link active" data-bs-toggle="pill" href="#pill-photosofyou"
                                data-bs-target="#photosofyou" aria-selected="true" role="tab">Photos
                                of You</a>
                        </li>
                        <li>
                            <a class="nav-link" data-bs-toggle="pill" href="#pill-your-photos"
                                data-bs-target="#your-photos" aria-selected="false" tabindex="-1"
                                role="tab">Your Photos</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="photosofyou" role="tabpanel">
                            <div class="card-body p-0">
                                <div class="d-grid gap-2 d-grid-template-1fr-13">
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/51.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/51.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/52.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/52.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/53.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/53.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/54.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/54.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/55.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/55.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/56.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/56.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/57.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/57.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/58.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/58.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/59.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/59.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/60.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/60.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/61.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/61.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/62.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/62.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/63.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/63.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/64.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/64.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/65.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/65.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/51.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/51.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/52.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/52.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/53.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/53.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/54.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/54.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/55.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/55.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/56.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/56.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/57.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/57.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/58.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/58.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a href="#">
                                                <img src="../assets/images/page-img/59.jpg" class="img-fluid rounded"
                                                    alt="Responsive image" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="your-photos" role="tabpanel">
                            <div class="card-body p-0">
                                <div class="d-grid gap-2 d-grid-template-1fr-13 ">
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/51.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/51.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/52.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/52.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/53.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/53.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/54.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/54.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/55.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/55.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/56.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/56.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/57.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/57.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/58.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/58.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/59.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/59.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="user-images position-relative overflow-hidden">
                                            <a data-fslightbox="gallery" href="../assets/images/page-img/60.jpg"
                                                class="rounded">
                                                <img src="../assets/images/page-img/60.jpg" class="img-fluid rounded"
                                                    alt="photo-profile" loading="lazy">
                                            </a>
                                            <div class="image-hover-data">
                                                <div class="product-elements-icon">
                                                    <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                60 <i class="material-symbols-outlined md-14 ms-1">
                                                                    thumb_up
                                                                </i> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                30 <span class="material-symbols-outlined  md-14 ms-1">
                                                                    chat_bubble_outline
                                                                </span> </a>
                                                        </li>
                                                        <li><a href="#"
                                                                class="pe-3 text-white d-flex align-items-center">
                                                                10 <span class="material-symbols-outlined md-14 ms-1">
                                                                    forward
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="image-edit-btn material-symbols-outlined md-16"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Edit or Remove">
                                                drive_file_rename_outline
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    <!-- JavaScript for Preview -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const avatarInput = document.getElementById('avatar');
            const previewImage = document.getElementById('profilePhotoPreview');

            if (avatarInput && previewImage) {
                avatarInput.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            previewImage.src = e.target.result;
                        }
                        reader.readAsDataURL(file);
                    }
                });
            }
        });

        // Function to open chat modal
        function openChatModal(friendId, friendName, friendAvatar) {
            // Check if modal already exists
            let existingModal = document.getElementById('chatModal' + friendId);
            if (existingModal) {
                existingModal.remove();
            }

            // Create chat modal HTML
            const modalHTML = `
                <div class="modal fade" id="chatModal${friendId}" tabindex="-1" aria-labelledby="chatModalLabel${friendId}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <div class="d-flex align-items-center">
                                    <img src="${friendAvatar}" alt="${friendName}" class="avatar-40 rounded-circle me-2">
                                    <h5 class="modal-title" id="chatModalLabel${friendId}">${friendName}</h5>
                                </div>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-0">
                                <div class="chat-messages" style="height: 300px; overflow-y: auto; padding: 15px;">
                                    <div class="text-center text-muted">
                                        <span class="material-symbols-outlined">chat</span>
                                        <p>Start your conversation with ${friendName}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer p-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Type your message..." id="messageInput${friendId}">
                                    <button class="btn btn-primary" type="button" onclick="sendMessage(${friendId}, '${friendName}')">
                                        <span class="material-symbols-outlined">send</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            // Add modal to body
            document.body.insertAdjacentHTML('beforeend', modalHTML);

            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('chatModal' + friendId));
            modal.show();

            // Focus on input
            document.getElementById('messageInput' + friendId).focus();

            // Add enter key support
            document.getElementById('messageInput' + friendId).addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    sendMessage(friendId, friendName);
                }
            });

            // Remove modal from DOM when hidden
            document.getElementById('chatModal' + friendId).addEventListener('hidden.bs.modal', function() {
                this.remove();
            });
        }

        // Function to send message
        function sendMessage(friendId, friendName) {
            const messageInput = document.getElementById('messageInput' + friendId);
            const message = messageInput.value.trim();

            if (message) {
                const chatMessages = document.querySelector('#chatModal' + friendId + ' .chat-messages');

                // Add message to chat
                chatMessages.innerHTML += `
                    <div class="d-flex justify-content-end mb-2">
                        <div class="bg-primary text-white rounded p-2" style="max-width: 70%;">
                            ${message}
                        </div>
                    </div>
                `;

                // Clear input
                messageInput.value = '';

                // Scroll to bottom
                chatMessages.scrollTop = chatMessages.scrollHeight;

                // Here you would typically send the message to your backend
                // sendMessageToServer(friendId, message);
            }
        }

        // Function to confirm unfriend
        function confirmUnfriend(friendId) {
            if (confirm('Are you sure you want to unfriend this user?')) {
                // Here you would typically send an AJAX request to unfriend
                // You'll need to implement the backend route for this
                console.log('Unfriend user with ID:', friendId);
                // window.location.href = '/unfriend/' + friendId;
            }
        }
    </script>
@endsection
