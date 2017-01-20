
<?php
/**
 * The loop that displays a single ofertadetrabajo.
 *
 * The loop displays the posts and the ofertadetrabajo content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.		
 *
 * This can be overridden in child themes with loop-ofertadetrabajo.php.
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
                  
					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'tanta' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->
					<ul class="shareButtons">
						<li><?php echo getShareButton ('twitter'); ?></li>
						<li><?php echo getShareButton ('linkedin', get_the_permalink()); ?></li>
						<li><?php echo getShareButton ('email', get_the_permalink(), get_the_title ()); ?></li>
					</ul>
                   
				</article><!-- #post-## -->

<?php endwhile; // end of the loop. ?>