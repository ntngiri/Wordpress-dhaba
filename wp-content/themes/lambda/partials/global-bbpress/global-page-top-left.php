<?php
$margin_top = oxy_get_option('template_margin'); ?>
<section class="section">
    <div class="container">
        <div class="row element-top-<?php echo $margin_top; ?>">
            <div class="col-md-3 sidebar">
                <?php
                if( is_active_sidebar( 'bbpress-sidebar' ) ) {
                    dynamic_sidebar( 'bbpress-sidebar' );
                }
                ?>
            </div>
            <div class="col-md-9">
