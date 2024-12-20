<?php
/* Template Name: page redirect */ 

 get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-12 d-flex flex-column justify-content-center align-items-center text-center">
     
      <h2 id="desole">Désolé...Vous devez être inscrit pour avoir accès à cette page.</h2>
      

      <img class="image-404" src="<?php echo get_template_directory_uri(); ?>/assets/img/Loading-pana.svg" alt="Image de désolé">
    </div>
  </div>
</div>


<div class="container col-12 d-flex flex-column justify-content-center align-items-center text-center">
    <div class="row">
        <div class="d-flex justify-content-center">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('/sincrire'))); ?>" class="btn btn-inscrire me-2">S'inscrire</a>
            <a class="btn btn-connecter" href="<?php echo esc_url(home_url('/se-connecter')); ?>">Se connecter</a>
        </div>
    </div>
</div>



<?php get_footer(); ?>