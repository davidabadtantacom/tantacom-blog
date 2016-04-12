	<div id="sideBar" class="blog">
		<div class="flt">
			<div>
				<h2><img src="<?php bloginfo('template_directory'); ?>/images/txt_blogs.gif" alt="Los Blogs de Tanta" /></h2>

				<!--h3><img src="<?php bloginfo('template_directory'); ?>/images/txt_abre.gif" alt="Abre tus ojos" /></h3>
				<?php //RSSImport(3, "http://blogs.tantacom.com/abretusojos/feed", false, false); ?>
				<span class="seeMore"><a href="http://www.abretusojos.es" target="_blank">Ver más</a></span-->
				<h3><img src="<?php bloginfo('template_directory'); ?>/images/txt_links.gif" alt="Los Links de Félix" /></h3>
				<?php RSSImport(3, "http://blogs.tantacom.com/loslinksdefelix/feed", false, false); ?>
				<span class="seeMore"><a href="http://www.loslinksdefelix.com" target="_blank">Ver más</a></span>
				<h3><img src="<?php bloginfo('template_directory'); ?>/images/txt_tantaL.gif" alt="Tanta Labs" /></h3>
				<?php RSSImport(3, "http://blogs.tantacom.com/tantalabs/feed", false, false); ?>
				<span class="seeMore"><a href="http://www.tantalabs.com" target="_blank">Ver más</a></span>
				<h3><img src="<?php bloginfo('template_directory'); ?>/images/txt_nets.gif" alt="Netscoop" /></h3>
				<?php RSSImport(3, "http://blogs.tantacom.com/thenetscoop/feed", false, false); ?>
				<span class="seeMore"><a href="http://www.thenetscoop.com" target="_blank">Ver más</a></span>
				<!--h3><img alt="accesibilidadweb.com" src="<?php bloginfo('template_directory'); ?>/images/txt_accesibilidad.gif"/></h3-->
				<?php //RSSImport(3, "http://www.accesibilidadweb.com/blog/index.php/feed", false, false); ?>
				<!--span class="seeMore"><a href="http://www.accesibilidadweb.com" target="_blank">Ver más</a></span-->
				<h3><img alt="Un blog sobre eZ" src="<?php bloginfo('template_directory'); ?>/images/EZ_minimagen.gif"/></h3>
				<?php RSSImport(3, "http://www.unblogsobreez.com/ezpublish/feeds/blog", false, false); ?>
				<span class="seeMore"><a href="http://www.unblogsobreez.com" target="_blank">Ver más</a></span>
			</div>
		</div>
		<div class="frt">
			<span class="home"><a href="http://blog.tantacom.com/">Inicio Noticias</a></span>
			<ul>

				<li>
					<?php include (TEMPLATEPATH . '/searchform.php'); ?>
				</li>

				<?php wp_list_categories('show_count=1&title_li=<h2>Categorías</h2>'); ?>

				<li><h2>Lo m&aacute;s le&iacute;do</h2>
					<ul>
					<?php get_most_viewed('post', 10); ?>
					</ul>
				</li>
	<?php /*
				<li><h2>Art&iacute;culos anteriores</h2>

					<?php query_posts('showposts=20');
					$cont= 1;
					 ?>
					<ul>
					<?php while (have_posts()) : the_post();
					if ($cont<11) { $cont= $cont+1; }
					else {
					?>

					<li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to'); ?> <?php the_title(); ?>"> <?php the_title(); ?></a></li>
					<?php $cont= $cont+1; }
					endwhile;?>
					</ul>
				</li> */ ?>

				<li><h2>Archivos</h2>
					<ul>
					<?php wp_get_archives('type=monthly'); ?>
					</ul>
				</li>

				<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
					<?php //wp_list_bookmarks(); ?>

				<?php } ?>

				<li><h2>Sindicación</h2>
					<ul>
						<li><a href="<?php bloginfo('rss2_url'); ?>">Entradas (RSS)</a></li>
						<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comentarios (RSS)</a></li>
					</ul>
				</li>
	<?php /*
				<li><h2>Blogs de nuestro Equipo</h2>
					<ul>
						<li><a href="http://www.loslinksdefelix.com/">Los Links de Félix</a></li>
						<li><a href="http://www.abretusojos.es/">Abre tus ojos</a></li>
						<li><a href="http://www.accesibilidadweb.com/blog/">Accesibilidad Web</a></li>
						<li><a href="http://www.martinpulido.com/blog/">martinpulido</a></li>
						<li><a href="http://jorgequintas.com">Jorge Quintas</a></li>
					</ul>
				</li> */ ?>
			</ul>
		</div>


	</div>

