<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/*-----------------------------------------------------------------------------------*/
/* Start templatation Functions - Please refrain from editing this section
/*-----------------------------------------------------------------------------------*/

include_once get_template_directory(). '/inc/constants.php';   // Theme constants
include_once get_template_directory(). '/inc/init.php';        // Theme loading starts.
include_once get_template_directory(). '/inc/extras.php';        // Theme update.
include_once get_template_directory(). '/inc/post-like.php';        // Theme like.
include_once get_template_directory(). '/inc/widgets/widget_pop_post.php';        // Theme widgets.
if( !function_exists('is_plugin_active') ) {           
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
if (is_plugin_active( 'woocommerce-colororimage-variation-select/woocommerce-colororimage-variation-select.php' )) {
    include_once get_template_directory(). '/woocommerce/floris_class_shop_page_swatchs.php';
}

/*-----------------------------------------------------------------------------------*/
/* You can put your own functions below temporarily.
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'post-formats', array('video') );
add_theme_support( 'woocommerce' );
/*Ajax product*/
add_action( 'wp_ajax_load_products_items', 'floris_load_products_items_function' );
add_action( 'wp_ajax_nopriv_load_products_items', 'floris_load_products_items_function' );

function floris_load_products_items_function () {
    if (!isset($_POST['num']) || !isset($_POST['next_page'])) die();
    
    $num       = ( $_POST['num'] ? $_POST['num'] : '' );
    $under     = ( $_POST['under'] ? $_POST['under'] : '' );
    $orderby   = ( $_POST['orderby'] ? $_POST['orderby'] : '' );
    $order     = ( $_POST['order'] ? $_POST['order'] : '' );
    $term_id   = ( $_POST['term_id'] ? $_POST['term_id'] : '' );
    $next_page = ( $_POST['next_page'] ? $_POST['next_page'] : '' );
    ?>
                
    <div class="more-insert">
<?php
    $term_id = explode(',', $term_id);
    $args = array (
        'posts_per_page' => $num,
        'paged'          => $next_page,
        'post_type'      =>  'product',
        'orderby'        => $orderby,
        'order'          => $order,
        'tax_query'      => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'id',
                'terms'    => ( function_exists('lang_object_ids') ? lang_object_ids( $term_id,'product_cat',false) : $term_id )
            )
        )
    );
    $query = new WP_Query( $args);
        if ( $query->have_posts() ) { $i = 1;
            while ( $query->have_posts() ) { $query->the_post();
                global $post, $woocommerce, $product;
                $pa_liter = $product->get_attribute( 'pa_liter' );
                $class = 'right';
                $class_sm = '';
                if(($i % 2) == 0){$class = 'left';}
                if(($i % 6) == 0 || $i == 2){$class_sm = 'sm';}
                if( $under == true ){$class_sm.= ' text-center';}
                $image_id = get_post_thumbnail_id();
                $image_link  = wp_get_attachment_image_src($image_id, '', true);
?>
    <div class="product-item <?php print esc_html( $class.' '.$class_sm ); ?> item-animation hover-image-item">
        <div class="image" <?php print wp_kses_post( ( $under == true ? 'style="float: none;"' : '' ) ); ?>>
            <?php if( $image_link ){ ?>
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php print esc_url( $image_link[0] ); ?>" alt="<?php print esc_html( $image_link[3] ); ?>">
                </a>
                <?php 
                    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
                    if(is_plugin_active('floris-plugin/floris-plugin.php') && floris_get_option('prod_quickview_btn') && !$product->is_type('external')){ 
                ?>
                    <span class="btn-quickview" data-url="<?php the_permalink(); ?>" data-product_id="<?php the_ID(); ?>" data-close="<?php print esc_url( get_template_directory_uri().'/assets/img/close_sm.png' );?>"></span>
                    <div class="loader-wrapper button_load" style="display: none;"><div class="loader-inner ball-pulse"><div></div><div></div><div></div></div></div>
                <?php }
            }
            if($under !== true){
            ?>
                <div class="title item-title">
                    <h4 class="h4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <?php 
                        if (class_exists('floris_wcva_shop_page_swatches')) {
                            $floris_wcva_shop_page_swatches = new floris_wcva_shop_page_swatches;
                            print '<div class="floris_swatches_shop">'.$floris_wcva_shop_page_swatches->wcva_change_shop_attribute_swatches($product).'</div>';
                        }
                    ?>
                    <p class="sub-title">
                        <?php 
                            if($pa_liter){
                                print wp_kses_post( '<b>'.$pa_liter.'&nbsp;&ndash;</b>' );
                        }?>
                    <span><?php print wp_kses( $product->get_price_html(), array( 'span' => array(), 'del' => array(), 'ins' => array() ) );?></span></p>
                </div>
            <?php } ?>
        </div>
        <?php if($under == true){ ?>
            <div class="title_price_under">
                <h4 class="h4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <?php
                    $post_id = get_the_ID();
                    $product = new WC_Product($post_id);
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
    die();
}
/*Ajax category product*/
add_action( 'wp_ajax_load_products_cat', 'floris_load_products_cat_function' );
add_action( 'wp_ajax_nopriv_load_products_cat', 'floris_load_products_cat_function' );

function floris_load_products_cat_function () {
    if (!isset($_POST['next_page']) || !isset($_POST['term_id'])) die();
    $term_id = $_POST['term_id'];
    $prod_backside = $_POST['prod_backside'];
    $next_page = $_POST['next_page'];
    $args = array(
        'posts_per_page'  => '4',
        'paged'           => $next_page,
        'post_type'   =>  'product',
        'order'   => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy'  => 'product_cat',
                'field'     => 'id',
                'terms'     => $term_id
            )
        )
    );
    $query = new WP_Query( $args);
    $i=1;
        if ( $query->have_posts() ) { 
            while ( $query->have_posts() ) { $query->the_post();
                global $post, $woocommerce, $product;
                $sale = get_post_meta( get_the_ID(), '_sale_price', true);
                $pa_liter = $product->get_attribute( 'pa_liter' );
                $image_id = get_post_thumbnail_id();
                $image_link  = wp_get_attachment_image_src($image_id, '', true);
?>
            
                <div class="col-50" <?php if( ($i%2) == 1){ print wp_kses_post( 'style="clear: left;"' ); } ?>>
                    <div class="category-item hover-image-item">                        
                        <div class="image">
                            <?php 
                                if($sale){print wp_kses_post( '<div class="new sale">sale</div>' );}
                                if( has_post_thumbnail() ){
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
                                ?>
                                    <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                                        <div class="flipper">
                                            <a class="front" href="<?php the_permalink(); ?>">
                                                <img src="<?php print esc_url( $image_link[0] ); ?>" alt="product">
                                            </a>
                                            <a class="back" href="<?php the_permalink(); ?>">
                                                <img src="<?php print esc_url( $thumb_link[0] ); ?>" alt="product_thumb">
                                            </a>
                                        </div>
                                    </div>
                                    <?php } else { ?>
                                        <a href="<?php the_permalink(); ?>"><img src="<?php print esc_url( $image_link[0] ); ?>" alt="<?php the_title(); ?>"></a>
                                <?php } }?>
                        </div>  
                        <div class="item-title">
                            <h4 class="h4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <?php 
                                if (class_exists('floris_wcva_shop_page_swatches')) {
                                    $floris_wcva_shop_page_swatches = new floris_wcva_shop_page_swatches;
                                    print '<div class="floris_swatches_shop">'.$floris_wcva_shop_page_swatches->wcva_change_shop_attribute_swatches($product).'</div>';
                                }
                            ?>
                            <p class="sub-title">
                                <?php 
                                    if($pa_liter){
                                        print wp_kses_post( '<b>'.$pa_liter.'&nbsp;&ndash;</b>' );
                                }?>
                            <span><?php print wp_kses( $product->get_price_html(), array( 'span' => array(), 'del' => array(), 'ins' => array() ) );?></span></p>
                        </div>
                    </div>
                </div>     
    <?php $i++;} }
    wp_reset_postdata();
    die();
}
/*=======================================================================*/
/*Ajax popup product*/
add_action( 'wp_ajax_load_popup_prod', 'floris_load_popup_prod_function' );
add_action( 'wp_ajax_nopriv_load_popup_prod', 'floris_load_popup_prod_function' );

