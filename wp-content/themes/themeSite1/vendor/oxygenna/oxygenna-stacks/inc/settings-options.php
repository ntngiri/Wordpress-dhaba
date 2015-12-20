<?php
/**
 * Stores stack settings options
 *
 * @package Lambda
 * @subpackage Admin
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version 1.17.0
 * @author Oxygenna.com
 */

return array(
    'page_title' => __('Settings', 'lambda-admin-td'),
    'menu_title' => __('Settings', 'lambda-admin-td'),
    'slug'       => THEME_SHORT . '-stack-settings',
    'main_menu'  => false,
    'icon'       => 'tools',
    'sections'   => array(
        'stack-save-css-options' => array(
            'title'   => __('CSS Style options', 'lambda-admin-td'),
            'header'  => __('Set up how your styles are saved.', 'lambda-admin-td'),
            'fields' => array(
                array(
                    'name'    => __('Load CSS from', 'lambda-admin-td'),
                    'desc'    => __('CSS can be loaded from a file (requires file permissions) or injected into the header.', 'lambda-admin-td'),
                    'id'      => 'css_save_to',
                    'type'    => 'select',
                    'options' => array(
                        'header' => __('Header', 'lambda-admin-td'),
                        'file'   => __('File', 'lambda-admin-td')
                    ),
                    'default' => 'file',
                ),
                array(
                    'name'    => __('CSS Output format', 'lambda-admin-td'),
                    'desc'    => __('Choose an output format for your CSS (useful for debugging CSS).', 'lambda-admin-td'),
                    'id'      => 'css_format',
                    'type'    => 'select',
                    'options' => array(
                        'scss_formatter'            => __('Normal', 'lambda-admin-td'),
                        'scss_formatter_nested'     => __('Nested', 'lambda-admin-td'),
                        'scss_formatter_compressed' => __('Compressed', 'lambda-admin-td'),
                    ),
                    'default' => 'scss_formatter_compressed',
                ),
            )
        ),
    )
);
