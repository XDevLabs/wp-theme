(function ($){
    'use strict';

    $(document).ready(function ($) {
        $('.header__toggle').click(function(event) {
            event.preventDefault()
            $(this).toggleClass('active')
            $('.header').toggleClass('shown-nav')
        })

        $('.main-navigation .menu-item-has-children').append('<span class="toggle-sub-menu"></span>')

        $('.main-navigation .menu-item-has-children').on('click', '> .toggle-sub-menu', function(event) {
            event.preventDefault()
            let parent = $(this).closest('.menu-item-has-children')
            parent.toggleClass('shown-sub')
        })
    })
})(jQuery)