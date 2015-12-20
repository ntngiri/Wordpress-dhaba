<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;
?>

<?php do_action( 'woocommerce_before_mini_cart' ); ?>

<div class="mini-cart-overview dropdown navbar-right">
    <a href="<?php echo WC()->cart->get_cart_url(); ?>" data-toggle="dropdown">
        <?php $animate = ( WC()->cart->cart_contents_count % 2 == 0 )  ? 'pulse-one' : 'pulse-two'; ?>

        <i class="icon icon-bag animated <?php echo $animate; ?>"></i>

        <span class="mini-cart-count"><?php echo WC()->cart->cart_contents_count; ?></span>
        <?php echo WC()->cart->get_cart_subtotal(); ?>
    </a>

    <ul role="menu" class="dropdown-menu cart_list product_list_widget <?php echo $args['list_class']; ?>">

    	<?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>

    		<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :

    			$_product = $cart_item['data'];

    			// Only display if allowed
    			if ( ! apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) || ! $_product->exists() || $cart_item['quantity'] == 0 )
    				continue;

    			// Get price
    			$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? $_product->get_price_excluding_tax() : $_product->get_price_including_tax();

    			$product_price = apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_price ), $cart_item, $cart_item_key );
    			?>

    			<li>
                    <div class="product-mini">
                        <div class="product-image">
                            <a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>">
            					<?php echo $_product->get_image(); ?>
                            </a>
                        </div>
                        <div class="product-details">
                            <h4 class="product-details-heading">
                                <a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>">
        					       <?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?>

        				        </a>
                            </h4>
                            <p>
            				    <?php echo WC()->cart->get_item_data( $cart_item ); ?>
                            </p>
                            <p>
        				        <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
                            </p>
                            <?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s">&times;</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key );  ?>
                        </div>
                    </div>
    			</li>

    		<?php endforeach; ?>

    	<?php else : ?>

    		<li class="empty">
                <div class="product-mini">
                    <a><?php _e( 'No products in the cart.', 'woocommerce' ); ?></a>
                </div>
            </li>

    	<?php endif; ?>

    <?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>

        <li class="cart-actions">
            <p class="total"><strong><?php _e( 'Subtotal', 'woocommerce' ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>

            <?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

            <div class="buttons">
                <a href="<?php echo WC()->cart->get_cart_url(); ?>"> <?php _e( 'View Cart', 'woocommerce' ); ?></a>
                <a href="<?php echo WC()->cart->get_checkout_url(); ?>" ><?php _e( 'Checkout', 'woocommerce' ); ?></a>
            </div>
        </li>

    <?php endif; ?>

    </ul><!-- end product list -->


</div>
<?php do_action( 'woocommerce_after_mini_cart' ); ?>
