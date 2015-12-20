<?php
/**
 * Shows a simple single post
 *
 * @package Lambda
 * @subpackage Frontend
 * @since 1.0
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license http://wiki.envato.com/support/legal-terms/licensing-terms/
 * @version 1.17.0
 */
global $post;
$media_position = oxy_get_option('blog_post_media_position');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $extra_article_class ); ?>>
    <?php if ($media_position === 'below'): ?>
        <?php get_template_part( 'partials/blog/posts/normal/post', 'header' ); ?>
    <?php endif ?>

    <?php if( has_post_thumbnail() && !is_search()) : ?>
        <div class="post-media">
            <?php get_template_part( 'partials/blog/posts/normal/featured-image' ); ?>
        </div>
    <?php endif; ?>

    <?php if ($media_position === 'above'): ?>
        <?php get_template_part( 'partials/blog/posts/normal/post', 'header' ); ?>
    <?php endif ?>

    <div class="post-body">
        <?php
        the_content( '', oxy_get_option('blog_stripteaser') === 'on' ); ?>
    </div>

    <?php get_template_part( 'partials/blog/posts/normal/post', 'footer' );

    if( !is_single() && oxy_get_option('blog_show_readmore') === 'on' ) {
        // show up to readmore tag and conditionally render the readmore
        oxy_read_more_link();
    } ?>
</article>