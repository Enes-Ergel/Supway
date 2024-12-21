 
 
 <?php /* Template Name: advisors page */ 
 
 if (!is_user_logged_in()) {
    // si je suis déjà connecté je suis redirigé vers la page home
   wp_redirect( esc_url(get_permalink(get_page_by_path('/sincrire'))) );
      exit;
  }
  

 get_header(); ?>

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