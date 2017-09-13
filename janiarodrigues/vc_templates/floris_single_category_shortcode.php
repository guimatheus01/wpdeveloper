<?php
//Product categories with filter
$cats_wocommerce = $post_count = $cat_filter = $cat_banner = $prod_backside='';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
if($post_count == ''){$post_count = '-1';}
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    // is WooCommerce
    if( class_exists( 'WooCommerce' ) ) {
     
        // get id cetegorys woocommerce
        if (!empty($cats_wocommerce)){
            if (is_numeric($cats_wocommerce[0])) {
                $field_type = 'term_id';
            }else{
                $field_type = 'slug';
            }
            $term = get_term_by( $field_type, $cats_wocommerce, 'product_cat');
            $desc_cat_r = $term->description;
            $term_id = $term->term_id;
            $term_name = $term->name;
           
            $thumbnail_id = get_woocommerce_term_meta( $term_id, 'thumbnail_idb', true );
            $image = wp_get_attachment_url( $thumbnail_id );
            if(!$image){$image = get_template_directory_uri().'/assets/img/random'.rand(1,4).'.jpg';}

            //cat banner
            $cat_banner.= '<div class="top-slider sm type-2">';
            $cat_banner.= '<div class="category-baner">';
            $cat_banner.= '<div class="bg fix" style="background-image:url('.esc_url( $image ).')"></div>';
            $cat_banner.= '<div class="title vertical-align">';
            $cat_banner.= '<h1 class="h1 style-1">'.esc_html( $term_name ).'</h1>';
            $cat_banner.= '<div class="simple-text font-fam-3">';
            $cat_banner.= '<p>'.wp_kses_post( $desc_cat_r ).'</p>';
            $cat_banner.= '</div>';
            $cat_banner.= '</div>';
            $cat_banner.= '</div>';
            $cat_banner.= '</div>';

            //product
            $cat_banner.= '<section class="section-md border-b">';
            $cat_banner.= '<div class="container-fluid">';
        
            $args = array(
                'suppress_filters' => 'false',
                'posts_per_page'   =>  $post_count,
                'post_type'        =>  'product',
                'order'            => 'DESC',
                'tax_query'        => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'id',
                        'terms'    => ( function_exists('lang_object_ids') ? lang_object_ids( $term_id,'product_cat',false) : $term_id )
                    )
                )
            );
            $wp_query = new WP_Query( $args );
            if(!$wp_query->found_posts){ $cat_banner.= '<div class="vc_col-sm-12"><div class="text-center"><h4 class="h4">no products</h4></div></div>';}
                while ( $wp_query->have_posts() ) : $wp_query->the_post();
                    global $post, $woocommerce, $product;
                    $prod_price = $product->get_price_html();
                    $sale = get_post_meta( get_the_ID(), '_sale_price', true);
                    $pa_liter = $product->get_attribute( 'pa_liter' );


                    $image_id = get_post_thumbnail_id();
                    $image_link  = wp_get_attachment_image_src($image_id, '', true);
                    $fl_img_link = $image_link[0];
                    $prod_img = floris_opt_aq_resize( $fl_img_link, '1902', '1068', false, true);

                    $cat_banner.= '<div class="col-25 post-single-cat">';
                    $cat_banner.= '<div class="category-item hover-image-item">';
                    $cat_banner.= '<div class="image">';
                    if($sale){
                        $cat_banner.= '<div class="new sale">sale</div>';
                    }
                    if( $prod_img ){
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
                            $cat_banner.= '<div class="flip-container" ontouchstart="this.classList.toggle("hover");">';
                            $cat_banner.= '<div class="flipper">';
                            $cat_banner.= '<a class="front" href="'.esc_url( get_the_permalink() ).'">';
                            $cat_banner.= '<img src="'.esc_url( $prod_img ).'" alt="product">';
                            $cat_banner.= '</a>';
                            $cat_banner.= '<a class="back" href="'.esc_url( get_the_permalink() ).'">';
                            $cat_banner.= '<img src="'.esc_url( $thumb_link[0] ).'" alt="product_thumb">';
                            $cat_banner.= '</a>';
                            $cat_banner.= '</div>';
                            $cat_banner.= '</div>';
                        } else {    
                            $cat_banner.= '<a href="'.get_the_permalink().'" style="position: relative;"><img src="'.esc_url( $prod_img ).'" alt="'.esc_html( $image_link[3] ).'"></a>';
                        }
                        if(is_plugin_active('floris-plugin/floris-plugin.php') && floris_get_option('prod_quickview_btn') && !$product->is_type('external')){ 
                            $cat_banner.= '<span class="btn-quickview" data-url="'.get_the_permalink().'" data-product_id="'.get_the_ID().'" data-close="'.get_template_directory_uri().'/assets/img/close_sm.png"></span>';
                            $cat_banner.= '<div class="loader-wrapper button_load"><div class="loader-inner ball-pulse"><div></div><div></div><div></div></div></div>';
                        }
                    }
                    $cat_banner.= '</div>';
                    $cat_banner.= '<div class="item-title">';
                    $cat_banner.= '<h4 class="h4"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>';
                    if (class_exists('floris_wcva_shop_page_swatches')) {
                        $floris_wcva_shop_page_swatches = new floris_wcva_shop_page_swatches;
                        $cat_banner.= '<div class="floris_swatches_shop">'.$floris_wcva_shop_page_swatches->wcva_change_shop_attribute_swatches($product).'</div>';
                    }
                    $cat_banner.= '<p class="sub-title">';
                        if($pa_liter){
                            $cat_banner.= '<b>'.wp_kses_post( $pa_liter ).'&nbsp;&ndash;</b>';
                        }
                    $cat_banner.= '<span> '.wp_kses_post( $prod_price ).'</span></p>';
                    $cat_banner.= '</div>';
                    $cat_banner.= '</div>';
                    $cat_banner.= '</div>';


                endwhile;
            // end loop
            wp_reset_postdata();

            $cat_banner.= '</div>';
            $cat_banner.= '</section>';
        } else {
            $terms = get_terms('product_cat', 'orderby=name&hide_empty=1');
            foreach($terms as $term){
                
                $desc_cat_r = $term->description;
                $term_id = $term->term_id;
                $term_name = $term->name;
                $thumbnail_id = get_woocommerce_term_meta( $term_id, 'thumbnail_idb', true );
                $image = wp_get_attachment_url( $thumbnail_id );
                if(!$image){$image = get_template_directory_uri().'/assets/img/random'.rand(1,4).'.jpg';}

                //cat banner
                $cat_banner.= '<div class="top-slider sm type-2">';
                $cat_banner.= '<div class="category-baner">';
                $cat_banner.= '<div class="bg fix" style="background-image:url('.esc_url( $image ).')"></div>';
                $cat_banner.= '<div class="title vertical-align">';
                $cat_banner.= '<h1 class="h1 style-1">'.esc_html( $term_name ).'</h1>';
                $cat_banner.= '<div class="simple-text font-fam-3">';
                $cat_banner.= '<p>'.wp_kses_post( $desc_cat_r ).'</p>';
                $cat_banner.= '</div>';
                $cat_banner.= '</div>';
                $cat_banner.= '</div>';
                $cat_banner.= '</div>';

                //product
                $cat_banner.= '<section class="section">';
                $cat_banner.= '<div class="container-fluid">';
         
                $args = array(
                    'suppress_filters' => 'false',
                    'posts_per_page'   =>  $post_count,
                    'post_type'        =>  'product',
                    'order'            => 'ASC',
                    'tax_query'        => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field'    => 'id',
                            'terms'    => ( function_exists('lang_object_ids') ? lang_object_ids( $term_id,'product_cat',false) : $term_id )
                        )
                    )
                );
                $wp_query = new WP_Query( $args );
                while ( $wp_query->have_posts() ) : $wp_query->the_post();
                        global $post, $woocommerce, $product;
                        $prod_price = $product->get_price_html();
                        $sale = get_post_meta( get_the_ID(), '_sale_price', true);
                        $pa_liter = $product->get_attribute( 'pa_liter' );


                        $image_id = get_post_thumbnail_id();
                        $image_link  = wp_get_attachment_image_src($image_id, '', true);
                        $fl_img_link = $image_link[0];
                        $prod_img = floris_opt_aq_resize( $fl_img_link, '1902', '1068', false, true);
                        
                        $cat_banner.= '<div class="col-25 post-single-cat">';
                        $cat_banner.= '<div class="category-item hover-image-item">';
                        $cat_banner.= '<div class="image">';
                        if($sale){
                            $cat_banner.= '<div class="new sale">sale</div>';
                        }
                        if( $prod_img ){
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
                                $cat_banner.= '<div class="flip-container" ontouchstart="this.classList.toggle("hover");">';
                                $cat_banner.= '<div class="flipper">';
                                $cat_banner.= '<a class="front" href="'.esc_url( get_the_permalink() ).'">';
                                $cat_banner.= '<img src="'.esc_url( $prod_img ).'" alt="product">';
                                $cat_banner.= '</a>';
                                $cat_banner.= '<a class="back" href="'.esc_url( get_the_permalink() ).'">';
                                $cat_banner.= '<img src="'.esc_url( $thumb_link[0] ).'" alt="product_thumb">';
                                $cat_banner.= '</a>';
                                $cat_banner.= '</div>';
                                $cat_banner.= '</div>';
                            } else {
                                $cat_banner.= '<a href="'.get_the_permalink().'" ><img src="'.esc_url( $prod_img ).'" alt="'.esc_html( $image_link[3] ).'"></a>';
                            }
                            if(is_plugin_active('floris-plugin/floris-plugin.php') && floris_get_option('prod_quickview_btn') && !$product->is_type('external')){ 
                                $cat_banner.= '<span class="btn-quickview" data-url="'.get_the_permalink().'" data-product_id="'.get_the_ID().'" data-close="'.get_template_directory_uri().'/assets/img/close_sm.png"></span>';
                                $cat_banner.= '<div class="loader-wrapper button_load"><div class="loader-inner ball-pulse"><div></div><div></div><div></div></div></div>';
                            }
                        }
                        $cat_banner.= '</div>';
                        $cat_banner.= '<div class="item-title">';
                        $cat_banner.= '<h4 class="h4"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>';
                        if (class_exists('floris_wcva_shop_page_swatches')) {
                            $floris_wcva_shop_page_swatches = new floris_wcva_shop_page_swatches;
                            $cat_banner.= '<div class="floris_swatches_shop">'.$floris_wcva_shop_page_swatches->wcva_change_shop_attribute_swatches($product).'</div>';
                        }
                        $cat_banner.= '<p class="sub-title">';
                            if($pa_liter){
                                $cat_banner.= '<b>'.wp_kses_post( $pa_liter ).'&nbsp;&ndash;</b>';
                            }
                        $cat_banner.= '<span> '.wp_kses_post( $prod_price ).'</span></p>';
                        $cat_banner.= '</div>';
                        $cat_banner.= '</div>';
                        $cat_banner.= '</div>';


                    endwhile;
                // end loop
                wp_reset_postdata();

                $cat_banner.= '</div>';
                $cat_banner.= '</section>';
            }
        }            
        print $cat_banner;
    } else {
    ?>
        <div class="vc_empty_space" style="height: 132px"><span class="vc_empty_space_inner"></span></div>
        <div class="container">
            <div class="row">
                <h1 class="h4 text-center"><?php esc_html_e('WooCommerce not Activated!', 'floris'); ?></h1>
            </div>
        </div>
    <?php
    } ?>