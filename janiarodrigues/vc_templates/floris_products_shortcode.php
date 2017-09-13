<?php
    $per_page = $orderby = $order = $cats = $css = $hide_button = $featured = $title_price_under='';
    $atts = vc_map_get_attributes($this->getShortcode(), $atts);
    extract($atts);
    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    if( class_exists( 'WooCommerce' ) ) {
        $cats_id = $cats;
        $cats = str_replace(' ', '', $cats_id);

        $terms = get_terms("product_cat");
        $category_id = '';
        foreach ($terms as $term) {
            $term_id = $term->term_id;
            if(!empty($term_id)){
              $category_id.= $term_id;
            }
            $category_id.= ',';
        }
        if($cats == '' || $cats == 'All') {
          $cats = str_replace(' ', '', $category_id);
          $catsArr = explode(',', $cats);
        } else {
         $catsArr = explode(',', $cats);
        }
    ?>
        <div class="product-item-wrap <?php print esc_html($css_class); ?>">
            <?php
                
                if($featured){
                    $meta_query   = WC()->query->get_meta_query();
                    $meta_query[] = array(
                    'key'   => '_featured',
                    'value' => 'yes'
                    );
                }else{
                    $meta_query ='';
                }

                if (is_numeric($catsArr[0])) {
                    $field_type = 'term_id';
                }else{
                    $field_type = 'slug';
                }

                $args = array (
                    'suppress_filters' => 'false',
                    'post_type'        => 'product',
                    'posts_per_page'   => esc_html($per_page),
                    'orderby'          => esc_html($orderby),
                    'order'            => esc_html($order),
                    'tax_query'        => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field'    => $field_type,
                            'terms'    => ( function_exists('lang_object_ids') ? lang_object_ids( $catsArr,'product_cat',false) : $catsArr )
                        )
                    ),
                    'meta_query'  =>  $meta_query
                );
                $query = new WP_Query( $args);
                    if ( $query->have_posts() ) { $i = 1;
                        while ( $query->have_posts() ) { $query->the_post();
                            global $product;
                            $class = 'right';
                            $class_sm = '';
                            if(($i % 2) == 0){$class = 'left';}
                            $class_sm = 'sm'; // if(($i % 6) == 0 || $i == 2){$class_sm = 'sm';}
                            if( $title_price_under == true ){$class_sm.= ' text-center';}
            ?>
                <div class="product-item <?php print esc_html( $class ).' '.$class_sm; ?> item-animation hover-image-item">
                    <div class="image" <?php print wp_kses_post( ( $title_price_under == true ? 'style="float: none;"' : '' ) ); ?>>
                        <?php
                            $image_id = get_post_thumbnail_id();
                            $image_link  = wp_get_attachment_image_src($image_id, '', true);
                            $fl_img_link = $image_link[0];
                            $prod_img = floris_opt_aq_resize( $fl_img_link, '412', '482', false, true);
                            if( $prod_img ){
                        ?>
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php print esc_url( $prod_img ); ?>" alt="<?php print esc_html( $image_link[3] ); ?>">
                                </a>
                                <?php if(is_plugin_active('floris-plugin/floris-plugin.php') && floris_get_option('prod_quickview_btn') && !$product->is_type('external')){ ?>
                                    <span class="btn-quickview" data-url="<?php the_permalink(); ?>" data-product_id="<?php the_ID(); ?>" data-close="<?php print esc_url( get_template_directory_uri().'/assets/img/close_sm.png' );?>"></span>
                                    <div class="loader-wrapper button_load" style="display: none;"><div class="loader-inner ball-pulse"><div></div><div></div><div></div></div></div>
                                <?php } 
                            }
                        if($title_price_under != true){
                        ?>
                            <div class="title item-title">
                                <h4 class="h4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <?php 
                                    if (class_exists('floris_wcva_shop_page_swatches')) {
                                        $floris_wcva_shop_page_swatches = new floris_wcva_shop_page_swatches;
                                        print '<div class="floris_swatches_shop">'.$floris_wcva_shop_page_swatches->wcva_change_shop_attribute_swatches($product).'</div>';
                                    }
                                ?>
                                <?php
                                    $pa_liter = $product->get_attribute( 'pa_liter' );
                                ?>
                                <p class="sub-title"><?php if($pa_liter){print wp_kses_post( '<b>'.$pa_liter.'&nbsp;&ndash;</b>' );}?><span> <?php print wp_kses( $product->get_price_html(), array( 'span' => array(), 'del' => array(), 'ins' => array() ) ); ?></span></p>
                            </div>
                        <?php } ?>
                    </div>
                    <?php if($title_price_under == true){ ?>
                        <div class="title_price_under">
                            <h4 class="h4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <?php 
                                if (class_exists('floris_wcva_shop_page_swatches')) {
                                    $floris_wcva_shop_page_swatches = new floris_wcva_shop_page_swatches;
                                    print '<div class="floris_swatches_shop">'.$floris_wcva_shop_page_swatches->wcva_change_shop_attribute_swatches($product).'</div>';
                                }
                            ?>
                            <?php
                                $pa_liter = $product->get_attribute( 'pa_liter' );
                            ?>
                            <p class="sub-title"><?php if($pa_liter){print wp_kses_post( '<b>'.$pa_liter.'&nbsp;&ndash;</b>' );}?><span> <?php print wp_kses( $product->get_price_html(), array( 'span' => array(), 'del' => array(), 'ins' => array() ) ); ?></span></p>
                        </div>
                    <?php } ?>
                </div>
                <?php $i++;} } 
                wp_reset_postdata();?>
        </div>
            <?php 
                if(!$hide_button) {
                    if($query->max_num_pages > 1) {                        
                        $catsArr = implode(',', $catsArr);
            ?>
                        <div class="center-align" style="position: relative;">
                            <?php if(is_plugin_active('floris-plugin/floris-plugin.php')){ ?>
                                <a href="<?php print esc_url( ( $cats_id == 'All' ? get_permalink( wc_get_page_id( 'shop' ) ) : get_category_link( $catsArr ) ) ); ?>" class="button-style more <?php print wp_kses_post( ( !is_plugin_active('woocommerce-multilingual/wpml-woocommerce.php') ? 'load-more' : '' ) ); ?>" data-term-id="<?php print esc_html( $catsArr ); ?>" data-amount="<?php print esc_html($per_page); ?>" data-orderby="<?php print esc_html($orderby); ?>" data-order="<?php print esc_html($order); ?>" data-current-page="1" data-max-page="<?php print($query->max_num_pages); ?>" data-under="<?php print esc_html( $title_price_under ); ?>"><span><?php esc_html_e('more products', 'floris') ?></span></a>
                                <div class="loader-wrapper button_load" style="display: none;top: 60px;"><div class="loader-inner ball-pulse"><div></div><div></div><div></div></div></div>
                            <?php } else { _e('<span class="not_floris" style="position: relative;">Floris Plugin not Activated!</span>','floris'); } ?>
                        </div>
            <?php }  }
} else { ?> 
    <div class="product-item-wrap">
        <div class="text-center">
            <h4 class="h4"><?php esc_html_e('WooCommerce not Activated!', 'floris'); ?></h4>
        </div>
    </div>
<?php } ?>