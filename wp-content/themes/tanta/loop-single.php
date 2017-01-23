
			<article class="blog"><?php
/**
 * The loop that displays a single post.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.		
 *
 * This can be overridden in child themes with loop-single.php.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.2
 */
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>


				<article class="post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<h2><?php the_title(); ?></h2>
					</header>

					<div class="entry-meta">
						<?php twentyten_posted_on(); ?>
					</div><!-- .entry-meta -->
                    
                    <div class="entry-utility">
						<?php if ( count( get_the_category() ) ) : ?>
                            <span class="cat-links">
                                <?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'tanta' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
                            </span>
                            <span class="meta-sep">|</span>
                        <?php endif; ?>
                        <?php
                            $tags_list = get_the_tag_list( '', ', ' );
                            if ( $tags_list ):
                        ?>
                            <span class="tag-links">
                                <?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'tanta' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
                            </span>
                            <span class="meta-sep">|</span>
                        <?php endif; ?>
                        <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'tanta' ), __( '1 Comment', 'tanta' ), __( '% Comments', 'tanta' ) ); ?></span>
                        <?php edit_post_link( __( 'Edit', 'tanta' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
                    </div><!-- .entry-utility -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'tanta' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->
					<ul class="shareButtons">
						<li><?php echo getShareButton ('twitter', get_the_permalink()); ?></li>
						<li><?php echo getShareButton ('linkedin', get_the_permalink()); ?></li>
						<li><?php echo getShareButton ('email', get_the_permalink(), get_the_title ()); ?></li>
					</ul>
                   
				</article><!-- #post-## -->
                
<!--                <p class="link" id="print"></p>
-->                
<!--                <div class="relatedPost">
                	<h3>Art&iacute;culos Relacionados_</h3>
					<ul>
						<?php /*?><?php related_posts(); ?><?php */?>
					</ul>
                </div>-->
				

				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>

			</article>
