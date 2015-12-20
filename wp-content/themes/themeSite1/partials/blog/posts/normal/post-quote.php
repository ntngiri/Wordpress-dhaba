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
<article id="post-<?php the_ID(); ?>" <?php post_class( $extra_article_class ); ?>>
    <div class="post-body">
        <?php echo oxy_shortcode_blockquote( array(
            'who'           => get_the_title(),
            'margin_top'    => 'no-top',
            'margin_bottom' => 'no-bottom'
        ), get_the_content() ); ?>
    </div>
</article>