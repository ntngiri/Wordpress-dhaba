<?php
/**
 * Main Stacks Class
 *
 * @package Lambda
 * @subpackage Stacks
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version 1.17.0
 * @author Oxygenna.com
 */

include_once OXY_TF_DIR . 'inc/OxygennaOptions.php';


class OxygennaStacks
{
    private static $instance;
    private $post_type = 'oxy_stack';
    private $option_name;
    private $fontstack = array();
    private $options;

    public static function instance()
    {
        if (! self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function __construct()
    {
        $this->option_name = THEME_SHORT . '_stack_options';
        add_action('init', array(&$this, 'init'));

        add_action('wp_head', array(&$this, 'wp_head'), 100);

        add_action('current_screen', array(&$this, 'current_screen'));

        add_action('save_post', array(&$this, 'save_post'), 12);

        if (is_admin()) {
            $this->register_metabox();

            add_action('add_meta_boxes', array(&$this, 'register_import_metabox'));

            // create new option set with post type as menu
            $this->options = new OxygennaOptions(THEME_SHORT . '_stack_option_group', $this->option_name, array(
                'menu_slug' => 'edit.php?post_type=' . $this->post_type
            ));

            $stack_options = include OXY_STACKS_DIR . 'inc/settings-options.php';
            $this->options->add_option_page($stack_options);

            // add hook to options to check if the header / file save setting has changed
            // and if it has resave the file / header css
            add_action('oxy-validate-options-lambda_stack_option_group', array(&$this, 'settings_validate_options'));
        }
    }

    public function init()
    {
        // create stacks custom post type
        $labels = array(
            'name'               => __('Stacks', 'lambda-admin-td'),
            'singular_name'      => __('Stack', 'lambda-admin-td'),
            'add_new'            => __('Add New', 'lambda-admin-td'),
            'add_new_item'       => __('Add New Stack', 'lambda-admin-td'),
            'edit_item'          => __('Edit Stack', 'lambda-admin-td'),
            'new_item'           => __('New Stack', 'lambda-admin-td'),
            'all_items'          => __('All Stacks', 'lambda-admin-td'),
            'view_item'          => __('View Stack', 'lambda-admin-td'),
            'search_items'       => __('Search Stack', 'lambda-admin-td'),
            'not_found'          => __('No Stack found', 'lambda-admin-td'),
            'not_found_in_trash' => __('No Stack found in Trash', 'lambda-admin-td'),
            'menu_name'          => __('Stacks', 'lambda-admin-td')
        );

        $labels = apply_filters('oxy_stack_labels', $labels);

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => false,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => false,
            'capability_type'    => 'post',
            'menu_position'      => null,
            'menu_icon'          => 'dashicons-art',
            'supports'           => array( 'title' )
        );
        register_post_type($this->post_type, $args);
    }

    public function settings_validate_options()
    {
        // get settings page options
        $settings_options = get_option($this->option_name);

        // did the CSS save option change?
        if ($settings_options['css_save_to'] !== $_POST[$this->option_name]['css_save_to']
            || $settings_options['css_format'] !== $_POST[$this->option_name]['css_format']) {
            // the save option has changed so we better resave the current stack
            $stack_id = apply_filters('oxy-stack-current-id', '');
            if (!empty($stack_id)) {
                $this->save_post_css($stack_id, $_POST[$this->option_name]);
            }
        }
    }

    public function register_metabox()
    {
        global $oxy_theme;
        // get theme stack options
        $stack_options = apply_filters('oxy_stack_options', array());

        foreach ($stack_options as $box) {
            $oxy_theme->register_metabox(array(
                'id'       => $box['id'],
                'title'    => $box['title'],
                'priority' => 'default',
                'context'  => 'advanced',
                'pages'    => array($this->post_type),
                'fields'   => $box['fields']
            ));
        }

    }

    public function register_import_metabox()
    {
        // register import / export metabox
        add_meta_box('oxy-stack-imp-exp', __('Import / Export', 'lambda-admin-td'), array(&$this, 'import_metabox'), $this->post_type, 'advanced', 'low');
    }

    public function current_screen()
    {
        $screen = get_current_screen();
        if ($this->post_type === $screen->post_type && 'post' === $screen->base) {
            wp_enqueue_style('edit-stack', OXY_STACKS_URI . 'assets/css/edit-stack.css');
        }
    }

    public function save_post($post_id)
    {
        // get settings page options
        $settings_options = get_option($this->option_name);

        // If this isn't a 'stack' post, don't update it.
        if (isset($_POST['post_type']) && $this->post_type === $_POST['post_type']) {
            if (isset($_POST['import_stack']) && isset($_POST['import_data']) && !empty($_POST['import_data'])) {
                $this->import_stack($_POST['import_data'], $post_id);
            }
            $this->save_post_css($post_id, $settings_options);

            // check if we have any variables we want saved as options
            $theme_option_variables = apply_filters('oxy_stack_stack_vars_as_options', array());
            if (!empty($theme_option_variables)) {
                foreach ($theme_option_variables as $theme_option => $stack_variable_id) {
                    $custom = get_post_custom($post_id);
                    $key = THEME_SHORT . '_' . $stack_variable_id;
                    if (isset($custom[$key])) {
                        // we found the stack variable save it as a theme option
                        update_option($theme_option, $custom[$key][0]);
                    }
                }
            }
        }
    }

    public function save_post_css($post_id, $settings_options)
    {
        // compile the stack to CSS
        $css = $this->compile_stack($post_id, $settings_options['css_format']);

        update_post_meta($post_id, 'oxy_stack_css', $css);

        $this->save_css_to_file($post_id, $css);
    }

    public function update_css_in_file($post_id)
    {
        $css = get_post_meta($post_id, 'oxy_stack_css', true);
        if (!empty($css)) {
            $this->save_css_to_file($post_id, $css);
        }
    }

    public function save_css_to_file($post_id, $css)
    {
        $access_type = get_filesystem_method();
        if ($access_type === 'direct') {
            // okay, let's see about getting credentials
            $url = wp_nonce_url('post.php?post=' . $post_id, 'edit');
            if (false === ($creds = request_filesystem_credentials($url))) {
                // if we get here, then we don't have credentials yet,
                // but have just produced a form for the user to fill in,
                // so stop processing for now
                wp_die('Please input your credentials above to save the CSS file.');
            }


            // now we have some credentials, try to get the wp_filesystem running
            if (!WP_Filesystem($creds)) {
                // our credentials were no good, ask the user for them again
                request_filesystem_credentials($url);
                wp_die('Please input your credentials above to save the CSS file.');
            }

            // get the upload directory and make a test.txt file
            $wp_upload_dir = wp_upload_dir();
            $upload_dir = trailingslashit($wp_upload_dir['basedir'] . DIRECTORY_SEPARATOR . THEME_SHORT);
            $filename = $upload_dir . 'stack-' . $post_id . '.css';

            global $wp_filesystem;
            // check to see if we have a theme directory
            if (!$wp_filesystem->is_dir($upload_dir)) {
                /* directory didn't exist, so let's create it */
                $wp_filesystem->mkdir($upload_dir);
                // and lets add a blank index.html to be safe
                $index_filename = $upload_dir . 'index.html';
                if (!$wp_filesystem->put_contents($index_filename, '', FS_CHMOD_FILE)) {
                    wp_die(__('Error Saving Index File', 'lambda-admin-td'));
                }
            }

            // everything should be set so lets save the CSS file.
            if (!$wp_filesystem->put_contents($filename, $css, FS_CHMOD_FILE)) {
                wp_die(__('Error Saving File', 'lambda-admin-td'));
            }
        }
    }

    public function compile_stack($post_id, $css_format)
    {
        // create return value
        $css = '';
        // reset fontstack array
        $this->fontstack = array();

        // setup sass compiler
        if (!class_exists('scssc')) {
            require OXY_THEME_DIR . 'vendor/leafo/scssphp/scss.inc.php';
        }
        $scss = new scssc();
        $scss->addImportPath(OXY_THEME_DIR . 'assets/scss');
        $scss->setNumberPrecision(8);
        $scss->setFormatter($css_format);

        // create sass code
        $scss_code = $this->variables($post_id);
        $scss_code .= apply_filters('oxy_stack_scss', '');

        // compile sass and store in metadata
        try {
            $css = $scss->compile($scss_code);
        } catch (Exception $e) {
            print_r($e);
        }

        // create extra font js / links
        $this->build_before_css_code($post_id);

        return $css;
    }

    private function variables($post_id)
    {
        // grab all field variables and convert them to sass vars
        $stack_options = apply_filters('oxy_stack_options', array());
        $variables = '';
        $custom = get_post_custom($post_id);
        foreach ($stack_options as $box) {
            foreach ($box['fields'] as $field) {
                $key = THEME_SHORT . '_' . $field['id'];
                if (isset($custom[$key])) {
                    // get value from custom data
                    $value = $custom[$key][0];
                    // do we need to filter this?
                    if (isset($field['filter'])) {
                        $value = $this->$field['filter']($value, $post_id);
                    }
                    // add vairable to list
                    $variables .= '$' . $field['id'] . ':' . $value . ';';
                }
            }
        }
        return $variables;
    }

    public function build_before_css_code($post_id)
    {
        global $oxy_typography;
        $extra_code = '';

        // check for google fonts
        $google_fonts_url = $oxy_typography->create_google_import_url($this->fontstack);
        if (!empty($google_fonts_url)) {
            $extra_code .= '<link href="' . $google_fonts_url . '" rel="stylesheet" type="text/css">';
        }

        $typekit_js = $oxy_typography->create_font_js($this->fontstack);
        if (!empty($typekit_js)) {
            $extra_code .= $typekit_js;
        }

        update_post_meta($post_id, 'extra_code', $extra_code);
    }

    public function wp_head()
    {
        global $oxy_theme;
        $stack_id = apply_filters('oxy-stack-current-id', '');
        if (!empty($stack_id)) {
            // get settings page options
            $settings_options = get_option($this->option_name);

            // output extra js
            $extra_code = get_post_meta($stack_id, 'extra_code', true);
            echo $extra_code;

            switch($settings_options['css_save_to']) {
                case 'header':
                    $oxy_stack_css = get_post_meta($stack_id, 'oxy_stack_css', true);
                    echo '<style>' . $oxy_stack_css . '</style>';
                    break;
                case 'file':
                    $upload_dir = wp_upload_dir();
                    $css_folder_url = trailingslashit($upload_dir['baseurl'] . DIRECTORY_SEPARATOR . THEME_SHORT);
                    echo '<link rel="stylesheet" type="text/css" href="' . $css_folder_url . 'stack-' . $stack_id . '.css">';
                    break;
                default:
                    // do nothing
                    break;
            }
        }
    }

    public function var_filter_add_px($value, $post_id)
    {
        return $value . 'px';
    }

    public function var_filter_font_family($value, $post_id)
    {
        $font = json_decode(base64_decode($value), true);

        // check to see if font has already been added
        $already_added_font = false;
        foreach ($this->fontstack as $font_index => $existing_font) {
            if ($font['value'] === $existing_font['value']) {
                // change flag so we no longer add this font, just modify the existing one
                $already_added_font = true;
                // check if variant is already chosen
                foreach ($font['variants'] as $variant) {
                    // if variant hasnt been added we better add it
                    if (!in_array($variant, $existing_font['variants'])) {
                        $this->fontstack[$font_index]['variants'][] = $variant;
                    }
                }
                // check if subset is already chosen
                foreach ($font['subsets'] as $subsets) {
                    // if variant hasnt been added we better add it
                    if (!in_array($subsets, $existing_font['subsets'])) {
                        $this->fontstack[$font_index]['subsets'][] = $subsets;
                    }
                }
            }
        }

        // if existing font hasnt been modified its a new font so add it to the stack
        if (!$already_added_font) {
            // add font to stack
            $this->fontstack[] = $font;
        }

        switch ($font['provider']) {
            case 'google_fonts':
            case 'system_fonts':
                return $font['family'];
                break;
            default:
                return $font['css_stack'];
                break;
        }
    }

    public function import_stack($import_data, $post_id)
    {
        $import_data = unserialize(base64_decode($import_data));
        if (is_array($import_data)) {
            $stack_options = apply_filters('oxy_stack_options', array());
            foreach ($stack_options as $box) {
                foreach ($box['fields'] as $field) {
                    if (isset($import_data[$field['id']])) {
                        update_post_meta($post_id, THEME_SHORT . '_' . $field['id'], $import_data[$field['id']]);
                    }
                }
            }
        }
    }

    public function import_metabox($post)
    {
        $variables = array();
        // grab all field variables and convert them to sass vars
        $stack_options = apply_filters('oxy_stack_options', array());
        foreach ($stack_options as $box) {
            foreach ($box['fields'] as $field) {
                $variables[$field['id']] = get_post_meta($post->ID, THEME_SHORT . '_' . $field['id'], true);
            }
        }

        $export = base64_encode(serialize($variables));

        include(OXY_STACKS_DIR . 'partials/import-metabox.php');
    }
}
