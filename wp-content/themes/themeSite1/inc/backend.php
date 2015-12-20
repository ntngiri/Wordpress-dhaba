<?php
/**
 * Loads all theme specific admin backend functionality
 *
 * @package Lambda
 * @subpackage Admin
 * @since 0.1
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version 1.17.0
 */

/**
 * Flush permalinks when we save the post types option page
 *
 * @return void
 * @author
 **/
function oxy_update_permalinks()
{
    //Ensure the $wp_rewrite global is loaded
    global $wp_rewrite;
    //Call flush_rules() as a method of the $wp_rewrite object
    $wp_rewrite->flush_rules();
}
add_action('oxy-options-updated-' . THEME_SHORT . '-post-types', 'oxy_update_permalinks');

function oxy_add_custom_mime_types($mimes)
{
    return array_merge($mimes, array(
        'webm' => 'video/webm',
        'zip'  => 'multipart/x-zip'
    ));
}
add_filter('upload_mimes', 'oxy_add_custom_mime_types');

function oxy_create_social_options()
{
    $icons = include OXY_THEME_DIR . 'inc/options/global-options/social-icons-options.php';
    $fields = array();
    foreach ($icons as $icon => $name) {
        $fields[] =  array(
            'name'    => sprintf(__('%s URL', 'lambda-admin-td'), $name),
            'id'      => sprintf(__('%s', 'lambda-admin-td'), $icon),
            'type'    => 'text',
            'default' => '',
            'attr'    =>  array(
                'class'    => 'widefat',
           ),
        );
    }
    return $fields;
}

/**
 * turn off update nag from revolution slider
 *
 * @return void
 * @author
 **/
if (isset($productAdmin)) {
    remove_action('admin_notices', array($productAdmin, 'addActivateNotification'));
}

/**
 * Register the themes stack options
 *
 * @return void
 * @author
 **/
function oxy_register_stack_options($options)
{
    return include OXY_THEME_DIR . 'inc/stack-options.php';
}
add_filter('oxy_stack_options', 'oxy_register_stack_options', 10, 1);

/**
 * Register the themes stack options
 *
 * @return void
 * @author
 **/
function oxy_stack_scss($scss)
{
    $scss .= '@import "bootstrap/oxygenna-variables";@import "compass/css3";@import "theme/compass-mixins";@import "theme/skin";';
    return $scss;
}
add_filter('oxy_stack_scss', 'oxy_stack_scss', 10, 1);

/**
 * Change the themes stack labels
 *
 * @return void
 * @author
 **/
function oxy_stack_labels($labels)
{
    return array(
        'name'               => __('Skins', 'lambda-admin-td'),
        'singular_name'      => __('Skin', 'lambda-admin-td'),
        'add_new'            => __('Add New', 'lambda-admin-td'),
        'add_new_item'       => __('Add New Skin', 'lambda-admin-td'),
        'edit_item'          => __('Edit Skin', 'lambda-admin-td'),
        'new_item'           => __('New Skin', 'lambda-admin-td'),
        'all_items'          => __('All Skins', 'lambda-admin-td'),
        'view_item'          => __('View Skin', 'lambda-admin-td'),
        'search_items'       => __('Search Skin', 'lambda-admin-td'),
        'not_found'          => __('No Skin found', 'lambda-admin-td'),
        'not_found_in_trash' => __('No Skin found in Trash', 'lambda-admin-td'),
        'menu_name'          => __('Skins', 'lambda-admin-td')
    );
}
add_filter('oxy_stack_labels', 'oxy_stack_labels', 10, 1);

function oxy_edit_columns_skins($columns)
{
    $columns = array(
        'cb'                   => '<input type="checkbox" />',
        'title'                => __('Name', 'lambda-admin-td'),
        'activate'             => __('Activated', 'lambda-admin-td'),
        'date'                 => __('Date', 'lambda-admin-td'),
    );
    return $columns;
}
add_filter('manage_edit-oxy_stack_columns', 'oxy_edit_columns_skins');

/**
 * Main data for creating and installing the theme
 *
 * @return void
 * @author
 **/
