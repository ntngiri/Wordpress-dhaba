 <?php for( $i = 0; $i < 5; $i++):
        $icon = (isset($custom_fields[THEME_SHORT . '_icon'.$i]))? $custom_fields[THEME_SHORT . '_icon'.$i][0]:'';
        $url  = (isset($custom_fields[THEME_SHORT . '_link'.$i]))? $custom_fields[THEME_SHORT . '_link'.$i][0]:''; ?>
    <?php if($url !== ''): ?>
        <li>
            <a href="<?php echo esc_url($url); ?>" target="_blank">
                <i class="<?php echo esc_attr($icon); ?>"></i>
            </a>
        </li>
    <?php endif; ?>
<?php endfor; ?>
