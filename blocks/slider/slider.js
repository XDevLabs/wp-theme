(function($){
  "use strict";
  $('.document').ready(function() {
    $('.slider__thumbnails--item').click(function(){
      const slickIndex = $(this).data('slick-index');
      $('.slider__thumbnails--item').removeClass('active');
      $('.slider__content').slick('slickGoTo', slickIndex);
      $(this).addClass('active');
    })
  });
})(jQuery)