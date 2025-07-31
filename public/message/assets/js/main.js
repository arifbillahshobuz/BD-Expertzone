$(function () {

    "use strict";

    // Favourute user Slider
    $('.favourite_user_slider').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 4000,
        dots: false,
        arrows: true,
        nextArrow: '<i class="far fa-angle-right nextArrow"></i>',
        prevArrow: '<i class="far fa-angle-left prevArrow"></i>',

        responsive: [
            {
                breakpoint: 1600,
                settings: {
                    slidesToShow: 5,
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 7,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 4,
                }
            }
        ]
    });


    // sidebar search
    $(".input").on("click", function () {
        $(".wsus__user_list").toggleClass("show_search_list");
    });

    $('body').on("click", function (event) {
        if ($(".wsus__user_list").hasClass("show_search_list")) {
            if (!$(event.target).closest('.wsus__user_list').length) {
                $(".wsus__user_list").removeClass("show_search_list");
            }
        }
    });

    // user list on click add class
    $('.wsus__user_list_area .wsus__user_list_item').click(function () {
        $(".wsus__user_list_area .wsus__user_list_item").removeClass("active");
        $(this).addClass("active");
    });


    // emoji js
    $(document).ready(function () {
        $("#example1").emojioneArea();
    });


    // user info (Right sidebar)
    $(".info").on("click", function () {
        $(".wsus__chat_app").toggleClass("show_info");
    });

    $(".user_info_close").on("click", function () {
        $(".wsus__chat_app").addClass("show_info");
    });


    // mobile device change interface
    $(".wsus__favourite_item").on("click", function () {
        $(".wsus__chat_app").addClass("show_small_chat");
    });

    $(".wsus__user_list_item").on("click", function () {
        $(".wsus__chat_app").addClass("show_small_chat");
    });

    $(".back_to_list").on("click", function () {
        $(".wsus__chat_app").removeClass("show_small_chat");
    });

    $(".header_right .info").on("click", function () {
        $(".wsus__chat_app").addClass("show_small_info");
    });

    $(".user_info_close").on("click", function () {
        $(".wsus__chat_app").removeClass("show_small_info");
    });

    // mobile device change interface (Save message)
    $(".wsus__save_message_center").on("click", function () {
        $(".wsus__chat_app").addClass("show_small_chat");
    });


});
