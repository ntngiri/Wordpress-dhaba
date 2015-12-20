<div class="<?php echo esc_attr(implode(' ', $classes)); ?>" data-os-animation="<?php echo esc_attr($scroll_animation); ?>" data-os-animation-delay="<?php echo esc_attr($scroll_animation_delay); ?>s">
    <?php if( 'show' === $show_image ) : ?>
        <?php if ('none' === $image_shape): ?>
            <span class="service-simple-image">
                <?php if( !empty( $icon ) ) : ?>
                    <?php if( !empty( $link ) && 'on' === $link_image ) : ?>
                        <a href="<?php echo esc_url($link); ?>" target="<?php echo $link_target; ?>">
                            <i class="<?php echo esc_attr($icon); ?>"<?php echo $icon_colour_attr ?>></i>
                        </a>
                    <?php else : ?>
                        <i class="<?php echo esc_attr($icon); ?>"<?php echo $icon_colour_attr ?>></i>
                    <?php endif; ?>
                <?php elseif( !empty( $image_src ) ) : ?>
                    <?php if( !empty( $link ) && 'on' === $link_image ) : ?>
                        <a href="<?php echo esc_url($link); ?>" target="<?php echo $link_target; ?>">
                            <img src="<?php echo esc_url($image_src); ?>" alt="<?php echo get_the_title(); ?>"/>
                        </a>
                    <?php else : ?>
                        <img src="<?php echo esc_url($image_src); ?>" alt="<?php echo get_the_title(); ?>"/>
                    <?php endif; ?>
                <?php endif; ?>
            </span>
        <?php else: ?>
        <div class="box <?php echo esc_attr(implode( ' ', $figure_classes )); ?>">
            <div class="box-dummy"></div>
            <?php if( !empty( $link ) && 'on' === $link_image ) : ?>
                <a class="box-inner <?php echo esc_attr(implode( ' ', $overlay_classes )); ?>" href="<?php echo esc_url($link); ?>" target="<?php echo $link_target; ?>"<?php echo $shape_background_color; ?>>
            <?php else : ?>
                <div class="box-inner <?php echo esc_attr(implode( ' ', $overlay_classes )); ?>"<?php echo $shape_background_color; ?>>
            <?php endif; ?>
            <div class="box-animate" data-animation="<?php echo esc_attr($animation); ?>">
                <?php if( !empty( $icon ) ) : ?>
                    <i class="<?php echo esc_attr($icon); ?>"<?php echo $icon_colour_attr ?>></i>
                <?php elseif( !empty( $image_src ) ) : ?>
                    <img src="<?php echo esc_url($image_src); ?>" alt="<?php echo get_the_title(); ?>"/>
                <?php endif; ?>
            </div>
            <?php if( !empty( $link ) && 'on' === $link_image ) : ?>
                </a>
            <?php else : ?>
                </div>
            <?php endif; ?>
        </div>
        <?php endif ?>
    <?php endif; ?>
    <?php if( 'show' === $show_title ) : ?>
        <<?php echo $tag_title; ?>>
            <?php if( !empty( $link ) && 'on' === $link_title ) : ?>
                <a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($link_target); ?>">
            <?php endif; ?>
            <?php the_title(); ?>
            <?php if( !empty( $link ) && 'on' === $link_title ) : ?>
                </a>
            <?php endif; ?>
        </<?php echo $tag_title; ?>>
    <?php endif; ?>
    <?php if( 'show' === $show_excerpt ) : ?>
        <p><?php echo get_the_excerpt(); ?></p>
    <?php endif; ?>
    <?php if( !empty( $link ) && 'show' === $show_readmore ) : ?>
        <a href="<?php echo esc_url($link); ?>" class="more-link text-<?php echo esc_attr($align); ?>" target="<?php echo esc_attr($link_target); ?>">
        <?php echo $readmore_text; ?>
        </a>
    <?php
    endif ?>
</div>