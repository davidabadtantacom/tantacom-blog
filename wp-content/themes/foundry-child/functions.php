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
					      <i class="' . get_option("header_social_icon_$i") . '"><span class="hidden">'.get_option("header_social_icon_$i").' link</span></i>
				      </a>
				  </li>';
		}
	} 
	
	return $output;	
	
}