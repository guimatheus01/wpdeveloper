<?php

//WooSwatches - Woocommerce Color or Image Variation Swatches

class floris_wcva_shop_page_swatches {
	
	public function wcva_change_shop_attribute_swatches($product) {
	  global $product; 
	  
	  $shop_swatches            =  get_post_meta( $product->get_id(), '_shop_swatches', true );
	  $shop_swatches_attribute  =  get_post_meta( $product->get_id(), '_shop_swatches_attribute', true );
	  $fullarray                =  get_post_meta( $product->get_id(), '_coloredvariables', true );
	  $template                 =  '';
      $display_shape            =  'wcvasquare';
	  $newvaluearray            = array();
	  
	    if (isset($shop_swatches) && ($shop_swatches == "yes")) {
		  
		    if (isset($shop_swatches_attribute) && ($shop_swatches != "")) {
		  
		        if ( taxonomy_exists( $shop_swatches_attribute ) ) {
		   
		            $terms = wc_get_product_terms( $product->get_id(), $shop_swatches_attribute, array( 'fields' => 'all' ) );
		  
		            foreach ($terms as $term) {
			 
			            if (isset($fullarray[$shop_swatches_attribute]['values']) && (!empty($fullarray[$shop_swatches_attribute]['values']))) {
					
					        foreach ($fullarray[$shop_swatches_attribute]['values'] as $key=>$value) {
				               if ($key == $term->slug) {
					                $newvaluearray[$shop_swatches_attribute]['values'][$key]            = $fullarray[$shop_swatches_attribute]['values'][$key];
					                $newvaluearray[$shop_swatches_attribute]['values'][$key]['term_id'] = $term->term_id;
						            $newvaluearray[$shop_swatches_attribute]['display_type']            = $fullarray[$shop_swatches_attribute]['display_type'];
				                }
			                }
				        }
				
		            }
	            }
		
		    }
	    
		}
	  
	  
	  
	    if (isset($fullarray[$shop_swatches_attribute]['displaytype']) && ($fullarray[$shop_swatches_attribute]['displaytype'] == 'round')) {
		    $display_shape            =  'wcvaround';
	    }
	  
	        
	    if (isset($fullarray[$shop_swatches_attribute]['values']) ) {
			$_values                  =  $fullarray[$shop_swatches_attribute]['values'];
		}
	      
	
	    if (($product->is_type('variable')) && isset($shop_swatches) && ($shop_swatches == "yes") ) {
	     
		    if ((isset($newvaluearray)) && (!empty($newvaluearray))) {
			 
			    if (isset($shop_swatches_attribute) && ($newvaluearray[$shop_swatches_attribute]['display_type'] == "colororimage" || $newvaluearray[$shop_swatches_attribute]['display_type'] == "global")) {
		           $template=floris_wcva_shop_page_swatches::wcva_variable_swatches_template($newvaluearray[$shop_swatches_attribute]['values'],$shop_swatches_attribute,$product->get_id(),$display_shape,$newvaluearray[$shop_swatches_attribute]['display_type']);
	            } 
				
		    } else {
			 
			    if (isset($shop_swatches_attribute) && ($fullarray[$shop_swatches_attribute]['display_type'] == "colororimage" || $fullarray[$shop_swatches_attribute]['display_type'] == "global")) {
		           $template=floris_wcva_shop_page_swatches::wcva_variable_swatches_template($_values,$shop_swatches_attribute,$product->get_id(),$display_shape,$fullarray[$shop_swatches_attribute]['display_type']);
	            } 
			 
		    }
		 
		 
		 
	    }
	  
	  return $template;
	}



