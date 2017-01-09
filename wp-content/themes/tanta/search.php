<?php
/**
 * The template for displaying Search Results pages.
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

<?php if ( have_posts() ) : ?>
				<h2 class="page-title"><?php printf( __( 'Search Results for: %s', 'tanta' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
                </hgroup>
			</header>
				<?php
				/* Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called loop-search.php and that will be used instead.
				 */
				 get_template_part( 'loop', 'search' );
				?>
                
<?php else : ?>
				<article id="post-0" class="post no-results not-found blog">
					<h2 class="entry-title"><?php _e( 'Nothing Found', 'tanta' ); ?></h2>
					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'tanta' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->
<?php endif; ?>

			<?php get_sidebar('blog'); ?>
		</section>
<?php get_footer(); ?>
