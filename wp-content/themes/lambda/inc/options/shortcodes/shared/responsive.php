<?php
    /**
     * Options for responsive features
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
        'name'    => __('Hidden on Large', 'lambda-admin-td'),
        'desc'    => __('Hides the element on large devices.', 'lambda-admin-td'),
        'id'      => 'hidden_on_large',
        'default' => 'off',
        'type'    => 'select',
        'options' => array(
            'off' => __('Off', 'lambda-admin-td'),
            'on'  => __('On', 'lambda-admin-td'),
        )
    ),
    array(
        'name'    => __('Hidden on Medium', 'lambda-admin-td'),
        'desc'    => __('Hides the element on medium devices.', 'lambda-admin-td'),
        'id'      => 'hidden_on_medium',
        'default' => 'off',
        'type'    => 'select',
        'options' => array(
            'off' => __('Off', 'lambda-admin-td'),
            'on'  => __('On', 'lambda-admin-td'),
        )
    ),
    array(
        'name'    => __('Hidden on Small', 'lambda-admin-td'),
        'desc'    => __('Hides the element on small devices.', 'lambda-admin-td'),
        'id'      => 'hidden_on_small',
        'default' => 'off',
        'type'    => 'select',
        'options' => array(
            'off' => __('Off', 'lambda-admin-td'),
            'on'  => __('On', 'lambda-admin-td'),
        )
    ),
    array(
        'name'    => __('Hidden on Extra Small', 'lambda-admin-td'),
        'desc'    => __('Hides the element on extra small devices.', 'lambda-admin-td'),
        'id'      => 'hidden_on_xsmall',
        'default' => 'off',
        'type'    => 'select',
        'options' => array(
            'off' => __('Off', 'lambda-admin-td'),
            'on'  => __('On', 'lambda-admin-td'),
        )
    )
);
