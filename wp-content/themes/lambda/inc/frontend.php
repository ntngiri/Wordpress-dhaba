<?php
/**
 * This is where all the themes frontend actions at
 *
 * @package Lambda
 * @subpackage Frontend
 * @since 1.0
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license http://wiki.envato.com/support/legal-terms/licensing-terms/
 * @version 1.17.0
 */

/******************************
 *
 * THEME SETUP
 *
 *****************************/

/**
 * Add theme support for automatic feed links. required by developer.
 *
 **/
add_theme_support('automatic-feed-links', 'editor-style');

// add support for automatic feeds
add_theme_support('automatic-feed-links');

/*
 * add theme support for post formats.
 **/
add_theme_support('post-formats', array('image', 'gallery', 'video', 'link', 'audio', 'quote'));

// add support for featured images
add_theme_support('post-thumbnails');
// add support for custom background
add_theme_support('custom-background');

add_editor_style(OXY_THEME_URI . 'inc/assets/stylesheets/editor-style.css');

/*
 * Set theme content width. Required
 *
 **/
if (!isset($content_width)) {
    $content_width = 1170;
}


if (function_exists('vc_disable_frontend')) {
    vc_disable_frontend(true);
}

function oxy_create_image_sizes()
{
    if (function_exists('add_image_size')) {
        add_image_size('square-image', 600, 600, true);
        add_image_size('related-post-image', 600, 400, true);
        add_image_size('portfolio-thumb', oxy_get_option('portfolio_item_width'), oxy_get_option('portfolio_item_height'), oxy_get_option('portfolio_item_crop') === 'on');
    }
}
add_action('init', 'oxy_create_image_sizes');

function oxy_detect_user_agent()
{
    global $oxy_is_iphone, $oxy_is_ipad, $oxy_is_android;
    $oxy_is_iphone  = stripos($_SERVER['HTTP_USER_AGENT'], 'iPhone');
    $oxy_is_ipad    = stripos($_SERVER['HTTP_USER_AGENT'], 'iPad');
    $oxy_is_android = stripos($_SERVER['HTTP_USER_AGENT'], 'Android');
}

add_action('init', 'oxy_detect_user_agent');

function oxy_display_image_sizes($sizes)
{
    $sizes['square-image'] = __('Square Image', 'lambda-admin-td');
    $sizes['hex-image']    = __('Hexagon Image', 'lambda-admin-td');
    $sizes['rect-image']   = __('Rectangle Image', 'lambda-admin-td');

    $sizes['square-image-small'] = __('Square Small Image', 'lambda-admin-td');
    $sizes['hex-image-small']    = __('Hexagon Small Image', 'lambda-admin-td');
    $sizes['rect-image-small']   = __('Rectangle Small Image', 'lambda-admin-td');
    return $sizes;
}
// hook for displaying the size in the media screen
add_filter('image_size_names_choose', 'oxy_display_image_sizes');


/******************************
 *
 * HEAD
 *
 *****************************/

/**
 * Apple device icons
 *
 * @return echos html for apple icons
 **/
function oxy_add_apple_icons($option_name, $sizes = '')
{
    $icon = oxy_get_option($option_name);
    if (false !== $icon) {
        $sizes = empty($sizes) ? '' : ' sizes="' . $sizes . '"';
        echo '<link rel="apple-touch-icon" href="' . $icon . '"' . $sizes  . ' />';
    }
}

function stack_admin_css()
{
    global $post_type;
    if ($post_type == 'oxy_stack') {
        echo '<style type="text/css">#wp-admin-bar-view{display:none;}</style>';
    }
}
add_action('admin_head', 'stack_admin_css');

/******************************
 *
 * HEADER
 *
 *****************************/

function oxy_create_logo()
{
    if (function_exists('icl_get_home_url')) {
        $home_link = icl_get_home_url();
    } else {
        $home_link = home_url();
    }

    $output = '<a href="' . $home_link . '" class="navbar-brand">';

    $url = oxy_get_option('logo_image');
    if ('' !== $url) {
        $output .= '<img src="';
        $output .= $url;
        $output .= '" alt="' . get_bloginfo('name');
        $output .= '"/>';
    }
    $output .= oxy_get_option('logo_text');
    $output.= '</a>';

    echo $output;
}

function oxy_is_version($version)
{
    global $wp_version;
    return version_compare($wp_version, $version, '>=');
}

// Register main menu
register_nav_menus(array(
    'primary' => __('Primary Navigation', 'lambda-admin-td'),
    'account' => __('Account Navigation', 'lambda-admin-td'),
));

/**
 * Gets a theme option
 *
 * @return theme option value or false if not set
 * @since 1.0
 **/
function oxy_get_option($name, $default = false)
{
    global $oxy_theme;
    return $oxy_theme->get_option($name, $default);
}


/**
 * Loads theme scripts
 *
 * @return void
 *
 **/
