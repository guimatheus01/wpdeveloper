jQuery(function(e){e("input#min_price, input#max_price").hide(),e(".price_slider, .price_label").show();var i=e(".price_slider_amount #min_price").data("min"),r=e(".price_slider_amount #max_price").data("max"),a=parseInt(i,10),t=parseInt(r,10),n="left",_="$";e(document.body).on("price_slider_create price_slider_slide",function(i,r,a){"left"===n?(e(".price_slider_amount span.from").html(_+r),e(".price_slider_amount span.to").html(_+a)):"left_space"===n?(e(".price_slider_amount span.from").html(_+" "+r),e(".price_slider_amount span.to").html(_+" "+a)):"right"===n?(e(".price_slider_amount span.from").html(r+_),e(".price_slider_amount span.to").html(a+_)):"right_space"===n&&(e(".price_slider_amount span.from").html(r+" "+_),e(".price_slider_amount span.to").html(a+" "+_)),e(document.body).trigger("price_slider_updated",[r,a])}),e(".price_slider").slider({range:!0,animate:!0,min:i,max:r,values:[a,t],create:function(){e(".price_slider_amount #min_price").val(a),e(".price_slider_amount #max_price").val(t),e(document.body).trigger("price_slider_create",[a,t])},slide:function(i,r){e("input#min_price").val(r.values[0]),e("input#max_price").val(r.values[1]),e(document.body).trigger("price_slider_slide",[r.values[0],r.values[1]])},change:function(i,r){e(document.body).trigger("price_slider_change",[r.values[0],r.values[1]])}})});