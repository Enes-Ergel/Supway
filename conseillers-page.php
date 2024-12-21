 
 
 <?php /* Template Name: advisors page */ 
 
 if (!is_user_logged_in()) {
    // si je suis déjà connecté je suis redirigé vers la page home
   wp_redirect( esc_url(get_permalink(get_page_by_path('/sincrire'))) );
      exit;
  }
  

 get_header(); ?>




<?php get_footer(); ?>