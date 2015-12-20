<div class="counter <?php echo esc_attr(implode(' ', $header_classes)); ?>" data-count="<?php echo esc_attr($value); ?>" data-format="<?php echo esc_attr($format); ?>" data-os-animation="<?php echo esc_attr($scroll_animation); ?>" data-os-animation-delay="<?php echo esc_attr($scroll_animation_delay); ?>s">
    <span class="value odometer-counter <?php echo esc_attr($counter_size . ' ' . $counter_weight); ?>">
        <?php echo $initvalue; ?>
    </span>
</div>