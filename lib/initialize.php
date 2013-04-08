<?php
/*********************
Start all the functions at once for WPZurb.
*********************/

// start all the functions
add_action('after_setup_theme','wpzurb_setup');
function wpzurb_setup() {

    // launching operation cleanup
    add_action('init', 'wpzurb_head_cleanup');
    // remove WP version from RSS
    add_filter('the_generator', 'wpzurb_rss_version');   
    // remove pesky injected css for recent comments widget
    add_filter( 'wp_head', 'wpzurb_remove_wp_widget_recent_comments_style', 1 );
    // clean up comment styles in the head
    add_action('wp_head', 'wpzurb_remove_recent_comments_style', 1);

    // enqueue base scripts and styles
    add_action('wp_enqueue_scripts', 'wpzurb_scripts_and_styles', 999); 
} // wpzurb_setup





/**********************
WP_HEAD CLEANUP
The default WordPress head is
a mess. Let's clean it up.
**********************/

function wpzurb_head_cleanup() {
    // EditURI link
    remove_action( 'wp_head', 'rsd_link' );
    // windows live writer
    remove_action( 'wp_head', 'wlwmanifest_link' );
    // index link
    remove_action( 'wp_head', 'index_rel_link' );
    // previous link
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
    // start link
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
    // links for adjacent posts
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
    // WP version
    remove_action( 'wp_head', 'wp_generator' );
    // remove WP version from css
    add_filter( 'style_loader_src', 'wpzurb_remove_wp_ver_css_js', 9999 );
    // remove Wp version from scripts
    add_filter( 'script_loader_src', 'wpzurb_remove_wp_ver_css_js', 9999 );
} // function wpzurb head cleanup

// remove WP version from RSS
function wpzurb_rss_version() { return ''; }

// remove WP version from scripts
function wpzurb_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

// remove injected CSS for recent comments widget
function wpzurb_remove_wp_widget_recent_comments_style() {
   if ( has_filter('wp_head', 'wp_widget_recent_comments_style') ) {
      remove_filter('wp_head', 'wp_widget_recent_comments_style' );
   }
}

// remove injected CSS from recent comments widget
function wpzurb_remove_recent_comments_style() {
  global $wp_widget_factory;
  if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
  }
}



/**********************
Enqueue CSS and Scripts
**********************/

// loading modernizr and jquery, and reply script
function wpzurb_scripts_and_styles() {
    if (!is_admin()) {
        // modernizr (without media query polyfill)
        wp_register_script( 'wpzurb-modernizr', get_stylesheet_directory_uri() . '/js/vendor/custom.modernizr.js', array(), '2.6.2', false );
        // deregister WordPress built in jQuery
        wp_deregister_script('jquery');
        // register Google jQuery
        wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js", false, null, true);
        // adding Foundation scripts file in the footer
        wp_register_script( 'wpzurb-js', get_stylesheet_directory_uri() . '/js/foundation.min.js', array( 'jquery' ), '', true );
        

        // enqueue styles and scripts
        wp_enqueue_script( 'wpzurb-modernizr' );   
        wp_enqueue_script( 'jquery' );
    }
}

?>
