
<?php get_header(); ?>


   <article>
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6"></div>
       <div class="textbutton">
          <h1 class="titulo1">Supway, la voie du supérieur</h1>
          <p class="textocontenedor1"> Tu te demandes quoi faire après la rhéto ? Ou tu cherches  à réorienter ta carrière mais tu ne sais pas par où commencer ? Bienvenue sur Supway ! </p>
            <button type="button" id= "azul" class="btn btn-inscrire me-2 ">Se connecter</button>
            <button type="button" id= "azul" class="btn btn-inscrire me-2 ">S'inscrire</button>
            <img class="imageintro" src="<?php echo get_template_directory_uri(); ?>./assets/img/student-page-intro.svg"/>

          
      </div>
    </div>
  </div>
    <div class="conteainer">
       <div class="texto">
          <p class="textocontenedor2"> Grâce à notre quiz interactif et à une communauté de conseillers passionnés, nous t’aidons à découvrir le chemin qui te correspond. Ces conseillers sont là pour t’accompagner et te permettre de t’insérer au mieux dans la section qui te correspond.</p>
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
    