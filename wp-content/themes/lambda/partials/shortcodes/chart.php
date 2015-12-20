<?php
/**
 * Creates a chart
 *
 * @package Lambda
 * @subpackage Admin
 * @since 0.1
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version 1.17.0
 */
?>
<div class="<?php echo esc_attr(implode(' ', $classes)); ?>" data-os-animation="<?php echo esc_attr($atts['scroll_animation']); ?>" data-os-animation-delay="<?php echo esc_attr($atts['scroll_animation_delay']); ?>s">
    <?php echo wp_charts_shortcode( $atts );?>
</div>