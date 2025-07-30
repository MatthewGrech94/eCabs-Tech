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

    $('.owl-carousel').on('initialized.owl.carousel', function(event) {
      setTimeout(() => {
          owlCarouselNavSpacing();
        }, 50);
    });


    $('.testimonials-carousel').owlCarousel({
        loop: true,
        nav: true,
        dots: true,
        margin: 50,
        items: 1,
        navText: [
            '<i class="fa-solid fa-chevron-left"></i>',
            '<i class="fa-solid fa-chevron-right"></i>'
        ],
    });

    function owlCarouselNavSpacing() {

        let owlDotCount = $('.owl-carousel .owl-dots .owl-dot').length;

        let spacing = (10 * owlDotCount) + 30;

        $('.owl-carousel .owl-nav').css('gap', spacing + 'px');
    }
});