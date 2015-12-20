<div class="figure fade-none <?php echo esc_attr(implode( ' ', $classes )); ?>" data-os-animation="<?php echo esc_attr($scroll_animation); ?>" data-os-animation-delay="<?php echo esc_attr($scroll_animation_delay); ?>s">
    <a href="<?php echo esc_url(oxy_get_slide_link( $post )); ?>" class="figure-image">
        <?php if( !empty($src)) : ?>
            <img src="<?php echo esc_url($src); ?>" alt="<?php echo get_the_title( $post->ID ); ?>">
        <?php endif; ?>
        <div class="figure-overlay">
            <div class="figure-overlay-container">
                <div class="figure-caption">
                    <<?php echo esc_attr($title_tag); ?> class="figure-caption-title">
                        <strong><?php echo get_the_title( $post->ID ); ?></strong>
                    </<?php echo esc_attr($title_tag); ?>>

                </div>
            </div>
        </div>
    </a>
    <?php if( !empty($category_name)) : ?>
        <h5 class="figure-caption-category">
            <a href="<?php echo $category_link; ?>">
                <?php echo $category_name; ?>
            </a>
        </h5>
    <?php endif; ?>
</div>