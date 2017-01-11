<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
		<section>
			<header>
				<h1>el blog de tanta_</h1>
                <h2 class="page-title"><?php
	                printf( __( 'Category Archives: %s', 'tanta' ), '<span>' . single_cat_title( '', false ) . '</span>' );
                ?></h2>
			</header>

				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
				?>


			<?php get_sidebar('blog'); ?>
		</section>
<?php get_footer(); ?>
