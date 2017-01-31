<?php 

function prefix_add_footer_styles() {
    wp_enqueue_style( 'tanta-css', '/wp-content/themes/foundry-child/css/tanta.css' );
};
add_action( 'get_footer', 'prefix_add_footer_styles' );