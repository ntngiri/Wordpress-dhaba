<header class="small-screen-center <?php echo esc_attr($text_color); ?> col-md-12">
    <?php include( locate_template( 'partials/shortcodes/headings/heading-shortcode.php' ) ); ?>

    <?php if ( !is_home() && oxy_get_option('page_header_show_breadcrumbs') === 'show' ) :  ?>
        <ol class="breadcrumb breadcrumb-blog <?php echo esc_attr(oxy_get_option('page_header_breadcrumbs_case')); ?> element-top-<?php echo esc_attr($margin_top); ?>">
            <li>
                <a href="<?php echo home_url(); ?>"><?php echo __( 'home', 'lambda-td' ); ?></a>
            </li>
            <?php if (is_page()) :
                global $post;
                $ancestors = get_post_ancestors( $post );
                foreach ($ancestors as $ancestor) {
                    $parent_post = get_post($ancestor);
                    $parent_title = $parent_post->post_title;  ?>
                    <li>
                        <a href="<?php echo get_permalink($ancestor); ?>">
                            <?php echo $parent_title; ?>
                        </a>
                    </li><?php
                } ?>
                <li>
                    <?php echo $post->post_title; ?>
                </li>
            <?php endif; ?>
            <?php if( is_search() ) : ?>
                <li>
                    <?php echo __('Results for ', 'lambda-td'). get_search_query();  ?>
                </li>
            <?php endif; ?>
        </ol>
    <?php endif; ?>
</header>
