<?php
/**
 * Empty cart page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<section class="section section-commerce">
    <div class="container ">
        <div class="row text-center element-top-50 element-bottom-50">

            <?php wc_print_notices(); ?>
            <p class="cart-empty"><?php _e( 'Your cart is currently empty.', 'woocommerce' ) ?></p>

            <?php do_action( 'woocommerce_cart_is_empty' ); ?>

            <p class="return-to-shop">
                <a class="btn btn-primary wc-backward" href="<?php echo apply_filters( 'woocommerce_return_to_shop_redirect', get_permalink( wc_get_page_id( 'shop' ) ) ); ?>">
                    <?php _e( 'Return To Shop', 'woocommerce' ) ?>
                </a>
            </p>
        </div>
    </div>
</section>