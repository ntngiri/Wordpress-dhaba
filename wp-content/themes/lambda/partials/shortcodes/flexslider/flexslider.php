<div id="<?php echo esc_attr($id); ?>" class="flexslider <?php echo esc_attr(implode(' ', $classes)); ?>" <?php echo implode(' ', $data); ?> data-os-animation="<?php echo esc_attr($scroll_animation); ?>" data-os-animation-delay="<?php echo esc_attr($scroll_animation_delay); ?>s" >
    <ul class="slides">
    <?php foreach ($items as $item) : ?>
        <li>
        	<?php
            if( $item->post_type == 'attachment' ) :
            	include( locate_template( 'partials/shortcodes/flexslider/slide-attachment.php' ) );
            else :
				include( locate_template( 'partials/shortcodes/flexslider/slide-post.php' ) );
            endif; ?>
        </li>
    <?php endforeach; ?>
    </ul>
</div>
