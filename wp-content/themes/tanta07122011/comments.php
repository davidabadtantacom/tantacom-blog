<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">This post is password protected. Enter the password to view comments.<p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'alt';
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
	<h2 id="comments"><?php comments_number('Sin comentarios', '1 comentario', '% comentarios' );?> para &#8220;<?php the_title(); ?>&#8221;</h2>

	<ol class="commentlist">

	<?php foreach ($comments as $comment) : ?>

		<li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
			<cite><?php comment_author_link() ?></cite> <span>Says:</span>
			<?php if ($comment->comment_approved == '0') : ?>
			<em>Your comment is awaiting moderation.</em>
			<?php endif; ?>
			<br />

			<small class="commentmetadata"><?php comment_date('l, j \d\e F \d\e Y') ?> a las <?php comment_time() ?> <?php edit_comment_link('e','',''); ?></small>

			<div class="comment">
			<?php comment_text() ?>
			</div>

		</li>

	<?php /* Changes every other comment to a different class */
		if ('alt' == $oddcomment) $oddcomment = '';
		else $oddcomment = 'alt';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Los comentarios est&aacute;n cerrados.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<h2 id="respond">Deje un comentario</h2>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>Debe <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">identificarse</a> para enviar un comentario.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Identificado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Salir de esta cuenta">Salir &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" class="txt" />
<label for="author"><small>Nombre <?php if ($req) echo '(requerido)'; ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" class="txt" />
<label for="email"><small>Email (no ser&aacute; publicado) <?php if ($req) echo '(requerido)'; ?></small></label></p>

<p><input type="text" name="url" id="url" class="txt" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Sitio web</small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> Puede usar las siguientes etiquetas: <?php echo allowed_tags(); ?></small></p>-->

<p><textarea name="comment" id="comment" cols="100%" class="txt" rows="10" tabindex="4"></textarea></p>

<p class="submit"><input name="submit" type="image" src="<?php bloginfo('template_directory'); ?>/images/btn_enviar.gif" id="submit" tabindex="5" alt="Enviar comentario" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
