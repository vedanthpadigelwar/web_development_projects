<?php
/*
Plugin Name: Mingle Friend Requests Widget
Plugin URI: http://www.design.theschires.com
Description: A simple widget to display friend requests and last status update on sidebar
Author: Jay Schires
Version: 1.03
Author URI: http://design.theschires.com
*/ 
class MnglFrndWidget extends WP_Widget {
    /** constructor */
    function MnglFrndWidget() {
        parent::WP_Widget(false, $name = 'Mingle Friends');	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
         
<?	  global $mngl_options, $mngl_blogurl, $mngl_blogname, $mngl_friend,$mngl_app_helper, $mngl_user, $mngl_blogurl, $mngl_blogname, $mngl_friend, $user_email, $user_login;
      
	  
get_currentuserinfo();
echo  get_avatar( $user_email, 46);
echo "<p></p>";

echo "Welcome ";    
    $user = MnglUser::get_stored_profile_by_id($user_id);

echo $user_profile_link = "<a href=\"{$user_profile_url}\">{$user->screenname}</a>";

echo "<p><br />
</p>";

echo '<a href="/profile/">View My Profile</a>';

echo "<p><br />
</p>";
    if($user)
      require_once MNGL_VIEWS_PATH . "/mngl-profiles/profile_status.php"; 
	  
$request_count = $mngl_friend->get_friend_requests_count( $mngl_user->id );
              $request_count_str = (($request_count > 0)?" [{$request_count}]":'');
			  echo $request_count_str;

    if(MnglUser::is_logged_in_and_visible())
    {
      MnglUtils::get_currentuserinfo();
    
      $requests = $mngl_friend->get_friend_requests($current_user->ID);
    
      require_once MNGL_VIEWS_PATH . "/mngl-friends/requests.php"; 
    }
    else
      require_once MNGL_VIEWS_PATH . "/shared/unauthorized.php";
	
?>
              <?php echo $after_widget; ?>
        <?php
    }
	

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
        $title = esc_attr($instance['title']);
        ?>
       
        
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
        <?php 
    }

} // class MnglFrndWidget
// register MnglFrndWidget widget
add_action('widgets_init', create_function('', 'return register_widget("MnglFrndWidget");')); ?>