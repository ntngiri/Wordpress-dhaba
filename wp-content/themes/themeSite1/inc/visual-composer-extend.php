<?php
/**
 * Extra custom classes for the VC composer
 *
 * @package Lambda
 * @subpackage Admin
 * @since 0.1
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version 1.17.0
 */

if (class_exists('WPBakeryShortCodesContainer') && class_exists('WPBakeryShortCode')) {
    // Features list and Feature
    class WPBakeryShortCode_Features_List extends WPBakeryShortCodesContainer {
    }
    class WPBakeryShortCode_Feature extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_Pricing_List extends WPBakeryShortCodesContainer {
    }
    class WPBakeryShortCode_Pricing_Item extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_Panel extends WPBakeryShortCodesContainer {
    }
    class WPBakeryShortCode_Simple_Icon_List extends WPBakeryShortCodesContainer {
    }
    class WPBakeryShortCode_Simple_Icon extends WPBakeryShortCode {
    }
}