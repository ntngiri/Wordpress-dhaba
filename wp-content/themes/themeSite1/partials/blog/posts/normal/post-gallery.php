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
$theme_options = get_option(THEME_SHORT . '-options');
global $post;

$content           = get_the_content( '', oxy_get_option('blog_stripteaser') === 'on' );
$gallery_shortcode = oxy_get_content_shortcode( $post, 'gallery' );
$gallery_ids       = null;

if( $gallery_shortcode !== null ) {
    if( isset( $gallery_shortcode[0] ) ) {
        if( array_key_exists( 3, $gallery_shortcode ) ) {
            if( array_key_exists( 0, $gallery_shortcode[3] ) ) {
                $gallery_attrs = shortcode_parse_atts( $gallery_shortcode[3][0] );
                if( array_key_exists( 'ids', $gallery_attrs) ) {
                    $gallery_ids = explode( ',', $gallery_attrs['ids'] );
                }
            }
        }
        // strip shortcode from the content
        $content = str_replace( $gallery_shortcode[0], '', $content );
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
            if( $gallery_ids !== null ) {
                echo oxy_shortcode_slideshow( array(
                    'ids'                 => $gallery_ids,
                    'animation'           => $theme_options['animation'],
                    'speed'               => $theme_options['speed'],
                    'duration'            => $theme_options['duration'],
                    'directionnav'        => $theme_options['directionnav'],
                    'itemwidth'           => '',
                    'showcontrols'        => $theme_options['showcontrols'],
                    'controlsposition'    => $theme_options['controlsposition'],
                    'controlsalign'       => $theme_options['controlsalign'],
                    'captions'            => $theme_options['captions'],
                    'captions_horizontal' => $theme_options['captions_horizontal'],
                    'autostart'           => $theme_options['autostart'],
                    'tooltip'             => $theme_options['tooltip'],
                    'image_size'          => oxy_get_post_image_size(),
                    // global options
                    'margin_top'             => 'no-top',
                    'margin_bottom'          => 'no-bottom',
                    'scroll_animation'       => 'none',
                    'scroll_animation_delay' => '0',
                ));
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