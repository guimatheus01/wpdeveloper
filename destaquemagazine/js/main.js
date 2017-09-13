jQuery(document).ready(function($) {
	
	   // Fill modal with content from link href
$("#myModalAjax").on("show.bs.modal", function(e) {
    var link = $(e.relatedTarget);
	$(this).find(".modal-title").html(link.attr("data-titulo"));
    $(this).find(".modal-body").load(link.attr("href"));
	   $(this).find(".modal-body").css('overflow-y', 'none'); 
    $(this).find(".modal-body").css('height', $(window).height() * 0.9);
	//$(this).find(".modal-body iframe").attr("src",link.attr("href"));
	
});


	"use strict";
	/* pretty photo */
	 $(document).ready(function(){
	  $("a[data-rel^='prettyPhoto']").prettyPhoto();
	  $("a.prettyphoto").prettyPhoto();
	  $("a[data-rel^='prettyPhoto']").prettyPhoto({hook:"data-rel",social_tools:!1,theme:"pp_default",horizontal_padding:20,opacity:.8,deeplinking:!1});
	 })
	var back_to_top = '1';
	var header_type = 'ontop';
	var menu_sticky_tablets = "";
	var menu_sticky_mobile = "";
	var paralax = '1';
	var one_page = false;
	
	/* window */
	var window_width, window_height, scroll_top;
	
	/* menu */
	var menu_sticky = '0';
	
	/* header */
	var header = $('#cms-header-wrapper');
	var header_top = 0;
	
	/* scroll status */
	var scroll_status = '';
	
	if($(".header-onepage").length > 0) {
		one_page = true;
	}
	
	if($("#cms-header.has-sticky").length > 0) {
		menu_sticky = '1';
	}

	/* Show search at top */
    $("#header-widget-search").on('click', function () {
        $("#cms-search").toggleClass('open');
        $("#cms-search input[type='text']" ).focus();
    });
    $("#header-widget-search-close").on('click', function () {
        $("#cms-search").removeClass('open');
    });

    /* Show Main Navigation for Header v4*/
    $("#cms-show-mainnav").on('click', function () {
        $("#cms-mainnav-v4").toggleClass('open');
    });
    $("#cms-hide-mainnav").on('click', function () {
        $("#cms-mainnav-v4").removeClass('open');
    });


	/**
	 * window load event.
	 */
	$(window).load(function() {
							
		$(".noo-spinner").remove();
		$("#cms-page").css("opacity", "1");
		
		/** current scroll */
		scroll_top = $(window).scrollTop();
		
		/** current window width */
		window_width = $(window).width();
		
		/** current window height */
		window_height = $(window).height();
		
		/* get Header height */
		header_top = header.length > 0 ? header.outerHeight(true) : 0 ;
		
		/* check sticky menu. */
		if(menu_sticky == '1'){
			cms_stiky_menu(scroll_top);
		}
		
		/* check mobile menu */
		cms_mobile_menu();
		
		/* check back to top */
		if(back_to_top == '1'){
			/* add html. */
			$('body').append('<div id="back_to_top" class="back_to_top"><span class="go_up"><i style="" class="fa fa-arrow-up"></i></span></div><!-- #back-to-top -->');
			cms_back_to_top();
		}
	});

	/**
	 * reload event.
	 * 
	 * Bind an event handler to the "navigate".
	 */
	window.onbeforeunload = function(){ }
	
	/**
	 * resize event.
	 */
	$(window).resize(function(event, ui) {
		/** current window width */
		window_width = $(event.target).width();
		
		/** current window height */
		window_height = $(window).height();
		
		/** current scroll */
		scroll_top = $(window).scrollTop();
		
		/* check sticky menu. */
		if(menu_sticky == '1'){
			cms_stiky_menu(scroll_top);
		}
		
		/* check mobile menu */
		cms_mobile_menu();
		
	});
	
	/**
	 * scroll event.
	 */
	var lastScrollTop = 0;
	
	$(window).scroll(function() {
		/** current scroll */
		scroll_top = $(window).scrollTop();
		/** check scroll up or down. */
		if(scroll_top < lastScrollTop) {
			/* scroll up. */
			scroll_status = 'up';
		} else {
			/* scroll down. */
			scroll_status = 'down';
		}
		
		lastScrollTop = scroll_top;
		
		/* check sticky menu. */
		if(menu_sticky == '1'){
			cms_stiky_menu();
		}

		/* Header type style */
		if(header_type == 'fixed'){
			cms_menu_fixed_bg();
		}
		
		/* check back to top */
		cms_back_to_top();
	});

	/**
	 * Sticky menu
	 */
	function cms_stiky_menu() {
		if (header_top < scroll_top) {
			switch (true) {
				case (window_width > 992):
					header.find('#masthead #cms-header').addClass('header-sticky');
					$('body').addClass('sticky-margin-top');
					break;
				case ((window_width <= 992 && window_width >= 768) && (menu_sticky_tablets == '1')):
					header.find('#masthead #cms-header').addClass('header-sticky');
					$('body').addClass('sticky-margin-top');
					break;
				case ((window_width <= 768) && (menu_sticky_mobile == '1')):
					header.find('#masthead #cms-header').addClass('header-sticky');
					$('body').addClass('sticky-margin-top');
					break;
			}
		} else {
			header.find('#masthead #cms-header').removeClass('header-sticky');
			$('body').removeClass('sticky-margin-top');
		}
	}
	function cms_menu_fixed_bg() {
		if (header_top < scroll_top) {
			header.addClass('cms-header-fixed-bg');
		} else {
			header.removeClass('cms-header-fixed-bg');
		}
	}
	
	/**
	 * Mobile menu
	 */
	
	$('body').on('click', '#cms-menu-mobile', function(){
		var navigation = $(this).parent().parent().parent().parent().parent().parent().parent().parent().find('#cms-header-navigation');
		if(!navigation.hasClass('collapse')){
			navigation.addClass('collapse');
		} else {
			navigation.removeClass('collapse');
		}
	});
	/* check mobile screen. */
	function cms_mobile_menu() {
		var menu = $('#cms-header-navigation');
		
		/* active mobile menu. */
		switch (true) {
		case (window_width <= 992 && window_width >= 768):
			menu.removeClass('phones-nav').addClass('tablets-nav');
			/* */
			cms_mobile_menu_group(menu);
			break;
		case (window_width <= 768):
			menu.removeClass('tablets-nav').addClass('phones-nav');
			break;
		default:
			menu.removeClass('mobile-nav tablets-nav');
			menu.find('li').removeClass('mobile-group');
			break;
		}	
	}
	/* group sub menu. */
	function cms_mobile_menu_group(nav) {
		nav.each(function(){
			$(this).find('li').each(function(){
				if($(this).find('ul:first').length > 0){
					$(this).addClass('mobile-group');
				}
			});
		});
	}
	

	/**
	 * Parallax.
	 */
	var cms_parallax = $('.cms_parallax');
	if(cms_parallax.length > 0 && paralax == '1'){
		cms_parallax.each(function() {
			"use strict";
			var speed = $(this).attr('data-speed');
			
			speed = (speed != undefined && speed != '') ? speed : 0.1 ;
			
			$(this).parallax("50%", speed);
		});
	}
	
	/**
	 * Back To Top
	 */
	$('body').on('click', '#back_to_top', function () {
        $("html, body").animate({
            scrollTop: 0
        }, 1500);
    });
	
	/* Show or hide buttom  */
	function cms_back_to_top(){
		/* back to top */
        if (scroll_top < window_height) {
        	$('#back_to_top').addClass('off').removeClass('on');
        } else {
        	$('#back_to_top').removeClass('off').addClass('on');
        }
	}
	
	/**
	 * One page
	 */
	if(one_page == true && $('.onepage').length > 0){
		
		$('body').on('click', '.onepage', function () {
			$('#cms-menu-mobile').removeClass('close-open');
			$('#cms-header-navigation').removeClass('open-menu');
			$('.cms-menu-close').removeClass('open');
		});
		
		var one_page_options = {'filter' : '.onepage'};
		
		$('#site-navigation').singlePageNav({offset: $('.single-page-nav').outerHeight() + 150, filter: '.onepage'});
		$('#site-navigation-2').singlePageNav({offset: $('.single-page-nav').outerHeight() + 150, filter: '.onepage'});
		$('#site-navigation-mobile').singlePageNav({offset: $('.single-page-nav').outerHeight() + 150, filter: '.onepage'});
		$('#cms-onepage-nav').singlePageNav(one_page_options);
	}
	
	/**
	 * Full page
	 */
	if($('.full-page').length > 0){
		
		var anchors = [];
		
		$('.full-page .cms-grid .cms-grid-item-fullpage').each(function(i) {
			if($(this).attr('id') != undefined){
				anchors.push($(this).attr('id'));
			}
		})
		
		$('.full-page').fullpage({
			sectionSelector : '.cms-grid-item-fullpage',
			autoScrolling:true,
			navigation:true,
		});

		$(".cms-open-popup").fullScreenPopup({
			lockDocumentScroll: false,
		}); 
	}
	
	function GoogleMap() {
        // When the window has finished loading create our google map below
        var marker_image = "../images/assets/map-marker.png";

        if ($('#map').length > 0) {
            if($('#map').attr('data-marker-image') != undefined){
                marker_image = $('#map').attr('data-marker-image')
            }
            google.maps.event.addDomListener(window, 'load', init);
        }

        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 11,
                scrollwheel: false,

                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(40.6700, -73.9400), // New York

                // How you would like to style the map.
                // This is where you would paste any style found on Snazzy Maps.
                styles: [{
                    "featureType": "water",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#d3d3d3"}]
                }, {
                    "featureType": "transit",
                    "stylers": [{"color": "#808080"}, {"visibility": "off"}]
                }, {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [{"visibility": "on"}, {"color": "#b3b3b3"}]
                }, {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#ffffff"}]
                }, {
                    "featureType": "road.local",
                    "elementType": "geometry.fill",
                    "stylers": [{"visibility": "on"}, {"color": "#ffffff"}, {"weight": 1.8}]
                }, {
                    "featureType": "road.local",
                    "elementType": "geometry.stroke",
                    "stylers": [{"color": "#d7d7d7"}]
                }, {
                    "featureType": "poi",
                    "elementType": "geometry.fill",
                    "stylers": [{"visibility": "on"}, {"color": "#ebebeb"}]
                }, {
                    "featureType": "administrative",
                    "elementType": "geometry",
                    "stylers": [{"color": "#a7a7a7"}]
                }, {
                    "featureType": "road.arterial",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#ffffff"}]
                }, {
                    "featureType": "road.arterial",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#ffffff"}]
                }, {
                    "featureType": "landscape",
                    "elementType": "geometry.fill",
                    "stylers": [{"visibility": "on"}, {"color": "#efefef"}]
                }, {
                    "featureType": "road",
                    "elementType": "labels.text.fill",
                    "stylers": [{"color": "#696969"}]
                }, {
                    "featureType": "administrative",
                    "elementType": "labels.text.fill",
                    "stylers": [{"visibility": "on"}, {"color": "#737373"}]
                }, {
                    "featureType": "poi",
                    "elementType": "labels.icon",
                    "stylers": [{"visibility": "off"}]
                }, {
                    "featureType": "poi",
                    "elementType": "labels",
                    "stylers": [{"visibility": "off"}]
                }, {
                    "featureType": "road.arterial",
                    "elementType": "geometry.stroke",
                    "stylers": [{"color": "#d6d6d6"}]
                }, {
                    "featureType": "road",
                    "elementType": "labels.icon",
                    "stylers": [{"visibility": "off"}]
                }, {}, {"featureType": "poi", "elementType": "geometry.fill", "stylers": [{"color": "#dadada"}]}]
            };

            // Get the HTML DOM element that will contain your map
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('map');
            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);

            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(40.6000, -73.9400),
                map: map,
                title: 'Megatron',
                icon: marker_image
            });

            var marker2 = new google.maps.Marker({
                position: new google.maps.LatLng(40.6800, -73.8000),
                map: map,
                title: 'Megatron',
                icon: marker_image
            });

            var marker3 = new google.maps.Marker({
                position: new google.maps.LatLng(40.7300, -74.1280),
                map: map,
                title: 'Megatron',
                icon: marker_image
            });

        }
    }

    GoogleMap();
	
	function Animation() {
        var wow = new WOW(
            {
                boxClass: 'wow',      // default
                animateClass: 'animated', // default
                offset: 0,          // default
                mobile: true,       // default
                live: true        // default
            }
        );
        wow.init();
    }

    if($('.wow').length > 0) Animation();
	
	function Progressbar() {
        $('.cms-progress-wraper').each(function () {
            var $this = $(this);
            var waypoint = $this.waypoint({
                handler: function (direction) {
                    $this.find('.progress-bar').progressbar();
                },
                offset: "80%"
            });
        })
    }

    Progressbar();
	
	//Counter
	if($('.cms-counter-body').length > 0) {
		$('.cms-counter-body').each(function (index) {
			var $this = $(this);
			var waypoint = $this.waypoint({
				handler: function (direction) {
					$this.find('.timer:not(.counted)').countTo().addClass('counted');
				},
				offset: "90%"
			});
		});
	}
	
	//Owl Carousel
	$('.cms-carousel-testimonial').each(function() {
		var el = $(this);
		el.owlCarousel({
			items : 1,
			itemsDesktop : [1199,1],
			itemsDesktopSmall : [979,1],
			itemsTablet: [767, 1],
			itemsMobile: [480, 1],
			slideSpeed:500,
			paginationSpeed:1000,
			rewindSpeed:1000,
			autoHeight: false,
			addClassActive: true,
			autoPlay: false,
			loop:true,
			pagination: true
		});
	});
	
	$('.cms-carousel-photography').each(function() {
		var el = $(this);
		el.owlCarousel({
			items : 5,
			itemsDesktop : [1199,5],
			itemsDesktopSmall : [979,3],
			itemsTablet: [767, 3],
			itemsMobile: [480, 2],
			slideSpeed:500,
			paginationSpeed:1000,
			rewindSpeed:1000,
			autoHeight: false,
			addClassActive: true,
			autoPlay: false,
			loop:true,
			pagination: false
		});
	});

	$('.cms-carousel-shopping').each(function() {
		var el = $(this);
		el.owlCarousel({
			items : 4,
			itemsDesktop : [1199,4],
			itemsDesktopSmall : [979,3],
			itemsTablet: [767, 3],
			itemsMobile: [480, 2],
			slideSpeed:500,
			paginationSpeed:1000,
			rewindSpeed:1000,
			autoHeight: false,
			addClassActive: true,
			autoPlay: false,
			loop:true,
			pagination: true
		});
	});

	
	$('.cms-carousel-gallery').each(function() {
		var el = $(this);
		el.owlCarousel({
			items : 6,
			itemsDesktop : [1199,6],
			itemsDesktopSmall : [979,4],
			itemsTablet: [767, 3],
			itemsMobile: [480, 2],
			slideSpeed:500,
			paginationSpeed:1000,
			rewindSpeed:1000,
			autoHeight: false,
			addClassActive: true,
			autoPlay: true,
			loop:true,
			pagination: false
		});
	});
	
	$(".icon_cart_wrap").on('click', function () {
		$(".shopping_cart_dropdown").toggleClass("active");
	});

	$('.owl-carousel').owlCarousel({
	    loop:true,
	    margin:0,
	    nav:true,
	    items : 1,
		itemsDesktop : [1199,1],
		itemsDesktopSmall : [979,1],
		itemsTablet: [767, 1],
		itemsMobile: [480, 1],
	})


});

//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $(document).on('click', '.nav-menu>li>a', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});