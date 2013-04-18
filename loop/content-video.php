	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="row">
			<div class="large-12 columns">

		<header>
			<span class="entry-meta-date"><?php echo get_the_date(); ?></span>
		<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'wpzurb' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php endif; // is_single() ?>
			<div class="entry-meta">
				<?php wpzurb_entry_meta(); ?>
			<?php if ( comments_open() ) : ?>
				<div class="comments-link right">
					<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'wpzurb' ) . '</span>', __( '1 Reply', 'wpzurb' ), __( '% Replies', 'wpzurb' ) ); ?>
				</div><!-- .comments-link -->
			<?php endif; // comments_open() ?>
			</div>
		</header>
		
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wpzurb' ) ); ?>
		</div><!-- .entry-content -->

			</div>
		</div>
	</article><!-- #post -->