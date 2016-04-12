<?php
/**
 * The template for displaying Tag Archive pages.
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
				<h2 class="page-title"><?php
					printf( __( 'Tag Archives: %s', 'tanta' ), '<span>' . single_tag_title( '', false ) . '</span>' );
				?></h2>
                </hgroup>
			</header>

<?php
/* Run the loop for the tag archive to output the posts
 * If you want to overload this in a child theme then include a file
 * called loop-tag.php and that will be used instead.
 */
 get_template_part( 'loop', 'tag' );
?>

			<?php get_sidebar(); ?>
		</section>
<?php get_footer(); ?>
