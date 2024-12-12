jQuery(document).ready(function($) {
    var frame;

    $('#upload-photo-button').on('click', function(e) {
        e.preventDefault();

       
        if (frame) {
            frame.open();
            return;
        }

        frame = wp.media({
            title: 'Choisir une image',
            button: {
                text: 'Utiliser cette image'
            },
            multiple: false
        });

       
        frame.on('select', function() {
            var attachment = frame.state().get('selection').first().toJSON();

            
            $('#photo').val(attachment.url);

           
            $('#photo-preview').html('<img src="' + attachment.url + '" style="max-width:100%; height:auto;">');
        });

        
        frame.open();
    });
});

jQuery(document).ready(function($) {
    $('.grid-conseillers').slick({
        infinite: true,
        slidesToShow: 3,  
        slidesToScroll: 1,
        dots: true,       
        arrows: true,     
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