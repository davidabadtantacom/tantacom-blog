<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<div><input type="text" value="<?php the_search_query(); ?>" name="s" id="s" class="text" />
<input type="image" id="searchsubmit" value="Buscar" src="<?php bloginfo('template_directory'); ?>/images/btn_buscarBlog.gif" />
</div>
</form>
