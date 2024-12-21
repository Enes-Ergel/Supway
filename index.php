
<?php get_header(); ?>


<section>
  <div class="container-fluid quiz">
    <div class="row pt-5 ps-5 align-items-center">
     
      <div class="col-12 col-lg-6 d-flex flex-column align-items-start text-container">
        <h2 class="titre-rubrique3 ms-lg-5 mb-4">Venez répondre à notre quiz interactif</h2>
        <p class="corps-texte ms-lg-5">
        Il y aura 10 questions simples, auxquelles vous devrez répondre honnêtement afin que la réponse finale soit la plus précise possible et puisse vous aider.
        </p>
      </div>

     
      <div class="col-12 col-lg-6 d-flex justify-content-center image-container">
        <img 
          class="img-fluid" 
          src="<?php echo get_template_directory_uri(); ?>/assets/img/image-quizz.svg" 
          alt="Student Image">
      </div>
    </div>
  </div>
</section>



<section>
  <div class="container-fluid">
    <div class="row pt-5 ps-5 align-items-center">
    
      <div class="col-12 col-lg-6 d-flex flex-column align-items-start text-container">
        <h1 class="titre-homepage ms-lg-5 mb-4">Supway, la voie du supérieur</h1>
        <p class="corps-texte ms-lg-5">
          Tu te demandes quoi faire après la rhéto ? Ou tu cherches à réorienter ta carrière mais tu ne sais pas par où commencer ? Bienvenue sur Supway !
        </p>

       
        <div class="ms-lg-5 d-flex">
          <a id="azul" class="btn btn-inscrire me-2" href="<?php echo esc_url(get_permalink(get_page_by_path('/sinscrire'))); ?>">S'inscrire</a>
          <a id="azul" class="btn btn-inscrire" href="<?php echo esc_url(get_permalink(get_page_by_path('/se-connecter'))); ?>">Se connecter</a>
        </div>
      </div>

     
      <div class="col-12 col-lg-6 d-flex justify-content-center image-container">
        <img 
          class="img-fluid" 
          src="<?php echo get_template_directory_uri(); ?>/assets/img/student-page-intro.svg" 
          alt="Student Image">
      </div>
    </div>
  </div>
</section>

























<section>
<div class="container-fluid rubrique2" style="background-color: #0097b2";>

      <div class="col-12 col-md-6 col-lg-6 order-2 order-md-1 order-lg-1">
          <img class="img-fluid container-image2" src="<?php echo get_template_directory_uri(); ?>/assets/img/image-conseiller.svg">
      </div>

      <div class="row">
        <div class="col-12 col-md-6 col-lg-6 order-1 order-md-2 order-lg-2">
        <h2 class="ms-lg-5 mb-4">Contactez nos conseillers</h2>
        <p class="ms-lg-5">
        Si vous êtes étudiant universitaire et que vous avez besoin d'orientation pour prendre des décisions académiques, 
        personnelles ou professionnelles, nos conseillers sont là pour vous aider. Avec leur expertise et leur engagement,
        ils vous offriront le soutien nécessaire pour surmonter les défis, améliorer vos performances et atteindre vos objectifs.
        N'hésitez pas à nous contacter et à faire le premier pas vers un avenir réussi. Nous sommes là pour vous accompagner dans votre parcours académique et personnel !
        </p>
        </div>
        
     </div>
  </section>

<section>
  <div class="container-fluid">
    <div class="row pt-5 ps-5 align-items-center">
     
      <div class="col-12 col-lg-6 d-flex flex-column align-items-start text-container">
        <h1 class="titre-homepage ms-lg-5 mb-4">Partagez vos expériences,...</h1>
        <p class="corps-texte ms-lg-5">
          Vous êtes étudiant, ancien élève ou membre du personnel éducatif ? 
          Rejoignez la communauté Supway et aidez les jeunes sortant de rhéto à trouver leur chemin.
        </p>
       
        <a 
          id="azul" 
          class="btn btn-inscrire me-2 ms-lg-5 mt-4" 
          href="<?php echo esc_url(get_permalink(get_page_by_path('/contact'))); ?>">
          Rejoignez-nous
        </a>
      </div>

      
      <div class="col-12 col-lg-6 d-flex justify-content-center image-container">
        <img 
          class="img-fluid" 
          src="<?php echo get_template_directory_uri(); ?>/assets/img/student-with-smartphone 1.svg" 
          alt="Student Image">
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container-fluid">
    <div class="row pt-5 ps-5 align-items-center">

    <div class="col-12 col-lg-6 d-flex justify-content-center image-container">
        <img 
          class="img-fluid" 
          src="<?php echo get_template_directory_uri(); ?>/assets/img/conseiller-avec-pc.svg" 
          >
      </div>
     
      <div class="col-12 col-lg-6 d-flex flex-column align-items-start text-container">
        <h2 class="titre-rubrique3 ms-lg-5 mb-4">...inspirez des futurs étudiants</h2>
        <p class="corps-texte ms-lg-5">
        Avec votre expertise, guidez la nouvelle génération dans leurs choix d'études et démarches. 
        Faites la différence dès aujoud'hui en devenant un acteur clé de leur réussite !
        </p>
      </div>

    </div>
  </div>
</section>
    
   <?php get_footer(); ?>
    