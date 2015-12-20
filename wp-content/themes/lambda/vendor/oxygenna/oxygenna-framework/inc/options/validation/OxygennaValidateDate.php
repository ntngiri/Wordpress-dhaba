<?php
/**
 * Checks for valid date
 *
 * @package Lambda
 * @subpackage Core
 * @since 1.0
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license http://wiki.envato.com/support/legal-terms/licensing-terms/
 * @version 1.17.0
 */

/**
 * Validates a date
 *
 * @package Lambda
 * @since 1.0
 **/
class OxygennaValidateDate
{
    /**
     * Validates the option data
     *
     * @return validated options array
     *                   @since 1.0
     **/
    public function validate($field, $options, $new_options)
    {
        $valid_date = false;
        // get new date value
        $date = $new_options[$field['id']];
        // split up the date into m / d / y
        $parts = explode('/', $date);
        // do we have m d y ?
        if (count($parts) == 3) {
            // check if m d y is valid date
            $valid_date = checkdate($parts[0], $parts[1], $parts[2]);
        }
        // if we have a valid date return new value otherwise report error
        if ($valid_date) {
            $options[$field['id']] = $date;
        } else {
            add_settings_error($field['name'], $field['id'], $field['name'] . ' - ' . __('Invalid date supplied', 'lambda-admin-td'), 'error');
        }

        return $options;
    }
}
