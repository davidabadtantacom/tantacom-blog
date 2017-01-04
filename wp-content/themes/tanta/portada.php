<?php
/**
 * Template Name: Portada
 *
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
<?php while ( have_posts() ) : the_post(); ?>
	<header>
		<hgroup>
			<h1><?php echo get_the_title (); ?>_</h1>
		</hgroup>
	</header>

	<?php if (!empty (get_field ('entradilla'))): ?>
	<div class="entradilla">
		<?php echo get_field ('entradilla'); ?>
	</div>
	<?php endif; ?>

	<section class="colAB" id="main">
		<article class="colA">
			<?php the_content (); ?>
		</article>
		<article class="colB">
			<?php get_sidebar(); ?>
		</article>
	</section>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>