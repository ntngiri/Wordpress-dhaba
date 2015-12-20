<div class="list-container <?php echo esc_attr(implode( ' ', $wrapper_classes )); ?>" data-os-animation="<?php echo esc_attr($atts['scroll_animation']); ?>" data-os-animation-delay="<?php echo esc_attr($atts['scroll_animation_delay']); ?>s">
<?php
foreach( $services as $post ) :
	$atts['extra_classes'] = 'col-md-' . $atts['columns'];
    $atts['margin_top'] = 0;
    $atts['margin_bottom'] = 20;    
	echo oxy_create_service($post, $atts);
	if( $atts['scroll_animation_timing'] === 'staggered' ) :
        $atts['scroll_animation_delay'] += $item_delay;
    endif;
endforeach;
?>
</div>