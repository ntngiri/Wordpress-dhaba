<?php
/**
 * Creates all theme metaboxes
 *
 * @package Lambda
 * @subpackage Admin
 * @since 0.1
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version 1.17.0
 */

// global $oxy_theme;

$heading_options = include OXY_THEME_DIR . 'inc/options/shortcodes/shared/heading.php';
$section_options = include OXY_THEME_DIR . 'inc/options/shortcodes/shared/section.php';
$override_header_options = array(
    array(
        'name' => __('Override Default Header', 'lambda-admin-td'),
        'desc' => __('Disregard the default settings (in Pages option page) for this page and use custom options for the header', 'lambda-admin-td'),
        'id'   => 'override_header',
        'type' => 'select',
        'default' => 'default',
        'options' => array(
            'default'  => __('Use Defaults', 'lambda-admin-td'),
            'override' => __('Override Header Options', 'lambda-admin-td'),
        ),
    )
);

/*  PAGE HEADER OPTIONS */
$oxy_theme->register_metabox(array(
    'id' => 'override_page_header',
    'title' => __('Header Override', 'lambda-admin-td'),
    'priority' => 'default',
    'context' => 'advanced',
    'pages' => array('page', 'oxy_portfolio_image', 'oxy_staff', 'oxy_service'),
    'javascripts' => array(
        array(
            'handle' => 'header_options_script',
            'src'    => OXY_THEME_URI . 'inc/assets/js/metaboxes/header-options.js',
            'deps'   => array('jquery'),
            'localize' => array(
                'object_handle' => 'theme',
                'data'          => THEME_SHORT
            ),
        ),
    ),
    'fields' => $override_header_options
));

/*  PAGE HEADER SHOW / HIDE */
$oxy_theme->register_metabox(array(
    'id' => 'page_header_show',
    'title' => __('Toggle Header', 'lambda-admin-td'),
    'priority' => 'default',
    'context' => 'advanced',
    'pages' => array('page', 'oxy_portfolio_image', 'oxy_staff', 'oxy_service'),
    'fields' => array(
        array(
            'name' => __('Show Header', 'lambda-admin-td'),
            'desc' => __('Show or hide the header at the top of the page.', 'lambda-admin-td'),
            'id'   => 'show_header',
            'type' => 'select',
            'default' => 'show',
            'options' => array(
                'hide' => __('Hide', 'lambda-admin-td'),
                'show' => __('Show', 'lambda-admin-td'),
            )
        )
    )
));

/*  PAGE HEADER HEADING OPTIONS */
$oxy_theme->register_metabox(array(
    'id' => 'page_header_heading',
    'title' => __('Header Options', 'lambda-admin-td'),
    'priority' => 'default',
    'context' => 'advanced',
    'pages' => array('page', 'oxy_portfolio_image', 'oxy_staff', 'oxy_service'),
    'fields' => $heading_options
));

/*  SECTION HEADER HEADING OPTIONS */
$oxy_theme->register_metabox(array(
    'id' => 'page_header_section',
    'title' => __('Header Section Options', 'lambda-admin-td'),
    'priority' => 'default',
    'context' => 'advanced',
    'pages' => array('page', 'oxy_portfolio_image', 'oxy_staff', 'oxy_service'),
    'fields' => $section_options
));

/*  POST SUBHEADER OPTION */
$oxy_theme->register_metabox(array(
    'id' => 'single_post_subheader_section',
    'title' => __('Post Subheader', 'lambda-admin-td'),
    'priority' => 'high',
    'context' => 'advanced',
    'pages' => array('post'),
    'fields' => array(
        array(
            'name'    => __('Subheader', 'lambda-admin-td'),
            'id'      => 'post_subheader',
            'type'    => 'text',
            'default' => '',
            'desc'    => __('Add a subheader for the post', 'lambda-admin-td'),
        )
    )
));

