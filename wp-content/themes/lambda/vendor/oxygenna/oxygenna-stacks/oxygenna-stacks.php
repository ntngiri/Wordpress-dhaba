<?php
/**
 * Bootstrap for Stacks Moduls
 *
 * @package Lambda
 * @subpackage Stacks
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version 1.17.0
 * @author Oxygenna.com
 */

define('OXY_STACKS_DIR', OXY_THEME_DIR . 'vendor/oxygenna/oxygenna-stacks/');
define('OXY_STACKS_URI', OXY_THEME_URI . 'vendor/oxygenna/oxygenna-stacks/');

if (!class_exists('OxygennaStacks')) {
    require_once(OXY_STACKS_DIR . 'inc/OxygennaStacks.php');

    OxygennaStacks::instance();
}
