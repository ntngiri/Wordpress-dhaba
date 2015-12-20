<?php
/**
 * All the variables that can be modified in the stack
 *
 * @package Lambda
 * @subpackage Admin
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version 1.17.0
 * @author Oxygenna.com
 */

return array(
    array(
        'id' => 'typography-box',
        'title' => __('Typography', 'lambda-admin-td'),
        'fields' => array(
            array(
                'name'    => __('Body Font Family', 'lambda-admin-td'),
                'id'      => 'font-family',
                'desc'    => __('The standard font family to use for body text.', 'lambda-admin-td'),
                'type'    => 'font',
                'default' => 'eyJ2YWx1ZSI6Imdvb2dsZV9mb250c3xSb2JvdG8iLCJmYW1pbHkiOiJSb2JvdG8iLCJwcm92aWRlciI6Imdvb2dsZV9mb250cyIsInZhcmlhbnRzIjpbIjMwMCIsIjMwMGl0YWxpYyIsIjcwMCJdLCJzdWJzZXRzIjpbImxhdGluIl0sIndlaWdodHMiOltdfQ==',
                'filter'  => 'var_filter_font_family'
            ),
            array(
                'name'    => __('Body Font Size', 'lambda-admin-td'),
                'id'      => 'font-size',
                'filter'  => 'var_filter_add_px',
                'desc'    => __('The font size to use the body text.', 'lambda-admin-td'),
                'postfix' => 'px',
                'type'    => 'slider',
                'default'   => 14,
                'attr'      => array(
                    'max'       => 96,
                    'min'       => 10,
                    'step'      => 1
                )
            ),
            array(
                'name'    => __('Body Font Weight', 'lambda-admin-td'),
                'id'      => 'font-weight',
                'desc'    => __('The font weight to use for the body font.', 'lambda-admin-td'),
                'type'    => 'select',
                'default' => 400,
                'options' => include OXY_STACKS_DIR . 'inc/font-weight-options.php'
            ),
            array(
                'name'    => __('Headings Font Family', 'lambda-admin-td'),
                'id'      => 'heading-font-family',
                'desc'    => __('The font family to use for headings.', 'lambda-admin-td'),
                'type'    => 'font',
                'default' => 'eyJ2YWx1ZSI6Imdvb2dsZV9mb250c3xSb2JvdG8gU2xhYiIsImZhbWlseSI6IlJvYm90byBTbGFiIiwicHJvdmlkZXIiOiJnb29nbGVfZm9udHMiLCJ2YXJpYW50cyI6WyIxMDAiLCIzMDAiLCJyZWd1bGFyIiwiNzAwIl0sInN1YnNldHMiOlsibGF0aW4iXSwid2VpZ2h0cyI6W119',
                'filter'  => 'var_filter_font_family'
            ),
            array(
                'name'    => __('Headings Font Weight', 'lambda-admin-td'),
                'id'      => 'heading-font-weight',
                'desc'    => __('The font weight to use for headings.', 'lambda-admin-td'),
                'type'    => 'select',
                'default' => 300,
                'options' => include OXY_STACKS_DIR . 'inc/font-weight-options.php'
            ),
            array(
                'name'    => __('Headings Font Case', 'lambda-admin-td'),
                'id'      => 'heading-text-transform',
                'desc'    => __('The font weight to use for .hairline class.', 'lambda-admin-td'),
                'type'    => 'select',
                'options' => array(
                    'lowercase'  => __('Lowercase', 'lambda-admin-td'),
                    'uppercase'  => __('Uppercase', 'lambda-admin-td'),
                    'capitalize' => __('Capitalize', 'lambda-admin-td'),
                    'none'       => __('None', 'lambda-admin-td'),
                ),
                'default' => 'none',
            ),
            array(
                'name'    => __('Logo Font Family', 'lambda-admin-td'),
                'id'      => 'brand-font-family',
                'desc'    => __('The font family to use for the logo of the site if using text logo.', 'lambda-admin-td'),
                'type'    => 'font',
                'default' => 'eyJ2YWx1ZSI6Imdvb2dsZV9mb250c3xSb2JvdG8gU2xhYiIsImZhbWlseSI6IlJvYm90byBTbGFiIiwicHJvdmlkZXIiOiJnb29nbGVfZm9udHMiLCJ2YXJpYW50cyI6WyIxMDAiLCIzMDAiLCJyZWd1bGFyIiwiNzAwIl0sInN1YnNldHMiOlsibGF0aW4iXSwid2VpZ2h0cyI6W119',
                'filter'  => 'var_filter_font_family'
            ),
            array(
                'name'    => __('Logo Font Size', 'lambda-admin-td'),
                'id'      => 'brand-font-size',
                'filter'  => 'var_filter_add_px',
                'desc'    => __('The font size to use for the logo of the site if using text logo.', 'lambda-admin-td'),
                'postfix' => 'px',
                'type'    => 'slider',
                'default'   => 24,
                'attr'      => array(
                    'max'       => 96,
                    'min'       => 10,
                    'step'      => 1
                )
            ),
            array(
                'name'    => __('Logo Font Weight', 'lambda-admin-td'),
                'id'      => 'brand-font-weight',
                'desc'    => __('The font weight to use for the logo of the site if using text logo.', 'lambda-admin-td'),
                'type'    => 'select',
                'default' => 300,
                'options' => include OXY_STACKS_DIR . 'inc/font-weight-options.php'
            ),
            array(
                'name'    => __('Menu Font Family', 'lambda-admin-td'),
                'id'      => 'navbar-font-family',
                'desc'    => __('The font family to use for the menu of the top nav.', 'lambda-admin-td'),
                'type'    => 'font',
                'default' => 'eyJ2YWx1ZSI6Imdvb2dsZV9mb250c3xSb2JvdG8gU2xhYiIsImZhbWlseSI6IlJvYm90byBTbGFiIiwicHJvdmlkZXIiOiJnb29nbGVfZm9udHMiLCJ2YXJpYW50cyI6WyIxMDAiLCIzMDAiLCJyZWd1bGFyIiwiNzAwIl0sInN1YnNldHMiOlsibGF0aW4iXSwid2VpZ2h0cyI6W119',
                'filter'  => 'var_filter_font_family'
            ),
            array(
                'name'    => __('Menu Font Size', 'lambda-admin-td'),
                'id'      => 'navbar-font-size',
                'filter'  => 'var_filter_add_px',
                'desc'    => __('The font size to use for the menu of the top nav.', 'lambda-admin-td'),
                'postfix' => 'px',
                'type'    => 'slider',
                'default'   => 16,
                'attr'      => array(
                    'max'       => 96,
                    'min'       => 10,
                    'step'      => 1
                )
            ),
            array(
                'name'    => __('Menu Font Weight', 'lambda-admin-td'),
                'id'      => 'navbar-font-weight',
                'desc'    => __('The font weight to use for the menu of the top nav.', 'lambda-admin-td'),
                'type'    => 'select',
                'default' => 400,
                'options' => include OXY_STACKS_DIR . 'inc/font-weight-options.php'
            ),
            array(
                'name'    => __('Menu Dropdown Font Size', 'lambda-admin-td'),
                'id'      => 'navbar-dropdown-font-size',
                'filter'  => 'var_filter_add_px',
                'desc'    => __('The font size to use for dropdown text in the the menu of the top nav.', 'lambda-admin-td'),
                'postfix' => 'px',
                'type'    => 'slider',
                'default'   => 14,
                'attr'      => array(
                    'max'       => 96,
                    'min'       => 10,
                    'step'      => 1
                )
            ),
        )
    ),
    array(
        'id' => 'heading-weights-box',
        'title' => __('Heading Font Weights', 'lambda-admin-td'),
        'fields' => array(
            array(
                'name'    => __('Hairline Weight', 'lambda-admin-td'),
                'id'      => 'font-weight-hairline',
                'desc'    => __('The font weight to use for .hairline class.', 'lambda-admin-td'),
                'type'    => 'select',
                'default' => 100,
                'options' => include OXY_STACKS_DIR . 'inc/font-weight-options.php'
            ),
            array(
                'name'    => __('Light Weight', 'lambda-admin-td'),
                'id'      => 'font-weight-light',
                'desc'    => __('The font weight to use for .light class.', 'lambda-admin-td'),
                'type'    => 'select',
                'default' => 300,
                'options' => include OXY_STACKS_DIR . 'inc/font-weight-options.php'
            ),
            array(
                'name'    => __('Regular Weight', 'lambda-admin-td'),
                'id'      => 'font-weight-regular',
                'desc'    => __('The font weight to use for .regular class.', 'lambda-admin-td'),
                'type'    => 'select',
                'default' => 400,
                'options' => include OXY_STACKS_DIR . 'inc/font-weight-options.php'
            ),
            array(
                'name'    => __('Bold Weight', 'lambda-admin-td'),
                'id'      => 'font-weight-bold',
                'desc'    => __('The font weight to use for .bold class.', 'lambda-admin-td'),
                'type'    => 'select',
                'default' => 700,
                'options' => include OXY_STACKS_DIR . 'inc/font-weight-options.php'
            ),
            array(
                'name'    => __('Black Weight', 'lambda-admin-td'),
                'id'      => 'font-weight-black',
                'desc'    => __('The font weight to use for .black class.', 'lambda-admin-td'),
                'type'    => 'select',
                'default' => 900,
                'options' => include OXY_STACKS_DIR . 'inc/font-weight-options.php'
            ),
        )
    ),
    array(
        'id' => 'blog-box',
        'title' => __('Blog Options', 'lambda-admin-td'),
        'fields' => array(
            array(
                'name'    => __('Blog Post Title Font Size', 'lambda-admin-td'),
                'id'      => 'blog-post-title-font-size',
                'filter'  => 'var_filter_add_px',
                'desc'    => __('The font size to use for the blog post titles.', 'lambda-admin-td'),
                'postfix' => 'px',
                'type'    => 'slider',
                'default'   => 40,
                'attr'      => array(
                    'max'       => 96,
                    'min'       => 10,
                    'step'      => 1
                )
            ),
            array(
                'name'    => __('Blog Post Title Font Weight', 'lambda-admin-td'),
                'id'      => 'blog-post-title-font-weight',
                'desc'    => __('The font weight to use for the blog post titles.', 'lambda-admin-td'),
                'type'    => 'select',
                'default' => 300,
                'options' => include OXY_STACKS_DIR . 'inc/font-weight-options.php'
            ),
            array(
                'name'    => __('Blog Post Font Size', 'lambda-admin-td'),
                'id'      => 'blog-post-font-size',
                'filter'  => 'var_filter_add_px',
                'desc'    => __('The font size to use for the post content.', 'lambda-admin-td'),
                'postfix' => 'px',
                'type'    => 'slider',
                'default'   => 18,
                'attr'      => array(
                    'max'       => 96,
                    'min'       => 10,
                    'step'      => 1
                )
            ),
            array(
                'name'    => __('Blog Post Font Weight', 'lambda-admin-td'),
                'id'      => 'blog-post-font-weight',
                'desc'    => __('The font weight to use for the post content.', 'lambda-admin-td'),
                'type'    => 'select',
                'default' => 300,
                'options' => include OXY_STACKS_DIR . 'inc/font-weight-options.php'
            ),
        )
    ),
    array(
        'id' => 'blockquote-box',
        'title' => __('Blockquote Font', 'lambda-admin-td'),
        'fields' => array(
            array(
                'name'    => __('Blockquote Font Family', 'lambda-admin-td'),
                'id'      => 'blockquote-font-family',
                'desc'    => __('The font family to use for blockquotes.', 'lambda-admin-td'),
                'type'    => 'font',
                'default' => 'eyJ2YWx1ZSI6Imdvb2dsZV9mb250c3xSb2JvdG8gU2xhYiIsImZhbWlseSI6IlJvYm90byBTbGFiIiwicHJvdmlkZXIiOiJnb29nbGVfZm9udHMiLCJ2YXJpYW50cyI6WyIxMDAiLCIzMDAiLCJyZWd1bGFyIiwiNzAwIl0sInN1YnNldHMiOlsibGF0aW4iXSwid2VpZ2h0cyI6W119',
                'filter'  => 'var_filter_font_family'
            ),
            array(
                'name'    => __('Blockquote Font Size', 'lambda-admin-td'),
                'id'      => 'blockquote-font-size',
                'filter'  => 'var_filter_add_px',
                'desc'    => __('The font size to use for blockquotes.', 'lambda-admin-td'),
                'postfix' => 'px',
                'type'    => 'slider',
                'default'   => 24,
                'attr'      => array(
                    'max'       => 96,
                    'min'       => 10,
                    'step'      => 1
                )
            ),
            array(
                'name'    => __('Blockquote Font Style', 'lambda-admin-td'),
                'id'      => 'blockquote-font-style',
                'desc'    => __('The font style to use for blockquotes.', 'lambda-admin-td'),
                'type'    => 'select',
                'options' => array(
                    'normal'  => __('Normal', 'lambda-admin-td'),
                    'italic'  => __('Italic', 'lambda-admin-td')
                ),
                'default' => 'normal',
            ),
            array(
                'name'    => __('Blockquote Font Weight', 'lambda-admin-td'),
                'id'      => 'blockquote-font-weight',
                'desc'    => __('The font weight to use for blockquotes.', 'lambda-admin-td'),
                'type'    => 'select',
                'default' => 300,
                'options' => include OXY_STACKS_DIR . 'inc/font-weight-options.php'
            ),
        )
    ),
    array(
        'id' => 'lead-box',
        'title' => __('Lead Font', 'lambda-admin-td'),
        'fields' => array(
            array(
                'name'    => __('Lead Paragraph Font Size', 'lambda-admin-td'),
                'id'      => 'lead-font-size',
                'filter'  => 'var_filter_add_px',
                'desc'    => __('The font size to use for lead paragraphs.', 'lambda-admin-td'),
                'postfix' => 'px',
                'type'    => 'slider',
                'default'   => 21,
                'attr'      => array(
                    'max'       => 96,
                    'min'       => 10,
                    'step'      => 1
                )
            ),
            array(
                'name'    => __('Lead Paragraph Font Weight', 'lambda-admin-td'),
                'id'      => 'lead-font-weight',
                'desc'    => __('The font weight to use for lead paragraphs.', 'lambda-admin-td'),
                'type'    => 'select',
                'default' => 300,
                'options' => include OXY_STACKS_DIR . 'inc/font-weight-options.php'
            ),
        )
    ),
    array(
        'id' => 'navigation-box',
        'title' => __('Navigation', 'lambda-admin-td'),
        'fields' => array(
            array(
                'name'    => __('Navbar Height', 'lambda-admin-td'),
                'id'      => 'navbar-height',
                'filter'  => 'var_filter_add_px',
                'desc'    => __('The default navbar height.', 'lambda-admin-td'),
                'postfix' => 'px',
                'type'    => 'slider',
                'default'   => 100,
                'attr'      => array(
                    'max'       => 300,
                    'min'       => 10,
                    'step'      => 1
                )
            ),
            array(
                'name'    => __('Navbar Height After Scroll', 'lambda-admin-td'),
                'id'      => 'navbar-scrolled',
                'filter'  => 'var_filter_add_px',
                'desc'    => __('The navbar height after the page has scrolled.', 'lambda-admin-td'),
                'postfix' => 'px',
                'type'    => 'slider',
                'default'   => 90,
                'attr'      => array(
                    'max'       => 300,
                    'min'       => 10,
                    'step'      => 1
                )
            ),
            array(
                'name'    => __('Menu Drop Down Width', 'lambda-admin-td'),
                'id'      => 'submenu-width',
                'filter'  => 'var_filter_add_px',
                'desc'    => __('The width of the dropdown menus of the navigation.', 'lambda-admin-td'),
                'postfix' => 'px',
                'type'    => 'slider',
                'default'   => 220,
                'attr'      => array(
                    'max'       => 360,
                    'min'       => 200,
                    'step'      => 1
                )
            ),
            array(
                'name'    => __('Navbar top border height', 'lambda-admin-td'),
                'id'      => 'navbar-border-height',
                'filter'  => 'var_filter_add_px',
                'desc'    => __('The height of the links top border.', 'lambda-admin-td'),
                'postfix' => 'px',
                'type'    => 'slider',
                'default'   => 0,
                'attr'      => array(
                    'max'       => 10,
                    'min'       => 0,
                    'step'      => 1
                )
            ),
            array(
                'name'    => __('Side Menu Width', 'lambda-admin-td'),
                'id'      => 'sidemenu-width',
                'filter'  => 'var_filter_add_px',
                'desc'    => __('The width of the side menu slide out menu.', 'lambda-admin-td'),
                'postfix' => 'px',
                'type'    => 'slider',
                'default'   => 270,
                'attr'      => array(
                    'max'       => 360,
                    'min'       => 200,
                    'step'      => 1
                )
            ),
            array(
                'name'    => __('Side Menu Navigation Max Height', 'lambda-admin-td'),
                'id'      => 'sidemenu-nav-max-height',
                'filter'  => 'var_filter_add_px',
                'desc'    => __('The the maximum height that the navigation menu in a side menu can be.', 'lambda-admin-td'),
                'postfix' => 'px',
                'type'    => 'slider',
                'default'   => 600,
                'attr'      => array(
                    'max'       => 300,
                    'min'       => 800,
                    'step'      => 1
                )
            ),
        )
    ),
    array(
        'id' => 'body-text-colors',
        'title' => __('Body Text Colors', 'lambda-admin-td'),
        'fields' => array(
            array(
                'name'    => __('Text Color', 'lambda-admin-td'),
                'id'      => 'text-color',
                'desc'    => __('Text color for body.', 'lambda-admin-td'),
                'default' => '#303c40',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Heading Color', 'lambda-admin-td'),
                'id'      => 'heading-color',
                'desc'    => __('Text color for all headings.', 'lambda-admin-td'),
                'default' => '#1b1f20',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Link Color', 'lambda-admin-td'),
                'id'      => 'link-color',
                'desc'    => __('Text link color.', 'lambda-admin-td'),
                'default' => '#6BA4B6',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Link Hover Color', 'lambda-admin-td'),
                'id'      => 'link-color-hover',
                'desc'    => __('Text link hover color.', 'lambda-admin-td'),
                'default' => '#569AA7',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Icon Color', 'lambda-admin-td'),
                'id'      => 'icon-color',
                'desc'    => __('Icon color.', 'lambda-admin-td'),
                'default' => '#3b83a8',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Small Color', 'lambda-admin-td'),
                'id'      => 'small-color',
                'desc'    => __('Small text color (text used in a small tag).', 'lambda-admin-td'),
                'default' => '#959494',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Light Text Color', 'lambda-admin-td'),
                'id'      => 'text-color-alt',
                'desc'    => __('Alternate light text color for body.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Light Heading Color', 'lambda-admin-td'),
                'id'      => 'heading-color-alt',
                'desc'    => __('Alternate light text color for all headings.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Light Link Color', 'lambda-admin-td'),
                'id'      => 'link-color-alt',
                'desc'    => __('Alternate light text link color.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Light Link Hover Color', 'lambda-admin-td'),
                'id'      => 'link-color-hover-alt',
                'desc'    => __('Alternate light text link hover color.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Light Icon Color', 'lambda-admin-td'),
                'id'      => 'icon-color-alt',
                'desc'    => __('Alternate light text icon color.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Light Small Color', 'lambda-admin-td'),
                'id'      => 'small-color-alt',
                'desc'    => __('Global small text color.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
        )
    ),
    array(
        'id' => 'background-colors',
        'title' => __('Background Colors', 'lambda-admin-td'),
        'fields' => array(
            array(
                'name'    => __('Background Color', 'lambda-admin-td'),
                'id'      => 'background-color',
                'desc'    => __('Background color of the main content.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Background Inverse Color', 'lambda-admin-td'),
                'id'      => 'background-invert',
                'desc'    => __('Background color that contrasts nicely with the main body background color.', 'lambda-admin-td'),
                'default' => '#6BA4B6',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Background Complimentary Color', 'lambda-admin-td'),
                'id'      => 'background-complementary',
                'desc'    => __('A variation on the background color to be used for borders / panels etc.', 'lambda-admin-td'),
                'default' => 'rgba(0,0,0,.1)',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
        )
    ),
    array(
        'id' => 'menu-box',
        'title' => __('Navbar - Side Menu Colors', 'lambda-admin-td'),
        'fields' => array(
            array(
                'name'    => __('Background Color', 'lambda-admin-td'),
                'id'      => 'nav-background',
                'desc'    => __('Background color for top nav bar and side menu.', 'lambda-admin-td'),
                'default' => '#303C40',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Menu Link Color', 'lambda-admin-td'),
                'id'      => 'nav-link',
                'desc'    => __('Menu link color.', 'lambda-admin-td'),
                'default' => 'rgba(255, 255, 255, .8)',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Menu Link Hover Color', 'lambda-admin-td'),
                'id'      => 'nav-link-hover',
                'desc'    => __('Menu link hover color.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Menu Link Active Color', 'lambda-admin-td'),
                'id'      => 'nav-link-active',
                'desc'    => __('Menu link active color.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Logo Text Color', 'lambda-admin-td'),
                'id'      => 'nav-brand',
                'desc'    => __('Text colour of text logo in the navbar and side menu.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Menu Text Color', 'lambda-admin-td'),
                'id'      => 'nav-text',
                'desc'    => __('Text colour of regular text in the navbar and side menu.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Menu Border Color', 'lambda-admin-td'),
                'id'      => 'nav-borders',
                'desc'    => __('Color used for Menu borders', 'lambda-admin-td'),
                'default' => 'rgba(13, 14, 15, .5)',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Menu Dropdown Background Color', 'lambda-admin-td'),
                'id'      => 'nav-dropdown-background',
                'desc'    => __('Background color of menu dropdown.', 'lambda-admin-td'),
                'default' => 'rgba(68,113,122,.9)',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Menu Dropdown Link Color', 'lambda-admin-td'),
                'id'      => 'nav-dropdown-link',
                'desc'    => __('Link color of menu dropdown.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Menu Dropdown Link Hover Color', 'lambda-admin-td'),
                'id'      => 'nav-dropdown-link-hover',
                'desc'    => __('Link hover color of menu dropdown.', 'lambda-admin-td'),
                'default' => 'rgba(255,255,255,.75)',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Menu Dropdown Text Color', 'lambda-admin-td'),
                'id'      => 'nav-dropdown-text',
                'desc'    => __('Text color of menu dropdown.', 'lambda-admin-td'),
                'default' => 'rgba(255,255,255,.75)',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Menu Dropdown top border Color', 'lambda-admin-td'),
                'id'      => 'nav-dropdown-border',
                'desc'    => __('Color used for top border on dropdowns.', 'lambda-admin-td'),
                'default' => 'rgba(0,0,0,.055)',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Menu Dropdown separator Colors', 'lambda-admin-td'),
                'id'      => 'nav-dropdown-separators',
                'desc'    => __('Color used for divider and mega menu column dividers.', 'lambda-admin-td'),
                'default' => 'rgba(0,0,0,.055)',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Transparent Menu Link Color', 'lambda-admin-td'),
                'id'      => 'nav-transparent-link',
                'desc'    => __('Link color of navbar when set to transparent.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Transparent Menu Link Hover Color', 'lambda-admin-td'),
                'id'      => 'nav-transparent-link-hover',
                'desc'    => __('Link hover color of navbar when set to transparent.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Transparent Logo Text Color', 'lambda-admin-td'),
                'id'      => 'nav-transparent-brand',
                'desc'    => __('Logo text color of navbar when set to transparent.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Transparent Text Color', 'lambda-admin-td'),
                'id'      => 'nav-transparent-text',
                'desc'    => __('Text color of navbar when set to transparent.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Transparent Borders Color', 'lambda-admin-td'),
                'id'      => 'nav-transparent-borders',
                'desc'    => __('Color used for borders in transparent menu.', 'lambda-admin-td'),
                'default' => 'rgba(255, 255, 255, 0.1)',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Logo bar Background Color', 'lambda-admin-td'),
                'id'      => 'logo-background',
                'desc'    => __('Background color of the logo bar - used in Menu below header options / navigation with sidebar options.', 'lambda-admin-td'),
                'default' => '#303C40',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Logo bar Text Color', 'lambda-admin-td'),
                'id'      => 'logo-brand',
                'desc'    => __('Brand text color on the logo bar - used in Menu below header options / navigation with sidebar options.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
        )
    ),
    array(
        'id' => 'top-bar-box',
        'title' => __('Top Bar Colors', 'lambda-admin-td'),
        'fields' => array(
            array(
                'name'    => __('Background Color', 'lambda-admin-td'),
                'id'      => 'top-bar-background',
                'desc'    => __('Background color for top bar.', 'lambda-admin-td'),
                'default' => '#272e31',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Top Bar Link Color', 'lambda-admin-td'),
                'id'      => 'top-bar-link',
                'desc'    => __('Top Bar link color.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Top Bar Link Hover Color', 'lambda-admin-td'),
                'id'      => 'top-bar-link-hover',
                'desc'    => __('Top Bar link hover color.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Top Bar Text Color', 'lambda-admin-td'),
                'id'      => 'top-bar-text',
                'desc'    => __('Regular text colour text in the top bar.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Top Bar Border Color', 'lambda-admin-td'),
                'id'      => 'top-bar-borders',
                'desc'    => __('Color of borders between widgets in the top bar.', 'lambda-admin-td'),
                'default' => 'rgba(255, 255, 255, .1)',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
        )
    ),
    array(
        'id' => 'footer-box',
        'title' => __('Footer Colors', 'lambda-admin-td'),
        'fields' => array(
            array(
                'name'    => __('Background Color', 'lambda-admin-td'),
                'id'      => 'footer-background',
                'desc'    => __('Background color for footer.', 'lambda-admin-td'),
                'default' => '#272e31',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Footer Link Color', 'lambda-admin-td'),
                'id'      => 'footer-link',
                'desc'    => __('Footer link color.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Footer Link Hover Color', 'lambda-admin-td'),
                'id'      => 'footer-link-hover',
                'desc'    => __('Footer link hover color.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Footer Text Color', 'lambda-admin-td'),
                'id'      => 'footer-text',
                'desc'    => __('Regular text colour text in the footer.', 'lambda-admin-td'),
                'default' => 'rgba(255, 255, 255, .6)',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Footer Border Color', 'lambda-admin-td'),
                'id'      => 'footer-borders',
                'desc'    => __('Color of borders between widgets in the footer.', 'lambda-admin-td'),
                'default' => 'rgba(255, 255, 255, .1)',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
        )
    ),
    array(
        'id' => 'sub-footer-box',
        'title' => __('Sub Footer Colors', 'lambda-admin-td'),
        'fields' => array(
            array(
                'name'    => __('Background Color', 'lambda-admin-td'),
                'id'      => 'sub-footer-background',
                'desc'    => __('Background color for sub footer below the main footer.', 'lambda-admin-td'),
                'default' => '#000',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Sub Footer Link Color', 'lambda-admin-td'),
                'id'      => 'sub-footer-link',
                'desc'    => __('Color of links in sub footer below main footer.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Sub Footer Link Hover Color', 'lambda-admin-td'),
                'id'      => 'sub-footer-link-hover',
                'desc'    => __('Hover color of links in sub footer below main footer.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Sub Footer Text Color', 'lambda-admin-td'),
                'id'      => 'sub-footer-text',
                'desc'    => __('Regular text colour text in the sub footer.', 'lambda-admin-td'),
                'default' => 'rgba(255, 255, 255, .6)',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Sub Footer Border Color', 'lambda-admin-td'),
                'id'      => 'sub-footer-borders',
                'desc'    => __('Color of borders between widgets in the sub footer.', 'lambda-admin-td'),
                'default' => 'rgba(255, 255, 255, .1)',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
        )
    ),
    array(
        'id' => 'forms-box',
        'title' => __('Form Colors', 'lambda-admin-td'),
        'fields' => array(
            array(
                'name'    => __('Text Color', 'lambda-admin-td'),
                'id'      => 'form-color',
                'desc'    => __('Text color used in form elements.', 'lambda-admin-td'),
                'default' => '#3c3c3c',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Background Color', 'lambda-admin-td'),
                'id'      => 'form-background',
                'desc'    => __('Form background color.', 'lambda-admin-td'),
                'default' => 'rgba(0,0,0,.02)',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Form Border Color', 'lambda-admin-td'),
                'id'      => 'form-borders',
                'desc'    => __('Color of borders between elements in the form.', 'lambda-admin-td'),
                'default' => 'rgba(0,0,0,.1)',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Form Placeholder Color', 'lambda-admin-td'),
                'id'      => 'form-placeholder-color',
                'desc'    => __('Form placeholder text color.', 'lambda-admin-td'),
                'default' => '#9c9c9c',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Form Active Color', 'lambda-admin-td'),
                'id'      => 'form-active',
                'desc'    => __('Form active input color.', 'lambda-admin-td'),
                'default' => '#6BA4B6',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
        )
    ),
    array(
        'id' => 'context-box',
        'title' => __('Contextual colors', 'lambda-admin-td'),
        'fields' => array(
            array(
                'name'    => __('Primary Text', 'lambda-admin-td'),
                'id'      => 'primary-text',
                'desc'    => __('Text color for Buttons, labels, progress bars, etc elements that use the primary style will use this color.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Primary Background', 'lambda-admin-td'),
                'id'      => 'primary-bg',
                'desc'    => __('Background color for Buttons, labels, progress bars, etc elements that use the primary style will use this color.', 'lambda-admin-td'),
                'default' => '#6BA4B6',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Default Text', 'lambda-admin-td'),
                'id'      => 'default-text',
                'desc'    => __('Text color for Buttons, labels, progress bars, etc elements that use the default style will use this color.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Default Background', 'lambda-admin-td'),
                'id'      => 'default-bg',
                'desc'    => __('Background color for Buttons, labels, progress bars, etc elements that use the default style will use this color.', 'lambda-admin-td'),
                'default' => '#4D4A51',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Warning Text', 'lambda-admin-td'),
                'id'      => 'warning-text',
                'desc'    => __('Text color for Buttons, labels, progress bars, etc elements that use the warning style will use this color.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Warning Background', 'lambda-admin-td'),
                'id'      => 'warning-bg',
                'desc'    => __('Background color for Buttons, labels, progress bars, etc elements that use the warning style will use this color.', 'lambda-admin-td'),
                'default' => '#CD6727',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Danger Text', 'lambda-admin-td'),
                'id'      => 'danger-text',
                'desc'    => __('Text color for Buttons, labels, progress bars, etc elements that use the danger style will use this color.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Danger Background', 'lambda-admin-td'),
                'id'      => 'danger-bg',
                'desc'    => __('Background color for Buttons, labels, progress bars, etc elements that use the danger style will use this color.', 'lambda-admin-td'),
                'default' => '#E85543',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Success Text', 'lambda-admin-td'),
                'id'      => 'success-text',
                'desc'    => __('Text color for Buttons, labels, progress bars, etc elements that use the success style will use this color.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Success Background', 'lambda-admin-td'),
                'id'      => 'success-bg',
                'desc'    => __('Background color for Buttons, labels, progress bars, etc elements that use the success style will use this color.', 'lambda-admin-td'),
                'default' => '#008D7D',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Info Text', 'lambda-admin-td'),
                'id'      => 'info-text',
                'desc'    => __('Text color for Buttons, labels, progress bars, etc elements that use the info style will use this color.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Info Background', 'lambda-admin-td'),
                'id'      => 'info-bg',
                'desc'    => __('Background color for Buttons, labels, progress bars, etc elements that use the info style will use this color.', 'lambda-admin-td'),
                'default' => '#78A2BB',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
        )
    ),
    array(
        'id' => 'components-box',
        'title' => __('Components', 'lambda-admin-td'),
        'fields' => array(
            array(
                'name'    => __('Border Radius Base', 'lambda-admin-td'),
                'id'      => 'border-radius-base',
                'filter'  => 'var_filter_add_px',
                'desc'    => __('The base radius to use for the rounded edges of components.', 'lambda-admin-td'),
                'postfix' => 'px',
                'type'    => 'slider',
                'default'   => 18,
                'attr'      => array(
                    'max'       => 120,
                    'min'       => 0,
                    'step'      => 1
                )
            ),
            array(
                'name'    => __('Border Radius Large', 'lambda-admin-td'),
                'id'      => 'border-radius-large',
                'filter'  => 'var_filter_add_px',
                'desc'    => __('The radius to use for the rounded edges of large components.', 'lambda-admin-td'),
                'postfix' => 'px',
                'type'    => 'slider',
                'default'   => 24,
                'attr'      => array(
                    'max'       => 120,
                    'min'       => 0,
                    'step'      => 1
                )
            ),
            array(
                'name'    => __('Border Radius Small', 'lambda-admin-td'),
                'id'      => 'border-radius-small',
                'filter'  => 'var_filter_add_px',
                'desc'    => __('The radius to use for the rounded edges of small components.', 'lambda-admin-td'),
                'postfix' => 'px',
                'type'    => 'slider',
                'default'   => 15,
                'attr'      => array(
                    'max'       => 120,
                    'min'       => 0,
                    'step'      => 1
                )
            ),
            array(
                'name'    => __('Border Radius Forms', 'lambda-admin-td'),
                'id'      => 'border-radius-forms',
                'filter'  => 'var_filter_add_px',
                'desc'    => __('The radius to use for the rounded edges of form components.', 'lambda-admin-td'),
                'postfix' => 'px',
                'type'    => 'slider',
                'default'   => 18,
                'attr'      => array(
                    'max'       => 120,
                    'min'       => 0,
                    'step'      => 1
                )
            ),
        )
    ),
    array(
        'id' => 'misc-box',
        'title' => __('Miscellaneous colors', 'lambda-admin-td'),
        'fields' => array(
            array(
                'name'    => __('Overlay Text', 'lambda-admin-td'),
                'id'      => 'overlay-text',
                'desc'    => __('Text color used in image overlays used in portfolios, staff, etc.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Overlay Background', 'lambda-admin-td'),
                'id'      => 'overlay-bg',
                'desc'    => __('Background color color used in image overlays used in portfolios, staff, etc.', 'lambda-admin-td'),
                'default' => 'rgba(95, 181, 198, 0.8)',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Magnific Overlay Background', 'lambda-admin-td'),
                'id'      => 'magnific-overlay-bg',
                'desc'    => __('Background color for magnific popup overlay', 'lambda-admin-td'),
                'default' => 'rgba(48, 40, 64, .9)',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Magnific Close Icon Color', 'lambda-admin-td'),
                'id'      => 'magnific-close-icon',
                'desc'    => __('Magnific close button icon color.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Magnific Close Background Color', 'lambda-admin-td'),
                'id'      => 'magnific-close-bg',
                'desc'    => __('Background color of magnific close button', 'lambda-admin-td'),
                'default' => 'rgba(48, 40, 64, .9)',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Back To Top Button Icon Color', 'lambda-admin-td'),
                'id'      => 'top-icon-color',
                'desc'    => __('Icon color of the back to top icon.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Back To Top Button Background Color', 'lambda-admin-td'),
                'id'      => 'top-icon-bg',
                'desc'    => __('Background color of the back to top button', 'lambda-admin-td'),
                'default' => '#202628',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Slideshow Icon Color', 'lambda-admin-td'),
                'id'      => 'slideshow-color',
                'desc'    => __('Icon colour used in slideshow navigation.', 'lambda-admin-td'),
                'default' => '#ffffff',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Slideshow Icon Shadow Color', 'lambda-admin-td'),
                'id'      => 'slideshow-shadow',
                'desc'    => __('Icon shadow colour used in slideshow navigation', 'lambda-admin-td'),
                'default' => 'rgba(0, 0, 0, 0.2)',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Loader Color', 'lambda-admin-td'),
                'id'      => 'loader-color',
                'desc'    => __('Color of the loader', 'lambda-admin-td'),
                'default' => 'rgba(48, 60, 64, 0.6)',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
            array(
                'name'    => __('Loader background', 'lambda-admin-td'),
                'id'      => 'loader-bg',
                'desc'    => __('Background color of the loader.', 'lambda-admin-td'),
                'default' => 'rgba(255, 255, 255, 1)',
                'type'    => 'colour',
                'format'  => 'rgba'
            ),
        )
    )
);
