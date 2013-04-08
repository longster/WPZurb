<?php get_header(); ?>

    <section class="banner">
        <div class="row">
            <div class="large-12 columns">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </section>

	<section class="content">
		<div class="row">
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<header>
					<h1 class="entry-title"><?php _e('File Not Found', 'wpzurb'); ?></h1>
				</header>
				<div class="entry-content">
					<div class="error">
						<p class="bottom"><?php _e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'wpzurb'); ?></p>
					</div>
					<p><?php _e('Please try the following:', 'wpzurb'); ?></p>
					<ul> 
						<li><?php _e('Check your spelling', 'wpzurb'); ?></li>
						<li><?php printf(__('Return to the <a href="%s">home page</a>', 'wpzurb'), home_url()); ?></li>
						<li><?php _e('Click the <a href="javascript:history.back()">Back</a> button', 'wpzurb'); ?></li>
					</ul>
				</div>
			</article>
			<?php get_sidebar(); ?>
		</div>
	</section>
		
<?php get_footer(); ?>