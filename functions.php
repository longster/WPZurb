<?php
/**
 * Functions and definitions
 *
 * @author      Longster
 * @package     WPZurb
 * @since       1.0 - 03-12-2013
 */


/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 870;


/* Initial set up - lib/clean.php
 * Do all the cleaning and enqueue
 * such as head, post, and images */
require_once('lib/initialize.php'); 


/* Insert Sass or CSS
 * all the cleaning and enqueue if you Sass to customize wpzurb
 * */
require_once('lib/enqueue-sass.php'); // Default Sass/SCSS
//require_once('lib/enqueue-css.php'); // to use straight CSS for customization, uncomment this line and comment the above Sass line


/* Zurb Foundation functions - lib/foundation.php
 * Load Zurb Foundation specific functions
 * such as pagination, walker top bar, and related */
require_once('lib/foundation.php'); 


/********************** Specify theme supports **********************/
function wpzurb_theme_support() {
	// Add language supports. Please note that wpzurb does not include language files, not yet
	load_theme_textdomain('wpzurb', get_template_directory() . '/lang');
	
	// Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
	add_theme_support('post-thumbnails');
	// set_post_thumbnail_size(150, 150, false);
	
	// rss thingy
	add_theme_support('automatic-feed-links');
	
	add_theme_support('post-formats', array(
		'aside',  
		'link', 
		'image', 
		'quote', 
		'status',
		'gallery',
		'video'
	)); // Add post formats supports.
	
	add_theme_support('menus');
	register_nav_menus(array(
		'primary'		=>	__( 'Main Navigation', 'wpzurb' ),
		'header-menu'  	=>	__( 'Header Menu', 'wpzurb' ),
		'footer-menu' 	=>	__( 'Footer Menu', 'wpzurb' )
	)); // Add menu supports
	
	add_theme_support( 'custom-background', array(
	    'default-image' => '',  // background image default
	    'default-color' => '', // background color default (dont add the #)
	    'wp-head-callback' => '_custom_background_cb',
	    'admin-head-callback' => '',
	    'admin-preview-callback' => ''
	)); // Add custom background support

}// wpzurb_theme_support */
add_action('after_setup_theme', 'wpzurb_theme_support'); 




/********************** Widgetized!!!!!!!!! **********************/
// create widget areas: sidebar, navdrop, footer
register_sidebar( array(
		'name' => __( 'Default Sidebar', '' ),
		'id' => 'sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
) );

register_sidebar( array(
		'name' => __( 'Navdrop', '' ),
		'id' => 'navdrop',
		'before_widget' => '<aside id="%1$s" class="large-3 columns widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>'
) );

register_sidebar( array(
		'name' => __( 'Footer', '' ),
		'id' => 'footer',
		'before_widget' => '<aside id="%1$s" class="large-3 columns widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>'
) );




/********************** Misc Configuration **********************/

if ( ! function_exists( 'wpzurb_entry_meta' ) ) :
function wpzurb_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'wpzurb' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'wpzurb' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'wpzurb' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 (%1$s) is category, 2 (%2$s) is tag, 3 (%3$s) is the date and 4 (%4$s) is the author's name.
	if ( $tag_list ) {
		$utility_text = __( '%1$s / %2$s / <span class="by-author"> by %4$s</span>', 'wpzurb' );
	} elseif ( $categories_list ) {
		$utility_text = __( '%1$s / %3$s / <span class="by-author">by %4$s</span>', 'wpzurb' );
	} else {
		$utility_text = __( '%3$s / <span class="by-author">by %4$s</span>', 'wpzurb' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif; // Post Meta information






if ( ! function_exists( 'wpzurb_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own wpzurb_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function wpzurb_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'wpzurb' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'wpzurb' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'wpzurb' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'wpzurb' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'wpzurb' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'wpzurb' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'wpzurb' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;





if ( !function_exists( 'wpzurb_credits' ) ) :
function wpzurb_credits() {
	printf(
		__('Copyright &copy; %1$s <a href="%2$s">%3$s</a> - All Rights Reserved.', 'wpzurb'),
		date( 'Y' ),
		home_url( '/' ),
		get_bloginfo( 'name' )
	);
}
endif; // Output credit information

?>