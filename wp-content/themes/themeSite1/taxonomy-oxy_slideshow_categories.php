<?php
/**
 * Default page template
 *
 * @package Lambda
 * @subpackage Frontend
 * @since 0.1
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license http://wiki.envato.com/support/legal-terms/licensing-terms/
 * @version 1.17.0
 */

get_header();
$options = get_option(THEME_SHORT . '-options');
$slideshow = get_query_var( 'term' ); ?>
<article><?php
echo oxy_call_shortcode_with_meta( 'oxy_shortcode_slideshow', array(
    'flexslider',
    'ids',
    'animation',
    'direction',
    'speed',
    'duration',
    'directionnav',
    'itemwidth',
    'showcontrols',
    'controlsposition',
    'controlsalign',
    'controls_vertical',
    'captions',
    'captions_horizontal',
    'autostart',
    'tooltip',
    // global options
    'extra_classes',
    'margin_top',
    'margin_bottom',
    'scroll_animation',
    'scroll_animation_delay'
    ), $slideshow, $options, array( 'flexslider' => $slideshow, 'margin_top' => 'no-top', 'margin_bottom' => 'no-bottom' ) );
?>
</article>
<?php get_footer();
