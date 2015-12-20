<?php
/**
 * Oxygenna.com
 *
 * :: *(TEMPLATE_NAME)*
 * :: *(COPYRIGHT)*
 * :: *(LICENCE)*
 */

function oxy_fetch_custom_columns($column)
{
    global $post,$oxy_theme;
    switch($column) {
        case 'menu_order':
            echo $post->menu_order;
            echo '<input id="qe_slide_order_"' . $post->ID . '" type="hidden" value="' . $post->menu_order . '" />';
            break;

        case 'activate':
            $site_stack_id = $oxy_theme->get_option('site_stack');
            $output = ($site_stack_id == $post->ID) ? '<span class="oxy_activated"></span>' : '';
            echo $output;
            break;

        case 'featured-image':
            $editlink = get_edit_post_link($post->ID);
            echo '<a href="' . $editlink . '">' . get_the_post_thumbnail($post->ID, 'thumbnail') . '</a>';
            break;

        case 'slideshows-category':
            echo get_the_term_list($post->ID, 'oxy_slideshow_categories', '', ', ');
            break;

        case 'service-category':
            echo get_the_term_list($post->ID, 'oxy_service_category', '', ', ');
            break;

        case 'departments-category':
            echo get_the_term_list($post->ID, 'oxy_staff_department', '', ', ');
            break;

        case 'job-title':
            echo get_post_meta($post->ID, THEME_SHORT . '_position', true);
            break;

        case 'portfolio-category':
            echo get_the_term_list($post->ID, 'oxy_portfolio_categories', '', ', ');
            break;

        case 'testimonial-group':
            echo get_the_term_list($post->ID, 'oxy_testimonial_group', '', ', ');
            break;
        case 'testimonial-citation':
            echo get_post_meta($post->ID, THEME_SHORT . '_citation', true);
            break;

        default:
            // do nothing
            break;
    }
}
add_action('manage_posts_custom_column', 'oxy_fetch_custom_columns');

/**
 * Slideshow Custom Post
 */

$labels = array(
    'name'               => __('Slideshow Images', 'lambda-admin-td'),
    'singular_name'      => __('Slideshow Image', 'lambda-admin-td'),
    'add_new'            => __('Add New', 'lambda-admin-td'),
    'add_new_item'       => __('Add New Image', 'lambda-admin-td'),
    'edit_item'          => __('Edit Image', 'lambda-admin-td'),
    'new_item'           => __('New Image', 'lambda-admin-td'),
    'view_item'          => __('View Image', 'lambda-admin-td'),
    'search_items'       => __('Search Images', 'lambda-admin-td'),
    'not_found'          => __('No images found', 'lambda-admin-td'),
    'not_found_in_trash' => __('No images found in Trash', 'lambda-admin-td'),
    'menu_name'          => __('Slider Images', 'lambda-admin-td')
);

$args = array(
    'labels'    => $labels,
    'public'    => false,
    'show_ui'   => true,
    'query_var' => false,
    'rewrite'   => false,
    'menu_icon' => 'dashicons-slides',
    'supports'  => array('title', 'editor', 'thumbnail', 'page-attributes')
);

// create custom post
register_post_type('oxy_slideshow_image', $args);

// move featured image box on slideshow
function oxy_move_slideshow_meta_box()
{
    remove_meta_box('postimagediv', 'oxy_slideshow_image', 'side');
    add_meta_box('postimagediv', __('Slideshow Image', 'lambda-admin-td'), 'post_thumbnail_meta_box', 'oxy_slideshow_image', 'advanced', 'low');
}
add_action('do_meta_boxes', 'oxy_move_slideshow_meta_box');

function oxy_edit_columns_slideshow($columns)
{
    $columns = array(
        'cb'                  => '<input type="checkbox" />',
        'title'               => __('Image Title', 'lambda-admin-td'),
        'featured-image'      => __('Image', 'lambda-admin-td'),
        'menu_order'          => __('Order', 'lambda-admin-td'),
        'slideshows-category' => __('Slideshows', 'lambda-admin-td'),
    );
    return $columns;
}
add_filter('manage_edit-oxy_slideshow_image_columns', 'oxy_edit_columns_slideshow');


/* --------------------- SERVICES ------------------------*/

$labels = array(
    'name'               => __('Services', 'lambda-admin-td'),
    'singular_name'      => __('Service', 'lambda-admin-td'),
    'add_new'            => __('Add New', 'lambda-admin-td'),
    'add_new_item'       => __('Add New Service', 'lambda-admin-td'),
    'edit_item'          => __('Edit Service', 'lambda-admin-td'),
    'new_item'           => __('New Service', 'lambda-admin-td'),
    'all_items'          => __('All Services', 'lambda-admin-td'),
    'view_item'          => __('View Service', 'lambda-admin-td'),
    'search_items'       => __('Search Services', 'lambda-admin-td'),
    'not_found'          => __('No Service found', 'lambda-admin-td'),
    'not_found_in_trash' => __('No Service found in Trash', 'lambda-admin-td'),
    'menu_name'          => __('Services', 'lambda-admin-td')
);