$oxy_theme->register_metabox(array(
    'id'       => 'page_bullet_nav',
    'title'    => __('Extra Page Options', 'lambda-admin-td'),
    'priority' => 'default',
    'context'  => 'advanced',
    'pages'    => array('page'),
    'fields'   => array(
        array(
            'name'    => __('Bullet Navigation', 'lambda-admin-td'),
            'id'      => 'bullet_nav',
            'desc'    => __('Display a bullet-style scroll navigation.', 'lambda-admin-td'),
            'default' => 'hide',
            'type'    => 'select',
            'options' => array(
                'show'    => __('Show', 'lambda-admin-td'),
                'hide'    => __('Hide', 'lambda-admin-td'),
            )
        ),
        array(
            'name'    => __('Bullet Show Tooltips', 'lambda-admin-td'),
            'id'      => 'bullet_nav_tooltips',
            'desc'    => __('Display the section label when you hover over a bullet.', 'lambda-admin-td'),
            'default' => 'off',
            'type'    => 'select',
            'options' => array(
                'on'    => __('Show', 'lambda-admin-td'),
                'off'   => __('Hide', 'lambda-admin-td'),
            )
        ),
    )
));

$exclude_posts = array();
global $oxy_theme;
$current_stack_id = $oxy_theme->get_option('site_stack', false);
if (false !== $current_stack_id) {
    array_push($exclude_posts, $current_stack_id);
}

// fetch list of skins
$skins = get_posts(array(
    'posts_per_page' => -1,
    'post_type' => 'oxy_stack',
    'orderby' => 'title',
    'post__not_in' => $exclude_posts
));
$skin_list = array();
$skin_list[0] = 'Current Skin';
foreach ($skins as $skin) {
    $skin_list[$skin->ID] = $skin->post_title;
}

/*  PAGE HEADER OPTIONS */
$oxy_theme->register_metabox(array(
    'id' => 'page_site_overrides',
    'title' => __('Site Overrides', 'lambda-admin-td'),
    'priority' => 'default',
    'context' => 'advanced',
    'pages' => array('page','oxy_portfolio_image', 'oxy_staff', 'oxy_service' ),
    'fields' => array(
        array(
            'name'    => __('Show Menu', 'lambda-admin-td'),
            'desc'    => __('Show or hide the sites top navigation menu (ideal for landing pages).', 'lambda-admin-td'),
            'id'      => 'site_top_nav',
            'type' => 'select',
            'default' => 'show',
            'options' => array(
                'show' => __('Show Top Nav', 'lambda-admin-td'),
                'hide' => __('Hide Top Nav', 'lambda-admin-td'),
            )
        ),
        array(
            'name'    => __('Top Navigation Transparency', 'lambda-admin-td'),
            'desc'    => __('Make the sites top navigation transparent', 'lambda-admin-td'),
            'id'      => 'site_top_nav_transparency',
            'type' => 'select',
            'default' => 'off',
            'options' => array(
                'on'    => __('On (Transparent)', 'lambda-admin-td'),
                'off'   => __('Off (Opaque)', 'lambda-admin-td'),
            )
        ),
        array(
            'name'    => __('Load Skin', 'lambda-admin-td'),
            'desc'    => __('Loads a separate skin for this page', 'lambda-admin-td'),
            'id'      => 'site_skin',
            'type'     => 'select',
            'default' => '',
            'options'  => $skin_list
        ),
    )
));

$oxy_theme->register_metabox(array(
    'id'    => 'portfolio_type_metabox',
    'title' => __('Portfolio Post Type', 'lambda-admin-td'),
    'priority' => 'high',
    'context'  => 'advanced',
    'pages'    => array('oxy_portfolio_image' ),
    'javascripts' => array(
        array(
            'handle' => 'portfolio_post_type',
            'src'    => OXY_THEME_URI . 'inc/assets/js/metaboxes/portfolio-post-type.js',
            'deps'   => array('jquery'),
            'localize' => array(
                'object_handle' => 'theme',
                'data'          => THEME_SHORT
            ),
        ),
    ),
    'fields'  => array(
        array(
            'name' => __('Post Type', 'lambda-admin-td'),
            'desc' => __('Select what type of portfolio post this will be.', 'lambda-admin-td'),
            'id'   => 'post_type',
            'type' => 'select',
            'options' => array(
                'standard' => __('Standard Post', 'lambda-admin-td'),
                'video'    => __('Video Post', 'lambda-admin-td'),
                'gallery'  => __('Gallery Post', 'lambda-admin-td'),
            ),
            'default' => 'standard',
        ),
        array(
            'name'     => __('Popup Video Link', 'lambda-admin-td'),
            'desc'     => __('Enter a youtube, vimeo or custom link to a video here.  This will appear in the items &quot;view larger&quot; popup.', 'lambda-admin-td'),
            'id'       => 'post_video_link',
            'type'     => 'text',
            'default' =>  '',
        ),
        array(
            'name'     => __('Popup Gallery', 'lambda-admin-td'),
            'desc'     => __('Create a gallery in the editor below (click add media -> create gallery).  This will appear in the items &quot;view larger&quot; popup.', 'lambda-admin-td'),
            'id'       => 'post_gallery',
            'type'     => 'editor',
            'default' =>  '',
        ),
    ),
));

