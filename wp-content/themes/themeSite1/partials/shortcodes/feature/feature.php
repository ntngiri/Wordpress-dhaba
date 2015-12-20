<?php // If there is no icon, style of no padding-left should be applied
    $style = empty( $icon ) ? 'style="padding-left:0px;"' : '';
 ?>
<li class="<?php echo esc_attr(implode( ' ', $classes )); ?>" <?php echo $style; ?> data-os-animation="<?php echo esc_attr($scroll_animation); ?>" data-os-animation-delay="<?php echo esc_attr($scroll_animation_delay); ?>s">
    <?php if( !empty( $icon ) ) : ?>
        <div class="features-list-icon box-animate" data-animation="<?php echo esc_attr($animation); ?> "<?php echo $background_color; ?>>
            <i class="<?php echo $icon; ?>"<?php echo $icon_color; ?>></i>
        </div>
    <?php endif; ?>
    <h3>
        <?php echo $title; ?>
    </h3>
    <p>
        <?php echo $content; ?>
    </p>
</li>