function floris_load_popup_prod_function () {
    global $post, $woocommerce, $product;
    if (!isset($_POST['product_id'])) die();
    $product_id = $_POST['product_id'];
    $prod_popup =  new WC_Product_Variable($product_id);

    $attachment_ids = $prod_popup->get_gallery_image_ids();
    if( $prod_popup->is_type('variable') && floris_get_option('product_variable') ){
        $variations = $prod_popup->get_available_variations();
        foreach ( $variations as $variation ) { 
            if (!empty($variation['image_id'])) {
                $attachment_ids[] = $variation['image_id'];
            }
        }
    }

    $post_popup = get_post( $product_id );
    $post_content = $post_popup->post_content;
    $post_content = substr($post_content, 0, 290);
    $post_content = substr($post_content, 0, strrpos($post_content, ' '));
    $cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
    $tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );
?>
    <div class="left-part">
        <div class="vertical-slider">
            <div class="swiper-wrapper">
            <?php if (has_post_thumbnail($product_id)) {?>
                <div class="swiper-slide<?php if(!empty($attachment_ids)) { } else {print ('-floris');}?>">
                    <div class="detail-mark <?php if(!empty($attachment_ids)) { } else {print ('resp-img');}?>">
                        <?php 
                            $image_post  = wp_get_attachment_image_src(get_post_thumbnail_id( $product_id ), '', true);
                            print wp_kses_post( '<img class="'.( !empty($attachment_ids)  ? 'resp-img': '' ).' " src="'.$image_post[0].'" alt="'.$image_post[3].'" />' );
                        ?>
                    </div>
                </div>
                <?php 
                    foreach ( $attachment_ids as $attachment_id ) { 
                    $image_link  = wp_get_attachment_image_src($attachment_id, '', true);
                ?>
                        <div class="swiper-slide">
                            <div class="detail-mark">
                                <?php print wp_kses_post( '<img class="resp-img" src="'.$image_link[0].'" alt="'.$image_link[3].'" />' );?>
                            </div>
                        </div>
                <?php } ?>
            <?php } ?>
                </div>
            <div class="swiper-arrow-left slider-arrow"><img src="<?php print esc_url( get_template_directory_uri().'/assets/img/arrow_left.png' );?>" alt="arrow_left"></div>
            <div class="swiper-arrow-right slider-arrow"><img src="<?php print esc_url( get_template_directory_uri().'/assets/img/arrow_right.png' );?>" alt="arrow_right"></div>
        </div>
    </div>
    <div class="woocommerce">
        <div class="check-content product">
            <div class="scroll-wrap">
                <div class="sale-desc">
                    <div class="desc">   
                        <h2 class="h2 style-4 title font-fam-3"><?php print wp_kses_post( get_the_title($product_id) ); ?></h2>
                        <?php if( floris_get_option('products_sku') ){ ?>
                            <h4 class="h4 style-1"><?php esc_html_e( 'SKU: ', 'floris' ); print wp_kses_post( ( $sku = $prod_popup->get_sku() ) ? $sku : esc_html__( 'N/A', 'floris' ) ); ?></h4>
                        <?php }
                            if( floris_get_option('products_category') ){
                                print wp_kses_post( $prod_popup->get_categories( ', ', '<h4 class="h4 style-1 posted_in">' . _n( 'Categoria:', 'Categorias:', $cat_count, 'floris' ) . ' ', '</h4>' ) );
                            }
                            if( floris_get_option('products_tag') ){
                                print wp_kses_post( $prod_popup->get_tags( ', ', '<h4 class="h4 style-1 tagged_as">' . _n( 'Tag:', 'Tags:', $tag_count, 'floris' ) . ' ', '</h4>' ) ); 
                            }
                        ?>
                        <?php 
                            $currency_symbol = get_woocommerce_currency_symbol();
                            $stock_quantity = $prod_popup->get_stock_quantity();
                            $price = $prod_popup->get_price();
                            // $min_variation_price = $prod_popup->get_variation_regular_price('min');
                            // $max_variation_price = $prod_popup->get_variation_regular_price('max');
                        ?>
                        <div class="prod-price">
                            <?php 
                                if ($prod_popup->get_price_html() == '') {
                                    echo '<span><span>'.$currency_symbol.'</span>'.number_format($price, 2, '.', '').'</span>';
                                }else{
                                    echo '<span>'.$prod_popup->get_price_html().'</span>';
                                }
                            ?>
                        </div>
                        <?php 
                        $available_variations = $prod_popup->get_available_variations();
                        $attributes = $prod_popup->get_variation_attributes();

                        $attribute_keys           =  array_keys( $attributes );
                        $_coloredvariables        =  get_post_meta( $product_id, '_coloredvariables', true );
                        $wcva_global_activation   =  get_option("wcva_woocommerce_global_activation");
                        $wcva_global              =  get_option("wcva_global");

                        ?>
                        <div class="desc-button">
                            <form class="variations_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $prod_popup->id ); ?>" data-product_variations="<?php echo htmlspecialchars( json_encode( $available_variations ) ) ?>">
                                <?php do_action( 'woocommerce_before_variations_form' ); ?>
                                    <?php if ($prod_popup->is_type( 'variable' )) : ?>
                                        <table class="variations" cellspacing="0">
                                            <tbody>
                                                <?php foreach ( $attributes as $attribute_name => $options ) : ?>
                                                    <?php 
                                                        if (isset( $_coloredvariables[$attribute_name]['display_type'])) {
                                                            $attribute_display_type  = $_coloredvariables[$attribute_name]['display_type'];
                                                        } elseif ((isset($wcva_global_activation)) && ($wcva_global_activation == "yes"))  {
                                                            $attribute_display_type  = $wcva_global[$attribute_name]['display_type'];
                                                        }                            
                                                        $attribute_display_type = apply_filters('wcva_attribute_display_type', $attribute_display_type );
                                                        $selected = '';
                                                    ?>
                                                    <tr>
                                                        <td class="label"><label for="<?php print wp_kses_post( sanitize_title( $attribute_name ) ); ?>"><?php print wp_kses_post( wc_attribute_label( $attribute_name ) ); ?></label></td>
                                                        <td class="value">
                                                            <?php 
                                                                if (isset($attribute_display_type) && ($attribute_display_type  == "colororimage") && class_exists('wcva_swatch_form_fields')) {                                
                                                                        wcva_dropdown_variation_attribute_options1( array( 'options' => $options, 'attribute' =>        $attribute_name, 'product' => $prod_popup, 'selected' => $selected ) );
                                                                        $fields   = new wcva_swatch_form_fields();
                                                                        $fields->wcva_load_colored_select($prod_popup,$attribute_name,$options,$_coloredvariables,$selected);
                                                                }else{
                                                            ?>
                                                                    <select id="<?php echo sanitize_title($attribute_name); ?>" class="popup_variations" name="attribute_<?php echo sanitize_title($attribute_name); ?>" data-attribute_name="attribute_<?php echo sanitize_title($attribute_name); ?>" data-show_option_none="yes">
                                                                        <option value="" popup-variation-id = "0">Escolha uma opção</option>
                                                                    <?php
                                                                        $attr_count = 0;
                                                                        
                                                                        foreach (array_reverse($options) as $attribute) { 
                                                                            $variation = $available_variations[$attr_count];
                                                                            $variation_id = $variation['variation_id'];
                                                                            $popup_attribute = ucfirst($attribute);
                                                                            echo "<option value='$attribute' class='attached enabled' popup-variation-id = '$variation_id' >$popup_attribute</option>";
                                                                     
                                                                            $attr_count++; 
                                                                        }
                                                                    ?>
                                                                    </select>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <tr>
                                                    <td>   
                                                        <dv class="reset_variations popup_reset_variations" style="display:none; visibility: hidden;">Seleção Clara</div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>
                                    <?php if ( $prod_popup->is_in_stock() ) : ?>
                                    <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

                                    <div class="single_variation_wrap">
                                        <?php
                                            /**
                                             * woocommerce_before_single_variation Hook.
                                             */
                                            do_action( 'woocommerce_before_single_variation' );

                                            /**
                                             * woocommerce_single_variation hook. Used to output the cart button and placeholder for variation data.
                                             * @since 2.4.0
                                             * @hooked woocommerce_single_variation - 10 Empty div for variation data.
                                             * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
                                             */
                                            ?>

                                            <div class="woocommerce-variation single_variation">
                                                <div class="woocommerce-variation-price" style="display: none;"></div>
                                                <div class="woocommerce-variation-availability" style="display: none;">
                                                    <p class="stock in-stock"><span><?php echo $stock_quantity ?></span> em estoque</p>
                                                </div>
                                                <div class="woocommerce-variation-error" style="display: none;">
                                                    <p><?php esc_html_e('Desculpe, este produto não está disponível. Escolha uma combinação diferente.', 'floris'); ?></p>
                                                </div>
                                            </div>
                                            <div class="woocommerce-variation-add-to-cart variations_button">
                                                <div class="counter jx font-fam-2 rs-add-bl">
                                                    <div class="minus-val rs-count-block"><i class="fa fa-minus"></i></div>
                                                        <input class="rs-fl-number" type="text" value="1" name="quantity">
                                                    <div class="plus-val rs-count-block"><i class="fa fa-plus"></i></div>
                                                </div>
                                                <a href="<?php the_permalink($prod_popup->id); ?>" data-product_id="<?php print wp_kses_post( absint( $prod_popup->id ) ); ?>" class="single_add_to_cart_button button add_to_cart_button button-style braun product_single popup_add_to_cart <?php if (!empty($attributes)){ echo 'disabled'; } ?>"><span><?php esc_html_e( 'Adicionar ao Carrinho', 'floris' );  ?></span></a>
                                                <input type="hidden" name="add-to-cart" value="<?php print wp_kses_post( absint( $prod_popup->id ) ); ?>" />
                                                <input type="hidden" name="product_id" value="<?php print wp_kses_post( absint( $prod_popup->id ) ); ?>" />
                                                <input type="hidden" id="popup_variation_id" name="variation_id" class="variation_id" value="0" />
                                            </div>
                                            <?php
                                            /**
                                             * woocommerce_after_single_variation Hook.
                                             */
                                            do_action( 'woocommerce_after_single_variation' );
                                        ?>
                                    </div>

                                    <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
                                    <?php else : ?>
                                        <a href="<?php print esc_url( get_permalink($prod_popup->id) ); ?>" class="button-style button braun"><span><?php esc_html_e('Leia Mais', 'floris'); ?></span></a>
                                    <?php endif; ?>

                                <?php do_action( 'woocommerce_after_variations_form' ); ?>
                            </form>
                        </div> 
                            <div class="simple-text font-fam-3">
                                <?php if (!empty($post_content)) { ?>
                                <?php print wp_kses_post( '<span>'.$post_content.'... <a href="#" class="more-popup-open">'.esc_html('Veja Mais', 'floris').'</a></span>' ); ?>
                                <?php } ?>
                            </div>
                            <div class="menu-folow share-link">
                                <span class="font-fam-1"><?php print esc_html('COMPARTILHAR:', 'floris'); ?></span>
                                    <?php
                                        $pinImg = '';
                                        if(has_post_thumbnail( $product_id ) ) {
                                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'medium' );
                                            $pinImg = urlencode($image[0]);
                                        }
                                        $permalink = esc_attr( urlencode( get_permalink($product_id) ) );
                                        $title = esc_attr( urlencode( get_the_title($product_id) ) );
                                    ?>
                                    <a href="http://www.facebook.com/sharer.php?u=<?php print wp_kses_post( $permalink ); ?>" target="_blank"><i class="icon-facebook"></i><i class="icon-facebook"></i></a>
                                    <a href="http://twitter.com/home?status=<?php print wp_kses_post( $title ); ?> - <?php print wp_kses_post( $permalink ); ?>" target="_blank"><i class="icon-twitter"></i><i class="icon-twitter"></i></a>
                                    <a href="https://plus.google.com/share?url=<?php print wp_kses_post( $permalink ); ?>&title=<?php print wp_kses_post( $title ); ?>" target="_blank"><i class="icon-gplus"></i><i class="icon-gplus"></i></a>
                                    <a href="http://pinterest.com/pin/create/button/?url=<?php print wp_kses_post( $permalink ); ?>&media=<?php print wp_kses_post( $pinImg ); ?>&description=<?php print wp_kses_post( $title ); ?>" target="_blank"><i class="icon-pinterest"></i><i class="icon-pinterest"></i></a>
                            </div>
                    </div>    
                </div>  
            </div>
            <div class="more-popup">
                <div class="close-popup-more"><span></span></div>
                <div class="sale-desc">
                    <div class="desc">
                        <div class="simple-text font-fam-3">
                            <?php print wp_kses_post( '<p>'.$post_popup->post_content.'</p>' ); ?>
                        </div>
                    </div>
                </div>
            </div>         
        </div>
    </div>
