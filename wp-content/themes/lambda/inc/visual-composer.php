<?php
/**
 * Visual Composer setup
 *
 * @package Lambda
 * @subpackage Admin
 * @since 0.1
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version 1.17.0
 */

if (function_exists('vc_set_as_theme')) {
    vc_set_as_theme(true);
}

if (class_exists('WPBakeryVisualComposerAbstract')) {

    // setup default custom port types for vc composer
    $vc_option_types = get_option('wpb_js_content_types');
    if (empty($vc_option_types)) {
        update_option('wpb_js_content_types', array('page', 'oxy_service', 'oxy_staff', 'oxy_portfolio_image', 'oxy_modal'));
    }

    function oxy_option_to_vc_option($options)
    {
        $vc_options = array();
        foreach ($options['sections'] as $section) {
            foreach ($section['fields'] as $field) {
                $vc_option = array(
                    'heading' => $field['name'],
                    'type' => oxy_option_type_to_vc_option_type($field['type']),
                    'param_name' => $field['id'],
                );

                if (isset($field['admin_label'])) {
                    $vc_option['admin_label'] = $field['admin_label'];
                }

                if (isset($field['desc'])) {
                    $vc_option['description'] = $field['desc'];
                }

                if (isset($field['holder'])) {
                    $vc_option['holder'] = $field['holder'];
                }

                if (isset($field['default'])) {
                    $vc_option['value'] = $field['default'];
                }

                if( isset( $field['options']) && $field['type'] === 'radio' ) {
                    $vc_option['value'] = array_flip( $field['options']);
                }

                // include original oxy option in case we implement our own option
                $vc_option['oxy_option'] = $field;

                $vc_options[] = $vc_option;
            }
        }
        return $vc_options;
    }

    function oxy_option_type_to_vc_option_type($type)
    {
        switch($type) {
            case 'radio':
            case 'icons':
                return 'dropdown';
            break;
            case 'text':
                return 'textfield';
            break;
            case 'upload':
                return 'attach_image';
            break;
            default:
                return $type;
            break;
        }
    }

    function oxy_option_params_to_vc_option_params($option)
    {
        switch($option['type']) {
            case 'radio':
                return array_flip($option['options']);
            break;
        }
    }

    /**
     * Creates and renders oxygenna option inside visual composer
     *
     * @return void
     * @author
     **/
    function oxy_custom_vc_oxy_option($settings, $value)
    {
        $attr = array(
            'name' => $settings['oxy_option']['id'],
            'class' => 'wpb_vc_param_value'
        );

        if (isset($settings['oxy_option']['attr'])) {
            foreach ($settings['oxy_option']['attr'] as $key => $attr_value) {
                if ($key === 'class') {
                    $attr['class'] .= ' ' . $attr_value;
                } else {
                    $attr[$key] = $attr_value;
                }
            }
        }

        $option = OxygennaOptions::create_option($settings['oxy_option'], $value, $attr);
        return '<div class="my_param_block">' . $option->render(false) . '</div>';
    }

    /**
     * Creates and renders oxygenna select and hidden field to store value (for multiple selects) inside visual composer
     *
     * @return void
     * @author
     **/
    function oxy_custom_vc_oxy_select($settings, $value)
    {
        $attr = array(
            'class' => 'vc_oxygenna_select'
        );
        if (isset($settings['oxy_option']['attr'])) {
            $attr = array_merge($attr, $settings['oxy_option']['attr']);
        }

        if (($value === 'null' || empty($value)) && isset($settings['oxy_option']['default'])) {
            $value = $settings['oxy_option']['default'];
        }

        $option = OxygennaOptions::create_option($settings['oxy_option'], $value, $attr);

        $output = '<div class="my_param_block">';
        $output .= $option->render(false);
        $output .= '<input type="hidden" class="wpb_vc_param_value" name="' . $settings['oxy_option']['id'] . '" value="' . $value . '"/>';
        $output .= '</div>';
        return $output;
    }

    function oxy_enqueue_vc_scripts()
    {
        vc_add_shortcode_param('select', 'oxy_custom_vc_oxy_select', OXY_THEME_URI . 'inc/options/javascripts/visual-composer/select.js');
        vc_add_shortcode_param('slider', 'oxy_custom_vc_oxy_option', OXY_TF_URI . 'inc/options/fields/slider/slider.js');
        vc_add_shortcode_param('colour', 'oxy_custom_vc_oxy_option', OXY_TF_URI . 'inc/options/fields/colour/colour.js');
    }
    add_action('init', 'oxy_enqueue_vc_scripts');

    /**
     * Adds stylesheet to visual composer
     *
     * @return void
     **/
    function oxy_add_vc_style()
    {
        $pt_array = get_option('wpb_js_content_types', array('page'));

        if (null !== $pt_array) {
            if (in_array(get_post_type(), $pt_array)) {
                wp_enqueue_style('oxy_vc_admin', OXY_THEME_URI . 'inc/assets/stylesheets/visual-composer/visual-composer.css', array('js_composer'));
                wp_enqueue_script('oxy_vc_admin', OXY_THEME_URI . 'inc/assets/js/visual-composer/visual-composer.js', array('wpb_js_composer_js_view'), '0.1', true);
                wp_enqueue_style('oxy-spectrum', OXY_TF_URI . 'assets/components/spectrum/spectrum.css');
                wp_enqueue_script('oxy-spectrum', OXY_TF_URI . 'assets/components/spectrum/spectrum.js', array('jquery'));
                wp_enqueue_style('jquery-oxygenna-ui-theme');
            }
        }
    }
    add_action('admin_print_scripts-post.php', 'oxy_add_vc_style');
    add_action('admin_print_scripts-post-new.php', 'oxy_add_vc_style');

    // THEME SHORTCODES
    function oxy_init_vc_codes()
    {
        // remove all vc shortcodes
        vc_remove_element('vc_tta_pageable');
        vc_remove_element('vc_row');
        vc_remove_element('vc_row_inner');
        vc_remove_element('vc_column_inner');
        vc_remove_element('vc_column');
        vc_remove_element('vc_column_text');
        vc_remove_element('vc_twitter');
        vc_remove_element('vc_text_separator');
        vc_remove_element('vc_separator');
        vc_remove_element('vc_message');
        vc_remove_element('vc_facebook');
        vc_remove_element('vc_tweetmeme');
        vc_remove_element('vc_googleplus');
        vc_remove_element('vc_pinterest');
        vc_remove_element('vc_toggle');
        vc_remove_element('vc_single_image');
        vc_remove_element('vc_gallery');
        vc_remove_element('vc_images_carousel');
        vc_remove_element('vc_tabs');
        vc_remove_element( 'vc_tta_tabs' );
        vc_remove_element('vc_tour');
        vc_remove_element( 'vc_round_chart' );
        vc_remove_element( 'vc_line_chart' );
        vc_remove_element( 'vc_tta_tour' );
        // vc_remove_element('vc_tab');
        vc_remove_element('vc_accordion');
        vc_remove_element( 'vc_tta_accordion' );
        vc_remove_element('vc_accordion_tab');
        vc_remove_element('vc_teaser_grid');
        vc_remove_element('vc_posts_grid');
        vc_remove_element('vc_carousel');
        vc_remove_element('vc_posts_slider');
        // vc_remove_element('vc_widget_sidebar');
        vc_remove_element('vc_button');
        vc_remove_element('vc_button2');
        vc_remove_element('vc_cta_button');
        vc_remove_element('vc_cta_button2');
        vc_remove_element( 'vc_cta' );
        vc_remove_element( 'vc_btn' );
        vc_remove_element('vc_video');
        vc_remove_element('vc_gmaps');
        vc_remove_element('vc_custom_heading');
        //vc_remove_element('vc_raw_html');
        //vc_remove_element('vc_raw_js');
        vc_remove_element('vc_flickr');
        vc_remove_element('vc_progress_bar');
        vc_remove_element('vc_pie');
        // vc_remove_element('contact-form-7');
        vc_remove_element('layerslider_vc');
        // vc_remove_element('rev_slider_vc');
        // vc_remove_element('gravityform');
        vc_remove_element('vc_wp_search');
        vc_remove_element('vc_wp_meta');
        vc_remove_element('vc_wp_recentcomments');
        vc_remove_element('vc_wp_calendar');
        vc_remove_element('vc_wp_pages');
        vc_remove_element('vc_wp_tagcloud');
        vc_remove_element('vc_wp_custommenu');
        vc_remove_element('vc_wp_text');
        vc_remove_element('vc_wp_posts');
        vc_remove_element('vc_wp_links');
        vc_remove_element('vc_wp_categories');
        vc_remove_element('vc_wp_archives');
        vc_remove_element('vc_wp_rss');
        vc_remove_element('vc_basic_grid');
        vc_remove_element('vc_media_grid');
        vc_remove_element('vc_masonry_grid');
        vc_remove_element('vc_masonry_media_grid');
        vc_remove_element('vc_icon');
        vc_remove_element('vc_empty_space');
        // vc_remove_element('add_to_cart_url');
        // vc_remove_element('product_attribute');

        // add our theme shortcodes to vc

        // create theme specific shortcodes for vc
        $shortcode_options = include OXY_THEME_DIR . 'inc/options/shortcodes/shortcode-options.php';

        /////////////////////////////////// VC codes //////////////////////////////////////////////
        vc_map(array(
            'name'                    => $shortcode_options['vc_row']['title'],
            'description'             => $shortcode_options['vc_row']['desc'],
            'base'                    => 'vc_row',
            'is_container'            => true,
            'icon'                    => 'icon-wpb-row',
            'show_settings_on_create' => false,
            'category'                => __('Content', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['vc_row']),
            'js_view'                 => 'VcRowView'
        ));

        vc_map(array(
            'name'                    => $shortcode_options['vc_row_inner']['title'],//Inner Row
            'description'             => $shortcode_options['vc_row_inner']['desc'],
            'base'                    => 'vc_row_inner',
            'content_element'         => false,
            'is_container'            => true,
            'icon'                    => 'icon-wpb-row',
            'weight'                  => 1000,
            'show_settings_on_create' => false,
            'params'                  => oxy_option_to_vc_option($shortcode_options['vc_row_inner']),
            'js_view'                 => 'VcRowView'
        ));

        vc_map(array(
            'name'            => $shortcode_options['vc_column']['title'],
            'description'     => $shortcode_options['vc_column']['desc'],
            'base'            => 'vc_column',
            'is_container'    => true,
            'content_element' => false,
            'params'          => oxy_option_to_vc_option($shortcode_options['vc_column']),
            'js_view'         => 'VcColumnView'
        ));

         vc_map(array(
            'name'            => $shortcode_options['vc_column']['title'],
            'description'     => $shortcode_options['vc_column']['desc'],
            'base'            => 'vc_column_inner',
            'is_container'    => true,
            'content_element' => false,
            'params'          => oxy_option_to_vc_option($shortcode_options['vc_column']),
            'js_view'         => 'VcColumnView'
        ));

        // vc_single_image shortcode
        vc_map(array(
            'name'                    => $shortcode_options['vc_single_image']['title'],
            'description'             => $shortcode_options['vc_single_image']['desc'],
            'base'                    => 'vc_single_image',
            'is_container'            => false,
            'icon'                    => 'icon-wpb-single-image',
            'show_settings_on_create' => true,
            'category'                => __('Content', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['vc_single_image'])
        ));

        // vc_tabs
        $tab_id_1 = time().'-1-'.rand(0, 100);
        $tab_id_2 = time().'-2-'.rand(0, 100);
        vc_map(array(
            'name'                    => $shortcode_options['vc_tabs']['title'],
            'description'             => $shortcode_options['vc_tabs']['title'],
            'base'                    => 'vc_tabs',
            'show_settings_on_create' => false,
            'is_container'            => true,
            'icon'                    => 'icon-wpb-ui-tab-content',
            'category'                => __('Bootstrap', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['vc_tabs']),
            'custom_markup' => '
            <div class="wpb_tabs_holder wpb_holder vc_container_for_children">
            <ul class="tabs_controls">
            </ul>
            %content%
            </div>'
            ,
            'default_content' => '
            [vc_tab title="' . __('Tab 1', 'lambda-admin-td') . '" tab_id="' . $tab_id_1 . '"][/vc_tab]
            [vc_tab title="' . __('Tab 2', 'lambda-admin-td') . '" tab_id="' . $tab_id_2 . '"][/vc_tab]
            ',
            'js_view' => 'VcTabsView'
        ));

        // Video player
        vc_map(array(
            'name'        => $shortcode_options['vc_video']['title'],
            'description' => $shortcode_options['vc_video']['desc'],
            'name' => __('Video Player', 'lambda-admin-td'),
            'base'        => 'vc_video',
            'icon'        => 'icon-wpb-film-youtube',
            'category'    => __('Content', 'lambda-admin-td'),
            'params'      => oxy_option_to_vc_option($shortcode_options['vc_video']),
        ));

        /* Text Block
        ---------------------------------------------------------- */
        vc_map(array(
            'name'          => $shortcode_options['vc_column_text']['title'],
            'description'   => $shortcode_options['vc_column_text']['desc'],
            'base'          => 'vc_column_text',
            'icon'          => 'icon-wpb-layer-shape-text',
            'wrapper_class' => 'clearfix',
            'category'      => __('Content', 'lambda-admin-td'),
            'params'        => oxy_option_to_vc_option($shortcode_options['vc_column_text']),
        ));

        vc_map(array(
            'name'          => $shortcode_options['vc_column_slab_text']['title'],
            'description'   => $shortcode_options['vc_column_slab_text']['desc'],
            'base'          => 'vc_column_slab_text',
            'icon'          => 'icon-oxy-slab-text',
            'wrapper_class' => 'clearfix',
            'category'      => __('Content', 'lambda-admin-td'),
            'params'        => oxy_option_to_vc_option($shortcode_options['vc_column_slab_text']),
        ));

        vc_map(array(
            'name'                    => $shortcode_options['vc_accordion']['title'],
            'description'             => $shortcode_options['vc_accordion']['desc'],
            'base'                    => 'vc_accordion',
            'show_settings_on_create' => false,
            'is_container'            => true,
            'icon'                    => 'icon-wpb-ui-accordion',
            'category'                => __('Bootstrap', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['vc_accordion']),
            'custom_markup' => '
            <div class="wpb_accordion_holder wpb_holder clearfix vc_container_for_children">
            %content%
            </div>
            <div class="tab_controls">
            <button class="add_tab" title="'.__('Add accordion section', 'lambda-admin-td') . '">' . __('Add accordion section', 'lambda-admin-td') . '</button>
            </div>
            ',
            'default_content' => '
            [vc_accordion_tab title="' . __('Section 1', 'lambda-admin-td') . '" state="closed"][/vc_accordion_tab]
            [vc_accordion_tab title="' . __('Section 2', 'lambda-admin-td') . '" state="closed"][/vc_accordion_tab]
            ',
            'js_view' => 'VcAccordionView'
        ));

        vc_map(array(
            'name' => __('Accordion Section', 'lambda-admin-td'),
            'base' => 'vc_accordion_tab',
            'allowed_container_element' => 'vc_row',
            'is_container' => true,
            'content_element' => false,
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => __('Title', 'lambda-admin-td'),
                    'param_name' => 'title',
                    'description' => __('Accordion section title.', 'lambda-admin-td')
               ),
                array(
                    'type' => 'dropdown',
                    'heading' => __('State', 'lambda-admin-td'),
                    'param_name' => 'state',
                    'value' => array(
                        __('Closed', 'lambda-admin-td') => 'closed',
                        __('Open', 'lambda-admin-td')   => 'open',
                   ),
                    'description' => __('Is this accordion panel open?', 'lambda-admin-td')
               ),
           ),
            'js_view' => 'VcAccordionTabView'
        ));


        /////////////////////////////////// BOOSTRAP codes /////////////////////////////////////////
        vc_map(array(
            'name'            => $shortcode_options['panel']['title'],
            'description'     => $shortcode_options['panel']['desc'],
            'base'            => 'panel',
            'is_container'    => true,
            'content_element' => true,
            'icon'            => 'icon-oxy-panel',
            'category'        => __('Bootstrap', 'lambda-admin-td'),
            'params'          => oxy_option_to_vc_option($shortcode_options['panel']),
            'js_view' => 'VcColumnView'
        ));

        vc_map(array(
            'name'                    => $shortcode_options['vc_message']['title'],
            'description'             => $shortcode_options['vc_message']['desc'],
            'base'          => 'vc_message',
            'icon'          => 'icon-oxy-alert',
            'wrapper_class' => 'alert',
            'category'      => __('Bootstrap', 'lambda-admin-td'),
            'params'        => oxy_option_to_vc_option($shortcode_options['vc_message']),
            'js_view'       => 'VcMessageView'
        ));

        vc_map(array(
            'name'                    => $shortcode_options['vc_jumbotron']['title'],
            'description'             => $shortcode_options['vc_jumbotron']['desc'],
            'base'          => 'vc_jumbotron',
            'icon'          => 'icon-oxy-jumbotron',
            'wrapper_class' => 'jumbotron',
            'category'      => __('Bootstrap', 'lambda-admin-td'),
            'params'        => oxy_option_to_vc_option($shortcode_options['vc_jumbotron']),
        ));

        vc_map(array(
            'name'                    => $shortcode_options['progress']['title'],
            'description'             => $shortcode_options['progress']['desc'],
            'base'                    => 'progress',
            'is_container'            => false,
            'icon'                    => 'icon-wpb-graph',
            'show_settings_on_create' => true,
            'category'                => __('Theme Elements', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['progress'])
        ));

        /////////////////////////////////// TYPOGRAPHY codes //////////////////////////////////////////////

        vc_map(array(
            'name'                    => $shortcode_options['icon']['title'],
            'description'             => $shortcode_options['icon']['desc'],
            'base'     => 'icon',
            'icon'     => 'icon-oxy-icon',
            'category' => __('Typography', 'lambda-admin-td'),
            'params'   => oxy_option_to_vc_option($shortcode_options['icon']),
            'js_view' => 'OxyVcIconView'
        ));

        vc_map(array(
            'name'                    => $shortcode_options['heading']['title'],
            'description'             => $shortcode_options['heading']['desc'],
            'base'     => 'heading',
            'icon'     => 'icon-oxy-heading',
            'category' => __('Typography', 'lambda-admin-td'),
            'params'   => oxy_option_to_vc_option($shortcode_options['heading']),
            'js_view' => 'OxyVcHeadingView'
        ));

        vc_map(array(
            'name'                    => $shortcode_options['lead']['title'],
            'description'             => $shortcode_options['lead']['desc'],
            'base'     => 'lead',
            'icon'     => 'icon-oxy-lead-p',
            'category' => __('Typography', 'lambda-admin-td'),
            'params'   => oxy_option_to_vc_option($shortcode_options['lead']),
            'js_view' => 'OxyVcLeadView'
        ));

        vc_map(array(
            'name'                    => $shortcode_options['magnific_popup_link']['title'],
            'description'             => $shortcode_options['magnific_popup_link']['desc'],
            'base'                    => 'magnific_popup_link',
            'icon'                    => 'icon-oxy-magnific',
            'is_container'            => false,
            'show_settings_on_create' => true,
            'category'                => __('Theme Elements', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['magnific_popup_link'])
        ));

        vc_map(array(
            'name'                    => $shortcode_options['blockquote']['title'],
            'description'             => $shortcode_options['blockquote']['desc'],
            'base'     => 'blockquote',
            'icon'     => 'icon-oxy-quote',
            'category' => __('Typography', 'lambda-admin-td'),
            'params'   => oxy_option_to_vc_option($shortcode_options['blockquote']),
            'js_view' => 'OxyVcBlockQuoteView'
        ));

        vc_map(array(
            'name'        => $shortcode_options['code']['title'],
            'description' => $shortcode_options['code']['desc'],
            'base'        => 'code',
            'icon'        => 'icon-oxy-code',
            'category'    => __('Typography', 'lambda-admin-td'),
            'params'      => oxy_option_to_vc_option($shortcode_options['code']),
        ));

        /////////////////////////////////// THEME codes //////////////////////////////////////////////

        vc_map(array(
            'name'                    => $shortcode_options['features_list']['title'],
            'description'             => $shortcode_options['features_list']['desc'],
            'base'                    => 'features_list',
            'icon'                    => 'icon-oxy-list',
            'as_parent'               => array('only' => 'feature'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
            'content_element'         => true,
            'show_settings_on_create' => false,
            'is_container'            => true,
            'category'                => __('Theme Elements', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['features_list']),
            'js_view'                 => 'VcColumnView'
        ));

        vc_map(array(
            'name'            => $shortcode_options['feature']['title'],
            'description'     => $shortcode_options['feature']['desc'],
            'base'            => 'feature',
            'content_element' => true,
            'icon'            => 'icon-oxy-feature',
            'is_container'    => false,
            'as_child'        => array('only' => 'features_list'), // Use only|except attributes to limit parent (separate multiple values with comma)
            'params'          => oxy_option_to_vc_option($shortcode_options['feature']),
            'category'        => __('Theme Elements', 'lambda-admin-td'),
        ));

        vc_map(array(
            'name'                    => $shortcode_options['pricing_list']['title'],
            'description'             => $shortcode_options['pricing_list']['desc'],
            'base'                    => 'pricing_list',
            'icon'                    => 'icon-oxy-pricing-list',
            'as_parent'               => array('only' => 'pricing_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
            'content_element'         => true,
            'show_settings_on_create' => false,
            'is_container'            => true,
            'category'                => __('Theme Elements', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['pricing_list']),
            'js_view'                 => 'VcColumnView'
        ));

        vc_map(array(
            'name'            => $shortcode_options['pricing_item']['title'],
            'description'     => $shortcode_options['pricing_item']['desc'],
            'base'            => 'pricing_item',
            'content_element' => true,
            'icon'            => 'icon-oxy-pricing-icon',
            'is_container'    => false,
            'as_child'        => array('only' => 'pricing_list'), // Use only|except attributes to limit parent (separate multiple values with comma)
            'params'          => oxy_option_to_vc_option($shortcode_options['pricing_item']),
            'category'        => __('Theme Elements', 'lambda-admin-td'),
        ));

        // vc_single_image shortcode
        vc_map(array(
            'name'                    => $shortcode_options['shapedimage']['title'],
            'description'             => $shortcode_options['shapedimage']['desc'],
            'base'                    => 'shapedimage',
            'is_container'            => false,
            'icon'                    => 'icon-oxy-shaped',
            'show_settings_on_create' => true,
            'category'                => __('Theme Elements', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['shapedimage']),
            'js_view'                 => 'OxyVcShapedImageView'
        ));

        vc_map(array(
            'name'        => $shortcode_options['pricing']['title'],
            'description' => $shortcode_options['pricing']['desc'],
            'base'        => 'pricing',
            'icon'        => 'icon-oxy-pricing',
            'category'    => __('Theme Elements', 'lambda-admin-td'),
            'params'      => oxy_option_to_vc_option($shortcode_options['pricing']),
        ));

        vc_map(array(
            'name'        => $shortcode_options['featuredicon']['title'],
            'description' => $shortcode_options['featuredicon']['desc'],
            'base'        => 'featuredicon',
            'icon'        => 'icon-oxy-f-icon',
            'category'    => __('Theme Elements', 'lambda-admin-td'),
            'params'      => oxy_option_to_vc_option($shortcode_options['featuredicon']),
            'js_view'     => 'OxyVcFeaturedIconView'
        ));

        // recent posts masonry shortcode
        vc_map(array(
            'name'                    => $shortcode_options['recent_posts']['title'],
            'description'             => $shortcode_options['recent_posts']['desc'],
            'base'                    => 'recent_posts',
            'is_container'            => false,
            'icon'                    => 'icon-wpb-application-icon-large',
            'show_settings_on_create' => true,
            'category'                => __('Theme Elements', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['recent_posts'])
        ));

        // services shortcode
        vc_map(array(
            'name'                    => $shortcode_options['service']['title'],
            'description'             => $shortcode_options['service']['desc'],
            'base'                    => 'service',
            'is_container'            => false,
            'icon'                    => 'icon-oxy-service',
            'show_settings_on_create' => true,
            'category'                => __('Theme Elements', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['service'])
        ));

        // services shortcode
        vc_map(array(
            'name'                    => $shortcode_options['services']['title'],
            'description'             => $shortcode_options['services']['desc'],
            'base'                    => 'services',
            'is_container'            => false,
            'icon'                    => 'icon-oxy-services',
            'show_settings_on_create' => true,
            'category'                => __('Theme Elements', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['services'])
        ));

        // portfolio shortcode
        vc_map(array(
            'name'                    => $shortcode_options['portfolio']['title'],
            'description'             => $shortcode_options['portfolio']['desc'],
            'base'                    => 'portfolio',
            'is_container'            => false,
            'icon'                    => 'icon-oxy-portfolio',
            'show_settings_on_create' => true,
            'category'                => __('Theme Elements', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['portfolio'])
        ));

        // portfolio masonry shortcode
        vc_map(array(
            'name'                    => $shortcode_options['portfolio_masonry']['title'],
            'description'             => $shortcode_options['portfolio_masonry']['desc'],
            'base'                    => 'portfolio_masonry',
            'is_container'            => false,
            'icon'                    => 'icon-oxy-portfolio',
            'show_settings_on_create' => true,
            'category'                => __('Theme Elements', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['portfolio_masonry'])
        ));


        vc_map(array(
            'name'                    => $shortcode_options['staff_list']['title'],
            'description'             => $shortcode_options['staff_list']['desc'],
            'base'                    => 'staff_list',
            'is_container'            => false,
            'icon'                    => 'icon-oxy-staff',
            'show_settings_on_create' => true,
            'category'                => __('Theme Elements', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['staff_list'])
        ));

        vc_map(array(
            'name'                    => $shortcode_options['staff_featured']['title'],
            'description'             => $shortcode_options['staff_featured']['desc'],
            'base'                    => 'staff_featured',
            'is_container'            => false,
            'icon'                    => 'icon-oxy-f-staff',
            'show_settings_on_create' => true,
            'category'                => __('Theme Elements', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['staff_featured'])
        ));

        vc_map(array(
            'name'                    => $shortcode_options['testimonials']['title'],
            'description'             => $shortcode_options['testimonials']['desc'],
            'base'                    => 'testimonials',
            'is_container'            => false,
            'icon'                    => 'icon-oxy-testimonial',
            'show_settings_on_create' => true,
            'category'                => __('Theme Elements', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['testimonials'])
        ));

        vc_map(array(
            'name'                    => $shortcode_options['testimonials_list']['title'],
            'description'             => $shortcode_options['testimonials_list']['desc'],
            'base'                    => 'testimonials_list',
            'is_container'            => false,
            'icon'                    => 'icon-oxy-testimonial-list',
            'show_settings_on_create' => true,
            'category'                => __('Theme Elements', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['testimonials_list'])
        ));

        vc_map(array(
            'name'                    => $shortcode_options['map']['title'],
            'description'             => $shortcode_options['map']['desc'],
            'base'                    => 'map',
            'is_container'            => false,
            'icon'                    => 'icon-wpb-map-pin',
            'show_settings_on_create' => true,
            'category'                => __('Content', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['map'])
        ));

        vc_map(array(
            'name'                    => $shortcode_options['slideshow']['title'],
            'description'             => $shortcode_options['slideshow']['desc'],
            'base'                    => 'slideshow',
            'is_container'            => false,
            'icon'                    => 'icon-wpb-images-stack',
            'show_settings_on_create' => true,
            'category'                => __('Content', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['slideshow'])
        ));

        vc_map(array(
            'name'                    => $shortcode_options['carousel']['title'],
            'description'             => $shortcode_options['carousel']['desc'],
            'base'                    => 'carousel',
            'is_container'            => false,
            'icon'                    => 'icon-wpb-images-stack',
            'show_settings_on_create' => true,
            'category'                => __('Content', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['carousel'])
        ));

        vc_map(array(
            'name'                    => $shortcode_options['pie']['title'],
            'description'             => $shortcode_options['pie']['desc'],
            'base'                    => 'pie',
            'is_container'            => false,
            'icon'                    => 'icon-wpb-vc_pie',
            'show_settings_on_create' => true,
            'category'                => __('Theme Elements', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['pie'])
        ));

        vc_map(array(
            'name'                    => $shortcode_options['counter']['title'],
            'description'             => $shortcode_options['counter']['desc'],
            'base'                    => 'counter',
            'is_container'            => false,
            'icon'                    => 'icon-wpb-vc_counter',
            'show_settings_on_create' => true,
            'category'                => __('Theme Elements', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['counter'])
        ));

        vc_map(array(
            'name'                    => $shortcode_options['countdown']['title'],
            'description'             => $shortcode_options['countdown']['desc'],
            'base'                    => 'countdown',
            'is_container'            => false,
            'icon'                    => 'icon-wpb-vc_countdown',
            'show_settings_on_create' => true,
            'category'                => __('Theme Elements', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['countdown'])
        ));

        vc_map(array(
            'name'                    => $shortcode_options['button']['title'],
            'description'             => $shortcode_options['button']['desc'],
            'base'     => 'button',
            'icon'     => 'icon-oxy-button',
            'category' => __('Theme Elements', 'lambda-admin-td'),
            'params'   => oxy_option_to_vc_option($shortcode_options['button']),
            'js_view'  => 'OxyVcButtonView'
        ));

        vc_map(array(
            'name'                    => $shortcode_options['vc_scroll']['title'],
            'description'             => $shortcode_options['vc_scroll']['desc'],
            'base'     => 'vc_scroll',
            'icon'     => 'icon-oxy-scrollto',
            'category' => __('Theme Elements', 'lambda-admin-td'),
            'params'   => oxy_option_to_vc_option($shortcode_options['vc_scroll'])
        ));

         vc_map(array(
            'name'                    => $shortcode_options['tags']['title'],
            'description'             => $shortcode_options['tags']['desc'],
            'base'                    => 'tags',
            'icon'                    => 'icon-oxy-tags',
            'category'                => __('Theme Elements', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['tags'])
        ));

         vc_map(array(
            'name'                    => $shortcode_options['skills']['title'],
            'description'             => $shortcode_options['skills']['desc'],
            'base'                    => 'skills',
            'icon'                    => 'icon-oxy-tags',
            'category'                => __('Theme Elements', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['skills'])
        ));

        vc_map(array(
            'name'                    => $shortcode_options['sharing']['title'],
            'description'             => $shortcode_options['sharing']['desc'],
            'base'                    => 'sharing',
            'is_container'            => false,
            'icon'                    => 'icon-oxy-social-sharing',
            'show_settings_on_create' => true,
            'category'                => __('Theme Elements', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['sharing'])
        ));

        vc_map(array(
            'name'                    => $shortcode_options['divider']['title'],
            'description'             => $shortcode_options['divider']['desc'],
            'base'                    => 'divider',
            'icon'                    => 'icon-oxy-divider',
            'is_container'            => false,
            'show_settings_on_create' => true,
            'category'                => __('Theme Elements', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['divider'])
        ));

        vc_map(array(
            'name'                    => $shortcode_options['bordered_divider']['title'],
            'description'             => $shortcode_options['bordered_divider']['desc'],
            'base'                    => 'bordered_divider',
            'icon'                    => 'icon-oxy-bordered-divider',
            'is_container'            => false,
            'show_settings_on_create' => true,
            'category'                => __('Theme Elements', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['bordered_divider'])
        ));

        vc_map(array(
            'name'                    => $shortcode_options['ruler_divider']['title'],
            'description'             => $shortcode_options['ruler_divider']['desc'],
            'base'                    => 'ruler_divider',
            'icon'                    => 'icon-oxy-ruler-divider',
            'is_container'            => false,
            'show_settings_on_create' => true,
            'category'                => __('Theme Elements', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['ruler_divider'])
        ));

        vc_map(array(
            'name'                    => $shortcode_options['socialicons']['title'],
            'description'             => $shortcode_options['socialicons']['desc'],
            'base'                    => 'socialicons',
            'is_container'            => false,
            'icon'                    => 'icon-oxy-socialicons',
            'show_settings_on_create' => true,
            'category'                => __('Theme Elements', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['socialicons'])
        ));

        if (is_plugin_active('wp-charts/wordpress_charts_js.php')) {
            vc_map(array(
                'name'                    => $shortcode_options['chart']['title'],
                'description'             => $shortcode_options['chart']['desc'],
                'base'                    => 'chart',
                'is_container'            => false,
                'icon'                    => 'icon-wpb-vc_pie',
                'show_settings_on_create' => true,
                'category'                => __('Theme Elements', 'lambda-admin-td'),
                'params'                  => oxy_option_to_vc_option($shortcode_options['chart'])
            ));
        }

        vc_map(array(
            'name'                    => $shortcode_options['simple_icon_list']['title'],
            'description'             => $shortcode_options['simple_icon_list']['desc'],
            'base'                    => 'simple_icon_list',
            'icon'                    => 'icon-oxy-icon-list',
            'as_parent'               => array('only' => 'simple_icon'),
            'content_element'         => true,
            'show_settings_on_create' => false,
            'is_container'            => true,
            'category'                => __('Theme Elements', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['simple_icon_list']),
            'js_view'                 => 'VcColumnView'
        ));

        vc_map(array(
            'name'            => $shortcode_options['simple_icon']['title'],
            'description'     => $shortcode_options['simple_icon']['desc'],
            'base'            => 'simple_icon',
            'content_element' => true,
            'icon'            => 'icon-oxy-feature',
            'is_container'    => false,
            'as_child'        => array('only' => 'simple_icon_list'), // Use only|except attributes to limit parent (separate multiple values with comma)
            'params'          => oxy_option_to_vc_option($shortcode_options['simple_icon']),
            'category'        => __('Theme Elements', 'lambda-admin-td'),
        ));

        vc_map(array(
            'name'            => $shortcode_options['audio']['title'],
            'description'     => $shortcode_options['audio']['desc'],
            'base'            => 'audio',
            'icon'            => 'icon-oxy-audio',
            'params'          => oxy_option_to_vc_option($shortcode_options['audio']),
            'category'        => __('Theme Elements', 'lambda-admin-td'),
        ));

        vc_map(array(
            'name'                    => $shortcode_options['post_featured']['title'],
            'description'             => $shortcode_options['post_featured']['desc'],
            'base'                    => 'post_featured',
            'is_container'            => false,
            'icon'                    => 'icon-wpb-application-icon-large',
            'show_settings_on_create' => true,
            'category'                => __('Theme Elements', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['post_featured'])
        ));

        vc_map(array(
            'name'                    => $shortcode_options['posts_slideshow']['title'],
            'description'             => $shortcode_options['posts_slideshow']['desc'],
            'base'                    => 'posts_slideshow',
            'is_container'            => false,
            'icon'                    => 'icon-wpb-images-stack',
            'show_settings_on_create' => true,
            'category'                => __('Theme Elements', 'lambda-admin-td'),
            'params'                  => oxy_option_to_vc_option($shortcode_options['posts_slideshow'])
        ));

        global $vc_row_layouts;
        $vc_row_layouts[] = array( 'cells' => '15_15_15_15_15', 'mask' => '530', 'title' => '1/5 + 1/5 + 1/5 + 1/5 + 1/5', 'icon_class' => 'l_15_15_15_15_15' );
        // var_dump($vc_row_layouts);


        if (is_plugin_active('woocommerce/woocommerce.php')) {
            vc_map(array(
                'name'            => $shortcode_options['product']['title'],
                'description'     => $shortcode_options['product']['desc'],
                'base'            => 'product',
                'icon'            => 'icon-oxy-product',
                'params'          => oxy_option_to_vc_option($shortcode_options['product']),
                'category'        => __('Woocommerce', 'lambda-admin-td'),
            ));


            vc_map(array(
                'name'            => $shortcode_options['product_page']['title'],
                'description'     => $shortcode_options['product_page']['desc'],
                'base'            => 'product_page',
                'icon'            => 'icon-oxy-product_page',
                'params'          => oxy_option_to_vc_option($shortcode_options['product_page']),
                'category'        => __('Woocommerce', 'lambda-admin-td'),
            ));

            vc_map(array(
                'name'            => $shortcode_options['product_category']['title'],
                'description'     => $shortcode_options['product_category']['desc'],
                'base'            => 'product_category',
                'icon'            => 'icon-oxy-product_cat',
                'params'          => oxy_option_to_vc_option($shortcode_options['product_category']),
                'category'        => __('Woocommerce', 'lambda-admin-td'),
            ));

            vc_map(array(
                'name'            => $shortcode_options['product_categories']['title'],
                'description'     => $shortcode_options['product_categories']['desc'],
                'base'            => 'product_categories',
                'icon'            => 'icon-oxy-product_cats',
                'params'          => oxy_option_to_vc_option($shortcode_options['product_categories']),
                'category'        => __('Woocommerce', 'lambda-admin-td'),
            ));

            vc_map(array(
                'name'            => $shortcode_options['sale_products']['title'],
                'description'     => $shortcode_options['sale_products']['desc'],
                'base'            => 'sale_products',
                'icon'            => 'icon-oxy-product_cats',
                'params'          => oxy_option_to_vc_option($shortcode_options['sale_products']),
                'category'        => __('Woocommerce', 'lambda-admin-td'),
            ));

            vc_map(array(
                'name'            => $shortcode_options['best_selling_products']['title'],
                'description'     => $shortcode_options['best_selling_products']['desc'],
                'base'            => 'best_selling_products',
                'icon'            => 'icon-oxy-product_cats',
                'params'          => oxy_option_to_vc_option($shortcode_options['best_selling_products']),
                'category'        => __('Woocommerce', 'lambda-admin-td'),
            ));

            vc_map(array(
                'name'            => $shortcode_options['top_rated_products']['title'],
                'description'     => $shortcode_options['top_rated_products']['desc'],
                'base'            => 'top_rated_products',
                'icon'            => 'icon-oxy-product_cats',
                'params'          => oxy_option_to_vc_option($shortcode_options['top_rated_products']),
                'category'        => __('Woocommerce', 'lambda-admin-td'),
            ));

        }
        if (is_plugin_active('LayerSlider/layerslider.php')) {
            $sliders = LS_Sliders::find(array('limit' => 200));
            $layer_sliders_ids = array();
            $layer_sliders_slugs = array();
            if ($sliders) {
                foreach ($sliders as $slider) {
                    $layer_sliders_ids[$slider['name']] = $slider['id'];
                    if (!empty($slider['slug'])) {
                        $layer_sliders_slugs[$slider['name']] = $slider['slug'];
                    }
                }
            } else {
                $layer_sliders_ids['No sliders found'] = 0;
            }

            if (empty($layer_sliders_slugs)) {
                $layer_sliders_slugs['No sliders found with slugs'] = 0;
            } else {
                $layer_sliders_slugs['Use slider ID'] = 0;
            }

            vc_map(array(
                'base' => 'layerslider_vc',
                'name' => __('Layer Slider', 'lambda-admin-td'),
                'icon' => 'icon-wpb-layerslider',
                'category' => __('Content', 'lambda-admin-td'),
                'description' => __('Place LayerSlider', 'lambda-admin-td'),
                'params' => array(
                    array(
                        'type' => 'dropdown',
                        'heading' => __('LayerSlider ID', 'lambda-admin-td'),
                        'param_name' => 'id',
                        'admin_label' => true,
                        'value' => $layer_sliders_ids,
                        'description' => __('Select your LayerSlider.', 'lambda-admin-td')
                   ),
                    array(
                        'type' => 'dropdown',
                        'heading' => __('LayerSlider by Slug', 'lambda-admin-td'),
                        'param_name' => 'slug',
                        'value' => $layer_sliders_slugs,
                        'description' => __('Select your LayerSlider using its optional slug (overrides id above).', 'lambda-admin-td')
                   ),
                    array(
                        'type' => 'textfield',
                        'heading' => __('Extra class name', 'lambda-admin-td'),
                        'param_name' => 'el_class',
                        'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lambda-admin-td')
                    )
                )
            ));
        } // if layer slider plugin active
    }
    add_action('init', 'oxy_init_vc_codes');

}

/**
 * removes default VC templates when you edit an empty page
 *
 * @return void
 * @author
 **/
function oxy_remove_templates_from_vc_welcome($templates)
{
    return array();
}
add_filter('vc_load_default_templates_welcome_block', 'oxy_remove_templates_from_vc_welcome');

/**
 * Deregisters Grid Elements post type for VC >= 4.4
 *
 * @return boolean
 * @author
 **/
if (!function_exists('unregister_vc_grid_element')) {
    function unregister_vc_grid_element()
    {
        unregister_post_type('vc_grid_item');
    }
    add_action('init', 'unregister_vc_grid_element', 20);
}
