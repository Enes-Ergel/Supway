<?php wp_footer(); ?>


<footer class="container-fluid row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">

  <div class="col-6 mb-3 mx-auto text-center">
    <button>
      <a href="<?php echo esc_url(get_permalink(get_page_by_path('/contact'))); ?>">Nous contacter</a>
    </button>
 
  


    <div class="nav flex-column text-start">
      <div class="d-flex align-items-center mb-3">
        <img class="picto me-2" src="<?php echo get_template_directory_uri(); ?>/assets/img/Pictogrammes/letter.svg" alt="Flèche">
        <p class="nav-item mb-0">
          <a class="items-footer" href="mailto:supway@gmail.com">supway@gmail.com</a>
        </p>
      </div>
      <div class="d-flex align-items-center ">
        <img class="picto me-2" src="<?php echo get_template_directory_uri(); ?>/assets/img/Pictogrammes/telefon.svg" alt="Flèche">
        <p class="nav-item mb-0">
          <a class="items-footer" href="tel:+3295028319">0495/02.83.19</a>
        </p>
      </div>
    </div>
  </div>
  
  
  <div class="col col-6 mb-3 d-flex justify-content-center align-items-center">
    <div class="nav flex-column text-start">
      <div class="d-flex align-items-center mb-3">
        <img class="picto me-2" src="<?php echo get_template_directory_uri(); ?>/assets/img/Pictogrammes/guy.svg" alt="Inscription">
        <p class="nav-item mb-0 liens-footer">
          <a href="<?php echo esc_url(get_permalink(get_page_by_path('/sinscrire'))); ?>" class="nav-link p-0 items-footer">S'inscrire</a>
        </p>
      </div>
      <div class="d-flex align-items-center mb-3">
        <img class="picto me-2" src="<?php echo get_template_directory_uri(); ?>/assets/img/Pictogrammes/arrow-2.svg" alt="Connexion">
        <p class="q liens-footer">
          <a href="<?php echo esc_url(get_permalink(get_page_by_path('/se-connecter'))); ?>" class="nav-link p-0 items-footer">Se connecter</a>
        </p>
      </div>
    </div>
  </div>
  
  
  <div class="col col-6 mb-3 d-flex justify-content-center mx-auto align-items-center">
    <ul class="nav flex-column liens-footer">
      <li class="nav-item mb-2">
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('/mentions-legales'))); ?>" class="nav-link p-0 items-footer">Mentions légales</a>
      </li>
    </ul>
  </div>
  
  <div class="col col-6 mb-3 d-flex justify-content-center align-items-center mentions-legales">
    <a href="<?php echo esc_url(home_url('/')); ?>">
      <img id="logo-noir" class="text-body-secondary" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/Supway-logo-noir.svg" alt="logo">
    </a>
  </div>
</footer>


</body>
</html>