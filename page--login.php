<?php
/* Template Name: login-new */ 

// Redirection si l'utilisateur est déjà connecté
if (is_user_logged_in()) {
    wp_redirect(home_url('/'));
    exit;
}

get_header();
?>

<section>
    <div class="container-fluid">
        <div class="row">
            
            <div class="imagenseconnecter col-12 col-md-6 col-lg-6 order-2 order-lg-2">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/student-with-diplome.svg" 
                     alt="Étudiant avec diplôme">
            </div>

            
            <div class="col-12 col-lg-6 d-flex flex-column align-items-center justify-content-center text-container">
                <h1 class="titreseconnecter mt-5 mb-5">Se connecter</h1>
                <form class="mb-5" action="<?php echo esc_url(site_url('wp-login.php', 'login_post')); ?>" method="post">
                    
                    <label for="log">Nom d'utilisateur ou adresse e-mail</label>
                    <input type="text" name="log" id="log" value="<?php echo esc_attr($user_login); ?>">

                    
                    <div class="blockdetexte">
                        <label for="pwd">Mot de passe</label>
                        <input type="password" name="pwd" id="pwd">
                    </div>

                    
                    <p id="textepasinscrit">
                        Vous n’êtes pas encore inscrit ? 
                        <a class="ms-1" href="<?php echo esc_url(get_permalink(get_page_by_path('/sinscrire'))); ?>">S’inscrire</a>
                    </p>

                    
                    <div class="d-flex justify-content-center align-items-center"> 
                        <input class="button-sinscrire mb-5" type="submit" name="submit" value="Se connecter">
                        <input type="hidden" name="redirect_to" value="<?php echo esc_url(home_url('/')); ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>