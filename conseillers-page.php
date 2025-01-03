<?php /* Template Name: advisors page */ 
 
if (!is_user_logged_in()) {
    // si je suis déjà connecté je suis redirigé vers la page home
    wp_redirect(esc_url(get_permalink(get_page_by_path('/redirection'))));
    exit;
}

get_header(); ?>

<section>
    <div class="container-fluid">
        <div class="rubrique2">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 order-1 order-md-2 order-lg-2 d-flex flex-column justify-content-center align-items-start" data-aos="fade-left" data-aos-duration="1000" data-aos-offset="300">
                    <h2 class="titre-conseillers ms-lg-5 mb-4">Prenez la main sur votre avenir</h2>
                    <p class="ms-lg-5">
                        Avec Supway et ses conseillers, faites de votre orientation une réussite. Prenez rendez-vous avec un conseiller dès aujourd'hui et faites le premier pas vers un parcours qui vous ressemble.
                    </p>
                </div>
                <div class="col-12 col-md-6 col-lg-6 order-2 order-md-1 order-lg-1" data-aos="fade-right" data-aos-duration="1500">
                    <img  
                        class="img-fluid"
                        src="<?php echo get_template_directory_uri(); ?>/assets/img/image-pageconseillers.svg" 
                        alt="étudiant et conseiller"
                    >
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="slider-container section4 py-5">
        <h1 class="text-center mb-5">Nos Conseillers</h1>
        <div class="grid-conseillers row">
            <?php
            $args = array(
                'post_type' => 'profil_conseillers',
                'posts_per_page' => -1,
            );
            $query = new WP_Query($args);
            
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $travail = get_post_meta(get_the_ID(), '_travail', true);
                    $dispo = get_post_meta(get_the_ID(), '_dispo', true);
                    $conseillermail = get_post_meta(get_the_ID(), '_email', true); // Récupération de l'email
                    $image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
            ?>
                    <div class="col-12 col-md-6 col-lg-3 mb-4">
                        <div class="card-conseiller h-100 border-0 text-center">
                            <?php if ($image) : ?>
                                <img src="<?php echo esc_url($image); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                            <div>
                                <h5 class="card-conseiller-title"><?php the_title(); ?></h5>
                                <p class="card-conseiller-subtitle text-muted"><?php echo esc_html($travail); ?></p>
                                <hr>
                                <p class="card-conseiller-text"><strong>Disponibilité: &nbsp; </strong><?php echo esc_html($dispo); ?></p>
                                <?php if (!empty($conseillermail)) : ?>
                                    <a href="mailto:<?php echo esc_attr($conseillermail); ?>" 
                                       class="btn btn-success"
                                       onclick="window.location.href='mailto:<?php echo esc_attr($conseillermail); ?>'; return false;">
                                        Contacter
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p class="text-center">Aucun conseiller trouvé.</p>';
            endif;
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
