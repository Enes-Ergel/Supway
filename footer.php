<?php wp_footer(); ?>

  <footer class="container-fluid d-flex flex-wrap justify-content-between align-items-center py-3 my-4">
    
 <ul class="nav col-md-4 justify-content-end">
    <li class="nav-item">
    <a href="<?php echo esc_url(get_permalink(get_page_by_path('/contact'))); ?>" class="nav-link px-2 text-muted">
        Nous contacter
    </a>
    </li>
      <li class="nav-item">
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('/sinscrire'))); ?>" class="nav-link px-2 text-muted">
          S'inscrire
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('/se-connecter'))); ?>" class="nav-link px-2 text-muted">
          Se connecter
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('/mentions-legales'))); ?>" class="nav-link px-2 text-muted">
        Mentions Légales
      </a>
    </li>
  </ul>

    <a href="<?php echo esc_url(home_url('/')); ?>" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
    <img id="logo-noir" class="text-body-secondary" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/Supway-logo-noir.svg" alt="logo">
    </a>

   
  <p class="col-md-4 mb-0 ps-5 text-muted">© 2024 Supway, Inc</p>
  </footer>

</body>
</html>