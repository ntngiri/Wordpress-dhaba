<?php
/**
 * Audop Shortcode
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
<div class="<?php echo esc_attr(implode(' ', $classes)); ?>" data-os-animation="<?php echo esc_attr($scroll_animation); ?>" data-os-animation-delay="<?php echo esc_attr($scroll_animation_delay); ?>s">
    <audio controls="" loop="<?php echo esc_url($loop); ?>" <?php echo esc_attr($attributes); ?> style="width:100%; height:100%;">
        <source src="<?php echo esc_url($src); ?>">
    </audio>
</div>