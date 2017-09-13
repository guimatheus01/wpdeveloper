jQuery(function($) { "use strict";
    $(document).on('confirmation', '.popup-license', function () {
        $('#17_section_group_li_a').click();
    });
	$(document).on('click', '.notice-dismiss', function(){		
		$('.floris_notice_diss').fadeOut();
		return(false);
	});
    function note_message(content){
        $('#info-verification_status p').html(content);
        $('#info-verification_status').show('fast');
    }
	if( $('#floris_opt-mega_menu_position').length ){
		$('#floris_opt-mega_menu_position').closest('tr').css('backgroundColor','#EDEFF0');
	}
    $('.redux-container').on('click', '.validation_activate_buttons', function(e) { 
        e.preventDefault();
        $('#info-verification_status').hide('fast');
        var purchase_code = $('#purchase_code_verification').val();
        var verify = $(this).data('verify');
        if (purchase_code == '') {
            var messege = 'Please, enter purchase code.'
            note_message(response);
        }else{
            $.ajax({
                url : ajaxurl,
                type : 'post',
                data : {
                    action : 'floris_theme_verification',
                    purchase_code : purchase_code,
                    verify : verify
                },
                success : function( response ) {                
                    note_message(response);
                },
                error: function(errorThrown){
                    console.log(errorThrown);
                }
            });
        }         
    });     
});