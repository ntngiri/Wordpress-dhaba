<div class="alert <?php echo esc_attr(implode(' ', $classes)); ?>" data-os-animation="<?php echo esc_attr($scroll_animation); ?>" data-os-animation-delay="<?php echo esc_attr($scroll_animation_delay); ?>s">
	<?php if ( $dismissable === 'true' ) : ?>
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
	<?php endif; ?>
	<strong><?php echo $title; ?></strong>
	<?php echo $content; ?>
</div>