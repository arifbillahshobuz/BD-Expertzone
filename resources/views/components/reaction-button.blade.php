@props([
    'reactable', // Can be a Post or Comment
])

@php
    $userReaction = $reactable->getUserReaction();
    $reactionCounts = $reactable->getReactionCounts();
    $totalReactions = $reactionCounts->sum(function ($reaction) {
        return $reaction['count'];
    });
    $allReactions = \App\Models\Reaction::all();
    $reactableType = $reactable instanceof \App\Models\Post ? 'post' : 'comment';
    $reactableId = $reactable->id;
    $routeName = $reactable instanceof \App\Models\Post ? 'reactions.react.post' : 'reactions.react.comment';
@endphp

<div class="like-data" id="reaction-block-{{ $reactableType }}-{{ $reactableId }}">
    <div class="dropdown">
        @if ($userReaction)
            <form action="{{ route($routeName, $reactable) }}" method="POST" class="d-inline reaction-form"
                data-reactable-type="{{ $reactableType }}" data-reactable-id="{{ $reactableId }}" data-unreact="1">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-link p-0 border-0 bg-transparent">
                    <img src="{{ asset($userReaction->reaction->icon_path) }}" width="20" height="20"
                        alt="{{ $userReaction->reaction->display_name }}" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="{{ $userReaction->reaction->display_name }}">
                    <span class="fw-medium reaction-count">{{ $totalReactions }}</span>
                </button>
            </form>
        @else
            <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                role="button">
                <img src="{{ asset('frontend/assets/images/icon/01.png') }}" width="20" height="20"
                    alt="Like" data-bs-toggle="tooltip" data-bs-placement="top" title="Like">
                <span class="fw-medium reaction-count">{{ $totalReactions }}</span>
            </span>
        @endif

        <div class="dropdown-menu py-2 shadow">
            @foreach ($allReactions as $reaction)
                <form action="{{ route($routeName, $reactable) }}" method="POST" class="d-inline reaction-form"
                    data-reactable-type="{{ $reactableType }}" data-reactable-id="{{ $reactableId }}">
                    @csrf
                    <input type="hidden" name="reaction_id" value="{{ $reaction->id }}">
                    <button type="submit" class="ms-2 me-2 btn btn-link p-0 border-0 bg-transparent"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $reaction->display_name }}">
                        <img src="{{ asset($reaction->icon_path) }}" width="20" height="20"
                            alt="{{ $reaction->display_name }}">
                    </button>
                </form>
            @endforeach
        </div>
    </div>
</div>

<script>
    // Only bind the handler once per page load
    if (!window.__reactionHandlerBound) {
        $(document).on('submit', '.reaction-form', function(e) {
            e.preventDefault();
            var $form = $(this);
            var url = $form.attr('action');
            var data = $form.serialize();
            var reactableType = $form.data('reactable-type');
            var reactableId = $form.data('reactable-id');
            var blockId = '#reaction-block-' + reactableType + '-' + reactableId;

            $.ajax({
                url: url,
                type: 'POST', // Always POST for Laravel
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.html) {
                        $(blockId).replaceWith(response.html);
                        // Re-initialize tooltips
                        if (window.bootstrap) {
                            var tooltipTriggerList = [].slice.call(document.querySelectorAll(
                                '[data-bs-toggle="tooltip"]'));
                            tooltipTriggerList.map(function(tooltipTriggerEl) {
                                return new bootstrap.Tooltip(tooltipTriggerEl);
                            });
                        }
                    } else {
                        location.reload();
                    }
                },
                error: function(xhr) {
                    // Show validation error if present
                    if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                        let msg = Object.values(xhr.responseJSON.errors).join('\n');
                        alert(msg);
                    } else {
                        alert('Something went wrong!');
                    }
                }
            });
        });
        window.__reactionHandlerBound = true;
    }
</script>
