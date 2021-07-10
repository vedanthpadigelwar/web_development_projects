<?php 
function notification(){
	 global $current_user;
     $mngl_friend = new MnglFriend();
	 $requests = $mngl_friend->get_friend_requests($current_user->ID);
	 $pagename = get_query_var('pagename'); 
	 if(count($requests)>0){
       echo "<script>jQuery(document).ready(function(){
       	console.log('hi');
           notify();

       });</script>";
   }
}
?>