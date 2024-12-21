<?php get_header(); ?>
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
          class="img-fluid container-image2" 
          src="<?php echo get_template_directory_uri(); ?>/assets/img/student-page-intro.svg" 
          alt="Student Image">
      </div>
    </div>
  </div>
</section>

<section>
<div class="container-fluid rubrique2" style="background-color: #0097b2";>
      <div class="row">
        <div class="col-12 col-md-6 col-lg-6 order-1 order-md-2 order-lg-2">
          <p class="corps-texte2 d-flex justify-content-center align-items-center h-100">
          Grâce à notre quiz interactif et à une communauté de conseillers passionnés, nous t’aidons à découvrir le chemin qui te correspond. 
          Ces conseillers sont là pour t’accompagner et te permettre de t’insérer au mieux dans la section qui te correspond.
          </p>
        </div>
        <div class="col-12 col-md-6 col-lg-6 order-2 order-md-1 order-lg-1">
          <img class="img-fluid container-image2" src="<?php echo get_template_directory_uri(); ?>/assets/img/student-with-book.svg">
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

    <div class="col-12 col-lg-6 d-flex justify-content-center image-container order-2 order-md-2 order-lg-1">
        <img 
          class="img-fluid mb-5 me-5" 
          src="<?php echo get_template_directory_uri(); ?>/assets/img/conseiller-avec-pc.svg" 
          >
      </div>
     
      <div class="col-12 col-lg-6 d-flex flex-column align-items-start text-container order-1 order-md-1 order-lg-2">
        <h2 class="titre-rubrique3 ms-lg-5 mb-4">...inspirez des futurs étudiants</h2>
        <p class="corps-texte ms-lg-5 pb-sm-5 mb-sm-5">
        Avec votre expertise, guidez la nouvelle génération dans leurs choix d'études et démarches. 
        Faites la différence dès aujoud'hui en devenant un acteur clé de leur réussite !
        </p>
      </div>

    </div>
  </div>
</section>

<section>
    <div class="container-nosobjectifs">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2 class="nosobjectifs mt-5 mb-5">Nos objectifs</h2>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-lg-3">
                    <div class="card align-items-center mb-5">
                        <p class="card-text mt-4 ms-3 me-3">
                            Orienter les jeunes avec un quiz personnalisé qui recommande des filières et formations adaptées à leur profil.
                        </p>
                        <div>
                            <img id="picto1" class="mt-3" src="<?php echo get_template_directory_uri(); ?>/assets/img/Pictogrammes/graph.svg" alt="Graphique">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-1 text-center">
                    <img class="arrow" src="<?php echo get_template_directory_uri(); ?>/assets/img/Pictogrammes/arrow.svg" alt="Flèche">
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card align-items-center mb-5">
                        <p class="card-text mt-4 ms-3 me-3">
                            Offrir une aide individuelle à chaque étudiant(e) avec des conseillers prêts à les guider au mieux.
                        </p>
                        <img id="picto2" class="mt-4" src="<?php echo get_template_directory_uri(); ?>/assets/img/Pictogrammes/question.svg" alt="Question">
                    </div>
                </div>
                <div class="col-12 col-lg-1 text-center">
                    <img class="arrow" src="<?php echo get_template_directory_uri(); ?>/assets/img/Pictogrammes/arrow.svg" alt="Flèche">
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card align-items-center mb-5">
                        <p class="card-text mt-4 ms-3 me-3">
                            Créer une communauté d’étudiants qui partagent leurs expériences pour inspirer autrui.
                        </p>
                        <img id="picto3" class="mt-1" src="<?php echo get_template_directory_uri(); ?>/assets/img/Pictogrammes/community.svg" alt="Communauté">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
  <div class="container-fluid">
    <div class="row pt-5 ps-5 align-items-center">

     
      <div class="col-12 col-lg-6 d-flex flex-column align-items-start text-container">
       
        <p class="corps-texte ms-lg-5">
        Inscris-toi sur Supway pour accéder à un quiz d’orientation personnalisé et des conseillers 
        prêts à t’accompagner. Fais le premier pas vers ta réussite !
        </p>
      </div>
      <div class="col-12 col-lg-6  d-flex flex-column align-items-start text-container">
                <img class="me-5" src="<?php echo get_template_directory_uri(); ?>/assets/img/étudiant-avec-conseiller.svg">
      </div>


    </div>
  </div>
</section>



<?php get_footer(); ?> 