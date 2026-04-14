@extends('user-interface.layout.layout')

@section('title', 'Friends')

@section('content')
    <div class="header-for-bg mb-4">
        <div class="background-header position-relative">
            <img src="{{ asset('frontend/assets/images/page-img/profile-bg3.jpg') }}" class="img-fluid w-100 rounded" alt="header-bg" loading="lazy" style="height: 200px; object-fit: cover;">
            <div class="title-on-header position-absolute" style="bottom: 20px; left: 30px;">
                <div class="data-block">
                    <h2 class="text-white">Friend Lists ({{ $friendCount }})</h2>
                </div>
            </div>
        </div>
    </div>

    @if ($friendCount > 0)
        <div class="row row-cols-sm-1 row-cols-md-2">
            @foreach ($friends as $friend)
                <div class="col" id="friend-{{ $friend->id }}">
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
                                                    <img src="{{ asset($friend->avatar ?? 'frontend/assets/images/user/1.jpg') }}" alt="profile-img" loading="lazy" class="avatar-130 img-fluid rounded-circle border border-white border-3">
                                                </div>
                                                <div class="user-data-block mt-md-0 mt-2">
                                                    <h4>
                                                        <a href="{{ route('user.profile.show', $friend->username) }}">{{ $friend->name }}</a>
                                                    </h4>
                                                    <h6>{{ $friend->designation->title ?? '@member' }}</h6>
                                                    <p class="mb-2 mb-lg-0">{{ Str::limit($friend->bio ?? 'No bio available', 45) }}</p>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-2">
                                                <button type="button" class="btn btn-primary d-flex align-items-center gap-1 start-chat-btn"
                                                    data-user-id="{{ $friend->id }}"
                                                    data-user-name="{{ $friend->name }}"
                                                    data-user-avatar="{{ asset($friend->avatar ?? 'frontend/assets/images/user/1.jpg') }}"
                                                    data-online="{{ $friend->isOnline() ? '1' : '0' }}">
                                                    Message
                                                </button>
                                                <button type="button" class="btn btn-outline-danger d-flex align-items-center gap-1 remove-friend-btn"
                                                    data-friend-id="{{ $friend->id }}"
                                                    data-friend-name="{{ $friend->name }}">
                                                    Remove
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
    @else
        <div class="card">
            <div class="card-body text-center py-5">
                <span class="material-symbols-outlined text-muted" style="font-size:48px">people</span>
                <h5 class="mt-3 text-muted">No Friends Yet</h5>
                <p class="text-muted mb-4">Start connecting with people by sending friend requests!</p>
                <a href="{{ route('home') }}" class="btn btn-primary">
                    <span class="material-symbols-outlined me-1">explore</span>
                    Discover People
                </a>
            </div>
    @endif

    {{-- Suggested Friends (People You May Know) --}}
    @if(isset($suggestedFriends) && $suggestedFriends->count() > 0)
        <div class="header-for-bg mb-4 mt-5">
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
    @endif

@endsection

@push('scripts')
    <script>
        (function() {
            const csrf = $('meta[name="csrf-token"]').attr('content');

            // Open popup chat (requires popupmodal included somewhere in layout)
            $(document).on('click', '.start-chat-btn', function() {
                const btn = $(this);
                if (typeof openChatPopup === 'function') {
                    openChatPopup(
                        btn.data('user-id'),
                        btn.data('user-name'),
                        btn.data('user-avatar'),
                        btn.data('online') === 1 || btn.data('online') === '1'
                    );
                } else {
                    ToastMagic && ToastMagic.error('Chat popup not loaded');
                }
            });

            // Remove friend
            $(document).on('click', '.remove-friend-btn', function(e) {
                e.preventDefault();
                const btn = $(this);
                const id = btn.data('friend-id');
                const name = btn.data('friend-name');

                if (!confirm(`Remove ${name} from your friends?`)) return;
                btn.prop('disabled', true).addClass('disabled');

                $.ajax({
                    url: '/friends/' + id,
                    method: 'DELETE',
                    data: {
                        _token: csrf
                    },
                    success: function(r) {
                        if (r.success) {
                            const card = $('#friend-' + id);
                            card.fadeOut(250, function() {
                                $(this).remove();
                                if ($('.friend-card').length === 0) {
                                    location.reload();
                                }
                            });
                            ToastMagic && ToastMagic.success(`${name} removed.`);
                        } else {
                            alert(r.error || 'Failed to remove friend.');
                            btn.prop('disabled', false).removeClass('disabled');
                        }
                    },
                    error: function(xhr) {
                        alert((xhr.responseJSON && xhr.responseJSON.error) ||
                            'Failed to remove friend.');
                        btn.prop('disabled', false).removeClass('disabled');
                    }
                });
            });
        })();
    </script>
@endpush
