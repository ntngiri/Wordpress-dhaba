<?php if (!empty($wp_query->max_num_pages)) : ?>
<nav class="post-navigation text-center">
    <ul class="pagination">
        <li class="<?php echo esc_attr($paged > 1 ? '' : 'disabled'); ?>">
        <?php if ($paged > 1) : ?>
            <a href="<?php echo get_pagenum_link($paged - 1); ?>">
                <i class="fa fa-angle-left"></i>
            </a>
        <?php else : ?>
                <span>
                    <i class="fa fa-angle-left"></i>
                </span>
            <?php endif; ?>
        </li>

        <?php for($i = 1; $i <= $wp_query->max_num_pages; $i++) : ?>
            <li>
                <?php if ($paged == $i) : ?>
                    <span class="current">
                        <?php echo $i; ?>
                    </span>
                <?php else : ?>
                    <a href="<?php echo get_pagenum_link($i); ?>">
                        <?php echo $i; ?>
                    </a>
                <?php endif; ?>
            </li>
        <?php endfor; ?>

        <li class="<?php echo $paged < $wp_query->max_num_pages ? '' : 'disabled' ?>">
            <?php if ($paged < $wp_query->max_num_pages) : ?>
                <a href="<?php echo get_pagenum_link($paged + 1); ?>">
                    <i class="fa fa-angle-right"></i>
                </a>
            <?php else : ?>
                <span>
                    <i class="fa fa-angle-right"></i>
                </span>
            <?php endif; ?>
        </li>
    </ul>
</nav>
<?php endif;
