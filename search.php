<?php get_header(); ?>

	<section id="the-title">
        <div class="row">
            <div class="large-12 columns">
                <header class="page-header">
					<h1 class="page-title">
						<?php printf( __( 'Search Results for: %s', 'wpzurb' ), '<span>' . get_search_query() . '</span>' ); ?>
					</h1>
				</header><!-- .page-header -->
            </div>
        </div>
    </section>

	<section id="primary">

		<div class="row">
			<div class="large-8 columns">
			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'loop/content', get_post_format() ); ?>
				<?php endwhile; ?>


				<?php /* Display navigation to next/previous pages when applicable */ ?>
				<?php if ( function_exists('wpzurb_pagination') ) { wpzurb_pagination(); } else if ( is_paged() ) { ?>
					<nav id="post-nav">
						<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'wpzurb' ) ); ?></div>
						<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'wpzurb' ) ); ?></div>
					</nav>
				<?php } ?>	
			</div>

			<aside id="sidebar" class="large-4 columns">
					<?php get_sidebar(); ?>
			</aside>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<div class="large-12 columns">
						<header class="entry-header">
							<h1 class="entry-title"><?php _e( 'Nothing Found', 'wpzurb' ); ?></h1>
						</header>

						<div class="entry-content">
							<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'wpzurb' ); ?></p>
							<?php get_search_form(); ?>
						</div><!-- .entry-content -->

					</div><!-- .large-12.columns -->
				</article><!-- #post-0 -->
			<?php endif; ?>
		
		</div>

	</section><!-- .content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>