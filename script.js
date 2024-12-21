let activeQuestion = 1;
const nextButton = document.getElementById("next-question");
const prevButton = document.getElementById("prev-question");
//const totalQuestionsCount = <?= $questionsCount; ?>; // Nombre total de questions

// Fonction pour afficher la question active
const showCurrentQuestion = function () {
    $('.quiz-question').addClass('hidden'); // Masquer toutes les questions
    document.getElementById(`question-${activeQuestion}`).classList.remove('hidden'); // Afficher la question active
}

// Fonction pour activer/désactiver les boutons suivant et précédent
const setDisableBtn = function () {
    prevButton.removeAttribute("disabled");
    nextButton.removeAttribute("disabled");

    // Désactiver le bouton "Précédent" si on est à la première question
    if (activeQuestion === 1) {
        prevButton.setAttribute("disabled", "");
    }

    // Désactiver le bouton "Suivant" si on est à la dernière question
    if (activeQuestion === totalQuestionsCount) {
        nextButton.setAttribute("disabled", "");
    }
}

// Fonction d'initialisation
const init = function() {
    showCurrentQuestion();
    setDisableBtn();
}

init(); // Initialisation du quiz

// Écouteur d'événement pour le bouton "Suivant"
nextButton.addEventListener("click", (event) => {
    activeQuestion++; // Passer à la question suivante
    showCurrentQuestion();
    setDisableBtn();
});

// Écouteur d'événement pour le bouton "Précédent"
prevButton.addEventListener("click", (event) => {
    activeQuestion--; // Revenir à la question précédente
    showCurrentQuestion();
    setDisableBtn();
});

// Capture des réponses à chaque clic sur une option
$(".reponses input").click(function(event) {
    const questionId = $(this).attr('name'); // Récupérer le nom de la question
    const answerValue = $(this).val(); // Récupérer la valeur de la réponse sélectionnée

    // Envoyer la réponse de manière dynamique via AJAX ou mettre à jour une variable en JavaScript
    console.log(`Question: ${questionId}, Réponse: ${answerValue}`);
});

   

    // jQuery(document).ready(function($) {
    //     const setNextQuestion = function () {
    //         console.log('jesaispas ____')
    //         let currentQuestion = $(this).closest('.quiz-question');
    //         let nextQuestion = currentQuestion.next('.quiz-question');

    //         console.log({ nextQuestion })
        
    //         if (nextQuestion.length === 0) return;
    //         currentQuestion.hide(); 
    //         nextQuestion.show(); 
    //     }

    //     let currentQuestion = 1; // La question actuelle (1-based)
    //     const totalQuestions = $(".quiz-question").length; // Nombre total de questions
    
    //     // Fonction pour mettre à jour l'affichage des questions
    //     function updateQuiz() {
    //         $(".quiz-question").hide(); // Masquer toutes les questions
    //         $(`#question-${currentQuestion}`).show(); // Afficher uniquement la question actuelle
    
    //         // Activer/désactiver les boutons
    //         $("#prev-question").prop("disabled", currentQuestion === 1);
    //         $("#next-question").text(currentQuestion === totalQuestions ? "Terminer" : "Suivant");
    //     }
    
    //     // Bouton "Suivant"
    //     $("#next-question").click(function() {
    //         if (currentQuestion < totalQuestions) {
    //             currentQuestion++;
    //             updateQuiz();
    //         } else {
    //             alert("Quiz terminé !");
    //         }
    //         setNextQuestion();
    //     });
    
    //     // Bouton "Précédent"
    //     $("#prev-question").click(function() {
    //         if (currentQuestion > 1) {
    //             currentQuestion--;
    //             updateQuiz();
    //         }
    //     });
    
    //     // Initialiser le quiz
    //     updateQuiz();
    // });
    // $('.quiz-question input[type="radio"]').on('change', function () {
    //     console.log({ TEST: $(this).closest('.quiz-question').find('.next').prop('disabled', false) })
    //     $(this).closest('.quiz-question').find('.next').prop('disabled', false);
    // });
    
     
    // //   $('.next-question').on('click', function () {
    // //     console.log({  })
    // //     let currentQuestion = $(this).closest('.quiz-question');
    // //     let nextQuestion = currentQuestion.next('.quiz-question');
    
    // //     if (nextQuestion.length) {
    // //       currentQuestion.hide(); 
    // //       nextQuestion.show();       
    // //     }
    // //   });






