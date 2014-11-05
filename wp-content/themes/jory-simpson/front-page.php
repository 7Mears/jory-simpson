<?php
/**
 * This file adds the Home Page to the Jory Simpson Theme.
 *
 * @author EndBoss
 * @package Jsim
 * @subpackage Customizations
 */

add_action( 'wp_enqueue_scripts', 'jsim_enqueue_home_scripts' );
/**
 * Enqueue Scripts
 */
function jsim_enqueue_home_scripts() {

	wp_enqueue_script( 'jsim-home', get_bloginfo( 'stylesheet_directory' ) . '/js/home.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'localScroll', get_stylesheet_directory_uri() . '/js/jquery.localScroll.min.js', array( 'scrollTo' ), '1.2.8b', true );
	wp_enqueue_script( 'scrollTo', get_stylesheet_directory_uri() . '/js/jquery.scrollTo.min.js', array( 'jquery' ), '1.4.5-beta', true );

}

add_action( 'genesis_meta', 'jsim_home_genesis_meta' );
/**
 * Add widget support for homepage. If no widgets active, display the default loop.
 *
 */
function jsim_home_genesis_meta() {

	if ( is_active_sidebar( 'portfolio-section' ) ) {

		//* Force full width content layout
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

		//* Add jsim-pro-home body class
		add_filter( 'body_class', 'jsim_body_class' );

		//* Remove breadcrumbs
		remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

		//* Remove the default Genesis loop
		remove_action( 'genesis_loop', 'genesis_do_loop' );

		//* Add home widgets
		add_action( 'genesis_before_footer', 'jsim_home_widgets', 5 );

	}
}

function jsim_body_class( $classes ) {

	$classes[] = 'jsim-pro-home';
	return $classes;

}

function jsim_home_widgets() {

	genesis_widget_area( 'portfolio-section', array(
		'before' => '<div id="portfolio" class="wrap">',
		'after'  => '</div>',
	) );


	echo '</div>';

}

genesis();
