
<?php get_header(); ?>


<section>
  <div class="container-fluid">
    <div class="row  align-items-center">
    
      <div class="col-12 col-lg-6 d-flex flex-column align-items-start text-container">
        <h1 class="titre-homepage">Supway, la voie du supérieur</h1>
        <p class="corps-texte ">
          Tu te demandes quoi faire après la rhéto ? Ou tu cherches à réorienter ta carrière mais tu ne sais pas par où commencer ? Bienvenue sur Supway !
        </p>

       
        <div class="ms-lg-4 d-flex">
          <a class="btn-index me-2" href="<?php echo esc_url(get_permalink(get_page_by_path('/sinscrire'))); ?>">S'inscrire</a>
          <a class="btn-index1" href="<?php echo esc_url(get_permalink(get_page_by_path('/se-connecter'))); ?>">Se connecter</a>
        </div>
      </div>

     
      <div class="col-12 col-lg-6 d-flex justify-content-center image-container">
        <img 
          class="img-fluid mt-5" 
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
        <div class="image-container col-12 col-md-6 col-lg-6 order-2 order-md-1 order-lg-1">
          <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/student-with-book.svg">
      </div>
     </div>
  </section>

<section class="section-index">
  <div class="container-fluid">
    <div class="row ">
     
      <div class="col-12 col-lg-6 d-flex flex-column align-items-start justify-content-center text-container">
        <h1 class="titre-homepage">Partagez vos expériences,...</h1>
        <p class="corps-texte">
          Vous êtes étudiant, ancien élève ou membre du personnel éducatif ? Rejoignez la communauté Supway et aidez les jeunes sortant de rhéto à trouver leur chemin.
        </p>
       
        <a 
          class="btn-rejoignez text-start" href="mailto:supway@gmail.com">Nous contacter
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

<section class="section-index">
  <div class="container-fluid">
    <div class="row align-items-center">

    <div class="col-12 col-lg-6 d-flex justify-content-center image-container order-2 order-md-2 order-lg-1">
        <img 
          class="img-fluid" 
          src="<?php echo get_template_directory_uri(); ?>/assets/img/conseiller-avec-pc.svg" 
          >
      </div>
     
      <div class="col-12 col-lg-6 d-flex flex-column align-items-start text-container order-1 order-md-1 order-lg-2">
        <h2 class="titre-homepage">...inspirez des futurs étudiants</h2>
        <p class="corps-texte ">
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
            <div class="row justify-content-center align-items-center">
                <div class="col-12">
                    <h2 class="nosobjectifs mt-5 mb-5">Nos objectifs</h2>
                </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-4">
            <div class="card align-items-center" style="width: 23rem; height: 35rem">
            <img 
            class="p-3" 
            src="<?php echo get_template_directory_uri(); ?>/assets/img/objectif1.svg" 
            >
            <div class="card-body">
              <p class="card-text text-center mt-lg-5">Orienter les jeunes avec un quiz personnalisé qui recommande des filières et formations adaptées à leur profil.</p>
            </div>
        </div>
      </div>  
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card align-items-center" style="width: 23rem; height: 35rem">
            <img
            class="p-2" 
            src="<?php echo get_template_directory_uri(); ?>/assets/img/objectif2.svg" 
            >
            <div class="card-body">
              <p class="card-text text-center mt-lg-5">Offrir une aide individuelle à chaque étudiant(e) avec des conseillers prêts à les guider au mieux.</p>
            </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card align-items-center" style="width: 23rem; height: 35rem">
            <img 
            class="p-2 mt-5 pt-5" 
            src="<?php echo get_template_directory_uri(); ?>/assets/img/objectif3.svg" 
            >
            <div class="card-body">
              <p class="card-text text-center mt-lg-5 pt-lg-4">Créer une communauté d’étudiants qui partagent leurs expériences pour ainsi, à leur tour, viennent en aide aux autres !</p>
            </div>
        </div>
      </div>  
</section>

<section class="section-index">
  <div class="container-fluid">
    <div class="row  align-items-center">

     
      <div class="col-12 col-lg-6 d-flex flex-column align-items-start text-container">
       
        <p class="corps-texte">
        Inscris-toi sur Supway pour accéder à un quiz d’orientation personnalisé et des conseillers 
        prêts à t’accompagner. Fais le premier pas vers ta réussite !
        </p>
      </div>
      <div class="col-12 col-lg-6  d-flex flex-column align-items-start text-container">
                <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/étudiant-avec-conseiller.svg">
          </div>
        </div>
      </div>
    </div>
    </section>
    
   <?php get_footer(); ?>

   

    