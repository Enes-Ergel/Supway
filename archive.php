<?php get_header(); ?>

<?php single_term_title(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <?php the_ID(); ?>
        <?php the_post_thumbnail(); ?> 

        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <?php the_excerpt(); ?><br/>
        <?php // the_content(); ?><br/>
    <?php endwhile; ?>
<?php endif; ?>

<?php dynamic_sidebar("barra_lateral_1"); ?>