function oxy_load_scripts()
{
    global $oxy_theme;
    global $post;
    global $wp_query;

    // check for page overrides
    if (is_page() || $wp_query->is_home) {
        // if we are on the blog page make sure you use the blog page id for transparancy option
        $page_id = $wp_query->is_home ? get_option('page_for_posts') : $post->ID;
    }

    $assets_file_name = 'theme';
    if (oxy_get_option('minified_assets', 'on') === 'on') {
        $assets_file_name = $assets_file_name . '.min';
    }
    // load js
    wp_enqueue_script(THEME_SHORT.'-theme', OXY_THEME_URI . 'assets/js/' . $assets_file_name . '.js', array('jquery', 'wp-mediaelement'), '1.0', true);

    global $wp_customize;
    $site_loader = isset($wp_customize) ? 'off' : oxy_get_option('site_loader');
    wp_localize_script(THEME_SHORT.'-theme', 'oxyThemeData', array(
        'navbarScrolledPoint'    => oxy_get_option('navbar_scrolled_point'),
        'navbarHeight'           => get_option('navbar_height'),
        'navbarScrolled'         => get_option('navbar_height_after_scroll'),
        'siteLoader'             => $site_loader,
        'menuClose'              => oxy_get_option('menu_close'),
        'scrollFinishedMessage'  => __('No more items to load.', 'lambda-td'),
        'hoverMenu'              => array(
            'hoverActive'    => $oxy_theme->get_option('hover_menu') === 'on',
            'hoverDelay'     => $oxy_theme->get_option('hover_menu_delay'),
            'hoverFadeDelay' => $oxy_theme->get_option('hover_menu_fade_delay'),
       )
    ));

    // load theme style
    wp_enqueue_style(THEME_SHORT.'-bootstrap', OXY_THEME_URI . 'assets/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style(THEME_SHORT.'-theme', OXY_THEME_URI . 'assets/css/' . $assets_file_name . '.css', array('wp-mediaelement', THEME_SHORT.'-bootstrap'), false, 'all');

    if (wp_style_is('js_composer_front', 'registered')) {
        wp_deregister_style('js_composer_front');
    }

}
add_action('wp_enqueue_scripts', 'oxy_load_scripts');

function oxy_favicons()
{
    oxy_add_apple_icons( 'iphone_icon' );
    oxy_add_apple_icons( 'iphone_retina_icon', '114x114' );
    oxy_add_apple_icons( 'ipad_icon', '72x72' );
    oxy_add_apple_icons( 'ipad_retina_icon', '144x144' ); ?>
    <link rel="shortcut icon" href="<?php echo esc_url(oxy_get_option( 'favicon' )); ?>"><?php
}

/*************** COMMENTS ***************************/
function oxy_comment_callback($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    $tag = $depth === 1 ? 'li' : 'div'; ?>
    <<?php echo $tag ?> <?php comment_class('media media-comment'); ?>>
        <div class="media-avatar media-left">
            <?php echo get_avatar($comment, 48); ?>
        </div>
        <div class="media-body">
            <div class="media-inner">
                <div id="comment-<?php comment_ID(); ?>">
                    <h4 class="media-heading clearfix">
                        <strong>
                            <?php comment_author_link(); ?>
                        </strong>
                        -
                        <?php comment_date(); ?>
                        <strong class="comment-reply pull-right">
                            <?php comment_reply_link(array_merge($args, array('reply_text' => __('reply', 'lambda-td'), 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                        </strong>
                    </h4>
                    <?php comment_text(); ?>
                </div>
            </div>
    <?php
}

function oxy_comment_end_callback($comment, $args, $depth)
{
    // we need to add 1 to the depth to get this to work
    $tag = $depth + 1 === 1 ? 'li' : 'div'; ?>
        </div>
    </<?php echo $tag ?>>
    <?php
}

/**
 * Replaces default arguments used in comment_form function
 *
 * @return new defaults
 **/
function oxy_filter_comment_form_defaults($defaults)
{
    $commenter = wp_get_current_commenter();

    $defaults['fields']['author'] = '<div class="row"><div class="form-group col-md-4"><label for="author">' . __('Your name *', 'lambda-td') . '</label><input id="author" name="author" type="text" class="input-block-level form-control" value="' . esc_attr($commenter['comment_author']) .  '"/></div>';
    $defaults['fields']['email']  = '<div class="form-group col-md-4"><label for="email">' . __('Your email *', 'lambda-td') . '</label><input id="email" name="email" type="text" class="input-block-level form-control" value="' . esc_attr($commenter['comment_author_email']) . '" /></div>';
    $defaults['fields']['url'] = '<div class="form-group col-md-4"><label for="url">' . __('Website', 'lambda-td') . '</label><input id="url" name="url" type="text" class="input-block-level form-control" value="' . esc_attr($commenter['comment_author_url']) . '" /></div></div>';


    $defaults['comment_field'] = '<div class="row"><div class="form-group col-md-12"><label for="comment">' . __('Your message', 'lambda-td') . '</label><textarea id="comment" name="comment" class="input-block-level form-control" rows="5"></textarea></div></div>';
    $defaults['format'] = 'html5';
    $defaults['comment_notes_after'] = '';
    $defaults['class_submit'] = 'btn btn-primary';

    return $defaults;
}
add_filter('comment_form_defaults', 'oxy_filter_comment_form_defaults');

/**
 * Enables threaded comments
 *
 *@return void
 *@since 1.0
 **/

function oxy_enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}
add_action('get_header', 'oxy_enable_threaded_comments');


/**
 * Adds rounded class to avatars
 *
 * @return modified css
 * @since 1.0
 **/
function oxy_change_avatar_css($class, $id, $size)
{
    // if it's the admin bar, don't touch it.
    if ($size == 150 || $size == 48 || $size == 300 || $size == 80) {
        // comment walker sends an object
        if (is_object($id)) {
            $author_url = $id->user_id == 0 ? '#' : get_author_posts_url($id->user_id);
        } else {
            $author_url = get_author_posts_url($id);
        }
        // show avatar option
            $class = str_replace("class='avatar", "class='media-objects img-circle ", $class);
            return  '<a href="' . $author_url . '">' . $class . '</a>';
        //don't show anything
        return '';
    }
    return $class;

}
add_filter('get_avatar', 'oxy_change_avatar_css', 10, 5);


// override default tag cloud widget output
function oxy_custom_wp_tag_cloud_filter($content, $args)
{
    $content = str_replace('<a', '<li><a', $content);
    $content = str_replace('</a>', '</a></li>', $content);
    return '<ul>'. $content . '</ul>';
}

add_filter('wp_tag_cloud', 'oxy_custom_wp_tag_cloud_filter', 10, 2);

/* function to return an icon depending the format of the post */

function oxy_post_icon($post_id, $echo = true)
{
    $format = get_post_format($post_id);
    switch ($format) {
        case 'image':
            $output = '<i class="fa fa-picture-o"></i>';
            break;
        case 'gallery':
            $output = '<i class="fa fa-camera"></i>';
            break;
        case 'link':
            $output = '<i class="fa fa-link"></i>';
            break;
        case 'quote':
            $output = '<i class="fa fa-quote-right"></i>';
            break;
        case 'audio':
            $output = '<i class="fa fa-headphones"></i>';
            break;
        case 'video':
            $output = '<i class="fa fa-play"></i>';
            break;
        default:
            $output = '<i class="fa fa-file-text"></i>';
            break;
    }
    if ($echo) {
        echo $output;
    } else {
        return $output;
    }
}

// use option read more link
add_filter('the_content_more_link', 'oxy_filter_more_link', 10, 2);

function oxy_filter_more_link($more_link, $more_link_text)
{
    // remove #more
    $more_link = preg_replace('|#more-[0-9]+|', '', $more_link);
    return str_replace($more_link_text, oxy_get_option('blog_readmore'), $more_link);
}

function oxy_read_more_link($echo = true)
{
    global $post;
    $output = '';
    if (isset($post)) {
        $more_text = oxy_get_option('blog_readmore')? oxy_get_option('blog_readmore'): __('Read more', 'lambda-td');
        $more_text_classes = oxy_get_option('blog_readmore_style') == 'on'? 'btn btn-primary' : '';

        $output .= '<div class="small-screen-center post-more"><a href="' . get_permalink() . '" class="post-more-link ' . $more_text_classes . '">' . $more_text . '</a></div>';
    }

    if ($echo == true) {
        echo $output;
    } else {
        return $output;
    }
}

function oxy_get_content_shortcode($post, $shortcode_name)
{
    $pattern = get_shortcode_regex();
    // look for an embeded shortcode in the post content
    if (preg_match_all('/'. $pattern .'/s', $post->post_content, $matches) && array_key_exists(2, $matches) && in_array($shortcode_name, $matches[2])) {
        return $matches;
    }
}

function oxy_get_content_gallery($post_content)
{
    $pattern = get_shortcode_regex();
    $gallery_ids = null;
    if (preg_match_all('/'. $pattern .'/s', $post_content, $matches) && array_key_exists(2, $matches) && in_array('gallery', $matches[2])) {
        // gallery shortcode is being used

        // do we have some attribues?
        if (array_key_exists(3, $matches)) {
            if (array_key_exists(0, $matches[3])) {
                $gallery_attrs = shortcode_parse_atts($matches[3][0]);
                if (array_key_exists('ids', $gallery_attrs)) {
                    $gallery_ids = explode(',', $gallery_attrs['ids']);
                    return $gallery_ids;
                }
            }
        }
    }
}


/**
 * Gets the url that a slide should link to
 *
 * @return url link
 * @since 1.2
 **/
function oxy_get_slide_link($post)
{
    $link_type = get_post_meta($post->ID, THEME_SHORT . '_link_type', true);
    switch($link_type) {
        case 'page':
            $id = get_post_meta($post->ID, THEME_SHORT . '_page_link', true);
            return esc_url(get_permalink($id));
        break;
        case 'post':
            $id = get_post_meta($post->ID, THEME_SHORT . '_post_link', true);
            return esc_url(get_permalink($id));
        break;
        case 'category':
            $slug = get_post_meta($post->ID, THEME_SHORT . '_category_link', true);
            $cat = get_category_by_slug($slug);
            return esc_url(get_category_link($cat->term_id));
        break;
        case 'portfolio':
            $id = get_post_meta($post->ID, THEME_SHORT . '_portfolio_link', true);
            return esc_url(get_permalink($id));
        break;
        case 'url':
            return esc_url(get_post_meta($post->ID, THEME_SHORT . '_url_link', true));
        break;
        case 'no-link':
            return '';
        break;
        case 'default':
        default:
            return esc_url(get_permalink($post));
        break;
    }
}

/* --------------- add a wrapper for the embeded videos -------------*/

function oxy_add_video_embed_note($html, $url, $attr)
{
    $parsed_url = parse_url($url);
    if (strpos($parsed_url['host'], 'youtube.com') !== false ||
        strpos($parsed_url['host'], 'vimeo.com') !== false ||
        strpos($parsed_url['host'], 'wordpress.tv') !== false) {
        return '<div class="video-wrapper feature-video">'. $html .'</div>';
    } else {
        return $html;
    }
}
add_filter('embed_oembed_html', 'oxy_add_video_embed_note', 10, 3);


function oxy_create_hero_section($image = null, $title = null)
{
    $image = $image === null ? get_header_image() : $image;?>
    <section class="section section-alt">
        <div class="row">
            <div class="super-hero-unit">
                <figure>
                    <img alt="some image" src="<?php echo $image; ?>">
                </figure>
            </div>
        </div>
    </section>
    <?php
}

/* Function for replacing title contents including underscores with span tags*/
function oxy_filter_title($title)
{
    $title = preg_replace("/_(.*)_\b/", '<span class="light">$1</span>', $title);
    return $title;
}

/* function for limiting the excerpt */
function oxy_limit_excerpt($string, $word_limit)
{
    $words = explode(' ', $string, ($word_limit + 1));
    if (count($words) > $word_limit) {
        array_pop($words);
    }
    return implode(' ', $words).'...';
}

function oxy_remove_readmore_span($content)
{
    global $post;
    if (isset($post)) {
        $content = str_replace('<span id="more-' . $post->ID . '"></span><!--noteaser-->', '', $content);
        $content = str_replace('<span id="more-' . $post->ID . '"></span>', '', $content);
    }
    return $content;
}
add_filter('the_content', 'oxy_remove_readmore_span');

function change_excerpt_more($more)
{
    return '';
}
add_filter('excerpt_more', 'change_excerpt_more');

// add custom active class in menu items
function oxy_custom_active_item_class($classes = array(), $menu_item = false)
{
    if (in_array('current-menu-item', $menu_item->classes)) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'oxy_custom_active_item_class', 10, 2);


/**
 * Adds the dropdown-menu alignment class to all menu items
 *
 * @return classes array
 * @author
 **/
function oxy_nav_dropdown_menu_css_class($classes, $depth, $args)
{
    global $oxy_theme;
    $classes[] = $oxy_theme->get_option('header_menu_align', 'dropdown-menu-left');
    return $classes;
}
add_filter('nav_dropdown_menu_css_class', 'oxy_nav_dropdown_menu_css_class', 10, 3);

// returns the hover color for each icon
function oxy_get_icon_color($icon)
{
    $colour = '';
    switch($icon) {
        case 'adn':
            $colour = '#003871 ';
            break;
        case 'android':
            $colour = '#a4c639';
            break;
        case 'apple':
            $colour = '#333333';
            break;
        case 'bitbucket':
        case 'bitbucket-square':
            $colour = '#205081';
            break;
        case 'bitcoin':
        case 'btc':
            $colour = '#FF6600';
            break;
        case 'css3':
            $colour = '#404040';
            break;
        case 'dribbble':
            $colour = '#ea4c89';
            break;
        case 'dropbox':
            $colour = '#3d9ae8';
            break;
        case 'facebook':
        case 'facebook-square':
            $colour = '#3b5998';
            break;
        case 'flickr':
            $colour = '#0063dc';
            break;
        case 'foursquare':
            $colour = '#25a0ca';
            break;
        case 'github':
        case 'github-alt':
        case 'github-square':
            $colour = '#4183c4';
            break;
        case 'gittip':
            $colour = '#614C3E';
            break;
        case 'google-plus':
        case 'google-plus-square':
            $colour = '#E45135';
            break;
        case 'html5':
            $colour = '#ec6231';
            break;
        case 'instagram':
            $colour = '#634d40';
            break;
        case 'linkedin':
        case 'linkedin-square':
            $colour = '#5FB0D5';
            break;
        case 'linux':
            $colour = '#294170';
            break;
        case 'maxcdn':
            $colour = '#e47911';
            break;
        case 'pagelines':
            $colour = '#288EFE';
            break;
        case 'pinterest':
        case 'pinterest-square':
            $colour = '#910101';
            break;
        case 'renren':
            $colour = '#005eac';
            break;
        case 'skype':
            $colour = '#00aff0';
            break;
        case 'stack-exchange':
            $colour = '#3a6da6';
            break;
        case 'stack-overflow':
            $colour = '#ef8236';
            break;
        case 'trello':
            $colour = '#00c6d4';
            break;
        case 'tumblr':
        case 'tumblr-square':
            $colour = '#34526f';
            break;
        case 'twitter':
        case 'twitter-square':
            $colour = '#00acee';
            break;
        case 'vimeo-square':
            $colour = '#86c9ef';
            break;
        case 'vk':
            $colour = '#45668e';
            break;
        case 'weibo':
            $colour = '#e64141';
            break;
        case 'windows':
            $colour = '#00CCFF';
            break;
        case 'xing':
        case 'xing-square':
            $colour = '#126567';
            break;
        case 'youtube':
        case 'youtube-play':
        case 'youtube-square':
            $colour = '#c4302b';
            break;
        default:
            $colour = '#3b9999';
            break;

    }

    return apply_filters('oxy_social_icon_colour', $colour, $icon);
}


function oxy_get_external_link()
{
    global $post;
    $link_shortcode = oxy_get_content_shortcode($post, 'link');
    if ($link_shortcode !== null) {
        if (isset($link_shortcode[5])) {
            $link_shortcode = $link_shortcode[5];
            if (isset($link_shortcode[0])) {
                return $link_shortcode[0] ;
            } else {
                return get_permalink();
            }
        }
    }
}


// SEARCH WIDGET OUTPUT OVERRIDE

/* -------------------- OVERRIDE DEFAULT SEARCH WIDGET OUTPUT ------------------*/
function oxy_custom_search_form($form)
{
    $output = '<form role="search" method="get" id="searchform" action="' . home_url('/') . '">';
    $output .= '<div class="input-group">';
    $output .= '<input type="text" value="' . get_search_query() . '" name="s" id="s" class="form-control" placeholder="' . __('Search', 'lambda-td') . '"/>';
    $output .= '<span class="input-group-btn">';
    $output .= '<button class="btn btn-primary" type="submit" id="searchsubmit" value="'. esc_attr__('Search', 'lambda-td') . '">';
    $output .= '<i class="fa fa-search"></i>';
    $output .= '</button></span>';
    $output .= '</div></form>';
    return $output;
}
add_filter('get_search_form', 'oxy_custom_search_form');


// REMOVING DEFAULT CONTACT FORM 7 STYLES
add_action('wp_print_styles', 'oxy_remove_cf7_css', 100);

function oxy_remove_cf7_css()
{
    wp_deregister_style('contact-form-7');
}

function oxy_portfolio_pagination($pagination_type)
{
    global $wp_query;
    $showitems = 5;
    $paged = $wp_query->query_vars['paged'];

    include(locate_template('partials/portfolio/pagination/' . $pagination_type . '.php'));
}

function oxy_pagination($pages = '', $range = 2, $blog = true, $infinite = false, $echo = true)
{
    global $wp_query;
    global $paged;
    $output = '';
    if ($infinite == false) {
        // we don't use infinite pagination, show display the chosen pagination style
        switch(oxy_get_option('blog_pagination')) {
            case 'next_prev':
                if ($wp_query->max_num_pages > 1) {
                    $output .= '<nav id="nav-below" class="post-navigation padded">';
                    $output .= '<ul class="pager">';
                    $output .= '<li class="previous"><i class="fa fa-angle-left"></i>' . get_next_posts_link(__('Previous', 'lambda-td')) . '</li>';
                    $output .= '<li class="next">' . get_previous_posts_link(__('Next', 'lambda-td')) . '<i class="fa fa-angle-right"></i></li>';
                    $output .= '</ul>';
                    $output .= '</nav>';
                }
                break;
            case 'pages':
            default:
                $showitems = ($range * 2)+1;
                if (empty($paged)) {
                    $paged = 1;
                }

                if ($pages == '') {
                    global $wp_query;
                    $pages = $wp_query->max_num_pages;
                    if (!$pages) {
                        $pages = 1;
                    }
                }

                if (1 != $pages) {
                    $output.= '<div class="text-center"><ul class="post-navigation pagination">';
                    $output.= ($paged > 1)? '<li><a href="' . get_pagenum_link($paged - 1) . '">&lsaquo;</a></li>' : '<li class="disabled"><a>&lsaquo;</a></li>';

                    for ($i = 1; $i <= $pages; $i++) {
                        if (1 != $pages &&(!($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems)) {
                            $output.= ($paged == $i) ? '<li class="active"><span class="current">' . $i . '</span></li>' : '<li><a href="' . get_pagenum_link($i) . '" class="inactive">' . $i . '</a></li>';
                        }
                    }

                    $output.= ($paged < $pages)? "<li><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>": "<li class='disabled'><a>&rsaquo;</a></li>";
                    $output.= "</ul></div>\n";
                }
                break;
        }
    }

    if ($echo == true) {
        echo $output;
    } else {
        return $output;
    }
}


/**
 * Hidden Pagination for masonry with infinite-scroll
 *
 * @return void
 * @author
 **/
function infinite_scroll_pagination()
{
    echo '<div class="infinite-scroll" style="visibility:hidden;">'. get_next_posts_link().'</div>';
}


/**
 * Bootstrap the page links under a post
 *
 * @return void
 * @author
 **/
function oxy_wp_link_pages($args = '')
{
    $defaults = array(
        'before' => '',
        'after' => '',
        'link_before' => '',
        'link_after' => '',
        'next_or_number' => 'number',
        'nextpagelink' => __('Next page', 'lambda-td'),
        'previouspagelink' => __('Previous page', 'lambda-td'),
        'pagelink' => '%',
        'echo' => 1
    );

    $r = wp_parse_args($args, $defaults);
    $r = apply_filters('wp_link_pages_args', $r);
    extract($r, EXTR_SKIP);

    global $page, $numpages, $multipage, $more, $pagenow;

    $output = '';
    if ($multipage) {
        if ('number' == $next_or_number) {
            $output .= $before . '<ul class="post-navigation pagination">';
            $laquo = $page == 1 ? 'class="disabled"' : '';
            $output .= '<li ' . $laquo .'>' . _wp_link_page($page -1) . '&laquo;</a></li>';
            for ($i = 1; $i < ($numpages+1); $i = $i + 1) {
                $j = str_replace('%', $i, $pagelink);

                if (($i != $page) || ((!$more) && ($page==1))) {
                    $output .= '<li>';
                    $output .= _wp_link_page($i) ;
                } else {
                    $output .= '<li class="active">';
                    $output .= _wp_link_page($i) ;
                }
                $output .= $link_before . $j . $link_after ;
                $output .= '</a>';

                $output .= '</li>';
            }
            $raquo = $page == $numpages ? 'class="disabled"' : '';
            $output .= '<li ' . $raquo .'>' . _wp_link_page($page +1) . '&raquo;</a></li>';
            $output .= '</ul>' . $after;
        } else {
            if ($more) {
                $output .= $before . '<ul class="pager">';
                $i = $page - 1;
                if ($i && $more) {
                    $output .= '<li class="previous">' . _wp_link_page($i);
                    $output .= $link_before. $previouspagelink . $link_after . '</a></li>';
                }
                $i = $page + 1;
                if ($i <= $numpages && $more) {
                    $output .= '<li class="next">' .  _wp_link_page($i);
                    $output .= $link_before. $nextpagelink . $link_after . '</a></li>';
                }
                $output .= '</ul>' . $after;
            }
        }
    }

    if ($echo) {
        echo $output;
    }

    return $output;
}

function oxy_post_thumbnail_name($post, $echo = false)
{
    $name = basename(get_attached_file(get_post_thumbnail_id($post->ID)));
    if ($echo == true) {
        echo $name;
    } else {
        return $name;
    }
}

function oxy_remove_category_list_rel($output)
{
    // make rel valid
    return str_replace(' rel="category tag"', ' rel="tag"', $output);
}
add_filter('wp_list_categories', 'oxy_remove_category_list_rel');
add_filter('the_category', 'oxy_remove_category_list_rel');

// remove site header on pages with the site header turned off
function oxy_filter_body_class($classes)
{
    global $oxy_theme;
    global $wp_query;
    global $post;
    $is_portfolio = false;
    $is_staff = false;
    $is_service = false;
    $is_blog = false;

    if ($oxy_theme->get_option('layout_type') == 'boxed') {
        $classes[] = 'layout-boxed';
    }

    if (!is_null($post)) {
        $is_portfolio = $post->post_type === 'oxy_portfolio_image';
        $is_staff = $post->post_type === 'oxy_staff';
        $is_service = $post->post_type === 'oxy_service';
        $is_blog = oxy_query_is_blog();
    }
    // check for page or blog page
    if (is_page() || $is_blog || $is_portfolio || $is_staff  || $is_service || $wp_query->is_404) {
        // if we are on the blog page make sure you use the blog page id for transparancy option
        $page_id = $is_blog ? get_option('page_for_posts') : $post->ID;

        if (get_post_meta($page_id, THEME_SHORT . '_site_top_nav_transparency', true) === 'on') {
            $classes[] = 'transparent-header';

            if ($oxy_theme->get_option('header_top_bar') === 'on') {
                $classes[] = 'transparent-topbar';
            }

            $header_style = $oxy_theme->get_option('header_style');
            if ($header_style === 'logo-right-menu-below' ||
                $header_style === 'logo-left-menu-below' ||
                $header_style === 'logo-center-menu-below') {
                $classes[] = 'transparent-menu-below';
            }
        }
    }

    // add class for side menu
    if ($oxy_theme->get_option('header_style') === 'logo-left-menu-sidebar') {
        $classes[] = 'slide-menu';
    }
    // add classes for mobile agents
    global $oxy_is_iphone, $oxy_is_android, $oxy_is_ipad;
    if ($oxy_is_iphone) {
        $classes[] = 'oxy-agent-iphone';
    } elseif ($oxy_is_ipad) {
        $classes[] = 'oxy-agent-ipad';
    } elseif ($oxy_is_android) {
        $classes[] = 'oxy-agent-android';
    }

    // current language code if wpml is installed
    if (function_exists('icl_get_home_url')) {
          $classes[] = ICL_LANGUAGE_CODE;
    }

    // woocommerce cart popup option
    if ($oxy_theme->get_option('woo_cart_popup') === 'show') {
        $classes[] = 'woo-cart-popup';
    }

    // Add class when loader is on
    global $wp_customize;
    if (!isset($wp_customize) && $oxy_theme->get_option('site_loader') === 'on') {
        $classes[] = 'pace-on';
        $classes[] = 'pace-' . $oxy_theme->get_option('site_loader_style');
    }

    return $classes;
}
add_filter('body_class', 'oxy_filter_body_class');

function oxy_query_is_blog()
{
    global $wp_query, $post;
    return ((($wp_query->is_archive) || ($wp_query->is_author) || ($wp_query->is_category) || ($wp_query->is_home) || ($wp_query->is_single) || ($wp_query->is_tag)) && ($post->post_type === 'post'));
}

function oxy_is_woocommerce_active()
{
    // check if woo commerce is active
    if (class_exists('woocommerce')) {
        return true;
    }
    return false;
}

function oxy_woo_page_title($echo = false)
{
    if (is_search()) {
        $page_title = sprintf(__('Search Results: &ldquo;%s&rdquo;', 'woocommerce'), get_search_query());
        if (get_query_var('paged')) {
            $page_title .= sprintf(__('&nbsp;&ndash; Page %s', 'woocommerce'), get_query_var('paged'));
        }
    } elseif (is_tax()) {
        $page_title = single_term_title('', false);
    } else {
        $shop_page_id = woocommerce_get_page_id('shop');
        $page_title   = get_the_title($shop_page_id);
    }
    if ($echo) {
        echo $page_title;
    } else {
        return $page_title;
    }
}

add_filter('next_posts_link_attributes', 'next_posts_link_attributes');
add_filter('previous_posts_link_attributes', 'prev_posts_link_attributes');

function next_posts_link_attributes()
{
    return 'class="btn btn-primary btn-icon btn-icon-left"';
}
function prev_posts_link_attributes()
{
    return 'class="btn btn-primary btn-icon btn-icon-right"';
}

/**
 * Creates a shaped image for a post
 *
 * @return HTML for the image
 **/
function oxy_create_shaped_featured_image($post, $shape, $shape_size, $shadow, $link = null, $figcaption = null, $small_image_version = null)
{
    $image_box = '';
    $shadow_class = $shadow ? ' flat-shadow' : '';

    if ($shape == 'hex') {
        $image_box .= '<div class="box-wrap">';
    }
    $image_box .= '<div class="box-' . $shape . $shadow_class . ' box-' . $shape_size . '">';
    $image_box .= '<div class="box-dummy"></div>';

    $shape_image_size = $shape === 'round' ? 'square-image' : $shape . '-image';
    $extra_image_class = $shape === 'round' ? 'img-circle' : '';
    if ($small_image_version == true) {
        $shape_image_size = $shape_image_size . '-small';
    }

    $image_type = get_post_meta($post->ID, THEME_SHORT. '_image_type', true);
    if ('' !== $image_type) {
        $icon           = get_post_meta($post->ID, THEME_SHORT. '_icon', true);
        $icon_animation = get_post_meta($post->ID, THEME_SHORT. '_icon_animation', true);

        switch($image_type) {
            case 'image':
                $image_tag = get_the_post_thumbnail($post->ID, $shape_image_size, array('data-animation' => $icon_animation, 'class' => $extra_image_class));
                break;
            case 'both':
                $image_tag = get_the_post_thumbnail($post->ID, $shape_image_size, array('class' => $extra_image_class));
                $image_tag .= '<i class="fa fa-' . $icon . '" data-animation="' . $icon_animation . '"></i>';
                break;
            case 'icon':
                $image_tag = '<i class="fa fa-' . $icon . '" data-animation="' . $icon_animation . '"></i>';
                break;
        }
    } else {
        $image_tag = get_the_post_thumbnail($post->ID, $shape_image_size, array());
    }

    if (null !== $figcaption) {
        // staff figcaption
        $image_box .= '<figure class="box-inner">' . $image_tag . '<figcaption class="box-caption">'.$figcaption.'</figcaption></figure>';
    } elseif (null === $link) {
        $image_box .= '<div class="box-inner">' . $image_tag . '</div>';
    } else {
        $image_box .= '<a class="box-inner" href="' . $link . '">' . $image_tag . '</a>';
    }

    $image_box .= '</div>';

    if ($shape == 'hex') {
        $image_box .= '</div>';
    }

    return $image_box;
}

function oxy_get_portfolio_item_data($item)
{
    // setup post data
    global $post;
    $post = $item;
    setup_postdata($post);
    global $more;    // Declare global $more (before the loop).
    $more = 0;

    // grab the featured image
    $full_image_id = get_post_thumbnail_id($post->ID);
    $full_image_src = wp_get_attachment_image_src($full_image_id, 'full');

    // create info data structure
    $info = new stdClass();
    $info->title = get_the_title($post->ID);
    if (false !== $full_image_src) {
        $info->full_image_url = $full_image_src[0];
    } else {
        $info->full_image_url = '';
    }
    // set default popup link
    $info->popup_link = $info->full_image_url;
    $info->isGallery = false;
    // post format specific data
    $format = get_post_format($post->ID);
    if (false === $format) {
        $format = 'standard';
    }
    switch($format) {
        case 'standard':
            $info->icon = 'fa fa-search-plus';
            $info->popup_class = 'magnific';
            break;
        case 'image':
            $info->icon = 'fa fa-picture-o';
            $info->popup_class = 'magnific';
            break;
        case 'video':
            $info->icon = 'fa fa-play';
            $info->popup_class = 'magnific-vimeo';
            $video_shortcode = oxy_get_content_shortcode($post, 'embed');
            if ($video_shortcode !== null) {
                if (isset($video_shortcode[5])) {
                    $video_shortcode = $video_shortcode[5];
                    if (isset($video_shortcode[0])) {
                        $info->popup_link = $video_shortcode[0];
                    }
                }
            }
            break;
        case 'audio':
            $info->icon = 'fa fa-play';
            $info->popup_class = 'magnific-audio';
            $audio_shortcode = oxy_get_content_shortcode($post, 'audio');
            if ($audio_shortcode !== null) {
                $audio_src = null;
                if (array_key_exists(3, $audio_shortcode)) {
                    if (array_key_exists(0, $audio_shortcode[3])) {
                        $audio_attrs = shortcode_parse_atts($audio_shortcode[3][0]);
                        if (array_key_exists('src', $audio_attrs)) {
                            $info->popup_link = $audio_attrs['src'];
                        }
                    }
                }
            }
            break;
        case 'gallery':
            $info->icon = 'fa fa-search-plus';
            $info->popup_class = 'magnific-gallery';
            $info->isGallery = true;
            $gallery_ids = oxy_get_content_gallery($post);
            if ($gallery_ids !== null) {
                if (count($gallery_ids) > 0) {
                    // ok lets create a gallery
                    $gallery_rel = 'rel="gallery' . $post->ID . '"';
                    $gallery_images = array();
                    foreach ($gallery_ids as $gallery_image_id) {
                        $gallery_image = wp_get_attachment_image_src($gallery_image_id, 'full');
                        $gallery_images[] = $gallery_image[0] ;
                    }
                    $info->gallery_links = implode(',', $gallery_images);
                }
            }
            break;

    }

    $info->item_link = get_permalink($post->ID);
    return $info;
}

/**
 * Calls a shortcode function using custom meta data array to replace attributes where available
 * Override array can be sent to override attributes
 * @param   String  shortcode function name
 * @param   Array   array of shortcode attributes
 * @param   String  content to send to the shortcode
 * @param   Array   custom meta data to use as shortcode attribites
 * @param   Array   any values of the custom data that you want to override (optional)
 *
 * @return shortcode function output
 **/
function oxy_call_shortcode_with_meta($shortcode, $attrs, $content, $custom, $overrides = array())
{
    // prepare attributes
    $shortcode_atts = array();
    foreach ($attrs as $attr) {
        if (isset($overrides[$attr])) {
            $shortcode_atts[$attr] = $overrides[$attr];
        } elseif (isset($custom[THEME_SHORT.'_'.$attr])) {
            $shortcode_atts[$attr] = $custom[THEME_SHORT.'_'.$attr][0];
        }
    }
    return call_user_func_array($shortcode, array($shortcode_atts, $content));
}

function oxy_call_shortcode_with_tax_meta($shortcode, $attrs, $content, $id, $overrides = array())
{
    // prepare attributes
    $shortcode_atts = array();
    foreach ($attrs as $attr) {
        $opt = get_option(THEME_SHORT.'-tax-mtb-'.$attr.$id, '');
        if (isset($overrides[$attr])) {
            $shortcode_atts[$attr] = $overrides[$attr];
        } elseif (!empty($opt)) {
            $shortcode_atts[$attr] = $opt;
        }

    }
    return call_user_func_array($shortcode, array($shortcode_atts, $content));
}

/**
 * Outputs a page header
 *
 * @return void
 **/
function oxy_page_header($id, $heading_overrides = array(), $section_overrides = array())
{
    // has this page been overriden?
    if (get_post_meta($id, THEME_SHORT.'_override_header', true) === 'default') {
        oxy_default_page_header(get_the_title($id), $heading_overrides, $section_overrides);
    } else {
        $custom = get_post_custom($id);
        $heading_options = include OXY_THEME_DIR . '/inc/options/shortcodes/shared/heading-option-list.php';
        $heading_section_options = include OXY_THEME_DIR . '/inc/options/shortcodes/shared/heading-section-option-list.php';
        // we need to override this page header
        if (isset($custom[THEME_SHORT.'_show_header']) && $custom[THEME_SHORT.'_show_header'][0] === 'show') {
            // if we have no custom title then use get_the_title
            $title = empty($custom[THEME_SHORT.'_content'][0]) ? get_the_title($id) : $custom[THEME_SHORT.'_content'][0];
            // create heading using custom meta data
            $heading = oxy_call_shortcode_with_meta('oxy_section_heading', $heading_options, $title, $custom, $heading_overrides);
            // create section using custom meta data
            echo oxy_call_shortcode_with_meta('oxy_shortcode_section', $heading_section_options, $heading, $custom, $section_overrides);
        }
    }
}

/**
 * Outputs the default page header
 *
 * @return void
 * @author
 **/
function oxy_default_page_header($title, $heading_overrides = array(), $section_overrides = array())
{
    $options = get_option(THEME_SHORT . '-options');
    $heading_options = include OXY_THEME_DIR . '/inc/options/shortcodes/shared/heading-option-list.php';
    $heading_section_options = include OXY_THEME_DIR . '/inc/options/shortcodes/shared/heading-section-option-list.php';

    // use custom title
    if (isset($options['page_header_show_header']) && $options['page_header_show_header'] === 'show') {
        $heading = oxy_call_shortcode_with_theme_options('oxy_section_heading', $heading_options, $title, $options, 'page_header_', $heading_overrides);
        // create section using theme options
        echo oxy_call_shortcode_with_theme_options('oxy_shortcode_section', $heading_section_options, $heading, $options, 'page_header_', $section_overrides);
    }
}

/**
 * Calls a shortcode function using theme options array to replace attributes where available
 * Override array can be sent to override attributes
 * @param   String  shortcode function name
 * @param   Array   array of shortcode attributes
 * @param   String  content to send to the shortcode
 * @param   Array   custom meta data to use as shortcode attribites
 * @param   Array   any values of the custom data that you want to override (optional)
 *
 * @return shortcode function output
 **/
function oxy_call_shortcode_with_theme_options($shortcode, $attrs, $content, $custom, $prefix, $overrides = array())
{
    // prepare attributes
    $shortcode_atts = array();
    foreach ($attrs as $attr) {
        //echo $prefix.$attr.' val: ('.$custom[$prefix.$attr].')  ';
        if (isset($overrides[$attr])) {
             $shortcode_atts[$attr] = $overrides[$attr];
        } elseif (isset($custom[$prefix.$attr])) {
            $shortcode_atts[$attr] = $custom[$prefix.$attr];
        }
    }
    return call_user_func_array($shortcode, array($shortcode_atts, $content));
}

/**
 * Outputs the blog header
 *
 * @return void
 **/
function oxy_blog_header($title = null, $subtitle = null)
{
    $options = get_option(THEME_SHORT . '-options');
    // use custom title
    $title = $title === null ? $options['blog_header_content'] : $title;
    // has this page been overriden?
    if (isset($options['blog_override_header']) && $options['blog_override_header'] === 'default') {
        oxy_default_page_header($title, array('heading_type' => 'blog'));
    } else {
        if (isset($options['blog_header_show_header']) && $options['blog_header_show_header'] === 'show') {
            $heading_options = include OXY_THEME_DIR . '/inc/options/shortcodes/shared/heading-option-list.php';
            $heading_section_options = include OXY_THEME_DIR . '/inc/options/shortcodes/shared/heading-section-option-list.php';

            $heading = oxy_call_shortcode_with_theme_options('oxy_section_heading', $heading_options, $title, $options, 'blog_header_', array('heading_type' => 'blog'));
            // create section using theme options
            echo oxy_call_shortcode_with_theme_options('oxy_shortcode_section', $heading_section_options, $heading, $options, 'blog_header_');
        }
    }
}

// filter to skip quote posts in next/prev pagination
function oxy_adjacent_post_where($where)
{
    $quote_format = get_term_by('slug', 'post-format-quote', 'post_format');
    $link_format  = get_term_by('slug', 'post-format-link', 'post_format');

    if ($quote_format !== false || $link_format !== false) {
        $terms = array();
        if ($quote_format !== false) {
            $terms[] = $quote_format->term_id;
        }
        if ($link_format !== false) {
            $terms[] = $link_format->term_id;
        }
        $ex_cats_posts = get_objects_in_term($terms, array('post_format'));
        if (!empty($ex_cats_posts)) {
            return $where . ' AND p.ID NOT IN (' .  implode($ex_cats_posts, ','). ')';
        }
    }
    return $where;
}
add_filter('get_previous_post_where', 'oxy_adjacent_post_where');
add_filter('get_next_post_where', 'oxy_adjacent_post_where');

/**
 * Converts hex to rgba with optional opacity
 *
 * @return space separated list of footer classes
 **/
function oxy_hex2rgba($color, $opacity = false)
{
    $default = false;

    //Return default if no color provided
    if (empty($color)) {
        return $default;
    }

    //Check for a hex color string '#c1c2b4'
    if (! preg_match('/^#[a-f0-9]{6}$/i', $color)) {
        return $default;
    }

    //Sanitize $color if "#" is provided
    if ($color[0] == '#') {
        $color = substr($color, 1);
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
    } elseif (strlen($color) == 3) {
        $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
    } else {
        return $default;
    }

    //Convert hexadec to rgb
    $rgb =  array_map('hexdec', $hex);

    //Check if opacity is set(rgba or rgb)
    if ($opacity !== false) {
        if (abs($opacity) > 1) {
            $opacity = 1.0;
        }
        $output = 'rgba(' . implode(',', $rgb) . ',' . $opacity . ')';
    } else {
        $output = 'rgb(' . implode(',', $rgb) . ')';
    }

    //Return rgb(a) color string
    return $output;
}

function oxy_prefix_options_id($prefix, $options)
{
    foreach ($options as $index => &$val) {
        $val['id'] = $prefix.'_'.$val['id'];
    }
    return $options;
}

// Custom excerpt function
function oxy_excerpt($limit)
{
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(' ', $excerpt) . '...';
    } else {
        $excerpt = implode(' ', $excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`', '', $excerpt);
    return $excerpt;
}


/**
 * Adds an atom autor metadata tags
 *
 * @return void
 * @author
 **/

function oxy_atom_author_meta()
{
    $author = sprintf('%s', get_the_author());
    $title = sprintf('%s', get_the_title());

    $date = sprintf(
        '<time class="entry-date updated" datetime="%1$s">%2$s</time>',
        esc_attr(get_the_date('c')),
        esc_html(get_the_date('m.d.Y'))
    );
    $author_str = oxy_get_option('atom_author') === 'on' ? '<span class="author vcard"><span class="fn">' . $author . '</span></span>' : '';
    $title_str = oxy_get_option('atom_title') === 'on' ? '<span class="entry-title">' . $title . '</span>' : '';
    $date_str = oxy_get_option('atom_date') === 'on' ? $date : '';

    printf(
        '<span class="hide">%1$s%2$s%3$s</span>',
        $author_str,
        $title_str,
        $date_str
    );
}

/**
 * Imports theme customisation options
 *
 * @return theme customise options
 **/
function oxy_theme_customise_options($options)
{
    return include OXY_THEME_DIR . 'inc/customiser-options.php';
}
add_filter('oxy-customise-fields', 'oxy_theme_customise_options');

/**
 * Tells the stack module which is the current stack id as option could change from theme to theme
 *
 * @return theme customise options
 **/
function oxy_stack_current_id($id)
{
    global $oxy_theme;
    $is_portfolio = false;
    $is_staff = false;
    $is_service = false;
    $is_blog = false;
    $current_stack_id = $oxy_theme->get_option('site_stack');
    global $post;

    if (!is_null($post)) {
        $is_portfolio = $post->post_type === 'oxy_portfolio_image';
        $is_staff = $post->post_type === 'oxy_staff';
        $is_service = $post->post_type === 'oxy_service';
        $is_blog = oxy_query_is_blog();
    }

    if (is_page() || $is_portfolio || $is_staff || $is_service || $is_blog) {
        // does the page override the skin?
        $page_id = $is_blog ? get_option('page_for_posts') : $post->ID;
        $skin_override = get_post_meta($page_id, THEME_SHORT . '_site_skin', true);

        if ($skin_override != 0) {
            $current_stack_id = $skin_override;
        }
    }
    return $current_stack_id;
}
add_filter('oxy-stack-current-id', 'oxy_stack_current_id');

function oxy_top_bar_classes()
{
    $classes = apply_filters('oxy_top_bar_class', array());
    echo implode(' ', $classes);
}

/**
 * Creates the main header
 *
 * @return void
 * @author
 **/
if (!function_exists('oxy_create_nav_header')) {
    function oxy_create_nav_header()
    {
        global $post, $wp_query;
        $is_portfolio = false;
        $is_service = false;
        $is_staff = false;
        $is_blog = false;
        if (!is_null($post)) {
            $is_portfolio = $post->post_type === 'oxy_portfolio_image';
            $is_service = $post->post_type === 'oxy_service';
            $is_staff = $post->post_type === 'oxy_staff';
            $is_blog = oxy_query_is_blog();
        }

        // check for page overrides
        if (is_page() || $is_blog || $is_portfolio || $is_staff || $is_service || $wp_query->is_404) {
            // if we are on the blog page make sure you use the blog page id for transparancy option
            $page_id = $is_blog ? get_option('page_for_posts') : $post->ID;

            // are we showing the top nav?
            if (get_post_meta($page_id, THEME_SHORT . '_site_top_nav', true) === 'hide') {
                return;
            }
        }

        global $oxy_theme;
        // move this to logo.php?
        $logo_url  = $oxy_theme->get_option('logo_image');
        $logo_text = $oxy_theme->get_option('logo_text');

        if ($oxy_theme->get_option('header_top_bar') === 'on') {
            include OXY_THEME_DIR . 'partials/header/top-bar.php';
        }

        // create link for logo check for wpml
        if (function_exists('icl_get_home_url')) {
            $home_link = icl_get_home_url();
        } else {
            $home_link = home_url();
        }

        // get the primary menu
        $menu_slug = null;
        $locations = get_nav_menu_locations();
        if (isset($locations['primary'])) {
            $primary_menu = wp_get_nav_menu_object($locations['primary']);
            if (false !== $primary_menu) {
                $menu_slug = $primary_menu->slug;
            }
        }

        $classes = array();
        // setup sticky nav
        $classes[] = $oxy_theme->get_option('header_sticky');
        // setup header text caps
        $classes[] = $oxy_theme->get_option('header_capitalization');

        $container_classes = array();

        $container_classes[] = $oxy_theme->get_option('header_container');

        include(locate_template('partials/header/header-' . $oxy_theme->get_option('header_style', 'logo-left-menu-right') . '.php'));
    }
}

/**
 * Adds extra js and CSS from advanced page
 *
 * @return void
 * @author
 **/
function oxy_output_extra_css_js()
{
    global $oxy_theme, $post;
    $is_portfolio = false;
    $is_service = false;
    $is_staff = false;
    $is_blog = false;
    if (!is_null($post)) {
        $is_portfolio = $post->post_type === 'oxy_portfolio_image';
        $is_service = $post->post_type === 'oxy_service';
        $is_staff = $post->post_type === 'oxy_staff';
        $is_blog = oxy_query_is_blog();
    }

    $transparent_logo_css = '';
    // check for page or blog page
    if (is_page() || $is_blog || $is_portfolio || $is_staff || $is_service) {

        // if we are on the blog page make sure you use the blog page id for transparancy option
        $page_id = $is_blog ? get_option('page_for_posts') : $post->ID;

        $logo_transparent = $oxy_theme->get_option('logo_image_trans');
        if (get_post_meta($page_id, THEME_SHORT . '_site_top_nav_transparency', true) === 'on' && !empty($logo_transparent)) {
            $transparent_logo_css = '@media (min-width: 992px) {
                .transparent-header #masthead .navbar-brand {
                    background-image: url("' . $logo_transparent . '");
                }
                .transparent-header #masthead .navbar-brand img {
                    visibility: hidden;
                }
                .transparent-header #masthead.navbar-scrolled .navbar-brand {
                  background-image: none;
                }
                .transparent-header #masthead.navbar-scrolled .navbar-brand img {
                  visibility: visible;
                }
            }';
        }
    }

    $extra_css = $oxy_theme->get_option('extra_css');
    if (!empty($extra_css) || !empty($transparent_logo_css)) {
        echo '<style type="text/css" media="screen">' . $extra_css . $transparent_logo_css . '</style>';
    }
    $extra_js = $oxy_theme->get_option('extra_js');
    if (!empty($extra_js)) {
        echo '<script type="text/javascript">' . $extra_js . '</script>';
    }
}
add_action('wp_head', 'oxy_output_extra_css_js', 101);


/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function oxy_set_wp_title($title, $sep)
{
    if (is_feed()) {
        return $title;
    }

    global $page, $paged;

    // Add the blog name
    $title .= get_bloginfo('name', 'display');

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && (is_home() || is_front_page())) {
        $title .= ' ' . $sep . ' ' . $site_description;
    }

    // Add a page number if necessary:
    if (($paged >= 2 || $page >= 2) && ! is_404()) {
        $title .= ' ' . $sep  . ' ' . sprintf(__('Page %s', 'lambda-td'), max($paged, $page));
    }

    return $title;
}
add_filter('wp_title', 'oxy_set_wp_title', 10, 2);

/**
 * Check if footer position needs to be shown
 *
 * @return true | false
 * @author
 **/
function oxy_check_show_footer($sidebar_prefix, $footer_columns)
{
    $show_footer = false;
    for ($col = 0; $col < $footer_columns; $col++) {
        if (is_active_sidebar($sidebar_prefix . ($col+1))) {
            $show_footer = true;
            break;
        }
    }
    return $show_footer;
}


function oxy_password_form()
{
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );

    ob_start();
    include(locate_template('partials/password-form.php'));
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}
add_filter('the_password_form', 'oxy_password_form');


/**
 * Used to determin post image size for blog images
 *
 * @return full | related-post-image depending on blog page
 * @author
 **/
function oxy_get_post_image_size()
{
    $image_size = 'full';
    if (!is_single() && oxy_get_option('blog_post_style') !== 'blog-list-layout-normal') {
         $image_size = 'related-post-image';
    }
    return $image_size;
}

function oxy_edit_widgets($params)
{
    if (($params[0]['id'] === 'menu-bar' || $params[0]['id'] === 'above-nav-left' || $params[0]['id'] === 'above-nav-right' || $params[0]['id'] === 'logo-bar') && strpos($params[0]['widget_id'], 'search') !== false) {
        $params[0]['before_widget'] = '<div class="sidebar-widget widget_search"><div class="top-search">';
        $params[0]['after_widget'] = '<a class="search-trigger"></a><b class="search-close"></b></div></div>';
    }
    return $params;
}
add_filter('dynamic_sidebar_params', 'oxy_edit_widgets');

function oxy_add_extra_shortcode_classes($atts)
{
    $classes = '';
    $classes .= isset($atts['extra_classes']) ? $atts['extra_classes'] : '';
    $classes .= isset($atts['class']) ? $atts['class'] : '';
    $classes .= isset($atts['hidden_on_large']) && $atts['hidden_on_large'] === 'on' ? ' hidden-lg' : '';
    $classes .= isset($atts['hidden_on_medium']) && $atts['hidden_on_medium'] === 'on' ? ' hidden-md' : '';
    $classes .= isset($atts['hidden_on_small']) && $atts['hidden_on_small'] === 'on' ? ' hidden-sm' : '';
    $classes .= isset($atts['hidden_on_xsmall']) && $atts['hidden_on_xsmall'] === 'on' ? ' hidden-xs' : '';
    return $classes;
}

function oxy_render_modals()
{
    $modals = get_posts(
        array(
        'posts_per_page' => -1,
        'post_type' => 'oxy_modal',
        'orderby' => 'title',
        'order' => 'DESC'
        )
    );

    global $post;
    foreach ($modals as $modal) {
        $post = $modal;
        setup_postdata($post);
        $custom_fields = get_post_custom($post->ID);

        $animation_class = isset($custom_fields[THEME_SHORT . '_fade_modal']) ? $custom_fields[THEME_SHORT . '_fade_modal'][0] : '';
        $size_class = isset($custom_fields[THEME_SHORT . '_modal_size']) ? $custom_fields[THEME_SHORT . '_modal_size'][0] : '';

        include(locate_template('partials/modal.php'));
    }

    wp_reset_postdata();
}

function oxy_remove_contact_form_7_datepicker_theme()
{
    return 'disabled';
}
add_filter('cf7dp_ui_theme', 'oxy_remove_contact_form_7_datepicker_theme');