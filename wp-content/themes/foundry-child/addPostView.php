<?php

require( $_SERVER['DOCUMENT_ROOT']. '/wp-blog-header.php' );

if (!empty ($_GET['id'])){
	$postMetaViews = get_post_meta ( $_GET['id'], 'views', true);
	update_post_meta( $_GET['id'], 'views', ($postMetaViews+1), $postMetaViews );
}

?>