<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
		<section>

			<header>
				<div class="lang_social">
					<a href="#" class="lang">English</a>
					<ul class="social">
						<li><span>Síguenos:</span></li>
						<li class="twitter">
							<a href="#">twitter</a>
						</li>
						<li class="linkedin">
							<a href="#">linkedin</a>
						</li>
						<li class="rss">
							<a href="#">rss</a>
						</li>
					</ul>
				</div>
				<hgroup>
					<h1>el blog de tanta_</h1>
					<h2><?php echo strftime("%B del %Y");  ?></h2>
                </hgroup>
			</header>
			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 */
			get_template_part( 'loop', 'page' );
			?>

			<?php get_sidebar(); ?>
		</section>
<?php get_footer(); ?>
