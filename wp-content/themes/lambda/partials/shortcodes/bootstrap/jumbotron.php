<div class="jumbotron <?php echo esc_attr(implode(' ', $classes)); ?>" data-os-animation="<?php echo esc_attr($scroll_animation); ?>" data-os-animation-delay="<?php echo esc_attr($scroll_animation_delay); ?>s" >
	<h1><?php echo $title; ?></h1>
	<p><?php echo do_shortcode ( $content ); ?></p>
</div>