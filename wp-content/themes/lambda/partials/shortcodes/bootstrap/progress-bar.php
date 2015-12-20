<div class="<?php echo esc_attr(implode(' ', $classes)); ?>" data-os-animation="<?php echo esc_attr($scroll_animation); ?>" data-os-animation-delay="<?php echo esc_attr($scroll_animation_delay); ?>s">
  <div class="progress-bar <?php echo esc_attr($style); ?>" role="progressbar" aria-valuenow="<?php echo esc_attr($percentage); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo esc_attr($percentage); ?>%;">
    <?php if ($progress_text != '') : ?>
    	<span><?php echo $progress_text; ?></span>
  	<?php endif; ?>
  </div>
</div>


