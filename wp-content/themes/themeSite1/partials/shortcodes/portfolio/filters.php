<?php
/**
 * Portfolio shortcode
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
<?php if( !empty( $show_filters ) ) : ?>
<div class="row">
    <div class="col-md-12">
        <div class="portfolio-header clearfix">
            <?php if( in_array( 'categories', $show_filters ) ) : ?>

            <h3 class="portfolio-title pull-left">
                <strong>
                    <?php _e( 'View /', 'lambda-td' ); ?>
                </strong>
                <span>
                    <?php _e( 'All', 'lambda-td' ); ?>
                </span>
            </h3>

            <?php endif; ?>
            <div class="portfolio-filters pull-right">
                <?php if( in_array( 'sort', $show_filters ) ) : ?>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle btn-icon-right btn-sm" data-toggle="dropdown">
                            <b><?php _e( 'Sort', 'lambda-td' ); ?></b>
                            <span>
                                <i class="fa fa-angle-down"></i>
                            </span>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li><a class="portfolio-sort" data-sort="default"><?php _e( 'Default', 'lambda-td' ); ?></a></li>
                            <li><a class="portfolio-sort" data-sort="title"><?php _e( 'Title', 'lambda-td' ); ?></a></li>
                            <li><a class="portfolio-sort" data-sort="date"><?php _e( 'Date', 'lambda-td' ); ?></a></li>
                            <li><a class="portfolio-sort" data-sort="comments"><?php _e( 'Comments', 'lambda-td' ); ?></a></li>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php if( in_array( 'order', $show_filters ) ) : ?>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle btn-icon-right btn-sm" data-toggle="dropdown">
                            <b><?php _e( 'Order', 'lambda-td' ); ?></b>
                            <span>
                                <i class="fa fa-angle-down"></i>
                            </span>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li><a class="portfolio-order" data-value="true"><?php _e( 'Ascending', 'lambda-td' ); ?></a></li>
                            <li><a class="portfolio-order" data-value="false"><?php _e( 'Descending', 'lambda-td' ); ?></a></li>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php if( in_array( 'categories', $show_filters ) ) : ?>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle btn-icon-right btn-sm" data-toggle="dropdown">
                            <b><?php _e( 'Category', 'lambda-td' ); ?></b>
                            <span>
                                <i class="fa fa-angle-down"></i>
                            </span>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li><a class="portfolio-filter" data-filter="*"><?php _e( 'All', 'lambda-td' ); ?></a></li>
                            <?php foreach( $filters as $filter ) : ?>
                                <li><a class="portfolio-filter" data-filter=".filter-<?php echo urldecode($filter->slug); ?>"><?php echo $filter->name; ?></a></li>
                            <?php
                            endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>