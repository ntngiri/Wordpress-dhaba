<?php
/**
 * Creates theme shortcode options
 *
 * @package Lambda
 * @subpackage Admin
 * @since 0.1
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version 1.17.0
 */

global $oxy_theme;
if( isset( $oxy_theme ) ) {
    $shortcode_options = include OXY_THEME_DIR . 'inc/options/shortcodes/shortcode-options.php';    
    $oxy_theme->register_shortcode_options($shortcode_options);
}