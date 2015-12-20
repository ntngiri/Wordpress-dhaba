<?php
/**
 * Service options
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
        'name'      =>  __('Image Shape', 'lambda-admin-td'),
        'id'        => 'image_shape',
        'type'      => 'select',
        'admin_label' => true,
        'options'   =>  array(
            'round'  => __('Circle', 'lambda-admin-td'),
            'square' => __('Square', 'lambda-admin-td'),
            'rect'   => __('Rectangle', 'lambda-admin-td'),
            'none'   => __('None (no shape will be added)', 'lambda-admin-td'),
        ),
        'default'   => 'round',
    ),
    array(
        'name'      =>  __('Shape Size', 'lambda-admin-td'),
        'id'        => 'image_size',
        'type'      => 'select',
        'options'   =>  array(
            'big'    => __('Big', 'lambda-admin-td'),
            'huge'   => __('Huge', 'lambda-admin-td'),
            'normal' => __('Normal', 'lambda-admin-td'),
            'medium' => __('Medium', 'lambda-admin-td'),
            'small'  => __('Small', 'lambda-admin-td'),
        ),
        'default'   => 'big',
    ),
    array(
        'name'      => __('Icon Color', 'lambda-admin-td'),
        'desc'      => __('Set the color of the icon', 'lambda-admin-td'),
        'id'        => 'icon_colour',
        'type'      => 'colour',
        'default'   => '',
        'attr'      => array(
            'class' => 'allow-empty'
        )
    ),
    array(
        'name'    => __('Icon Animation', 'lambda-admin-td'),
        'desc'    => __('Icon Animation that will occur when you hover over the service shape.', 'lambda-admin-td'),
        'id'      => 'icon_animation',
        'type'    => 'select',
        'default' => 'bounce',
        'options' => include OXY_THEME_DIR . 'inc/options/global-options/animations.php'
    ),
    array(
        'name'      => __('Shape Background Color', 'lambda-admin-td'),
        'desc'      => __('Set the color shape background.', 'lambda-admin-td'),
        'id'        => 'background_colour',
        'type'      => 'colour',
        'default'   => '',
        'format'  => 'rgba',
        'attr'      => array(
            'class' => 'allow-empty'
        )
    ),
    array(
        'name'      => __('Shape Background Grid', 'lambda-admin-td'),
        'desc'      => __('Adds a grid pattern to the shape background.', 'lambda-admin-td'),
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
        'name'      => __('Show Image', 'lambda-admin-td'),
        'id'        => 'show_image',
        'type'      => 'select',
        'default'   =>  'show',
        'options' => array(
            'show'  => __('Show', 'lambda-admin-td'),
            'hide' => __('Hide', 'lambda-admin-td'),
        ),
    ),
    array(
        'name'      => __('Link Image', 'lambda-admin-td'),
        'id'        => 'link_image',
        'type'      => 'select',
        'default'   =>  'on',
        'options' => array(
            'on'  => __('On', 'lambda-admin-td'),
            'off' => __('Off', 'lambda-admin-td'),
        ),
    ),
    array(
        'name'      => __('Show Titles', 'lambda-admin-td'),
        'id'        => 'show_title',
        'type'      => 'select',
        'default'   =>  'show',
        'options' => array(
            'show' => __('Show', 'lambda-admin-td'),
            'hide' => __('Hide', 'lambda-admin-td'),
        ),
    ),
    array(
        'name'      => __('Title Tag', 'lambda-admin-td'),
        'id'        => 'tag_title',
        'type'      => 'select',
        'default'   =>  'h3',
        'options' => array(
            'h1'  => __('h1', 'lambda-admin-td'),
            'h2'  => __('h2', 'lambda-admin-td'),
            'h3'  => __('h3', 'lambda-admin-td'),
            'h4'  => __('h4', 'lambda-admin-td'),
            'h5'  => __('h5', 'lambda-admin-td'),
            'h6'  => __('h6', 'lambda-admin-td'),
        ),
    ),
    array(
        'name'      => __('Link Title', 'lambda-admin-td'),
        'id'        => 'link_title',
        'type'      => 'select',
        'default'   =>  'on',
        'options' => array(
            'on'  => __('On', 'lambda-admin-td'),
            'off' => __('Off', 'lambda-admin-td'),
        ),
    ),
    array(
        'name'      => __('Show Excerpt', 'lambda-admin-td'),
        'id'        => 'show_excerpt',
        'type'      => 'select',
        'default'   =>  'show',
        'options' => array(
            'show' => __('Show', 'lambda-admin-td'),
            'hide' => __('Hide', 'lambda-admin-td'),
        ),
    ),
    array(
        'name'      => __('Excerpt & More Text Alignment', 'lambda-admin-td'),
        'id'        => 'align',
        'type'      => 'select',
        'default'   => 'center',
        'options' => array(
            'default'   => __('Default alignment', 'lambda-admin-td'),
            'left'   => __('Left', 'lambda-admin-td'),
            'center' => __('Center', 'lambda-admin-td'),
            'right'  => __('Right', 'lambda-admin-td'),
            'justify' => __('Justify', 'lambda-admin-td')
        ),
        'desc'    => __('Sets the text alignment of the excerpt text and the read more link.', 'lambda-admin-td'),
    ),
    array(
        'name'      => __('Show Readmore Link', 'lambda-admin-td'),
        'id'        => 'show_readmore',
        'type'      => 'select',
        'default'   =>  'hide',
        'options' => array(
            'hide' => __('Hide', 'lambda-admin-td'),
            'show' => __('Show', 'lambda-admin-td'),
        ),
    ),
    array(
        'name'    => __('Readmore Link Text', 'lambda-admin-td'),
        'id'      => 'readmore_text',
        'type'    => 'text',
        'default' => __('read more', 'lambda-admin-td'),
        'desc'    => __('Customize your readmore link', 'lambda-admin-td'),
    ),
);
