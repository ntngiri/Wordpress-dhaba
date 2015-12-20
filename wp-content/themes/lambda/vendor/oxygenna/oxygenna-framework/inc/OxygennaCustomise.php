<?php
/**
 * Handles customise theme options
 *
 * @package ThemeFramework
 * @subpackage Options
 * @since 0.1
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version **PLUGIN_VERSION**
 */

if(class_exists('WP_Customize_Control')) {
    class Oxy_Customize_Slider_Control extends WP_Customize_Control
    {
        public $type = 'slider';

        public function enqueue()
        {
            // load styles
            wp_enqueue_style('jquery-oxygenna-ui-theme');
            // load scripts
            wp_enqueue_script('slider-field', OXY_TF_URI . 'inc/options/fields/slider/slider.js', array('jquery-ui-slider'));
        }

        public function render_content()
        {
            include OXY_TF_DIR . 'partials/customise/slider.php';
        }
    }
}

class OxygennaCustomise
{
    public function __construct()
    {
        add_action('customize_register', array(&$this, 'customize_register'));
    }

    public function customize_register($wp_customize)
    {
        $customise_options = apply_filters('oxy-customise-fields', array());

        foreach ($customise_options as $section) {
            // create section
            $wp_customize->add_section($section['id'], array(
                'title'      => $section['title'],
                'priority'   => $section['priority'],
            ));

            foreach ($section['fields'] as $index => $field) {
                $option_group_id = THEME_SHORT . '-options[' . $field['id'] . ']';

                $setting = array(
                    'type'       => 'option',
                    'transport'  => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(&$this, 'sanitize_callback')
                );

                if (isset($field['default'])) {
                    $setting['default'] = $field['default'];
                }

                $wp_customize->add_setting($option_group_id, $setting);

                $control_args = array(
                    'label'    => $field['name'],
                    'section'  => $section['id'],
                    'type'     => $field['type'],
                    'settings' => $option_group_id,
                    'priority' => $index,
                );

                $control_id = $section['id'] . '-' . $field['id'];

                switch ($field['type']) {
                    case 'select':
                    case 'radio':
                        $control_args['choices'] = $field['options'];
                        $wp_customize->add_control($control_id, $control_args);
                        break;

                    case 'upload':
                        unset($control_args['type']);
                        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $control_id, $control_args));
                        break;

                    case 'slider':
                        unset($control_args['type']);
                        $control_args['choices'] = $field['attr'];
                        $wp_customize->add_control(new Oxy_Customize_Slider_Control($wp_customize, $control_id, $control_args));
                        break;

                    default:
                        // regular control
                        $wp_customize->add_control($control_id, $control_args);
                        break;
                }
            }
        }
    }

    public function sanitize_callback($value)
    {
        return apply_filters(THEME_SHORT . '-customizer-option-sanitize', $value);
    }
}
