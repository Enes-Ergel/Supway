<?php 
/* Template Name: Quiz Page */

if (!is_user_logged_in()) {
    wp_redirect(esc_url(get_permalink(get_page_by_path('/redirection'))));
    exit;
}

get_header();
?>

<section class="mb-0">
    <div class="container-fluid quiz">
        <div class="row pt-5 ps-5 align-items-center">
            <div class="col-12 col-lg-6 d-flex flex-column align-items-start text-container">
                <h2 class="titre-rubrique3 ms-lg-5 mb-4">Venez répondre à notre quiz interactif</h2>
                <p class="texte-pquiz ms-lg-5">
                    Il y aura 10 questions simples, auxquelles vous devrez répondre honnêtement afin que la réponse finale soit la plus précise possible et puisse vous aider.
                </p>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center image-container">
                <img class="img-fluid" 
                     src="<?php echo get_template_directory_uri(); ?>/assets/img/image-pagequizz.svg" 
                     alt="Student Image">
            </div>
        </div>
    </div>
</section>

<section class="pt-5"  style="background-color: #bfdd7d">
<div id="orientation-quiz-container" class="container-fluid">
    <form id="orientation-quiz-form">
        <div id="question-counter"></div>

        <div id="quiz-container">
            <?php
            $args = array(
                'post_type' => 'quiz_question',
                'post_status' => 'publish',
                'posts_per_page' => 10,
                'orderby' => 'menu_order',
                'order' => 'ASC'
            );
            
            $questions = new WP_Query($args);
            $q = 1;

            if ($questions->have_posts()) :
                while ($questions->have_posts()) : $questions->the_post();
                    $responses = get_field('response');
                    if (!empty($responses)) :
            ?>
                        <div class="quiz-question" id="question-<?php echo $q; ?>">
                            <h4><?php the_title(); ?></h4>
                            <?php 
                            $responses_array = explode('|', $responses);
                            foreach ($responses_array as $index => $response) :
                                $response_parts = explode(';;', $response);
                                if (count($response_parts) === 2) :
                                    $response_text = trim($response_parts[0]);
                                    $response_type = trim($response_parts[1]);
                            ?>
                                    <label class="reponses">
                                        <input type="radio" 
                                               name="question-<?php echo $q; ?>" 
                                               value="<?php echo esc_attr($response_type); ?>">
                                        <?php echo esc_html($response_text); ?>
                                    </label>
                            <?php 
                                endif;
                            endforeach;
                            ?>
                        </div>
            <?php
                        $q++;
                    endif;
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <div id="quiz-navigation">
            <button type="button" id="prev-question" class="btn-prev">Précédent</button>
            <button type="button" id="next-question" class="btn-next">Suivant</button>
        </div>

        <button type="submit" id="submit-quiz" style="display: none;">Voir mes résultats</button>
    </form>

    <div id="quiz-results" style="display: none;"></div>
</div>
</section>

<?php get_footer(); ?>