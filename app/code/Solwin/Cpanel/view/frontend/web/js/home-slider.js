require(['jquery', 'cpowlcarousel'], function ($) {
    $(document).ready(function () {
        $(".hb-slider").owlCarousel({
            items: 1,
            itemsDesktop: [1080, 1],
            itemsDesktopSmall: [860, 1],
            itemsTablet: [768, 1],
            itemsTabletSmall: [639, 1],
            itemsMobile: [360, 1],
            pagination: true,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'>"],
            navigation: false,
        });

        $(".hpb-slider").owlCarousel({
            items: 3,
            itemsDesktop: [1080, 3],
            itemsDesktopSmall: [860, 3],
            itemsTablet: [768, 2],
            itemsTabletSmall: [639, 2],
            itemsMobile: [479, 1],
            pagination: false,
            navigationText: ['<div class="lft-btn"><i class="fa fa-angle-left"></i></div>', '<div class="rgt-btn"><i class="fa fa-angle-right"></div>'],
            navigation: true,
        });
        $(".htb-slider").owlCarousel({
            items: 1,
            itemsDesktop: [1080, 1],
            itemsDesktopSmall: [860, 1],
            itemsTablet: [768, 1],
            itemsTabletSmall: [639, 1],
            itemsMobile: [479, 1],
            pagination: false,
            navigationText: ['<div class="lft-btn"><i class="fa fa-angle-left"></i></div>', '<div class="rgt-btn"><i class="fa fa-angle-right"></div>'],
            navigation: true,
        });
        $(".hbr-slider").owlCarousel({
            items: 5,
            itemsDesktop: [1080, 4],
            itemsDesktopSmall: [860, 3],
            itemsTablet: [768, 3],
            itemsTabletSmall: [639, 3],
            itemsMobile: [479, 2],
            pagination: false,
            navigationText: ['<div class="lft-btn"><i class="fa fa-angle-left"></i></div>', '<div class="rgt-btn"><i class="fa fa-angle-right"></div>'],
            navigation: true,
        });
    });

 /*   var porto_config = {
    paths: {
        'parallax': 'js/jquery.parallax.min',
        'owlcarousel': 'owl.carousel/owl.carousel',
        'owlcarousel_thumbs': 'owl.carousel/owl.carousel2.thumbs',
        'imagesloaded': 'Smartwave_Porto/js/imagesloaded',
        'packery': 'Smartwave_Porto/js/packery.pkgd',
        'floatelement': 'js/jquery.floatelement'
    },
    shim: {
        'parallax': {
            deps: ['jquery']
        },
        'owlcarousel': {
            deps: ['jquery']
        },
        'owlcarousel_thumbs': {
            deps: ['jquery', 'owlcarousel']
        },
        'packery': {
            deps: ['jquery', 'imagesloaded']
        },
        'floatelement': {
            deps: ['jquery']
        }
    }
};
require.config(porto_config);;*/
require(['jquery'], function($) {
            $(document).ready(function() {
                $(".drop-menu > a").off("click").on("click", function() {
                    if ($(this).parent().children(".nav-sections").hasClass("visible")) {
                        $(this).parent().children(".nav-sections").removeClass("visible");
                        $(this).removeClass("active");
                    } else {
                        $(this).parent().children(".nav-sections").addClass("visible");
                        $(this).addClass("active");
                    }
                });
            });
    var scrolled = false;
    $(window).scroll(function() {
        if (!$('.page-header').hasClass('type10')) {
            if ($(window).width() >= 768) {
                if (160 < $(window).scrollTop() && !scrolled) {
                    $('.page-header:not(.sticky-header)').css("height", $('.page-header:not(.sticky-header)').height() + 'px');
                    $('.page-header').addClass("sticky-header");
                    scrolled = true;
                    if ((!$(".page-header").hasClass("type12")) && (!$(".page-header").hasClass("type23")) && (!$(".page-header").hasClass("type25")) && (!$(".page-header").hasClass("type26"))) {
                        $('.page-header .minicart-wrapper').after('<div class="minicart-place hide"></div>');
                        if ($(".page-header").hasClass("type2"))
                            $('.page-header .navigation').append($('header.page-header.type2 a.action.my-wishlist').detach());
                        var minicart = $('.page-header .minicart-wrapper').detach();
                        if ($(".page-header").hasClass("type8"))
                            $('.page-header .menu-wrapper').append(minicart);
                        else
                            $('.page-header .navigation').append(minicart);
                        var logo_image = $('<div>').append($('.page-header .header > .logo').clone()).html();
                        if ($(".page-header").hasClass("type27"))
                            logo_image = $('<div>').append($('.page-header .header .header-main-left > .logo').clone()).html();
                        if ($(".page-header").hasClass("type8"))
                            $('.page-header .menu-wrapper').prepend('<div class="sticky-logo">' + logo_image + '</div>');
                        else
                            $('.page-header .navigation').prepend('<div class="sticky-logo">' + logo_image + '</div>');
                    } else {
                        $('.page-header.type12 .logo').append('<span class="sticky-logo"><img src="" alt=""/></span>');
                        $('.page-header .logo > img').addClass("hide");
                    }
                }
                if (160 >= $(window).scrollTop() && scrolled) {
                    $('.page-header.sticky-header').css("height", 'auto');
                    $('.page-header').removeClass("sticky-header");
                    scrolled = false;
                    if ((!$(".page-header").hasClass("type12")) && (!$(".page-header").hasClass("type23")) && (!$(".page-header").hasClass("type25")) && (!$(".page-header").hasClass("type26"))) {
                        var minicart;
                        if ($(".page-header").hasClass("type8"))
                            minicart = $('.page-header .menu-wrapper .minicart-wrapper').detach();
                        else
                            minicart = $('.page-header .navigation .minicart-wrapper').detach();
                        $('.minicart-place').after(minicart);
                        $('.minicart-place').remove();
                        if ($(".page-header").hasClass("type2"))
                            $('.page-header .block.block-search').before($('.page-header .navigation a.action.my-wishlist').detach());
                        $('.page-header .minicart-wrapper-moved').addClass("minicart-wrapper").removeClass("minicart-wrapper-moved").removeClass("hide");
                    }
                    if ($(".page-header").hasClass("type8"))
                        $('.page-header .menu-wrapper > .sticky-logo').remove();
                    else if ($(".page-header").hasClass("type12")) {
                        $('.page-header .sticky-logo').remove();
                        $('.page-header .logo > img').removeClass("hide");;
                    } else
                        $('.page-header .navigation > .sticky-logo').remove();
                }
            }
        }
    });
});