<?php die();
}

#-----------------------------------------------------------------#
# Widget Areas/ Sidebars
#-----------------------------------------------------------------#
if(function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => esc_html__('Single Blog', 'floris'),
        'description' => esc_html__('Custom Floris sidebar', 'floris'),
        'id'=> 'sidebar-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>'
    ));
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    if(is_plugin_active('woocommerce/woocommerce.php')){ 
        register_sidebar(array(
            'name' => esc_html__('Shop', 'floris'),
            'id'=> 'woo-sidebar',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>'
        ));
    }
}
/*==========================Pagination====================================*/
$floris_pag_nav = array(
    'before'           => '<div class="pagination-box"><div class="pages-for-posts">' . esc_html__('Páginas:', 'floris'),
    'after'            => '</div></div>',
    'link_before'      => '<span>',
    'link_after'       => '</span>',
    'next_or_number'   => 'number',
    'nextpagelink'     => esc_html__('Próxima Página', 'floris'),
    'previouspagelink' => esc_html__('Página Anterior', 'floris'),
    'pagelink'         => '%',
    'print'             => 1,
); 

/*==========================Pagination====================================*/
function floris_pagination($pages = '', $range = 2){
  $showitems = ($range * 2)+1;  
  global $paged;
  if(empty($paged)) $paged = 1;

  if($pages == ''){
     global $wp_query;
     $pages = $wp_query->max_num_pages;
     
     if(!$pages){
         $pages = 1;
     }
  }   

  if(1 != $pages){
    print wp_kses_post( '<div class="pagination-box">' );
    if($paged > 1 && 1 < $pages) print wp_kses_post( '<a href="'.get_pagenum_link($paged - 1).'" class="prev-page">Página Anterior</a>' );
    print wp_kses_post( '<div class="pages">' );  
    for ($i=1; $i <= $pages; $i++){
      if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
        print wp_kses_post( ($paged == $i)? "<a class='active'>".$i."</a>":"<a href='".get_pagenum_link($i)."'>".$i."</a>" );
      }
    }
    print wp_kses_post( '</div>' );
    if ($paged < $pages && 1 < $pages) print wp_kses_post( '<a href="'.get_pagenum_link($paged + 1).'" class="next-page">Próxima Página</a>' );
    print wp_kses_post( '</div>' );
  }
}

