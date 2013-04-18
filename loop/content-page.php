	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="row">
			<div class="large-12 columns">

				<header>
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>

				<div class="entry-content">
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'wpzurb' ), 'after' => '</div>' ) ); ?>
				</div><!-- .entry-content -->
		
			</div>
		</div>
	</article><!-- #post -->
