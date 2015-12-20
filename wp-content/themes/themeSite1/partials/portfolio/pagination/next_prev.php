<?php if ($wp_query->max_num_pages > 1) : ?>
    <nav class="post-navigation">
        <ul class="pager">
            <li class="previous">
                <i class="fa fa-angle-left"></i>
                <?php previous_posts_link(__('Previous', 'lambda-td')); ?>
            </li>
            <li class="next">
                <?php next_posts_link(__('Next', 'lambda-td')); ?>
                <i class="fa fa-angle-right"></i>
            </li>
        </ul>
    </nav>
<?php endif; ?>
