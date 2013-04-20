<?php
/**
 * Index
 *
 * @author      Longster
 * @package     WPZurb
 * @since       1.0 - 03-12-2013
 */

get_header(); ?>

	<?php if(!is_front_page() && is_home('docs')) : ?>
    <header id="the-title">
        <div class="row">
            <div class="large-12 columns">
                <h1>Docs</h1>
            </div>
        </div>
    </header>
	<?php else: ?>
	<?php endif; ?>

	<section id="primary">

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'loop/content', get_post_format() ); ?>
		<?php endwhile; ?>

	<?php else : ?>

		<article id="post-0" class="post no-results not-found">
			<div class="row">
				<div class="large-8 push-2 columns">

						<?php if ( current_user_can( 'edit_posts' ) ) :
							// Show a different message to a logged-in user who can add posts.
						?>
							<header class="entry-header">
								<h1 class="entry-title"><?php _e( 'No posts to display', 'wpzurb' ); ?></h1>
							</header>

							<div class="entry-content">
								<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'wpzurb' ), admin_url( 'post-new.php' ) ); ?></p>
							</div><!-- .entry-content -->

						<?php else :
							// Show the default message to everyone else.
						?>
							<header class="entry-header">
								<h1 class="entry-title"><?php _e( 'Nothing Found', 'wpzurb' ); ?></h1>
							</header>

							<div class="entry-content">
								<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'wpzurb' ); ?></p>
							</div><!-- .entry-content -->
						<?php endif; // end current_user_can() check ?>

				</div>
			</div>
		</article><!-- #post-0 -->

	<?php endif; // end have_posts() check ?>

		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php if ( function_exists('wpzurb_pagination') ) { wpzurb_pagination(); } else if ( is_paged() ) { ?>
			<nav id="post-nav">
				<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'wpzurb' ) ); ?></div>
				<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'wpzurb' ) ); ?></div>
			</nav>
		<?php } ?>	

	</section>
	

<?php get_footer(); ?>