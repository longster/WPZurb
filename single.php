<?php get_header(); ?>

	<section class="content">
		<div class="row">
			<div class="large-9 columns">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'loop/content', get_post_format() ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</section>

<?php get_footer(); ?>