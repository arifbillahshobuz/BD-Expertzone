@extends('user-interface.layout.layout')
@section('title')
    User Profile
@endsection

@section('content')
    <div class="container p-0">
        <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body profile-page p-0">
                <div class="profile-header profile-info">
                    <div class="cover-container position-relative">
                        <img src="{{ asset(optional($user->profile)->cover_photo ?? 'frontend/assets/images/page-img/profile-bg1.jpg') }}" alt="profile-bg" class="rounded img-fluid w-100" style="height: 300px; object-fit: cover;" loading="lazy">
                        @if ($isOwnProfile ?? true)
                            <ul class="header-nav list-inline d-flex flex-wrap justify-end p-0 m-0 setting-profile">
                                <li><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#coverPhotoModal">
                                    <i class="ph ph-pencil-simple fs-5"></i>
                                </a>
                                </li>
                                <li><a href="{{ route('user.edit-profile') }}">
                                    <i class="ph ph-gear-six fs-5"></i>
                                </a>
                                </li>
                            </ul>
                        @endif
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

                    <div class="user-detail text-center mb-3">
                        <div class="profile-img position-relative d-inline-block">
                            <img src="{{ asset($user->avatar ?? 'default-avatar.jpg') }}" alt="profile-img" class="avatar-130 img-fluid" loading="lazy">
                            @if ($isOwnProfile ?? true)
                            <button class="btn btn-sm bg-primary rounded-pill position-absolute" style="top: 5px; right: 5px; width: 30px; height: 30px; padding: 0;" data-bs-toggle="modal" data-bs-target="#profilePhotoModal">
                                <span class="material-symbols-outlined font-size-14 text-white m-0 d-block" style="line-height:30px;">photo_camera</span>
                            </button>
                            @endif
                        </div>

                        <!-- Profile Photo Modal -->
                        <div class="modal fade" id="profilePhotoModal" tabindex="-1" aria-labelledby="profilePhotoModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('user.update-profile-photo') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="profilePhotoModalLabel">Update Profile Photo</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3 text-start">
                                                <label for="avatar" class="form-label">Select new profile photo</label>
                                                <input type="file" class="form-control" id="avatar" name="avatar" required>
                                            </div>
                                            <div class="text-center">
                                                <img id="profilePhotoPreview" src="{{ asset($user->avatar ?? 'default-avatar.jpg') }}" class="img-fluid rounded-circle" style="width: 200px; height: 200px; object-fit: cover;">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="profile-detail mt-3">
                            <h3 class="mb-0 d-flex align-items-center justify-content-center gap-1">{{ $user->name ?? 'N/A' }} 
                                <span class="badge bg-primary rounded-pill material-symbols-outlined font-size-14 p-0">done</span>
                            </h3>
                            <span class="badge bg-success fw-500 letter-spacing-1 mt-1">{{ $user->isOnline() ? 'online' : 'offline' }}</span>
                        </div>
                    </div>
                    
                    <div class="profile-info py-5 px-md-5 px-3 d-flex align-items-center justify-content-between position-relative flex-wrap gap-4">
                        <div class="social-links">
                            <ul class="social-data-block d-flex align-items-center justify-content-between gap-3 list-inline p-0 m-0">
                                <li class="text-center">
                                    <a href="#"><img src="{{ asset('frontend/assets/images/icon/08.png') }}" class="img-fluid rounded" alt="facebook" loading="lazy"></a>
                                </li>
                                <li class="text-center">
                                    <a href="#"><img src="{{ asset('frontend/assets/images/icon/09.png') }}" class="img-fluid rounded" alt="Twitter" loading="lazy"></a>
                                </li>
                                <li class="text-center">
                                    <a href="#"><img src="{{ asset('frontend/assets/images/icon/10.png') }}" class="img-fluid rounded" alt="Instagram" loading="lazy"></a>
                                </li>
                                <li class="text-center">
                                    <a href="#"><img src="{{ asset('frontend/assets/images/icon/11.png') }}" class="img-fluid rounded" alt="Google plus" loading="lazy"></a>
                                </li>
                                <li class="text-center">
                                    <a href="#"><img src="{{ asset('frontend/assets/images/icon/12.png') }}" class="img-fluid rounded" alt="You tube" loading="lazy"></a>
                                </li>
                                <li class="text-center">
                                    <a href="#"><img src="{{ asset('frontend/assets/images/icon/13.png') }}" class="img-fluid rounded" alt="linkedin" loading="lazy"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="social-info">
                            <ul class="social-data-block social-user-meta-list d-flex align-items-center justify-content-center list-inline p-0 m-0 gap-1 flex-wrap">
                                <li class="text-center">
                                    <p class="mb-0">{{ $stats['posts_count'] }}</p>
                                    <h6 class="mb-0">Posts</h6>
                                </li>
                                <li class="text-center">
                                    <p class="mb-0">{{ $stats['followers_count'] }}</p>
                                    <h6 class="mb-0">Followers</h6>
                                </li>
                                <li class="text-center">
                                    <p class="mb-0">{{ $stats['following_count'] }}</p>
                                    <h6 class="mb-0">Following</h6>
                                </li>
                                <li class="text-center ms-3">
                                    @if (!($isOwnProfile ?? true))
                                        <div class="d-flex gap-2 justify-content-center">
                                            @if ($friendshipStatus == 'friends')
                                                <button class="btn btn-success btn-sm d-flex align-items-center gap-1" disabled>
                                                    <i class="ph ph-check-circle"></i> Friends
                                                </button>
                                                <button class="btn btn-primary btn-sm d-flex align-items-center gap-1" onclick="openChatModal('{{ $user->id }}', '{{ $user->name }}', '{{ asset($user->avatar ?? 'default-avatar.jpg') }}')">
                                                    <i class="ph ph-chat-teardrop-text"></i> Message
                                                </button>
                                            @elseif($friendshipStatus == 'request_sent')
                                                <button class="btn btn-secondary btn-sm d-flex align-items-center gap-1" disabled>
                                                    <i class="ph ph-clock"></i> Request Sent
                                                </button>
                                            @elseif($friendshipStatus == 'request_received')
                                                <button class="btn btn-success btn-sm d-flex align-items-center gap-1" onclick="acceptFriendRequest('{{ $user->id }}')">
                                                    <i class="ph ph-user-plus"></i> Accept Request
                                                </button>
                                                <button class="btn btn-outline-secondary btn-sm d-flex align-items-center gap-1" onclick="declineFriendRequest('{{ $user->id }}')">
                                                    <i class="ph ph-user-minus"></i> Decline
                                                </button>
                                            @else
                                                <button class="btn btn-primary btn-sm d-flex align-items-center gap-1" onclick="sendFriendRequest('{{ $user->id }}')">
                                                    <i class="ph ph-user-plus"></i> Add Friend
                                                </button>
                                                <button class="btn btn-outline-primary btn-sm d-flex align-items-center gap-1" onclick="openChatModal('{{ $user->id }}', '{{ $user->name }}', '{{ asset($user->avatar ?? 'default-avatar.jpg') }}')">
                                                    <i class="ph ph-chat-teardrop-text"></i> Message
                                                </button>
                                            @endif
                                        </div>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                <div class="card-header d-flex justify-content-between border-bottom">
                    <div class="header-title">
                        <h4 class="card-title">About</h4>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-inline p-0 m-0">
                        <li class="mb-3 d-flex align-items-center gap-2">
                            <i class="ph ph-user fs-3 text-primary"></i>
                            <p class="mb-0">{{ optional($user->designation)->name ?? 'Member' }}</p>
                        </li>
                        <li class="mb-3 d-flex align-items-center gap-2">
                            <i class="ph ph-shield-check fs-3 text-primary"></i>
                            <p class="mb-0">{{ $user->profile->bio ?? 'No bio available.' }}</p>
                        </li>
                        @if ($user->profile && $user->profile->present_address)
                        <li class="mb-3 d-flex align-items-center gap-2">
                            <i class="ph ph-map-pin fs-3 text-primary"></i>
                            <p class="mb-0">{{ $user->profile->present_address }}</p>
                        </li>
                        @endif
                        <li class="mb-3 d-flex align-items-center gap-2">
                            <i class="ph ph-envelope-simple fs-3 text-primary"></i>
                            <p class="mb-0"><a href="mailto:{{ $user->email }}" class="text-body">{{ $user->email }}</a></p>
                        </li>
                        <li class="d-flex align-items-center gap-2">
                            <i class="ph ph-heart-straight fs-3 text-primary"></i>
                            <p class="mb-0">{{ ucfirst($user->profile->relationship ?? 'Single') }}</p>
                        </li>
                    </ul>
                </div>
                </div>

                <div class="fixed-suggestion mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom">
                        <div class="header-title">
                            <h4 class="card-title">Photos</h4>
                        </div>
                        <div class="card-header-toolbar d-flex align-items-center">
                            @if(count($photos) > 0)
                                <p class="m-0"><a href="javascript:void(0);" onclick="document.querySelector('.profile-img-gallary a').click();">View All </a></p>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="profile-img-gallary p-0 m-0 list-unstyled">
                            @foreach($photos as $index => $photo)
                                @if($index < 9)
                                <li>
                                    <a data-fslightbox="gallery" href="{{ asset($photo['url']) }}" data-type="image">
                                        <img src="{{ asset($photo['url']) }}" class="img-fluid" alt="photo-profile" loading="lazy">
                                    </a>
                                </li>
                                @else
                                    <a data-fslightbox="gallery" href="{{ asset($photo['url']) }}" data-type="image" class="d-none"></a>
                                @endif
                            @endforeach
                            @if($photos->isEmpty())
                            <p class="text-muted w-100 text-center mb-0">No photos available.</p>
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom">
                        <div class="header-title">
                            <h4 class="card-title">Friends</h4>
                        </div>
                        <div class="card-header-toolbar d-flex align-items-center">
                            @if($user->friends->count() > 0)
                                <p class="m-0"><a href="{{ route('friends.list') }}">View All </a></p>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="profile-img-gallary p-0 m-0 list-unstyled">
                            @foreach($user->friends->take(9) as $friend)
                            <li class="text-center">
                            <a href="{{ route('user.profile.show', $friend->username) }}">
                                <img src="{{ asset($friend->avatar ?? 'default-avatar.jpg') }}" alt="gallary-image" class="img-fluid" loading="lazy">
                            </a>
                            <h6 class="mt-2 text-center text-truncate small" style="max-width: 70px;">{{ $friend->name }}</h6>
                            </li>
                            @endforeach
                            @if($user->friends->isEmpty())
                            <p class="text-muted w-100 text-center mb-0">No friends yet.</p>
                            @endif
                        </ul>
                    </div>
                </div>
                </div>
            </div>

            <div class="col-lg-8">
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
