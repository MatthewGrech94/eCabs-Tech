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
  
      const targetClass = $(this).attr('scroll-to');
      const $target = $('.' + targetClass).first();
  
      if ($target.length) {
        $('html, body').animate({
          scrollTop: $target.offset().top - 30
        }, 600);
      }
    });
});