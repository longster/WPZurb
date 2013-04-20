<?php
/** _content_right.php
 *
 * Template Name: Sidebar left | Content Right 
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
			<div class="large-8 columns push-4">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'loop/content', 'page' ); ?>
			<?php endwhile; // end of the loop. ?>
			</div>

			<aside id="sidebar" class="large-4 columns pull-8 side-lt">
					<?php get_sidebar(); ?>
			</aside>	
		</div>
	</section>

<?php get_footer(); ?>