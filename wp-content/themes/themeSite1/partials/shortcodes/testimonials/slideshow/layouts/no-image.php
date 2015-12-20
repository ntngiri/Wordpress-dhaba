<blockquote>
    <p><?php echo strip_tags( get_the_content() ); ?></p>
    <footer><?php
        the_title();
        if( !empty( $cite ) ) {?>
        <cite title="<?php echo esc_attr($cite); ?>"><?php
            echo $cite; ?>
        </cite>
    <?php } ?>
    </footer>
</blockquote>