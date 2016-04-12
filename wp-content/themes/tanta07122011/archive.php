<?php get_header(); ?>

	<div id="main">
		<div id="content" class="detail">

		<?php if (have_posts()) : ?>

		 <?php $post = $posts[0]; // Hack. Definir $post para que the_date() funcione. ?>
<?php /* Si es un archivo de categoria */ if (is_category()) { ?>
		<h1 class="titleCategories">Archivo de la categor&iacute;a "<?php echo single_cat_title(); ?>"</h1>

 	  <?php /* Si es un archivo diario */ } elseif (is_day()) { ?>
		<h1 class="titleCategories">Archivo del <?php the_time('j \d\e F \d\e Y'); ?></h1>

	 <?php /* Si es un archivo mensual */ } elseif (is_month()) { ?>
		<h1 class="titleCategories">Archivo de <?php the_time('F \d\e Y'); ?></h1>

		<?php /* Si es un archivo anual */ } elseif (is_year()) { ?>
		<h1 class="titleCategories">Archivo de <?php the_time('Y'); ?></h1>

	  <?php /* Si es una busqueda */ } elseif (is_search()) { ?>
		<h1 class="titleCategories">Resultados de la b&uacute;squeda</h1>

	  <?php /* Si es un archivo de autor */ } elseif (is_author()) { ?>
		<h1 class="titleCategories">Archivo de autor</h1>

		<?php /* Si es un archivo paginado */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h1 class="titleCategories">Archivos del weblog</h1>

		<?php } ?>


		<div class="navigation categories">
			<div class="flt"><?php next_posts_link('&laquo; Entradas anteriores') ?></div>
			<div class="frt"><?php previous_posts_link('Entradas siguietnes &raquo;') ?></div>
		</div>

		<?php while (have_posts()) : the_post(); ?>
		<div class="post">
				<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time('l, F jS, Y') ?></small>

				<div class="entry">
					<?php the_content() ?>
				</div>

				<p class="postmetadata">Clasificado bajo: <?php the_category(', ') ?> | <?php edit_post_link('Editar','',' | '); ?>  <?php comments_popup_link('Sin comentarios &#187;', '1 comentario &#187;', '% comentarios &#187;'); ?></p>

			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="flt"><?php next_posts_link('&laquo; Entradas anteriores') ?></div>
			<div class="frt"><?php previous_posts_link('Entradas siguietnes &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h1 class="center">No encontrado</h1>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
