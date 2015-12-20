<?php
/**
 * Default Widget Overrides
 *
 * @package Lambda
 * @subpackage Frontend
 * @since 1.3
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version 1.17.0
 */

/* ------------------- OVERRIDE DEFAULT RECENT POSTS WIDGET ------------------*/


class OxyCustomRecentPostsWidget extends WP_Widget_Recent_Posts
{
    public function __construct()
    {
        parent::__construct();
    }

    public function widget($args, $instance)
    {
        extract($args);

        $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts', 'lambda-td') : $instance['title'], $instance, $this->id_base);

        if (empty($instance['number']) || ! $number = absint($instance['number'])) {
            $number = 10;
        }

        $show_date = isset($instance['show_date']) ? $instance['show_date'] : false;

        $r = new WP_Query(apply_filters('widget_posts_args', array('posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true)));
        if ($r->have_posts()) {
            echo $before_widget;
            if ($title) {
                echo $before_title . $title . $after_title;
            } ?>
            <ul>
            <?php while($r->have_posts()) : $r->the_post(); ?>
                <?php
                    if ('link' == get_post_format()) {
                        $post_link = oxy_get_external_link();
                    } else {
                        $post_link = get_permalink();
                    }
                ?>
                <li class="clearfix">
                    <div class="post-icon">
                        <a href="<?php echo $post_link; ?>" title="<?php the_title(); ?>">
                        <?php if (has_post_thumbnail()) { ?>
                            <?php the_post_thumbnail('thumbnail'); ?>
                        <?php } else { ?>
                            <?php oxy_post_icon(get_the_ID()); ?>
                        <?php } ?>
                        </a>
                    </div>
                    <a href="<?php echo $post_link; ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    <small class="post-date">
                        <?php if ($show_date) the_time(get_option('date_format')) ?>
                    </small>
                </li>
                <?php endwhile; ?>
            </ul>

            <?php
            echo $after_widget;
            wp_reset_postdata();
        }
    }
}

class OxyCustomArchivesWidget extends WP_Widget_Archives
{
    public function __construct()
    {
        parent::__construct();
    }

    public function widget($args, $instance)
    {
        extract($args);
        $c = ! empty($instance['count']) ? '1' : '0';
        $d = ! empty($instance['dropdown']) ? '1' : '0';
        $title = apply_filters('widget_title', empty($instance['title']) ? __('Archives', 'lambda-td') : $instance['title'], $instance, $this->id_base);

        echo $before_widget;
        if ($title) {
            echo $before_title . $title . $after_title;
        }

        if ($d) { ?>
        <select name="archive-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'>
            <option value=""><?php echo esc_attr(__('Select Month', 'lambda-td')); ?></option>
            <?php wp_get_archives(apply_filters('widget_archives_dropdown_args', array('type' => 'monthly', 'format' => 'option', 'show_post_count' => $c))); ?>
        </select>
<?php
        } else {
?>
        <ul>
        <?php wp_get_archives(apply_filters('widget_archives_args', array('type' => 'monthly', 'show_post_count' => $c , 'before'=> '' , 'after' => ''))); ?>
        </ul>
<?php
        }

        echo $after_widget;
    }
}

function oxy_widgets_init()
{
    global $oxy_theme;

    for ($i = 0; $i < 4; $i++) {
        $oxy_theme->register_sidebar('Upper Footer ' . ($i+1), 'Upper Footer area', '', 'upper-footer-' . ($i+1));
    }

    for ($i = 0; $i < 4; $i++) {
        $oxy_theme->register_sidebar('Footer ' . ($i+1), 'Footer area', '', 'footer-' . ($i+1));
    }

    for ($i = 0; $i < 4; $i++) {
        $oxy_theme->register_sidebar('Sub Footer ' . ($i+1), 'Sub Footer area below main footer', '', 'sub-footer-' . ($i+1));
    }

    if (oxy_is_woocommerce_active()) {
        // register Shop page widget for banners
        $oxy_theme->register_sidebar('Shop Page', 'Widget used in the Shop Page', '', 'product-page');
    }

    // register header area widgets
    $oxy_theme->register_sidebar('Menu Bar', 'Widget to the left of menu', '', 'menu-bar');
    $oxy_theme->register_sidebar('Logo Bar', 'Widget used in the logo bar when header style is menu below', '', 'logo-bar');
    $oxy_theme->register_sidebar('Top Bar Left', 'Above Navigation section to the left', 'text-left small-screen-center', 'above-nav-left');
    $oxy_theme->register_sidebar('Top Bar Right', 'Above Navigation section to the right', 'text-right small-screen-center', 'above-nav-right');
    $oxy_theme->register_sidebar('Sidebar', 'Standard site sidebar', '', 'sidebar');

    // replace default widgets
    register_widget('OxyCustomRecentPostsWidget');
    register_widget('OxyCustomArchivesWidget');
}
add_action('widgets_init', 'oxy_widgets_init');
