<?php
/**
 * Padding element options
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
