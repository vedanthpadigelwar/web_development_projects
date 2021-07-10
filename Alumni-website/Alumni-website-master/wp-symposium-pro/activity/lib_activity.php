<?php
while(!is_file('wp-config.php')){
	if(is_dir('../')) chdir('../');
	else die('Could not find WordPress config file.');
}
include_once( 'wp-config.php' );

$action = isset($_POST['action']) ? $_POST['action'] : false;

if ($action) {

	global $current_user;

	if ( is_user_logged_in() ) {

		/* ADD POST */
		if ($action == 'wps_activity_post_add') {

			$the_post = array(
			  'post_title'     => strip_tags(trim($_POST['wps_activity_post'])),
			  'post_status'    => 'publish',
			  'post_type'      => 'wps_activity',
			  'post_author'    => $_POST['wps_activity_post_author'],
			  'ping_status'    => 'closed',
			  'comment_status' => 'open',
			);  
			$new_id = wp_insert_post( $the_post );

			if ($new_id):

				update_post_meta( $new_id, 'wps_target', $_POST['wps_activity_post_target'] );
            
				// Any further actions?
				do_action( 'wps_activity_post_add_hook', $_POST, $_FILES, $new_id );
            
                $user_id = wps_get_user_id();
                $this_user = $current_user->ID;

                // Get shortcode parameters
                $values = wps_get_shortcode_options('wps_activity');   
                $atts = array(); // just use shortcode defaults
                extract( shortcode_atts( array(
                    'avatar_size' => wps_get_shortcode_value($values, 'wps_activity-avatar_size', 64),                    
                    'link' => wps_get_shortcode_value($values, 'wps_activity-link', true),
                    'date_format' => wps_get_shortcode_value($values, 'wps_activity-date_format', __('%s ago', WPS2_TEXT_DOMAIN)),                    
                    'more' =>  wps_get_shortcode_value($values, 'wps_activity-more', 50),
                    'more_label' =>  wps_get_shortcode_value($values, 'wps_activity-more_label', __('more', WPS2_TEXT_DOMAIN)),    
                ), $atts, 'wps_activity' ) );

                $item_html = '<div class="wps_activity_item" id="wps_activity_'.$new_id.'" style="margin-bottom: 20px; position:relative;padding-left: '.($avatar_size+10).'px">';            
                    $item_html .= '<div id="wps_activity_'.$new_id.'_content" class="wps_activity_content">';            

                        // Avatar            
                        $item_html .= '<div class="wps_activity_item_avatar" style="float: left; margin-left: -'.($avatar_size+10).'px">';
                            if (strpos(WPS_CORE_PLUGINS, 'core-avatar') !== false):
                                $item_html .= user_avatar_get_avatar($_POST['wps_activity_post_author'], $avatar_size, true, 'thumb');
                            else:
                                $item_html .= get_avatar($_POST['wps_activity_post_author'], $avatar_size);
                            endif;
                        $item_html .= '</div>';              

                        // Meta
                        $item_html .= '<div class="wps_activity_item_meta">';
                            $item_html .= wps_display_name(array('user_id'=>$_POST['wps_activity_post_author'], 'link'=>$link));
                            // Date
                            $item_html .= '<br /><div class="wps_ago">'.sprintf($date_format, human_time_diff(current_time('timestamp', 0), current_time('timestamp', 0)), WPS2_TEXT_DOMAIN).'</div>';
                        $item_html .= '</div>';             

                        // Post
                        if ($the_post):

                            $post_words = $the_post['post_title'];

                            $post_words = str_replace('[a]', '<a', $post_words);
                            $post_words = str_replace('[a2]', '>', $post_words);
                            $post_words = str_replace('[/a]', '</a>', $post_words);

                            if (strpos($post_words, '[q]') !== false && strpos($post_words, '[/q]') === false) $post_words .= '[/q]';
                            $p = str_replace(': ', '<br />', $post_words);

                            $p = str_replace('<p>', '', $p);
                            $p = str_replace('</p>', '', $p);
                            $p = '<div id="activity_item_'.$new_id.'">'.$p.'</div>';

                            // Look for quotes and paragraphs
                            $p = str_replace('[q]', '<div class="wps_quoted_content">', $p);
                            $p = str_replace('[/q]', '</div>', $p);
                            $p = str_replace('[p]', '<div class="wps_p_content">', $p);
                            $p = str_replace('[/p]', '</div>', $p);

                            // Format
                            $p = wps_formatted_content($p, true);

                            // Check for any items (attachments)
                            if ($i=strpos($p, '[items]')):
                                $attachments_list = substr($p, $i+7, strlen($p)-($i+7));
                                if (strpos($attachments_list, '[')) 
                                    $attachments_list = substr($attachments_list, 0, strpos($attachments_list, '['));
                                $attachments_list = substr(strip_tags($attachments_list), 0, -1);

                                $attachments = explode(',', strip_tags($attachments_list));
                                $attachment_html = '<div class="wps_activity_item_attachments">';
                                foreach ($attachments as $attachment):
                                    $desc = esc_html(get_post_meta($attachment, '_wps_desc', true));
                                    $source = esc_html(get_post_meta($attachment, '_wps_source', true));
                                    $image_src = wp_get_attachment_image_src( $attachment, 'full' );
                                    $attachment_html .= '<div class="wps_activity_item_attachment wps_activity_item_attachment_item">';
                                    $attr = array( 'title' => get_post_meta($attachment, '_wps_desc', true), 'alt' => get_post_meta($attachment, '_wps_desc', true) );
                                    $img = wp_get_attachment_image($attachment, 'thumbnail', false, $attr );            
                                    $attachment_html .= $img;
                                    $attachment_html .= '<div data-desc="'.$desc.'" data-source="'.$source.'" data-width="'.$image_src[1].'" data-height="'.$image_src[2].'" class="wps_activity_item_attachment_full">'.$image_src[0].'</div>';
                                    $attachment_html .= '</div>'; 
                                endforeach;
                                $attachment_html .= '<div style="clear:both"></div></div>';
                                $p = str_replace('[items]'.$attachments_list, '', $p);
                                $p .= $attachment_html;
                            endif;

                            // Shortern if necessary and applicable
                            if (strpos($p, '[q]') === false && strpos($post_words, '[items]') === false):
                                $words = explode(' ', $p, $more + 1);
                                if (count($words)> $more):
                                    array_pop($words);
                                    array_push($words, '... [<span class="activity_item_more" rel="'.$new_id.'" title="'.$more_label.'">'.$more_label.'</span>]');
                                    $item_html .= '<div class="wps_activity_item_post" id="activity_item_snippet_'.$new_id.'">'.implode(' ', $words).'</div></div>';
                                    $item_html .= '<div style="display:none;" id="activity_item_full_'.$new_id.'">'.$p.'</div>';
                                else:
                                    $item_html .= '<div class="wps_activity_item_post" id="activity_item_'.$new_id.'">'.$p.'</div>';
                                endif;
                            else:
                                $item_html .= '<div class="wps_activity_item_post" id="activity_item_'.$new_id.'">'.$p.'</div>';
                            endif;            

                            // Final filter for handling anything else
                            // Passes $item_html, shortcodes options ($atts), current post ID ($item->ID), post title ($item->post_stitle), user page ($user_id), current users ID ($this_user)
                            $item_html = apply_filters( 'wps_activity_item_filter', $item_html, $atts, $new_id, $the_post['post_title'], $user_id, $this_user, 1 );          
            
                        else:

                            echo __('Unable to display activity post.', WPS2_TEXT_DOMAIN);
            
                        endif;

                    $item_html .= '</div>';
                $item_html .= '</div>';

                echo $item_html;
            
            else:
                
                echo __('Unable to retrieve activity post.', WPS2_TEXT_DOMAIN);
            
            endif;

		}

	}

}

?>
