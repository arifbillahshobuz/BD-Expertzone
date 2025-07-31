@if ($loop->first)
    <ul id="main-comment-list" class="list-unstyled">
@endif

@foreach ($comments as $comment)
    <li class="mb-3">
        <div class="comment-list-block">
            <div class="d-flex align-items-center gap-3">
                <div class="comment-list-user-img flex-shrink-0">
                    <img src="{{ $comment->user->avatar ?? '/frontend/assets/images/user/1.jpg' }}" alt="userimg"
                        class="avatar-48 rounded-circle img-fluid" loading="lazy">
                </div>
                <div class="comment-list-user-data">
                    <div class="d-inline-flex align-items-center gap-1 flex-wrap">
                        <h6 class="m-0">{{ $comment->user->name }}</h6>
                        <span class="d-inline-block text-primary">
                            <!-- SVG icon here -->
                        </span>
                        <span
                            class="fw-medium small text-capitalize">{{ $comment->created_at->diffForHumans() ?? '' }}</span>
                    </div>
                </div>
                <div class="ms-auto" style="margin-right:10px;">
                    <div class="dropdown">
                        <span class="dropdown-toggle material-symbols-outlined" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" role="button">more_horiz</span>
                        <div class="dropdown-menu m-0 p-0">
                            <a class="dropdown-item p-3 delete-comment-btn" href="#"
                                data-comment-id="{{ $comment->id }}">
                                <div class="d-flex align-items-top">
                                    <span class="material-symbols-outlined">delete</span>
                                    <div class="data ms-2">
                                        <h6>Delete Comment</h6>
                                        <p class="mb-0">Remove this comment</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item p-3 hide-comment-btn" href="#"
                                data-comment-id="{{ $comment->id }}">
                                <div class="d-flex align-items-top">
                                    <span class="material-symbols-outlined">visibility_off</span>
                                    <div class="data ms-2">
                                        <h6>Hide Comment</h6>
                                        <p class="mb-0">Hide this comment</p>
                                    </div>
                                </div>
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
                    <ul class="list-unstyled ms-4" id="replies-for-comment-{{ $comment->id }}">
                        @if ($comment->replies && $comment->replies->count())
                            @foreach ($comment->replies as $reply)
                                @include('user-interface.pages.post.partials.comment_replies', [
                                    'comments' => collect([$reply]),
                                ])
                            @endforeach
                        @endif
                        <li class="reply-input-li">
                            <div class="add-comment-form-block collapse mt-3"
                                id="subcomment-collapse-{{ $comment->id }}">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="flex-shrink-0">
                                        <img src="{{ auth()->user()->avatar ?? '' }}" alt="userimg"
                                            class="avatar-48 rounded-circle img-fluid" loading="lazy">
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
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </li>
@endforeach

@if ($loop->last)
    </ul>
@endif
