<?php
/**
 * Template Name: One column, no sidebar
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
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
					<h1>Blog de tanta</h1>
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

		</section>
<?php get_footer(); ?>