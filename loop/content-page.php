	<article id="post-<?php the_ID(); ?>" <?php post_class('large-8 columns'); ?>>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'wpzurb' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		
	</article><!-- #post -->
