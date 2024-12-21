<?php /* Template Name: advisors page */ 

get_header(); ?>



<div class="container-conseillers">
    <h1>Nos Conseillers</h1>
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
            $disponibilite = get_post_meta(get_the_ID(), '_dispo', true); // Champ pour disponibilité
            $image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
            $dispo = get_post_meta(get_the_ID(), '_dispo', true);

        ?>
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 18rem;"> 
                    <?php if ($image): ?>
                        <img src="<?php echo esc_url($image); ?>" class="card-img-top" style="margin:none width=242px height=273px" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php the_title(); ?></h5>
                        <p class="card-subtitle text-muted"><?php echo esc_html($travail); ?></p>
                        <hr>
                        <p class="card-text"><strong>Disponibilité :</strong> <?php echo esc_html($dispo); ?></p>
                        <a href="#" class="btn btn-success">Contacter</a>
                    </div>
                </div>
            </div>
        <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>Aucun conseiller trouvé.</p>';
    endif;
    ?>
</div>
</div>
<?php get_footer(); ?>