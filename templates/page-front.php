<?php
/**
 * Template Name: Front Page
 *
 * @author		Long Duong
 * @package 	WPZurb
 * @since 		1.0 - 03-12-2013
 */
get_header(); ?>

    <section id="identity">
        <div class="row">
            <div class="large-12 columns">
                <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="brand logo">
                    <h1 class="logo">WP Foundation Framework</h1>
                    <h3>HTML5Boilerplate + Foundation Zurb + Wireframe</h3>
                </a>
            </div>
        </div>
    </section>

    <?php /* Insert this in Page - homepage 
    <section class="hero-unit "> 
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
    </section>

    <br/><br/>
    <hr/>    
        <h2 class="text-center">Designed for everyone, everywhere</h2>   
     <hr/>
    <br/>
    
    <div class="row">
        <div class="large-6 columns">
            <h2>Foundation from Zurb</h2>
            <p>Simple and flexible HTML, CSS, and Javascript for popular user interface components and interactions. Foundation is one of the most complete front-end toolkits out there with dozens of fully functional components ready to be put to use.</p>
            <a href="http://foundation.zurb.com" class="small button radius" target="_blank">Foundation from Zurb</a>
        </div>
        <div class="large-6 columns">
            <h2>HTML5 Boilerplate</h2>
            <p>HTML5 Boilerplate is the professional frontend developers’s base HTML/CSS/JS template for a fast, robust and future-safe site. You get the best of the best practices baked in: cross-browser normalization, performance optimizations, and things you don’t have to worry about.</p>
            <a href="http://html5boilerplate.com" class="small button radius" target="_blank">HTML5 Boilerplate</a>
        </div>
    </div>
    */ ?>

	<?php while ( have_posts() ) : the_post(); ?>
        <section id="primary"> 
		      <?php the_content(); ?>
        </section>
	<?php endwhile; // end of the loop. ?>
			

<?php get_footer(); ?>