/*-----------------------------------------------------------------------------------*/
/* /End
/*-----------------------------------------------------------------------------------*/
//remove_action
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
//add_action
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 11 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

/*Stop Plugins Activation*/
if ( ! function_exists( 'floris_disable_updates' ) ) {
    function floris_disable_updates($value) {
        if( isset( $value->response['js_composer/js_composer.php'] ) ){
            unset($value->response['js_composer/js_composer.php']);
        }
       return $value;
    }
}
add_filter('site_transient_update_plugins', 'floris_disable_updates');

/* Get cart contents count */
function floris_get_cart_contents_count() {
    $cart_count = apply_filters( 'nm_cart_count', WC()->cart->cart_contents_count );
    return $cart_count;
}

/* Get refreshed cart fragments */
function floris_get_cart_fragments( $return_array = array() ) {
    // Get mini cart
    ob_start();
    woocommerce_mini_cart();
    $mini_cart = ob_get_clean();
    
    return apply_filters( 'woocommerce_add_to_cart_fragments', array(
        'div.cart_ajax'  => '<div class="widget_shopping_cart cart_ajax"><div>'.$mini_cart.'</div></div>'
    ) );
}
/* Get refreshed cart hash */
function floris_get_cart_hash() {
    return apply_filters( 'woocommerce_add_to_cart_hash', WC()->cart->get_cart_for_session() ? md5( json_encode( WC()->cart->get_cart_for_session() ) ) : '', WC()->cart->get_cart_for_session() );
}

