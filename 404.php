<?php /* Template Name: 404 */ get_header(); ?>

<div class="container d-flex justify-content-center">
    <div class="titre-404 text-center">
        <?php echo "Erreur 404 -&nbsp;"; ?>
        <?php echo "Vous êtes perdu en tentant de trouver votre voie ?"; ?>
    </div>
</div>

<div class="container d-flex justify-content-center">
    <img 
        class="img-fluid image404 d-flex flex-column align-items-start text-container" 
        src="<?php echo get_template_directory_uri(); ?>/assets/img/image-page404.svg" 
        alt="Étudiant avec conseiller"
    >
</div>

<?php get_footer(); ?>
