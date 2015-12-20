<h1 class="countdown <?php echo esc_attr(implode(' ', $classes)); ?>" data-date="<?php echo esc_attr($date); ?>" data-os-animation="<?php echo esc_attr($scroll_animation); ?>" data-os-animation-delay="<?php echo esc_attr($scroll_animation_delay); ?>s">
    <span class="counter-element">
        <span class="counter-days odometer text-center">
            0
        </span>
        <b>
            <?php _e('days', 'lambda-td'); ?>
        </b>
    </span>
    <span class="counter-element">
        <span class="counter-hours odometer text-center">
            0
        </span>
        <b>
            <?php _e('hours', 'lambda-td'); ?>
        </b>
    </span>
    <span class="counter-element">
        <span class="counter-minutes odometer text-center">
            0
        </span>
        <b>
            <?php _e('minutes', 'lambda-td'); ?>
        </b>
    </span>
    <span class="counter-element">
        <span class="counter-seconds odometer text-center">
            0
        </span>
        <b>
            <?php _e('seconds', 'lambda-td'); ?>
        </b>
    </span>
</h1>