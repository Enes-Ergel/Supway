jQuery(document).ready(function($) {
    $('.grid-conseillers').slick({
        infinite: true,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        useCSS:  true, 
        dots: true, 
        useTransform: true,
        touchMove: true,
        focusOnChange: true,
        arrows: true,
        speed: 1000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 1,
                  infinite: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                 slidesToShow: 2,
                 dots: true
                }
            }
        ]
    });
});
