$(document).ready(function() { 
  $(window).load(function() {
    //PRELODERPAGE
    $("#status").fadeOut();
    $("#logo").fadeOut();
    $("#preloader").delay(1000).fadeOut(1000);
    $('body').removeClass('preloader-running');
    $('body').addClass('preloader-done');
  });
});
//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top -10
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});
//jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});


$(function() {
    //CRONOMETRO
     $('#clock').countdown('2017/02/25', function(event) {
     var $this = $(this).html(event.strftime(''
     + '<div class="item_crono crono_day"> <span class="num_crono">%w</span>  <span class="txt_crono"> SEMANA </span> </div>'
     + '<div class="item_crono crono_day"> <span class="num_crono">%-d</span>  <span class="txt_crono"> DIA%!d </span> </div>'
     + '<div class="item_crono"> <span class="num_crono">%H:</span>  <span class="txt_crono">HORAS </span> </div>'
     + '<div class="item_crono"> <span class="num_crono">%M:</span>  <span class="txt_crono">MINUTOS</span> </div>'
     + '<div class="item_crono"> <span class="num_crono">%S</span>   <span class="txt_crono">SEGUNDOS</span> </div>'));
  });

var map;
window.initMap = function() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    panControl: false,
    zoomControl: false,
    scrollwheel: false,
    center: {lat: -15.6345701, lng: -56.1075264}
  });

  marker = new google.maps.Marker({
    map: map,
    icon:'wp-content/themes/metamorphose/assets/img/map_marker.png',
    draggable: true,
    animation: google.maps.Animation.DROP,
    position: {lat: -15.6345701, lng: -56.1075264}
  });
  marker.addListener('click', toggleBounce);
}

function toggleBounce() {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
        google.maps.event.addDomListener(window, 'load', initMap);

}});