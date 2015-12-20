<?php
/**
 * Test Options Page
 *
 * @package Lambda
 * @subpackage options-pages
 * @since 1.0
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license http://wiki.envato.com/support/legal-terms/licensing-terms/
 * @version 1.17.0
 */

return array(
    'sections'   => array(
        'twitter-section' => array(
            'fields' => array(
                array(
                    'name' => __('Show language as', 'lambda-admin-td'),
                    'id' => 'display',
                    'type' => 'select',
                    'default' => 'name',
                    'options' => array(
                        'name'     => __('Name', 'lambda-admin-td'),
                        'code'     => __('Country Code', 'lambda-admin-td'),
                        'flag'     => __('Flag', 'lambda-admin-td'),
                        'nameflag' => __('Name & Flag', 'lambda-admin-td')
                    )
                ),
                array(
                    'name' => __('Order languages by', 'lambda-admin-td'),
                    'id' => 'order',
                    'type' => 'select',
                    'default' => 'id',
                    'options' => array(
                        'id'   => __('ID', 'lambda-admin-td'),
                        'code' => __('Code', 'lambda-admin-td'),
                        'name' => __('Name', 'lambda-admin-td')
                    ),
                ),
                array(
                    'name' => __('Order direction', 'lambda-admin-td'),
                    'id' => 'orderby',
                    'type' => 'select',
                    'default' => 'id',
                    'options' => array(
                        'asc'   => __('Ascending', 'lambda-admin-td'),
                        'desc' => __('Descending', 'lambda-admin-td'),
                    ),
                ),
                array(
                    'name' => __('Skip Missing Languages', 'lambda-admin-td'),
                    'id' => 'skip_missing',
                    'type' => 'select',
                    'default' => '1',
                    'options' => array(
                        '1' => __('Skip', 'lambda-admin-td'),
                        '0' => __('Dont Skip', 'lambda-admin-td'),
                    ),
                    'desc' => __('Skip languages with no translations.', 'lambda-admin-td')
                ),
            )//fields
        )//section
    )//sections
);//array
