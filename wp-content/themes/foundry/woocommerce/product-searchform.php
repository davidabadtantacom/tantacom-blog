<?php 
	/**
	 * @package Foundry
	 * @author TommusRhodus
	 * @version 3.0.0
	 */
?>
<form class="search-form" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
	<input type="text" id="s2" class="mb0" name="s" placeholder="<?php esc_attr_e('Type here', 'foundry'); ?>" />
	<input type="hidden" name="post_type" value="product" />
</form>