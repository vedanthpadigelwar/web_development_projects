<?php

include (get_template_directory().'/Includes/loader.php');
include (get_template_directory().'/Includes/notification_shortcode.php');

add_theme_support('menus');
add_theme_support('post-thumbnails');


add_action('wp_enqueue_scripts','amr_include');
add_action('after_setup_theme','amr_enableMenu');
add_action('widgets_init','amr_widgets');
add_filter('show_admin_bar', '__return_false');

function custom_excerpt_length( $length ) {
	return 50;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function my_forcelogin_bypass( $bypass ) {
  if ( is_page('login-2') || is_page('signup-2')) {
    $bypass = true;
  }
  return $bypass;
}
add_filter('v_forcelogin_bypass', 'my_forcelogin_bypass', 10, 1);

function my_login_page() {
    return site_url( '/login-2' );
}
add_filter( 'login_url', 'my_login_page' );
add_shortcode('notify', 'notification');
?>