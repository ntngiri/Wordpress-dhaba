<?php
/**
 * Global menu option for below main menu options
 *
 * @package Lambda
 * @subpackage MegaMenu
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version 1.17.0
 * @author Oxygenna.com
 */
require_once OXY_TF_DIR . 'inc/options/fields/select/OxygennaSelect.php';

// create options and value for modal select
$modal_option = array(
    'name'        => 'Modal',
    'desc'        => 'Select to open up a modal',
    'id'          => 'modal',
    'type'        => 'select',
    'blank'       => 'None',
    'default'     => '',
    'options'     => 'custom_post_id',
    'post_type'   => 'oxy_modal',
);
$modal_select_value = isset($item->oxy_modal) ? esc_attr($item->oxy_modal) : '';
$modal_select = new OxygennaSelect($modal_option, $modal_select_value, array(
    'id' => 'edit-menu-item-modal-' . $item_id,
    'name' => 'menu-item-oxy_modal[' . $item_id . ']',
    'class' => 'widefat edit-menu-item-modal',
));
// create options and value for icon select
$icon_option = array(
    'name'    => 'Icon',
    'desc'    => 'Icon',
    'id'      => 'Icon',
    'type'    => 'select',
    'options' => 'icons',
    'default' => ''
);
$icon_select_value = isset($item->oxy_icon) ? esc_attr($item->oxy_icon) : '';
$icon_select = new OxygennaSelect($icon_option, $icon_select_value, array(
    'id' => 'edit-menu-item-icon-' . $item_id,
    'name' => 'menu-item-oxy_icon[' . $item_id . ']',
    'class' => 'widefat edit-menu-item-icon',
));
// create option for special menu items
$special_option = array(
    'name'    => 'Type',
    'desc'    => 'Type',
    'id'      => 'Type',
    'type'    => 'select',
    'options' => array(
        ''                    => __('Normal Menu', 'lambda-admin-td'),
        'divider'             => __('Divider', 'lambda-admin-td'),
        'nav-highlight'       => __('Button Menu', 'lambda-admin-td'),
        'nav-highlight-ghost' => __('Bordered Button Menu', 'lambda-admin-td'),
        'disabled'            => __('Disabled Menu', 'lambda-admin-td')
    ),
    'default' => ''
);
$special_select_value = isset($item->oxy_special) ? esc_attr($item->oxy_special) : '';
$special_select = new OxygennaSelect($special_option, $special_select_value, array(
    'id' => 'edit-menu-item-special-' . $item_id,
    'name' => 'menu-item-oxy_special[' . $item_id . ']',
    'class' => 'widefat edit-menu-item-special',
));
// create options and value for icon select
$label_type_option = array(
    'name'    => 'Label Type',
    'desc'    => 'Label Type',
    'id'      => 'Label Type',
    'type'    => 'select',
    'options' => array(
        'default' => __('Default', 'lambda-admin-td'),
        'primary' => __('Primary', 'lambda-admin-td'),
        'success' => __('Success', 'lambda-admin-td'),
        'info'    => __('Info', 'lambda-admin-td'),
        'warning' => __('Warning', 'lambda-admin-td'),
        'danger'  => __('Danger', 'lambda-admin-td'),
    ),
    'default' => ''
);
$label_type_select_value = isset($item->oxy_label_type) ? esc_attr($item->oxy_label_type) : '';
$label_type_select = new OxygennaSelect($label_type_option, $label_type_select_value, array(
    'id' => 'edit-menu-item-label_type-' . $item_id,
    'name' => 'menu-item-oxy_label_type[' . $item_id . ']',
    'class' => 'widefat edit-menu-item-label_type',
));
?>
<p class="field-icon oxy-modal description-wide">
    <label for="edit-menu-item-modal-<?php echo $item_id; ?>">
        <?php _e('Modal', 'lambda-admin-td'); ?>
        <?php $modal_select->render(); ?>
        <span class="description"><?php _e('Select to open up a modal', 'lambda-admin-td'); ?></span>
    </label>
</p>
<p class="field-icon oxy-icon description-wide">
    <label for="edit-menu-item-icon-<?php echo $item_id; ?>">
        <?php _e('Menu Icon', 'lambda-admin-td'); ?>
        <?php $icon_select->render(); ?>
        <span class="description"><?php _e('This will display an icon to the left of the menu item.', 'lambda-admin-td'); ?></span>
    </label>
</p>
<p class="field-url oxy_label description-thin">
    <label for="edit-menu-item-oxy_label-<?php echo $item_id; ?>">
        <?php _e('Extra menu label','lambda-admin-td'); ?>
        <input type="text" id="edit-menu-item-oxy_label-<?php echo $item_id; ?>" class="widefat code edit-menu-item-oxy_label" name="menu-item-oxy_label[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->oxy_label); ?>" />
        <span class="description"><?php _e('Adds a label to the menu item.', 'lambda-admin-td'); ?></span>
    </label>
</p>
<p class="field-icon oxy-label-type description-thin">
    <label for="edit-menu-item-label_type-<?php echo $item_id; ?>">
        <?php _e('Label Type', 'lambda-admin-td'); ?>
        <?php $label_type_select->render(); ?>
        <span class="description"><?php _e('Select a style to use for the label.', 'lambda-admin-td'); ?></span>
    </label>
</p>
<?php if($item->object !== 'oxy_mega_columns') : ?>
<p class="field-icon oxy-icon description-wide" style="margin-top: 28px;">
    <label for="edit-menu-item-icon-<?php echo $item_id; ?>">
        <?php _e('Special Menu Item', 'lambda-admin-td'); ?>
        <?php $special_select->render(); ?>
        <span class="description"><?php _e('This will change the menu to a special typy of menu item.', 'lambda-admin-td'); ?></span>
    </label>
</p>
<?php endif; ?>