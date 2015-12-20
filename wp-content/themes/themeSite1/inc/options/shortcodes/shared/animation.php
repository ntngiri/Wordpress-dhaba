<?php
    /**
     * Options for on scroll animations
     *
     * @package Lambda
     * @subpackage Admin
     * @since 0.1
     *
     * @copyright (c) 2015 Oxygenna.com
     * @license **LICENSE**
     * @version 1.17.0
     */
return array(
    array(
        'name'        => __('Scroll Animation', 'lambda-admin-td'),
        'desc'        => __('Animation that will occur when the user scrolls onto the element.', 'lambda-admin-td'),
        'id'          => 'scroll_animation',
        'type'        => 'select',
        'default'     => 'none',
        'options'     => include OXY_THEME_DIR . 'inc/options/global-options/animations.php',
    ),
    array(
        'name'    => __('Animation Delay', 'lambda-admin-td'),
        'desc'    => __('Delay after scrolling onto the element before animation starts.', 'lambda-admin-td'),
        'id'      => 'scroll_animation_delay',
        'type'    => 'slider',
        'default' => '0',
        'attr'    => array(
            'max'  => 4,
            'min'  => 0,
            'step' => 0.1
        )
    )
);
