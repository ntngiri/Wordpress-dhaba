<blockquote>
    <h1><?php the_title(); ?></h1>
    <footer><?php
        if( !empty( $cite ) ) {?>
        <cite title="<?php echo esc_attr($cite); ?>"><?php
            echo $cite; ?>
        </cite>
    <?php } ?>
    </footer>
</blockquote>
