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

                <x-friend-requests :friendRequests="$friendRequests" />
            </div>
        </div>
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
