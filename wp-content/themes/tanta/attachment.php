<?php
/**
 * The template for displaying attachments.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
		<section>

			<header>
				<hgroup>
					<h1>Blog de tanta</h1>
					<h2><?php echo strftime("%B del %Y");  ?></h2>
                </hgroup>
			</header>
			<?php
			/* Run the loop to output the attachment.
			 * If you want to overload this in a child theme then include a file
			 * called loop-attachment.php and that will be used instead.
			 */
			get_template_part( 'loop', 'attachment' );
			?>

			<?php get_sidebar(); ?>
		</section>
<?php get_footer(); ?>
