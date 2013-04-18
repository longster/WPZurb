<?php
/** _content_right.php
 *
 * Template Name: Content Right Side
 */
get_header(); ?>

    <section id="the-title">
        <div class="row">
            <div class="large-12 columns">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </section>

	<section id="primary">
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