 <?php
/**
 * Tags shortcode
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
<ul class="<?php echo esc_attr(implode(' ', $classes)); ?>" data-os-animation="<?php echo esc_attr($scroll_animation); ?>" data-os-animation-delay="<?php echo esc_attr($scroll_animation_delay); ?>s">
<?php
	foreach( $tags as $tag ) : ?>
		<li>
            <span>
                <?php echo $tag; ?>
            </span>
		</li><?php
	endforeach; ?>
</ul>