// fetch service slug
$service_slug = trim(_x(oxy_get_option('services_slug'), 'URL slug', 'lambda-admin-td'));
if (empty($service_slug)) {
    $service_slug = _x('our-services', 'URL slug', 'lambda-admin-td');
}

$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'menu_icon'          => 'dashicons-flag',
    'supports'           => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes', 'revisions'),
    'rewrite'            => array('slug' => $service_slug, 'with_front' => false, 'pages' => true, 'feeds'=>false),
);
register_post_type('oxy_service', $args);

function oxy_edit_columns_services($columns)
{
   // $columns['featured_image']= 'Featured Image';
    $columns = array(
        'cb'             => '<input type="checkbox" />',
        'title'          => __('Service', 'lambda-admin-td'),
        'featured-image' => __('Image', 'lambda-admin-td'),
        'service-category'     => __('Category', 'lambda-admin-td')
    );
    return $columns;
}
add_filter('manage_edit-oxy_service_columns', 'oxy_edit_columns_services');

/* ------------------ TESTIMONIALS -----------------------*/

$labels = array(
    'name'               => __('Testimonial', 'lambda-admin-td'),
    'singular_name'      => __('Testimonial', 'lambda-admin-td'),
    'add_new'            => __('Add New', 'lambda-admin-td'),
    'add_new_item'       => __('Add New Testimonial', 'lambda-admin-td'),
    'edit_item'          => __('Edit Testimonial', 'lambda-admin-td'),
    'new_item'           => __('New Testimonial', 'lambda-admin-td'),
    'all_items'          => __('All Testimonial', 'lambda-admin-td'),
    'view_item'          => __('View Testimonial', 'lambda-admin-td'),
    'search_items'       => __('Search Testimonial', 'lambda-admin-td'),
    'not_found'          => __('No Testimonial found', 'lambda-admin-td'),
    'not_found_in_trash' => __('No Testimonial found in Trash', 'lambda-admin-td'),
    'menu_name'          => __('Testimonials', 'lambda-admin-td')
);

$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'menu_icon'          => 'dashicons-format-quote',
    'supports'           => array('title', 'editor', 'thumbnail', 'page-attributes', 'revisions')
);
register_post_type('oxy_testimonial', $args);

$labels = array(
    'name'          => __('Groups', 'lambda-admin-td'),
    'singular_name' => __('Group', 'lambda-admin-td'),
    'search_items'  => __('Search Groups', 'lambda-admin-td'),
    'all_items'     => __('All Groups', 'lambda-admin-td'),
    'edit_item'     => __('Edit Group', 'lambda-admin-td'),
    'update_item'   => __('Update Group', 'lambda-admin-td'),
    'add_new_item'  => __('Add New Group', 'lambda-admin-td'),
    'new_item_name' => __('New Group Name', 'lambda-admin-td')
);

register_taxonomy(
    'oxy_testimonial_group',
    'oxy_testimonial',
    array(
        'hierarchical' => true,
        'labels'       => $labels,
        'show_ui'      => true,
        'query_var'    => true,
   )
);

function oxy_edit_columns_testimonial($columns)
{
   // $columns['featured_image']= 'Featured Image';
    $columns = array(
        'cb'                   => '<input type="checkbox" />',
        'title'                => __('Author', 'lambda-admin-td'),
        'featured-image'       => __('Image', 'lambda-admin-td'),
        'testimonial-citation' => __('Citation', 'lambda-admin-td'),
        'testimonial-group'    => __('Group', 'lambda-admin-td')
    );
    return $columns;
}
add_filter('manage_edit-oxy_testimonial_columns', 'oxy_edit_columns_testimonial');


/* --------------------- STAFF ------------------------*/

$labels = array(
    'name'               => __('Staff', 'lambda-admin-td'),
    'singular_name'      => __('Staff', 'lambda-admin-td'),
    'add_new'            => __('Add New', 'lambda-admin-td'),
    'add_new_item'       => __('Add New Staff', 'lambda-admin-td'),
    'edit_item'          => __('Edit Staff', 'lambda-admin-td'),
    'new_item'           => __('New Staff', 'lambda-admin-td'),
    'all_items'          => __('All Staff', 'lambda-admin-td'),
    'view_item'          => __('View Staff', 'lambda-admin-td'),
    'search_items'       => __('Search Staff', 'lambda-admin-td'),
    'not_found'          => __('No Staff found', 'lambda-admin-td'),
    'not_found_in_trash' => __('No Staff found in Trash', 'lambda-admin-td'),
    'menu_name'          => __('Staff', 'lambda-admin-td')
);

