<?php
/**
 * Main Blog loop for masonry
 *
 * @package Lambda
 * @subpackage Frontend
 * @since 1.4
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version 1.17.0
 */
if (have_posts()) {
    $masonry_count = 0;
    $classes = array();
    $scroll_animation = 'none';
    $scroll_animation_delay = 0;

    while (have_posts()) {
        the_post();
        include(locate_template('partials/blog/posts/masonry/post.php'));
        $masonry_count++;
    }
    infinite_scroll_pagination();
} else {
    get_template_part('partials/blog/posts/normal/post', 'no-posts');
}
