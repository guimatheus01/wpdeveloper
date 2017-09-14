/**
 * Created by kenzap on 11/11/2016.
 */

jQuery(function($){
  "use strict";

  // reload if layout needs to be refreshed (home-version2.html)
  window.onorientationchange = function() {
    var orientation = window.orientation;
    if( $('.carousel-container').length>0 ){
      switch(orientation) {
        case 0:
        case 90:
        case -90: window.location.reload();
        break;
      }
    }
  };

  ////// parallax elements starts
  if ($(window).width() > 767 && ( $(".parallax-block").length > 0 || $(".pricing-banner").length > 0 ) ) {
    $('.parallax-block, .pricing-banner').parallax("50%", -0.6);
    $('.pricing-banner').parallax("50%", 1.3);
    $('.block1').parallax("50%", -0.2);
    $('.block2').parallax("50%", -0.2);
    $('.block3').parallax("50%", -0.2);
    $('.block4').parallax("50%", -0.2);
    $('.block5').parallax("50%", -0.2);
    $('.block6').parallax("50%", -0.2);
    $('.block7').parallax("50%", -0.2);
  }

  //create search popup
  if( $('.search-click').length > 0){

    $('.search-click a').attr('data-toggle', 'modal');
    $('.search-click a').attr('data-target', '.modal-search');
  }
  
  //mobile menu
  jQuery('.menu nav').meanmenu();

  ////// parallax elements starts
  if ($(window).width() > 767 && ( $(".parallax-block").length > 0 || $(".pricing-banner").length > 0 ) ) {
    $('.pricing-banner, .banner-parallax').parallax("50%", -0.6);//.parallax-block,
    $('.pricing-banner').parallax("50%", 1.3);
  }

  ////// Wow Script starts
  var wow = new WOW({
    animateClass: 'animated',
    offset: 100,
    callback: function(box) {

    }
  });
  wow.init();
     
  //select program filter
  if($(".select-program").length>0){
   $(".program-box").hide();
   $(".program-box").first().show();
   $(".select-program").change(function() {
    $(".program-box").hide();
    $(".pricing-box").hide();
    $("."+$(this).val()).removeClass('hidden').fadeIn();
   });
  }

  //////scroll function for changed css starts
  $(window).scroll(function() {

    if ($(this).scrollTop() > 0) {
      jQuery(".wrapper>header").addClass("scrolled").removeClass("noscroll");
      
    } else {
      jQuery(".wrapper>header").removeClass("scrolled").addClass("noscroll");
    }
    if ($(this).scrollTop() > 600) {
      jQuery("footer").css({"z-index": "112"});
    } else {
      jQuery("footer").css({"z-index": "111"});
    }

    if($width > 992){
      if ($(this).scrollTop() > $( window ).height()) {
        $(".widget_madang_slider_widget .banner").first().addClass("invisible");
      } else {
        $(".widget_madang_slider_widget .banner").first().removeClass("invisible");
        $(".widget_madang_slider_widget .banner .widget_madang_slider_widget .bannerwrap").first().css({"position": "fixed"});
      }
    }
  });

  //////show loader image on loading starts
  $(".se-pre-con").fadeOut("slow");

  ///// testimonial bx slider starts
  $('.bxslider').bxSlider({
    minSlides: 1,
    maxSlides: 1,
    slideMargin: 0,
    mode: 'fade',
    speed: 1000,
    easing: 'swing',
    auto: true
  });

  ///// sucess slider
  $('.sucess-slide').bxSlider({
    auto: true,
    pager: false,
    controls: true,
    prevText : '<i class="fa fa-angle-left"></i> '+screenReaderText.prev ,
    nextText : screenReaderText.next + '<i class="fa fa-angle-right"> </i>'
  });

  ///// home banner starts
  $("#owl-demo").owlCarousel({
  autoPlay: 4000, //Set AutoPlay to 3 seconds
  transitionStyle: "fade",
  items: 1,
  itemsDesktop: [1199, 1],
  itemsDesktopSmall: [979, 1],
  itemsMobile: [768, 1]
  });

  ///// featured menu carousel slider starts
  var lw = 600;
  var lh = 388;
  var sw = 495;
  var sh = 320;
  var sp = 10;
  var so = 30;
  var tp = 10;

  var $width = $(window).width();
  if($width < 1200 && $width > 992){
    lw = 500;
    lh = 288;
    sw = 295,
    sh = 220,
    sp = 10,
    so = 30,
    tp = 10;
  } else if($width < 993 && $width >= 769){
    lw = 400;
    lh = 258;
    sw = 205,
    sh = 180,
    sp = 10,
    so = 30,
    tp = 10;
  } else if($width <= 767 && $width > 400){
    lw = 250;
    lh = 180;
    sw = 195,
    sh = 120,
    sp = 10,
    so = 30,
    tp = 10;
  } else if($width <= 400 ){
    lw = 200;
    lh = 150;
    sw = 195,
    sh = 120,
    sp = 10,
    so = 15,
    tp = 20;
  }

  var carousel = $("#carousel").featureCarousel({
    largeFeatureWidth : lw,
    largeFeatureHeight : lh,
    smallFeatureWidth : sw,
    smallFeatureHeight : sh,
    sidePadding : sp,
    smallFeatureOffset : so,
    topPadding : tp
  });

  ///////menu toggle starts
  $("a,div,button,span,li").on('click',function(e){
    if ( $(this).hasClass("navbar-toggle") ) {
      $(".collapse").slideToggle("500");
    }else if ( $(this).hasClass("radio-btn") ) {
      $('.radio-btn').removeClass('checked');
      var obj = $(this);
      var thisInput = obj.find('.radio-class');
      thisInput.prop("checked", true);
      obj.addClass("checked");
    }else if ( $(this).is("#myTabs") ) {
      e.preventDefault()
      $(this).tab('show')
    }else if ( $(this).is("#but_prev") ) {
      carousel.prev();
    }else if ( $(this).hasClass("search-click") ) {
      window.setTimeout( 
        function() {   
          $(".form-search input").focus();
          //$('body').addClass('stop-scrolling');
      }, 500);
    }else if ( $(this).is("#but_pause") ) {
      carousel.pause();
    }else if ( $(this).is("#but_start") ) {
      carousel.start();
    }else if ( $(this).is("#but_next") ) {
      carousel.next();
    }else if ( $(this).is("#play-video-btn") ) {
      var video = document.getElementById('bg-video');
      var $video = $('#bg-video');
      var $control = $('#play-video-btn');
       //alert("qwer");
      if(video.paused == true){

        video.play();
        $('.video-bg').hide();
        $control.parents('.video-controls').fadeTo(500, 0).css({'z-index':0}).addClass('hidden');
        $video.parents('.video-wrap').addClass('hide-bg-overlay');
      } else {
        video.pause();
        $control.parents('.video-controls').fadeTo(10, 1).css({'z-index':1}).removeClass('hidden');
        $video.parents('.video-wrap').removeClass('hide-bg-overlay');
      }
      e.preventDefault();
    }else if ( $(this).is("#bg-video") ) {
      var $video = $('#bg-video');
      var $control = $('#play-btn');
      if(video.paused == false){
        $control.parents('.video-controls').fadeTo(10, 1).css({'z-index':1}).removeClass('hidden');
        video.pause();
        $video.parents('.video-wrap').removeClass('hide-bg-overlay');
      } else {
        $control.parents('.video-controls').fadeTo(500, 0).css({'z-index':0}).addClass('hidden');
        video.play();
        $video.parents('.video-wrap').addClass('hide-bg-overlay');
      }
    }else if ( $(this).hasClass("lightbox") ){                 
       e.preventDefault();
       $(this).ekkoLightbox({alwaysShowClose: false});
    }else if ( $(this).is("#products-grid") ) {
      product_list = 'grid';
      $(".products-list-type").removeClass("active");
      $(this).addClass("active");
      $('#product-content').data("list_style", product_list);
      loadFilteredProducts(true);
    }else if ( $(this).is("#products-list") ) {
      product_list = 'list';
      $(".products-list-type").removeClass("active");
      $(this).addClass("active");
      $('#product-content').data("list_style", product_list);
      loadFilteredProducts(true);
    }else if ( $(this).hasClass("e_categories") ) {
      product_category = $(this).data('category');
      $(".e_categories").find("span").removeClass("active");
      $(this).find("span").addClass("active");
      loadFilteredProducts(true);
    }else if ( $(this).hasClass("e_tags") ) {
      product_tag = $(this).data('tag');
      $(".e_tags").find("span").removeClass("active");
      $(this).find("span").addClass("active");
      loadFilteredProducts(true);
    }else if ( $(this).hasClass("add_to_cart_button") ) {
      refreshCart();
    }else if ( $(this).hasClass("remove") ) {
      refreshCart();
    }else if ( $(this).hasClass("product_modal_ajax") ) {
      if ( $(window).width() > 767 ) {
        loadModal($(this).data('id'));
        return false;
      }else{
        return true;
      }
    }else if ( $(this).hasClass("banner-video") ) {
      $("#madangModal").html($(".video-banner-cont").html()).modal('show');
    }else if ( $(this).hasClass("menu-item") ) {

      createCookie("product_category", "", 1);
      createCookie("ppp", "", 1);
      createCookie("offset", "", 1);
      createCookie("product_list", "", 1);
      createCookie("product_tag", "", 1);
      createCookie("product_calories_low", "", 1);
      createCookie("product_calories_high", "", 1);
      createCookie("product_pricing_low", "", 1);
      createCookie("product_pricing_high", "", 1);
      createCookie("product_columns", "", 1);
      createCookie("pagenum_link", "", 1);
    }
  });

  $('#madangModal,.modal-search').on('hidden.bs.modal', function () {
     $('#madangModal').empty();
     $('body').removeClass('stop-scrolling')
  });

  function autoPlay(e){
    var video = document.getElementById('bg-video');
    var $video = $('#bg-video');
    var $control = $('#play-btn');
    if(video.paused == true){
      video.play();
      $('.video-bg').hide();
      $control.parents('.video-controls').fadeTo(500, 0).css({'z-index':0}).addClass('hidden');
      $video.parents('.video-wrap').addClass('hide-bg-overlay');
    } else {
      video.pause();
      $control.parents('.video-controls').fadeTo(10, 1).css({'z-index':1}).removeClass('hidden');
      $video.parents('.video-wrap').removeClass('hide-bg-overlay');
    }
    e.preventDefault();
  }

  //video-banner-cont
  $("select").on('change',function(e){
    if ( $(this).is("#product-sorting") ) {
      product_order = $(this).val();
      loadFilteredProducts(true);
    }else if ( $(this).is("#product-records") ) {
      per_page = parseInt($(this).val());
      loadFilteredProducts(true);
    }
  });

  $( window ).resize(function() {
    drawBXSlider1();
  });

  //drawBXSlider();
  var bxslider = $('.bxslider1').bxSlider({});
  drawBXSlider1();
  function drawBXSlider1(){

    ///// featured menu bx slider starts
    if ( $(".bxslider1").length > 0 ){
      if ( $(window).width() > 767) {
        bxslider.reloadSlider({
          minSlides: 4,
          maxSlides: 4,
          adaptiveHeight: true,
          slideWidth: 270,
          slideMargin: 0,
          speed: 1000,
          easing: 'swing',
          auto: true
        });
      } else {

        bxslider.reloadSlider({
          minSlides: 1,
          maxSlides: 1,
          adaptiveHeight: true,
          slideWidth: 270,
          slideMargin: 0,
          speed: 1000,
          easing: 'swing',
          auto: true
        });
      };
    }
  }

  //remove class if browser is IE starts
  var ms_ie = false;
  var ua = window.navigator.userAgent;
  var old_ie = ua.search('MSIE ');
  var new_ie = ua.search('Trident/');

  if ((old_ie > -1) || (new_ie > -1)) {
    ms_ie = true;
  }

  if ( ms_ie ) {
    $('body *').removeClass('hvr-wobble-horizontal');
    $('body *').removeClass('hvr-wobble-vertical');
  }

  //remove class if browser is IE ends
  if(navigator.appVersion.indexOf("MSIE 9.") != -1){
    $("html").addClass("ie9");
  } else if(navigator.appVersion.indexOf("MSIE 8.") == 8){
    $("html").addClass("ie8");
  }

  $(".sidebar-widget li").addClass("wow fadeInRight");

   // Element cache to avoid constant search cycles by the same
  var $input = $('.txtacrescimo');

  // Set 0 to start
  $input.val(1);

  //calories range slider
  $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: $( "#slider-range" ).data('maxvalue'),
      values: [ parseInt( $( "#slider-range" ).data('maxvalue') )/10, (parseInt( $( "#slider-range" ).data('maxvalue') ) - parseInt( $( "#slider-range" ).data('maxvalue') )/10 ) ],
      slide: function( event, ui ) {
        $( "#amount" ).val(  ui.values[ 0 ] + " - " + ui.values[ 1 ] );

        product_calories_low = ui.values[ 0 ];
        product_calories_high = ui.values[ 1 ];
        refreshProductCalories();
      }
  });

  $( "#amount" ).val( + $( "#slider-range" ).slider( "values", 0 ) +
      " - " + $( "#slider-range" ).slider( "values", 1 ) );

  //pricing range slider
  $( "#pricing-range" ).slider({
      range: true,
      min: $( "#pricing-range" ).data('minvalue'),
      max: $( "#pricing-range" ).data('maxvalue'),
      values: [ parseInt( $( "#pricing-range" ).data('minvalue') ), (parseInt( $( "#pricing-range" ).data('maxvalue') ) - parseInt( $( "#pricing-range" ).data('maxvalue') )/10 ) ],
      slide: function( event, ui ) {
        $( "#pricing-amount" ).val(  ui.values[ 0 ] + " - " + ui.values[ 1 ] );

        product_pricing_low = ui.values[ 0 ];
        product_pricing_high = ui.values[ 1 ];
        refreshProductCalories();
      }
  });

  $( "#pricing-amount" ).val( + $( "#pricing-range" ).slider( "values", 0 ) +
      " - " + $( "#pricing-range" ).slider( "values", 1 ) );

  function refreshCart(){
      window.setTimeout( 
        function() {   
           loadCart();
        }, 1500);
       window.setTimeout( 
        function() {   
           loadCart();
        }, 5000);
  }

  var priceTimeout = null;
  function refreshProductCalories(){

      if( priceTimeout!= null ){
        clearTimeout( priceTimeout );
      }
      clearTimeout( priceTimeout );
      priceTimeout = window.setTimeout( 
        function() {   
          loadFilteredProducts(true);

        }, 1000);
  }

  //counter
  $('.counter').counterUp({
      delay: 10,
      time: 1000
  });

  var product_list = "list", per_page = 10, product_category = "", product_tag = "", product_calories_low = 0, product_calories_high = 100000000000000,  product_pricing_low = 0, product_pricing_high = 100000000000000, inRequest = false, product_columns = 4, product_order = "", pagenum_link = "";// product_cat = "";
 
  //defaults
  if( $("#products-grid").length > 0 ){
      product_list = $("#products-grid").data('active');
  }
  if( $("#product-sorting").length > 0 ){
      product_order = $("#product-sorting").data('active');
  }

  function loadFilteredProducts(clear_contents){

    inRequest = true;
    var $content = $('#product-content');
    var $loader = $('#more_posts');
    //var cat = $(".product-gird").data('category');
    var ppp = per_page, color = 'red', size = 'S', price_low = '10', price_high = '1000';
    var offset = $('.grid-product-content .row').find('.item').length;
    var post_id = $loader.data('post-id');
    pagenum_link = $content.data('pagenum_link');
    var pagination = $content.data('pagination');
    product_list = $content.data('list_style');
    $('.load-more-loader').show(); 
    $('.btn-load-more').hide();
    $content.fadeTo( "normal", 0.33 );


    //cache settings if page will be refreshed
    createCookie("product_category", product_category, 1);
    createCookie("ppp", ppp, 1);
    createCookie("offset", offset, 1);
    createCookie("product_list", product_list, 1);
    createCookie("product_tag", product_tag, 1);
    createCookie("product_calories_low", product_calories_low, 1);
    createCookie("product_calories_high", product_calories_high, 1);
    createCookie("product_pricing_low", product_pricing_low, 1);
    createCookie("product_pricing_high", product_pricing_high, 1);
    createCookie("product_columns", product_columns, 1);
    createCookie("pagenum_link", pagenum_link, 1);

    //perform ajax request
    $.ajax({
        type: 'POST',
        dataType: 'html',
        url: screenReaderText.ajaxurl,
        data: {
          'cat': product_category,
          'offset': offset,
          'product_order': product_order,
          'ppp': ppp,
          'product_list': product_list,
          'product_tag': product_tag,
          'product_calories_low': product_calories_low,
          'product_calories_high': product_calories_high,
          'product_pricing_low': product_pricing_low,
          'product_pricing_high': product_pricing_high,
          'product_columns': product_columns,
          'pagenum_link': pagenum_link,
          'pagination': pagination,
          'action': 'madang_filter_products_ajax'
        },
        beforeSend : function () {
          $loader.addClass('post_loading_loader').html('');
        },
        success: function (data) {
          var $data = $(data);
          if(clear_contents) {
              $content.empty();
          }
          if ($data.length) {
            var $newElements = $data.css({ opacity: 0 });
            $content.append($newElements);
            $newElements.animate({ opacity: 1 });
            $loader.removeClass('post_loading_loader');//.html(screenReaderText.loadmore);
            $('.load-more-loader').hide(); 
            $('.btn-load-more').show(); 
          } else {
            $content.html('<div style="text-align:center;letter-spacing:0.1em;margin-top:20px;">'+screenReaderText.noposts+'</div>');
            $loader.removeClass('post_loading_loader').addClass('post_no_more_posts');//.html(screenReaderText.noposts);
            $('.load-more-loader').hide(); 
          }
          inRequest = false;
          $content.fadeTo( "fast", 1 );
        },
        error : function (jqXHR, textStatus, errorThrown) {
          $loader.html($.parseJSON(jqXHR.responseText) + ' :: ' + textStatus + ' :: ' + errorThrown);
          $('.load-more-loader').hide(); 
          $('.btn-load-more').show();
          inRequest = false;
          $content.fadeTo( "fast", 1 );
        },
      });
      offset += ppp;
      return false;
  }

  function loadCart(){

    $.ajax({
        type: 'POST',
        dataType: 'html',
        url: screenReaderText.ajaxurl,
        data: {
          'action': 'madang_cart_data_ajax'
        },
        beforeSend : function () {

        },
        success: function (data) {
          if (data.length){
            var cart = $.parseJSON(data);
            $(".cart-count").html(cart.cart_contents_count);
            if( $(".nutrition-fact-ajax").length > 0 ){

                $(".cart_calories").html(cart.cart_calories);
                $(".cart_proteins").html(cart.cart_proteins);
                $(".cart_fats").html(cart.cart_fats);
                $(".cart_carbohydrates").html(cart.cart_carbohydrates);
            }
          } 
          inRequest = false;
        },
        error : function (jqXHR, textStatus, errorThrown) {
          inRequest = false;
        },
      });
      return false;
  }

  function loadModal(id){

    inRequest = true;
    var $content = $('#product-content');
    $content.fadeTo( "normal", 0.33 );

    $.ajax({
        type: 'POST',
        dataType: 'html',
        url: screenReaderText.ajaxurl,
        data: {
          'action': 'madang_product_modal_ajax'
          ,'id': id,
        },
        beforeSend : function () {

        },
        success: function (data) {
          if (data.length){
            if( $("#madangModal").length > 0 ){

                $("#madangModal").html(data).modal('show');;               
            }
          } 
          inRequest = false;
          $content.fadeTo( "fast", 1 );
        },
        error : function (jqXHR, textStatus, errorThrown) {
          inRequest = false;
          $content.fadeTo( "fast", 1 );
        },
      });
      return false;
  }

  //set defaults after refresh
  $(".e_tags").find("span").removeClass("active");
  product_tag = readCookie("product_tag");
  $('.e_tags[data-tag="'+product_tag+'"]').find("span").addClass("active");

  $(".e_categories").find("span").removeClass("active");
  product_category = readCookie("product_category");
  $('.e_categories[data-category="'+product_category+'"]').find("span").addClass("active");

  var product_list_temp = readCookie("product_list");
  if(product_list_temp!=null){
    if(product_list_temp.length>0){
      $("#products-"+product_list_temp).addClass("active");
      $(".products-list-type").removeClass("active");
      product_list = product_list_temp;
    }
  }

  function createCookie(name, value, days) {
      var expires;
      if (days) {
          var date = new Date();
          date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
          expires = "; expires=" + date.toGMTString();
      } else {
          expires = "";
      }
      document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
  }

  function readCookie(name) {
      var nameEQ = encodeURIComponent(name) + "=";
      var ca = document.cookie.split(';');
      for (var i = 0; i < ca.length; i++) {
          var c = ca[i];
          while (c.charAt(0) === ' ') c = c.substring(1, c.length);
          if (c.indexOf(nameEQ) === 0) return decodeURIComponent(c.substring(nameEQ.length, c.length));
      }
      return null;
  }

});

