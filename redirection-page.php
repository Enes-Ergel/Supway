<?php
/* Template Name: page redirect */ 

 get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-12 d-flex flex-column justify-content-center align-items-center text-center">
     
      <h2 id="desole">Désolé...Vous devez être inscrit pour avoir accès à cette page.</h2>
      

      <img class="image-404" src="<?php echo get_template_directory_uri(); ?>/assets/img/Loading-pana.svg" alt="Image de désolé">
    </div>
  </div>
</div>


<div class="container">
    <div class="row">
        
        <div class="contenedortextoinscrire col-12 col-lg-5">
            <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
                <p style="color: green;">Inscription réussie ! Vous pouvez maintenant vous connecter.</p>
            <?php endif; ?>
            <div class="form-sinscrire">
                <h1 class="titreseconnecter">S'inscrire</h1>
                <form method="post" name="myForm">
                    <label for="fname">Prénom</label>
                    <input type="text" id="fname" name="fname" required />

                    <label for="lname">Nom</label>
                    <input type="text" id="lname" name="lname" required />

                    <label for="uname">Nom d'utilisateur</label>
                    <input type="text" id="uname" name="uname" required />

                    <label for="uemail">Adresse mail</label>
                    <input type="email" id="uemail" name="uemail" required />

                    <label for="upass">Définir un mot de passe</label>
                    <input type="password" id="upass" name="upass" required />

                    <label for="repass">Confirmer un mot de passe</label>
                    <input type="password" id="repass" name="repass" required />
                    <br><br>

                   

                    <div class="d-flex justify-content-center align-items-center h-100">
                        <input type="hidden" name="create_account_nonce" value="<?php echo wp_create_nonce('create_account_action'); ?>">
                        <button class="button-sinscrire" type="submit" id="buttoninscrit" name="submit">S'inscrire</button>
                    </div>
                </form>
            </div>
        </div>
    <div class="col-12 col-lg-2 d-flex justify-content-center align-items-center">
      <h3>Ou</h3>
    </div>
        
    <div class="contenedortextoconnecter col-12 col-lg-5 flex-column justify-content-center align-items-center"> 
    <h1 class="titreseconnecter">Se connecter</h1>
    <br><br>
    <form action="<?php echo esc_url(site_url('wp-login.php', 'login_post')); ?>" method="post" class="form-connecter">
        <label for="log">Nom d'utilisateur ou adresse e-mail</label>
        <input type="text" name="log" id="log" value="<?php echo esc_attr($user_login); ?>">

        <div class="blockdetexte">
            <label for="pwd">Mot de passe</label>
            <input type="password" name="pwd" id="pwd">
        </div>

        <div class="d-flex justify-content-center align-items-center h-100">
            <input class="button-sinscrire" type="submit" name="submit" value="Se connecter">
            <input type="hidden" name="redirect_to" value="<?php echo esc_url(home_url('/')); ?>">
        </div>
    </form>
</div>

    </div>
</div>



<?php get_footer(); ?>