<?php get_header(); ?>

	<div id="main">
		<div id="content" class="detail">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="navigation">
			<div class="flt"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="frt"><?php next_post_link('%link &raquo;') ?></div>
		</div>

		<div class="post single" id="post-<?php the_ID(); ?>">
			<h1><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h1>

			<div class="entry">
				<?php the_content('<p class="serif">Leer el resto de la entrada &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>P&aacute;ginass:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

				<p class="postmetadata alt">
					<small>
						Esta entrada fue publicada
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
						el <?php the_time('l, j \d\e F \d\e Y') ?> a las <?php the_time() ?> por <?php the_author() ?>
						y est&aacute; clasificada bajo: <?php the_category(', ') ?>.
						Puede hacer un seguimiento de los comentarios de esta entrada gracias al feed <?php comments_rss_link('RSS 2.0'); ?>.

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							Puede <a href="#respond" class="respond">dejar un comentario</a>, o enviar un <a href="<?php trackback_url(true); ?>">trackback</a> desde su sitio.

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Los comentarios est&aacute;n cerrados, pero puede enviar un <a href="<?php trackback_url(true); ?> ">trackback</a> desde su sitio.

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							Puede dejar un comentario a continuaci&oacute;n. Los trackbacks est&aacute;n cerrados.

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							Tanto los comentarios como los trackbacks est&aacute;n cerrados.

						<?php } edit_post_link('Editar esta entrada.','',''); ?>

					</small>
				</p>

				<h2>Art&iacute;culos relacionados</h2>
				<ul>
					<?php related_posts(); ?>
				</ul>

			</div>
		</div>


	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p class="center">Disculpe, lo que busca no est&aacute; aqu&iacute;.</p>

<?php endif; ?>

	</div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

