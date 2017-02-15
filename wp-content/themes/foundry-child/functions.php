<?php 

function prefix_add_footer_styles_scripts() {
	wp_enqueue_script( 'tanta-js', '/wp-content/themes/foundry-child/js/tanta.js' );
	wp_enqueue_style( 'tanta-css', '/wp-content/themes/foundry-child/css/tanta.css' );
};
add_action( 'get_footer', 'prefix_add_footer_styles_scripts' );


function check_wp_query ( $query ){
	if ( !is_admin() ){
		if ( $query->get('post_type') == 'client' ){
			$query->set('orderby', 'meta_value_num');
			$query->set('meta_key', 'orden');
			$query->set('order', 'ASC');
		}
	}
	return $query;
}
add_action( 'pre_get_posts', 'check_wp_query' );

function ebor_header_social_items(){
	
	$protocols = array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet', 'skype');
	$output = false;
	
	for( $i = 1; $i < 5; $i++ ){
		if( get_option("header_social_url_$i") ) {
			$output .= '<li>
				      <a href="' . esc_url(get_option("header_social_url_$i"), $protocols) . '" target="_blank">
					      <span class="iconized ' . get_option("header_social_icon_$i") . '"><span class="text">'.get_option("header_social_icon_$i").' link</span></span>
				      </a>
				  </li>';
		}
	} 
	
	return $output;	
	
}

// remove emoji
function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}
function disable_wp_emojicons() {
  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );
add_filter( 'emoji_svg_url', '__return_false' );