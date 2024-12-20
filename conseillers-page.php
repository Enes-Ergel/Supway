<?php /* Template Name: advisors page */ 

if (!is_user_logged_in()) {
    // si l'utilisateur n'est pas connecté, redirection vers une autre page
    wp_redirect( esc_url(get_permalink(get_page_by_path('/redirection'))) );
    exit;
}

get_header(); ?>
<div class="container-fluid">
<div class="container-conseillers">
    <h1>Nos Conseillers</h1>
    
    <div id="carouselAdvisors" class="carousel slide">
        <div class="carousel-inner">
            <?php
            $args = array(
                'post_type' => 'profil_conseillers',
                'posts_per_page' => -1, 
            );

            $query = new WP_Query($args);
            $is_first = true; // Pour gérer la classe "active" du premier élément

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    
                    $travail = get_post_meta(get_the_ID(), '_travail', true);
                    $dispo = get_post_meta(get_the_ID(), '_dispo', true);
                    $email = get_post_meta(get_the_ID(), '_email', true);
                    $numero = get_post_meta(get_the_ID(), '_numero', true);
                    $image = get_the_post_thumbnail_url(get_the_ID(), 'medium'); 
            ?>
                    <div class="carousel-item <?php echo $is_first ? 'active' : ''; ?>">
                        <div class="conseiller">
                            <?php if ($image): ?>
                                <img src="<?php echo esc_url($image); ?>" class="image-conseiller" alt="<?php the_title_attribute(); ?>">
                            <?php endif; ?>
                            <div class="carousel-caption d-block text-top-right">
                            <h2><?php the_title(); ?></h2>
                            <p><strong><?php echo esc_html($travail); ?></strong></p>
                            <p><strong>Disponibilité :</strong> <?php echo esc_html($dispo); ?></p>
                            <p><strong>Email :</strong> <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></p>
                            <p><strong>Numéro :</strong> <a href="tel:<?php echo esc_attr($numero); ?>"><?php echo esc_html($numero); ?></a></p>
                            <div class="description">
                            <?php the_content(); ?>
                        </div>
                    </div>

                        </div>
                    </div>
            <?php
                    $is_first = false; // Une fois le premier élément traité, le reste n'est pas "active"
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>Aucun conseiller trouvé.</p>';
            endif;
            ?>
        </div>
        <!-- Boutons de navigation -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselAdvisors" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselAdvisors" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>
</div>
</div>
<?php get_footer(); ?>
