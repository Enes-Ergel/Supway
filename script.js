
/*jQuery(document).ready(function($) {
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
}); */

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





document.addEventListener('DOMContentLoaded', () => {
  const slider = document.querySelector('.grid-conseillers'); // Selecciona el contenedor del slider
  if (slider) {
    let isDown = false; // Estado del mouse (presionado o no)
    let startX; // Posición inicial del mouse
    let scrollLeft; // Posición inicial del scroll

    // Cuando se presiona el mouse
    slider.addEventListener('mousedown', (e) => {
      isDown = true;
      slider.classList.add('active');
      startX = e.pageX - slider.offsetLeft;
      scrollLeft = slider.scrollLeft;
    });

    // Cuando el mouse sale del slider
    slider.addEventListener('mouseleave', () => {
      isDown = false;
      slider.classList.remove('active');
    });

    // Cuando se suelta el mouse
    slider.addEventListener('mouseup', () => {
      isDown = false;
      slider.classList.remove('active');
    });

    // Movimiento del mouse
    slider.addEventListener('mousemove', (e) => {
      if (!isDown) return; // Si no está presionado, no hacer nada
      e.preventDefault();
      const x = e.pageX - slider.offsetLeft;
      const walk = (x - startX) * 2; // Velocidad del desplazamiento
      slider.scrollLeft = scrollLeft - walk;
    });
  }
});

