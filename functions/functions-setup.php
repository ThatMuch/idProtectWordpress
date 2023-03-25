<?php
/**
 * The starting point for setting up a new theme.
 * Go through this file to setup your preferences
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 *
 *
 */


/*=======================================================
Table of Contents:
–––––––––––––––––––––––––––––––––––––––––––––––––––––––––
  1.0 LOCALE SETTING
  2.0 FONTS
  3.0 GOOGLE TAG MANAGER
  4.0 OPEN TAG IMAGE
  5.0 SETUP WP-MENUS
  6.0 SETUP SIDEBARS
=======================================================*/



/*==================================================================================
  1.0 LOCALE SETTING
==================================================================================*/
// Define local time, date and language-location (PHP-only, does not affect WordPress)
// => http://php.net/manual/function.setlocale.php
setlocale(LC_ALL, 'fr_FR.UTF-8');



/*==================================================================================
  2.0 FONTS
==================================================================================*/


/* TYPEKIT
/––––––––––––––––––––––––*/
// enqueue Typekit font-kits => WPSeed_enqueue()
// add your Typekit Kit-ID or leave empty to not enqueue any kit
$typekit_id = '';


/* SELF-HOSTED
/––––––––––––––––––––––––*/
// preload self-hosted fonts => WPSeed_preload_fonts()
// set $preload_fonts to false to not preload fonts
$preload_fonts = true;
// define font-names and font-formats for all fonts that need preloading (usally the same as in assets/styles/fonts.scss)
$font_names = ['Raleway-Regular','Raleway-Italic','Raleway-Bold','Rubik-Medium','Rubik-Bold','Rubik-ExtraBold'];
$font_formats = ['ttf'];




/*==================================================================================
  3.0 GOOGLE TAG MANAGER
==================================================================================*/
// embed the GTM-scripts into head and body => idProtect_gtm()
// add your GTM_id (for example 'GTM-ABC1234') or leave empty to not enqueue any GTM-script
$GTM_id = '';



/*==================================================================================
  4.0 OPEN TAG IMAGE
==================================================================================*/
// open graph tags are returned by default => idProtect_ogtags()
// add your og-image credentials here or leave ['active', false] to not emped an og-image
$ogimg = [
  ['active', false],
  ['path', '/images/ogimg.jpg'],
  ['height', '300'],
  ['width', '400'],
  ['alt', 'true']
];



/*==================================================================================
  5.0 SETUP WP-MENUS
==================================================================================*/
// loads wordpress-menus, add your custom menus here or remove if not needed
// by default, only 'mainmenu' is shown
// => https://codex.wordpress.org/Function_Reference/register_nav_menus
function stanlee_register_theme_menus() {
  register_nav_menus([
    'mainmenu' => __('Mainmenu'),
    'submenu' => __('Submenu')
  ]);
}
add_action( 'init', 'stanlee_register_theme_menus');


function stanlee_widgets_init() {
  register_sidebar( array(
      'name'          => esc_html__( 'Sidebar par defaut', 'IdProtect' ),
      'id'            => 'sidebar-default',
      'description'   => esc_html__( 'Add widgets here.', 'IdProtect' ),
      'before_widget' => '<aside id="%1$s" class="%2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h2>',
      'after_title'   => '</h2>',
  ) );
  register_sidebar( array(
      'name'          => esc_html__( 'Sidebar particuliers', 'IdProtect' ),
      'id'            => 'sidebar-particuliers',
      'description'   => esc_html__( 'Add widgets here.', 'IdProtect' ),
      'before_widget' => '<aside id="%1$s" class="%2$s article__sidebar sidebar-part">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h2>',
      'after_title'   => '</h2>',
  ) );
  register_sidebar( array(
      'name'          => esc_html__( 'Sidebar professionnels', 'IdProtect' ),
      'id'            => 'sidebar-professionnels',
      'description'   => esc_html__( 'Add widgets here.', 'IdProtect' ),
      'before_widget' => '<aside id="%1$s" class="%2$s article__sidebar sidebar-pro">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h2>',
      'after_title'   => '</h2>',
  ) );
  register_sidebar( array(
      'name'          => esc_html__( 'Footer 1', 'stanlee' ),
      'id'            => 'footer-1',
      'description'   => esc_html__( 'Add widgets here.', 'stanlee' ),
      'before_widget' => '<div id="%1$s" class=" widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h4 class="widget-title">',
      'after_title'   => '</h4>',
  ) );
}
add_action( 'widgets_init', 'stanlee_widgets_init' );
// Custom search widget
 function my_search_form( $form ) {
  $form = '<form role="search" method="get" id="searchform" class="search-form" action="' . home_url( '/' ) . '" >
  <div><label>
  <input class="search-field form-control" placeholder="Rechercher" type="text" value="' . get_search_query() . '" name="s" id="s" />
  </label>
  </div>
  </form>';

  return $form;
}

add_filter( 'get_search_form', 'my_search_form', 100 );

// Register categories for pages
function add_categories_to_pages() {
    register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'add_categories_to_pages' );

// Ensure that pages are included in category archives
function display_pages_in_category_archives( $query ) {
    if ( $query->is_category() && $query->is_main_query() ) {
        $query->set( 'post_type', array( 'post', 'page' ) );
    }
}
add_action( 'pre_get_posts', 'display_pages_in_category_archives' );

?>
