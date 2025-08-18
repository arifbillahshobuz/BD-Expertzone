@props(['friendRequests'])

<div class="friend-requests-container">
    @if ($friendRequests && $friendRequests->count() > 0)
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <span class="material-symbols-outlined me-2">person_add</span>
                    Friend Requests ({{ $friendRequests->count() }})
                </h5>
            </div>
            <div class="card-body p-0">
                @foreach ($friendRequests as $request)
                    <div class="friend-request-item border-bottom p-3" id="friend-request-{{ $request->id }}">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <img src="{{ asset($request->sender->avatar ?? 'frontend/assets/images/user/1.jpg') }}"
                                    alt="{{ $request->sender->name }}" class="avatar-48 rounded-circle img-fluid">
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1">{{ $request->sender->name }}</h6>
                                <p class="text-muted small mb-2">
                                    Sent {{ $request->created_at->diffForHumans() }}
                                </p>
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-primary btn-sm accept-friend-request-btn"
                                        data-request-id="{{ $request->id }}">
                                        <span class="material-symbols-outlined me-1"
                                            style="font-size: 16px;">check</span>
                                        Accept
                                    </button>
                                    <button type="button"
                                        class="btn btn-outline-secondary btn-sm decline-friend-request-btn"
                                        data-request-id="{{ $request->id }}">
                                        <span class="material-symbols-outlined me-1"
                                            style="font-size: 16px;">close</span>
                                        Decline
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-body text-center py-5">
                <span class="material-symbols-outlined text-muted" style="font-size: 48px;">person_add</span>
                <h5 class="mt-3 text-muted">No Friend Requests</h5>
                <p class="text-muted">You don't have any pending friend requests.</p>
            </div>
        </div>
    @endif
</div>
