<?php
/* Template Name: RegistrationPage */
if (is_user_logged_in()) {
  wp_redirect( home_url('/') );
	exit;
}

get_header();
// attention c'est important de faire les redirection avant le header sinon la redirection ne marche pas
?>

<form method="post" name="myForm">
  User <input type="text"  name="uname" />
  Email  <input id="email" type="text" name="uemail" />
  Password  <input type="password"  name="upass" />
  <input type="submit" value="Submit" />
</form>

<?php get_footer(); ?>