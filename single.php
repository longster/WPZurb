<?php get_header(); ?>

	<section class="content">
		<div class="row">
			<div class="large-9 columns push-3">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'loop/content', 'single' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</section>

<?php get_footer(); ?>