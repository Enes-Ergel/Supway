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

       
        <div class="imagenseconnecter col-lg-6 col-12">
            <img src="<?php echo get_template_directory_uri(); ?>/img/Inscription-student-page.svg" 
                 alt="Description de l'image">
        </div>

        
        <div class="contenedortextoconnecter col-lg-6 col-12">
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
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('?page_id=58'))); ?>">S’inscrire</a>
                </p>

                
                <input class="btn-inscrire" id="#buttoninscrit" type="submit" name="submit" value="Se connecter">
                <input type="hidden" name="redirect_to" 
                       value="<?php echo esc_url(home_url('/')); ?>">

            </form>
        </div>
    </div>
</div>
<br>
<br>

<?php get_footer(); ?>