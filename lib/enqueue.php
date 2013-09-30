<?php
/**
 * Enqueue stylesheets only
**/
function wpzurb_css_style()
{
	// Main & Custom stylesheet
	wp_register_style( 'wpzurb-stylesheet', get_stylesheet_directory_uri() . '/assets/main.css', array(), '');
	
	wp_enqueue_style( 'wpzurb-stylesheet' );

}	
add_action( 'wp_enqueue_scripts', 'wpzurb_css_style' );



/**
 * Enqueue scripts only
 *
 * Enqueue scripts in the following order:
 * 1. jquery-1.10.2.min.js via Google CDN
 * 2. /theme/assets/js/vendor/modernizr-2.6.2.min.js
 * 3. /theme/assets/js/script.js (in footer)
 */
function wpzurb_scripts() {
		// jQuery is loaded using the same method from HTML5 Boilerplate:
  	// Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
  	// It's kept in the header instead of footer to avoid conflicts with plugins.
  	if (!is_admin()) { //&& current_theme_supports('jquery-cdn') - this was removed after admin() which interferes with google cdn and adds 2 jquery stuff which seems unnecesary

      
      wp_deregister_script('jquery');
    	wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', false, null, true);
      add_filter('script_loader_src', 'wpzurb_jquery_local_fallback', 10, 2);
  	}

  	if (is_single() && comments_open() && get_option('thread_comments')) {
   		wp_enqueue_script('comment-reply');
  	}

  	wp_register_script('modernizr', get_template_directory_uri() . '/assets/js/plugins/custom.mondernnizr.js', false, null);  	
    wp_register_script('wpzurb_scripts', get_template_directory_uri() . '/assets/js/scripts.min.js', false, '2a3e700c4c6e3d70a95b00241a845695', true);
    
    //wp_enqueue_script('modernizr');
    wp_enqueue_script('jquery');
    wp_enqueue_script('wpzurb_scripts');
    
}
add_action('wp_enqueue_scripts', 'wpzurb_scripts', 100);

// http://wordpress.stackexchange.com/a/12450
function wpzurb_jquery_local_fallback($src, $handle) {
	static $add_jquery_fallback = false;

  	if ($add_jquery_fallback) {
    	echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/js/plugins/jquery.js"><\/script>\')</script>' . "\n";
    	$add_jquery_fallback = false;
  	}

  	if ($handle === 'jquery') {
    	$add_jquery_fallback = true;
  	}

  	return $src;
}
?>