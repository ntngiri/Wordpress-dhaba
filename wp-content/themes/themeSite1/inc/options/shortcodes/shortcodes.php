<?php
/**
 * Themes shortcode functions go here
 *
 * @package Lambda
 * @subpackage Core
 * @since 1.0
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license http://wiki.envato.com/support/legal-terms/licensing-terms/
 * @version 1.17.0
 */

/****************** VISUAL COMPOSER SHORTCODES *******************************/
if (!function_exists('oxy_shortcode_section')) {
    function oxy_shortcode_section($atts, $content = '')
    {
        extract(shortcode_atts(array(
            'text_color'                      => 'text-normal',
            'text_shadow'                     => 'no-shadow',
            'inner_shadow'                    => 'no-shadow',
            'width'                           => 'padded',
            'class'                           => '',
            'id'                              => '',
            'label'                           => '',
            'overlay_colour'                  => '#000000',
            'overlay_opacity'                 => '0',
            'overlay_grid'                    => '0',
            'background_video_mp4'            => '',
            'background_video_webm'           => '',
            'background_image'                => '',
            'background_image_size'           => 'cover',
            'background_image_repeat'         => 'no-repeat',
            'background_image_attachment'     => 'no-scroll',
            'background_position_vertical'    => '0',
            'background_image_parallax'       => 'off',
            'background_image_parallax_start' => '0',
            'background_image_parallax_end'   => '-80',
            'height'                          => 'normal',
            'transparency'                    => 'opaque',
            'vertical_alignment'              => 'default',
            // responsive options
            'hidden_on_large'                 => 'off',
            'hidden_on_medium'                => 'off',
            'hidden_on_small'                 => 'off',
            'hidden_on_xsmall'                => 'off'
        ), $atts));

        global $oxy_is_iphone, $oxy_is_ipad, $oxy_is_android;

        $has_video = (!empty($background_video_mp4) || !empty($background_video_webm)) && (!$oxy_is_iphone && !$oxy_is_ipad  && !$oxy_is_android || oxy_get_option('mobile_videos') === 'on');
        $has_media = !empty($background_image) || $has_video;

        $section_id = $id == '' ? '' : ' id="' . esc_attr($id) . '"';
        $data_label = $label == '' ? '' : ' data-label="' . esc_attr($label) . '"';

        $section_classes = array();
        $section_classes[] = oxy_add_extra_shortcode_classes($atts);
        $section_classes[] = $text_color;
        $section_classes[] = 'section-text-' . $text_shadow;
        $section_classes[] = 'section-inner-' . $inner_shadow;
        $section_classes[] = 'section-' . $height;
        $section_classes[] = 'section-' . $transparency;

        $background_image_url = '';
        if (is_numeric($background_image)) {
             $attachment_image = wp_get_attachment_image_src($background_image, 'full');
             $background_image_url = $attachment_image[0];
        } else {
            $background_image_url = $background_image;
        }

        $background_media_style = ($has_media && !$has_video) ? 'background-image: url(\''. $background_image_url .'\'); background-repeat:'. $background_image_repeat .'; background-size:'.$background_image_size.'; background-attachment:'. $background_image_attachment.'; background-position: 50% '. $background_position_vertical.'%;': '';

        // create poster for video if needed
        $video_poster = $has_video && !empty($background_image_url) ? 'poster="' . esc_url($background_image_url) . '" ' : '';

        // create parallax data attributes if needed
        $parallax_data_attr = array();
        if ('on' === $background_image_parallax) {
            $offset_y = 0;
            if ('navbar-sticky' === oxy_get_option('header_type')) {
                $offset_y = oxy_get_option('navbar_scrolled');
            }
            $parallax_data_attr[] = 'data-start="background-position: 50% ' . esc_attr($background_image_parallax_start) . 'px"';
            $parallax_data_attr[] = 'data-' . esc_attr($offset_y) . '-top-bottom="background-position: 50% ' . esc_attr($background_image_parallax_end) . 'px"';
        }

        $container_class = $width == 'padded' ? 'container' : 'container-fullwidth';
        $row_class = 'vertical-' . $vertical_alignment;
        $container_class .= ' container-vertical-' . $vertical_alignment;

        $overlay_colour = oxy_hex2rgba($overlay_colour, $overlay_opacity);

        ob_start();
        include(locate_template('partials/shortcodes/section.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('vc_row', 'oxy_shortcode_section');

/**
 * Creates a section header (used in page header sections and section headers)
 *
 * @return shortcode HTML
 **/
if (!function_exists('oxy_section_heading')) {
    function oxy_section_heading($options, $content = '')
    {
        extract(shortcode_atts(array(
            'heading_type'           => 'shortcode',
            'header_type'            => 'h1',
            'text_color'             => 'text-normal',
            'header_size'            => 'normal',
            'header_weight'          => 'regular',
            'header_align'           => 'left',
            'heading_type'           => 'shortcode',
            'header_fade_out'        => 'off',
            'extra_classes'          => '',
            // global options
            'extra_classes'          => '',
            'margin_top'             => '20',
            'margin_bottom'          => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'                 => 'off',
            'hidden_on_medium'                => 'off',
            'hidden_on_small'                 => 'off',
            'hidden_on_xsmall'                => 'off'
        ), $options));

        $headline_classes = array();
        $headline_classes[] = 'text-' . $header_align;
        $headline_classes[] = oxy_add_extra_shortcode_classes($options);
        $headline_classes[] = 'element-top-' . $margin_top;
        $headline_classes[] = 'element-bottom-' . $margin_bottom;
        $headline_classes[] = $text_color;

        if ($scroll_animation !== 'none') {
            $headline_classes[] = 'os-animation';
        }
        //Striping content to avoid <p></p> tags
        $content = strip_tags($content);

        $headline_classes[] = $header_size;
        $headline_classes[] = $header_weight;

        $parallax_data_attr = array();
        if ('on' === $header_fade_out) {
            $fade_y = 0;
            if ('navbar-sticky' === oxy_get_option('header_type')) {
                $fade_y = oxy_get_option('navbar_scrolled');
            }
            $parallax_data_attr[] = 'data-start="opacity:1"';
            $parallax_data_attr[] = 'data-center="opacity:1"';
            $parallax_data_attr[] = 'data-' . $fade_y . '-top-bottom="opacity:0"';
        }
        ob_start();
        include(locate_template('partials/shortcodes/headings/heading-' . $heading_type . '.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('heading', 'oxy_section_heading');

/**
 * Creates an Inner Row (rendered when a user adds a nested row)
 *
 * @return shortcode HTML
 **/
if (!function_exists('oxy_section_vc_row_inner')) {
    function oxy_section_vc_row_inner($atts, $content)
    {
        extract(shortcode_atts(array(
            'extra_classes'     => '',
             // responsive options
            'hidden_on_large'   => 'off',
            'hidden_on_medium'  => 'off',
            'hidden_on_small'   => 'off',
            'hidden_on_xsmall'  => 'off'
        ), $atts));

        $classes = oxy_add_extra_shortcode_classes($atts);
        $output = '<div class="row ' . $classes . '">';
        $output .= do_shortcode($content);
        $output .= '</div>';

        return $output;
    }
}
add_shortcode('vc_row_inner', 'oxy_section_vc_row_inner');

/**
 * Handles VC columns
 *
 * @return shortcode HTML
 **/
if (!function_exists('oxy_section_vc_column')) {
    function oxy_section_vc_column($atts, $content)
    {
        extract(shortcode_atts(array(
            'width'                  => '1/1',
            'column_colour'          => '',
            'extra_classes'          => '',
            'align'                  => 'default',
            'align_sm'               => 'default',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            'border_top'             => 'off',
            'border_right'           => 'off',
            'border_bottom'          => 'off',
            'border_left'            => 'off',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $fraction = array('whole' => 0);
        preg_match('/^((?P<whole>\d+)(?=\s))?(\s*)?(?P<numerator>\d+)\/(?P<denominator>\d+)$/', $width, $fraction);
        $decimal_width = $fraction['whole'] + $fraction['numerator'] / $fraction['denominator'];
        $col_width_class = ($decimal_width * 12);
        $col_width_class = 'col-md-' . str_replace('.', '-', $col_width_class);

        $column_classes = array();
        $column_attrs = array();
        $column_classes[] = $col_width_class;
        $column_classes[] = oxy_add_extra_shortcode_classes($atts);
        $column_classes[] = 'text-' . $align;
        $column_classes[] = 'small-screen-' . $align_sm;
        if ($scroll_animation !== 'none') {
            $column_classes[] = 'os-animation';
            $column_attrs[] = 'data-os-animation="' . $scroll_animation . '"';
            $column_attrs[] = 'data-os-animation-delay="' . $scroll_animation_delay . 's"';
        }
        if ($border_top == 'on') {
            $column_classes[] = 'col-border-top';
        }
        if ($border_right == 'on') {
            $column_classes[] = 'col-border-right';
        }
        if ($border_bottom == 'on') {
            $column_classes[] = 'col-border-bottom';
        }
        if ($border_left == 'on') {
            $column_classes[] = 'col-border-left';
        }
        // background color of the column
        $column_colour = empty($column_colour) ? '' : 'style="background:' . $column_colour . ';"';

        $output = '<div class="' . implode(' ', $column_classes) . '" ' . implode(' ', $column_attrs) . ' ' . $column_colour . '>';
        $output .= do_shortcode($content);
        $output .= '</div>';

        return $output;
    }
}
add_shortcode('vc_column', 'oxy_section_vc_column');
add_shortcode('vc_column_inner', 'oxy_section_vc_column');

/**
 * Handles VC column text
 *
 * @return shortcode HTML
 **/
if (!function_exists('oxy_section_vc_column_text')) {
    function oxy_section_vc_column_text($atts, $content)
    {
        extract(shortcode_atts(array(
            'text_columns'           => 'col-text-1',
            'text_color'             => 'text-normal',
            'extra_classes'          => '',
            'margin_top'             => '20',
            'margin_bottom'          => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
             // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $classes = array();
        $classes[] = $text_columns;
        $classes[] = $text_color;
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }

        // removed wrongly placed p tags and insert them again after entering some newlines
        $content = wpautop(preg_replace('/<\/?p\>/', "\n", $content)."\n");
        $content = do_shortcode($content);

        ob_start();
        include(locate_template('partials/shortcodes/column-text.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('vc_column_text', 'oxy_section_vc_column_text');

/**
 * Handles VC slab text
 *
 * @return shortcode HTML
 **/
if (!function_exists('oxy_section_vc_column_slab_text')) {
    function oxy_section_vc_column_slab_text($atts, $content)
    {
        extract(shortcode_atts(array(
            'text_color'             => 'text-normal',
            'slab_weight'            => 'regular',
            'slab_header'            => 'h3',
            'extra_classes'          => '',
            'margin_top'             => '20',
            'margin_bottom'          => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
             // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $classes = array();
        $classes[] = $text_color;
        $classes[] = $slab_weight;
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }

        // removed wrongly placed p tags and insert them again after entering some newlines
        $content = wpautop(preg_replace('/<\/?p\>/', "\n", $content)."\n");

        $content = str_replace('<p>', '<span>', $content);
        $content = str_replace('</p>', '</span>', $content);
        $content = do_shortcode($content);

        ob_start();
        include(locate_template('partials/shortcodes/column-slab-text.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('vc_column_slab_text', 'oxy_section_vc_column_slab_text');

/**
 * Handles VC separator
 *
 * @return <hr> HTML
 **/
if (!function_exists('oxy_section_vc_separator')) {
    function oxy_section_vc_separator($atts, $content)
    {
        return '<hr>';
    }
}
add_shortcode('vc_separator', 'oxy_section_vc_separator');


/**
 * Handles VC image shortcode
 *
 * @return shortcode HTML
 **/
if (!function_exists('oxy_section_vc_single_image')) {
    function oxy_section_vc_single_image($atts, $content = '')
    {
        // setup options
        extract(shortcode_atts(array(
            'image'                  => '',
            'link_type'              => 'magnific',
            'link'                   => '',
            'link_target'            => '_self',
            'hover_effect'           => '',
            'alt'                    => '',
            // global options
            'extra_classes'          => '',
            'margin_top'             => '20',
            'margin_bottom'          => '20',
            'scroll_animation'       => 'none',
            'portfolio_item'         => false,
            'scroll_animation_delay' => '0',
             // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $src = '';
        $attachment = wp_get_attachment_image_src($image, 'full');
        if (isset($attachment[0])) {
            $src = $attachment[0];
        }

        $classes = array();
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        $classes[] = $hover_effect;
        $classes[] = oxy_add_extra_shortcode_classes($atts);

        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation' ;
        }

        // create magnific link
        $magnific_link_url = '';
        $full = wp_get_attachment_image_src($image, 'full');
        $magnific_link_url = $full[0];

        $hover_link = '';
        $hover_link_class = '';

        switch($link_type) {
            case 'magnific':
                // if link is empty then use the big image if not empty get use the link provided
                $hover_link = empty($link) ? $magnific_link_url : $link;
                // check if link is video / image for magnific
                $hover_link_class = oxy_check_src_magnific_type($hover_link);
                break;
            case 'item':
                $hover_link = empty($link) ? $magnific_link_url : $link;
                break;
            case 'no-link':
                // hover_link is default ''
                break;
        }

        ob_start();
        include(locate_template('partials/shortcodes/single-image.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('vc_single_image', 'oxy_section_vc_single_image');


/**
 * Handles VC shaped image shortcode
 *
 * @return shortcode HTML
 **/
if (!function_exists('oxy_section_shapedimage')) {
    function oxy_section_shapedimage($atts, $content = '')
    {
        // setup options
        extract(shortcode_atts(array(
            'image'             => '',
            'shape_size'        => 'medium',
            'shape'             => 'round',
            'animation'         => 'none',
            'magnific'          => 'off',
            'alt'               => '',
            'link'              => '',
            'link_target'       => '_self',
            'overlay_grid'      => '0',
            'background_colour' => '',
            // global options
            'extra_classes'          => '',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $output = '';
        if (!empty($image)) {
            // get image
            $image_size = $shape === 'round' ? 'square-image' : $shape . '-image';
            $attachment = wp_get_attachment_image_src($image, $image_size);
            if (isset($attachment[0])) {
                $src = $attachment[0];
            }

            $classes = array('box-' . $shape);
            if ($shape_size != 'none') {
                $classes[] = 'box-' . $shape_size;
            }
            $classes[] = 'box-simple';
            $classes[] = oxy_add_extra_shortcode_classes($atts);
            $classes[] = 'element-top-' . $margin_top;
            $classes[] = 'element-bottom-' . $margin_bottom;
            if ($scroll_animation !== 'none') {
                $classes[] = 'os-animation';
            }

            $link_classes = array();
            if ($magnific == 'on') {
                $full = wp_get_attachment_image_src($image, 'full');
                $link = $full[0];
                $link_classes[] = 'magnific';
            }

            $background_colour = $background_colour === '' ? '' : 'style="background-color:' . esc_attr($background_colour) . '";';
            $overlay_classes = array('grid-overlay-' . $overlay_grid);

            ob_start();
            include(locate_template('partials/shortcodes/shaped-image.php'));
            $output = ob_get_contents();
            ob_end_clean();
        }

        return $output;
    }
}
add_shortcode('shapedimage', 'oxy_section_shapedimage');

/**
 * Handles VC tabs shortcode
 *
 * @return shortcode HTML
 **/
if (!function_exists('oxy_shortcode_vc_tabs')) {
    function oxy_shortcode_vc_tabs($atts, $content = '')
    {
        extract(shortcode_atts(array(
            'style'        => 'top',
            // global options
            'extra_classes'          => '',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        switch ($style) {
            case 'bottom':
                $position = 'tabs-below';
                break;
            default:
                $position = '';
                break;
        }

        $classes = array();
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }

        // grab all tabs inside this tabs pane
        $pattern = get_shortcode_regex();
        $count = preg_match_all('/'. $pattern .'/s', $content, $matches);
        if (is_array($matches) && array_key_exists(2, $matches) && in_array('vc_tab', $matches[2])) {
            ob_start();
            include(locate_template('partials/shortcodes/bootstrap/tabs/tab_headers.php'));
            $tab_headers = ob_get_contents();
            ob_end_clean();
            ob_start();
            include(locate_template('partials/shortcodes/bootstrap/tabs/tab_contents.php'));
            $tab_contents = ob_get_contents();
            ob_end_clean();
            ob_start();
            include(locate_template('partials/shortcodes/bootstrap/tabs/tabs.php'));
            $output = ob_get_contents();
            ob_end_clean();
        }
        return $output;
    }
}
add_shortcode('vc_tabs', 'oxy_shortcode_vc_tabs');

/**
 * Handles VC tab shortcode
 *
 * @return shortcode HTML
 **/
if (!function_exists('oxy_shortcode_vc_tab')) {
    function oxy_shortcode_vc_tab($atts, $content = '')
    {
        return do_shortcode($content);
    }
}
add_shortcode('vc_tab', 'oxy_shortcode_vc_tab');

if (!function_exists('oxy_shortcode_vc_accordion')) {
    function oxy_shortcode_vc_accordion($atts, $content = '')
    {
        extract(shortcode_atts(array(
            'type' => 'primary',
            // global options
            'extra_classes'          => '',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $id = 'accordion_' . rand(100, 999);
        $pattern = get_shortcode_regex();
        $count = preg_match_all('/'. $pattern .'/s', $content, $matches);

        $classes = array();
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }

        if (is_array($matches) && array_key_exists(2, $matches) && in_array('vc_accordion_tab', $matches[2])) {
            ob_start();
            include(locate_template('partials/shortcodes/bootstrap/accordion.php'));
            $output = ob_get_contents();
            ob_end_clean();
        }

        return $output;
    }
}
add_shortcode('vc_accordion', 'oxy_shortcode_vc_accordion');

/**
 * Creates a boostrap accordion
 *
 * @return shortcode HTML
 **/
if (!function_exists('oxy_shortcode_vc_accordion_tab')) {
    function oxy_shortcode_vc_accordion_tab($atts, $content = '')
    {
        return do_shortcode($content);
    }
}
add_shortcode('vc_accordion_tab', 'oxy_shortcode_vc_accordion_tab');


/****************** TYPOGRAPHY SHORTCODES *******************************/

/**
 * Code shortcode - for showing code!
 *
 * @return Code html
 **/
if (!function_exists('oxy_shortcode_code')) {
    function oxy_shortcode_code($atts, $content = null)
    {
        extract(shortcode_atts(array(
            // global options
            'extra_classes'          => '',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $classes = array();
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation ';
        }

        ob_start();
        include(locate_template('partials/shortcodes/code.php'));
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }
}
add_shortcode('code', 'oxy_shortcode_code');


/**
 * Featured Icon shortcode - for showing a big icon in a shape
 *
 * @return Icon html
 **/
if (!function_exists('oxy_shortcode_icon')) {
    function oxy_shortcode_icon($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'size'                   => '16',
            'text_color'             => 'text-normal',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        // Removing the p's added from VC
        $content = str_ireplace('<p>','',$content);
        $content = str_ireplace('</p>','',$content);

        $classes = oxy_add_extra_shortcode_classes($atts);

        $output = '<i class="' . $content . ' ' . $text_color  .  ' '. $classes .'"';
        if ($size !== 0) {
            $output .= ' style="font-size:' . $size . 'px"';
        }
        $output .= '></i>';
        return $output;
    }
}
add_shortcode('icon', 'oxy_shortcode_icon');

/**
 * Lead Paragraph shortcode
 *
 * @return Lead Paragraph HTML
 **/
if (!function_exists('oxy_shortcode_lead')) {
    function oxy_shortcode_lead($atts, $content)
    {
        extract(shortcode_atts(array(
            'align'                  => 'center',
            'text_color'             => 'text-normal',
            // global options
            'extra_classes'          => '',
            'margin_top'             => '20',
            'margin_bottom'          => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $classes = array();
        $classes[] = $align;
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = $text_color;
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation ';
        }
        return '<p class="lead text-' . $align . ' ' . implode(' ', $classes) . '" data-os-animation="' . $scroll_animation . '" data-os-animation-delay="' . $scroll_animation_delay . 's">' . do_shortcode($content) . '</p>';
    }
}
add_shortcode('lead', 'oxy_shortcode_lead');

/**
 * Checks a url and returns magnific type to use
 *
 * @return String 'magnific' | 'magnific-video'
 **/
function oxy_check_src_magnific_type($url)
{
    $magnific = 'magnific';
    $parsed_url = parse_url($url);
    if (strpos($parsed_url['host'], 'youtube.com') !== false ||
        strpos($parsed_url['host'], 'vimeo.com') !== false ||
        strpos($parsed_url['host'], 'wordpress.tv') !== false) {
        $magnific = 'magnific-vimeo';
    }
    return $magnific;
}

/**
 * MAgnific Popup shortcode
 *
 * @return Magnific HTML
 **/
if (!function_exists('oxy_shortcode_magnific_popup')) {
    function oxy_shortcode_magnific_popup($atts, $content)
    {
        extract(shortcode_atts(array(
            'src_url'                => '',
            'text_color'             => 'text-normal',
            'display_style'          => 'inline',
            // global options
            'extra_classes'          => '',
            'margin_top'             => '20',
            'margin_bottom'          => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));
        $classes = array();

        $classes[] = oxy_check_src_magnific_type($src_url);
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = $text_color;
        $classes[] = $display_style;
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation ';
        }

        ob_start();
        include(locate_template('partials/shortcodes/magnific.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('magnific_popup_link', 'oxy_shortcode_magnific_popup');

/**
 * Blockquote Shortcode
 *
 * @return Icon Item HTML
 **/
if (!function_exists('oxy_shortcode_blockquote')) {
    function oxy_shortcode_blockquote($atts, $content)
    {
        extract(shortcode_atts(array(
            'who'                    => '',
            'cite'                   => '',
            'align'                  => 'left',
            'text_color'             => 'text-normal',
            // global options
            'extra_classes'          => '',
            'margin_top'             => '20',
            'margin_bottom'          => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        if ($align == 'left') {
            $align_class = 'text-left';
        } elseif ($align == 'right') {
            $align_class = 'text-right';
        } elseif ($align == 'justify') {
            $align_class = 'text-justify';
        } else {
            $align_class = 'text-center';
        }
        $classes = array();
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = $align_class;
        $classes[] = $text_color;
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }
        ob_start();
        include(locate_template('partials/shortcodes/blockquote.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('blockquote', 'oxy_shortcode_blockquote');

/****************** THEME SHORTCODES *******************************/

/**
 * Feature List - to show a list of features with icon
 *
 * @return Feature List
 **/
if (!function_exists('oxy_shortcode_features_list')) {
    function oxy_shortcode_features_list($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'text_color'             => 'text-normal',
            // global options
            'extra_classes'          => '',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $classes = array();
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = $text_color;
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }

        ob_start();
        include(locate_template('partials/shortcodes/feature/feature-list.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('features_list', 'oxy_shortcode_features_list');


/**
 * Feature Shortcode - to show a feature with icon
 *
 * @return Feature Item
 **/
if (!function_exists('oxy_shortcode_feature')) {
    function oxy_shortcode_feature($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'icon'                   => '',
            'shape'                  => 'round',
            'background_color'       => '',
            'icon_color'             => '',
            'title'                  => '',
            'animation'              => '',
            // global options
            'extra_classes'          => '',
            'margin_top'             => '20',
            'margin_bottom'          => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $classes = array();
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }

        $icon_color = !empty($icon_color) ? ' style="color:' . esc_attr($icon_color) . ';"' : '';
        $background_color = !empty($background_color) ? ' style="background-color:' . esc_attr($background_color) . ';"' : '';

        ob_start();
        include(locate_template('partials/shortcodes/feature/feature.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('feature', 'oxy_shortcode_feature');


/**
 * Icon shortcode - for showing an icon
 *
 * @return Icon html
 **/
if (!function_exists('oxy_shortcode_featuredicon')) {
    function oxy_shortcode_featuredicon($atts, $content = null)
    {
        // setup options
        extract(shortcode_atts(array(
            'icon'                   => '',
            'shape_size'             => 'medium',
            'shape'                  => 'round',
            'animation'              => '',
            'link'                   => '',
            'overlay_grid'           => '0',
            'icon_color'             => '',
            'background_color'       => '',
            // global options
            'extra_classes'          => '',
            'margin_top'             => '20',
            'margin_bottom'          => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $image_size = $shape === 'round' ? 'square-image' : $shape . '-image';

        $link_classes = array();

        $classes = array('box-' . $shape);
        if ($shape_size != 'none') {
            $classes[] = 'box-' . $shape_size;
        }
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }

        $overlay_classes = array('grid-overlay-' . $overlay_grid);

        $icon_color = !empty($icon_color) ? ' style="color:' . esc_attr($icon_color) . ';"' : '';
        $background_color = !empty($background_color) ? ' style="background-color:' . esc_attr($background_color) . ';"' : '';

        ob_start();
        include(locate_template('partials/shortcodes/featured-icon.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('featuredicon', 'oxy_shortcode_featuredicon');

/**
 * Creates a bootstrap button
 *
 * @return bootstrap button HTML
 **/
if (!function_exists('oxy_shortcode_button')) {
    function oxy_shortcode_button($atts, $content = '')
    {
         // setup options
        extract(shortcode_atts(array(
            'type'                   => 'default',
            'animation'              => '',
            'size'                   => '',
            'xclass'                 => '',
            'modal'                  => '',
            'link'                   => '',
            'label'                  => 'My button',
            'icon'                   => '',
            'custom_color'           => 'false',
            'override_bg'            => '',
            'text_color'             => 'text-normal',
            'icon_position'          => 'left',
            'link_open'              => '_self',
            'margin_left'            => '0',
            'margin_right'           => '0',
            // global options
            'extra_classes'          => '',
            'margin_top'             => '20',
            'margin_bottom'          => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $size = $size == '' ? '' : $size;
        $fancy_class = '';
        if ($icon != '') {
            if ($icon_position == 'left') {
                $fancy_class = 'btn-icon-left';
            } elseif ($icon_position == 'right') {
                $fancy_class = 'btn-icon-right';
            }
        }
        $animation = ($animation != '') ? ' data-animation="' . esc_attr($animation) . '"' : '';

        $size = $size == '' ? '' : 'btn-' . $size;
        $classes = array();
        $classes[] = 'btn-' . $type;
        $classes[] = $size;
        $classes[] = $xclass;
        $classes[] = $text_color;
        $classes[] = $fancy_class;
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = 'element-left-' . $margin_left;
        $classes[] = 'element-right-' . $margin_right;
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;

        if (empty($modal)) {
            $modal_atts = '';
        }
        else {
            $modal_atts = 'data-toggle="modal" data-target="#' . $modal. '"';
            $link = '#';
        }
        // if custom color is enabled
        $override_bg = empty($override_bg) ? '' : ' style="background:' . esc_attr($override_bg) . ' "';

        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }

        ob_start();
        include(locate_template('partials/shortcodes/button.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('button', 'oxy_shortcode_button');


/* Services Section */
if (!function_exists('oxy_shortcode_service')) {
    function oxy_shortcode_service($atts, $content = '')
    {
        $output = '';
        if (isset($atts['service']) && !empty($atts['service'])) {
            $query = array(
                'post_type'   => 'oxy_service',
                'posts_per_page' =>  1,
                'name'        => $atts['service'],
                'post_status' => 'publish',
            );
            // get the service
            $query = new WP_Query($query);
            $services = $query->get_posts();

            if (count($services) > 0) {
                $output = oxy_create_service($services[0], $atts);
            }
        }
        // reset post data because we are all done here
        wp_reset_postdata();

        return $output;
    }
}
add_shortcode('service', 'oxy_shortcode_service');

if (!function_exists('oxy_create_service')) {
    function oxy_create_service($service_post, $atts)
    {
        extract(shortcode_atts(array(
            'service'                => '',
            'text_color'             => 'text-normal',
            'image_shape'            => 'round',
            'image_size'             => 'big',
            'icon_colour'            => '',
            'icon_animation'         => 'bounce',
            'background_colour'      => '',
            'overlay_grid'           => '0',
            'show_title'             => 'show',
            'tag_title'              => 'h3',
            'link_title'             => 'on',
            'show_image'             => 'show',
            'link_image'             => 'on',
            'show_excerpt'           => 'show',
            'align'                  => 'center',
            'show_readmore'          => 'hide',
            'readmore_text'          => 'read more',
            // global options
            'extra_classes'          => '',
            'margin_top'             => '20',
            'margin_bottom'          => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        global $post;
        $post = $service_post;
        setup_postdata($post);
        // get services data
        $icon = get_post_meta($post->ID, THEME_SHORT . '_icon', true);
        $link_target = get_post_meta($post->ID, THEME_SHORT . '_target', true);
        $animation = $icon_animation;

        // get link
        $link = oxy_get_slide_link($post);

        // get image
        $img_size = $image_shape === 'round' ? 'square-image' : $image_shape . '-image';
        $image_src = '';
        $featured_image_id = get_post_thumbnail_id($post->ID);
        if (!empty($featured_image_id)) {
            $image = wp_get_attachment_image_src($featured_image_id, $img_size);
            if (isset($image[0])) {
                $image_src = $image[0];
            }
        }

        // setup surrounding dic classes
        $classes = array();
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = $text_color;
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        $classes[] = 'text-' . $align;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }

        // setup image classes
        $figure_classes = array('box-' . $image_shape);
        if ($image_size != 'none') {
            $figure_classes[] = 'box-' . $image_size;
        }

        $figure_classes[] = 'box-simple';


        $shape_background_color = empty($background_colour) ? '' : ' style="background-color:' . esc_attr($background_colour) . ';"';
        $icon_colour_attr = empty($icon_colour) ? '' : ' style="color:' . esc_attr($icon_colour) . ';"';

        $overlay_classes = array('grid-overlay-' . $overlay_grid);

        ob_start();
        include(locate_template('partials/shortcodes/services/service.php'));
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }
}

/* Services Section */
if (!function_exists('oxy_shortcode_services')) {
    function oxy_shortcode_services($atts, $content = '')
    {
        $atts = shortcode_atts(array(
            'category'               => '',
            'count'                  => '3',
            'columns'                => '3',
            'text_color'             => 'text-normal',
            'image_shape'            => 'round',
            'image_size'             => 'big',
            'icon_colour'            => '',
            'icon_animation'         => 'bounce',
            'background_colour'      => '',
            'overlay_grid'           => '0',
            'show_image'             => 'show',
            'link_image'             => 'on',
            'show_title'             => 'show',
            'tag_title'              => 'h3',
            'link_title'             => 'on',
            'show_excerpt'           => 'show',
            'align'                  => 'center',
            'show_readmore'          => 'hide',
            'readmore_text'          => 'read more',
            // global options
            'extra_classes'          => '',
            'margin_top'             => '20',
            'margin_bottom'          => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            'scroll_animation_timing'=> 'staggered',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts);

        // calculate column span
        $atts['columns'] = $atts['columns'] > 0 ? floor(12 / $atts['columns']) : 12;

        $query = array(
            'post_type'        => 'oxy_service',
            'posts_per_page' => $atts['count'] === '0' ? -1 : $atts['count'],
            'orderby'          => 'menu_order',
            'order'            => 'ASC',
            'suppress_filters' => 0
        );

        if (!empty($atts['category'])) {
            $query['tax_query'] = array(
                array(
                    'taxonomy' => 'oxy_service_category',
                    'field'    => 'slug',
                    'terms'    => $atts['category']
               )
            );
        }

        // get the services
        global $post;
        $query = new WP_Query($query);
        $services = $query->get_posts();

        //setup surrounding div classes
        $wrapper_classes = array();
        $wrapper_classes[] = 'row';
        $wrapper_classes[] = oxy_add_extra_shortcode_classes($atts);
        $wrapper_classes[] = 'element-top-' . $atts['margin_top'];
        $wrapper_classes[] = 'element-bottom-' . $atts['margin_bottom'];
        if ($atts['scroll_animation'] !== 'none') {
            $wrapper_classes[] = 'os-animation';
        }
        $item_delay = $atts['scroll_animation_delay'];
        // default spacing among individual items
        $atts['margin_top'] = 20;
        $atts['margin_bottom'] = 20;

        ob_start();
        include(locate_template('partials/shortcodes/services/services.php'));
        $output = ob_get_contents();
        ob_end_clean();

        // reset post data because we are all done here
        wp_reset_postdata();

        return $output;
    }
}
add_shortcode('services', 'oxy_shortcode_services');

/**
 * The Gallery shortcode.
 *
 * This implements the functionality of the Gallery Shortcode for displaying
 * images on a post.
 *
 * @param array $attr Attributes of the shortcode.
 * @return string HTML content to display gallery.
 * @since 1.2
 */
if (!function_exists('oxy_gallery_shortcode')) {
    function oxy_gallery_shortcode($attr)
    {
        $post = get_post();

        if (! empty($attr['ids'])) {
            // 'ids' is explicitly ordered, unless you specify otherwise.
            if (empty($attr['orderby'])) {
                $attr['orderby'] = 'post__in';
            }
            $attr['include'] = $attr['ids'];
        }

        // Allow plugins/themes to override the default gallery template.
        $output = apply_filters('post_gallery', '', $attr);
        if ($output != '') {
            return $output;
        }

        // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
        if (isset($attr['orderby'])) {
            $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
            if (!$attr['orderby']) {
                unset($attr['orderby']);
            }
        }

        extract(shortcode_atts(array(
            'order'      => 'ASC',
            'orderby'    => 'menu_order ID',
            'id'         => $post->ID,
            'itemtag'    => 'dl',
            'icontag'    => 'dt',
            'captiontag' => 'dd',
            'columns'    => '3',
            'size'       => 'rect-image',
            'include'    => '',
            'exclude'    => ''
        ), $attr));

        $id = intval($id);
        if ('RAND' == $order) {
            $orderby = 'none';
        }

        if (!empty($include)) {
            $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby, 'posts_per_page' => -1));

            $attachments = array();
            foreach ($_attachments as $key => $val) {
                $attachments[$val->ID] = $_attachments[$key];
            }
        } elseif (!empty($exclude)) {
            $attachments = get_children(array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
        } else {
            $attachments = get_children(array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
        }

        if (empty($attachments)) {
            return '';
        }

        if (is_feed()) {
            $output = "\n";
            foreach ($attachments as $att_id => $attachment) {
                $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
            }
            return $output;
        }

        $columns = intval($columns);
        $span_width = $columns > 0 ? floor(12 / $columns) : 12;

        $output = '<div class="row list-container">';
        foreach ($attachments as $id => $attachment) {
            $thumb = wp_get_attachment_image_src($id, $size);
            $full = wp_get_attachment_image_src($id, 'full');
            $thumbnail_post = get_post($id);
            //Add caption if not empty
            $item_title = empty($thumbnail_post->post_excerpt) === true ? '' : '<p class="wp-caption-text">'. $thumbnail_post->post_excerpt .'</p>';

            $output .= '<div class="wp-caption col-md-' . $span_width . '">';
            $output .= '<a class="thumbnail magnific" href="' . $full[0]  . '">';
            $output .= '<img src="' . $thumb[0] . '">';
            $output .= '</a>';
            $output .= $item_title;
            $output .= '</div>';
        }

        $output .= '</div>';
        return $output;
    }
}
add_shortcode('gallery', 'oxy_gallery_shortcode');

/* ---------- TESTIMONIALS SHORTCODE ---------- */

if (!function_exists('oxy_shortcode_testimonials')) {
    function oxy_shortcode_testimonials($atts, $content = '')
    {
        // setup options
        extract(shortcode_atts(array(
            'count'                  => '3',
            'group'                  => '',
            'layout'                 => 'image',
            'animation_type'         => 'slide',
            'speed'                  => '7000',
            'show_controls'          => 'show',
            'randomize'              => 'off',
            'text_align'             => 'center',
            'text_color'             => 'text-normal',
            // global options
            'extra_classes'          => '',
            'margin_top'             => '20',
            'margin_bottom'          => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        // setup surrounding dic classes
        $classes = array();
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        $classes[] = 'text-' . $text_align;
        $classes[] = $text_color;

        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }
        $classes[] = 'flexslider';

        $order_by = $randomize === 'off' ? 'menu_order' : 'rand';

        $query_options = array(
            'post_type'   => 'oxy_testimonial',
            'posts_per_page' => $count === '0' ? -1 : $count,
            'order'      => 'ASC',
            'orderby'     => $order_by,
            'suppress_filters' => 0
        );
        if (!empty($group)) {
            $query_options['tax_query'] = array(
                array(
                    'taxonomy' => 'oxy_testimonial_group',
                    'field' => 'slug',
                    'terms' => $group
               )
            );
        }
        // fetch posts
        $query = new WP_Query($query_options);
        $items = $query->get_posts();
        $items_count = count($items);
        $output = '';
        if ($items_count > 0):
            ob_start();
            include(locate_template('partials/shortcodes/testimonials/slideshow/slideshow.php'));
            $output = ob_get_contents();
            ob_end_clean();
        endif;
        return $output;
    }
}
add_shortcode('testimonials', 'oxy_shortcode_testimonials');

/* ---------- TESTIMONIALS LIST SHORTCODE ---------- */
if (!function_exists('oxy_shortcode_testimonials_list')) {
    function oxy_shortcode_testimonials_list($atts, $content = '')
    {
        // setup options
        extract(shortcode_atts(array(
            'count'                               => '3',
            'columns'                             => '3',
            'group'                               => '',
            'show_image'                          => 'show',
            'text_color'                          => 'text-normal',
            // global options
            'extra_classes'                       => '',
            'margin_top'                          => '20',
            'margin_bottom'                       => '20',
            'scroll_animation'                    => 'none',
            'scroll_animation_delay'              => '0',
            'testimonial_scroll_animation_timing' => 'staggered',
            // responsive options
            'hidden_on_large'                     => 'off',
            'hidden_on_medium'                    => 'off',
            'hidden_on_small'                     => 'off',
            'hidden_on_xsmall'                    => 'off'
        ), $atts));

        // calculate column span
        $columns = $columns > 0 ? floor(12 / $columns) : 12;
        // setup surrounding dic classes
        $classes = array();
        $classes[] = 'row';
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        $classes[] = $text_color;

        $wrapper_classes[] = 'col-md-' . $columns;
        $wrapper_classes[] = 'element-short-bottom';
        if ($scroll_animation !== 'none') {
            $wrapper_classes[] = 'os-animation';
        }

        $item_delay = $scroll_animation_delay ;
        $query_options = array(
            'post_type'   => 'oxy_testimonial',
            'posts_per_page' => $count === '0' ? -1 : $count,
            'order'      => 'ASC',
            'suppress_filters' => 0
        );

        if (!empty($group)) {
            $query_options['tax_query'] = array(
                array(
                    'taxonomy' => 'oxy_testimonial_group',
                    'field' => 'slug',
                    'terms' => $group
               )
            );
        }
        // fetch posts
        $query = new WP_Query($query_options);
        $items = $query->get_posts();
        $items_count = count($items);
        $layout = $show_image == 'show'? 'image':'no-image';
        $output = '';
        if ($items_count > 0):
            ob_start();
            include(locate_template('partials/shortcodes/testimonials/list/'.$layout.'.php'));
            $output = ob_get_contents();
            ob_end_clean();
        endif;
        return $output;
    }
}
add_shortcode('testimonials_list', 'oxy_shortcode_testimonials_list');

/* Staff List */
if (!function_exists('oxy_shortcode_staff_list')) {
    function oxy_shortcode_staff_list($atts, $content = '')
    {
         // setup options
        $atts = shortcode_atts(array(
            // staf list sc exclusive
            'department'                => '',
            'count'                     => '3',
            'columns'                   => '3',
            'scroll_animation_timing'   => 'staggered',
            // common with staff single
            'text_color'                => 'text-normal',
            'show_position'             => 'show',
            'show_social'               => 'show',
            'link_title'                => 'on',
            'show_description'          => 'show',
            'text_align'                => 'center',
            'overlay_animation'         => 'fade-in',
            'overlay_grid'              => '0',
            // global options
            'extra_classes'             => '',
            'margin_top'                => '20',
            'margin_bottom'             => '20',
            'scroll_animation'          => 'none',
            'scroll_animation_delay'    => '0',
            // responsive options
            'hidden_on_large'           => 'off',
            'hidden_on_medium'          => 'off',
            'hidden_on_small'           => 'off',
            'hidden_on_xsmall'          => 'off'
        ), $atts);

        $query_options = array(
            'post_type'        => 'oxy_staff',
            'posts_per_page' => $atts['count'] === '0' ? -1 : $atts['count'],
            'order'            => 'ASC',
            'orderby'          => 'menu_order',
            'suppress_filters' => 0
        );

        if (!empty($atts['department'])) {
            $query_options['tax_query'] = array(
                array(
                    'taxonomy' => 'oxy_staff_department',
                    'field' => 'slug',
                    'terms' => $atts['department']
               )
            );
        }

        // calculate column span
        $atts['columns'] = $atts['columns'] > 0 ? floor(12 / $atts['columns']) : 12;

        $container_classes = array();
        $container_classes[] = oxy_add_extra_shortcode_classes($atts);
        $container_classes[] = 'row';
        $container_classes[] = 'staff-list-container';
        $container_classes[] = 'list-container';
        $container_classes[] = 'element-top-' . $atts['margin_top'];
        $container_classes[] = 'element-bottom-' . $atts['margin_bottom'];

        $classes = array();
        $classes[] = 'staff-os-animation';
        $classes[] = 'col-md-' . $atts['columns'];

        $item_delay = $atts['scroll_animation_delay'];
        $atts['extra_classes'] = 'col-md-' . $atts['columns'];
        // default spacing among individual items
        $atts['margin_top'] = 20;
        $atts['margin_bottom'] = 20;

        // fetch posts
        $query = new WP_Query($query_options);
        $posts = $query->get_posts();

        ob_start();
        include(locate_template('partials/shortcodes/staff/list.php'));
        $output = ob_get_contents();
        ob_end_clean();

        // reset post data because we are all done here
        wp_reset_postdata();

        return $output;
    }
}
add_shortcode('staff_list', 'oxy_shortcode_staff_list');



/* ---------------- FEATURED STAFF MEMBER SHORTCODE --------------- */

if (!function_exists('oxy_shortcode_staff_featured')) {
    function oxy_shortcode_staff_featured($atts, $content = '')
    {
        $output = '';
        if (isset($atts['member']) && !empty($atts['member'])) {
            $staff = get_post($atts['member']);

            if (count($staff) > 0) {
                $output = oxy_create_staff($staff, $atts);
            }
        }
        // reset post data because we are all done here
        wp_reset_postdata();

        return $output;
    }
}
add_shortcode('staff_featured', 'oxy_shortcode_staff_featured');

if (!function_exists('oxy_create_staff')) {
    function oxy_create_staff($staff_member, $atts)
    {
         // setup options
        extract(shortcode_atts(array(
            // staff single sc exclusive
            'member'                    => '',
            'text_color'                => 'text-normal',
            // common with staff list
            'show_position'             => 'show',
            'show_social'               => 'show',
            'link_title'                => 'on',
            'show_description'          => 'show',
            'text_align'                => 'center',
            'overlay_animation'         => 'fade-in',
            'overlay_grid'              => '0',
            // global options
            'extra_classes'             => '',
            'margin_top'                => '20',
            'margin_bottom'             => '20',
            'scroll_animation'          => 'none',
            'scroll_animation_delay'    => '0',
            // responsive options
            'hidden_on_large'           => 'off',
            'hidden_on_medium'          => 'off',
            'hidden_on_small'           => 'off',
            'hidden_on_xsmall'          => 'off'
        ), $atts));

        global $post;
        $post = $staff_member;
        setup_postdata($post);
        // post metadata
        $link_target = get_post_meta($post->ID, THEME_SHORT . '_target', true);
        $custom_fields = get_post_custom($post->ID);
        $position      = (isset($custom_fields[THEME_SHORT.'_position']))? $custom_fields[THEME_SHORT.'_position'][0]:'';
        $attachment = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
        $src = '';
        if (isset($attachment[0])) :
            $src = $attachment[0];
        endif;

        // post classes
        $classes = array();
        $classes[] = $text_color;
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = $overlay_animation;
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        $classes[] = 'figcaption-bottom';
        $classes[] = 'text-'.$text_align;
        $classes[] = 'fade-in';
        if ($scroll_animation !== 'none') :
            $classes[] = 'os-animation';
        endif;

        // overlay classes
        $overlay_classes = array('grid-overlay-' . $overlay_grid);

        ob_start();
        include(locate_template('partials/shortcodes/staff/single.php'));
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }
}

/* --------------------- PORTFOLIO SHORTCODES --------------------- */
if (!function_exists('oxy_shortcode_portfolio')) {
    function oxy_shortcode_portfolio($atts, $content = '', $code = '')
    {
         // setup options
        extract(shortcode_atts(array(
            'categories'                   => '',
            'count'                        => '0',
            'filters'                      => '',
            'columns'                      => '3',
            'xs_col'                       => '1',
            'sm_col'                       => '2',
            'md_col'                       => '3',
            'lg_col'                       => '5',
            'layout_mode'                  => 'fitRows',
            'text_color'                   => 'text-normal',
            // item options
            'item_size'                    => 'portfolio-thumb',
            'item_padding'                 => '15',
            'item_link_type'               => 'magnific',
            'item_captions_below'          => 'hide',
            'captions_below_link_type'     => 'item',
            'item_caption_align'           => 'center',
            'item_hover_filter'            => 'none',
            'hover_filter_invert'          => 'image-filter-onhover',
            'item_overlay'                 => 'icon',
            'item_caption_vertical'        => 'middle',
            'magnific_caption'             => 'image_caption',
            'item_overlay_animation'       => 'fade-in',
            'item_overlay_grid'            => '0',
            'item_overlay_icon'            => '',
            'item_scroll_animation'        => 'none',
            'item_scroll_animation_delay'  => '0',
            'item_scroll_animation_timing' => 'staggered',
            'pagination'                   => 'none',
            'extra_classes'                => '',
            'margin_top'                   => '20',
            'margin_bottom'                => '20',
            // responsive options
            'hidden_on_large'              => 'off',
            'hidden_on_medium'             => 'off',
            'hidden_on_small'              => 'off',
            'hidden_on_xsmall'             => 'off'
        ), $atts));

        $show_filters = explode(',', $filters);

        $query_options = array(
            'post_type'   => 'oxy_portfolio_image',
            'orderby'     => 'menu_order',
            'order'       => 'ASC',
            'suppress_filters' => 0,
            'posts_per_page' => $count === '0' ? -1 : $count
        );

        global $paged;
        if ($pagination !== 'none') {
            // if pagination, count sets posts per page
            if (get_query_var('paged')) {
                $paged = get_query_var('paged');
            } elseif (get_query_var('page')) {
                $paged = get_query_var('page');
            } else {
                $paged = 1;
            }
            $query_options['paged'] = $paged;
            $query_options['posts_per_page'] = $count;
        }

        $filters = get_terms('oxy_portfolio_categories', array('hide_empty' => 1));

        if (!empty($categories)) {
            $selected_portfolios = explode(',', $categories);
            $query_options['tax_query'][] = array(
                'taxonomy' => 'oxy_portfolio_categories',
                'field' => 'slug',
                'terms' => $selected_portfolios
            );
            // remove categories that arent selected from the category filter
            foreach ($filters as $index => $filter) {
                if (!in_array($filter->slug, $selected_portfolios)) {
                    unset($filters[$index]);
                }
            }
        }

        $classes = array('portfolio', 'masonry', 'no-transition');
        if ($item_link_type === 'magnific-all') {
            $classes[] = 'magnific-all';
        }

        $container_classes = array();
        $container_classes[] = oxy_add_extra_shortcode_classes($atts);
        $container_classes[] = 'element-top-' . $margin_top;
        $container_classes[] = 'element-bottom-' . $margin_bottom;
        $container_classes[] = $text_color;
        // fetch posts
        $posts = query_posts($query_options);
        $count = count($posts);
        $span_num = 12 / $columns;


        ob_start();
        echo '<div class="portfolio-container ' . implode(' ', $container_classes) . '">';
        include(locate_template('partials/shortcodes/portfolio/filters.php'));
        include(locate_template('partials/shortcodes/portfolio/standard.php'));
        echo '</div>';
        $output = ob_get_contents();
        ob_end_clean();

        wp_reset_query();
        wp_reset_postdata();

        return $output;
    }
}
add_shortcode('portfolio', 'oxy_shortcode_portfolio');


function oxy_get_image_caption($post_id)
{
    $thumbnail_image = get_posts(array('p' => $post_id, 'post_type' => 'attachment'));
    $magnific_popup_caption = $thumbnail_image[0]->post_excerpt;
    return $magnific_popup_caption;
}

if (!function_exists('oxy_shortcode_portfolio_masonry')) {
    function oxy_shortcode_portfolio_masonry($atts, $content = '', $code = '')
    {
         // setup options
        extract(shortcode_atts(array(
            'categories'                   => '',
            'count'                        => '0',
            'filters'                      => '',
            'columns'                      => '3',
            'xs_col'                       => '1',
            'sm_col'                       => '2',
            'md_col'                       => '4',
            'lg_col'                       => '6',
            'layout_mode'                  => 'masonry',
            'pagination'                   => 'none',
            'text_color'                   => 'text-normal',
            // item options
            'item_size'                    => 'full',
            'item_padding'                 => '0',
            'item_link_type'               => 'magnific',
            'item_captions_below'          => 'hide',
            'captions_below_link_type'     => 'item',
            'item_caption_align'           => 'center',
            'item_hover_filter'            => 'none',
            'hover_filter_invert'          => 'image-filter-onhover',
            'item_overlay'                 => 'icon',
            'item_caption_vertical'        => 'middle',
            'magnific_caption'             => 'image_caption',
            'item_overlay_animation'       => 'fade-in',
            'item_overlay_grid'            => '0',
            'item_overlay_icon'            => 'plus',
            'item_scroll_animation'        => 'none',
            'item_scroll_animation_delay'  => '0',
            'item_scroll_animation_timing' => 'staggered',
            'pagination'                   => 'none',
            'extra_classes'                => '',
            'margin_top'                   => '20',
            'margin_bottom'                => '20',
            // responsive options
            'hidden_on_large'              => 'off',
            'hidden_on_medium'             => 'off',
            'hidden_on_small'              => 'off',
            'hidden_on_xsmall'             => 'off'
        ), $atts));

        $show_filters = explode(',', $filters);

        $query_options = array(
            'post_type'   => 'oxy_portfolio_image',
            'orderby'     => 'menu_order',
            'order'       => 'ASC',
            'suppress_filters' => 0,
            'posts_per_page' => $count === '0' ? -1 : $count
        );

        global $paged, $oxy_is_iphone, $oxy_is_ipad, $oxy_is_android;
        if ($pagination !== 'none' || $oxy_is_iphone || $oxy_is_ipad || $oxy_is_android) {
            // if pagination, count sets posts per page
            if (get_query_var('paged')) {
                $paged = get_query_var('paged');
            } elseif (get_query_var('page')) {
                $paged = get_query_var('page');
            } else {
                $paged = 1;
            }
            $query_options['paged'] = $paged;
            $query_options['posts_per_page'] = $count;
        }

        $filters = get_terms('oxy_portfolio_categories', array('hide_empty' => 1));

        if (!empty($categories)) {
            $selected_portfolios = explode(',', $categories);
            $query_options['tax_query'][] = array(
                'taxonomy' => 'oxy_portfolio_categories',
                'field' => 'slug',
                'terms' => $selected_portfolios
            );

             // remove categories that arent selected from the category filter
            foreach ($filters as $index => $filter) {
                if (!in_array($filter->slug, $selected_portfolios)) {
                    unset($filters[$index]);
                }
            }
        }

        $classes = array('portfolio', 'masonry', 'no-transition', 'use-masonry');
        if ($item_link_type === 'magnific-all') {
            $classes[] = 'magnific-all';
        }

        $container_classes = array();
        $container_classes[] = oxy_add_extra_shortcode_classes($atts);
        $container_classes[] = 'element-top-' . $margin_top;
        $container_classes[] = 'element-bottom-' . $margin_bottom;
        $container_classes[] = $text_color;

        // fetch posts
        $posts = query_posts($query_options);
        $count = count($posts);
        $span_num = 12 / $columns;

        ob_start();
        echo '<div class="portfolio-container ' . implode(' ', $container_classes) . '">';
        include(locate_template('partials/shortcodes/portfolio/filters.php'));
        include(locate_template('partials/shortcodes/portfolio/standard.php'));
        echo '</div>';
        $output = ob_get_contents();
        ob_end_clean();

        wp_reset_query();
        wp_reset_postdata();

        return $output;
    }
}
add_shortcode('portfolio_masonry', 'oxy_shortcode_portfolio_masonry');


/* ---------------------- PIE CHART SHORTCODE -----------------  */

if (!function_exists('oxy_shortcode_pie')) {
    function oxy_shortcode_pie($atts, $content = '')
    {
        // setup options
        extract(shortcode_atts(array(
            'icon'          => '',
            'icon_animation'=> 'none',
            'bar_colour'    => '',
            'track_colour'  => '',
            'line_width'    => '20',
            'size'          => '200',
            'percentage'    => '50',
            // global options
            'extra_classes'          => '',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $header_classes = array();
        $header_classes[] = oxy_add_extra_shortcode_classes($atts);
        $header_classes[] = 'element-top-' . $margin_top;
        $header_classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $header_classes[] = 'os-animation';
        }

        $icon_animation = $icon_animation != 'none' ? ' data-animation="' . $icon_animation . '"': '';
        ob_start();
        include(locate_template('partials/shortcodes/easy-pie-chart.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('pie', 'oxy_shortcode_pie');

/* ---------------------- CIRCULAR COUNTER SHORTCODE -----------------  */
if (!function_exists('oxy_shortcode_counter')) {
    function oxy_shortcode_counter($atts, $content = '')
    {
        // setup options
        extract(shortcode_atts(array(
            'initvalue'              => '0',
            'value'                  => '0',
            'format'                 => '(,ddd)',
            'counter_size'           => 'normal',
            'counter_weight'         => 'regular',
            'align'                  => 'default',
            'text_color'             => 'text-normal',
            // global options
            'extra_classes'          => '',
            'margin_top'             => '20',
            'margin_bottom'          => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $header_classes = array();
        $header_classes[] = 'text-'. $align;
        $header_classes[] = oxy_add_extra_shortcode_classes($atts);
        $header_classes[] = 'element-top-' . $margin_top;
        $header_classes[] = 'element-bottom-' . $margin_bottom;
        $header_classes[] = $text_color;

        if ($scroll_animation !== 'none') {
            $header_classes[] = 'os-animation';
        }

        ob_start();
        include(locate_template('partials/shortcodes/counter.php'));
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }
}
add_shortcode('counter', 'oxy_shortcode_counter');

/* ---------------------- COUNTDOWN TIMER SHORTCODE -----------------  */

if (!function_exists('oxy_shortcode_countdown')) {
    function oxy_shortcode_countdown($atts, $content = '')
    {
        // setup options
        extract(shortcode_atts(array(
            'date'                   => '',
            'number_size'            => 'super',
            'number_weight'          => 'regular',
            'text_color'             => 'text-normal',
            // global options
            'extra_classes'          => '',
            'margin_top'             => '20',
            'margin_bottom'          => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $classes = array();
        $classes[] = $number_size;
        $classes[] = $number_weight;
        $classes[] = $text_color;

        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }

        ob_start();
        include(locate_template('partials/shortcodes/countdown/countdown.php'));
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }
}
add_shortcode('countdown', 'oxy_shortcode_countdown');


/* --------------------- PRICING SHORTCODE ---------------------- */

if (!function_exists('oxy_shortcode_pricing')) {
    function oxy_shortcode_pricing($atts, $content = '')
    {
        extract(shortcode_atts(array(
            'heading'         => '',
            'featured'        => 'false',
            'pricing_background_colour' => '#82c9ed',
            'pricing_foreground_colour' => '#FFFFFF',
            'show_price'      => 'true',
            'price'           =>  '',
            'pricing_colour'  =>  '#FFFFFF',
            'pricing_background'  =>  '#82c9ed',
            'currency'        => '&#36;',
            'custom_currency' => '',
            'per'             => '',
            'list'            => '',
            'show_button'     => 'true',
            'button_text'     => '',
            'button_link'     => '',
            'button_background_colour' => '#ffffff',
            'button_foreground_colour' => '#82c9ed',
            // global options
            'extra_classes'          => '',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $classes = array();
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        $classes[] = 'pricing-col';

        if ($featured === 'true') {
            $classes[] = 'pricing-featured';
        }
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }

        $list = explode(',', $list);

        ob_start();
        include(locate_template('partials/shortcodes/pricing/pricing.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('pricing', 'oxy_shortcode_pricing');


/* --------------------- PRICING LIST SHORTCODE ---------------------- */

/**
 * Pricing List - to show a list of pricing items
 *
 * @return Pricing List
 **/
if (!function_exists('oxy_shortcode_pricing_list')) {
    function oxy_shortcode_pricing_list($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'text_color'             => 'text-normal',
            // global options
            'extra_classes'          => '',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $classes = array();
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = $text_color;
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }

        ob_start();
        include(locate_template('partials/shortcodes/pricing/pricing-list.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('pricing_list', 'oxy_shortcode_pricing_list');


/**
 * Pricing Item Shortcode - to show a pricing item
 *
 * @return Pricing Item
 **/
if (!function_exists('oxy_shortcode_pricing_item')) {
    function oxy_shortcode_pricing_item($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'title'                  => '',
            'description'            => '',
            'featured_label'         => '',
            'image'                  => '',
            'shape'                  => 'round',
            'price'                  => '',
            // global options
            'extra_classes'          => '',
            'margin_top'             => '20',
            'margin_bottom'          => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $classes = array();
        $classes[] = $shape === 'round' ? 'pricing-cirle' : '';
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }

        $src = '';
        $attachment = wp_get_attachment_image_src($image, 'full');
        if (isset($attachment[0])) {
            $src = $attachment[0];
        }

        ob_start();
        include(locate_template('partials/shortcodes/pricing/pricing-item.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('pricing_item', 'oxy_shortcode_pricing_item');
/*----------------- RECENT NEWS SECTION SHORTCODE AND HELPER FUNCTIONS --------------------*/

if (!function_exists('oxy_get_recent_posts')) {
    function oxy_get_recent_posts($count, $categories, $authors = null, $post_formats = null)
    {
        $query = array();
        // set post count
        global $paged;
        if (get_query_var('paged')) {
            $paged = get_query_var('paged');
        } elseif (get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }
        $query['paged'] = $paged;
        $query['posts_per_page'] = $count;
        // set category if selected
        if (!empty($categories)) {
            $query['category_name'] = implode(',', $categories);
        }
        // set author if selected
        if (!empty($authors)) {
            $query['author'] = implode(',', $authors);
        }
        // set post format if selected
        if (!empty($post_formats)) {
            foreach ($post_formats as $key => $value) {
                $post_formats[$key] = 'post-format-' . $value;
            }
            $query['tax_query'] = array();
            $query['tax_query'][] = array(
                'taxonomy' => 'post_format',
                'field'    => 'slug',
                'terms'    => $post_formats
            );
        }
        // fetch posts
        return query_posts($query);
    }
}

if (!function_exists('oxy_shortcode_recent')) {
    function oxy_shortcode_recent($atts, $content = '')
    {
        // setup options
        extract(shortcode_atts(array(
            'count'                     => '3',
            'cat'                       => null,
            'columns'                   => '3',
            'style'                     => 'small',
            'title_tag'                 => 'h3',
            'text_align'                => 'left',
            'scroll_animation_timing'   => 'staggered',
            // global options
            'extra_classes'             => '',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'scroll_animation'          => 'none',
            'scroll_animation_delay'    => '0',
            // responsive options
            'hidden_on_large'           => 'off',
            'hidden_on_medium'          => 'off',
            'hidden_on_small'           => 'off',
            'hidden_on_xsmall'          => 'off'
        ), $atts));

        $span_width = $columns > 0 ? floor(12 / $columns) : 4;

        $classes = array();
        $container_classes = array();
        $container_classes[] = oxy_add_extra_shortcode_classes($atts);
        $container_classes[] = 'element-top-' . $margin_top;
        $container_classes[] = 'element-bottom-' . $margin_bottom;
        $container_classes[] = 'recent-simple-os-container list-container';

        $image_size = 'related-post-image';
        if ($style === 'list') {
            $container_classes[] = 'post-list';
            $image_size = 'thumbnail';
        } else {
            $container_classes[] = 'row';
            $classes[] = 'col-md-'. $span_width;
        }

        if ($scroll_animation !== 'none') {
            $classes[] = 'recent-simple-os-animation';
        }

        $item_delay = $scroll_animation_delay;
        $cat = (null === $cat) ? null : explode(',', $cat);

        $posts = oxy_get_recent_posts($count, $cat);

        global $post;
        $output = '';
        if (!empty($posts)):
            ob_start();
            include(locate_template('partials/shortcodes/posts/recent-posts.php'));
            $output .= ob_get_contents();
            ob_end_clean();
        endif;

        // reset post data
        wp_reset_postdata();
        wp_reset_query();

        return $output;
    }
}
add_shortcode('recent_posts', 'oxy_shortcode_recent');


/*------------------------ SLIDESHOW SHORTCODE -----------------------*/

if (!function_exists('oxy_shortcode_slideshow')) {
    function oxy_shortcode_slideshow($atts, $content = '')
    {
        extract(shortcode_atts(array(
            'flexslider'         => '',
            'ids'                => '',
            'animation'          => 'slide',
            'direction'          => 'horizontal',
            'speed'              => '7000',
            'duration'           => '600',
            'directionnav'       => 'hide',
            'itemwidth'          => '',
            'showcontrols'       => 'show',
            'controlsposition'   => 'inside',
            'controlsalign'      => 'center',
            'controls_vertical'  => 'bottom',
            'captions'           => 'show',
            'captions_horizontal'=> 'left',
            'autostart'          => 'true',
            'tooltip'            => 'hide',
            'image_size'         => 'full',
            // global options
            'extra_classes'          => '',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));


        $items_count = 0;
        $classes = array();
        $data = array();
        $tooltip_attrs = array();
        // Setting the data attributes
        $data[] =  'data-flex-slideshow=' . $autostart;
        $data[] =  'data-flex-sliderdirection=' . $direction;
        $data[] =  'data-flex-speed=' . $speed;
        $data[] =  'data-flex-animation=' . $animation;
        $data[] =  'data-flex-directions=' . $directionnav;
        $data[] =  'data-flex-controls=' . $showcontrols;
        $data[] =  'data-flex-controlsalign=' . $controlsalign;
        $data[] =  'data-flex-controlsvertical=' . $controls_vertical;
        $data[] =  'data-flex-controlsposition=' . $controlsposition;
        $data[] =  'data-flex-duration=' . $duration;
        $data[] =  'data-flex-captionhorizontal=' . $captions_horizontal;
        if (!empty($itemwidth)) {
            $data[] =  'data-flex-itemwidth=' . $itemwidth;
        }

        if (is_array($ids)) {
            $items = get_posts(array('post_type' => 'attachment', 'post__in' => $ids, 'orderby' => 'post__in', 'posts_per_page' => -1));
        } else {
            $query_options = array(
                'post_type'   => 'oxy_slideshow_image',
                'orderby'     => 'menu_order',
                'order'       => 'ASC',
                'suppress_filters' => 0,
                'posts_per_page' => -1
            );

            if (($flexslider !== '')) {
                $query_options['tax_query'] = array(
                    array(
                        'taxonomy' => 'oxy_slideshow_categories',
                        'field' => 'slug',
                        'terms' => $flexslider
                   )
                );
                $items = get_posts($query_options);
            }
        }
        $items_count = count($items);

        // Setting a unique id
        $id = 'flexslider-' . rand(1, 100);

        $classes[] = 'flex-controls-' .  $controls_vertical;
       // $classes[] = 'flex-caption-' .  $captions_vertical;
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }

        $output = '';
        if ($items_count > 0):
            ob_start();
            include(locate_template('partials/shortcodes/flexslider/flexslider.php'));
            $output = ob_get_contents();
            ob_end_clean();
        endif;
        return $output;
    }
}
add_shortcode('slideshow', 'oxy_shortcode_slideshow');

if (!function_exists('oxy_shortcode_carousel')) {
    function oxy_shortcode_carousel($atts, $content = '')
    {
        extract(shortcode_atts(array(
            'carousel'         => '',
            'count'              => '0',
            'showcontrols'       => 'show',
            'directionnav'       => 'show',
            'captions'           => 'show',
            // global options
            'extra_classes'          => '',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $items_count = 0;

        $query_options = array(
            'post_type'   => 'oxy_slideshow_image',
            'orderby'     => 'menu_order',
            'suppress_filters' => 0,
            'posts_per_page' => $count === '0' ? -1 : $count
        );

        if (!empty($carousel)) {
            $query_options['tax_query'] = array(
                array(
                    'taxonomy' => 'oxy_slideshow_categories',
                    'field' => 'slug',
                    'terms' => $carousel
               )
            );
            $items = get_posts($query_options);
            $items_count = count($items);
        }

        $classes = array();
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }
        $output = '';
        if ($items_count > 0):
            ob_start();
            include(locate_template('partials/shortcodes/bootstrap/carousel.php'));
            $output = ob_get_contents();
            ob_end_clean();
        endif;
        return $output;
    }
}
add_shortcode('carousel', 'oxy_shortcode_carousel');

/**
 * Icon Item Shortcode - for use inside an iconlist shortcode
 *
 * @return Icon Item HTML
 **/
if (!function_exists('oxy_shortcode_social_icon')) {
    function oxy_shortcode_social_icon($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'url'       => '',
            'icon'      => '',
            'target'    => '_blank',
        ), $atts));

        $target = ($target == '_blank')?'target="_blank"':'';
        $output = '<li>';
        $output .= '<a data-iconcolor="'.oxy_get_icon_color($icon).'" href="'.$url.'" '.$target.'>';
        $output .= '<i class="' . $icon . '"></i></a></li>';
        return $output;
    }
}
add_shortcode('socialicon', 'oxy_shortcode_social_icon');


/**
 * Google Map Shortocde
 *
 * @return Map HTML
 **/
if (!function_exists('oxy_shortcode_google_map')) {
    /**
     * Google Map Shortocde
     *
     * @return Map HTML
     **/
    function oxy_shortcode_google_map($atts, $content = null)
    {
        $atts = shortcode_atts(array(
            'map_type'               => 'ROADMAP',
            'map_zoom'               => '15',
            'map_style'              => 'regular',
            'map_scrollable'         => 'on',
            'marker_link'            =>  OXY_THEME_URI . 'assets/images/marker.png',
            'marker'                 => 'show',
            'auto_center'            => 'auto',
            'latlng'                 => '51.5171,0.1062',
            'center_latlng'          => '',
            'label'                  => '',
            'address'                => '',
            'height'                 => '500',
            // global options
            'extra_classes'          => '',
            'margin_top'             => '20',
            'margin_bottom'          => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts);

        $classes = array();
        $center_address = '';
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = 'element-top-' . $atts['margin_top'];
        $classes[] = 'element-bottom-' . $atts['margin_bottom'];
        if ($atts['scroll_animation'] !== 'none') {
            $classes[] = 'os-animation';
        }

        $atts['auto_center'] = $atts['auto_center'] === 'auto';
        $atts['markerURL'] = $atts['marker_link'];
        $atts['latlng'] = explode('|', $atts['latlng']);
        $atts['label'] = explode('|', $atts['label']);
        if ($atts['address'] !== '') {
            $atts['address'] = explode('|', $atts['address']);
        } else {
            $atts['address'] = '';
        }


        $map_id = 'map' . rand(1, 1000);

        wp_enqueue_script(THEME_SHORT.'-google-map-api', 'https://maps.googleapis.com/maps/api/js?sensor=false');
        wp_enqueue_script(THEME_SHORT.'-google-map', OXY_THEME_URI . 'assets/js/map.min.js', array('jquery', THEME_SHORT.'-google-map-api'));
        wp_localize_script(THEME_SHORT.'-google-map', $map_id, $atts);

        $output = '<div id="' . $map_id . '" class="google-map ' . implode(' ', $classes) . '" style="height:' . $atts['height'] . 'px" data-os-animation="' . $atts['scroll_animation'] . '" data-os-animation-delay="' . $atts['scroll_animation_delay'] . 's"></div>';

        return $output;

    }
}
add_shortcode('map', 'oxy_shortcode_google_map');

/* ---- BOOTSTRAP ALERT SHORTCODE ----- */

if (!function_exists('oxy_shortcode_alert')) {
    function oxy_shortcode_alert($atts, $content = '')
    {
         // setup options
        extract(shortcode_atts(array(
            'color'       => 'success',
            'title'       => 'Watch Out!',
            'dismissable' => 'false',
            // global options
            'extra_classes'          => '',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));


        $classes = array();
        $classes[] = $color;
        $classes[] = $dismissable == 'true' ? 'alert-dismissable' : '';
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }

        ob_start();
        include(locate_template('partials/shortcodes/bootstrap/alert.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('vc_message', 'oxy_shortcode_alert');

/* ---- BOOTSTRAP JUMBOTRON SHORTCODE ----- */
if (!function_exists('oxy_shortcode_jumbotron')) {
    function oxy_shortcode_jumbotron($atts, $content = '')
    {
         // setup options
        extract(shortcode_atts(array(
            'title'       => 'Watch Out!',
            // global options
            'extra_classes'          => '',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));


        $classes = array();
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }

        ob_start();
        include(locate_template('partials/shortcodes/bootstrap/jumbotron.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('vc_jumbotron', 'oxy_shortcode_jumbotron');

/* ----------------- BOOTSTRAP ACCORDION SHORTCODES ---------------*/

/**
 * Bootstrap Panel Shortcode
 *
 * @return Panel html
 **/
if (!function_exists('oxy_shortcode_panel')) {
    function oxy_shortcode_panel($atts, $content = '')
    {
        extract(shortcode_atts(array(
            'title'             => '',
            'style'             => '',
            'background_colour' => '',
            // global options
            'extra_classes'          => '',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $classes = array();
        $classes[] = $style;
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }

        $background_color_attr = empty($background_colour) ? '' : ' style="background-color:' . $background_colour . ';"';

        ob_start();
        include(locate_template('partials/shortcodes/bootstrap/panel.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('panel', 'oxy_shortcode_panel');


/* ------------------ PROGRESS BAR SHORTCODE -------------------- */

if (!function_exists('oxy_shortcode_progress_bar')) {
    function oxy_shortcode_progress_bar($atts, $content = '')
    {
         // setup options
        extract(shortcode_atts(array(
            'percentage'    =>  '50',
            'type'          => 'progress',
            'style'         => 'progress-bar-info',
            'progress_text' => '',
                    // global options
            'extra_classes'          => '',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $classes[] = $type;
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }

        ob_start();
        include(locate_template('partials/shortcodes/bootstrap/progress-bar.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('progress', 'oxy_shortcode_progress_bar');

/**
 * Video shortcode
 *
 * @return void
 * @author
 **/
if (!function_exists('oxy_shortcode_video')) {
    function oxy_shortcode_video($atts, $content = '')
    {
        extract(shortcode_atts(array(
            'src'    =>  '',

            // global options
            'extra_classes'          => '',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $classes = array();
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }

        global $wp_embed;
        $output = '<div class="' . implode(' ', $classes) . '" data-os-animation="' . $scroll_animation . '" data-os-animation-delay="' . $scroll_animation_delay . 's" >';
        $output .= do_shortcode($wp_embed->run_shortcode('[embed]' . $src . '[/embed]'));
        $output .= '</div>';
        return $output;
    }
}
add_shortcode('vc_video', 'oxy_shortcode_video');


/* ---- SCROLL TO BUTTON ----- */

if (!function_exists('oxy_shortcode_scroll_to')) {
    function oxy_shortcode_scroll_to($atts, $content = '')
    {
         // setup options
        extract(shortcode_atts(array(
            'link'          => '#link',
            'icon'          => '',
            'icon_color'    => 'text-normal',
            'place_bottom'  => '',
            // global options
            'extra_classes'     => '',
            'margin_top'        => '20',
            'margin_bottom'     => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $classes = array();
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        $classes[] = $icon_color;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }
        if ($place_bottom) {
            $classes[] = 'place-bottom';
        }

        ob_start();
        include(locate_template('partials/shortcodes/scroll-to.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('vc_scroll', 'oxy_shortcode_scroll_to');

/* ---- TAG LIST SHORTCODE ----- */

if (!function_exists('oxy_shortcode_tag_list')) {
    function oxy_shortcode_tag_list($atts, $content = '')
    {
         // setup options
        extract(shortcode_atts(array(
            'tags'    =>  '',
            'size'    => 'normal',
            'style'   => 'tag-list',
            // global options
            'extra_classes'          => '',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $tags = explode(',', $tags);

        $classes = array();
        $classes[] = 'tag-list tag-list-' . $size;
        $classes[] = $style;
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }

        ob_start();
        include(locate_template('partials/shortcodes/tags.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('tags', 'oxy_shortcode_tag_list');


/* ---- SKILLS LIST SHORTCODE ----- */

if (!function_exists('oxy_shortcode_skills_list')) {
    function oxy_shortcode_skills_list($atts, $content = '')
    {
         // setup options
        extract(shortcode_atts(array(
            'skills'                 =>  '',
            'size'                   => 'normal',
            'text_color'             => 'text-normal',
            // global options
            'extra_classes'          => '',
            'margin_top'             => '20',
            'margin_bottom'          => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $skills = explode(',', $skills);

        $classes = array();
        $classes[] = 'skills-list ' . $size;
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        $classes[] = $text_color;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }

        ob_start();
        include(locate_template('partials/shortcodes/skills.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('skills', 'oxy_shortcode_skills_list');

/**
 * Sharing buttons shortcode
 *
 * @return Sharing buttons html
 * @author
 **/
if (!function_exists('oxy_shortcode_sharing')) {
    function oxy_shortcode_sharing($atts, $content = '')
    {
        extract(shortcode_atts(array(
            'title'             => '',
            'icons_color'       => 'text-normal',
            'social_networks'   => 'facebook,twitter,google,pinterest,linkedin,vk',
            'icon_size'         => 'sm',
            'background_show'   => 'background',
            'background_show_hover'   => 'on',
            'background_shape'  => 'circle',
            'background_colour' => '',
            // global options
            'extra_classes'     => '',
            'margin_top'        => '20',
            'margin_bottom'     => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $social_networks = explode(',', $social_networks);

        // set classes to add to the ul in the partial
        $classes = array();
        $classes[] = 'social-icons';
        $classes[] = $icons_color;
        $classes[] = 'social-' . $icon_size;
        $classes[] = 'social-' . $background_show;
        $classes[] = 'social-' . $background_shape;
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $container_classes = array();
        $container_classes[] = 'element-top-' . $margin_top;
        $container_classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $container_classes[] = 'os-animation';
        }

        // create social network links
        global $post;
        $permalink = get_permalink($post->ID);
        $post_title = rawurlencode(get_the_title($post->ID));
        $network_links = array();
        $network_links['twitter']   = 'https://twitter.com/share?url=' . $permalink;
        $network_links['google']    = 'https://plus.google.com/share?url=' . $permalink;
        $network_links['facebook']  = 'http://www.facebook.com/sharer.php?u=' . $permalink;
        $network_links['pinterest'] = '//pinterest.com/pin/create/button/?url=' . $permalink . '&amp;description=' . $post_title;
        $network_links['linkedin']  = '//linkedin.com/shareArticle?mini=true&amp;url=' . $permalink . '&amp;title=' . $post_title;
        $network_links['vk']        = 'http://vk.com/share.php?url=' . $permalink . '&amp;title=' . $post_title;

        // check for featured image and add it to the links
        $featured_image_attachment = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail');
        if (isset($featured_image_attachment[0])) {
            $network_links['facebook']  .= '&amp;images=' . $featured_image_attachment[0];
            $network_links['google']    .= '&amp;images=' . $featured_image_attachment[0];
            $network_links['pinterest'] .= '&amp;media=' . $featured_image_attachment[0];
            $network_links['vk']        .= '&amp;image=' . $featured_image_attachment[0];
        }

        ob_start();
        include(locate_template('partials/shortcodes/social/social-sharing-icons.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('sharing', 'oxy_shortcode_sharing');

/**
 * Divider shortcode
 *
 * @return Divider html
 * @author
 **/
if (!function_exists('oxy_shortcode_divider')) {
    function oxy_shortcode_divider($atts, $content = '')
    {
        extract(shortcode_atts(array(
            'visibility'        => 'hidden',
            'background_colour' => '#FFFFFF',
            'xs_height'         => '24',
            'sm_height'         => '24',
            'md_height'         => '24',
            'lg_height'         => '24',
            // responsive options
            'hidden_on_large'   => 'off',
            'hidden_on_medium'  => 'off',
            'hidden_on_small'   => 'off',
            'hidden_on_xsmall'  => 'off'
        ), $atts));

        $classes = oxy_add_extra_shortcode_classes($atts);
        ob_start();
        include(locate_template('partials/shortcodes/divider.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('divider', 'oxy_shortcode_divider');

/**
 * Divider Ruler shortcode
 *
 * @return Divider Ruler html
 * @author
 **/
if (!function_exists('oxy_shortcode_ruler_divider')) {
    function oxy_shortcode_ruler_divider($atts, $content = '')
    {
        extract(shortcode_atts(array(
            // global options
            'extra_classes'     => '',
            'margin_top'        => '20',
            'margin_bottom'     => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'   => 'off',
            'hidden_on_medium'  => 'off',
            'hidden_on_small'   => 'off',
            'hidden_on_xsmall'  => 'off'
        ), $atts));

        $classes = array();
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }

        ob_start();
        include(locate_template('partials/shortcodes/ruler-divider.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('ruler_divider', 'oxy_shortcode_ruler_divider');

/**
 * Bordered divider shortcode
 *
 * @return Bordered divider html
 * @author
 **/
if (!function_exists('oxy_shortcode_bordered_divider')) {
    function oxy_shortcode_bordered_divider($atts, $content = '')
    {
        extract(shortcode_atts(array(
            'divider_color'     => '',
            'divider_height'    => '4',
            'divider_width'     => '40',
            'divider_align'     => 'divider-border-center',
            // global options
            'extra_classes'     => '',
            'margin_top'        => '20',
            'margin_bottom'     => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'   => 'off',
            'hidden_on_medium'  => 'off',
            'hidden_on_small'   => 'off',
            'hidden_on_xsmall'  => 'off'
        ), $atts));

        $classes = array();
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = $divider_align;
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }

        ob_start();
        include(locate_template('partials/shortcodes/bordered-divider.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('bordered_divider', 'oxy_shortcode_bordered_divider');

/**
 * Sharing buttons shortcode
 *
 * @return Sharing buttons html
 * @author
 **/
if (!function_exists('oxy_shortcode_social')) {
    function oxy_shortcode_social($atts, $content = '')
    {
        extract(shortcode_atts(array(
            'title'             => '',
            'icons_color'       => 'text-normal',
            'icon_size'         => 'sm',
            'background_show'   => 'background',
            'background_shape'  => 'circle',
            'background_colour' => '#82c9ed',
            'link_target'       => '_self',
            // global options
            'extra_classes'          => '',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'   => 'off',
            'hidden_on_medium'  => 'off',
            'hidden_on_small'   => 'off',
            'hidden_on_xsmall'  => 'off'
        ), $atts));

        $icons = include OXY_THEME_DIR . 'inc/options/global-options/social-icons-options.php';

        $classes = array();
        $classes[] = 'social-icons';
        $classes[] = $icons_color;
        $classes[] = 'social-' . $icon_size;
        $classes[] = 'social-' . $background_show;
        $classes[] = 'social-' . $background_shape;
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $container_classes = array();
        $container_classes[] = 'element-top-' . $margin_top;
        $container_classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $container_classes[] = 'os-animation';
        }

        ob_start();
        include(locate_template('partials/shortcodes/social/social-links.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('socialicons', 'oxy_shortcode_social');


/**
 * Chart js shortcode
 *
 * @return Sharing buttons html
 * @author
 **/
if (!function_exists('oxy_shortcode_chart')) {
    function oxy_shortcode_chart($atts, $content = '')
    {
        $atts = shortcode_atts(array(
            // global options
            'type'                   => 'pie',
            'data'                   => '',
            'datasets'               => '',
            'colors'                 => '',
            'labels'                 => '',
            'width'                  => '70%',
            'height'                 => 'auto',
            'canvaswidth'            => '625',
            'canvasheight'           => '625',
            'relativewidth'          => '1',
            'margin'                 => '20',
            'align'                  => '',
            'class'                  => '',
            'scalefontsize'          => '12',
            'scalefontcolor'         => '#666666',
            'scaleoverride'          => 'false',
            'scalesteps'             => 'null',
            'scalestepwidth'         => 'null',
            'scalestartvalue'        => 'null',
            'animation'              => 'true',
            'fillopacity'            => '0.7',
            'pointstrokecolor'       => '#FFFFFF',
            'extra_classes'          => '',
            'margin_top'             => '20',
            'margin_bottom'          => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts);

        $output = '';
        if (function_exists('wp_charts_shortcode')) {

            $classes = array();
            $classes[] = oxy_add_extra_shortcode_classes($atts);
            $classes[] = 'element-top-' . $atts['margin_top'];
            $classes[] = 'element-bottom-' . $atts['margin_bottom'];
            if ($atts['scroll_animation'] !== 'none') {
                $classes[] = 'os-animation';
            }

            $atts['title'] = 'chart_' . rand(100, 999);

            ob_start();
            include(locate_template('partials/shortcodes/chart.php'));
            $output = ob_get_contents();
            ob_end_clean();
        }
        return $output;
    }
}
add_shortcode('chart', 'oxy_shortcode_chart');

/**
 * Simple Icon List - to show a simple list of icons
 *
 * @return Simple Icon List
 **/
if (!function_exists('oxy_shortcode_simple_icon_list')) {
    function oxy_shortcode_simple_icon_list($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'size'                   => 'normal',
            'text_color'             => 'text-normal',
            // global options
            'extra_classes'          => '',
            'margin_top'             => '20',
            'margin_bottom'          => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $classes = array();
        if ($size === 'big') {
            $classes[] = 'lead';
        }
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = $text_color;
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }

        ob_start();
        include(locate_template('partials/shortcodes/icon-list/simple-icon-list.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('simple_icon_list', 'oxy_shortcode_simple_icon_list');


/**
 * Simple Icon Shortcode - to show a simple icon
 *
 * @return Simple Icon
 **/
if (!function_exists('oxy_shortcode_simple_icon')) {
    function oxy_shortcode_simple_icon($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'icon'                   => '',
            'icon_color'             => '',
            'title'                  => '',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $classes = oxy_add_extra_shortcode_classes($atts);

        $icon_color = !empty($icon_color) ? ' style="color:' . $icon_color . ';"' : '';

        ob_start();
        include(locate_template('partials/shortcodes/icon-list/simple-icon.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('simple_icon', 'oxy_shortcode_simple_icon');


/**
 * Audio - Loads an audio player
 *
 * @return Simple Icon
 **/
if (!function_exists('oxy_shortcode_audio')) {
    function oxy_shortcode_audio($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'src'      => '',
            'loop'     => 'off',
            'autoplay' => 'off',
            'preload'  => 'none',
            // global options
            'extra_classes'          => '',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'scroll_animation'       => 'none',
            'scroll_animation_delay' => '0',
            // responsive options
            'hidden_on_large'        => 'off',
            'hidden_on_medium'       => 'off',
            'hidden_on_small'        => 'off',
            'hidden_on_xsmall'       => 'off'
        ), $atts));

        $attributes = '';
        $attributes .= $loop === 'off' ? '' : ' loop';
        $attributes .= $autoplay === 'off' ? '' : ' autoplay';
        $attributes .= $preload === 'off' ? '' : ' preload';

        $classes = array();
        $classes[] = oxy_add_extra_shortcode_classes($atts);
        $classes[] = 'element-top-' . $margin_top;
        $classes[] = 'element-bottom-' . $margin_bottom;
        if ($scroll_animation !== 'none') {
            $classes[] = 'os-animation';
        }

        ob_start();
        include(locate_template('partials/shortcodes/audio.php'));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('audio', 'oxy_shortcode_audio');

/**
 * Audio - Loads an audio player
 *
 * @return Simple Icon
 **/
if (!function_exists('oxy_shortcode_layerslider_vc')) {
    function oxy_shortcode_layerslider_vc($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'id'       => '',
            'slug'     => '',
            'el_class' => ''
        ), $atts));

        if (!empty($slug)) {
            $id = $slug;
        }

        $output = '<div class="'.$el_class.'">';
        $output .= do_shortcode('[layerslider id="'.$id.'"]');
        $output .= '</div>';

        return $output;
    }
}
add_shortcode('layerslider_vc', 'oxy_shortcode_layerslider_vc');



/**
 * Handles VC image shortcode
 *
 * @return shortcode HTML
 **/
function oxy_complex_image($atts, $content = '')
{
    // setup options
    extract(shortcode_atts(array(
        'image'                    => '',
        'size'                     => 'medium',
        'title'                    => '',
        'image_stretch'            => 'normalwidth',
        'alt'                      => '',
        'item_link_type'           => 'magnific',
        'link'                     => '',
        'link_target'              => '_self',
        'magnific_type'            => 'image',
        'magnific_link'            => '',
        'magnific_popup_caption'   => '',
        'captions_below'           => 'hide',
        'captions_below_link_type' => 'item',
        'caption_title'            => '',
        'caption_text'             => '',
        'caption_align'            => 'center',
        'hover_filter'             => 'none',
        'hover_filter_invert'      => 'image-filter-onhover',
        'overlay'                  => 'icon',
        'button_text_zoom'         => 'View Larger',
        'button_text_details'      => 'More Details',
        'overlay_caption_vertical' => 'middle',
        'overlay_animation'        => 'fade-in',
        'overlay_grid'             => '0',
        'overlay_icon'             => 'plus',
        // global options
        'extra_classes'          => '',
        'margin_top'             => '20',
        'margin_bottom'          => '20',
        'scroll_animation'       => 'none',
        'portfolio_item'         => false,
        'scroll_animation_delay' => '0',
        // responsive options
        'hidden_on_large'        => 'off',
        'hidden_on_medium'       => 'off',
        'hidden_on_small'        => 'off',
        'hidden_on_xsmall'       => 'off'
    ), $atts));

    $src = '';
    $attachment = wp_get_attachment_image_src($image, $size);
    if (isset($attachment[0])) {
        $src = $attachment[0];
    }

    $figure_classes = array();
    $figure_classes[] = oxy_add_extra_shortcode_classes($atts);
    $figure_classes[] = 'element-top-' . $margin_top;
    $figure_classes[] = 'element-bottom-' . $margin_bottom;
    if ($scroll_animation !== 'none') {
        $figure_classes[] = $portfolio_item ? 'portfolio-os-animation' : 'os-animation' ;
    }
    if ($overlay === 'strip') {
        $figure_classes[] = 'preview-bottom';
    }

    $figure_classes[] = 'image-filter-' . $hover_filter;
    $figure_classes[] = $hover_filter_invert;
    $figure_classes[] = $overlay_animation;
    $figure_classes[] = 'text-' . $caption_align;
    $figure_classes[] = 'figcaption-' . $overlay_caption_vertical;

    $overlay_classes = array('grid-overlay-' . $overlay_grid);

    // create magnific link
    $magnific_link_classes = array();
    $gallery_images = array();
    $captions = array();
    $magnific_link_url = '';
    $text_captions = '';

    switch($magnific_type) {
        case 'image':
            $full = wp_get_attachment_image_src($image, 'full');
            $magnific_link_url = $full[0];

            //gathering the image captions
            $text_captions = $magnific_popup_caption === '' ? '' : 'data-captions="' . esc_attr($magnific_popup_caption) . '"';

            $magnific_link_classes[] = 'magnific';
            break;
        case 'video':
            $magnific_link_url = $magnific_link;
            $magnific_link_classes[] = 'magnific-vimeo';
            break;
        case 'gallery':
            if (!empty($magnific_link) && is_array($magnific_link)) {
                // ok lets create a gallery
                foreach ($magnific_link as $gallery_image_id) {
                    $gallery_image = wp_get_attachment_image_src($gallery_image_id, 'full');
                    $gallery_images[] = $gallery_image[0];

                    if (($magnific_popup_caption) !== 'hide') {
                        //gathering the image captions
                        $captions[] = oxy_get_image_caption($gallery_image_id);
                    }
                }

                $text_captions = empty($captions) ? '' : 'data-captions="' . esc_attr(implode(',', $captions)) . '"';

                $full = wp_get_attachment_image_src($image, 'full');
                $magnific_link_url = $full[0];
                $magnific_link_classes[] = 'magnific-gallery';
            }
            break;
    }

    // set up links
    $hover_link_classes = array();
    $hover_link = '';
    // never set hover link if we are using buttons a inside a breaks the markup
    if ($overlay !== 'buttons' && $overlay !== 'buttons_only') {
        switch($item_link_type) {
            case 'magnific':
            case 'magnific-all':
                $hover_link = $magnific_link_url;
                $hover_link_classes = $magnific_link_classes;
                break;
            case 'item':
                $hover_link = $link;
                break;
            case 'no-link':
                // hover_link is default ''
                break;
        }
    }

    $below_title_link_classes = array();
    $below_title_link = '';
    switch($captions_below_link_type) {
        case 'magnific':
            $below_title_link = $magnific_link_url;
            $below_title_link_classes = $magnific_link_classes;
            break;
        case 'item':
            $below_title_link = $link;
            break;
        case 'no-link':
            // hover_link is default ''
            break;
    }

    ob_start();
    include(locate_template('partials/shortcodes/complex-image.php'));
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}


/**
 * Handles Featured Post shortcode
 *
 * @return shortcode HTML
 **/
if (!function_exists('oxy_shortcode_post_featured')) {
    function oxy_shortcode_post_featured($atts, $content = '')
    {
        // setup options
        extract(shortcode_atts(array(
            'featured'                  => '',
            'cat'                       => '',
            'title_tag'                 => 'h3',
            'text_align'                => 'left',
            'item_caption_vertical'     => 'bottom',
            'item_hover_filter'         => 'none',
            'hover_effect'              => '',
            // global options
            'extra_classes'             => '',
            'margin_top'                => '20',
            'margin_bottom'             => '20',
            'scroll_animation'          => 'none',
            'scroll_animation_delay'    => '0',
            // responsive options
            'hidden_on_large'           => 'off',
            'hidden_on_medium'          => 'off',
            'hidden_on_small'           => 'off',
            'hidden_on_xsmall'          => 'off'
        ), $atts));


        $output = '';
        if (!empty($featured)) {
            global $post;
            $post = get_post($featured);
            if (count($post) > 0) {
                setup_postdata($post);
                $custom_fields = get_post_custom($post->ID);

                $src = '';
                $attachment = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                if (isset($attachment[0])) {
                    $src = $attachment[0];
                }

                $category_name = '';
                $category_link = '';
                if (!empty($cat)) {
                    $cat = get_category_by_slug($cat);
                    $category_name = $cat->name;
                    $category_link = get_category_link($cat->cat_ID);
                }

                // post classes
                $classes = array();
                $classes[] = 'element-top-' . $margin_top;
                $classes[] = 'element-bottom-' . $margin_bottom;
                $classes[] = 'figcaption-'.$item_caption_vertical;
                $classes[] = 'text-'.$text_align;
                $classes[] = 'image-filter-' . $item_hover_filter;
                $classes[] = $hover_effect;
                $classes[] = oxy_add_extra_shortcode_classes($atts);
                if ($scroll_animation !== 'none') {
                    $classes[] = 'os-animation';
                }

                ob_start();
                include(locate_template('partials/shortcodes/posts/featured.php'));
                $output = ob_get_contents();
                ob_end_clean();

            }

            // reset post data because we are all done here
            wp_reset_postdata();
        }

        return $output;
    }
}
add_shortcode('post_featured', 'oxy_shortcode_post_featured');


/**
 * Handles Posts Slideshow shortcode
 *
 * @return shortcode HTML
 **/
if (!function_exists('oxy_posts_slideshow')) {
    function oxy_posts_slideshow($atts, $content = '')
    {
        // setup options
        extract(shortcode_atts(array(
            'count'                     => '3',
            'cat'                       => null,
            // flexslider options
            'animation_type'            => 'slide',
            'speed'                     => '7000',
            'show_controls'             => 'show',
            'directionnav'              => 'hide',
            // per slide options
            'title_tag'                 => 'h3',
            'text_align'                => 'left',
            'item_caption_vertical'     => 'bottom',
            'item_hover_filter'         => 'none',
            'hover_effect'              => '',
            // global options
            'extra_classes'             => '',
            'margin_top'                => '20',
            'margin_bottom'             => '20',
            'scroll_animation'          => 'none',
            'scroll_animation_delay'    => '0',
            // responsive options
            'hidden_on_large'           => 'off',
            'hidden_on_medium'          => 'off',
            'hidden_on_small'           => 'off',
            'hidden_on_xsmall'          => 'off'
        ), $atts));

        // classes applied to the flexslider
        $container_classes = array();
        $container_classes[] = 'flexslider';
        $container_classes[] = 'element-top-' . $margin_top;
        $container_classes[] = 'element-bottom-' . $margin_bottom;
        $container_classes[] = 'text-'.$text_align;
        $container_classes[] = oxy_add_extra_shortcode_classes($atts);
        if ($scroll_animation !== 'none') {
            $container_classes[] = 'os-animation';
        }

        //classes applied per post basis
        $classes = array();
        $classes[] = 'figcaption-'.$item_caption_vertical;
        $classes[] = 'text-'.$text_align;
        $classes[] = 'image-filter-' . $item_hover_filter;
        $classes[] = $hover_effect;


        $item_delay = $scroll_animation_delay;
        $cat = (null === $cat) ? null : explode(',', $cat);

        $posts = oxy_get_recent_posts($count, $cat);

        global $post;
        $output = '';
        if (!empty($posts)):
            ob_start();
            include(locate_template('partials/shortcodes/posts/slideshow.php'));
            $output .= ob_get_contents();
            ob_end_clean();
        endif;

        // reset post data
        wp_reset_postdata();
        wp_reset_query();

        return $output;
    }
}
add_shortcode('posts_slideshow', 'oxy_posts_slideshow');
