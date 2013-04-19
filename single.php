<?php get_header(); ?>

    <header id="the-title">
        <div class="row">
            <div class="large-12 columns">
				<h1 class="page-title">Article / Blog Title</h1>
			</div>
        </div>
    </header>

	<section id="primary">
		<div class="row">
		
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'loop/content', get_post_format() ); ?>
		<?php endwhile; // end of the loop. ?>

			<aside id="sidebar" class="large-4 columns">
				<div class="panel">
					<?php get_sidebar(); ?>
				</div>
			</aside>
		
		</div>
	</section>

	<section style="background-color: #fff;">
		<div class="row">
			<div class="large-12 columns">
				<?php comments_template( '', true ); ?>
			</div>
		</div>
	</section>

<?php get_footer(); ?>