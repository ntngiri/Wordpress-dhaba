<?php
/**
 * Shows a simple single post
 *
 * @package Lambda
 * @subpackage Frontend
 * @since 1.0
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license http://wiki.envato.com/support/legal-terms/licensing-terms/
 * @version 1.17.0
 */

$name = oxy_get_option( 'blog_style' );
$extra_article_class = $name === 'no-sidebar-normal' ? 'post-nosidebar' : '';
?>
<article id="post-<?php the_ID(); ?>" class="post <?php echo esc_attr($extra_article_class); ?>">
    <header class="post-head small-screen-center">
        <h2 class="post-title">
            <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'lambda-td' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
                <?php the_title(); ?>
            </a>
        </h2>
    </header>
    <div class="post-body">
        <?php the_excerpt(); ?>
    </div>
</article>
