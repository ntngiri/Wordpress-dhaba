<?php
/**
 * Mega Menu Options
 *
 * @package Lambda
 * @subpackage Admin
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version 1.17.0
 * @author Oxygenna.com
 */
require_once OXY_TF_DIR . 'inc/options/fields/select/OxygennaSelect.php';
$column_borders_option = array(
    'name'    => 'Borders',
    'desc'    => 'Borders',
    'id'      => 'Borders',
    'type'    => 'select',
    'options' => array(
        'on'  => __('On', 'lambda-admin-td'),
        'off' => __('Off', 'lambda-admin-td'),
    ),
    'default' => 'on'
);
$column_borders_select_value = isset($item->oxy_mega_borders) ? esc_attr($item->oxy_mega_borders) : '';
$column_borders_select = new OxygennaSelect($column_borders_option, $column_borders_select_value, array(
    'id' => 'edit-menu-item-mega_borders-' . $item_id,
    'name' => 'menu-item-oxy_mega_borders[' . $item_id . ']',
    'class' => 'widefat edit-menu-item-mega_borders',
));
?>
<p class="field-url oxy-url description-wide">
    <label for="edit-menu-item-oxy-url-<?php echo $item_id; ?>">
        <?php _e('URL', 'lambda-admin-td'); ?><br />
        <input type="text" id="edit-menu-item-url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-url" name="menu-item-oxy_mega_url[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->oxy_mega_url); ?>" />
    </label>
</p>
<p class="field-url oxy_bg_url description-wide">
    <label for="edit-menu-item-oxy_bg_url-<?php echo $item_id; ?>">
        <?php _e('Background Image URL','lambda-admin-td'); ?><br />
        <input type="text" id="edit-menu-item-oxy_bg_url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-oxy_bg_url" name="menu-item-oxy_bg_url[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->oxy_bg_url); ?>" />
    </label>
</p>
<p class="field-mega_borders oxy-mega_borders description-wide">
    <label for="edit-menu-item-oxy-mega_borders-<?php echo $item_id; ?>">
        <?php _e('Show Column Borders', 'lambda-admin-td'); ?><br />
        <?php $column_borders_select->render(); ?>
        <span class="description"><?php _e('Useful for image backgrounds.', 'lambda-admin-td'); ?></span>
    </label>
</p>