// fetch staff slug
$staff_slug = trim(_x(oxy_get_option('staff_slug'), 'URL slug', 'lambda-admin-td'));
if (empty($staff_slug)) {
    $staff_slug = _x('staff', 'URL slug', 'lambda-admin-td');
}

$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'menu_icon'          => 'dashicons-businessman',
    'supports'           => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes', 'revisions'),
    'rewrite' => array('slug' => $staff_slug, 'with_front' => false, 'pages' => true, 'feeds'=>false),
);
register_post_type('oxy_staff', $args);

$labels = array(
    'name'          => __('Departments', 'lambda-admin-td'),
    'singular_name' => __('Department', 'lambda-admin-td'),
    'search_items'  =>  __('Search Departments', 'lambda-admin-td'),
    'all_items'     => __('All Departments', 'lambda-admin-td'),
    'edit_item'     => __('Edit Department', 'lambda-admin-td'),
    'update_item'   => __('Update Department', 'lambda-admin-td'),
    'add_new_item'  => __('Add New Department', 'lambda-admin-td'),
    'new_item_name' => __('New Department Name', 'lambda-admin-td')
);

register_taxonomy(
    'oxy_staff_department',
    'oxy_staff',
    array(
        'hierarchical' => true,
        'labels'       => $labels,
        'show_ui'      => true,
   )
);

function oxy_edit_columns_staff($columns)
{
   // $columns['featured_image']= 'Featured Image';
    $columns = array(
        'cb'                   => '<input type="checkbox" />',
        'title'                => __('Name', 'lambda-admin-td'),
        'featured-image'       => __('Image', 'lambda-admin-td'),
        'job-title'            => __('Job Title', 'lambda-admin-td'),
        'departments-category' => __('Department', 'lambda-admin-td')
    );
    return $columns;
}
add_filter('manage_edit-oxy_staff_columns', 'oxy_edit_columns_staff');


/***************** PORTFOLIO *******************/

$labels = array(
    'name'               => __('Portfolio Items', 'lambda-admin-td'),
    'singular_name'      => __('Portfolio Item', 'lambda-admin-td'),
    'add_new'            => __('Add New', 'lambda-admin-td'),
    'add_new_item'       => __('Add New Portfolio Item', 'lambda-admin-td'),
    'edit_item'          => __('Edit Portfolio Item', 'lambda-admin-td'),
    'new_item'           => __('New Portfolio Item', 'lambda-admin-td'),
    'view_item'          => __('View Portfolio Item', 'lambda-admin-td'),
    'search_items'       => __('Search Portfolio Items', 'lambda-admin-td'),
    'not_found'          =>  __('No images found', 'lambda-admin-td'),
    'not_found_in_trash' => __('No images found in Trash', 'lambda-admin-td'),
    'parent_item_colon'  => '',
    'menu_name'          => __('Portfolio Items', 'lambda-admin-td')
);

// fetch portfolio slug
$permalink_slug = trim(_x(oxy_get_option('portfolio_slug'), 'URL slug', 'lambda-admin-td'));
if (empty($permalink_slug)) {
    $permalink_slug = _x('portfolio', 'URL slug', 'lambda-admin-td');
}

$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'query_var'          => true,
    'has_archive'        => true,
    'capability_type'    => 'post',
    'hierarchical'       => false,
    'menu_position'      => null,
    'menu_icon'          => 'dashicons-portfolio',
    'supports'           => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'comments'),
    'rewrite' => array('slug' => $permalink_slug, 'with_front' => false, 'pages' => true, 'feeds'=>false),
);

// create custom post
register_post_type('oxy_portfolio_image', $args);

// Register portfolio taxonomy
$labels = array(
    'name'          => __('Categories', 'lambda-admin-td'),
    'singular_name' => __('Category', 'lambda-admin-td'),
    'search_items'  =>  __('Search Categories', 'lambda-admin-td'),
    'all_items'     => __('All Categories', 'lambda-admin-td'),
    'edit_item'     => __('Edit Category', 'lambda-admin-td'),
    'update_item'   => __('Update Category', 'lambda-admin-td'),
    'add_new_item'  => __('Add New Category', 'lambda-admin-td'),
    'new_item_name' => __('New Category Name', 'lambda-admin-td')
);

