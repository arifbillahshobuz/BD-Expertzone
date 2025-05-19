<!doctype html>
<html lang="en" class="theme-fs-md">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SocialV | Responsive Bootstrap 5 Admin Dashboard Template</title>
    <!-- Styles -->
    @include('frontend.partial.style')
</head>

<body class="">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->

    <div class="wrapper">
        <section class="sign-in-page h-100vh">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6 overflow-hidden position-relative">
                        <div class="bg-primary w-100 h-100 position-absolute top-0 bottom-0 start-0 end-0"></div>
                        <div class="container-inside z-1">
                            <div class="main-circle circle-small"></div>
                            <div class="main-circle circle-medium"></div>
                            <div class="main-circle circle-large"></div>
                            <div class="main-circle circle-xlarge"></div>
                            <div class="main-circle circle-xxlarge"></div>
                        </div>
                        <div class="sign-in-detail container-inside-top">
                            <div class="swiper swiper-general overflow-hidden swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events"
                                data-slide="1" data-laptop="1" data-tab="1" data-mobile="1" data-mobile-sm="1"
                                data-autoplay="true" data-loop="true" data-navigation="false" data-pagination="true"
                                data-space="16">
                                <ul class="swiper-wrapper list-inline m-0 p-0 " id="swiper-wrapper-5c378067f36e34e4"
                                    aria-live="off"
                                    style="transform: translate3d(-1048px, 0px, 0px); transition-duration: 0ms;">
                                    <li class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next"
                                        role="group" aria-label="3 / 3" data-swiper-slide-index="2"
                                        style="width: 508px; margin-right: 16px;">
                                        <img src="{{ asset('frontend/assets/images/login/3.jpg') }}"
                                            class="signin-img img-fluid mb-5 rounded-3" alt="image">
                                        <h2 class="mb-3 text-white fw-semibold">Together Is better</h2>
                                        <p class="font-size-16 text-white mb-0">It is a long established fact that a
                                            reader will
                                            be<br> distracted by the readable content.</p>
                                    </li>
                                    <li class="swiper-slide swiper-slide-prev" role="group" aria-label="1 / 3"
                                        data-swiper-slide-index="0" style="width: 508px; margin-right: 16px;">
                                        <img src="{{ asset('frontend/assets/images/login/2.jpg') }}"
                                            class="signin-img img-fluid mb-5 rounded-3" alt="image">
                                        <h2 class="mb-3 text-white fw-semibold">Power UP Your Friendship</h2>
                                        <p class="font-size-16 text-white mb-0">It is a long established fact that a
                                            reader will
                                            be<br> distracted by the readable content.</p>
                                    </li>
                                    <li class="swiper-slide swiper-slide-active" role="group" aria-label="2 / 3"
                                        data-swiper-slide-index="1" style="width: 508px; margin-right: 16px;">
                                        <img src="{{ asset('frontend/assets/images/login/3.jpg') }}"
                                            class="signin-img img-fluid mb-5 rounded-3" alt="image">
                                        <h2 class="mb-3 text-white fw-semibold">Connect with the world</h2>
                                        <p class="font-size-16 text-white mb-0">It is a long established fact that a
                                            reader will
                                            be<br> distracted by the readable content.</p>
                                    </li>
                                    <li class="swiper-slide swiper-slide-next" role="group" aria-label="3 / 3"
                                        data-swiper-slide-index="2" style="width: 508px; margin-right: 16px;">
                                        <img src="{{ asset('frontend/assets/images/login/3.jpg') }}"
                                            class="signin-img img-fluid mb-5 rounded-3" alt="image">
                                        <h2 class="mb-3 text-white fw-semibold">Together Is better</h2>
                                        <p class="font-size-16 text-white mb-0">It is a long established fact that a
                                            reader will
                                            be<br> distracted by the readable content.</p>
                                    </li>
                                    <li class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev"
                                        role="group" aria-label="1 / 3" data-swiper-slide-index="0"
                                        style="width: 508px; margin-right: 16px;">
                                        <img src="../assets/images/login/1.jpg"
                                            class="signin-img img-fluid mb-5 rounded-3" alt="image">
                                        <h2 class="mb-3 text-white fw-semibold">Power UP Your Friendship</h2>
                                        <p class="font-size-16 text-white mb-0">It is a long established fact that a
                                            reader will
                                            be<br> distracted by the readable content.</p>
                                    </li>
                                </ul>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                            </div>
                        </div>
                    </div>
                    <!-- Content -->
                    @yield('auth-content')
                    <!-- End Content -->

                </div>
            </div>
        </section>
    </div>

    <!-- Scripts -->
    @include('frontend.partial.script')


</body>

</html>
