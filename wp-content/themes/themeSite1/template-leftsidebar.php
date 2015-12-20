<?php
/**
 * Template Name: Left Sidebar
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
oxy_page_header($post->ID, array('heading_type' => 'page'));
$allow_comments = oxy_get_option('site_comments');
$template_margin = oxy_get_option('template_margin');
?>
<section class="section">
    <div class="container">
        <div class="row element-top-<?php echo esc_attr($template_margin); ?> element-bottom-<?php echo esc_attr($template_margin); ?>">
            <div class="col-md-9 col-md-push-3">
                <?php while (have_posts()) : the_post(); ?>

                <?php get_template_part('partials/content', 'page'); ?>

                <?php endwhile; ?>
            </div>
            <div class="col-md-3 col-md-pull-9 sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</section>
<?php if($allow_comments === 'pages' || $allow_comments === 'all') : ?>
<section class="section">
    <div class="container">
        <div class="row element-top-<?php echo esc_attr($template_margin); ?> element-bottom-<?php echo esc_attr($template_margin); ?>">
            <?php comments_template('', true); ?>
        </div>
    </div>
</section>
<?php
endif;
get_footer();
