<?php
/**
 * Main functions file
 *
 * @package Lambda
 * @subpackage Frontend
 * @since 0.1
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license http://wiki.envato.com/support/legal-terms/licensing-terms/
 * @version 1.17.0
 */

// create defines
define('THEME_NAME', 'Lambda');
define('THEME_SHORT', 'lambda');

define('OXY_THEME_DIR', get_template_directory() . '/');
define('OXY_THEME_URI', get_template_directory_uri() . '/');

// include extra theme specific code
include OXY_THEME_DIR . 'inc/frontend.php';
include OXY_THEME_DIR . 'inc/woocommerce.php';
include OXY_THEME_DIR . 'vendor/oxygenna/oxygenna-framework/inc/OxygennaTheme.php';
include OXY_THEME_DIR . 'vendor/oxygenna/oxygenna-mega-menu/oxygenna-mega-menu.php';

global $oxy_theme;
$oxy_theme = new OxygennaTheme(
    array(
        'text_domain'       => 'lambda-td',
        'admin_text_domain' => 'lambda-admin-td',
        'min_wp_ver'        => '3.4',
        'widgets' => array(
            'OxyWidgetTwitter' => 'OxyWidgetTwitter.php',
            'OxyWidgetSocial'  => 'OxyWidgetSocial.php',
            'OxyWidgetWPML'    => 'OxyWidgetWPML.php',
        ),
        'shortcodes' => false,
    )
);

include OXY_THEME_DIR . 'inc/custom-posts.php';
include OXY_THEME_DIR . 'inc/options/shortcodes/shortcodes.php';
include OXY_THEME_DIR . 'inc/options/widgets/default_overrides.php';

if (is_admin()) {
    include OXY_THEME_DIR . 'inc/backend.php';
    include OXY_THEME_DIR . 'inc/options/shortcodes/create-shortcode-options.php';
    include OXY_THEME_DIR . 'inc/theme-metaboxes.php';
    include OXY_THEME_DIR . 'inc/visual-composer-extend.php';
    include OXY_THEME_DIR . 'inc/visual-composer.php';
    include OXY_THEME_DIR . 'inc/install-plugins.php';
    include OXY_THEME_DIR . 'inc/one-click-import.php';
    include OXY_THEME_DIR . 'vendor/oxygenna/oxygenna-one-click/inc/OxygennaOneClick.php';
    include OXY_THEME_DIR . 'vendor/oxygenna/oxygenna-typography/oxygenna-typography.php';
}

include OXY_THEME_DIR . 'vendor/oxygenna/oxygenna-stacks/oxygenna-stacks.php';

// MOVE THIS FUNCTION INTO THEME SWITCHER
function oxy_check_for_blog_switcher($name)
{
    if (isset($_GET['blogstyle'])) {
        $name = $_GET['blogstyle'];
    }
    return $name;
}
add_filter('oxy_blog_type', 'oxy_check_for_blog_switcher');
