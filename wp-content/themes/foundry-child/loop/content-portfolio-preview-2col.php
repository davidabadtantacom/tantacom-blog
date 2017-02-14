<div class="col-sm-6 masonry-item project fadeIn" data-filter="<?php echo ebor_the_terms('portfolio_category', ',', 'name'); ?>">
	<div class="image-tile hover-tile text-center">
	
		<?php the_post_thumbnail('grid', array('class' => 'background-image')); ?>
		
		<div class="hover-state">
			<a href="<?php the_permalink(); ?>">
				<?php the_title('<p class="uppercase mb0 nombreOferta">', '</h4><h6>'. ebor_the_terms('portfolio_category', ' / ', 'name') .'</p>'); ?>
			</a>
		</div>
		
	</div>
</div>