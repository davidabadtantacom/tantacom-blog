<?php
/**
 * The Template for displaying custom post type casodeexito
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header();

?>
<section>
	<header>
		<div class="lang_social">
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
			<h1>Casos de éxito_</h1>
        </hgroup>
	</header>
	<section class="linked"><a class="btn btn_lArrow btnType02" href="/casos-de-exito">ver más casos de éxito_</a></section>
	<?php while ( have_posts() ) : the_post(); ?>
	<?php
		$logoCliente = get_field ('logo_cliente');
		$fotoEquipoTanta = get_field ('foto_equipo_tanta');
	?>
	<section class="clientes">
		<?php the_title (); ?>
		<section class="colAB">
			<div class="colA">
				<?php if( !empty($logoCliente) ): ?>
				<a href="<?php the_field ('pagina_web_cliente'); ?>" target="_blank"><img src="<?php echo $logoCliente['url']; ?>" alt="<?php echo $logoCliente['alt']; ?>" title="Ver más detalles de <?php echo get_the_title(); ?>" class="floatl" width="183" height="143" /></a>
				<?php endif; ?>
				<p class="link"><a href="<?php the_field ('pagina_web_cliente'); ?>"><?php the_field ('pagina_web_cliente'); ?></a></p>
			</div>
			<div class="colB">
				<?php if( !empty($fotoEquipoTanta) ): ?>
				<img src="<?php echo $fotoEquipoTanta['url']; ?>" alt="<?php echo $fotoEquipoTanta['alt']; ?>" title="<?php echo $fotoEquipoTanta['alt']; ?>" class="floatr" />
				<?php endif; ?>
				<p>"<?php the_field ('resumen_proyecto'); ?>"</p>
			</div>
		</section>
		<article>
			<?php the_content (); ?>
			<?php
				/* Run the loop to output the tags
				*/
				$tags = get_tags();
				$htmlTags = '';
				if (count ($tags) > 0){
					$htmlTags = '<p>';
					foreach ($tags as $tag) {
						$tag_link = get_tag_link( $tag->term_id );		
						$htmlTags .= '<a href="'.$tag_link.'" title="'.$tag->name.'">'.$tag->name.'</a>';
					}
					$htmlTags .= '</p>';
				}
				echo $htmlTags;
			?>
			<div>
				<?php echo getShareButton ('twitter', the_permalink(), the_title()); ?>
				<?php echo getShareButton ('linkedin', the_permalink()); ?>
				<?php echo getShareButton ('googleplus', the_permalink()); ?>
				<?php echo getShareButton ('facebook', the_permalink()); ?>
			</div>
		</article>
	</section>
	<?php endwhile; // end of the loop. ?>
	<section class="linked">
		<p>¿Tienes dudas? ¿Quieres saber más acerca de nuestras soluciones? <a class="btn btn_lArrow btnType02" href="/contacto">Solicítanos información_</a></p>
	</section>
</section>

<?php get_footer(); ?>