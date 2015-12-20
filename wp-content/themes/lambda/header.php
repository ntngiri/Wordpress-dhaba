<?php
/**
 * Displays the head section of the theme
 *
 * @package Lambda
 * @subpackage Frontend
 * @since 0.1
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license http://wiki.envato.com/support/legal-terms/licensing-terms/
 * @version 1.17.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" /><?php

        $site_icon_id = get_option('site_icon');
        if ($site_icon_id === '0' || $site_icon_id === false) {
            oxy_favicons();
        }

        wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div class="pace-overlay"></div>
        <?php oxy_create_nav_header(); ?>
        <div id="content" role="main">