<?php
/**
 * Heading options
 *
 * @package Lambda
 * @subpackage Admin
 * @since 0.1
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version 1.17.0
 */
return array(
     array(
        'name'        => __('Header Text', 'lambda-admin-td'),
        'id'          => 'content',
        'type'        => 'text',
        'default'     => '',
        'desc'        => __('Text that will be used for the header.', 'lambda-admin-td'),
        'admin_label' => true,
    ),
    array(
        'name'      => __('Text Color', 'lambda-admin-td'),
        'desc'      => __('Set the text color of the heading', 'lambda-admin-td'),
        'id'        => 'text_color',
        'type'      => 'select',
        'options'   => array(
            'text-normal' => __('Normal Text', 'lambda-admin-td'),
            'text-light'  => __('Light Text', 'lambda-admin-td'),
        ),
        'default'   => 'text-normal'
    ),
    array(
        'name'    => __('Header Type', 'lambda-admin-td'),
        'desc'    => __('Choose the type of header you want to use', 'lambda-admin-td'),
        'id'      => 'header_type',
        'type'    => 'select',
        'options' => array(
            'h1'      => __('h1', 'lambda-admin-td'),
            'h2'      => __('h2', 'lambda-admin-td'),
            'h3'      => __('h3', 'lambda-admin-td'),
            'h4'      => __('h4', 'lambda-admin-td'),
            'h5'      => __('h5', 'lambda-admin-td'),
            'h6'      => __('h6', 'lambda-admin-td')
        ),
        'default' => 'h1',
    ),
    array(
        'name'    => __('Header Font Size', 'lambda-admin-td'),
        'desc'    => __('Choose size of the font to use in your header', 'lambda-admin-td'),
        'id'      => 'header_size',
        'type'    => 'select',
        'options' => array(
            'normal' => __('Normal', 'lambda-admin-td'),
            'big'    => __('Big (36px)', 'lambda-admin-td'),
            'bigger' => __('Bigger (48px)', 'lambda-admin-td'),
            'super'  => __('Super (60px)', 'lambda-admin-td'),
            'hyper'  => __('Hyper (96px)', 'lambda-admin-td'),
        ),
        'default' => 'normal',
    ),
    array(
        'name'    => __('Header Font Weight', 'lambda-admin-td'),
        'desc'    => __('Choose weight of the font to use in the header', 'lambda-admin-td'),
        'id'      => 'header_weight',
        'type'    => 'select',
        'options' => array(
            'default'  => __('Default (from skin)', 'lambda-admin-td'),
            'hairline' => __('Hairline', 'lambda-admin-td'),
            'light'    => __('Light', 'lambda-admin-td'),
            'regular'  => __('Regular', 'lambda-admin-td'),
            'black'    => __('Black', 'lambda-admin-td'),
            'bold'     => __('Bold', 'lambda-admin-td'),
        ),
        'default' => 'default',
    ),
    array(
        'name' => __('Header Alignment', 'lambda-admin-td'),
        'desc' => __('Align the text shown in the header left, right or center.', 'lambda-admin-td'),
        'id'   => 'header_align',
        'type' => 'select',
        'default' => 'left',
        'options' => array(
            'default'   => __('Default alignment', 'lambda-admin-td'),
            'left'   => __('Left', 'lambda-admin-td'),
            'center' => __('Center', 'lambda-admin-td'),
            'right'  => __('Right', 'lambda-admin-td'),
            'justify'     => __('Justify', 'lambda-admin-td')
        )
    ),
    array(
        'name'    => __('Fade out when leaving page', 'lambda-admin-td'),
        'desc'    => __('Fades the heading out when the heading leaves the page.', 'lambda-admin-td'),
        'id'      => 'header_fade_out',
        'default' => 'off',
        'type'    => 'select',
        'options' => array(
            'off' => __('Off', 'lambda-admin-td'),
            'on'  => __('On', 'lambda-admin-td'),
        )
    ),
    array(
        'name'        => __('Extra Classes', 'lambda-admin-td'),
        'id'          => 'extra_classes',
        'type'        => 'text',
        'default'     => '',
        'desc'        => __('Space separated extra classes to add to the heading.', 'lambda-admin-td'),
    ),
    array(
        'name'    => __('Margin Top', 'lambda-admin-td'),
        'desc'    => __('Amount of space to add above this element.', 'lambda-admin-td'),
        'id'      => 'margin_top',
        'type' => 'slider',
        'default'   => '20',
        'attr'      => array(
            'max'       => 300,
            'min'       => 0,
            'step'      => 10,
        )
    ),
    array(
        'name'    => __('Margin Bottom', 'lambda-admin-td'),
        'desc'    => __('Amount of space to add below this element.', 'lambda-admin-td'),
        'id'      => 'margin_bottom',
        'type' => 'slider',
        'default'   => '20',
        'attr'      => array(
            'max'       => 300,
            'min'       => 0,
            'step'      => 10,
        )
    )
);
