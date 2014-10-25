<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Jory Simpson Theme' );
define( 'CHILD_THEME_URL', 'http://www.endboss.ca' );
define( 'CHILD_THEME_VERSION', '1.0' );

//* Enqueue Google Fonts
add_action( 'wp_enqueue_scripts', 'jsim_google_fonts' );
function jsim_google_fonts() {

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Montserrat|Open+Sans:700,300', array(), 1.0 );
}


//* Enqueue and Load Font Awesome

add_action( 'wp_enqueue_scripts', 'afn_enqueue_awesome' );
function afn_enqueue_awesome() {
	if ( !is_admin() ) {
		wp_enqueue_style( 'afn-font-awesome', get_bloginfo( 'stylesheet_directory' ) . '/css/font-awesome.min.css', array(), '4.0.3' );
	}
}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add new image sizes
add_image_size( 'portfolio-section', 800, '800', TRUE );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );


//* Register widget areas
genesis_register_sidebar( array(
	'id'          => 'hero-section',
	'name'        => __( 'Hero Section', 'jsim' ),
	'description' => __( 'This is the first section of the home page.', 'jsim' ),
) );
genesis_register_sidebar( array(
	'id'          => 'portfolio-section',
	'name'        => __( 'Portfolio Section', 'jsim' ),
	'description' => __( 'This is the fourth section of the home page.', 'jsim' ),
) );
