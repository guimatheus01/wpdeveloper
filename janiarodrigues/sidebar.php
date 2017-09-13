<div class="col-md-3 col-sm-12">
	<div id="sidebar" class="sidebar-shop-wrapper">
		<?php 
			if ( is_active_sidebar( 'woo-sidebar' )){
				dynamic_sidebar('Shop');
			} else {
			    esc_html_e( 'Add widgets in Sidebar Shop', 'floris' );
			}
		?>
	</div>
</div>