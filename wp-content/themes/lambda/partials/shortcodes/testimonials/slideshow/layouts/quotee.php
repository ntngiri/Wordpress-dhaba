<blockquote class="blockquote-simple">
    <h1><?php the_title(); ?></h1>


    <?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?>

    <footer><?php
        if( !empty( $cite ) ) {?>
        <cite title="<?php echo esc_attr($cite); ?>"><?php
            echo $cite; ?>
        </cite>
    <?php } ?>
    </footer>
</blockquote>
