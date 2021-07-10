  <?php
  global $mngl_friends_controller, $mngl_user, $mngl_options;
  
  $permalink = get_permalink($mngl_options->directory_page_id);
  $param_char = ((preg_match("#\?#",$permalink))?'&':'?');

  if(!$user_search)
  {
    $fake_search_classes = (empty($search_query)?'':' mngl-hidden');
    $search_classes      = (empty($search_query)?' mngl-hidden':'');
  ?>
  <div class="directory-background">
      <div id="mngl-search-form" class="mngl-search-form">
        <input type="text" id="mngl-search-input" onkeyup="javascript:mngl_search_directory( this.value )" class="mngl-board-input mngl-search-input form-control" value="<?php echo $search_query; ?>" />
        <a href="<?php echo $permalink; ?>" class="mngl-search-reset-button<?php echo $search_classes; ?>"><img src="<?php echo MNGL_IMAGES_URL . "/remove.png"; ?>" alt="Reset" /></a>
      </div>
  <?php
  }
?>
<div id="mngl-profile-results">
<p><strong><?php printf( _n("%s User Was Found", "%s Users Were Found", $record_count, 'mingle'), number_format( (float)$record_count )); ?></strong></p>
<?php
  if($prev_page > 0)
  {
    ?>
      <div id="mngl_prev_page"><a href="<?php echo "{$permalink}{$param_char}mdp={$prev_page}{$search_params}"; ?>">&laquo; <?php _e('Previous Page', 'mingle'); ?></a></div>
    <?php
  }
  ?>
<table class="directory-table" style="width: 100%;">
<?php

  $avatar_thumb_size = 64;
  
  if(is_array($profiles))
  {
    foreach ($profiles as $key => $profile)
    { 
      $avatar_link = $profile->get_avatar($avatar_thumb_size);
      
      $full_name = $profile->first_name.' '.$profile->last_name;
    
      if(!empty($search_query))
      {
        $full_name = preg_replace( "#({$search_query})#i", "<span class=\"mngl-search-match\">$1</span>", $full_name );
      }
?>
  <tr>
    <td valign="top" style="width: <?php echo $avatar_thumb_size; ?>px; vertical-align: top;"><a href="<?php echo $profile->get_profile_url(); ?>"><?php echo $avatar_link; ?></a></td>
    <td valign="top" style="padding: 0px 0px 0px 10px; vertical-align: top;"><h3 style="margin: 0px;"><a href="<?php echo $profile->get_profile_url(); ?>"><?php echo "{$full_name}"; ?></a></h3><?php echo $mngl_friends_controller->display_add_friend_button($mngl_user->id, $profile->id); ?><?php do_action( 'mngl-profile-list-name-display', $profile->id ); ?></td>
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
    <div id="mngl_prev_page"><a href="<?php echo "{$permalink}{$param_char}mdp={$next_page}{$search_params}"; ?>"><?php _e('Next Page', 'mingle'); ?> &raquo;</a></div>
  <?php
}
?>
</div>
</div>