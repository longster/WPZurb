<div class="large-3 columns <?php if (is_page_template('templates/_content_left.php')) : ?><?php else : ?>pull-9<?php endif; ?>">
	<div class="panel">
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar')) : ?>
		Configure at Dashboard > Appearance > Widget > Sidebar
	<?php endif; ?>
	</div>
</div>
