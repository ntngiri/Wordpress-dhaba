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

get_header();
global $post;
oxy_page_header( $post->ID, array( 'heading_type' => 'portfolio' ) );
while( have_posts() ) {
    the_post();
    get_template_part('partials/content', 'page');
}

$allow_comments = oxy_get_option( 'site_comments' );
$template_margin = oxy_get_option('template_margin');
?>

<?php if ( oxy_get_option('related_portfolio_items') === 'on' ) : ?>
    <?php get_template_part( 'partials/portfolio/portfolio-related' ); ?>
<?php endif; ?>


<?php if( $allow_comments === 'portfolio' || $allow_comments === 'all' ) : ?>
<section class="section">
    <div class="container">
        <div class="row element-top-<?php echo esc_attr($template_margin); ?> element-bottom-<?php echo esc_attr($template_margin); ?>">
            <?php comments_template( '', true ); ?>
        </div>
    </div>
</section>
<?php
endif;
get_footer();