/*  Mini cart - AJAX: Remove product from cart */
function floris_mini_cart_remove_product() {
    $cart_item_key = $_POST['cart_item_key'];
    
    $cart = WC()->instance()->cart;
    $removed = $cart->remove_cart_item( $cart_item_key ); // Note: WP 2.3 >
    
    if ( $removed ) {
        $json_array['status'] = '1';
        $json_array['fragments'] = floris_get_cart_fragments();
        $json_array['cart_hash'] = floris_get_cart_hash();
        $json_array['cart_count'] = floris_get_cart_contents_count();
    } else {
        $json_array['status'] = '0';
    }
    
    print json_encode( $json_array );
            
    exit;
}
add_action( 'wp_ajax_mini_cart_remove_product' , 'floris_mini_cart_remove_product' );
add_action( 'wp_ajax_nopriv_mini_cart_remove_product', 'floris_mini_cart_remove_product' );

/*  Popup cart - AJAX */
function floris_poput_cart_product(){
    $json_array['fragments'] = floris_get_cart_fragments();
    $json_array['cart_count'] = floris_get_cart_contents_count();
    print json_encode( $json_array );

    exit;
}
add_action( 'wp_ajax_poput_cart_product' , 'floris_poput_cart_product' );
add_action( 'wp_ajax_nopriv_poput_cart_product', 'floris_poput_cart_product' );

