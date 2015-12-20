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
<article id="post-<?php the_ID(); ?>" class="post-grid post-grid-overlay element-bottom-20" <?php echo $src; ?>>
    <?php echo oxy_shortcode_blockquote( array(
        'who'           => get_the_title(),
        'margin_top'    => 'no-top',
        'margin_bottom' => 'no-bottom',
        'align'         => $text_align
    ), get_the_content() ); ?>
</article>