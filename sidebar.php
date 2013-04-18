<section id="sidebar">
	<div class="row">
		<div class="large-12 columns">
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Default Sidebar')) : ?>
			Configure at Dashboard > Appearance > Widget > Sidebar
		<?php endif; ?>
		</div>
	</div>
</section>
