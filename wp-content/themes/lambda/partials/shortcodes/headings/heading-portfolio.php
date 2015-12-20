
<header class="portfolio-header col-md-12 <?php echo esc_attr($text_color); ?>">
    <?php include( locate_template( 'partials/shortcodes/headings/heading-shortcode.php' ) ); ?>
    <nav class="portfolio-nav element-top-<?php echo esc_attr($margin_top); ?>">
        <ul>
            <?php $prev = get_adjacent_post( false, '', true ); ?>
            <?php if( !empty( $prev ) ) : ?>
                <li>
                    <a href="<?php echo get_permalink($prev->ID); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                            <g>
                                <polyline fill="none" stroke-width="3" stroke-miterlimit="10" points="68.692,16.091 33.146,50 68.692,83.906   "/>
                            </g>
                        </svg>
                    </a>
                </li>
            <?php endif; ?>
            <?php $page = oxy_get_option( 'portfolio_page' ); ?>
            <?php if( !empty( $page ) ) : ?>
                <li>
                    <a href="<?php echo get_permalink($page); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                                <g>
                                    <rect x="15.958" y="15" fill="none" stroke-width="3" stroke-miterlimit="10" width="70" height="70"/>
                                    <line fill="none" stroke-width="3" stroke-miterlimit="10" x1="15.958" y1="61.655" x2="85.958" y2="61.655"/>
                                    <line fill="none" stroke-width="3" stroke-miterlimit="10" x1="15.958" y1="38.345" x2="85.958" y2="38.345"/>
                                    <line fill="none" stroke-width="3" stroke-miterlimit="10" x1="62.632" y1="15" x2="62.632" y2="85"/>
                                    <line fill="none" stroke-width="3" stroke-miterlimit="10" x1="39.286" y1="15" x2="39.286" y2="85"/>
                                </g>
                        </svg>
                    </a>
                </li>
            <?php endif; ?>
            <?php $next = get_adjacent_post( false, '', false ); ?>
            <?php if( !empty( $next ) ) : ?>
                <li>
                    <a href="<?php echo get_permalink($next->ID); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                            <g>
                                <polyline fill="none" stroke-width="3" stroke-miterlimit="10" points="33.146,16.091 68.692,50
                                    33.146,83.906   "/>
                            </g>
                        </svg>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>


