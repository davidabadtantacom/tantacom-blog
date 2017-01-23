<?php
/**
 * Template Name: Únete
 *
 * The template for displaying all ofertadetrabajo
 *
 * This is the template that displays all ofertadetrabajo
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
	<section id="main">
		<header>
			<h1><?php echo get_the_title (); ?>_</h1>
		</header>

		<?php if (!empty (get_field ('entradilla'))): ?>
		<div class="entradilla">
			<?php echo get_field ('entradilla'); ?>
		</div>
		<?php endif; ?>

		<?php the_content (); ?>

		<?php $loop = new WP_Query( array( 'post_type' => 'ofertadetrabajo', 'order_by' => 'date', 'order' => 'DESC' ) ); ?>
		<?php if ( $loop->have_posts() ) : ?>
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<div class="perfilBuscado">
						<h3>Buscamos <?php echo get_the_title () ?>.</h3>
						<div class="content">
							<?php the_content (); ?>
						</div>
						<p>Escríbenos a <a href="mailto:talento@tantacom.com" target="_blank">talento@tantacom.com</a> y envíanos tu CV. Valoramos a todos los candidatos.</p>
						<ul class="shareButtons">
							<li><?php echo getShareButton ('twitter', get_the_permalink()); ?></li>
							<li><?php echo getShareButton ('linkedin', get_the_permalink()); ?></li>
							<li><?php echo getShareButton ('email', get_the_permalink(), get_the_title ()); ?></li>
						</ul>
					</div>
		<?php endwhile; ?>
		<?php endif; ?>

<?php endwhile; // end of the loop. ?>
	</section>
<?php get_footer(); ?>
