<?php global $mngl_options,$mngl_user, $mngl_friend, $mngl_options;; 
$display_profile = ( $user->privacy == 'public' or 
                           MnglUser::is_logged_in_and_an_admin() or 
                           MnglUser::is_logged_in_and_visible() );
$mngl_friends_controller = new MnglFriendsController();
?>

<?php if( $page <= 1 and !$public ) { ?>

<div class="prof-statuswrap col-md-12">

<?php } ?>
<div class="prof-inf" style="<?php $pagename = get_query_var('pagename'); 
if($pagename == "activity"){
  echo 'display:none';
} ?>">
<div class="col-md-12 fakeoverlay">

</div>
</div>
</div>
 <div class="col-md-3 friendgrid-outer">
  <div class="col-md-12 overlay"  style="<?php if($pagename == "activity"){
  echo 'display:none';
} ?>">
<div id="mngl-info-tab" class="mngl-profile-tab prof-inf-text col-md-12">
<div class="profile-edit-table inner-text-wrap">

<?php if(isset($mngl_options->field_visibilities['profile_info']['bio']) and (isset($user->bio) and !empty($user->bio))) { ?>
 
    <p class=""><?php echo make_clickable(stripslashes($user->bio)); ?></p>
 
  <?php } ?>
  <?php if(isset($mngl_options->field_visibilities['profile_info']['birthday']) and (isset($user->birthday) and !empty($user->birthday))) { ?>
 
    <p class=""><?php echo $user->birthday; ?></p>
  <?php } ?>
  <?php if(isset($mngl_options->field_visibilities['profile_info']['url']) and (isset($user->url) and !empty($user->url))) { ?>

    <p class=""><?php echo make_clickable($user->url); ?></p>
  <?php } ?>
  <?php if(isset($mngl_options->field_visibilities['profile_info']['location']) and (isset($user->location) and !empty($user->location))) { ?>

    <p class=""><?php echo $user->location;?></p>
  <?php } ?>
  <?php if(isset($mngl_options->field_visibilities['profile_info']['sex']) and (isset($user->sex) and !empty($user->sex))) { ?>

    <p class=""><?php echo $user->sex_display; ?></p>

  <?php } ?>
  <?php do_action('mngl-profile-info', $user->id); ?>
</div>
</div>
</div>
          <div class="friend-overlays">
          <div class="prof-friend-grid">
            <h4><?php ?>Peers</h4><?php 
            if($pagename == "activity"){
               echo $mngl_friends_controller->display_friends_grid($current_user->id);
            }else{
            echo $mngl_friends_controller->display_friends_grid($user->id); 
          }
          ?>
         </div>
       </div>
         </div>

<div id="mngl-board-tab" class="mngl-profile-tab col-md-9">
<?php

if( $page <= 1 and 
    MnglUser::is_logged_in_and_visible() and
    ( ($owner_id==$author_id) or
      $mngl_friend->is_friend($owner_id, $author_id) ) )
{
  ?>

  <table id="mngl-board-post-form" class="mngl-post-form">
  <tr>
    <td  class="status-area" colspan="2" id="mngl-board-post-form-cell">
      <textarea id="mngl-board-post-input" class="mngl-board-input mngl-growable form-control"></textarea>
    </td>
  </tr>
  <tr>
    <td width="100%" style="text-align: left;"><div id="mngl-post-actions"><?php do_action('mngl-post-actions', $user->id, $mngl_user->id); ?></div></td>
    <td width="0%">
      <input type="submit" class="submit-btn" id="mngl-board-post-button" onclick="javascript:mngl_post_to_board( '<?php echo MNGL_SCRIPT_URL; ?>', <?php echo $owner_id; ?>, <?php echo $author_id; ?>, document.getElementById('mngl-board-post-input').value, '<?php echo (($public)?'activity':'boards'); ?>');" name="Share" value="<?php _e('Share', 'mingle'); ?>"/>
    </td>
  </tr>
  </table>

  <?php
}
?>
  <?php
    require_once(MNGL_MODELS_PATH . "/MnglUser.php");
    foreach ($board_posts as $board_post)
    {
      $author = MnglUser::get_stored_profile_by_id($board_post->author_id);
      $owner  = MnglUser::get_stored_profile_by_id($board_post->owner_id);
      
      if($author and $owner)
        $this->display_board_post($board_post,$public);
    }
  ?>


  <?php if( count($board_posts) >= $page_size ) { ?>
    <div id="mngl-older-posts"><a href="javascript:mngl_show_older_posts( <?php echo ($page + 1) . ",'" . (($public)?'activity':'boards') . "','" . (($public)?$mngl_user->screenname:$owner->screenname) . "'"; ?> )"><?php _e('Show Older Posts', 'mingle'); ?></a></div>
  <?php } ?>
<?php
$pagename = get_query_var('pagename'); 
if($pagename != "activity"){
  echo "</div>";
}
?>