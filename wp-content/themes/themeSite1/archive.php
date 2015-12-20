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
$name = oxy_get_option('blog_masonry') === 'no-masonry' ? oxy_get_option('blog_style') : oxy_get_option('blog_masonry');
$title = null;
$subtitle = null;

get_header();
if (is_day()) {
    $title = get_the_date('j M Y');
} elseif (is_month()) {
    $title = get_the_date('F Y');
} elseif (is_year()) {
    $title = get_the_date('Y');
}
oxy_blog_header($title);
get_template_part('partials/blog/list/' . $name);
get_footer();
