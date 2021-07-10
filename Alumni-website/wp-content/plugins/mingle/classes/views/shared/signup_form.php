
<form name="registerform" id="registerform" class="col-md-offset-1 col-md-10" action="" method="post">
<input type="hidden" id="mngl-process-form" name="mngl-process-form" value="Y" />
<p>
	<input type="text" name="user_login" id="user_login" placeholder="<?php _e('Username', 'mingle'); ?>" class="input mngl_signup_input form-control col-md-12" value="<?php echo $user_login; ?>" size="20" tabindex="200" />
</p>
<p>
	<input  type="text" name="user_email" id="user_email" placeholder="<?php _e('E-mail', 'mingle'); ?>" class="input mngl_signup_input form-control col-md-12" value="<?php echo $user_email; ?>" size="25" tabindex="300" />
</p>
<?php if(isset($mngl_options->field_visibilities['signup_page']['name'])) { ?>
  <p>
	  <input type="text" name="user_first_name" id="user_first_name" placeholder="<?php _e('First Name', 'mingle'); ?>" class="input form-control mngl_signup_input col-md-12" value="<?php echo $user_first_name; ?>" size="20" tabindex="400" />
  </p>  
  <p>
    <input type="text" name="user_last_name" id="user_last_name" placeholder="<?php _e('Last Name', 'mingle'); ?>" class="input form-control mngl_signup_input col-md-12" value="<?php echo $user_last_name; ?>" size="20" tabindex="500" />
  </p>
<?php } ?>
<?php if(isset($mngl_options->field_visibilities['signup_page']['url'])) { ?>
  <p>
    <input type="text" name="mngl_user_url" id="mngl_user_url" placeholder="<?php _e('Website', 'mingle'); ?>" value="<?php echo $mngl_user_url; ?>" class="input mngl_signup_input form-control col-md-12" size="20" tabindex="600"/>
  </p>
<?php } ?>
<?php if(isset($mngl_options->field_visibilities['signup_page']['location'])) { ?>
  <p>
    <input type="text" name="mngl_user_location" placeholder="<?php _e('Location', 'mingle'); ?>" id="mngl_user_location" value="<?php echo $mngl_user_location; ?>" class="input mngl_signup_input form-control col-md-12" size="20" tabindex="700"/>
  </p>
<?php } ?>
<?php if(isset($mngl_options->field_visibilities['signup_page']['bio'])) { ?>
  <p>
    <label>:<br /></label>
    <textarea name="mngl_user_bio" id="mngl_user_bio" placeholder="<?php _e('Bio', 'mingle'); ?>" class="input mngl-growable mngl_signup_input form-control col-md-12" tabindex="800"><?php echo wptexturize($mngl_user_bio); ?></textarea>
  </p>
<?php } ?>  
<?php if(isset($mngl_options->field_visibilities['signup_page']['sex'])) { ?>
  <p>
   <?php echo MnglProfileHelper::sex_dropdown('mngl_user_sex', $mngl_user_sex, '', 900); ?>
  </p>
<?php } ?>

<?php if(isset($mngl_options->field_visibilities['signup_page']['password'])) { ?>
  <p>
    <input type="password" name="mngl_user_password" placeholder="<?php _e('Password', 'mingle'); ?>" id="mngl_user_password" class="input mngl_signup_input form-control col-md-12" tabindex="1000"/>
  </p>
  <p>
    <input type="password" name="mngl_user_password_confirm" placeholder="<?php _e('Password Confirmation', 'mingle'); ?>" id="mngl_user_password_confirm" class="input mngl_signup_input form-control col-md-12" tabindex="1100"/>
  </p>
<?php } else { ?>
	<p id="reg_passmail"><?php _e('A password will be e-mailed to you.', 'mingle'); ?></p>
<?php } ?>
<?php if($mngl_options->signup_captcha) { ?>
<?php
   $captcha_code = MnglUtils::str_encrypt(MnglUtils::generate_random_code(6));
?>
<p>
<label><?php _e('Enter Captcha Text', 'mingle'); ?>*:<br />
<img src="<?php echo MNGL_SCRIPT_URL; ?>&controller=captcha&action=display&width=120&height=40&code=<?php echo $captcha_code; ?>" /><br/>
<input id="security_code" name="security_code" style="width:120px" type="text" tabindex="1200" />
<input type="hidden" name="security_check" value="<?php echo $captcha_code; ?>">
</p>
<?php } ?>
  <?php do_action('mngl-user-signup-fields'); ?>

	<br class="clear" />
	<div class="col-md-12">
	<p class="submit"><input type="submit" name="wp-submit" id="wp-submit" class="btn btn-default logbtn col-md-offset-4 col-md-4" value="<?php _e('Sign Up', 'mingle'); ?>" tabindex="60" /></p>
	</div>
</form>
