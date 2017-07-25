<?php 

function prefix_add_footer_styles_scripts() {
	wp_enqueue_script( 'tanta-js', '/wp-content/themes/foundry-child/js/tanta.js?'.filemtime (get_stylesheet_directory().'/js/tanta.js') );
};
add_action( 'get_footer', 'prefix_add_footer_styles_scripts' );


function check_wp_query ( $query ){
	if ( !is_admin() ){
		if ( $query->get('post_type') == 'client' ){
			$query->set('orderby', 'meta_value_num');
			$query->set('meta_key', 'orden');
			$query->set('order', 'ASC');
		}
	}
	return $query;
}
add_action( 'pre_get_posts', 'check_wp_query' );

function ebor_header_social_items(){
	
	$protocols = array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet', 'skype');
	$output = false;
	
	for( $i = 1; $i < 5; $i++ ){
		if( get_option("header_social_url_$i") ) {
			$output .= '<li>
				      <a href="' . esc_url(get_option("header_social_url_$i"), $protocols) . '" target="_blank">
					      <span class="iconized ' . get_option("header_social_icon_$i") . '"><span class="text">'.get_option("header_social_icon_$i").' link</span></span>
				      </a>
				  </li>';
		}
	} 
	
	return $output;	
	
}

// remove emoji
function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}
function disable_wp_emojicons() {
  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );
add_filter( 'emoji_svg_url', '__return_false' );


function remove_scripts_styles_footer() {
    //----- CSS
    wp_deregister_style('yarppRelatedCss'); // YARPP
}
 
add_action('wp_footer', 'remove_scripts_styles_footer');


// Change menu labels of backend menu
function change_menu() {
    global $menu;
	// Portfolio => Ofertas de trabajo
	foreach ($menu as $index => $data) {
		if ($data[0] == 'Ofertas de trabajo'){
			$menu [$index][6]= 'dashicons-megaphone';
		}
	}
}
add_action( 'admin_menu', 'change_menu' );

function change_post_object() {
    global $wp_post_types;

	// Portfolio => Ofertas de trabajo
	// Name
	$wp_post_types ['portfolio']->name = 'ofertasdetrabajo';
	// Label
	$wp_post_types ['portfolio']->label = 'Ofertas de trabajo';
	// Description
	$wp_post_types ['portfolio']->description = 'Ofertas de trabajo entries for the ebor Theme.';
	// Taxonomies
	$wp_post_types ['portfolio']->taxonomies[0] = 'ofertasdetrabajo-category';
	// Taxonomies
	$wp_post_types ['portfolio']->menu_icon = 'dashicons-megaphone';
    // Query var
	$wp_post_types ['portfolio']->query_var = 'ofertadetrabajo';
    // Slug
    $wp_post_types ['portfolio']->rewrite['slug'] = 'ofertadetrabajo';
    // Labels
    $labels = &$wp_post_types['portfolio']->labels;
	$labels->name = 'Ofertas de trabajo';
	$labels->singular_name = 'Ofertas de trabajo';
	$labels->add_new_item = 'Add New Oferta de trabajo';
	$labels->edit_item = 'Edit Oferta de trabajo';
	$labels->new_item = 'New Oferta de trabajo';
	$labels->view_item = 'View Oferta de trabajo';
	$labels->view_items = 'Ver Ofertas de trabajo';
	$labels->search_items = 'Search Ofertas de trabajo';
	$labels->not_found = 'No Ofertas de trabajos found';
	$labels->not_found_in_trash = 'No Ofertas de trabajo found in Trash';
	$labels->parent_item_colon = 'Parent Ofertas de trabajo:';
	$labels->all_items = 'Ofertas de trabajo';
	$labels->archives = 'Ofertas de trabajo';
	$labels->attributes = 'Atributos de oferta de trabajo';
	$labels->insert_into_item = 'Insertar en la oferta de trabajo';
	$labels->uploaded_to_this_item = 'Subido a esta oferta de trabajo';
	$labels->filter_items_list = 'Lista de ofertas de trabajo filtradas';
	$labels->items_list_navigation = 'Navegación por el listado de ofertas de trabajo';
	$labels->items_list = 'Lista de ofertas de trabajo';
	$labels->menu_name = 'Ofertas de trabajo';
	$labels->name_admin_bar = 'Ofertas de trabajo';
}
add_action( 'init', 'change_post_object' );


function flipboard_namespace() {
    echo 'xmlns:media="http://search.yahoo.com/mrss/"
    xmlns:georss="http://www.georss.org/georss"';
}
add_filter( 'rss2_ns', 'flipboard_namespace' );

function add_media_thumbnail( $content ) {
	global $post;
	if( has_post_thumbnail( $post->ID )) {
		$thumb_ID = get_post_thumbnail_id( $post->ID );
		$details = wp_get_attachment_image_src($thumb_ID, 'full');
		if( is_array($details)) {
			$tipo = '';
			if ($info   = getimagesize($details[0])){
				$tipo = ' type="'.$info['mime'].'"';
			}

			// CDN Image			
			$imgUrl = str_replace (get_site_url(), KEYCDN_URL, $details[0]);		
			echo '<media:content url="' . $imgUrl . '"'.$tipo.' width="100%" />';
		}
	}
}
add_filter( 'rss2_item', 'add_media_thumbnail' );

// Validation comments form
function comment_validation_init() {
	if(is_singular() && comments_open() ){
		wp_enqueue_script( 'validation-js', 'https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js' );
	}
}
add_action('wp_footer', 'comment_validation_init');

/*
Wordpress leading whitespace fix
http://wejn.org/stuff/wejnswpwhitespacefix.php.html
*/
function ___wejns_wp_whitespace_fix($input) {
  /* valid content-type? */
  $allowed = false;

  /* found content-type header? */
  $found = false;

  /* we mangle the output if (and only if) output type is text/* */
  foreach (headers_list() as $header) {
    if (preg_match("/^content-type:\\s+(text\\/|application\\/((xhtml|atom|rss)\\+xml|xml))/i", $header)) {
      $allowed = true;
    }

    if (preg_match("/^content-type:\\s+/i", $header)) {
      $found = true;
    }
  }

  /* do the actual work */
  if ($allowed || !$found) {
    return preg_replace("/\\A\\s*/m", "", $input);
  } else {
    return $input;
  }
	/* valid content-type? */
	$allowed = false;

	/* found content-type header? */
	$found = false;

	/* we mangle the output if (and only if) output type is text/* */
	foreach (headers_list() as $header) {
		if (preg_match("/^content-type:\\s+(text\\/|application\\/((xhtml|atom|rss)\\+xml|xml))/i", $header)) {
			$allowed = true;
		}

		if (preg_match("/^content-type:\\s+/i", $header)) {
			$found = true;
		}
	}

	/* do the actual work */
	if ($allowed || !$found) {
		return preg_replace("/\\A\\s*/m", "", $input);
	} else {
		return $input;
	}
}

/* start output buffering using custom callback */
ob_start("___wejns_wp_whitespace_fix");

function excluir_cursos( $query ) {
  if ( $query->is_home() && $query->is_main_query() ) {
    $query->set( 'cat', '-142' ); // id de la categoría cursos
  }
}
add_action( 'pre_get_posts', 'excluir_cursos' );

