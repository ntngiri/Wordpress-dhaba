<?php
$id = 'flexslider-' . rand(1,1000); ?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr(implode(' ', $classes)); ?> feature-slider" data-os-animation="<?php echo esc_attr($scroll_animation); ?>" data-os-animation-delay="<?php echo esc_attr($scroll_animation_delay); ?>s" data-flex-animation="<?php echo esc_attr($animation_type); ?>" data-flex-controls-position="outside" data-flex-controlsalign="center" data-flex-directions="hide" data-flex-speed="<?php echo esc_attr($speed); ?>" data-flex-controls="<?php echo esc_attr($show_controls); ?>" data-flex-slideshow="true">
    <ul class="slides"><?php
    foreach ($items as $item) :
        global $post;
        $post = $item;
        setup_postdata($post);
        $custom_fields = get_post_custom($post->ID);
        $cite  = (isset($custom_fields[THEME_SHORT.'_citation'])) ? $custom_fields[THEME_SHORT.'_citation'][0]:''; ?>
        <li>
            <?php include(locate_template('partials/shortcodes/testimonials/slideshow/layouts/' . $layout . '.php')); ?>
        </li><?php
    endforeach; ?>
    </ul>
</div><?php
wp_reset_postdata(); ?>
