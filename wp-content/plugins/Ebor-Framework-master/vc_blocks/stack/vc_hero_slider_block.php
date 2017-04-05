<?php 

/**
 * The Shortcode
 */
function ebor_hero_slider_shortcode( $atts, $content = null ) {
	extract( 
		shortcode_atts( 
			array(
				'image' => '',
				'layout' => 'light-image-left',
				'opacity' => '',
				'custom_css_class' => ''
			), $atts 
		) 
	);
	
	$image = explode(',', $image);
	
	$output = '<section class="'. esc_attr($custom_css_class) .' cover height-70 imagebg text-center slider slider--ken-burns" data-arrows="true" data-paging="true"><ul class="slides">';
            
    foreach ($image as $id){
    	$output .= '
            <li class="imagebg" data-overlay="4">
                <div class="background-image-holder background--top">
                    '. wp_get_attachment_image( $id, 'full' ) .'
                </div>
                <div class="container pos-vertical-center">
                    <div class="row">
                        <div class="col-sm-12">'. do_shortcode(htmlspecialchars_decode($content)) .'</div>
                    </div>
                </div>
            </li>
        ';
    }

    $output .= '</ul></section>';

	return $output;
}
add_shortcode( 'stack_hero_slider', 'ebor_hero_slider_shortcode' );

/**
 * The VC Functions
 */
function ebor_hero_slider_shortcode_vc() {

	vc_map( 
		array(
			"icon" => 'stack-vc-block',
			"name" => esc_html__("Hero Header (Slider)", 'stackwordpresstheme'),
			"base" => "stack_hero_slider",
			"category" => esc_html__('stack WP Theme', 'stackwordpresstheme'),
			'as_parent'               => array('except' => 'stack_tabs_content'),
			'content_element'         => true,
			'show_settings_on_create' => true,
			"js_view" => 'VcColumnView',
			"params" => array(
				array(
					"type" => "attach_images",
					"heading" => esc_html__("Hero Slider Header Background Images", 'stackwordpresstheme'),
					"param_name" => "image"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra CSS Class Name", 'stackwordpresstheme'),
					"param_name" => "custom_css_class",
					"description" => '<code>DEVELOPERS ONLY</code> - Style particular content element differently - add a class name and refer to it in custom CSS.<br><br><div class="wpb_element_label">Need help with this block? Check out the <a target="_blank" href="https://www.youtube.com/watch?v=yoWmatY3jNU">Video Tutorial</a></div>',
				),
			)
		) 
	);
	
}
add_action( 'vc_before_init', 'ebor_hero_slider_shortcode_vc' );

// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer')){
    class WPBakeryShortCode_stack_hero_slider extends WPBakeryShortCodesContainer {}
}