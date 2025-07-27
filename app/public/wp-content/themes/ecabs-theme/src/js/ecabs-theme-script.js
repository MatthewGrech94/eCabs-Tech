jQuery(document).ready(function($) {
    $('[scroll-to]').on('click', function(e) {
      e.preventDefault();
  
      const targetClass = $(this).attr('scroll-to');
      const $target = $('.' + targetClass).first();
  
      if ($target.length) {
        $('html, body').animate({
          scrollTop: $target.offset().top - 30
        }, 600);
      }
    });
  });