<?php /* Template Name: advisors page */ 

get_header(); ?>


<section>
  <div class="container-fluid rubrique2" style="background-color: #0097b2;">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-6 order-1 order-md-2 order-lg-2">
        
        <h2 class="titre-rubrique3 ms-lg-5 mb-4">Prenez la main sur votre avenir</h2>
        <p class="corps-texte2">
        Avec Supway et ses conseillers, faites de votre orientation une réussite. Prenez rendez-vous avec un conseiller dès aujourd'hui et faites le premier pas vers un parcours qui vous ressemble.
        </p>
      </div>
      <div class="col-12 col-md-6 col-lg-6 order-2 order-md-1 order-lg-1">
        <img class="img-fluid container-image2" src="<?php echo get_template_directory_uri(); ?>/assets/img/image-pageconseillers.svg">
      </div>
    </div>
  </div>
</section>


  
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
                $disponibilite = get_post_meta(get_the_ID(), '_dispo', true); // Champ para disponibilidad
                $image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                $dispo = get_post_meta(get_the_ID(), '_dispo', true);
        ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 text-center">
                        <?php if ($image) : ?>
                            <img src="<?php echo esc_url($image); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php the_title(); ?></h5>
                            <p class="card-subtitle text-muted"><?php echo esc_html($travail); ?></p>
                            <hr>
                            <p class="card-text"><strong>Disponibilidad:</strong> <?php echo esc_html($dispo); ?></p>
                            <a href="mailto:<?php echo esc_attr($email); ?>" class="btn btn-success">Contacter</a>
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



<?php get_footer(); ?>