function oxy_theme_install_data()
{
    return array(
        'action' => 'oxy_theme_list_installer',
        'nonce' => wp_create_nonce(THEME_SHORT . '-theme-list-installer'),
        'list' => array(
            array(
                'id' => 'oxy-skins',
                'title' => __('Install Theme Skins', 'lambda-admin-td'),
                'action' => 'oxy_theme_install_skins',
                'nonce' => wp_create_nonce(THEME_SHORT . '-oxy-skins')
            ),
            array(
                'id' => 'oxy-update-google-fonts',
                'title' => __('Update Google Fonts', 'lambda-admin-td'),
                'action' => 'google_fonts_list',
                'nonce' => wp_create_nonce('google-fetch-fonts-nonce')
            ),
            array(
                'id' => 'oxy-mega-menu',
                'title' => __('Install Mega Menu', 'lambda-admin-td'),
                'action' => 'oxy_theme_install_mega_menu',
                'nonce' => wp_create_nonce(THEME_SHORT . '-oxy-mega-menu')
            ),
            array(
                'id' => 'oxy-vc-templates',
                'title' => __('Install Default Visual Composer Templates', 'lambda-admin-td'),
                'action' => 'oxy_theme_vc_templates',
                'nonce' => wp_create_nonce(THEME_SHORT . '-oxy-vc-templates')
            ),
            array(
                'id' => 'oxy-defaults',
                'title' => __('Setup Default Options', 'lambda-admin-td'),
                'action' => 'oxy_theme_install_defaults',
                'nonce' => wp_create_nonce(THEME_SHORT . '-oxy-defaults')
            ),
        ),
        'afterInstall' => array(
            'createPopup' => true,
            'action' => 'oxy_theme_install_choice_page',
            'nonce' => wp_create_nonce(THEME_SHORT . '-theme-install-choice')
        )
    );
}
add_filter('oxy_theme_install_data', 'oxy_theme_install_data', 10, 1);

/**
 * returns a generic return object
 *
 * @return object status set to false
 * @author
 **/
function oxy_ajax_return_object()
{
    $return = new stdClass();
    $return->status = false;
    return $return;
}

/**
 * Installs default skins
 *
 * @return void
 **/
function oxy_theme_install_skins()
{
    @error_reporting(0); // Don't break the JSON result
    header('Content-Type: application/json');
    @set_time_limit(900); // 5 minutes should be PLENTY

    $ret = oxy_ajax_return_object();

    if (wp_verify_nonce($_POST['nonce'], THEME_SHORT . '-oxy-skins')) {
        $oxygenna_stack = OxygennaStacks::instance();
        $default_skins = include OXY_THEME_DIR . 'inc/installer/default-skins.php';
        foreach ($default_skins as $skin) {
            // check if default skin is already there
            $query_args = array(
                'meta_key' => THEME_SHORT . '-default-skin',
                'meta_value' => $skin['id'],
                'post_type' => 'oxy_stack'
            );
            $old_skins_found = get_posts($query_args);

            if (count($old_skins_found) === 0) {
                // Create post object
                $skin_post = array(
                  'post_title'    => $skin['name'],
                  'post_content'  => '',
                  'post_status'   => 'publish',
                  'post_type'     => 'oxy_stack'
                );


                // Insert the post into the database
                $post_id = wp_insert_post($skin_post);
                if (!is_wp_error($post_id)) {
                    // add meta tag to show this is a default skin
                    update_post_meta($post_id, THEME_SHORT . '-default-skin', $skin['id']);

                    $oxygenna_stack->import_stack($skin['data'], $post_id);

                    $css = $oxygenna_stack->compile_stack($post_id, 'scss_formatter_compressed');

                    update_post_meta($post_id, 'oxy_stack_css', $css);

                    $oxygenna_stack->update_css_in_file($post_id);
                }
            }
        }
        $ret->status = true;
    }
    echo json_encode($ret);
    die();
}
add_action('wp_ajax_oxy_theme_install_skins', 'oxy_theme_install_skins');

/**
 * Installs default options
 *
 * @return void
 **/
function oxy_theme_install_defaults()
{
    @error_reporting(0); // Don't break the JSON result
    header('Content-Type: application/json');

    $ret = oxy_ajax_return_object();

    if (wp_verify_nonce($_POST['nonce'], THEME_SHORT . '-oxy-defaults')) {
        // default woocommerce settings
        $catalog = array(
            'width'     => '700',
            'height'    => '',
            'crop'      => 0
        );

        $single = array(
            'width'     => '700',
            'height'    => '',
            'crop'      => 0
        );

        $thumbnail = array(
            'width'     => '90',
            'height'    => '',
            'crop'      => 0
        );

        // Image sizes
        update_option('shop_catalog_image_size', $catalog);       // Product category thumbs
        update_option('shop_single_image_size', $single);         // Single product image
        update_option('shop_thumbnail_image_size', $thumbnail);   // Image gallery thumbs

        // set skin option to first skin
        $skins = get_posts(array(
            'posts_per_page' => 1,
            'post_type'      => 'oxy_stack',
            'orderby'        => 'title',
            'order'          => 'DESC'
        ));
        if (count($skins) > 0) {
            $options = get_option(THEME_SHORT . '-options');
            $options['site_stack'] = $skins[0]->ID;
            update_option(THEME_SHORT . '-options', $options);
        }

        $ret->status = true;
    }
    echo json_encode($ret);
    die();
}
add_action('wp_ajax_oxy_theme_install_defaults', 'oxy_theme_install_defaults');

/**
 * Installs mega menu posts
 *
 * @return void
 * @author
 **/
