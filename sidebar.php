<div class="large-3 columns <?php if (is_page_template('templates/_content_right.php')) : ?>pull-9<?php else : ?><?php endif; ?>">
	<div class="panel">
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Default Sidebar')) : ?>
		Configure at Dashboard > Appearance > Widget > Sidebar
	<?php endif; ?>
	</div>
</div>
