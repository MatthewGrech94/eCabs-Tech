jQuery(document).ready(function($) {

    $('header').find('.burger-menu').on("click", function(){
        $('header .burger-menu, header .main-nav').toggleClass('opened');
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