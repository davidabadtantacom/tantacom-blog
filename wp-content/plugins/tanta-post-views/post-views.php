<?php
/*
Plugin Name: Tanta Post Views
Plugin URI: https://tantacom.com
Description: A plugin to control posts views for tantacom.com
Version: 1
Author: David Abad
Author URI: https://tantacom.com
Text Domain: tanta-control-post-views
*/

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Define default filter-priority constant, unless it has already been defined.
 */
if ( ! defined( 'EAE_FILTER_PRIORITY' ) ) {
	define( 'EAE_FILTER_PRIORITY', 1000 );
}

function add_pixel_tanta_post_views( $content ) {

	if ( is_single () ){
		global $post;
		$content = '<!-- Pixel to control tanta post views -->
					<img class="hidden" src="'.get_stylesheet_directory_uri ().'/addPostView.php?id='.$post->ID.'" alt="Count post views" />
					<!-- End pixel to control tanta post views -->'.
					$content;
	}
	return $content;
}

// Creating the widget 
class tanta_post_views_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'tanta_post_views_widget', 
			// Widget name will appear in UI
			__('Tanta Posts Views Widget', 'tanta_post_views'), 
			// Widget description
			array( 'description' => __( 'This widget displays a list of most viewed posts in tantacom.com', 'tanta_post_views' ), ) 
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
			extract($args);
			$title = apply_filters('widget_title', $instance['title']);
	
			echo $before_widget;
	
			if($title) {
				echo  $before_title.$title.$after_title;
			} ?>

				<ul class="mostViewedPosts link-list recent-posts" data-amount="<?php echo $instance['amount']; ?>">
					<?php
						$args = array(
							'post_type' => 'post', 
							'posts_per_page' => $instance['amount'],
							'meta_key' => 'views',
							'orderby' => 'meta_value_num',
							'order' => 'DESC',
							'date_query'    => array(
								'column'  => 'post_date',
								'after'   => '- 12 months'
							)
						);

						query_posts($args);

						if( have_posts() ) : while ( have_posts() ): the_post(); 
					?>
							
							<li>
								<?php the_title('<a href="'. get_permalink() .'">', '</a>'); ?>
								<span class="date"><?php the_time('F'); ?> <span class="number"><?php the_time('j, Y'); ?></span></span>
							</li>
								  
					<?php 
						endwhile; 
						endif; 
						wp_reset_query(); 
					?>
				</ul>
			
			<?php echo $after_widget;
	}

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		if( is_numeric($new_instance['amount']) ){
			$instance['amount'] = $new_instance['amount'];
		} else {
			$new_instance['amount'] = '3';
		}

		if( is_date($new_instance['dateInit']) ){
			$instance['dateInit'] = $new_instance['dateInit'];
		} else {
			$new_instance['dateInit'] = '';
		}

		return $instance;
	}

	// Widget Backend 
	public function form( $instance ) {
		$defaults = array('title' => 'Popular Posts', 'amount' => '3');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('amount'); ?>">Amount of Posts:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('amount'); ?>" name="<?php echo $this->get_field_name('amount'); ?>" value="<?php echo $instance['amount']; ?>" />
		</p>
	<?php
	}
	
} // Class post_views_widget ends here

// Register and load the widget
function tanta_post_views_load_widget() {
	register_widget( 'tanta_post_views_widget' );
}

add_filter( 'the_content', 'add_pixel_tanta_post_views', EAE_FILTER_PRIORITY );
add_action( 'widgets_init', 'tanta_post_views_load_widget' );
