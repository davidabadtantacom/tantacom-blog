	<div id="sideBar" class="blog">
		<div class="flt">
			<div class="wrap">
				<h2><img src="<?php bloginfo('template_directory'); ?>/images/txt_blogs.gif" alt="Los Blogs de Tanta" /></h2>


				<h3><img alt="accesibilidadweb.com" src="<?php bloginfo('template_directory'); ?>/images/txt_accesibilidad.gif"/></h3>
				<?php RSSImport(3, "http://www.accesibilidadweb.com/blog/index.php/feed", false, false); ?>
				<span class="seeMore"><a href="http://www.accesibilidadweb.com/blog" target="_blank">Ver más</a></span>

				<h3><img src="<?php bloginfo('template_directory'); ?>/images/txt_links.gif" alt="Los Links de Félix" /></h3>
				<?php RSSImport(3, "http://blogs.tantacom.com/loslinksdefelix/feed", false, false); ?>
				<span class="seeMore"><a href="http://www.loslinksdefelix.com" target="_blank">Ver más</a></span>

			</div>
			<script src="http://widgets.twimg.com/j/2/widget.js" type="text/javascript"></script>
			<script type="text/javascript">
			new TWTR.Widget({
			  version: 2,
			  type: 'profile',
			  rpp: 4,
			  interval: 6000,
			  width: 193,
			  height: 300,
			  theme: {
			    shell: {
			      background: '#0A8EDD',
			      color: '#ffffff'
			    },
			    tweets: {
			      background: '#ffffff',
			      color: '#898585',
			      links: '#a8983f'
			    }
			  },
			  features: {
			    scrollbar: false,
			    loop: false,
			    live: true,
			    hashtags: true,
			    timestamp: true,
			    avatars: false,
			    behavior: 'all'
			  }
			}).render().setUser('tantacom').start();
			</script>
		</div>
		<div class="frt">
			<span class="home"><a href="http://blog.tantacom.com/">Inicio Noticias</a></span>
			<ul>

				<li>
					<?php include (TEMPLATEPATH . '/searchform.php'); ?>
				</li>

				<li><h2>Lo m&aacute;s le&iacute;do</h2>
					<ul>
					<?php get_most_viewed('post', 10); ?>
					</ul>
				</li>

				<?php wp_list_categories('show_count=1&title_li=<h2>Categorías</h2>'); ?>


				<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
					<?php wp_list_bookmarks(); ?>

				<?php } ?>


				<li><h2>Archivos</h2>
					<ul>
					<?php wp_get_archives('type=monthly'); ?>
					</ul>
				</li>

				

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

