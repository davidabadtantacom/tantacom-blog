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
				<hgroup>
					<h1>el blog de tanta_</h1>
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

			<?php get_sidebar('blog'); ?>
		</section>
<?php get_footer(); ?>
