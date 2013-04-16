<?php
/** _content_right.php
 *
 * Template Name: Content Right Side
 */
get_header(); ?>

	<section class="content">
		<div class="row">
			<div class="large-9 columns push-3">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'loop/content', 'page' ); ?>
			<?php endwhile; // end of the loop. ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</section>

<?php get_footer(); ?>