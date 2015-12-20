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
$src = '';
if (!empty($image)) {
    $src = 'style="background-image: url(' . esc_url($image) . ')"';
}
?>
<article id="post-<?php the_ID(); ?>" class="post-grid post-grid-overlay element-bottom-20 text-<?php echo esc_attr($text_align); ?>" <?php echo $src; ?>>
    <a href="<?php the_permalink(); ?>">
        <div class="post-grid-content">
            <<?php echo esc_attr($title_tag); ?> class="post-grid-content-title">
                <?php the_title(); ?>
            </<?php echo esc_attr($title_tag); ?>>
            <div class="post-grid-content-footer">
                <?php if( oxy_get_option( 'blog_author' ) === 'on' ) : ?>
                    <?php the_author(); ?>
                    ,
                <?php endif; ?>
                <?php the_time(get_option('date_format')); ?>
            </div>
        </div>
    </a>
</article>