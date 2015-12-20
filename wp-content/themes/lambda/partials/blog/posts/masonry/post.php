<?php
/**
 * Loads a masonry post
 *
 * @package Lambda
 * @subpackage Admin
 * @since 0.1
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version 1.17.0
 */
global $post;
$image = get_post_meta( $post->ID, THEME_SHORT.'_masonry_image', true );
if( empty( $image ) ) {
    $image_attachment = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
    if( isset( $image_attachment[0] ) ) {
        $image = $image_attachment[0];
    }
}
$width = get_post_meta( $post->ID, THEME_SHORT.'_masonry_width', true );

$item_style = oxy_get_option('blog_masonry_style');
$text_align = oxy_get_option('blog_masonry_text_align');
$title_tag = oxy_get_option('blog_masonry_title_tag');

$format = get_post_format();
if($format !== 'quote' && $format !== 'link') {
    $format = 'standard';
}
?>
<div class="post-masonry masonry-item masonry-<?php echo esc_attr($width); ?>" data-menu-order="<?php echo esc_attr($masonry_count); ?>">
    <div class="post-masonry-inner <?php echo esc_attr(implode( ' ', $classes )); ?>" data-os-animation="<?php echo esc_attr($scroll_animation); ?>" data-os-animation-delay="<?php echo esc_attr($scroll_animation_delay);?>s">
        <?php include(locate_template('partials/blog/posts/' . $item_style . '/post-' . $format . '.php')); ?>
    </div>
</div>