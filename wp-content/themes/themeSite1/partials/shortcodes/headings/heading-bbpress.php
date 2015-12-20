<?php global $oxy_theme_options; ?>
<div class="col-md-12">
    <<?php echo $header_type; ?> class="bbpress-header small-screen-center <?php echo esc_attr($text_color); ?> <?php echo implode( ' ', $headline_classes ); ?>" data-os-animation="<?php echo $scroll_animation; ?>" data-os-animation-delay="<?php echo $scroll_animation_delay; ?>s" <?php echo implode(' ', $parallax_data_attr); ?>>
        <?php echo $content; ?>
    </<?php echo $header_type; ?>>
    <?php if (!bbp_is_single_user()) : ?>
        <?php if ($oxy_theme_options['bbpress_header_show_breadcrumbs'] === 'show') : ?>
            <?php bbp_breadcrumb(); ?>
        <?php endif ?>
    <?php endif ?>
</div>


