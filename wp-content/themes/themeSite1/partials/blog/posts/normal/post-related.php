<?php
/**
 * Shows related posts
 *
 * @package Lambda
 * @subpackage Frontend
 * @since 1.3
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version 1.17.0
 */

global $wp_query;
$tags = wp_get_post_tags(get_the_ID());
$columns = intval(oxy_get_option('related_posts_columns'));
$span_width = $columns > 0 ? floor(12 / $columns) : 12;
$tag_ids = array();

if ($tags) {
    foreach ($tags as $individual_tag) {
        $tag_ids[] = $individual_tag->term_id;
    }

    $args = array(
        'tag__in'        => $tag_ids,
        'post__not_in'   => array(get_the_ID()),
        'posts_per_page' => oxy_get_option('related_posts_count'),
    );

    $wp_query = new wp_query($args);

    $related_posts_style = oxy_get_option('related_posts_style');

    $title_tag = oxy_get_option('related_posts_title_tag');
    $text_align = oxy_get_option('related_posts_text_align');
}
?>
<?php if (!empty($tag_ids) && $wp_query->have_posts()) : ?>
<section class="post-related text-left">
    <header class="post-related-head">
        <h3 class="post-related-title"><?php _e('Related Posts', 'lambda-td'); ?></h3>
    </header>
    <div class="row">
        <?php while($wp_query->have_posts()) : ?>
            <div class="col-md-<?php echo esc_attr($span_width); ?> col-sm-<?php echo esc_attr($span_width); ?>">
                <?php
                    global $post;
                    global $more;    // Declare global $more (before the loop).
                    $wp_query->the_post();
                    setup_postdata($post);
                    $more = 0;
                    // get post format (only interested in quote / link rest use standard)
                    $format = get_post_format($post);
                    if ('quote' !== $format && 'link' !== $format) {
                        $format = 'standard';
                    }
                    // get related post image
                    $image = '';
                    if (has_post_thumbnail()) {
                        $attachment = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'related-post-image');
                        if(!empty($attachment)) {
                            $image = $attachment[0];
                        }
                    }
                    include(locate_template('partials/blog/posts/' . $related_posts_style . '/post-' . $format . '.php'));
                ?>
            </div>
        <?php endwhile; ?>
    </div>
</section>
<?php
endif;

wp_reset_postdata();
wp_reset_query();