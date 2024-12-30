<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="Supway vous aide à trouver votre voie dans l'enseignement supérieur. Quiz d'orientation personnalisé et conseillers dédiés pour vous guider dans vos choix d'études post-secondaires.">
    <meta name="robots" content="index, follow">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand ps-lg-4" href="<?php echo esc_url(home_url('/')); ?>">
                <img class="logo-nav" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/Supway-logo.svg" alt="logo supway">
            </a>
            
            <button 
                class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navbarNav" 
                aria-controls="navbarNav" 
                aria-expanded="false" 
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'header',
                    'container' => false,
                    'menu_class' => 'navbar-nav me-lg-4'
                ));
                ?>
                
                <?php if (is_user_logged_in()): ?>
                    <a class="btn btn-danger" href="<?php echo wp_logout_url(home_url('/')); ?>">Déconnexion</a>
                <?php else: ?>
                    <div class="nav-buttons">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('/sinscrire'))); ?>" class="btn btn-inscrire">S'inscrire</a>
                        <a class="btn btn-connecter ms-lg-3" href="<?php echo esc_url(get_permalink(get_page_by_path('/se-connecter'))); ?>">Se connecter</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>

<?php wp_body_open(); ?>
