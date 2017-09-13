<?php
/**
 * Template for displaying search form in bootstrap-basic theme
 * 
 * @package bootstrap-basic
 */
?>
<form role="search" method="get" class="search-form form" action="<?php echo esc_url(home_url('/')); ?>">
	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 nopaddingright">
        <input type="text" id="form-search-input" placeholder="<?php echo esc_attr_x('Pesquisar &hellip;', 'placeholder', 'bootstrap-basic'); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" title="<?php echo esc_attr_x('Pesquisar for:', 'label', 'bootstrap-basic'); ?>">
		<span class="input-group-btn">
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <input class="" type="submit" value="Buscar" />
        <button type="submit" class="btn btn-primary btn-block submit nopaddingleft nopaddingright"><?php esc_html_e('Buscar', 'bootstrap-basic'); ?></button>
    </div>
</form>