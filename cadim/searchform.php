<?php
/**
 * Template for displaying search form in bootstrap-basic theme
 * 
 * @package bootstrap-basic
 */
?>
<form role="search" method="get" class="search-form form" action="<?php echo esc_url(home_url('/')); ?>">
	<input type="search" id="form-search-input" class="form-control" placeholder="Pesquisar aqui" value="<?php echo esc_attr(get_search_query()); ?>" name="s">
	<span class="input-group-addon"><button type="submit">Ir</button></span>	
</form>

