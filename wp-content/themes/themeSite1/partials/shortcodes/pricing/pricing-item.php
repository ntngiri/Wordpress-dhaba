<li class="<?php echo esc_attr(implode(' ', $classes)); ?> <?php if ( !empty( $featured_label ) ) { echo 'featured'; } ?>" data-os-animation="<?php echo esc_attr($scroll_animation); ?>" data-os-animation-delay="<?php echo esc_attr($scroll_animation_delay); ?>s"><?php
    if ( !empty( $src ) ) { ?>
        <img src="<?php echo esc_url($src); ?>" alt="Menu Item"> <?php
    } ?>
    <div class="pricing-item-list-content">
        <h3>
            <?php echo $title;  ?> <span><?php echo $price;  ?></span>
        </h3><?php
        if ( !empty( $description ) ) { ?>
            <p>
                <?php echo $description;  ?>
            </p><?php
        }
        if ( !empty( $featured_label ) ) { ?>
            <strong>
                <?php echo $featured_label;  ?>
            </strong><?php
        } ?>
    </div>
</li>