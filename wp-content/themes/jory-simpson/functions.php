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

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:100,400,700', array(), 1.0 );

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
add_image_size( 'portfolio-section', 360, '400', TRUE );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Remove the footer
 remove_action('genesis_footer', 'genesis_do_footer');
 remove_action('genesis_footer', 'genesis_footer_markup_open', 5);
 remove_action('genesis_footer', 'genesis_footer_markup_close', 15);

//* Register widget areas
genesis_register_sidebar( array(
	'id'          => 'portfolio-section',
	'name'        => __( 'Portfolio Section', 'jsim' ),
	'description' => __( 'This is the fourth section of the home page.', 'jsim' ),
) );


//* Removes all Post Meta from post page -JM
//* http://wpsites.net/web-design/modify-post-info-genesis/
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

//* Removes post comments and post edit from post page -JM
add_filter( 'genesis_post_info', 'remove_post_info_exclude_news_category' );

function remove_post_info_exclude_news_category($post_info) {
if ( is_category('web-design') ) {
	$post_info = '[post_comments] [post_edit]';
	return $post_info;
}
   }

//* Adds shortcodes to widgets
add_filter('widget_text', 'do_shortcode');


//*
//* Everything below is for WooCommerce
//*

//* Changes product button text to 'Buy' instead of default
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 +

function woo_custom_cart_button_text() {

        return __( 'Buy', 'woocommerce' );

}
// * Unhook sidebar
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
//* Remove the related posts
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
//* Remove breadcrumbs
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

// Remove stylesheets from woocommerce
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	return $enqueue_styles;
}
