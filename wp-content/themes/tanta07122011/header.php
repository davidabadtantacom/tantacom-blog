<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>


<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/styles.css" type="text/css" />

 <!--[if lte IE 6]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/fixIE6.css" />
<![endif]-->
<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/fixIE7.css" />
<![endif]-->

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/impresion.css" media="print" />

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/common.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/iepngfix_tilebg.js"></script>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<meta name="google-site-verification" content="xTCxX19YjdDm59dnuT3xLykCyJFnmzXu6g1aeOmYDLE" />



<?php wp_head(); ?>
</head>
<body>
<div id="wrapper">
		<div class="hide">
			<ul title="Enlaces de salto:">
				<li><a href="#navBar">Menú de navegación</a></li>
				<li><a href="#main">Contenido</a></li>
				<li><a href="#sideBar">Lateral de página</a></li>
				<li><a href="#footer">Contacto</a></li>

			</ul>
		</div>
		<div id="header">
			<a href="http://www.tantacom.com"><img src="<?php bloginfo('template_directory'); ?>/images/logo_tanta.gif" width="47" height="19" alt="Logotipo de Tanta Comunicación" id="logo" /></a>

			<ul>
				<li id="tanta"><a href="http://www.tantacom.com/Tanta">Tanta</a></li>
				<li id="servicios"><a href="http://www.tantacom.com/Servicios">Servicios</a></li>
				<li id="experiencia"><a href="http://www.tantacom.com/Experiencia">Experiencia</a></li>
				<li id="blog" class="sel">Noticias</li>
				<li id="contacto"><a href="http://www.tantacom.com/Contacto">Contacto</a></li>
			</ul>

		</div>

		<div id="entry">
			<img src="<?php bloginfo('template_directory'); ?>/images/imagen_blog.gif" width="872" height="217" alt="" />				
		</div>
		<div id="bodyContent">
