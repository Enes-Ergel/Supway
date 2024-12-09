<?php 
/*
add_action( 'after_setup_theme', 'instalarTemplate' ); //le estoy pidiendo de hacer la instalaicon del tema, dada por la palabra instalar template
 function instalarTemplate(){
    register_nav_menus(array('main-menu'=>esc_html__('Menu principal', '')) ); //aqui estoy registranfo el menu principal en wordpress
 }
 */


/*
 add_action('wp_enqueue_scripts','scriptsTemplate'); //le pedi que con esta accion se agregara los scriptstemplate
    function scriptsTemplate(){
        wp_enqueue_style('style', get_stylesheet_uri(  ));
        wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css');
        wp_enqueue_script('jquery');
   }
    

*/

add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('menus');

register_nav_menu('header', 'En tête du menu');
register_nav_menu('footer', 'En pied du menu');
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
    ['bootstrap-bundle'],
    1,
    true
  );
  wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'styles_scripts');

 // registo de side bars (area de widgets)-->


/*function iniciarWidgets(){
  
       resgister_sidebar ( array (
                          'name' => esc_html__(''),
                          'id' => ''
                          ) );
}
add_action( 'init','iniciarWidgets' );*/

/**
 * Add a sidebar.
 */
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
	$user = ( isset($_POST['uname']) ? $_POST['uname'] : '' );
	$pass = ( isset($_POST['upass']) ? $_POST['upass'] : '' );
	$email = ( isset($_POST['uemail']) ? $_POST['uemail'] : '' );

	if ( !username_exists( $user )  && !email_exists( $email ) ) {
		$user_login = wp_slash( $user );
		$user_email = wp_slash( $email );
		$user_pass = $pass;

		$userdata = compact('user_login', 'user_email', 'user_pass');
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



function create_post_type()
{
  register_post_type('quiz', [
    'labels' => ['name' => 'Quiz'],
    'supports' => ['title', 'editor', 'thumbnail'],
    'public' => true,
    'has_archive' => true,
    'rewrite' => ['slug' => 'quiz']
  ]);
}
add_action('init', 'create_post_type');
