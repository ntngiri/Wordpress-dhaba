<?php
/**
 * Creates a slide with an image
 *
 * @package Lambda
 * @subpackage Admin
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version 1.17.0
 * @author Oxygenna.com
 */
$src = wp_get_attachment_image_src($item->ID, $image_size);
if (false !== $src && is_array($src)) {
    $src = $src[0];
}
?>
<figure>
	<img src="<?php echo esc_url($src); ?>" alt="<?php echo esc_attr($item->post_title); ?>">
<?php if ($captions == 'show') : ?>
	<figcaption>
		<h3><?php echo $item->post_title; ?></h3>
		<p><?php echo $item->post_excerpt; ?></p>
	</figcaption>
<?php endif; ?>
</figure>