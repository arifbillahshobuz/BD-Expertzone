@extends('frontend.layout.layout')
@section('title')
    Home
@endsection
@section('content')
<div class="row gx-4">
    <div class="col-lg-8" id="dynamicDivContainer">
        <div id="content">
            <div class="row">
                <div class="col-12">
                    <div class="mb-5">
                        <div id="stories" class="storiesWrapper d-flex gap-3"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div id="post-modal-data"
                         class="card card-block card-stretch card-height create-post-modal">
                        <div class="card-header d-flex justify-content-between border-bottom">
                            <div class="header-title">
                                <h5 class="card-title">Add a Post</h5>
                            </div>
                            <div class="dropdown">
                                <div class="lh-1" id="post-option" data-bs-toggle="dropdown">
                              <span class="material-symbols-outlined">
                                 more_horiz
                              </span>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right"
                                     aria-labelledby="post-option" style="">
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                       data-bs-target="#post-modal">Check in</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                       data-bs-target="#post-modal">Live
                                        Video</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                       data-bs-target="#post-modal">GIF</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                       data-bs-target="#post-modal">Watch Party</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                       data-bs-target="#post-modal">Play
                                        with Friend</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-5" data-bs-toggle="modal" data-bs-target="#post-modal">
                                <form class="post-text w-100" action="javascript:void();">
                                    <input type="text" class="form-control rounded px-0"
                                           placeholder="Write And Share Your Post With Your Friends..."
                                           style="border:none;">
                                </form>
                            </div>
                        </div>
                        <div class="card-body bg-primary-subtle rounded-bottom-3">
                            <div
                                class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                <div class="create-post-data">
                                    <ul class="list-inline m-0 p-0 d-flex align-items-center gap-4">
                                        <li>
                                            <a href="javascript:void(0);" class="text-body">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                     height="16"
                                                     viewBox="0 0 18 16" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M11.5334 1.3761C12.3751 1.7111 12.6326 2.87776 12.9767 3.25276C13.3209 3.62776 13.8134 3.75526 14.0859 3.75526C15.5342 3.75526 16.7084 4.92943 16.7084 6.37693V11.2061C16.7084 13.1478 15.1334 14.7228 13.1917 14.7228H4.80841C2.86591 14.7228 1.29175 13.1478 1.29175 11.2061V6.37693C1.29175 4.92943 2.46591 3.75526 3.91425 3.75526C4.18591 3.75526 4.67841 3.62776 5.02341 3.25276C5.36758 2.87776 5.62425 1.7111 6.46591 1.3761C7.30841 1.0411 10.6917 1.0411 11.5334 1.3761Z"
                                                          stroke="currentColor" stroke-width="1.5"
                                                          stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                    <path d="M13.5794 5.91667H13.5869"
                                                          stroke="currentColor" stroke-width="2"
                                                          stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M11.6489 8.94C11.6489 7.47667 10.4631 6.29083 8.99975 6.29083C7.53642 6.29083 6.35059 7.47667 6.35059 8.94C6.35059 10.4033 7.53642 11.5892 8.99975 11.5892C10.4631 11.5892 11.6489 10.4033 11.6489 8.94Z"
                                                          stroke="currentColor" stroke-width="1.5"
                                                          stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="text-body">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                     height="18"
                                                     viewBox="0 0 18 18" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M7.23043 11.6718C4.02709 11.6718 1.29126 12.156 1.29126 14.096C1.29126 16.036 4.01043 16.5377 7.23043 16.5377C10.4346 16.5377 13.1696 16.0527 13.1696 14.1135C13.1696 12.1743 10.4513 11.6718 7.23043 11.6718Z"
                                                          stroke="currentColor" stroke-width="1.5"
                                                          stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M7.23042 8.90493C9.33292 8.90493 11.0371 7.20076 11.0371 5.09826C11.0371 2.99576 9.33292 1.2916 7.23042 1.2916C5.12875 1.2916 3.42459 2.99576 3.42459 5.09826C3.41709 7.19326 5.10875 8.89743 7.20459 8.90493H7.23042Z"
                                                          stroke="currentColor" stroke-width="1.5"
                                                          stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                    <path d="M15.0031 6.22427V9.56594"
                                                          stroke="currentColor" stroke-width="1.5"
                                                          stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                    <path d="M16.7079 7.895H13.2996"
                                                          stroke="currentColor" stroke-width="1.5"
                                                          stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="text-body">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                     height="18"
                                                     viewBox="0 0 14 18" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M9.08341 7.75041C9.08341 6.59935 8.15072 5.66666 7.0005 5.66666C5.84944 5.66666 4.91675 6.59935 4.91675 7.75041C4.91675 8.90063 5.84944 9.83332 7.0005 9.83332C8.15072 9.83332 9.08341 8.90063 9.08341 7.75041Z"
                                                          stroke="currentColor" stroke-width="1.5"
                                                          stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M6.99959 16.5C6.00086 16.5 0.75 12.2486 0.75 7.80274C0.75 4.3222 3.54758 1.5 6.99959 1.5C10.4516 1.5 13.25 4.3222 13.25 7.80274C13.25 12.2486 7.99832 16.5 6.99959 16.5Z"
                                                          stroke="currentColor" stroke-width="1.5"
                                                          stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <ul class="list-inline m-0 p-0 d-flex align-items-center gap-4">
                                        <li>
                                            <a href="javascript:void(0);"
                                               class="text-body fw-medium">
                                                Discard
                                            </a>
                                        </li>
                                        <li>
                                            <button type="button" class="btn btn-primary px-4">
                                                Post
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="post-modal" tabindex="-1"
                             aria-labelledby="post-modalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="post-modalLabel">Create
                                            Post</h5>
                                        <a href="javascript:void(0);" class="lh-1"
                                           data-bs-dismiss="modal">
                                            <span class="material-symbols-outlined">close</span>
                                        </a>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex align-items-center">
                                            <div class="user-img">
                                                <img
                                                    src="{{asset('frontend/')}}/assets/images/user/1.jpg"
                                                    alt="userimg"
                                                    class="avatar-60 rounded-circle img-fluid"
                                                    loading="lazy">
                                            </div>
                                            <form class="post-text ms-3 w-100"
                                                  action="javascript:void();">
                                                <input type="text" class="form-control rounded"
                                                       placeholder="Write something here..."
                                                       style="border:none;">
                                            </form>
                                        </div>
                                        <hr>
                                        <ul class="d-flex flex-wrap align-items-center list-inline m-0 p-0">
                                            <li class="col-md-6 mb-3">
                                                <div
                                                    class="bg-primary-subtle rounded p-2 pointer me-3">
                                                    <a href="javascript:void(0);"
                                                       class="d-inline-block fw-medium text-body">
                                             <span class="material-symbols-outlined align-middle font-size-20 me-1">
                                                add_a_photo
                                             </span>
                                                        Photo/Video
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="col-md-6 mb-3">
                                                <div
                                                    class="bg-primary-subtle rounded p-2 pointer me-3">
                                                    <a href="javascript:void(0);"
                                                       class="d-inline-block fw-medium text-body">
                                             <span class="material-symbols-outlined align-middle font-size-20 me-1">
                                                group
                                             </span>
                                                        Tag Friend
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="col-md-6 mb-3">
                                                <div
                                                    class="bg-primary-subtle rounded p-2 pointer me-3">
                                                    <a href="javascript:void(0);"
                                                       class="d-inline-block fw-medium text-body">
                                             <span class="material-symbols-outlined align-middle font-size-20 me-1">
                                                sentiment_satisfied
                                             </span>
                                                        Feeling/Activity
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="col-md-6 mb-3">
                                                <div
                                                    class="bg-primary-subtle rounded p-2 pointer me-3">
                                                    <a href="javascript:void(0);"
                                                       class="d-inline-block fw-medium text-body">
                                             <span class="material-symbols-outlined align-middle font-size-20 me-1">
                                                location_on
                                             </span>
                                                        Check in
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="col-md-6 mb-3">
                                                <div
                                                    class="bg-primary-subtle rounded p-2 pointer me-3">
                                                    <a href="javascript:void(0);"
                                                       class="d-inline-block fw-medium text-body">
                                             <span class="material-symbols-outlined align-middle font-size-20 me-1">
                                                live_tv
                                             </span>
                                                        Live Video
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="col-md-6 mb-3">
                                                <div
                                                    class="bg-primary-subtle rounded p-2 pointer me-3">
                                                    <a href="javascript:void(0);"
                                                       class="d-inline-block fw-medium text-body">
                                             <span class="material-symbols-outlined align-middle font-size-20 me-1">
                                                gif_box
                                             </span>
                                                        GIF
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="col-md-6 mb-3">
                                                <div
                                                    class="bg-primary-subtle rounded p-2 pointer me-3">
                                                    <a href="javascript:void(0);"
                                                       class="d-inline-block fw-medium text-body">
                                             <span class="material-symbols-outlined align-middle font-size-20 me-1">
                                                celebration
                                             </span>
                                                        Watch Party
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="col-md-6 mb-3">
                                                <div
                                                    class="bg-primary-subtle rounded p-2 pointer me-3">
                                                    <a href="javascript:void(0);"
                                                       class="d-inline-block fw-medium text-body">
                                             <span class="material-symbols-outlined align-middle font-size-20 me-1">
                                                sports_esports
                                             </span>
                                                        Play with Friends
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                        <hr>
                                        <div class="other-option">
                                            <div
                                                class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <div class="user-img me-3">
                                                        <img
                                                            src="{{asset('frontend/assets/images/user/1.jpg')}}"
                                                            alt="userimg"
                                                            class="avatar-60 rounded-circle img-fluid">
                                                    </div>
                                                    <h6>Your Story</h6>
                                                </div>
                                                <div class="card-post-toolbar">
                                                    <div class="dropdown">
                                             <span class="dropdown-toggle" data-bs-toggle="dropdown"
                                                   aria-haspopup="true" aria-expanded="false" role="button">
                                                <span class="btn btn-primary">Friend</span>
                                             </span>
                                                        <div class="dropdown-menu m-0 p-0">
                                                            <a class="dropdown-item p-3" href="#">
                                                                <div class="d-flex align-items-top">
                                                      <span class="material-symbols-outlined">
                                                         save
                                                      </span>
                                                                    <div class="data ms-2">
                                                                        <h6>Public</h6>
                                                                        <p class="mb-0">Anyone on or
                                                                            off Facebook</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a class="dropdown-item p-3" href="#">
                                                                <div class="d-flex align-items-top">
                                                      <span class="material-symbols-outlined">
                                                         cancel
                                                      </span>
                                                                    <div class="data ms-2">
                                                                        <h6>Friends</h6>
                                                                        <p class="mb-0">Your Friend
                                                                            on facebook</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a class="dropdown-item p-3" href="#">
                                                                <div class="d-flex align-items-top">
                                                      <span class="material-symbols-outlined">
                                                         person_remove
                                                      </span>
                                                                    <div class="data ms-2">
                                                                        <h6>Friends except</h6>
                                                                        <p class="mb-0">Don't show
                                                                            to some friends</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a class="dropdown-item p-3" href="#">
                                                                <div class="d-flex align-items-top">
                                                      <span class="material-symbols-outlined">
                                                         notifications
                                                      </span>
                                                                    <div class="data ms-2">
                                                                        <h6>Only Me</h6>
                                                                        <p class="mb-0">Only me</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit"
                                                class="btn btn-primary d-block w-100 mt-3">Post
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row social-post-container">
                <div class="col-sm-12 social-post">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="user-post-data">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="me-3 flex-shrik-0">
                                        <img
                                            class="border border-2 rounded-circle user-post-profile"
                                            src="{{asset('frontend/assets/images/user/01.jpg')}}"
                                            alt="user-image" loading="lazy">
                                    </div>
                                    <div class="w-100">
                                        <div
                                            class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <h6 class="mb-0 d-inline-block ">Anna Sthesia</h6>
                                                <span class="d-inline-block text-primary">
                                          <svg class="align-text-bottom" width="17" height="17" viewBox="0 0 17 17"
                                               fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path fill-rule="evenodd" clip-rule="evenodd"
                                                   d="M11.8457 0H4.34822C1.73547 0 0.0974121 1.84995 0.0974121 4.46789V11.5321C0.0974121 14.1501 1.72768 16 4.34822 16H11.8449C14.4663 16 16.0974 14.1501 16.0974 11.5321V4.46789C16.0974 1.84995 14.4663 0 11.8457 0Z"
                                                   fill="currentColor"/>
                                             <path d="M5.09741 7.99978L7.09797 9.9995L11.0974 6.00006" stroke="white"
                                                   stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          </svg>
                                       </span>
                                                <span
                                                    class="mb-0 d-inline-block text-capitalize fw-medium">posted an
                                          update</span>
                                                <p class="mb-0">2 minutes ago</p>
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
                                <p class="m-0">"Energy, the tangible expression of pure thought,
                                    propels intentions into
                                    powerful actions, bridging the gap between
                                    mind and manifestation."</p>
                                <ul class="list-inline m-0 p-0 d-flex flex-wrap gap-1">
                                    <li>
                                        <a href="javascript:void(0);">#friends</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">#party</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">#birthday</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">#together</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">#celebration</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="user-post mt-4">
                                <a data-fslightbox="gallery"
                                   href="{{asset('frontend/')}}/assets/images/page-img/fun.jpg"
                                   class="rounded">
                                    <img src="{{asset('frontend/')}}/assets/images/page-img/fun.jpg"
                                         alt="post-image"
                                         class="img-fluid rounded w-100" loading="lazy">
                                </a>
                            </div>
                            <div class="post-meta-likes mt-4">
                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                    <ul class="list-inline m-0 p-0 post-user-liked-list">
                                        <li>
                                            <img
                                                src="{{asset('frontend/')}}/assets/images/user/01.jpg"
                                                alt="userimg"
                                                class="rounded-circle img-fluid userimg"
                                                loading="lazy">
                                        </li>
                                        <li>
                                            <img
                                                src="{{asset('frontend/')}}/assets/images/user/02.jpg"
                                                alt="userimg"
                                                class="rounded-circle img-fluid userimg"
                                                loading="lazy">
                                        </li>
                                        <li>
                                            <img
                                                src="{{asset('frontend/')}}/assets/images/user/03.jpg"
                                                alt="userimg"
                                                class="rounded-circle img-fluid userimg"
                                                loading="lazy">
                                        </li>
                                        <li>
                                            <img
                                                src="{{asset('frontend/')}}/assets/images/user/04.jpg"
                                                alt="userimg"
                                                class="rounded-circle img-fluid userimg"
                                                loading="lazy">
                                        </li>
                                    </ul>
                                    <div class="d-inline-flex align-items-center gap-1">
                                        <h6 class="m-0 font-size-14">Aliana Molex</h6>
                                        <span class="text-capitalize font-size-14 fw-medium"
                                              type="button"
                                              data-bs-toggle="modal" data-bs-target="#likemodal">and 208 others liked this</span>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-area mt-4 pt-4 border-top">
                                <div
                                    class="d-flex justify-content-between align-items-center flex-wrap">
                                    <div
                                        class="like-block position-relative d-flex align-items-center flex-shrink-0">
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
                                                    <a class="ms-2 me-2" href="javascript:void(0);"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top" title="Like"><img
                                                            src="{{asset('frontend/')}}/assets/images/icon/01.png"
                                                            class="img-fluid" alt="like"
                                                            loading="lazy"></a>
                                                    <a class="me-2" href="javascript:void(0);"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top" title="Love"><img
                                                            src="{{asset('frontend/')}}/assets/images/icon/02.png"
                                                            class="img-fluid" alt="love"
                                                            loading="lazy"></a>
                                                    <a class="me-2" href="javascript:void(0);"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top" title="Happy"><img
                                                            src="{{asset('frontend/')}}/assets/images/icon/03.png"
                                                            class="img-fluid" alt="happy"
                                                            loading="lazy"></a>
                                                    <a class="me-2" href="javascript:void(0);"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top" title="HaHa"><img
                                                            src="{{asset('frontend/')}}/assets/images/icon/04.png"
                                                            class="img-fluid" alt="haha"
                                                            loading="lazy"></a>
                                                    <a class="me-2" href="javascript:void(0);"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top" title="Think"><img
                                                            src="{{asset('frontend/')}}/assets/images/icon/05.png"
                                                            class="img-fluid" alt="think"
                                                            loading="lazy"></a>
                                                    <a class="me-2" href="javascript:void(0);"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top" title="Sad"><img
                                                            src="{{asset('frontend/')}}/assets/images/icon/06.png"
                                                            class="img-fluid" alt="sad"
                                                            loading="lazy"></a>
                                                    <a class="me-2" href="javascript:void(0);"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top" title="Lovely"><img
                                                            src="{{asset('frontend/')}}/assets/images/icon/07.png"
                                                            class="img-fluid" alt="lovely"
                                                            loading="lazy"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-3 flex-shrink-0">
                                        <div class="total-comment-block" type="button"
                                             data-bs-toggle="collapse"
                                             data-bs-target="#commentcollapes1"
                                             aria-expanded="false"
                                             aria-controls="commentcollapes">
                                    <span class="material-symbols-outlined align-text-top font-size-20">
                                       comment
                                    </span>
                                            <span class="fw-medium">20 Comment</span>
                                        </div>
                                        <div
                                            class="share-block d-flex align-items-center feather-icon">
                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                               data-bs-target="#share-btn"
                                               aria-controls="share-btn"
                                               class="d-flex align-items-center">
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
                                                    <div
                                                        class="comment-list-user-img flex-shrink-0">
                                                        <img
                                                            src="{{asset('frontend/')}}/assets/images/user/13.jpg"
                                                            alt="userimg"
                                                            class="avatar-48 rounded-circle img-fluid"
                                                            loading="lazy">
                                                    </div>
                                                    <div class="comment-list-user-data">
                                                        <div
                                                            class="d-inline-flex align-items-center gap-1 flex-wrap">
                                                            <h6 class="m-0">Bob Frapples</h6>
                                                            <span
                                                                class="d-inline-block text-primary">
                                                   <svg class="align-text-bottom" xmlns="http://www.w3.org/2000/svg"
                                                        width="17" height="17" viewBox="0 0 17 17" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M12.2483 0.216553H4.75081C2.13805 0.216553 0.5 2.0665 0.5 4.68444V11.7487C0.5 14.3666 2.13027 16.2166 4.75081 16.2166H12.2475C14.8689 16.2166 16.5 14.3666 16.5 11.7487V4.68444C16.5 2.0665 14.8689 0.216553 12.2483 0.216553Z"
                                                            fill="currentColor"/>
                                                      <path d="M5.5 8.21627L7.50056 10.216L11.5 6.21655" stroke="white"
                                                            stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"/>
                                                   </svg>
                                                </span>
                                                            <spna
                                                                class="fw-medium small text-capitalize">
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
                                                            <span class="dropdown-toggle" data-bs-toggle="dropdown"
                                                                  aria-haspopup="true" aria-expanded="false"
                                                                  role="button">
                                                               <span
                                                                   class="material-symbols-outlined align-text-top font-size-18">
                                                                  thumb_up
                                                               </span>
                                                               <span class="fw-medium small">Likes</span>
                                                            </span>
                                                                            <div
                                                                                class="dropdown-menu py-2 shadow">
                                                                                <a class="ms-2 me-2"
                                                                                   href="javascript:void(0);"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top"
                                                                                   title="Like"><img
                                                                                        src="{{asset('frontend/')}}/assets/images/icon/01.png"
                                                                                        class="img-fluid"
                                                                                        alt="like"
                                                                                        loading="lazy"></a>
                                                                                <a class="me-2"
                                                                                   href="javascript:void(0);"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top"
                                                                                   title="Love"><img
                                                                                        src="{{asset('frontend/')}}/assets/images/icon/02.png"
                                                                                        class="img-fluid"
                                                                                        alt="love"
                                                                                        loading="lazy"></a>
                                                                                <a class="me-2"
                                                                                   href="javascript:void(0);"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top"
                                                                                   title="Happy"><img
                                                                                        src="{{asset('frontend/')}}/assets/images/icon/03.png"
                                                                                        class="img-fluid"
                                                                                        alt="happy"
                                                                                        loading="lazy"></a>
                                                                                <a class="me-2"
                                                                                   href="javascript:void(0);"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top"
                                                                                   title="HaHa"><img
                                                                                        src="{{asset('frontend/')}}/assets/images/icon/04.png"
                                                                                        class="img-fluid"
                                                                                        alt="haha"
                                                                                        loading="lazy"></a>
                                                                                <a class="me-2"
                                                                                   href="javascript:void(0);"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top"
                                                                                   title="Think"><img
                                                                                        src="{{asset('frontend/')}}/assets/images/icon/05.png"
                                                                                        class="img-fluid"
                                                                                        alt="think"
                                                                                        loading="lazy"></a>
                                                                                <a class="me-2"
                                                                                   href="javascript:void(0);"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top"
                                                                                   title="Sad"><img
                                                                                        src="{{asset('frontend/')}}/assets/images/icon/06.png"
                                                                                        class="img-fluid"
                                                                                        alt="sad"
                                                                                        loading="lazy"></a>
                                                                                <a class="me-2"
                                                                                   href="javascript:void(0);"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top"
                                                                                   title="Lovely"><img
                                                                                        src="{{asset('frontend/')}}/assets/images/icon/07.png"
                                                                                        class="img-fluid"
                                                                                        alt="lovely"
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
                                                        <div
                                                            class="add-comment-form-block collapse mt-3"
                                                            id="subcomment-collapse1">
                                                            <div
                                                                class="d-flex align-items-center gap-3">
                                                                <div class="flex-shrink-0">
                                                                    <img
                                                                        src="{{asset('frontend/')}}/assets/images/user/1.jpg"
                                                                        alt="userimg"
                                                                        class="avatar-48 rounded-circle img-fluid"
                                                                        loading="lazy">
                                                                </div>
                                                                <div class="add-comment-form">
                                                                    <form>
                                                                        <input type="text"
                                                                               class="form-control"
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
                                                <img
                                                    src="{{asset('frontend/')}}/assets/images/user/1.jpg"
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
                    </div>
                </div>
                <div class="col-sm-12 social-post">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="user-post-data">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="me-3 flex-shrik-0">
                                        <img
                                            class="border border-2 rounded-circle user-post-profile"
                                            src="{{asset('frontend/')}}/assets/images/user/03.jpg"
                                            alt="user-image" loading="lazy">
                                    </div>
                                    <div class="w-100">
                                        <div
                                            class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <h6 class="mb-0 d-inline-block">Barb Ackue</h6>
                                                <span class="d-inline-block text-primary">
                                          <svg class="align-text-bottom" width="17" height="17" viewBox="0 0 17 17"
                                               fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                             <path fill-rule="evenodd" clip-rule="evenodd"
                                                   d="M11.8457 0H4.34822C1.73547 0 0.0974121 1.84995 0.0974121 4.46789V11.5321C0.0974121 14.1501 1.72768 16 4.34822 16H11.8449C14.4663 16 16.0974 14.1501 16.0974 11.5321V4.46789C16.0974 1.84995 14.4663 0 11.8457 0Z"
                                                   fill="currentColor"/>
                                             <path d="M5.09741 7.99978L7.09797 9.9995L11.0974 6.00006" stroke="white"
                                                   stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          </svg>
                                       </span>
                                                <span
                                                    class="mb-0 d-inline-block text-capitalize fw-medium">Add a New Post</span>
                                                <p class="mb-0">1 Hour ago</p>
                                            </div>
                                            <div class="card-post-toolbar">
                                                <div class="dropdown">
                                          <span class="dropdown-toggle material-symbols-outlined"
                                                data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false" role="button">
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
                                           href="{{asset('frontend/')}}/assets/images/page-img/boy.jpg"
                                           class="rounded">
                                            <img
                                                src="{{asset('frontend/')}}/assets/images/page-img/boy.jpg"
                                                alt="post-image" class="img-fluid rounded w-100"
                                                loading="lazy">
                                        </a>
                                    </div>
                                    <div class="col-md-4 mt-md-0 mt-3">
                                        <a data-fslightbox="gallery"
                                           href="{{asset('frontend/')}}/assets/images/page-img/bus.jpg"
                                           class="rounded">
                                            <img
                                                src="{{asset('frontend/')}}/assets/images/page-img/bus.jpg"
                                                alt="post-image" class="img-fluid rounded w-100"
                                                loading="lazy">
                                        </a>
                                    </div>
                                    <div class="col-md-4 mt-md-0 mt-3">
                                        <a data-fslightbox="gallery"
                                           href="{{asset('frontend/')}}/assets/images/page-img/fd.jpg"
                                           class="rounded">
                                            <img
                                                src="{{asset('frontend/')}}/assets/images/page-img/fd.jpg"
                                                alt="post-image" class="img-fluid rounded w-100"
                                                loading="lazy">
                                        </a>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <a data-fslightbox="gallery"
                                           href="{{asset('frontend/')}}/assets/images/page-img/mountain.jpg"
                                           class="rounded">
                                            <img
                                                src="{{asset('frontend/')}}/assets/images/page-img/mountain.jpg"
                                                alt="post-image" class="img-fluid rounded w-100"
                                                loading="lazy">
                                        </a>
                                    </div>
                                    <div class="col-md-6 mt-md-0 mt-3">
                                        <div class="post-overlay-box h-100 rounded">
                                            <img
                                                src="{{asset('frontend/')}}/assets/images/page-img/pizza.jpg"
                                                alt="post-image"
                                                class="img-fluid rounded w-100 h-100 object-cover"
                                                loading="lazy">
                                            <a data-fslightbox="gallery"
                                               href="{{asset('frontend/')}}/assets/images/page-img/pizza.jpg"
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
                                            <img
                                                src="{{asset('frontend/')}}/assets/images/user/01.jpg"
                                                alt="userimg"
                                                class="rounded-circle img-fluid userimg"
                                                loading="lazy">
                                        </li>
                                        <li>
                                            <img
                                                src="{{asset('frontend/')}}/assets/images/user/02.jpg"
                                                alt="userimg"
                                                class="rounded-circle img-fluid userimg"
                                                loading="lazy">
                                        </li>
                                        <li>
                                            <img
                                                src="{{asset('frontend/')}}/assets/images/user/03.jpg"
                                                alt="userimg"
                                                class="rounded-circle img-fluid userimg"
                                                loading="lazy">
                                        </li>
                                        <li>
                                            <img
                                                src="{{asset('frontend/')}}/assets/images/user/04.jpg"
                                                alt="userimg"
                                                class="rounded-circle img-fluid userimg"
                                                loading="lazy">
                                        </li>
                                    </ul>
                                    <div class="d-inline-flex align-items-center gap-1">
                                        <h6 class="m-0 font-size-14">Aliana Molex</h6>
                                        <span class="text-capitalize font-size-14 fw-medium"
                                              type="button" data-bs-toggle="modal"
                                              data-bs-target="#likemodal">and 208 others liked this</span>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-area mt-4 pt-4 border-top">
                                <div
                                    class="d-flex justify-content-between align-items-center flex-wrap">
                                    <div
                                        class="like-block position-relative d-flex align-items-center flex-shrink-0">
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
                                                    <a class="ms-2 me-2" href="javascript:void(0);"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top" title="Like"><img
                                                            src="{{asset('frontend/')}}/assets/images/icon/01.png"
                                                            class="img-fluid" alt="like"
                                                            loading="lazy"></a>
                                                    <a class="me-2" href="javascript:void(0);"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top"
                                                       title="Love"><img
                                                            src="{{asset('frontend/')}}/assets/images/icon/02.png"
                                                            class="img-fluid" alt="love"
                                                            loading="lazy"></a>
                                                    <a class="me-2" href="javascript:void(0);"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top"
                                                       title="Happy"><img
                                                            src="{{asset('frontend/')}}/assets/images/icon/03.png"
                                                            class="img-fluid" alt="happy"
                                                            loading="lazy"></a>
                                                    <a class="me-2" href="javascript:void(0);"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top"
                                                       title="HaHa"><img
                                                            src="{{asset('frontend/')}}/assets/images/icon/04.png"
                                                            class="img-fluid" alt="haha"
                                                            loading="lazy"></a>
                                                    <a class="me-2" href="javascript:void(0);"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top"
                                                       title="Think"><img
                                                            src="{{asset('frontend/')}}/assets/images/icon/05.png"
                                                            class="img-fluid" alt="think"
                                                            loading="lazy"></a>
                                                    <a class="me-2" href="javascript:void(0);"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top"
                                                       title="Sad"><img
                                                            src="{{asset('frontend/')}}/assets/images/icon/06.png"
                                                            class="img-fluid" alt="sad"
                                                            loading="lazy"></a>
                                                    <a class="me-2" href="javascript:void(0);"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top"
                                                       title="Lovely"><img
                                                            src="{{asset('frontend/')}}/assets/images/icon/07.png"
                                                            class="img-fluid" alt="lovely"
                                                            loading="lazy"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-3 flex-shrink-0">
                                        <div class="total-comment-block" type="button"
                                             data-bs-toggle="collapse"
                                             data-bs-target="#commentcollapes2"
                                             aria-expanded="false" aria-controls="commentcollapes">
                                    <span class="material-symbols-outlined align-text-top font-size-20">
                                       comment
                                    </span>
                                            <span class="fw-medium">20 Comment</span>
                                        </div>
                                        <div
                                            class="share-block d-flex align-items-center feather-icon">
                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                               data-bs-target="#share-btn"
                                               aria-controls="share-btn"
                                               class="d-flex align-items-center">
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
                                                    <div
                                                        class="comment-list-user-img flex-shrink-0">
                                                        <img
                                                            src="{{asset('frontend/')}}/assets/images/user/13.jpg"
                                                            alt="userimg"
                                                            class="avatar-48 rounded-circle img-fluid"
                                                            loading="lazy">
                                                    </div>
                                                    <div class="comment-list-user-data">
                                                        <div
                                                            class="d-inline-flex align-items-center gap-1 flex-wrap">
                                                            <h6 class="m-0">Bob Frapples</h6>
                                                            <span
                                                                class="d-inline-block text-primary">
                                                   <svg class="align-text-bottom" xmlns="http://www.w3.org/2000/svg"
                                                        width="17"
                                                        height="17" viewBox="0 0 17 17" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M12.2483 0.216553H4.75081C2.13805 0.216553 0.5 2.0665 0.5 4.68444V11.7487C0.5 14.3666 2.13027 16.2166 4.75081 16.2166H12.2475C14.8689 16.2166 16.5 14.3666 16.5 11.7487V4.68444C16.5 2.0665 14.8689 0.216553 12.2483 0.216553Z"
                                                            fill="currentColor"/>
                                                      <path d="M5.5 8.21627L7.50056 10.216L11.5 6.21655" stroke="white"
                                                            stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"/>
                                                   </svg>
                                                </span>
                                                            <spna
                                                                class="fw-medium small text-capitalize">
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
                                                            <span class="dropdown-toggle" data-bs-toggle="dropdown"
                                                                  aria-haspopup="true" aria-expanded="false"
                                                                  role="button">
                                                               <span
                                                                   class="material-symbols-outlined align-text-top font-size-18">
                                                                  thumb_up
                                                               </span>
                                                               <span class="fw-medium small">Likes</span>
                                                            </span>
                                                                            <div
                                                                                class="dropdown-menu py-2 shadow">
                                                                                <a class="ms-2 me-2"
                                                                                   href="javascript:void(0);"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top"
                                                                                   title="Like"><img
                                                                                        src="{{asset('frontend/')}}/assets/images/icon/01.png"
                                                                                        class="img-fluid"
                                                                                        alt="like"
                                                                                        loading="lazy"></a>
                                                                                <a class="me-2"
                                                                                   href="javascript:void(0);"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top"
                                                                                   title="Love"><img
                                                                                        src="{{asset('frontend/')}}/assets/images/icon/02.png"
                                                                                        class="img-fluid"
                                                                                        alt="love"
                                                                                        loading="lazy"></a>
                                                                                <a class="me-2"
                                                                                   href="javascript:void(0);"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top"
                                                                                   title="Happy"><img
                                                                                        src="{{asset('frontend/')}}/assets/images/icon/03.png"
                                                                                        class="img-fluid"
                                                                                        alt="happy"
                                                                                        loading="lazy"></a>
                                                                                <a class="me-2"
                                                                                   href="javascript:void(0);"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top"
                                                                                   title="HaHa"><img
                                                                                        src="{{asset('frontend/')}}/assets/images/icon/04.png"
                                                                                        class="img-fluid"
                                                                                        alt="haha"
                                                                                        loading="lazy"></a>
                                                                                <a class="me-2"
                                                                                   href="javascript:void(0);"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top"
                                                                                   title="Think"><img
                                                                                        src="{{asset('frontend/')}}/assets/images/icon/05.png"
                                                                                        class="img-fluid"
                                                                                        alt="think"
                                                                                        loading="lazy"></a>
                                                                                <a class="me-2"
                                                                                   href="javascript:void(0);"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top"
                                                                                   title="Sad"><img
                                                                                        src="{{asset('frontend/')}}/assets/images/icon/06.png"
                                                                                        class="img-fluid"
                                                                                        alt="sad"
                                                                                        loading="lazy"></a>
                                                                                <a class="me-2"
                                                                                   href="javascript:void(0);"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top"
                                                                                   title="Lovely"><img
                                                                                        src="{{asset('frontend/')}}/assets/images/icon/07.png"
                                                                                        class="img-fluid"
                                                                                        alt="lovely"
                                                                                        loading="lazy"></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                   <span class="fw-medium small" data-bs-toggle="collapse"
                                                         data-bs-target="#subcomment-collapse2" role="button"
                                                         aria-expanded="false"
                                                         aria-controls="collapseExample">
                                                      Reply
                                                   </span>
                                                            </li>
                                                        </ul>
                                                        <div
                                                            class="add-comment-form-block collapse mt-3"
                                                            id="subcomment-collapse2">
                                                            <div
                                                                class="d-flex align-items-center gap-3">
                                                                <div class="flex-shrink-0">
                                                                    <img
                                                                        src="{{asset('frontend/')}}/assets/images/user/1.jpg"
                                                                        alt="userimg"
                                                                        class="avatar-48 rounded-circle img-fluid"
                                                                        loading="lazy">
                                                                </div>
                                                                <div class="add-comment-form">
                                                                    <form>
                                                                        <input type="text"
                                                                               class="form-control"
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
                                                <img
                                                    src="{{asset('frontend/')}}/assets/images/user/1.jpg"
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
                    </div>
                </div>
                <div class="col-sm-12 social-post">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="user-post-data">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="me-3 flex-shrik-0">
                                        <img
                                            class="border border-2 rounded-circle user-post-profile"
                                            src="{{asset('frontend/')}}/assets/images/user/04.jpg"
                                            alt="user-image" loading="lazy">
                                    </div>
                                    <div class="w-100">
                                        <div
                                            class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <h6 class="mb-0 d-inline-block">Ira Membrit</h6>
                                                <span class="d-inline-block text-primary">
                                          <svg class="align-text-bottom" width="17" height="17" viewBox="0 0 17 17"
                                               fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                             <path fill-rule="evenodd" clip-rule="evenodd"
                                                   d="M11.8457 0H4.34822C1.73547 0 0.0974121 1.84995 0.0974121 4.46789V11.5321C0.0974121 14.1501 1.72768 16 4.34822 16H11.8449C14.4663 16 16.0974 14.1501 16.0974 11.5321V4.46789C16.0974 1.84995 14.4663 0 11.8457 0Z"
                                                   fill="currentColor"/>
                                             <path d="M5.09741 7.99978L7.09797 9.9995L11.0974 6.00006" stroke="white"
                                                   stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          </svg>
                                       </span>
                                                <span
                                                    class="mb-0 d-inline-block text-capitalize fw-medium">Update her Status</span>
                                                <p class="mb-0">6 Hours ago</p>
                                            </div>
                                            <div class="card-post-toolbar">
                                                <div class="dropdown">
                                          <span class="dropdown-toggle material-symbols-outlined"
                                                data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false" role="button">
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
                            </div>
                            <div class="post-meta-likes mt-4">
                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                    <ul class="list-inline m-0 p-0 post-user-liked-list">
                                        <li>
                                            <img
                                                src="{{asset('frontend/')}}/assets/images/user/01.jpg"
                                                alt="userimg"
                                                class="rounded-circle img-fluid userimg"
                                                loading="lazy">
                                        </li>
                                        <li>
                                            <img
                                                src="{{asset('frontend/')}}/assets/images/user/02.jpg"
                                                alt="userimg"
                                                class="rounded-circle img-fluid userimg"
                                                loading="lazy">
                                        </li>
                                        <li>
                                            <img
                                                src="{{asset('frontend/')}}/assets/images/user/03.jpg"
                                                alt="userimg"
                                                class="rounded-circle img-fluid userimg"
                                                loading="lazy">
                                        </li>
                                        <li>
                                            <img
                                                src="{{asset('frontend/')}}/assets/images/user/04.jpg"
                                                alt="userimg"
                                                class="rounded-circle img-fluid userimg"
                                                loading="lazy">
                                        </li>
                                    </ul>
                                    <div class="d-inline-flex align-items-center gap-1">
                                        <h6 class="m-0 font-size-14">Aliana Molex</h6>
                                        <span class="text-capitalize font-size-14 fw-medium"
                                              type="button" data-bs-toggle="modal"
                                              data-bs-target="#likemodal">and 208 others liked this</span>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-area mt-4 pt-4 border-top">
                                <div
                                    class="d-flex justify-content-between align-items-center flex-wrap">
                                    <div
                                        class="like-block position-relative d-flex align-items-center flex-shrink-0">
                                        <div class="like-data">
                                            <div class="dropdown">
                                       <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                                             aria-expanded="false"
                                             role="button">
                                          <span class="material-symbols-outlined align-text-top font-size-20">
                                             thumb_up
                                          </span>
                                          <span class="fw-medium">140 Likes</span>
                                       </span>
                                                <div class="dropdown-menu py-2 shadow">
                                                    <a class="ms-2 me-2" href="javascript:void(0);"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top"
                                                       title="Like"><img
                                                            src="{{asset('frontend/')}}/assets/images/icon/01.png"
                                                            class="img-fluid" alt="like"
                                                            loading="lazy"></a>
                                                    <a class="me-2" href="javascript:void(0);"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top"
                                                       title="Love"><img
                                                            src="{{asset('frontend/')}}/assets/images/icon/02.png"
                                                            class="img-fluid" alt="love"
                                                            loading="lazy"></a>
                                                    <a class="me-2" href="javascript:void(0);"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top"
                                                       title="Happy"><img
                                                            src="{{asset('frontend/')}}/assets/images/icon/03.png"
                                                            class="img-fluid" alt="happy"
                                                            loading="lazy"></a>
                                                    <a class="me-2" href="javascript:void(0);"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top"
                                                       title="HaHa"><img
                                                            src="{{asset('frontend/')}}/assets/images/icon/04.png"
                                                            class="img-fluid" alt="haha"
                                                            loading="lazy"></a>
                                                    <a class="me-2" href="javascript:void(0);"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top"
                                                       title="Think"><img
                                                            src="{{asset('frontend/')}}/assets/images/icon/05.png"
                                                            class="img-fluid" alt="think"
                                                            loading="lazy"></a>
                                                    <a class="me-2" href="javascript:void(0);"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top"
                                                       title="Sad"><img
                                                            src="{{asset('frontend/')}}/assets/images/icon/06.png"
                                                            class="img-fluid" alt="sad"
                                                            loading="lazy"></a>
                                                    <a class="me-2" href="javascript:void(0);"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top"
                                                       title="Lovely"><img
                                                            src="{{asset('frontend/')}}/assets/images/icon/07.png"
                                                            class="img-fluid" alt="lovely"
                                                            loading="lazy"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-3 flex-shrink-0">
                                        <div class="total-comment-block" type="button"
                                             data-bs-toggle="collapse"
                                             data-bs-target="#commentcollapes3"
                                             aria-expanded="false" aria-controls="commentcollapes">
                                    <span class="material-symbols-outlined align-text-top font-size-20">
                                       comment
                                    </span>
                                            <span class="fw-medium">20 Comment</span>
                                        </div>
                                        <div
                                            class="share-block d-flex align-items-center feather-icon">
                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                               data-bs-target="#share-btn" aria-controls="share-btn"
                                               class="d-flex align-items-center">
                                       <span class="material-symbols-outlined align-text-top font-size-20">
                                          share
                                       </span>
                                                <span class="ms-1 fw-medium">99 Share</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse mt-4 pt-4 border-top" id="commentcollapes3">
                                    <ul class="list-inline m-o p-0 comment-list">
                                        <li class="mb-3">
                                            <div class="comment-list-block">
                                                <div class="d-flex align-items-center gap-3">
                                                    <div
                                                        class="comment-list-user-img flex-shrink-0">
                                                        <img
                                                            src="{{asset('frontend/')}}/assets/images/user/13.jpg"
                                                            alt="userimg"
                                                            class="avatar-48 rounded-circle img-fluid"
                                                            loading="lazy">
                                                    </div>
                                                    <div class="comment-list-user-data">
                                                        <div
                                                            class="d-inline-flex align-items-center gap-1 flex-wrap">
                                                            <h6 class="m-0">Bob Frapples</h6>
                                                            <span
                                                                class="d-inline-block text-primary">
                                                   <svg class="align-text-bottom" xmlns="http://www.w3.org/2000/svg"
                                                        width="17" height="17"
                                                        viewBox="0 0 17 17" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M12.2483 0.216553H4.75081C2.13805 0.216553 0.5 2.0665 0.5 4.68444V11.7487C0.5 14.3666 2.13027 16.2166 4.75081 16.2166H12.2475C14.8689 16.2166 16.5 14.3666 16.5 11.7487V4.68444C16.5 2.0665 14.8689 0.216553 12.2483 0.216553Z"
                                                            fill="currentColor"/>
                                                      <path d="M5.5 8.21627L7.50056 10.216L11.5 6.21655" stroke="white"
                                                            stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round"/>
                                                   </svg>
                                                </span>
                                                            <spna
                                                                class="fw-medium small text-capitalize">
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
                                                            <span class="dropdown-toggle" data-bs-toggle="dropdown"
                                                                  aria-haspopup="true"
                                                                  aria-expanded="false" role="button">
                                                               <span
                                                                   class="material-symbols-outlined align-text-top font-size-18">
                                                                  thumb_up
                                                               </span>
                                                               <span class="fw-medium small">Likes</span>
                                                            </span>
                                                                            <div
                                                                                class="dropdown-menu py-2 shadow">
                                                                                <a class="ms-2 me-2"
                                                                                   href="javascript:void(0);"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top"
                                                                                   title="Like"><img
                                                                                        src="{{asset('frontend/')}}/assets/images/icon/01.png"
                                                                                        class="img-fluid"
                                                                                        alt="like"
                                                                                        loading="lazy"></a>
                                                                                <a class="me-2"
                                                                                   href="javascript:void(0);"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top"
                                                                                   title="Love"><img
                                                                                        src="{{asset('frontend/')}}/assets/images/icon/02.png"
                                                                                        class="img-fluid"
                                                                                        alt="love"
                                                                                        loading="lazy"></a>
                                                                                <a class="me-2"
                                                                                   href="javascript:void(0);"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top"
                                                                                   title="Happy"><img
                                                                                        src="{{asset('frontend/')}}/assets/images/icon/03.png"
                                                                                        class="img-fluid"
                                                                                        alt="happy"
                                                                                        loading="lazy"></a>
                                                                                <a class="me-2"
                                                                                   href="javascript:void(0);"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top"
                                                                                   title="HaHa"><img
                                                                                        src="{{asset('frontend/')}}/assets/images/icon/04.png"
                                                                                        class="img-fluid"
                                                                                        alt="haha"
                                                                                        loading="lazy"></a>
                                                                                <a class="me-2"
                                                                                   href="javascript:void(0);"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top"
                                                                                   title="Think"><img
                                                                                        src="{{asset('frontend/')}}/assets/images/icon/05.png"
                                                                                        class="img-fluid"
                                                                                        alt="think"
                                                                                        loading="lazy"></a>
                                                                                <a class="me-2"
                                                                                   href="javascript:void(0);"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top"
                                                                                   title="Sad"><img
                                                                                        src="{{asset('frontend/')}}/assets/images/icon/06.png"
                                                                                        class="img-fluid"
                                                                                        alt="sad"
                                                                                        loading="lazy"></a>
                                                                                <a class="me-2"
                                                                                   href="javascript:void(0);"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top"
                                                                                   title="Lovely"><img
                                                                                        src="{{asset('frontend/')}}/assets/images/icon/07.png"
                                                                                        class="img-fluid"
                                                                                        alt="lovely"
                                                                                        loading="lazy"></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                   <span class="fw-medium small" data-bs-toggle="collapse"
                                                         data-bs-target="#subcomment-collapse3" role="button"
                                                         aria-expanded="false"
                                                         aria-controls="collapseExample">
                                                      Reply
                                                   </span>
                                                            </li>
                                                        </ul>
                                                        <div
                                                            class="add-comment-form-block collapse mt-3"
                                                            id="subcomment-collapse3">
                                                            <div
                                                                class="d-flex align-items-center gap-3">
                                                                <div class="flex-shrink-0">
                                                                    <img
                                                                        src="{{asset('frontend/')}}/assets/images/user/1.jpg"
                                                                        alt="userimg"
                                                                        class="avatar-48 rounded-circle img-fluid"
                                                                        loading="lazy">
                                                                </div>
                                                                <div class="add-comment-form">
                                                                    <form>
                                                                        <input type="text"
                                                                               class="form-control"
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
                                                <img
                                                    src="{{asset('frontend/')}}/assets/images/user/1.jpg"
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
                    </div>
                </div>
                <div class="col-sm-12 social-post">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="user-post-data">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="me-3 flex-shrik-0">
                                        <img
                                            class="border border-2 rounded-circle user-post-profile"
                                            src="{{asset('frontend/')}}/assets/images/user/1.jpg"
                                            alt="user-image" loading="lazy">
                                    </div>
                                    <div class="w-100">
                                        <div
                                            class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <h6 class="mb-0 d-inline-block">Bni Cyst</h6>
                                                <span class="d-inline-block text-primary">
                                          <svg class="align-text-bottom" width="17" height="17" viewBox="0 0 17 17"
                                               fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                             <path fill-rule="evenodd" clip-rule="evenodd"
                                                   d="M11.8457 0H4.34822C1.73547 0 0.0974121 1.84995 0.0974121 4.46789V11.5321C0.0974121 14.1501 1.72768 16 4.34822 16H11.8449C14.4663 16 16.0974 14.1501 16.0974 11.5321V4.46789C16.0974 1.84995 14.4663 0 11.8457 0Z"
                                                   fill="currentColor"/>
                                             <path d="M5.09741 7.99978L7.09797 9.9995L11.0974 6.00006" stroke="white"
                                                   stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          </svg>
                                       </span>
                                                <span
                                                    class="mb-0 d-inline-block text-capitalize fw-medium">Added New Video in his Timeline</span>
                                                <p class="mb-0">8 Hours ago</p>
                                            </div>
                                            <div class="card-post-toolbar">
                                                <div class="dropdown">
                                          <span class="dropdown-toggle material-symbols-outlined"
                                                data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false" role="button">
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
                            </div>
                            <div class="user-post mt-4">
                                <div class="ratio ratio-16x9">
                                    <iframe
                                        src="https://www.youtube.com/embed/oHD33oKbKh4?si=VF-Qcp-pZdzUb3RX"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="post-meta-likes mt-4">
                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                    <ul class="list-inline m-0 p-0 post-user-liked-list">
                                        <li>
                                            <img
                                                src="{{asset('frontend/')}}/assets/images/user/01.jpg"
                                                alt="userimg"
                                                class="rounded-circle img-fluid userimg"
                                                loading="lazy">
                                        </li>
                                        <li>
                                            <img
                                                src="{{asset('frontend/')}}/assets/images/user/02.jpg"
                                                alt="userimg"
                                                class="rounded-circle img-fluid userimg"
                                                loading="lazy">
                                        </li>
                                        <li>
                                            <img
                                                src="{{asset('frontend/')}}/assets/images/user/03.jpg"
                                                alt="userimg"
                                                class="rounded-circle img-fluid userimg"
                                                loading="lazy">
                                        </li>
                                        <li>
                                            <img
                                                src="{{asset('frontend/')}}/assets/images/user/04.jpg"
                                                alt="userimg"
                                                class="rounded-circle img-fluid userimg"
                                                loading="lazy">
                                        </li>
                                    </ul>
                                    <div class="d-inline-flex align-items-center gap-1">
                                        <h6 class="m-0 font-size-14">Aliana Molex</h6>
                                        <span class="text-capitalize font-size-14 fw-medium"
                                              type="button" data-bs-toggle="modal"
                                              data-bs-target="#likemodal">and 208 others liked this</span>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-area mt-4 pt-4 border-top">
                                <div
                                    class="d-flex justify-content-between align-items-center flex-wrap">
                                    <div
                                        class="like-block position-relative d-flex align-items-center flex-shrink-0">
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
                                                    <a class="ms-2 me-2" href="javascript:void(0);"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top" title="Like"><img
                                                            src="{{asset('frontend/')}}/assets/images/icon/01.png"
                                                            class="img-fluid" alt="like"
                                                            loading="lazy"></a>
                                                    <a class="me-2" href="javascript:void(0);"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top"
                                                       title="Love"><img
                                                            src="{{asset('frontend/')}}/assets/images/icon/02.png"
                                                            class="img-fluid" alt="love"
                                                            loading="lazy"></a>
                                                    <a class="me-2" href="javascript:void(0);"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top"
                                                       title="Happy"><img
                                                            src="{{asset('frontend/')}}/assets/images/icon/03.png"
                                                            class="img-fluid" alt="happy"
                                                            loading="lazy"></a>
                                                    <a class="me-2" href="javascript:void(0);"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top"
                                                       title="HaHa"><img
                                                            src="{{asset('frontend/')}}/assets/images/icon/04.png"
                                                            class="img-fluid" alt="haha"
                                                            loading="lazy"></a>
                                                    <a class="me-2" href="javascript:void(0);"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top"
                                                       title="Think"><img
                                                            src="{{asset('frontend/')}}/assets/images/icon/05.png"
                                                            class="img-fluid" alt="think"
                                                            loading="lazy"></a>
                                                    <a class="me-2" href="javascript:void(0);"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top"
                                                       title="Sad"><img
                                                            src="{{asset('frontend/')}}/assets/images/icon/06.png"
                                                            class="img-fluid" alt="sad"
                                                            loading="lazy"></a>
                                                    <a class="me-2" href="javascript:void(0);"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top"
                                                       title="Lovely"><img
                                                            src="{{asset('frontend/')}}/assets/images/icon/07.png"
                                                            class="img-fluid" alt="lovely"
                                                            loading="lazy"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-3 flex-shrink-0">
                                        <div class="total-comment-block" type="button"
                                             data-bs-toggle="collapse"
                                             data-bs-target="#commentcollapes4"
                                             aria-expanded="false" aria-controls="commentcollapes">
                                    <span class="material-symbols-outlined align-text-top font-size-20">
                                       comment
                                    </span>
                                            <span class="fw-medium">20 Comment</span>
                                        </div>
                                        <div
                                            class="share-block d-flex align-items-center feather-icon">
                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                               data-bs-target="#share-btn"
                                               aria-controls="share-btn"
                                               class="d-flex align-items-center">
                                       <span class="material-symbols-outlined align-text-top font-size-20">
                                          share
                                       </span>
                                                <span class="ms-1 fw-medium">99 Share</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse mt-4 pt-4 border-top" id="commentcollapes4">
                                    <ul class="list-inline m-o p-0 comment-list">
                                        <li class="mb-3">
                                            <div class="comment-list-block">
                                                <div class="d-flex align-items-center gap-3">
                                                    <div
                                                        class="comment-list-user-img flex-shrink-0">
                                                        <img
                                                            src="{{asset('frontend/')}}/assets/images/user/13.jpg"
                                                            alt="userimg"
                                                            class="avatar-48 rounded-circle img-fluid"
                                                            loading="lazy">
                                                    </div>
                                                    <div class="comment-list-user-data">
                                                        <div
                                                            class="d-inline-flex align-items-center gap-1 flex-wrap">
                                                            <h6 class="m-0">Bob Frapples</h6>
                                                            <span
                                                                class="d-inline-block text-primary">
                                                   <svg class="align-text-bottom" xmlns="http://www.w3.org/2000/svg"
                                                        width="17"
                                                        height="17" viewBox="0 0 17 17" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M12.2483 0.216553H4.75081C2.13805 0.216553 0.5 2.0665 0.5 4.68444V11.7487C0.5 14.3666 2.13027 16.2166 4.75081 16.2166H12.2475C14.8689 16.2166 16.5 14.3666 16.5 11.7487V4.68444C16.5 2.0665 14.8689 0.216553 12.2483 0.216553Z"
                                                            fill="currentColor"/>
                                                      <path d="M5.5 8.21627L7.50056 10.216L11.5 6.21655" stroke="white"
                                                            stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"/>
                                                   </svg>
                                                </span>
                                                            <spna
                                                                class="fw-medium small text-capitalize">
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
                                                            <span class="dropdown-toggle" data-bs-toggle="dropdown"
                                                                  aria-haspopup="true" aria-expanded="false"
                                                                  role="button">
                                                               <span
                                                                   class="material-symbols-outlined align-text-top font-size-18">
                                                                  thumb_up
                                                               </span>
                                                               <span class="fw-medium small">Likes</span>
                                                            </span>
                                                                            <div
                                                                                class="dropdown-menu py-2 shadow">
                                                                                <a class="ms-2 me-2"
                                                                                   href="javascript:void(0);"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top"
                                                                                   title="Like"><img
                                                                                        src="{{asset('frontend/')}}/assets/images/icon/01.png"
                                                                                        class="img-fluid"
                                                                                        alt="like"
                                                                                        loading="lazy"></a>
                                                                                <a class="me-2"
                                                                                   href="javascript:void(0);"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top"
                                                                                   title="Love"><img
                                                                                        src="{{asset('frontend/')}}/assets/images/icon/02.png"
                                                                                        class="img-fluid"
                                                                                        alt="love"
                                                                                        loading="lazy"></a>
                                                                                <a class="me-2"
                                                                                   href="javascript:void(0);"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top"
                                                                                   title="Happy"><img
                                                                                        src="{{asset('frontend/')}}/assets/images/icon/03.png"
                                                                                        class="img-fluid"
                                                                                        alt="happy"
                                                                                        loading="lazy"></a>
                                                                                <a class="me-2"
                                                                                   href="javascript:void(0);"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top"
                                                                                   title="HaHa"><img
                                                                                        src="{{asset('frontend/')}}/assets/images/icon/04.png"
                                                                                        class="img-fluid"
                                                                                        alt="haha"
                                                                                        loading="lazy"></a>
                                                                                <a class="me-2"
                                                                                   href="javascript:void(0);"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top"
                                                                                   title="Think"><img
                                                                                        src="{{asset('frontend/')}}/assets/images/icon/05.png"
                                                                                        class="img-fluid"
                                                                                        alt="think"
                                                                                        loading="lazy"></a>
                                                                                <a class="me-2"
                                                                                   href="javascript:void(0);"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top"
                                                                                   title="Sad"><img
                                                                                        src="{{asset('frontend/')}}/assets/images/icon/06.png"
                                                                                        class="img-fluid"
                                                                                        alt="sad"
                                                                                        loading="lazy"></a>
                                                                                <a class="me-2"
                                                                                   href="javascript:void(0);"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top"
                                                                                   title="Lovely"><img
                                                                                        src="{{asset('frontend/')}}/assets/images/icon/07.png"
                                                                                        class="img-fluid"
                                                                                        alt="lovely"
                                                                                        loading="lazy"></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                   <span class="fw-medium small" data-bs-toggle="collapse"
                                                         data-bs-target="#subcomment-collapse4" role="button"
                                                         aria-expanded="false"
                                                         aria-controls="collapseExample">
                                                      Reply
                                                   </span>
                                                            </li>
                                                        </ul>
                                                        <div
                                                            class="add-comment-form-block collapse mt-3"
                                                            id="subcomment-collapse4">
                                                            <div
                                                                class="d-flex align-items-center gap-3">
                                                                <div class="flex-shrink-0">
                                                                    <img
                                                                        src="{{asset('frontend/')}}/assets/images/user/1.jpg"
                                                                        alt="userimg"
                                                                        class="avatar-48 rounded-circle img-fluid"
                                                                        loading="lazy">
                                                                </div>
                                                                <div class="add-comment-form">
                                                                    <form>
                                                                        <input type="text"
                                                                               class="form-control"
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
                                                <img
                                                    src="{{asset('frontend/')}}/assets/images/user/1.jpg"
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
                    </div>
                </div>
            </div>
        </div>
        <!-- status elements -->
        <div id="load-copy-content" class="d-none">
            <div class="col-sm-12 social-post">
                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <div class="user-post-data">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="me-3 flex-shrik-0">
                                    <img class="border border-2 rounded-circle user-post-profile"
                                         src="{{asset('frontend/')}}/assets/images/user/13.jpg"
                                         alt="user-image" loading="lazy">
                                </div>
                                <div class="w-100">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <h6 class="mb-0 d-inline-block">Bob Frapples</h6>
                                            <span class="d-inline-block text-primary">
                                       <svg class="align-text-bottom" width="17" height="17" viewBox="0 0 17 17"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M11.8457 0H4.34822C1.73547 0 0.0974121 1.84995 0.0974121 4.46789V11.5321C0.0974121 14.1501 1.72768 16 4.34822 16H11.8449C14.4663 16 16.0974 14.1501 16.0974 11.5321V4.46789C16.0974 1.84995 14.4663 0 11.8457 0Z"
                                                fill="currentColor"/>
                                          <path d="M5.09741 7.99978L7.09797 9.9995L11.0974 6.00006" stroke="white"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>
                                    </span>
                                            <span
                                                class="mb-0 d-inline-block text-capitalize fw-medium">Shared This Post in his
                                       Timeline</span>
                                            <p class="mb-0">9 Hours ago</p>
                                        </div>
                                        <div class="card-post-toolbar">
                                            <div class="dropdown">
                                       <span class="dropdown-toggle material-symbols-outlined" data-bs-toggle="dropdown"
                                             aria-haspopup="true" aria-expanded="false" role="button">
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
                                                                <p class="mb-0">See fewer posts like
                                                                    this.</p>
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
                                                                <p class="mb-0">Stop seeing posts
                                                                    but stay friends.</p>
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
                                                                    notifications for this post</p>
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
                            <p class="m-0">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Morbi nulla dolor, ornare at
                                commodo non, feugiat non nisi.
                                Phasellus faucibus mollis pharetra. Proin blandit ac massa sed
                                rhoncus"</p>
                            <ul class="list-inline m-0 p-0 d-flex flex-wrap gap-1">
                                <li>
                                    <a href="javascript:void(0);" contenteditable="false"
                                       style="cursor: pointer;">#bootstrap</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" contenteditable="false"
                                       style="cursor: pointer;">#framework</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" contenteditable="false"
                                       style="cursor: pointer;">#responsive</a>
                                </li>
                            </ul>
                        </div>
                        <div class="user-post mt-4">
                            <div class="p-3 rounded-3 bg-light-subtle">
                                <div class="d-flex gap-3">
                                    <div class="flex-shrink-0">
                                        <img
                                            src="{{asset('frontend/')}}/assets/images/icon/bootstrap-5.png"
                                            alt="bootstrap-icon" class="img-fluid">
                                    </div>
                                    <div>
                                        <h5 class="mb-2">About Bootstrap Framework</h5>
                                        <p class="m-0 text-body font-size-12 fw-medium">Morbi nulla
                                            dolor, ornare at
                                            commodo non, feugiat non nisi.
                                            Phasellus faucibus mollis pharetra. Proin blandit ac
                                            massa sed rhoncus</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post-meta-likes mt-4">
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                <ul class="list-inline m-0 p-0 post-user-liked-list">
                                    <li>
                                        <img src="{{asset('frontend/')}}/assets/images/user/01.jpg"
                                             alt="userimg" class="rounded-circle img-fluid userimg"
                                             loading="lazy">
                                    </li>
                                    <li>
                                        <img src="{{asset('frontend/')}}/assets/images/user/02.jpg"
                                             alt="userimg" class="rounded-circle img-fluid userimg"
                                             loading="lazy">
                                    </li>
                                    <li>
                                        <img src="{{asset('frontend/')}}/assets/images/user/03.jpg"
                                             alt="userimg" class="rounded-circle img-fluid userimg"
                                             loading="lazy">
                                    </li>
                                    <li>
                                        <img src="{{asset('frontend/')}}/assets/images/user/04.jpg"
                                             alt="userimg" class="rounded-circle img-fluid userimg"
                                             loading="lazy">
                                    </li>
                                </ul>
                                <div class="d-inline-flex align-items-center gap-1">
                                    <h6 class="m-0 font-size-14">Aliana Molex</h6>
                                    <span class="text-capitalize font-size-14 fw-medium"
                                          type="button" data-bs-toggle="modal"
                                          data-bs-target="#likemodal">and 208 others liked this</span>
                                </div>
                            </div>
                        </div>
                        <div class="comment-area mt-4 pt-4 border-top">
                            <div
                                class="d-flex justify-content-between align-items-center flex-wrap">
                                <div
                                    class="like-block position-relative d-flex align-items-center flex-shrink-0">
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
                                                <a class="ms-2 me-2" href="javascript:void(0);"
                                                   data-bs-toggle="tooltip"
                                                   data-bs-placement="top" title="Like"><img
                                                        src="{{asset('frontend/')}}/assets/images/icon/01.png"
                                                        class="img-fluid" alt="like" loading="lazy"></a>
                                                <a class="me-2" href="javascript:void(0);"
                                                   data-bs-toggle="tooltip" data-bs-placement="top"
                                                   title="Love"><img
                                                        src="{{asset('frontend/')}}/assets/images/icon/02.png"
                                                        class="img-fluid" alt="love"
                                                        loading="lazy"></a>
                                                <a class="me-2" href="javascript:void(0);"
                                                   data-bs-toggle="tooltip" data-bs-placement="top"
                                                   title="Happy"><img
                                                        src="{{asset('frontend/')}}/assets/images/icon/03.png"
                                                        class="img-fluid" alt="happy"
                                                        loading="lazy"></a>
                                                <a class="me-2" href="javascript:void(0);"
                                                   data-bs-toggle="tooltip" data-bs-placement="top"
                                                   title="HaHa"><img
                                                        src="{{asset('frontend/')}}/assets/images/icon/04.png"
                                                        class="img-fluid" alt="haha"
                                                        loading="lazy"></a>
                                                <a class="me-2" href="javascript:void(0);"
                                                   data-bs-toggle="tooltip" data-bs-placement="top"
                                                   title="Think"><img
                                                        src="{{asset('frontend/')}}/assets/images/icon/05.png"
                                                        class="img-fluid" alt="think"
                                                        loading="lazy"></a>
                                                <a class="me-2" href="javascript:void(0);"
                                                   data-bs-toggle="tooltip" data-bs-placement="top"
                                                   title="Sad"><img
                                                        src="{{asset('frontend/')}}/assets/images/icon/06.png"
                                                        class="img-fluid" alt="sad"
                                                        loading="lazy"></a>
                                                <a class="me-2" href="javascript:void(0);"
                                                   data-bs-toggle="tooltip" data-bs-placement="top"
                                                   title="Lovely"><img
                                                        src="{{asset('frontend/')}}/assets/images/icon/07.png"
                                                        class="img-fluid" alt="lovely"
                                                        loading="lazy"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-3 flex-shrink-0">
                                    <div class="total-comment-block" type="button"
                                         data-bs-toggle="collapse"
                                         data-bs-target="#commentcollapes5" aria-expanded="false"
                                         aria-controls="commentcollapes">
                                 <span class="material-symbols-outlined align-text-top font-size-20">
                                    comment
                                 </span>
                                        <span class="fw-medium">20 Comment</span>
                                    </div>
                                    <div class="share-block d-flex align-items-center feather-icon">
                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                           data-bs-target="#share-btn"
                                           aria-controls="share-btn"
                                           class="d-flex align-items-center">
                                    <span class="material-symbols-outlined align-text-top font-size-20">
                                       share
                                    </span>
                                            <span class="ms-1 fw-medium">99 Share</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse mt-4 pt-4 border-top" id="commentcollapes5">
                                <ul class="list-inline m-o p-0 comment-list">
                                    <li class="mb-3">
                                        <div class="comment-list-block">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="comment-list-user-img flex-shrink-0">
                                                    <img
                                                        src="{{asset('frontend/')}}/assets/images/user/13.jpg"
                                                        alt="userimg"
                                                        class="avatar-48 rounded-circle img-fluid"
                                                        loading="lazy">
                                                </div>
                                                <div class="comment-list-user-data">
                                                    <div
                                                        class="d-inline-flex align-items-center gap-1 flex-wrap">
                                                        <h6 class="m-0">Bob Frapples</h6>
                                                        <span class="d-inline-block text-primary">
                                                <svg class="align-text-bottom" xmlns="http://www.w3.org/2000/svg"
                                                     width="17"
                                                     height="17" viewBox="0 0 17 17" fill="none">
                                                   <path fill-rule="evenodd" clip-rule="evenodd"
                                                         d="M12.2483 0.216553H4.75081C2.13805 0.216553 0.5 2.0665 0.5 4.68444V11.7487C0.5 14.3666 2.13027 16.2166 4.75081 16.2166H12.2475C14.8689 16.2166 16.5 14.3666 16.5 11.7487V4.68444C16.5 2.0665 14.8689 0.216553 12.2483 0.216553Z"
                                                         fill="currentColor"/>
                                                   <path d="M5.5 8.21627L7.50056 10.216L11.5 6.21655" stroke="white"
                                                         stroke-width="1.5" stroke-linecap="round"
                                                         stroke-linejoin="round"/>
                                                </svg>
                                             </span>
                                                        <spna
                                                            class="fw-medium small text-capitalize">
                                                            3 min ago
                                                        </spna>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment-list-user-comment">
                                                <div class="comment-list-comment">
                                                    "Just stumbled upon this post and it's giving me
                                                    all the feels! 🙌"
                                                </div>
                                                <div class="comment-list-action mt-2">
                                                    <ul class="list-inline m-0 p-0 d-flex align-items-center gap-2">
                                                        <li>
                                                            <div
                                                                class="like-block position-relative d-flex align-items-center flex-shrink-0">
                                                                <div class="like-data">
                                                                    <div class="dropdown">
                                                         <span class="dropdown-toggle" data-bs-toggle="dropdown"
                                                               aria-haspopup="true" aria-expanded="false" role="button">
                                                            <span
                                                                class="material-symbols-outlined align-text-top font-size-18">
                                                               thumb_up
                                                            </span>
                                                            <span class="fw-medium small">Likes</span>
                                                         </span>
                                                                        <div
                                                                            class="dropdown-menu py-2 shadow">
                                                                            <a class="ms-2 me-2"
                                                                               href="javascript:void(0);"
                                                                               data-bs-toggle="tooltip"
                                                                               data-bs-placement="top"
                                                                               title="Like"><img
                                                                                    src="{{asset('frontend/')}}/assets/images/icon/01.png"
                                                                                    class="img-fluid"
                                                                                    alt="like"
                                                                                    loading="lazy"></a>
                                                                            <a class="me-2"
                                                                               href="javascript:void(0);"
                                                                               data-bs-toggle="tooltip"
                                                                               data-bs-placement="top"
                                                                               title="Love"><img
                                                                                    src="{{asset('frontend/')}}/assets/images/icon/02.png"
                                                                                    class="img-fluid"
                                                                                    alt="love"
                                                                                    loading="lazy"></a>
                                                                            <a class="me-2"
                                                                               href="javascript:void(0);"
                                                                               data-bs-toggle="tooltip"
                                                                               data-bs-placement="top"
                                                                               title="Happy"><img
                                                                                    src="{{asset('frontend/')}}/assets/images/icon/03.png"
                                                                                    class="img-fluid"
                                                                                    alt="happy"
                                                                                    loading="lazy"></a>
                                                                            <a class="me-2"
                                                                               href="javascript:void(0);"
                                                                               data-bs-toggle="tooltip"
                                                                               data-bs-placement="top"
                                                                               title="HaHa"><img
                                                                                    src="{{asset('frontend/')}}/assets/images/icon/04.png"
                                                                                    class="img-fluid"
                                                                                    alt="haha"
                                                                                    loading="lazy"></a>
                                                                            <a class="me-2"
                                                                               href="javascript:void(0);"
                                                                               data-bs-toggle="tooltip"
                                                                               data-bs-placement="top"
                                                                               title="Think"><img
                                                                                    src="{{asset('frontend/')}}/assets/images/icon/05.png"
                                                                                    class="img-fluid"
                                                                                    alt="think"
                                                                                    loading="lazy"></a>
                                                                            <a class="me-2"
                                                                               href="javascript:void(0);"
                                                                               data-bs-toggle="tooltip"
                                                                               data-bs-placement="top"
                                                                               title="Sad"><img
                                                                                    src="{{asset('frontend/')}}/assets/images/icon/06.png"
                                                                                    class="img-fluid"
                                                                                    alt="sad"
                                                                                    loading="lazy"></a>
                                                                            <a class="me-2"
                                                                               href="javascript:void(0);"
                                                                               data-bs-toggle="tooltip"
                                                                               data-bs-placement="top"
                                                                               title="Lovely"><img
                                                                                    src="{{asset('frontend/')}}/assets/images/icon/07.png"
                                                                                    class="img-fluid"
                                                                                    alt="lovely"
                                                                                    loading="lazy"></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                <span class="fw-medium small" data-bs-toggle="collapse"
                                                      data-bs-target="#subcomment-collapse5" role="button"
                                                      aria-expanded="false"
                                                      aria-controls="collapseExample">
                                                   Reply
                                                </span>
                                                        </li>
                                                    </ul>
                                                    <div
                                                        class="add-comment-form-block collapse mt-3"
                                                        id="subcomment-collapse5">
                                                        <div
                                                            class="d-flex align-items-center gap-3">
                                                            <div class="flex-shrink-0">
                                                                <img
                                                                    src="{{asset('frontend/')}}/assets/images/user/1.jpg"
                                                                    alt="userimg"
                                                                    class="avatar-48 rounded-circle img-fluid"
                                                                    loading="lazy">
                                                            </div>
                                                            <div class="add-comment-form">
                                                                <form>
                                                                    <input type="text"
                                                                           class="form-control"
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
                                            <img
                                                src="{{asset('frontend/')}}/assets/images/user/1.jpg"
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
                </div>
            </div>
            <div class="col-sm-12 social-post">
                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <div class="user-post-data">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="me-3 flex-shrik-0">
                                    <img class="border border-2 rounded-circle user-post-profile"
                                         src="{{asset('frontend/')}}/assets/images/user/14.jpg"
                                         alt="user-image" loading="lazy">
                                </div>
                                <div class="w-100">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <h6 class="mb-0 d-inline-block">Greta Life</h6>
                                            <span class="d-inline-block text-primary">
                                       <svg class="align-text-bottom" width="17" height="17" viewBox="0 0 17 17"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M11.8457 0H4.34822C1.73547 0 0.0974121 1.84995 0.0974121 4.46789V11.5321C0.0974121 14.1501 1.72768 16 4.34822 16H11.8449C14.4663 16 16.0974 14.1501 16.0974 11.5321V4.46789C16.0974 1.84995 14.4663 0 11.8457 0Z"
                                                fill="currentColor"/>
                                          <path d="M5.09741 7.99978L7.09797 9.9995L11.0974 6.00006" stroke="white"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>
                                    </span>
                                            <p class="mb-0">12 Hours ago</p>
                                        </div>
                                        <div class="card-post-toolbar">
                                            <div class="dropdown">
                                       <span class="dropdown-toggle material-symbols-outlined" data-bs-toggle="dropdown"
                                             aria-haspopup="true" aria-expanded="false" role="button">
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
                                                                <p class="mb-0">See fewer posts like
                                                                    this.</p>
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
                                                                <p class="mb-0">Stop seeing posts
                                                                    but stay friends.</p>
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
                                                                    notifications for this post</p>
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
                        <div class="user-post mt-4">
                            <div class="text-center">
                                <img src="{{asset('frontend/')}}/assets/images/page-img/ads.jpg"
                                     alt="ads" class="img-fluid">
                                <a href="javascript:void(0);"
                                   class="btn btn-primary w-100 rounded-top-0">
                              <span class="d-flex align-items-center justify-content-between gap-1">
                                 <span>Shop Now</span>
                                 <span class="material-symbols-outlined">
                                    chevron_right
                                 </span>
                              </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 social-post">
                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <div class="user-post-data">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="me-3 flex-shrik-0">
                                    <img class="border border-2 rounded-circle user-post-profile"
                                         src="{{asset('frontend/')}}/assets/images/user/15.jpg"
                                         alt="user-image" loading="lazy">
                                </div>
                                <div class="w-100">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <h6 class="mb-0 d-inline-block">Pete Sariya</h6>
                                            <span class="d-inline-block text-primary">
                                       <svg class="align-text-bottom" width="17" height="17" viewBox="0 0 17 17"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M11.8457 0H4.34822C1.73547 0 0.0974121 1.84995 0.0974121 4.46789V11.5321C0.0974121 14.1501 1.72768 16 4.34822 16H11.8449C14.4663 16 16.0974 14.1501 16.0974 11.5321V4.46789C16.0974 1.84995 14.4663 0 11.8457 0Z"
                                                fill="currentColor"/>
                                          <path d="M5.09741 7.99978L7.09797 9.9995L11.0974 6.00006" stroke="white"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>
                                    </span>
                                            <span
                                                class="mb-0 d-inline-block text-capitalize fw-medium">created a poll</span>
                                            <p class="mb-0">15 Hours ago</p>
                                        </div>
                                        <div class="card-post-toolbar">
                                            <div class="dropdown">
                                       <span class="dropdown-toggle material-symbols-outlined" data-bs-toggle="dropdown"
                                             aria-haspopup="true" aria-expanded="false" role="button">
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
                                                                <p class="mb-0">See fewer posts like
                                                                    this.</p>
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
                                                                <p class="mb-0">Stop seeing posts
                                                                    but stay friends.</p>
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
                                                                    notifications for this post</p>
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
                        <div class="user-post mt-4">
                            <h5 class="mb-4 text-capitalize">which programming language should i
                                learn?</h5>
                            <ul class="list-inline m-0 p-0">
                                <li class="mb-4">
                                    <div class="d-flex gap-3">
                                        <div class="flex-shrink-0">
                                            <h6 class="mb-0">75%</h6>
                                        </div>
                                        <div class="w-100">
                                            <div
                                                class="d-flex align-items-center justify-content-between gap-3 w-100 mb-1">
                                                <h6>Python</h6>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                           name="poll" id="python">
                                                </div>
                                            </div>
                                            <div class="progress" role="progressbar"
                                                 aria-label="Basic example" aria-valuenow="75"
                                                 aria-valuemin="0" aria-valuemax="100"
                                                 style="height: .5rem;">
                                                <div class="progress-bar w-75"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-4">
                                    <div class="d-flex gap-3">
                                        <div class="flex-shrink-0">
                                            <h6 class="mb-0">50%</h6>
                                        </div>
                                        <div class="w-100">
                                            <div
                                                class="d-flex align-items-center justify-content-between gap-3 w-100 mb-1">
                                                <h6>Javascript</h6>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                           name="poll" id="javascript">
                                                </div>
                                            </div>
                                            <div class="progress" role="progressbar"
                                                 aria-label="Basic example" aria-valuenow="50"
                                                 aria-valuemin="0" aria-valuemax="100"
                                                 style="height: .5rem;">
                                                <div class="progress-bar w-50"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex gap-3">
                                        <div class="flex-shrink-0">
                                            <h6 class="mb-0">25%</h6>
                                        </div>
                                        <div class="w-100">
                                            <div
                                                class="d-flex align-items-center justify-content-between gap-3 w-100 mb-1">
                                                <h6>C++</h6>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                           name="poll" id="c">
                                                </div>
                                            </div>
                                            <div class="progress" role="progressbar"
                                                 aria-label="Basic example" aria-valuenow="25"
                                                 aria-valuemin="0" aria-valuemax="100"
                                                 style="height: .5rem;">
                                                <div class="progress-bar w-25"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="post-meta-likes mt-4 pt-4 border-top">
                            <div
                                class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                    <ul class="list-inline m-0 p-0 post-user-liked-list">
                                        <li>
                                            <img
                                                src="{{asset('frontend/')}}/assets/images/user/01.jpg"
                                                alt="userimg"
                                                class="rounded-circle img-fluid userimg"
                                                loading="lazy">
                                        </li>
                                        <li>
                                            <img
                                                src="{{asset('frontend/')}}/assets/images/user/02.jpg"
                                                alt="userimg"
                                                class="rounded-circle img-fluid userimg"
                                                loading="lazy">
                                        </li>
                                        <li>
                                            <img
                                                src="{{asset('frontend/')}}/assets/images/user/03.jpg"
                                                alt="userimg"
                                                class="rounded-circle img-fluid userimg"
                                                loading="lazy">
                                        </li>
                                        <li>
                                            <img
                                                src="{{asset('frontend/')}}/assets/images/user/04.jpg"
                                                alt="userimg"
                                                class="rounded-circle img-fluid userimg"
                                                loading="lazy">
                                        </li>
                                    </ul>
                                    <h6 class="m-0 font-size-14 lh-lg">Total Votes: <b>25</b></h6>
                                </div>
                                <button type="submit" class="btn btn-primary">Vote</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 social-post">
                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <div class="user-post-data">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="me-3 flex-shrik-0">
                                    <img class="border border-2 rounded-circle user-post-profile"
                                         src="{{asset('frontend/')}}/assets/images/user/17.jpg"
                                         alt="user-image" loading="lazy">
                                </div>
                                <div class="w-100">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <h6 class="mb-0 d-inline-block">Marcum Shaw</h6>
                                            <span class="d-inline-block text-primary">
                                       <svg class="align-text-bottom" width="17" height="17" viewBox="0 0 17 17"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M11.8457 0H4.34822C1.73547 0 0.0974121 1.84995 0.0974121 4.46789V11.5321C0.0974121 14.1501 1.72768 16 4.34822 16H11.8449C14.4663 16 16.0974 14.1501 16.0974 11.5321V4.46789C16.0974 1.84995 14.4663 0 11.8457 0Z"
                                                fill="currentColor"/>
                                          <path d="M5.09741 7.99978L7.09797 9.9995L11.0974 6.00006" stroke="white"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>
                                    </span>
                                            <span
                                                class="mb-0 d-inline-block text-capitalize fw-medium">Shared This Post</span>
                                            <p class="mb-0">24 Hours ago</p>
                                        </div>
                                        <div class="card-post-toolbar">
                                            <div class="dropdown">
                                       <span class="dropdown-toggle material-symbols-outlined" data-bs-toggle="dropdown"
                                             aria-haspopup="true" aria-expanded="false" role="button">
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
                                                                <p class="mb-0">See fewer posts like
                                                                    this.</p>
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
                                                                <p class="mb-0">Stop seeing posts
                                                                    but stay friends.</p>
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
                                                                    notifications for this post</p>
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
                        <div class="user-post mt-4">
                            <div class="card shadow mb-0">
                                <div class="card-body">
                                    <div class="user-post-data">
                                        <div
                                            class="d-flex align-items-center justify-content-between">
                                            <div class="me-3 flex-shrik-0">
                                                <img
                                                    class="border border-2 rounded-circle user-post-profile"
                                                    src="{{asset('frontend/')}}/assets/images/user/16.jpg"
                                                    alt="user-image" loading="lazy">
                                            </div>
                                            <div class="w-100">
                                                <h6 class="mb-0 d-inline-block">Paige Turner</h6>
                                                <span class="d-inline-block text-primary">
                                          <svg class="align-text-bottom" width="17" height="17" viewBox="0 0 17 17"
                                               fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                             <path fill-rule="evenodd" clip-rule="evenodd"
                                                   d="M11.8457 0H4.34822C1.73547 0 0.0974121 1.84995 0.0974121 4.46789V11.5321C0.0974121 14.1501 1.72768 16 4.34822 16H11.8449C14.4663 16 16.0974 14.1501 16.0974 11.5321V4.46789C16.0974 1.84995 14.4663 0 11.8457 0Z"
                                                   fill="currentColor"/>
                                             <path d="M5.09741 7.99978L7.09797 9.9995L11.0974 6.00006" stroke="white"
                                                   stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          </svg>
                                       </span>
                                                <p class="mb-0">9 Hours ago</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <p class="m-0">"Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Morbi nulla dolor, ornare at
                                            commodo non, feugiat non nisi.
                                            Phasellus faucibus mollis pharetra. Proin blandit ac
                                            massa sed rhoncus"</p>
                                        <ul class="list-inline m-0 p-0 d-flex flex-wrap gap-1">
                                            <li>
                                                <a href="javascript:void(0);"
                                                   contenteditable="false" style="cursor: pointer;">#design</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"
                                                   contenteditable="false" style="cursor: pointer;">#themes</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"
                                                   contenteditable="false" style="cursor: pointer;">#ui/ux</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="user-post mt-4">
                                        <div class="card shadow overflow-hidden mb-0">
                                            <img
                                                src="{{asset('frontend/')}}/assets/images/page-img/profile-bg9.jpg"
                                                class="card-img-top w-100 object-cover"
                                                alt="group-image" height="250">
                                            <div class="card-body text-center">
                                                <h5 class="card-title">Themes</h5>
                                                <p class="card-text">It is a long established fact
                                                    that a reader will be distracted by the
                                                    readable content of a page when looking at its
                                                    layout.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post-meta-likes mt-4">
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                <ul class="list-inline m-0 p-0 post-user-liked-list">
                                    <li>
                                        <img src="{{asset('frontend/')}}/assets/images/user/01.jpg"
                                             alt="userimg" class="rounded-circle img-fluid userimg"
                                             loading="lazy">
                                    </li>
                                    <li>
                                        <img src="{{asset('frontend/')}}/assets/images/user/02.jpg"
                                             alt="userimg" class="rounded-circle img-fluid userimg"
                                             loading="lazy">
                                    </li>
                                    <li>
                                        <img src="{{asset('frontend/')}}/assets/images/user/03.jpg"
                                             alt="userimg" class="rounded-circle img-fluid userimg"
                                             loading="lazy">
                                    </li>
                                    <li>
                                        <img src="{{asset('frontend/')}}/assets/images/user/04.jpg"
                                             alt="userimg" class="rounded-circle img-fluid userimg"
                                             loading="lazy">
                                    </li>
                                </ul>
                                <div class="d-inline-flex align-items-center gap-1">
                                    <h6 class="m-0 font-size-14">Aliana Molex</h6>
                                    <span class="text-capitalize font-size-14 fw-medium"
                                          type="button" data-bs-toggle="modal"
                                          data-bs-target="#likemodal">and 208 others liked this</span>
                                </div>
                            </div>
                        </div>
                        <div class="comment-area mt-4 pt-4 border-top">
                            <div
                                class="d-flex justify-content-between align-items-center flex-wrap">
                                <div
                                    class="like-block position-relative d-flex align-items-center flex-shrink-0">
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
                                                <a class="ms-2 me-2" href="javascript:void(0);"
                                                   data-bs-toggle="tooltip"
                                                   data-bs-placement="top" title="Like"><img
                                                        src="{{asset('frontend/')}}/assets/images/icon/01.png"
                                                        class="img-fluid" alt="like" loading="lazy"></a>
                                                <a class="me-2" href="javascript:void(0);"
                                                   data-bs-toggle="tooltip" data-bs-placement="top"
                                                   title="Love"><img
                                                        src="{{asset('frontend/')}}/assets/images/icon/02.png"
                                                        class="img-fluid" alt="love"
                                                        loading="lazy"></a>
                                                <a class="me-2" href="javascript:void(0);"
                                                   data-bs-toggle="tooltip" data-bs-placement="top"
                                                   title="Happy"><img
                                                        src="{{asset('frontend/')}}/assets/images/icon/03.png"
                                                        class="img-fluid" alt="happy"
                                                        loading="lazy"></a>
                                                <a class="me-2" href="javascript:void(0);"
                                                   data-bs-toggle="tooltip" data-bs-placement="top"
                                                   title="HaHa"><img
                                                        src="{{asset('frontend/')}}/assets/images/icon/04.png"
                                                        class="img-fluid" alt="haha"
                                                        loading="lazy"></a>
                                                <a class="me-2" href="javascript:void(0);"
                                                   data-bs-toggle="tooltip" data-bs-placement="top"
                                                   title="Think"><img
                                                        src="{{asset('frontend/')}}/assets/images/icon/05.png"
                                                        class="img-fluid" alt="think"
                                                        loading="lazy"></a>
                                                <a class="me-2" href="javascript:void(0);"
                                                   data-bs-toggle="tooltip" data-bs-placement="top"
                                                   title="Sad"><img
                                                        src="{{asset('frontend/')}}/assets/images/icon/06.png"
                                                        class="img-fluid" alt="sad"
                                                        loading="lazy"></a>
                                                <a class="me-2" href="javascript:void(0);"
                                                   data-bs-toggle="tooltip" data-bs-placement="top"
                                                   title="Lovely"><img
                                                        src="{{asset('frontend/')}}/assets/images/icon/07.png"
                                                        class="img-fluid" alt="lovely"
                                                        loading="lazy"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-3 flex-shrink-0">
                                    <div class="total-comment-block" type="button"
                                         data-bs-toggle="collapse"
                                         data-bs-target="#commentcollapes6" aria-expanded="false"
                                         aria-controls="commentcollapes">
                                 <span class="material-symbols-outlined align-text-top font-size-20">
                                    comment
                                 </span>
                                        <span class="fw-medium">20 Comment</span>
                                    </div>
                                    <div class="share-block d-flex align-items-center feather-icon">
                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                           data-bs-target="#share-btn"
                                           aria-controls="share-btn"
                                           class="d-flex align-items-center">
                                    <span class="material-symbols-outlined align-text-top font-size-20">
                                       share
                                    </span>
                                            <span class="ms-1 fw-medium">99 Share</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse mt-4 pt-4 border-top" id="commentcollapes6">
                                <ul class="list-inline m-o p-0 comment-list">
                                    <li class="mb-3">
                                        <div class="comment-list-block">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="comment-list-user-img flex-shrink-0">
                                                    <img
                                                        src="{{asset('frontend/')}}/assets/images/user/13.jpg"
                                                        alt="userimg"
                                                        class="avatar-48 rounded-circle img-fluid"
                                                        loading="lazy">
                                                </div>
                                                <div class="comment-list-user-data">
                                                    <div
                                                        class="d-inline-flex align-items-center gap-1 flex-wrap">
                                                        <h6 class="m-0">Bob Frapples</h6>
                                                        <span class="d-inline-block text-primary">
                                                <svg class="align-text-bottom" xmlns="http://www.w3.org/2000/svg"
                                                     width="17"
                                                     height="17" viewBox="0 0 17 17" fill="none">
                                                   <path fill-rule="evenodd" clip-rule="evenodd"
                                                         d="M12.2483 0.216553H4.75081C2.13805 0.216553 0.5 2.0665 0.5 4.68444V11.7487C0.5 14.3666 2.13027 16.2166 4.75081 16.2166H12.2475C14.8689 16.2166 16.5 14.3666 16.5 11.7487V4.68444C16.5 2.0665 14.8689 0.216553 12.2483 0.216553Z"
                                                         fill="currentColor"/>
                                                   <path d="M5.5 8.21627L7.50056 10.216L11.5 6.21655" stroke="white"
                                                         stroke-width="1.5" stroke-linecap="round"
                                                         stroke-linejoin="round"/>
                                                </svg>
                                             </span>
                                                        <spna
                                                            class="fw-medium small text-capitalize">
                                                            3 min ago
                                                        </spna>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment-list-user-comment">
                                                <div class="comment-list-comment">
                                                    "Just stumbled upon this post and it's giving me
                                                    all the feels! 🙌"
                                                </div>
                                                <div class="comment-list-action mt-2">
                                                    <ul class="list-inline m-0 p-0 d-flex align-items-center gap-2">
                                                        <li>
                                                            <div
                                                                class="like-block position-relative d-flex align-items-center flex-shrink-0">
                                                                <div class="like-data">
                                                                    <div class="dropdown">
                                                         <span class="dropdown-toggle" data-bs-toggle="dropdown"
                                                               aria-haspopup="true" aria-expanded="false" role="button">
                                                            <span
                                                                class="material-symbols-outlined align-text-top font-size-18">
                                                               thumb_up
                                                            </span>
                                                            <span class="fw-medium small">Likes</span>
                                                         </span>
                                                                        <div
                                                                            class="dropdown-menu py-2 shadow">
                                                                            <a class="ms-2 me-2"
                                                                               href="javascript:void(0);"
                                                                               data-bs-toggle="tooltip"
                                                                               data-bs-placement="top"
                                                                               title="Like"><img
                                                                                    src="{{asset('frontend/')}}/assets/images/icon/01.png"
                                                                                    class="img-fluid"
                                                                                    alt="like"
                                                                                    loading="lazy"></a>
                                                                            <a class="me-2"
                                                                               href="javascript:void(0);"
                                                                               data-bs-toggle="tooltip"
                                                                               data-bs-placement="top"
                                                                               title="Love"><img
                                                                                    src="{{asset('frontend/')}}/assets/images/icon/02.png"
                                                                                    class="img-fluid"
                                                                                    alt="love"
                                                                                    loading="lazy"></a>
                                                                            <a class="me-2"
                                                                               href="javascript:void(0);"
                                                                               data-bs-toggle="tooltip"
                                                                               data-bs-placement="top"
                                                                               title="Happy"><img
                                                                                    src="{{asset('frontend/')}}/assets/images/icon/03.png"
                                                                                    class="img-fluid"
                                                                                    alt="happy"
                                                                                    loading="lazy"></a>
                                                                            <a class="me-2"
                                                                               href="javascript:void(0);"
                                                                               data-bs-toggle="tooltip"
                                                                               data-bs-placement="top"
                                                                               title="HaHa"><img
                                                                                    src="{{asset('frontend/')}}/assets/images/icon/04.png"
                                                                                    class="img-fluid"
                                                                                    alt="haha"
                                                                                    loading="lazy"></a>
                                                                            <a class="me-2"
                                                                               href="javascript:void(0);"
                                                                               data-bs-toggle="tooltip"
                                                                               data-bs-placement="top"
                                                                               title="Think"><img
                                                                                    src="{{asset('frontend/')}}/assets/images/icon/05.png"
                                                                                    class="img-fluid"
                                                                                    alt="think"
                                                                                    loading="lazy"></a>
                                                                            <a class="me-2"
                                                                               href="javascript:void(0);"
                                                                               data-bs-toggle="tooltip"
                                                                               data-bs-placement="top"
                                                                               title="Sad"><img
                                                                                    src="{{asset('frontend/')}}/assets/images/icon/06.png"
                                                                                    class="img-fluid"
                                                                                    alt="sad"
                                                                                    loading="lazy"></a>
                                                                            <a class="me-2"
                                                                               href="javascript:void(0);"
                                                                               data-bs-toggle="tooltip"
                                                                               data-bs-placement="top"
                                                                               title="Lovely"><img
                                                                                    src="{{asset('frontend/')}}/assets/images/icon/07.png"
                                                                                    class="img-fluid"
                                                                                    alt="lovely"
                                                                                    loading="lazy"></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                <span class="fw-medium small" data-bs-toggle="collapse"
                                                      data-bs-target="#subcomment-collapse6" role="button"
                                                      aria-expanded="false"
                                                      aria-controls="collapseExample">
                                                   Reply
                                                </span>
                                                        </li>
                                                    </ul>
                                                    <div
                                                        class="add-comment-form-block collapse mt-3"
                                                        id="subcomment-collapse6">
                                                        <div
                                                            class="d-flex align-items-center gap-3">
                                                            <div class="flex-shrink-0">
                                                                <img
                                                                    src="{{asset('frontend/')}}/assets/images/user/1.jpg"
                                                                    alt="userimg"
                                                                    class="avatar-48 rounded-circle img-fluid"
                                                                    loading="lazy">
                                                            </div>
                                                            <div class="add-comment-form">
                                                                <form>
                                                                    <input type="text"
                                                                           class="form-control"
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
                                            <img
                                                src="{{asset('frontend/')}}/assets/images/user/1.jpg"
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
                </div>
            </div>
        </div>
        <div class="row">
            <div class="scroller-status col-sm-12 text-center">
                <div class="infinite-scroll-request loader-ellips">
                    <img src="{{asset('frontend/')}}/assets/images/page-img/page-load-loader.gif"
                         alt="loader" style="height: 100px;" loading="lazy">
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">active users</h4>
                </div>
            </div>
            <div class="card-body pt-0">
                <ul class="list-inline m-0 p-0">
                    <li class="d-flex align-items-center gap-3 mb-3">
                        <img src="{{asset('frontend/')}}/assets/images/user/01.jpg" alt="story-img"
                             class="avatar-60 avatar-borderd object-cover avatar-rounded img-fluid d-inline-block">
                        <div>
                            <h5 class="d-inline-block">Arina Event</h5>
                            <span class="profile-status-online"></span>
                            <small class="text-capitalize d-block">Active</small>
                        </div>
                    </li>
                    <li class="d-flex align-items-center gap-3 mb-3">
                        <img src="{{asset('frontend/')}}/assets/images/user/02.jpg" alt="story-img"
                             class="avatar-60 avatar-borderd object-cover avatar-rounded img-fluid d-inline-block">
                        <div>
                            <h5 class="d-inline-block">Darlene Robertson</h5>
                            <span class="profile-status-online"></span>
                            <small class="text-capitalize d-block">Active</small>
                        </div>
                    </li>
                    <li class="d-flex align-items-center gap-3 mb-3">
                        <img src="{{asset('frontend/')}}/assets/images/user/03.jpg" alt="story-img"
                             class="avatar-60 avatar-borderd object-cover avatar-rounded img-fluid d-inline-block">
                        <div>
                            <h5 class="d-inline-block">Jerome Bell</h5>
                            <span class="profile-status-offline"></span>
                            <small class="text-capitalize d-block">7 hours ago</small>
                        </div>
                    </li>
                    <li class="d-flex align-items-center gap-3">
                        <img src="{{asset('frontend/')}}/assets/images/user/05.jpg" alt="story-img"
                             class="avatar-60 avatar-borderd object-cover avatar-rounded img-fluid d-inline-block">
                        <div>
                            <h5 class="d-inline-block">Arlene McCoy</h5>
                            <span class="profile-status-offline"></span>
                            <small class="text-capitalize d-block">4 days ago</small>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="fixed-suggestion mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Suggestions for you</h4>
                    </div>
                    <small class="fw-500 text-capitalize">See all</small>
                </div>
                <div class="card-body pt-0">
                    <ul class="list-inline m-0 p-0">
                        <li class="mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <img src="{{asset('frontend/')}}/assets/images/user/06.jpg"
                                     alt="story-img"
                                     class="avatar-60 avatar-borderd object-cover avatar-rounded img-fluid d-inline-block">
                                <div>
                                    <div
                                        class="d-flex align-items-center justify-content-between gap-2">
                                        <div>
                                            <h5>Annette Black</h5>
                                            <small class="text-capitalize">Followed by dribbble + 2
                                                more</small>
                                        </div>
                                        <div class="d-flex align-items-center flex-shrink-0 gap-2">
                                            <button class="btn btn-primary-subtle p-1 lh-1">
                                                <i class="material-symbols-outlined font-size-14">
                                                    add
                                                </i>
                                            </button>
                                            <button class="btn btn-danger-subtle p-1 lh-1">
                                                <i class="material-symbols-outlined font-size-14">
                                                    close
                                                </i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <img src="{{asset('frontend/')}}/assets/images/user/07.jpg"
                                     alt="story-img"
                                     class="avatar-60 avatar-borderd object-cover avatar-rounded img-fluid d-inline-block">
                                <div>
                                    <div
                                        class="d-flex align-items-center justify-content-between gap-2">
                                        <div>
                                            <h5>Christopher Plessis</h5>
                                            <small class="text-capitalize">Followed by dribbble + 2
                                                more</small>
                                        </div>
                                        <div class="d-flex align-items-center flex-shrink-0 gap-2">
                                            <button class="btn btn-primary-subtle p-1 lh-1">
                                                <i class="material-symbols-outlined font-size-14">
                                                    add
                                                </i>
                                            </button>
                                            <button class="btn btn-danger-subtle p-1 lh-1">
                                                <i class="material-symbols-outlined font-size-14">
                                                    close
                                                </i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-3">
                                <img src="{{asset('frontend/')}}/assets/images/user/08.jpg"
                                     alt="story-img"
                                     class="avatar-60 avatar-borderd object-cover avatar-rounded img-fluid d-inline-block">
                                <div>
                                    <div
                                        class="d-flex align-items-center justify-content-between gap-2">
                                        <div>
                                            <h5>Ellyse Perry</h5>
                                            <small class="text-capitalize">Followed by dribbble + 2
                                                more</small>
                                        </div>
                                        <div class="d-flex align-items-center flex-shrink-0 gap-2">
                                            <button class="btn btn-primary-subtle p-1 lh-1">
                                                <i class="material-symbols-outlined font-size-14">
                                                    add
                                                </i>
                                            </button>
                                            <button class="btn btn-danger-subtle p-1 lh-1">
                                                <i class="material-symbols-outlined font-size-14">
                                                    close
                                                </i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Latest Activities</h4>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <ul class="list-inline m-0 p-0">
                        <li class="d-flex mb-3 pb-3 border-bottom">
                            <img src="{{asset('frontend/')}}/assets/images/user/09.jpg"
                                 alt="story-img"
                                 class="avatar-32 avatar-rounded object-cover img-fluid">
                            <div class="stories-data ms-3">
                                <h6 class="font-size-14">Esther Howard <span
                                        class="fw-normal text-body">reacted comment
                              in to your</span> <span class="fw-normal">post.</span></h6>
                                <small class="text-capitalize">19 min ago</small>
                            </div>
                        </li>
                        <li class="d-flex mb-3 pb-3 border-bottom">
                            <img src="{{asset('frontend/')}}/assets/images/user/10.jpg"
                                 alt="story-img"
                                 class="avatar-32 avatar-rounded object-cover img-fluid">
                            <div class="stories-data ms-3">
                                <h6 class="font-size-14">Monty Carlo <span
                                        class="text-body fw-normal">followed
                              you.</span></h6>
                                <small class="text-capitalize">7 day ago</small>
                            </div>
                        </li>
                        <li class="d-flex mb-3 pb-3 border-bottom">
                            <img src="{{asset('frontend/')}}/assets/images/user/13.jpg"
                                 alt="story-img"
                                 class="avatar-32 avatar-rounded object-cover img-fluid">
                            <div class="stories-data ms-3">
                                <h6 class="font-size-14">Pete Sariya <span
                                        class="text-body fw-normal">voted for
                           </span>combination of colors from your brand palette</h6>
                                <small class="text-capitalize">1 month ago</small>
                            </div>
                        </li>
                        <li class="d-flex">
                            <img src="{{asset('frontend/')}}/assets/images/user/14.jpg"
                                 alt="story-img"
                                 class="avatar-32 avatar-rounded object-cover img-fluid">
                            <div class="stories-data ms-3">
                                <h6 class="font-size-14">Dima Davydov <span
                                        class="text-body fw-normal">replied to your
                              comment</span></h6>
                                <small class="text-capitalize">1 month ago</small>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
