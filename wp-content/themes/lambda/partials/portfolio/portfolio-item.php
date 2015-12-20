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
if( has_post_thumbnail() ) {
    $attachment = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
    if ( isset( $attachment[0] ) ) {
        $src = $attachment[0];
    }
}
?>
<div class="figure fade-in text-center vertical-middle" >
    <a class="figure-image" href="<?php the_permalink(); ?>">
        <img src="<?php echo esc_url($src); ?>" alt="<?php the_title(); ?>">
        <div class="figure-overlay" >
            <div class="figure-overlay-container">
                <div class="figure-caption">
                    <h3><?php the_title(); ?></h3>
                </div>
            </div>
        </div>
    </a>
</div>