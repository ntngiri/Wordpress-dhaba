<?php
    $name = oxy_get_option( 'blog_style' );
    $extra_article_class = $name === 'no-sidebar-normal' ? 'text-center' : ''; ?>

<article id="post-0" class="post no-results not-found <?php echo esc_attr($extra_article_class); ?>">
    <header class="entry-header">
        <h1 class="entry-title"><?php _e( 'Nothing Found', 'lambda-td' ); ?></h1>
    </header>

    <div class="entry-content">
    <?php
        if( is_category() ) {
            $message = __('Sorry, no posts were found for this category.', 'lambda-td');
        }
        else if( is_date() ) {
            $message = __('Sorry, no posts found in that timeframe', 'lambda-td');
        }
        else if( is_author() ) {
            $message = __('Sorry, no posts from that author were found', 'lambda-td');
        }
        else if( is_tag() ) {
            $message = sprintf( __('Sorry, no posts were tagged with  "%1$s"', 'lambda-td'), single_tag_title( '', false ) );
        }
        else if( is_search() ) {
            $message = sprintf( __('Sorry, no search results were found for  "%1$s"', 'lambda-td'), get_search_query() );
        }
        else {
            $message = __( 'Sorry, nothing found', 'lambda-td' );
        }
    ?>
        <p class="lead"><?php echo $message; ?></p>
    </div>
</article>