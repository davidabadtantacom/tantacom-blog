<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
		<section>

			<article id="post-0" class="blog post error404 not-found">
					<h2 class="entry-title"><?php _e( 'Not Found', 'tanta' ); ?></h2>
				<div class="entry-content">
					<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'tanta' ); ?></p>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

			<?php get_sidebar('blog'); ?>
		</section>
	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>
<?php get_footer(); ?>