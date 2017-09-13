<?php
if ( ! defined( 'ABSPATH' ) ) exit;
//CS meta boxes override
if( !function_exists( 'floris_metas_opt' )) {
	function floris_metas_opt( $options ) {
		$floris_default_meta =  array(
			array(
				'name'   => 'section_1',
				'title'  => 'Page Options',
				'icon'   => 'fa fa-cog',
				'fields' => array(
					array(
						'id'    => '_header_elem',
						'type'  => 'switcher',
						'title' => esc_html__( 'Light header elements', 'floris' ),
						'default' => '0'
					),
					array( 
						'title' => esc_html__('Enable custom logo', 'floris'),
						'id' => '_header_logo',
						'type' => 'switcher',
						'default' => false
					),
					array( 
						'id' => '_page_logo',
						'type' => 'image',
						'title'    => esc_html__( 'Header Logo(Desktop)', 'floris' ),
						'button_upload' => esc_html__( 'Add image', 'floris' ),
						'button_remove' => esc_html__( 'Remove', 'floris' ),
						'frame_title'   => esc_html__( 'Select an image', 'floris'),
						'frame_button'  => esc_html__( 'Insert image', 'floris'),
						'button_upload' => esc_html__( 'Upload', 'floris'),
						'button_remove' => esc_html__( 'Remove', 'floris'),
						'dependency' => array('_header_logo', '==', 'true'),
					),
					array( 
						'id' => '_page_mobile_logo',
						'type' => 'image',
						'title'    => esc_html__( 'Header Logo(Mobile)', 'floris' ),
						'button_upload' => esc_html__( 'Add image', 'floris' ),
						'button_remove' => esc_html__( 'Remove', 'floris' ),
						'frame_title'   => esc_html__( 'Select an image', 'floris'),
						'frame_button'  => esc_html__( 'Insert image', 'floris'),
						'button_upload' => esc_html__( 'Upload', 'floris'),
						'button_remove' => esc_html__( 'Remove', 'floris'),
						'dependency' => array('_header_logo', '==', 'true'),
					),
				),
			),
		);
		$floris_product =  array(
			array(
				'name'   => 'section_1',
				'title'  => 'Page Options',
				'icon'   => 'fa fa-cog',
				'fields' => array(
					array(
						'id'    => '_header_elem',
						'type'  => 'switcher',
						'title' => esc_html__( 'Light header elements', 'floris' ),
						'default' => '0'
					),
					array( 
						'title' => esc_html__('Enable custom logo', 'floris'),
						'id' => '_header_logo',
						'type' => 'switcher',
						'default' => false
					),
					array( 
						'id' => '_page_logo',
						'type' => 'image',
						'title'    => esc_html__( 'Header Logo(Desktop)', 'floris' ),
						'button_upload' => esc_html__( 'Add image', 'floris' ),
						'button_remove' => esc_html__( 'Remove', 'floris' ),
						'frame_title'   => esc_html__( 'Select an image', 'floris'),
						'frame_button'  => esc_html__( 'Insert image', 'floris'),
						'button_upload' => esc_html__( 'Upload', 'floris'),
						'button_remove' => esc_html__( 'Remove', 'floris'),
						'dependency' => array('_header_logo', '==', 'true'),
					),
					array( 
						'id' => '_page_mobile_logo',
						'type' => 'image',
						'title'    => esc_html__( 'Header Logo(Mobile)', 'floris' ),
						'button_upload' => esc_html__( 'Add image', 'floris' ),
						'button_remove' => esc_html__( 'Remove', 'floris' ),
						'frame_title'   => esc_html__( 'Select an image', 'floris'),
						'frame_button'  => esc_html__( 'Insert image', 'floris'),
						'button_upload' => esc_html__( 'Upload', 'floris'),
						'button_remove' => esc_html__( 'Remove', 'floris'),
						'dependency' => array('_header_logo', '==', 'true'),
					),
				),
			),
			array(
				'name'   => 'section_2',
				'title'  => 'Product Options',
				'icon'   => 'fa fa-cog',
				'fields' => array(
					array(
						'id'    => '_prod_related',
						'type'  => 'switcher',
						'title' => esc_html__( 'Enable related products', 'floris' ),
						'default' => '1'
					),
					array(
		                'id' => '_prod_bg_color',
		                'type'=> 'color_picker',
		                'title' => esc_html__( 'Product background color', 'floris' ),
		                'default'=> '',
		                'rgba'=> true,
		            ),
		            array(
		                'id' => '_thumbs_bg_color',
		                'type'=> 'color_picker',
		                'title' => esc_html__( 'Product thumbs background color', 'floris' ),
		                'default'=> '',
		                'rgba'=> true,
		            ),
		            array(
					  	'id'         => 'prod_img_c_d',
					  	'type'       => 'radio',
					  	'title'      => esc_html__( 'Product Image to Cover all area', 'floris' ),
					  	'class'	   	 => 'prod_img_cover_d',
					  	'options'    => array(
					    	'1'      => 'On',
					    	'2'	 	 => 'Default',
					    	'0'      => 'Off',
					  	),
					  	'default'    => '2'
					),
		            array(
		                'id' => 'prod_img_auto_d',
		                'type' => 'switcher',
		                'title' => esc_html__( 'Padding Option auto', 'floris' ),
		                'dependency' => array('prod_img_c_d_0', '==', 'true'),
		                'default' => '1',
		            ),
		            array(
					  	'id'        => 'fieldset_1',
					  	'type'      => 'fieldset',
						'dependency' => array('prod_img_c_d_0|prod_img_auto_d', '==|==', 'true|false'),
					  	'title'     => __('Padding Option custom', 'floris'),
					  	'fields'    => array(
					    	array(
					      		'id'    => 'padding_top_d',
					      		'type'  => 'text',
					      		'title' => __('Padding Top(1px,em,%)', 'floris'),
					      		'default' => '10px',
					    	),
					    	array(
					      		'id'    => 'padding_right_d',
					      		'type'  => 'text',
					      		'title' => __('Padding Right(2px,em,%)', 'floris'),
					      		'default' => '20px',
					    	),
					    	array(
					      		'id'    => 'padding_bottom_d',
					      		'type'  => 'text',
					      		'title' => __('Padding Bottom(3px,em,%)', 'floris'),
					      		'default' => '30px',
					    	),
					    	array(
					      		'id'    => 'padding_left_d',
					      		'type'  => 'text',
					      		'title' => __('Padding Left(4px,em,%)', 'floris'),
					      		'default' => '40px',					      		
					    	),
						),
					),
				),
			),
		);
		$floris_post =  array(
			array(
				'name'   => 'section_1',
				'title'  => 'Page Options',
				'icon'   => 'fa fa-cog',
				'fields' => array(
					array(
						'id'    => '_header_elem',
						'type'  => 'switcher',
						'title' => esc_html__( 'Light header elements', 'floris' ),
						'default' => '0'
					),
					array( 
						'title' => esc_html__('Enable custom logo', 'floris'),
						'id' => '_header_logo',
						'type' => 'switcher',
						'default' => false
					),
					array( 
						'id' => '_page_logo',
						'type' => 'image',
						'title'    => esc_html__( 'Header Logo(Desktop)', 'floris' ),
						'button_upload' => esc_html__( 'Add image', 'floris' ),
						'button_remove' => esc_html__( 'Remove', 'floris' ),
						'frame_title'   => esc_html__( 'Select an image', 'floris'),
						'frame_button'  => esc_html__( 'Insert image', 'floris'),
						'button_upload' => esc_html__( 'Upload', 'floris'),
						'button_remove' => esc_html__( 'Remove', 'floris'),
						'dependency' => array('_header_logo', '==', 'true'),
					),
					array( 
						'id' => '_page_mobile_logo',
						'type' => 'image',
						'title'    => esc_html__( 'Header Logo(Mobile)', 'floris' ),
						'button_upload' => esc_html__( 'Add image', 'floris' ),
						'button_remove' => esc_html__( 'Remove', 'floris' ),
						'frame_title'   => esc_html__( 'Select an image', 'floris'),
						'frame_button'  => esc_html__( 'Insert image', 'floris'),
						'button_upload' => esc_html__( 'Upload', 'floris'),
						'button_remove' => esc_html__( 'Remove', 'floris'),
						'dependency' => array('_header_logo', '==', 'true'),
					),
				),
			),
			array(
				'name'   => 'section_2',
				'title'  => 'Video Options',
				'icon'   => 'fa fa-cog',
				'fields' => array(
					array(
						'title' => esc_html__('Add Youtube or Vimeo video url', 'floris'),
						'desc' => esc_html__('Paste youtube or vimeo share video url here.', 'floris'),
						'id' => 'video-url',
						'type' => 'textarea',
						'cols' => 80,
						'rows' => 4,
						'placeholder' => '',
						'std' => '',
					),
				)
			)
		);
		/* Start creating meta options. */
		$options = array();
		$options[] = array(
			'id'        => 'floris_meta_page_opt',
			'title'     => 'Page Options',
			'post_type' => 'page',
			'context'   => 'normal',
			'priority'  => 'default',
			'sections'  => $floris_default_meta

		);
		$options[] = array(
			'id'        => 'floris_meta_page_opt',
			'title'     => 'Products Options',
			'post_type' => 'product',
			'context'   => 'normal',
			'priority'  => 'default',
			'sections'  => $floris_product

		);
		$options[] = array(
			'id'    => 'floris_meta_page_opt',
			'title' => esc_html__('Post Settings', 'floris'),
			'context' => 'normal',
			'priority' => 'default',
			'post_type' => 'post',
			'sections' => $floris_post
		);
		return $options;
	}
	add_filter( 'cs_metabox_options', 'floris_metas_opt' );
}
if( !function_exists( 'floris_metas_taxonomy_opt' )) {
	function floris_metas_taxonomy_opt( $options ) {
		$options = array();
		$options[] = array(
			'id'    => 'floris_custom_category_options',
			'title' => esc_html__('Category Settings', 'floris'),
			'taxonomy' => 'product_cat',
			'fields' => array(
				array(
		            'id'       => 'woo_cat_sidebar',
		            'type'     => 'radio',
		            'title'    => esc_html__('Category Layout', 'floris'),
		            'class'	   => 'prod_img_cover_d',
		            'options' => array(
		            	'1' => 'Default',
		                '2' => 'Left Sidebar', 
		                '3' => 'No Sidebar', 
		                '4' => 'Right Sidebar'
		            ), 
                	'default' => '1'
            	),
            	array(
	                'id' => 'woo_cat_product',
	                'type' => 'image_select',
	                'title' => esc_html__( 'Category Areas', 'floris' ),
	                'options'  => array(
	                    '1' => FLORIS_THEME_DIRURI .'inc/images/default.jpg',
	                    '2' => FLORIS_THEME_DIRURI .'inc/images/footer-widgets-1.png',
	                    '3' => FLORIS_THEME_DIRURI .'inc/images/footer-widgets-2.png',
	                    '4' => FLORIS_THEME_DIRURI .'inc/images/footer-widgets-3.png',
	                    '5' => FLORIS_THEME_DIRURI .'inc/images/footer-widgets-4.png',
	                ),
	                'default'  => '1'
	            ),
				array(
					'id'    => 'cat_banner',
					'type'  => 'switcher',
					'title' => esc_html__( 'Show category Banner', 'floris' ),
					'default' => true
				),
			 	array(
				  	'id'        => 'cat_baner_height',
				  	'type'      => 'fieldset',
				  	'title'     => __('Category Banner height(1px,em,%)', 'floris'),
				  	'fields'    => array(
				    	array(
				      		'id'    => 'height_1200',
				      		'type'  => 'text',
				      		'title' => __('< 1200px', 'floris'),
				      		'default' => '620px',
				    	),
				    	array(
				      		'id'    => 'height_992',
				      		'type'  => 'text',
				      		'title' =>  __('< 992px', 'floris'),
				      		'default' => '620px',
				    	),
				    	array(
				      		'id'    => 'height_768',
				      		'type'  => 'text',
				      		'title' =>  __('< 768px', 'floris'),
				      		'default' => '600px',
				    	),
				    	array(
				      		'id'    => 'height_480',
				      		'type'  => 'text',
				      		'title' =>  __('< 480px', 'floris'),
				      		'default' => '470px',	
				    	),
					),
				),
				array(
					'id'    => 'popup_cat_logo_show',
					'type'  => 'switcher',
					'title' => esc_html__( 'Show category image in quick view', 'floris' ),
					'default' => true
				),
				array( 
					'id' => 'popup_cat_img',
					'type' => 'image',
					'title'    => esc_html__( 'Image category in quick view ', 'floris' ),
					'button_upload' => esc_html__( 'Add image', 'floris' ),
					'button_remove' => esc_html__( 'Remove', 'floris' ),
					'frame_title'   => esc_html__( 'Select an image', 'floris'),
					'frame_button'  => esc_html__( 'Insert image', 'floris'),
					'button_upload' => esc_html__( 'Upload', 'floris'),
					'button_remove' => esc_html__( 'Remove', 'floris'),
				),				
				array(
	                'id' => 'cat_title_color',
	                'type' => 'color_picker',
	                'title' => esc_html__( 'Category title color', 'floris' ),
	                'default' => '#000',
	                'rgba' => true,
	            ),
	            array( 
					'id' => 'cat_logo',
					'type' => 'image',
					'title'    => esc_html__( 'Alternative Logo(Desktop)', 'floris' ),
					'button_upload' => esc_html__( 'Add image', 'floris' ),
					'button_remove' => esc_html__( 'Remove', 'floris' ),
					'frame_title'   => esc_html__( 'Select an image', 'floris'),
					'frame_button'  => esc_html__( 'Insert image', 'floris'),
					'button_upload' => esc_html__( 'Upload', 'floris'),
					'button_remove' => esc_html__( 'Remove', 'floris'),
				),
	            array( 
					'id' => 'cat_logo_mobile',
					'type' => 'image',
					'title'    => esc_html__( 'Alternative Logo(Mobile)', 'floris' ),
					'button_upload' => esc_html__( 'Add image', 'floris' ),
					'button_remove' => esc_html__( 'Remove', 'floris' ),
					'frame_title'   => esc_html__( 'Select an image', 'floris'),
					'frame_button'  => esc_html__( 'Insert image', 'floris'),
					'button_upload' => esc_html__( 'Upload', 'floris'),
					'button_remove' => esc_html__( 'Remove', 'floris'),
				),
				array(
		            'id'       => 'prod_cat_backside',
		            'type'     => 'radio',
		            'title'    => esc_html__('Backside Product', 'floris'),
		            'class'	   => 'prod_img_cover_d',
		            'options' => array(
		            	'1' => 'Default',
		                '2' => 'On', 
		                '0' => 'Off', 
		            ), 
                	'default' => '1'
            	),
			),
		);
		return $options;
	}
	add_filter( 'cs_taxonomy_options', 'floris_metas_taxonomy_opt' );
}