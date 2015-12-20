<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );
?>

    <div id="comment-<?php comment_ID(); ?>" <?php comment_class( 'media media-comment' ); ?>>

        <div class="media-avatar pull-left">

            <?php echo get_avatar( $comment, apply_filters( 'woocommerce_review_gravatar_size', '48' ), '', get_comment_author() ); ?>

        </div>


        <div class="media-body">
            <div class="media-inner">

                <div class="comment-text">

                    <h5 class="media-heading">

                        <?php if ( $rating && get_option( 'woocommerce_enable_review_rating' ) == 'yes' ) : ?>
                            <a class="star-rating" data-placement="right" data-original-title="<?php echo sprintf( __( 'Rated %d out of 5', 'woocommerce' ), $rating ) ?>" data-toggle="tooltip">
                                <span style="width:<?php echo ( $rating / 5 ) * 100; ?>%"><strong itemprop="ratingValue"><?php echo $rating; ?></strong> <?php _e( 'out of 5', 'woocommerce' ); ?></span>
                            </a>
                        <?php endif; ?>

                        <?php if ( $comment->comment_approved == '0' ) : ?>

                            <p class="meta"><em><?php _e( 'Your comment is awaiting approval', 'woocommerce' ); ?></em></p>

                        <?php else : ?>


                                <strong itemprop="author"><?php comment_author(); ?></strong> <?php

                                    if ( get_option( 'woocommerce_review_rating_verification_label' ) === 'yes' )
                                        if ( wc_customer_bought_product( $comment->comment_author_email, $comment->user_id, $comment->comment_post_ID ) )
                                            echo '<em class="verified">(' . __( 'verified owner', 'woocommerce' ) . ')</em> ';

                                ?>&ndash; <time itemprop="datePublished" datetime="<?php echo get_comment_date( 'c' ); ?>"><?php echo get_comment_date( __( get_option( 'date_format' ), 'woocommerce' ) ); ?></time>:


                        <?php endif; ?>
                    </h5>

                    <?php comment_text(); ?>
                </div>
            </div>
        </div>

