<div class="chart easyPieChart <?php echo esc_attr(implode(' ', $header_classes)); ?>" data-percent="<?php echo esc_attr($percentage); ?>" data-track-color="<?php echo esc_attr($track_colour); ?>" data-bar-color="<?php echo esc_attr($bar_colour); ?>" data-os-animation="<?php echo esc_attr($scroll_animation); ?>" data-os-animation-delay="<?php echo esc_attr($scroll_animation_delay); ?>s" data-line-width="<?php echo esc_attr($line_width); ?>" data-size="<?php echo esc_attr($size); ?>">
    <span>
        <?php echo $percentage; ?>
    </span>
    <i class="<?php echo esc_attr($icon); ?>" <?php echo $icon_animation; ?>></i>
</div>