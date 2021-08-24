(function ($){
    'use strict';

    const header = $('#header')

    function header_sticky() {
        if ($(window).scrollTop() > 100) {
            header.addClass("sticky")
        } else {
            header.removeClass("sticky")
        }
    }

    $(window).scroll(function () {
        header_sticky()
    })

    $(document).ready(function ($) {
        //new WOW().init()

        $('.sliders').slick()

        $(document).ready(function ($) {
            header_sticky()
        })

        $('.header__toogle').click(function(event) {
            event.preventDefault()
            $(this).toggleClass('active')
            header.toggleClass('shown-nav')
        })

        $('.menu > .menu-item-has-children').append('<span class="toogle-sub-menu"></span>')

        $('.menu > .menu-item-has-children').on('click', '.toogle-sub-menu', function(event) {
            event.preventDefault()
            let parent = $(this).parent('.menu-item-has-children')
            parent.toggleClass('shown-sub').find('> .sub-menu').slideToggle()
        })

        $('.video-has-thumbnail').click(function(event) {
            let video = $(this).find('iframe')
            let url_video = video[0].src.indexOf("?") > -1 ? "&" : "?"
            video[0].src += url_video + "autoplay=1"
            $(this).find('img').remove()
            $(this).find('svg').remove()
        })

        const testimonials_list = $('.testimonials__list').slick({
            'slidesToShow': 1,
            'slidesToScroll': 1,
            'dots': true,
            'arrows': false,
            "responsive": [{
                "breakpoint": 768,
                "settings": {
                    "adaptiveHeight": true
                }
            }]
        })

        $('.testimonials__thumbnail > .testimonials__thumbnail--item').click(function() {
            $('.testimonials__list').slick('slickGoTo',$(this).index());
        })

        $('.testimonials__thumbnail > .testimonials__thumbnail--item').eq(0).addClass('active')

        testimonials_list.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            let mySlideNumber = nextSlide
            $('.testimonials__thumbnail > .testimonials__thumbnail--item').removeClass('active')
            $('.testimonials__thumbnail > .testimonials__thumbnail--item').eq(mySlideNumber).addClass('active')
        })

        $( '.post-collapse__item' ).hover(function() {
            if ( ! $(this).hasClass('active') ) {
                let parent = $(this).parent('.post-collapse__inner')
                parent.find('.post-collapse__item').removeClass('active')
                $(this).addClass('active')
            }
        })

        const gallery = new Swiper('.el-gallery__inner', {
            effect: 'coverflow',
            slidesPerView: 1/2 + 1 + 1/2,
            centeredSlides: true,
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 0,
                modifier: 1,
                slideShadows: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                767: {
                    slidesPerView: 3,
                }
            }
        })
    })
})(jQuery)