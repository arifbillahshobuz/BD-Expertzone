@extends('user-interface.layout.layout');
@section('title')
    User Profile
@endsection

@section('content')
    <div class="container position-relative p-0">
        <div class="header-cover-img" style="width: 100%; overflow: hidden; position: relative;">
            <img
                src="{{ asset(optional(auth()->user()->profile)->cover_photo ?? 'frontend/assets/images/page-img/profile-bg1.jpg') }}"
                class="img-fluid w-100"
                style="object-fit: cover; height: 300px;"
                alt="Cover Photo"
            >
            <!-- Edit Icon -->
            <button
                class="btn btn-sm bg-primary rounded-pill position-absolute"
                style="top: 15px; right: 15px;"
                data-bs-toggle="modal"
                data-bs-target="#coverPhotoModal"
            >
                <span class="material-symbols-outlined">edit</span>
            </button>
        </div>
    </div>

    <!-- Cover Photo Modal -->
    <div class="modal fade" id="coverPhotoModal" tabindex="-1" aria-labelledby="coverPhotoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('user.update-cover-photo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="coverPhotoModalLabel">Update Cover Photo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="file" name="cover_photo" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card profile-box">
                <div class="card-body">
                    <div class="row align-items-center item-header-content">
                        <div class="col-lg-4 profile-left">
                            <ul class="d-flex align-items-center justify-content-center gap-3 list-inline p-0 m-0 mb-3 flex-wrap">
                                <li class="d-flex align-items-center gap-1">
                                    <img src="{{ asset('frontend//assets/images/gamipress/coin.svg') }}"
                                        class="img-fluid avatar-24" alt="coin" loading="lazy">
                                    <h6 class="font-size-14 fw-semibold">6765 Coins</h6>
                                </li>
                                <li class="d-flex align-items-center gap-1">
                                    <img src="{{ asset('frontend/assets/images/gamipress/credit.svg') }}"
                                        class="img-fluid avatar-24" alt="credit" loading="lazy">
                                    <h6 class="font-size-14 fw-semibold">7180 Credits</h6>
                                </li>
                                <li class="d-flex align-items-center gap-1">
                                    <img src="../assets/images/gamipress/gems.svg" class="img-fluid avatar-24"
                                        alt="coin" loading="lazy">
                                    <h6 class="font-size-14 fw-semibold">100 Gems</h6>
                                </li>
                            </ul>
                            <div class="social-links">
                                <ul
                                    class="social-data-block d-flex align-items-center justify-content-center list-inline p-0 m-0">
                                    <li class="text-center pe-3">
                                        <a href="#"><img src="{{ asset('frontend/') }}/assets/images/icon/08.png"
                                                class="img-fluid rounded" alt="facebook" loading="lazy"></a>
                                    </li>
                                    <li class="text-center pe-3">
                                        <a href="#"><img src="{{ asset('frontend/') }}/assets/images/icon/09.png"
                                                class="img-fluid rounded" alt="Twitter" loading="lazy"></a>
                                    </li>
                                    <li class="text-center pe-3">
                                        <a href="#"><img src="{{ asset('frontend/') }}/assets/images/icon/10.png"
                                                class="img-fluid rounded" alt="Instagram" loading="lazy"></a>
                                    </li>
                                    <li class="text-center pe-3">
                                        <a href="#"><img src="{{ asset('frontend/') }}/assets/images/icon/11.png"
                                                class="img-fluid rounded" alt="Google plus" loading="lazy"></a>
                                    </li>
                                    <li class="text-center pe-3">
                                        <a href="#"><img src="{{ asset('frontend/') }}/assets/images/icon/12.png"
                                                class="img-fluid rounded" alt="You tube" loading="lazy"></a>
                                    </li>
                                    <li class="text-center md-pe-3 pe-0">
                                        <a href="#"><img src="{{ asset('frontend/') }}/assets/images/icon/13.png"
                                                class="img-fluid rounded" alt="linkedin" loading="lazy"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 text-center profile-center">
{{--                            <div class="header-avatar position-relative d-inline-block">--}}
{{--                                <span class="change-profile-image bg-primary rounded-pill">--}}
{{--                                    <span class="material-symbols-outlined text-white font-size-16">photo_camera</span>--}}
{{--                                </span>--}}
{{--                                <img src="../assets/images/user/1.jpg" alt="user"--}}
{{--                                    class="avatar-150 border border-4 border-white rounded-3">--}}
{{--                                <span class="badge bg-success fw-500 letter-spacing-1 chat-status">online</span>--}}
{{--                            </div>--}}

                            <!-- Profile Photo Section -->
                            <div class="header-avatar position-relative d-inline-block">
                                <div style="position: relative; display: inline-block;">
                                    <img src="{{ asset(auth()->user()->avatar ?? 'frontend/assets/images/user/1.jpg') }}"
                                         alt="Profile Photo"
                                         class="avatar-150 border border-4 border-white rounded-3"
                                         style="width: 150px; height: 150px; object-fit: cover;">

                                    <!-- Edit Button -->
                                    <button class="btn btn-sm bg-primary rounded-pill position-absolute"
                                            style="
                                                top: 5px;
                                                right: 5px;
                                                width: 30px;
                                                height: 30px;
                                                padding: 0;
                                                border-radius: 50%;
                                                "
                                            data-bs-toggle="modal"
                                            data-bs-target="#profilePhotoModal">
                                        <span class="material-symbols-outlined">photo_camera</span>
                                    </button>
                                </div>
                                <span class="badge bg-success fw-500 letter-spacing-1 chat-status">online</span>
                            </div>

                            <!-- Profile Photo Modal -->
                            <div class="modal fade" id="profilePhotoModal" tabindex="-1" aria-labelledby="profilePhotoModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('user.update-profile-photo') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="profilePhotoModalLabel">Update Profile Photo</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="avatar" class="form-label">Select new profile photo</label>
                                                    <input type="file" class="form-control" id="avatar" name="avatar" required>
                                                </div>
                                                <div class="text-center">
                                                    <img id="profilePhotoPreview"
                                                         src="{{ asset(auth()->user()->avatar ?? 'frontend/assets/images/user/1.jpg') }}"
                                                         class="img-fluid rounded-circle"
                                                         style="width: 200px; height: 200px; object-fit: cover;">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>






                            <h5 class="d-flex align-items-center justify-content-center gap-1 mb-2">Marvin McKinney <span
                                    class="badge  bg-primary rounded-pill material-symbols-outlined font-size-14 p-0">done</span>
                            </h5>
                            <ul class="d-flex align-items-center justify-content-center gap-3 list-inline p-0 m-0">
                                <li class="d-flex align-items-center gap-1">
                                    <h6 class="material-symbols-outlined font-size-14">location_on</h6>
                                    <span class="font-size-14 text-uppercase fw-500">lyON</span>
                                </li>
                                <li class="d-flex align-items-center gap-1">
                                    <h6 class="material-symbols-outlined font-size-14">globe_asia</h6>
                                    <a href="https://smartinvestmentoff.com/"
                                        class="font-size-14 fw-500 text-body">smartinvestmentoff.com/</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 profile-right">
                            <ul class="user-meta list-inline p-0 d-flex align-items-center justify-content-center">
                                <li>
                                    <h5>0</h5>Posts
                                </li>
                                <li>
                                    <h5>0</h5>Comments
                                </li>
                                <li>
                                    <h5>82.6K</h5>Views
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body p-0">
                    <div class="user-tabing item-list-tabs">
                        <ul class="nav nav-pills d-flex align-items-center justify-content-center profile-feed-items p-0 m-0 rounded"
                            role="tablist">
                            <li class="nav-item col-12 col-sm-3" role="presentation">
                                <a class="nav-link active d-flex flex-md-column align-items-center flex-row justify-content-center gap-2"
                                    href="#pills-timeline-tab" data-bs-toggle="pill" data-bs-target="#timeline"
                                    role="button" aria-selected="true">
                                    <span class="icon rounded-3"><span
                                            class="material-symbols-outlined">calendar_month</span></span>
                                    <p class="mb-0 mt-0 mt-md-3">Timeline</p>
                                </a>
                            </li>
                            <li class="nav-item col-12 col-sm-3" role="presentation">
                                <a class="nav-link d-flex flex-md-column align-items-center flex-row justify-content-center gap-2"
                                    href="#pills-about-tab" data-bs-toggle="pill" data-bs-target="#about" role="button"
                                    aria-selected="false" tabindex="-1">
                                    <span class="icon rounded-3"><span
                                            class="material-symbols-outlined">person</span></span>
                                    <p class="mb-0 mt-0 mt-md-3">About</p>
                                </a>
                            </li>
                            <li class="nav-item col-12 col-sm-3" role="presentation">
                                <a class="nav-link d-flex flex-md-column align-items-center flex-row justify-content-center gap-2"
                                    href="#pills-friends-tab" data-bs-toggle="pill" data-bs-target="#friends"
                                    role="button" aria-selected="false" tabindex="-1">
                                    <span class="icon rounded-3"><span
                                            class="material-symbols-outlined">group</span></span>
                                    <p class="mb-0 mt-0 mt-md-3">Friends</p>
                                </a>
                            </li>
                            <li class="nav-item col-12 col-sm-3" role="presentation">
                                <a class="nav-link d-flex flex-md-column align-items-center flex-row justify-content-center gap-2"
                                    href="#pills-photos-tab" data-bs-toggle="pill" data-bs-target="#photos"
                                    role="button" aria-selected="false" tabindex="-1">
                                    <span class="icon rounded-3"><span
                                            class="material-symbols-outlined">image</span></span>
                                    <p class="mb-0 mt-0 mt-md-3">Photos</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="timeline" role="tabpanel">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="#" class="d-inline-flex align-items-center"><span
                                                class="badge badge-pill bg-primary font-weight-normal me-1 material-symbols-outlined md-14">grade</span><span>27
                                                Items for you</span></a>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between border-bottom">
                                        <div class="header-title">
                                            <h4 class="card-title">Life Event</h4>
                                        </div>
                                        <div class="card-header-toolbar d-flex align-items-center">
                                            <p class="m-0"><a href="javacsript:void();"> Create </a></p>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="event-post position-relative">
                                                    <a href="#"><img src="../assets/images/page-img/07.jpg"
                                                            alt="gallary-image" class="img-fluid rounded"
                                                            loading="lazy"></a>
                                                    <div class="job-icon-position">
                                                        <div
                                                            class="job-icon bg-primary p-2 d-inline-block rounded-circle material-symbols-outlined text-white">
                                                            local_mall
                                                        </div>
                                                    </div>
                                                    <div class="card-body text-center p-2">
                                                        <h5>Started New Job at Apple</h5>
                                                        <p>January 24, 2019</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="event-post position-relative">
                                                    <a href="#"><img src="../assets/images/page-img/06.jpg"
                                                            alt="gallary-image" class="img-fluid rounded"
                                                            loading="lazy"></a>
                                                    <div class="job-icon-position">
                                                        <div
                                                            class="job-icon bg-primary p-2 d-inline-block rounded-circle material-symbols-outlined text-white">
                                                            local_mall
                                                        </div>
                                                    </div>
                                                    <div class="card-body text-center p-2">
                                                        <h5>Freelance Photographer</h5>
                                                        <p class="mb-0">January 24, 2019</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fixed-suggestion mb-4">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between border-bottom">
                                            <div class="header-title">
                                                <h4 class="card-title">Photos</h4>
                                            </div>
                                            <div class="card-header-toolbar d-flex align-items-center">
                                                <p class="m-0"><a href="javacsript:void();">Add Photo </a></p>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <ul class="profile-img-gallary p-0 m-0 list-unstyled">
                                                <li class="">
                                                    <a data-fslightbox="gallery" href="../assets/images/page-img/g1.jpg">
                                                        <img src="../assets/images/page-img/g1.jpg" class="img-fluid"
                                                            alt="photo-profile" loading="lazy">
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a data-fslightbox="gallery" href="../assets/images/page-img/g2.jpg">
                                                        <img src="../assets/images/page-img/g2.jpg" class="img-fluid"
                                                            alt="photo-profile" loading="lazy">
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a data-fslightbox="gallery" href="../assets/images/page-img/g3.jpg">
                                                        <img src="../assets/images/page-img/g3.jpg" class="img-fluid"
                                                            alt="photo-profile" loading="lazy">
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a data-fslightbox="gallery" href="../assets/images/page-img/g4.jpg">
                                                        <img src="../assets/images/page-img/g4.jpg" class="img-fluid"
                                                            alt="photo-profile" loading="lazy">
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a data-fslightbox="gallery" href="../assets/images/page-img/g5.jpg">
                                                        <img src="../assets/images/page-img/g5.jpg" class="img-fluid"
                                                            alt="photo-profile" loading="lazy">
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a data-fslightbox="gallery" href="../assets/images/page-img/g6.jpg">
                                                        <img src="../assets/images/page-img/g6.jpg" class="img-fluid"
                                                            alt="photo-profile" loading="lazy">
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a data-fslightbox="gallery" href="../assets/images/page-img/g7.jpg">
                                                        <img src="../assets/images/page-img/g7.jpg" class="img-fluid"
                                                            alt="photo-profile" loading="lazy">
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a data-fslightbox="gallery" href="../assets/images/page-img/g8.jpg">
                                                        <img src="../assets/images/page-img/g8.jpg" class="img-fluid"
                                                            alt="photo-profile" loading="lazy">
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a data-fslightbox="gallery" href="../assets/images/page-img/g9.jpg">
                                                        <img src="../assets/images/page-img/g9.jpg" class="img-fluid"
                                                            alt="photo-profile" loading="lazy">
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between border-bottom">
                                            <div class="header-title">
                                                <h4 class="card-title">Friends</h4>
                                            </div>
                                            <div class="card-header-toolbar d-flex align-items-center">
                                                <p class="m-0"><a href="javacsript:void();">Add New </a></p>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row row-cols-xl-3 row-cols-md-2 row-cols-2">
                                                <div class="col mt-2 text-center">
                                                    <a href="#"><img src="../assets/images/user/05.jpg"
                                                            alt="gallary-image" loading="lazy" class="img-fluid"></a>
                                                    <h6 class="mt-2 text-center">Anna Rexia</h6>
                                                </div>
                                                <div class="col mt-2 text-center">
                                                    <a href="#"><img src="../assets/images/user/06.jpg"
                                                            alt="gallary-image" loading="lazy" class="img-fluid"></a>
                                                    <h6 class="mt-2 text-center">Tara Zona</h6>
                                                </div>
                                                <div class="col mt-2 text-center">
                                                    <a href="#"><img src="../assets/images/user/07.jpg"
                                                            alt="gallary-image" loading="lazy" class="img-fluid"></a>
                                                    <h6 class="mt-2 text-center">Polly Tech</h6>
                                                </div>
                                                <div class="col mt-2 text-center">
                                                    <a href="#"><img src="../assets/images/user/08.jpg"
                                                            alt="gallary-image" loading="lazy" class="img-fluid"></a>
                                                    <h6 class="mt-2 text-center">Bill Emia</h6>
                                                </div>
                                                <div class="col mt-2 text-center">
                                                    <a href="#"><img src="../assets/images/user/09.jpg"
                                                            alt="gallary-image" loading="lazy" class="img-fluid"></a>
                                                    <h6 class="mt-2 text-center">Moe Fugga</h6>
                                                </div>
                                                <div class="col mt-2 text-center">
                                                    <a href="#"><img src="../assets/images/user/10.jpg"
                                                            alt="gallary-image" loading="lazy" class="img-fluid"></a>
                                                    <h6 class="mt-2 text-center">Hal Appeno </h6>
                                                </div>
                                                <div class="col mt-2 text-center">
                                                    <a href="#"><img src="../assets/images/user/07.jpg"
                                                            alt="gallary-image" loading="lazy" class="img-fluid"></a>
                                                    <h6 class="mt-2 text-center">Zack Lee</h6>
                                                </div>
                                                <div class="col mt-2 text-center">
                                                    <a href="#"><img src="../assets/images/user/06.jpg"
                                                            alt="gallary-image" loading="lazy" class="img-fluid"></a>
                                                    <h6 class="mt-2 text-center">Terry Aki</h6>
                                                </div>
                                                <div class="col mt-2 text-center">
                                                    <a href="#"><img src="../assets/images/user/05.jpg"
                                                            alt="gallary-image" loading="lazy" class="img-fluid"></a>
                                                    <h6 class="mt-2 text-center">Greta Life</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
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
                                                                        height="16" viewBox="0 0 18 16"
                                                                        fill="none">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M11.5334 1.3761C12.3751 1.7111 12.6326 2.87776 12.9767 3.25276C13.3209 3.62776 13.8134 3.75526 14.0859 3.75526C15.5342 3.75526 16.7084 4.92943 16.7084 6.37693V11.2061C16.7084 13.1478 15.1334 14.7228 13.1917 14.7228H4.80841C2.86591 14.7228 1.29175 13.1478 1.29175 11.2061V6.37693C1.29175 4.92943 2.46591 3.75526 3.91425 3.75526C4.18591 3.75526 4.67841 3.62776 5.02341 3.25276C5.36758 2.87776 5.62425 1.7111 6.46591 1.3761C7.30841 1.0411 10.6917 1.0411 11.5334 1.3761Z"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                        <path d="M13.5794 5.91667H13.5869"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M11.6489 8.94C11.6489 7.47667 10.4631 6.29083 8.99975 6.29083C7.53642 6.29083 6.35059 7.47667 6.35059 8.94C6.35059 10.4033 7.53642 11.5892 8.99975 11.5892C10.4631 11.5892 11.6489 10.4033 11.6489 8.94Z"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="text-body">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                                        height="18" viewBox="0 0 18 18"
                                                                        fill="none">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M7.23043 11.6718C4.02709 11.6718 1.29126 12.156 1.29126 14.096C1.29126 16.036 4.01043 16.5377 7.23043 16.5377C10.4346 16.5377 13.1696 16.0527 13.1696 14.1135C13.1696 12.1743 10.4513 11.6718 7.23043 11.6718Z"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M7.23042 8.90493C9.33292 8.90493 11.0371 7.20076 11.0371 5.09826C11.0371 2.99576 9.33292 1.2916 7.23042 1.2916C5.12875 1.2916 3.42459 2.99576 3.42459 5.09826C3.41709 7.19326 5.10875 8.89743 7.20459 8.90493H7.23042Z"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                        <path d="M15.0031 6.22427V9.56594"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                        <path d="M16.7079 7.895H13.2996"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="text-body">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                        height="18" viewBox="0 0 14 18"
                                                                        fill="none">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M9.08341 7.75041C9.08341 6.59935 8.15072 5.66666 7.0005 5.66666C5.84944 5.66666 4.91675 6.59935 4.91675 7.75041C4.91675 8.90063 5.84944 9.83332 7.0005 9.83332C8.15072 9.83332 9.08341 8.90063 9.08341 7.75041Z"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M6.99959 16.5C6.00086 16.5 0.75 12.2486 0.75 7.80274C0.75 4.3222 3.54758 1.5 6.99959 1.5C10.4516 1.5 13.25 4.3222 13.25 7.80274C13.25 12.2486 7.99832 16.5 6.99959 16.5Z"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div>
                                                        <ul class="list-inline m-0 p-0 d-flex align-items-center gap-4">
                                                            <li>
                                                                <a href="javascript:void(0);" class="text-body fw-medium">
                                                                    Discard
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <button type="button"
                                                                    class="btn btn-primary px-4">Post</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="post-modal" tabindex="-1"
                                                aria-labelledby="post-modalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-fullscreen-sm-down">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="post-modalLabel">Create Post</h5>
                                                            <a href="javascript:void(0);" class="lh-1"
                                                                data-bs-dismiss="modal">
                                                                <span class="material-symbols-outlined">close</span>
                                                            </a>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="d-flex align-items-center">
                                                                <div class="user-img">
                                                                    <img src="../assets/images/user/1.jpg" alt="userimg"
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
                                                            <ul
                                                                class="d-flex flex-wrap align-items-center list-inline m-0 p-0">
                                                                <li class="col-md-6 mb-3">
                                                                    <div
                                                                        class="bg-primary-subtle rounded p-2 pointer me-3">
                                                                        <a href="javascript:void(0);"
                                                                            class="d-inline-block fw-medium text-body">
                                                                            <span
                                                                                class="material-symbols-outlined align-middle font-size-20 me-1">
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
                                                                            <span
                                                                                class="material-symbols-outlined align-middle font-size-20 me-1">
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
                                                                            <span
                                                                                class="material-symbols-outlined align-middle font-size-20 me-1">
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
                                                                            <span
                                                                                class="material-symbols-outlined align-middle font-size-20 me-1">
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
                                                                            <span
                                                                                class="material-symbols-outlined align-middle font-size-20 me-1">
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
                                                                            <span
                                                                                class="material-symbols-outlined align-middle font-size-20 me-1">
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
                                                                            <span
                                                                                class="material-symbols-outlined align-middle font-size-20 me-1">
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
                                                                            <span
                                                                                class="material-symbols-outlined align-middle font-size-20 me-1">
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
                                                                            <img src="../assets/images/user/1.jpg"
                                                                                alt="userimg"
                                                                                class="avatar-60 rounded-circle img-fluid">
                                                                        </div>
                                                                        <h6>Your Story</h6>
                                                                    </div>
                                                                    <div class="card-post-toolbar">
                                                                        <div class="dropdown">
                                                                            <span class="dropdown-toggle"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-haspopup="true" aria-expanded="false"
                                                                                role="button">
                                                                                <span class="btn btn-primary">Friend</span>
                                                                            </span>
                                                                            <div class="dropdown-menu m-0 p-0">
                                                                                <a class="dropdown-item p-3"
                                                                                    href="#">
                                                                                    <div class="d-flex align-items-top">
                                                                                        <span
                                                                                            class="material-symbols-outlined">
                                                                                            save
                                                                                        </span>
                                                                                        <div class="data ms-2">
                                                                                            <h6>Public</h6>
                                                                                            <p class="mb-0">Anyone on or
                                                                                                off Facebook</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                                <a class="dropdown-item p-3"
                                                                                    href="#">
                                                                                    <div class="d-flex align-items-top">
                                                                                        <span
                                                                                            class="material-symbols-outlined">
                                                                                            cancel
                                                                                        </span>
                                                                                        <div class="data ms-2">
                                                                                            <h6>Friends</h6>
                                                                                            <p class="mb-0">Your Friend
                                                                                                on facebook</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                                <a class="dropdown-item p-3"
                                                                                    href="#">
                                                                                    <div class="d-flex align-items-top">
                                                                                        <span
                                                                                            class="material-symbols-outlined">
                                                                                            person_remove
                                                                                        </span>
                                                                                        <div class="data ms-2">
                                                                                            <h6>Friends except</h6>
                                                                                            <p class="mb-0">Don't show to
                                                                                                some friends</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                                <a class="dropdown-item p-3"
                                                                                    href="#">
                                                                                    <div class="d-flex align-items-top">
                                                                                        <span
                                                                                            class="material-symbols-outlined">
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
                                                                class="btn btn-primary d-block w-100 mt-3">Post</button>
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
                                                                src="../assets/images/user/01.jpg" alt="user-image"
                                                                loading="lazy">
                                                        </div>
                                                        <div class="w-100">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div>
                                                                    <h6 class="mb-0 d-inline-block">Anna Sthesia</h6>
                                                                    <span class="d-inline-block text-primary">
                                                                        <svg class="align-text-bottom" width="17"
                                                                            height="17" viewBox="0 0 17 17"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                d="M11.8457 0H4.34822C1.73547 0 0.0974121 1.84995 0.0974121 4.46789V11.5321C0.0974121 14.1501 1.72768 16 4.34822 16H11.8449C14.4663 16 16.0974 14.1501 16.0974 11.5321V4.46789C16.0974 1.84995 14.4663 0 11.8457 0Z"
                                                                                fill="currentColor"></path>
                                                                            <path
                                                                                d="M5.09741 7.99978L7.09797 9.9995L11.0974 6.00006"
                                                                                stroke="white" stroke-width="1.5"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"></path>
                                                                        </svg>
                                                                    </span>
                                                                    <span
                                                                        class="mb-0 d-inline-block text-capitalize fw-medium">posted
                                                                        an
                                                                        update</span>
                                                                    <p class="mb-0">2 minutes ago</p>
                                                                </div>
                                                                <div class="card-post-toolbar">
                                                                    <div class="dropdown">
                                                                        <span
                                                                            class="dropdown-toggle material-symbols-outlined"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false" role="button">
                                                                            more_horiz
                                                                        </span>
                                                                        <div class="dropdown-menu m-0 p-0">
                                                                            <a class="dropdown-item p-3" href="#">
                                                                                <div class="d-flex align-items-top">
                                                                                    <span
                                                                                        class="material-symbols-outlined">
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
                                                                                    <span
                                                                                        class="material-symbols-outlined">
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
                                                                                    <span
                                                                                        class="material-symbols-outlined">
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
                                                                                    <span
                                                                                        class="material-symbols-outlined">
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
                                                    <a data-fslightbox="gallery" href="../assets/images/page-img/fun.jpg"
                                                        class="rounded">
                                                        <img src="../assets/images/page-img/fun.jpg" alt="post-image"
                                                            class="img-fluid rounded w-100" loading="lazy">
                                                    </a>
                                                </div>
                                                <div class="post-meta-likes mt-4">
                                                    <div class="d-flex align-items-center gap-2 flex-wrap">
                                                        <ul class="list-inline m-0 p-0 post-user-liked-list">
                                                            <li>
                                                                <img src="../assets/images/user/01.jpg" alt="userimg"
                                                                    class="rounded-circle img-fluid userimg"
                                                                    loading="lazy">
                                                            </li>
                                                            <li>
                                                                <img src="../assets/images/user/02.jpg" alt="userimg"
                                                                    class="rounded-circle img-fluid userimg"
                                                                    loading="lazy">
                                                            </li>
                                                            <li>
                                                                <img src="../assets/images/user/03.jpg" alt="userimg"
                                                                    class="rounded-circle img-fluid userimg"
                                                                    loading="lazy">
                                                            </li>
                                                            <li>
                                                                <img src="../assets/images/user/04.jpg" alt="userimg"
                                                                    class="rounded-circle img-fluid userimg"
                                                                    loading="lazy">
                                                            </li>
                                                        </ul>
                                                        <div class="d-inline-flex align-items-center gap-1">
                                                            <h6 class="m-0 font-size-14">Aliana Molex</h6>
                                                            <span class="text-capitalize font-size-14 fw-medium"
                                                                type="button" data-bs-toggle="modal"
                                                                data-bs-target="#likemodal">and 208 others liked
                                                                this</span>
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
                                                                    <span class="dropdown-toggle"
                                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false" role="button">
                                                                        <span
                                                                            class="material-symbols-outlined align-text-top font-size-20">
                                                                            thumb_up
                                                                        </span>
                                                                        <span class="fw-medium">140 Likes</span>
                                                                    </span>
                                                                    <div class="dropdown-menu py-2">
                                                                        <a class="ms-2 me-2" href="javascript:void(0);"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" aria-label="Like"
                                                                            data-bs-original-title="Like"><img
                                                                                src="../assets/images/icon/01.png"
                                                                                class="img-fluid" alt="like"
                                                                                loading="lazy"></a>
                                                                        <a class="me-2" href="javascript:void(0);"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" aria-label="Love"
                                                                            data-bs-original-title="Love"><img
                                                                                src="../assets/images/icon/02.png"
                                                                                class="img-fluid" alt="love"
                                                                                loading="lazy"></a>
                                                                        <a class="me-2" href="javascript:void(0);"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" aria-label="Happy"
                                                                            data-bs-original-title="Happy"><img
                                                                                src="../assets/images/icon/03.png"
                                                                                class="img-fluid" alt="happy"
                                                                                loading="lazy"></a>
                                                                        <a class="me-2" href="javascript:void(0);"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" aria-label="HaHa"
                                                                            data-bs-original-title="HaHa"><img
                                                                                src="../assets/images/icon/04.png"
                                                                                class="img-fluid" alt="haha"
                                                                                loading="lazy"></a>
                                                                        <a class="me-2" href="javascript:void(0);"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" aria-label="Think"
                                                                            data-bs-original-title="Think"><img
                                                                                src="../assets/images/icon/05.png"
                                                                                class="img-fluid" alt="think"
                                                                                loading="lazy"></a>
                                                                        <a class="me-2" href="javascript:void(0);"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" aria-label="Sad"
                                                                            data-bs-original-title="Sad"><img
                                                                                src="../assets/images/icon/06.png"
                                                                                class="img-fluid" alt="sad"
                                                                                loading="lazy"></a>
                                                                        <a class="me-2" href="javascript:void(0);"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" aria-label="Lovely"
                                                                            data-bs-original-title="Lovely"><img
                                                                                src="../assets/images/icon/07.png"
                                                                                class="img-fluid" alt="lovely"
                                                                                loading="lazy"></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center gap-3 flex-shrink-0">
                                                            <div class="total-comment-block" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#commentcollapes1" aria-expanded="false"
                                                                aria-controls="commentcollapes">
                                                                <span
                                                                    class="material-symbols-outlined align-text-top font-size-20">
                                                                    comment
                                                                </span>
                                                                <span class="fw-medium">20 Comment</span>
                                                            </div>
                                                            <div
                                                                class="share-block d-flex align-items-center feather-icon">
                                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                    data-bs-target="#share-btn" aria-controls="share-btn"
                                                                    class="d-flex align-items-center">
                                                                    <span
                                                                        class="material-symbols-outlined align-text-top font-size-20">
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
                                                                            <img src="../assets/images/user/13.jpg"
                                                                                alt="userimg"
                                                                                class="avatar-48 rounded-circle img-fluid"
                                                                                loading="lazy">
                                                                        </div>
                                                                        <div class="comment-list-user-data">
                                                                            <div
                                                                                class="d-inline-flex align-items-center gap-1 flex-wrap">
                                                                                <h6 class="m-0">Bob Frapples</h6>
                                                                                <span class="d-inline-block text-primary">
                                                                                    <svg class="align-text-bottom"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        width="17" height="17"
                                                                                        viewBox="0 0 17 17"
                                                                                        fill="none">
                                                                                        <path fill-rule="evenodd"
                                                                                            clip-rule="evenodd"
                                                                                            d="M12.2483 0.216553H4.75081C2.13805 0.216553 0.5 2.0665 0.5 4.68444V11.7487C0.5 14.3666 2.13027 16.2166 4.75081 16.2166H12.2475C14.8689 16.2166 16.5 14.3666 16.5 11.7487V4.68444C16.5 2.0665 14.8689 0.216553 12.2483 0.216553Z"
                                                                                            fill="currentColor"></path>
                                                                                        <path
                                                                                            d="M5.5 8.21627L7.50056 10.216L11.5 6.21655"
                                                                                            stroke="white"
                                                                                            stroke-width="1.5"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"></path>
                                                                                    </svg>
                                                                                </span>
                                                                                <spna
                                                                                    class="fw-medium small text-capitalize">
                                                                                    3 min ago</spna>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="comment-list-user-comment">
                                                                        <div class="comment-list-comment">
                                                                            "Just stumbled upon this post and it's giving me
                                                                            all the feels! 🙌"
                                                                        </div>
                                                                        <div class="comment-list-action mt-2">
                                                                            <ul
                                                                                class="list-inline m-0 p-0 d-flex align-items-center gap-2">
                                                                                <li>
                                                                                    <div
                                                                                        class="like-block position-relative d-flex align-items-center flex-shrink-0">
                                                                                        <div class="like-data">
                                                                                            <div class="dropdown">
                                                                                                <span
                                                                                                    class="dropdown-toggle"
                                                                                                    data-bs-toggle="dropdown"
                                                                                                    aria-haspopup="true"
                                                                                                    aria-expanded="false"
                                                                                                    role="button">
                                                                                                    <span
                                                                                                        class="material-symbols-outlined align-text-top font-size-18">
                                                                                                        thumb_up
                                                                                                    </span>
                                                                                                    <span
                                                                                                        class="fw-medium small">Likes</span>
                                                                                                </span>
                                                                                                <div
                                                                                                    class="dropdown-menu py-2">
                                                                                                    <a class="ms-2 me-2"
                                                                                                        href="javascript:void(0);"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-placement="top"
                                                                                                        aria-label="Like"
                                                                                                        data-bs-original-title="Like"><img
                                                                                                            src="../assets/images/icon/01.png"
                                                                                                            class="img-fluid"
                                                                                                            alt="like"
                                                                                                            loading="lazy"></a>
                                                                                                    <a class="me-2"
                                                                                                        href="javascript:void(0);"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-placement="top"
                                                                                                        aria-label="Love"
                                                                                                        data-bs-original-title="Love"><img
                                                                                                            src="../assets/images/icon/02.png"
                                                                                                            class="img-fluid"
                                                                                                            alt="love"
                                                                                                            loading="lazy"></a>
                                                                                                    <a class="me-2"
                                                                                                        href="javascript:void(0);"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-placement="top"
                                                                                                        aria-label="Happy"
                                                                                                        data-bs-original-title="Happy"><img
                                                                                                            src="../assets/images/icon/03.png"
                                                                                                            class="img-fluid"
                                                                                                            alt="happy"
                                                                                                            loading="lazy"></a>
                                                                                                    <a class="me-2"
                                                                                                        href="javascript:void(0);"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-placement="top"
                                                                                                        aria-label="HaHa"
                                                                                                        data-bs-original-title="HaHa"><img
                                                                                                            src="../assets/images/icon/04.png"
                                                                                                            class="img-fluid"
                                                                                                            alt="haha"
                                                                                                            loading="lazy"></a>
                                                                                                    <a class="me-2"
                                                                                                        href="javascript:void(0);"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-placement="top"
                                                                                                        aria-label="Think"
                                                                                                        data-bs-original-title="Think"><img
                                                                                                            src="../assets/images/icon/05.png"
                                                                                                            class="img-fluid"
                                                                                                            alt="think"
                                                                                                            loading="lazy"></a>
                                                                                                    <a class="me-2"
                                                                                                        href="javascript:void(0);"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-placement="top"
                                                                                                        aria-label="Sad"
                                                                                                        data-bs-original-title="Sad"><img
                                                                                                            src="../assets/images/icon/06.png"
                                                                                                            class="img-fluid"
                                                                                                            alt="sad"
                                                                                                            loading="lazy"></a>
                                                                                                    <a class="me-2"
                                                                                                        href="javascript:void(0);"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-placement="top"
                                                                                                        aria-label="Lovely"
                                                                                                        data-bs-original-title="Lovely"><img
                                                                                                            src="../assets/images/icon/07.png"
                                                                                                            class="img-fluid"
                                                                                                            alt="lovely"
                                                                                                            loading="lazy"></a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <span class="fw-medium small"
                                                                                        data-bs-toggle="collapse"
                                                                                        data-bs-target="#subcomment-collapse1"
                                                                                        role="button"
                                                                                        aria-expanded="false"
                                                                                        aria-controls="collapseExample">
                                                                                        Reply
                                                                                    </span>
                                                                                </li>
                                                                            </ul>
                                                                            <div class="add-comment-form-block collapse mt-3"
                                                                                id="subcomment-collapse1">
                                                                                <div
                                                                                    class="d-flex align-items-center gap-3">
                                                                                    <div class="flex-shrink-0">
                                                                                        <img src="../assets/images/user/1.jpg"
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
                                                                                                class="btn btn-primary font-size-12 text-capitalize px-5">post</button>
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
                                                                    <img src="../assets/images/user/1.jpg" alt="userimg"
                                                                        class="avatar-48 rounded-circle img-fluid"
                                                                        loading="lazy">
                                                                </div>
                                                                <div class="add-comment-form">
                                                                    <form>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Write a Comment...">
                                                                        <button type="submit"
                                                                            class="btn btn-primary font-size-12 text-capitalize px-5">post</button>
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
                                                                src="../assets/images/user/03.jpg" alt="user-image"
                                                                loading="lazy">
                                                        </div>
                                                        <div class="w-100">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div>
                                                                    <h6 class="mb-0 d-inline-block">Barb Ackue</h6>
                                                                    <span class="d-inline-block text-primary">
                                                                        <svg class="align-text-bottom" width="17"
                                                                            height="17" viewBox="0 0 17 17"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                d="M11.8457 0H4.34822C1.73547 0 0.0974121 1.84995 0.0974121 4.46789V11.5321C0.0974121 14.1501 1.72768 16 4.34822 16H11.8449C14.4663 16 16.0974 14.1501 16.0974 11.5321V4.46789C16.0974 1.84995 14.4663 0 11.8457 0Z"
                                                                                fill="currentColor"></path>
                                                                            <path
                                                                                d="M5.09741 7.99978L7.09797 9.9995L11.0974 6.00006"
                                                                                stroke="white" stroke-width="1.5"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"></path>
                                                                        </svg>
                                                                    </span>
                                                                    <span
                                                                        class="mb-0 d-inline-block text-capitalize fw-medium">Add
                                                                        a New Post</span>
                                                                    <p class="mb-0">1 Hour ago</p>
                                                                </div>
                                                                <div class="card-post-toolbar">
                                                                    <div class="dropdown">
                                                                        <span
                                                                            class="dropdown-toggle material-symbols-outlined"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false" role="button">
                                                                            more_horiz
                                                                        </span>
                                                                        <div class="dropdown-menu m-0 p-0">
                                                                            <a class="dropdown-item p-3" href="#">
                                                                                <div class="d-flex align-items-top">
                                                                                    <span
                                                                                        class="material-symbols-outlined">
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
                                                                                    <span
                                                                                        class="material-symbols-outlined">
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
                                                                                    <span
                                                                                        class="material-symbols-outlined">
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
                                                                                    <span
                                                                                        class="material-symbols-outlined">
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
                                                    <p class="m-0">"Lorem ipsum dolor sit amet, consectetur adipiscing
                                                        elit. Morbi nulla dolor, ornare at
                                                        commodo non, feugiat non nisi.
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
                                                                href="../assets/images/page-img/boy.jpg"
                                                                class="rounded">
                                                                <img src="../assets/images/page-img/boy.jpg"
                                                                    alt="post-image" class="img-fluid rounded w-100"
                                                                    loading="lazy">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-4 mt-md-0 mt-3">
                                                            <a data-fslightbox="gallery"
                                                                href="../assets/images/page-img/bus.jpg"
                                                                class="rounded">
                                                                <img src="../assets/images/page-img/bus.jpg"
                                                                    alt="post-image" class="img-fluid rounded w-100"
                                                                    loading="lazy">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-4 mt-md-0 mt-3">
                                                            <a data-fslightbox="gallery"
                                                                href="../assets/images/page-img/fd.jpg" class="rounded">
                                                                <img src="../assets/images/page-img/fd.jpg"
                                                                    alt="post-image" class="img-fluid rounded w-100"
                                                                    loading="lazy">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-md-6">
                                                            <a data-fslightbox="gallery"
                                                                href="../assets/images/page-img/mountain.jpg"
                                                                class="rounded">
                                                                <img src="../assets/images/page-img/mountain.jpg"
                                                                    alt="post-image" class="img-fluid rounded w-100"
                                                                    loading="lazy">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-6 mt-md-0 mt-3">
                                                            <div class="post-overlay-box h-100 rounded">
                                                                <img src="../assets/images/page-img/pizza.jpg"
                                                                    alt="post-image"
                                                                    class="img-fluid rounded w-100 h-100 object-cover"
                                                                    loading="lazy">
                                                                <a data-fslightbox="gallery"
                                                                    href="../assets/images/page-img/pizza.jpg"
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
                                                                <img src="../assets/images/user/01.jpg" alt="userimg"
                                                                    class="rounded-circle img-fluid userimg"
                                                                    loading="lazy">
                                                            </li>
                                                            <li>
                                                                <img src="../assets/images/user/02.jpg" alt="userimg"
                                                                    class="rounded-circle img-fluid userimg"
                                                                    loading="lazy">
                                                            </li>
                                                            <li>
                                                                <img src="../assets/images/user/03.jpg" alt="userimg"
                                                                    class="rounded-circle img-fluid userimg"
                                                                    loading="lazy">
                                                            </li>
                                                            <li>
                                                                <img src="../assets/images/user/04.jpg" alt="userimg"
                                                                    class="rounded-circle img-fluid userimg"
                                                                    loading="lazy">
                                                            </li>
                                                        </ul>
                                                        <div class="d-inline-flex align-items-center gap-1">
                                                            <h6 class="m-0 font-size-14">Aliana Molex</h6>
                                                            <span class="text-capitalize font-size-14 fw-medium"
                                                                type="button" data-bs-toggle="modal"
                                                                data-bs-target="#likemodal">and 208 others liked
                                                                this</span>
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
                                                                    <span class="dropdown-toggle"
                                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false" role="button">
                                                                        <span
                                                                            class="material-symbols-outlined align-text-top font-size-20">
                                                                            thumb_up
                                                                        </span>
                                                                        <span class="fw-medium">140 Likes</span>
                                                                    </span>
                                                                    <div class="dropdown-menu py-2">
                                                                        <a class="ms-2 me-2" href="javascript:void(0);"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" aria-label="Like"
                                                                            data-bs-original-title="Like"><img
                                                                                src="../assets/images/icon/01.png"
                                                                                class="img-fluid" alt="like"
                                                                                loading="lazy"></a>
                                                                        <a class="me-2" href="javascript:void(0);"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" aria-label="Love"
                                                                            data-bs-original-title="Love"><img
                                                                                src="../assets/images/icon/02.png"
                                                                                class="img-fluid" alt="love"
                                                                                loading="lazy"></a>
                                                                        <a class="me-2" href="javascript:void(0);"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" aria-label="Happy"
                                                                            data-bs-original-title="Happy"><img
                                                                                src="../assets/images/icon/03.png"
                                                                                class="img-fluid" alt="happy"
                                                                                loading="lazy"></a>
                                                                        <a class="me-2" href="javascript:void(0);"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" aria-label="HaHa"
                                                                            data-bs-original-title="HaHa"><img
                                                                                src="../assets/images/icon/04.png"
                                                                                class="img-fluid" alt="haha"
                                                                                loading="lazy"></a>
                                                                        <a class="me-2" href="javascript:void(0);"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" aria-label="Think"
                                                                            data-bs-original-title="Think"><img
                                                                                src="../assets/images/icon/05.png"
                                                                                class="img-fluid" alt="think"
                                                                                loading="lazy"></a>
                                                                        <a class="me-2" href="javascript:void(0);"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" aria-label="Sad"
                                                                            data-bs-original-title="Sad"><img
                                                                                src="../assets/images/icon/06.png"
                                                                                class="img-fluid" alt="sad"
                                                                                loading="lazy"></a>
                                                                        <a class="me-2" href="javascript:void(0);"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" aria-label="Lovely"
                                                                            data-bs-original-title="Lovely"><img
                                                                                src="../assets/images/icon/07.png"
                                                                                class="img-fluid" alt="lovely"
                                                                                loading="lazy"></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center gap-3 flex-shrink-0">
                                                            <div class="total-comment-block" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#commentcollapes2" aria-expanded="false"
                                                                aria-controls="commentcollapes">
                                                                <span
                                                                    class="material-symbols-outlined align-text-top font-size-20">
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
                                                                    <span
                                                                        class="material-symbols-outlined align-text-top font-size-20">
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
                                                                            <img src="../assets/images/user/13.jpg"
                                                                                alt="userimg"
                                                                                class="avatar-48 rounded-circle img-fluid"
                                                                                loading="lazy">
                                                                        </div>
                                                                        <div class="comment-list-user-data">
                                                                            <div
                                                                                class="d-inline-flex align-items-center gap-1 flex-wrap">
                                                                                <h6 class="m-0">Bob Frapples</h6>
                                                                                <span class="d-inline-block text-primary">
                                                                                    <svg class="align-text-bottom"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        width="17" height="17"
                                                                                        viewBox="0 0 17 17"
                                                                                        fill="none">
                                                                                        <path fill-rule="evenodd"
                                                                                            clip-rule="evenodd"
                                                                                            d="M12.2483 0.216553H4.75081C2.13805 0.216553 0.5 2.0665 0.5 4.68444V11.7487C0.5 14.3666 2.13027 16.2166 4.75081 16.2166H12.2475C14.8689 16.2166 16.5 14.3666 16.5 11.7487V4.68444C16.5 2.0665 14.8689 0.216553 12.2483 0.216553Z"
                                                                                            fill="currentColor"></path>
                                                                                        <path
                                                                                            d="M5.5 8.21627L7.50056 10.216L11.5 6.21655"
                                                                                            stroke="white"
                                                                                            stroke-width="1.5"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round">
                                                                                        </path>
                                                                                    </svg>
                                                                                </span>
                                                                                <spna
                                                                                    class="fw-medium small text-capitalize">
                                                                                    3 min ago</spna>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="comment-list-user-comment">
                                                                        <div class="comment-list-comment">
                                                                            "Just stumbled upon this post and it's giving me
                                                                            all the feels! 🙌"
                                                                        </div>
                                                                        <div class="comment-list-action mt-2">
                                                                            <ul
                                                                                class="list-inline m-0 p-0 d-flex align-items-center gap-2">
                                                                                <li>
                                                                                    <div
                                                                                        class="like-block position-relative d-flex align-items-center flex-shrink-0">
                                                                                        <div class="like-data">
                                                                                            <div class="dropdown">
                                                                                                <span
                                                                                                    class="dropdown-toggle"
                                                                                                    data-bs-toggle="dropdown"
                                                                                                    aria-haspopup="true"
                                                                                                    aria-expanded="false"
                                                                                                    role="button">
                                                                                                    <span
                                                                                                        class="material-symbols-outlined align-text-top font-size-18">
                                                                                                        thumb_up
                                                                                                    </span>
                                                                                                    <span
                                                                                                        class="fw-medium small">Likes</span>
                                                                                                </span>
                                                                                                <div
                                                                                                    class="dropdown-menu py-2">
                                                                                                    <a class="ms-2 me-2"
                                                                                                        href="javascript:void(0);"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-placement="top"
                                                                                                        aria-label="Like"
                                                                                                        data-bs-original-title="Like"><img
                                                                                                            src="../assets/images/icon/01.png"
                                                                                                            class="img-fluid"
                                                                                                            alt="like"
                                                                                                            loading="lazy"></a>
                                                                                                    <a class="me-2"
                                                                                                        href="javascript:void(0);"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-placement="top"
                                                                                                        aria-label="Love"
                                                                                                        data-bs-original-title="Love"><img
                                                                                                            src="../assets/images/icon/02.png"
                                                                                                            class="img-fluid"
                                                                                                            alt="love"
                                                                                                            loading="lazy"></a>
                                                                                                    <a class="me-2"
                                                                                                        href="javascript:void(0);"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-placement="top"
                                                                                                        aria-label="Happy"
                                                                                                        data-bs-original-title="Happy"><img
                                                                                                            src="../assets/images/icon/03.png"
                                                                                                            class="img-fluid"
                                                                                                            alt="happy"
                                                                                                            loading="lazy"></a>
                                                                                                    <a class="me-2"
                                                                                                        href="javascript:void(0);"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-placement="top"
                                                                                                        aria-label="HaHa"
                                                                                                        data-bs-original-title="HaHa"><img
                                                                                                            src="../assets/images/icon/04.png"
                                                                                                            class="img-fluid"
                                                                                                            alt="haha"
                                                                                                            loading="lazy"></a>
                                                                                                    <a class="me-2"
                                                                                                        href="javascript:void(0);"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-placement="top"
                                                                                                        aria-label="Think"
                                                                                                        data-bs-original-title="Think"><img
                                                                                                            src="../assets/images/icon/05.png"
                                                                                                            class="img-fluid"
                                                                                                            alt="think"
                                                                                                            loading="lazy"></a>
                                                                                                    <a class="me-2"
                                                                                                        href="javascript:void(0);"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-placement="top"
                                                                                                        aria-label="Sad"
                                                                                                        data-bs-original-title="Sad"><img
                                                                                                            src="../assets/images/icon/06.png"
                                                                                                            class="img-fluid"
                                                                                                            alt="sad"
                                                                                                            loading="lazy"></a>
                                                                                                    <a class="me-2"
                                                                                                        href="javascript:void(0);"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-placement="top"
                                                                                                        aria-label="Lovely"
                                                                                                        data-bs-original-title="Lovely"><img
                                                                                                            src="../assets/images/icon/07.png"
                                                                                                            class="img-fluid"
                                                                                                            alt="lovely"
                                                                                                            loading="lazy"></a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <span class="fw-medium small"
                                                                                        data-bs-toggle="collapse"
                                                                                        data-bs-target="#subcomment-collapse2"
                                                                                        role="button"
                                                                                        aria-expanded="false"
                                                                                        aria-controls="collapseExample">
                                                                                        Reply
                                                                                    </span>
                                                                                </li>
                                                                            </ul>
                                                                            <div class="add-comment-form-block collapse mt-3"
                                                                                id="subcomment-collapse2">
                                                                                <div
                                                                                    class="d-flex align-items-center gap-3">
                                                                                    <div class="flex-shrink-0">
                                                                                        <img src="../assets/images/user/1.jpg"
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
                                                                                                class="btn btn-primary font-size-12 text-capitalize px-5">post</button>
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
                                                                    <img src="../assets/images/user/1.jpg"
                                                                        alt="userimg"
                                                                        class="avatar-48 rounded-circle img-fluid"
                                                                        loading="lazy">
                                                                </div>
                                                                <div class="add-comment-form">
                                                                    <form>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Write a Comment...">
                                                                        <button type="submit"
                                                                            class="btn btn-primary font-size-12 text-capitalize px-5">post</button>
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
                                                                src="../assets/images/user/04.jpg" alt="user-image"
                                                                loading="lazy">
                                                        </div>
                                                        <div class="w-100">
                                                            <div
                                                                class="d-flex align-items-center justify-content-between">
                                                                <div>
                                                                    <h6 class="mb-0 d-inline-block">Ira Membrit</h6>
                                                                    <span class="d-inline-block text-primary">
                                                                        <svg class="align-text-bottom" width="17"
                                                                            height="17" viewBox="0 0 17 17"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M11.8457 0H4.34822C1.73547 0 0.0974121 1.84995 0.0974121 4.46789V11.5321C0.0974121 14.1501 1.72768 16 4.34822 16H11.8449C14.4663 16 16.0974 14.1501 16.0974 11.5321V4.46789C16.0974 1.84995 14.4663 0 11.8457 0Z"
                                                                                fill="currentColor"></path>
                                                                            <path
                                                                                d="M5.09741 7.99978L7.09797 9.9995L11.0974 6.00006"
                                                                                stroke="white" stroke-width="1.5"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"></path>
                                                                        </svg>
                                                                    </span>
                                                                    <span
                                                                        class="mb-0 d-inline-block text-capitalize fw-medium">Update
                                                                        her Status</span>
                                                                    <p class="mb-0">6 Hours ago</p>
                                                                </div>
                                                                <div class="card-post-toolbar">
                                                                    <div class="dropdown">
                                                                        <span
                                                                            class="dropdown-toggle material-symbols-outlined"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-haspopup="true" aria-expanded="false"
                                                                            role="button">
                                                                            more_horiz
                                                                        </span>
                                                                        <div class="dropdown-menu m-0 p-0">
                                                                            <a class="dropdown-item p-3" href="#">
                                                                                <div class="d-flex align-items-top">
                                                                                    <span
                                                                                        class="material-symbols-outlined">
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
                                                                                    <span
                                                                                        class="material-symbols-outlined">
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
                                                                                    <span
                                                                                        class="material-symbols-outlined">
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
                                                                                    <span
                                                                                        class="material-symbols-outlined">
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
                                                    <p class="m-0">"Lorem ipsum dolor sit amet, consectetur adipiscing
                                                        elit. Morbi nulla dolor, ornare at
                                                        commodo non, feugiat non nisi.
                                                        Phasellus faucibus mollis pharetra. Proin blandit ac massa sed
                                                        rhoncus"</p>
                                                </div>
                                                <div class="post-meta-likes mt-4">
                                                    <div class="d-flex align-items-center gap-2 flex-wrap">
                                                        <ul class="list-inline m-0 p-0 post-user-liked-list">
                                                            <li>
                                                                <img src="../assets/images/user/01.jpg" alt="userimg"
                                                                    class="rounded-circle img-fluid userimg"
                                                                    loading="lazy">
                                                            </li>
                                                            <li>
                                                                <img src="../assets/images/user/02.jpg" alt="userimg"
                                                                    class="rounded-circle img-fluid userimg"
                                                                    loading="lazy">
                                                            </li>
                                                            <li>
                                                                <img src="../assets/images/user/03.jpg" alt="userimg"
                                                                    class="rounded-circle img-fluid userimg"
                                                                    loading="lazy">
                                                            </li>
                                                            <li>
                                                                <img src="../assets/images/user/04.jpg" alt="userimg"
                                                                    class="rounded-circle img-fluid userimg"
                                                                    loading="lazy">
                                                            </li>
                                                        </ul>
                                                        <div class="d-inline-flex align-items-center gap-1">
                                                            <h6 class="m-0 font-size-14">Aliana Molex</h6>
                                                            <span class="text-capitalize font-size-14 fw-medium"
                                                                type="button" data-bs-toggle="modal"
                                                                data-bs-target="#likemodal">and 208 others liked
                                                                this</span>
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
                                                                    <span class="dropdown-toggle"
                                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false" role="button">
                                                                        <span
                                                                            class="material-symbols-outlined align-text-top font-size-20">
                                                                            thumb_up
                                                                        </span>
                                                                        <span class="fw-medium">140 Likes</span>
                                                                    </span>
                                                                    <div class="dropdown-menu py-2">
                                                                        <a class="ms-2 me-2" href="javascript:void(0);"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" aria-label="Like"
                                                                            data-bs-original-title="Like"><img
                                                                                src="../assets/images/icon/01.png"
                                                                                class="img-fluid" alt="like"
                                                                                loading="lazy"></a>
                                                                        <a class="me-2" href="javascript:void(0);"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" aria-label="Love"
                                                                            data-bs-original-title="Love"><img
                                                                                src="../assets/images/icon/02.png"
                                                                                class="img-fluid" alt="love"
                                                                                loading="lazy"></a>
                                                                        <a class="me-2" href="javascript:void(0);"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" aria-label="Happy"
                                                                            data-bs-original-title="Happy"><img
                                                                                src="../assets/images/icon/03.png"
                                                                                class="img-fluid" alt="happy"
                                                                                loading="lazy"></a>
                                                                        <a class="me-2" href="javascript:void(0);"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" aria-label="HaHa"
                                                                            data-bs-original-title="HaHa"><img
                                                                                src="../assets/images/icon/04.png"
                                                                                class="img-fluid" alt="haha"
                                                                                loading="lazy"></a>
                                                                        <a class="me-2" href="javascript:void(0);"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" aria-label="Think"
                                                                            data-bs-original-title="Think"><img
                                                                                src="../assets/images/icon/05.png"
                                                                                class="img-fluid" alt="think"
                                                                                loading="lazy"></a>
                                                                        <a class="me-2" href="javascript:void(0);"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" aria-label="Sad"
                                                                            data-bs-original-title="Sad"><img
                                                                                src="../assets/images/icon/06.png"
                                                                                class="img-fluid" alt="sad"
                                                                                loading="lazy"></a>
                                                                        <a class="me-2" href="javascript:void(0);"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" aria-label="Lovely"
                                                                            data-bs-original-title="Lovely"><img
                                                                                src="../assets/images/icon/07.png"
                                                                                class="img-fluid" alt="lovely"
                                                                                loading="lazy"></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center gap-3 flex-shrink-0">
                                                            <div class="total-comment-block" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#commentcollapes3" aria-expanded="false"
                                                                aria-controls="commentcollapes">
                                                                <span
                                                                    class="material-symbols-outlined align-text-top font-size-20">
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
                                                                    <span
                                                                        class="material-symbols-outlined align-text-top font-size-20">
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
                                                                        <div class="comment-list-user-img flex-shrink-0">
                                                                            <img src="../assets/images/user/13.jpg"
                                                                                alt="userimg"
                                                                                class="avatar-48 rounded-circle img-fluid"
                                                                                loading="lazy">
                                                                        </div>
                                                                        <div class="comment-list-user-data">
                                                                            <div
                                                                                class="d-inline-flex align-items-center gap-1 flex-wrap">
                                                                                <h6 class="m-0">Bob Frapples</h6>
                                                                                <span class="d-inline-block text-primary">
                                                                                    <svg class="align-text-bottom"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        width="17" height="17"
                                                                                        viewBox="0 0 17 17"
                                                                                        fill="none">
                                                                                        <path fill-rule="evenodd"
                                                                                            clip-rule="evenodd"
                                                                                            d="M12.2483 0.216553H4.75081C2.13805 0.216553 0.5 2.0665 0.5 4.68444V11.7487C0.5 14.3666 2.13027 16.2166 4.75081 16.2166H12.2475C14.8689 16.2166 16.5 14.3666 16.5 11.7487V4.68444C16.5 2.0665 14.8689 0.216553 12.2483 0.216553Z"
                                                                                            fill="currentColor"></path>
                                                                                        <path
                                                                                            d="M5.5 8.21627L7.50056 10.216L11.5 6.21655"
                                                                                            stroke="white"
                                                                                            stroke-width="1.5"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round">
                                                                                        </path>
                                                                                    </svg>
                                                                                </span>
                                                                                <spna
                                                                                    class="fw-medium small text-capitalize">
                                                                                    3 min ago</spna>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="comment-list-user-comment">
                                                                        <div class="comment-list-comment">
                                                                            "Just stumbled upon this post and it's giving me
                                                                            all the feels! 🙌"
                                                                        </div>
                                                                        <div class="comment-list-action mt-2">
                                                                            <ul
                                                                                class="list-inline m-0 p-0 d-flex align-items-center gap-2">
                                                                                <li>
                                                                                    <div
                                                                                        class="like-block position-relative d-flex align-items-center flex-shrink-0">
                                                                                        <div class="like-data">
                                                                                            <div class="dropdown">
                                                                                                <span
                                                                                                    class="dropdown-toggle"
                                                                                                    data-bs-toggle="dropdown"
                                                                                                    aria-haspopup="true"
                                                                                                    aria-expanded="false"
                                                                                                    role="button">
                                                                                                    <span
                                                                                                        class="material-symbols-outlined align-text-top font-size-18">
                                                                                                        thumb_up
                                                                                                    </span>
                                                                                                    <span
                                                                                                        class="fw-medium small">Likes</span>
                                                                                                </span>
                                                                                                <div
                                                                                                    class="dropdown-menu py-2">
                                                                                                    <a class="ms-2 me-2"
                                                                                                        href="javascript:void(0);"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-placement="top"
                                                                                                        aria-label="Like"
                                                                                                        data-bs-original-title="Like"><img
                                                                                                            src="../assets/images/icon/01.png"
                                                                                                            class="img-fluid"
                                                                                                            alt="like"
                                                                                                            loading="lazy"></a>
                                                                                                    <a class="me-2"
                                                                                                        href="javascript:void(0);"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-placement="top"
                                                                                                        aria-label="Love"
                                                                                                        data-bs-original-title="Love"><img
                                                                                                            src="../assets/images/icon/02.png"
                                                                                                            class="img-fluid"
                                                                                                            alt="love"
                                                                                                            loading="lazy"></a>
                                                                                                    <a class="me-2"
                                                                                                        href="javascript:void(0);"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-placement="top"
                                                                                                        aria-label="Happy"
                                                                                                        data-bs-original-title="Happy"><img
                                                                                                            src="../assets/images/icon/03.png"
                                                                                                            class="img-fluid"
                                                                                                            alt="happy"
                                                                                                            loading="lazy"></a>
                                                                                                    <a class="me-2"
                                                                                                        href="javascript:void(0);"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-placement="top"
                                                                                                        aria-label="HaHa"
                                                                                                        data-bs-original-title="HaHa"><img
                                                                                                            src="../assets/images/icon/04.png"
                                                                                                            class="img-fluid"
                                                                                                            alt="haha"
                                                                                                            loading="lazy"></a>
                                                                                                    <a class="me-2"
                                                                                                        href="javascript:void(0);"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-placement="top"
                                                                                                        aria-label="Think"
                                                                                                        data-bs-original-title="Think"><img
                                                                                                            src="../assets/images/icon/05.png"
                                                                                                            class="img-fluid"
                                                                                                            alt="think"
                                                                                                            loading="lazy"></a>
                                                                                                    <a class="me-2"
                                                                                                        href="javascript:void(0);"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-placement="top"
                                                                                                        aria-label="Sad"
                                                                                                        data-bs-original-title="Sad"><img
                                                                                                            src="../assets/images/icon/06.png"
                                                                                                            class="img-fluid"
                                                                                                            alt="sad"
                                                                                                            loading="lazy"></a>
                                                                                                    <a class="me-2"
                                                                                                        href="javascript:void(0);"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-placement="top"
                                                                                                        aria-label="Lovely"
                                                                                                        data-bs-original-title="Lovely"><img
                                                                                                            src="../assets/images/icon/07.png"
                                                                                                            class="img-fluid"
                                                                                                            alt="lovely"
                                                                                                            loading="lazy"></a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <span class="fw-medium small"
                                                                                        data-bs-toggle="collapse"
                                                                                        data-bs-target="#subcomment-collapse3"
                                                                                        role="button"
                                                                                        aria-expanded="false"
                                                                                        aria-controls="collapseExample">
                                                                                        Reply
                                                                                    </span>
                                                                                </li>
                                                                            </ul>
                                                                            <div class="add-comment-form-block collapse mt-3"
                                                                                id="subcomment-collapse3">
                                                                                <div
                                                                                    class="d-flex align-items-center gap-3">
                                                                                    <div class="flex-shrink-0">
                                                                                        <img src="../assets/images/user/1.jpg"
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
                                                                                                class="btn btn-primary font-size-12 text-capitalize px-5">post</button>
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
                                                                    <img src="../assets/images/user/1.jpg"
                                                                        alt="userimg"
                                                                        class="avatar-48 rounded-circle img-fluid"
                                                                        loading="lazy">
                                                                </div>
                                                                <div class="add-comment-form">
                                                                    <form>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Write a Comment...">
                                                                        <button type="submit"
                                                                            class="btn btn-primary font-size-12 text-capitalize px-5">post</button>
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
                                                                src="../assets/images/user/1.jpg" alt="user-image"
                                                                loading="lazy">
                                                        </div>
                                                        <div class="w-100">
                                                            <div
                                                                class="d-flex align-items-center justify-content-between">
                                                                <div>
                                                                    <h6 class="mb-0 d-inline-block">Bni Cyst</h6>
                                                                    <span class="d-inline-block text-primary">
                                                                        <svg class="align-text-bottom" width="17"
                                                                            height="17" viewBox="0 0 17 17"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M11.8457 0H4.34822C1.73547 0 0.0974121 1.84995 0.0974121 4.46789V11.5321C0.0974121 14.1501 1.72768 16 4.34822 16H11.8449C14.4663 16 16.0974 14.1501 16.0974 11.5321V4.46789C16.0974 1.84995 14.4663 0 11.8457 0Z"
                                                                                fill="currentColor"></path>
                                                                            <path
                                                                                d="M5.09741 7.99978L7.09797 9.9995L11.0974 6.00006"
                                                                                stroke="white" stroke-width="1.5"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"></path>
                                                                        </svg>
                                                                    </span>
                                                                    <span
                                                                        class="mb-0 d-inline-block text-capitalize fw-medium">Added
                                                                        New Video in his
                                                                        Timeline</span>
                                                                    <p class="mb-0">8 Hours ago</p>
                                                                </div>
                                                                <div class="card-post-toolbar">
                                                                    <div class="dropdown">
                                                                        <span
                                                                            class="dropdown-toggle material-symbols-outlined"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-haspopup="true" aria-expanded="false"
                                                                            role="button">
                                                                            more_horiz
                                                                        </span>
                                                                        <div class="dropdown-menu m-0 p-0">
                                                                            <a class="dropdown-item p-3" href="#">
                                                                                <div class="d-flex align-items-top">
                                                                                    <span
                                                                                        class="material-symbols-outlined">
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
                                                                                    <span
                                                                                        class="material-symbols-outlined">
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
                                                                                    <span
                                                                                        class="material-symbols-outlined">
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
                                                                                    <span
                                                                                        class="material-symbols-outlined">
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
                                                    <p class="m-0">"Lorem ipsum dolor sit amet, consectetur adipiscing
                                                        elit. Morbi nulla dolor, ornare at
                                                        commodo non, feugiat non nisi.
                                                        Phasellus faucibus mollis pharetra. Proin blandit ac massa sed
                                                        rhoncus"</p>
                                                </div>
                                                <div class="user-post mt-4">
                                                    <div class="ratio ratio-16x9">
                                                        <iframe
                                                            src="https://www.youtube.com/embed/oHD33oKbKh4?si=VF-Qcp-pZdzUb3RX"
                                                            allowfullscreen=""></iframe>
                                                    </div>
                                                </div>
                                                <div class="post-meta-likes mt-4">
                                                    <div class="d-flex align-items-center gap-2 flex-wrap">
                                                        <ul class="list-inline m-0 p-0 post-user-liked-list">
                                                            <li>
                                                                <img src="../assets/images/user/01.jpg" alt="userimg"
                                                                    class="rounded-circle img-fluid userimg"
                                                                    loading="lazy">
                                                            </li>
                                                            <li>
                                                                <img src="../assets/images/user/02.jpg" alt="userimg"
                                                                    class="rounded-circle img-fluid userimg"
                                                                    loading="lazy">
                                                            </li>
                                                            <li>
                                                                <img src="../assets/images/user/03.jpg" alt="userimg"
                                                                    class="rounded-circle img-fluid userimg"
                                                                    loading="lazy">
                                                            </li>
                                                            <li>
                                                                <img src="../assets/images/user/04.jpg" alt="userimg"
                                                                    class="rounded-circle img-fluid userimg"
                                                                    loading="lazy">
                                                            </li>
                                                        </ul>
                                                        <div class="d-inline-flex align-items-center gap-1">
                                                            <h6 class="m-0 font-size-14">Aliana Molex</h6>
                                                            <span class="text-capitalize font-size-14 fw-medium"
                                                                type="button" data-bs-toggle="modal"
                                                                data-bs-target="#likemodal">and 208 others liked
                                                                this</span>
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
                                                                    <span class="dropdown-toggle"
                                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false" role="button">
                                                                        <span
                                                                            class="material-symbols-outlined align-text-top font-size-20">
                                                                            thumb_up
                                                                        </span>
                                                                        <span class="fw-medium">140 Likes</span>
                                                                    </span>
                                                                    <div class="dropdown-menu py-2">
                                                                        <a class="ms-2 me-2" href="javascript:void(0);"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" aria-label="Like"
                                                                            data-bs-original-title="Like"><img
                                                                                src="../assets/images/icon/01.png"
                                                                                class="img-fluid" alt="like"
                                                                                loading="lazy"></a>
                                                                        <a class="me-2" href="javascript:void(0);"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" aria-label="Love"
                                                                            data-bs-original-title="Love"><img
                                                                                src="../assets/images/icon/02.png"
                                                                                class="img-fluid" alt="love"
                                                                                loading="lazy"></a>
                                                                        <a class="me-2" href="javascript:void(0);"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" aria-label="Happy"
                                                                            data-bs-original-title="Happy"><img
                                                                                src="../assets/images/icon/03.png"
                                                                                class="img-fluid" alt="happy"
                                                                                loading="lazy"></a>
                                                                        <a class="me-2" href="javascript:void(0);"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" aria-label="HaHa"
                                                                            data-bs-original-title="HaHa"><img
                                                                                src="../assets/images/icon/04.png"
                                                                                class="img-fluid" alt="haha"
                                                                                loading="lazy"></a>
                                                                        <a class="me-2" href="javascript:void(0);"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" aria-label="Think"
                                                                            data-bs-original-title="Think"><img
                                                                                src="../assets/images/icon/05.png"
                                                                                class="img-fluid" alt="think"
                                                                                loading="lazy"></a>
                                                                        <a class="me-2" href="javascript:void(0);"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" aria-label="Sad"
                                                                            data-bs-original-title="Sad"><img
                                                                                src="../assets/images/icon/06.png"
                                                                                class="img-fluid" alt="sad"
                                                                                loading="lazy"></a>
                                                                        <a class="me-2" href="javascript:void(0);"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" aria-label="Lovely"
                                                                            data-bs-original-title="Lovely"><img
                                                                                src="../assets/images/icon/07.png"
                                                                                class="img-fluid" alt="lovely"
                                                                                loading="lazy"></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center gap-3 flex-shrink-0">
                                                            <div class="total-comment-block" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#commentcollapes4" aria-expanded="false"
                                                                aria-controls="commentcollapes">
                                                                <span
                                                                    class="material-symbols-outlined align-text-top font-size-20">
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
                                                                    <span
                                                                        class="material-symbols-outlined align-text-top font-size-20">
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
                                                                        <div class="comment-list-user-img flex-shrink-0">
                                                                            <img src="../assets/images/user/13.jpg"
                                                                                alt="userimg"
                                                                                class="avatar-48 rounded-circle img-fluid"
                                                                                loading="lazy">
                                                                        </div>
                                                                        <div class="comment-list-user-data">
                                                                            <div
                                                                                class="d-inline-flex align-items-center gap-1 flex-wrap">
                                                                                <h6 class="m-0">Bob Frapples</h6>
                                                                                <span class="d-inline-block text-primary">
                                                                                    <svg class="align-text-bottom"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        width="17" height="17"
                                                                                        viewBox="0 0 17 17"
                                                                                        fill="none">
                                                                                        <path fill-rule="evenodd"
                                                                                            clip-rule="evenodd"
                                                                                            d="M12.2483 0.216553H4.75081C2.13805 0.216553 0.5 2.0665 0.5 4.68444V11.7487C0.5 14.3666 2.13027 16.2166 4.75081 16.2166H12.2475C14.8689 16.2166 16.5 14.3666 16.5 11.7487V4.68444C16.5 2.0665 14.8689 0.216553 12.2483 0.216553Z"
                                                                                            fill="currentColor"></path>
                                                                                        <path
                                                                                            d="M5.5 8.21627L7.50056 10.216L11.5 6.21655"
                                                                                            stroke="white"
                                                                                            stroke-width="1.5"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round">
                                                                                        </path>
                                                                                    </svg>
                                                                                </span>
                                                                                <spna
                                                                                    class="fw-medium small text-capitalize">
                                                                                    3 min ago</spna>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="comment-list-user-comment">
                                                                        <div class="comment-list-comment">
                                                                            "Just stumbled upon this post and it's giving me
                                                                            all the feels! 🙌"
                                                                        </div>
                                                                        <div class="comment-list-action mt-2">
                                                                            <ul
                                                                                class="list-inline m-0 p-0 d-flex align-items-center gap-2">
                                                                                <li>
                                                                                    <div
                                                                                        class="like-block position-relative d-flex align-items-center flex-shrink-0">
                                                                                        <div class="like-data">
                                                                                            <div class="dropdown">
                                                                                                <span
                                                                                                    class="dropdown-toggle"
                                                                                                    data-bs-toggle="dropdown"
                                                                                                    aria-haspopup="true"
                                                                                                    aria-expanded="false"
                                                                                                    role="button">
                                                                                                    <span
                                                                                                        class="material-symbols-outlined align-text-top font-size-18">
                                                                                                        thumb_up
                                                                                                    </span>
                                                                                                    <span
                                                                                                        class="fw-medium small">Likes</span>
                                                                                                </span>
                                                                                                <div
                                                                                                    class="dropdown-menu py-2">
                                                                                                    <a class="ms-2 me-2"
                                                                                                        href="javascript:void(0);"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-placement="top"
                                                                                                        aria-label="Like"
                                                                                                        data-bs-original-title="Like"><img
                                                                                                            src="../assets/images/icon/01.png"
                                                                                                            class="img-fluid"
                                                                                                            alt="like"
                                                                                                            loading="lazy"></a>
                                                                                                    <a class="me-2"
                                                                                                        href="javascript:void(0);"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-placement="top"
                                                                                                        aria-label="Love"
                                                                                                        data-bs-original-title="Love"><img
                                                                                                            src="../assets/images/icon/02.png"
                                                                                                            class="img-fluid"
                                                                                                            alt="love"
                                                                                                            loading="lazy"></a>
                                                                                                    <a class="me-2"
                                                                                                        href="javascript:void(0);"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-placement="top"
                                                                                                        aria-label="Happy"
                                                                                                        data-bs-original-title="Happy"><img
                                                                                                            src="../assets/images/icon/03.png"
                                                                                                            class="img-fluid"
                                                                                                            alt="happy"
                                                                                                            loading="lazy"></a>
                                                                                                    <a class="me-2"
                                                                                                        href="javascript:void(0);"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-placement="top"
                                                                                                        aria-label="HaHa"
                                                                                                        data-bs-original-title="HaHa"><img
                                                                                                            src="../assets/images/icon/04.png"
                                                                                                            class="img-fluid"
                                                                                                            alt="haha"
                                                                                                            loading="lazy"></a>
                                                                                                    <a class="me-2"
                                                                                                        href="javascript:void(0);"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-placement="top"
                                                                                                        aria-label="Think"
                                                                                                        data-bs-original-title="Think"><img
                                                                                                            src="../assets/images/icon/05.png"
                                                                                                            class="img-fluid"
                                                                                                            alt="think"
                                                                                                            loading="lazy"></a>
                                                                                                    <a class="me-2"
                                                                                                        href="javascript:void(0);"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-placement="top"
                                                                                                        aria-label="Sad"
                                                                                                        data-bs-original-title="Sad"><img
                                                                                                            src="../assets/images/icon/06.png"
                                                                                                            class="img-fluid"
                                                                                                            alt="sad"
                                                                                                            loading="lazy"></a>
                                                                                                    <a class="me-2"
                                                                                                        href="javascript:void(0);"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-placement="top"
                                                                                                        aria-label="Lovely"
                                                                                                        data-bs-original-title="Lovely"><img
                                                                                                            src="../assets/images/icon/07.png"
                                                                                                            class="img-fluid"
                                                                                                            alt="lovely"
                                                                                                            loading="lazy"></a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <span class="fw-medium small"
                                                                                        data-bs-toggle="collapse"
                                                                                        data-bs-target="#subcomment-collapse4"
                                                                                        role="button"
                                                                                        aria-expanded="false"
                                                                                        aria-controls="collapseExample">
                                                                                        Reply
                                                                                    </span>
                                                                                </li>
                                                                            </ul>
                                                                            <div class="add-comment-form-block collapse mt-3"
                                                                                id="subcomment-collapse4">
                                                                                <div
                                                                                    class="d-flex align-items-center gap-3">
                                                                                    <div class="flex-shrink-0">
                                                                                        <img src="../assets/images/user/1.jpg"
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
                                                                                                class="btn btn-primary font-size-12 text-capitalize px-5">post</button>
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
                                                                    <img src="../assets/images/user/1.jpg"
                                                                        alt="userimg"
                                                                        class="avatar-48 rounded-circle img-fluid"
                                                                        loading="lazy">
                                                                </div>
                                                                <div class="add-comment-form">
                                                                    <form>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Write a Comment...">
                                                                        <button type="submit"
                                                                            class="btn btn-primary font-size-12 text-capitalize px-5">post</button>
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
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="about" role="tabpanel">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-pills basic-info-items list-inline d-block p-0 m-0"
                                        role="tablist">
                                        <li>
                                            <a class="nav-link active" href="#v-pills-basicinfo-tab"
                                                data-bs-toggle="pill" data-bs-target="#v-pills-basicinfo-tab"
                                                role="button" aria-selected="true">Contact and Basic Info</a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#v-pills-details-tab" data-bs-toggle="pill"
                                                data-bs-target="#v-pills-details-tab" role="button"
                                                aria-selected="false" tabindex="-1">Hobbies and Interests</a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#v-pills-family-tab" data-bs-toggle="pill"
                                                data-bs-target="#v-pills-family" role="button" aria-selected="false"
                                                tabindex="-1">Family and Relationship</a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#v-pills-work-tab" data-bs-toggle="pill"
                                                data-bs-target="#v-pills-work-tab" role="button"
                                                aria-selected="false" tabindex="-1">Work and Education</a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#v-pills-lived-tab" data-bs-toggle="pill"
                                                data-bs-target="#v-pills-lived-tab" role="button"
                                                aria-selected="false" tabindex="-1">Places You've Lived</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 ps-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="v-pills-basicinfo-tab"
                                            role="tabpanel" aria-labelledby="v-pills-basicinfo-tab">
                                            <h4>Personal Info</h4>
                                            <hr>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>About Me:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">Hi, I’m James, I’m 36 and I work as a Digital
                                                        Designer for the “Daydreams” Agency in Pier 56</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Email:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">Bnijohn@gmail.com</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Mobile:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">(001) 4544 565 456</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Address:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">United States of America</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Social Link:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">www.bootstrap.com</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Birth Date:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">24 January</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Birth Year:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">1994</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Birthplace:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">Austin, Texas, USA</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Lives in:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">San Francisco, California, USA</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Gender:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">Female</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Interested in:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">Designing</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>language:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">English, French</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Joined:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">April 31st, 2014</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Status:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">Married</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Phone Number:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">(044) 555 - 4369 - 8957</p>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-3">
                                                    <h6>Political Incline:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">Democrat</p>
                                                </div>
                                            </div>
                                            <h4 class="mt-2">Websites and Social Links</h4>
                                            <hr>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Website:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">www.bootstrap.com</p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <h6>Social Link:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">www.bootstrap.com</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-details-tab" role="tabpanel"
                                            aria-labelledby="v-pills-details-tab">
                                            <h4 class="mt-2">Hobbies and Interests</h4>
                                            <hr>
                                            <h6 class="mb-1">Hobbies:</h6>
                                            <p>Hi, I’m Bni, I’m 26 and I work as a Web Designer for the iqonicdesign.I like
                                                to ride the bike to work, swimming, and working out. I also like reading
                                                design magazines, go to museums, and binge watching a good tv show while
                                                it’s raining outside.</p>
                                            <h6 class="mt-2 mb-1">Favourite TV Shows:</h6>
                                            <p>Breaking Good, RedDevil, People of Interest, The Running Dead, Found,
                                                American Guy.</p>
                                            <h6 class="mt-2 mb-1">Favourite Movies:</h6>
                                            <p>Idiocratic, The Scarred Wizard and the Fire Crown, Crime Squad, Ferrum Man.
                                            </p>
                                            <h6 class="mt-2 mb-1">Favourite Games:</h6>
                                            <p>The First of Us, Assassin’s Squad, Dark Assylum, NMAK16, Last Cause 4, Grand
                                                Snatch Auto.</p>
                                            <h6 class="mt-2 mb-1">Favourite Music Bands / Artists:</h6>
                                            <p>Iron Maid, DC/AC, Megablow, The Ill, Kung Fighters, System of a Revenge.</p>
                                            <h6 class="mt-2 mb-1">Favourite Books:</h6>
                                            <p>The Crime of the Century, Egiptian Mythology 101, The Scarred Wizard, Lord of
                                                the Wings, Amongst Gods, The Oracle, A Tale of Air and Water.</p>
                                            <h6 class="mt-2 mb-1">Favourite Writers:</h6>
                                            <p>Martin T. Georgeston, Jhonathan R. Token, Ivana Rowle, Alexandria Platt,
                                                Marcus Roth.</p>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-family" role="tabpanel">
                                            <h4 class="mb-3">Relationship</h4>
                                            <ul class="suggestions-lists m-0 p-0">
                                                <li class="d-flex mb-4 align-items-center">
                                                    <div class="user-img img-fluid"><span
                                                            class="material-symbols-outlined md-18">
                                                            add
                                                        </span>
                                                    </div>
                                                    <div class="media-support-info ms-3">
                                                        <h6>Add Your Relationship Status</h6>
                                                    </div>
                                                </li>
                                            </ul>
                                            <h4 class="mt-3 mb-3">Family Members</h4>
                                            <ul class="suggestions-lists m-0 p-0">
                                                <li class="d-flex mb-4 align-items-center">
                                                    <div class="user-img img-fluid"><span
                                                            class="material-symbols-outlined md-18">
                                                            add
                                                        </span>
                                                    </div>
                                                    <div class="media-support-info ms-3">
                                                        <h6>Add Family Members</h6>
                                                    </div>
                                                </li>
                                                <li class="d-flex mb-4 align-items-center justify-content-between">
                                                    <div class="user-img img-fluid"><img
                                                            src="../assets/images/user/01.jpg" alt="story-img"
                                                            class="rounded-circle avatar-40"></div>
                                                    <div class="w-100">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="ms-3">
                                                                <h6>Paul Molive</h6>
                                                                <p class="mb-0">Brother</p>
                                                            </div>
                                                            <div class="edit-relation"><a href="#"
                                                                    class="d-flex align-items-center"><span
                                                                        class="material-symbols-outlined me-2 md-18">
                                                                        edit
                                                                    </span>Edit</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between mb-4  align-items-center">
                                                    <div class="user-img img-fluid"><img
                                                            src="../assets/images/user/02.jpg" alt="story-img"
                                                            class="rounded-circle avatar-40" loading="lazy"></div>
                                                    <div class="w-100">
                                                        <div class="d-flex flex-wrap justify-content-between">
                                                            <div class=" ms-3">
                                                                <h6>Anna Mull</h6>
                                                                <p class="mb-0">Sister</p>
                                                            </div>
                                                            <div class="edit-relation "><a href="#"
                                                                    class="d-flex align-items-center"><span
                                                                        class="material-symbols-outlined me-2 md-18">
                                                                        edit
                                                                    </span>Edit</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="d-flex mb-4 align-items-center justify-content-between">
                                                    <div class="user-img img-fluid"><img
                                                            src="../assets/images/user/03.jpg" alt="story-img"
                                                            class="rounded-circle avatar-40" loading="lazy"></div>
                                                    <div class="w-100">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="ms-3">
                                                                <h6>Paige Turner</h6>
                                                                <p class="mb-0">Cousin</p>
                                                            </div>
                                                            <div class="edit-relation"><a href="#"
                                                                    class="d-flex align-items-center"><span
                                                                        class="material-symbols-outlined me-2 md-18">
                                                                        edit
                                                                    </span>Edit</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-work-tab" role="tabpanel"
                                            aria-labelledby="v-pills-work-tab">
                                            <h4 class="mb-3">Work</h4>
                                            <ul class="suggestions-lists m-0 p-0">
                                                <li class="d-flex justify-content-between mb-4  align-items-center">
                                                    <div class="user-img img-fluid"><span
                                                            class="material-symbols-outlined md-18">
                                                            add
                                                        </span>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h6>Add Work Place</h6>
                                                    </div>
                                                </li>
                                                <li class="d-flex mb-4 align-items-center justify-content-between">
                                                    <div class="user-img img-fluid"><img
                                                            src="../assets/images/user/01.jpg" alt="story-img"
                                                            class="rounded-circle avatar-40" loading="lazy"></div>
                                                    <div class="w-100">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="ms-3">
                                                                <h6>Themeforest</h6>
                                                                <p class="mb-0">Web Designer</p>
                                                            </div>
                                                            <div class="edit-relation"><a href="#"
                                                                    class="d-flex align-items-center"><span
                                                                        class="material-symbols-outlined me-2 md-18">
                                                                        edit
                                                                    </span>Edit</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="d-flex mb-4 align-items-center justify-content-between">
                                                    <div class="user-img img-fluid"><img
                                                            src="../assets/images/user/02.jpg" alt="story-img"
                                                            class="rounded-circle avatar-40" loading="lazy"></div>
                                                    <div class="w-100">
                                                        <div class="d-flex flex-wrap justify-content-between">
                                                            <div class="ms-3">
                                                                <h6>iqonicdesign</h6>
                                                                <p class="mb-0">Web Developer</p>
                                                            </div>
                                                            <div class="edit-relation"><a href="#"
                                                                    class="d-flex align-items-center"><span
                                                                        class="material-symbols-outlined me-2 md-18">
                                                                        edit
                                                                    </span>Edit</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="d-flex mb-4 align-items-center justify-content-between">
                                                    <div class="user-img img-fluid"><img
                                                            src="../assets/images/user/03.jpg" alt="story-img"
                                                            class="rounded-circle avatar-40" loading="lazy"></div>
                                                    <div class="w-100">
                                                        <div class="d-flex flex-wrap justify-content-between">
                                                            <div class="ms-3">
                                                                <h6>W3school</h6>
                                                                <p class="mb-0">Designer</p>
                                                            </div>
                                                            <div class="edit-relation"><a href="#"
                                                                    class="d-flex align-items-center"><span
                                                                        class="material-symbols-outlined me-2 md-18">
                                                                        edit
                                                                    </span>Edit</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <h4 class="mb-3">Professional Skills</h4>
                                            <ul class="suggestions-lists m-0 p-0">
                                                <li class="d-flex mb-4 align-items-center">
                                                    <div class="user-img img-fluid"><span
                                                            class="material-symbols-outlined md-18">
                                                            add
                                                        </span>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h6>Add Professional Skills</h6>
                                                    </div>
                                                </li>
                                            </ul>
                                            <h4 class="mt-3 mb-3">College</h4>
                                            <ul class="suggestions-lists m-0 p-0">
                                                <li class="d-flex mb-4 align-items-center">
                                                    <div class="user-img img-fluid"><span
                                                            class="material-symbols-outlined md-18">
                                                            add
                                                        </span>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h6>Add College</h6>
                                                    </div>
                                                </li>
                                                <li class="d-flex mb-4 align-items-center">
                                                    <div class="user-img img-fluid"><img
                                                            src="../assets/images/user/01.jpg" alt="story-img"
                                                            class="rounded-circle avatar-40" loading="lazy"></div>
                                                    <div class="w-100">
                                                        <div class="d-flex flex-wrap justify-content-between">
                                                            <div class="ms-3">
                                                                <h6>Lorem ipsum</h6>
                                                                <p class="mb-0">USA</p>
                                                            </div>
                                                            <div class="edit-relation"><a href="#"
                                                                    class="d-flex align-items-center"><span
                                                                        class="material-symbols-outlined me-2 md-18">
                                                                        edit
                                                                    </span>Edit</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-lived-tab" role="tabpanel"
                                            aria-labelledby="v-pills-lived-tab">
                                            <h4 class="mb-3">Current City and Hometown</h4>
                                            <ul class="suggestions-lists m-0 p-0">
                                                <li class="d-flex mb-4 align-items-center justify-content-between">
                                                    <div class="user-img img-fluid"><img
                                                            src="../assets/images/user/01.jpg" alt="story-img"
                                                            loading="lazy" class="rounded-circle avatar-40"></div>
                                                    <div class="w-100">
                                                        <div class="d-flex flex-wrap justify-content-between">
                                                            <div class="ms-3">
                                                                <h6>Georgia</h6>
                                                                <p class="mb-0">Georgia State</p>
                                                            </div>
                                                            <div class="edit-relation"><a href="#"
                                                                    class="d-flex align-items-center"><span
                                                                        class="material-symbols-outlined me-2 md-18">
                                                                        edit
                                                                    </span>Edit</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="d-flex mb-4 align-items-center justify-content-between">
                                                    <div class="user-img img-fluid"><img
                                                            src="../assets/images/user/02.jpg" alt="story-img"
                                                            class="rounded-circle avatar-40" loading="lazy"></div>
                                                    <div class="w-100">
                                                        <div class="d-flex flex-wrap justify-content-between">
                                                            <div class="ms-3">
                                                                <h6>Atlanta</h6>
                                                                <p class="mb-0">Atlanta City</p>
                                                            </div>
                                                            <div class="edit-relation"><a href="#"
                                                                    class="d-flex align-items-center"><span
                                                                        class="material-symbols-outlined me-2 md-18">
                                                                        edit
                                                                    </span>Edit</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <h4 class="mt-3 mb-3">Other Places Lived</h4>
                                            <ul class="suggestions-lists m-0 p-0">
                                                <li class="d-flex mb-4 align-items-center">
                                                    <div class="user-img img-fluid"><span
                                                            class="material-symbols-outlined md-18">
                                                            add
                                                        </span>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h6>Add Place</h6>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="friends" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <h2>Friends</h2>
                            <div class="friend-list-tab mt-2">
                                <ul class="nav nav-pills d-flex align-items-center justify-content-left list-item-tabs p-0 mb-2"
                                    id="friends-tab" role="tablist">
                                    <li>
                                        <a class="nav-link active" data-bs-toggle="pill" href="#pill-all-friends"
                                            data-bs-target="#all-friends" aria-selected="true" role="tab">All
                                            Friends</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" data-bs-toggle="pill" href="#pill-recently-add"
                                            data-bs-target="#recently-add" aria-selected="false" tabindex="-1"
                                            role="tab">Recently Added</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" data-bs-toggle="pill" href="#pill-closefriends"
                                            data-bs-target="#closefriends" aria-selected="false" tabindex="-1"
                                            role="tab"> Close friends</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" data-bs-toggle="pill" href="#pill-home"
                                            data-bs-target="#home-town" aria-selected="false" tabindex="-1"
                                            role="tab"> Home/Town</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" data-bs-toggle="pill" href="#pill-following"
                                            data-bs-target="#following" aria-selected="false" tabindex="-1"
                                            role="tab">Following</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="friends-tab-content">
                                    <div class="tab-pane fade show active" id="all-friends" role="tabpanel">
                                        <div class="card-body p-0">
                                            <div class="row">
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/05.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Petey Cruiser</h5>
                                                                    <p class="mb-0">15 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton01"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton01">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/06.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Anna Sthesia</h5>
                                                                    <p class="mb-0">50 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton02"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton02">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/07.jpg"
                                                                        alt="profile-img" class="img-fluid">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Paul Molive</h5>
                                                                    <p class="mb-0">10 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton03"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton03">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/08.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Gail Forcewind</h5>
                                                                    <p class="mb-0">20 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton04"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton04">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/09.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Paige Turner</h5>
                                                                    <p class="mb-0">12 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton05"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton05">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/10.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>b Frapples</h5>
                                                                    <p class="mb-0">6 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton06"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton06">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/13.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Walter Melon</h5>
                                                                    <p class="mb-0">30 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton07"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton07">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/14.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Barb Ackue</h5>
                                                                    <p class="mb-0">14 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton08"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton08">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/15.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Buck Kinnear</h5>
                                                                    <p class="mb-0">16 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton09"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton09">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/16.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Ira Membrit</h5>
                                                                    <p class="mb-0">22 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton10"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton10">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/17.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Shonda Leer</h5>
                                                                    <p class="mb-0">10 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton11"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton11">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/18.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>ock Lee</h5>
                                                                    <p class="mb-0">18 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton12"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton12">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/19.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Maya Didas</h5>
                                                                    <p class="mb-0">40 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton13"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton13">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/05.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Rick O'Shea</h5>
                                                                    <p class="mb-0">50 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton14"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton14">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/06.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Pete Sariya</h5>
                                                                    <p class="mb-0">5 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton15"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton15">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/07.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Monty Carlo</h5>
                                                                    <p class="mb-0">2 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton16"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton16">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/08.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Sal Monella</h5>
                                                                    <p class="mb-0">0 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton17"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton17">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/09.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Sue Vaneer</h5>
                                                                    <p class="mb-0">25 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton18"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton18">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/10.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Cliff Hanger</h5>
                                                                    <p class="mb-0">18 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton19"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton19">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/05.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Barb Dwyer</h5>
                                                                    <p class="mb-0">23 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton20"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton20">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/06.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Terry Aki</h5>
                                                                    <p class="mb-0">8 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton21"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton21">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/13.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Cory Ander</h5>
                                                                    <p class="mb-0">7 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton22"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton22">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/14.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Robin Banks</h5>
                                                                    <p class="mb-0">14 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton23"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton23">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/15.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Jimmy Changa</h5>
                                                                    <p class="mb-0">10 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton24"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton24">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/16.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Barry Wine</h5>
                                                                    <p class="mb-0">18 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton25"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton25">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/17.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Poppa Cherry</h5>
                                                                    <p class="mb-0">16 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton26"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton26">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/18.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Zack Lee</h5>
                                                                    <p class="mb-0">33 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton27"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton27">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/19.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Don Stairs</h5>
                                                                    <p class="mb-0">15 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton28"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton28">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/05.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Peter Pants</h5>
                                                                    <p class="mb-0">12 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton29"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton29">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/06.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Hal Appeno </h5>
                                                                    <p class="mb-0">13 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton30"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton30">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="recently-add" role="tabpanel">
                                        <div class="card-body p-0">
                                            <div class="row">
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/15.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Polly Tech</h5>
                                                                    <p class="mb-0">10 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton35"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton35">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/16.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Holly Graham</h5>
                                                                    <p class="mb-0">8 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton36"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton36">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/17.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Tara Zona</h5>
                                                                    <p class="mb-0">5 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton37"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton37">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/18.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Barry Cade</h5>
                                                                    <p class="mb-0">20 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton38"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton38">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="closefriends" role="tabpanel">
                                        <div class="card-body p-0">
                                            <div class="row">
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/19.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Bud Wiser</h5>
                                                                    <p class="mb-0">32 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton39"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton39">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/05.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Otto Matic</h5>
                                                                    <p class="mb-0">9 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton40"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton40">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/06.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Peter Pants</h5>
                                                                    <p class="mb-0">2 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton41"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton41">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/07.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Zack Lee</h5>
                                                                    <p class="mb-0">15 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton42"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton42">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/08.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Barry Wine</h5>
                                                                    <p class="mb-0">36 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton43"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton43">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/09.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Robin Banks</h5>
                                                                    <p class="mb-0">22 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton44"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton44">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/10.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Cory Ander</h5>
                                                                    <p class="mb-0">18 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton45"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton45">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/15.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Moe Fugga</h5>
                                                                    <p class="mb-0">12 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton46"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton46">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/16.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Polly Tech</h5>
                                                                    <p class="mb-0">30 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton47"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton47">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/17.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Hal Appeno</h5>
                                                                    <p class="mb-0">25 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton48"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton48">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="home-town" role="tabpanel">
                                        <div class="card-body p-0">
                                            <div class="row">
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/18.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Paul Molive</h5>
                                                                    <p class="mb-0">14 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton49"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton49">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/19.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Paige Turner</h5>
                                                                    <p class="mb-0">8 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton50"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton50">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/05.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Barb Ackue</h5>
                                                                    <p class="mb-0">23 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton51"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton51">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/06.jpg"
                                                                        alt="profile-img" class="img-fluid">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Ira Membrit</h5>
                                                                    <p class="mb-0">16 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton52"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton52">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/07.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Maya Didas</h5>
                                                                    <p class="mb-0">12 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton53"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton53">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="following" role="tabpanel">
                                        <div class="card-body p-0">
                                            <div class="row">
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/05.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Maya Didas</h5>
                                                                    <p class="mb-0">20 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton54"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton54">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/06.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Monty Carlo</h5>
                                                                    <p class="mb-0">3 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton55"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton55">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/07.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Cliff Hanger</h5>
                                                                    <p class="mb-0">20 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton56"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton56">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/08.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>b Ackue</h5>
                                                                    <p class="mb-0">12 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton57"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton57">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/09.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Bob Frapples</h5>
                                                                    <p class="mb-0">12 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton58"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton58">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/10.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Anna Mull</h5>
                                                                    <p class="mb-0">6 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton59"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton59">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/15.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>ry Wine</h5>
                                                                    <p class="mb-0">15 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton60"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton60">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/16.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Don Stairs</h5>
                                                                    <p class="mb-0">12 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton61"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton61">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/17.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Peter Pants</h5>
                                                                    <p class="mb-0">8 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton62"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton62">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/18.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Polly Tech</h5>
                                                                    <p class="mb-0">18 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton63"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton63">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/19.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Tara Zona</h5>
                                                                    <p class="mb-0">30 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton64"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton64">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/05.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Arty Ficial</h5>
                                                                    <p class="mb-0">15 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton65"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton65">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/06.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Bill Emia</h5>
                                                                    <p class="mb-0">25 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton66"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton66">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/07.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Bill Yerds</h5>
                                                                    <p class="mb-0">9 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton67"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton67">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="iq-friendlist-block">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#">
                                                                    <img src="../assets/images/user/08.jpg"
                                                                        alt="profile-img" class="img-fluid"
                                                                        loading="lazy">
                                                                </a>
                                                                <div class="friend-info ms-3">
                                                                    <h5>Matt Innae</h5>
                                                                    <p class="mb-0">19 friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-toolbar d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-toggle btn btn-secondary me-2 d-flex align-items-center"
                                                                        id="dropdownMenuButton68"
                                                                        data-bs-toggle="dropdown" aria-expanded="true"
                                                                        role="button">
                                                                        <i class="material-symbols-outlined me-2">
                                                                            done
                                                                        </i> Friend
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdownMenuButton68">
                                                                        <a class="dropdown-item" href="#">Get
                                                                            Notification</a>
                                                                        <a class="dropdown-item" href="#">Close
                                                                            Friend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfollow</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Unfriend</a>
                                                                        <a class="dropdown-item"
                                                                            href="#">Block</a>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="photos" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <h2>Photos</h2>
                            <div class="friend-list-tab mt-2">
                                <ul class="nav nav-pills d-flex align-items-center justify-content-left list-item-tabs p-0 mb-2"
                                    role="tablist">
                                    <li>
                                        <a class="nav-link active" data-bs-toggle="pill" href="#pill-photosofyou"
                                            data-bs-target="#photosofyou" aria-selected="true" role="tab">Photos
                                            of You</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" data-bs-toggle="pill" href="#pill-your-photos"
                                            data-bs-target="#your-photos" aria-selected="false" tabindex="-1"
                                            role="tab">Your Photos</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="photosofyou" role="tabpanel">
                                        <div class="card-body p-0">
                                            <div class="d-grid gap-2 d-grid-template-1fr-13">
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/51.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/51.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/52.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/52.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/53.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/53.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/54.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/54.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/55.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/55.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/56.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/56.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/57.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/57.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/58.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/58.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/59.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/59.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/60.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/60.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/61.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/61.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/62.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/62.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/63.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/63.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/64.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/64.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/65.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/65.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/51.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/51.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/52.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/52.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/53.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/53.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/54.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/54.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/55.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/55.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/56.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/56.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/57.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/57.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/58.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/58.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a href="#">
                                                            <img src="../assets/images/page-img/59.jpg"
                                                                class="img-fluid rounded" alt="Responsive image"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="your-photos" role="tabpanel">
                                        <div class="card-body p-0">
                                            <div class="d-grid gap-2 d-grid-template-1fr-13 ">
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/51.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/51.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/52.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/52.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/53.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/53.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/54.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/54.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/55.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/55.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/56.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/56.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/57.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/57.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/58.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/58.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/59.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/59.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="user-images position-relative overflow-hidden">
                                                        <a data-fslightbox="gallery"
                                                            href="../assets/images/page-img/60.jpg" class="rounded">
                                                            <img src="../assets/images/page-img/60.jpg"
                                                                class="img-fluid rounded" alt="photo-profile"
                                                                loading="lazy">
                                                        </a>
                                                        <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                                <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            60 <i
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                thumb_up
                                                                            </i> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            30 <span
                                                                                class="material-symbols-outlined  md-14 ms-1">
                                                                                chat_bubble_outline
                                                                            </span> </a>
                                                                    </li>
                                                                    <li><a href="#"
                                                                            class="pe-3 text-white d-flex align-items-center">
                                                                            10 <span
                                                                                class="material-symbols-outlined md-14 ms-1">
                                                                                forward
                                                                            </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            class="image-edit-btn material-symbols-outlined md-16"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Edit or Remove">
                                                            drive_file_rename_outline
                                                        </a>
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
            </div>
        </div>
    </div>

    <!-- JavaScript for Preview -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const avatarInput = document.getElementById('avatar');
            const previewImage = document.getElementById('profilePhotoPreview');

            if (avatarInput && previewImage) {
                avatarInput.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            previewImage.src = e.target.result;
                        }
                        reader.readAsDataURL(file);
                    }
                });
            }
        });
    </script>
@endsection


