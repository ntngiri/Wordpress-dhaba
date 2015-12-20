<?php
/**
 * Navigation partial
 *
 * @package Lambda
 * @subpackage Admin
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version 1.17.0
 * @author Oxygenna.com
 */

if (null !== $menu_slug) {
    wp_nav_menu(array(
        'menu' => $menu_slug,
        'menu_class' => 'nav navbar-nav',
        'depth' => 4,
        'walker' => new FrontendBootstrapMegaMenuWalker(),
        'container_class' => 'menu-container'
    ));
}
?>
<div class="menu-sidebar">
    <?php dynamic_sidebar('menu-bar'); ?>
</div>
