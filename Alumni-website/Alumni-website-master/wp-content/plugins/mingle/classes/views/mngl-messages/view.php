<div class="message-wrap">
<p><a href="<?php echo $mngl_message->get_messages_url(); ?>" class="msg-btn"><?php _e("Back to Messages", 'mingle'); ?></a></p>
<h3><?php echo MnglAppHelper::format_text($thread->subject); ?></h3>

<table cellspacing="0" cellpadding="0" id="mngl_messages_table" class="msg-table">
<?php

if(is_array($messages) and !empty($messages))
{
  foreach($messages as $message)
    $this->display_single_message($message);
}
else
{
?>
  <tr><td><?php _e('No Messages Were Found','mingle'); ?></td></tr>
<?php
}
?>
</table>
<br/>
<table width="100%" class="mngl_form_table">
  <tr>
    <td valign="top"><textarea name="mngl_reply" id="mngl_reply" class="mngl-profile-edit-field form-control mngl-growable"></textarea></td>
  </tr>
</table>
<div style="text-align: right;">
	<br/>
  <input type="submit" class="mngl-share-button submit-btn" id="mngl_reply_button" onclick="javascript:mngl_reply_to_message( <?php echo $thread_id; ?>, document.getElementById('mngl_reply').value )" name="Reply" value="<?php _e('Reply', 'mingle'); ?>"/><img id="mngl_reply_loading" class="mngl-hidden" src="<?php echo MNGL_IMAGES_URL; ?>/ajax-loader.gif" alt="<?php _e('Loading...', 'mingle'); ?>" />
</div>
</div>