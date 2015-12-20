<?php
/**
 * Displays the main body of the theme
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
oxy_blog_header();
// if masonry option set then use masonry option for name otherwise use blog style
$name = oxy_get_option('blog_style');
if (oxy_get_option('blog_masonry') !== 'no-masonry') {
    $name = oxy_get_option('blog_masonry');
}
get_template_part('partials/blog/list/' . apply_filters('oxy_blog_type', $name));
get_footer();