register_taxonomy(
    'oxy_portfolio_categories',
    'oxy_portfolio_image',
    array(
        'hierarchical' => true,
        'labels'       => $labels,
        'show_ui'      => true,
        'query_var'    => true,
   )
);

function oxy_edit_columns_portfolio($columns)
{
   // $columns['featured_image']= 'Featured Image';
    $columns = array(
        'cb'                 => '<input type="checkbox" />',
        'title'              => __('Item', 'lambda-admin-td'),
        'featured-image'     => __('Image', 'lambda-admin-td'),
        'menu_order'         => __('Order', 'lambda-admin-td'),
        'portfolio-category' => __('Categories', 'lambda-admin-td')
    );
    return $columns;
}
add_filter('manage_edit-oxy_portfolio_image_columns', 'oxy_edit_columns_portfolio');

$labels = array(
    'name'               => __('Mega Menu', 'lambda-admin-td'),
    'singular_name'      => __('Mega Menu', 'lambda-admin-td'),
);

$args = array(
    'labels'             => $labels,
    'public'             => false,
    'publicly_queryable' => false,
    'show_ui'            => false,
    'show_in_menu'       => true,
    'query_var'          => false,
    'show_in_nav_menus'  => true,
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => null,
);
register_post_type('oxy_mega_menu', $args);

$labels = array(
    'name'               => __('Mega Menu Columns', 'lambda-admin-td'),
    'singular_name'      => __('Mega Menu Columns', 'lambda-admin-td'),
);

$args = array(
    'labels'             => $labels,
    'public'             => false,
    'publicly_queryable' => false,
    'show_ui'            => false,
    'show_in_menu'       => false,
    'query_var'          => false,
    'show_in_nav_menus'  => true,
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => null,
);
register_post_type('oxy_mega_columns', $args);

function oxy_register_taxonomies()
{
    // Register slideshow taxonomy
    $labels = array(
        'name'          => __('Slideshows', 'lambda-admin-td'),
        'singular_name' => __('Slideshow', 'lambda-admin-td'),
        'search_items'  => __('Search Slideshows', 'lambda-admin-td'),
        'all_items'     => __('All Slideshows', 'lambda-admin-td'),
        'edit_item'     => __('Edit Slideshow', 'lambda-admin-td'),
        'update_item'   => __('Update Slideshow', 'lambda-admin-td'),
        'add_new_item'  => __('Add New Slideshow', 'lambda-admin-td'),
        'new_item_name' => __('New Slideshow Name', 'lambda-admin-td')
    );

    register_taxonomy(
        'oxy_slideshow_categories',
        'oxy_slideshow_image',
        array(
            'hierarchical' => true,
            'labels'       => $labels,
            'show_ui'      => true,
            'query_var'    => false,
            'rewrite'      => false
       )
    );

    $labels = array(
        'name'          => __('Categories', 'lambda-admin-td'),
        'singular_name' => __('Category', 'lambda-admin-td'),
        'search_items'  => __('Search Categories', 'lambda-admin-td'),
        'all_items'     => __('All Categories', 'lambda-admin-td'),
        'edit_item'     => __('Edit Category', 'lambda-admin-td'),
        'update_item'   => __('Update Category', 'lambda-admin-td'),
        'add_new_item'  => __('Add New Category', 'lambda-admin-td'),
        'new_item_name' => __('New Category Name', 'lambda-admin-td')
    );

    register_taxonomy(
        'oxy_service_category',
        'oxy_service',
        array(
            'hierarchical' => true,
            'labels'       => $labels,
            'show_ui'      => true,
       )
    );
}


/* --------------------- MODALS -----------------------*/

$labels = array(
    'name'               => __('Modal', 'lambda-admin-td'),
    'singular_name'      => __('Modal', 'lambda-admin-td'),
    'add_new'            => __('Add New', 'lambda-admin-td'),
    'add_new_item'       => __('Add New Modal', 'lambda-admin-td'),
    'edit_item'          => __('Edit Modal', 'lambda-admin-td'),
    'new_item'           => __('New Modal', 'lambda-admin-td'),
    'all_items'          => __('All Modals', 'lambda-admin-td'),
    'view_item'          => __('View Modal', 'lambda-admin-td'),
    'search_items'       => __('Search Modal', 'lambda-admin-td'),
    'not_found'          => __('No Modals found', 'lambda-admin-td'),
    'not_found_in_trash' => __('No Modals found in Trash', 'lambda-admin-td'),
    'menu_name'          => __('Modals', 'lambda-admin-td')
);

$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'menu_icon'          => 'dashicons-lightbulb',
    'supports'           => array('title', 'editor', 'thumbnail', 'page-attributes', 'revisions')
);
register_post_type('oxy_modal', $args);


add_action('init', 'oxy_register_taxonomies');
