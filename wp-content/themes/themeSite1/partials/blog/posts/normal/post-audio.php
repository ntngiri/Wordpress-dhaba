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
global $wp_embed;
global $post;

$content          = get_the_content( '', oxy_get_option('blog_stripteaser') === 'on' );
$audio_shortcode  = oxy_get_content_shortcode( $post, 'audio' );

if( $audio_shortcode !== null){
    $audio_src = null;
    if( array_key_exists( 3, $audio_shortcode ) ) {
        if( array_key_exists( 0, $audio_shortcode[3] ) ) {
            $audio_attrs = shortcode_parse_atts( $audio_shortcode[3][0] );
            if( array_key_exists( 'src', $audio_attrs) ) {
                $audio_src =  $audio_attrs['src'];
            }
        }
        $content = str_replace( $audio_shortcode[0][0], '', $content );
    }
}
$media_position = oxy_get_option('blog_post_media_position');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $extra_article_class ); ?>>
    <?php if ($media_position === 'below'): ?>
        <?php get_template_part( 'partials/blog/posts/normal/post', 'header' ); ?>
    <?php endif ?>

    <div class="post-media">
        <?php
        if( !is_search() ) {
            if( $audio_src !== null ) { ?>
                <audio controls="" preload="auto" style="width:100%; height:100%;">
                    <source src="<?php echo esc_url($audio_src); ?>">
                </audio>
                <?php

            }
            else if ( has_post_thumbnail()  ) {
                get_template_part( 'partials/blog/posts/normal/featured-image' );
            }
        }
        ?>
    </div>

    <?php if ($media_position === 'above'): ?>
        <?php get_template_part( 'partials/blog/posts/normal/post', 'header' ); ?>
    <?php endif ?>

    <div class="post-body">
        <?php
        echo apply_filters( 'the_content', $content ); ?>
    </div>

    <?php get_template_part( 'partials/blog/posts/normal/post', 'footer' );

    if( !is_single() && oxy_get_option('blog_show_readmore') == 'on' ) {
        // show up to readmore tag and conditionally render the readmore
        oxy_read_more_link();
    } ?>
</article>