<?php
//Product categories with filter
$cats_wocommerce = $post_count = $cat_filter = $cat_banner = $layer_style = $title_price_under = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
if($post_count == ''){$post_count = '-1';}

$dark_layer= '';
if ($layer_style == "type_one") {
    $dark_layer = '<div class="balck-layer"></div>';
} else {}

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );    
    // is WooCommerce*/
    if( class_exists( 'WooCommerce' ) ) {
     
        // get id cetegorys woocommerce
        if (!empty($cats_wocommerce)){
            // select category
            $cat = $cats_wocommerce;
            $test = explode(',',$cat);
            foreach ($test as $value) {
                if (is_numeric($value)) {
                    $field_type = 'term_id';
                }else{
                    $field_type = 'slug';
                }
                $term = get_term_by( $field_type, $value, 'product_cat');
                $desc_cat_r = $term->description;
                $term_id = $term->term_id;
                $term_name = $term->name;
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

                if($wp_query->found_posts){
                    $cat_filter.= '<li><a href="#'.esc_html( $term_id ).'">'.esc_html( $term_name ).'</a></li>';
                    $thumbnail_id = get_woocommerce_term_meta( $term_id, 'thumbnail_idb', true );
                    $image = wp_get_attachment_url( $thumbnail_id );
                    if(!$image){$image = get_template_directory_uri().'/assets/img/random'.rand(1,4).'.jpg';}

                    //cat banner
                    $cat_banner.= '<div class="top-slider sm" id="'.esc_html( $term_id ).'">';
                    $cat_banner.= '<div class="category-baner">';
                    $cat_banner.= '<div class="bg ready data-jarallax" data-jarallax="5" style="background-image:url('.esc_url( $image ).')"></div>';
                    $cat_banner.= $dark_layer;
                    $cat_banner.= '<div class="title vertical-align col-white">';
                    $cat_banner.= '<h1 class="h1 style-1">'.esc_html( $term_name ).'</h1>';
                    $cat_banner.= '<div class="simple-text font-fam-3">';
                    $cat_banner.= '<p>'.wp_kses_post( $desc_cat_r ).'</p>';
                    $cat_banner.= '</div>';
                    $cat_banner.= '</div>';
                    $cat_banner.= '</div>';
                    $cat_banner.= '</div>';

                    //product
                    $cat_banner.= '<section class="section">';
                    $cat_banner.= '<div class="container">';
                    $cat_banner.= '<div class="product-item-wrap">';

                    $i=1;
                    if ( $wp_query->have_posts() ) {
                        while ( $wp_query->have_posts() ) : $wp_query->the_post();
                            global $post, $woocommerce, $product;
                            $prod_price = $product->get_price_html();
                            $sale = get_post_meta( get_the_ID(), '_sale_price', true);
                            $pa_liter = $product->get_attribute( 'pa_liter' );
                            $class = 'right';
                            $class_sm = '';
                            if(($i % 2) == 0){$class = 'left';}
                            $class_sm = 'sm'; // if(($i % 6) == 0 || $i == 2){$class_sm = 'sm';}
                            if($title_price_under){$class_sm.= ' text-center';}
                            $image_id = get_post_thumbnail_id();
                            $image_link  = wp_get_attachment_image_src($image_id, '', true);
                            $fl_img_link = $image_link[0];
                            $prod_img = floris_opt_aq_resize( $fl_img_link, '412', '482', false, true);

                            $cat_banner.= '<div class="product-item type-2 '.esc_html( $class ).' '.esc_html( $class_sm ).' top-align item-animation hover-image-item">';
                            $cat_banner.= '<div class="image"';
                            if ($title_price_under == true) {
                                $cat_banner.= ' style="float: none;">';
                            }else{
                                $cat_banner.= '>';
                            }
                            if($sale){
                                $cat_banner.= '<div class="new sale">sale</div>';
                            }
                            if( $prod_img ){
                                $cat_banner.= '<a href="'.get_the_permalink().'" ><img src="'.esc_url( $prod_img ).'" alt="'.esc_html( $image_link[3] ).'"></a>';
                                if(is_plugin_active('floris-plugin/floris-plugin.php') && floris_get_option('prod_quickview_btn') && !$product->is_type('external')){
                                    $cat_banner.= '<span class="btn-quickview" data-url="'.get_the_permalink().'" data-product_id="'.get_the_ID().'" data-close="'.get_template_directory_uri().'/assets/img/close_sm.png"></span>';
                                    $cat_banner.= '<div class="loader-wrapper button_load" style="display: none;"><div class="loader-inner ball-pulse"><div></div><div></div><div></div></div></div>';
                                }
                            }
                            if($title_price_under){
                                $title_class = 'title_price_under';
                                $start_title = '</div>';
                                $end_title = '';
                            }else{
                                $title_class = 'title item-title';
                                $start_title = '';
                                $end_title = '</div>';
                            }
                            $cat_banner.= $start_title;
                            $cat_banner.= '<div class="'.$title_class.'">';
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
                            $cat_banner.= $end_title;
                            $cat_banner.= '</div>';
                        $i++;
                        endwhile;
                    } else {
                        $cat_banner.= '<div class="text-center">';
                        $cat_banner.= '<h4 class="h4">no products</h4>';
                        $cat_banner.= '</div>';
                    }
                    // end loop
                    wp_reset_postdata();

                    $cat_banner.= '</div>';
                    $cat_banner.= '</div>';
                    $cat_banner.= '</section>';
                }else{
                    print esc_html( '1' );
                }
            }
        } else {
            $terms = get_terms('product_cat', 'orderby=name&hide_empty=1');
            foreach($terms as $term){
                $desc_cat_r = $term->description;
                $term_id = $term->term_id;
                $term_name = $term->name;
                $cat_filter.= '<li><a href="#'.$term_id.'">'.$term_name.'</a></li>';
                $thumbnail_id = get_woocommerce_term_meta( $term_id, 'thumbnail_idb', true );
                $image = wp_get_attachment_url( $thumbnail_id );
                if(!$image){$image = get_template_directory_uri().'/assets/img/random'.rand(1,4).'.jpg';}

                //cat banner
                $cat_banner.= '<div class="top-slider sm" id="'.esc_html( $term_id ).'">';
                $cat_banner.= '<div class="category-baner">';
                $cat_banner.= '<div class="bg ready data-jarallax" data-jarallax="5" style="background-image:url('.esc_url( $image ).')"></div>';
                $cat_banner.= $dark_layer;
                $cat_banner.= '<div class="title vertical-align col-white">';
                $cat_banner.= '<h1 class="h1 style-1">'.esc_html( $term_name ).'</h1>';
                $cat_banner.= '<div class="simple-text font-fam-3">';
                $cat_banner.= '<p>'.wp_kses_post( $desc_cat_r ).'</p>';
                $cat_banner.= '</div>';
                $cat_banner.= '</div>';
                $cat_banner.= '</div>';
                $cat_banner.= '</div>';

                //product
                $cat_banner.= '<section class="section">';
                $cat_banner.= '<div class="container">';
                $cat_banner.= '<div class="product-item-wrap">';
            
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
                $i=1;
                if ( $wp_query->have_posts() ) {
                    while ( $wp_query->have_posts() ) : $wp_query->the_post();
                        global $post, $woocommerce, $product;
                        $prod_price = $product->get_price_html();
                        $sale = get_post_meta( get_the_ID(), '_sale_price', true);
                        $pa_liter = $product->get_attribute( 'pa_liter' );
                        $class = 'right';
                        $class_sm = '';
                        if(($i % 2) == 0){$class = 'left';}
                        $class_sm = 'sm'; // if(($i % 6) == 0 || $i == 2){$class_sm = 'sm';}
                        $image_id = get_post_thumbnail_id();
                        $image_link  = wp_get_attachment_image_src($image_id, '', true);
                        $fl_img_link = $image_link[0];
                        $prod_img = floris_opt_aq_resize( $fl_img_link, '412', '482', false, true);

                        $cat_banner.= '<div class="product-item type-2 '.esc_html( $class ).' '.esc_html( $class_sm ).' top-align item-animation">';
                        $cat_banner.= '<div class="image">';
                        if($sale){
                            $cat_banner.= '<div class="new sale">sale</div>';
                        }
                        if( $prod_img ){
                            $cat_banner.= '<a href="'.get_the_permalink().'" ><img src="'.esc_url( $prod_img ).'" alt="'.esc_html( $image_link[3] ).'"></a>';
                            if(is_plugin_active('floris-plugin/floris-plugin.php') && floris_get_option('prod_quickview_btn') && !$product->is_type('external')){
                                $cat_banner.= '<span class="btn-quickview" data-url="'.get_the_permalink().'" data-product_id="'.get_the_ID().'" data-close="'.get_template_directory_uri().'/assets/img/close_sm.png"></span>';
                                $cat_banner.= '<div class="loader-wrapper button_load" style="display: none;"><div class="loader-inner ball-pulse"><div></div><div></div><div></div></div></div>';
                            }
                        }
                        $cat_banner.= '<div class="title item-title">';
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
                    $i++;
                    endwhile;
                } else {
                    $cat_banner.= '<div class="text-center">';
                    $cat_banner.= '<h4 class="h4">no products</h4>';
                    $cat_banner.= '</div>';
                }
                // end loop
                wp_reset_postdata();

                $cat_banner.= '</div>';
                $cat_banner.= '</div>';
                $cat_banner.= '</section>';
            }
        }?>
        <div class="filter-list">
            <div class="list-open">
                <span><?php esc_html_e( 'Filter', 'floris' ); ?> <b class="drop-arrow"><img src="<?php print esc_url( get_template_directory_uri().'/assets/img/drop_arrow.png' ); ?>" alt=""></b></span>
            </div>
            <ul class="list-slide">
                <?php print wp_kses_post( $cat_filter ); ?>
            </ul>
        </div>
        <?php print $cat_banner; 
    } else {
    ?>
        <div class="vc_empty_space" style="height: 132px"><span class="vc_empty_space_inner"></span></div>
        <div class="container">
            <div class="row">
                <h1 class="h4 text-center"><?php esc_html_e('WooCommerce not Activated!', 'floris'); ?></h1>
            </div>
        </div>
    <?php
    }?>