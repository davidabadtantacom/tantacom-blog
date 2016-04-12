<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

		<aside id="primary" class="widget-area" role="complementary">
			<ul class="xoxo">

<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
	if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>

			<li id="search" class="widget-container widget_search clear clearfix">
				            <h3 class="widget-title">buscador_</h3>

				<?php get_search_form(); ?>
			</li>
			
			<li id="newsletter" class="widget-container">
            <h3 class="widget-title">newsletter_</h3>
				<form action="#" id="newsletterform" method="post">
					<div class="clear">
						<label for="inp_newsletter" class="screen-reader-text">Si quieres estar al día suscríbete a nuestro Newsletter:</label>
						<input type="text" id="inp_newsletter" name="inp_newsletter" value="" placeholder="tu email" />
						<input type="hidden" id="template_directory" value="<?php bloginfo( 'template_directory' ); ?>" />
						<span class="acepto clear"><input type="checkbox" id="acepto" name="acepto" /> Acepto las <a href="http://www.tantacom.com/aviso-legal" target="_blank">condiciones legales</a></span>
						<span class="ftr btn btn_lArrow">
                        	<span>
                            	<input type="submit" value="Suscribirme" id="newslettersubmit" />
                            </span>
                        </span>
					</div>
				</form>
			</li>

	<!--		<li id="mostread" class="widget-container">
				<h3 class="widget-title">Lo m&aacute;s le&iacute;do_</h3>
				<ul>
					<?php /*?><?php get_most_viewed('post', 5); ?><?php */?>
				</ul>
			</li>-->
			
			<li id="Categories" class="widget-container">
				<h3 class="widget-title">Categorías_</h3>
				<ul>
					<?php wp_list_categories('orderby=name&title_li=&show_count=1'); ?>
				</ul>
			</li>
			
			<li id="twitter_div" class="widget-container">
				<h3 class="widget-title">@tantacom_</h3>
				<ul id="twitter_update_list">

				<a class="twitter-timeline"  href="https://twitter.com/tantacom"  data-widget-id="330224926931947520">Tweets por @tantacom</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


</ul>
			</li>
			
			

			<li id="archives" class="widget-container">
				<h3 class="widget-title">Archivos_</h3>
				<ul>
					<?php wp_get_archives( 'type=monthly&limit=5' ); ?>
				</ul>
			</li>

			<li id="blogroll" class="widget-container">
				<h3 class="widget-title">Enlaces_</h3>
				<ul>
					<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
				</ul>
                
			</li>

		<?php endif; // end primary widget area ?>
			</ul>
		</aside><!-- #primary .widget-area -->