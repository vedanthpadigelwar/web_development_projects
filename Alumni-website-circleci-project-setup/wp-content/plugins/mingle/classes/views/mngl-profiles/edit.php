<?php global $mngl_options; ?>
<div class="profile-edit-form formContain edit-addon">
<form action="" enctype="multipart/form-data" method="post">
  <input type="hidden" name="action" id="action" value="process_form" />
  <input type="hidden" name="<?php echo $mngl_user->id_str; ?>" id="<?php echo $mngl_user->id_str; ?>" value="<?php echo $mngl_user->id; ?>" />
  <input type="hidden" name="<?php echo $mngl_user->screenname_str; ?>" id="<?php echo $mngl_user->screenname_str; ?>" value="<?php echo $mngl_user->screenname; ?>" />
  <h3><?php _e('Information', 'mingle'); ?>:</h3>
  <table width="100%" class="profile-edit-table">
    <?php if(isset($mngl_options->field_visibilities['profile_edit']['name'])) { ?>
    <tr>
      <td valign="top"><?php _e('First Name', 'mingle'); ?>:</td>
      <td valign="top"><input type="text" name="<?php echo $mngl_user->first_name_str; ?>" id="<?php echo $mngl_user->first_name_str; ?>" value="<?php echo $mngl_user->first_name; ?>" class="mngl-profile-edit-field form-control" /></td>
    </tr>
    <tr>
      <td valign="top"><?php _e('Last Name', 'mingle'); ?>:</td>
      <td valign="top"><input type="text" name="<?php echo $mngl_user->last_name_str; ?>" id="<?php echo $mngl_user->last_name_str; ?>" value="<?php echo $mngl_user->last_name; ?>" class="mngl-profile-edit-field form-control" /></td>
    </tr>
    <?php } ?>
    <tr>
      <td valign="top"><?php _e('Email', 'mingle'); ?>:</td>
      <td valign="top"><input type="text" name="<?php echo $mngl_user->email_str; ?>" id="<?php echo $mngl_user->email_str; ?>" value="<?php echo $mngl_user->email; ?>" class="mngl-profile-edit-field form-control" /></td>
    </tr>
    <?php if(isset($mngl_options->field_visibilities['profile_edit']['bio'])) { ?>
    <tr>
      <td valign="top"><?php _e('Bio', 'mingle'); ?>:</td>
      <td valign="top"><textarea name="<?php echo $mngl_user->bio_str; ?>" id="<?php echo $mngl_user->bio_str; ?>" class="mngl-profile-edit-field mngl-growable form-control"><?php echo stripslashes($mngl_user->bio); ?></textarea></td>
    </tr>
    <?php } ?>
    <?php if(isset($mngl_options->field_visibilities['profile_edit']['birthday'])) { ?>
    <tr>
      <td valign="top"><?php _e('Birthday', 'mingle'); ?>:</td>
      <td valign="top"><input type="text" name="<?php echo $mngl_user->birthday_str; ?>" id="<?php echo $mngl_user->birthday_str; ?>" value="<?php echo $mngl_user->birthday; ?>" class="mngl-datepicker mngl-profile-edit-field form-control" /></td>
    </tr>
    <?php } ?>
    <?php if(isset($mngl_options->field_visibilities['profile_edit']['url'])) { ?>
    <tr>
      <td valign="top"><?php _e('URL', 'mingle'); ?>:</td>
      <td valign="top"><input type="text" name="<?php echo $mngl_user->url_str; ?>" id="<?php echo $mngl_user->url_str; ?>" value="<?php echo $mngl_user->url; ?>" class="mngl-profile-edit-field form-control" /></td>
    </tr>
    <?php } ?>
    <?php if(isset($mngl_options->field_visibilities['profile_edit']['location'])) { ?>
    <tr>
      <td valign="top"><?php _e('Location', 'mingle'); ?>:</td>
      <td valign="top"><input type="text" name="<?php echo $mngl_user->location_str; ?>" id="<?php echo $mngl_user->location_str; ?>" value="<?php echo $mngl_user->location; ?>" class="mngl-profile-edit-field form-control" /></td>
    </tr>
    <?php } ?>
    <?php if(isset($mngl_options->field_visibilities['profile_edit']['sex'])) { ?>
    <tr>
      <td valign="top"><?php _e('Gender', 'mingle'); ?>:</td>
      <td valign="top"><?php echo MnglProfileHelper::sex_dropdown($mngl_user->sex_str, $mngl_user->sex); ?></td>
    </tr>
    <?php } ?>
    <?php if(isset($mngl_options->field_visibilities['profile_edit']['password'])) { ?>
    <tr>
      <td valign="top"><?php _e('Password', 'mingle'); ?>:</td>
      <td valign="top"><input type="password" name="<?php echo $mngl_user->password_str; ?>" id="<?php echo $mngl_user->password_str; ?>" class="mngl-profile-edit-field form-control" /></td>
    </tr>
    <tr>
      <td valign="top"><?php _e('Password Confirmation', 'mingle'); ?>:</td>
      <td valign="top"><input type="password" name="<?php echo $mngl_user->password_confirm_str; ?>" id="<?php echo $mngl_user->password_confirm_str; ?>" class="mngl-profile-edit-field form-control" /></td>
    </tr>
    <?php } ?>
    
    <?php do_action('mngl-edit-user-fields'); ?>
  </table>
  <div class="col-md-12">
  <div class="col-md-5 tinted">
      <h3 align="top"><?php _e('Avatar', 'mingle'); ?>:</h3>
      <div valign="top">
        <input type="file" name="<?php echo $mngl_user->avatar_str; ?>" id="<?php echo $mngl_user->avatar_str; ?>" class="mngl-profile-edit-field form-control" /><br/>
          <?php require(MNGL_VIEWS_PATH . "/mngl-profiles/edit_avatar.php"); ?>
      </div>
    </div>
    <div class="col-md-offset-1 col-md-6 tinted">
  <h3><?php _e('Privacy', 'mingle'); ?>:</h3>
  <div><?php echo MnglProfileHelper::privacy_dropdown($mngl_user->privacy_str, $mngl_user->privacy); ?></div>
  <h3><?php _e('Notification Settings', 'mingle'); ?>:</h3>
  <table width="100%" class="profile-edit-table">
    <?php
    foreach ($mngl_options->notification_types as $ntype => $settings)
    {
      ?>
      <tr>
        <td width="5%" valign="top"><input  type="checkbox" name="<?php echo "{$mngl_user->hide_notifications_str}[$ntype]"; ?>" id="<?php echo "{$mngl_user->hide_notifications_str}[$ntype]"; ?>"<?php MnglAppHelper::value_is_checked_with_array($mngl_user->hide_notifications_str, $ntype, (isset($mngl_user->hide_notifications[$ntype]))?$mngl_user->hide_notifications[$ntype]:false); ?> /></td>
        <td width="95%" valign="top"><?php printf(__('Don\'t Send Me "%s" Notifications','mingle'), $settings['name']); ?></td>
      </tr> 
      <?php
    }
    ?>
  </table>
  </div>
  </div>
  <br/>
  <input type="submit" class="submit-btn" name="Update" value="<?php _e('Update', 'mingle'); ?>" />
</form>
</div>