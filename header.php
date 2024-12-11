<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Style.css">
    
    <?php wp_head(); ?> 
    <title>Trova</title>
</head>

<body <?php body_class(); ?>>
<header>

<div class="container-fluid">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
            <img class="imagelogo" src="<?php echo get_template_directory_uri(); ?>./img/Supway-logo-normal.svg" alt="Supway Logo" />
            </a> 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarTogglerDemo01">

            
            <?php
            wp_nav_menu(array(
                'theme_location' => 'header',
                'container' => false,
                'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0'
            ));
            ?>
            
           <div class="d-flex text-end"></div>
            
                <?php if (is_user_logged_in()): ?>
                    
                    <a class="btn btn-danger me-2" href="<?php echo wp_logout_url(home_url('/')); ?>">Déconnexion</a>
                <?php else: ?>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('/sincrire'))); ?>" class="btn btn-inscrire me-2">S'inscrire</a>

                    <a class="btn btn-connecter" href="<?php echo esc_url(home_url('/se-connecter')); ?>">Se connecter</a>
                <?php endif; ?>
            </>
        </div>
    </div>
</nav>     
</div>

  



     
    
    <?php wp_body_open(); ?> 