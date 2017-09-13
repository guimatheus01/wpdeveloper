/*--------------------------------------------------------*/
/* TABLE OF CONTENTS: */
/*--------------------------------------------------------*/

/* 01 - VARIABLES */
/* 02 - WINDOW LOAD */
/* 03 - SWIPER SLIDER */
/* 04 - MOBILE MENU */
/* 05 - WINDOW SCROLL */
/* 06 - CLICK */
/* 07 - POPUP OPEN */

jQuery(function($) { "use strict";

    /*============================*/
	/* 01 - VARIABLES */
	/*============================*/
	
	var swipers = [], winW, winH, winScr, _isresponsive, smPoint = 768, mdPoint = 992, lgPoint = 1200, addPoint = 1600, _ismobile = navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i);
	function pageCalculations(){
		winW = $(window).width();
		winH = $(window).height();
	}
	pageCalculations();
					
   	var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)){
       $('.bg.ready').removeAttr('data-jarallax').addClass('fix'); 
    }
					
	var isSafari = /Safari/.test(navigator.userAgent) && /Apple Computer/.test(navigator.vendor);
	if (isSafari) {
	    $('.bg.ready').removeAttr('data-jarallax').addClass('fix');
	}			
					
   if(_ismobile) {
	   $('body').addClass('mobile');
	   $('.bg').removeAttr('data-jarallax');
    }					
	
	/*============================*/
	/* 02 - WINDOW LOAD */
	/*============================*/
	
	$(window).load(function(){
	    $('.loading').addClass('active');
		animateItem();
		animateImg();
		scrolHeader();
		initSwiper();
		
		setTimeout(function(){
		  $('.loading').fadeOut(); 
		  $('body').addClass('start');	
		},1000);
		$('form.yikes-easy-mc-form').removeAttr('action');
	});

	
	/*============================*/
	/* 03 - SWIPER SLIDER */
	/*============================*/
	function initSwiper() {
	var mySwiper = new Swiper('.swiper-container', {
		speed: 500,
		effect: 'fade',
		pagination: '.pagination',
		paginationClickable: true,
		keyboardControl: true,
		autoplay: ( $('.swiper-container').data('autoplay') ? parseInt( $('.swiper-container').data('autoplay'), 10 ) : 0 ),
		nextButton: '.swiper-arrow-right',
		prevButton: '.swiper-arrow-left',
		loop: true,
		fade: {
		  crossFade: false
		}
	});
					
	var mySwiper = new Swiper('.slider-mobile-man', {
		speed: 500,
		keyboardControl: true,
		nextButton: '.swiper-arrow-right',
		prevButton: '.swiper-arrow-left'
	});				
					
	var mySwiper = new Swiper('.slider-mobile-woman', {
		speed: 500,
		keyboardControl: true,
		nextButton: '.swiper-arrow-right',
		prevButton: '.swiper-arrow-left'
	});
					
	var mySwiper = new Swiper('.slider-mobile-child', {
		speed: 500,
		keyboardControl: true,
		nextButton: '.swiper-arrow-right',
		prevButton: '.swiper-arrow-left'
	});				
					
	var galleryTop = new Swiper('.gallery-top', {
		slidesPerView: 1,
		onSlideChangeStart: function(swiper){
		  $('.thumbs-item').removeClass('active');		
			$('.thumbs-item').eq(swiper.activeIndex).addClass('active');
		},
    });

    var galleryThumbs = new Swiper('.gallery-thumbs', {
        slidesPerView: updateSlidesPerView($('.gallery-thumbs')),
        touchRatio: 0.2,
        slideToClickedSlide: true,
		onSlideClick: function(swiper) {
			swiper.closest('.two-slider').find('.gallery-top').swipeTo(swiper.activeIndex);
			
		}
    });
    galleryTop.params.control = galleryThumbs;
    galleryThumbs.params.control = galleryTop;

    function updateSlidesPerView(swiperContainer){
    	var winW = $(window).width(),
    		addPoint = 1600,
    		lgPoint = 1200,
    		mdPoint = 992,
    		smPoint = 768,
    		sxPoint = 480;
		if(winW>=addPoint) return parseInt(swiperContainer.attr('data-add-slides'), 10);
		else if(winW>=lgPoint) return parseInt(swiperContainer.attr('data-lg-slides'), 10);
		else if(winW>=mdPoint) return parseInt(swiperContainer.attr('data-md-slides'), 10);
		else if(winW>=smPoint) return parseInt(swiperContainer.attr('data-sm-slides'), 10);
		else if(winW>=sxPoint) return parseInt(swiperContainer.attr('data-sx-slides'), 10);
		else return parseInt(swiperContainer.attr('data-xs-slides'), 10);
	}					
					
	$('.thumbs-item').on('click', function(){
	  var indexTumb = $('.thumbs-item').index(this);
	   $('.thumbs-item').removeClass('active');	
	    $(this).addClass('active');	
	     galleryTop.slideTo(indexTumb);
	});

	var product_variations = $('.variations_form').data('product_variations');
        product_variations = $.makeArray(product_variations);

	$('.product.type-product .variations select').change(function(){
		if (!$('.attribute-swatch').length) {
			variations_change(false, product_variations, galleryTop);
		}
    });

	$('.product.type-product .swatchinput').on('click', function(){
	    var label_attributes = $(this).find('label');
	    var selectid = label_attributes.attr('selectid');
	    var attribute = label_attributes.data('option');
	    var current_select = $('#'+selectid+' option[value="'+attribute+'"]');
	    var current_select_val = current_select.is(':selected');

	   	$('#'+selectid+' option').attr("selected", false);
	    if (!current_select_val) {
	        $('#'+selectid+' option').attr("selected", false);
	        current_select.attr("selected", "selected");
	    }
	    variations_change(current_select_val, product_variations, galleryTop);
	});
}			
	/*============================*/
	/* 04 - MOBILE MENU */
	/*============================*/
	
	$(document).on('click', '.burger-menu', function(){
		if ($('.slide-menu').hasClass('slide')) {
			$('.header-style-1.type-2').removeClass('layer');
		    $('.slide-menu').removeClass('slide');
			$('body').removeClass('overflow');
			$(this).removeClass('active');
			if (isSafari){
				$('body').removeClass('overflow_apple');
			}
		}else{
			$('.header-style-1.type-2').addClass('layer');
		    $('.slide-menu').addClass('slide');
			$('body').addClass('overflow');
			if (isSafari){
				$('body').addClass('overflow_apple');
			}
			$(this).addClass('active');
		}
		$('.sub-menu').slideUp(300);
		$('a').removeClass('act_menu');
		$('.plus.desk').remove();
		   return false;
	});
	
	/*============================*/
	/* 05 - WINDOW SCROLL */
	/*============================*/
					
    $(window).scroll(function() {
	    animateItem(); 
		animateImg();
		scrolHeader();
		if( $(window).scrollTop() <= 0 ) {
           	$('.header-style-1').removeClass('hide-header');
           	$('.header_no_sticky').removeClass('hide-sticky');
        }
	});
					
	function scrolHeader(){	
	   	if ($(window).scrollTop() > $('.header-style-1').height()) {
	        $('.header-style-1').addClass('scrol');
		}else{
			$('.header-style-1').removeClass('scrol');
		}
	}				
	
	function animateItem(){
	   	if ($('.item-animation').length) {
		 	$('.item-animation').not('.animated').each(function(){ 
		  		if($(window).scrollTop() >= $(this).offset().top-($(window).height()-$(this).height()+100)){
		  			$(this).addClass('animated');
		  		}
		  	});
		}
	}
					
	function animateImg(){
	   if ($('.animation-img').length) {
		 $('.animation-img').not('.animated').each(function(){ 
		  if($(window).scrollTop() >= $(this).offset().top-($(window).height()))
		   {$(this).addClass('animated');}});
		}
	}				
	animateItem();	
	animateImg();

	/*============================*/
	/* 06 - CLICK */
	/*============================*/
	
	$('.input-field input').keydown(function(){	
		if ($(this).val() !== '') {
	        $(this).parent().addClass('act');
		}else{
		    $(this).parent().removeClass('act'); 
		}
	});	
	
	$('.clear-input').on('click', function(){
	  $(this).parent().find('input').val('','');
		 $(this).parent().removeClass('act');
	});				
	
	$('.search-menu').on('click', function(){
	  $('.search-block').addClass('open-search');
	  return false;
	});
    
    $(document).on('click', '.close-popup', function(){
	  	$(this).parent().removeClass('open-search');
		$(this).parent().removeClass('active');
		if ($('.slide-menu').hasClass('slide')) {
		    $('body').addClass('overflow');
		}else{
		    $('body').removeClass('overflow');
		    if (isSafari){
				$('body').removeClass('overflow_apple');
			}
		} 
	});				 
					
    $('.delete-item').on('click', function(){
	   $(this).parent().fadeOut(300);
	});	
				
	$(document).on('click' ,'.minus-val', function(){
	    var inputVal = $(this).parent().find('input');
	    var inputButton = $('.desc-button .ajax_add_to_cart');
		var count = parseInt(inputVal.val()) - 1;
	    count = count < 1 ? 0 : count;
	    inputVal.val(count);
	    inputButton.attr('data-quantity', count);
	    inputButton.change();
	    inputVal.change();
		
	    return false;
	});	
					
    $(document).on('click', '.plus-val', function () {
	    var input  = parseInt( $(this).parent().find('input').val(),10 ),
	    	val    = parseInt( $(this).parent().find('input').attr('max'),10 ),
	    	button = $('.desc-button .ajax_add_to_cart');
        if( val >= 1 ){
            if( ( parseInt( input )+1 ) <= val ){
                $(this).parent().find('input').val( input+1 );
                button.attr('data-quantity', input+1 );
            } else if( val <= ( parseInt( input )+1 ) ){
        		$(this).parent().find('input').val( val );
        		button.attr('data-quantity', val );
        	}
        } else {
        	$(this).parent().find('input').val( input+1 );
            button.attr('data-quantity', input+1 );
        }
	    return false;
	});					
	$(document).on('change', '.desc-button input', function(){
	  	$('.desc-button .ajax_add_to_cart').attr('data-quantity', $(this).val());
	});

	/*============================*/
	/* 07 - POPUP OPEN */
	/*============================*/
	
    $(document).on('click', '.popup-open', function(){
    	$('.check-wrap .h5 span span').text($('.result_i').text());
	  	var openData = $(this).attr('data-popup');
	   	$('.popup.mark-'+openData+'').addClass('active');
		$('body').addClass('overflow');
		if (isSafari){
			$('body').addClass('overflow_apple');
		}
		   return false;
	});
	
	/*============================*/
	/* 08 - VIDEO OPEN */
	/*============================*/
					
	$('.play-button').on('click', function(){
	   var videoLink = $(this).attr('data-video'),
		   thisAppend = $(this).closest('.video-h').find('.video-iframe');
		   $(this).closest('.video-h').find('.video-item').addClass('act');
		   $('<iframe>').attr('src', videoLink).appendTo(thisAppend);
		return false;
	});
			  
	$('.close-video').on('click', function(){
		var videoClose = $(this).parent().find('.video-iframe');
	     $(this).closest('.video-h').find('.video-item').removeClass('act');
		  videoClose.find('iframe').remove();
		  return false;
	});
					
	/*============================*/
	/* 08 - FILTER CATALOG */
	/*============================*/				
	
	$('.list-open').on('click', function(){
	    $(this).parent().find('.list-slide').slideToggle(300);
	});	
					
	$('.list-slide li a').click(function(){
		$('html, body').animate({
			scrollTop: $( $.attr(this, 'href') ).offset().top - $('header').height()
		}, 500);
		$('.list-slide li a').removeClass('act');
		  $(this).addClass('act');
		    $(this).closest('.filter-list').find('.list-slide').slideUp(300);
		      return false;
	});				
	
	$(document).on('click', '.more-popup-open', function(){
	   $('.more-popup').addClass('active');
		  return false;
	});	
					
	$(document).on('click', '.more-popup .close-popup-more', function(){
	  	$(this).parent().removeClass('active');
	});
	
	/*============================*/
	/* 09 - PARALLAX BANER */
	/*============================*/				
					
	$(window).scroll(function(e){
	  parallax();
	});

	function parallax(){
	  var scrolled = $(window).scrollTop();
	  $('.asseccories-baner .title').css('opacity',1-(scrolled*.00275));
	}				
		
	/*============================*/
	/* 10 - ACCORDION */
	/*============================*/
	$('.accordion-title').on('click', function () {
		var $t = $(this);

		$t.toggleClass('active');
		$t.next('.accordion-content').slideToggle();
	});

	//linck
    function setLocation(curLoc){
      try {
       history.pushState(null, null, curLoc);
       return false;
      } catch(e) {}
      location.hash = '#' + curLoc;
    }

	/*============================*/
    /* 11 - PRODUCTS LOAD MORE   */
    /*============================*/ 
	$(document).on('click', '.load-more', function(){
		var this_load_b = $('.load-more'),
			num = this_load_b.data('amount'),
			under = this_load_b.attr('data-under'),
			term_id = this_load_b.data('term-id'),
			orderby = this_load_b.data('orderby'),
			order = this_load_b.data('order'),
		    max_pages = this_load_b.data('max-page'),
		    current_page = this_load_b.data('current-page'),
		    next_page = parseInt(current_page)+1;
		    $(this).next($('.loader-wrapper')).fadeIn();
		if(current_page == max_pages){
			this_load_b.fadeOut(500);
		return false;}
		
		$.post( ajaxurl, {
	        'action' 		: 'load_products_items',
	        'num'   		: num,
	        'under'   		: under,
	        'term_id'   	: term_id,
	        'next_page' 	: next_page,
	        'orderby' 		: orderby,
	        'order' 		: order
		})
		.done(function(response) {
			var insert_p = this_load_b.closest('.wpb_wrapper').find('.product-item-wrap');
			$('.loader-wrapper').fadeOut();
			var $newItems = $(response);
			insert_p.append($newItems);
			this_load_b.data('current-page', next_page);
			if( (current_page+1) == max_pages){
				this_load_b.fadeOut(500);
			}

		});
		    return false;
	});	

	/*============Product================*/	
	var qty = $('.desc-button input.qty').remove();
	$('.desc-button .counter.font-fam-2').append(qty);
	$('.desc-button .quantity').remove();

	/*============================*/
    /* 14 - PRODUCTS CATEGORY AJAX   */
    /*============================*/ 
	$(document).on('click', '.cat_popup', function(){
		if(!_ismobile) {
			var term_id = $(this).data('term_id'),
				close = $(this).data('close'),
				title = $(this).closest('.title').find('.h3').text(),
				sub_title = $(this).closest('.title').find('.sub-title').text(),
				image = $(this).closest('.fasion-caption').find('img').attr('data-src'),
				show = $(this).closest('.fasion-caption').find('img').attr('data-show'),
				max_pages = $(this).data('max-page'),
			    current_page = $(this).data('current-page'),
			    prod_backside = $(this).data('prod-backside'),
			    back = location.href,
			    url = $(this).attr('data-url');
			    $(this).next($('.loader-wrapper')).fadeIn();
			$.post( ajaxurl, {
		        'action' 		: 'load_products_cat',
		        'term_id'   	: term_id,
		        'prod_backside' : prod_backside,
		        'next_page' 	: current_page
			})
			.done(function(response) {
				var result = '<div class="mark-popup-1 popup"><div class="close-popup" data-back="'+back+'"><span></span></div><div class="popup-wraper">'+( show == 1 ? '<div class="left-part"><div class="left-part-image"><div class="bg" style="background-image:url('+image+')"></div></div></div>': '')+'<div class="check-content"'+( show == 0 ? ' style="width: 100%;"' : '')+'><div class="scroll-wrap"><div class="sale-desc sm"><div class="popup-title"><h2 class="h2 style-2 title">'+title+'</h2><div class="simple-text font-fam-3"><p>'+sub_title+'</p></div></div><div class="ajax_scroll">'+response+'</div><div class="loader-wrapper"><div class="loader-inner ball-pulse"><div></div><div></div><div></div></div></div></div></div></div></div></div>';
				loadOnScroll();
				$('footer').after(result);
				setTimeout(function(){
					$('.mark-popup-1').addClass('active');
				}, 200);			
				setTimeout(function(){
					$('body').addClass('overflow');
					$('.loader-wrapper').fadeOut();
				}, 650);
				$('.ajax_scroll').attr('data-term_id', term_id);
				$('.ajax_scroll').attr('data-max_pages', max_pages);
				$('.ajax_scroll').attr('data-current_page', current_page);
				$('.ajax_scroll').attr('data-prod-backside', prod_backside);
				loadOnScroll();
				setLocation(url);
			});
			    return false;
		}
	});

	//remove popup category
	$(document).on('click', '.mark-popup-1 .close-popup', function(){
		var url = $(this).attr('data-back');
		setLocation(url);
		$(this).parent().removeClass('active');
		if ($('.slide-menu').hasClass('slide')) {
		    $('body').addClass('overflow');
		}else{
		    $('body').removeClass('overflow');
		} 
		setTimeout(function(){
			$('.mark-popup-1').remove();
		}, 1500);
	});

	//ajax scroll
	function loadOnScroll(){
		var stop = 0;	
		$('.scroll-wrap').scroll(function(event) {
			if(stop == 1)
				return false;
			if( ( $('.scroll-wrap .sale-desc').outerHeight() - $('.scroll-wrap').height()-50) <= $('.scroll-wrap').scrollTop() ){
				stop = 1;
				var term_id = $('.ajax_scroll').attr('data-term_id'),
					current_page = $('.ajax_scroll').attr('data-current_page'),
					max_pages = $('.ajax_scroll').attr('data-max_pages'),
					prod_backside = $('.ajax_scroll').attr('data-prod-backside'),
					next_page = parseInt(current_page)+1;
				if(current_page == max_pages){return false;stop = 0;}

				$('.loader-wrapper').fadeIn();
				$.post( ajaxurl, {
			        'action' 		: 'load_products_cat',
			        'term_id'   	: term_id,
			        'prod_backside' : prod_backside,
			        'next_page' 	: next_page
				})
				
				.done(function(response) {
					$('.ajax_scroll').append(response);
					$('.ajax_scroll').attr('data-max_pages', max_pages);
					$('.ajax_scroll').attr('data-current_page', next_page);
					$('.loader-wrapper').fadeOut();
					if(next_page == max_pages){return false;}
					stop = 0;
				});
		    	return false;
			}
		});	
	}

    function variations_change(current_select_val, product_variations, slider){
    	if (!current_select_val) {
    		$('.reset_variations.popup_reset_variations').show().css('visibility','visible');
    	}
        var all_attributes;
        var current_attributes = {};
        var error_bool = 1;
        $('.variations select').each(function(){
            var key = $(this).data('attribute_name');
            var val = $(this).val();
            current_attributes[key] = val;
            if (val == '') {
                error_bool = 0;
            }
        });
        $.each(product_variations, function (index, value) {
            if (value['variation_is_visible'] && value['variation_is_active']) {
                var all_attributes = JSON.stringify(value['attributes']);
                if (all_attributes == JSON.stringify(current_attributes)) {
                    $('#popup_variation_id').val(value['variation_id']);
                    $('.add_to_cart_button.popup_add_to_cart, .add_to_cart_button.single_add_to_cart_button').removeClass('disabled');
                    $('.woocommerce-variation .woocommerce-variation-price').html(value['price_html']);
                    $('.woocommerce-variation .woocommerce-variation-price').show();
                    $('.woocommerce-variation .woocommerce-variation-availability').show();
                    $('.woocommerce-variation .woocommerce-variation-error').hide();
                    if (value['image']['url'] !== '' && value['image']['url'] !== undefined) {
                    	var slide_i = 0;
                    	$('.'+slider.classNames[0]+' .swiper-slide').each(function(){                      		
                    		if ($(this).find('img').attr('src') == value['image']['url']) {
                    			return false;
                    		}
                    		slide_i++;                           		
                    	});
                    	slider.slideTo(slide_i);
                    }
                    return false;
                }else{
                    $('#popup_variation_id').val(0);
                    $('.add_to_cart_button.popup_add_to_cart, .add_to_cart_button.single_add_to_cart_button').addClass('disabled');
                    $('.woocommerce-variation .woocommerce-variation-price').hide();
                    $('.woocommerce-variation .woocommerce-variation-availability').hide();
                    if (error_bool) {
                        $('.woocommerce-variation .woocommerce-variation-error').show();
                    }
                }
            }
        });

        return false;
    };

	//product popup
	$(document).on('click', '.btn-quickview', function(){
		var product_id = $(this).attr('data-product_id'),
			back 	   = location.href,
			close 	   = $(this).data('close'),
			url 	   = $(this).attr('data-url'),
			price 	   = $(this).parent().parent().find('.sub-title >span').html();

		$(this).next($('.loader-wrapper')).fadeIn();
		$.post( ajaxurl, {
	        'action' 		: 'load_popup_prod',
	        'product_id'   	: product_id
		})
		.done(function(response) {
			var result = '<div class="mark-popup-1 popup over"><div class="close-popup" data-back="'+back+'"><span></span></div><div class="popup-wraper">'+response+'</div></div>';
			$('footer').after(result);
			$('.check-content .prod-price.font-fam-3').html(price);
			var popup_qty = $('.check-content .desc-button input.qty').remove();
			$('.check-content .desc-button .counter.font-fam-2').append(popup_qty);
			$('.check-content .desc-button .quantity').remove();
			setTimeout(function(){
				$('.mark-popup-1').addClass('active');
			}, 200);			
			setTimeout(function(){
				$('body').addClass('overflow');
				$('.loader-wrapper').fadeOut();
			}, 650);

			var verticalSlider = new Swiper('.vertical-slider', {
				slidesPerView: 1,
		        direction: 'vertical',
				mousewheelControl: true,
				mousewheelForceToAxis: true,
				loop: true,
				nextButton: '.swiper-arrow-right',
				prevButton: '.swiper-arrow-left'
		    });

			initSwiper();
			setLocation(url);

			//popup variation js

			var product_variations = $('.variations_form').data('product_variations');
            product_variations = $.makeArray(product_variations);
 
            $('.popup_variations').change(function(){
                variations_change(false, product_variations, verticalSlider);
                return false;
            });
            $('.swatchinput').click(function(){
                var label_attributes = $(this).find('label');
                var selectid = label_attributes.attr('selectid');
                var attribute = label_attributes.data('option');
                var current_select = $('#'+selectid+' option[value="'+attribute+'"]');
                var current_select_val = current_select.is(':selected');
                $('#'+selectid+' option').attr("selected", false);
                $('#'+selectid).next('.attribute-swatch').find('.swatchinput label').removeClass('selectedswatch');
                if (!current_select_val) {
                    $('#'+selectid+' option').attr("selected", false);
                    current_select.attr("selected", "selected");
                    $('#'+selectid).next('.attribute-swatch').find('.swatchinput label').removeClass('selectedswatch');
                    $(this).find('label').addClass('selectedswatch');
                }else{
                	$('.reset_variations.popup_reset_variations').hide().css('visibility','hidden');
                }
                variations_change(current_select_val, product_variations, verticalSlider);
            });
            $('.reset_variations.popup_reset_variations').click(function(){
            	$(this).hide();
                $('.value option').attr("selected", false);
                $('.swatchinput label').removeClass('selectedswatch');
                $('.woocommerce-variation .woocommerce-variation-error').hide();
                verticalSlider.slideTo(0);
                variations_change(true, product_variations, verticalSlider);
            });
		});
		return false;
	});
	
	//popup add to cart
	$(document).on('change', '.check-content input.fl', function(){
		$('.check-content .ajax_add_to_cart').attr('data-quantity', $(this).val());
	});

	//after breadcrumds
	var bread = $('.woocommerce-breadcrumb').remove();
	$('.after_bread').after(bread);

	//woocommerce-message (cart)
	var message = $('.woocommerce-message').remove();
	var error = $('.woocommerce-error').remove();
	$('.for_message').html(message);
	$('.for_message').html(error);
	$('.for_message').find('a').remove();
	if($('body').hasClass('single-product')){
		$('.sale-desc').prepend(message);
	}
	if( $('.woocommerce-info').has('a.showcoupon') ){ $('.woocommerce-info').addClass('checkout-showcoupon-page') }
	$('.showcoupon').click(function() {
		$(this).parent().next('.woocommerce-error').remove();
		var time_border = 20;
		if( $('.woocommerce-info').hasClass('border-no') ){ time_border = 400; }
		setTimeout(function(){ $('.showcoupon').parent().toggleClass('border-no'); }, time_border );
	});
	$('.woco-error-checkout form.checkout_coupon').on('submit', function(){
		setTimeout(function(){ $('.woocommerce-info').removeClass('border-no'); }, 1000 );
	});	

	//widget search
	$('.widget_search .searchsubmit').val('').after('<i class="icon-search"></i>');
	$('.widget_search .search-field').attr('required', 'true');

	//comment form
	$('.comment-form .form-submit').before($('.comment-form textarea'));

	/*Back To Top*/
	$(window).scroll(function() {
	  	if($(this).scrollTop() != 0) {
	    	$('#btt').fadeIn();
	  	} else {
	    	$('#btt').fadeOut();
		}
	});

	$('#btt').click(function() {
		$('body,html').animate({scrollTop:0},800);
		$('header').removeClass('hide-header');
		$('.header_no_sticky').removeClass('hide-sticky');
	});

	//menu
	if ($(window).width()<992) {
		if($('.list-menu li').hasClass('menu-item-has-children')){
			$('.list-menu li.menu-item-has-children > a').after('<em class="plus">+</em>');
		}
		if( $('.mega-menu li').hasClass('mega-menu-item-has-children') ){
			$('.mega-menu li.mega-menu-item-has-children > a').after('<em class="plus">+</em>');	
		}
		$('.mega-menu li.mega-menu-item-has-children .plus').on('click', function(){
			$(this).parent().toggleClass('mega-toggle-on');
			$(this).next().slideToggle(300);
			if( $(this).parent().hasClass('mega-toggle-on') ){ $(this).text('-'); }
			else{ $(this).text('+'); }
		});
		$('.list-menu li.menu-item-has-children .plus').on('click', function(){
			$(this).toggleClass('active').add().parent().find('> .sub-menu').slideToggle(300);
			$(this).next().toggleClass('active');
			if($(this).hasClass('active')){
				$(this).text('-');
			}else{
				$(this).text('+');
			}
		}); 
	}

	if ($(window).width()>992) {    
		$('.header-style-1 .list-menu > li a').on('mouseenter', function(){
			if( $('.list-menu').hasClass('main-type-2') ){
				$(this).parent().find('> .sub-menu').slideDown(300);
			} else {
				$(this).parent().find('> .sub-menu').slideDown(300);
				if($(this).closest('li').hasClass('menu-item-has-children')){
					if(!$(this).hasClass('act_menu')){
						$(this).after('<em class="plus desk">—</em>');
					}
					$(this).addClass('act_menu');
				}
			}
		});
		$(document).on('click', '.list-menu li.menu-item-has-children .plus', function(){
			$(this).closest('li').removeClass('sub_parent').find('> .sub-menu').slideUp(300);
			$(this).prev().removeClass('act_menu');
			$(this).remove();
		});
	}

	//header
	// $(document).on('mousewheel', function(event) {
	// 	if(event.deltaY>0) {
	// 		$('header').removeClass('hide-header');
	// 	}else { 
	// 		if ($('.slide-menu').hasClass('slide')) {
	// 			$('header').removeClass('hide-header');
	// 		}else if($('.search-block').hasClass('open-search')){
	// 			$('header').removeClass('hide-header');
	// 		}else if($('.popup').hasClass('active')){
	// 			$('header').removeClass('hide-header');
	// 		}else{
	// 			$('header').addClass('hide-header');
	// 		}
	// 	}
	// });

	//addclass
	if($('div').hasClass('skew-wrap')){
		$('.skew-wrap').closest('.vc_row').addClass('skew-block');
	}

	//remove coment
	var tab = $('.tab_textarea').remove();
	var coment = $('.comment-form-comment').append(tab).remove();
	$('.comment-form-email').after(coment);

	//cart ajax
	$(document).on('click', '.remove_ajax .remove_cart', function(e) {
		e.preventDefault();
		RemoveCartProduct(this);

		// Hide checkmark/add loading icon
		var product_id = $(this).data('product_id');
		$('.product').find("[data-product_id='" + product_id + "'].add_to_cart_button").removeClass('added').addClass('loading');
	});

	function RemoveCartProduct(button) {
		var $this = $(button),
			$miniCartLoader = $('#fl-mini-cart-loader'),
			cartItemKey = $this.data('cart-item-key');

		var product_id = $this.data('product_id');

		// Show "loader" overlay
		$('#fl-mini-cart-loader .loader-wrapper').fadeIn();
		$miniCartLoader.fadeIn();
		
		$.ajax({
			type: 'POST',
			url: ajaxurl,
			data: {
				action: 'mini_cart_remove_product',
				cart_item_key: cartItemKey
			},
			dataType: 'json',

			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.log('NM: AJAX error - RemoveCartProduct() - ' + errorThrown);
				
				// Hide "loader" overlay
				$miniCartLoader.fadeOut();

				// Hide loading/add added icon
				$('.product').find("[data-product_id='" + product_id + "'].add_to_cart_button").removeClass('loading').addClass('added');
			},
			complete: function(response) {
				var json = response.responseJSON;
				
				if (json.status === '1') {
					// Replace cart/shop fragments
					var $fragment;
					$.each(json.fragments, function(selector, fragment) {
						$fragment = $(fragment);
						if ($fragment.length) {
							$(selector).replaceWith($fragment);
						}
					});
					
					// Trigger "added_to_cart" event to make sure the HTML5 "sessionStorage" fragment values are updated
					$('body').trigger('added_to_cart', [json.fragments, json.cart_hash, false]);
					$('.cart_count').text(json.cart_count);
				}

				// Hide all icons
				$('.product').find("[data-product_id='" + product_id + "'].add_to_cart_button").removeClass('loading');

				// Hide "loader" overlay
				$miniCartLoader.fadeIn();
				setTimeout(function() { $miniCartLoader.fadeOut(); }, 500);
			}
		});
	}

	//popup cart
	$('.shop-menu').on('click', function(){
		var $miniCartLoader = $('#fl-mini-cart-loader');

		// Show "loader" overlay
		$miniCartLoader.fadeIn();
		$('#fl-mini-cart-loader .loader-wrapper').fadeIn();
		
		$.ajax({
			type: 'POST',
			url: ajaxurl,
			data: {
				action: 'poput_cart_product'
			},
			dataType: 'json',

			complete: function(response) {
				var json = response.responseJSON;
				var $fragment;
				$.each(json.fragments, function(selector, fragment) {
					$fragment = $(fragment);
					if ($fragment.length) {
						$(selector).replaceWith($fragment);
					}
				});
				$('.cart_count').text(json.cart_count);

				// Hide "loader" overlay
				setTimeout(function() { $miniCartLoader.fadeOut(); }, 500);
			}
		});
	});

	//open cart click button
	var stop_ajax = 1, plugin = 0;
	$(document).on('click', '.ajax_add_to_cart', function() {
		stop_ajax = 2;
		var max = $(this).parent().parent().find('input').attr('max'),
			button = $(this).attr('data-quantity');
		plugin = $(this).attr('data-plugin');
		if( max != 0 && max-button > 0 ){ $(this).parent().parent().find('input').attr('max', max-button ); }
		else if( max != 0 && !$(this).hasClass('no-js') ){ $(this).parent().parent().find('input').attr('max', '-1' ); $(this).addClass('disabled'); $(this).parent().addClass('wrap_disabled'); }
		// $(this).parent().parent().find('input').val(0);
	});

	//yikes-easy-mc-form
	var pattern_email = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	$(document).on('click', '.yikes-easy-mc-form button', function() {
		if( pattern_email.test($('.yikes-easy-mc-email').val())){
			var textButton = $(this).text();
			$(this).fadeOut();
			$('.yikes-easy-mc-form .loader-wrapper').fadeIn();
		}
	});

	$( document ).ajaxComplete(function() {
		if( stop_ajax == 2 && plugin ){
			$('.shop-menu').click();
			plugin=0;
			stop_ajax = 1;
		}
		$('.yikes-easy-mc-form .loader-wrapper').fadeOut();
		$('.yikes-easy-mc-form button').fadeIn();
	});

	//yikes-easy-mc-form
	$('.yikes-easy-mc-form button').after('<div class="loader-wrapper button_load" style=""><div class="loader-inner ball-pulse"><div></div><div></div><div></div></div></div>');

	//photoswipe
    var $pswp = $('.pswp')[0],
    	image = [],
    	$pic     = $('.photoswipe'),
        getItems = function() {
            var items = [];
            $pic.find('a').each(function() {
                var $href   = $(this).children().attr('src'),
                    $size   = $(this).children().attr('sizes').split('x'),
                    $width  = $size[0],
                    $height = $size[1];

                var item = {
                    src : $href,
                    w   : $width,
                    h   : $height
                }

                items.push(item);
            });
            return items;
        },
        items = getItems();

    $.each(items, function(index, value) {
        image[index]     = new Image();
        image[index].src = value['src'];
    });
        
    $pic.on('click', '.swiper-slide', function(event) {
        event.preventDefault();
                  
        var $index = $(this).index();
        var options = {
            index: $index,
            bgOpacity: 0.7,
            closeOnScroll: false,
            showHideOpacity: true
        }

        var lightBox = new PhotoSwipe($pswp, PhotoSwipeUI_Default, items, options);
        lightBox.init();
    });
	
	//open coupon
	$(document).on('click', '#coupon-btn', function(event){
		event.preventDefault();
		$(this).next('.coupon').slideToggle('slow');
	});

	//reset_variations
	$(document).on('click', '.reset_variations', function(event){
		$(this).css('visibility','hidden');
	});

	//group button
	$( document ).on( 'click', '.group-button', function() {
		$(this).addClass('loading');
	});

	//group product
	$( document ).ready(function() {
		if( $('.group-add').length ){
			setTimeout(function(){ $('.shop-menu').click();},1000);
		}
	});

	// Ajax add to cart
	$( document ).on( 'click', '.variations_form .single_add_to_cart_button', function(e) {
		e.preventDefault();
		var $variation_form = $( this ).closest( '.variations_form' ),
			var_id = $variation_form.find( 'input[name=variation_id]' ).val(),
			product_id = $variation_form.find( 'input[name=product_id]' ).val(),
			quantity = $variation_form.find( 'input[name=quantity]' ).val(),
			item = {},
			check = true,
			variations = $variation_form.find( 'select[name^=attribute]' );
		
		$( '.ajaxerrors' ).remove();			
		if ( !variations.length) { variations = $variation_form.find( '[name^=attribute]:checked' ); }	
		if ( !variations.length) { variations = $variation_form.find( 'input[name^=attribute]' ); }
		
		variations.each( function() {
			var $this = $( this ),
				attributeName = $this.attr( 'name' ),
				attributevalue = $this.val(),
				index,
				attributeTaxName;

			$this.removeClass( 'error' );
		
			if ( attributevalue.length === 0 ) {
				index = attributeName.lastIndexOf( '_' );
				attributeTaxName = attributeName.substring( index + 1 );
				$this.addClass( 'required error' ).after( '<div class="ajaxerrors"><p>Please select ' + attributeTaxName + '</p></div>' )
				check = false;
			} else {
				item[attributeName] = attributevalue;
			}		
		} );
		
		if ( !check ) {
			return false;
		}

		var $thisbutton = $( this );

		if ( $thisbutton.is( '.variations_form .single_add_to_cart_button' ) ) {

			$thisbutton.removeClass( 'added' );
			$thisbutton.addClass( 'loading' );

			var data = {
				action: 'woocommerce_add_to_cart_variable_rc',
				product_id: product_id,
				quantity: quantity,
				variation_id: var_id,
				variation: item
			};
			$( 'body' ).trigger( 'adding_to_cart', [ $thisbutton, data ] );
			// Ajax action
			$.post( wc_add_to_cart_params.ajax_url, data, function( response ) {
				if ( ! response )
					return;
				var this_page = window.location.toString();
				this_page = this_page.replace( 'add-to-cart', 'added-to-cart' );			
				if ( response.error && response.product_url ) {
					window.location = response.product_url;
					return;
				}
				
				if ( wc_add_to_cart_params.cart_redirect_after_add === 'yes' ) {

					window.location = wc_add_to_cart_params.cart_url;
					return;

				} else {

					$thisbutton.removeClass( 'loading' );

					var fragments = response.fragments;
					var cart_hash = response.cart_hash;

					// Block fragments class
					if ( fragments ) {
						$.each( fragments, function( key ) {
							$( key ).addClass( 'updating' );
						});
					}

					// Block widgets and fragments
					$( '.shop_table.cart, .updating, .cart_totals' ).fadeTo( '400', '0.6' ).block({
						message: null,
						overlayCSS: {
							opacity: 0.6
						}
					});

					// Changes button classes
					$thisbutton.addClass( 'added' );
					$('.shop-menu').click();

					// View cart text
					if ( ! wc_add_to_cart_params.is_cart && $thisbutton.parent().find( '.added_to_cart' ).size() === 0 ) {
						$thisbutton.after( ' <a href="' + wc_add_to_cart_params.cart_url + '" class="added_to_cart wc-forward" title="' +
							wc_add_to_cart_params.i18n_view_cart + '">' + wc_add_to_cart_params.i18n_view_cart + '</a>' );
					}

					// Replace fragments
					if ( fragments ) {
						$.each( fragments, function( key, value ) {
							$( key ).replaceWith( value );
						});
					}

					// Unblock
					$( '.widget_shopping_cart, .updating' ).stop( true ).css( 'opacity', '1' ).unblock();

					// Cart page elements
					$( '.shop_table.cart' ).load( this_page + ' .shop_table.cart:eq(0) > *', function() {

						$( '.shop_table.cart' ).stop( true ).css( 'opacity', '1' ).unblock();

						$( document.body ).trigger( 'cart_page_refreshed' );
					});

					$( '.cart_totals' ).load( this_page + ' .cart_totals:eq(0) > *', function() {
						$( '.cart_totals' ).stop( true ).css( 'opacity', '1' ).unblock();
					});

					// Trigger event so themes can refresh other areas
					$( document.body ).trigger( 'added_to_cart', [ fragments, cart_hash, $thisbutton ] );
				}
			});

			return false;

		} else {
			return true;
		}

	});

	//height banner
	var winWi = $(window).width(),win1600 = 1600,win1200 = 1200,win992 = 992,win768 = 768,win470 = 480,banner = $('.top-slider.after_bread');		
	if(winWi>=win1600){ banner.css({'height': banner.attr('data-height_1200'),'min-height': banner.attr('data-height_1200')}); }
	else if(winWi>=win1200){ banner.css({'height': banner.attr('data-height_1200'),'min-height': banner.attr('data-height_1200')}); }
	else if(winWi>=win992){ banner.css({'height': banner.attr('data-height_992'),'min-height': banner.attr('data-height_992')}); }
	else if(winWi>=win768){ banner.css({'height': banner.attr('data-height_768'),'min-height': banner.attr('data-height_768')}); }
	else{ banner.css({'height': banner.attr('data-height_480'),'min-height': banner.attr('data-height_480')}); }

	//shop sidebar
	if(winWi<=win992){ 
		$(document).on('click', '.sidebar-shop-wrapper .widget h4', function(event){
			$(this).toggleClass('show').next().slideToggle('slow');
		});
	}

	//search
	$('[name="s"]').focus(function () {
    	$('.guaven_woos_suggestion').remove().appendTo( $(this).closest('form') );
	});

    $('[name="s"]').focusout(function (){
    	$('.guaven_woos_suggestion').addClass('fadeIn');
    });
	var wooSearch = '';
    $('[name="s"]').keyup(function (e){
    	if( typeof(guaven_woos_finalresult) != "undefined" && guaven_woos_finalresult !== null ) {
    		var thisInput = $(this),
				searchVal = thisInput.val();
	        if (e.which === 40 || e.which === 38){
	            return;
	        }
	        thisInput.closest('.cell-view').addClass('top_input');
	        thisInput.closest('form').animate( {'top':'2%'}, 700);
	        clearTimeout(wooSearch);
	        wooSearch=setTimeout(function(){
	        	$('.guaven_woos_suggestion img').each(function () {
	        		var str_src = $(this).attr('src'),
	        			res = str_src.replace(/-114x150/g, ""),
	        			res_src = res.replace(/-150x150/g, "");
	        		$(this).attr('src', res_src);
	        	});
		        if ( searchVal.length >= (minkeycount - 1)) {
	            	if (guaven_woos_shownotfound != '' && guaven_woos_finalresult == '') {
						thisInput.parent().css('borderColor','red');
					} else {
						thisInput.parent().css('borderColor','#e8e9e9');
					}
		        }
	    	},200);
		}
    });

	//mega menu
	if( $('.mega-sub-menu').length ){
		if( $('.mega-menu-item').hasClass('widget_nav_menu')){
			$('.widget_nav_menu').parent().addClass('has_nav_menu');
		}
	}

	//scroll header
	var thisScroll = 0;
    $(window).on('scroll', function() {
        var thisScrollTop = $(this).scrollTop();
        if( thisScrollTop < thisScroll ) {
            $('header').removeClass('hide-header');
        } else if( thisScrollTop > 1 ) {
            if( $('.slide-menu').hasClass('slide') ) {
				$('header').removeClass('hide-header');
			} else if( $('.search-block').hasClass('open-search') ){
				$('header').removeClass('hide-header');
				$('.header_no_sticky').addClass('hide-sticky');
			} else if( $('.popup').hasClass('active') ){
				$('header').removeClass('hide-header');
				$('.header_no_sticky').addClass('hide-sticky');
			} else if( $('.mega-menu-wrap').hasClass('mega-menu-wrap-open') ){
				$('header').removeClass('hide-header');
				$('.header_no_sticky').addClass('hide-logo');
			} else {
				$('header').addClass('hide-header');
				$('.header_no_sticky').addClass('hide-sticky');
			}
        }
        thisScroll = thisScrollTop;
    });

    //mega menu open
    $( document ).on( 'click', '.mega-menu-toggle', function() {
    	$(this).parent().toggleClass('mega-menu-wrap-open');
    	if( $(this).parent().hasClass('mega-menu-wrap-open') ){
    		$(this).next().after('<div class="layer-dark" style="opacity: 1;visibility: visible;z-index: 5;"></div>');
		} else {
    		$('.layer-dark').remove();
  		}
    	$('body').toggleClass('overflow ');
    	if( $('.floris-mega-menu').hasClass('right') ){
    		$('.border-bottom').toggleClass('big-border');
    	}
    });

    //sub menu
    $( document ).ready(function() {
    	$(".mega-menu-item-has-children > a").off();
    });


    $('#lang_sel a, #lang_sel_footer a').html(function(i,h){
        return h.replace(/&nbsp;/g,'');
    });

    if($('#lang_sel a').text().length > 9 ) {
        $('#lang_sel a').each(function() {
            $(this).find('img').addClass('flg');
        })
    }

    if($('#lang_sel_footer a').text().length > 9 ) {
        $('#lang_sel_footer a').each(function() {
            $(this).find('img').addClass('flg');
        })
    }

    //product share link   
    $( document ).on( 'click', '.product .share-link a', function() {
    	if( $(this).closest('.share-link').attr('data-custom') == '1' ){
    		return false;
    	}
    });
});

