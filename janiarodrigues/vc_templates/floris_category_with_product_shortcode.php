<?php
//Product category with product
$cats_wocommerce = $post_count = $cat_filter = $b_title = $prod_backside='';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if( class_exists( 'WooCommerce' ) ) {
    if (!empty($cats_wocommerce)){
        $cat = $cats_wocommerce;
        if (is_numeric($cats_wocommerce[0])) {
            $field_type = 'term_id';
        }else{
            $field_type = 'slug';
        }
        $term = get_term_by( $field_type, $cats_wocommerce, 'product_cat');
        if($term){
            $term_id = $term->term_id;
            $term_name = $term->name;
            $desc_cat_r = $term->description;
            $thumbnail_id = get_woocommerce_term_meta( $term_id, 'thumbnail_id', true );
            $image = wp_get_attachment_url( $thumbnail_id );
            $fl_cat_img = floris_opt_aq_resize( $image, '1902', '1068', false, true);
            if(!$image){$image = get_template_directory_uri().'/assets/img/random'.rand(1,4).'.jpg';
                $fl_cat_img = $image;
            }
            $cat_product = '';
            $swiper_slide = '';

            //Get curent cat product
            $cats_args = array(
                'suppress_filters' => 'false',
                'posts_per_page'   =>  '4',
                'post_type'        =>  'product',
                'order'            => 'DESC',
                'tax_query'        => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field'    => $field_type,
                        'terms'    => ( function_exists('lang_object_ids') ? lang_object_ids( $cat,'product_cat',false) : $cat )
                    )
                )
            );

            $wp_query_cat = new WP_Query( $cats_args );
            $found_posts = $wp_query_cat->found_posts;
            if ( $wp_query_cat->have_posts() ){
                $i = 1;
                while ( $wp_query_cat->have_posts() ) : $wp_query_cat->the_post();
                    global $post, $woocommerce, $product;
                    $prod_price = $product->get_price_html();
                    $image_id = get_post_thumbnail_id();
                    $image_link  = wp_get_attachment_image_src($image_id, '', true);
                    $fl_img_link = $image_link[0];
                    $prod_img = floris_opt_aq_resize( $fl_img_link, '1902', '1068', false, true);

                    $cat_product .= '<div class="fasion-item item-animation hover-image-item">';
                    if( $prod_img ){
                        $cat_product .= '<div class="image">';
                        $thumb_link = '';
                        if( $prod_backside ){

                            $attachment_ids = $product->get_gallery_image_ids();
                            if ( $attachment_ids ) {  $count = 1;
                                foreach ( $attachment_ids as $attachment_id ) { 
                                    $thumb_link  = wp_get_attachment_image_src($attachment_id, '', true);
                                    if( $count >= 1 )break;
                                $count++;}
                            }
                        }
                        if( $prod_backside && $thumb_link ){
                            $cat_product .= '<div class="flip-container" ontouchstart="this.classList.toggle("hover");">';
                            $cat_product .= '<div class="flipper">';
                            $cat_product .= '<a class="front hover-img" href="'.esc_url( get_the_permalink() ).'" style="background-image: url('.esc_url( $prod_img ).');">';
                            $cat_product .= '</a>';
                            $cat_product .= '<a class="back" href="'.esc_url( get_the_permalink() ).'" style="background-image: url('.esc_url( $thumb_link[0] ).');">';
                            $cat_product .= '</a>';
                            $cat_product .= '</div>';
                            $cat_product .= '</div>';
                        } else {
                            $cat_product .= '<a class="hover-img" href="'.esc_url( get_the_permalink() ).'" style="background-image: url('.esc_url( $prod_img ).');"></a>';//<img src="'.$prod_img.'" alt="'.$image_link[3].'" class="resp-img prod-fash-img">
                        }
                        $cat_product .= '</div>';
                    }
                    $cat_product .= '<div class="title">';
                    $cat_product .= '<a href="'.esc_url( get_the_permalink() ).'">'.wp_kses_post( get_the_title() ).'</a>';
                    if (class_exists('floris_wcva_shop_page_swatches')) {
                        $floris_wcva_shop_page_swatches = new floris_wcva_shop_page_swatches;
                        $cat_product .= '<div class="floris_swatches_shop">'.$floris_wcva_shop_page_swatches->wcva_change_shop_attribute_swatches($product).'</div>';
                    }
                    $cat_product .= '<span class="font-fam-1">'.wp_kses_post( $prod_price ).'</span>';
                    $cat_product .= '</div>';
                    $cat_product .= '</div>';

                    if($i == 2)
                        $cat_product .= '</div><div class="col-30 right ">';//<div class="col-30"></div>

                    $swiper_slide .= '<div class="swiper-slide">';
                    $swiper_slide .= '<div class="fasion-item item-animation hover-image-item">';
                    if( $prod_img ){
                        $swiper_slide .= '<div class="image"><a class="hover-img" href="'.esc_url( get_the_permalink() ).'" style="background-image: url('.esc_url( $prod_img ).');"></a></div>';//<img src="'.$prod_img.'" alt="'.$image_link[3].'" class="resp-img">
                    }
                    $swiper_slide .= '<div class="title">';
                    $swiper_slide .= '<a href="'.esc_url( get_the_permalink() ).'">'.wp_kses_post( get_the_title() ).'</a>';
                    if (class_exists('floris_wcva_shop_page_swatches')) {
                        $floris_wcva_shop_page_swatches = new floris_wcva_shop_page_swatches;
                        $swiper_slide .= '<div class="floris_swatches_shop">'.$floris_wcva_shop_page_swatches->wcva_change_shop_attribute_swatches($product).'</div>';
                    }
                    $swiper_slide .= '<span class="font-fam-1">'.wp_kses_post( $prod_price ).'</span>';
                    $swiper_slide .= '</div>';
                    $swiper_slide .= '</div>';
                    $swiper_slide .= '</div>';

                $i++;
                endwhile;
            } //END IF
            wp_reset_postdata();

            //Output HTML
            ?>
            <section class="section-full fl-section">
                <div class="hidden-block">
                    <div class="col-30 left"><?php print $cat_product; ?></div>
                </div>
            
                <div class="slider-mobile slider-mobile-man">
                    <div class="swiper-wrapper">
                        <?php print $swiper_slide; ?>
                    </div>
            
                    <div class="swiper-arrow-left slider-arrow"><img src="<?php print esc_url( get_template_directory_uri().'/assets/img/arrow_left.png' ); ?>" alt="arrow_left"></div>
                    <div class="swiper-arrow-right slider-arrow"><img src="<?php print esc_url( get_template_directory_uri().'/assets/img/arrow_right.png' ); ?>" alt=""></div>
                </div>

                <div class="col-30 fasion-caption item-animation">
                    <?php 
                        $popup_cat_img_link = $popup_cat_logo_show='';
                        $data_cat = get_term_meta( $term_id, 'floris_custom_category_options', true );
                        if( isset($data_cat['popup_cat_img']) && $data_cat['popup_cat_img'] ){ $popup_cat_img_link = wp_get_attachment_url($data_cat['popup_cat_img']); }
                        if( !isset($data_cat['popup_cat_logo_show']) ){ $popup_cat_logo_show = 1; }
                        else { $popup_cat_logo_show = $data_cat['popup_cat_logo_show']; }
                        if(!$popup_cat_img_link){$popup_cat_img_link = $fl_cat_img;}
                    ?>
                    <div class="image"><a href="<?php print esc_url( get_category_link($term_id) );?>"><img src="<?php print esc_url( $fl_cat_img ); ?>" alt="<?php print esc_html( $term_name ); ?>" data-src="<?php print esc_url( $popup_cat_img_link ); ?>" data-show="<?php print esc_attr( ( empty($popup_cat_logo_show) ? '0' : '1') ); ?>" class="resp-img"></a></div>
                    <div class="title">
                        <div class="title-cell">
                            <h3 class="h3"><?php print wp_kses_post( '<a href="'.get_category_link($term_id).'">'.$term_name.'</a>' ); ?></h3>
                            <span class="font-fam-1 sub-title"><?php print wp_kses_post( $desc_cat_r ); ?></span>
                            <?php 
                                include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
                                if(is_plugin_active('floris-plugin/floris-plugin.php')){ 
                                    if($b_title && ($found_posts > 4)){ ?> <a href="<?php print esc_url( get_category_link($term_id) );?>" class="button-style-2 border <?php print wp_kses_post( ( !is_plugin_active('woocommerce-multilingual/wpml-woocommerce.php') ? 'cat_popup' : '' ) ); ?>" data-term_id="<?php print esc_html( $term_id ); ?>" data-current-page="2" data-max-page="<?php print wp_kses_post( $wp_query_cat->max_num_pages ); ?>" data-url="<?php print esc_url( get_category_link($term_id) );?>" data-close="<?php print esc_url( get_template_directory_uri().'/assets/img/close_sm.png' ); ?>" data-prod-backside="<?php print wp_kses_post( ( $prod_backside ? 1 : 0 ) ); ?>"><span><?php print wp_kses_post( $b_title ); ?></span></a><div class="loader-wrapper button_load"><div class="loader-inner ball-pulse"><div></div><div></div><div></div></div></div> 
                            <?php } elseif ($found_posts < 4) { ?>
                                <a href="<?php print esc_url( get_category_link($term_id) );?>" class="button-style-2 border" data-term_id="<?php print esc_html( $term_id ); ?>" data-close="<?php print esc_url( get_template_directory_uri().'/assets/img/close_sm.png' ); ?>" ><span><?php print wp_kses_post( $b_title ); ?></span></a>
                            <?php  } } else { _e('<span class="not_floris" style="position: relative;">Floris Plugin not Activated!</span>','floris'); }?>
                        </div>
                    </div>
                </div>
            </section>
        <?php } else{ ?>
                <section class="section-full fl-section">
                    <div class="vc_col-sm-12 fasion-caption item-animation animated">
                        <div class="title">
                            <h3 class="h3"><?php esc_html_e('this category does not exist', 'floris'); ?></h3>
                        </div>
                    </div>
                </section>
        <?php }
    }
}