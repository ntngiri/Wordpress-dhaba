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

if( !empty( $social_networks )  ) :
    $background_hover_colors = array('', '', '', '');
    if ($background_show_hover === 'on') {
        $background_hover_colors[0] = 'data-iconcolor="#00acee"';
        $background_hover_colors[1] = 'data-iconcolor="#dd1812"';
        $background_hover_colors[2] = 'data-iconcolor="#3b5998"';
        $background_hover_colors[3] = 'data-iconcolor="#C92228"';
        $background_hover_colors[4] = 'data-iconcolor="#007bb6"';
        $background_hover_colors[5] = 'data-iconcolor="#45668e"';
    }
    $background_colour = $background_colour !== '' ? 'style="background-color:' . esc_attr($background_colour) . '";' : '';
    ?>
    <div class="<?php echo esc_attr(implode(' ', $container_classes)); ?>" data-os-animation="<?php echo esc_attr($scroll_animation); ?>" data-os-animation-delay="<?php echo esc_attr($scroll_animation_delay); ?>s">
        <?php if( !empty( $title ) ) : ?>
            <label>
                <?php echo $title; ?>
            </label>
        <?php endif; ?>
        <ul class="<?php echo esc_attr(implode(' ', $classes)); ?>">
            <?php if( in_array( 'twitter', $social_networks ) ) : ?>
                <li>
                    <a href="<?php echo esc_url($network_links['twitter']); ?>" target="_blank" <?php echo $background_colour; ?> <?php echo $background_hover_colors[0]; ?>>
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
            <?php endif; ?>
            <?php if( in_array( 'google', $social_networks ) ) : ?>
                <li>
                    <a href="<?php echo esc_url($network_links['google']); ?>" target="_blank" <?php echo $background_colour; ?> <?php echo $background_hover_colors[1]; ?>>
                        <i class="fa fa-google-plus"></i>
                    </a>
                </li>
            <?php endif; ?>
            <?php if( in_array( 'facebook', $social_networks ) ) : ?>
                <li>
                    <a href="<?php echo esc_url($network_links['facebook']); ?>" target="_blank" <?php echo $background_colour; ?> <?php echo $background_hover_colors[2]; ?>>
                        <i class="fa fa-facebook"></i>
                    </a>
                </li>
            <?php endif; ?>
            <?php if( in_array( 'pinterest', $social_networks ) ) : ?>
                <li>
                    <a href="<?php echo esc_url($network_links['pinterest']); ?>" target="_blank" <?php echo $background_colour; ?> <?php echo $background_hover_colors[3]; ?>>
                        <i class="fa fa-pinterest"></i>
                    </a>
                </li>
            <?php endif; ?>
            <?php if( in_array( 'linkedin', $social_networks ) ) : ?>
                <li>
                    <a href="<?php echo esc_url($network_links['linkedin']); ?>" target="_blank" <?php echo $background_colour; ?> <?php echo $background_hover_colors[4]; ?>>
                        <i class="fa fa-linkedin"></i>
                    </a>
                </li>
            <?php endif; ?>
            <?php if( in_array( 'vk', $social_networks ) ) : ?>
                <li>
                    <a href="<?php echo esc_url($network_links['vk']); ?>" target="_blank" <?php echo $background_colour; ?> <?php echo $background_hover_colors[5]; ?>>
                        <i class="fa fa-vk"></i>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div><?php
endif;
