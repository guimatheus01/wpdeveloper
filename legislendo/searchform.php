<?php
/**
 * Template for displaying search form in bootstrap-basic theme
 * 
 * @package bootstrap-basic
 */
?>
<form class="header-search-form search-form form" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
	<input type="search" id="header-search form-search-input" name="search" name="s" placeholder="Pesquisar">
	<button type="submit"><i class="fa fa-search"></i></button>
</form> <!-- end .search-form -->