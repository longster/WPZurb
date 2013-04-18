<?php
/** _full_width.php
 *
 * Template Name: Full Width
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
			<div class="large-12 columns">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'loop/content', 'page' ); ?>
			<?php endwhile; // end of the loop. ?>
			</div>
		</div>
	</section>

<?php get_footer(); ?>