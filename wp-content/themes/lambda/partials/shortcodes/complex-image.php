<div class="figure <?php echo esc_attr(implode( ' ', $figure_classes )); ?> <?php echo esc_attr($image_stretch); ?>" data-os-animation="<?php echo esc_attr($scroll_animation); ?>" data-os-animation-delay="<?php echo esc_attr($scroll_animation_delay); ?>s">
    <?php if( !empty( $hover_link ) ) : ?>
        <a href="<?php echo esc_url($hover_link); ?>" title="<?php echo esc_attr($title); ?>" class="figure-image <?php echo esc_attr(implode( ' ', $hover_link_classes )); ?> image-all" data-links="<?php echo esc_attr(implode( ',', $gallery_images )); ?>" <?php echo $text_captions; ?> target="<?php echo esc_attr($link_target); ?>">
    <?php else : ?>
        <span class="figure-image">
    <?php endif; ?>

    <img src="<?php echo esc_url($src); ?>" alt="<?php echo esc_attr($alt); ?>" class="<?php echo esc_attr($image_stretch);  ?>"/>
    <?php if( $overlay !== 'none' ) : ?>
    <div class="figure-overlay <?php echo esc_attr(implode( ' ', $overlay_classes )); ?>">
        <div class="figure-overlay-container">
            <?php if( $overlay === 'caption' || $overlay === 'strip' ) : ?>
                <div class="figure-caption">
                    <h3 class="figure-caption-title bordered bordered-small"><?php echo $caption_title; ?></h3>
                    <p class="figure-caption-description"><?php echo $caption_text; ?></p>
                </div>
            <?php elseif( $overlay === 'icon' ) : ?>
                <div class="figure-caption">
                    <i class="<?php echo esc_attr($overlay_icon); ?>"></i>
                </div>
            <?php elseif( $overlay === 'buttons' || $overlay === 'buttons_only' ) : ?>
                <div class="figure-caption">
                    <?php if( $overlay === 'buttons' ) : ?>
                        <h4 class="figure-caption-title element-small-bottom bordered bordered-small"><?php echo $caption_title; ?></h4>
                    <?php endif; ?>
                    <p class="figure-caption-description">
                        <a href="<?php echo esc_url($magnific_link_url); ?>" class="btn btn-primary <?php echo esc_attr(implode( ' ', $magnific_link_classes )); ?> image-all" data-links="<?php echo implode( ',', $gallery_images ); ?>"><?php echo $button_text_zoom; ?></a>
                        <a href="<?php echo esc_url($link); ?>" class="btn btn-primary" target="<?php echo esc_attr($link_target); ?>"><?php echo $button_text_details; ?></a>
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <?php if( !empty( $hover_link ) ) : ?>
        </a>
    <?php else : ?>
        </span>
    <?php endif; ?>

<?php if( $captions_below === 'show' ) : ?>
    <div class="figure-caption text-<?php echo esc_attr($caption_align); ?>">
        <h3 class="figure-caption-title bordered bordered-small <?php if( !empty( $below_title_link ) ) { echo 'bordered-link'; } ?>">
            <?php if( !empty( $below_title_link ) ) : ?>
                <a href="<?php echo esc_url($below_title_link); ?>" class="<?php echo esc_attr(implode( ' ', $below_title_link_classes )); ?>" data-links="<?php echo esc_attr(implode( ',', $gallery_images )); ?>" target="<?php echo esc_attr($link_target); ?>">
            <?php endif; ?>
            <?php echo $caption_title; ?>
            <?php if( !empty( $below_title_link ) ) : ?>
                </a>
            <?php endif; ?>
        </h3>
        <p class="figure-caption-description"><?php echo esc_attr($caption_text); ?></p>
    </div>
<?php endif; ?>
</div>