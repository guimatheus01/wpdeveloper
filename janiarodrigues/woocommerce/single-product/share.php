<?php
/**
 * Single Product Share
 *
 * Sharing plugins can hook into here or you can add your own code directly.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/share.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $post;
$custom_share = floris_get_option('custom_share');
?>
<div class="menu-folow share-link" data-custom="<?php print wp_kses_post( $custom_share ); ?>">
	<span class="font-fam-1">COMPARTILHAR:</span>
	<?php
		if( $custom_share ){
			$share = floris_get_option('share-slides');
			if( $share ){
				foreach( $share as $val ){
					if( $val['url'] && $val["description"] ){
						print wp_kses_post( '<a href="#"><i class="'.$val["description"].'"></i><i class="'.$val["description"].'"></i><span class="social-c st_'.$val["url"].'_large"></a>' );
					}
				}
			}
		} else {
			$pinImg = '';
			if(has_post_thumbnail( $post->ID ) ) {
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' );
				$pinImg = urlencode($image[0]);
			}
			$permalink = esc_attr( urlencode( get_permalink() ) );
			$title = esc_attr( urlencode( get_the_title() ) );
		?>
			<a href="http://www.facebook.com/sharer.php?u=<?php print wp_kses_post( $permalink ); ?>" target="_blank"><i class="icon-facebook"></i><i class="icon-facebook"></i></a>
			<a href="http://twitter.com/home?status=<?php print wp_kses_post( $title ); ?>-<?php print wp_kses_post( $permalink ); ?>" target="_blank"><i class="icon-twitter"></i><i class="icon-twitter"></i></a>
			<a href="https://plus.google.com/share?url=<?php print wp_kses_post( $permalink ); ?>&title=<?php print wp_kses_post( $title ); ?>" target="_blank"><i class="icon-gplus"></i><i class="icon-gplus"></i></a>
			<a href="http://pinterest.com/pin/create/button/?url=<?php print wp_kses_post( $permalink ); ?>&media=<?php print wp_kses_post( $pinImg ); ?>&description=<?php print wp_kses_post( $title ); ?>" target="_blank"><i class="icon-pinterest"></i><i class="icon-pinterest"></i></a>
		<?php } ?>
</div>
<?php if( function_exists( 'floris_share_scripts' ) && $custom_share ){ floris_share_scripts(); } ?>