$link_options = array(
    'id'    => 'link_metabox',
    'title' => __('Link', 'lambda-admin-td'),
    'priority' => 'default',
    'context'  => 'advanced',
    'pages'    => array('oxy_service', 'oxy_staff', 'oxy_portfolio_image'),
    'javascripts' => array(
        array(
            'handle' => 'slider_links_options_script',
            'src'    => OXY_THEME_URI . 'inc/assets/js/metaboxes/slider-links-options.js',
            'deps'   => array('jquery'),
            'localize' => array(
                'object_handle' => 'theme',
                'data'          => THEME_SHORT
            ),
        ),
    ),
    'fields'  => array(
        array(
            'name' => __('Link Type', 'lambda-admin-td'),
            'desc' => __('Make this post link to something.  Default link will link to the single item page.', 'lambda-admin-td'),
            'id'   => 'link_type',
            'type' => 'select',
            'options' => array(
                'default'   => __('Default Link', 'lambda-admin-td'),
                'page'      => __('Page', 'lambda-admin-td'),
                'post'      => __('Post', 'lambda-admin-td'),
                'portfolio' => __('Portfolio', 'lambda-admin-td'),
                'category'  => __('Category', 'lambda-admin-td'),
                'url'       => __('URL', 'lambda-admin-td'),
                'no-link'   => __('No Link', 'lambda-admin-td')
            ),
            'default' => 'default',
        ),
        array(
            'name'     => __('Page Link', 'lambda-admin-td'),
            'desc'     => __('Choose a page to link this item to', 'lambda-admin-td'),
            'id'       => 'page_link',
            'type'     => 'select',
            'options'  => 'taxonomy',
            'taxonomy' => 'pages',
            'default' =>  '',
        ),
        array(
            'name'     => __('Post Link', 'lambda-admin-td'),
            'desc'     => __('Choose a post to link this item to', 'lambda-admin-td'),
            'id'       => 'post_link',
            'type'     => 'select',
            'options'  => 'taxonomy',
            'taxonomy' => 'posts',
            'default' =>  '',
        ),
        array(
            'name'     => __('Portfolio Link', 'lambda-admin-td'),
            'desc'     => __('Choose a portfolio item to link this item to', 'lambda-admin-td'),
            'id'       => 'portfolio_link',
            'type'     => 'select',
            'options'  => 'taxonomy',
            'taxonomy' => 'oxy_portfolio_image',
            'default' =>  '',
        ),
        array(
            'name'     => __('Category Link', 'lambda-admin-td'),
            'desc'     => __('Choose a category list to link this item to', 'lambda-admin-td'),
            'id'       => 'category_link',
            'type'     => 'select',
            'options'  => 'categories',
            'default' =>  '',
        ),
        array(
            'name'    => __('URL Link', 'lambda-admin-td'),
            'desc'     => __('Choose a URL to link this item to', 'lambda-admin-td'),
            'id'      => 'url_link',
            'type'    => 'text',
            'default' =>  '',
        ),
        array(
            'name'    => __('Open Link In', 'lambda-admin-td'),
            'id'      => 'target',
            'type'    => 'select',
            'default' => '_self',
            'options' => array(
                '_self'   => __('Same page as it was clicked ', 'lambda-admin-td'),
                '_blank'  => __('Open in new window/tab', 'lambda-admin-td'),
                '_parent' => __('Open the linked document in the parent frameset', 'lambda-admin-td'),
                '_top'    => __('Open the linked document in the full body of the window', 'lambda-admin-td')
            ),
            'desc'    => __('Where the link will open.', 'lambda-admin-td'),
        ),
    ),
);

