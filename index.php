<?php get_header(); ?>

<section>
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 d-flex flex-column align-items-start text-container">
                <h1 class="titre-homepage">Supway, la voie du supérieur</h1>
                <p class="corps-texte">
                    Tu te demandes quoi faire après la rhéto ? Ou tu cherches à réorienter ta carrière mais tu ne sais pas par où commencer ? Bienvenue sur Supway !
                </p>
                <div class="ms-lg-4 d-flex">
                    <a class="btn-index me-2" href="<?php echo esc_url(get_permalink(get_page_by_path('/sinscrire'))); ?>">S'inscrire</a>
                    <a class="btn-index1" href="<?php echo esc_url(get_permalink(get_page_by_path('/se-connecter'))); ?>">Se connecter</a>
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center image-container">
                <img id="image" class="img-fluid mt-5" src="<?php echo get_template_directory_uri(); ?>/assets/img/student-page-intro.svg" alt="Student Image">
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container-fluid rubrique2" style="background-color: #0097b2;">
        <div class="row">
            <div class="col-12 col-md-6 order-md-2">
                <p class="corps-texte2 d-flex justify-content-center align-items-center h-100 pt-5 me-lg-5">
                    Avec notre quiz interactif et une communauté de conseillers passionnés, nous t'accompagnons pour trouver la voie qui te correspond. 
                    Ces experts sont là pour te guider et t'aider à intégrer la filière qui te convient le mieux.
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-1 img-container2">
                <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/student-with-book.svg" alt="student with book">
            </div>
        </div>
    </div>
</section>

<section class="section-index"> 
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 d-flex flex-column align-items-start text-container">
                <h1 class="titre-homepage">Partagez vos expériences,...</h1>
                <p class="corps-texte">
                    Vous êtes étudiant, ancien élève ou membre du personnel éducatif ? Rejoignez la communauté Supway et aidez les jeunes sortant de rhéto à trouver leur chemin.
                </p>
                <div class="d-flex">
                    <a class="btn-rejoignez" href="mailto:supway@gmail.com">Rejoignez-nous !</a>
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center image-container">
                <img id="image" class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/student-with-smartphone 1.svg" alt="Student with smartphone">
            </div>
        </div>
    </div>
</section>

<section class="section-index">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 d-flex justify-content-center image-container order-lg-1">
                <img class="img-fluid pt-5" src="<?php echo get_template_directory_uri(); ?>/assets/img/conseiller-avec-pc.svg" alt="conseiller avec un pc">
            </div>
            <div class="col-12 col-lg-6 d-flex flex-column align-items-start text-container order-lg-2">
                <h2 class="titre-homepage">...inspirez des futurs étudiants</h2>
                <p class="corps-texte">
                    Avec votre expertise, guidez la nouvelle génération dans leurs choix d'études et démarches. Faites la différence dès aujourd'hui en devenant un acteur clé de leur réussite !
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
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-objectifs align-items-center mb-5">
                        <p class="card-text text-center mt-4 ms-3 me-3">
                            Orienter les jeunes avec un quiz personnalisé qui recommande des filières et formations adaptées à leur profil.
                        </p>
                        <div>
                            <img id="picto1" src="<?php echo get_template_directory_uri(); ?>/assets/img/Pictogrammes/graph.svg" alt="Graphique">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-objectifs align-items-center mb-5">
                        <p class="card-text text-center mt-4 ms-3 me-3">
                            Offrir une aide individuelle à chaque étudiant(e) avec des conseillers prêts à les guider au mieux.
                        </p>
                        <img id="picto1" src="<?php echo get_template_directory_uri(); ?>/assets/img/Pictogrammes/question.svg" alt="Question">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-objectifs align-items-center mb-5">
                        <p class="card-text text-center mt-4 ms-3 me-3">
                            Créer une communauté d’étudiants qui partagent leurs expériences pour inspirer autrui.
                        </p>
                        <img id="picto1" src="<?php echo get_template_directory_uri(); ?>/assets/img/Pictogrammes/community.svg" alt="Communauté">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-index">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 d-flex flex-column align-items-start text-container">
                <p class="corps-texte pt-5">
                    Inscris-toi sur Supway pour accéder à un quiz d’orientation personnalisé et des conseillers prêts à t’accompagner. Fais le premier pas vers ta réussite !
                </p>
            </div>
            <div class="col-12 col-lg-6 d-flex flex-column align-items-start text-container">
                <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/étudiant-avec-conseiller.svg" alt="étudiant avec conseiller">
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>