<div class="box <?php echo esc_attr(implode(' ', $classes)); ?>" data-os-animation="<?php echo esc_attr($scroll_animation); ?>" data-os-animation-delay="<?php echo esc_attr($scroll_animation_delay); ?>s">
    <div class="box-dummy"></div>
    <?php if( !empty( $link ) ) : ?>
        <a class="box-inner <?php echo implode( ' ', $link_classes ); ?> <?php echo implode( ' ', $overlay_classes ); ?>" href="<?php echo esc_url($link); ?>" style="background-color:<?php echo esc_attr($background_colour); ?>">
    <?php else : ?>
        <div class="box-inner <?php echo implode( ' ', $overlay_classes ); ?>" style="background-color:<?php echo esc_attr($background_colour); ?>">
    <?php endif; ?>
    <div class="box-animate" data-animation="<?php echo esc_attr($animation); ?>" style="stroke:<?php echo esc_attr($icon_colour); ?>;">
        <?php include OXY_THEME_DIR . 'assets/images/svg/' . esc_attr($icon) . '.svg'; ?>
    </div>
    <?php if( !empty( $link ) ) : ?>
        </a>
    <?php else : ?>
        </div>
    <?php endif; ?>
</div>