<div class="top-bar <?php oxy_top_bar_classes(); ?>">
    <div class="<?php echo esc_attr($oxy_theme->get_option('header_container')); ?>">
        <div class="top top-left">
            <?php dynamic_sidebar( 'above-nav-left' ); ?>
        </div>
        <div class="top top-right">
            <?php dynamic_sidebar( 'above-nav-right' ); ?>
        </div>
    </div>
</div>
