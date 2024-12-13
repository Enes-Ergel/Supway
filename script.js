
/*
jQuery(document).ready(function($) {
    $('.grid-conseillers').slick({
        infinite: true,
        slidesToShow: 1,  
        slidesToScroll: 1,
        dots: true,       
        arrows: true,  
        speed: 1000,   
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
});
*/

jQuery(document).ready(function($) { 
$('.grid-conseillers').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
  });
  $('.grid-conseillers').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: true,
    centerMode: true,
    focusOnSelect: true
  });
});