//accordion
jQuery(function($) {
  var Accordion = function(el, multiple) {
    this.el = el || {};
    this.multiple = multiple || false;

    // Variables privadas
    var links = this.el.find('.link');
    links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)  }

  Accordion.prototype.dropdown = function(e) {
    var $el = e.data.el;
      $this = $(this),
      $next = $this.next();

    $next.slideToggle();
    $this.parent().toggleClass('open');

    if (!e.data.multiple) {
      $el.find('.detail').not($next).slideUp().parent().removeClass('open');
    };
  } 

  var accordion = new Accordion($('.acdn'), false);
});

function initMap() {
  var mapCanvas = document.getElementById("map");
  if(mapCanvas == null) 
    return;
  var myCenter = new google.maps.LatLng(mapCanvas.dataset.latitude, mapCanvas.dataset.longitude);
  var mapOptions = {
    center: myCenter,
    zoom: ((mapCanvas.dataset.zoom=='')?15:parseInt(mapCanvas.dataset.zoom)),
    disableDoubleClickZoom: true,
    navigationControl: false,
    mapTypeControl: false,
    scaleControl: false,
    zoomControl: false,
    scrollwheel: false,
    styles: [
    {
      featureType: 'all',
      stylers: [
      { saturation: ((mapCanvas.dataset.saturation=='')?(-80):parseInt(mapCanvas.dataset.saturation)) },
      { hue: ((mapCanvas.dataset.hue=='')?'#ccc':mapCanvas.dataset.hue) },
      ]
    }, {
      featureType: 'road.arterial',
      elementType: 'geometry',
      stylers: [
      { hue: '#654ef4' },
      { saturation: 50 }
      ]
    }, {
      featureType: 'poi.business',
      elementType: 'labels',
      stylers: [
      { visibility: 'off' }
      ]
    }
    ]
  };
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({});
  if(mapCanvas.dataset.pointer=='pointer'){

    marker = new google.maps.Marker({
      position: myCenter,
      map: map,
      title: mapCanvas.dataset.balloon
    });
  }else{
    var infowindow = new google.maps.InfoWindow({
      position: myCenter,
      content: mapCanvas.dataset.balloon
    });
    infowindow.open(map, marker);
  }
}