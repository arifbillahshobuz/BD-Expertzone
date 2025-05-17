/*
Version: 5.2.0
Template: SocialV - Responsive Bootstrap 5 Admin Dashboard Template
Author: iqonicthemes.in
Design and Developed by: iqonicthemes.in
NOTE: This file contains the styling for responsive Template.
*/

/*----------------------------------------------
Index Of Script
------------------------------------------------
:: Vertical Slider

------------------------------------------------
Index Of Script
----------------------------------------------*/

/*---------------------------------------------------------------------
    Vertical Slider
-----------------------------------------------------------------------*/
(function () {
    "use strict";

    if (document.querySelectorAll('.slider__thumbs .swiper-container').length) {
        const sliderThumbsOptions = {
            direction: 'vertical',
            slidesPerView: 4,
            spaceBetween: 24,
            slideToClickedSlide: true,
            loop: true,
            loopedSlides: 5,
            navigation: {
                nextEl: '.slider__next',
                prevEl: '.slider__prev'
            },
            breakpoints: {
                0: {
                    direction: 'horizontal',
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                768: {
                    direction: 'vertical',
                    slidesPerView: 4,
                }
            }
        }
        const sliderImagesOptions = {
            direction: 'vertical',
            slidesPerView: 1,
            spaceBetween: 32,
            loop: true,
            loopedSlides: 5,
            mousewheel: true,
            navigation: {
                nextEl: '.slider__next',
                prevEl: '.slider__prev'
            },
            grabCursor: true,
            breakpoints: {
                0: {
                    direction: 'horizontal',

                },
                768: {
                    direction: 'vertical',
                }
            }
        }
        let sliderThumbs = new Swiper('.slider__thumbs .swiper-container', sliderThumbsOptions);
        let sliderImages = new Swiper('.slider__images .swiper-container', sliderImagesOptions);
        sliderThumbs.controller.control = sliderImages;
        sliderImages.controller.control = sliderThumbs;
        document.addEventListener('theme_scheme_direction', (e) => {
            sliderImages.destroy(true, true)
            setTimeout(() => {
                sliderThumbs = new Swiper('.slider__thumbs .swiper-container', sliderThumbsOptions);
                sliderImages = new Swiper('.slider__images .swiper-container', sliderImagesOptions);
                sliderThumbs.controller.control = sliderImages;
                sliderImages.controller.control = sliderThumbs;
            }, 500);
        })
    }

    const valuesNode = [
        document.getElementById('lower-value'), // 0
        document.getElementById('upper-value')  // 1
    ];
    window.addEventListener('load', function () {
        if (window['product-price-range']) {
            window['product-price-range'].on('update', function (values, handle, unencoded, isTap, positions) {
                valuesNode[handle].innerHTML = '$' + Number(values[handle]).toFixed(0);
            });
        }
        const pageType = IQUtils.getQueryString('type')
        switch (pageType) {
            case 'product-grid':
                $('.breadcrumb-title small').text('Product Grid View');
                $('.sidebar .product-grid').addClass('active').parent().addClass('active')
                $('.sidebar .product-grid').closest('.collapse').addClass('show').prev().attr('aria-expanded', true).parent().addClass('active')
                $('#grid-view-tab').tab('show')
                break;
            case 'product-list':
                $('.breadcrumb-title small').text('Product List View');
                $('.sidebar .product-list').addClass('active').parent().addClass('active')
                $('.sidebar .product-list').closest('.collapse').addClass('show').prev().attr('aria-expanded', true).parent().addClass('active')
                $('#list-view-tab').tab('show')
                break;
            default:
                break;
        }
    })

})();