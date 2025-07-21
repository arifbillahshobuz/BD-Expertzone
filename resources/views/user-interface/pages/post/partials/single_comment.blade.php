<li class="mb-3 comment-item">
    <div class="comment-list-block">
        <div class="d-flex align-items-center gap-3">
            <div class="comment-list-user-img flex-shrink-0">
                <img src="{{ $comment->user->avatar ?? '/frontend/assets/images/user/1.jpg' }}" alt="userimg"
                    class="avatar-48 rounded-circle img-fluid" loading="lazy">
            </div>
            <div class="comment-list-user-data">
                <div class="d-inline-flex align-items-center gap-1 flex-wrap">
                    <h6 class="m-0">{{ $comment->user->name }}</h6>
                    <span class="d-inline-block text-primary"></span>
                    <span
                        class="fw-medium small text-capitalize">{{ $comment->created_at->diffForHumans() ?? '' }}</span>
                </div>
            </div>
            <div class="ms-auto">
                <div class="dropdown">
                    <button type="button" class="dropdown-toggle material-symbols-outlined comment-action-btn"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        aria-label="Comment actions"
                        style="background:none;border:none;padding:0;cursor:pointer;">more_horiz</button>
                    <div class="dropdown-menu m-0 p-0">
                        <a class="dropdown-item p-3 delete-comment-btn d-flex align-items-start gap-3" href="#"
                            data-id="{{ $comment->id }}"
                            data-type="{{ $comment->parent_id ? ($comment->parent->parent_id ? 'subreply' : 'reply') : 'comment' }}">
                            <span class="material-symbols-outlined fs-3 text-danger flex-shrink-0">delete</span>
                            <span>
                                <span class="fw-bold d-block">Delete
                                    {{ $comment->parent_id ? ($comment->parent->parent_id ? 'Subreply' : 'Reply') : 'Comment' }}</span>
                                <span class="text-muted small">Remove this
                                    {{ $comment->parent_id ? ($comment->parent->parent_id ? 'subreply' : 'reply') : 'comment' }}
                                    permanently.</span>
                            </span>
                        </a>
                        <a class="dropdown-item p-3 hide-comment-btn d-flex align-items-start gap-3" href="#"
                            data-id="{{ $comment->id }}"
                            data-type="{{ $comment->parent_id ? ($comment->parent->parent_id ? 'subreply' : 'reply') : 'comment' }}">
                            <span
                                class="material-symbols-outlined fs-3 text-secondary flex-shrink-0">visibility_off</span>
                            <span>
                                <span class="fw-bold d-block">Hide
                                    {{ $comment->parent_id ? ($comment->parent->parent_id ? 'Subreply' : 'Reply') : 'Comment' }}</span>
                                <span class="text-muted small">See fewer
                                    {{ $comment->parent_id ? ($comment->parent->parent_id ? 'subreplies' : 'replies') : 'comments' }}
                                    like this.</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="comment-list-user-comment">
            <div class="comment-list-comment">{{ $comment->content }}</div>
            <div class="comment-list-action mt-2">
                <ul class="list-inline m-0 p-0 d-flex align-items-center gap-2">
                    <li>
                        <x-reaction-button :reactable="$comment" />
                    </li>
                    <li>
                        <span class="fw-medium small" data-bs-toggle="collapse"
                            data-bs-target="#subcomment-collapse-{{ $comment->id }}" role="button">Reply</span>
                    </li>
                </ul>
                <div class="add-comment-form-block collapse mt-3" id="subcomment-collapse-{{ $comment->id }}">
                    <div class="d-flex align-items-center gap-3">
                        <div class="flex-shrink-0">
                            <img src="{{ auth()->user()->avatar ?? '/frontend/assets/images/user/1.jpg' }}"
                                alt="userimg" class="avatar-48 rounded-circle img-fluid" loading="lazy">
                        </div>
                        <div class="add-comment-form">
                            <form class="reply-form" data-comment-id="{{ $comment->id }}"
                                action="{{ route('comments.reply', $comment) }}" method="POST">
                                @csrf
                                <input type="text" name="content" class="form-control"
                                    placeholder="Write a Comment...">
                                <button type="submit"
                                    class="btn btn-primary font-size-12 text-capitalize px-5">Post</button>
                            </form>
                        </div>
                    </div>
                </div>
                <ul class="list-unstyled ms-4" id="replies-for-comment-{{ $comment->id }}">
                    @if ($comment->replies && $comment->replies->count())
                        @foreach ($comment->replies as $reply)
                            @include('user-interface.pages.post.partials.single_comment', [
                                'comment' => $reply,
                            ])
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</li>
