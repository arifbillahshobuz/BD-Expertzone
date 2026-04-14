@extends('user-interface.layout.layout')

@section('title', 'Friend Requests')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-4">
                    <h2 class="mb-0">
                        <span class="material-symbols-outlined me-2">person_add</span>
                        Friend Requests
                    </h2>
                </div>

                <div class="friend-requests-container">
                    @if ($friendRequests->count() > 0)
                        <div class="row">
                            @foreach ($friendRequests as $request)
                                <div class="col-md-6 mb-3 friend-request-item" id="friend-request-{{ $request->id }}">
                                    <div class="card friend-card h-100">
                                        <div class="card-body py-3">
                                            <div class="d-flex align-items-start gap-3">
                                                <div class="position-relative">
                                                    <a href="{{ route('user.profile.show', $request->sender->username) }}"
                                                        class="text-decoration-none">
                                                        <img src="{{ asset($request->sender->avatar ?? 'frontend/assets/images/user/1.jpg') }}"
                                                            alt="{{ $request->sender->name }}"
                                                            class="avatar-48 rounded-circle object-fit-cover"
                                                            style="width:48px;height:48px">
                                                    </a>
                                                </div>
                                                <div class="flex-grow-1 min-w-0">
                                                    <div class="pe-2">
                                                        <h6 class="mb-1 text-truncate">
                                                            <a href="{{ route('user.profile.show', $request->sender->username) }}"
                                                                class="text-body">{{ $request->sender->name }}</a>
                                                        </h6>
                                                        <p class="text-muted small mb-2">
                                                            {{ $request->created_at->diffForHumans() }}
                                                        </p>
                                                    </div>
                                                    <div class="d-flex flex-wrap gap-2">
                                                        <button type="button" class="btn btn-primary btn-sm accept-friend-request-btn"
                                                            data-request-id="{{ $request->id }}">
                                                            Accept
                                                        </button>
                                                        <button type="button" class="btn btn-outline-secondary btn-sm decline-friend-request-btn"
                                                            data-request-id="{{ $request->id }}">
                                                            Decline
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="card border-0 shadow-sm">
                            <div class="card-body text-center py-5">
                                <span class="material-symbols-outlined text-muted" style="font-size: 48px;">person_add</span>
                                <h5 class="mt-3 text-muted">No Friend Requests</h5>
                                <p class="text-muted">You don't have any pending friend requests.</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        {{-- Suggested Friends (People You May Know) --}}
        @if(isset($suggestedFriends) && $suggestedFriends->count() > 0)
        <div class="row justify-content-center mt-5">
            <div class="col-lg-8">
                <div class="header-for-bg mb-4">
                    <div class="background-header position-relative">
                        <div class="data-block pb-2 border-bottom">
                            <h4>People You May Know</h4>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-sm-1 row-cols-md-2">
                    @foreach ($suggestedFriends as $user)
                        <div class="col" id="suggested-user-{{ $user->id }}">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body profile-page p-0">
                                    <div class="profile-header-image">
                                        <div class="cover-container">
                                            <img src="{{ asset('frontend/assets/images/page-img/profile-bg2.jpg') }}" alt="profile-bg" class="rounded-top img-fluid w-100" loading="lazy" style="height: 120px; object-fit: cover;">
                                        </div>
                                        <div class="profile-info p-4">
                                            <div class="user-detail">
                                                <div class="d-flex flex-wrap justify-content-between align-items-start">
                                                    <div class="profile-detail d-flex">
                                                        <div class="profile-img pe-lg-4" style="margin-top: -50px;">
                                                            <img src="{{ asset($user->avatar ?? 'frontend/assets/images/user/1.jpg') }}" alt="profile-img" loading="lazy" class="avatar-130 img-fluid rounded-circle border border-white border-3">
                                                        </div>
                                                        <div class="user-data-block mt-md-0 mt-2">
                                                            <h4>
                                                                <a href="{{ route('user.profile.show', $user->username) }}">{{ $user->name }}</a>
                                                            </h4>
                                                            <h6>{{ $user->designation->title ?? '@member' }}</h6>
                                                            <p class="mb-2 mb-lg-0">{{ Str::limit($user->bio ?? 'Say hello!', 45) }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <button type="button" class="btn btn-primary d-flex align-items-center gap-1 add-friend-btn"
                                                            onclick="sendFriendRequest('{{ $user->id }}')"
                                                            id="addFriendBtn{{ $user->id }}">
                                                            <i class="ph ph-user-plus"></i> Add Friend
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Accept friend request
            $(document).on('click', '.accept-friend-request-btn', function(e) {
                e.preventDefault();
                var btn = $(this);
                var requestId = btn.data('request-id');

                btn.prop('disabled', true);

                $.ajax({
                    url: '/friend-request/accept/' + requestId,
                    method: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#friend-request-' + requestId).fadeOut(300, function() {
                                $(this).remove();

                                // Check if there are no more requests
                                if ($('.friend-request-item').length === 0) {
                                    $('.friend-requests-container').html(`
                                <div class="card">
                                    <div class="card-body text-center py-5">
                                        <span class="material-symbols-outlined text-muted" style="font-size: 48px;">person_add</span>
                                        <h5 class="mt-3 text-muted">No Friend Requests</h5>
                                        <p class="text-muted">You don't have any pending friend requests.</p>
                                    </div>
                                </div>
                            `);
                                }
                            });

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

            // Decline friend request
            $(document).on('click', '.decline-friend-request-btn', function(e) {
                e.preventDefault();
                var btn = $(this);
                var requestId = btn.data('request-id');

                if (!confirm('Are you sure you want to decline this friend request?')) {
                    return;
                }

                btn.prop('disabled', true);

                $.ajax({
                    url: '/friend-request/decline/' + requestId,
                    method: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#friend-request-' + requestId).fadeOut(300, function() {
                                $(this).remove();

                                // Check if there are no more requests
                                if ($('.friend-request-item').length === 0) {
                                    $('.friend-requests-container').html(`
                                <div class="card">
                                    <div class="card-body text-center py-5">
                                        <span class="material-symbols-outlined text-muted" style="font-size: 48px;">person_add</span>
                                        <h5 class="mt-3 text-muted">No Friend Requests</h5>
                                        <p class="text-muted">You don't have any pending friend requests.</p>
                                    </div>
                                </div>
                            `);
                                }
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
        });
    </script>
@endpush
