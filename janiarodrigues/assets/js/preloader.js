jQuery(window).load(function(){
    jQuery('.loading').addClass('active');	
	setTimeout(function(){
	  jQuery('.loading').fadeOut(); 
	  jQuery('body').addClass('start');	
	},1000);
});