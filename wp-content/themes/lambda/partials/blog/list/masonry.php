<?php
/**
 * Calls masonry loop with masonry section
 *
 * @package Lambda
 * @subpackage Admin
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version 1.17.0
 * @author Oxygenna.com
 */

$options = get_option(THEME_SHORT . '-options');
$template_margin = $options['template_margin'];
ob_start(); ?>
<div class="col-md-12 element-top-<?php echo esc_attr($template_margin); ?> element-bottom-<?php echo esc_attr($template_margin); ?>">
    <div class="masonry blog-masonry use-masonry isotope no-transition" data-padding="<?php echo esc_attr(oxy_get_option('blog_masonry_item_padding')); ?>" data-col-xs="1" data-col-sm="2" data-col-md="4" data-col-lg="4">
        <?php include(locate_template('partials/blog/loops/masonry.php')); ?>
    </div>
</div>
<?php
$masonry = ob_get_contents();
ob_end_clean();

echo oxy_call_shortcode_with_theme_options('oxy_shortcode_section', array(
    'text_shadow',
    'inner_shadow',
    'width',
    'class',
    'id',
    'overlay_colour',
    'overlay_opacity',
    'overlay_grid',
    'background_video_mp4',
    'background_video_webm',
    'background_image',
    'background_image_size',
    'background_image_repeat',
    'background_image_attachment',
    'background_position_vertical',
    'background_image_parallax',
    'background_image_parallax_start',
    'background_image_parallax_end',
    'height',
    'transparency',
    'vertical_alignment'
), $masonry, $options, 'masonry_section_');
