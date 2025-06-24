 <div class="row social-post-container">


     @foreach ($posts as $post)
         <div class="col-sm-12 social-post">
             <div class="card card-block card-stretch card-height">
                 <div class="card-body">
                     <div class="user-post-data">
                         <div class="d-flex align-items-center justify-content-between">
                             <div class="me-3 flex-shrik-0">
                                 <img class="border border-2 rounded-circle user-post-profile"
                                     src="{{ asset(auth()->user()->avatar ?? 'frontend/assets/images/user/01.jpg') ?? '' }}"
                                     alt="user-image" loading="lazy">
                             </div>

                             <div class="w-100">
                                 <div class="d-flex align-items-center justify-content-between">
                                     <div>
                                         <h6 class="mb-0 d-inline-block ">{{ auth()->user()->name ?? '' }}</h6>
                                         <span class="d-inline-block text-primary">
                                             <svg class="align-text-bottom" width="17" height="17"
                                                 viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                                     d="M11.8457 0H4.34822C1.73547 0 0.0974121 1.84995 0.0974121 4.46789V11.5321C0.0974121 14.1501 1.72768 16 4.34822 16H11.8449C14.4663 16 16.0974 14.1501 16.0974 11.5321V4.46789C16.0974 1.84995 14.4663 0 11.8457 0Z"
                                                     fill="currentColor" />
                                                 <path d="M5.09741 7.99978L7.09797 9.9995L11.0974 6.00006"
                                                     stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                     stroke-linejoin="round" />
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
                                                         <span class="material-symbols-outlined">
                                                             save
                                                         </span>
                                                         <div class="data ms-2">
                                                             <h6>Save Post</h6>
                                                             <p class="mb-0">Add this to your
                                                                 saved items</p>
                                                         </div>
                                                     </div>
                                                 </a>
                                                 <a class="dropdown-item p-3" href="#">
                                                     <div class="d-flex align-items-top">
                                                         <span class="material-symbols-outlined">
                                                             cancel
                                                         </span>
                                                         <div class="data ms-2">
                                                             <h6>Hide Post</h6>
                                                             <p class="mb-0">See fewer posts
                                                                 like this.</p>
                                                         </div>
                                                     </div>
                                                 </a>
                                                 <a class="dropdown-item p-3" href="#">
                                                     <div class="d-flex align-items-top">
                                                         <span class="material-symbols-outlined">
                                                             person_remove
                                                         </span>
                                                         <div class="data ms-2">
                                                             <h6>Unfollow User</h6>
                                                             <p class="mb-0">Stop seeing
                                                                 posts but stay friends.</p>
                                                         </div>
                                                     </div>
                                                 </a>
                                                 <a class="dropdown-item p-3" href="#">
                                                     <div class="d-flex align-items-top">
                                                         <span class="material-symbols-outlined">
                                                             notifications
                                                         </span>
                                                         <div class="data ms-2">
                                                             <h6>Notifications</h6>
                                                             <p class="mb-0">Turn on
                                                                 notifications for this
                                                                 post</p>
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
                         if (is_array($post->media)) {
                             $mediaFiles = $post->media;
                         } else {
                             $mediaFiles = json_decode($post->media, true) ?: [];
                         }
                         $count = count($mediaFiles);
                     @endphp

                     @if ($count > 0)
                         <div class="row mt-3">
                             {{-- প্রথম ছবি --}}
                             <div class="col-md-6">
                                 <a data-fslightbox="gallery-{{ $post->id }}" href="{{ asset($mediaFiles[0]) }}"
                                     class="rounded">
                                     <img src="{{ asset($mediaFiles[0]) }}" alt="post-image"
                                         class="img-fluid rounded w-100" loading="lazy">
                                 </a>
                             </div>


                             @if ($count > 1)
                                 <div class="col-md-6 mt-md-0 mt-3">
                                     <div class="post-overlay-box h-100 rounded position-relative">
                                         <img src="{{ asset($mediaFiles[1]) }}" alt="post-image"
                                             class="img-fluid rounded w-100 h-100 object-cover" loading="lazy">

                                         <a data-fslightbox="gallery-{{ $post->id }}"
                                             href="{{ asset($mediaFiles[1]) }}"
                                             class="rounded font-size-18 position-absolute top-50 start-50 translate-middle text-white bg-dark px-3 py-2"
                                             style="z-index: 2;">
                                             +{{ $count - 1 }}
                                         </a>
                                     </div>
                                 </div>
                             @endif

                             @for ($i = 2; $i < $count; $i++)
                                 <a data-fslightbox="gallery-{{ $post->id }}" href="{{ asset($mediaFiles[$i]) }}"
                                     class="d-none"></a>
                             @endfor
                         </div>
                     @endif




                     <div class="post-meta-likes mt-4">
                         <div class="d-flex align-items-center gap-2 flex-wrap">
                             <ul class="list-inline m-0 p-0 post-user-liked-list">
                                 <li>
                                     <img src="{{ asset('frontend/') }}/assets/images/user/01.jpg" alt="userimg"
                                         class="rounded-circle img-fluid userimg" loading="lazy">
                                 </li>
                                 <li>
                                     <img src="{{ asset('frontend/') }}/assets/images/user/02.jpg" alt="userimg"
                                         class="rounded-circle img-fluid userimg" loading="lazy">
                                 </li>
                                 <li>
                                     <img src="{{ asset('frontend/') }}/assets/images/user/03.jpg" alt="userimg"
                                         class="rounded-circle img-fluid userimg" loading="lazy">
                                 </li>
                                 <li>
                                     <img src="{{ asset('frontend/') }}/assets/images/user/04.jpg" alt="userimg"
                                         class="rounded-circle img-fluid userimg" loading="lazy">
                                 </li>
                             </ul>
                             <div class="d-inline-flex align-items-center gap-1">
                                 <h6 class="m-0 font-size-14">Aliana Molex</h6>
                                 <span class="text-capitalize font-size-14 fw-medium" type="button"
                                     data-bs-toggle="modal" data-bs-target="#likemodal">and 208 others liked
                                     this</span>
                             </div>
                         </div>
                     </div>
                     <div class="comment-area mt-4 pt-4 border-top">
                         <div class="d-flex justify-content-between align-items-center flex-wrap">
                             <div class="like-block position-relative d-flex align-items-center flex-shrink-0">
                                 <div class="like-data">
                                     <div class="dropdown">
                                         <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                                             aria-expanded="false" role="button">
                                             <span class="material-symbols-outlined align-text-top font-size-20">
                                                 thumb_up
                                             </span>
                                             <span class="fw-medium">140 Likes</span>
                                         </span>
                                         <div class="dropdown-menu py-2 shadow">
                                             <a class="ms-2 me-2" href="javascript:void(0);" data-bs-toggle="tooltip"
                                                 data-bs-placement="top" title="Like"><img
                                                     src="{{ asset('frontend/') }}/assets/images/icon/01.png"
                                                     class="img-fluid" alt="like" loading="lazy"></a>
                                             <a class="me-2" href="javascript:void(0);" data-bs-toggle="tooltip"
                                                 data-bs-placement="top" title="Love"><img
                                                     src="{{ asset('frontend/') }}/assets/images/icon/02.png"
                                                     class="img-fluid" alt="love" loading="lazy"></a>
                                             <a class="me-2" href="javascript:void(0);" data-bs-toggle="tooltip"
                                                 data-bs-placement="top" title="Happy"><img
                                                     src="{{ asset('frontend/') }}/assets/images/icon/03.png"
                                                     class="img-fluid" alt="happy" loading="lazy"></a>
                                             <a class="me-2" href="javascript:void(0);" data-bs-toggle="tooltip"
                                                 data-bs-placement="top" title="HaHa"><img
                                                     src="{{ asset('frontend/') }}/assets/images/icon/04.png"
                                                     class="img-fluid" alt="haha" loading="lazy"></a>
                                             <a class="me-2" href="javascript:void(0);" data-bs-toggle="tooltip"
                                                 data-bs-placement="top" title="Think"><img
                                                     src="{{ asset('frontend/') }}/assets/images/icon/05.png"
                                                     class="img-fluid" alt="think" loading="lazy"></a>
                                             <a class="me-2" href="javascript:void(0);" data-bs-toggle="tooltip"
                                                 data-bs-placement="top" title="Sad"><img
                                                     src="{{ asset('frontend/') }}/assets/images/icon/06.png"
                                                     class="img-fluid" alt="sad" loading="lazy"></a>
                                             <a class="me-2" href="javascript:void(0);" data-bs-toggle="tooltip"
                                                 data-bs-placement="top" title="Lovely"><img
                                                     src="{{ asset('frontend/') }}/assets/images/icon/07.png"
                                                     class="img-fluid" alt="lovely" loading="lazy"></a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="d-flex align-items-center gap-3 flex-shrink-0">
                                 <div class="total-comment-block" type="button" data-bs-toggle="collapse"
                                     data-bs-target="#commentcollapes1" aria-expanded="false"
                                     aria-controls="commentcollapes">
                                     <span class="material-symbols-outlined align-text-top font-size-20">
                                         comment
                                     </span>
                                     <span class="fw-medium">20 Comment</span>
                                 </div>
                                 <div class="share-block d-flex align-items-center feather-icon">
                                     <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#share-btn"
                                         aria-controls="share-btn" class="d-flex align-items-center">
                                         <span class="material-symbols-outlined align-text-top font-size-20">
                                             share
                                         </span>
                                         <span class="ms-1 fw-medium">99 Share</span></a>
                                 </div>
                             </div>
                         </div>
                         <div class="collapse mt-4 pt-4 border-top" id="commentcollapes1">
                             <ul class="list-inline m-o p-0 comment-list">
                                 <li class="mb-3">
                                     <div class="comment-list-block">
                                         <div class="d-flex align-items-center gap-3">
                                             <div class="comment-list-user-img flex-shrink-0">
                                                 <img src="{{ asset('frontend/') }}/assets/images/user/13.jpg"
                                                     alt="userimg" class="avatar-48 rounded-circle img-fluid"
                                                     loading="lazy">
                                             </div>
                                             <div class="comment-list-user-data">
                                                 <div class="d-inline-flex align-items-center gap-1 flex-wrap">
                                                     <h6 class="m-0">Bob Frapples</h6>
                                                     <span class="d-inline-block text-primary">
                                                         <svg class="align-text-bottom"
                                                             xmlns="http://www.w3.org/2000/svg" width="17"
                                                             height="17" viewBox="0 0 17 17" fill="none">
                                                             <path fill-rule="evenodd" clip-rule="evenodd"
                                                                 d="M12.2483 0.216553H4.75081C2.13805 0.216553 0.5 2.0665 0.5 4.68444V11.7487C0.5 14.3666 2.13027 16.2166 4.75081 16.2166H12.2475C14.8689 16.2166 16.5 14.3666 16.5 11.7487V4.68444C16.5 2.0665 14.8689 0.216553 12.2483 0.216553Z"
                                                                 fill="currentColor" />
                                                             <path d="M5.5 8.21627L7.50056 10.216L11.5 6.21655"
                                                                 stroke="white" stroke-width="1.5"
                                                                 stroke-linecap="round" stroke-linejoin="round" />
                                                         </svg>
                                                     </span>
                                                     <spna class="fw-medium small text-capitalize">
                                                         3 min ago
                                                     </spna>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="comment-list-user-comment">
                                             <div class="comment-list-comment">
                                                 "Just stumbled upon this post and it's
                                                 giving me all the feels! 🙌"
                                             </div>
                                             <div class="comment-list-action mt-2">
                                                 <ul class="list-inline m-0 p-0 d-flex align-items-center gap-2">
                                                     <li>
                                                         <div
                                                             class="like-block position-relative d-flex align-items-center flex-shrink-0">
                                                             <div class="like-data">
                                                                 <div class="dropdown">
                                                                     <span class="dropdown-toggle"
                                                                         data-bs-toggle="dropdown"
                                                                         aria-haspopup="true" aria-expanded="false"
                                                                         role="button">
                                                                         <span
                                                                             class="material-symbols-outlined align-text-top font-size-18">
                                                                             thumb_up
                                                                         </span>
                                                                         <span class="fw-medium small">Likes</span>
                                                                     </span>
                                                                     <div class="dropdown-menu py-2 shadow">
                                                                         <a class="ms-2 me-2"
                                                                             href="javascript:void(0);"
                                                                             data-bs-toggle="tooltip"
                                                                             data-bs-placement="top"
                                                                             title="Like"><img
                                                                                 src="{{ asset('frontend/') }}/assets/images/icon/01.png"
                                                                                 class="img-fluid" alt="like"
                                                                                 loading="lazy"></a>
                                                                         <a class="me-2" href="javascript:void(0);"
                                                                             data-bs-toggle="tooltip"
                                                                             data-bs-placement="top"
                                                                             title="Love"><img
                                                                                 src="{{ asset('frontend/') }}/assets/images/icon/02.png"
                                                                                 class="img-fluid" alt="love"
                                                                                 loading="lazy"></a>
                                                                         <a class="me-2" href="javascript:void(0);"
                                                                             data-bs-toggle="tooltip"
                                                                             data-bs-placement="top"
                                                                             title="Happy"><img
                                                                                 src="{{ asset('frontend/') }}/assets/images/icon/03.png"
                                                                                 class="img-fluid" alt="happy"
                                                                                 loading="lazy"></a>
                                                                         <a class="me-2" href="javascript:void(0);"
                                                                             data-bs-toggle="tooltip"
                                                                             data-bs-placement="top"
                                                                             title="HaHa"><img
                                                                                 src="{{ asset('frontend/') }}/assets/images/icon/04.png"
                                                                                 class="img-fluid" alt="haha"
                                                                                 loading="lazy"></a>
                                                                         <a class="me-2" href="javascript:void(0);"
                                                                             data-bs-toggle="tooltip"
                                                                             data-bs-placement="top"
                                                                             title="Think"><img
                                                                                 src="{{ asset('frontend/') }}/assets/images/icon/05.png"
                                                                                 class="img-fluid" alt="think"
                                                                                 loading="lazy"></a>
                                                                         <a class="me-2" href="javascript:void(0);"
                                                                             data-bs-toggle="tooltip"
                                                                             data-bs-placement="top"
                                                                             title="Sad"><img
                                                                                 src="{{ asset('frontend/') }}/assets/images/icon/06.png"
                                                                                 class="img-fluid" alt="sad"
                                                                                 loading="lazy"></a>
                                                                         <a class="me-2" href="javascript:void(0);"
                                                                             data-bs-toggle="tooltip"
                                                                             data-bs-placement="top"
                                                                             title="Lovely"><img
                                                                                 src="{{ asset('frontend/') }}/assets/images/icon/07.png"
                                                                                 class="img-fluid" alt="lovely"
                                                                                 loading="lazy"></a>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </li>
                                                     <li>
                                                         <span class="fw-medium small" data-bs-toggle="collapse"
                                                             data-bs-target="#subcomment-collapse1" role="button"
                                                             aria-expanded="false" aria-controls="collapseExample">
                                                             Reply
                                                         </span>
                                                     </li>
                                                 </ul>
                                                 <div class="add-comment-form-block collapse mt-3"
                                                     id="subcomment-collapse1">
                                                     <div class="d-flex align-items-center gap-3">
                                                         <div class="flex-shrink-0">
                                                             <img src="{{ asset('frontend/') }}/assets/images/user/1.jpg"
                                                                 alt="userimg"
                                                                 class="avatar-48 rounded-circle img-fluid"
                                                                 loading="lazy">
                                                         </div>
                                                         <div class="add-comment-form">
                                                             <form>
                                                                 <input type="text" class="form-control"
                                                                     placeholder="Write a Comment...">
                                                                 <button type="submit"
                                                                     class="btn btn-primary font-size-12 text-capitalize px-5">
                                                                     post
                                                                 </button>
                                                             </form>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </li>
                             </ul>
                             <div class="add-comment-form-block">
                                 <div class="d-flex align-items-center gap-3">
                                     <div class="flex-shrink-0">
                                         <img src="{{ asset('frontend/') }}/assets/images/user/1.jpg" alt="userimg"
                                             class="avatar-48 rounded-circle img-fluid" loading="lazy">
                                     </div>
                                     <div class="add-comment-form">
                                         <form>
                                             <input type="text" class="form-control"
                                                 placeholder="Write a Comment...">
                                             <button type="submit"
                                                 class="btn btn-primary font-size-12 text-capitalize px-5">
                                                 post
                                             </button>
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

     <div class="col-sm-12 social-post">
         <div class="card card-block card-stretch card-height">
             <div class="card-body">
                 <div class="user-post-data">
                     <div class="d-flex align-items-center justify-content-between">
                         <div class="me-3 flex-shrik-0">
                             <img class="border border-2 rounded-circle user-post-profile"
                                 src="{{ asset('frontend/') }}/assets/images/user/03.jpg" alt="user-image"
                                 loading="lazy">
                         </div>
                         <div class="w-100">
                             <div class="d-flex align-items-center justify-content-between">
                                 <div>
                                     <h6 class="mb-0 d-inline-block">Barb Ackue</h6>
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
                                     <span class="mb-0 d-inline-block text-capitalize fw-medium">Add a New
                                         Post</span>
                                     <p class="mb-0">1 Hour ago</p>
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
                                                     <span class="material-symbols-outlined">
                                                         save
                                                     </span>
                                                     <div class="data ms-2">
                                                         <h6>Save Post</h6>
                                                         <p class="mb-0">Add this to your
                                                             saved items</p>
                                                     </div>
                                                 </div>
                                             </a>
                                             <a class="dropdown-item p-3" href="#">
                                                 <div class="d-flex align-items-top">
                                                     <span class="material-symbols-outlined">
                                                         cancel
                                                     </span>
                                                     <div class="data ms-2">
                                                         <h6>Hide Post</h6>
                                                         <p class="mb-0">See fewer posts
                                                             like this.</p>
                                                     </div>
                                                 </div>
                                             </a>
                                             <a class="dropdown-item p-3" href="#">
                                                 <div class="d-flex align-items-top">
                                                     <span class="material-symbols-outlined">
                                                         person_remove
                                                     </span>
                                                     <div class="data ms-2">
                                                         <h6>Unfollow User</h6>
                                                         <p class="mb-0">Stop seeing
                                                             posts but stay friends.</p>
                                                     </div>
                                                 </div>
                                             </a>
                                             <a class="dropdown-item p-3" href="#">
                                                 <div class="d-flex align-items-top">
                                                     <span class="material-symbols-outlined">
                                                         notifications
                                                     </span>
                                                     <div class="data ms-2">
                                                         <h6>Notifications</h6>
                                                         <p class="mb-0">Turn on
                                                             notifications for this
                                                             post</p>
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
                     <p class="m-0">"Lorem ipsum dolor sit amet, consectetur adipiscing
                         elit. Morbi nulla dolor, ornare at commodo non, feugiat non
                         nisi.
                         Phasellus faucibus mollis pharetra. Proin blandit ac massa sed
                         rhoncus"</p>
                     <ul class="list-inline m-0 p-0 d-flex flex-wrap gap-1">
                         <li>
                             <a href="javascript:void(0);">#family</a>
                         </li>
                         <li>
                             <a href="javascript:void(0);">#happiness</a>
                         </li>
                         <li>
                             <a href="javascript:void(0);">#travelling</a>
                         </li>
                         <li>
                             <a href="javascript:void(0);">#camping</a>
                         </li>
                         <li>
                             <a href="javascript:void(0);">#climbing</a>
                         </li>
                     </ul>
                 </div>
                 <div class="user-post mt-4">
                     <div class="row">
                         <div class="col-md-4">
                             <a data-fslightbox="gallery"
                                 href="{{ asset('frontend/') }}/assets/images/page-img/boy.jpg" class="rounded">
                                 <img src="{{ asset('frontend/') }}/assets/images/page-img/boy.jpg" alt="post-image"
                                     class="img-fluid rounded w-100" loading="lazy">
                             </a>
                         </div>
                         <div class="col-md-4 mt-md-0 mt-3">
                             <a data-fslightbox="gallery"
                                 href="{{ asset('frontend/') }}/assets/images/page-img/bus.jpg" class="rounded">
                                 <img src="{{ asset('frontend/') }}/assets/images/page-img/bus.jpg" alt="post-image"
                                     class="img-fluid rounded w-100" loading="lazy">
                             </a>
                         </div>
                         <div class="col-md-4 mt-md-0 mt-3">
                             <a data-fslightbox="gallery"
                                 href="{{ asset('frontend/') }}/assets/images/page-img/fd.jpg" class="rounded">
                                 <img src="{{ asset('frontend/') }}/assets/images/page-img/fd.jpg" alt="post-image"
                                     class="img-fluid rounded w-100" loading="lazy">
                             </a>
                         </div>
                     </div>
                     <div class="row mt-3">
                         <div class="col-md-6">
                             <a data-fslightbox="gallery"
                                 href="{{ asset('frontend/') }}/assets/images/page-img/mountain.jpg" class="rounded">
                                 <img src="{{ asset('frontend/') }}/assets/images/page-img/mountain.jpg"
                                     alt="post-image" class="img-fluid rounded w-100" loading="lazy">
                             </a>
                         </div>
                         <div class="col-md-6 mt-md-0 mt-3">
                             <div class="post-overlay-box h-100 rounded">
                                 <img src="{{ asset('frontend/') }}/assets/images/page-img/pizza.jpg"
                                     alt="post-image" class="img-fluid rounded w-100 h-100 object-cover"
                                     loading="lazy">
                                 <a data-fslightbox="gallery"
                                     href="{{ asset('frontend/') }}/assets/images/page-img/pizza.jpg"
                                     class="rounded font-size-18">+2
                                 </a>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="post-meta-likes mt-4">
                     <div class="d-flex align-items-center gap-2 flex-wrap">
                         <ul class="list-inline m-0 p-0 post-user-liked-list">
                             <li>
                                 <img src="{{ asset('frontend/') }}/assets/images/user/01.jpg" alt="userimg"
                                     class="rounded-circle img-fluid userimg" loading="lazy">
                             </li>
                             <li>
                                 <img src="{{ asset('frontend/') }}/assets/images/user/02.jpg" alt="userimg"
                                     class="rounded-circle img-fluid userimg" loading="lazy">
                             </li>
                             <li>
                                 <img src="{{ asset('frontend/') }}/assets/images/user/03.jpg" alt="userimg"
                                     class="rounded-circle img-fluid userimg" loading="lazy">
                             </li>
                             <li>
                                 <img src="{{ asset('frontend/') }}/assets/images/user/04.jpg" alt="userimg"
                                     class="rounded-circle img-fluid userimg" loading="lazy">
                             </li>
                         </ul>
                         <div class="d-inline-flex align-items-center gap-1">
                             <h6 class="m-0 font-size-14">Aliana Molex</h6>
                             <span class="text-capitalize font-size-14 fw-medium" type="button"
                                 data-bs-toggle="modal" data-bs-target="#likemodal">and 208 others liked
                                 this</span>
                         </div>
                     </div>
                 </div>
                 <div class="comment-area mt-4 pt-4 border-top">
                     <div class="d-flex justify-content-between align-items-center flex-wrap">
                         <div class="like-block position-relative d-flex align-items-center flex-shrink-0">
                             <div class="like-data">
                                 <div class="dropdown">
                                     <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                                         aria-expanded="false" role="button">
                                         <span class="material-symbols-outlined align-text-top font-size-20">
                                             thumb_up
                                         </span>
                                         <span class="fw-medium">140 Likes</span>
                                     </span>
                                     <div class="dropdown-menu py-2 shadow">
                                         <a class="ms-2 me-2" href="javascript:void(0);" data-bs-toggle="tooltip"
                                             data-bs-placement="top" title="Like"><img
                                                 src="{{ asset('frontend/') }}/assets/images/icon/01.png"
                                                 class="img-fluid" alt="like" loading="lazy"></a>
                                         <a class="me-2" href="javascript:void(0);" data-bs-toggle="tooltip"
                                             data-bs-placement="top" title="Love"><img
                                                 src="{{ asset('frontend/') }}/assets/images/icon/02.png"
                                                 class="img-fluid" alt="love" loading="lazy"></a>
                                         <a class="me-2" href="javascript:void(0);" data-bs-toggle="tooltip"
                                             data-bs-placement="top" title="Happy"><img
                                                 src="{{ asset('frontend/') }}/assets/images/icon/03.png"
                                                 class="img-fluid" alt="happy" loading="lazy"></a>
                                         <a class="me-2" href="javascript:void(0);" data-bs-toggle="tooltip"
                                             data-bs-placement="top" title="HaHa"><img
                                                 src="{{ asset('frontend/') }}/assets/images/icon/04.png"
                                                 class="img-fluid" alt="haha" loading="lazy"></a>
                                         <a class="me-2" href="javascript:void(0);" data-bs-toggle="tooltip"
                                             data-bs-placement="top" title="Think"><img
                                                 src="{{ asset('frontend/') }}/assets/images/icon/05.png"
                                                 class="img-fluid" alt="think" loading="lazy"></a>
                                         <a class="me-2" href="javascript:void(0);" data-bs-toggle="tooltip"
                                             data-bs-placement="top" title="Sad"><img
                                                 src="{{ asset('frontend/') }}/assets/images/icon/06.png"
                                                 class="img-fluid" alt="sad" loading="lazy"></a>
                                         <a class="me-2" href="javascript:void(0);" data-bs-toggle="tooltip"
                                             data-bs-placement="top" title="Lovely"><img
                                                 src="{{ asset('frontend/') }}/assets/images/icon/07.png"
                                                 class="img-fluid" alt="lovely" loading="lazy"></a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="d-flex align-items-center gap-3 flex-shrink-0">
                             <div class="total-comment-block" type="button" data-bs-toggle="collapse"
                                 data-bs-target="#commentcollapes2" aria-expanded="false"
                                 aria-controls="commentcollapes">
                                 <span class="material-symbols-outlined align-text-top font-size-20">
                                     comment
                                 </span>
                                 <span class="fw-medium">20 Comment</span>
                             </div>
                             <div class="share-block d-flex align-items-center feather-icon">
                                 <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#share-btn"
                                     aria-controls="share-btn" class="d-flex align-items-center">
                                     <span class="material-symbols-outlined align-text-top font-size-20">
                                         share
                                     </span>
                                     <span class="ms-1 fw-medium">99 Share</span></a>
                             </div>
                         </div>
                     </div>
                     <div class="collapse mt-4 pt-4 border-top" id="commentcollapes2">
                         <ul class="list-inline m-o p-0 comment-list">
                             <li class="mb-3">
                                 <div class="comment-list-block">
                                     <div class="d-flex align-items-center gap-3">
                                         <div class="comment-list-user-img flex-shrink-0">
                                             <img src="{{ asset('frontend/') }}/assets/images/user/13.jpg"
                                                 alt="userimg" class="avatar-48 rounded-circle img-fluid"
                                                 loading="lazy">
                                         </div>
                                         <div class="comment-list-user-data">
                                             <div class="d-inline-flex align-items-center gap-1 flex-wrap">
                                                 <h6 class="m-0">Bob Frapples</h6>
                                                 <span class="d-inline-block text-primary">
                                                     <svg class="align-text-bottom" xmlns="http://www.w3.org/2000/svg"
                                                         width="17" height="17" viewBox="0 0 17 17"
                                                         fill="none">
                                                         <path fill-rule="evenodd" clip-rule="evenodd"
                                                             d="M12.2483 0.216553H4.75081C2.13805 0.216553 0.5 2.0665 0.5 4.68444V11.7487C0.5 14.3666 2.13027 16.2166 4.75081 16.2166H12.2475C14.8689 16.2166 16.5 14.3666 16.5 11.7487V4.68444C16.5 2.0665 14.8689 0.216553 12.2483 0.216553Z"
                                                             fill="currentColor" />
                                                         <path d="M5.5 8.21627L7.50056 10.216L11.5 6.21655"
                                                             stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                             stroke-linejoin="round" />
                                                     </svg>
                                                 </span>
                                                 <spna class="fw-medium small text-capitalize">
                                                     3 min ago
                                                 </spna>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="comment-list-user-comment">
                                         <div class="comment-list-comment">
                                             "Just stumbled upon this post and it's
                                             giving me all the feels! 🙌"
                                         </div>
                                         <div class="comment-list-action mt-2">
                                             <ul class="list-inline m-0 p-0 d-flex align-items-center gap-2">
                                                 <li>
                                                     <div
                                                         class="like-block position-relative d-flex align-items-center flex-shrink-0">
                                                         <div class="like-data">
                                                             <div class="dropdown">
                                                                 <span class="dropdown-toggle"
                                                                     data-bs-toggle="dropdown" aria-haspopup="true"
                                                                     aria-expanded="false" role="button">
                                                                     <span
                                                                         class="material-symbols-outlined align-text-top font-size-18">
                                                                         thumb_up
                                                                     </span>
                                                                     <span class="fw-medium small">Likes</span>
                                                                 </span>
                                                                 <div class="dropdown-menu py-2 shadow">
                                                                     <a class="ms-2 me-2" href="javascript:void(0);"
                                                                         data-bs-toggle="tooltip"
                                                                         data-bs-placement="top" title="Like"><img
                                                                             src="{{ asset('frontend/') }}/assets/images/icon/01.png"
                                                                             class="img-fluid" alt="like"
                                                                             loading="lazy"></a>
                                                                     <a class="me-2" href="javascript:void(0);"
                                                                         data-bs-toggle="tooltip"
                                                                         data-bs-placement="top" title="Love"><img
                                                                             src="{{ asset('frontend/') }}/assets/images/icon/02.png"
                                                                             class="img-fluid" alt="love"
                                                                             loading="lazy"></a>
                                                                     <a class="me-2" href="javascript:void(0);"
                                                                         data-bs-toggle="tooltip"
                                                                         data-bs-placement="top" title="Happy"><img
                                                                             src="{{ asset('frontend/') }}/assets/images/icon/03.png"
                                                                             class="img-fluid" alt="happy"
                                                                             loading="lazy"></a>
                                                                     <a class="me-2" href="javascript:void(0);"
                                                                         data-bs-toggle="tooltip"
                                                                         data-bs-placement="top" title="HaHa"><img
                                                                             src="{{ asset('frontend/') }}/assets/images/icon/04.png"
                                                                             class="img-fluid" alt="haha"
                                                                             loading="lazy"></a>
                                                                     <a class="me-2" href="javascript:void(0);"
                                                                         data-bs-toggle="tooltip"
                                                                         data-bs-placement="top" title="Think"><img
                                                                             src="{{ asset('frontend/') }}/assets/images/icon/05.png"
                                                                             class="img-fluid" alt="think"
                                                                             loading="lazy"></a>
                                                                     <a class="me-2" href="javascript:void(0);"
                                                                         data-bs-toggle="tooltip"
                                                                         data-bs-placement="top" title="Sad"><img
                                                                             src="{{ asset('frontend/') }}/assets/images/icon/06.png"
                                                                             class="img-fluid" alt="sad"
                                                                             loading="lazy"></a>
                                                                     <a class="me-2" href="javascript:void(0);"
                                                                         data-bs-toggle="tooltip"
                                                                         data-bs-placement="top" title="Lovely"><img
                                                                             src="{{ asset('frontend/') }}/assets/images/icon/07.png"
                                                                             class="img-fluid" alt="lovely"
                                                                             loading="lazy"></a>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </li>
                                                 <li>
                                                     <span class="fw-medium small" data-bs-toggle="collapse"
                                                         data-bs-target="#subcomment-collapse2" role="button"
                                                         aria-expanded="false" aria-controls="collapseExample">
                                                         Reply
                                                     </span>
                                                 </li>
                                             </ul>
                                             <div class="add-comment-form-block collapse mt-3"
                                                 id="subcomment-collapse2">
                                                 <div class="d-flex align-items-center gap-3">
                                                     <div class="flex-shrink-0">
                                                         <img src="{{ asset('frontend/') }}/assets/images/user/1.jpg"
                                                             alt="userimg" class="avatar-48 rounded-circle img-fluid"
                                                             loading="lazy">
                                                     </div>
                                                     <div class="add-comment-form">
                                                         <form>
                                                             <input type="text" class="form-control"
                                                                 placeholder="Write a Comment...">
                                                             <button type="submit"
                                                                 class="btn btn-primary font-size-12 text-capitalize px-5">
                                                                 post
                                                             </button>
                                                         </form>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </li>
                         </ul>
                         <div class="add-comment-form-block">
                             <div class="d-flex align-items-center gap-3">
                                 <div class="flex-shrink-0">
                                     <img src="{{ asset('frontend/') }}/assets/images/user/1.jpg" alt="userimg"
                                         class="avatar-48 rounded-circle img-fluid" loading="lazy">
                                 </div>
                                 <div class="add-comment-form">
                                     <form>
                                         <input type="text" class="form-control" placeholder="Write a Comment...">
                                         <button type="submit"
                                             class="btn btn-primary font-size-12 text-capitalize px-5">
                                             post
                                         </button>
                                     </form>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

 </div>


 <script src="https://cdn.jsdelivr.net/npm/fslightbox/index.js"></script>
 <script>
     refreshFsLightbox();
 </script>
