<?php
/**
 * Password protected form for password protected posts / pages
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
<div class="container">
    <div class="row element-top-40 element-bottom-20">
        <div class="col-md-8 col-md-push-2 text-default small-screen-default">
            <h3><?php _e('To view this protected post, enter the password below:', 'lambda-td'); ?></h3>
            <form action="<?php echo esc_url(site_url('wp-login.php?action=postpass', 'login_post')); ?>" method="post">
                <div class="form-group">
                    <label for="<?php echo $label; ?>"><?php _e('Password:', 'lambda-td'); ?></label>
                    <input class="form-control" name="post_password" id="<?php echo $label; ?>" type="password" size="20" maxlength="20" />
                </div>
                <input class="btn btn-primary" type="submit" name="Submit" value="<?php echo esc_attr_e('Submit', 'lambda-td'); ?>" />
            </form>
        </div>
    </div>
</div>