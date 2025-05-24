<!doctype html>
<html lang="en" class="theme-fs-md" data-bs-theme-color="default" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    @yield('page-style')
    <!-- Config Options -->

    <meta name="setting_options"
          content='{
    "saveLocal":"sessionStorage",
    "storeKey":"socialV",
    "setting":{
      "theme_scheme_direction":{"value":"ltr"},
      "theme_scheme":{"value":"light"},
      "theme_color":{
        "colors":{
          "--customprimary":"#50b5ff",
          "--custominfo":"#d592ff"
        },
        "value":"theme-color-default"
      },
      "sidebar_type":{"value":[]},
      "sidebar_menu_style":{"value":"navs-rounded-all"},
      "footer":{"value":"default"}
    }
  }'>


    <!-- End Config Options -->
    @include('frontend.partial.style')
    @yield('page-script')
</head>

<body class=" ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    @include('frontend.partial.wrapper')
    <!-- Wrapper End-->
    <main class="main-content">
        <div class="position-relative">
            <!-- header start-->
            @include('frontend.partial.header')
            <!-- header end -->
            <div>
                <div class="position-relative">
                </div>
                <div class="content-inner " id="page_layout">
                    <div class="container">
                        @yield('content')
                    </div>

                    <!-- Like Modal -->
                    <div class="modal fade likemodal" id="likemodal" tabindex="-1" aria-labelledby="likemodalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <ul class="nav nav-tabs liked-tabs" id="liked-tabs" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <span class="nav-link active" id="reaction-tab-1" data-bs-toggle="tab"
                                                data-bs-target="#reaction-tab-all" type="button" role="tab"
                                                aria-controls="reaction-tab-all" aria-selected="true">
                                                <span class="align-middle">All</span>
                                            </span>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <span class="nav-link" id="reaction-tab-2" data-bs-toggle="tab"
                                                data-bs-target="#reaction-tab-like" type="button" role="tab"
                                                aria-controls="reaction-tab-like" aria-selected="false">
                                                <img src="{{asset('frontend/')}}/assets/images/icon/01.png"
                                                    class="img-fluid reaction-img" alt="like" loading="lazy">
                                                <span class="align-middle">2</span>
                                            </span>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <span class="nav-link" id="reaction-tab-3" data-bs-toggle="tab"
                                                data-bs-target="#reaction-tab-love" type="button" role="tab"
                                                aria-controls="reaction-tab-love" aria-selected="false">
                                                <img src="{{asset('frontend/')}}/assets/images/icon/02.png"
                                                    class="img-fluid reaction-img" alt="love" loading="lazy">
                                                <span class="align-middle">3</span>
                                            </span>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <span class="nav-link" id="reaction-tab-4" data-bs-toggle="tab"
                                                data-bs-target="#reaction-tab-happy" type="button" role="tab"
                                                aria-controls="reaction-tab-happy" aria-selected="false">
                                                <img src="{{asset('frontend/')}}/assets/images/icon/03.png"
                                                    class="img-fluid reaction-img" alt="happy" loading="lazy">
                                                <span class="align-middle">3</span>
                                            </span>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <span class="nav-link" id="reaction-tab-5" data-bs-toggle="tab"
                                                data-bs-target="#reaction-tab-haha" type="button" role="tab"
                                                aria-controls="reaction-tab-haha" aria-selected="false">
                                                <img src="{{asset('frontend/')}}/assets/images/icon/04.png"
                                                    class="img-fluid reaction-img" alt="haha" loading="lazy">
                                                <span class="align-middle">1</span>
                                            </span>
                                        </li>
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="tab-content liked-tabs-content" id="liked-tabs-content">
                                        <div class="tab-pane fade show active" id="reaction-tab-all" role="tabpanel"
                                            aria-labelledby="reaction-tab-1" tabindex="0">
                                            <ul class="list-inline m-0 p-0">
                                                <li class="mb-3">
                                                    <div
                                                        class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                                        <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                                            <div class="reaction-user-image flex-shrnik-0">
                                                                <img class="border border-2 rounded-circle avatar-50"
                                                                    src="{{asset('frontend/')}}/assets/images/user/01.jpg"
                                                                    alt="user" loading="lazy">
                                                            </div>
                                                            <div class="reaction-user-meta">
                                                                <h6 class="mb-0">Anna Sthesia</h6>
                                                                <span>@anna</span>
                                                            </div>
                                                        </div>
                                                        <div class="reaction flex-shrnik-0">
                                                            <img src="{{asset('frontend/')}}/assets/images/icon/01.png"
                                                                class="img-fluid reaction-img" alt="like"
                                                                loading="lazy">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-3">
                                                    <div
                                                        class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                                        <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                                            <div class="reaction-user-image flex-shrnik-0">
                                                                <img class="border border-2 rounded-circle avatar-50"
                                                                    src="{{asset('frontend/')}}/assets/images/user/02.jpg"
                                                                    alt="user" loading="lazy">
                                                            </div>
                                                            <div class="reaction-user-meta">
                                                                <h6 class="mb-0">Paul Molive</h6>
                                                                <span>@paul</span>
                                                            </div>
                                                        </div>
                                                        <div class="reaction flex-shrnik-0">
                                                            <img src="{{asset('frontend/')}}/assets/images/icon/01.png"
                                                                class="img-fluid reaction-img" alt="like"
                                                                loading="lazy">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-3">
                                                    <div
                                                        class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                                        <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                                            <div class="reaction-user-image flex-shrnik-0">
                                                                <img class="border border-2 rounded-circle avatar-50"
                                                                    src="{{asset('frontend/')}}/assets/images/user/03.jpg"
                                                                    alt="user" loading="lazy">
                                                            </div>
                                                            <div class="reaction-user-meta">
                                                                <h6 class="mb-0">Anna Mull</h6>
                                                                <span>@annamull</span>
                                                            </div>
                                                        </div>
                                                        <div class="reaction flex-shrnik-0">
                                                            <img src="{{asset('frontend/')}}/assets/images/icon/02.png"
                                                                class="img-fluid reaction-img" alt="love"
                                                                loading="lazy">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-3">
                                                    <div
                                                        class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                                        <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                                            <div class="reaction-user-image flex-shrnik-0">
                                                                <img class="border border-2 rounded-circle avatar-50"
                                                                    src="{{asset('frontend/')}}/assets/images/user/04.jpg"
                                                                    alt="user" loading="lazy">
                                                            </div>
                                                            <div class="reaction-user-meta">
                                                                <h6 class="mb-0">Paige Turner</h6>
                                                                <span>@paige</span>
                                                            </div>
                                                        </div>
                                                        <div class="reaction flex-shrnik-0">
                                                            <img src="{{asset('frontend/')}}/assets/images/icon/02.png"
                                                                class="img-fluid reaction-img" alt="love"
                                                                loading="lazy">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-3">
                                                    <div
                                                        class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                                        <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                                            <div class="reaction-user-image flex-shrnik-0">
                                                                <img class="border border-2 rounded-circle avatar-50"
                                                                    src="{{asset('frontend/')}}/assets/images/user/11.jpg"
                                                                    alt="user" loading="lazy">
                                                            </div>
                                                            <div class="reaction-user-meta">
                                                                <h6 class="mb-0">Bob Frapples</h6>
                                                                <span>@bob</span>
                                                            </div>
                                                        </div>
                                                        <div class="reaction flex-shrnik-0">
                                                            <img src="{{asset('frontend/')}}/assets/images/icon/02.png"
                                                                class="img-fluid reaction-img" alt="love"
                                                                loading="lazy">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-3">
                                                    <div
                                                        class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                                        <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                                            <div class="reaction-user-image flex-shrnik-0">
                                                                <img class="border border-2 rounded-circle avatar-50"
                                                                    src="{{asset('frontend/')}}/assets/images/user/12.jpg"
                                                                    alt="user" loading="lazy">
                                                            </div>
                                                            <div class="reaction-user-meta">
                                                                <h6 class="mb-0">Ira Membrit</h6>
                                                                <span>@ira</span>
                                                            </div>
                                                        </div>
                                                        <div class="reaction flex-shrnik-0">
                                                            <img src="{{asset('frontend/')}}/assets/images/icon/03.png"
                                                                class="img-fluid reaction-img" alt="happy"
                                                                loading="lazy">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-3">
                                                    <div
                                                        class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                                        <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                                            <div class="reaction-user-image flex-shrnik-0">
                                                                <img class="border border-2 rounded-circle avatar-50"
                                                                    src="{{asset('frontend/')}}/assets/images/user/13.jpg"
                                                                    alt="user" loading="lazy">
                                                            </div>
                                                            <div class="reaction-user-meta">
                                                                <h6 class="mb-0">Bob Frapples</h6>
                                                                <span>@bob</span>
                                                            </div>
                                                        </div>
                                                        <div class="reaction flex-shrnik-0">
                                                            <img src="{{asset('frontend/')}}/assets/images/icon/03.png"
                                                                class="img-fluid reaction-img" alt="happy"
                                                                loading="lazy">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-3">
                                                    <div
                                                        class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                                        <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                                            <div class="reaction-user-image flex-shrnik-0">
                                                                <img class="border border-2 rounded-circle avatar-50"
                                                                    src="{{asset('frontend/')}}/assets/images/user/14.jpg"
                                                                    alt="user" loading="lazy">
                                                            </div>
                                                            <div class="reaction-user-meta">
                                                                <h6 class="mb-0">Greta Life</h6>
                                                                <span>@greta</span>
                                                            </div>
                                                        </div>
                                                        <div class="reaction flex-shrnik-0">
                                                            <img src="{{asset('frontend/')}}/assets/images/icon/03.png"
                                                                class="img-fluid reaction-img" alt="happy"
                                                                loading="lazy">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div
                                                        class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                                        <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                                            <div class="reaction-user-image flex-shrnik-0">
                                                                <img class="border border-2 rounded-circle avatar-50"
                                                                    src="{{asset('frontend/')}}/assets/images/user/15.jpg"
                                                                    alt="user" loading="lazy">
                                                            </div>
                                                            <div class="reaction-user-meta">
                                                                <h6 class="mb-0">Pete Sariya</h6>
                                                                <span>@pete</span>
                                                            </div>
                                                        </div>
                                                        <div class="reaction flex-shrnik-0">
                                                            <img src="{{asset('frontend/')}}/assets/images/icon/04.png"
                                                                class="img-fluid reaction-img" alt="haha"
                                                                loading="lazy">
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane fade" id="reaction-tab-like" role="tabpanel"
                                            aria-labelledby="reaction-tab-2" tabindex="0">
                                            <ul class="list-inline m-0 p-0">
                                                <li class="mb-3">
                                                    <div
                                                        class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                                        <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                                            <div class="reaction-user-image flex-shrnik-0">
                                                                <img class="border border-2 rounded-circle avatar-50"
                                                                    src="{{asset('frontend/')}}/assets/images/user/01.jpg"
                                                                    alt="user" loading="lazy">
                                                            </div>
                                                            <div class="reaction-user-meta">
                                                                <h6 class="mb-0">Anna Sthesia</h6>
                                                                <span>@anna</span>
                                                            </div>
                                                        </div>
                                                        <div class="reaction flex-shrnik-0">
                                                            <img src="{{asset('frontend/')}}/assets/images/icon/01.png"
                                                                class="img-fluid reaction-img" alt="like"
                                                                loading="lazy">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div
                                                        class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                                        <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                                            <div class="reaction-user-image flex-shrnik-0">
                                                                <img class="border border-2 rounded-circle avatar-50"
                                                                    src="{{asset('frontend/')}}/assets/images/user/02.jpg"
                                                                    alt="user" loading="lazy">
                                                            </div>
                                                            <div class="reaction-user-meta">
                                                                <h6 class="mb-0">Paul Molive</h6>
                                                                <span>@paul</span>
                                                            </div>
                                                        </div>
                                                        <div class="reaction flex-shrnik-0">
                                                            <img src="{{asset('frontend/')}}/assets/images/icon/01.png"
                                                                class="img-fluid reaction-img" alt="like"
                                                                loading="lazy">
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane fade" id="reaction-tab-love" role="tabpanel"
                                            aria-labelledby="reaction-tab-3" tabindex="0">
                                            <ul class="list-inline m-0 p-0">
                                                <li class="mb-3">
                                                    <div
                                                        class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                                        <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                                            <div class="reaction-user-image flex-shrnik-0">
                                                                <img class="border border-2 rounded-circle avatar-50"
                                                                    src="{{asset('frontend/')}}/assets/images/user/03.jpg"
                                                                    alt="user" loading="lazy">
                                                            </div>
                                                            <div class="reaction-user-meta">
                                                                <h6 class="mb-0">Anna Mull</h6>
                                                                <span>@annamull</span>
                                                            </div>
                                                        </div>
                                                        <div class="reaction flex-shrnik-0">
                                                            <img src="{{asset('frontend/')}}/assets/images/icon/02.png"
                                                                class="img-fluid reaction-img" alt="love"
                                                                loading="lazy">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-3">
                                                    <div
                                                        class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                                        <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                                            <div class="reaction-user-image flex-shrnik-0">
                                                                <img class="border border-2 rounded-circle avatar-50"
                                                                    src="{{asset('frontend/')}}/assets/images/user/04.jpg"
                                                                    alt="user" loading="lazy">
                                                            </div>
                                                            <div class="reaction-user-meta">
                                                                <h6 class="mb-0">Paige Turner</h6>
                                                                <span>@paige</span>
                                                            </div>
                                                        </div>
                                                        <div class="reaction flex-shrnik-0">
                                                            <img src="{{asset('frontend/')}}/assets/images/icon/02.png"
                                                                class="img-fluid reaction-img" alt="love"
                                                                loading="lazy">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div
                                                        class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                                        <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                                            <div class="reaction-user-image flex-shrnik-0">
                                                                <img class="border border-2 rounded-circle avatar-50"
                                                                    src="{{asset('frontend/')}}/assets/images/user/11.jpg"
                                                                    alt="user" loading="lazy">
                                                            </div>
                                                            <div class="reaction-user-meta">
                                                                <h6 class="mb-0">Bob Frapples</h6>
                                                                <span>@bob</span>
                                                            </div>
                                                        </div>
                                                        <div class="reaction flex-shrnik-0">
                                                            <img src="{{asset('frontend/')}}/assets/images/icon/02.png"
                                                                class="img-fluid reaction-img" alt="love"
                                                                loading="lazy">
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane fade" id="reaction-tab-happy" role="tabpanel"
                                            aria-labelledby="reaction-tab-4" tabindex="0">
                                            <ul class="list-inline m-0 p-0">
                                                <li class="mb-3">
                                                    <div
                                                        class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                                        <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                                            <div class="reaction-user-image flex-shrnik-0">
                                                                <img class="border border-2 rounded-circle avatar-50"
                                                                    src="{{asset('frontend/')}}/assets/images/user/12.jpg"
                                                                    alt="user" loading="lazy">
                                                            </div>
                                                            <div class="reaction-user-meta">
                                                                <h6 class="mb-0">Ira Membrit</h6>
                                                                <span>@ira</span>
                                                            </div>
                                                        </div>
                                                        <div class="reaction flex-shrnik-0">
                                                            <img src="{{asset('frontend/')}}/assets/images/icon/03.png"
                                                                class="img-fluid reaction-img" alt="happy"
                                                                loading="lazy">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-3">
                                                    <div
                                                        class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                                        <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                                            <div class="reaction-user-image flex-shrnik-0">
                                                                <img class="border border-2 rounded-circle avatar-50"
                                                                    src="{{asset('frontend/')}}/assets/images/user/13.jpg"
                                                                    alt="user" loading="lazy">
                                                            </div>
                                                            <div class="reaction-user-meta">
                                                                <h6 class="mb-0">Bob Frapples</h6>
                                                                <span>@bob</span>
                                                            </div>
                                                        </div>
                                                        <div class="reaction flex-shrnik-0">
                                                            <img src="{{asset('frontend/')}}/assets/images/icon/03.png"
                                                                class="img-fluid reaction-img" alt="happy"
                                                                loading="lazy">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div
                                                        class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                                        <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                                            <div class="reaction-user-image flex-shrnik-0">
                                                                <img class="border border-2 rounded-circle avatar-50"
                                                                    src="{{asset('frontend/')}}/assets/images/user/14.jpg"
                                                                    alt="user" loading="lazy">
                                                            </div>
                                                            <div class="reaction-user-meta">
                                                                <h6 class="mb-0">Greta Life</h6>
                                                                <span>@greta</span>
                                                            </div>
                                                        </div>
                                                        <div class="reaction flex-shrnik-0">
                                                            <img src="{{asset('frontend/')}}/assets/images/icon/03.png"
                                                                class="img-fluid reaction-img" alt="happy"
                                                                loading="lazy">
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane fade" id="reaction-tab-haha" role="tabpanel"
                                            aria-labelledby="reaction-tab-5" tabindex="0">
                                            <ul class="list-inline m-0 p-0">
                                                <li>
                                                    <div
                                                        class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                                        <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                                            <div class="reaction-user-image flex-shrnik-0">
                                                                <img class="border border-2 rounded-circle avatar-50"
                                                                    src="{{asset('frontend/')}}/assets/images/user/15.jpg"
                                                                    alt="user" loading="lazy">
                                                            </div>
                                                            <div class="reaction-user-meta">
                                                                <h6 class="mb-0">Pete Sariya</h6>
                                                                <span>@pete</span>
                                                            </div>
                                                        </div>
                                                        <div class="reaction flex-shrnik-0">
                                                            <img src="{{asset('frontend/')}}/assets/images/icon/04.png"
                                                                class="img-fluid reaction-img" alt="haha"
                                                                loading="lazy">
                                                        </div>
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
            </div>
            <!-- sidebar-mini start-->
            @include('frontend.partial.sidebar-mini')
            <!-- sidebar end -->

            <div class="chat-popup-modal" id="chat-popup-modal">
                <div class="bg-primary p-3 d-flex align-items-center justify-content-between gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="image flex-shrink-0">
                            <img src="{{asset('frontend/')}}/assets/images/user/13.jpg" alt="img"
                                class="img-fluid avatar-45 rounded-circle object-cover">
                        </div>
                        <div class="content">
                            <h6 class="mb-0 font-size-14 text-white">Bob Frapples</h6>
                            <span class="d-inline-block lh-1 font-size-12 text-white"><span
                                    class="d-inline-block rounded-circle bg-success border-5 p-1 align-baseline me-1"></span>Avaliable</span>
                        </div>
                    </div>
                    <div class="chat-popup-modal-close lh-1" type="button">
                        <span class="material-symbols-outlined font-size-18 text-white">
                            close
                        </span>
                    </div>
                </div>
                <div class="chat-popup-body p-3 border-bottom">
                    <ul class="list-inline p-0 mb-0 chat">
                        <li>
                            <div class="text-center">
                                <span class="time font-size-12 text-primary">Today</span>
                            </div>
                        </li>
                        <li class="mt-2">
                            <div class="text-start">
                                <div
                                    class="d-inline-block py-2 px-3 bg-gray-subtle chat-popup-message font-size-12 fw-medium">
                                    Hello, How Are you Doing Today?
                                </div>
                                <span class="mt-1 d-block time font-size-10 fst-italic">03:41 PM</span>
                            </div>
                        </li>
                        <li class="mt-3">
                            <div class="text-end">
                                <div
                                    class="d-inline-block py-2 px-3 bg-primary-subtle chat-popup-message message-right font-size-12 fw-medium">
                                    Hello, I'm Doing Well.
                                </div>
                                <span class="mt-1 d-block time font-size-10 fst-italic">03:42 PM</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="chat-popup-footer p-3">
                    <div class="chat-popup-form">
                        <form>
                            <input type="text" class="form-control" placeholder="Start Typing...">
                            <button type="submit" class="chat-popup-form-button btn btn-primary">
                                <span class="material-symbols-outlined font-size-18 icon-rtl">
                                    send
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- footer start-->
    @include('frontend.partial.footer')
    <!-- footer End-->

    <!-- offcanvas start -->

    <!-- Live Customizer start -->
    <!-- Setting offcanvas start here -->
    @include('frontend.partial.offcanvas')
    <!-- Settings sidebar end here -->

    <a class="btn btn-fixed-end btn-danger btn-icon btn-setting" id="settingbutton" data-bs-toggle="offcanvas"
        data-bs-target="#live-customizer" role="button" aria-controls="live-customizer">
        <span class="icon material-symbols-outlined animated-rotate text-white">
            settings
        </span>
    </a> <!-- Live Customizer end -->

    <!-- Share Modal start-->
    @include('frontend.partial.share-model')
    <!-- Share Moda end-->


    <!-- offcanvas bottom start-->
    @include('frontend.partial.offcanvas-bottom')
    <!-- offcanvas bottom end-->

    <!-- Backend Bundle JavaScript -->
    @include('frontend.partial.script')
</body>

</html>
