<?php wp_footer(); ?>

<footer class="container-fluid py-3">
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link px-2" href="mailto:supway@gmail.com">Nous contacter</a>
        </li>
        <li class="nav-item">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('/sinscrire'))); ?>" class="nav-link px-2">
                S'inscrire
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('/se-connecter'))); ?>" class="nav-link px-2">
                Se connecter
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('/mentions-legales'))); ?>" class="nav-link px-2">
                Mentions Légales
            </a>
        </li>
    </ul>
    <p class="text-center py-3">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-noir">
            <img 
                id="logo-noir" 
                class="text-body-secondary" 
                src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/Supway-logo-noir.svg" 
                alt="logo"
            >
        </a>
    </p>
    <p class="text-center py-3" style="color:black;">© 2024 Supway, Inc</p>
</footer>

</body>
</html>
