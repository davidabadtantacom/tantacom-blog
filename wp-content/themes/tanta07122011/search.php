<?php get_header(); ?>

	<div id="main">
		<div id="content" class="detail">
	<?php if (have_posts()) : ?>

		<h1 class="pagetitle">Resultados de b&uacute;squeda</h1>

		<div class="navigation categories">
			<div class="flt"><?php next_posts_link('&laquo; Entradas anteriores') ?></div>
			<div class="frt"><?php previous_posts_link('Entradas siguientes &raquo;') ?></div>
		</div>


		<?php while (have_posts()) : the_post(); ?>

			<div class="post">
				<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time('l, F jS, Y') ?></small>

				<p class="postmetadata">Clasificado bajo: <?php the_category(', ') ?> | <?php edit_post_link('Editar','',' | '); ?>  <?php comments_popup_link('Sin comentarios &#187;', '1 comentario &#187;', '% comentarios &#187;'); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="flt"><?php next_posts_link('&laquo; Entradas anteriores') ?></div>
			<div class="frt"><?php previous_posts_link('Entradas siguientes &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h1 class="center">No se han encontrado resultados</h1>

	<?php endif; ?>

	</div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>