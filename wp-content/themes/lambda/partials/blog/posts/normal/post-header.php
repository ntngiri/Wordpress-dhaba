<?php
/**
 * Post header
 *
 * @package Lambda
 * @subpackage Admin
 * @since 0.1
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version 1.17.0
 */
$subtitle = get_post_meta( $post->ID, THEME_SHORT . '_post_subheader', true );
?>
<header class="post-head small-screen-center">
    <?php if( !is_single() ) : ?>
        <h2 class="post-title">
            <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'lambda-td' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
                <?php the_title(); ?>
            </a>
            <?php if( is_sticky() && is_home() && ! is_paged() ) : ?>
                <span class="post-sticky pulse">
                    <i class="icon icon-heart"></i>
                </span>
            <?php endif; ?>
        </h2>
    <?php else : ?>
        <h1 class="post-title">
            <?php the_title(); ?>
        </h1>
    <?php endif; ?>

    <?php if (oxy_get_option('blog_post_header') === 'details') : ?>
        <?php get_template_part( 'partials/blog/posts/normal/post', 'details' ); ?>
    <?php else: ?>
        <?php if( !empty($subtitle) ) : ?>
            <p class="lead"><?php echo $subtitle; ?></p>
        <?php endif; ?>
    <?php endif ?>
</header>