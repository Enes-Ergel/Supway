


    let activeQuestion = 1;
    const nextButton = document.getElementById("next-question");
    const prevButton = document.getElementById("prev-question");

    const showCurrentQuestion = function () {
        $('.quiz-question').addClass('hidden');
        document.getElementById(`question-${activeQuestion}`).classList.remove('hidden');
    }

    const setDisableBtn = function () {
        prevButton.removeAttribute("disabled")
        nextButton.removeAttribute("disabled")
        if (activeQuestion === 1) {
            prevButton.setAttribute("disabled", "");
        }
        if (activeQuestion === totalQuestionsCount) {
            nextButton.setAttribute("disabled", "");
        }
    }

    const init = function() {
        showCurrentQuestion();
        setDisableBtn();
    }
    

    init();

    nextButton.addEventListener("click", (event) => {
        console.log({ event, totalQuestionsCount })
        activeQuestion++;
        showCurrentQuestion();
        setDisableBtn();
        // nextButton.innerHTML = `Nombre de clics : ${event.detail}`;
    });
    prevButton.addEventListener("click", (event) => {
        console.log({ event, totalQuestionsCount })
        activeQuestion--;
        showCurrentQuestion();
        setDisableBtn();
        // nextButton.innerHTML = `Nombre de clics : ${event.detail}`;
    });

    $(`reponses`).click((event) => {
        console.log({ event })
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


