<?php
/**
 * Footer
 *
 * @author      Longster
 * @package     WPZurb
 * @since       1.0 - 03-12-2013
 */
?>
	<footer id="colophon">
		<div class="row aside-footer">
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer')) : ?>
					Configure at Dashboard > Appearance > Widget > Footer
	        <?php endif; ?>
		</div>
		<div class="credit">
			<div class="row">
				<div class="large-12 columns">
					<small><?php wpzurb_credits(); ?></small>
				</div>
			</div>
		</div>
	</footer>


	<script>
		document.write('<script src=' +
		('__proto__' in {} ? '<?php bloginfo( 'template_url' );?>/js/vendor/zepto' : '<?php bloginfo( 'template_url' );?>/js/vendor/jquery') +
		'.js><\/script>')
	</script>

	<script src="<?php bloginfo( 'template_url' );?>/js/foundation/foundation.js"></script>
	<script src="<?php bloginfo( 'template_url' );?>/js/foundation/foundation.alerts.js"></script>
	<script src="<?php bloginfo( 'template_url' );?>/js/foundation/foundation.clearing.js"></script>
	<script src="<?php bloginfo( 'template_url' );?>/js/foundation/foundation.cookie.js"></script>
	<script src="<?php bloginfo( 'template_url' );?>/js/foundation/foundation.dropdown.js"></script>
	<script src="<?php bloginfo( 'template_url' );?>/js/foundation/foundation.forms.js"></script>
	<script src="<?php bloginfo( 'template_url' );?>/js/foundation/foundation.joyride.js"></script>
	<script src="<?php bloginfo( 'template_url' );?>/js/foundation/foundation.magellan.js"></script>
	<script src="<?php bloginfo( 'template_url' );?>/js/foundation/foundation.orbit.js"></script>
	<script src="<?php bloginfo( 'template_url' );?>/js/foundation/foundation.placeholder.js"></script>
	<script src="<?php bloginfo( 'template_url' );?>/js/foundation/foundation.reveal.js"></script>
	<script src="<?php bloginfo( 'template_url' );?>/js/foundation/foundation.section.js"></script>
	<script src="<?php bloginfo( 'template_url' );?>/js/foundation/foundation.tooltips.js"></script>
	<script src="<?php bloginfo( 'template_url' );?>/js/foundation/foundation.topbar.js"></script>
	
	<script>
	$(document).foundation();
	</script>

	<script src="<?php bloginfo( 'template_url' );?>/js/nav-toggle.js"></script>

	<?php wp_footer(); ?>

</body>
</html>