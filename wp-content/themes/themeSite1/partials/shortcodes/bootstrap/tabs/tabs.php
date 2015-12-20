<div class="<?php echo esc_attr(implode(' ', $classes)); ?>" data-os-animation="<?php echo esc_attr($scroll_animation); ?>" data-os-animation-delay="<?php echo esc_attr($scroll_animation_delay); ?>s">
	<?php
		if ($style == 'bottom') { ?>
			<div class="tabbable <?php echo esc_attr($position); ?>">
				<div class="tab-content"><?php echo $tab_contents; ?></div>
				<ul class="nav nav-tabs" data-tabs="tabs"><?php echo $tab_headers; ?></ul>
			</div>
	<?php }
		else { ?>
			<div class="tabbable '<?php echo esc_attr($position); ?>'">
				<ul class="nav nav-tabs" data-tabs="tabs"><?php echo $tab_headers; ?></ul>
				<div class="tab-content"><?php echo $tab_contents; ?></div>
			</div>
	<?php } ?>
</div>