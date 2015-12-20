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

// get related posts excluding this one.
$cats = wp_get_post_terms( $post->ID, 'oxy_portfolio_categories' );
$related_text = oxy_get_option( 'related_portfolio_text' );

if( !empty( $cats ) ) :
    $args = array(
        'post_type' => 'oxy_portfolio_image',
        'numberposts' => oxy_get_option( 'related_portfolio_count' ),
        'post__not_in' => array($post->ID),
        'orderby' => 'rand',
        'tax_query' => array(
            array(
                'taxonomy' => 'oxy_portfolio_categories',
                'field' => 'slug',
                'terms' => $cats[0]->slug
            )
        )
    );

    $columns = intval( oxy_get_option( 'related_portfolio_columns' ) );
    $span_width = $columns > 0 ? floor( 12 / $columns ) : 12;

    $posts = get_posts($args);
endif; ?>

<?php if( $posts ) : ?>
    <section class="section portfolio-related">
        <div class="container">
            <div class="row element-bottom-80 text-center">
                <?php if (!empty($related_text)) : ?>
                    <h3 class="element-top-30 element-bottom-30">
                        <?php echo $related_text; ?>
                    </h3>
                <?php endif ?>
                <?php
                foreach ($posts as $related_post) :
                    global $post;
                    $post = $related_post; ?>
                    <div class="col-md-<?php echo esc_attr($span_width); ?> col-sm-<?php echo esc_attr($span_width); ?>">
                        <?php
                            global $more;    // Declare global $more (before the loop).

                            setup_postdata( $post );
                            $more = 0;
                            // get post format ( only interested in quote / link rest use standard )
                            $format = get_post_format( $post );
                            if( 'quote' !== $format && 'link' !== $format ) {
                                $format = '';
                            }
                            get_template_part( 'partials/portfolio/portfolio-item', $format );
                        ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif;
