<?php
/**
 * Category Page
 *
 * @author      Longster
 * @package     WPZurb
 * @since       1.0 - 03-12-2013
 */

get_header(); ?>

	<section class="content">
		<div class="row">
			<div class="large-9 columns push-3">

				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'loop/content', get_post_format() ); ?>
				<?php endwhile; // end of the loop. ?>

				<?php if ( function_exists('wpzurb_pagination') ) { wpzurb_pagination(); } else if ( is_paged() ) { ?>
					<nav id="post-nav">
						<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'wpzurb' ) ); ?></div>
						<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'wpzurb' ) ); ?></div>
					</nav>
				<?php } ?>

			</div>
			<?php get_sidebar(); ?>
		</div>
	</section>

<?php get_footer(); ?>