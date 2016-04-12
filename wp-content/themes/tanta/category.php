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
			<header><div class="lang_social">
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
					<h1>Blog de tanta</h1>
                    <h2 class="page-title"><?php
                        printf( __( 'Category Archives: %s', 'tanta' ), '<span>' . single_cat_title( '', false ) . '</span>' );
                    ?></h2>
                </hgroup>
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


			<?php get_sidebar(); ?>
		</section>
<?php get_footer(); ?>
