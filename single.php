<?php get_header(); ?>

	<section id="primary">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'loop/content', get_post_format() ); ?>
	<?php endwhile; // end of the loop. ?>
	<div class="row">
		<div class="large-12 columns">
		<?php comments_template( '', true ); ?>
		</div>
	</div>

	<?php get_sidebar();  ?>
	</section>

<?php get_footer(); ?>