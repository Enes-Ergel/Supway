<?php /* Template Name: Quiz Page */

if (!is_user_logged_in()) {

    wp_redirect( esc_url(get_permalink(get_page_by_path('/redirection'))) );
      exit;
  }

get_header();
// Shortcode pour afficher le quiz d'orientation scolaire
//function orientation_quiz_shortcode() {
    ob_start();
    ?>
    <div id="orientation-quiz-container">
        <form id="orientation-quiz-form">
            <?php

            // Questions et choix associés aux domaines
            $questions = new WP_Query([
                'post_type' => 'quiz_question',
                'post_status' => 'publish'
            ]);      
            
            ?>
           
            
         <div id="quiz-container">
    <?php 
    $q = 1; 
    $questionsCount = 0;
    while ($questions->have_posts()) : $questions->the_post(); 
    ?>
        <div class="quiz-question" id="question-<?= $q; ?>">
            <h4><?php the_title(); ?></h4>
            <?php $r= 1; foreach(explode("|", get_field('response')) as $res):?>
                <label class="reponses">
                    <?php $response = explode(';;', $res); ?>
                    <input 
                        type="radio" name="question-<?= $q; ?>" 
                        
                        id="question-<?= $q; ?>-repoonse<?= $r; ?>"
                        value="<?= $response[1]; ?>" />
                    <?= $response[0]; ?>
                </label>
            <?php $r++; endforeach; ?>
        </div>
    <?php $q++; $questionsCount++; endwhile; ?>
</div>
<div id="quiz-navigation">
    <button id="prev-question" type="button">Précédent</button>
    <button id="next-question"  type="button">Suivant</button>
</div>

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
        const totalQuestionsCount = <?php echo $questionsCount; ?>;
        jQuery(document).ready(function($) {
            // const totalQuestionsCount = <?php echo $questionsCount; ?>;
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

                // $('#quiz-result').show();
                // $('#orientation-quiz-form').hide();
            });
        });
    </script>
   
<?php get_footer(); ?>     