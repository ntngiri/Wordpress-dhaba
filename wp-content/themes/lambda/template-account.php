<?php
/**
 * Template Name: Woocommerce account template
 *
 * @package Lambda
 * @subpackage Frontend
 * @since 0.1
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license http://wiki.envato.com/support/legal-terms/licensing-terms/
 * @version 1.17.0
 */

get_header();
oxy_woo_shop_header();
while( have_posts() ) {
    the_post();
    get_template_part('partials/content', 'account');
}

get_footer();