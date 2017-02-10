<?php 

function prefix_add_footer_styles_scripts() {
	wp_enqueue_script( 'tanta-js', '/wp-content/themes/foundry-child/js/tanta.js' );
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
