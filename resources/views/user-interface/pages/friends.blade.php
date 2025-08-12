@extends('user-interface.layout.layout')

@section('title', 'Friends')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h2 class="mb-0 d-flex align-items-center gap-2">
                        <span class="material-symbols-outlined">people</span>
                        My Friends ({{ $friendCount }})
                    </h2>
                    <div class="d-flex gap-2">
                        <a href="{{ route('friend.requests') }}" class="btn btn-outline-primary">
                            <span class="material-symbols-outlined me-1">person_add</span>
                            Friend Requests
                        </a>
                    </div>
                </div>

                @if ($friendCount > 0)
                    <div class="row">
                        @foreach ($friends as $friend)
                            <div class="col-md-6 mb-3" id="friend-{{ $friend->id }}">
                                <div class="card friend-card h-100">
                                    <div class="card-body py-3">
                                        <div class="d-flex align-items-start gap-3">
                                            <div class="position-relative">
                                                <a href="{{ route('user.profile.show', $friend->username) }}"
                                                    class="text-decoration-none">
                                                    <img src="{{ asset($friend->avatar ?? 'default-avatar.jpg') }}"
                                                        alt="{{ $friend->name }}"
                                                        class="avatar-48 rounded-circle object-fit-cover"
                                                        style="width:48px;height:48px">
                                                </a>
                                                @if ($friend->isOnline())
                                                    <span
                                                        class="position-absolute bottom-0 end-0 translate-middle p-1 bg-success border border-light rounded-circle"></span>
                                                @endif
                                            </div>
                                            <div class="flex-grow-1 min-w-0">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div class="pe-2">
                                                        <h6 class="mb-1 text-truncate">
                                                            <a href="{{ route('user.profile.show', $friend->username) }}"
                                                                class="text-body">{{ $friend->name }}</a>
                                                            <small class="text-muted">@{{ $friend - > username }}</small>
                                                        </h6>
                                                        <p class="text-muted small mb-2">
                                                            @if ($friend->isOnline())
                                                                <span class="badge bg-success">Online</span>
                                                            @else
                                                                <span class="text-muted">Last seen
                                                                    {{ $friend->last_seen ? $friend->last_seen->diffForHumans() : 'Unknown' }}</span>
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-wrap gap-2">
                                                    <button type="button"
                                                        class="btn btn-primary btn-sm d-flex align-items-center gap-1 start-chat-btn"
                                                        data-user-id="{{ $friend->id }}"
                                                        data-user-name="{{ $friend->name }}"
                                                        data-user-avatar="{{ asset($friend->avatar ?? 'default-avatar.jpg') }}"
                                                        data-online="{{ $friend->isOnline() ? '1' : '0' }}">
                                                        <span class="material-symbols-outlined"
                                                            style="font-size:16px">chat</span>
                                                        Chat
                                                    </button>
                                                    <a href="{{ route('messenger.index') }}?user={{ $friend->id }}"
                                                        class="btn btn-outline-secondary btn-sm d-flex align-items-center gap-1">
                                                        <span class="material-symbols-outlined"
                                                            style="font-size:16px">forum</span>
                                                        Inbox
                                                    </a>
                                                    <button type="button"
                                                        class="btn btn-outline-danger btn-sm d-flex align-items-center gap-1 remove-friend-btn"
                                                        data-friend-id="{{ $friend->id }}"
                                                        data-friend-name="{{ $friend->name }}">
                                                        <span class="material-symbols-outlined"
                                                            style="font-size:16px">person_remove</span>
                                                        Remove
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
                    </div>
                @endif
            </div>
        </div>
    </div>
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
