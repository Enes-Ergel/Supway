<?php get_header(); ?>


   <article>
    <div class="contenedor1">
       <h1 class="titulo1">ILS ONT BESOIN DE VOUS</h1>
       <button type="button" class="btn btn-inscrire me-2">Devenez volontaire</button>
    </div>
    <div class="contenedor2">
       <h1 class="titulo2">RECEVEZ L'AIDE QUE VOUS REVEZ</h1>
       <button type="button" class="btn btn-inscrire me-2">Devenez bénéficiaire</button>
    </div>

  
  <?php
    $args=array('post_type'=>'post');
    $query= new WP_Query($args);
  ?>

    <?php if ($query->have_posts()) :?>
    <?php while ($query->have_posts()) : $query->the_post(); ?>
    <?php the_ID( ); ?>
    <?php the_post_thumbnail(); ?> <br/>


      <br/>

    <a href="<?php the_permalink(  ); ?>"><?php the_title(); ?></a>
    <?php the_excerpt(  ); ?><br/>
    <?php //the_content(); ?><br/>
<?php endwhile; ?>
<?php endif; ?>


   </article>
    
   <?php get_footer(); ?>
