<style>
    /* Custom styles for post media items to ensure consistent sizing and object-fit */
    .post-media-item {
        background-color: #eee;
        height: 250px;
        /* Fixed height for consistency */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .post-media-item img,
    .post-media-item video {
        width: 100%;
        height: 100%;
        /* FOR FEED DISPLAY: Use 'cover' to fill the area, cropping if aspect ratio doesn't match */
        object-fit: cover;
        display: block;
    }

    .post-overlay-count {
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .post-overlay-count:hover {
        background-color: rgba(0, 0, 0, 0.85) !important;
    }

    /* FsLightbox specific styles for full size video/image in lightbox */
    /* FOR LIGHTBOX: Use 'contain' to show the full frame, with letterboxing if aspect ratio doesn't match */
    .fslightbox-source.fslightbox-video,
    .fslightbox-source.fslightbox-image {
        /* Apply to both video and image in lightbox */
        object-fit: contain !important;
        width: auto !important;
        height: auto !important;
        max-width: 100% !important;
        max-height: 100% !important;
    }


    .stylish-toggle-btn {
        background: linear-gradient(90deg, #f8fafc 0%, #e9ecef 100%);
        border: 1px solid #e0e0e0;
        color: #222;
        transition: background 0.2s, box-shadow 0.2s, color 0.2s;
        font-size: 1rem;
        box-shadow: 0 2px 8px 0 rgba(60, 72, 88, 0.06);
        letter-spacing: 0.01em;
    }

    .stylish-toggle-btn:hover,
    .stylish-toggle-btn:focus {
        background: linear-gradient(90deg, #e3e9f7 0%, #f1f3f6 100%);
        color: #1976d2;
        border-color: #b6c2d2;
        box-shadow: 0 4px 16px 0 rgba(25, 118, 210, 0.10);
        outline: none;
    }

    .stylish-toggle-btn .material-symbols-outlined {
        font-size: 1.3em;
        vertical-align: middle;
        color: inherit;
        transition: color 0.2s;
    }
</style>

<div class="row social-post-container">
    @foreach ($posts as $post)
        <div class="col-sm-12 social-post">
            <div class="card card-block card-stretch card-height">
                <div class="card-body">
                    <div class="user-post-data">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="me-3 flex-shrik-0">
                                {{-- Use asset('storage/') for user avatar, with a default fallback --}}
                                <img src="{{ asset($post->user->avatar ?? 'frontend/assets/images/user/1.jpg') }}"
                                    alt="userimg" class="avatar-48 rounded-circle img-fluid" loading="lazy">
                            </div>

                            <div class="w-100">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        {{-- Check if user relationship exists before accessing name --}}
                                        <h6 class="mb-0 d-inline-block ">{{ $post->user->name ?? 'Unknown User' }}</h6>
                                        <span class="d-inline-block text-primary">
                                            <svg class="align-text-bottom" width="17" height="17"
                                                viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.8457 0H4.34822C1.73547 0 0.0974121 1.84995 0.0974121 4.46789V11.5321C0.0974121 14.1501 1.72768 16 4.34822 16H11.8449C14.4663 16 16.0974 14.1501 16.0974 11.5321V4.46789C16.0974 1.84995 14.4663 0 11.8457 0Z"
                                                    fill="currentColor" />
                                                <path d="M5.09741 7.99978L7.09797 9.9995L11.0974 6.00006" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                        <span class="mb-0 d-inline-block text-capitalize fw-medium"></span>
                                        <p class="mb-0"></p>
                                    </div>
                                    <div class="card-post-toolbar">
                                        <div class="dropdown">
                                            <span class="dropdown-toggle material-symbols-outlined"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                role="button">
                                                more_horiz
                                            </span>
                                            <div class="dropdown-menu m-0 p-0">
                                                <a class="dropdown-item p-3" href="#">
                                                    <div class="d-flex align-items-top">
                                                        <span class="material-symbols-outlined">save</span>
                                                        <div class="data ms-2">
                                                            <h6>Save Post</h6>
                                                            <p class="mb-0">Add this to your saved items</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item p-3" href="#">
                                                    <div class="d-flex align-items-top">
                                                        <span class="material-symbols-outlined">cancel</span>
                                                        <div class="data ms-2">
                                                            <h6>Hide Post</h6>
                                                            <p class="mb-0">See fewer posts like this.</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item p-3" href="#">
                                                    <div class="d-flex align-items-top">
                                                        <span class="material-symbols-outlined">person_remove</span>
                                                        <div class="data ms-2">
                                                            <h6>Unfollow User</h6>
                                                            <p class="mb-0">Stop seeing posts but stay friends.</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item p-3" href="#">
                                                    <div class="d-flex align-items-top">
                                                        <span class="material-symbols-outlined">notifications</span>
                                                        <div class="data ms-2">
                                                            <h6>Notifications</h6>
                                                            <p class="mb-0">Turn on notifications for this post</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="m-0">{{ $post->content }}</p>
                    </div>

                    @php
                        // Assuming $post->media is a JSON string of paths or an array of paths
                        if (is_array($post->media)) {
                            $mediaFiles = $post->media;
                        } else {
                            $mediaFiles = json_decode($post->media, true) ?: [];
                        }
                        $count = count($mediaFiles);
                    @endphp

                    @if ($count > 0)
                        <div class="user-post mt-4">
                            <div class="row g-1">
                                {{-- First media item --}}
                                <div class="{{ $count > 1 ? 'col-md-6' : 'col-12' }}">
                                    <div class="post-media-item rounded overflow-hidden position-relative"
                                        style="height: 250px;">
                                        {{-- CRITICAL FIX: Use asset('storage/' . $path) for correct URL --}}
                                        <a data-fslightbox="gallery-{{ $post->id }}"
                                            href="{{ asset($mediaFiles[0]) }}">
                                            @php
                                                $fileExtension = pathinfo($mediaFiles[0], PATHINFO_EXTENSION);
                                                $isVideo = in_array($fileExtension, [
                                                    'mp4',
                                                    'mov',
                                                    'ogg',
                                                    'webm',
                                                    'qt',
                                                ]);
                                            @endphp

                                            @if ($isVideo)
                                                <video controls muted class="d-block w-100 h-100 object-cover"
                                                    loading="lazy">
                                                    <source src="{{ asset($mediaFiles[0]) }}"
                                                        type="video/{{ $fileExtension }}">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @else
                                                <img src="{{ asset($mediaFiles[0]) }}" alt="post-image"
                                                    class="d-block w-100 h-100 object-cover" loading="lazy">
                                            @endif
                                        </a>
                                    </div>
                                </div>

                                {{-- Second media item (if exists) with overlay if more than 2 --}}
                                @if ($count > 1)
                                    <div class="col-md-6">
                                        <div class="post-media-item rounded overflow-hidden position-relative"
                                            style="height: 250px;">
                                            {{-- CRITICAL FIX: Use asset('storage/' . $path) for correct URL --}}
                                            <a data-fslightbox="gallery-{{ $post->id }}"
                                                href="{{ asset($mediaFiles[1]) }}">
                                                @php
                                                    $fileExtension = pathinfo($mediaFiles[1], PATHINFO_EXTENSION);
                                                    $isVideo = in_array($fileExtension, [
                                                        'mp4',
                                                        'mov',
                                                        'ogg',
                                                        'webm',
                                                        'qt',
                                                    ]);
                                                @endphp

                                                @if ($isVideo)
                                                    <video controls muted class="d-block w-100 h-100 object-cover"
                                                        loading="lazy">
                                                        <source src="{{ asset($mediaFiles[1]) }}"
                                                            type="video/{{ $fileExtension }}">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                @else
                                                    <img src="{{ asset($mediaFiles[1]) }}" alt="post-image"
                                                        class="d-block w-100 h-100 object-cover" loading="lazy">
                                                @endif

                                                @if ($count > 2)
                                                    <div class="post-overlay-count position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center text-white bg-dark bg-opacity-75"
                                                        style="z-index: 1;">
                                                        <span class="font-size-28">+{{ $count - 2 }}</span>
                                                    </div>
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                @endif

                                {{-- Hidden links for all other media files for FsLightbox to pick up --}}
                                @for ($i = 2; $i < $count; $i++)
                                    {{-- CRITICAL FIX: Use asset('storage/' . $path) for correct URL --}}
                                    <a data-fslightbox="gallery-{{ $post->id }}"
                                        href="{{ asset('/' . $mediaFiles[$i]) }}" class="d-none"></a>
                                @endfor
                            </div>
                        </div>
                    @endif

                    <div class="post-meta-likes mt-4">
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <ul class="list-inline m-0 p-0 post-user-liked-list">
                                @foreach ($post->reactions->take(4) as $reaction)
                                    <li>
                                        {{-- Use asset('storage/') for reaction user avatar, with default fallback --}}
                                        <img src="{{ asset('/' . ($reaction->user->avatar ?? 'frontend/assets/images/user/1.jpg')) }}"
                                            class="rounded-circle img-fluid userimg" loading="lazy">
                                    </li>
                                @endforeach
                            </ul>
                            <div class="d-inline-flex align-items-center gap-1">
                                @if ($post->reactions->count() > 0)
                                    {{-- Check if first reaction user exists before accessing name --}}
                                    <h6 class="m-0 font-size-14">
                                        {{ $post->reactions->first()->user->name ?? 'Someone' }}</h6>
                                    @if ($post->reactions->count() > 1)
                                        <span class="text-capitalize font-size-14 fw-medium" data-bs-toggle="modal"
                                            data-bs-target="#likemodal{{ $post->id }}">
                                            and {{ $post->reactions->count() - 1 }} others liked this
                                        </span>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="comment-area mt-4 pt-4 border-top">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div class="like-block position-relative d-flex align-items-center flex-shrink-0">
                                <x-reaction-button :reactable="$post" />
                            </div>
                            <div class="d-flex align-items-center gap-3 flex-shrink-0">
                                <div class="total-comment-block" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#commentcollapes{{ $post->id }}" aria-expanded="true"
                                    aria-controls="commentcollapes{{ $post->id }}">
                                    <span class="material-symbols-outlined align-text-top font-size-20">comment</span>
                                    <span
                                        class="fw-medium comment-count-{{ $post->id }}">{{ $post->comments->count() }}
                                        Comment</span>
                                </div>
                                <div class="share-block d-flex align-items-center feather-icon">
                                    <a href="javascript:void(0);" data-bs-toggle="modal"
                                        data-bs-target="#share-btn-{{ $post->id }}"
                                        aria-controls="share-btn-{{ $post->id }}"
                                        class="d-flex align-items-center">
                                        <span
                                            class="material-symbols-outlined align-text-top font-size-20">share</span>
                                        <span class="ms-1 fw-medium"> Share</span>
                                        {{-- Use relationship count --}}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-4 border-top collapse show" id="commentcollapes{{ $post->id }}"
                            x-data="commentComponent({{ $post->id }})" x-init="init()">


                            <ul class="list-inline m-0 p-0 comment-list" id="comment-list-{{ $post->id }}"
                                x-ref="commentList">
                                @foreach ($post->comments->where('parent_id', null) as $comment)
                                    {!! view('user-interface.pages.post.partials.single_comment', compact('comment'))->render() !!}
                                @endforeach
                            </ul>
                            <div class="d-flex flex-column align-items-center justify-content-center gap-1 mt-2">
                                <button type="button"
                                    class="show-more-comments-btn d-none stylish-toggle-btn px-4 py-2 rounded-pill shadow-sm fw-semibold d-flex align-items-center gap-2"
                                    data-post-id="{{ $post->id }}" data-action="show">
                                    <span class="material-symbols-outlined align-text-bottom fs-5">expand_more</span>
                                    <span>Show more comments</span>
                                </button>
                                <button type="button"
                                    class="show-less-comments-btn d-none stylish-toggle-btn px-4 py-2 rounded-pill shadow-sm fw-semibold d-flex align-items-center gap-2"
                                    data-post-id="{{ $post->id }}" data-action="hide">
                                    <span class="material-symbols-outlined align-text-bottom fs-5">expand_less</span>
                                    <span>Hide comments</span>
                                </button>
                            </div>


                            <div class="add-comment-form-block mt-4">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset(auth()->user()->avatar ?? 'frontend/assets/images/user/1.jpg') }}"
                                            alt="userimg" class="avatar-48 rounded-circle img-fluid" loading="lazy">
                                    </div>
                                    <div class="add-comment-form w-100">
                                        <form class="main-comment-form"
                                            action="{{ route('posts.comments.store', $post) }}" method="POST">
                                            @csrf
                                            <input type="text" name="content" class="form-control"
                                                placeholder="Write a Comment...">
                                            <button type="submit"
                                                class="btn btn-primary font-size-12 text-capitalize px-5">Post</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fslightbox/index.js"></script>

<!-- Your AJAX/jQuery and AlpineJS code in a regular script block -->
<script>
    // AlpineJS component definition
    window.commentComponent = function(postId) {
        return {
            addComment(data) {
                // Prevent duplicates
                if (document.getElementById(`comment-${data.id}`)) {
                    return;
                }
                // Only update comment count for main comments
                if (!data.parent_id) {
                    const countSpan = document.querySelector(`.comment-count-${postId}`);
                    if (countSpan) {
                        let currentCount = parseInt(countSpan.innerText) || 0;
                        let newCount = currentCount + 1;
                        countSpan.innerText = `${newCount} Comment${newCount !== 1 ? 's' : ''}`;
                    }
                }
                // Find correct list and prepend the comment or reply
                let commentList;
                if (data.parent_id) {
                    let replyListId = `replies-for-comment-${data.parent_id}`;
                    commentList = document.getElementById(replyListId);
                    if (!commentList) {
                        const parentLi = document.getElementById(`comment-${data.parent_id}`);
                        if (parentLi) {
                            commentList = document.createElement('ul');
                            commentList.className = 'list-unstyled ms-4';
                            commentList.id = replyListId;
                            parentLi.appendChild(commentList);
                        }
                    }
                } else {
                    commentList = document.getElementById(`comment-list-${postId}`);
                }
                if (!commentList) return;
                // If backend provides rendered HTML, use it (for replies)
                let li;
                if (data.html) {
                    const temp = document.createElement('div');
                    temp.innerHTML = data.html.trim();
                    li = temp.firstElementChild;
                    if (!li) return;
                    li.id = `comment-${data.id}`;
                } else {
                    li = document.createElement('li');
                    li.className = 'mb-3 comment-item';
                    li.id = `comment-${data.id}`;
                    li.innerHTML = `
<div class="comment-list-block">
    <div class="d-flex align-items-center gap-3">
        <div class="comment-list-user-img flex-shrink-0">
            <img src="${data.user.avatar ? '/' + data.user.avatar : '/frontend/assets/images/user/1.jpg'}" alt="userimg" class="avatar-48 rounded-circle img-fluid" loading="lazy">
        </div>
        <div class="comment-list-user-data">
            <div class="d-inline-flex align-items-center gap-1 flex-wrap">
                <h6 class="m-0">${data.user.name}</h6>
                <span class="d-inline-block text-primary"></span>
                <span class="fw-medium small text-capitalize">${data.created_at ? moment(data.created_at).fromNow() : ''}</span>
            </div>
        </div>
        <div class="ms-auto">
            <div class="dropdown">
                <button type="button" class="dropdown-toggle material-symbols-outlined comment-action-btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="Comment actions" style="background:none;border:none;padding:0;cursor:pointer;">more_horiz</button>
                <div class="dropdown-menu m-0 p-0">
                    <a class="dropdown-item p-3 delete-comment-btn d-flex align-items-start gap-3" href="#" data-id="${data.id}" data-type="comment">
                        <span class="material-symbols-outlined fs-3 text-danger flex-shrink-0">delete</span>
                        <span>
                            <span class="fw-bold d-block">Delete Comment</span>
                            <span class="text-muted small">Remove this comment permanently.</span>
                        </span>
                    </a>
                    <a class="dropdown-item p-3 hide-comment-btn d-flex align-items-start gap-3" href="#" data-id="${data.id}" data-type="comment">
                        <span class="material-symbols-outlined fs-3 text-secondary flex-shrink-0">visibility_off</span>
                        <span>
                            <span class="fw-bold d-block">Hide Comment</span>
                            <span class="text-muted small">See fewer comments like this.</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="comment-list-user-comment">
        <div class="comment-list-comment">${data.content ? data.content : ''}</div>
        <div class="comment-list-action mt-2">
            <ul class="list-inline m-0 p-0 d-flex align-items-center gap-2">
                <li>
                    <div class="like-data" id="reaction-block-comment-${data.id}">
                        <div class="dropdown">
                            <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                <img src="/frontend/assets/images/icon/01.png" width="20" height="20" alt="Like" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Like" data-bs-original-title="Like">
                                <span class="fw-medium reaction-count">0</span>
                            </span>
                            <div class="dropdown-menu py-2 shadow">
                                ${[1,2,3,4,5,6,7].map(i => `
                                    <form action="/react/comment/${data.id}" method="POST" class="d-inline reaction-form" data-reactable-type="comment" data-reactable-id="${data.id}">
                                        <input type="hidden" name="_token" value="${window.Laravel && window.Laravel.csrfToken ? window.Laravel.csrfToken : ''}" autocomplete="off">
                                        <input type="hidden" name="reaction_id" value="${i}">
                                        <button type="submit" class="ms-2 me-2 btn btn-link p-0 border-0 bg-transparent" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="${['Like','Love','Happy','HaHa','Think','Sad','Lovely'][i-1]}" data-bs-original-title="${['Like','Love','Happy','HaHa','Think','Sad','Lovely'][i-1]}">
                                            <img src="/frontend/assets/images/icon/0${i}.png" width="20" height="20" alt="${['Like','Love','Happy','HaHa','Think','Sad','Lovely'][i-1]}">
                                        </button>
                                    </form>
                                `).join('')}
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <span class="fw-medium small" data-bs-toggle="collapse" data-bs-target="#subcomment-collapse-${data.id}" role="button">Reply</span>
                </li>
            </ul>
            <div class="add-comment-form-block collapse mt-3" id="subcomment-collapse-${data.id}">
                <div class="d-flex align-items-center gap-3">
                    <div class="flex-shrink-0">
                        <img src="${window.Laravel && window.Laravel.userAvatar ? window.Laravel.userAvatar : '/frontend/assets/images/user/1.jpg'}" alt="userimg" class="avatar-48 rounded-circle img-fluid" loading="lazy">
                    </div>
                    <div class="add-comment-form">
                        <form class="reply-form" data-comment-id="${data.id}" action="/comments/${data.id}/reply" method="POST">
                            <input type="hidden" name="_token" value="${window.Laravel && window.Laravel.csrfToken ? window.Laravel.csrfToken : ''}" autocomplete="off">
                            <input type="text" name="content" class="form-control" placeholder="Write a Comment...">
                            <button type="submit" class="btn btn-primary font-size-12 text-capitalize px-5">Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                    `;
                }
                // For replies, always prepend to the top of the reply list (ul#replies-for-comment-...)
                if (data.parent_id) {
                    // Find the correct reply list for this parent comment
                    let replyListId = `replies-for-comment-${data.parent_id}`;
                    let replyList = document.getElementById(replyListId);
                    if (replyList) {
                        if (replyList.firstChild) {
                            replyList.insertBefore(li, replyList.firstChild);
                        } else {
                            replyList.appendChild(li);
                        }
                    }
                } else {
                    commentList.prepend(li);
                }
                // Live update the comment time every minute
                const timeSpan = li.querySelector('.fw-medium.small.text-capitalize');
                if (timeSpan && data.created_at) {
                    const updateTime = () => {
                        timeSpan.textContent = moment(data.created_at).fromNow();
                    };
                    updateTime();
                    li._interval = setInterval(updateTime, 60000);
                }
            },
            init() {
                window.addEventListener(`comment-posted-${postId}`, (event) => {
                    this.addComment(event.detail.comment);
                });
                if (window.Echo) {
                    window.Echo.private('post.' + postId)
                        .listen('CommentCreated', (e) => {
                            if (e.comment) this.addComment(e.comment);
                        });
                }
            }
        }
    };

    $(document).ready(function() {
        function updateCommentButtons($commentList, showCount) {
            var $comments = $commentList.children('li');
            var $showMoreBtn = $commentList.parent().find('.show-more-comments-btn');
            var $showLessBtn = $commentList.parent().find('.show-less-comments-btn');
            if ($comments.length > showCount) {
                let hiddenCount = 0;
                $comments.each(function(i, el) {
                    if (i < showCount) $(el).show();
                    else {
                        $(el).hide();
                        hiddenCount++;
                    }
                });
                $showMoreBtn.toggleClass('d-none', hiddenCount === 0);
                $showLessBtn.addClass('d-none');
            } else {
                $comments.show();
                $showMoreBtn.addClass('d-none');
                $showLessBtn.addClass('d-none');
            }
        }
        $(document).on('click', '.show-more-comments-btn', function() {
            var postId = $(this).data('post-id');
            var $commentList = $('#comment-list-' + postId);
            var $comments = $commentList.children('li');
            $comments.show();
            $(this).addClass('d-none');
            $commentList.parent().find('.show-less-comments-btn').removeClass('d-none');
        });
        $(document).on('click', '.show-less-comments-btn', function() {
            var postId = $(this).data('post-id');
            var $commentList = $('#comment-list-' + postId);
            updateCommentButtons($commentList, 2);
        });
        $('.comment-list').each(function() {
            updateCommentButtons($(this), 2);
        });
        $(document).on('click', '.delete-comment-btn', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var commentId = $(this).data('id');
            if (!confirm('Are you sure you want to delete this comment?')) return false;
            $.ajax({
                url: '/comments/' + commentId,
                method: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content') || window.Laravel
                        .csrfToken
                },
                success: function(response) {
                    if (response.success) {
                        var $comment = $('#comment-' + commentId);
                        $comment.find('.comment-item').remove();
                        $("form.reply-form[data-comment-id='" + commentId + "']").closest(
                            '.add-comment-form-block').remove();
                        $comment.remove();
                        var $countSpan = $comment.closest('.comment-area').find(
                            '.comment-count-' + $comment.closest('.comment-area').data(
                                'post-id'));
                        if ($countSpan.length) {
                            let currentCount = parseInt($countSpan.text()) || 1;
                            let newCount = Math.max(currentCount - 1, 0);
                            $countSpan.text(newCount + ' Comment' + (newCount !== 1 ? 's' :
                                ''));
                        }
                    } else {
                        alert(response.message || 'Failed to delete comment.');
                    }
                },
                error: function(xhr) {
                    alert('Failed to delete comment.');
                }
            });
            return false;
        });

        
        $(document).on('click', '.hide-comment-btn', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var commentId = $(this).data('id');
            $.ajax({
                url: '/comments/' + commentId + '/hide',
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content') || window.Laravel
                        .csrfToken
                },
                success: function(response) {
                    if (response.success) {
                        $('#comment-' + commentId).fadeOut(200, function() {
                            $(this).remove();
                        });
                        var $comment = $('#comment-' + commentId);
                        var $countSpan = $comment.closest('.comment-area').find(
                            '.comment-count-' + $comment.closest('.comment-area').data(
                                'post-id'));
                        if ($countSpan.length) {
                            let currentCount = parseInt($countSpan.text()) || 1;
                            let newCount = Math.max(currentCount - 1, 0);
                            $countSpan.text(newCount + ' Comment' + (newCount !== 1 ? 's' :
                                ''));
                        }
                    } else {
                        alert(response.message || 'Failed to hide comment.');
                    }
                },
                error: function(xhr) {
                    alert('Failed to hide comment.');
                }
            });
            return false;
        });
        if (typeof refreshFsLightbox === 'function') {
            refreshFsLightbox();
        }
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
        // AJAX form submission handler with debug log
        $(document).on('submit', '.reply-form, .main-comment-form', function(e) {
            e.preventDefault();
            let form = $(this);
            let input = form.find('input[name="content"]');
            let content = input.val().trim();
            console.log('AJAX handler triggered for comment form', form.attr('class'));
            if (!content) {
                input.focus();
                return false;
            }
            form.find('button[type="submit"]').prop('disabled', true);
            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: form.serialize(),
                success: function(response) {
                    input.val('');
                    if (response.comment) {
                        const event = new CustomEvent(
                            `comment-posted-${response.comment.post_id}`, {
                                detail: {
                                    comment: response.comment
                                }
                            });
                        window.dispatchEvent(event);
                    }
                },
                error: function(xhr) {
                    console.error('AJAX Error:', xhr.responseText);
                    let errorMsg = 'An error occurred while posting your comment.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMsg = xhr.responseJSON.message;
                    } else if (xhr.responseText) {
                        try {
                            const json = JSON.parse(xhr.responseText);
                            if (json.message) errorMsg = json.message;
                        } catch (e) {}
                    }
                    let errorBlock = form.closest('.add-comment-form-block').find(
                        '.comment-error-message');
                    if (errorBlock.length === 0) {
                        errorBlock = $(
                            '<div class="comment-error-message text-danger mt-2"></div>'
                        );
                        form.closest('.add-comment-form-block').append(errorBlock);
                    }
                    errorBlock.text(errorMsg).show();
                    setTimeout(() => errorBlock.fadeOut(), 5000);
                },
                complete: function() {
                    form.find('button[type="submit"]').prop('disabled', false);
                }
            });
            return false;
        });
    });
</script>
<script type="module">
    import '/js/echo-comments.js';
</script>