$oxy_theme->register_metabox($link_options);

// modify link options metabox for slideshow image before registering
$link_options['fields'][0]['default'] = 'no-link';
$link_options['pages'] = array('oxy_slideshow_image');
$link_options['id'] = 'slide_link_metabox';
$link_options['fields'][6]['options']['magnific'] = __('Open in magnific popup', 'lambda-admin-td');

$oxy_theme->register_metabox($link_options);


$oxy_theme->register_metabox(array(
    'id' => 'Citation',
    'title' => __('Citation', 'lambda-admin-td'),
    'priority' => 'default',
    'context' => 'advanced',
    'pages' => array('oxy_testimonial'),
    'fields' => array(
        array(
            'name'    => __('Citation', 'lambda-admin-td'),
            'desc'    => __('Reference to the source of the quote', 'lambda-admin-td'),
            'id'      => 'citation',
            'type'    => 'text',
            'default' => '',
        ),
    )
));

$oxy_theme->register_metabox(array(
    'id' => 'services_icon_metabox',
    'title' => __('Service Icon', 'lambda-admin-td'),
    'priority' => 'core',
    'context' => 'advanced',
    'pages' => array('oxy_service'),
    'fields' => array(
        array(
            'name'    => __('Icon', 'lambda-admin-td'),
            'desc'    => __('Select an icon that will appear in your service shape.', 'lambda-admin-td'),
            'id'      => 'icon',
            'type'    => 'select',
            'default' => '',
            'options' => include OXY_THEME_DIR . 'inc/options/global-options/icons.php'
        )
    )
));

$oxy_theme->register_metabox(array(
    'id' => 'staff_info',
    'title' => __('Personal Details', 'lambda-admin-td'),
    'priority' => 'default',
    'context' => 'advanced',
    'pages' => array('oxy_staff'),
    'fields' => array(
        array(
            'name'    => __('Job Title', 'lambda-admin-td'),
            'desc'    => __('Sub header that is shown below the staff members name.', 'lambda-admin-td'),
            'id'      => 'position',
            'type'    => 'text',
            'default' => '',
        ),
    )
));

$staff_social = array();
for ($i = 0; $i < 5; $i++) {
    $staff_social[] =
        array(
            'name' => __('Social Icon', 'lambda-admin-td') . ' ' . ($i+1),
            'desc' => __('Social Network Icon to show for this Staff Member', 'lambda-admin-td'),
            'id'   => 'icon' . $i,
            'type' => 'select',
            'default' => '',
            'options' => include OXY_THEME_DIR . 'inc/options/global-options/icons.php'
        );
    $staff_social[] =
        array(
            'name'  => __('Social Link', 'lambda-admin-td'). ' ' . ($i+1),
            'desc' => __('Add the url to the staff members social network here.', 'lambda-admin-td'),
            'id'    => 'link' . $i,
            'type'  => 'text',
            'default' => '',
            'std'   => '',
        );
}

$oxy_theme->register_metabox(array(
    'id' => 'staff_social',
    'title' => __('Social', 'lambda-admin-td'),
    'priority' => 'default',
    'context' => 'advanced',
    'pages' => array('oxy_staff'),
    'fields' => $staff_social,
));

$oxy_theme->register_metabox(array(
    'id' => 'portfolio_masonry_metabox',
    'title' => __('Portfolio Masonry Options', 'lambda-admin-td'),
    'priority' => 'default',
    'context' => 'advanced',
    'pages' => array('oxy_portfolio_image'),
    'fields' => array(
        array(
            'name'    => __('Masonry Image Width ', 'lambda-admin-td'),
            'desc'    => __('Select the width that the masonry portfolio shortcode will use for this item (normal 1 column wide 2 columns)', 'lambda-admin-td'),
            'id'      => 'masonry_width',
            'type'    => 'select',
            'options' => array(
                'normal'    => __('Normal', 'lambda-admin-td'),
                'wide'   => __('Wide', 'lambda-admin-td'),
            ),
            'default' => 'normal',
        ),
    )
));

