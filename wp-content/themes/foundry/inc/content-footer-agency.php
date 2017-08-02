<?php $logo_light = ( get_option('alt_footer_logo', false) ) ? get_option('alt_footer_logo', false) : get_option('custom_logo_light', EBOR_THEME_DIRECTORY . 'style/img/logo-light.png'); ?>

<footer class="footer-2 bg-dark">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 text-center">
			
				<a href="<?php echo esc_url(home_url('/')); ?>">
					<img alt="<?php echo esc_attr(get_bloginfo('title')); ?>" class="image-xs mb32 fade-on-hover" src="<?php echo esc_url($logo_light); ?>" />
				</a>
				
				<h5 class="fade-1-4">
					<?php echo wp_kses_post(htmlspecialchars_decode(get_option('foundry_footer_copyright', '<a href="http://www.tommusrhodus.com">Foundry Premium WordPress Theme by TommusRhodus</a>')), ebor_allowed_tags()); ?>
				</h5>
				
				<ul class="list-inline social-list mb0">
					<?php get_template_part('inc/content','footer-social-icons'); ?>
				</ul>
				
			</div>
		</div>
	</div>
</footer>