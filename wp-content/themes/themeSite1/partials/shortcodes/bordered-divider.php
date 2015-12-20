<?php
/**
 * Bordered Divider
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
<?php
$divider_color = empty($divider_color) ? '' : 'background:' . $divider_color . '; ';
$divider_height = $divider_height == 4 ? '' : ' style="height:' . $divider_height . 'px;"';
$divider_width = $divider_width == 40 ? '' : 'width:' . $divider_width . 'px;';
$inner_style = $divider_color . $divider_width;
$inner_style = empty($inner_style) ? '' : ' style="' . esc_attr($inner_style) .'"'; ?>
<div class="divider-border <?php echo esc_attr(implode(' ', $classes)); ?>" data-os-animation="<?php echo esc_attr($scroll_animation); ?>" data-os-animation-delay="<?php echo esc_attr($scroll_animation_delay); ?>s" <?php echo $divider_height; ?>>
    <div class="divider-border-inner" <?php echo $inner_style; ?>></div>
</div>