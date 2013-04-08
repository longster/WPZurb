<?php
/** _content_left.php
 *
 * Template Name: Content Left Side
 */
get_header(); ?>

	<section class="content">
		<div class="row">
			<div class="large-9 columns">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'loop/content', 'page' ); ?>
			<?php endwhile; // end of the loop. ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</section>

<?php get_footer(); ?>