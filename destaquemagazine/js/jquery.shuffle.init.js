!function(t){t(document).bind("ready ajaxComplete",function(){t(".cms-grid-masonry").each(function(){$this=t(this),$filter=$this.parent().find(".cms-grid-filter"),$this.imagesLoaded(function(){$this.shuffle({itemSelector:".cms-grid-item"})}),$filter&&$filter.find("a").on("click",function(i){i.preventDefault(),$filter.find("a").removeClass("active"),t(this).addClass("active");var e=t(this).attr("data-group");t(this).parent().parent().parent().parent().find(".cms-grid-masonry").shuffle("shuffle",e)})})})}(jQuery);