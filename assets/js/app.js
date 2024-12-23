document.addEventListener("DOMContentLoaded", function () {
    // Initialisation des variables
    let currentQuestion = 1;
    const totalQuestions = document.querySelectorAll(".quiz-question").length;
    let answers = {};

    // Initialiser l'affichage
    function initQuiz() {
        document.querySelectorAll(".quiz-question").forEach((question, index) => {
            question.style.display = index === 0 ? "block" : "none";
        });
        updateCounter();
        updateNavigation();
    }

    // Mettre à jour le compteur de questions
    function updateCounter() {
        const counter = document.getElementById("question-counter");
        if (counter) {
            counter.textContent = `${currentQuestion}/${totalQuestions}`;
        }
    }

    // Mettre à jour la navigation
    function updateNavigation() {
        const prevButton = document.getElementById("prev-question");
        const nextButton = document.getElementById("next-question");
        const submitButton = document.getElementById("submit-quiz");

        if (prevButton) {
            prevButton.style.display = currentQuestion === 1 ? "none" : "inline-block";
        }
        if (nextButton) {
            nextButton.style.display = currentQuestion === totalQuestions ? "none" : "inline-block";
        }
        if (submitButton) {
            submitButton.style.display = currentQuestion === totalQuestions ? "inline-block" : "none";
        }
    }

    // Afficher une question spécifique
    function showQuestion(questionNumber) {
        if (questionNumber < 1 || questionNumber > totalQuestions) return;

        document.querySelector(`#question-${currentQuestion}`).style.display = "none";
        currentQuestion = questionNumber;
        document.querySelector(`#question-${currentQuestion}`).style.display = "block";
        
        // Restaurer la réponse précédente si elle existe
        if (answers[`question-${currentQuestion}`]) {
            const savedAnswer = document.querySelector(`input[name="question-${currentQuestion}"][value="${answers[`question-${currentQuestion}`]}"]`);
            if (savedAnswer) {
                savedAnswer.checked = true;
            }
        }

        updateCounter();
        updateNavigation();
    }

    // Gérer la navigation entre les questions
    if (document.getElementById("next-question")) {
        document.getElementById("next-question").addEventListener("click", () => {
            const currentInput = document.querySelector(`input[name="question-${currentQuestion}"]:checked`);
            if (currentInput) {
                answers[`question-${currentQuestion}`] = currentInput.value;
                showQuestion(currentQuestion + 1);
            } else {
                alert("Veuillez sélectionner une réponse avant de continuer.");
            }
        });
    }

    if (document.getElementById("prev-question")) {
        document.getElementById("prev-question").addEventListener("click", () => {
            showQuestion(currentQuestion - 1);
        });
    }

    // Gérer la soumission du quiz
    const quizForm = document.getElementById("orientation-quiz-form");
    if (quizForm) {
        quizForm.addEventListener("submit", function(e) {
            e.preventDefault();
            
            // Vérifier que toutes les questions ont une réponse
            let allAnswered = true;
            for (let i = 1; i <= totalQuestions; i++) {
                if (!answers[`question-${i}`]) {
                    allAnswered = false;
                    break;
                }
            }

            if (!allAnswered) {
                alert("Veuillez répondre à toutes les questions avant de soumettre.");
                return;
            }

            // Calculer les résultats
            const results = {
                Science: 0,
                Social: 0,
                Art: 0,
                Technique: 0
            };

            Object.values(answers).forEach(answer => {
                if (results.hasOwnProperty(answer)) {
                    results[answer]++;
                }
            });

            // Trouver le domaine dominant
            const dominantDomain = Object.entries(results).reduce((a, b) => 
                results[a[0]] > results[b[0]] ? a : b
            )[0];

            displayResults(dominantDomain, results);
        });
    }

    // Afficher les résultats
    function displayResults(dominantDomain, results) {
        const resultsContainer = document.getElementById("quiz-results");
        if (!resultsContainer) return;

        const messages = {
            Science: "Vous excellez dans le domaine scientifique ! Les études en sciences, mathématiques ou recherche pourraient vous convenir.",
            Social: "Vous êtes fait pour les sciences humaines et sociales ! Considérez des études en psychologie, sociologie ou travail social.",
            Art: "Vous avez un talent artistique incroyable ! Les écoles d'art, de design ou d'architecture pourraient vous intéresser.",
            Technique: "Le domaine technique est fait pour vous ! L'ingénierie, l'informatique ou les études techniques seraient appropriées."
        };

        resultsContainer.innerHTML = `
            <h3>Vos résultats</h3>
            <p class="result-message">${messages[dominantDomain]}</p>
            <div class="results-breakdown">
                <h4>Répartition de vos réponses:</h4>
                <ul>
                    ${Object.entries(results).map(([domain, count]) => `
                        <li>${domain}: ${count} réponses (${Math.round(count/totalQuestions*100)}%)</li>
                    `).join('')}
                </ul>
            </div>
        `;
        
        resultsContainer.style.display = "block";
        document.getElementById("quiz-container").style.display = "none";
        document.getElementById("quiz-navigation").style.display = "none";
    }

    // Initialiser le quiz
    initQuiz();
});

