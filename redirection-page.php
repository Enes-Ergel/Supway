<?php
/* Template Name: page redirect */ 

 get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-12 col-md-12 col-lg-12 d-flex flex-column justify-content-center align-items-center text-center mt-5 mb-5">
     
      <h2 id="desole">Désolé... Vous devez être inscrit pour avoir accès à cette page.</h2>

      <div class="container col-12 d-flex flex-column justify-content-center align-items-center text-center">
    <div class="row">
        <div class="d-flex justify-content-center mt-3">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('/sincrire'))); ?>" class="btn btn-inscrire me-3">S'inscrire</a>
            <a class="btn btn-connecter" href="<?php echo esc_url(home_url('/se-connecter')); ?>">Se connecter</a>
        </div>
      </div>
    </div>

      <div class="col-12 col-md-12 col-lg-12 mt-5">
      <img id="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/redirection.svg">
      </div>
    </div>
  </div>
</div>






<?php get_footer(); ?>