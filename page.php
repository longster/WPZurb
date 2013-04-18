<?php get_header(); ?>

	<section class="content">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'loop/content', 'page' ); ?>
		<?php endwhile; // end of the loop. ?>
		
		<?php get_sidebar(); ?>

	</section>

<?php get_footer(); ?>