<section class="section <?php echo esc_attr(implode(' ', $section_classes)); ?>"<?php echo $section_id; ?> <?php echo $data_label; ?>>
    <?php if( $has_media ) : ?>
        <div class="background-media" style="<?php echo esc_attr($background_media_style); ?>" <?php echo implode(' ', $parallax_data_attr); ?>>
            <?php if( $has_video ) : ?>
                <video autoplay="autoplay" <?php echo $video_poster; ?>loop="loop" style="width: 100%; height: 100%;" class="section-background-video">
                <?php if( $background_video_mp4): ?>
                    <source type="video/mp4" src="<?php echo esc_url($background_video_mp4); ?>"/>
                <?php endif; ?>
                <?php if( $background_video_webm): ?>
                    <source type="video/webm" src="<?php echo esc_url($background_video_webm); ?>"/>
                <?php endif; ?>
                </video>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="background-overlay grid-overlay-<?php echo esc_attr($overlay_grid); ?> " style="background-color: <?php echo esc_attr($overlay_colour); ?>;"></div>

    <div class="<?php echo esc_attr($container_class); ?>">
        <div class="row <?php echo esc_attr($row_class); ?>">
            <?php echo do_shortcode( $content ); ?>
        </div>
    </div>
</section>