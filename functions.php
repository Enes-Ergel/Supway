<?php
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('menus');

function styles_scripts()
{
  wp_enqueue_style(
    'bootstrap',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'
  );
  wp_enqueue_style(
    'style',
    get_template_directory_uri() . '/style.css'
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
    array('jquery'),
    ['bootstrap-bundle'],
    1,
    true
  );
}
function ajouter_slick() {
  wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true);
  wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
  wp_enqueue_style('slick-theme', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');
}
add_action('wp_enqueue_scripts', 'ajouter_slick');

wp_enqueue_script('jquery');
add_action('wp_enqueue_scripts', 'styles_scripts');

function ajouter_google_fonts() {
  wp_enqueue_style('google-fonts-lato', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap', false);
}
add_action('wp_enqueue_style', 'ajouter_google_fonts');

 
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
		
     $userdata = compact('user_login', 'user_email', 'user_pass');
     $userdata['first_name'] = $fname;
     $userdata['last_name'] = $lname;  

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

function enable_svg_upload($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'enable_svg_upload');

/* profiles pour consultants */

add_action('init', 'enregistrer_cpt_profils_conseillers');
function enregistrer_cpt_profils_conseillers() {
  $labels = array(
      'name'               => 'Profils conseillers',
      'singular_name'      => 'Profil',
      'add_new'            => 'Ajouter un Nouveau Profil',
      'add_new_item'       => 'Ajouter un Nouveau Profil',
      'edit_item'          => 'Modifier le Profil',
      'new_item'           => 'Nouveau Profil',
      'view_item'          => 'Voir le Profil',
      'search_items'       => 'Rechercher des Profils',
      'not_found'          => 'Aucun profil trouvé',
      'not_found_in_trash' => 'Aucun profil trouvé dans la corbeille',
  );

  $args = array(
      'labels'             => $labels,
      'public'             => true,
      'has_archive'        => false,
      'rewrite'            => array('slug' => 'profil-conseillers'),
      'supports'           => array('title', 'thumbnail', 'editor'),
      'menu_icon'          => 'dashicons-id',
  );

  register_post_type('profil_conseillers', $args);
}

add_action('add_meta_boxes', 'ajouter_metabox_profils');
add_action('save_post', 'sauvegarder_metabox_profils');

function ajouter_metabox_profils() {
  add_meta_box(
      'info_profil',
      'Informations du Profil',
      'afficher_metabox_profils',
      'profil_conseillers',
      'normal',
      'default'
  );
}

function afficher_metabox_profils($post) {
 
  $travail = get_post_meta($post->ID, '_travail', true);
  $email = get_post_meta($post->ID, '_email', true);
  $numero = get_post_meta($post->ID, '_numero', true);
  
  ?>
  <p>
      <label for="travail">Poste de Travail :</label>
      <input type="text" id="travail" name="travail" value="<?php echo esc_attr($travail); ?>" style="width:100%;">
  </p>
  <p>
      <label for="email">Email :</label>
      <input type="email" id="email" name="email" value="<?php echo esc_attr($email); ?>" style="width:100%;">
  </p>
  <p>
      <label for="numero">Numéro de Téléphone :</label>
      <input type="text" id="numero" name="numero" value="<?php echo esc_attr($numero); ?>" style="width:100%;">
  </p>
  
    
  <?php
}

function sauvegarder_metabox_profils($post_id) {
 
  if (array_key_exists('travail', $_POST)) {
      update_post_meta($post_id, '_travail', sanitize_text_field($_POST['travail']));
  }
  
  if (array_key_exists('email', $_POST)) {
      update_post_meta($post_id, '_email', sanitize_email($_POST['email']));
  }
 
  if (array_key_exists('numero', $_POST)) {
      update_post_meta($post_id, '_numero', sanitize_text_field($_POST['numero']));
  }
  
}
add_action('init', 'register_quiz_question_post_type');
function register_quiz_question_post_type() {
  $labels = array(
      'name'               => 'Quiz questions',
      'singular_name'      => 'Questions',
      'add_new'            => 'Ajouter une Nouvelle Question',
      'add_new_item'       => 'Ajouter une Nouvelle Question',
      'edit_item'          => 'Modifier la Question',
      'new_item'           => 'Nouvelle Question',
      'view_item'          => 'Voir la Question',
      'search_items'       => 'Rechercher des Questions',
      'not_found'          => 'Aucune question trouvé',
      'not_found_in_trash' => 'Aucune question trouvé dans la corbeille',
  );

    $args = array ( 
      'labels'             => $labels,
      'public'             => true,
      'has_archive'        => false,
      'rest_base'          => 'quiz-question',
      'menu_position'      => 20,
      'menu_icon'          => 'dashicons-welcome-learn-more',
      'rewrite'            => array('slug' => 'profil-conseillers'),
      'supports'           => array('title', 'thumbnail', 'editor'),

    );


  register_post_type('quiz_question', $args);
}

