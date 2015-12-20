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
?>
<article id="post-<?php the_ID(); ?>" class="post-grid element-bottom-20 text-<?php echo esc_attr($text_align); ?>">
    <?php if (!empty($image)) : ?>
        <a href="<?php the_permalink(); ?>">
            <img src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>" class="img-responsive">
        </a>
    <?php endif ?>
    <div class="post-grid-content">
        <<?php echo esc_attr($title_tag); ?> class="post-grid-content-title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </<?php echo esc_attr($title_tag); ?>>
        <p><?php echo get_the_excerpt(); ?></p>
        <div class="post-grid-content-footer">
            <?php if( oxy_get_option( 'blog_author' ) === 'on' ) : ?>
                <?php the_author(); ?>
                ,
            <?php endif; ?>
            <?php the_time(get_option('date_format')); ?>
        </div>
    </div>
</article>