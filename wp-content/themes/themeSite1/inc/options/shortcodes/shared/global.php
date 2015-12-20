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
$animation_options = include OXY_THEME_DIR . 'inc/options/shortcodes/shared/animation.php';
$padding_options = include OXY_THEME_DIR . 'inc/options/shortcodes/shared/padding.php';
$responsive_options = include OXY_THEME_DIR . 'inc/options/shortcodes/shared/responsive.php';

$extra_classes = array(
    array(
        'name'    => __('Extra Classes', 'lambda-admin-td'),
        'desc'    => __('Add any extra classes you need to add to this element. ( space separated )', 'lambda-admin-td'),
        'id'      => 'extra_classes',
        'default'     =>  '',
        'type'        => 'text',
    )
);

return array_merge($padding_options, $animation_options, $responsive_options, $extra_classes);
