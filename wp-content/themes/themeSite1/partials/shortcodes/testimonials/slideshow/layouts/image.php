<blockquote>
    <p><?php echo strip_tags( get_the_content() ); ?></p>
    <div class="box box-small box-round">
        <div class="box-dummy"></div>
        <div class="box-inner">
            <?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?>
        </div>
    </div>
    <footer><?php
        the_title();
        if( !empty( $cite ) ) {?>
        <cite title="<?php echo esc_attr($cite); ?>"><?php
            echo $cite; ?>
        </cite>
    <?php } ?>
    </footer>
</blockquote>
