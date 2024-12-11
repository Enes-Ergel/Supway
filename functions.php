<?php 

function styles_scripts()
{
  wp_enqueue_style(
    'bootstrap',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'
  );
  wp_enqueue_style(
    'style',
    get_template_directory_uri() . '/estilooloco.css'
  );

  wp_enqueue_script(
    'bootstrap-bundle',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
    false,
    1,
    true
  );
  wp_enqueue_script(
    'app-js',
    get_template_directory_uri() . '/script.js',
    ['bootstrap-bundle'],
    1,
    true
  );
}
add_action('wp_enqueue_scripts', 'styles_scripts');

 
function wpdocs_theme_slug_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Barre lateral droite', 'textdomain' ),
		'id'            => 'barra_lateral_1',
	) );
}
add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init' );

// Agregar clases personalizadas a los <li> y <a>
/*
add_filter('nav_menu_css_class', 'agregar_clases_al_menu', 10, 3); //Le dice a WordPress que aplique la función agregar_clases_al_menu al filtro nav_menu_css_class, Este filtro permite modificar las clases CSS que WordPress agrega a los elementos <li> de los menús. El número 10 es la prioridad del filtro, y 3 significa que la función recibirá tres parámetros.
function agregar_clases_al_menu($classes, $item, $args) { //$classes: Es un array de clases CSS predeterminadas para el <li>. $item: Contiene información del elemento de menú (como el título, URL, etc.). $args: Contiene información sobre el menú que se está renderizando, incluyendo su ubicación (theme_location).
   if ($args->theme_location == 'menu_principal') { //Verifica si el menú que se está procesando tiene el identificador menu_principal (declarado al registrar el menú en functions.php). Si es el caso, agrega la clase nav-item (requerida por Bootstrap para los elementos <li>).
       $classes[] = 'nav-item'; // Clase Bootstrap para <li>
   }
   return $classes;
}



add_filter('nav_menu_link_attributes', 'agregar_clases_a_los_enlaces', 10, 3);
function agregar_clases_a_los_enlaces($atts, $item, $args) {
   if ($args->theme_location == 'menu_principal') {
       $atts['class'] = 'nav-link active'; // Clase Bootstrap para <a>
   }
   return $atts;
}
*/

register_nav_menu('header', 'En tête du menu');
function montheme_menu_class($classes) {
  $classes[] = 'nav-item';
  return $classes;
}
function montheme_menu_link_class($attrs) {
  $attrs['class'] = 'nav-link';
  return $attrs;
}

add_filter('nav_menu_css_class', 'montheme_menu_class');
add_filter('nav_menu_link_attributes', 'montheme_menu_link_class');

function create_account(){
	//You may need some data validation here
  $fname  = ( isset($_POST['fname']) && !empty($_POST['fname']) ) ? sanitize_text_field( $_POST['fname'] ) : '';
  $lname  = ( isset($_POST['lname']) && !empty($_POST['lname']) ) ? sanitize_text_field( $_POST['lname'] ) : '';
  $user   = ( isset($_POST['uname']) && !empty($_POST['uname']) ) ? sanitize_user( $_POST['uname'] ) : '';
  $email  = ( isset($_POST['uemail']) && !empty($_POST['uemail']) ) ? sanitize_email( $_POST['uemail'] ) : '';
  $pass   = ( isset($_POST['upass']) && !empty($_POST['upass']) ) ? sanitize_text_field( $_POST['upass'] ) : '';
  $repass = ( isset($_POST['repass']) && !empty($_POST['repass']) ) ? sanitize_text_field( $_POST['repass'] ) : '';

  

if ( $pass !== $repass ) {
    wp_die('Les mots de passe ne correspondent pas.');
}

  if ( username_exists( $user ) || email_exists( $email ) ) {
     wp_die('Le nom de utilisateur ou adresse électronique est déjà enregistré');
}

	if ( !username_exists( $user )  && !email_exists( $email ) ) {
		$user_login = wp_slash( $user );
		$user_email = wp_slash( $email );
		$user_pass = $pass;

     // Agregar nombre y apellido al arreglo de datos
		$userdata = compact('user_login', 'user_email', 'user_pass', 'first_name', 'last_name');
		$user_id = wp_insert_user($userdata);

		if( !is_wp_error($user_id) ) {
			// user has been created
			$user = new WP_User( $user_id );
			$user->set_role( 'contributor' ); // type d'user que je veux a ce moment la
			// redirection après connexion
			wp_redirect(esc_url(home_url('/')));
			exit;
		} else {
			//$user_id is a WP_Error object. Manage the error
		}
	}
}
add_action('init', 'create_account');

//Contact

add_action( 'admin_post_nopriv_process_form', 'send_mail_data' );
add_action( 'admin_post_process_form', 'send_mail_data' );

function send_mail_data() {

	$name = sanitize_text_field($_POST['name']);
	$email = sanitize_email($_POST['email']);
	$message = sanitize_textarea_field($_POST['message']);

	$adminmail = "destino@dominio.com"; 
	$subject = 'Formulaire de contact'; 
	$headers = "Reply-to: " . $name . " <" . $email . ">";

	$msg = "Nom: " . $name . "\n";
	$msg .= "E-mail: " . $email . "\n\n";
	$msg .= "Message: \n\n" . $message . "\n";

	$sendmail = wp_mail( $adminmail, $subject, $msg, $headers);

	wp_redirect( home_url("/?page_id=14")."?sent=".$sendmail ); 
}


add_filter('upload_mimes', 'allow_svg_uploads');
function allow_svg_uploads($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}


add_filter('wp_check_filetype_and_ext', 'sanitize_svg', 10, 4);
function sanitize_svg($file) {
  if ($file['type'] === 'image/svg+xml') {
      $file['ext'] = 'svg';
      $file['type'] = 'image/svg+xml';
  }
  return $file;
}
