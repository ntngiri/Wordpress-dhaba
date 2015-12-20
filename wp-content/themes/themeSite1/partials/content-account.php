<?php
/**
 * Shows a woocommerce account page
 *
 * @package Lambda
 * @subpackage Frontend
 * @since 1.0
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license http://wiki.envato.com/support/legal-terms/licensing-terms/
 * @version 1.17.0
 */

global $woocommerce;
$template_margin = oxy_get_option('template_margin'); ?>
<section class="section section-commerce">
    <div class="container">
        <?php wc_print_notices(); ?>
        <div class="row element-top-<?php echo esc_attr($template_margin); ?> element-bottom-<?php echo esc_attr($template_margin); ?>">
            <div class="col-md-3">
                <?php
                if ( has_nav_menu( 'account' ) ) {
                   wp_nav_menu( array( 'theme_location' => 'account', 'menu_class' => 'nav nav-pills nav-stacked', 'depth' => 0 ) );
                }
                else {
                    _e( 'create an account menu in the admin options', 'lambda-td' );
                } ?>
            </div>
            <div class="col-md-9">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>
