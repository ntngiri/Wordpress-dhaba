<a href="<?php echo esc_url($home_link); ?>" class="navbar-brand">
    <?php if (!empty($logo_url)): ?>
        <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
    <?php endif ?>
    <?php echo $logo_text; ?>
</a>
