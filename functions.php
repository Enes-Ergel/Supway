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
add_action('wp_enqueue_style', 'ajouter_google_fonts');

 
function wpdocs_theme_slug_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Barre lateral droite', 'textdomain' ),
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

//cree compte

add_action('init', 'create_account');
function create_account() {
  $user   = (isset($_POST['uname']) && !empty($_POST['uname'])) ? sanitize_user($_POST['uname']) : '';
  $email  = (isset($_POST['uemail']) && !empty($_POST['uemail'])) ? sanitize_email($_POST['uemail']) : '';
  $pass   = (isset($_POST['upass']) && !empty($_POST['upass'])) ? sanitize_text_field($_POST['upass']) : '';
  $repass = (isset($_POST['repass']) && !empty($_POST['repass'])) ? sanitize_text_field($_POST['repass']) : '';

  if ($pass !== $repass) {
      wp_die('Les mots de passe ne correspondent pas.');
  }

  if (username_exists($user) || email_exists($email)) {
      wp_die('Le nom de utilisateur ou adresse électronique est déjà enregistré');
  }

  if (!username_exists($user) && !email_exists($email)) {
      $user_login = wp_slash($user);
      $user_email = wp_slash($email);
      $user_pass = $pass;
      
      $userdata = compact('user_login', 'user_email', 'user_pass');
      $user_id = wp_insert_user($userdata);

      if (!is_wp_error($user_id)) {
          $user = new WP_User($user_id);
          $user->set_role('suscriptor');

        
          wp_set_current_user($user_id);
          wp_set_auth_cookie($user_id);
          do_action('wp_login', $user->user_login, $user);

          wp_redirect(esc_url(home_url('/')));
          exit;
      }
  }
}

add_action('wp_login_failed', 'custom_login_failed_redirect');

    function custom_login_failed_redirect($username) {
        wp_redirect(esc_url(get_permalink(get_page_by_path('se-connecter'))) . '?error=login_failed');
        exit;
}

add_filter('authenticate', 'custom_login_authenticate_redirect', 30, 3);
function custom_login_authenticate_redirect($user, $username, $password) {
  if (is_wp_error($user)) {
    if (isset($user->errors['empty_username']) || isset($user->errors['empty_password'])) {
        wp_redirect(esc_url(get_permalink(get_page_by_path('se-connecter'))) . '?error=empty_login');
        exit;
      }
  }
  return $user;
}

 //charger image svg
add_filter('upload_mimes', 'enable_svg_upload');
function enable_svg_upload($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}


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
    
    wp_nonce_field('sauvegarder_metabox_profils', 'metabox_profils_nonce');
    
    
    $travail = get_post_meta($post->ID, '_travail', true);
    $email = get_post_meta($post->ID, '_email', true);
    $numero = get_post_meta($post->ID, '_numero', true);
    $dispo = get_post_meta($post->ID, '_dispo', true);
    ?>
    
    <p>
        <label for="travail">Poste de Travail :</label>
        <input type="text" id="travail" name="travail" value="<?php echo esc_attr($travail); ?>" style="width:100%;">
    </p>
    <p>
        <label for="dispo">Disponibilité :</label>
        <input type="text" id="dispo" name="dispo" value="<?php echo esc_attr($dispo); ?>" style="width:100%;">
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
  
    if (!isset($_POST['metabox_profils_nonce']) || 
        !wp_verify_nonce($_POST['metabox_profils_nonce'], 'sauvegarder_metabox_profils')) {
        return;
    }

    // Verificar si es un autoguardado
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Verificar permisos
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Guardar los campos
    if (isset($_POST['travail'])) {
        update_post_meta($post_id, '_travail', sanitize_text_field($_POST['travail']));
    }

    if (isset($_POST['dispo'])) {
        update_post_meta($post_id, '_dispo', sanitize_text_field($_POST['dispo']));
    }

    if (isset($_POST['email'])) {
        update_post_meta($post_id, '_email', sanitize_email($_POST['email']));
    }

    if (isset($_POST['numero'])) {
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

add_filter('show_admin_bar', function($show) {
  return current_user_can('administrator') ? $show : false;
});