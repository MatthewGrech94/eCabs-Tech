jQuery(document).ready(function($) {

    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 0) {
          $("header").addClass("scrolled");
        } else {
          $("header").removeClass("scrolled");
        }
      });

    // Scroll to class event
    $('[scroll-to]').on('click', function(e) {
      e.preventDefault();
  
      const target = $(this).attr('scroll-to');

      if (target === 'top') {
        $('html, body').animate({ scrollTop: 0 }, 600);
      } else {

        const $target = $('.' + target).first();
        
        if ($target.length) {
          $('html, body').animate({
            scrollTop: $target.offset().top
          }, 600);
        }
      }
    });
});