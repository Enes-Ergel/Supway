<?php 

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
    'css-layout',
    'https://cdnjs.cloudflare.com/ajax/libs/css-layout/1.1.1/css-layout.min.js',
    array(),
    '1.1.1',
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
add_action('wp_enqueue_scripts', 'styles_scripts', 'cargar_css_layout_script');

 
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
  wp_redirect(home_url('/se-connecter/?login=failed'));
  exit;
}

add_filter('authenticate', 'custom_login_authenticate_redirect', 30, 3);
function custom_login_authenticate_redirect($user, $username, $password) {
  if (is_wp_error($user)) {
      if (isset($user->errors['empty_username']) || isset($user->errors['empty_password'])) {
          wp_redirect(home_url('/se-connecter/?login=empty'));
          exit;
      }
  }
  return $user;
}


//Contact

add_action( 'admin_post_nopriv_process_form', 'send_mail_data' );
add_action( 'admin_post_process_form', 'send_mail_data' );



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


function afficher_metabox_profils($post) {
  // Récupérer les métadonnées associées au post
  $travail = get_post_meta($post->ID, '_travail', true);
  $email = get_post_meta($post->ID, '_email', true);
  $numero = get_post_meta($post->ID, '_numero', true);
  $image_id = get_post_meta($post->ID, '_image', true);
    $image_url = $image_id ? wp_get_attachment_image_src($image_id, 'thumbnail')[0] : '';
  
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
  <div>
        <img id="imagen-preview" src="<?php echo esc_url($image_url); ?>" style="max-width:100%; height:auto;">
        <input type="hidden" id="imagen-id" name="image" value="<?php echo esc_attr($image_id); ?>">
        <button type="button" class="button" id="subir-imagen"><?php _e('Publier image', 'textdomain'); ?></button>
        <button type="button" class="button" id="eliminar-imagen"><?php _e('Eliminer image', 'textdomain'); ?></button>
    </div>

  

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
  if (isset($_POST['image'])) {
    update_post_meta($post_id, '_image', sanitize_text_field($_POST['image']));
}
}

function charger_script_metabox($hook) {
  global $post_type;

  // Charger uniquement sur le type de post 'profil_conseillers'
  if ($post_type === 'profil_conseillers' && ($hook === 'post-new.php' || $hook === 'post.php')) {
      wp_enqueue_script(
          'admin-metabox-photo',
          get_template_directory_uri() . '/js/admin-metabox.js', // Modifiez ce chemin si nécessaire
          array('jquery', 'wp-mediaelement'), // Dépendances
          null,
          true // Charger dans le footer
      );

      // Assurer que l'API media de WordPress est disponible
      wp_enqueue_media();
  }
}
add_action('admin_enqueue_scripts', 'charger_script_metabox');




add_action('init', 'enregistrer_quiz');
function enregistrer_quiz_post_type() {
  $labels = array(
      'name'               => 'Quiz',
      'singular_name'      => 'Question',
      'add_new'            => 'Ajouter une nouvelle question',
      'add_new_item'       => 'Ajouter une nouvelle question',
      'edit_item'          => 'Modifier la question',
      'new_item'           => 'Nouvelle question',
      'view_item'          => 'Voir la question',
      'search_items'       => 'Rechercher des questions',
      'not_found'          => 'Aucune question trouvé',
      'not_found_in_trash' => 'Aucune question trouvé dans la corbeille',
      'menu_name'             => 'Questions Quiz',
  );

  $args = array(
      'labels'             => $labels,
      'public'             => true,
      'has_archive'        => false,
      'rewrite'            => array('slug' => 'Quiz'),
      'supports'           => array('title', 'thumbnail', 'editor'),
      'menu_icon'          => 'dashicons-id',
  );

  register_post_type('quiz', $args);


  

}