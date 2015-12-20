<div class="box <?php echo esc_attr(implode(' ', $classes)); ?>" data-os-animation="<?php echo esc_attr($scroll_animation); ?>" data-os-animation-delay="<?php echo esc_attr($scroll_animation_delay); ?>s">
    <div class="box-dummy"></div>
    <?php if( !empty( $link ) ) : ?>
        <a class="box-inner <?php echo esc_attr(implode( ' ', $link_classes )); ?> <?php echo esc_attr(implode( ' ', $overlay_classes )); ?>" href="<?php echo esc_url($link); ?>" target="_blank" <?php echo $background_color; ?>>
    <?php else : ?>
        <div class="box-inner <?php echo esc_attr(implode( ' ', $overlay_classes )); ?>"<?php echo $background_color; ?>>
    <?php endif; ?>
    <div class="box-animate" data-animation="<?php echo esc_attr($animation); ?>">
        <i class="<?php echo esc_attr($icon); ?>"<?php echo $icon_color; ?>></i>
    </div>
    <?php if( !empty( $link ) ) : ?>
        </a>
    <?php else : ?>
        </div>
    <?php endif; ?>
</div>