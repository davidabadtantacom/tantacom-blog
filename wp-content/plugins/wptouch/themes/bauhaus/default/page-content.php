<div class="<?php wptouch_post_classes(); ?>">
	<div class="post-page-head-area bauhaus">
		<h2 class="post-title heading-font"><?php the_title(); ?></h2>
		<?php if ( bauhaus_should_show_thumbnail() && wptouch_has_post_thumbnail() ) { ?>
			<div class="post-page-thumbnail">
				<?php the_post_thumbnail('large', array( 'class' => 'post-thumbnail wp-post-image' ) ); ?>
			</div>
		<?php } ?>
	</div>
	<div class="post-page-content">
		<?php if (!empty (get_field ('entradilla'))): ?>
		<div class="entradilla">
			<?php echo get_field ('entradilla'); ?>
		</div>
		<?php endif; ?>
		<?php wptouch_the_content(); ?>
	</div>
</div>