//remove tab reviews
function floris_remove_product_tabs( $tabs ){
    if( !floris_get_option('product_reviews') ){
        unset( $tabs['reviews'] );
    }
    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'floris_remove_product_tabs', 98 );

//--Products per page--//
function floris_product_per_page(){
    if( floris_get_option('prod_per_page') ){
        $cols = floris_get_option('prod_per_page');
        return $cols;
    } else {
        return false;
    }
}
add_filter( 'loop_shop_per_page', 'floris_product_per_page', 20 );

add_action( 'wp_ajax_woocommerce_add_to_cart_variable_rc', 'floris_add_to_cart_variable_rc_callback' );
add_action( 'wp_ajax_nopriv_woocommerce_add_to_cart_variable_rc', 'floris_add_to_cart_variable_rc_callback' );
function floris_add_to_cart_variable_rc_callback() {
    
    ob_start();    
    $product_id = apply_filters( 'woocommerce_add_to_cart_product_id', absint( $_POST['product_id'] ) );
    $quantity = empty( $_POST['quantity'] ) ? 1 : apply_filters( 'woocommerce_stock_amount', $_POST['quantity'] );
    $variation_id = $_POST['variation_id'];
    $variation  = $_POST['variation'];
    $passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $quantity );

    if ( $passed_validation && WC()->cart->add_to_cart( $product_id, $quantity, $variation_id, $variation  ) ) {
        do_action( 'woocommerce_ajax_added_to_cart', $product_id );
        if ( get_option( 'woocommerce_cart_redirect_after_add' ) == 'yes' ) {
            wc_add_to_cart_message( $product_id );
        }

        // Return fragments
        WC_AJAX::get_refreshed_fragments();
    } else {
        $this->json_headers();

        // If there was an error adding to the cart, redirect to the product page to show any errors
        $data = array(
            'error' => true,
            'product_url' => apply_filters( 'woocommerce_cart_redirect_after_error', get_permalink( $product_id ), $product_id )
            );
        print json_encode( $data );
    }
    die();
}

