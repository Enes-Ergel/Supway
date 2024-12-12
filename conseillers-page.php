<?php /* Template Name: advisors page */ get_header(); ?>

<div class="container-conseillers">
    <h1>Nos Conseillers</h1>
    <div class="grid-conseillers">
        <?php
       
        $args = array(
            'post_type' => 'profil_conseillers',
            'posts_per_page' => -1, 
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                
                $travail = get_post_meta(get_the_ID(), '_travail', true);
                $email = get_post_meta(get_the_ID(), '_email', true);
                $numero = get_post_meta(get_the_ID(), '_numero', true);
                $image = get_the_post_thumbnail_url(get_the_ID(), 'medium'); 
        ?>
                <div class="conseiller">
                    <?php if ($image): ?>
                        <img src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>" class="image-conseiller">
                    <?php endif; ?>
                    <h2><?php the_title(); ?></h2>
                    <p><strong> <?php echo esc_html($travail); ?> </strong> </p>
                    <br>
                    <div class="description">
                        <?php the_content(); ?>
                    </div>
                    <br>
                    <br>
                    <p><strong>Email :</strong> <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></p>
                    <p><strong>Numéro :</strong> <a href="tel:<?php echo esc_attr($numero); ?>"><?php echo esc_html($numero); ?></a></p>
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