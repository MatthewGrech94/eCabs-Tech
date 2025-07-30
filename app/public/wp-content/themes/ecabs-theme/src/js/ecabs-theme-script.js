jQuery(document).ready(function($) {

  $('header').find('.burger-menu').on("click", function(){
    $('header .burger-menu, header .main-nav, header').toggleClass('opened');
  });

  $('.mobile-overlay').on("click", function(){
    $('header .burger-menu, header .main-nav, header').toggleClass('opened');
  });

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
      const headerHeight = $('header.main-header').height();

      if (target === 'top') {
        $('html, body').animate({ scrollTop: 0 }, 600);
      } else {

        const $target = $('.' + target).first();
        
        if ($target.length) {
          $('html, body').animate({
            scrollTop: $target.offset().top - headerHeight
          }, 600);
        }
      }
    });
});