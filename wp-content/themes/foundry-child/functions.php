<?php 

function prefix_add_footer_styles_scripts() {
	wp_enqueue_script( 'tanta-js', '/wp-content/themes/foundry-child/js/tanta.js' );
};
add_action( 'get_footer', 'prefix_add_footer_styles_scripts' );