if ( ! function_exists( 'floris_woocommerce_set_image_dimensions' ) ) {
    function floris_woocommerce_set_image_dimensions() {
        if ( ! get_option( 'floris_shop_image_sizes_set' ) ) {
            $catalog = array(
                'width'     => '1902',
                'height'    => '1068',
                'crop'      => 0
            );
            
            $single = array(
                'width'     => '1902',
                'height'    => '1068',
                'crop'      => 0
            );
            
            $thumbnail = array(
                'width'     => '1902',
                'height'    => '1068',
                'crop'      => 0
            );
            
            update_option( 'shop_catalog_image_size', $catalog );
            update_option( 'shop_single_image_size', $single );
            update_option( 'shop_thumbnail_image_size', $thumbnail );

            add_option( 'floris_shop_image_sizes_set', '1' );
        }
    }
}
add_action( 'after_switch_theme', 'floris_woocommerce_set_image_dimensions', 1 );
add_action( 'admin_init', 'floris_woocommerce_set_image_dimensions', 1000 );

/*Import content data*/
if ( ! function_exists( 'dgwork_import_files' ) ) :
function dgwork_import_files() {
    return array(
        array(
            'import_file_name'           => 'Floris',
            'import_file_url'            => get_template_directory_uri().'/demo-content/Floris/content.xml',
            'import_widget_file_url'     => get_template_directory_uri().'/demo-content/Floris/widgets.wie',
            'import_customizer_file_url' => get_template_directory_uri().'/demo-content/Floris/customizer.dat',
            'import_redux'               => array(
                array(
                    'file_url'    => get_template_directory_uri().'/demo-content/Floris/redux.json',
                    'option_name' => 'floris_opt',
                ),
            ),
            'import_preview_image_url'   => get_template_directory_uri().'/demo-content/Floris/screen-image.jpg',
        ), 
        array(
            'import_file_name'           => 'Boutique',
            'import_file_url'            => get_template_directory_uri().'/demo-content/Boutique/content.xml',
            'import_widget_file_url'     => get_template_directory_uri().'/demo-content/Boutique/widgets.wie',
            'import_customizer_file_url' => get_template_directory_uri().'/demo-content/Boutique/customizer.dat',
            'import_redux'               => array(
                array(
                    'file_url'    => get_template_directory_uri().'/demo-content/Boutique/redux.json',
                    'option_name' => 'floris_opt',
                ),
            ),
            'import_preview_image_url'   => get_template_directory_uri().'/demo-content/Boutique/screen-image.jpg',
        ), 
        array(
            'import_file_name'           => 'Cessory',
            'import_file_url'            => get_template_directory_uri().'/demo-content/Cessory/content.xml',
            'import_widget_file_url'     => get_template_directory_uri().'/demo-content/Cessory/widgets.wie',
            'import_customizer_file_url' => get_template_directory_uri().'/demo-content/Cessory/customizer.dat',
            'import_redux'               => array(
                array(
                    'file_url'    => get_template_directory_uri().'/demo-content/Cessory/redux.json',
                    'option_name' => 'floris_opt',
                ),
            ),
            'import_preview_image_url'   => get_template_directory_uri().'/demo-content/Cessory/screen-image.jpg',
        ), 
    );
}
add_filter( 'pt-ocdi/import_files', 'dgwork_import_files' );
endif;