var isMobile = false; //initiate as false
// device detection
if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;

(function($) {
		if (isMobile) {
			var action = 'click';
		}else{
			var action = 'mouseover';
		}
       	 $(document).on( action, '.floris_swatches_shop .wcvaswatchinput',
       	 	function( e ){
              var hoverimage    = $(this).attr('data-o-src');
              var parent        = $(this).closest('li');
              var parentdiv     = $(this).closest('div.shopswatchinput');
              var productimage  = $(this).closest('.hover-image-item').find("img").attr("src");

            if (isMobile) {
				$( this ).closest('.shopswatchinput').find('div.selectedswatch').removeClass('selectedswatch').addClass('wcvashopswatchlabel');
			 	$( this ).closest('.wcvaswatchinput').find('div.wcvashopswatchlabel').removeClass('wcvashopswatchlabel').addClass( 'selectedswatch' );
			}
               if (hoverimage) {
	               	if (productimage !== undefined) {
		                $(this).closest('.hover-image-item').find("img").attr("src",hoverimage);
						$(this).closest('.hover-image-item').find("img").attr("srcset",hoverimage);
		                $(parentdiv).attr("prod-img",productimage);
		            }else{
		            	$(this).closest('.hover-image-item').find(".hover-img").attr("style","background-image: url("+hoverimage+");");
		            }
               }
             }			 
         );       

})(jQuery);