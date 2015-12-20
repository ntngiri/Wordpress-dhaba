<?php
/**
 * Renders the footer
 *
 * @package Lambda
 * @subpackage Admin
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version 1.17.0
 * @author Oxygenna.com
 */
global $oxy_theme;
$upper_footer_columns = $oxy_theme->get_option('upper_footer_columns');
$upper_footer_top = $oxy_theme->get_option('upper_footer_padding_top');
$upper_footer_bottom = $oxy_theme->get_option('upper_footer_padding_bottom');
$upper_footer_span = empty($upper_footer_columns) ? 'col-sm-12' : 'col-sm-' . (12 / $upper_footer_columns);

$show_upper_footer = oxy_check_show_footer('upper-footer-', $upper_footer_columns);

$footer_columns = $oxy_theme->get_option('footer_columns');
$footer_top = $oxy_theme->get_option('footer_padding_top');
$footer_bottom = $oxy_theme->get_option('footer_padding_bottom');
$footer_span = empty($footer_columns) ? 'col-sm-12' : 'col-sm-' . (12 / $footer_columns);

$show_footer = oxy_check_show_footer('footer-', $footer_columns);

$sub_footer_columns = $oxy_theme->get_option('sub_footer_columns');
$sub_footer_span = empty($sub_footer_columns) ? 'col-sm-12' : 'col-sm-' . (12 / $sub_footer_columns);

$show_sub_footer = oxy_check_show_footer('sub-footer-', $sub_footer_columns);
?>
            <?php if ($upper_footer_columns > 0 && $show_upper_footer) : ?>
                <section class="section section-upper-footer" >
                    <div class="container">
                        <div class="row element-top-<?php echo esc_attr($upper_footer_top); ?> element-bottom-<?php echo esc_attr($upper_footer_bottom); ?> footer-columns-<?php echo esc_attr($upper_footer_columns); ?>" >
                            <?php for($col = 0 ; $col < $upper_footer_columns ; $col++): ?>
                                <div class="<?php echo esc_attr($upper_footer_span); ?>">
                                    <?php dynamic_sidebar('upper-footer-' . ($col+1)); ?>
                                </div>
                            <?php endfor ?>
                        </div>
                    </div>
                </section>
            <?php endif ?>

            <?php if ($footer_columns > 0 && $show_footer) : ?>
                <footer id="footer" role="contentinfo">
                    <section class="section">
                        <div class="container">
                            <div class="row element-top-<?php echo esc_attr($footer_top); ?> element-bottom-<?php echo esc_attr($footer_bottom); ?> footer-columns-<?php echo esc_attr($footer_columns); ?>">
                                <?php for ($col = 0 ; $col < $footer_columns ; $col++): ?>
                                    <div class="<?php echo esc_attr($footer_span); ?>">
                                        <?php dynamic_sidebar('footer-' . ($col+1)); ?>
                                    </div>
                                <?php endfor ?>
                            </div>
                        </div>
                    </section>
                    <?php if ($sub_footer_columns > 0 && $show_sub_footer) : ?>
                        <section class="section subfooter">
                            <div class="container">
                                <div class="row element-top-10 element-bottom-10 footer-columns-<?php echo esc_attr($sub_footer_columns); ?>">
                                    <?php for ($col = 0 ; $col < $sub_footer_columns ; $col++): ?>
                                        <div class="<?php echo esc_attr($sub_footer_span); ?>">
                                            <?php dynamic_sidebar('sub-footer-' . ($col+1)); ?>
                                        </div>
                                    <?php endfor ?>
                                </div>
                            </div>
                        </section>
                    <?php endif; ?>
                </footer>
            <?php endif; ?>

        </div>
        <!-- Fixing the Back to top button -->
         <?php if( oxy_get_option('back_to_top') === 'enable' ) : ?>
            <a href="javascript:void(0)" class="go-top go-top-<?php echo oxy_get_option('back_to_top_shape')?>">
                <i class="fa fa-angle-up"></i>
            </a>
        <?php endif; ?>

        <?php $google_anal = oxy_get_option( 'google_anal' ); ?>
        <?php if( !empty( $google_anal ) ) : ?>
            <?php echo oxy_get_option( 'google_anal' ); ?>
        <?php endif; ?>
        <?php oxy_render_modals(); ?>
        <?php wp_footer(); ?>
    </body>
</html>