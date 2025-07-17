(function($){
  "use strict";
  $('.document').ready(function() {
    $('.slider__thumbnails--item').click(function(){
      const slickIndex = $(this).data('slick-index');
      $('.slider__thumbnails--item').removeClass('active');
      $('.slider__content').slick('slickGoTo', slickIndex);
      $(this).addClass('active');
    });

    // set active thumbnail when slider changes
    $('.slider__content').on('afterChange', function(event, slick, currentSlide){
      $('.slider__thumbnails--item').removeClass('active');
      $('.slider__thumbnails--item[data-slick-index="' + currentSlide + '"]').addClass('active');
    });

  });
})(jQuery)