function oxy_theme_install_mega_menu()
{
    @error_reporting(0); // Don't break the JSON result
    header('Content-Type: application/json');

    $ret = oxy_ajax_return_object();

    if (wp_verify_nonce($_POST['nonce'], THEME_SHORT . '-oxy-mega-menu')) {
        $menus = get_posts(array('post_type' => 'oxy_mega_menu'));
        if (count($menus) === 0) {
            // Create post object
            $my_post = array(
              'post_title'    => 'Mega Menu',
              'post_content'  => '',
              'post_status'   => 'publish',
              'post_type'     => 'oxy_mega_menu'
            );

            // Insert the post into the database
            wp_insert_post($my_post);
        }

        $menus = get_posts(array('post_type' => 'oxy_mega_columns'));
        if (count($menus) === 0) {
            $columns = array(
                'col-md-3'  => __('One Quarter Column (1/4)', 'lambda-admin-td'),
                'col-md-4'  => __('One Third Column (1/3)', 'lambda-admin-td'),
            );

            foreach ($columns as $content => $title) {
                // Create post object
                $column_post = array(
                  'post_title'    => $title,
                  'post_content'  => $content,
                  'post_status'   => 'publish',
                  'post_type'     => 'oxy_mega_columns'
                );

                // Insert the post into the database
                wp_insert_post($column_post);
            }
        }
        $ret->status = true;
    }
    echo json_encode($ret);
    die();
}
add_action('wp_ajax_oxy_theme_install_mega_menu', 'oxy_theme_install_mega_menu');


/**
 * Returns a files contents
 *
 * @return void
 * @author
 **/
function oxy_file_get_contents($path)
{
    ob_start();
    include OXY_THEME_DIR . $path;
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}


/**
 * Installs default visual composer templages
 *
 * @return void
 **/
function oxy_theme_vc_templates()
{
    @error_reporting(0); // Don't break the JSON result
    header('Content-Type: application/json');

    $ret = oxy_ajax_return_object();

    if (wp_verify_nonce($_POST['nonce'], THEME_SHORT . '-oxy-vc-templates')) {
        $template_file = oxy_file_get_contents('inc/options/defaults/default-vc-templates.php');
        $templates = unserialize($template_file);
        update_option('wpb_js_templates', $templates);
        $ret->status = true;
    }

    echo json_encode($ret);
    die();
}
add_action('wp_ajax_oxy_theme_vc_templates', 'oxy_theme_vc_templates');

/**
 * Installs default visual composer templages
 *
 * @return void
 **/
function oxy_theme_install_choice_page()
{
    if (wp_verify_nonce($_GET['nonce'], THEME_SHORT . '-theme-install-choice')) {
        include(OXY_THEME_DIR . 'partials/installer/install-choice-page.php');
    }
    die();
}
add_action('wp_ajax_oxy_theme_install_choice_page', 'oxy_theme_install_choice_page');


function oxy_admin_enqueue_widget_script($hook)
{
    global $oxy_theme;
    if ($hook == 'widgets.php') {
        wp_enqueue_script('oxy-admin-widgets', OXY_THEME_URI . 'inc/assets/js/widgets.js', array('jquery'), null, true);

        wp_localize_script('oxy-admin-widgets', 'oxyWidgetInfo', array(
            'footerColumns'      => $oxy_theme->get_option('footer_columns', 4),
            'upperFooterColumns' => $oxy_theme->get_option('upper_footer_columns', 0),
        ));
    }
}
add_action('admin_enqueue_scripts', 'oxy_admin_enqueue_widget_script');


function skins_admin_script($hook)
{
    global $post_type;
    global $pagenow;

    if( 'oxy_stack' == $post_type || $pagenow == 'customize.php'){
        wp_enqueue_style('oxy-stack-admin', OXY_THEME_URI . 'inc/assets/stylesheets/backend.css');
    }
}
add_action('admin_enqueue_scripts', 'skins_admin_script');


/**
 * Saves some stack variables as options for menu data needed in js
 *
 * @return void
 * @author
 **/
function oxy_stack_stack_vars_as_options($options)
{
    $options['navbar_height']              = 'navbar-height';
    $options['navbar_height_after_scroll'] = 'navbar-scrolled';
    return $options;
}
add_filter('oxy_stack_stack_vars_as_options', 'oxy_stack_stack_vars_as_options');

// Deregistering post types
if ( ! function_exists( 'unregister_post_type' ) ) {

    function unregister_post_type( $post_type ) {
        global $wp_post_types;
        if ( isset( $wp_post_types[ 'vc_grid_item' ] ) ) {
            unset( $wp_post_types[ 'vc_grid_item' ] );
            return true;
        }
        return false;
    }
}

// Enabling the media upload of SVGs
function oxy_cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

if ( oxy_get_option('enable_svg') !== 'off') {
    add_filter('upload_mimes', 'oxy_cc_mime_types');
}

// Remove Grid Elements option page for VC
add_action( 'admin_menu', 'adjust_the_wp_menu', 50 );

function adjust_the_wp_menu() {
    if ( defined('VC_PAGE_MAIN_SLUG') && class_exists('Vc_Grid_Item_Editor') ) {
        remove_submenu_page( VC_PAGE_MAIN_SLUG, 'edit.php?post_type=' . rawurlencode( Vc_Grid_Item_Editor::postType() ) );
    }
}