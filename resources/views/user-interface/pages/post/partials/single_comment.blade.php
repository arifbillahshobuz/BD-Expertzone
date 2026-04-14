<li class="mb-2 comment-item {{ $comment->parent_id ? 'is-reply' : '' }}" id="comment-{{ $comment->id }}">
    <div class="d-flex gap-2">
        <div class="flex-shrink-0">
            @php
                $isReply = isset($comment->parent_id) && $comment->parent_id !== null;
                $avatarClass = $isReply ? 'avatar-32' : 'avatar-40';
            @endphp
            <a href="{{ route('user.profile.show', $comment->user->username ?? $comment->user->id ?? 'unknown') }}">
                <img src="{{ $comment->user->avatar ? asset($comment->user->avatar) : asset('frontend/assets/images/user/1.jpg') }}"
                    alt="userimg" class="{{ $avatarClass }} rounded-circle object-cover" loading="lazy">
            </a>
        </div>
        <div class="flex-grow-1">
            <div
                class="fb-comment-bubble {{ (isset($post) && $comment->user_id === $post->user_id) ? 'is-author' : '' }}">
                <div class="d-flex align-items-center">
                    <div class="fb-comment-name">
                        <a href="{{ route('user.profile.show', $comment->user->username ?? $comment->user->id ?? 'unknown') }}"
                            class="text-body text-decoration-none">
                            {{ $comment->user->name }}
                        </a>
                    </div>
                    @if(isset($post) && $comment->user_id === $post->user_id)
                        <span class="author-badge">Author</span>
                    @endif
                </div>
                <div class="fb-comment-text" id="comment-text-{{ $comment->id }}">{{ $comment->content }}</div>

                @if($comment->reactions->count() > 0)
                    <div class="fb-comment-reaction-summary">
                        <img src="{{ asset('frontend/assets/images/icon/01.png') }}" width="14" height="14" alt="reaction">
                        <span>{{ $comment->reactions->count() }}</span>
                    </div>
                @endif
            </div>

            <div class="fb-comment-actions d-flex align-items-center">
                {{-- Like Action --}}
                <div class="like-data" id="reaction-block-comment-{{ $comment->id }}">
                    <div class="dropdown">
                        <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" role="button">
                            <a href="javascript:void(0);">Like</a>
                        </span>
                        <div class="dropdown-menu py-1 shadow-sm border-0"
                            style="min-width: 250px; border-radius: 30px;">
                            <div class="d-flex px-2">
                                @foreach ([1, 2, 3, 4, 5, 6, 7] as $i)
                                    <form action="{{ route('reactions.react.comment', $comment->id) }}" method="POST"
                                        class="reaction-form" data-reactable-type="comment"
                                        data-reactable-id="{{ $comment->id }}">
                                        @csrf
                                        <input type="hidden" name="reaction_id" value="{{ $i }}">
                                        <button type="submit" class="btn btn-link p-1 border-0 bg-transparent reaction-btn"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="{{ ['Like', 'Love', 'Happy', 'HaHa', 'Think', 'Sad', 'Lovely'][$i - 1] }}">
                                            <img src="{{ asset('frontend/assets/images/icon/0' . $i . '.png') }}" width="24"
                                                height="24" alt="reaction">
                                        </button>
                                    </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <a href="javascript:void(0);" data-bs-toggle="collapse"
                    data-bs-target="#subcomment-collapse-{{ $comment->id }}">Reply</a>

                <span class="fb-comment-time">{{ $comment->created_at->diffForHumans(null, true) }}</span>

                @if (auth()->check() && auth()->id() === $comment->user_id)
                    <div class="ms-2 dropdown">
                        <a href="javascript:void(0);" class="text-muted" data-bs-toggle="dropdown">
                            <span class="material-symbols-outlined font-size-14">more_horiz</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                            <a class="dropdown-item py-2 delete-comment-btn" href="javascript:void(0);"
                                data-id="{{ $comment->id }}">Delete</a>
                            <a class="dropdown-item py-2 edit-comment-btn" href="javascript:void(0);"
                                data-id="{{ $comment->id }}" data-content="{{ $comment->content }}">Edit</a>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Reply Form --}}
            <div class="collapse mt-2" id="subcomment-collapse-{{ $comment->id }}">
                <div class="reply-list">
                    <div class="comment-item">
                        @auth
                            <div class="d-flex align-items-start gap-2">
                                <a
                                    href="{{ route('user.profile.show', auth()->user()->username ?? auth()->id() ?? 'unknown') }}">
                                    <img src="{{ auth()->user()->avatar ? asset(auth()->user()->avatar) : asset('frontend/assets/images/user/1.jpg') }}"
                                        alt="userimg" class="avatar-32 rounded-circle object-cover" loading="lazy">
                                </a>
                                <div class="flex-grow-1">
                                    <form class="reply-form" data-comment-id="{{ $comment->id }}"
                                        action="{{ route('comments.reply', $comment) }}" method="POST">
                                        @csrf
                                        <input type="text" name="content"
                                            class="form-control form-control-sm add-comment-input"
                                            placeholder="Write a reply..." autocomplete="off">
                                    </form>
                                    <small class="text-muted" style="font-size: 0.7rem; margin-left:12px;">Press Enter to
                                        post</small>
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>

            {{-- Nested Replies List --}}
            <ul class="list-unstyled reply-list" id="replies-for-comment-{{ $comment->id }}">
                @if ($comment->replies && $comment->replies->count())
                    @foreach ($comment->replies->sortBy('created_at') as $reply)
                        @include('user-interface.pages.post.partials.single_comment', ['comment' => $reply])
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</li>