	 /**
	  * Shows text for variable products with swatches enabled
	  * @$values- attribute value array of swatch settings
	  * @name- attribute name
	  * $pid - product id to get product url
	  */
	public function wcva_variable_swatches_template($values,$name,$pid,$display_shape,$main_display_type ) { 
	  
	        $imagewidth        = get_option('woocommerce_shop_swatch_width',"32");  
            $imageheight       = get_option('woocommerce_shop_swatch_height',"32");  
		    $global_activation = get_option('wcva_woocommerce_global_activation');
			$wcva_global       = get_option('wcva_global');
			$hover_image_size  = get_option('woocommerce_hover_imaga_size',"shop_catalog");  
			$direct_link       = get_option('woocommerce_shop_swatch_link', "no");  
			$product_url       = get_permalink( $pid );
			$mobile_click      = get_option('woocommerce_wcva_disable_mobile_hover',"no");
			
			if (isset($mobile_click) && ($mobile_click == "yes") && ( $detect->isMobile() ) ) {
			    $load_direct_variation = "no";
			} else {
				$load_direct_variation = "yes";
			}
			
		$template_content = '';
		$template_content .= '<div class="shopswatchinput" prod-img="">'; 
		
		$load_assets   = "yes";
      
    
	   
        if (isset($load_assets) && ($load_assets == "yes")) {
		
	        foreach ($values as $key=>$value) { 

            
			    $lower_name       =   strtolower( $name );
			    $clean_name       =   str_replace( 'pa_', '', $lower_name );
			    $lower_key        =   rawurldecode($key);
			    $direct_url       =  ''.$product_url.'?'.$clean_name.'='.$lower_key.'';
			
			    if ($main_display_type == "global") {
				
				    if (isset($global_activation) && $global_activation == "yes") {
				
				        if ($wcva_global[$name]['displaytype'] == "round") {
				 	        $display_shape =  'wcvaround';
				        }
		            }
				
			            $swatchtype       = get_woocommerce_term_meta( $value['term_id'], 'display_type', true );
				        $swatchcolor      = get_woocommerce_term_meta( $value['term_id'], 'color', true );
				        $attrtextblock    = get_woocommerce_term_meta( $value['term_id'], 'textblock', true );
				        $swatchimage      = absint( get_woocommerce_term_meta( $value['term_id'], 'thumbnail_id', true ) );
				        $hoverimage       = absint( get_woocommerce_term_meta( $value['term_id'], 'hoverimage', true ) );
			    
			    } else {
				        
						$swatchtype       = $value['type'];
				        $swatchcolor      = $value['color'];
				        $swatchimage      = $value['image'];
				        $hoverimage       = $value['hoverimage'];
				        $attrtextblock    = $value['textblock'];
			    }
			
			

                $swatchimageurl   =  apply_filters('wcva_swatch_image_url',wp_get_attachment_thumb_url($swatchimage),$swatchimage);
			    $hoverimage       =  wp_get_attachment_image_src($hoverimage,$hover_image_size);
                $hoverimageurl    =  apply_filters('wcva_hover_image_url',$hoverimage[0],$hoverimage[0]);

			 
			
			
			 
			    if (isset($swatchtype)) {
				    switch ($swatchtype) {
             	        case 'Color':
             	        	$template_content .= '<a';
             	        	if ((isset($direct_link)) && ($direct_link == "yes") && ( $load_direct_variation == "yes" )){ $template_content .= ' href="'.$direct_url.'"';}
             	        	$template_content .= ' class="wcvaswatchinput"';
             	        	if (isset($hoverimageurl)) { $template_content .= 'data-o-src="'.$hoverimageurl.'"'; }
             	        	$template_content .= ' style="width:'.$imagewidth.'px; height:'.$imageheight.'px;">';

             	        	$template_content .= '<div class="wcvashopswatchlabel '.$display_shape.'" style="background-color:';
             	        	if (isset($swatchcolor)) { $template_content .= $swatchcolor.';'; } else { $template_content .= '#ffffff;'; }
             	        	$template_content .= 'width:'.$imagewidth.'px; float:left; height: '.$imageheight.'px;"></div>';

             	        	$template_content .= '</a>';
             		    break;

             	        case 'Image':
             	        	$template_content .= '<a';
             	        	if ((isset($direct_link)) && ($direct_link == "yes") && ( $load_direct_variation == "yes" )){ $template_content .= ' href="'.$direct_url.'"';}
             	        	$template_content .= ' class="wcvaswatchinput"';
             	        	if (isset($hoverimageurl)) { $template_content .= 'data-o-src="'.$hoverimageurl.'"'; }
             	        	$template_content .= '>';

             	        	$template_content .= '<div class="wcvashopswatchlabel '.$display_shape.'" style="background-image:url(';
             	        	if (isset($swatchimageurl)) { $template_content .= $swatchimageurl; }
             	        	$template_content .= '); background-size: '.$imagewidth.'px '.$imageheight.'px; float:left; width:'.$imagewidth.'px; height:'.$imageheight.'px; "></div>';

             	        	$template_content .= '</a>';
             		    break;
				
				        case 'textblock':
				        	$template_content .= '<a';
             	        	if ((isset($direct_link)) && ($direct_link == "yes") && ( $load_direct_variation == "yes" )){ $template_content .= ' href="'.$direct_url.'"';}
             	        	$template_content .= ' style="height:'.$imageheight.'px;">';
             	        	$template_content .= '<div class="wcvashopswatchlabel wcva_shop_textblock '.$display_shape.'" style="min-width:'.$imagewidth.'px; ">';
             	        	if (isset($attrtextblock)) { $template_content .= $attrtextblock; }
             	        	$template_content .= '</div></a>';
             		        ?>
             		        <?php
             		    break;
             	
             
                    } 
			    }
			 
            
            }
		}		
	$template_content .= '</div>';

	return $template_content;    
	
	}



}

?>