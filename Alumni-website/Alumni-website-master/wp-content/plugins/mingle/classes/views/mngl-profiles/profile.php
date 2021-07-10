<?php global $mngl_user, $mngl_friend, $mngl_options; ?>
<?php $display_profile = ( $user->privacy == 'public' or 
                           MnglUser::is_logged_in_and_an_admin() or 
                           MnglUser::is_logged_in_and_visible() ); ?>



<div class="outer-profwrap col-md-12">
<div class="propic">
            <?php echo $avatar; ?>
            </div>
            <div class="fullpro col-md-12">
            <h1>
            <?php if(isset($mngl_options->field_visibilities['profile_info']['name']) and isset($user->first_name) and !empty($user->first_name)) { ?>
  
    <span class=""><?php echo strtoupper($user->first_name); ?></span>
  <?php } ?>
<?php if(isset($mngl_options->field_visibilities['profile_info']['name']) and isset($user->last_name) and !empty($user->last_name)) { ?>

    <span class=""><?php echo strtoupper($user->last_name); ?></span>
<?php } ?></h1>
             <?php echo $mngl_friends_controller->display_add_friend_button($mngl_user->id, $user->id); ?>
            </div>
            
            <div class="col-md-12" style="padding: 0px;">
           <div class="col-md-12">
            <?php echo do_action('mngl-profile-display',$user->id); ?>
         </div>
        
         <div class="col-md-12 friends-wrap">
            <?php 
              if(!$display_profile)
                require( MNGL_VIEWS_PATH . '/mngl-boards/private.php' );
            ?>
          <?php if($display_profile) { ?>
           <?php echo $mngl_boards_controller->display($user->id); ?>
          <?php } ?>
        </div>
          </div>
          </div>