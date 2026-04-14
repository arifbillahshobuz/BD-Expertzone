<div class="row">
    @forelse($comments as $comment)
        <div class="col-12 mb-4">
            <div class="card card-block card-stretch card-height p-4">
                <div class="d-flex align-items-center mb-2">
                    <img src="{{ asset($comment->user->avatar ?? 'frontend/assets/images/user/1.jpg') }}"
                        class="avatar-40 rounded-circle img-fluid me-3" loading="lazy">
                    <div>
                        <h6 class="mb-0">{{ $comment->user->name ?? 'Someone' }}</h6>
                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                    <span class="ms-auto text-muted small bg-light-subtle px-2 py-1 rounded">Commented on a post</span>
                </div>
                <div class="mt-2" style="margin-left: 55px;">
                    <p class="mb-3">{{ $comment->content }}</p>
                    <a href="{{ route('posts.show', $comment->post_id) }}#comment-{{ $comment->id }}"
                        class="btn btn-sm btn-outline-primary rounded-pill px-3">View Post</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="card card-block card-stretch card-height mb-4">
                <div class="card-body text-center p-5">
                    <h5 class="text-muted">No comments found matching your search.</h5>
                </div>
            </div>
        </div>
    @endforelse
</div>