<?php
/**
 * Displays the main body of the theme
 *
 * @package Lambda
 * @subpackage Frontend
 * @since 0.1
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license http://wiki.envato.com/support/legal-terms/licensing-terms/
 * @version 1.17.0
 */
// get the author name
if (get_query_var('author_name')) {
    $author = get_user_by('slug', get_query_var('author_name'));
} else {
    $author = get_userdata(get_query_var('author'));
}

get_header();
oxy_blog_header(get_the_author_meta('display_name', $author->ID), null);
// if masonry option set then use masonry option for name otherwise use blog style
$name = oxy_get_option('blog_masonry') === 'no-masonry' ? oxy_get_option('blog_style') : oxy_get_option('blog_masonry');

$author_id = get_the_author_meta('ID');
$author_url = get_author_posts_url($author_id);
$template_margin = oxy_get_option('template_margin');
?>
<section class="section">
    <div class="container-author">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="author-info media text-center element-top-<?php echo esc_attr($template_margin); ?> element-bottom-<?php echo esc_attr($template_margin); ?> small-screen-center">
                    <div class="author-avatar">
                    <?php if (oxy_get_option('author_bio_avatar') == 'on') : ?>
                        <?php echo get_avatar($author_id, 80); ?>
                    <?php endif; ?>
                    </div>
                    <h2>
                        <a href="<?php echo $author_url; ?>">
                            <?php the_author_meta('nickname'); ?>
                        </a>
                    </h2>
                    <p class="lead">
                        <?php the_author_meta('description'); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_template_part('partials/blog/list/' . $name); ?>
<?php get_footer();