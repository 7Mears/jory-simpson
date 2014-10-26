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

//* Remove the footer
 remove_action('genesis_footer', 'genesis_do_footer');
 remove_action('genesis_footer', 'genesis_footer_markup_open', 5);
 remove_action('genesis_footer', 'genesis_footer_markup_close', 15);

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




/**
 * http://wordpress.stackexchange.com/questions/29881/stop-wordpress-from-hardcoding-img-width-and-height-attributes
 * This is a modification of image_downsize() function in wp-includes/media.php
 * we will remove all the width and height references, therefore the img tag
 * will not add width and height attributes to the image sent to the editor.
 *
 * @param bool false No height and width references.
 * @param int $id Attachment ID for image.
 * @param array|string $size Optional, default is 'medium'. Size of image, either array or string.
 * @return bool|array False on failure, array on success.
 */
function myprefix_image_downsize( $value = false, $id, $size ) {
    if ( !wp_attachment_is_image($id) )
        return false;

    $img_url = wp_get_attachment_url($id);
    $is_intermediate = false;
    $img_url_basename = wp_basename($img_url);

    // try for a new style intermediate size
    if ( $intermediate = image_get_intermediate_size($id, $size) ) {
        $img_url = str_replace($img_url_basename, $intermediate['file'], $img_url);
        $is_intermediate = true;
    }
    elseif ( $size == 'thumbnail' ) {
        // Fall back to the old thumbnail
        if ( ($thumb_file = wp_get_attachment_thumb_file($id)) && $info = getimagesize($thumb_file) ) {
            $img_url = str_replace($img_url_basename, wp_basename($thumb_file), $img_url);
            $is_intermediate = true;
        }
    }

    // We have the actual image size, but might need to further constrain it if content_width is narrower
    if ( $img_url) {
        return array( $img_url, 0, 0, $is_intermediate );
    }
    return false;
}


/* Remove the height and width refernces from the image_downsize function.
 * We have added a new param, so the priority is 1, as always, and the new
 * params are 3.
 */
add_filter( 'image_downsize', 'myprefix_image_downsize', 1, 3 );
