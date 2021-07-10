<?php
  if(!$user_search)
  {
?>
<div class="directory-wrap">
<div class="mngl-friend-list-header col-md-12">
  <div class="mngl-profile-image-wrap mngl-friend-list-profile-image-wrap col-md-8">
    <h3><?php printf(__("%s's Friends", 'mingle'), $user->first_name); ?></h3>
  </div>
  <div class="avatar-direc col-md-offset-2 col-md-2">
  <span class="mngl-alignleft"><?php echo $user_avatar; ?></span>
  </div>
</div>
  <input type="text" id="mngl-search-input" onkeyup="javascript:mngl_search_friends( this.value, '<?php echo $page_params; ?>' )" class="mngl-search-input mngl-board-input form-control"  placeholder="Search Friends" />

  <?php
  }
?>
<div id="mngl-friends-directory" class="friends-list">
<p><strong><?php printf( _n("%s Friend Was Found", "%s Friends Were Found", $record_count, 'mingle'), number_format( (float)$record_count )); ?></strong></p>
  <?php
  if($prev_page > 0)
  {
    ?>
      <div id="mngl_prev_page"><a href="<?php echo "{$friends_page_url}{$param_char}mdp={$prev_page}{$page_params}"; ?>">&laquo; <?php _e('Previous Page', 'mingle'); ?></a></div>
    <?php
  }
  ?>
<table class="directory-table" style="width: 100%;">
<?php
if(is_array($friends))
{
  $thumb_size = 64;
  foreach ($friends as $key => $friend)
  {
    $avatar_link = $friend->get_avatar($thumb_size);
    
    $full_name = $friend->screenname;

    if(!empty($search_query))
    {
      // highlight search term if present
      $full_name = preg_replace( "#({$search_query})#i", "<span class=\"mngl-search-match\">$1</span>", $full_name );
    }
?>
  <tr id="mngl-friend-<?php echo $friend->id; ?>">
    <td valign="top" style="width: <?php echo $thumb_size; ?>px; vertical-align: top;"><a href="<?php echo $friend->get_profile_url(); ?>"><?php echo $avatar_link; ?></a></td>
    <td valign="top" style="padding: 0px 0px 0px 10px; vertical-align: top;"><h3 style="margin: 0px;"><a href="<?php echo $friend->get_profile_url(); ?>"><?php echo "{$friend->first_name} {$friend->last_name}"; ?></a></h3><?php do_action( 'mngl-profile-list-name-display', $friend->id ); ?>
    <?php
    if($mngl_user->id == $user->id and MnglFriend::can_delete_friend($user->id, $friend->id))
    {
    ?>
      <a class="delete-btn" href="javascript:mngl_delete_friend('<?php echo MNGL_SCRIPT_URL; ?>',<?php echo $user->id; ?>,<?php echo $friend->id; ?> )"><?php _e('Delete', 'mingle'); ?></a>
      
    <?php
    do_action('mngl-friend-row', $friend, $user);
    }
    ?></td>
  </tr>
<?php
  }
}
?>  
</table>
<?php
if($next_page > 0)
{
  ?>
    <div id="mngl_prev_page"><a href="<?php echo "{$friends_page_url}{$param_char}mdp={$next_page}{$page_params}"; ?>"><?php _e('Next Page', 'mingle'); ?> &raquo;</a></div>
  <?php
}
do_action('mngl-friend-list-page');
?>
</div>
</div>