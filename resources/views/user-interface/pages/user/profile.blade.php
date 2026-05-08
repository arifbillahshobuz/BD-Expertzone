@extends('user-interface.layout.layout')
@section('title')
    User Profile
@endsection

@section('page-style')
    <style>
        .profile-header-facebook {
            background: #fff;
            border-radius: 0 0 8px 8px;
            overflow: hidden;
        }

        .profile-pic-wrapper {
            z-index: 5;
        }

        .object-cover {
            object-fit: cover;
        }

        .profile-text-wrapper h2 {
            letter-spacing: -0.5px;
        }

        .gap-x-3 {
            column-gap: 1rem;
        }

        .gap-y-1 {
            row-gap: 0.25rem;
        }

        @media (max-width: 767px) {
            .profile-pic-wrapper {
                margin-top: -60px !important;
                margin-left: auto;
                margin-right: auto;
            }

            .avatar-container {
                width: 120px !important;
                height: 120px !important;
            }

            .profile-info-section {
                text-align: center !important;
            }

            .profile-text-wrapper,
            .profile-action-wrapper {
                width: 100%;
                justify-content: center !important;
            }

            .profile-text-wrapper h2 {
                justify-content: center;
            }

            .profile-text-wrapper .d-flex {
                justify-content: center;
            }

            .profile-header-facebook .cover-container img {
                height: 200px !important;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container p-0">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body profile-page p-0">
                        <div class="profile-header-facebook">
                            {{-- Cover Photo Section --}}
                            <div class="cover-container position-relative">
                                <img src="{{ asset(optional($user->profile)->cover_photo ?? 'frontend/assets/images/page-img/profile-bg1.jpg') }}"
                                    alt="profile-bg" class="rounded img-fluid w-100"
                                    style="height: 350px; object-fit: cover;" loading="lazy">
                                @if ($isOwnProfile ?? true)
                                    <div class="position-absolute bottom-0 end-0 m-3">
                                        <button class="btn btn-light btn-sm d-flex align-items-center gap-2 shadow-sm"
                                            data-bs-toggle="modal" data-bs-target="#coverPhotoModal">
                                            <i class="ph ph-camera fs-5"></i>
                                            <span class="d-none d-md-inline">Edit cover photo</span>
                                        </button>
                                    </div>
                                @endif
                            </div>

                            {{-- Profile Info Section (Overlapping) --}}
                            <div class="profile-info-section px-4 pb-4">
                                <div class="d-flex flex-column flex-md-row align-items-end align-items-md-center gap-4">
                                    {{-- Avatar with overlapping --}}
                                    <div class="profile-pic-wrapper position-relative" style="margin-top: -80px;">
                                        <div class="avatar-container rounded-circle border border-4 border-white shadow-sm overflow-hidden"
                                            style="width: 170px; height: 170px; background: #fff;">
                                            <img src="{{ asset($user->avatar ?? 'default-avatar.jpg') }}" alt="profile-img"
                                                class="img-fluid w-100 h-100 object-cover" loading="lazy">
                                        </div>
                                        @if ($isOwnProfile ?? true)
                                            <button class="btn btn-light btn-sm rounded-circle position-absolute shadow-sm p-2"
                                                style="bottom: 10px; right: 10px;" data-bs-toggle="modal"
                                                data-bs-target="#profilePhotoModal">
                                                <i class="ph ph-camera fs-5"></i>
                                            </button>
                                        @endif
                                    </div>

                                    {{-- Name and Stats --}}
                                    <div class="profile-text-wrapper flex-grow-1 mt-3 mt-md-4 pt-2">
                                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3">
                                            <div>
                                                <h2 class="mb-1 fw-bold d-flex align-items-center gap-2">
                                                    {{ $user->name ?? 'N/A' }}
                                                    <span class="badge bg-primary rounded-circle p-1 d-inline-flex"
                                                        style="font-size: 10px;">
                                                        <i class="ph ph-check fw-bold"></i>
                                                    </span>
                                                </h2>
                                                <div class="user-stats-bar d-flex align-items-center gap-3 text-muted mb-3">
                                                    <div class="stat-item">
                                                        <span class="fw-bold text-dark">{{ number_format($stats['friends_count'] ?? 0) }}</span>
                                                        <span class="ms-1">Friends</span>
                                                    </div>
                                                    <div class="vr opacity-25" style="height: 15px;"></div>
                                                    <div class="stat-item">
                                                        <span class="fw-bold text-dark">{{ number_format($stats['followers_count'] ?? 0) }}</span>
                                                        <span class="ms-1">Followers</span>
                                                    </div>
                                                    <div class="vr opacity-25" style="height: 15px;"></div>
                                                    <div class="stat-item">
                                                        <span class="fw-bold text-dark">{{ number_format($stats['following_count'] ?? 0) }}</span>
                                                        <span class="ms-1">Following</span>
                                                    </div>
                                                </div>
                                                <div class="user-meta-details d-flex flex-wrap gap-x-4 gap-y-2 text-muted">
                                                    @if($user->designation)
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div class="bg-primary-subtle p-1 rounded-circle d-flex align-items-center justify-content-center" style="width: 24px; height: 24px;">
                                                                <i class="ph-bold ph-briefcase fs-7 text-primary"></i>
                                                            </div>
                                                            <span class="small">Expert as <strong class="text-dark">{{ $user->designation->title }}</strong></span>
                                                        </div>
                                                    @endif
                                                    @if(optional($user->profile)->present_address)
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div class="bg-success-subtle p-1 rounded-circle d-flex align-items-center justify-content-center" style="width: 24px; height: 24px;">
                                                                <i class="ph-bold ph-map-pin fs-7 text-success"></i>
                                                            </div>
                                                            <span class="small">{{ $user->profile->present_address }}</span>
                                                        </div>
                                                    @endif
                                                    @if(optional($user->profile)->education)
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div class="bg-info-subtle p-1 rounded-circle d-flex align-items-center justify-content-center" style="width: 24px; height: 24px;">
                                                                <i class="ph-bold ph-graduation-cap fs-7 text-info"></i>
                                                            </div>
                                                            <span class="small">{{ $user->profile->education }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            
                                            {{-- Action Buttons (Desktop) --}}
                                            <div class="profile-action-wrapper d-none d-md-block">
                                                @if (!($isOwnProfile ?? true))
                                                    <div class="d-flex gap-2">
                                                        @if ($friendshipStatus == 'friends')
                                                            <button class="btn btn-light d-flex align-items-center gap-2 px-3 fw-semibold border shadow-sm" disabled>
                                                                <i class="ph ph-check-circle fs-5"></i> Friends
                                                            </button>
                                                            <button class="btn btn-primary d-flex align-items-center gap-2 px-3 fw-semibold shadow-sm"
                                                                onclick="openChatModal('{{ $user->id }}', '{{ $user->name }}', '{{ asset($user->avatar ?? 'default-avatar.jpg') }}')">
                                                                <i class="ph ph-chat-teardrop-text fs-5"></i> Message
                                                            </button>
                                                        @elseif($friendshipStatus == 'request_sent')
                                                            <button class="btn btn-secondary d-flex align-items-center gap-2 px-3 fw-semibold shadow-sm" disabled>
                                                                <i class="ph ph-clock fs-5"></i> Request Sent
                                                            </button>
                                                        @elseif($friendshipStatus == 'request_received')
                                                            <button class="btn btn-primary d-flex align-items-center gap-2 px-3 fw-semibold shadow-sm"
                                                                data-request-id="{{ $activeFriendRequest->id ?? '' }}" onclick="acceptFriendRequest('{{ $user->id }}')">
                                                                <i class="ph ph-user-plus fs-5"></i> Accept Request
                                                            </button>
                                                        @else
                                                            <button class="btn btn-primary d-flex align-items-center gap-2 px-3 fw-semibold shadow-sm"
                                                                onclick="sendFriendRequest('{{ $user->id }}')">
                                                                <i class="ph ph-user-plus fs-5"></i> Add Friend
                                                            </button>
                                                            <button class="btn btn-light d-flex align-items-center gap-2 px-3 fw-semibold border shadow-sm"
                                                                onclick="openChatModal('{{ $user->id }}', '{{ $user->name }}', '{{ asset($user->avatar ?? 'default-avatar.jpg') }}')">
                                                                <i class="ph ph-chat-teardrop-text fs-5"></i> Message
                                                            </button>
                                                        @endif
                                                    </div>
                                                @else
                                                    <div class="d-flex gap-2">
                                                        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary d-flex align-items-center gap-2 px-3 fw-semibold shadow-sm">
                                                            <i class="ph ph-chart-bar fs-5"></i> Dashboard
                                                        </a>
                                                        <a href="{{ route('user.edit-profile') }}" class="btn btn-light d-flex align-items-center gap-2 px-3 fw-semibold border shadow-sm">
                                                            <i class="ph ph-pencil fs-5"></i> Edit
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Action Buttons (Mobile only) --}}
                                <div class="profile-action-wrapper d-md-none mt-4">
                                    @if (!($isOwnProfile ?? true))
                                        <div class="d-grid gap-2">
                                            @if ($friendshipStatus == 'friends')
                                                <button class="btn btn-light d-flex align-items-center justify-content-center gap-2 fw-semibold border shadow-sm" disabled>
                                                    <i class="ph ph-check-circle fs-5"></i> Friends
                                                </button>
                                                <button class="btn btn-primary d-flex align-items-center justify-content-center gap-2 fw-semibold shadow-sm"
                                                    onclick="openChatModal('{{ $user->id }}', '{{ $user->name }}', '{{ asset($user->avatar ?? 'default-avatar.jpg') }}')">
                                                    <i class="ph ph-chat-teardrop-text fs-5"></i> Message
                                                </button>
                                            @elseif($friendshipStatus == 'request_sent')
                                                <button class="btn btn-secondary d-flex align-items-center justify-content-center gap-2 fw-semibold shadow-sm" disabled>
                                                    <i class="ph ph-clock fs-5"></i> Request Sent
                                                </button>
                                            @elseif($friendshipStatus == 'request_received')
                                                <button class="btn btn-primary d-flex align-items-center justify-content-center gap-2 fw-semibold shadow-sm"
                                                    data-request-id="{{ $activeFriendRequest->id ?? '' }}" onclick="acceptFriendRequest('{{ $user->id }}')">
                                                    <i class="ph ph-user-plus fs-5"></i> Accept Request
                                                </button>
                                            @else
                                                <button class="btn btn-primary d-flex align-items-center justify-content-center gap-2 fw-semibold shadow-sm"
                                                    onclick="sendFriendRequest('{{ $user->id }}')">
                                                    <i class="ph ph-user-plus fs-5"></i> Add Friend
                                                </button>
                                                <button class="btn btn-light d-flex align-items-center justify-content-center gap-2 fw-semibold border shadow-sm"
                                                    onclick="openChatModal('{{ $user->id }}', '{{ $user->name }}', '{{ asset($user->avatar ?? 'default-avatar.jpg') }}')">
                                                    <i class="ph ph-chat-teardrop-text fs-5"></i> Message
                                                </button>
                                            @endif
                                        </div>
                                    @else
                                        <div class="d-grid gap-2">
                                            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary d-flex align-items-center justify-content-center gap-2 fw-semibold shadow-sm">
                                                <i class="ph ph-chart-bar fs-5"></i> Dashboard
                                            </a>
                                            <a href="{{ route('user.edit-profile') }}" class="btn btn-light d-flex align-items-center justify-content-center gap-2 fw-semibold border shadow-sm">
                                                <i class="ph ph-pencil fs-5"></i> Edit Profile
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="border-top mx-4"></div>


                        {{-- Modals Move Here --}}
                        <!-- Cover Photo Modal -->
                        <div class="modal fade" id="coverPhotoModal" tabindex="-1" aria-labelledby="coverPhotoModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('user.update-cover-photo') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="coverPhotoModalLabel">Update Cover Photo</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
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

                        <!-- Profile Photo Modal -->
                        <div class="modal fade" id="profilePhotoModal" tabindex="-1"
                            aria-labelledby="profilePhotoModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('user.update-profile-photo') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="profilePhotoModalLabel">Update Profile Photo</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3 text-start">
                                                <label for="avatar" class="form-label">Select new profile photo</label>
                                                <input type="file" class="form-control" id="avatar" name="avatar" required>
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
                    </div>
                </div>
            </div>
        </div>

@section('sidebar_extra')
    <li class="nav-item static-item mt-3">
        <a class="nav-link static-item disabled" href="#" tabindex="-1">
            <span class="default-icon">Profile Info</span>
            <span class="mini-icon">-</span>
        </a>
    </li>
    <li class="nav-item px-3">
        <div class="card shadow-none mb-3 bg-transparent border">
            <div class="card-header d-flex justify-content-between p-2 border-bottom">
                <div class="header-title">
                    <h6 class="card-title mb-0">About</h6>
                </div>
            </div>
            <div class="card-body p-2">
                <ul class="list-inline p-0 m-0">
                    <li class="mb-2 d-flex align-items-center gap-2">
                        <i class="ph ph-user fs-5 text-primary"></i>
                        <p class="mb-0 small">{{ optional($user->designation)->name ?? 'Member' }}</p>
                    </li>
                    <li class="mb-2 d-flex align-items-center gap-2">
                        <i class="ph ph-shield-check fs-5 text-primary"></i>
                        <p class="mb-0 small">{{ $user->profile->bio ?? 'No bio available.' }}</p>
                    </li>
                    @if ($user->profile && $user->profile->present_address)
                        <li class="mb-2 d-flex align-items-center gap-2">
                            <i class="ph ph-map-pin fs-5 text-primary"></i>
                            <p class="mb-0 small">{{ $user->profile->present_address }}</p>
                        </li>
                    @endif
                    <li class="mb-2 d-flex align-items-center gap-2">
                        <i class="ph ph-envelope-simple fs-5 text-primary"></i>
                        <p class="mb-0 small"><a href="mailto:{{ $user->email }}" class="text-body">{{ $user->email }}</a>
                        </p>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card shadow-none mb-3 bg-transparent border">
            <div class="card-header d-flex justify-content-between p-2 border-bottom">
                <div class="header-title">
                    <h6 class="card-title mb-0">Photos</h6>
                </div>
                <div class="card-header-toolbar d-flex align-items-center">
                    @if(count($photos) > 0)
                        <a href="{{ route('user.profile.photos', $user->username) }}" class="small">View All</a>
                    @endif
                </div>
            </div>
            <div class="card-body p-2">
                <ul class="profile-img-gallary p-0 m-0 list-unstyled d-flex flex-wrap gap-1">
                    @foreach($photos->take(6) as $photo)
                        <li style="width: calc(33.33% - 4px);">
                            <a data-fslightbox="gallery-sidebar" href="{{ asset($photo['url']) }}" data-type="image">
                                <img src="{{ asset($photo['url']) }}" class="img-fluid rounded" alt="photo" loading="lazy">
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="card shadow-none mb-3 bg-transparent border">
            <div class="card-header d-flex justify-content-between p-2 border-bottom">
                <div class="header-title">
                    <h6 class="card-title mb-0">Friends</h6>
                </div>
                <div class="card-header-toolbar d-flex align-items-center">
                    @if($user->friends->count() > 0)
                        <a href="{{ route('friends.list') }}" class="small">View All</a>
                    @endif
                </div>
            </div>
            <div class="card-body p-2">
                <ul class="profile-img-gallary p-0 m-0 list-unstyled d-flex flex-wrap gap-1">
                    @foreach($user->friends->take(6) as $friend)
                        <li class="text-center" style="width: calc(33.33% - 4px);">
                            <a href="{{ route('user.profile.show', $friend->username) }}">
                                <img src="{{ asset($friend->avatar ?? 'default-avatar.jpg') }}" alt="friend" class="img-fluid rounded" loading="lazy">
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </li>
@endsection

        <div class="row">
            {{-- Main Content (Full width since sidebars are in the sidebar) --}}
            <div class="col-lg-12">
                @if ($isOwnProfile)
                    @include('user-interface.pages.post.add-post')
                @endif

                <div class="social-post-container">
                    @forelse ($posts as $post)
                        @include('user-interface.pages.post.show-post', ['post' => $post])
                    @empty
                        <div class="col-sm-12 text-center py-5">
                            <div class="empty-state">
                                <span class="material-symbols-outlined" style="font-size: 64px; color: #ccc;">
                                    article
                                </span>
                                <h4 class="mt-3 text-muted">No Posts Yet</h4>
                                <p class="text-muted">When {{ $user->name }} posts something, it will appear here.</p>
                            </div>
                        </div>
                    @endforelse
                    <div class="mt-3">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Preview -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const avatarInput = document.getElementById('avatar');
            const previewImage = document.getElementById('profilePhotoPreview');

            if (avatarInput && previewImage) {
                avatarInput.addEventListener('change', function (event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();

                        reader.onload = function (e) {
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
            document.getElementById('messageInput' + friendId).addEventListener('keypress', function (e) {
                if (e.key === 'Enter') {
                    sendMessage(friendId, friendName);
                }
            });

            // Remove modal from DOM when hidden
            document.getElementById('chatModal' + friendId).addEventListener('hidden.bs.modal', function () {
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