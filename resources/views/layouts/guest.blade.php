<!doctype html>
<html lang="en" class="theme-fs-md">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SocialV | Responsive Bootstrap 5 Admin Dashboard Template</title>
    @include('frontend.partial.style')
</head>

<body style="overflow-y: auto;">
<div id="loading">
    <div id="loading-center"></div>
</div>

<div class="wrapper">
    <section class="sign-in-page mim-vh-100 overflow-auto">
        <div class="container-fluid">
            <div class="row">
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
                        <div class="swiper swiper-general overflow-hidden">
                            <ul class="swiper-wrapper list-inline m-0 p-0">
                                <li class="swiper-slide">
                                    <img data-src="{{ asset('frontend/assets/images/login/3.jpg') }}"
                                         class="signin-img img-fluid mb-5 rounded-3 swiper-lazy" alt="image">
                                    <div class="swiper-lazy-preloader"></div>
                                    <h2 class="mb-3 text-white fw-semibold">Together Is Better</h2>
                                    <p class="font-size-16 text-white mb-0">It is a long established fact that a reader will be<br> distracted by the readable content.</p>
                                </li>
                                <li class="swiper-slide">
                                    <img data-src="{{ asset('frontend/assets/images/login/2.jpg') }}"
                                         class="signin-img img-fluid mb-5 rounded-3 swiper-lazy" alt="image">
                                    <div class="swiper-lazy-preloader"></div>
                                    <h2 class="mb-3 text-white fw-semibold">Power UP Your Friendship</h2>
                                    <p class="font-size-16 text-white mb-0">It is a long established fact that a reader will be<br> distracted by the readable content.</p>
                                </li>
                                <li class="swiper-slide">
                                    <img data-src="{{ asset('frontend/assets/images/login/1.jpg') }}"
                                         class="signin-img img-fluid mb-5 rounded-3 swiper-lazy" alt="image">
                                    <div class="swiper-lazy-preloader"></div>
                                    <h2 class="mb-3 text-white fw-semibold">Connect with the World</h2>
                                    <p class="font-size-16 text-white mb-0">It is a long established fact that a reader will be<br> distracted by the readable content.</p>
                                </li>
                            </ul>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
                @yield('auth-content')
            </div>
        </div>
    </section>
</div>

@include('frontend.partial.script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.swiper-general', {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            lazy: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            spaceBetween: 16,
            breakpoints: {
                640: { slidesPerView: 1 },
                768: { slidesPerView: 1 },
                1024: { slidesPerView: 1 },
            },
        });
    });
</script>
</body>
</html>
