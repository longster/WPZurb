<?php
/*********************
Enqueue the proper CSS
if you use vanilla CSS.
*********************/
function wpzurb_css_style()
{	
	// Normalize stylesheet
	wp_register_style( 'wpzurb-normalize-stylesheet', get_stylesheet_directory_uri() . '/css/normalize.css', array(), '' );
	
	// Foundation stylesheet
	wp_register_style( 'wpzurb-foundation-stylesheet', get_stylesheet_directory_uri() . '/css/foundation.css', array(), '' );	
	
	// Main & Custom stylesheet
	wp_register_style( 'wpzurb-stylesheet', get_stylesheet_directory_uri() . '/style.css', array(), '', 'all' );
	
	wp_enqueue_style( 'wpzurb-normalize-stylesheet' );
	wp_enqueue_style( 'wpzurb-foundation-stylesheet' );
	wp_enqueue_style( 'wpzurb-stylesheet' );
	
}
add_action( 'wp_enqueue_scripts', 'wpzurb_css_style' );
?>