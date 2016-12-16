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
	<section id="main">
		<header>
			<hgroup>
				<h1>Casos de éxito_</h1>
    	    </hgroup>
		</header>
		<section class="linked"><a class="btn btn_lArrow btnType02" href="/casos-de-exito">ver más casos de éxito_</a></section>
		<?php while ( have_posts() ) : the_post(); ?>
		<?php
			$logoCliente = get_field ('logo_cliente');
			$fotoEquipoTanta = get_field ('foto_equipo_tanta');
			$descripcionCliente = get_field ('descripcion_cliente');
		?>
		<section class="clientes">
			<h3><?php echo get_the_title (); ?></h3>
			<section class="colAB">
				<div class="colA">
					<?php if( !empty($logoCliente) ): ?>
					<a href="<?php the_field ('pagina_web_cliente'); ?>" target="_blank"><img src="<?php echo $logoCliente['url']; ?>" alt="<?php echo $logoCliente['alt']; ?>" title="Ver más detalles de <?php echo get_the_title(); ?>" class="floatl" width="183" height="143" /></a>
					<?php endif; ?>
					<?php if( !empty($descripcionCliente) ): ?>
					<p><?php echo $descripcionCliente; ?></p>
					<?php endif; ?>
					<p class="link"><a href="<?php the_field ('pagina_web_cliente'); ?>" targeT="_blank"><?php the_field ('pagina_web_cliente'); ?></a></p>
				</div>
				<div class="colB">
					<?php if( !empty($fotoEquipoTanta) ): ?>
					<img src="<?php echo $fotoEquipoTanta['url']; ?>" alt="<?php echo $fotoEquipoTanta['alt']; ?>" title="<?php echo $fotoEquipoTanta['alt']; ?>" class="floatr" />
					<?php endif; ?>
					<p>"<?php the_field ('resumen_proyecto'); ?>"</p>
				</div>
			</section>
			<article>
				<div class="detalleC">
					<?php the_content (); ?>
				</div>
				<?php
					/* Run the loop to output the tags
					*/
					$tags = get_the_terms ( get_the_ID (), 'post_tag');
					$htmlTags = '';
					if (count ($tags) > 0){
						$htmlTags = array ();
						foreach ($tags as $tag) {
							$tag_link = get_tag_link( $tag->term_id );		
							$htmlTags []= '<a href="'.$tag_link.'" title="'.$tag->name.'">'.$tag->name.'</a>';
						}
						$htmlTags = '<p>'.implode (', ', $htmlTags).'</p>';
					}
					echo $htmlTags;
				?>
				<ul class="shareButtons">
					<li><?php echo getShareButton ('twitter'); ?></li>
					<li><?php echo getShareButton ('linkedin', get_the_permalink()); ?></li>
					<li><?php echo getShareButton ('facebook', get_the_permalink()); ?></li>
				</ul>
			</article>
		</section>
		<?php endwhile; // end of the loop. ?>
		<section class="linked">
			<p>¿Tienes dudas? ¿Quieres saber más acerca de nuestras soluciones? <a class="btn btn_lArrow btnType02" href="/contacto">Solicítanos información_</a></p>
		</section>
	</section>

<?php get_footer(); ?>