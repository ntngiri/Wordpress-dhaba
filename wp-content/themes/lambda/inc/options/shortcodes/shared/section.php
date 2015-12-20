<?php
/**
 * Themes shortcode options go here
 *
 * @package Lambda
 * @subpackage Core
 * @since 1.0
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license http://wiki.envato.com/support/legal-terms/licensing-terms/
 * @version 1.17.0
 */

$section_options =  array(
    array(
        'name'    => __('Text Shadow', 'lambda-admin-td'),
        'desc'    => __('Adds a text shadow to all the text in this row.', 'lambda-admin-td'),
        'id'      => 'text_shadow',
        'type'    => 'select',
        'options' => array(
            'no-shadow' => __('No Shadow', 'lambda-admin-td'),
            'shadow'    => __('Show Shadow', 'lambda-admin-td'),
        ),
        'default' => 'no-shadow',
    ),
    array(
        'name'    => __('Inner Shadow', 'lambda-admin-td'),
        'desc'    => __('Adds an inner shadow to the inside of this row.', 'lambda-admin-td'),
        'id'      => 'inner_shadow',
        'type'    => 'select',
        'options' => array(
            'no-shadow' => __('No Shadow', 'lambda-admin-td'),
            'shadow'    => __('Show Shadow', 'lambda-admin-td'),
        ),
        'default' => 'no-shadow',
    ),
    array(
        'name'    => __('Section Width', 'lambda-admin-td'),
        'desc'    => __('Choose between padded-non padded section', 'lambda-admin-td'),
        'id'      => 'width',
        'type'    => 'select',
        'options' => array(
            'padded'    => __('Padded', 'lambda-admin-td'),
            'no-padded' => __('Full Width', 'lambda-admin-td'),
        ),
        'default' => 'padded',
    ),
    array(
        'name'    => __('Optional class', 'lambda-admin-td'),
        'id'      => 'class',
        'type'    => 'text',
        'default' => '',
        'desc'    => __('Add an optional class to the section (separated with spaces)', 'lambda-admin-td'),
    ),
    array(
        'name'    => __('Optional id', 'lambda-admin-td'),
        'id'      => 'id',
        'type'    => 'text',
        'default' => '',
        'desc'    => __('Add an optional id to the section', 'lambda-admin-td'),
    ),
    array(
        'name'    => __('Optional label', 'lambda-admin-td'),
        'id'      => 'label',
        'type'    => 'text',
        'default' => '',
        'desc'    => __('Add an optional label for this section, used in bullet nav tooltips', 'lambda-admin-td'),
    ),
    array(
        'name'      => __('Overlay Colour', 'lambda-admin-td'),
        'desc'      => __('Set the colour of the video & image overlay', 'lambda-admin-td'),
        'id'        => 'overlay_colour',
        'type'      => 'colour',
        'default'   => '#000000',
    ),
    array(
        'name'      => __('Overlay Opacity', 'lambda-admin-td'),
        'desc'      => __('Set the opacity of the video & image overlay', 'lambda-admin-td'),
        'id'        => 'overlay_opacity',
        'type'      => 'slider',
        'default'   => '0',
        'attr'      => array(
            'max'       => 1,
            'min'       => 0,
            'step'      => 0.1,
        )
    ),
    array(
        'name'      => __('Overlay Grid', 'lambda-admin-td'),
        'desc'      => __('Adds an overlay pattern image', 'lambda-admin-td'),
        'id'        => 'overlay_grid',
        'type'      => 'slider',
        'default'   => '0',
        'attr'      => array(
            'max'       => 100,
            'min'       => 0,
            'step'      => 10,
        )
    ),
    array(
        'name'    => __('Background Video mp4', 'lambda-admin-td'),
        'id'      => 'background_video_mp4',
        'type'    => 'text',
        'default' => '',
        'desc'    => __('Enter url of an mp4 video to use for this rows background.', 'lambda-admin-td'),
    ),
    array(
        'name'    => __('Background Video webm', 'lambda-admin-td'),
        'id'      => 'background_video_webm',
        'type'    => 'text',
        'default' => '',
        'desc'    => __('Enter url of a webm video to use for this rows background.', 'lambda-admin-td'),
    ),
    array(
        'name'    => __('Background Image', 'lambda-admin-td'),
        'id'      => 'background_image',
        'store'   => 'url',
        'type'    => 'upload',
        'default' => '',
        'desc'    => __('Choose an image to use for this rows background.', 'lambda-admin-td'),
    ),
    array(
        'name'    => __('Image Background Size', 'lambda-admin-td'),
        'desc'    => __('Set how the image will fit into the section', 'lambda-admin-td'),
        'id'      => 'background_image_size',
        'type'    => 'select',
        'options' => array(
            'cover' => __('Full Width', 'lambda-admin-td'),
            'auto'  => __('Actual Size', 'lambda-admin-td'),
        ),
        'default' => 'cover',
    ),
    array(
        'name'    => __('Image Background Repeat', 'lambda-admin-td'),
        'id'      => 'background_image_repeat',
        'type'    => 'select',
        'default' => 'no-repeat',
        'options' => array(
            'no-repeat' => __('No repeat', 'lambda-admin-td'),
            'repeat-x'  => __('Repeat horizontally', 'lambda-admin-td'),
            'repeat-y'  => __('Repeat vertically', 'lambda-admin-td'),
            'repeat'    => __('Repeat horizontally and vertically', 'lambda-admin-td')
        ),
        'desc'    => __('Set how the image will be repeated', 'lambda-admin-td'),
    ),
    array(
        'name'      => __('Background Position vertical', 'lambda-admin-td'),
        'desc'      => __('Set the vertical position of background image. 0 value represents the top horizontal edge of the section. Positive values will push the background image up.', 'lambda-admin-td'),
        'id'        => 'background_position_vertical',
        'type'      => 'slider',
        'default'   => '0',
        'attr'      => array(
            'max'       => 100,
            'min'       => -100,
            'step'      => 1,
        )
    ),
    array(
        'name'    => __('Background Image Attachment', 'lambda-admin-td'),
        'id'      => 'background_image_attachment',
        'type'    => 'select',
        'default' => 'scroll',
        'options' => array(
            'scroll' => __('Scroll', 'lambda-admin-td'),
            'fixed'  => __('Fixed', 'lambda-admin-td'),
        ),
        'desc'    => __('Set the way the background image is attached to the page. Scroll = normal Fixed = The background is fixed with regard to the viewport.', 'lambda-admin-td'),
    ),
    array(
        'name'    => __('Background Image Parallax Effect', 'lambda-admin-td'),
        'id'      => 'background_image_parallax',
        'type'    => 'select',
        'default' => 'off',
        'options' => array(
            'off' => __('Off', 'lambda-admin-td'),
            'on'  => __('On', 'lambda-admin-td'),
        ),
        'desc'    => __('Toggles the background image parallax effect.', 'lambda-admin-td'),
    ),
    array(
        'name'      => __('Parallax Effect Start Position ', 'lambda-admin-td'),
        'desc'      => __('Sets the position of the image in pixels that the parallax effect will start from.', 'lambda-admin-td'),
        'id'        => 'background_image_parallax_start',
        'type'      => 'slider',
        'default'   => '0',
        'attr'      => array(
            'max'       => 500,
            'min'       => -500,
            'step'      => 1
        )
    ),
    array(
        'name'      => __('Parallax Effect End Position', 'lambda-admin-td'),
        'desc'      => __('Sets the percentage of the image in pixels that the parallax effect will end up at.', 'lambda-admin-td'),
        'id'        => 'background_image_parallax_end',
        'type'      => 'slider',
        'default'   => '-80',
        'attr'      => array(
            'max'       => 500,
            'min'       => -500,
            'step'      => 1
        )
    ),
    array(
        'name'    => __('Section Height', 'lambda-admin-td'),
        'desc'    => __('Section will vertically cover the entire viewport if Full Height is selected', 'lambda-admin-td'),
        'id'      => 'height',
        'type'    => 'select',
        'options' => array(
            'normal'       => __('Normal', 'lambda-admin-td'),
            'fullheight'   => __('Full Height', 'lambda-admin-td'),
        ),
        'default' => 'normal',
    ),
    array(
        'name'    => __('Section Transparency', 'lambda-admin-td'),
        'desc'    => __('Section will be tranparent if On is selected', 'lambda-admin-td'),
        'id'      => 'transparency',
        'type'    => 'select',
        'options' => array(
            'transparent'   => __('On', 'lambda-admin-td'),
            'opaque'        => __('Off', 'lambda-admin-td'),
        ),
        'default' => 'opaque',
    ),
    array(
        'name'    => __('Section Content Vertical Alignment', 'lambda-admin-td'),
        'desc'    => __('Align the content of the section vertically', 'lambda-admin-td'),
        'id'      => 'vertical_alignment',
        'type'    => 'select',
        'options' => array(
            'default'   => __('Normal', 'lambda-admin-td'),
            'top'       => __('Top', 'lambda-admin-td'),
            'middle'    => __('Middle', 'lambda-admin-td'),
            'bottom'    => __('Bottom', 'lambda-admin-td'),
        ),
        'default' => 'default',
    ),
);

$responsive_options = include OXY_THEME_DIR . 'inc/options/shortcodes/shared/responsive.php';
return array_merge($section_options, $responsive_options);
