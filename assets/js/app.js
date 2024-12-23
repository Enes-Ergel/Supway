document.addEventListener("DOMContentLoaded", function () {
    // Variables globales pour le suivi des questions et réponses
    let currentQuestion = 1;
    const totalQuestions = document.querySelectorAll(".quiz-question").length;
    let answers = {};

    // Initialisation du quiz
    function initQuiz() {
        // Cache toutes les questions sauf la première
        document.querySelectorAll(".quiz-question").forEach((question, index) => {
            question.style.display = index === 0 ? "block" : "none";
        });
        setupCustomRadios();
        updateCounter();
        updateNavigation();
    }

    // Configuration des zones de réponse personnalisées
    function setupCustomRadios() {
        document.querySelectorAll('.reponses').forEach(label => {
            // Cache les boutons radio natifs
            const radio = label.querySelector('input[type="radio"]');
            if (radio) {
                radio.style.opacity = '0';
                radio.style.position = 'absolute';
            }

            // Ajoute l'événement de clic sur toute la zone
            label.addEventListener('click', function() {
                if (radio) {
                    radio.checked = true;
                    // Met à jour la classe active pour le style
                    document.querySelectorAll(`input[name="${radio.name}"]`).forEach(r => {
                        r.closest('.reponses').classList.remove('active');
                    });
                    this.classList.add('active');
                }
            });
        });
    }

    // Mise à jour du compteur de questions
    function updateCounter() {
        const counter = document.getElementById("question-counter");
        if (counter) {
            counter.textContent = `${currentQuestion}/${totalQuestions}`;
        }
    }

    // Gestion de l'affichage des boutons de navigation
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

    // Affichage d'une question spécifique
    function showQuestion(questionNumber) {
        if (questionNumber < 1 || questionNumber > totalQuestions) return;

        // Cache la question actuelle et affiche la nouvelle
        document.querySelector(`#question-${currentQuestion}`).style.display = "none";
        currentQuestion = questionNumber;
        document.querySelector(`#question-${currentQuestion}`).style.display = "block";
        
        // Restaure la réponse précédente si elle existe
        if (answers[`question-${currentQuestion}`]) {
            const savedAnswer = document.querySelector(`input[name="question-${currentQuestion}"][value="${answers[`question-${currentQuestion}`]}"]`);
            if (savedAnswer) {
                savedAnswer.checked = true;
                savedAnswer.closest('.reponses').classList.add('active');
            }
        }

        updateCounter();
        updateNavigation();
    }

    // Gestion de la navigation
    const nextButton = document.getElementById("next-question");
    if (nextButton) {
        nextButton.addEventListener("click", () => {
            const currentInput = document.querySelector(`input[name="question-${currentQuestion}"]:checked`);
            if (currentInput) {
                // Sauvegarde la réponse
                answers[`question-${currentQuestion}`] = currentInput.value;
                showQuestion(currentQuestion + 1);
            } else {
                alert("Veuillez sélectionner une réponse avant de continuer.");
            }
        });
    }

    const prevButton = document.getElementById("prev-question");
    if (prevButton) {
        prevButton.addEventListener("click", () => {
            showQuestion(currentQuestion - 1);
        });
    }

    // Gestion de la soumission du quiz
    const quizForm = document.getElementById("orientation-quiz-form");
    if (quizForm) {
        quizForm.addEventListener("submit", function(e) {
            e.preventDefault();
            
            // Sauvegarde de la dernière réponse avant la soumission
            const currentInput = document.querySelector(`input[name="question-${currentQuestion}"]:checked`);
            if (currentInput) {
                answers[`question-${currentQuestion}`] = currentInput.value;
            }

            // Vérifie que toutes les questions ont une réponse
            const answeredQuestions = Object.keys(answers).length;
            if (answeredQuestions < totalQuestions) {
                alert(`Veuillez répondre à toutes les questions (${answeredQuestions}/${totalQuestions} répondues).`);
                return;
            }

            // Calcul des résultats
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

            // Détermine le domaine dominant
            const dominantDomain = Object.entries(results).reduce((a, b) => 
                results[a[0]] > results[b[0]] ? a : b
            )[0];

            displayResults(dominantDomain, results);
        });
    }

    // Affichage des résultats
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

    // Démarrage du quiz
    initQuiz();
});

