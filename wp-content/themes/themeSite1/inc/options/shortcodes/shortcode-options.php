<?php
/**
 * Sets up all theme shortcode options
 *
 * @package Lambda
 * @subpackage Frontend
 * @since 0.1
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version 1.17.0
 */

// get available menus for menu shortcode
$menus_data = get_terms('nav_menu');
$menus = array();
foreach ($menus_data as $single_menu) {
    $menus[$single_menu->slug] = $single_menu->name;
}

return array(
    // SECTION
    'vc_row' => array(
        'shortcode'     => 'vc_row',
        'title'         => __('Row', 'lambda-admin-td'),
        'desc'          => __('A Horizontal section to add content to.', 'lambda-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => true,
        'sections'      => array(
            array(
                'title' => __('Section', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/section.php'
            )
        )
    ),
    'vc_row_inner' => array(
        'shortcode'     => 'vc_row_inner',
        'title'         => __('Row', 'lambda-admin-td'),
        'desc'          => __('A Horizontal section to add content to.', 'lambda-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => true,
        'sections'      => array(
            array(
                'title' => __('General', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Extra Classes', 'lambda-admin-td'),
                        'desc'    => __('Add any extra classes you need to add to this column. ( space separated )', 'lambda-admin-td'),
                        'id'      => 'extra_classes',
                        'default'     =>  '',
                        'type'        => 'text',
                    ),
                )
            ),
            array(
                'title' => __('Responsive', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/responsive.php'
            )
        )
    ),
    // SECTION
    'vc_column' => array(
        'shortcode'     => 'vc_column',
        'title'         => __('Column', 'lambda-admin-td'),
        'desc'          => __('Column shortcode for use inside a row.', 'lambda-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => true,
        'sections'      => array(
            array(
                'title' => __('General', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'      => __('Column Alignment', 'lambda-admin-td'),
                        'id'        => 'align',
                        'type'      => 'select',
                        'default'   => 'default',
                        'options' => array(
                            'Default' => __('Default (no class)', 'lambda-admin-td'),
                            'left'    => __('Left', 'lambda-admin-td'),
                            'center'  => __('Center', 'lambda-admin-td'),
                            'right'   => __('Right', 'lambda-admin-td'),
                        ),
                        'desc'    => __('Sets the alignment items in the column.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'      => __('Column Background Color', 'lambda-admin-td'),
                        'desc'      => __('Set the background color of the column', 'lambda-admin-td'),
                        'id'        => 'column_colour',
                        'type'      => 'colour',
                        'format'    => 'rgba',
                        'default'   => '',
                        'attr'      => array(
                            'class' => 'allow-empty'
                        )
                    ),
                    array(
                        'name'      => __('Small screens Column Alignment', 'lambda-admin-td'),
                        'id'        => 'align_sm',
                        'type'      => 'select',
                        'default'   => 'default',
                        'options' => array(
                            'Default' => __('Default (no class)', 'lambda-admin-td'),
                            'left'    => __('Left', 'lambda-admin-td'),
                            'center'  => __('Center', 'lambda-admin-td'),
                            'right'   => __('Right', 'lambda-admin-td'),
                        ),
                        'desc'    => __('Overrides the alignment in the column on small screens.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Extra Classes', 'lambda-admin-td'),
                        'desc'    => __('Add any extra classes you need to add to this column. ( space separated )', 'lambda-admin-td'),
                        'id'      => 'extra_classes',
                        'default'     =>  '',
                        'type'        => 'text',
                    ),
                    array(
                        'name'      =>  __('Top border', 'lambda-admin-td'),
                        'id'        => 'border_top',
                        'desc'      => __('Top border on the column', 'lambda-admin-td'),
                        'type'      => 'select',
                        'options' => array(
                            'on'  => __('On', 'lambda-admin-td'),
                            'off' => __('Off', 'lambda-admin-td'),
                        ),
                        'default'   => 'off',
                    ),
                    array(
                        'name'      =>  __('Right border', 'lambda-admin-td'),
                        'id'        => 'border_right',
                        'desc'      => __('Right border on the column', 'lambda-admin-td'),
                        'type'      => 'select',
                        'options' => array(
                            'on'  => __('On', 'lambda-admin-td'),
                            'off' => __('Off', 'lambda-admin-td'),
                        ),
                        'default'   => 'off',
                    ),
                    array(
                        'name'      =>  __('Bottom border', 'lambda-admin-td'),
                        'id'        => 'border_bottom',
                        'desc'      => __('Bottom border on the column', 'lambda-admin-td'),
                        'type'      => 'select',
                        'options' => array(
                            'on'  => __('On', 'lambda-admin-td'),
                            'off' => __('Off', 'lambda-admin-td'),
                        ),
                        'default'   => 'off',
                    ),
                    array(
                        'name'      =>  __('Left border', 'lambda-admin-td'),
                        'id'        => 'border_left',
                        'desc'      => __('Left border on the column', 'lambda-admin-td'),
                        'type'      => 'select',
                        'options' => array(
                            'on'  => __('On', 'lambda-admin-td'),
                            'off' => __('Off', 'lambda-admin-td'),
                        ),
                        'default'   => 'off',
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/animation.php'
            ),
            array(
                'title' => __('Responsive', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/responsive.php'
            ),
        )
    ),
    'heading' => array(
        'shortcode'     => 'heading',
        'title'         => __('Heading', 'lambda-admin-td'),
        'desc'          => __('Creates a heading.', 'lambda-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => true,
        'sections'      => array(
            array(
                'title' => __('Header', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/heading.php'
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/animation.php'
            ),
            array(
                'title' => __('Responsive', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/responsive.php'
            ),
        )
    ),
    'service' => array(
        'shortcode'     => 'service',
        'title'         => __('Single Service', 'lambda-admin-td'),
        'desc'          => __('Displays a single service.', 'lambda-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Services', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Service', 'lambda-admin-td'),
                        'desc'    => __('Select a service post to show.', 'lambda-admin-td'),
                        'id'      => 'service',
                        'default' =>  '',
                        'admin_label' => true,
                        'type'    => 'select',
                        'options' => 'custom_post_type',
                        'post_type' => 'oxy_service'
                    ),
                )
            ),
            array(
                'title' => __('Text', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/text-color.php'
            ),
            array(
                'title' => __('Service Item Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/service.php'
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'services' =>array(
        'shortcode'     => 'services',
        'title'         => __('Services', 'lambda-admin-td'),
        'desc'          => __('Displays a horizontal / vertical list of services.', 'lambda-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Services', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Choose a category', 'lambda-admin-td'),
                        'desc'    => __('Category of services to show', 'lambda-admin-td'),
                        'id'      => 'category',
                        'default' =>  '',
                        'admin_label' => true,
                        'type'    => 'select',
                        'options' => 'taxonomy',
                        'taxonomy' => 'oxy_service_category',
                        'blank_label' => __('All Categories', 'lambda-admin-td')
                    ),
                    array(
                        'name'    => __('Services Count', 'lambda-admin-td'),
                        'desc'    => __('Number of services to show(set to 0 to show all)', 'lambda-admin-td'),
                        'id'      => 'count',
                        'type'    => 'slider',
                        'default' => '3',
                        'admin_label' => true,
                        'attr'    => array(
                            'max'  => 30,
                            'min'  => 0,
                            'step' => 1
                        )
                    ),
                    array(
                        'name'    => __('Columns (horizontal style)', 'lambda-admin-td'),
                        'desc'    => __('Number of columns to show the services in', 'lambda-admin-td'),
                        'id'      => 'columns',
                        'type'    => 'select',
                        'options' => array(
                            2 => __('Two columns', 'lambda-admin-td'),
                            3 => __('Three columns', 'lambda-admin-td'),
                            4 => __('Four columns', 'lambda-admin-td'),
                            6 => __('Six columns', 'lambda-admin-td'),
                        ),
                        'default' => '3',
                    )
                )
            ),
            array(
                'title' => __('Text', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/text-color.php'
            ),
            array(
                'title' => __('Service Item Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/service.php'
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' =>  array_merge(
                    include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php',
                    array(
                        array(
                            'name'    => __('Animation Timing', 'lambda-admin-td'),
                            'desc'    => __('Will animate all services at once or each one individually .', 'lambda-admin-td'),
                            'id'      => 'scroll_animation_timing',
                            'type'    => 'select',
                            'default' => 'staggered',
                            'options' => array(
                                'all-same'   => __('All items appear at same time', 'lambda-admin-td'),
                                'staggered'  => __('Staggered over Animation Delay', 'lambda-admin-td'),
                            ),
                        )
                    )
                )
            )
        )
    ),
     // TESTIMONIALS SHORTCODE SECTION
    'testimonials' => array(
        'shortcode' => 'testimonials',
        'title'     => __('Testimonials', 'lambda-admin-td'),
        'desc'      => __('Displays a slideshow of testimonials.', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'has_content'   => false,
        'sections'   => array(
            array(
                'title' => __('Testimonials', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Choose a group', 'lambda-admin-td'),
                        'desc'    => __('Group of testimonials to show', 'lambda-admin-td'),
                        'id'      => 'group',
                        'default' =>  '',
                        'type'    => 'select',
                        'admin_label' => true,
                        'admin_label' => true,
                        'options' => 'taxonomy',
                        'taxonomy' => 'oxy_testimonial_group',
                        'blank_label' => __('All Testimonials', 'lambda-admin-td')
                    ),
                    array(
                        'name'    => __('Number Of Testimonials', 'lambda-admin-td'),
                        'desc'    => __('Number of Testimonials to display(set to 0 to show all)', 'lambda-admin-td'),
                        'id'      => 'count',
                        'type'    => 'slider',
                        'admin_label' => true,
                        'default' => '3',
                        'attr'    => array(
                            'max'   => 10,
                            'min'   => 0,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'      => __('Layout', 'lambda-admin-td'),
                        'id'        => 'layout',
                        'type'      => 'select',
                        'default'   => 'image',
                        'options' => array(
                            'image'           => __('Quote, Quotee & Image', 'lambda-admin-td'),
                            'no-image'        => __('Quote, Quotee', 'lambda-admin-td'),
                            'quote'           => __('Quote', 'lambda-admin-td'),
                            'quotee'          => __('Quotee & Image', 'lambda-admin-td'),
                            'quotee-no-image' => __('Quotee', 'lambda-admin-td'),
                        ),
                        'desc'    => __('Sets layout style of the quote', 'lambda-admin-td'),
                    ),
                    array(
                        'name'      => __('Speed', 'lambda-admin-td'),
                        'desc'      => __('Set the speed of the slideshow cycling, in milliseconds', 'lambda-admin-td'),
                        'id'        => 'speed',
                        'type'      => 'slider',
                        'default'   => '7000',
                        'attr'      => array(
                            'max'       => 15000,
                            'min'       => 2000,
                            'step'      => 1000
                        )
                    ),
                    array(
                        'name'      => __('Transition type', 'lambda-admin-td'),
                        'id'        => 'animation_type',
                        'type'      => 'select',
                        'default'   => 'slide',
                        'options' => array(
                            'slide' => __('Slide', 'lambda-admin-td'),
                            'fade'  => __('Fade', 'lambda-admin-td'),
                        ),
                        'desc' => __('Sets the type of animation that occurs between quotes.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'      => __('Show Controls', 'lambda-admin-td'),
                        'id'        => 'show_controls',
                        'type'      => 'select',
                        'default'   => 'show',
                        'options' => array(
                            'show' => __('Show', 'lambda-admin-td'),
                            'hide' => __('Hide', 'lambda-admin-td'),
                        ),
                        'desc'    => __('Toggles the slideshow bullet nav controls at the bottom.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Randomize', 'lambda-admin-td'),
                        'desc'    => __('Randomize the ordering of the testimonials', 'lambda-admin-td'),
                        'id'      => 'randomize',
                        'type'    => 'select',
                        'default' => 'off',
                        'options' => array(
                            'on'   => __('On', 'lambda-admin-td'),
                            'off'  => __('Off', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Text Align', 'lambda-admin-td'),
                        'id'        => 'text_align',
                        'type'      => 'select',
                        'default'   => 'center',
                        'options' => array(
                            'left'   => __('Left', 'lambda-admin-td'),
                            'center' => __('Center', 'lambda-admin-td'),
                            'right'  => __('Right', 'lambda-admin-td'),
                            'justify'  => __('Justify', 'lambda-admin-td')
                        ),
                        'desc'    => __('Sets the text alignment of the blockquote and citation of the testimonial', 'lambda-admin-td'),
                    ),
                )
            ),
            array(
                'title' => __('Text', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/text-color.php'
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
     // TESTIMONIALS LIST SHORTCODE SECTION
    'testimonials_list' => array(
        'shortcode' => 'testimonials_list',
        'title'     => __('Testimonials List', 'lambda-admin-td'),
        'desc'      => __('Displays a list of testimonials.', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'has_content'   => false,
        'sections'   => array(
            array(
                'title' => __('Testimonials', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Choose a group', 'lambda-admin-td'),
                        'desc'    => __('Group of testimonials to show', 'lambda-admin-td'),
                        'id'      => 'group',
                        'default' =>  '',
                        'type'    => 'select',
                        'admin_label' => true,
                        'admin_label' => true,
                        'options' => 'taxonomy',
                        'taxonomy' => 'oxy_testimonial_group',
                        'blank_label' => __('All Testimonials', 'lambda-admin-td')
                    ),
                    array(
                        'name'    => __('Number Of Testimonials', 'lambda-admin-td'),
                        'desc'    => __('Number of Testimonials to display(set to 0 to show all)', 'lambda-admin-td'),
                        'id'      => 'count',
                        'type'    => 'slider',
                        'admin_label' => true,
                        'default' => '3',
                        'attr'    => array(
                            'max'   => 10,
                            'min'   => 0,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'    => __('List Columns', 'lambda-admin-td'),
                        'desc'    => __('Number of columns to show testimonials in', 'lambda-admin-td'),
                        'id'      => 'columns',
                        'type'    => 'select',
                        'admin_label' => true,
                        'options' => array(
                            2 => __('Two columns', 'lambda-admin-td'),
                            3 => __('Three columns', 'lambda-admin-td'),
                            4 => __('Four columns', 'lambda-admin-td'),
                            6 => __('Six columns', 'lambda-admin-td'),
                        ),
                        'default' => '3',
                    ),
                    array(
                        'name'    => __('Show avatars', 'lambda-admin-td'),
                        'desc'    => __('Display the featured image as avatar', 'lambda-admin-td'),
                        'id'      => 'show_image',
                        'type'    => 'select',
                        'default' => 'show',
                        'options' => array(
                            'show' => __('Show', 'lambda-admin-td'),
                            'hide' => __('Hide', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Animation Timing', 'lambda-admin-td'),
                        'desc'    => __('Will animate all testimonials at once or each one individually .', 'lambda-admin-td'),
                        'id'      => 'testimonial_scroll_animation_timing',
                        'type'    => 'select',
                        'default' => 'staggered',
                        'options' => array(
                            'all-same'   => __('All items appear at same time', 'lambda-admin-td'),
                            'staggered'  => __('Staggered over Animation Delay', 'lambda-admin-td'),
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Text', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/text-color.php'
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
     /* Staff Shortcodes */
    'staff_list' =>  array(
        'shortcode'     => 'staff_list',
        'title'         => __('Staff List', 'lambda-admin-td'),
        'desc'          => __('Displays a list of staff members in columns.', 'lambda-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Staff members list', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Choose a department', 'lambda-admin-td'),
                        'desc'    => __('Populate your list from a department', 'lambda-admin-td'),
                        'id'      => 'department',
                        'default' =>  '',
                        'type'    => 'select',
                        'admin_label' => true,
                        'options' => 'taxonomy',
                        'taxonomy' => 'oxy_staff_department',
                        'blank_label' => __('Select a department', 'lambda-admin-td')
                    ),
                    array(
                        'name'    => __('Number Of members', 'lambda-admin-td'),
                        'desc'    => __('Number of members to display(set to 0 to show all)', 'lambda-admin-td'),
                        'id'      => 'count',
                        'type'    => 'slider',
                        'admin_label' => true,
                        'default' => '3',
                        'attr'    => array(
                            'max'  => 30,
                            'min'  => 0,
                            'step' => 1
                        )
                    ),
                    array(
                        'name'    => __('List Columns', 'lambda-admin-td'),
                        'desc'    => __('Number of columns to show staff in', 'lambda-admin-td'),
                        'id'      => 'columns',
                        'type'    => 'select',
                        'admin_label' => true,
                        'options' => array(
                            2 => __('Two columns', 'lambda-admin-td'),
                            3 => __('Three columns', 'lambda-admin-td'),
                            4 => __('Four columns', 'lambda-admin-td'),
                            6 => __('Six columns', 'lambda-admin-td'),
                        ),
                        'default' => '3',
                    )
                )
            ),
            array(
                'title' => __('Text', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/text-color.php'
            ),
            array(
                'title' => __('Staff Items Options', 'lambda-admin-td'),
                'fields' =>  include OXY_THEME_DIR . 'inc/options/shortcodes/shared/staff.php'
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => array_merge(
                    include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php',
                    array(
                        array(
                            'name'    => __('Animation Timing', 'lambda-admin-td'),
                            'desc'    => __('Will animate all staff at once or each one individually .', 'lambda-admin-td'),
                            'id'      => 'scroll_animation_timing',
                            'type'    => 'select',
                            'default' => 'staggered',
                            'options' => array(
                                'all-same'   => __('All items appear at same time', 'lambda-admin-td'),
                                'staggered'  => __('Staggered over Animation Delay', 'lambda-admin-td'),
                            ),
                        )
                    )
                )
            )
        ),
    ),
    'staff_featured' => array(
        'shortcode'     => 'staff_featured',
        'title'         => __('Single Staff', 'lambda-admin-td'),
        'desc'          => __('Displays a section about one member of staff.', 'lambda-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Staff Member', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Featured member', 'lambda-admin-td'),
                        'desc'    => __('Select the staff member that will be featured', 'lambda-admin-td'),
                        'id'      => 'member',
                        'default' =>  '',
                        'type'    => 'select',
                        'options' => 'staff_featured',
                    )
                ),
            ),
            array(
                'title' => __('Text', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/text-color.php'
            ),
            array(
                'title' => __('Staff Item Options', 'lambda-admin-td'),
                'fields' =>  include OXY_THEME_DIR . 'inc/options/shortcodes/shared/staff.php'
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    // PORTFOLIO SHORTCODE OPTIONS
    'portfolio' => array(
        'shortcode'     => 'portfolio',
        'title'         => __('Portfolio', 'lambda-admin-td'),
        'desc'          => __('Displays a set of portfolio items in columns.', 'lambda-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Portfolio', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Category', 'lambda-admin-td'),
                        'desc'    => __('Categories to show (leave blank to show all)', 'lambda-admin-td'),
                        'id'      => 'categories',
                        'default' =>  '',
                        'type'    => 'select',
                        'options' => 'taxonomy',
                        'taxonomy' => 'oxy_portfolio_categories',
                        'admin_label' => true,
                        'attr' => array(
                            'multiple' => '',
                            'style' => 'height:100px'
                        )
                    ),
                    array(
                        'name'    => __('Portfolio Filters', 'lambda-admin-td'),
                        'desc'    => __('Select which filters to show above the portfolio.', 'lambda-admin-td'),
                        'id'      => 'filters',
                        'default' =>  '',
                        'type'    => 'select',
                        'options' => array(
                            'categories' => __('Category Filter', 'lambda-admin-td'),
                            'sort'       => __('Sort Options', 'lambda-admin-td'),
                            'order'      => __('Sort Order', 'lambda-admin-td'),
                        ),
                        'attr' => array(
                            'multiple' => '',
                            'style' => 'height:100px'
                        )
                    ),
                    array(
                        'name'    => __('Portfolio items count', 'lambda-admin-td'),
                        'desc'    => __('Number of portfolio items to display ( 0 for all )', 'lambda-admin-td'),
                        'id'      => 'count',
                        'type'    => 'slider',
                        'default' => '0',
                        'attr'    => array(
                            'max'   => 24,
                            'min'   => 0,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'    => __('Mobile Columns', 'lambda-admin-td'),
                        'desc'    => __('Number of columns to use on mobile sized displays (<768px)', 'lambda-admin-td'),
                        'id'      => 'xs_col',
                        'type'    => 'slider',
                        'default' => '1',
                        'attr'    => array(
                            'max'   => 12,
                            'min'   => 1,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'    => __('Tablet Columns', 'lambda-admin-td'),
                        'desc'    => __('Number of columns to use on tablet sized displays (>768px <992px)', 'lambda-admin-td'),
                        'id'      => 'sm_col',
                        'type'    => 'slider',
                        'default' => '2',
                        'attr'    => array(
                            'max'   => 12,
                            'min'   => 1,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'    => __('Desktop Columns', 'lambda-admin-td'),
                        'desc'    => __('Number of columns to use on regular desktop displays (>992px <1200px)', 'lambda-admin-td'),
                        'id'      => 'md_col',
                        'type'    => 'slider',
                        'default' => '3',
                        'attr'    => array(
                            'max'   => 12,
                            'min'   => 1,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'    => __('Large Desktop Columns', 'lambda-admin-td'),
                        'desc'    => __('Number of columns to use on large desktop displays (>1200x)', 'lambda-admin-td'),
                        'id'      => 'lg_col',
                        'type'    => 'slider',
                        'default' => '5',
                        'attr'    => array(
                            'max'   => 12,
                            'min'   => 1,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'    => __('Layout Mode', 'lambda-admin-td'),
                        'desc'    => __('Choose a method to layout the portfolio items in the list.', 'lambda-admin-td'),
                        'id'      => 'layout_mode',
                        'type'    => 'select',
                        'default' => 'fitRows',
                        'options' => array(
                            'fitRows' => __('Align by Rows', 'lambda-admin-td'),
                            'masonry' => __('Align Vertically', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Portfolio Items Padding', 'lambda-admin-td'),
                        'desc'    => __('Space to add between portfolio items in pixels.', 'lambda-admin-td'),
                        'id'      => 'item_padding',
                        'type'    => 'slider',
                        'default' => '15',
                        'attr'    => array(
                            'max'   => 80,
                            'min'   => 0,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'    => __('Pagination', 'lambda-admin-td'),
                        'desc'    => __('Select type of pagination to use for this portfolio list.', 'lambda-admin-td'),
                        'id'      => 'pagination',
                        'type'    => 'select',
                        'default' => 'none',
                        'options' => array(
                            'none'      => __('No Pagination', 'lambda-admin-td'),
                            'next_prev' => __('Next and Previous Buttons', 'lambda-admin-td'),
                            'pages'     => __('Page Numbers', 'lambda-admin-td'),
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Text', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/text-color.php'
            ),
            array(
                'title' => __('Portfolio Items', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Item image size', 'lambda-admin-td'),
                        'desc'    => __('Choose the size of images that will be loaded in the portfolio (Portfolio Size can be changed on Theme Portfolio Options Page)', 'lambda-admin-td'),
                        'id'      => 'item_size',
                        'type'    => 'select',
                        'default' => 'portfolio-thumb',
                        'options' => array(
                            'portfolio-thumb' => __('Portfolio Size', 'lambda-admin-td'),
                            'thumbnail'       => __('Thumbnail', 'lambda-admin-td'),
                            'medium'          => __('Medium', 'lambda-admin-td'),
                            'large'           => __('Large', 'lambda-admin-td'),
                            'full'            => __('Full', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Hover Overlay Type', 'lambda-admin-td'),
                        'id'        => 'item_overlay',
                        'type'      => 'select',
                        'default'   => 'icon',
                        'options' => array(
                            'icon'         => __('Show Icon', 'lambda-admin-td'),
                            'caption'      => __('Show Title & Caption', 'lambda-admin-td'),
                            'buttons'      => __('Show Title & Buttons', 'lambda-admin-td'),
                            'buttons_only' => __('Buttons Only', 'lambda-admin-td'),
                            'none'         => __('No Hover Overlay', 'lambda-admin-td'),
                        ),
                        'desc'    => __('Choose the type of hover overlay you would like to appear.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Hover Overlay Link Type', 'lambda-admin-td'),
                        'desc'    => __('Select the link type to use for the item.', 'lambda-admin-td'),
                        'id'      => 'item_link_type',
                        'type'    => 'select',
                        'default' => 'magnific',
                        'options' => array(
                            'magnific'      => __('Magnific Single Item', 'lambda-admin-td'),
                            'magnific-all'  => __('Magnific All Items', 'lambda-admin-td'),
                            'item'     => __('Link', 'lambda-admin-td'),
                            'no-link'  => __('No Link ', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Item Show Captions Below', 'lambda-admin-td'),
                        'desc'    => __('Select a portfolio style to use for the portfolio items.', 'lambda-admin-td'),
                        'id'      => 'item_captions_below',
                        'type'    => 'select',
                        'default' => 'hide',
                        'options' => array(
                            'hide' => __('Image Only', 'lambda-admin-td'),
                            'show' => __('Image + Captions Below', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Link Caption Title Below', 'lambda-admin-td'),
                        'desc'    => __('Makes the Captions Below Title a link.', 'lambda-admin-td'),
                        'id'      => 'captions_below_link_type',
                        'type'    => 'select',
                        'default' => 'item',
                        'options' => array(
                            'magnific'      => __('Magnific Single Item', 'lambda-admin-td'),
                            'magnific-all'  => __('Magnific All Items', 'lambda-admin-td'),
                            'item'     => __('Link', 'lambda-admin-td'),
                            'no-link'  => __('No Link ', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Item Caption Horizontal Alignment', 'lambda-admin-td'),
                        'id'        => 'item_caption_align',
                        'type'      => 'select',
                        'default'   => 'center',
                        'options' => array(
                            'center' => __('Center', 'lambda-admin-td'),
                            'left'   => __('Left', 'lambda-admin-td'),
                            'right'  => __('Right', 'lambda-admin-td'),
                            'justify'  => __('Justify', 'lambda-admin-td')
                        ),
                        'desc'    => __('The text alignment of the caption text / title.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'      => __('Item Overlay Caption Vertical Alignment', 'lambda-admin-td'),
                        'id'        => 'item_caption_vertical',
                        'type'      => 'select',
                        'default'   => 'middle',
                        'options' => array(
                            'middle' => __('Middle', 'lambda-admin-td'),
                            'top'    => __('Top', 'lambda-admin-td'),
                            'bottom' => __('Bottom', 'lambda-admin-td'),
                        ),
                        'desc'    => __('Vertical alignment of the caption title and text.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'      => __('Magnific Popup Captions', 'lambda-admin-td'),
                        'id'        => 'magnific_caption',
                        'type'      => 'select',
                        'default'   => 'image_caption',
                        'options' => array(
                            'image_caption'         => __('Media Image Caption', 'lambda-admin-td'),
                            'post_title_caption'    => __('Post Title', 'lambda-admin-td'),
                            'off'                   => __('No Captions', 'lambda-admin-td'),
                        ),
                        'desc'    => __('Caption shown below the magnific popup image', 'lambda-admin-td'),
                    ),
                    array(
                        'name'      => __('Item Overlay Hover Animation', 'lambda-admin-td'),
                        'id'        => 'item_overlay_animation',
                        'type'        => 'select',
                        'default'     => 'fade-in',
                        'options'     => array(
                            'fade-in'     => __('Fade in', 'lambda-admin-td'),
                            'fade-in from-top'    => __('Fade From Top', 'lambda-admin-td'),
                            'fade-in from-bottom' => __('Fade From Bottom', 'lambda-admin-td'),
                            'fade-in from-left'   => __('Fade From Left', 'lambda-admin-td'),
                            'fade-in from-right'  => __('Fade From Right', 'lambda-admin-td'),
                            'fade-none'        => __('No Animation', 'lambda-admin-td'),
                        ),
                        'desc'    => __('What animation will be used to reveal the image hover overlay.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Image Hover Effects Filter', 'lambda-admin-td'),
                        'id'      => 'item_hover_filter',
                        'type'    => 'select',
                        'default' => 'none',
                        'options' => array(
                            'none'      => __('None', 'lambda-admin-td'),
                            'sepia'     => __('Sepia', 'lambda-admin-td'),
                            'grayscale' => __('Grayscale', 'lambda-admin-td'),
                            'blur'      => __('Blur', 'lambda-admin-td'),
                        ),
                        'desc'    => __('Effects filter to apply to the image on hover.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Hover Effects Filter Behaviour', 'lambda-admin-td'),
                        'id'      => 'hover_filter_invert',
                        'type'    => 'select',
                        'default' => 'image-filter-onhover',
                        'options' => array(
                            'image-filter-onhover'    => __('Apply Filter On Hover', 'lambda-admin-td'),
                            'image-filter-invert'     => __('Apply Filter On Hover Out', 'lambda-admin-td'),
                        ),
                        'desc'    => __('When to apply the Hover Effects Filter.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'      => __('Item Overlay Grid', 'lambda-admin-td'),
                        'desc'      => __('Grid pattern to apply over the image on hover.', 'lambda-admin-td'),
                        'id'        => 'item_overlay_grid',
                        'type'      => 'slider',
                        'default'   => '0',
                        'attr'      => array(
                            'max'       => 100,
                            'min'       => 0,
                            'step'      => 10,
                        )
                    ),
                    array(
                        'name'      => __('Item Overlay Icon', 'lambda-admin-td'),
                        'desc'      => __('Icon to show on the hover overlay.', 'lambda-admin-td'),
                        'id'        => 'item_overlay_icon',
                        'type'    => 'select',
                        'options' => include OXY_THEME_DIR . 'inc/options/global-options/icons.php',
                        'default' => ''
                    ),
                    array(
                        'name'        => __('Scroll Animation', 'lambda-admin-td'),
                        'desc'        => __('Animation that will occur when the user scrolls onto the element.', 'lambda-admin-td'),
                        'id'          => 'item_scroll_animation',
                        'type'        => 'select',
                        'default'     => 'none',
                        'options'     => include OXY_THEME_DIR . 'inc/options/global-options/animations.php',
                    ),
                    array(
                        'name'    => __('Animation Delay', 'lambda-admin-td'),
                        'desc'    => __('Delay after scrolling onto the element before animation starts.', 'lambda-admin-td'),
                        'id'      => 'item_scroll_animation_delay',
                        'type'    => 'slider',
                        'default' => '0',
                        'attr'    => array(
                            'max'  => 4,
                            'min'  => 0,
                            'step' => 0.1
                        )
                    ),
                    array(
                        'name'    => __('Animation Timing', 'lambda-admin-td'),
                        'desc'    => __('Will load all portfolio items at once or each one individually .', 'lambda-admin-td'),
                        'id'      => 'item_scroll_animation_timing',
                        'type'    => 'select',
                        'default' => 'staggered',
                        'options' => array(
                            'all-same'   => __('All items appear at same time', 'lambda-admin-td'),
                            'staggered'  => __('Staggered over Animation Delay', 'lambda-admin-td'),
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/padding.php'
            ),
            array(
                'title' => __('Responsive', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/responsive.php'
            )
        )
    ),
    // PORTFOLIO SHORTCODE OPTIONS
    'portfolio_masonry' => array(
        'shortcode'     => 'portfolio_masonry',
        'title'         => __('Masonry Portfolio', 'lambda-admin-td'),
        'desc'          => __('Displays a set of portfolio items using a masonry style.', 'lambda-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Portfolio', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Category', 'lambda-admin-td'),
                        'desc'    => __('Categories to show (leave blank to show all)', 'lambda-admin-td'),
                        'id'      => 'categories',
                        'default' =>  '',
                        'type'    => 'select',
                        'options' => 'taxonomy',
                        'taxonomy' => 'oxy_portfolio_categories',
                        'admin_label' => true,
                        'attr' => array(
                            'multiple' => '',
                            'style' => 'height:100px'
                        )
                    ),
                    array(
                        'name'    => __('Portfolio Filters', 'lambda-admin-td'),
                        'desc'    => __('Select which filters to show above the portfolio.', 'lambda-admin-td'),
                        'id'      => 'filters',
                        'default' =>  '',
                        'type'    => 'select',
                        'options' => array(
                            'categories' => __('Category Filter', 'lambda-admin-td'),
                            'sort'       => __('Sort Options', 'lambda-admin-td'),
                            'order'      => __('Sort Order', 'lambda-admin-td'),
                        ),
                        'attr' => array(
                            'multiple' => '',
                            'style' => 'height:100px'
                        )
                    ),
                    array(
                        'name'    => __('Portfolio items count', 'lambda-admin-td'),
                        'desc'    => __('Number of portfolio items to display ( 0 for all )', 'lambda-admin-td'),
                        'id'      => 'count',
                        'type'    => 'slider',
                        'default' => '0',
                        'admin_label' => true,
                        'attr'    => array(
                            'max'   => 24,
                            'min'   => 0,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'    => __('Pagination', 'lambda-admin-td'),
                        'desc'    => __('Select type of pagination to use for this portfolio list.', 'lambda-admin-td'),
                        'id'      => 'pagination',
                        'type'    => 'select',
                        'default' => 'none',
                        'options' => array(
                            'none'      => __('No Pagination', 'lambda-admin-td'),
                            'next_prev' => __('Next and Previous Buttons', 'lambda-admin-td'),
                            'pages'     => __('Page Numbers', 'lambda-admin-td'),
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Text', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/text-color.php'
            ),
            array(
                'title' => __('Portfolio Items', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Item image size', 'lambda-admin-td'),
                        'desc'    => __('Choose the size of images that will be loaded in the portfolio (Portfolio Size can be changed on Theme Portfolio Options Page)', 'lambda-admin-td'),
                        'id'      => 'item_size',
                        'type'    => 'select',
                        'default' => 'full',
                        'options' => array(
                            'portfolio-thumb' => __('Portfolio Size', 'lambda-admin-td'),
                            'thumbnail'       => __('Thumbnail', 'lambda-admin-td'),
                            'medium'          => __('Medium', 'lambda-admin-td'),
                            'large'           => __('Large', 'lambda-admin-td'),
                            'full'            => __('Full', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Portfolio Items Padding', 'lambda-admin-td'),
                        'desc'    => __('Space to add between portfolio items in pixels.', 'lambda-admin-td'),
                        'id'      => 'item_padding',
                        'type'    => 'slider',
                        'default' => '0',
                        'attr'    => array(
                            'max'   => 80,
                            'min'   => 0,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'      => __('Hover Overlay Type', 'lambda-admin-td'),
                        'id'        => 'item_overlay',
                        'type'      => 'select',
                        'default'   => 'icon',
                        'options' => array(
                            'icon'         => __('Show Icon', 'lambda-admin-td'),
                            'caption'      => __('Show Title & Caption', 'lambda-admin-td'),
                            'buttons'      => __('Show Title & Buttons', 'lambda-admin-td'),
                            'buttons_only' => __('Buttons Only', 'lambda-admin-td'),
                            'none'         => __('No Hover Overlay', 'lambda-admin-td'),
                        ),
                        'desc'    => __('Choose the type of hover overlay you would like to appear.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Hover Overlay Link Type', 'lambda-admin-td'),
                        'desc'    => __('Select the link type to use for the item.', 'lambda-admin-td'),
                        'id'      => 'item_link_type',
                        'type'    => 'select',
                        'default' => 'magnific',
                        'options' => array(
                            'magnific' => __('Magnific', 'lambda-admin-td'),
                            'item'     => __('Link', 'lambda-admin-td'),
                            'no-link'  => __('No Link ', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Image Hover Effects Filter', 'lambda-admin-td'),
                        'id'      => 'item_hover_filter',
                        'type'    => 'select',
                        'default' => 'none',
                        'options' => array(
                            'none'      => __('None', 'lambda-admin-td'),
                            'sepia'     => __('Sepia', 'lambda-admin-td'),
                            'grayscale' => __('Grayscale', 'lambda-admin-td'),
                            'blur'      => __('Blur', 'lambda-admin-td'),
                        ),
                        'desc'    => __('Effects filter to apply to the image on hover.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Hover Effects Filter Behaviour', 'lambda-admin-td'),
                        'id'      => 'hover_filter_invert',
                        'type'    => 'select',
                        'default' => 'image-filter-onhover',
                        'options' => array(
                            'image-filter-onhover'    => __('Apply Filter On Hover', 'lambda-admin-td'),
                            'image-filter-invert'     => __('Apply Filter On Hover Out', 'lambda-admin-td'),
                        ),
                        'desc'    => __('When to apply the Hover Effects Filter.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'      => __('Item Caption Overlay Horizontal Alignment', 'lambda-admin-td'),
                        'id'        => 'item_caption_align',
                        'type'      => 'select',
                        'default'   => 'center',
                        'options' => array(
                            'center' => __('Center', 'lambda-admin-td'),
                            'left'   => __('Left', 'lambda-admin-td'),
                            'right'  => __('Right', 'lambda-admin-td'),
                            'justify'  => __('Justify', 'lambda-admin-td')
                        ),
                        'desc'    => __('The text alignment of the caption text / title.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'      => __('Item Overlay Caption Vertical Alignment', 'lambda-admin-td'),
                        'id'        => 'item_caption_vertical',
                        'type'      => 'select',
                        'default'   => 'middle',
                        'options' => array(
                            'middle' => __('Middle', 'lambda-admin-td'),
                            'top'    => __('Top', 'lambda-admin-td'),
                            'bottom' => __('Bottom', 'lambda-admin-td'),
                        ),
                        'desc'    => __('Vertical alignment of the caption title and text.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'      => __('Item Overlay Hover Animation', 'lambda-admin-td'),
                        'id'        => 'item_overlay_animation',
                        'type'        => 'select',
                        'default'     => 'fade-in',
                        'options'     => array(
                            'fade-in'     => __('Fade in', 'lambda-admin-td'),
                            'fade-in from-top'    => __('Fade From Top', 'lambda-admin-td'),
                            'fade-in from-bottom' => __('Fade From Bottom', 'lambda-admin-td'),
                            'fade-in from-left'   => __('Fade From Left', 'lambda-admin-td'),
                            'fade-in from-right'  => __('Fade From Right', 'lambda-admin-td'),
                            'fade-none'        => __('No Animation', 'lambda-admin-td'),
                        ),
                        'desc'    => __('What animation will be used to reveal the image hover overlay.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'      => __('Item Overlay Grid', 'lambda-admin-td'),
                        'desc'      => __('Grid pattern to apply over the image on hover.', 'lambda-admin-td'),
                        'id'        => 'item_overlay_grid',
                        'type'      => 'slider',
                        'default'   => '0',
                        'attr'      => array(
                            'max'       => 100,
                            'min'       => 0,
                            'step'      => 10,
                        )
                    ),
                    array(
                        'name'      => __('Item Overlay Icon', 'lambda-admin-td'),
                        'desc'      => __('Icon to show on the hover overlay.', 'lambda-admin-td'),
                        'id'        => 'item_overlay_icon',
                        'type'    => 'select',
                        'options' => include OXY_THEME_DIR . 'inc/options/global-options/icons.php',
                        'default' => 'plus',
                    ),
                    array(
                        'name'        => __('Scroll Animation', 'lambda-admin-td'),
                        'desc'        => __('Animation that will occur when the user scrolls onto the element.', 'lambda-admin-td'),
                        'id'          => 'item_scroll_animation',
                        'type'        => 'select',
                        'default'     => 'none',
                        'options'     => include OXY_THEME_DIR . 'inc/options/global-options/animations.php',
                    ),
                    array(
                        'name'    => __('Animation Delay', 'lambda-admin-td'),
                        'desc'    => __('Delay after scrolling onto the element before animation starts.', 'lambda-admin-td'),
                        'id'      => 'item_scroll_animation_delay',
                        'type'    => 'slider',
                        'default' => '0',
                        'attr'    => array(
                            'max'  => 4,
                            'min'  => 0,
                            'step' => 0.1
                        )
                    ),
                    array(
                        'name'    => __('Animation Timing', 'lambda-admin-td'),
                        'desc'    => __('Will load all portfolio items at once or each one individually .', 'lambda-admin-td'),
                        'id'      => 'item_scroll_animation_timing',
                        'type'    => 'select',
                        'default' => 'staggered',
                        'options' => array(
                            'all-same'   => __('All items appear at same time', 'lambda-admin-td'),
                            'staggered'  => __('Staggered over Animation Delay', 'lambda-admin-td'),
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/padding.php'
            ),
            array(
                'title' => __('Responsive', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/responsive.php'
            )
        )
    ),
    'recent_posts' => array(
        'shortcode' => 'recent_posts',
        'title'     => __('Recent Posts', 'lambda-admin-td'),
        'desc'       => __('Displays a simple list of recent posts.', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'has_content'   => false,
        'sections'   => array(
            array(
                'title' => __('Recent Posts', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Post style', 'lambda-admin-td'),
                        'desc'    => __('Style to use to render the post in the list.', 'lambda-admin-td'),
                        'id'      => 'style',
                        'type'    => 'select',
                        'default' => 'small',
                        'options' => array(
                            'small' => __('Simple post with title & excerpt below', 'lambda-admin-td'),
                            'image' => __('Featured image with title and excerpt in the overlay.', 'lambda-admin-td'),
                            'list'  => __('List of posts with Featured image, as well as title and excerpt on the side.', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Number of posts', 'lambda-admin-td'),
                        'desc'    => __('Total Number of posts to display.', 'lambda-admin-td'),
                        'id'      => 'count',
                        'type'    => 'slider',
                        'default' => '3',
                        'attr'    => array(
                            'max'   => 50,
                            'min'   => 1,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'    => __('Columns Per Row', 'lambda-admin-td'),
                        'desc'    => __('Number of posts to display per row ( does not apply to list view )', 'lambda-admin-td'),
                        'id'      => 'columns',
                        'type'    => 'select',
                        'options' => array(
                            1 => __('One column', 'lambda-admin-td'),
                            2 => __('Two columns', 'lambda-admin-td'),
                            3 => __('Three columns', 'lambda-admin-td'),
                            4 => __('Four columns', 'lambda-admin-td'),
                        ),
                        'default' => '3',
                    ),
                    array(
                        'name'    => __('Post category', 'lambda-admin-td'),
                        'desc'    => __('Choose posts from a specific category', 'lambda-admin-td'),
                        'id'      => 'cat',
                        'default' =>  '',
                        'type'    => 'select',
                        'options' => 'categories',
                        'attr' => array(
                            'multiple' => '',
                            'style' => 'height:100px'
                        )
                    ),
                    array(
                        'name'    => __('Title Size', 'lambda-admin-td'),
                        'desc'    => __('Size of heading to use for post titles.', 'lambda-admin-td'),
                        'id'      => 'title_tag',
                        'type'    => 'select',
                        'default' => 'h3',
                        'options' => array(
                            'h1' => __('H1', 'lambda-admin-td'),
                            'h2' => __('H2', 'lambda-admin-td'),
                            'h3' => __('H3', 'lambda-admin-td'),
                            'h4' => __('H4', 'lambda-admin-td'),
                            'h5' => __('H5', 'lambda-admin-td'),
                            'h6' => __('H6', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Post Text Alignment', 'lambda-admin-td'),
                        'id'        => 'text_align',
                        'type'      => 'select',
                        'default'   => 'left',
                        'options' => array(
                            'left'      => __('Left', 'lambda-admin-td'),
                            'center'    => __('Center', 'lambda-admin-td'),
                            'right'     => __('Right', 'lambda-admin-td'),
                            'justify'   => __('Justify', 'lambda-admin-td')
                        ),
                        'desc'    => __('Sets the text alignment of the post text & title.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Animation Timing', 'lambda-admin-td'),
                        'desc'    => __('Will animate all posts at once or each one individually .', 'lambda-admin-td'),
                        'id'      => 'scroll_animation_timing',
                        'type'    => 'select',
                        'default' => 'staggered',
                        'options' => array(
                            'all-same'   => __('All items appear at same time', 'lambda-admin-td'),
                            'staggered'  => __('Staggered over Animation Delay', 'lambda-admin-td'),
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    // MAP SHORTCODE OPTIONS
    'map' => array(
        'shortcode'     => 'map',
        'title'         => __('Google Map', 'lambda-admin-td'),
        'desc'          => __('Adds a Google Map to the page.', 'lambda-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Map', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'      => __('Map Type', 'lambda-admin-td'),
                        'id'        => 'map_type',
                        'desc'    => __('Choose a type of map to show from Google Maps.', 'lambda-admin-td'),
                        'type'      => 'select',
                        'default'   =>  'ROADMAP',
                        'options' => array(
                            'ROADMAP'   => __('Roadmap', 'lambda-admin-td'),
                            'SATELLITE' => __('Satellite', 'lambda-admin-td'),
                            'TERRAIN'   => __('Terrain', 'lambda-admin-td'),
                            'HYBRID'    => __('Hybrid', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Map Style', 'lambda-admin-td'),
                        'id'        => 'map_style',
                        'desc'    => __('Set a drawing style for the map.', 'lambda-admin-td'),
                        'type'      => 'select',
                        'default'   =>  'regular',
                        'options' => array(
                            'blackwhite' => __('Black & White', 'lambda-admin-td'),
                            'regular'    => __('Regular', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Center Map', 'lambda-admin-td'),
                        'id'        => 'auto_center',
                        'type'      => 'select',
                        'default'   =>  'auto',
                        'desc'    => __('Sets the center the map automatically based on the markers, or manually.', 'lambda-admin-td'),
                        'options' => array(
                            'auto'   => __('Auto center markers ', 'lambda-admin-td'),
                            'manual' => __('I will tell you where to center map below', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Center Map Lat/Lng', 'lambda-admin-td'),
                        'desc'    => __('Latitude and Longitude position to center the Map (separate with lat and long with commas).', 'lambda-admin-td'),
                        'id'      => 'center_latlng',
                        'default' =>  '',
                        'type'    => 'text',
                    ),
                    array(
                        'name'      => __('Map Zoom', 'lambda-admin-td'),
                        'id'        => 'map_zoom',
                        'desc'    => __('Sets the zoom level of the map.  NOTE - will be overridden by the auto center map option', 'lambda-admin-td'),
                        'type'      => 'slider',
                        'default' => '15',
                        'attr'    => array(
                            'max'   => 20,
                            'min'   => 1,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'      => __('Map Scrollable', 'lambda-admin-td'),
                        'id'        => 'map_scrollable',
                        'desc'    => __('Toggles draggable scrolling of the map.', 'lambda-admin-td'),
                        'type'      => 'select',
                        'default'   =>  'on',
                        'options' => array(
                            'on'  => __('On', 'lambda-admin-td'),
                            'off' => __('Off', 'lambda-admin-td'),
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Marker', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Marker Image', 'lambda-admin-td'),
                        'desc'    => __('Set the url of a custom marker image.', 'lambda-admin-td'),
                        'id'      => 'marker_link',
                        'type'    => 'text',
                        'default' => '',
                    ),
                    array(
                        'name'      => __('Show Markers', 'lambda-admin-td'),
                        'id'        => 'marker',
                        'type'      => 'select',
                        'default'   =>  'show',
                        'desc'    => __('Toggle showing or hiding the small marker points on your map.', 'lambda-admin-td'),
                        'options' => array(
                            'hide' => __('Hide', 'lambda-admin-td'),
                            'show' => __('Show', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Marker Labels', 'lambda-admin-td'),
                        'desc'    => __('Labels to show above the marker. Divide labels with pipe character |', 'lambda-admin-td'),
                        'id'      => 'label',
                        'default' =>  '',
                        'type'    => 'textarea',
                    ),
                    array(
                        'name'    => __('Marker Addresses', 'lambda-admin-td'),
                        'desc'    => __('Addresses to show markers. Divide addresses with pipe character |', 'lambda-admin-td'),
                        'id'      => 'address',
                        'default' =>  '',
                        'type'    => 'textarea',
                    ),
                    array(
                        'name'    => __('Markers Lat/Lng', 'lambda-admin-td'),
                        'desc'    => __('Latitude and Longitude of markers(separate with commas), if you dont want to use address. Divide markers with pipe character |', 'lambda-admin-td'),
                        'id'      => 'latlng',
                        'default' =>  '',
                        'type'    => 'textarea',
                    ),
                )
            ),
            array(
                'title' => __('Section', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'      => __('Map Height', 'lambda-admin-td'),
                        'id'        => 'height',
                        'desc'    => __('Map height in pixels.', 'lambda-admin-td'),
                        'type'      => 'slider',
                        'default' => '500',
                        'attr'    => array(
                            'max'   => 800,
                            'min'   => 50,
                            'step'  => 1
                        )
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    // PIECHART SHORTCODE
    'pie' => array(
        'shortcode' => 'pie',
        'title'     => __('Pie Chart', 'lambda-admin-td'),
        'desc'      => __('Creates a circular chart to show a % value.', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'has_content'   => false,
        'sections'   => array(
            array(
                'title' => __('Pie Chart', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Track Colour', 'lambda-admin-td'),
                        'desc'    => __('Choose the chart track colour', 'lambda-admin-td'),
                        'id'      => 'track_colour',
                        'default' =>  '',
                        'type'    => 'colour',
                    ),
                    array(
                        'name'    => __('Bar Colour', 'lambda-admin-td'),
                        'desc'    => __('Choose the chart bar colour', 'lambda-admin-td'),
                        'id'      => 'bar_colour',
                        'default' =>  '',
                        'type'    => 'colour',
                    ),
                    array(
                        'name'    => __('Icon', 'lambda-admin-td'),
                        'desc'    => __('Choose a chart icon', 'lambda-admin-td'),
                        'id'      => 'icon',
                        'default' =>  '',
                        'type'    => 'select',
                        'options' => include OXY_THEME_DIR . 'inc/options/global-options/icons.php',
                    ),
                    array(
                        'name'    => __('Icon Animation', 'lambda-admin-td'),
                        'desc'    => __('Choose an icon animation', 'lambda-admin-td'),
                        'id'      => 'icon_animation',
                        'type'    => 'select',
                        'default' => 'none',
                        'options' => include OXY_THEME_DIR . 'inc/options/global-options/animations.php'
                    ),
                    array(
                        'name'    => __('Percentage', 'lambda-admin-td'),
                        'desc'    => __('Percentage of the pie chart', 'lambda-admin-td'),
                        'id'      => 'percentage',
                        'admin_label' => true,
                        'type'    => 'slider',
                        'default' => '50',
                        'attr'    => array(
                            'max'   => 100,
                            'min'   => 1,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'    => __('Size', 'lambda-admin-td'),
                        'desc'    => __('Set the size of the chart', 'lambda-admin-td'),
                        'id'      => 'size',
                        'type'    => 'slider',
                        'default' => '200',
                        'attr'    => array(
                            'max'   => 400,
                            'min'   => 50,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'    => __('Line Width', 'lambda-admin-td'),
                        'desc'    => __('Set the width of the charts line', 'lambda-admin-td'),
                        'id'      => 'line_width',
                        'type'    => 'slider',
                        'default' => '20',
                        'attr'    => array(
                            'max'   => 30,
                            'min'   => 5,
                            'step'  => 1
                        )
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
     // COUNTER SHORTCODE
    'counter' => array(
        'shortcode' => 'counter',
        'title'     => __('Counter', 'lambda-admin-td'),
        'desc'      => __('Creates a circular counter to show an integer value.', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'has_content'   => false,
        'sections'   => array(
            array(
                'title' => __('Counter', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Initial Value', 'lambda-admin-td'),
                        'desc'    => __('Starting value of the circular counter before the animation.', 'lambda-admin-td'),
                        'id'      => 'initvalue',
                        'admin_label' => true,
                        'default'     =>  '0',
                        'type'        => 'text',
                    ),
                    array(
                        'name'    => __('End Value', 'lambda-admin-td'),
                        'desc'    => __('Value of the circular counter', 'lambda-admin-td'),
                        'id'      => 'value',
                        'admin_label' => true,
                        'default'     =>  '',
                        'type'        => 'text',
                    ),
                    array(
                        'name'      => __('Number Format', 'lambda-admin-td'),
                        'id'        => 'format',
                        'type'      => 'select',
                        'default'   => '(,ddd)',
                        'options' => array(
                            '(,ddd)'    => '12,345,678',
                            '(,ddd).dd' => '12,345,678.09',
                            '(.ddd),dd' => '12.345.678,09',
                            '( ddd),dd' => '12 345 678,09',
                            'd'         => '12345678',
                        ),
                        'desc'    => __('Sets format that the number in the counter will use.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'      => __('Text Alignment', 'lambda-admin-td'),
                        'id'        => 'align',
                        'type'      => 'select',
                        'default'   => 'center',
                        'options' => array(
                            'default'   => __('Default alignment', 'lambda-admin-td'),
                            'left'      => __('Left', 'lambda-admin-td'),
                            'center'    => __('Center', 'lambda-admin-td'),
                            'right'     => __('Right', 'lambda-admin-td'),
                            'justify'   => __('Justify', 'lambda-admin-td'),
                        ),
                        'desc'    => __('Sets the text alignment of the lead text.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Counter Font Size', 'lambda-admin-td'),
                        'desc'    => __('Choose the size of the font to use in the counter', 'lambda-admin-td'),
                        'id'      => 'counter_size',
                        'type'    => 'select',
                        'options' => array(
                            'normal'      => __('Normal', 'lambda-admin-td'),
                            'super' => __('Super (60px)', 'lambda-admin-td'),
                            'hyper' => __('Hyper (96px)', 'lambda-admin-td'),
                        ),
                        'default' => 'normal',
                    ),
                    array(
                        'name'    => __('Counter Font Weight', 'lambda-admin-td'),
                        'desc'    => __('Choose the weight of the font to use in the counter', 'lambda-admin-td'),
                        'id'      => 'counter_weight',
                        'type'    => 'select',
                        'options' => array(
                            'regular'  => __('Regular', 'lambda-admin-td'),
                            'black'    => __('Black', 'lambda-admin-td'),
                            'bold'     => __('Bold', 'lambda-admin-td'),
                            'light'    => __('Light', 'lambda-admin-td'),
                            'hairline' => __('Hairline', 'lambda-admin-td'),
                        ),
                        'default' => 'regular',
                    ),
                )
            ),
            array(
                'title' => __('Text', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/text-color.php'
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'pricing' => array(
        'title'       => __('Pricing Column', 'lambda-admin-td'),
        'desc'        => __('Displays a price info column.', 'lambda-admin-td'),
        'shortcode'   => 'pricing',
        'insert_with' => 'dialog',
        'has_content' => false,
        'sections'   => array(
            array(
                'title' => __('Pricing Table', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'        => __('Heading', 'lambda-admin-td'),
                        'desc'        => __('Heading text of the column', 'lambda-admin-td'),
                        'id'          => 'heading',
                        'admin_label' => true,
                        'default'     =>  '',
                        'type'        => 'text',
                    ),
                    array(
                        'name'      => __('Featured Column', 'lambda-admin-td'),
                        'id'        => 'featured',
                        'type'      => 'select',
                        'default'   =>  'false',
                        'options' => array(
                            'false' => __('Not Featured', 'lambda-admin-td'),
                            'true'  => __('Featured', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Background Color', 'lambda-admin-td'),
                        'id'        => 'pricing_background_colour',
                        'desc'      => __('Set the background color of the Pricing Column', 'lambda-admin-td'),
                        'type'      => 'colour',
                        'format'    => 'rgba',
                        'default'   => '#82c9ed',
                    ),
                    array(
                        'name'      => __('Foreground Color', 'lambda-admin-td'),
                        'id'        => 'pricing_foreground_colour',
                        'desc'      => __('Set the foreground color of the Pricing Column', 'lambda-admin-td'),
                        'type'      => 'colour',
                        'format'    => 'rgba',
                        'default'   => '#FFFFFF',
                    ),
                    array(
                        'name'      => __('Show price', 'lambda-admin-td'),
                        'id'        => 'show_price',
                        'type'      => 'select',
                        'default'   =>  'true',
                        'options' => array(
                            'true' => __('Show', 'lambda-admin-td'),
                            'false' => __('Hide', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Price Color', 'lambda-admin-td'),
                        'id'        => 'pricing_colour',
                        'desc'      => __('Set the color of the Price', 'lambda-admin-td'),
                        'type'      => 'colour',
                        'format'    => 'rgba',
                        'default'   => '#FFFFFF',
                    ),
                    array(
                        'name'      => __('Price background', 'lambda-admin-td'),
                        'id'        => 'pricing_background',
                        'desc'      => __('Set the background of the Price', 'lambda-admin-td'),
                        'type'      => 'colour',
                        'format'    => 'rgba',
                        'default'   => '#82c9ed',
                    ),
                    array(
                        'name'    => __('Price', 'lambda-admin-td'),
                        'desc'    => __('Price to show at top of the column.', 'lambda-admin-td'),
                        'id'      => 'price',
                        'default' =>  '',
                        'type'    => 'text',
                    ),
                    array(
                        'name'    => __('Price Currency', 'lambda-admin-td'),
                        'desc'    => __('Price currency to show next to the price.', 'lambda-admin-td'),
                        'id'      => 'currency',
                        'default' =>  '&#36;',
                        'type'    => 'select',
                        'options' => array(
                            '&#36;'   => __('Dollar', 'lambda-admin-td'),
                            '&#128;'  => __('Euro', 'lambda-admin-td'),
                            '&#163;'  => __('Pound', 'lambda-admin-td'),
                            '&#165;'  => __('Yen', 'lambda-admin-td'),
                            'custom' => __('Custom', 'lambda-admin-td'),
                        )
                    ),
                    array(
                        'name'    => __('Custom Currency', 'lambda-admin-td'),
                        'desc'    => __('If custom currency selected enter the html code here. e.g. <code>&#8359;</code>', 'lambda-admin-td'),
                        'id'      => 'custom_currency',
                        'default' =>  '',
                        'type'    => 'text',
                    ),
                    array(
                        'name'    => __('After Price Text', 'lambda-admin-td'),
                        'desc'    => __('Text to show after the price.', 'lambda-admin-td'),
                        'id'      => 'per',
                        'default' =>  '',
                        'type'    => 'text',
                    ),
                    array(
                        'name'    => __('Item List', 'lambda-admin-td'),
                        'desc'    => __('List of items to put in the column under the price. Divide categories with linebreaks (Enter)', 'lambda-admin-td'),
                        'id'      => 'list',
                        'default' =>  '',
                        'type'    => 'exploded_textarea',
                    ),
                    array(
                        'name'      => __('Show button', 'lambda-admin-td'),
                        'id'        => 'show_button',
                        'type'      => 'select',
                        'default'   =>  'true',
                        'options' => array(
                            'true' => __('Show', 'lambda-admin-td'),
                            'false' => __('Hide', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Button Text', 'lambda-admin-td'),
                        'desc'    => __('Text to inside the button at the bottom of the column.', 'lambda-admin-td'),
                        'id'      => 'button_text',
                        'default' =>  '',
                        'type'    => 'text',
                    ),
                    array(
                        'name'    => __('Button Link', 'lambda-admin-td'),
                        'desc'    => __('Link that the button will point to.', 'lambda-admin-td'),
                        'id'      => 'button_link',
                        'default' =>  '',
                        'type'    => 'text',
                    ),
                    array(
                        'name'      => __('Button background Color', 'lambda-admin-td'),
                        'id'        => 'button_background_colour',
                        'desc'      => __('Set the background color of the button', 'lambda-admin-td'),
                        'type'      => 'colour',
                        'format'    => 'rgba',
                        'default'   => '#FFFFFF',
                    ),
                    array(
                        'name'      => __('Button text Color', 'lambda-admin-td'),
                        'id'        => 'button_foreground_colour',
                        'desc'      => __('Set the foreground color of the button', 'lambda-admin-td'),
                        'type'      => 'colour',
                        'format'    => 'rgba',
                        'default'   => '#82c9ed',
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        ),
    ),
    'pricing_list' => array(
        'shortcode'   => 'pricing_list',
        'title'       => __('Pricing List', 'lambda-admin-td'),
        'desc'        => __('Displays a list of prices.', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'has_content'   => false,
        'sections'    => array(
            array(
                'title' => __('Text', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/text-color.php'
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'pricing_item' => array(
        'shortcode'   => 'pricing_item',
        'title'       => __('Pricing Item', 'lambda-admin-td'),
        'desc'        => __('Displays a pricing item.', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'has_content'   => false,
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'        => __('Title', 'lambda-admin-td'),
                        'id'          => 'title',
                        'type'        => 'text',
                        'admin_label' => true,
                        'default'     => '',
                        'desc'        => __('Choose a title for your pricing item.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'        => __('Description', 'lambda-admin-td'),
                        'id'          => 'description',
                        'type'        => 'textarea',
                        'default'     => '',
                        'desc'        => __('Choose a description for your pricing item.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'      => __('Featured Item Label', 'lambda-admin-td'),
                        'desc'      => __('Set a label for the featured item.', 'lambda-admin-td'),
                        'id'        => 'featured_label',
                        'type'      => 'text',
                        'default'   =>  '',
                    ),
                    array(
                        'name'    => __('Image', 'lambda-admin-td'),
                        'id'      => 'image',
                        'store'   => 'url',
                        'type'    => 'upload',
                        'default' => '',
                        'desc'    => __('Choose an image to use for this pricing item.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Image Shape', 'lambda-admin-td'),
                        'desc'    => __('Choose if the image will be rounded or not', 'lambda-admin-td'),
                        'id'      => 'shape',
                        'type'    => 'select',
                        'default' => 'round',
                        'options'    => array(
                            'square' => __('Square', 'lambda-admin-td'),
                            'round'  => __('Circle', 'lambda-admin-td'),
                        )
                    ),
                    array(
                        'name'    => __('Price', 'lambda-admin-td'),
                        'desc'    => __('Price to show at top of the column.', 'lambda-admin-td'),
                        'id'      => 'price',
                        'default' =>  '',
                        'type'    => 'text',
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'features_list' => array(
        'shortcode'   => 'features_list',
        'title'       => __('Features List', 'lambda-admin-td'),
        'desc'        => __('Displays a list of features.', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'has_content'   => false,
        'sections'    => array(
            array(
                'title' => __('Text', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/text-color.php'
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'feature' => array(
        'shortcode'   => 'feature',
        'title'       => __('Feature', 'lambda-admin-td'),
        'desc'        => __('Displays a shape with an icon alongside some text.', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'has_content'   => false,
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'    => __('Icon', 'lambda-admin-td'),
                        'id'      => 'icon',
                        'desc'    => __('Select an icon that will appear in your features shape.', 'lambda-admin-td'),
                        'type'    => 'select',
                        'options' => include OXY_THEME_DIR . 'inc/options/global-options/icons.php',
                        'default' => ''
                    ),
                    array(
                        'name'      => __('Icon Colour', 'lambda-admin-td'),
                        'desc'      => __('Set the colour of the icon', 'lambda-admin-td'),
                        'id'        => 'icon_color',
                        'type'      => 'colour',
                        'default'   => '',
                        'format'  => 'rgba',
                        'attr'      => array(
                            'class' => 'allow-empty'
                        )
                    ),
                    array(
                        'name'      => __('Background Colour', 'lambda-admin-td'),
                        'desc'      => __('Set the colour shape background.', 'lambda-admin-td'),
                        'id'        => 'background_color',
                        'type'      => 'colour',
                        'default'   => '',
                        'format'  => 'rgba',
                        'attr'      => array(
                            'class' => 'allow-empty'
                        )
                    ),
                    array(
                        'name'    => __('Hover Animation', 'lambda-admin-td'),
                        'desc'    => __('Choose a hover animation for the feature icon.', 'lambda-admin-td'),
                        'id'      => 'animation',
                        'type'    => 'select',
                        'default' => '',
                        'options' => include OXY_THEME_DIR . 'inc/options/global-options/animations.php'
                    ),
                    array(
                        'name'        => __('Title', 'lambda-admin-td'),
                        'id'          => 'title',
                        'type'        => 'text',
                        'admin_label' => true,
                        'default'     => '',
                        'desc'        => __('Choose a title for your featured item.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'        => __('Content', 'lambda-admin-td'),
                        'id'          => 'content',
                        'type'        => 'textarea',
                        'default'     => '',
                        'desc'        => __('Content to show below title.', 'lambda-admin-td'),
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'slideshow' => array(
        'shortcode'     => 'slideshow',
        'title'         => __('Slideshow', 'lambda-admin-td'),
        'desc'          => __('Adds a Flexslider slideshow to the page.', 'lambda-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Slideshow', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Choose a Flexslider', 'lambda-admin-td'),
                        'desc'    => __('Populate your slider with one of the slideshows you created', 'lambda-admin-td'),
                        'id'      => 'flexslider',
                        'default' =>  '',
                        'type'    => 'select',
                        'options' => 'slideshow',
                    ),
                    array(
                        'name'      =>  __('Animation style', 'lambda-admin-td'),
                        'desc'      =>  __('Select how your slider animates', 'lambda-admin-td'),
                        'id'        => 'animation',
                        'type'      => 'select',
                        'options'   =>  array(
                            'slide' => __('Slide', 'lambda-admin-td'),
                            'fade'  => __('Fade', 'lambda-admin-td'),
                        ),
                        'default'   => 'slide',
                    ),
                    array(
                        'name'      => __('Direction', 'lambda-admin-td'),
                        'desc'      =>  __('Select the direction your slider slides', 'lambda-admin-td'),
                        'id'        => 'direction',
                        'type'      => 'select',
                        'default'   =>  'horizontal',
                        'options' => array(
                            'horizontal' => __('Horizontal', 'lambda-admin-td'),
                            'vertical'   => __('Vertical', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Duration', 'lambda-admin-td'),
                        'desc'      => __('Select how long each color will stay, in milliseconds', 'lambda-admin-td'),
                        'id'        => 'duration',
                        'type'      => 'slider',
                        'default'   => '600',
                        'attr'      => array(
                            'max'       => 1500,
                            'min'       => 200,
                            'step'      => 100
                        )
                    ),
                    array(
                        'name'      => __('Speed', 'lambda-admin-td'),
                        'desc'      => __('Select how fast the colors will change, in milliseconds', 'lambda-admin-td'),
                        'id'        => 'speed',
                        'type'      => 'slider',
                        'default'   => '7000',
                        'attr'      => array(
                            'max'       => 15000,
                            'min'       => 2000,
                            'step'      => 1000
                        )
                    ),
                    array(
                        'name'      => __('Auto start', 'lambda-admin-td'),
                        'id'        => 'autostart',
                        'type'      => 'select',
                        'default'   =>  'true',
                        'desc'    => __('Start slideshow automatically', 'lambda-admin-td'),
                        'options' => array(
                            'true'  => __('On', 'lambda-admin-td'),
                            'false' => __('Off', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Show navigation arrows', 'lambda-admin-td'),
                        'id'        => 'directionnav',
                        'type'      => 'select',
                        'default'   =>  'hide',
                        'options' => array(
                            'show' => __('Show', 'lambda-admin-td'),
                            'hide' => __('Hide', 'lambda-admin-td'),
                        ),
                    ),
                     array(
                        'name'      => __('Item width', 'lambda-admin-td'),
                        'desc'      => __('Set width of the slider items( leave blank for full )', 'lambda-admin-td'),
                        'id'        => 'itemwidth',
                        'type'      => 'text',
                        'default'   => '',
                        'attr'      =>  array(
                            'size'    => 8,
                        ),
                    ),
                    array(
                        'name'      => __('Show controls', 'lambda-admin-td'),
                        'id'        => 'showcontrols',
                        'type'      => 'select',
                        'default'   =>  'show',
                        'options' => array(
                            'show' => __('Show', 'lambda-admin-td'),
                            'hide' => __('Hide', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Choose the place of the controls', 'lambda-admin-td'),
                        'id'        => 'controlsposition',
                        'type'      => 'select',
                        'default'   =>  'inside',
                        'options' => array(
                            'inside'    => __('Inside', 'lambda-admin-td'),
                            'outside'   => __('Outside', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'      =>  __('Choose the alignment of the controls', 'lambda-admin-td'),
                        'id'        => 'controlsalign',
                        'type'      => 'select',
                        'default'   => 'center',
                        'options'   =>  array(
                            'center' => __('Center', 'lambda-admin-td'),
                            'left'   => __('Left', 'lambda-admin-td'),
                            'right'  => __('Right', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Controls Vertical Position', 'lambda-admin-td'),
                        'id'        => 'controls_vertical',
                        'type'      => 'select',
                        'default'   =>  'bottom',
                        'options' => array(
                            'top'    => __('Top', 'lambda-admin-td'),
                            'bottom' => __('Bottom', 'lambda-admin-td'),
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Captions', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'      => __('Show Captions', 'lambda-admin-td'),
                        'id'        => 'captions',
                        'type'      => 'select',
                        'default'   =>  'show',
                        'options' => array(
                            'show' => __('Show', 'lambda-admin-td'),
                            'hide' => __('Hide', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Captions Horizontal Position', 'lambda-admin-td'),
                        'desc'      => __('Choose among left, right and alternate positioning', 'lambda-admin-td'),
                        'id'        => 'captions_horizontal',
                        'type'      => 'select',
                        'default'   =>  'left',
                        'options' => array(
                            'left'      => __('Left', 'lambda-admin-td'),
                            'right'     => __('Right', 'lambda-admin-td'),
                            'alternate' => __('Alternate', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Show Tooltip', 'lambda-admin-td'),
                        'id'        => 'tooltip',
                        'type'      => 'select',
                        'default'   =>  'hide',
                        'desc'    => __('Show tooltip if Item width option is set', 'lambda-admin-td'),
                        'options' => array(
                            'show'  => __('Show', 'lambda-admin-td'),
                            'hide'  => __('Hide', 'lambda-admin-td'),
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'vc_single_image' => array(
        'shortcode'     => 'vc_single_image',
        'title'         => __('Image', 'lambda-admin-td'),
        'desc'          => __('Displays an image.', 'lambda-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Simple Image', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Image Source', 'lambda-admin-td'),
                        'id'      => 'image',
                        'type'    => 'upload',
                        'store'   => 'id',
                        'default' => '',
                        'desc'    => __('Place the source path of the image here', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Link Type', 'lambda-admin-td'),
                        'desc'    => __('Select the link type to use for the item.', 'lambda-admin-td'),
                        'id'      => 'link_type',
                        'type'    => 'select',
                        'default' => 'magnific',
                        'options' => array(
                            'magnific' => __('Magnific', 'lambda-admin-td'),
                            'item'     => __('Link', 'lambda-admin-td'),
                            'no-link'  => __('No Link ', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Hover Effect', 'lambda-admin-td'),
                        'desc'    => __('Select an effect to add when you hover over the image.', 'lambda-admin-td'),
                        'id'      => 'hover_effect',
                        'type'    => 'select',
                        'default' => '',
                        'options' => array(
                            ''                    => __('No Effect', 'lambda-admin-td'),
                            'image-effect-zoom-in'  => __('Zoom In', 'lambda-admin-td'),
                            'image-effect-zoom-out' => __('Zoom Out', 'lambda-admin-td'),
                            'image-effect-scroll-left'  => __('Scroll Left', 'lambda-admin-td'),
                            'image-effect-scroll-right' => __('Scroll Right', 'lambda-admin-td')
                        ),
                    ),
                    array(
                        'name'    => __('Link', 'lambda-admin-td'),
                        'id'      => 'link',
                        'type'    => 'text',
                        'default' => '',
                        'desc'    => __('Link that the item will link leave blank to link to original image source.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Open Link In', 'lambda-admin-td'),
                        'id'      => 'link_target',
                        'type'    => 'select',
                        'default' => '_self',
                        'options' => array(
                            '_self'   => __('Same page as it was clicked ', 'lambda-admin-td'),
                            '_blank'  => __('Open in new window/tab', 'lambda-admin-td'),
                        ),
                        'desc'    => __('Where the link will open.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Image Alt', 'lambda-admin-td'),
                        'id'      => 'alt',
                        'type'    => 'text',
                        'default' => '',
                        'desc'    => __('Place the alt of the image here', 'lambda-admin-td'),
                    )
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'shapedimage' => array(
        'shortcode'     => 'shapedimage',
        'title'         => __('Shaped Image', 'lambda-admin-td'),
        'desc'          => __('Displays an image that is clipped to a shape.', 'lambda-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Image', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Image Source', 'lambda-admin-td'),
                        'id'      => 'image',
                        'type'    => 'upload',
                        'store'   => 'id',
                        'default' => '',
                        'desc'    => __('Choose an image to use.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Image size', 'lambda-admin-td'),
                        'desc'    => __('Choose the size that the image will have', 'lambda-admin-td'),
                        'id'      => 'shape_size',
                        'type'    => 'select',
                        'default' => 'medium',
                        'admin_label' => true,
                        'options' => array(
                            'normal' => __('Normal', 'lambda-admin-td'),
                            'mini'   => __('Mini', 'lambda-admin-td'),
                            'small'  => __('Small', 'lambda-admin-td'),
                            'medium' => __('Medium', 'lambda-admin-td'),
                            'big'    => __('Big', 'lambda-admin-td'),
                            'huge'   => __('Huge', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Shape', 'lambda-admin-td'),
                        'desc'    => __('Choose if the image will be rounded or not', 'lambda-admin-td'),
                        'id'      => 'shape',
                        'type'    => 'select',
                        'default' => 'round',
                        'options'    => array(
                            'square' => __('Square', 'lambda-admin-td'),
                            'round'  => __('Circle', 'lambda-admin-td'),
                        )
                    ),
                    array(
                        'name'    => __('Hover Animation', 'lambda-admin-td'),
                        'desc'    => __('Choose a hover animation', 'lambda-admin-td'),
                        'id'      => 'animation',
                        'type'    => 'select',
                        'default' => 'none',
                        'options' => include OXY_THEME_DIR . 'inc/options/global-options/animations.php'
                    ),
                    array(
                        'name'    => __('Open In Magnific Popup', 'lambda-admin-td'),
                        'desc'    => __('Open the original image in magnific on click (overrides link option)', 'lambda-admin-td'),
                        'id'      => 'magnific',
                        'type'    => 'select',
                        'default' => 'off',
                        'options' => array(
                            'on'    => __('On', 'lambda-admin-td'),
                            'off'   => __('Off', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Image Alt', 'lambda-admin-td'),
                        'id'      => 'alt',
                        'type'    => 'text',
                        'default' => '',
                        'desc'    => __('Place the alt of the image here', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Link', 'lambda-admin-td'),
                        'id'      => 'link',
                        'type'    => 'text',
                        'default' => '',
                        'desc'    => __('Place a link here', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Open Links In', 'lambda-admin-td'),
                        'id'      => 'link_target',
                        'type'    => 'select',
                        'default' => '_self',
                        'options' => array(
                            '_self'   => __('Same page as it was clicked ', 'lambda-admin-td'),
                            '_blank'  => __('Open in new window/tab', 'lambda-admin-td'),
                        ),
                        'desc'    => __('Where the link will open.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'      => __('Hover Grid', 'lambda-admin-td'),
                        'desc'      => __('Adds an overlay pattern image when you hover over the image.', 'lambda-admin-td'),
                        'id'        => 'overlay_grid',
                        'type'      => 'slider',
                        'default'   => '0',
                        'attr'      => array(
                            'max'       => 100,
                            'min'       => 0,
                            'step'      => 10,
                        )
                    ),
                    array(
                        'name'      => __('Background Colour', 'lambda-admin-td'),
                        'desc'      => __('Set the colour shape background (will be seen if transparant images are used)', 'lambda-admin-td'),
                        'id'        => 'background_colour',
                        'type'      => 'colour',
                        'format'    => 'rgba',
                        'attr'      => array(
                            'class' => 'allow-empty'
                        ),
                        'default'   => ''
                    )
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'featuredicon' => array(
        'shortcode'     => 'featuredicon',
        'title'         => __('Featured Icon', 'lambda-admin-td'),
        'desc'          => __('Creates a shape with an icon in the middle.', 'lambda-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Icon', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Icon', 'lambda-admin-td'),
                        'id'      => 'icon',
                        'type'    => 'select',
                        'options' => include OXY_THEME_DIR . 'inc/options/global-options/icons.php',
                        'default' => 'glass',
                        'admin_label' => true,
                        'desc'    => __('Choose an icon to use in your featured icon', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Featured Icon Size', 'lambda-admin-td'),
                        'desc'    => __('Choose the size that the image will have', 'lambda-admin-td'),
                        'id'      => 'shape_size',
                        'type'    => 'select',
                        'default' => 'medium',
                        'admin_label' => true,
                        'options' => array(
                            'normal' => __('Normal', 'lambda-admin-td'),
                            'mini'   => __('Mini', 'lambda-admin-td'),
                            'small'  => __('Small', 'lambda-admin-td'),
                            'medium' => __('Medium', 'lambda-admin-td'),
                            'big'    => __('Big', 'lambda-admin-td'),
                            'huge'   => __('Huge', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'        => __('Shape', 'lambda-admin-td'),
                        'desc'        => __('Choose if the image will be roundrd or not', 'lambda-admin-td'),
                        'id'          => 'shape',
                        'type'        => 'select',
                        'default'     => 'round',
                        'admin_label' => true,
                        'options'     => array(
                            'rect'   => __('Rectangle', 'lambda-admin-td'),
                            'square' => __('Square', 'lambda-admin-td'),
                            'round'  => __('Circle', 'lambda-admin-td'),
                        )
                    ),
                    array(
                        'name'    => __('Icon Link', 'lambda-admin-td'),
                        'desc'    => __('Make the icon link to a web url.', 'lambda-admin-td'),
                        'id'      => 'link',
                        'type'    => 'text',
                        'default' => '',
                    ),
                    array(
                        'name'    => __('Hover Animation', 'lambda-admin-td'),
                        'desc'    => __('Choose an icon animation', 'lambda-admin-td'),
                        'id'      => 'animation',
                        'type'    => 'select',
                        'default' => '',
                        'options' => include OXY_THEME_DIR . 'inc/options/global-options/animations.php'
                    ),
                    array(
                        'name'      => __('Background Grid', 'lambda-admin-td'),
                        'desc'      => __('Adds an overlay pattern to the shape background.', 'lambda-admin-td'),
                        'id'        => 'overlay_grid',
                        'type'      => 'slider',
                        'default'   => '0',
                        'attr'      => array(
                            'max'       => 100,
                            'min'       => 0,
                            'step'      => 10,
                        )
                    ),
                    array(
                        'name'      => __('Icon Colour', 'lambda-admin-td'),
                        'desc'      => __('Set the colour of the icon', 'lambda-admin-td'),
                        'id'        => 'icon_color',
                        'type'      => 'colour',
                        'default'   => '',
                        'format'    => 'rgba',
                        'attr'      => array(
                            'class' => 'allow-empty'
                        )

                    ),
                    array(
                        'name'      => __('Background Colour', 'lambda-admin-td'),
                        'desc'      => __('Set the colour shape background.', 'lambda-admin-td'),
                        'id'        => 'background_color',
                        'type'      => 'colour',
                        'default'   => '',
                        'format'    => 'rgba',
                        'attr'      => array(
                            'class' => 'allow-empty'
                        )

                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'icon' => array(
        'shortcode'   => 'icon',
        'title'       => __('Icon', 'lambda-admin-td'),
        'desc'        => __('Displays an icon.', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => 'General',
                'fields'  => array(
                    array(
                        'name'    => __('Font Size', 'lambda-admin-td'),
                        'desc'    => __('Size of font to use for icon ( set to 0 to inhertit font size from container )', 'lambda-admin-td'),
                        'id'      => 'size',
                        'type'    => 'slider',
                        'default' => '16',
                        'attr'    => array(
                            'max'  => 48,
                            'min'  => 0,
                            'step' => 1
                        )
                    ),
                )
            ),
            array(
                'title' => __('Text', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/text-color.php'
            ),
            array(
                'title'   => 'Icon',
                'fields'  => array(
                    array(
                        'name'    => __('Icon', 'lambda-admin-td'),
                        'desc'    => __('Type of button to display', 'lambda-admin-td'),
                        'id'      => 'content',
                        'type'    => 'select',
                        'options' => include OXY_THEME_DIR . 'inc/options/global-options/icons.php',
                        'default' => 'fa fa-glass',
                        'admin_label' => true
                    )
                ),
            ),
            array(
                'title' => __('Responsive', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/responsive.php'
            )
        ),
    ),
    'button' =>  array(
        'shortcode'   => 'button',
        'title'       => __('Button', 'lambda-admin-td'),
        'desc'        => __('Creates a fancy call to action button with or without an icon.', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => 'General',
                'fields'  => array(
                    array(
                        'name'    => __('Button type', 'lambda-admin-td'),
                        'desc'    => __('Type of button to display', 'lambda-admin-td'),
                        'id'      => 'type',
                        'type'    => 'select',
                        'default' => 'default',
                        'admin_label' => true,
                        'options' => array(
                            'default' => __('Default', 'lambda-admin-td'),
                            'primary' => __('Primary', 'lambda-admin-td'),
                            'info'    => __('Info', 'lambda-admin-td'),
                            'success' => __('Success', 'lambda-admin-td'),
                            'warning' => __('Warning', 'lambda-admin-td'),
                            'danger'  => __('Danger', 'lambda-admin-td'),
                            'link'    => __('Link', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Button size', 'lambda-admin-td'),
                        'desc'    => __('Size of button to display', 'lambda-admin-td'),
                        'id'      => 'size',
                        'type'    => 'select',
                        'default' => 'normal',
                        'options' => array(
                            'normal'      => __('Default', 'lambda-admin-td'),
                            'lg' => __('Large', 'lambda-admin-td'),
                            'sm'      => __('Small', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Text', 'lambda-admin-td'),
                        'id'      => 'label',
                        'type'    => 'text',
                        'admin_label' => true,
                        'default' => __('My button', 'lambda-admin-td'),
                        'desc'    => __('Add a label to the button', 'lambda-admin-td'),
                    ),
                    array(
                        'name'        => __('Open Modal', 'lambda-admin-td'),
                        'desc'        => __('Select the modal to open on click(overrides the link option)', 'lambda-admin-td'),
                        'id'          => 'modal',
                        'type'        => 'select',
                        'default'     => '',
                        'blank'       => __('None', 'lambda-admin-td'),
                        'options'     => 'custom_post_id',
                        'post_type'   => 'oxy_modal',
                    ),
                    array(
                        'name'    => __('Link', 'lambda-admin-td'),
                        'id'      => 'link',
                        'type'    => 'text',
                        'default' => '',
                        'desc'    => __('Where the button links to', 'lambda-admin-td'),
                    ),
                )
            ),
            array(
                'title'   => 'Advanced',
                'fields'  => array(
                    array(
                        'name'    => __('Open Link In', 'lambda-admin-td'),
                        'id'      => 'link_open',
                        'type'    => 'select',
                        'default' => '_self',
                        'options' => array(
                            '_self'   => __('Same page as it was clicked ', 'lambda-admin-td'),
                            '_blank'  => __('Open in new window/tab', 'lambda-admin-td'),
                            '_parent' => __('Open the linked document in the parent frameset', 'lambda-admin-td'),
                            '_top'    => __('Open the linked document in the full body of the window', 'lambda-admin-td')
                        ),
                        'desc'    => __('Where the button link opens to', 'lambda-admin-td'),
                    ),
                )
            ),
            array(
                'title'   => 'Icon',
                'fields'  => array(
                    array(
                        'name'    => __('Icon Position', 'lambda-admin-td'),
                        'desc'    => __('Which side of the button to show the icon.', 'lambda-admin-td'),
                        'id'      => 'icon_position',
                        'type'    => 'select',
                        'default' => 'left',
                        'options' => array(
                            'left'  => __('Left', 'lambda-admin-td'),
                            'right' => __('Right', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Icon Animation', 'lambda-admin-td'),
                        'desc'    => __('Choose an icon animation', 'lambda-admin-td'),
                        'id'      => 'animation',
                        'type'    => 'select',
                        'default' => 'none',
                        'options' => include OXY_THEME_DIR . 'inc/options/global-options/animations.php'
                    ),
                    array(
                        'name'    => __('Icon', 'lambda-admin-td'),
                        'desc'    => __('Icon to display', 'lambda-admin-td'),
                        'id'      => 'icon',
                        'admin_label' => true,
                        'type'    => 'select',
                        'options' => include OXY_THEME_DIR . 'inc/options/global-options/icons.php',
                        'default' => ''
                    ),
                    array(
                        'id'        => 'override_bg',
                        'name'      => __('Override Background Color', 'lambda-admin-td'),
                        'desc'      => __('Sets custom background color for the button', 'lambda-admin-td'),
                        'type'      => 'colour',
                        'default'   => '',
                        'format'    => 'rgba',
                        'attr'      => array(
                            'class' => 'allow-empty'
                        )
                    ),
                ),
            ),
            array(
                'title' => __('Text', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/text-color.php'
            ),
            array(
                'fields'  => array(
                    array(
                        'name'    => __('Margin Left', 'lambda-admin-td'),
                        'desc'    => __('Amount of space to add to the left of this element.', 'lambda-admin-td'),
                        'id'      => 'margin_left',
                        'type' => 'slider',
                        'default'   => '0',
                        'attr'      => array(
                            'max'       => 300,
                            'min'       => 0,
                            'step'      => 10,
                        )
                    ),
                    array(
                        'name'    => __('Margin Right', 'lambda-admin-td'),
                        'desc'    => __('Amount of space to add to the right of this element.', 'lambda-admin-td'),
                        'id'      => 'margin_right',
                        'type' => 'slider',
                        'default'   => '0',
                        'attr'      => array(
                            'max'       => 300,
                            'min'       => 0,
                            'step'      => 10,
                        )
                    )
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            ),
        ),
    ),
    'vc_jumbotron' => array(
        'shortcode'   => 'vc_jumbotron',
        'title'       => __('Jumbotron', 'lambda-admin-td'),
        'desc'          => __('Creates a Jumbotron bootstrap component.', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => __('General', 'lambda-admin-td'),
                'fields'  => array(
                    array(
                        'name'    => __('Title', 'lambda-admin-td'),
                        'id'      => 'title',
                        'type'    => 'text',
                        'holder'  => 'h1',
                        'default' => __('', 'lambda-admin-td'),
                        'desc'    => __('The title of the jumbotron', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Main Text', 'lambda-admin-td'),
                        'id'      => 'content',
                        'type'    => 'textarea_html',
                        'default' => __('This is a simple hero unit.', 'lambda-admin-td'),
                        'desc'    => __('Main text that will appear in the jumbotron', 'lambda-admin-td'),
                    )
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        ),
    ),
    'vc_message' => array(
        'shortcode'   => 'vc_message',
        'title'       => __('Alert', 'lambda-admin-td'),
        'desc'          => __('Creates a Bootstrap Alert box.', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => __('General', 'lambda-admin-td'),
                'fields'  => array(
                    array(
                        'name'    => __('Alert type', 'lambda-admin-td'),
                        'desc'    => __('Type of alert to display', 'lambda-admin-td'),
                        'id'      => 'color',
                        'type'    => 'select',
                        'default' => 'alert-success',
                        'options' => array(
                            'alert-success' => __('Success', 'lambda-admin-td'),
                            'alert-info'    => __('Information', 'lambda-admin-td'),
                            'alert-warning' => __('Warning', 'lambda-admin-td'),
                            'alert-danger'  => __('Danger', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Title', 'lambda-admin-td'),
                        'id'      => 'title',
                        'type'    => 'text',
                        'holder'  => 'h2',
                        'default' => __('Watch Out!', 'lambda-admin-td'),
                        'desc'    => __('The bold text that appears first in the alert', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Main Text', 'lambda-admin-td'),
                        'id'      => 'content',
                        'type'    => 'text',
                        'holder'  => 'div',
                        'default' => __('Change a few things up and try submitting again.', 'lambda-admin-td'),
                        'desc'    => __('Main text that will appear in the alert box', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Dismissable', 'lambda-admin-td'),
                        'id'      => 'dismissable',
                        'type'    => 'select',
                        'default' => 'false',
                        'desc'    => __('Defines if the alert can be removed using an x in the corner.', 'lambda-admin-td'),
                        'options' => array(
                            'true'  => __('Closable', 'lambda-admin-td'),
                            'false' => __('Not Closable', 'lambda-admin-td'),
                        ),
                    )
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        ),
    ),
    'carousel' => array(
        'shortcode'     => 'carousel',
        'title'         => __('Carousel', 'lambda-admin-td'),
        'desc'          => __('Adds a Carousel slideshow to the page.', 'lambda-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Carousel', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Choose a slideshow', 'lambda-admin-td'),
                        'desc'    => __('Populate your slider with one of the slideshows you created', 'lambda-admin-td'),
                        'id'      => 'carousel',
                        'default' =>  '',
                        'type'    => 'select',
                        'options' => 'slideshow',
                    ),
                    array(
                        'name'    => __('Carousel Count', 'lambda-admin-td'),
                        'desc'    => __('Number of slides to show, set to 0 to show all', 'lambda-admin-td'),
                        'id'      => 'count',
                        'type'    => 'slider',
                        'default' => '0',
                        'admin_label' => true,
                        'attr'    => array(
                            'max'  => 30,
                            'min'  => 0,
                            'step' => 1
                        )
                    ),
                    array(
                        'name'      => __('Show navigation arrows', 'lambda-admin-td'),
                        'id'        => 'directionnav',
                        'type'      => 'select',
                        'default'   =>  'show',
                        'options' => array(
                            'show' => __('Show', 'lambda-admin-td'),
                            'hide' => __('Hide', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Show controls', 'lambda-admin-td'),
                        'id'        => 'showcontrols',
                        'type'      => 'select',
                        'default'   =>  'show',
                        'options' => array(
                            'show' => __('Show', 'lambda-admin-td'),
                            'hide' => __('Hide', 'lambda-admin-td'),
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Captions', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'      => __('Show Captions', 'lambda-admin-td'),
                        'id'        => 'captions',
                        'type'      => 'select',
                        'default'   =>  'show',
                        'options' => array(
                            'show' => __('Show', 'lambda-admin-td'),
                            'hide' => __('Hide', 'lambda-admin-td'),
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'panel' => array(
        'shortcode' => 'panel',
        'title'     => __('Panel', 'lambda-admin-td'),
        'desc'      => __('Creates a Bootstrap Panel with a title and some content.', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => __('General', 'lambda-admin-td'),
                'fields'  => array(
                    array(
                        'name'    => __('Title', 'lambda-admin-td'),
                        'id'      => 'title',
                        'type'    => 'text',
                        'default' => '',
                        'desc'    => __('The title of the panel.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Panel Style', 'lambda-admin-td'),
                        'desc'    => __('Style of panel to display', 'lambda-admin-td'),
                        'id'      => 'style',
                        'type'    => 'select',
                        'default' => 'panel-default',
                        'options' => array(
                            'panel-default' => __('Default', 'lambda-admin-td'),
                            'panel-primary'  => __('Primary', 'lambda-admin-td'),
                            'panel-info'     => __('Info', 'lambda-admin-td'),
                            'panel-success'  => __('Success', 'lambda-admin-td'),
                            'panel-warning'  => __('Warning', 'lambda-admin-td'),
                            'panel-danger'   => __('Danger', 'lambda-admin-td'),
                        )
                    ),
                    array(
                        'name'      => __('Panel Background Color', 'lambda-admin-td'),
                        'desc'      => __('Set the background color of panel content', 'lambda-admin-td'),
                        'id'        => 'background_colour',
                        'type'      => 'colour',
                        'format'    => 'rgba',
                        'default'   => '',
                        'attr'      => array(
                            'class' => 'allow-empty'
                        )
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        ),
    ),
    'progress' =>    array(
        'shortcode'   => 'progress',
        'title'       => __('Progress Bar', 'lambda-admin-td'),
        'desc'        => __('Creates a Bootstrap progress bar with a % value.', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'    => __('Percentage', 'lambda-admin-td'),
                        'desc'    => __('Percentage of the progress bar', 'lambda-admin-td'),
                        'id'      => 'percentage',
                        'type'    => 'slider',
                        'default' => '50',
                        'attr'    => array(
                            'max'  => 100,
                            'min'  => 1,
                            'step' => 1
                        )
                    ),
                    array(
                        'name'    => __('Progress Bar Text', 'lambda-admin-td'),
                        'desc'    => __('Text to be displayed on the progress bar', 'lambda-admin-td'),
                        'id'      => 'progress_text',
                        'type'    => 'text',
                        'holder'  => 'h3',
                        'default' => ''
                    ),
                    array(
                        'name'    => __('Bar Type', 'lambda-admin-td'),
                        'desc'    => __('Type of bar to display', 'lambda-admin-td'),
                        'id'      => 'type',
                        'type'    => 'select',
                        'default' => 'progress',
                        'options' => array(
                            'progress'                        => __('Normal', 'lambda-admin-td'),
                            'progress progress-striped'       => __('Striped', 'lambda-admin-td'),
                            'progress progress-striped active'=> __('Animated', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Bar Style', 'lambda-admin-td'),
                        'desc'    => __('Style of bar to display', 'lambda-admin-td'),
                        'id'      => 'style',
                        'type'    => 'select',
                        'default' => 'progress-bar-info',
                        'options' => array(
                            'progress-bar-primary'  => __('Primary', 'lambda-admin-td'),
                            'progress-bar-info'     => __('Info', 'lambda-admin-td'),
                            'progress-bar-success'  => __('Success', 'lambda-admin-td'),
                            'progress-bar-warning'  => __('Warning', 'lambda-admin-td'),
                            'progress-bar-danger'   => __('Danger', 'lambda-admin-td'),
                        ),
                    ),
                ),
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        ),
    ),
    'lead' => array(
        'shortcode'   => 'lead',
        'title'       => __('Lead Paragraph', 'lambda-admin-td'),
        'desc'        => __('Adds a lead paragraph, with slightly larger and bolder text.', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'      => __('Text Alignment', 'lambda-admin-td'),
                        'id'        => 'align',
                        'type'      => 'select',
                        'default'   => 'center',
                        'options' => array(
                            'default'   => __('Default alignment', 'lambda-admin-td'),
                            'left'   => __('Left', 'lambda-admin-td'),
                            'center' => __('Center', 'lambda-admin-td'),
                            'right'  => __('Right', 'lambda-admin-td'),
                            'justify'  => __('Justify', 'lambda-admin-td'),
                        ),
                        'desc'    => __('Sets the text alignment of the lead text.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'      => __('Lead Text', 'lambda-admin-td'),
                        'holder'    => 'p',
                        'id'        => 'content',
                        'type'      => 'textarea',
                        'default'   => '',
                        'desc'    => __('Text to show in the lead text paragraph.', 'lambda-admin-td'),
                    ),
                )
            ),
            array(
                'title' => __('Text', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/text-color.php'
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'magnific_popup_link' => array(
        'shortcode'     => 'magnific_popup_link',
        'title'         => __('Magnific Popup Link', 'lambda-admin-td'),
        'desc'          => __('A popup used for images and videos.', 'lambda-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('General', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'      => __('Link', 'lambda-admin-td'),
                        'desc'      => __('Set the text to use as a link', 'lambda-admin-td'),
                        'id'        => 'content',
                        'type'      => 'text',
                        'default'   =>  ''
                    ),
                    array(
                        'name'      => __('Link Color', 'lambda-admin-td'),
                        'desc'      => __('Set the color of the link', 'lambda-admin-td'),
                        'id'        => 'text_color',
                        'type'      => 'select',
                        'options'   => array(
                            'text-normal' => __('Normal Color', 'lambda-admin-td'),
                            'text-light'  => __('Light Color', 'lambda-admin-td'),
                        ),
                        'default'   => 'text-normal'
                    ),
                    array(
                        'name'      => __('Display style', 'lambda-admin-td'),
                        'desc'      => __('Set the style that content will be displayed', 'lambda-admin-td'),
                        'id'        => 'display_style',
                        'type'      => 'select',
                        'options'   => array(
                            'block' => __('Block', 'lambda-admin-td'),
                            'inline'  => __('Inline', 'lambda-admin-td'),
                        ),
                        'default'   => 'inline'
                    ),
                    array(
                        'name'      => __('Src URL', 'lambda-admin-td'),
                        'desc'      => __('Set the source of video(Youtube or Vimeo) or image', 'lambda-admin-td'),
                        'id'        => 'src_url',
                        'type'      => 'text',
                        'default'   =>  '',
                    )
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'blockquote' => array(
        'shortcode'   => 'blockquote',
        'title'       => __('Blockquote', 'lambda-admin-td'),
        'desc'        => __('Creates a quotation.', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'      => __('Text Alignment', 'lambda-admin-td'),
                        'id'        => 'align',
                        'type'      => 'select',
                        'default'   => 'left',
                        'options' => array(
                            'default'   => __('Default alignment', 'lambda-admin-td'),
                            'left'   => __('Left', 'lambda-admin-td'),
                            'right'  => __('Right', 'lambda-admin-td'),
                            'center'  => __('Center', 'lambda-admin-td'),
                            'justify'  => __('Justify', 'lambda-admin-td')
                        ),
                        'desc'    => __('Sets the text alignment of blockquote.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'      => __('Quote Text', 'lambda-admin-td'),
                        'holder'    => 'p',
                        'id'        => 'content',
                        'type'      => 'textarea',
                        'default'   => '',
                        'desc'    => __('Text to show in the quote.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Who?', 'lambda-admin-td'),
                        'id'      => 'who',
                        'type'    => 'text',
                        'default' => '',
                        'desc'    => __('Who said the quote.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Citation', 'lambda-admin-td'),
                        'id'      => 'cite',
                        'type'    => 'text',
                        'default' => '',
                        'desc'    => __('Citation of the quote (i.e the source).', 'lambda-admin-td'),
                    ),
                )
            ),
            array(
                'title' => __('Text', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/text-color.php'
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'code' => array(
        'shortcode'   => 'code',
        'title'       => __('Code', 'lambda-admin-td'),
        'desc'        => __('For use adding source code to a page.', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'      => __('Source Code', 'lambda-admin-td'),
                        'holder'    => 'p',
                        'id'        => 'content',
                        'type'      => 'textarea',
                        'default'   => '',
                        'desc'    => __('Source code to display.', 'lambda-admin-td'),
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'countdown' => array(
        'shortcode'   => 'countdown',
        'title'       => __('Countdown Timer', 'lambda-admin-td'),
        'desc'        => __('Adds a countdown timer for coming soon pages.', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'      => __('Countdown Date', 'lambda-admin-td'),
                        'id'        => 'date',
                        'type'      => 'text',
                        'default'   => '',
                        'admin_label' => true,
                        'desc'    => __('Date to countdown to in the format YYYY/MM/DD HH:MM.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Number Font Size', 'lambda-admin-td'),
                        'desc'    => __('Choose size of the font to use for the countdown numbers.', 'lambda-admin-td'),
                        'id'      => 'number_size',
                        'type'    => 'select',
                        'options' => array(
                            'normal' => __('Normal', 'lambda-admin-td'),
                            'super'  => __('Super (60px)', 'lambda-admin-td'),
                            'hyper'  => __('Hyper (96px)', 'lambda-admin-td'),
                        ),
                        'default' => 'normal',
                    ),
                    array(
                        'name'    => __('Number Font Weight', 'lambda-admin-td'),
                        'desc'    => __('Choose weight of the font of the countdown numbers.', 'lambda-admin-td'),
                        'id'      => 'number_weight',
                        'type'    => 'select',
                        'options' => array(
                            'regular'  => __('Regular', 'lambda-admin-td'),
                            'black'    => __('Black', 'lambda-admin-td'),
                            'bold'     => __('Bold', 'lambda-admin-td'),
                            'light'    => __('Light', 'lambda-admin-td'),
                            'hairline' => __('Hairline', 'lambda-admin-td'),
                        ),
                        'default' => 'regular',
                    ),
                )
            ),
            array(
                'title' => __('Text', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/text-color.php'
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'vc_scroll' => array(
        'shortcode'   => 'vc_scroll',
        'title'       => __('Scroll to button', 'lambda-admin-td'),
        'desc'          => __('Creates a link for scrolling to other places in your page.', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => __('General', 'lambda-admin-td'),
                'fields'  => array(
                    array(
                        'name'    => __('Link', 'lambda-admin-td'),
                        'id'      => 'link',
                        'type'    => 'text',
                        'holder'  => 'a',
                        'default' => __('#id', 'lambda-admin-td'),
                        'desc'    => __('The link for the scroll button', 'lambda-admin-td'),
                    ),
                    array(
                        'name'      => __('Arrow for the scroll to link', 'lambda-admin-td'),
                        'id'        => 'icon',
                        'type'      => 'select',
                        'default'   =>  '',
                        'options'   => include OXY_THEME_DIR . 'inc/options/global-options/icons.php',
                    ),
                    array(
                        'name'      => __('Icon Color', 'lambda-admin-td'),
                        'desc'      => __('Set the color of the icon', 'lambda-admin-td'),
                        'id'        => 'icon_color',
                        'type'      => 'select',
                        'options'   => array(
                            'text-normal' => __('Normal Color', 'lambda-admin-td'),
                            'text-light'  => __('Light Color', 'lambda-admin-td'),
                        ),
                        'default'   => 'text-normal'
                    ),
                    array(
                        'name'    => __('Place to the bottom', 'lambda-admin-td'),
                        'desc'    => __('Place the button to the bottom of the section', 'lambda-admin-td'),
                        'id'      => 'place_bottom',
                        'default' => '',
                        'type' => 'select',
                        'options' => array(
                            'on'  => __('Yes', 'lambda-admin-td'),
                            '' => __('No', 'lambda-admin-td')
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        ),
    ),
    'tags' => array(
        'shortcode'   => 'tags',
        'title'       => __('Tags', 'lambda-admin-td'),
        'desc'        => __('Adds a list of tags', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'    => __('Tag List', 'lambda-admin-td'),
                        'id'      => 'tags',
                        'type'    => 'text',
                        'admin_label' => true,
                        'default' => __('Web Design, Logo Design, CSS Animations', 'lambda-admin-td'),
                        'desc'    => __('Comma seperated values that will be inserted in the tag list', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Size', 'lambda-admin-td'),
                        'desc'    => __('Choose size of the tag list.', 'lambda-admin-td'),
                        'id'      => 'size',
                        'type'    => 'select',
                        'options' => array(
                            'normal' => __('Normal', 'lambda-admin-td'),
                            'lg'     => __('Large', 'lambda-admin-td'),
                            'sm'     => __('Mini', 'lambda-admin-td'),
                        ),
                        'default' => 'normal',
                    ),
                    array(
                        'name'    => __('Style', 'lambda-admin-td'),
                        'desc'    => __('Choose the style of the tag list.', 'lambda-admin-td'),
                        'id'      => 'style',
                        'default' => 'tag-list',
                        'type' => 'select',
                        'options' => array(
                            'tag-list'        => __('Block', 'lambda-admin-td'),
                            'tag-list-inline' => __('Inline-Block', 'lambda-admin-td'),
                        ),
                    ),
                ),
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        ),
    ),
    'skills' => array(
        'shortcode'   => 'skills',
        'title'       => __('Skills', 'lambda-admin-td'),
        'desc'        => __('Adds a list of skills', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'    => __('Skill List', 'lambda-admin-td'),
                        'id'      => 'skills',
                        'type'    => 'text',
                        'admin_label' => true,
                        'default' => __('Web Design, Logo Design, CSS Animations', 'lambda-admin-td'),
                        'desc'    => __('Comma seperated values that will be inserted in the skills list', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Size', 'lambda-admin-td'),
                        'desc'    => __('Choose size of the skill list.', 'lambda-admin-td'),
                        'id'      => 'size',
                        'type'    => 'select',
                        'options' => array(
                            '' => __('Normal', 'lambda-admin-td'),
                            'lead'     => __('Large', 'lambda-admin-td')
                        ),
                        'default' => 'normal',
                    ),
                ),
            ),
            array(
                'title' => __('Text', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/text-color.php'
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        ),
    ),
    'vc_video' => array(
        'shortcode'     => 'vc_video',
        'title'         => __('Video Player', 'lambda-admin-td'),
        'desc'          => __('Adds a video player.', 'lambda-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Video Options', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'      => __('Video URL', 'lambda-admin-td'),
                        'id'        => 'src',
                        'type'      => 'text',
                        'default'   =>  '',
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'vc_column_text' => array(
        'shortcode'     => 'vc_column_text',
        'title'         => __('Text Block', 'lambda-admin-td'),
        'desc'          => __('A block of text with WYSIWYG editor.', 'lambda-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Text Options', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'      => __('Text', 'lambda-admin-td'),
                        'id'        => 'content',
                        'type'      => 'textarea_html',
                        'holder'    => 'div',
                        'default'   =>  '<p>I am text block. Click edit button to change this text.</p>',
                    ),
                    array(
                        'name'    => __('Text Columns', 'lambda-admin-td'),
                        'desc'    => __('Css text columns.', 'lambda-admin-td'),
                        'id'      => 'text_columns',
                        'type'    => 'select',
                        'default' => 'col-text-1',
                        'options' => array(
                            'col-text-1' => __('1 Column', 'lambda-admin-td'),
                            'col-text-2' => __('2 Column', 'lambda-admin-td'),
                            'col-text-3' => __('3 Column', 'lambda-admin-td'),
                            'col-text-4' => __('4 Column', 'lambda-admin-td'),
                            'col-text-5' => __('5 Column', 'lambda-admin-td'),
                            'col-text-6' => __('6 Column', 'lambda-admin-td'),
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Text', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/text-color.php'
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'vc_column_slab_text' => array(
        'shortcode'     => 'vc_column_slab_text',
        'title'         => __('Slab Text', 'lambda-admin-td'),
        'desc'          => __('A block of slab text with WYSIWYG editor.', 'lambda-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Text Options', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'      => __('Text', 'lambda-admin-td'),
                        'desc'      => __('Hit Enter for new line, only in the Visual tab.', 'lambda-admin-td'),
                        'id'        => 'content',
                        'type'      => 'textarea_html',
                        'holder'    => 'div',
                        'default'   =>  'I am text block. Click edit button to change this text.',
                    ),
                    array(
                        'name'    => __('Header Type', 'lambda-admin-td'),
                        'desc'    => __('Type of heading to use for text.', 'lambda-admin-td'),
                        'id'      => 'slab_header',
                        'type'    => 'select',
                        'default' => 'h3',
                        'options' => array(
                            'h1' => __('H1', 'lambda-admin-td'),
                            'h2' => __('H2', 'lambda-admin-td'),
                            'h3' => __('H3', 'lambda-admin-td'),
                            'h4' => __('H4', 'lambda-admin-td'),
                            'h5' => __('H5', 'lambda-admin-td'),
                            'h6' => __('H6', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Font Weight', 'lambda-admin-td'),
                        'desc'    => __('Choose weight for the font.', 'lambda-admin-td'),
                        'id'      => 'slab_weight',
                        'type'    => 'select',
                        'options' => array(
                            'regular'  => __('Regular', 'lambda-admin-td'),
                            'black'    => __('Black', 'lambda-admin-td'),
                            'bold'     => __('Bold', 'lambda-admin-td'),
                            'light'    => __('Light', 'lambda-admin-td'),
                            'hairline' => __('Hairline', 'lambda-admin-td'),
                        ),
                        'default' => 'regular',
                    )
                )
            ),
            array(
                'title' => __('Text', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/text-color.php'
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'sharing' => array(
        'shortcode'   => 'sharing',
        'title'       => __('Social Sharing Icons', 'lambda-admin-td'),
        'desc'        => __('Adds Social Sharing icons to your pages', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => __('General', 'lambda-admin-td'),
                'fields'  => array(
                    array(
                        'name'      => __('Title', 'lambda-admin-td'),
                        'id'        => 'title',
                        'type'      => 'text',
                        'desc'      => __('Title that will appear above the social share icons.', 'lambda-admin-td'),
                        'default'   => '',
                    ),
                    array(
                        'name'      => __('Icons Color', 'lambda-admin-td'),
                        'desc'      => __('Set the color of icons', 'lambda-admin-td'),
                        'id'        => 'icons_color',
                        'type'      => 'select',
                        'options'   => array(
                            'text-normal' => __('Normal Text', 'lambda-admin-td'),
                            'text-light'  => __('Light Text', 'lambda-admin-td'),
                        ),
                        'default'   => 'text-normal'
                    ),
                    array(
                        'name'    => __('Social Networks', 'lambda-admin-td'),
                        'desc'    => __('Select which social networks you would like to share on.', 'lambda-admin-td'),
                        'id'      => 'social_networks',
                        'default' =>  'facebook,twitter,google,pinterest,linkedin',
                        'type'    => 'select',
                        'admin_label' => true,
                        'attr' => array(
                            'multiple' => '',
                            'style' => 'height:100px'
                        ),
                        'options' => array(
                            'facebook'  => __('Facebook', 'lambda-admin-td'),
                            'twitter'   => __('Twitter', 'lambda-admin-td'),
                            'google'    => __('Google+', 'lambda-admin-td'),
                            'pinterest' => __('Pinterest', 'lambda-admin-td'),
                            'linkedin'  => __('LinkedIn', 'lambda-admin-td'),
                            'vk'        => __('VK', 'lambda-admin-td'),
                        )
                    ),
                    array(
                        'name'    => __('Icon Size', 'lambda-admin-td'),
                        'desc'    => __('Size of the social icons.', 'lambda-admin-td'),
                        'id'      => 'icon_size',
                        'default' => 'sm',
                        'type' => 'select',
                        'options' => array(
                            'sm' => __('Small', 'lambda-admin-td'),
                            'lg' => __('Large', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Show Background', 'lambda-admin-td'),
                        'desc'    => __('Show a coloured background behind the social icon.', 'lambda-admin-td'),
                        'id'      => 'background_show',
                        'default' => 'background',
                        'type' => 'select',
                        'options' => array(
                            'background' => __('Show', 'lambda-admin-td'),
                            'simple'     => __('Hide', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('On Hover Background Color', 'lambda-admin-td'),
                        'desc'    => __('Change the background color behind the social icon on hover.', 'lambda-admin-td'),
                        'id'      => 'background_show_hover',
                        'default' => 'on',
                        'type' => 'select',
                        'options' => array(
                            'on' => __('On', 'lambda-admin-td'),
                            'off'     => __('Off', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Background Shape', 'lambda-admin-td'),
                        'desc'    => __('Shape of coloured background behind the social icon.', 'lambda-admin-td'),
                        'id'      => 'background_shape',
                        'default' => 'circle',
                        'type' => 'select',
                        'options' => array(
                            'circle' => __('Circle', 'lambda-admin-td'),
                            'rect'   => __('Square', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Background Shape Colour', 'lambda-admin-td'),
                        'desc'    => __('Colour of background behind the social icon.', 'lambda-admin-td'),
                        'id'      => 'background_colour',
                        'type' => 'colour',
                        'default' => '',
                        'format'  => 'rgba',
                        'attr'      => array(
                            'class' => 'allow-empty'
                        )
                    ),
                ),
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'socialicons' => array(
        'shortcode'   => 'socialicons',
        'title'       => __('Social Icons', 'lambda-admin-td'),
        'desc'        => __('Adds Social icons to your pages', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => __('General', 'lambda-admin-td'),
                'fields'  => array(
                    array(
                        'name'      => __('Title', 'lambda-admin-td'),
                        'id'        => 'title',
                        'type'      => 'text',
                        'desc'      => __('Title that will appear above the social icons.', 'lambda-admin-td'),
                        'default'   => '',
                    ),
                    array(
                        'name'      => __('Icons Color', 'lambda-admin-td'),
                        'desc'      => __('Set the color of the icons', 'lambda-admin-td'),
                        'id'        => 'icons_color',
                        'type'      => 'select',
                        'options'   => array(
                            'text-normal' => __('Normal Text', 'lambda-admin-td'),
                            'text-light'  => __('Light Text', 'lambda-admin-td'),
                        ),
                        'default'   => 'text-normal'
                    ),
                    array(
                        'name'    => __('Icon Size', 'lambda-admin-td'),
                        'desc'    => __('Size of the social icons.', 'lambda-admin-td'),
                        'id'      => 'icon_size',
                        'default' => 'sm',
                        'type' => 'select',
                        'options' => array(
                            'sm' => __('Small', 'lambda-admin-td'),
                            'lg' => __('Large', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Show Background', 'lambda-admin-td'),
                        'desc'    => __('Show a coloured background behind the social icon.', 'lambda-admin-td'),
                        'id'      => 'background_show',
                        'default' => 'background',
                        'type' => 'select',
                        'options' => array(
                            'background' => __('Show', 'lambda-admin-td'),
                            'simple'     => __('Hide', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Background Shape', 'lambda-admin-td'),
                        'desc'    => __('Shape of coloured background behind the social icon.', 'lambda-admin-td'),
                        'id'      => 'background_shape',
                        'default' => 'circle',
                        'type' => 'select',
                        'options' => array(
                            'circle' => __('Circle', 'lambda-admin-td'),
                            'rect'   => __('Square', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Background Shape Colour', 'lambda-admin-td'),
                        'desc'    => __('Colour of background behind the social icon.', 'lambda-admin-td'),
                        'id'      => 'background_colour',
                        'default' => '#82c9ed',
                        'type' => 'colour',
                    ),
                    array(
                        'name'    => __('Open Social Links In', 'lambda-admin-td'),
                        'id'      => 'link_target',
                        'type'    => 'select',
                        'default' => '_self',
                        'options' => array(
                            '_self'   => __('Same page as it was clicked ', 'lambda-admin-td'),
                            '_blank'  => __('Open in new window/tab', 'lambda-admin-td'),
                            '_parent' => __('Open the linked document in the parent frameset', 'lambda-admin-td'),
                            '_top'    => __('Open the linked document in the full body of the window', 'lambda-admin-td')
                        ),
                        'desc'    => __('Where the social links open to', 'lambda-admin-td'),
                    ),
                ),
            ),
            array(
                'title'     => __('Links', 'lambda-admin-td'),
                'fields'    => oxy_create_social_options(),
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'divider' => array(
        'shortcode'   => 'divider',
        'title'       => __('Divider', 'lambda-admin-td'),
        'desc'        => __('Adds space between elements.', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => __('General', 'lambda-admin-td'),
                'fields'  => array(
                    array(
                        'name'    => __('Visibility', 'lambda-admin-td'),
                        'desc'    => __('Toggles if the divider is visible or not.', 'lambda-admin-td'),
                        'id'      => 'visibility',
                        'default' => 'hidden',
                        'type'    => 'select',
                        'options' => array(
                            'visible' => __('Show', 'lambda-admin-td'),
                            'hidden' => __('Hide', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Background Colour', 'lambda-admin-td'),
                        'desc'    => __('Background colour of the divider if it is set to visible.', 'lambda-admin-td'),
                        'id'      => 'background_colour',
                        'default' => '#FFFFFF',
                        'type' => 'colour',
                    ),
                    array(
                        'name'      => __('Mobile Height ', 'lambda-admin-td'),
                        'desc'      => __('Height of divider on mobile displays (<768px).', 'lambda-admin-td'),
                        'id'        => 'xs_height',
                        'type'      => 'slider',
                        'default'   => '24',
                        'attr'      => array(
                            'max'       => 500,
                            'min'       => 0,
                            'step'      => 1,
                        )
                    ),
                    array(
                        'name'      => __('Tablet Height ', 'lambda-admin-td'),
                        'desc'      => __('Height of divider on tablet displays (>768px <992px).', 'lambda-admin-td'),
                        'id'        => 'sm_height',
                        'type'      => 'slider',
                        'default'   => '24',
                        'attr'      => array(
                            'max'       => 500,
                            'min'       => 0,
                            'step'      => 1,
                        )
                    ),
                    array(
                        'name'      => __('Desktop Height ', 'lambda-admin-td'),
                        'desc'      => __('Height of divider on desktop displays (>992px <1200px).', 'lambda-admin-td'),
                        'id'        => 'md_height',
                        'type'      => 'slider',
                        'default'   => '24',
                        'attr'      => array(
                            'max'       => 500,
                            'min'       => 0,
                            'step'      => 1,
                        )
                    ),
                    array(
                        'name'      => __('Large Desktop Height ', 'lambda-admin-td'),
                        'desc'      => __('Height of divider on large desktop displays (>1200px).', 'lambda-admin-td'),
                        'id'        => 'lg_height',
                        'type'      => 'slider',
                        'default'   => '24',
                        'attr'      => array(
                            'max'       => 500,
                            'min'       => 0,
                            'step'      => 1,
                        )
                    ),
                ),
            ),
            array(
                'title' => __('Responsive', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/responsive.php'
            )
        )
    ),
    'bordered_divider' => array(
        'shortcode'   => 'bordered_divider',
        'title'       => __('Bordered Divider', 'lambda-admin-td'),
        'desc'        => __('Adds a divider between elements.', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => __('General', 'lambda-admin-td'),
                'fields'  => array(
                    array(
                        'name'    => __('Color', 'lambda-admin-td'),
                        'desc'    => __('Color of the divider.', 'lambda-admin-td'),
                        'id'      => 'divider_color',
                        'type'    => 'colour',
                        'format'  => 'rgba',
                        'default'   => '',
                        'attr'      => array(
                            'class' => 'allow-empty'
                        )
                    ),
                    array(
                        'name'      => __('Height', 'lambda-admin-td'),
                        'desc'      => __('Height of divider.', 'lambda-admin-td'),
                        'id'        => 'divider_height',
                        'type'      => 'slider',
                        'default'   => '4',
                        'attr'      => array(
                            'max'       => 20,
                            'min'       => 1,
                            'step'      => 1,
                        )
                    ),
                    array(
                        'name'      => __('Width', 'lambda-admin-td'),
                        'desc'      => __('Width of divider.', 'lambda-admin-td'),
                        'id'        => 'divider_width',
                        'type'      => 'slider',
                        'default'   => '40',
                        'attr'      => array(
                            'max'       => 1000,
                            'min'       => 0,
                            'step'      => 5,
                        )
                    ),
                    array(
                        'name'      => __('Alignment', 'lambda-admin-td'),
                        'id'        => 'divider_align',
                        'type'      => 'select',
                        'default'   => 'divider-border-center',
                        'options' => array(
                            'divider-border-left'    => __('Left', 'lambda-admin-td'),
                            'divider-border-center'  => __('Center', 'lambda-admin-td'),
                            'divider-border-right'   => __('Right', 'lambda-admin-td'),
                        ),
                        'desc'    => __('Sets the alignment of the divider.', 'lambda-admin-td'),
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'ruler_divider' => array(
        'shortcode'     => 'ruler_divider',
        'title'         => __('Ruler Divider', 'lambda-admin-td'),
        'desc'          => __('A ruler that is used to divide content.', 'lambda-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => true,
        'sections'      => array(
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'chart' => array(
        'shortcode'     => 'chart',
        'title'         => __('Chart', 'lambda-admin-td'),
        'desc'          => __('Add a data chart to the page.', 'lambda-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Chart Options', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'      => __('Chart Type', 'lambda-admin-td'),
                        'desc'      => __('Choose from pie, doughnut, radar, polararea, bar, line', 'lambda-admin-td'),
                        'id'        => 'type',
                        'type'      => 'select',
                        'options'   => array(
                            'pie'       => __('PIE Chart', 'lambda-admin-td'),
                            'doughnut'  => __('Doughnut Chart', 'lambda-admin-td'),
                            'radar'     => __('Radar Chart', 'lambda-admin-td'),
                            'polararea' => __('Polar Area Chart', 'lambda-admin-td'),
                            'bar'       => __('Bar Chart', 'lambda-admin-td'),
                            'line'      => __('Line Chart', 'lambda-admin-td'),
                        ),
                        'admin_label' => true,
                        'default'   =>  'pie',
                    ),
                    array(
                        'name'      => __('Data', 'lambda-admin-td'),
                        'desc'      => __('Used for the pie, doughnut and radar charts.', 'lambda-admin-td'),
                        'id'        => 'data',
                        'type'      => 'textarea',
                        'default'   =>  '',
                    ),
                    array(
                        'name'      => __('Datasets', 'lambda-admin-td'),
                        'desc'      => __("Used for the bar, line, and radar charts,  the data for each 'set' is put in as before, but using the 'next' keyword to seperate each of the datasets.", 'lambda-admin-td'),
                        'id'        => 'datasets',
                        'type'      => 'textarea',
                        'default'   =>  '',
                    ),
                    array(
                        'name'      => __('Colours', 'lambda-admin-td'),
                        'desc'      => __("These should be put in in there HEX value only(as above). These are the default colors, there should be the same number of colours as data points, or datasets, but if you only got a few, or too many, don't worry the plugin will handle it.  (more practically if you don't want your chart to look like a rainbow, the plugin will cycle a set a colors for your data)", 'lambda-admin-td'),
                        'id'        => 'colors',
                        'type'      => 'textarea',
                        'default'   =>  '',
                    ),
                    array(
                        'name'      => __('Labels', 'lambda-admin-td'),
                        'desc'      => __('Used for the bar, line and polararea charts.', 'lambda-admin-td'),
                        'id'        => 'labels',
                        'type'      => 'textarea',
                        'default'   =>  '',
                    ),
                    array(
                        'name'      => __('Width', 'lambda-admin-td'),
                        'desc'      => __('This sets the width of the container for the chart, and should be the only size property you need to adjust.  Setting it as a % value will make the chart fluid / responsive, you can use any valid CSS measurement of value (em, px, %).', 'lambda-admin-td'),
                        'id'        => 'width',
                        'type'      => 'text',
                        'default'   =>  '70%',
                    ),
                    array(
                        'name'      => __('Height', 'lambda-admin-td'),
                        'desc'      => __('optional - the height will automatticaly be proportionate to the width, and you should not need to adjust this .', 'lambda-admin-td'),
                        'id'        => 'height',
                        'type'      => 'text',
                        'default'   =>  'auto',
                    ),
                    array(
                        'name'      => __('Canvas Width', 'lambda-admin-td'),
                        'desc'      => __('This sets the width of the container for the chart, and should be the only size property you need to adjust.  Setting it as a % value will make the chart fluid / responsive, you can use any valid CSS measurement of value (em, px, %).', 'lambda-admin-td'),
                        'id'        => 'canvaswidth',
                        'type'      => 'text',
                        'default'   =>  '625',
                    ),
                    array(
                        'name'      => __('Canvas Height', 'lambda-admin-td'),
                        'desc'      => __('This will be converted to px, only adjust this up or down if you experience rendering issues.', 'lambda-admin-td'),
                        'id'        => 'canvasheight',
                        'type'      => 'text',
                        'default'   =>  '625',
                    ),
                    array(
                        'name'      => __('Relative Width', 'lambda-admin-td'),
                        'desc'      => __('The width to height ratio', 'lambda-admin-td'),
                        'id'        => 'relativewidth',
                        'type'      => 'text',
                        'default'   =>  '1',
                    ),
                    array(
                        'name'      => __('Margin', 'lambda-admin-td'),
                        'desc'      => __('optional - use standard css syntax for the margin, defaults to 5px for top, bottom, left and right.', 'lambda-admin-td'),
                        'id'        => 'margin',
                        'type'      => 'text',
                        'default'   =>  '20px',
                    ),
                    array(
                        'name'      => __('Align', 'lambda-admin-td'),
                        'desc'      => __('optional - use one of the standard WordPress alignment classes alignleft, alignright, aligncenter.', 'lambda-admin-td'),
                        'id'        => 'align',
                        'type'      => 'text',
                        'default'   =>  '',
                    ),
                    array(
                        'name'      => __('Class', 'lambda-admin-td'),
                        'desc'      => __('optional - apply a css class to the chart container.', 'lambda-admin-td'),
                        'id'        => 'class',
                        'type'      => 'text',
                        'default'   =>  '',
                    ),
                    array(
                        'name'      => __('Scale Font Size', 'lambda-admin-td'),
                        'desc'      => __('Adjust the font size of the scale for the charts that display it', 'lambda-admin-td'),
                        'id'        => 'scalefontsize',
                        'type'      => 'slider',
                        'default'   => '12',
                        'attr'      => array(
                            'max'       => 100,
                            'min'       => 1,
                            'step'      => 1,
                        )
                    ),
                    array(
                        'name'      => __('Scale Font Colour', 'lambda-admin-td'),
                        'desc'      => __('Change the scale font colour', 'lambda-admin-td'),
                        'id'        => 'scalefontcolor',
                        'type'      => 'colour',
                        'default'   => '#666666',
                    ),
                    array(
                        'name'      => __('Scale Override', 'lambda-admin-td'),
                        'desc'      => __('By default this is turned off, and the script attempts to output an appropriate scale, setting this to true will require the following three properties to be set as well: scaleSteps, scaleStepWidth and scaleStartValue', 'lambda-admin-td'),
                        'id'        => 'scaleoverride',
                        'type'      => 'select',
                        'options'   => array(
                            'true'  => __('On', 'lambda-admin-td'),
                            'false' => __('Off', 'lambda-admin-td'),
                        ),
                        'default'   =>  'false',
                    ),
                    array(
                        'name'      => __('Scale Steps', 'lambda-admin-td'),
                        'desc'      => __('Only applicable if scaleOveride is set to true - the number of steps in the scale', 'lambda-admin-td'),
                        'id'        => 'scalesteps',
                        'type'      => 'text',
                        'default'   =>  'null',
                    ),
                    array(
                        'name'      => __('Scale Step Width', 'lambda-admin-td'),
                        'desc'      => __('Only applicable if scaleOveride is set to true - the value jump used in the scale', 'lambda-admin-td'),
                        'id'        => 'scalestepwidth',
                        'type'      => 'text',
                        'default'   =>  'null',
                    ),
                    array(
                        'name'      => __('Scale Start Value', 'lambda-admin-td'),
                        'desc'      => __('Only applicable if scaleOveride is set to true - the center starting value for the scale', 'lambda-admin-td'),
                        'id'        => 'scalestartvalue',
                        'type'      => 'text',
                        'default'   =>  'null',
                    ),
                    array(
                        'name'      => __('Chart Animation', 'lambda-admin-td'),
                        'desc'      => __('Turn the load animation for the charts on or off', 'lambda-admin-td'),
                        'id'        => 'animation',
                        'type'      => 'select',
                        'options'   => array(
                            'true'  => __('On', 'lambda-admin-td'),
                            'false' => __('Off', 'lambda-admin-td'),
                        ),
                        'default'   =>  'true',
                    ),
                    array(
                        'name'      => __('Fill Opacity', 'lambda-admin-td'),
                        'desc'      => __('For line, bar and polararea type charts you can set an opactiy for fill of the chart.', 'lambda-admin-td'),
                        'id'        => 'fillopacity',
                        'type'      => 'slider',
                        'default'   => '0.7',
                        'attr'      => array(
                            'max'       => 1,
                            'min'       => 0,
                            'step'      => 0.1,
                        )
                    ),
                    array(
                        'name'      => __('Point Stroke Colour', 'lambda-admin-td'),
                        'desc'      => __('For line and polararea type charts you can set the point color, though usually looks pretty good with the default.', 'lambda-admin-td'),
                        'id'        => 'pointstrokecolor',
                        'type'      => 'colour',
                        'default'   => '#FFFFFF',
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'vc_tabs' => array(
        'shortcode'     => 'vc_tabs',
        'title'         => __('Tabs', 'lambda-admin-td'),
        'desc'          => __('Creates Bootstrap Tabs with content.', 'lambda-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Choose a menu', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'      => __('Tabs Style', 'lambda-admin-td'),
                        'desc'      => __('Select a style to use for the tabs.', 'lambda-admin-td'),
                        'id'        => 'style',
                        'type'      => 'select',
                        'options'   => array(
                            'top'    => __('Top', 'lambda-admin-td'),
                            'bottom' => __('Bottom', 'lambda-admin-td'),
                        ),
                        'default'   =>  '',
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'vc_accordion' => array(
        'shortcode'     => 'vc_accordion',
        'title'         => __('Accordion', 'lambda-admin-td'),
        'desc'          => __('Creates a Bootstrap Accordion.', 'lambda-admin-td'),
        'insert_with'   => 'dialog',
        'sections'      => array(
            array(
                'title' => __('Accordion Options', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Accordion type', 'lambda-admin-td'),
                        'desc'    => __('Type of accordion to display', 'lambda-admin-td'),
                        'id'      => 'type',
                        'type'    => 'select',
                        'default' => 'primary',
                        'admin_label' => true,
                        'options' => array(
                            'default' => __('Default', 'lambda-admin-td'),
                            'primary' => __('Primary', 'lambda-admin-td'),
                            'info'    => __('Info', 'lambda-admin-td'),
                            'success' => __('Success', 'lambda-admin-td'),
                            'warning' => __('Warning', 'lambda-admin-td'),
                            'danger'  => __('Danger', 'lambda-admin-td'),
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'simple_icon_list' => array(
        'shortcode'   => 'simple_icon_list',
        'title'       => __('Icons List', 'lambda-admin-td'),
        'desc'        => __('Displays a list of icons.', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'has_content'   => false,
        'sections'    => array(
            array(
                'title' => __('Video Options', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Item size', 'lambda-admin-td'),
                        'desc'    => __('Choose between normal or and big item size', 'lambda-admin-td'),
                        'id'      => 'size',
                        'type'    => 'radio',
                        'options' => array(
                            'normal' => __('Normal', 'lambda-admin-td'),
                            'big'    => __('Big', 'lambda-admin-td'),
                        ),
                        'default' => 'normal',
                    ),
                )
            ),
            array(
                'title' => __('Text', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/text-color.php'
            ),
            array(
                'title' => __('List Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'simple_icon' => array(
        'shortcode'   => 'simple_icon',
        'title'       => __('Simple Icon', 'lambda-admin-td'),
        'desc'        => __('Displays an icon alongside some text.', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'has_content'   => false,
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'    => __('Icon', 'lambda-admin-td'),
                        'desc'    => __('Select an icon that will appear in your list.', 'lambda-admin-td'),
                        'id'      => 'icon',
                        'type'    => 'select',
                        'options' => include OXY_THEME_DIR . 'inc/options/global-options/icons.php',
                        'default' => ''
                    ),
                    array(
                        'name'      => __('Icon Colour', 'lambda-admin-td'),
                        'desc'      => __('Set the colour of the icon', 'lambda-admin-td'),
                        'id'        => 'icon_color',
                        'type'      => 'colour',
                        'default'   => '',
                        'format'  => 'rgba',
                        'attr'      => array(
                            'class' => 'allow-empty'
                        )
                    ),
                    array(
                        'name'        => __('Title', 'lambda-admin-td'),
                        'id'          => 'title',
                        'type'        => 'text',
                        'admin_label' => true,
                        'default'     => '',
                        'desc'        => __('Choose a title for your featured item.', 'lambda-admin-td'),
                    ),
                )
            ),
            array(
                'title' => __('Responsive', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/responsive.php'
            )
        )
    ),
    'audio' => array(
        'shortcode'   => 'audio',
        'title'       => __('Audio Player', 'lambda-admin-td'),
        'desc'        => __('Creates an audio player.', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'has_content'   => false,
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'        => __('Audio URL', 'lambda-admin-td'),
                        'id'          => 'src',
                        'type'        => 'text',
                        'admin_label' => true,
                        'default'     => '',
                        'desc'        => __('Add a link to your audio file (mp3, m4a, ogg, wav, wma).', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Loop Audio', 'lambda-admin-td'),
                        'id'      => 'loop',
                        'desc'    => __('Allows for looping of media.', 'lambda-admin-td'),
                        'type'    => 'select',
                        'options' => array(
                            'on'  => __('On', 'lambda-admin-td'),
                            '' => __('Off', 'lambda-admin-td')
                        ),
                        'default' => ''
                    ),
                    array(
                        'name'    => __('Autoplay', 'lambda-admin-td'),
                        'id'      => 'autoplay',
                        'desc'    => __('Causes the media to automatically play as soon as the media file is ready.', 'lambda-admin-td'),
                        'type'    => 'select',
                        'options' => array(
                            'on'  => __('On', 'lambda-admin-td'),
                            '' => __('Off', 'lambda-admin-td')
                        ),
                        'default' => ''
                    ),
                    array(
                        'name'    => __('Preload', 'lambda-admin-td'),
                        'id'      => 'preload',
                        'desc'    => __('Specifies if and how the audio should be loaded when the page loads.', 'lambda-admin-td'),
                        'type'    => 'select',
                        'options' => array(
                            ''     => __('Audio should not be loaded', 'lambda-admin-td'),
                            'auto'     => __('Audio should be loaded', 'lambda-admin-td'),
                            'metadata' => __('Metadata should be loaded', 'lambda-admin-td')
                        ),
                        'default' => ''
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'product' => array(
        'shortcode'   => 'product',
        'title'       => __('Product', 'lambda-admin-td'),
        'desc'        => __('Displays a single product', 'lambda-admin-td'),
        'insert_with' => 'text',
        'has_content'   => false,
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'        => __('Product', 'lambda-admin-td'),
                        'desc'        => __('Choose a product to display.', 'lambda-admin-td'),
                        'id'          => 'id',
                        'type'        => 'select',
                        'default'     =>  '',
                        'blank'       => __('None', 'lambda-admin-td'),
                        'options'     => 'custom_post_id',
                        'post_type'   => 'product',
                        'admin_label' => true,
                    ),
                )
            ),
        )
    ),
    'product_page' => array(
        'shortcode'   => 'product_page',
        'title'       => __('Product Page', 'lambda-admin-td'),
        'desc'        => __('Displays a single product page', 'lambda-admin-td'),
        'insert_with' => 'text',
        'has_content'   => false,
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'        => __('Product', 'lambda-admin-td'),
                        'desc'        => __('Choose a product to display.', 'lambda-admin-td'),
                        'id'          => 'id',
                        'type'        => 'select',
                        'default'     =>  '',
                        'blank'       => __('None', 'lambda-admin-td'),
                        'options'     => 'custom_post_id',
                        'post_type'   => 'product',
                        'admin_label' => true,
                    ),
                )
            ),
        )
    ),
    'product_category' => array(
        'shortcode'   => 'product_category',
        'title'       => __('Product Category', 'lambda-admin-td'),
        'desc'        => __('Displays a product category', 'lambda-admin-td'),
        'insert_with' => 'text',
        'has_content'   => false,
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'        => __('Product Category', 'lambda-admin-td'),
                        'desc'        => __('Choose a product category to display', 'lambda-admin-td'),
                        'id'          => 'category',
                        'type'        => 'select',
                        'default'     =>  '',
                        'blank'       => __('None', 'lambda-admin-td'),
                        'options'     => 'taxonomy',
                        'taxonomy'    => 'product_cat',
                        'admin_label' => true,
                    ),
                    array(
                        'name'    => __('Number', 'lambda-admin-td'),
                        'desc'    => __('Set the number of products to display.', 'lambda-admin-td'),
                        'id'      => 'per_page',
                        'type'    => 'text',
                        'default' => ''
                    ),
                    array(
                        'name'    => __('Columns', 'lambda-admin-td'),
                        'desc'    => __('Set the number of columns to display.', 'lambda-admin-td'),
                        'id'      => 'columns',
                        'type'    => 'text',
                        'default' => ''
                    ),
                    array(
                        'name'        => __('Order by', 'lambda-admin-td'),
                        'desc'        => __('Choose the way products will be ordered.', 'lambda-admin-td'),
                        'id'          => 'orderby',
                        'type'        => 'select',
                        'default'     =>  'none',
                        'options'     => array(
                            'none'     => __('None', 'lambda-admin-td'),
                            'title' => __('Title', 'lambda-admin-td'),
                            'name' => __('Name', 'lambda-admin-td'),
                            'date' => __('Date', 'lambda-admin-td'),
                            'ID'     => __('ID', 'lambda-admin-td'),
                            'author' => __('Author', 'lambda-admin-td'),
                            'modified' => __('Last Modified', 'lambda-admin-td'),
                            'parent' => __('Parent id', 'lambda-admin-td'),
                            'rand' => __('Random', 'lambda-admin-td'),
                            'comment_count' => __('Number of comments', 'lambda-admin-td')
                        )
                    ),
                    array(
                        'name'        => __('Order', 'lambda-admin-td'),
                        'desc'        => __('Choose how products will be ordered.', 'lambda-admin-td'),
                        'id'          => 'order',
                        'type'        => 'select',
                        'default'     =>  'ASC',
                        'options'     => array(
                            'ASC'     => __('Ascending', 'lambda-admin-td'),
                            'DESC' => __('Descending', 'lambda-admin-td'),
                        )
                    ),
                )
            ),
        )
    ),
    'product_categories' => array(
        'shortcode'   => 'product_categories',
        'title'       => __('Product Categories', 'lambda-admin-td'),
        'desc'        => __('Displays product categories', 'lambda-admin-td'),
        'insert_with' => 'text',
        'has_content'   => false,
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'        => __('Product Categories', 'lambda-admin-td'),
                        'desc'        => __('Choose the product categories to display.  Enter the IDs comma separated, or leave empty for all categories.', 'lambda-admin-td'),
                        'id'          => 'ids',
                        'type'        => 'text',
                        'default'     =>  ''
                    ),
                    array(
                        'name'    => __('Number', 'lambda-admin-td'),
                        'desc'    => __('Set the number of categories to display.', 'lambda-admin-td'),
                        'id'      => 'number',
                        'type'    => 'text',
                        'default' => ''
                    ),
                    array(
                        'name'    => __('Columns', 'lambda-admin-td'),
                        'desc'    => __('Set the number of columns to display.', 'lambda-admin-td'),
                        'id'      => 'columns',
                        'type'    => 'text',
                        'default' => ''
                    ),
                    array(
                        'name'        => __('Order by', 'lambda-admin-td'),
                        'desc'        => __('Choose the way categories will be ordered.', 'lambda-admin-td'),
                        'id'          => 'orderby',
                        'type'        => 'select',
                        'default'     =>  'none',
                        'options'     => array(
                            'none'     => __('None', 'lambda-admin-td'),
                            'title' => __('Title', 'lambda-admin-td'),
                            'name' => __('Name', 'lambda-admin-td'),
                            'date' => __('Date', 'lambda-admin-td'),
                            'ID'     => __('ID', 'lambda-admin-td'),
                            'author' => __('Author', 'lambda-admin-td'),
                            'modified' => __('Last Modified', 'lambda-admin-td'),
                            'parent' => __('Parent id', 'lambda-admin-td'),
                            'rand' => __('Random', 'lambda-admin-td'),
                            'comment_count' => __('Number of comments', 'lambda-admin-td')
                        )
                    ),
                    array(
                        'name'        => __('Order', 'lambda-admin-td'),
                        'desc'        => __('Choose how categories will be ordered.', 'lambda-admin-td'),
                        'id'          => 'order',
                        'type'        => 'select',
                        'default'     =>  'ASC',
                        'options'     => array(
                            'ASC'     => __('Ascending', 'lambda-admin-td'),
                            'DESC' => __('Descending', 'lambda-admin-td'),
                        )
                    ),
                    array(
                        'name'        => __('Hide empty categories', 'lambda-admin-td'),
                        'desc'        => __('Choose whether to show categories with no products set.', 'lambda-admin-td'),
                        'id'          => 'hide_empty',
                        'type'        => 'select',
                        'default'     =>  '0',
                        'options'     => array(
                            '1'     => __('Hide', 'lambda-admin-td'),
                            '0' => __('Show', 'lambda-admin-td'),
                        )
                    ),
                    array(
                        'name'    => __('Parent', 'lambda-admin-td'),
                        'desc'    => __('Set the parent id of the categories to display. Set to 0 to only display top level categories', 'lambda-admin-td'),
                        'id'      => 'parent',
                        'type'    => 'text',
                        'default' => '0'
                    )
                )
            ),
        )
    ),
    'sale_products' => array(
        'shortcode'   => 'sale_products',
        'title'       => __('Sale Products', 'lambda-admin-td'),
        'desc'        => __('Displays sale products', 'lambda-admin-td'),
        'insert_with' => 'text',
        'has_content'   => false,
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'    => __('Number', 'lambda-admin-td'),
                        'desc'    => __('Set the number of products to display.', 'lambda-admin-td'),
                        'id'      => 'per_page',
                        'type'    => 'text',
                        'default' => ''
                    ),
                    array(
                        'name'    => __('Columns', 'lambda-admin-td'),
                        'desc'    => __('Set the number of columns to display.', 'lambda-admin-td'),
                        'id'      => 'columns',
                        'type'    => 'text',
                        'default' => ''
                    ),
                    array(
                        'name'        => __('Order by', 'lambda-admin-td'),
                        'desc'        => __('Choose the way products will be ordered.', 'lambda-admin-td'),
                        'id'          => 'orderby',
                        'type'        => 'select',
                        'default'     =>  'none',
                        'options'     => array(
                            'none'     => __('None', 'lambda-admin-td'),
                            'title' => __('Title', 'lambda-admin-td'),
                            'name' => __('Name', 'lambda-admin-td'),
                            'date' => __('Date', 'lambda-admin-td'),
                            'ID'     => __('ID', 'lambda-admin-td'),
                            'author' => __('Author', 'lambda-admin-td'),
                            'modified' => __('Last Modified', 'lambda-admin-td'),
                            'parent' => __('Parent id', 'lambda-admin-td'),
                            'rand' => __('Random', 'lambda-admin-td'),
                            'comment_count' => __('Number of comments', 'lambda-admin-td')
                        )
                    ),
                    array(
                        'name'        => __('Order', 'lambda-admin-td'),
                        'desc'        => __('Choose how products will be ordered.', 'lambda-admin-td'),
                        'id'          => 'order',
                        'type'        => 'select',
                        'default'     =>  'ASC',
                        'options'     => array(
                            'ASC'     => __('Ascending', 'lambda-admin-td'),
                            'DESC' => __('Descending', 'lambda-admin-td'),
                        )
                    )
                )
            )
        )
    ),
    'best_selling_products' => array(
        'shortcode'   => 'best_selling_products',
        'title'       => __('Best Selling Products', 'lambda-admin-td'),
        'desc'        => __('Displays your best selling products', 'lambda-admin-td'),
        'insert_with' => 'text',
        'has_content'   => false,
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'    => __('Number', 'lambda-admin-td'),
                        'desc'    => __('Set the number of products to display.', 'lambda-admin-td'),
                        'id'      => 'per_page',
                        'type'    => 'text',
                        'default' => ''
                    ),
                    array(
                        'name'    => __('Columns', 'lambda-admin-td'),
                        'desc'    => __('Set the number of columns to display.', 'lambda-admin-td'),
                        'id'      => 'columns',
                        'type'    => 'text',
                        'default' => ''
                    ),
                )
            )
        )
    ),
    'top_rated_products' => array(
        'shortcode'   => 'top_rated_products',
        'title'       => __('Top Rated Products', 'lambda-admin-td'),
        'desc'        => __('Displays your top rated products', 'lambda-admin-td'),
        'insert_with' => 'text',
        'has_content'   => false,
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'    => __('Number', 'lambda-admin-td'),
                        'desc'    => __('Set the number of products to display.', 'lambda-admin-td'),
                        'id'      => 'per_page',
                        'type'    => 'text',
                        'default' => ''
                    ),
                    array(
                        'name'    => __('Columns', 'lambda-admin-td'),
                        'desc'    => __('Set the number of columns to display.', 'lambda-admin-td'),
                        'id'      => 'columns',
                        'type'    => 'text',
                        'default' => ''
                    ),
                    array(
                        'name'        => __('Order by', 'lambda-admin-td'),
                        'desc'        => __('Choose the way products will be ordered.', 'lambda-admin-td'),
                        'id'          => 'orderby',
                        'type'        => 'select',
                        'default'     =>  'none',
                        'options'     => array(
                            'none'     => __('None', 'lambda-admin-td'),
                            'title' => __('Title', 'lambda-admin-td'),
                            'name' => __('Name', 'lambda-admin-td'),
                            'date' => __('Date', 'lambda-admin-td'),
                            'ID'     => __('ID', 'lambda-admin-td'),
                            'author' => __('Author', 'lambda-admin-td'),
                            'modified' => __('Last Modified', 'lambda-admin-td'),
                            'parent' => __('Parent id', 'lambda-admin-td'),
                            'rand' => __('Random', 'lambda-admin-td'),
                            'comment_count' => __('Number of comments', 'lambda-admin-td')
                        )
                    ),
                    array(
                        'name'        => __('Order', 'lambda-admin-td'),
                        'desc'        => __('Choose how products will be ordered.', 'lambda-admin-td'),
                        'id'          => 'order',
                        'type'        => 'select',
                        'default'     =>  'ASC',
                        'options'     => array(
                            'ASC'     => __('Ascending', 'lambda-admin-td'),
                            'DESC' => __('Descending', 'lambda-admin-td'),
                        )
                    )
                )
            )
        )
    ),
    'post_featured' => array(
        'shortcode' => 'post_featured',
        'title'     => __('Featured Post', 'lambda-admin-td'),
        'desc'       => __('Displays a section about a selected blog post.', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'has_content'   => false,
        'sections'   => array(
            array(
                'title' => __('Featured Post', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'     => __('Featured post', 'lambda-admin-td'),
                        'desc'     => __('Select the blog post that will be displayed', 'lambda-admin-td'),
                        'id'       => 'featured',
                        'default'  =>  '',
                        'type'     => 'select',
                        'options'  => 'taxonomy',
                        'taxonomy' => 'posts',
                        'blank_label' => __('Select a Post', 'lambda-admin-td'),
                    ),
                    array(
                        'name'        => __('Post category', 'lambda-admin-td'),
                        'desc'        => __('Display a category', 'lambda-admin-td'),
                        'id'          => 'cat',
                        'default'     =>  '',
                        'type'        => 'select',
                        'options'     => 'taxonomy',
                        'taxonomy'    => 'category',
                        'blank_label' => __('Don\'t display a Category', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Title Size', 'lambda-admin-td'),
                        'desc'    => __('Size of heading to use for post titles.', 'lambda-admin-td'),
                        'id'      => 'title_tag',
                        'type'    => 'select',
                        'default' => 'h3',
                        'options' => array(
                            'h1' => __('H1', 'lambda-admin-td'),
                            'h2' => __('H2', 'lambda-admin-td'),
                            'h3' => __('H3', 'lambda-admin-td'),
                            'h4' => __('H4', 'lambda-admin-td'),
                            'h5' => __('H5', 'lambda-admin-td'),
                            'h6' => __('H6', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Text Align', 'lambda-admin-td'),
                        'id'        => 'text_align',
                        'type'      => 'select',
                        'default'   => 'left',
                        'options' => array(
                            'left'   => __('Left', 'lambda-admin-td'),
                            'center' => __('Center', 'lambda-admin-td'),
                            'right'  => __('Right', 'lambda-admin-td'),
                            'justify'  => __('Justify', 'lambda-admin-td'),
                        ),
                        'desc'    => __('Sets the text alignment of the blockquote and citation of the testimonial', 'lambda-admin-td'),
                    ),
                    array(
                        'name'      => __('Item Overlay Caption Vertical Alignment', 'lambda-admin-td'),
                        'id'        => 'item_caption_vertical',
                        'type'      => 'select',
                        'default'   => 'bottom',
                        'options' => array(
                            'middle' => __('Middle', 'lambda-admin-td'),
                            'top'    => __('Top', 'lambda-admin-td'),
                            'bottom' => __('Bottom', 'lambda-admin-td'),
                        ),
                        'desc'    => __('Vertical alignment of the caption title and category.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Post Hover Effects Filter', 'lambda-admin-td'),
                        'id'      => 'item_hover_filter',
                        'type'    => 'select',
                        'default' => 'none',
                        'options' => array(
                            'none'      => __('None', 'lambda-admin-td'),
                            'sepia'     => __('Sepia', 'lambda-admin-td'),
                            'grayscale' => __('Grayscale', 'lambda-admin-td'),
                            'blur'      => __('Blur', 'lambda-admin-td'),
                        ),
                        'desc'    => __('Effects filter to apply to the post on hover.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Hover Effect', 'lambda-admin-td'),
                        'desc'    => __('Select an effect to add when you hover over the post.', 'lambda-admin-td'),
                        'id'      => 'hover_effect',
                        'type'    => 'select',
                        'default' => '',
                        'options' => array(
                            ''                    => __('No Effect', 'lambda-admin-td'),
                            'image-effect-zoom-in'  => __('Zoom In', 'lambda-admin-td'),
                            'image-effect-zoom-out' => __('Zoom Out', 'lambda-admin-td'),
                            'image-effect-scroll-left'  => __('Scroll Left', 'lambda-admin-td'),
                            'image-effect-scroll-right' => __('Scroll Right', 'lambda-admin-td')
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
    'posts_slideshow' => array(
        'shortcode' => 'posts_slideshow',
        'title'     => __('Posts Slideshow', 'lambda-admin-td'),
        'desc'       => __('Displays a slideshow of recent posts.', 'lambda-admin-td'),
        'insert_with' => 'dialog',
        'has_content'   => false,
        'sections'   => array(
            array(
                'title' => __('Posts Slideshow', 'lambda-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Number of posts', 'lambda-admin-td'),
                        'desc'    => __('Total Number of posts to display.', 'lambda-admin-td'),
                        'id'      => 'count',
                        'type'    => 'slider',
                        'default' => '3',
                        'attr'    => array(
                            'max'   => 50,
                            'min'   => 1,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'    => __('Post category', 'lambda-admin-td'),
                        'desc'    => __('Choose posts from a specific category', 'lambda-admin-td'),
                        'id'      => 'cat',
                        'default' =>  '',
                        'type'    => 'select',
                        'options' => 'categories',
                        'attr' => array(
                            'multiple' => '',
                            'style' => 'height:100px'
                        )
                    ),
                    array(
                        'name'      => __('Speed', 'lambda-admin-td'),
                        'desc'      => __('Set the speed of the slideshow cycling, in milliseconds', 'lambda-admin-td'),
                        'id'        => 'speed',
                        'type'      => 'slider',
                        'default'   => '7000',
                        'attr'      => array(
                            'max'       => 15000,
                            'min'       => 2000,
                            'step'      => 1000
                        )
                    ),
                    array(
                        'name'      => __('Transition type', 'lambda-admin-td'),
                        'id'        => 'animation_type',
                        'type'      => 'select',
                        'default'   => 'slide',
                        'options' => array(
                            'slide' => __('Slide', 'lambda-admin-td'),
                            'fade'  => __('Fade', 'lambda-admin-td'),
                        ),
                        'desc' => __('Sets the type of animation that occurs between posts.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'      => __('Show Controls', 'lambda-admin-td'),
                        'id'        => 'show_controls',
                        'type'      => 'select',
                        'default'   => 'show',
                        'options' => array(
                            'show' => __('Show', 'lambda-admin-td'),
                            'hide' => __('Hide', 'lambda-admin-td'),
                        ),
                        'desc'    => __('Toggles the slideshow bullet nav controls at the bottom.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'      => __('Show navigation arrows', 'lambda-admin-td'),
                        'id'        => 'directionnav',
                        'type'      => 'select',
                        'default'   =>  'hide',
                        'options' => array(
                            'show' => __('Show', 'lambda-admin-td'),
                            'hide' => __('Hide', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Title Size', 'lambda-admin-td'),
                        'desc'    => __('Size of heading to use for post titles.', 'lambda-admin-td'),
                        'id'      => 'title_tag',
                        'type'    => 'select',
                        'default' => 'h3',
                        'options' => array(
                            'h1' => __('H1', 'lambda-admin-td'),
                            'h2' => __('H2', 'lambda-admin-td'),
                            'h3' => __('H3', 'lambda-admin-td'),
                            'h4' => __('H4', 'lambda-admin-td'),
                            'h5' => __('H5', 'lambda-admin-td'),
                            'h6' => __('H6', 'lambda-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Post Text Alignment', 'lambda-admin-td'),
                        'id'        => 'text_align',
                        'type'      => 'select',
                        'default'   => 'left',
                        'options' => array(
                            'left'      => __('Left', 'lambda-admin-td'),
                            'center'    => __('Center', 'lambda-admin-td'),
                            'right'     => __('Right', 'lambda-admin-td'),
                            'justify'   => __('Justify', 'lambda-admin-td')
                        ),
                        'desc'    => __('Sets the text alignment of the post text & title.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'      => __('Item Overlay Caption Vertical Alignment', 'lambda-admin-td'),
                        'id'        => 'item_caption_vertical',
                        'type'      => 'select',
                        'default'   => 'bottom',
                        'options' => array(
                            'middle' => __('Middle', 'lambda-admin-td'),
                            'top'    => __('Top', 'lambda-admin-td'),
                            'bottom' => __('Bottom', 'lambda-admin-td'),
                        ),
                        'desc'    => __('Vertical alignment of the caption title and category.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Post Hover Effects Filter', 'lambda-admin-td'),
                        'id'      => 'item_hover_filter',
                        'type'    => 'select',
                        'default' => 'none',
                        'options' => array(
                            'none'      => __('None', 'lambda-admin-td'),
                            'sepia'     => __('Sepia', 'lambda-admin-td'),
                            'grayscale' => __('Grayscale', 'lambda-admin-td'),
                            'blur'      => __('Blur', 'lambda-admin-td'),
                        ),
                        'desc'    => __('Effects filter to apply to the post on hover.', 'lambda-admin-td'),
                    ),
                    array(
                        'name'    => __('Hover Effect', 'lambda-admin-td'),
                        'desc'    => __('Select an effect to add when you hover over the post.', 'lambda-admin-td'),
                        'id'      => 'hover_effect',
                        'type'    => 'select',
                        'default' => '',
                        'options' => array(
                            ''                    => __('No Effect', 'lambda-admin-td'),
                            'image-effect-zoom-in'  => __('Zoom In', 'lambda-admin-td'),
                            'image-effect-zoom-out' => __('Zoom Out', 'lambda-admin-td'),
                            'image-effect-scroll-left'  => __('Scroll Left', 'lambda-admin-td'),
                            'image-effect-scroll-right' => __('Scroll Right', 'lambda-admin-td')
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'lambda-admin-td'),
                'fields' => include OXY_THEME_DIR . 'inc/options/shortcodes/shared/global.php'
            )
        )
    ),
);
