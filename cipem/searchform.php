<?php
/**
 * Widget template for display search form in search widget.
 * 
 * @package bootstrap-basic4
 */
?>
<form class="environment-search-popup" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <input value="Faça sua pesquisa" onblur="if(this.value == '') { this.value ='Faça sua pesquisa'; }" onfocus="if(this.value =='Faça sua pesquisa') { this.value = ''; }" type="text" id="form-search-input" value="" name="s">
    <input value="" type="submit">
    <i class="fa fa-search"></i>
</form>