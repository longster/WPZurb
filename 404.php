<?php get_header(); ?>

    <section id="the-title">
        <div class="row">
            <div class="large-12 columns">
                <h1><?php _e('Way to go... you borke it!', 'wpzurb'); ?></h1>
            </div>
        </div>
    </section>

	<section class="content">
		<div class="row">
			<div class="large-12 columns">
					<article id="post-0" class="post no-results not-found">
						<header>
							<h1 class="entry-title error"><?php _e('Page is nowhere to be found.', 'wpzurb'); ?></h1>
						</header>

						<div class="entry-content">
							<p><?php _e("Here's what you can do:", 'wpzurb'); ?></p>
							<ul> 
								<li><?php _e('Cry to your momma about it.', 'wpzurb'); ?></li>
								<li><?php printf(__('Break your monitor and hope to return to <a href="%s">home page</a>', 'wpzurb'), home_url()); ?></li>
								<li><?php _e('Stab the <a href="javascript:history.back()">Back</a> of your hand to get back where you were.', 'wpzurb'); ?></li>
							</ul>
						</div><!-- .entry-content -->
					</article><!-- #post-0 -->
			</div>
			<?php /*get_sidebar(); */?>
		</div>
	</section>
		
<?php get_footer(); ?>