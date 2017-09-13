<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Page Template
 *
 * This template is the default page template. It is used to display content when someone is viewing a
 * singular view of a page ('page' post_type) unless another page template overrules this one.
*/
	get_header();
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
?>
    <div class="content no-bg">
    	<div class="container height-full <?php print wp_kses_post( ( is_page_template('default') && !is_plugin_active('js_composer/js_composer.php') ? 'template_default' : '' ) ); ?>">
		    	<?php 
		    		if ( have_posts() ) : 
		    			while ( have_posts() ) : the_post();
		    				the_content();
		    			endwhile;
		    		endif;
		    	?>
    	</div>
    </div>

<?php 
wp_link_pages($floris_pag_nav);
get_footer();