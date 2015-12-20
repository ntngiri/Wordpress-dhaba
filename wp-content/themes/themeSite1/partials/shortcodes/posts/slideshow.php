<?php
$id = 'flexslider-' . rand(1,1000); ?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr(implode(' ', $container_classes)); ?> feature-slider" data-os-animation="<?php echo esc_attr($scroll_animation); ?>" data-os-animation-delay="<?php echo esc_attr($scroll_animation_delay); ?>s" data-flex-animation="<?php echo esc_attr($animation_type); ?>" data-flex-controlsalign="center" data-flex-directions="<?php echo $directionnav; ?>" data-flex-speed="<?php echo esc_attr($speed); ?>" data-flex-controls="<?php echo esc_attr($show_controls); ?>" data-flex-slideshow="true" data-flex-controlsposition="inside">
    <ul class="slides"><?php
    foreach ($posts as $item) :
        global $post;
        $post = $item;
        setup_postdata($post);
        $custom_fields = get_post_custom($post->ID);
        $scroll_animation = '';
        $scroll_animation_delay = '';
        $category_name = '';
        $category_link = '';

        $categories = get_the_category($post->ID);
        if(!empty($categories)){
            $category_name = $categories[0]->name;
            $category_link = get_category_link($categories[0]->cat_ID);
        }
        $src = '';
        if (has_post_thumbnail($post->ID)) :
            $attachment = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
            if(!empty($attachment)) :
                $src = $attachment[0];
            endif; 
        endif;        
        if(!empty($src)) : ?>
            <li>            
                <?php include(locate_template('partials/shortcodes/posts/featured.php')); ?>
            </li><?php
        endif;
    endforeach; ?>
    </ul>
</div><?php
wp_reset_postdata(); ?>