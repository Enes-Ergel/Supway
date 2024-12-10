<?php get_header(); ?>

      hola enes
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-3"></div>
      <div class="contenedor1">
       <div class="textbutton">
          <h1 class="titulo1">Supway, la voie du supérieur</h1>
          <p class="textocontenedor1">Tu te demandes quoi faire après la rhéto ? Ou tu cherches  à réorienter ta carrière mais tu ne sais pas par où commencer ? Bienvenue sur Supway !</p>
          <a href="<?php echo home_url('/'); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>./assets/img/conseiller-with-pc.svg" alt="Description de l'image">
</a>
            <button type="button" id= "azul" class="btn btn-inscrire me-2 ">Se connecter</button>
            <button type="button" id= "azul" class="btn btn-inscrire me-2 ">S'inscrire</button>
          
      </div>
    </div>
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
    