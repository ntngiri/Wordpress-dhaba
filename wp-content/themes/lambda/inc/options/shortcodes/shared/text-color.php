<?php
/**
 * Text color options
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
        'name'      => __('Text Color', 'lambda-admin-td'),
        'desc'      => __('Set the text color of the heading', 'lambda-admin-td'),
        'id'        => 'text_color',
        'type'      => 'select',
        'options'   => array(
            'text-normal' => __('Normal Text', 'lambda-admin-td'),
            'text-light'  => __('Light Text', 'lambda-admin-td'),
        ),
        'default'   => 'text-normal'
    )
);
