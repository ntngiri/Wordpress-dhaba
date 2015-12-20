<?php
/**
 * Stores options for themes quick uploaders
 *
 * @package Lambda
 * @subpackage Admin
 * @since 0.1
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license http://wiki.envato.com/support/legal-terms/licensing-terms/
 * @version 1.17.0
 */

return array(
    // slideshoe quick upload
    'oxy_slideshow_image' => array(
        'menu_title' => __('Quick Slideshow', 'lambda-admin-td'),
        'page_title' => __('Quick Slideshow Creator', 'lambda-admin-td'),
        'item_singular'  => __('Slideshow Image', 'lambda-admin-td'),
        'item_plural'  => __('Slideshow Images', 'lambda-admin-td'),
        'taxonomies' => array(
            'oxy_slideshow_categories'
        )
    ),
    // services quick upload
    'oxy_service' => array(
        'menu_title' => __('Quick Services', 'lambda-admin-td'),
        'page_title' => __('Quick Services Creator', 'lambda-admin-td'),
        'item_singular'  => __('Services', 'lambda-admin-td'),
        'item_plural'  => __('Service', 'lambda-admin-td'),
        'show_editor' => true,
    ),
    // portfolio quick upload
    'oxy_portfolio_image' => array(
        'menu_title' => __('Quick Portfolio', 'lambda-admin-td'),
        'page_title' => __('Quick Portfolio Creator', 'lambda-admin-td'),
        'item_singular'  => __('Portfolio Image', 'lambda-admin-td'),
        'item_plural'  => __('Portfolio Images', 'lambda-admin-td'),
        'show_editor' => true,
        'taxonomies' => array(
            'oxy_portfolio_categories'
        )
    ),
    // staff quick upload
    'oxy_staff' => array(
        'menu_title' => __('Quick Staff', 'lambda-admin-td'),
        'page_title' => __('Quick Staff Creator', 'lambda-admin-td'),
        'item_singular'  => __('Staff Member', 'lambda-admin-td'),
        'item_plural'  => __('Staff', 'lambda-admin-td'),
        'show_editor' => true,
        'taxonomies' => array(
            'oxy_staff_skills'
        )
    )
);
