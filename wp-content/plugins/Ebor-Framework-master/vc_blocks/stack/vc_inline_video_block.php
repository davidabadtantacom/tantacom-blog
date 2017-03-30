<?php 

/**
 * The Shortcode
 */
function ebor_video_inline_shortcode( $atts ) {
	extract( 
		shortcode_atts( 
			array(
				'layout' => 'local',
				'image' => '',
				'video' => '',
				'mpfour' => '',
				'ogv' => '',
				'webm' => '',
				'embed' => '',
				'custom_css_class' => ''
			), $atts 
		) 
	);
	
	if( 'local' == $layout ){
		
		$output = '
			<div class="'. esc_attr($custom_css_class) .' video-cover border--round box-shadow">
				<div class="background-image-holder">
					'. wp_get_attachment_image( $image, 'full' ) .'
				</div>
				<div class="video-play-icon"></div>
				<video controls>
					<source src="'. esc_url($webm) .'" type="video/webm">
					<source src="'. esc_url($mpfour) .'" type="video/mp4">
					<source src="'. esc_url($ogv) .'" type="video/ogg">	
				</video>
			</div>
		';
		
	} elseif( 'embed' == $layout ){
		
		$output = '
			<div class="'. esc_attr($custom_css_class) .' video-cover border--round box-shadow">
				<div class="background-image-holder">
					'. wp_get_attachment_image( $image, 'large' ) .'
				</div>
				<div class="video-play-icon"></div>
				'. wp_oembed_get($embed, array('height' => '300', 'autoplay' => 'true')) .'
			</div><!--end video cover-->
		';
		
	}
	
	return $output;
}
add_shortcode( 'stack_video_inline', 'ebor_video_inline_shortcode' );

/**
 * The VC Functions
 */
function ebor_video_inline_shortcode_vc() {
	vc_map( 
		array(
			"icon" => 'stack-vc-block',
			"name" => esc_html__("Video Inline Embeds", 'stackwordpresstheme'),
			"base" => "stack_video_inline",
			"category" => esc_html__('stack WP Theme', 'stackwordpresstheme'),
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Video Display Type", 'stackwordpresstheme'),
					"param_name" => "layout",
					"value" => array(
						'Local Video' => 'local',
						'Embedded Video (Youtube etc.)' => 'embed'
					)
				),
				array(
					"type" => "attach_image",
					"heading" => esc_html__("Video Placeholder Image", 'stackwordpresstheme'),
					"param_name" => "image"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Self Hosted Video .webm extension", 'stackwordpresstheme'),
					"param_name" => "webm",
					"description" => esc_html__('Please fill all extensions', 'stackwordpresstheme')
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Self Hosted Video .mp4 extension", 'stackwordpresstheme'),
					"param_name" => "mpfour",
					"description" => esc_html__('Please fill all extensions', 'stackwordpresstheme')
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Self Hosted Video .ogv extension", 'stackwordpresstheme'),
					"param_name" => "ogv",
					"description" => esc_html__('Please fill all extensions', 'stackwordpresstheme')
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Video Embed", 'stackwordpresstheme'),
					"param_name" => "embed",
					'description' => 'Enter link to video <a href="http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F">(Note: read more about available formats at WordPress codex page).</a>'
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra CSS Class Name", 'stackwordpresstheme'),
					"param_name" => "custom_css_class",
					"description" => '<code>DEVELOPERS ONLY</code> - Style particular content element differently - add a class name and refer to it in custom CSS.',
				),
			)
		) 
	);
}
add_action( 'vc_before_init', 'ebor_video_inline_shortcode_vc' );