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

<section>
  <div class="container-fluid quiz" style="background-color: #0097b2;">
    <div class="row pt-5 ps-5 align-items-center">
     
      <div class="col-12 col-lg-6 d-flex flex-column align-items-start text-container">
        <h2 class="titre-rubrique3 ms-lg-5 mb-4">Venez répondre à notre quiz interactif</h2>
        <p class="corps-texte ms-lg-5">
        Il y aura 10 questions simples, auxquelles vous devrez répondre honnêtement afin que la réponse finale soit la plus précise possible et puisse vous aider.
        </p>
      </div>

     
      <div class="col-12 col-lg-6 d-flex justify-content-center image-container">
        <img 
          class="img-fluid" 
          src="<?php echo get_template_directory_uri(); ?>/assets/img/image-pagequizz.svg" 
          alt="Student Image">
      </div>
    </div>
  </div>
</section>

    <div id="orientation-quiz-container">
        <form method="POST" id="orientation-quiz-form">
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


            <?php
// Initialiser les compteurs pour chaque domaine
$domaines = [
    'Science' => 0,
    'Social' => 0,
    'Art' => 0,
    'Technique' => 0
];

// Récupérer les réponses de l'utilisateur (soumettez les données via POST par exemple)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST as $key => $value) {
        // Vérifier si la clé correspond à une question
        if (strpos($key, 'question-') === 0) {
            // Ajouter 1 au domaine correspondant
            if (isset($domaines[$value])) {
                $domaines[$value]++;
            }
        }
    }
}

// Trouver le domaine majoritaire
$dominateur = array_search(max($domaines), $domaines);

// Afficher une réponse en fonction du domaine majoritaire
switch ($dominateur) {
    case 'Science':
        $message = "Vous excellez dans le domaine scientifique !";
        break;
    case 'Social':
        $message = "Vous êtes fait pour les sciences humaines et sociales !";
        break;
    case 'Art':
        $message = "Vous avez un talent artistique incroyable !";
        break;
    case 'Technique':
        $message = "Le domaine technique est fait pour vous !";
        break;
    default:
        $message = "Aucun domaine dominant détecté.";
        break;
}

//var_dump($dominateur);
?>

<button type="button">Soumettre</button>
<?php echo "<p>$message</p>"; ?>
</form>

  
<?php get_footer(); ?>     