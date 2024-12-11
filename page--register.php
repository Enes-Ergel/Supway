<?php
/* Template Name: RegistrationPage */
if (is_user_logged_in()) {
  wp_redirect( home_url('/') );
	exit;
}

get_header();
// attention c'est important de faire les redirection avant le header sinon la redirection ne marche pas
?>

<div class="container">
    <div class="row">
        <div class="imagenseconnecter col-lg-6 col-12">
            <img  src="<?php echo get_template_directory_uri(); ?>/img/Inscription-student-page.svg" 
                 alt="Description de l'image">
        </div>

        <div class="contenedortextoinscrire col-lg-6 col-12">
            <h1 class="titreseconnecter">S'inscrire</h1>

            <?php if ( isset($_GET['success']) && $_GET['success'] == 1 ): ?>
                <p style="color: green;">Inscription réussie ! Vous pouvez maintenant vous connecter.</p>
            <?php endif; ?>

            <form method="post" name="myForm">
                
                <label for="fname">Prénom</label>
                <input type="text" id="fname" name="fname" required />

                
                <label for="lname">Nom</label>
                <input type="text" id="lname" name="lname" required />

               
                <label for="uname">Nom d'utilisateur</label>
                <input type="text" id="uname" name="uname" required />

                
                <label for="uemail">Adresse mail </label>
                <input type="email" id="uemail" name="uemail" required />

                
                <label for="upass">Définir un mot de passe </label>
                <input type="password" id="upass" name="upass" required />

                
                <label for="repass">Confirmer un mot de passe </label>
                <input type="password" id="repass" name="repass" required />
				<br>
				<br>

                <p id="textepasinscrit">Déjà membre ? <a href=" <?php echo esc_url(get_permalink(get_page_by_path('?page_id=58')));  ?>"> Se connecter</a></p>

                <input type="hidden" name="create_account_nonce" value="<?php echo wp_create_nonce('create_account_action'); ?>">
                <button class= "" type="submit" id="buttoninscrit" name="submit">S'inscrire</button>
            </form>
        </div>
    </div>
</div>


<?php get_footer(); ?>