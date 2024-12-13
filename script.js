jQuery(document).ready(function($) {
    // Gestion de l'upload d'image
    let frame;

    $('#upload-photo-button').on('click', function(e) {
        e.preventDefault();

        // Si un frame existe déjà, l'ouvrir
        if (frame) {
            frame.open();
            return;
        }

        // Initialiser le frame WordPress Media
        frame = wp.media({
            title: 'Choisir une image',
            button: {
                text: 'Utiliser cette image'
            },
            multiple: false // Ne permettre qu'une seule image
        });

        // Lorsqu'une image est sélectionnée
        frame.on('select', function() {
            var attachment = frame.state().get('selection').first().toJSON();

            // Ajouter l'URL de l'image au champ d'entrée
            $('#photo').val(attachment.url);

            // Afficher un aperçu de l'image sélectionnée
            $('#photo-preview').html('<img src="' + attachment.url + '" style="max-width:100%; height:auto;">');
        });

        // Ouvrir le frame
        frame.open();
    });
   
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

