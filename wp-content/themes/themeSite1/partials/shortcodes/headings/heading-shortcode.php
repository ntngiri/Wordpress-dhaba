<<?php echo $header_type; ?> class="<?php echo esc_attr(implode( ' ', $headline_classes )); ?>" data-os-animation="<?php echo esc_attr($scroll_animation); ?>" data-os-animation-delay="<?php echo esc_attr($scroll_animation_delay); ?>s" <?php echo implode(' ', $parallax_data_attr); ?>>
    <?php echo $content; ?>
</<?php echo $header_type; ?>>