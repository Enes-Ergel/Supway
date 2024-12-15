<?php
/* Template Name: login-new */ 
if (is_user_logged_in()) {
  // si je suis déjà connecté je suis redirigé vers la page home
 wp_redirect( home_url('/') );
	exit;
}

get_header();
// attention c'est important de faire les redirection avant le header sinon la redirection ne marche pas
?>
<br>
<br>

<div class="container">
    <div class="row">

       
        <div class="imagenseconnecter col-12 col-lg-6 order-2 order-lg-2">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/student-with-diplome.svg" 
                 alt="Description de l'image">
        </div>

        
        <div class="contenedortextoconnecter col-12 col-lg-6 order-1 order-lg-1">
            <h1 class="titreseconnecter">Se connecter</h1>
            <br>
            <br>
            <form action="<?php echo esc_url(site_url('wp-login.php', 'login_post')); ?>" method="post">

                
                <label for="log">Nom d'utilisateur ou adresse e-mail</label>
                <input type="text" name="log" id="log" 
                       value="<?php echo esc_attr($user_login); ?>">

               
                <div class="blockdetexte">
                    <label for="pwd">Mot de passe</label>
                    <input type="password" name="pwd" id="pwd">
                </div>

                
                <p id="textepasinscrit">
                    Vous n’êtes pas encore inscrit ? 
                    <a  href="<?php echo esc_url(get_permalink(get_page_by_path('/sinscrire'))); ?>">S’inscrire</a>
                </p>
                <div class="d-flex justify-content-center align-items-center h-100"> 
                <input class="button-sinscrire" type="submit" name="submit" value="Se connecter">
                <input type="hidden" name="redirect_to" 
                       value="<?php echo esc_url(home_url('/')); ?>">

            </form>
    </div>
</div>
</div>
<br>
<br>

<?php get_footer(); ?>
