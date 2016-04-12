<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
					<h1>el blog de tanta_</h1>

                </hgroup>
			</header>
			<?php
			/* Run the loop to output the posts.
			 * If you want to overload this in a child theme then include a file
			 * called loop-index.php and that will be used instead.
			 */
			 get_template_part( 'loop', 'index' );
			?>

			<?php get_sidebar(); ?>
		</section>
			
			
<?php get_footer(); ?>
