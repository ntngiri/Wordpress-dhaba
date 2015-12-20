<?php
/**
 * Staff options
 *
 * @package Lambda
 * @subpackage Core
 * @since 1.0
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license http://wiki.envato.com/support/legal-terms/licensing-terms/
 * @version 1.17.0
 */

return array(
    array(
        'name'    => __('Show Position', 'lambda-admin-td'),
        'desc'    => __('Display the staff position below the name', 'lambda-admin-td'),
        'id'      => 'show_position',
        'type'    => 'select',
        'default' => 'show',
        'options' => array(
            'show' => __('Show', 'lambda-admin-td'),
            'hide' => __('Hide', 'lambda-admin-td'),
        ),
    ),
    array(
        'name'      => __('Show Social Links', 'lambda-admin-td'),
        'desc'    => __('Enables hover overlay.', 'lambda-admin-td'),
        'id'        => 'show_social',
        'type'      => 'select',
        'default'   => 'show',
        'options' => array(
            'show' => __('Show', 'lambda-admin-td'),
            'hide' => __('Hide', 'lambda-admin-td'),
        ),
    ),
    array(
        'name'    => __('Link Title', 'lambda-admin-td'),
        'desc'    => __('Makes the Title a link.', 'lambda-admin-td'),
        'id'      => 'link_title',
        'type'    => 'select',
        'default' => 'on',
        'options'   => array(
            'on'  => __('On', 'lambda-admin-td'),
            'off' => __('Off', 'lambda-admin-td'),
        ),
    ),
    array(
        'name'      => __('Show Description', 'lambda-admin-td'),
        'id'        => 'show_description',
        'type'      => 'select',
        'default'   => 'show',
        'options' => array(
            'show' => __('Show', 'lambda-admin-td'),
            'hide' => __('Hide', 'lambda-admin-td'),
        ),
    ),
    array(
        'name'      => __('Text Horizontal Alignment', 'lambda-admin-td'),
        'id'        => 'text_align',
        'type'      => 'select',
        'default'   => 'center',
        'options' => array(
            'center' => __('Center', 'lambda-admin-td'),
            'left'   => __('Left', 'lambda-admin-td'),
            'right'  => __('Right', 'lambda-admin-td'),
            'justify'     => __('Justify', 'lambda-admin-td')
        ),
        'desc'    => __('The text alignment of the caption text / title.', 'lambda-admin-td'),
    ),
    array(
        'name'      => __('Item Overlay Hover Animation', 'lambda-admin-td'),
        'id'        => 'overlay_animation',
        'type'        => 'select',
        'default'     => 'fade-in',
        'options'     => array(
            'fade-in'     => __('Fade in', 'lambda-admin-td'),
            'fade-in from-top'    => __('Fade From Top', 'lambda-admin-td'),
            'fade-in from-bottom' => __('Fade From Bottom', 'lambda-admin-td'),
            'fade-in from-left'   => __('Fade From Left', 'lambda-admin-td'),
            'fade-in from-right'  => __('Fade From Right', 'lambda-admin-td'),
            'fade-none'        => __('No Animation', 'lambda-admin-td'),
        ),
        'desc'    => __('What animation will be used to reveal the image hover overlay.', 'lambda-admin-td'),
    ),
    array(
        'name'      => __('Item Overlay Grid', 'lambda-admin-td'),
        'desc'      => __('Grid pattern to apply over the image on hover.', 'lambda-admin-td'),
        'id'        => 'overlay_grid',
        'type'      => 'slider',
        'default'   => '0',
        'attr'      => array(
            'max'       => 100,
            'min'       => 0,
            'step'      => 10,
        )
    )
);