$oxy_theme->register_metabox(array(
    'id'       => 'service_template_metabox',
    'title'    => __('Service Template', 'lambda-admin-td'),
    'priority' => 'default',
    'context'  => 'advanced',
    'pages'    => array('oxy_service'),
    'fields'   => array(
        array(
            'name'    => __('Service Page Template', 'lambda-admin-td'),
            'id'      => 'template',
            'desc'    => __('Select a page template to use for this service', 'lambda-admin-td'),
            'type'    => 'select',
            'options' => array(
                'page.php'                  => __('Full Width', 'lambda-admin-td'),
                'template-leftsidebar.php'  => __('Left Sidebar', 'lambda-admin-td'),
                'template-rightsidebar.php' => __('Right Sidebar', 'lambda-admin-td'),
            ),
            'default' => 'page.php',
        ),
    )
));

$oxy_theme->register_metabox(array(
    'id'       => 'post_masonry_options',
    'title'    => __('Post Masonry', 'lambda-admin-td'),
    'priority' => 'default',
    'context'  => 'advanced',
    'pages'    => array('post'),
    'fields'   => array(
        array(
            'name'    => __('Masonry Image', 'lambda-admin-td'),
            'id'      => 'masonry_image',
            'desc'    => __('An image that will be used for this post in the masonry list view.', 'lambda-admin-td'),
            'store'   => 'url',
            'type'    => 'upload',
            'default' => '',
        ),
        array(
            'name'    => __('Masonry Image Width ', 'lambda-admin-td'),
            'desc'    => __('Select the width that the masonry portfolio shortcode will use for this item (normal 1 column wide 2 columns)', 'lambda-admin-td'),
            'id'      => 'masonry_width',
            'type'    => 'radio',
            'options' => array(
                'normal' => __('Normal', 'lambda-admin-td'),
                'wide'   => __('Wide', 'lambda-admin-td'),
            ),
            'default' => 'normal',
        ),
    )
));


$product_category_options = array(
    array(
        'name'    => __('Product Columns', 'lambda-admin-td'),
        'desc'    => __('Number of columns to use for products on this page.', 'lambda-admin-td'),
        'id'      => 'product_columns',
        'type'    => 'select',
        'default' => 3,
        'options'    => array(
            '3'  => __('3 Columns', 'lambda-admin-td'),
            '2'  => __('2 Columns', 'lambda-admin-td'),
            '4'  => __('4 Columns', 'lambda-admin-td'),
            '5'  => __('5 Columns', 'lambda-admin-td')
        )
    ),
);

$oxy_theme->register_metabox(array(
    'id' => 'category_header',
    'title' => __('Category Header Type', 'lambda-admin-td'),
    'priority' => 'default',
    'context' => 'advanced',
    'taxonomies' => array('product_cat'),
    'fields' => array_merge($product_category_options, $override_header_options, $heading_options, $section_options)
));

$oxy_theme->register_metabox(array(
    'id' => 'tag_header',
    'title' => __('Product Tag Header Type', 'lambda-admin-td'),
    'priority' => 'default',
    'context' => 'advanced',
    'taxonomies' => array('product_tag'),
    'fields' => array_merge($product_category_options, $override_header_options, $heading_options, $section_options)
));

$oxy_theme->register_metabox(array(
    'id' => 'post_modal_options',
    'title' => __('Modal Options', 'lambda-admin-td'),
    'priority' => 'default',
    'context' => 'advanced',
    'pages' => array('oxy_modal'),
    'fields' => array(
        array(
            'name' => __('Fade Modal', 'lambda-admin-td'),
            'desc' => __('Apply a CSS fade transition to the modal.', 'lambda-admin-td'),
            'id'   => 'fade_modal',
            'type' => 'select',
            'default' => 'fade',
            'options' => array(
                'fade'    => __('On', 'lambda-admin-td'),
                'no-fade' => __('Off', 'lambda-admin-td'),
            )
        ),
        array(
            'name' => __('Modal Size', 'lambda-admin-td'),
            'desc' => __('Modal size can be large, normal or small.', 'lambda-admin-td'),
            'id'   => 'modal_size',
            'type' => 'select',
            'options' => array(
                'modal-lg' => __('Large Modal', 'lambda-admin-td'),
                'modal-nm' => __('Normal Modal', 'lambda-admin-td'),
                'modal-sm' => __('Small Modal', 'lambda-admin-td'),
            ),
            'default' => 'modal-nm',
        ),
    )
));
