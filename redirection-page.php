<?php
/* Template Name: page redirect */ 

 get_header(); ?>


<div class="titre-page-redirection" style="background-color: #0097b2">
    <h1>Désolé...</h1>
    <p>Vous devez être inscrit pour avoir accès à cette page</p>
 </div>
<div id="container-redirection" style="background-color: #0097b2">

        <div id="redirection" class="contenedortextoconnecter col-lg-6 col-12">
            <h1 class="titre-redirection-connecter">Se connecter</h1>

            <form action="<?php echo esc_url(site_url('wp-login.php', 'login_post')); ?>" method="post">
                <label for="log">Nom d'utilisateur ou adresse e-mail</label>
                <input type="text" name="log" id="log" value="<?php echo esc_attr($user_login); ?>">

                <div class="blockdetexte">
                    <label for="pwd">Mot de passe</label>
                    <input type="password" name="pwd" id="pwd">
                </div>
                <div class="container-btn-connexion-redirect">
                <input class="button-sinscrire" type="submit" name="submit" value="Se connecter">
                <input type="hidden" name="redirect_to" value="<?php echo esc_url(home_url('/')); ?>">
              </div>
            </form>

            <div class="separator">
                <span class="separator-text">ou</span>
            </div>
                <p id="textepasinscrit">
                    Vous n’êtes pas encore inscrit ? 
                   <a class="ms-1" href="<?php echo esc_url(get_permalink(get_page_by_path('/sinscrire'))); ?>">S’inscrire</a>
                </p>
        </div>

        <div class="image-container2">
    <img id="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/redirection.svg">
</div>
</div>  



<?php get_footer(); ?>