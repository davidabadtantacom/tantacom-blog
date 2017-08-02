<?php 
	$logo = get_option('custom_logo', EBOR_THEME_DIRECTORY . 'style/img/logo-dark.png'); 
	$logo_light = get_option('custom_logo_light', EBOR_THEME_DIRECTORY . 'style/img/logo-light.png');
	
	$fixed_at_html = false;
	if( $fixed_at = get_option('fixed_at_scroll_value') ){
		$fixed_at_html = 'data-fixed-at="'. $fixed_at .'"';
	}
?>

<div class="nav-container dark">
    <nav class="absolute" <?php echo wp_kses_post($fixed_at_html); ?>>
    
    	<?php get_template_part('inc/content-header','utility'); ?>
    	
        <div class="nav-bar">
        
            <div class="module left">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img class="logo logo-light" alt="<?php echo esc_attr(get_bloginfo('title')); ?>" src="<?php echo esc_url($logo); ?>" />
                    <img class="logo logo-dark" alt="<?php echo esc_attr(get_bloginfo('title')); ?>" src="<?php echo esc_url($logo); ?>" />
                </a>
            </div>
            
            <div class="module widget-handle mobile-toggle right visible-sm visible-xs">
                <i class="ti-menu"></i>
            </div>
            
            <div class="module-group right">
            
                <div class="module left">
                    <?php
                    	if ( has_nav_menu( 'primary' ) ){
                    	    wp_nav_menu( 
                    	    	array(
                    		        'theme_location'    => 'primary',
                    		        'depth'             => 3,
                    		        'container'         => false,
                    		        'container_class'   => false,
                    		        'menu_class'        => 'menu',
                    		        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    		        'walker'            => new ebor_framework_medium_rare_bootstrap_navwalker()
                    	        )
                    	    );  
                    	} else {
                    		echo '<ul class="menu"><li><a href="'. admin_url('nav-menus.php') .'">Set up a navigation menu now</a></li></ul>';
                    	}
                    ?>
                </div>
				
				<?php 
					if( 'yes' == get_option('foundry_header_social', 'no') ){
						get_template_part('inc/content-header', 'social');
					}
					
					if( 'yes' == get_option('foundry_header_button', 'no') ){
						get_template_part('inc/content-header', 'button');
					}
					
					if( 'yes' == get_option('foundry_header_search', 'yes') ){
						get_template_part('inc/content-header', 'search');
					}
					
					if( class_exists('Woocommerce') && 'yes' == get_option('foundry_header_cart', 'yes') ){
						get_template_part('inc/content-header', 'cart');
					}	
					
					if( function_exists('icl_get_languages') && 'yes' == get_option('foundry_header_wpml', 'yes') ){
						get_template_part('inc/content-header', 'wpml');
					}
				?>
                
            </div>

        </div>
        
    </nav>
</div>