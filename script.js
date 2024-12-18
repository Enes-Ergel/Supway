
jQuery(document).ready(function($) {
    $('.grid-conseillers').slick({
        infinite: true,
        mobileFirst: true,
        slidesToShow: 1,  
        slidesToScroll: 1,
        spaceBetween: 80,
        useCSS:  true, 
        dots: true, 
        useTransform: true,
        touchMove: true,
        focusOnChange: true,
        variableWidth: false,
        arrows: true,  
        speed: 1000,   
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  infinite: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                 slidesToShow: 1,
                 slidesToScroll: 1,
                 dots: true
                }
            }
        ]
    });
});

const carousel = document.querySelector(".carousel");
firstslide = carousel.querySelector(".grid-conseillers .conseiller") [0];
arrowsIcons = document.querySelector(".carousel i")

let firstslideWidth = firstslide.clientWidth + 14;
let scrollWidth = carousel.scrollWidth - carousel.clientWidth; 

const showHideIcons = () => {
  arrowIcons[0].style.display = carousel.scrollLeft == 0 ? "none" : "block";
  arrowIcons[1].style.display = carousel.scrollLeft == scrollWidth ? "none" : "block";
}

arrowIcons.forEach (icon => {
icon.addEventListener("click",() => {
  if(icon.id == "left") {
    carousel.scrollLeft -= firstSlideWidth;
    
  } else {
    carousel.scrollLeft += firstSlideWidth;
  }
                       
 showHideIcons(); 
   })

});

