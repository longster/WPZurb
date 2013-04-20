<?php get_header(); ?>

    <header id="the-title">
        <div class="row">
            <div class="large-12 columns">
				<h1 class="page-title"><?php the_title(); ?></h1>
			</div>
        </div>
    </header>

	<section id="primary">
		<div class="row">
			<div class="large-8 columns">
			<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'loop/content', 'page' ); ?>
			<?php endwhile; // end of the loop. ?>
			</div>

			<aside id="sidebar" class="large-4 columns">
					<?php get_sidebar(); ?>
			</aside>	
		</div>
	</section>
		

<?php get_footer(); ?>