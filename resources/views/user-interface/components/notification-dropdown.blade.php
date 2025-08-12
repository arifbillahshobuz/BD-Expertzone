<!-- Notification Dropdown -->
<div class="dropdown">
    <button class="btn btn-outline-secondary position-relative" type="button" id="notificationDropdown"
        data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-bell"></i>
        @if (auth()->user()->unreadNotifications->count() > 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ auth()->user()->unreadNotifications->count() }}
                <span class="visually-hidden">unread notifications</span>
            </span>
        @endif
    </button>

    <ul class="dropdown-menu dropdown-menu-end notification-dropdown" aria-labelledby="notificationDropdown"
        style="width: 350px; max-height: 400px; overflow-y: auto;">
        <li class="dropdown-header d-flex justify-content-between align-items-center">
            <span>Notifications</span>
            @if (auth()->user()->unreadNotifications->count() > 0)
                <button class="btn btn-sm btn-link text-primary p-0" onclick="markAllAsRead()">
                    Mark all as read
                </button>
            @endif
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>

        @forelse(auth()->user()->notifications()->take(10)->get() as $notification)
            <li class="notification-item {{ $notification->read_at ? '' : 'bg-light' }}">
                <a class="dropdown-item py-2" href="{{ $notification->data['url'] ?? '#' }}"
                    onclick="markAsRead('{{ $notification->id }}')">
                    <div class="d-flex align-items-start">
                        @if (isset($notification->data['user_avatar']) && $notification->data['user_avatar'])
                            <img src="{{ asset($notification->data['user_avatar']) }}" class="rounded-circle me-2"
                                width="40" height="40" alt="{{ $notification->data['user_name'] ?? 'User' }}">
                        @else
                            <img src="{{ asset('default-avatar.jpg') }}" class="rounded-circle me-2" width="40"
                                height="40" alt="User">
                        @endif

                        <div class="flex-grow-1">
                            <div class="notification-content">
                                {{ $notification->data['message'] ?? 'New notification' }}
                            </div>

                            @if (isset($notification->data['content']) ||
                                    isset($notification->data['comment_content']) ||
                                    isset($notification->data['reply_content']))
                                <div class="text-muted small mt-1">
                                    "{{ $notification->data['content'] ?? ($notification->data['comment_content'] ?? ($notification->data['reply_content'] ?? '')) }}"
                                </div>
                            @endif

                            <div class="text-muted small mt-1">
                                {{ $notification->created_at->diffForHumans() }}
                            </div>
                        </div>

                        @if (!$notification->read_at)
                            <div class="text-primary">
                                <i class="fas fa-circle" style="font-size: 8px;"></i>
                            </div>
                        @endif
                    </div>
                </a>
            </li>
        @empty
            <li class="dropdown-item text-center text-muted py-3">
                No notifications yet
            </li>
        @endforelse

        @if (auth()->user()->notifications->count() > 10)
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <a class="dropdown-item text-center text-primary" href="{{ route('notifications.all') ?? '#' }}">
                    View all notifications
                </a>
            </li>
        @endif
    </ul>
</div>

<style>
    .notification-dropdown {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .notification-item:hover {
        background-color: #f8f9fa !important;
    }

    .notification-content {
        font-size: 14px;
        line-height: 1.4;
    }

    .notification-item .dropdown-item {
        white-space: normal;
        word-wrap: break-word;
    }
</style>

<script>
    function markAsRead(notificationId) {
        fetch(`/notifications/mark-read/${notificationId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json',
                }
            }).then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update the notification count
                    updateNotificationCount();
                }
            });
    }

    function markAllAsRead() {
        fetch('/notifications/mark-read', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json',
                }
            }).then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Reload the page to update the notification dropdown
                    location.reload();
                }
            });
    }

    function updateNotificationCount() {
        // You can implement this to update the count without page reload
        setTimeout(() => {
            location.reload();
        }, 1000);
    }
</script>
