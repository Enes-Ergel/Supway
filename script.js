
   
    jQuery(document).ready(function($) {
        $('.grid-conseillers').slick({
            infinite: true,
            slidesToShow: 3,  // Número de conseillers visibles
            slidesToScroll: 1,
            dots: true,       // Activar los puntos de navegación
            arrows: true,     // Flechas para navegar
            autoplay: true,   // Deslizar automáticamente
            autoplaySpeed: 3000, // Velocidad del autoplay
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
});

