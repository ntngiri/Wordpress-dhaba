<div class="<?php echo esc_attr(implode( ' ', $container_classes )); ?>">
<?php
foreach($posts as $post) :
    $atts['margin_top'] = 0;
	echo oxy_create_staff($post, $atts);
	if( $atts['scroll_animation_timing'] === 'staggered' ) :
        $atts['scroll_animation_delay'] += $item_delay;
    endif;
endforeach;
?>
</div>