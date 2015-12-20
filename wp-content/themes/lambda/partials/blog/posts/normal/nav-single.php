<?php
/**
 * Adds navigation for single post
 *
 * @package Lambda
 * @subpackage Admin
 * @since 0.1
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version 1.17.0
 */
?>
<nav id="nav-below" class="post-navigation">
    <ul class="pager">
        <?php if( get_previous_post() ) : ?>
            <li class="previous">
                <a class="btn btn-primary btn-icon btn-icon-left" rel="prev" href="<?php echo get_permalink(get_adjacent_post(false, '', true)); ?>">
                    <i class="fa fa-angle-left"></i>
                    <?php _e( 'Previous', 'lambda-td' ); ?>
                </a>
            </li>
        <?php endif; ?>
        <?php if( get_next_post() ) : ?>
            <li class="next">
                <a class="btn btn-primary btn-icon btn-icon-right" rel="next" href="<?php echo get_permalink(get_adjacent_post(false, '', false)); ?>">
                    <?php _e( 'Next', 'lambda-td' ); ?>
                    <i class="fa fa-angle-right"></i>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</nav><!-- nav-below -->
