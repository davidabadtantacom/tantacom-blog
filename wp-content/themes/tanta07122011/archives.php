<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

	<div id="main">
		<div id="content" class="detail">
		<h1>Blog</h1>
<?php include (TEMPLATEPATH . '/searchform.php'); ?>

<h2>Archivos por mes:</h2>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>

<h2>Archivos por categoría:</h2>
	<ul>
		 <?php wp_list_categories(); ?>
	</ul>

	</div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
