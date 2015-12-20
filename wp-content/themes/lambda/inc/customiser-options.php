<?php
/**
 * Defines all options to be used in the Theme Customiser
 *
 * @package Lambda
 * @subpackage Admin
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version 1.17.0
 * @author Oxygenna.com
 */

// fetch list of skins
$skins = get_posts(array(
    'posts_per_page' => -1,
    'post_type' => 'oxy_stack',
    'orderby' => 'title',
    'order' => 'DESC'
));
$skin_options = array();
foreach ($skins as $skin) {
    $skin_options[$skin->ID] = $skin->post_title;
}

return array(
    array(
        'id'       => 'oxy-site-skin',
        'title'    => __('Site', 'lambda-admin-td'),
        'priority' => 1,
        'fields'   => array(
            array(
                'id'      => 'site_stack',
                'name'    => __('Site Skin', 'lambda-admin-td'),
                'desc'    => __('Sets the current skin used to style the site.', 'lambda-admin-td'),
                'type'    => 'select',
                'default' => '',
                'options' => $skin_options,
            ),
            array(
                'name'    => __('Layout Type', 'lambda-admin-td'),
                'desc'    => __('Sets the sites body layout.', 'lambda-admin-td'),
                'id'      => 'layout_type',
                'type'    => 'radio',
                'options' => array(
                    'normal' => __('Normal', 'lambda-admin-td'),
                    'boxed'  => __('Boxed', 'lambda-admin-td'),
                ),
                'default' => 'normal',
            )
        )
    ),
    array(
        'id'  => 'oxy-site-logo',
        'title' => __('Logo', 'lambda-admin-td'),
        'priority' => 2,
        'fields' => array(
            array(
                'name'    => __('Logo Text', 'lambda-admin-td'),
                'desc'    => __('Add your logo text here.', 'lambda-admin-td'),
                'id'      => 'logo_text',
                'type'    => 'text',
                'default' => 'Lambda',
            ),
            array(
                'name'    => __('Logo Image', 'lambda-admin-td'),
                'desc'    => __('Upload an image to use as the sites logo.', 'lambda-admin-td'),
                'id'      => 'logo_image',
                'store'   => 'url',
                'type'    => 'upload',
                'default' => OXY_THEME_URI . 'assets/images/lamda.png',
            ),
            array(
                'name'    => __('Logo Transparent Image', 'lambda-admin-td'),
                'desc'    => __('Upload an image to use as the sites logo when page has a transparent header.', 'lambda-admin-td'),
                'id'      => 'logo_image_trans',
                'store'   => 'url',
                'type'    => 'upload',
                'default' => '',
            ),
        )
    ),
    array(
        'id'  => 'oxy-header',
        'title' => __('Header', 'lambda-admin-td'),
        'priority' => 3,
        'fields' => array(
            array(
                'name'    => __('Style', 'lambda-admin-td'),
                'desc'    => __('Choose a layout for your headers menu & logo', 'lambda-admin-td'),
                'id'      => 'header_style',
                'type'    => 'select',
                'options' => array(
                    'logo-left-menu-right'   => __('Logo Left - Menu Right', 'lambda-admin-td'),
                    'logo-right-menu-left'   => __('Logo Right - Menu Left', 'lambda-admin-td'),
                    'logo-right-menu-below'  => __('Logo Right - Menu Below', 'lambda-admin-td'),
                    'logo-left-menu-below'   => __('Logo Left - Menu Below', 'lambda-admin-td'),
                    'logo-center-menu-below' => __('Logo Center - Menu Below', 'lambda-admin-td'),
                    'logo-left-menu-sidebar' => __('Logo Left - Menu Sidebar', 'lambda-admin-td'),
                ),
                'default' => 'logo-left-menu-right',
            ),
            array(
                'name'    => __('Menu Align', 'lambda-admin-td'),
                'desc'    => __('Set the alignment of the dropdown menu.', 'lambda-admin-td'),
                'id'      => 'header_menu_align',
                'type'    => 'radio',
                'options' => array(
                    'dropdown-menu-left'  => __('Left', 'lambda-admin-td'),
                    'dropdown-menu-right' => __('Right', 'lambda-admin-td'),
                ),
                'default' => 'dropdown-menu-left',
            ),
            array(
                'name'    => __('Width', 'lambda-admin-td'),
                'desc'    => __('Set the width of the header container.', 'lambda-admin-td'),
                'id'      => 'header_container',
                'type'    => 'radio',
                'options' => array(
                    'container'           => __('Normal', 'lambda-admin-td'),
                    'container-fullwidth' => __('Full Width', 'lambda-admin-td'),
                ),
                'default' => 'container',
            ),
            array(
                'name'    => __('Sticky', 'lambda-admin-td'),
                'desc'    => __('Make the navigation stick to the top of the page.', 'lambda-admin-td'),
                'id'      => 'header_sticky',
                'type'    => 'radio',
                'options' => array(
                    'navbar-sticky'     => __('On', 'lambda-admin-td'),
                    'navbar-not-sticky' => __('Off', 'lambda-admin-td'),
                ),
                'default' => 'navbar-sticky',
            ),
            array(
                'name'    => __('Top Bar', 'lambda-admin-td'),
                'desc'    => __('Adds a top bar to the top of your page above the main header.', 'lambda-admin-td'),
                'id'      => 'header_top_bar',
                'type'    => 'radio',
                'options' => array(
                    'on'  => __('On', 'lambda-admin-td'),
                    'off' => __('Off', 'lambda-admin-td'),
                ),
                'default' => 'off',
            ),
            array(
                'name'    => __(' Text Capitalization', 'lambda-admin-td'),
                'desc' => __('Sets the case of the text inside your header.', 'lambda-admin-td'),
                'id'      => 'header_capitalization',
                'type'    => 'radio',
                'options' => array(
                    'text-caps'      => __('Force Uppercase', 'lambda-admin-td'),
                    'text-lowercase' => __('Force Lowercase', 'lambda-admin-td'),
                    'text-none' => __('Off', 'lambda-admin-td'),
                ),
                'default' => 'text-none',
            ),
            array(
                'name'      => __('Navbar Scroll Change Point', 'lambda-admin-td'),
                'desc' => __('Point in pixels after the page scrolls that will trigger the menu to change height.', 'lambda-admin-td'),
                'id'        => 'navbar_scrolled_point',
                'type'      => 'slider',
                'default'   => 30,
                'attr'      => array(
                    'max'       => 1000,
                    'min'       => 0,
                    'step'      => 1
                )
            ),
            array(
                'name'    => __('Hover Menu', 'lambda-admin-td'),
                'desc' => __('Choose between menu that will open when you click or hover (desktop only option since mobile devices will always use touch)', 'lambda-admin-td'),
                'id'      => 'hover_menu',
                'type'    => 'radio',
                'options' => array(
                    'off' => __('Click', 'lambda-admin-td'),
                    'on'  => __('Hover', 'lambda-admin-td'),
                ),
                'default' => 'off',
            ),
            array(
                'name'    => __('Hover Menu Delay', 'lambda-admin-td'),
                'desc'    => __('Delay in seconds before the hover menu closes after moving mouse off the menu.', 'lambda-admin-td'),
                'id'      => 'hover_menu_delay',
                'type'      => 'slider',
                'default'   => 200,
                'attr'      => array(
                    'max'       => 1000,
                    'min'       => 0,
                    'step'      => 1
                )
            ),
            array(
                'name'    => __('Hover Menu Fade Delay', 'lambda-admin-td'),
                'desc'    => __('Delay of the Fade In/Fade Out animation .', 'lambda-admin-td'),
                'id'      => 'hover_menu_fade_delay',
                'type'      => 'slider',
                'default'   => 200,
                'attr'      => array(
                    'max'       => 1000,
                    'min'       => 0,
                    'step'      => 1
                )
            ),
            array(
                'name'    => __('Side Menu Close On Click', 'lambda-admin-td'),
                'desc'    => __('If Menu Sidebar is set, close on click.', 'lambda-admin-td'),
                'id'      => 'menu_close',
                'type'    => 'radio',
                'options' => array(
                    'on'  => __('On', 'lambda-admin-td'),
                    'off' => __('Off', 'lambda-admin-td'),
                ),
                'default' => 'off'
            )
        )
    ),
    array(
        'id'       => 'upper-footer-section',
        'title'    => __('Upper Footer', 'lambda-admin-td'),
        'priority' => 4,
        'fields'   => array(
            array(
                'name'    => __('Upper Footer Columns', 'lambda-admin-td'),
                'desc'    => __('Select how many columns the upper footer will consist of.', 'lambda-admin-td'),
                'id'      => 'upper_footer_columns',
                'type'    => 'select',
                'options' => array(
                    0  => __('0', 'lambda-admin-td'),
                    1  => __('1', 'lambda-admin-td'),
                    2  => __('2', 'lambda-admin-td'),
                    3  => __('3', 'lambda-admin-td'),
                    4  => __('4', 'lambda-admin-td'),
                ),
                'default' => 0,
            ),
            array(
                'name'    => __('Upper Footer Top Padding', 'lambda-admin-td'),
                'desc'    => __('Sets the amount of padding to add to the top of the upper footer.', 'lambda-admin-td'),
                'id'      => 'upper_footer_padding_top',
                'type'    => 'slider',
                'default' => 20,
                'attr'    => array(
                    'max'       => 300,
                    'min'       => 0,
                    'step'      => 10,
                )
            ),
            array(
                'name'    => __('Upper Footer Bottom Padding', 'lambda-admin-td'),
                'desc'    => __('Sets the amount of padding to add to the bottom of the upper footer.', 'lambda-admin-td'),
                'id'      => 'upper_footer_padding_bottom',
                'type' => 'slider',
                'default'   => 20,
                'attr'      => array(
                    'max'       => 300,
                    'min'       => 0,
                    'step'      => 10,
                )
            )
        )
    ),
    array(
        'id'     => 'footer-section',
        'title'  => __('Footer', 'lambda-admin-td'),
        'priority' => 5,
        'fields' => array(
            array(
                'name'    => __('Footer Columns', 'lambda-admin-td'),
                'desc'    => __('Select how many columns the footer will consist of.', 'lambda-admin-td'),
                'id'      => 'footer_columns',
                'type'    => 'select',
                'options' => array(
                    0  => __('0', 'lambda-admin-td'),
                    1  => __('1', 'lambda-admin-td'),
                    2  => __('2', 'lambda-admin-td'),
                    3  => __('3', 'lambda-admin-td'),
                    4  => __('4', 'lambda-admin-td'),
                ),
                'default' => 4,
            ),
            array(
                'name'    => __('Footer Top Padding', 'lambda-admin-td'),
                'desc'    => __('Sets the amount of padding to add to the top of the footer.', 'lambda-admin-td'),
                'id'      => 'footer_padding_top',
                'type' => 'slider',
                'default'   => 40,
                'attr'      => array(
                    'max'       => 300,
                    'min'       => 0,
                    'step'      => 10,
                )
            ),
            array(
                'name'    => __('Footer Bottom Padding', 'lambda-admin-td'),
                'desc'    => __('Sets the amount of padding to add to the bottom of the footer.', 'lambda-admin-td'),
                'id'      => 'footer_padding_bottom',
                'type' => 'slider',
                'default'   => 40,
                'attr'      => array(
                    'max'       => 300,
                    'min'       => 0,
                    'step'      => 10,
                )
            ),
            array(
                'name'    => __('Back to top button', 'lambda-admin-td'),
                'desc'    => __('Show or hide the back to top button that appears when you scroll down the page.', 'lambda-admin-td'),
                'id'      => 'back_to_top',
                'type'    => 'radio',
                'options' => array(
                    'enable'  => __('Enable', 'lambda-admin-td'),
                    'disable'  => __('Disable', 'lambda-admin-td'),
                ),
                'default' => 'enable',
            ),
            array(
                'name'    => __('Back to top shape', 'lambda-admin-td'),
                'desc'    => __('Set the shape of the back to top button.', 'lambda-admin-td'),
                'id'      => 'back_to_top_shape',
                'type'    => 'radio',
                'options' => array(
                    'square' => __('Square', 'lambda-admin-td'),
                    'circle'  => __('Circle', 'lambda-admin-td'),
                ),
                'default' => 'square'
            )
        )
    ),
    array(
        'id'     => 'sub-footer-section',
        'title'  => __('Sub Footer', 'lambda-admin-td'),
        'priority' => 5,
        'fields' => array(
            array(
                'name'    => __('Sub Footer Columns', 'lambda-admin-td'),
                'desc'    => __('Select how many columns the footer will consist of.', 'lambda-admin-td'),
                'id'      => 'sub_footer_columns',
                'type'    => 'select',
                'options' => array(
                    0  => __('0', 'lambda-admin-td'),
                    1  => __('1', 'lambda-admin-td'),
                    2  => __('2', 'lambda-admin-td'),
                    3  => __('3', 'lambda-admin-td'),
                    4  => __('4', 'lambda-admin-td'),
                ),
                'default' => 2,
            )
        )
    )
);