if ( ! function_exists( 'dgwork_after_import' ) ) :
function dgwork_after_import( $selected_import ) {
 
    if ( 'Floris' === $selected_import['import_file_name'] ) {
        //Set Menu
        $top_menu = get_term_by('name', 'Menu Main', 'nav_menu');
        $footer_menu = get_term_by('name', 'Footer Menu', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array( 
              'primary-menu' => $top_menu->term_id, 
              'footer-menu' => $footer_menu->term_id,
             ) 
        );
        //Set Front page
       $page = get_page_by_title( 'Home' );
       $blog = get_page_by_title( 'Blog' );
       if ( isset( $page->ID ) ) {
        update_option( 'page_on_front', $page->ID );        
        update_option( 'show_on_front', 'page' );
       }
       if ( isset($blog->ID) ){
        update_option( 'page_for_posts', $blog->ID );
       }
    }elseif ( 'Boutique' === $selected_import['import_file_name'] ) {
        //Set Menu
        $top_menu = get_term_by('name', 'Menu Main', 'nav_menu');
        $footer_menu = get_term_by('name', 'Footer Menu', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array( 
              'mega-menu' => $top_menu->term_id, 
              'primary-menu' => $top_menu->term_id,
              'footer-menu' => $footer_menu->term_id,
             ) 
        );
        //Set Front page
        $page = get_page_by_title( 'Fashion' );
        $blog = get_page_by_title( 'Blog' );
        if ( isset( $page->ID ) ) {
            update_option( 'page_on_front', $page->ID );        
            update_option( 'show_on_front', 'page' );
        }
        //Set Post page
        if ( isset($blog->ID) ){
            update_option( 'page_for_posts', $blog->ID );
        }
        //Set Megamenu settings
        $megamenu_options = get_option('megamenu_settings');
        $megamenu_options['mega-menu']['enabled'] = '1';
        $megamenu_options['mega-menu']['theme'] = 'default_floris';
        update_option('megamenu_settings', $megamenu_options);

        //Set default megamenu widget options
        $megamenu_widget_options = get_option('widget_nav_menu');
        foreach ($megamenu_widget_options as $key => $menu) {
            if (isset($menu['title'])) {
                $menu_object = wp_get_nav_menu_object( $menu['title'] );
                $megamenu_widget_options[$key]['nav_menu'] = $menu_object->term_id;
            }
        }
        update_option('widget_nav_menu', $megamenu_widget_options);
       
    }elseif ( 'Cessory' === $selected_import['import_file_name'] ) {
        //Set Menu
        $top_menu = get_term_by('name', 'Menu Main', 'nav_menu');
        $footer_menu = get_term_by('name', 'Footer Menu', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array( 
              'primary-menu' => $top_menu->term_id, 
              'footer-menu' => $footer_menu->term_id,
             ) 
        );
        //Set Front page
       $page = get_page_by_title( 'Accessories' );
       $blog = get_page_by_title( 'Blog' );
       if ( isset( $page->ID ) ) {
        update_option( 'page_on_front', $page->ID );        
        update_option( 'show_on_front', 'page' );
       }
       if ( isset($blog->ID) ){
        update_option( 'page_for_posts', $blog->ID );
       }
    }
    //Woocommerce pages settings
    $shop = get_page_by_title( 'Shop' );
    $cart = get_page_by_title( 'Cart' );
    $checkout = get_page_by_title( 'Checkout' );
    update_option( 'woocommerce_shop_page_id', $shop->ID ); 
    update_option( 'woocommerce_cart_page_id', $cart->ID );
    update_option( 'woocommerce_checkout_page_id', $checkout->ID );
     
}
add_action( 'pt-ocdi/after_import', 'dgwork_after_import' );
endif;


/************************************************/
/**************** ADMINISTRADOR ****************/
/**********************************************/
// Custom WordPress Login Logo
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {background-image: url(http://www.onewave.com.br/_recipiente/onewave_adm.png);width: 250px;height: 75px;background-size: contain;background-position: center;}
        body.login {background: #00ACC1;}
        .login #backtoblog a, .login #nav a {color: #fff !important;}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


//Link na tela de login para a página inicial 
function my_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
 
function my_login_logo_url_title() {
    return 'ONEWAVE - Criação de sites em Cuiabá';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


//Custom dashboard logo
add_action('admin_head', 'my_custom_logo');


//editando o deashboard
function my_custom_logo() {
echo '
<style type="text/css">
#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
background-image: url(http://www.onewave.com.br/_recipiente/onewave_adm.png) !important;
background-position: 0 0;
color:rgba(0, 0, 0, 0);
background-size: 233%;
background-position: left 4px;
background-repeat: no-repeat;
width: 120px;
font-size: 28px;
}
#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
background-position: 0 0;
}
#adminmenuback {
    background: #0097A7;
}
#wpadminbar {
    background: #0097A7;
}
#adminmenu, #adminmenu .wp-submenu, #adminmenuback, #adminmenuwrap {
    background-color: #0097A7;
}
#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, #adminmenu .wp-menu-arrow, #adminmenu .wp-menu-arrow div, #adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, .folded #adminmenu li.current.menu-top, .folded #adminmenu li.wp-has-current-submenu {
    background: #00BCD4;
}
#adminmenu .wp-has-current-submenu .wp-submenu, #adminmenu .wp-has-current-submenu .wp-submenu.sub-open, #adminmenu .wp-has-current-submenu.opensub .wp-submenu, #adminmenu a.wp-has-current-submenu:focus+.wp-submenu, .no-js li.wp-has-current-submenu:hover .wp-submenu {
    background-color: #006064;
}
#adminmenu li.menu-top:hover, #adminmenu li.opensub>a.menu-top, #adminmenu li>a.menu-top:focus {
    background-color: #00838F;
}
#wpadminbar .menupop .ab-sub-wrapper, #wpadminbar .shortlink-input {
    background: #00838F;
}
#adminmenu a {
    color: #fff !important;
}
#wpadminbar #wp-admin-bar-wp-logo>.ab-item {
    padding: 0 14px !important;
}
</style>
';
}

//hook into the administrative header output
add_action('wp_before_admin_bar_render', 'my_custom_logo');

// Customizar o Footer do WordPress
function remove_footer_admin () {
    echo '© <a href="http://gsw.net.br/">ONE WAVE </a> - Criação de sites em Cuiabá';
}
add_filter('admin_footer_text', 'remove_footer_admin');