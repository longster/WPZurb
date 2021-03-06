<?php
/**
 * The template for displaying Archive that includes category, tag, author, date and archives pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpzurb
 */

get_header(); ?>

    <header id="the-title">
        <div class="row">
            <div class="large-12 columns">
				<h1 class="page-title">
				<?php
					if ( is_category() ) {
						printf( __( 'Category: %s', 'wpzurb' ), '<span>' . single_cat_title( '', false ) . '</span>' );

					} elseif ( is_tag() ) {
						printf( __( 'Tag: %s', 'wpzurb' ), '<span>' . single_tag_title( '', false ) . '</span>' );

					} 
					elseif ( is_author() ) {
						/* Queue the first post, that way we know
						 * what author we're dealing with (if that is the case).
						*/
						the_post();
						printf( __( 'Author: %s', 'wpzurb' ), '<span class="author"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
						/* Since we called the_post() above, we need to
						 * rewind the loop back to the beginning that way
						 * we can run the loop properly, in full.
						 */
						rewind_posts();

					} elseif ( is_day() ) {
						printf( __( 'Daily Archives: %s', 'wpzurb' ), '<span>' . get_the_date() . '</span>' );

					} elseif ( is_month() ) {
						printf( __( 'Monthly Archives: %s', 'wpzurb' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

					} elseif ( is_year() ) {
						printf( __( 'Yearly Archives: %s', 'wpzurb' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

					} else {
						_e( 'Archives', 'wpzurb' );

					}
				?>
				</h1>
				<?php
					if ( is_category() ) {
						// show an optional category description
						$category_description = category_description();
						if ( ! empty( $category_description ) )
							echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );

					} elseif ( is_tag() ) {
						// show an optional tag description
						$tag_description = tag_description();
						if ( ! empty( $tag_description ) )
							echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
					}
				?>
            </div>
        </div>
    </header>

	<section id="primary">
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

		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive' ); ?>

		<?php endif; ?>
		
		<?php /* get_sidebar(); */ ?>

	</section><!-- .content -->

<?php get_footer(); ?>