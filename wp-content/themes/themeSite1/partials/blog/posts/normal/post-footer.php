<?php
/**
 * Post content footer items
 *
 * @package Lambda
 * @subpackage Admin
 * @since 0.1
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version 1.17.0
 */

$author_id = get_the_author_meta('ID');
$author_url = get_author_posts_url( $author_id );
?>
<?php if( is_single() ) : ?>
    <?php oxy_wp_link_pages(array('before' => '<div class="text-center element-bottom-60">', 'after' => '</div>')); ?>
<?php endif; ?>

<?php if (oxy_get_option('blog_post_header') === 'subtitle') : ?>
    <?php get_template_part( 'partials/blog/posts/normal/post', 'details' ); ?>
<?php endif; ?>

<?php if( is_single() ) : ?>
<div class="row">
    <div class="col-md-8">
        <div class="small-screen-center post-extras">
            <div class="post-tags">
                <?php if( has_tag() && oxy_get_option( 'blog_tags' ) === 'on' ) : ?>
                    <?php the_tags( $before = '', $sep = ' ', $after = '' ); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if ( !in_array('none', oxy_get_option( 'blog_social_networks' )) ) : ?>
    <div class="col-md-4">
        <div class="text-right small-screen-center post-share">
            <?php
                echo oxy_shortcode_sharing( array(
                    'social_networks'   => implode( ',', oxy_get_option( 'blog_social_networks' ) ),
                    'icon_size'         => 'sm',
                    'background_show'   => 'simple',
                    'margin_top'        => 0,
                    'margin_bottom'     => 0,
                ));
            ?>
        </div>
    </div>
    <?php endif; ?>
</div>

    <?php if( oxy_get_option( 'author_bio' ) === 'on' ) : ?>
<div class="author-info media small-screen-center">
    <div class="author-avatar">
        <?php if (oxy_get_option('author_bio_avatar') == 'on') : ?>
            <?php echo get_avatar( $author_id, 150 ); ?>
        <?php endif; ?>
    </div>
    <h3>
        <a href="<?php echo $author_url; ?>">
            <?php the_author_meta('nickname'); ?>
        </a>
    </h3>
    <p>
        <?php the_author_meta('description'); ?>
    </p>
</div>
    <?php endif; ?>
<?php endif; ?>
<?php oxy_atom_author_meta(); ?>