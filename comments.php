<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to wpzurb_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package wpzurb
 */
?>

<?php
	/*
	 * If the current post is protected by a password and
	 * the visitor has not yet entered the password we will
	 * return early without loading the comments.
	 */
	if ( post_password_required() )
		return;
?>


	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>

	<section id="comments" class="comments-area">
		<div class="row">
			<div class="large-12 columns">

		<h2 class="comments-title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'wpzurb' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="navigation-comment" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'wpzurb' ); ?></h1>
			<div class="previous"><?php previous_comments_link( __( '&larr; Older Comments', 'wpzurb' ) ); ?></div>
			<div class="next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'wpzurb' ) ); ?></div>
		</nav><!-- #comment-nav-before -->
		<?php endif; // check for comment navigation ?>

		<ol class="comment-list">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use wpzurb_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define wpzurb_comment() and that will be used instead.
				 * See wpzurb_comment() in inc/template-tags.php for more.
				 */
				wp_list_comments( array( 'callback' => 'wpzurb_comment' ) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation-comment" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'wpzurb' ); ?></h1>
			<div class="previous"><?php previous_comments_link( __( '&larr; Older Comments', 'wpzurb' ) ); ?></div>
			<div class="next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'wpzurb' ) ); ?></div>
		</nav><!-- #comment-nav-below -->

		<?php endif; // check for comment navigation ?>

			</div>
		</div>
	</section><!-- #comments -->

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
	<section id="comments" class="comments-area">
		<div class="row">
			<div class="large-12 columns">

		<p class="no-comments"><?php _e( 'Comments are closed.', 'wpzurb' ); ?></p>

			</div>
		</div>
	</section><!-- #comments -->
	<?php endif; ?>

	<?php comment_form(); ?>
