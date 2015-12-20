<?php
/**
 * Themes shortcode image options go here
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
        'title' => __('Image options', 'lambda-admin-td'),
        'fields' => array(
            array(
                'name'    => __('Image Shape', 'lambda-admin-td'),
                'desc'    => __('Choose the shape of the image', 'lambda-admin-td'),
                'id'      => 'image_shape',
                'type'    => 'select',
                'options' => array(
                    'box-round'    => __('Round', 'lambda-admin-td'),
                    'box-rect'     => __('Rectangle', 'lambda-admin-td'),
                    'box-square'   => __('Square', 'lambda-admin-td'),
                ),
                'default' => 'box-round',
            ),
            array(
                'name'    => __('Image Size', 'lambda-admin-td'),
                'desc'    => __('Choose the size of the image', 'lambda-admin-td'),
                'id'      => 'image_size',
                'type'    => 'select',
                'options' => array(
                    'box-mini'    => __('Mini', 'lambda-admin-td'),
                    'no-small'    => __('Small', 'lambda-admin-td'),
                    'box-medium'  => __('Medium', 'lambda-admin-td'),
                    'box-big'     => __('Big', 'lambda-admin-td'),
                    'box-huge'    => __('Huge', 'lambda-admin-td'),
                ),
                'default' => 'box-medium',
            ),
        )
);