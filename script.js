
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
    jQuery(document).ready(function($) {
        let currentQuestion = 1; // La question actuelle (1-based)
        const totalQuestions = $(".quiz-question").length; // Nombre total de questions
    
        // Fonction pour mettre à jour l'affichage des questions
        function updateQuiz() {
            $(".quiz-question").hide(); // Masquer toutes les questions
            $(`#question-${currentQuestion}`).show(); // Afficher uniquement la question actuelle
    
            // Activer/désactiver les boutons
            $("#prev-question").prop("disabled", currentQuestion === 1);
            $("#next-question").text(currentQuestion === totalQuestions ? "Terminer" : "Suivant");
        }
    
        // Bouton "Suivant"
        $("#next-question").click(function() {
            if (currentQuestion < totalQuestions) {
                currentQuestion++;
                updateQuiz();
            } else {
                alert("Quiz terminé !");
            }
        });
    
        // Bouton "Précédent"
        $("#prev-question").click(function() {
            if (currentQuestion > 1) {
                currentQuestion--;
                updateQuiz();
            }
        });
    
        // Initialiser le quiz
        updateQuiz();
    });
});    