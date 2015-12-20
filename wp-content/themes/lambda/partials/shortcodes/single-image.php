<div class="figure <?php echo esc_attr(implode(' ', $classes)); ?>" data-os-animation="<?php echo esc_attr($scroll_animation); ?>" data-os-animation-delay="<?php echo esc_attr($scroll_animation_delay); ?>s">
    <?php if( !empty( $hover_link ) ) : ?>
        <a href="<?php echo esc_url($hover_link); ?>" class="figure-image <?php echo esc_attr($hover_link_class); ?>" target="<?php echo esc_attr($link_target); ?>">
    <?php else : ?>
        <span class="figure-image">
    <?php endif; ?>
    <img src="<?php echo esc_url($src); ?>" alt="<?php echo esc_attr($alt); ?>"/>
    <?php if( !empty( $hover_link ) ) : ?>
        </a>
    <?php else : ?>
        </span>
    <?php endif; ?>
</div>
