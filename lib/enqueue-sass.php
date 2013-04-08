<?php
/*********************
Enqueue the proper CSS
if you use Sass.
*********************/
function wpzurb_sass_style()
{
	// Normalize stylesheet
	wp_register_style( 'wpzurb-normalize-stylesheet', get_stylesheet_directory_uri() . '/css/normalize.css', array(), '');
	
	// Foundation stylesheet
	wp_register_style( 'wpzurb-app-stylesheet', get_stylesheet_directory_uri() . '/css/app.css', array(), '');
	
	// Main & Custom stylesheet
	wp_register_style( 'wpzurb-stylesheet', get_stylesheet_directory_uri() . '/style.css', array(), '');
	
	wp_enqueue_style( 'wpzurb-normalize-stylesheet' );
	wp_enqueue_style( 'wpzurb-app-stylesheet' );
	wp_enqueue_style( 'wpzurb-stylesheet' );

}	
add_action( 'wp_enqueue_scripts', 'wpzurb_sass_style' );
?>