<?php
/**
 * Gives user choice after theme setup
 *
 * @package Lambda
 * @subpackage Admin
 *
 * @copyright (c) 2015 Oxygenna.com
 * @license **LICENSE**
 * @version 1.17.0
 * @author Oxygenna.com
 */
?>
<div id="choice-page">
    <h1><?php _e('Please choose an option', 'lambda-admin-td'); ?></h1>
    <table class="widefat install-choice">
        <tbody>
            <tr>
                <td>
                    <a href="<?php echo admin_url( 'customize.php' ); ?>">
                        <img src="<?php echo OXY_TF_URI . 'assets/images/installer/install-blank.png'; ?>" alt="Blank Site" width="350" height="250">
                    </a>
                    <h3>Start from a blank installation</h3>
                </td>
                <td>
                    <a href="<?php echo admin_url( 'admin.php?page=lambda-oneclick' ); ?>">
                        <img src="<?php echo OXY_TF_URI . 'assets/images/installer/install-demo.png'; ?>" alt="Blank Site" width="350" height="250">
                    </a>
                    <h3>Install a ready made site</h3>
                </td>
            </tr>
        </tbody>
    </table>
</div>