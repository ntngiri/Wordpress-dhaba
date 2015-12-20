<?php
/**
 * Social Links for posts
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
<div class="<?php echo esc_attr(implode(' ', $container_classes)); ?>" data-os-animation="<?php echo esc_attr($scroll_animation); ?>" data-os-animation-delay="<?php echo esc_attr($scroll_animation_delay); ?>s">
    <?php if( !empty( $title ) ) : ?>
        <label>
            <?php echo $title; ?>
        </label>
    <?php endif; ?>
    <ul class="<?php echo esc_attr(implode(' ', $classes)); ?>"><?php
        foreach( $icons as $icon => $name ) :
            if( isset( $atts[$icon] ) ) : ?>
                <li>
                    <a href="<?php echo esc_url($atts[$icon]); ?>" target="<?php echo esc_attr($link_target); ?>" style="background-color:<?php echo esc_attr($background_colour); ?>;" data-iconcolor="<?php echo esc_attr(oxy_get_icon_color(str_replace('_','-',$icon))); ?>">
                        <i class="fa fa-<?php echo esc_attr(str_replace('_','-',$icon)); ?>"></i>
                    </a>
                </li><?php
            endif;
         endforeach; ?>
    </ul>
</div><?php

