<?php /* Template Name: Quiz Page */ get_header(); ?>

<div class="container">
    <?php echo do_shortcode(the_content()); ?>
</div>
<?php
// Shortcode pour afficher le quiz d'orientation scolaire
//function orientation_quiz_shortcode() {
    ob_start();
    ?>
    <div id="orientation-quiz-container">
        <form id="orientation-quiz-form">
            <?php

            // Questions et choix associés aux domaines
            $questions = new WP_Query([
                'post_type' => 'quiz',
                'post_status' => 'publish'
            ]);          
            // $questions = [
            //     [
            //         "question" => "Qu'est-ce qui vous motive le plus dans vos études ?",
            //         "options" => [
            //             ["text" => "Comprendre comment les choses fonctionnent.", "domain" => "Science"],
            //             ["text" => "Aider les autres et résoudre leurs problèmes.", "domain" => "Social"],
            //             ["text" => "Concevoir ou imaginer des choses nouvelles.", "domain" => "Art"],
            //             ["text" => "Travailler sur des projets pratiques ou techniques.", "domain" => "Technique"]
            //         ]
            //     ],
            //     [
            //         "question" => "Quel type d'activité préférez-vous ?",
            //         "options" => [
            //             ["text" => "Réaliser des expériences ou analyser des données.", "domain" => "Science"],
            //             ["text" => "Interagir avec des personnes pour les conseiller.", "domain" => "Social"],
            //             ["text" => "Dessiner, écrire ou concevoir des œuvres.", "domain" => "Art"],
            //             ["text" => "Réparer ou fabriquer des objets.", "domain" => "Technique"]
            //         ]
            //     ],
            //     [
            //         "question" => "Comment aimez-vous résoudre un problème ?",
            //         "options" => [
            //             ["text" => "En utilisant des méthodes logiques ou scientifiques.", "domain" => "Science"],
            //             ["text" => "En comprenant les émotions et les besoins des autres.", "domain" => "Social"],
            //             ["text" => "En trouvant des solutions créatives ou originales.", "domain" => "Art"],
            //             ["text" => "En utilisant des outils ou des solutions techniques.", "domain" => "Technique"]
            //         ]
            //     ],
            //     [
            //         "question" => "Quel est votre environnement de travail préféré ?",
            //         "options" => [
            //             ["text" => "Un laboratoire ou un bureau avec beaucoup de données.", "domain" => "Science"],
            //             ["text" => "Un lieu où je peux interagir avec d'autres personnes.", "domain" => "Social"],
            //             ["text" => "Un atelier, un studio ou un espace créatif.", "domain" => "Art"],
            //             ["text" => "Un chantier, une usine ou un lieu pratique.", "domain" => "Technique"]
            //         ]
            //     ],
            //     [
            //         "question" => "Quel type de lecture préférez-vous ?",
            //         "options" => [
            //             ["text" => "Des articles scientifiques ou techniques.", "domain" => "Science"],
            //             ["text" => "Des témoignages, des biographies ou des livres de psychologie.", "domain" => "Social"],
            //             ["text" => "Des romans, des bandes dessinées ou des livres d’art.", "domain" => "Art"],
            //             ["text" => "Des manuels pratiques ou guides techniques.", "domain" => "Technique"]
            //         ]
            //     ],
            //     [
            //         "question" => "Quel aspect de l’apprentissage préférez-vous ?",
            //         "options" => [
            //             ["text" => "Découvrir et comprendre des concepts théoriques.", "domain" => "Science"],
            //             ["text" => "Participer à des discussions et aider les autres à apprendre.", "domain" => "Social"],
            //             ["text" => "Créer des projets originaux ou innovants.", "domain" => "Art"],
            //             ["text" => "Mettre en œuvre des connaissances pour fabriquer ou réparer.", "domain" => "Technique"]
            //         ]
            //     ],
            //     [
            //         "question" => "Quel type de film ou documentaire préférez-vous regarder ?",
            //         "options" => [
            //             ["text" => "Des documentaires scientifiques ou technologiques.", "domain" => "Science"],
            //             ["text" => "Des récits centrés sur des relations humaines.", "domain" => "Social"],
            //             ["text" => "Des films artistiques ou inspirants.", "domain" => "Art"],
            //             ["text" => "Des films d’action ou sur l’ingénierie.", "domain" => "Technique"]
            //         ]
            //     ],
            //     [
            //         "question" => "Dans quelle matière excellez-vous le plus ?",
            //         "options" => [
            //             ["text" => "Les mathématiques ou les sciences naturelles.", "domain" => "Science"],
            //             ["text" => "Les sciences humaines ou sociales.", "domain" => "Social"],
            //             ["text" => "Les arts plastiques ou la musique.", "domain" => "Art"],
            //             ["text" => "Les travaux manuels ou la technologie.", "domain" => "Technique"]
            //         ]
            //     ],
            //     [
            //         "question" => "Quel est votre objectif professionnel principal ?",
            //         "options" => [
            //             ["text" => "Faire avancer la recherche ou l’innovation.", "domain" => "Science"],
            //             ["text" => "Aider les individus ou la société.", "domain" => "Social"],
            //             ["text" => "Exprimer votre créativité et partager vos idées.", "domain" => "Art"],
            //             ["text" => "Construire, développer ou réparer des choses.", "domain" => "Technique"]
            //         ]
            //     ],
            //     [
            //         "question" => "Que préférez-vous faire lors de votre temps libre ?",
            //         "options" => [
            //             ["text" => "Explorer des phénomènes scientifiques ou résoudre des puzzles.", "domain" => "Science"],
            //             ["text" => "Participer à des activités communautaires ou sociales.", "domain" => "Social"],
            //             ["text" => "Peindre, écrire ou jouer d’un instrument.", "domain" => "Art"],
            //             ["text" => "Bricoler ou construire des projets pratiques.", "domain" => "Technique"]
            //         ]
            //     ],
            // ];

            // Afficher les questions
            while ($questions->have_posts()) : $questions->the_post(); 
            $q = 1; 
            $questionsCount = 0;
            ?>
                <div class="quiz-question">
                    <h4><?php the_title(); ?></h4>
                    <?php foreach(explode("|", get_field('response')) as $res): ?>
                        <label>
                            <?php $response = explode(';;', $res); ?>
                            <input type="radio" name="question-<?= $q; ?>" value="<?php $response[1]; ?>" />
                            <?= $response[0]; ?>
                        </label>
                    <?php endforeach; ?>
                </div>
            <?php $q++; $questionsCount endwhile; ?>
            <!-- foreach ($questions as $index => $q) {
                echo '<div class="quiz-question">';
                echo '<h4>Question ' . ($index + 1) . ': ' . esc_html($q['question']) . '</h4>';
                foreach ($q['options'] as $optionIndex => $option) {
                    echo '<label>';
                    echo '<input type="radio" name="question-' . $index . '" value="' . esc_attr($option['domain']) . '"> ';
                    echo esc_html($option['text']);
                    echo '</label><br>';
                }
                echo '</div>';
            }
            ?> -->
            <button type="submit">Soumettre</button>
        </form>
        <div id="quiz-result" style="display: none;">
            <h3>Votre domaine d'études recommandé :</h3>
            <p id="recommended-domain"></p>
        </div>
    </div>
    <script>
        jQuery(document).ready(function($) {
            const totalQuestionsCount = <?php echo $questionsCount; ?>;
            console.log({ totalQuestionsCount })

            $('#orientation-quiz-form').on('submit', function(e) {
                e.preventDefault();

                // Initialiser les scores
                var scores = {
                    "Science": 0,
                    "Social": 0,
                    "Art": 0,
                    "Technique": 0
                };

                // Parcourir toutes les réponses sélectionnées
                $('#orientation-quiz-form input[type="radio"]:checked').each(function() {
                    var domain = $(this).val();
                    if (scores.hasOwnProperty(domain)) {
                        scores[domain]++;
                    }
                });

                // Déterminer le domaine avec le score le plus élevé
                // var maxScore = 0;
                let recommendedDomain = '';
                

                // $.each(scores, function(domain, score) {
                //     console.log({ scores, score })
                //     if (score > maxScore) {
                //         maxScore = score;
                //         recommendedDomain = domain;
                //     }
                // });

                // Définir les descriptions des domaines
                var domains = {
                    "Science": "Des carrières en Médecine, biologie, chimie, physique ou informatique sont possibles.",
                    "Social": "Des carrières en Psychologie, sociologie, éducation ou ressources humaines sont possibles.",
                    "Art": "Des carrières en Design, beaux-arts, littérature, musique ou architecture sont possibles.",
                    "Technique": "Des carrières en Génie civil, mécanique, électronique ou artisanat sont possibles."
                };

                // Afficher le résultat
                if (recommendedDomain !== '') {
                    $('#recommended-domain').text('Vous devez faire des études en ' + recommendedDomain + ' ! ' + domains[recommendedDomain]);
                } else {
                    $('#recommended-domain').text("Vous n'avez pas répondu à suffisamment de questions pour déterminer un domaine.");
                }

                $('#quiz-result').show();
                $('#orientation-quiz-form').hide();
            });
        });
    </script>
   
<?php get_footer(); ?> 