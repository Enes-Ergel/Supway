<?php
/* Template Name: RegistrationPage */
if (is_user_logged_in()) {
  wp_redirect( home_url('/') );
	exit;
}

get_header();
// attention c'est important de faire les redirection avant le header sinon la redirection ne marche pas
?>

<div class="container">
   <div class="row">

     <form method="post" name="myForm">
       User <input type="text"  name="uname" />
       Email  <input id="email" type="text" name="uemail" />
       Password  <input type="password"  name="upass" />
     <input type="submit" value="Submit" />

     <p id="textepasinscrit">Déjà membre ? <a href=" <?php echo esc_url(get_permalink(get_page_by_path('?page_id=58')));  ?>"> Se connecter</a></p>
	  
      <input id="#buttoninscrit" type="submit" name="submit" value="Se connecter">
		<input type="hidden" name="redirect_to" value="<?php echo esc_url( home_url('/') ); ?>">

     </form>
    


   </div>

</div>

<?php get_footer(); ?>