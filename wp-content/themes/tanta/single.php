<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
		<section>
        
			<header>
				<div class="lang_social">
					<!--a href="#" class="lang">English</a-->
					<ul class="social">
						<li><span>Síguenos:</span></li>
						<li class="twitter">
							<a href="http://www.twitter.com/tantacom">twitter</a>
						</li>
						<li class="linkedin">
							<a href="http://www.linkedin.com/company/tanta-comunicacion">linkedin</a>
						</li>
						<li class="rss">
							<a href="<?php bloginfo('rss2_url'); ?>">rss</a>
						</li>
					</ul>
				</div>
				<hgroup>
					<h1><a href="<?php echo home_url(); ?>">el blog de tanta_</a></h1>

                </hgroup>
			</header>
			<?php
			/* Run the loop to output the posts.
			 * If you want to overload this in a child theme then include a file
			 * called loop-index.php and that will be used instead.
			 */
			 get_template_part( 'loop', 'single' );
			?>

			<?php get_sidebar(); ?>
		</section>
<?php get_footer(); ?>
