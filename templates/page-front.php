<?php
/**
 * Template Name: Front Page
 *
 * @author		Long Duong
 * @package 	WPZurb
 * @since 		1.0 - 03-12-2013
 */
get_header(); ?>

    <section class="hero-unit">            
        <div class="full-width">
            <div class="row">
            	<div class="large-12 columns">
                	<h1>WPFoundation</h1>
                	<h2>A Free Mobile First Wordpress Theme Framework Based on Foundation Zurb + HTML5BoilerPlate. </h2>
            	</div>
            </div>
            <div class="row">
            	<div class="large-4 columns">
            		<a href="https://github.com/longster/WPZurb/archive/master.zip" class="small button large-4 expand radius"> Download WPZurb</a>
            	</div>
            	<div class="large-4 columns">
            		<a href="https://github.com/longster/WPZurb" class="small button large-4 expand radius" target="_blank">View Project on Github</a>
            	</div>
            	<div class="large-4 columns">
            		<a href="https://github.com/longster/WPZurb/fork" class="small button large-4 expand radius">Fork Me</a>
            	</div>
            </div>
        </div>
    </section>

	<?php while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; // end of the loop. ?>
			

<?php get_footer(); ?>