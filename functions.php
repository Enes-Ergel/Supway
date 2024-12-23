<?php
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('menus');

function styles_scripts() {
  wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css');
  wp_enqueue_style('app-css', get_template_directory_uri() . '/assets/css/app.css', array(), file_exists(get_template_directory() . '/assets/css/app.css') ? filemtime(get_template_directory() . '/assets/css/app.css') : '1.0');
  wp_enqueue_style('bootstrap-icons', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css');
  wp_enqueue_script('bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), null, true);

  wp_enqueue_style(
      'google-fonts',
      'https://fonts.googleapis.com/css2?family=ADLaM+Display&family=Almarai:wght@300;400;700;800&display=swap',
      [],
      null
  );

  wp_enqueue_script('app-js', get_template_directory_uri() . '/assets/js/app.js', array('bootstrap-bundle'), file_exists(get_template_directory() . '/assets/js/app.js') ? filemtime(get_template_directory() . '/assets/js/app.js') : '1.0', true);
}
add_action('wp_enqueue_scripts', 'styles_scripts');

function ajouter_google_fonts() {
  wp_enqueue_style('google-fonts-lato', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap', false);
}
add_action('wp_enqueue_scripts', 'ajouter_google_fonts');

function wpdocs_theme_slug_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Barre latérale droite', 'textdomain' ),
		'id'            => 'barra_lateral_1',
	) );
}
add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init' );

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

      $userdata = compact('user_login', 'user_email', 'user_pass');

      $user_id = wp_insert_user($userdata);

      if( !is_wp_error($user_id) ) {
          $user = new WP_User( $user_id );
          $user->set_role( 'contributor' ); 

          wp_redirect(esc_url(home_url('/')));
          exit;
      }
  }
}
add_action('init', 'create_account');

add_action('wp_login_failed', 'custom_login_failed_redirect');
function custom_login_failed_redirect($username) {
    $redirect_url = home_url('/se-connecter/?login=failed'); 
    wp_redirect($redirect_url);
    exit;
}

add_filter('authenticate', 'custom_login_authenticate_redirect', 30, 3);
function custom_login_authenticate_redirect($user, $username, $password) {
    if (is_wp_error($user)) {
        $redirect_url = home_url('/se-connecter/?login=empty'); 
        if (isset($user->errors['empty_username']) || isset($user->errors['empty_password'])) {
            wp_redirect($redirect_url);
            exit;
        }
    }
    return $user;
}

add_action( 'admin_post_nopriv_process_form', 'send_mail_data' );
add_action( 'admin_post_process_form', 'send_mail_data' );
function send_mail_data() {
	$name = sanitize_text_field($_POST['name']);
	$email = sanitize_email($_POST['email']);
	$message = sanitize_textarea_field($_POST['message']);

	$adminmail = get_option('admin_email'); 
	$subject = 'Formulaire de contact'; 
	$headers = "Reply-to: " . $name . " <" . $email . ">";

	$msg = "Nom: " . $name . "\n";
	$msg .= "E-mail: " . $email . "\n\n";
	$msg .= "Message: \n\n" . $message . "\n";

	$sendmail = wp_mail( $adminmail, $subject, $msg, $headers);

	wp_redirect(esc_url(home_url('/')));
}

function enable_svg_upload($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'enable_svg_upload');

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
add_action('init', 'enregistrer_cpt_profils_conseillers');
