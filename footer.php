<?php wp_footer(); ?>




<footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
    
    <div class="mx-auto">
      <h5>Nous contacter</h5>
 
  <div class="nav flex-column text-start">
    
    <div class="d-flex align-items-center mb-3">
    <img class="picto" src="<?php echo get_template_directory_uri(); ?>/assets/img/Pictogrammes/letter.svg" alt="Flèche">
      <p class="mb-0">
        
      supway@gmail.com
        
      </p>
    </div>

    
    <div class="d-flex align-items-center">
    <img class="picto me-2" src="<?php echo get_template_directory_uri(); ?>/assets/img/Pictogrammes/telefon.svg" alt="Flèche"> 
      <p class="nav-item mb-0">
        
      0495/02.83.19
        
      </p>
    </div>
  </div>
</div>
      
    </div>
<div class="d-flex justify-content-center align-items-center">
  
  <div>  
    <div class="d-flex align-items-center mb-3">
      <img class="picto me-1" src="<?php echo get_template_directory_uri(); ?>/assets/img/Pictogrammes/guy.svg" alt="Inscription">
      <p class="nav-item mb-0">
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('/sinscrire'))); ?>" class="nav-link p-0 text-body-secondary">
          S'inscrire
        </a>
      </p>
    </div>

    
    <div class="d-flex align-items-center">
      <img class="picto me-1" src="<?php echo get_template_directory_uri(); ?>/assets/img/Pictogrammes/graph.svg" alt="Connexion">
      <p class="nav-item mb-1">
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('/seconnecter'))); ?>" class="nav-link p-0 text-body-secondary">
          Se connecter
        </a>
      </p>
    </div>
  </div>
</div>


<div class="col mb-3 d-flex justify-content-center mx-auto align-items-center ">
      
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="<?php echo esc_url(get_permalink(get_page_by_path('/mentionslegales'))); ?>" class="nav-link p-0 text-body-secondary">Mentions légales</a></li>
        
        
      </ul>
    </div>
  <div class="col d-flex justify-content-center align-items-center mentions-legales">
     
      <img id="logo-noir" class="text-body-secondary" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/Supway-logo-noir" alt="logo"> 
  </div>

</footer>
   
   





</body>
</html>