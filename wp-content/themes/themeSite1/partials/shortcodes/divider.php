<?php
/**
 * Divider spacer
 *
 * @package Lambda
 * @subpackage Frontend
 * @since 1.01
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version 1.17.0
 */
?>
<div class="divider-wrapper <?php echo esc_attr($classes); ?>" style="visibility:<?php echo esc_attr($visibility); ?>;background-color:<?php echo esc_attr($background_colour); ?>">
    <div class="visible-xs" style="height:<?php echo esc_attr($xs_height); ?>px;"></div>
    <div class="visible-sm" style="height:<?php echo esc_attr($sm_height); ?>px;"></div>
    <div class="visible-md" style="height:<?php echo esc_attr($md_height); ?>px;"></div>
    <div class="visible-lg" style="height:<?php echo esc_attr($lg_height); ?>px;"></div>
</div>