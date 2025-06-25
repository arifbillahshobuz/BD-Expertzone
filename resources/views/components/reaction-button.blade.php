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

    // Determine the correct route based on reactable type
    $routeName = $reactable instanceof \App\Models\Post ? 'reactions.react.post' : 'reactions.react.comment';
@endphp

<div class="like-data">
    <div class="dropdown">
        @if ($userReaction)
            <form action="{{ route($routeName, $reactable) }}" method="POST" class="d-inline reaction-form">
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
                <form action="{{ route($routeName, $reactable) }}" method="POST" class="d-inline reaction-form">
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
