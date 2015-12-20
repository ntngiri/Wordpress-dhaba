<?php
/**
 * Default page template
 *
 * @package Lambda
 * @subpackage Frontend
 * @since 0.1
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license http://wiki.envato.com/support/legal-terms/licensing-terms/
 * @version 1.17.0
 */

$add_section = true;
if ( function_exists('is_woocommerce') ) {
    if ( is_woocommerce() || is_cart() || is_checkout() ) {
        $add_section = false;
    }
}
if ($add_section) {
    $vc_status_meta = get_post_meta( $post->ID, '_wpb_vc_js_status', true );
    if (!empty($vc_status_meta)) {
        $add_section = $vc_status_meta === 'false';
    }
}
$allow_comments = oxy_get_option( 'site_comments' );
get_header();
global $post;
oxy_page_header( $post->ID, array( 'heading_type' => 'page' ) );
$template_margin = oxy_get_option('template_margin');
?>
<?php if ($add_section === true): ?>
<section class="section">
    <div class="container">
        <div class="row element-top-<?php echo esc_attr($template_margin); ?> element-bottom-<?php echo esc_attr($template_margin); ?>">
            <div class="col-md-12">
<?php endif; ?>
<?php
while( have_posts() ) {
    the_post();
    get_template_part('partials/content', 'page');
}
?>
<?php if ($add_section === true): ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php if( $allow_comments === 'pages' || $allow_comments === 'all' ) : ?>
<section class="section">
    <div class="container">
        <div class="row element-top-<?php echo esc_attr($template_margin); ?> element-bottom-<?php echo esc_attr($template_margin); ?>">
            <?php comments_template( '', true ); ?>
        </div>
    </div>
</section>
<?php endif;
get_footer();
