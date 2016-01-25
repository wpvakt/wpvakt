jQuery(document).ready(function( $ ) {

	if($('.wpv_settings').length > 0) {
		/**
		 * Checking the status on active offer
		 */
		var status_container = $('.wpv_status');
		//var status_checker = $('.wpv_settings').prepend('<div class="wpv_checking_status"><div class="wpv_loading_status_icon_container"><span class="wpv_loading_status_icon"></span></div><span class="wpv_loading_status_msg">Checking status ... </span></div>').find('.wpv_checking_status');
		status_container.html('<div class="wpv_checking_status"><div class="wpv_loading_status_icon_container"><span class="wpv_loading_status_icon"></span></div><span class="wpv_loading_status_msg">Sjekker sikkerhetsstatus ... </span></div>');
		$.ajax({
			type: 'POST',
			url: scriptsajax.ajaxurl,  
			data: {
				action: 'wpv_status'
			},
			success: function(data, textStatus, XMLHttpRequest) {
				//status_checker.remove();
				status_container.html(data);
			},
			error: function(MLHttpRequest, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
	}



	if($('#wpvakt').length > 0) {
		/**
		 * Checking the status on active offer on DASHBOARD WIDGET
		 */
		var status_container = $('.wpv_status');
		//var status_checker = $('.wpv_settings').prepend('<div class="wpv_checking_status"><div class="wpv_loading_status_icon_container"><span class="wpv_loading_status_icon"></span></div><span class="wpv_loading_status_msg">Checking status ... </span></div>').find('.wpv_checking_status');
		status_container.html('<div class="wpv_checking_status"><div class="wpv_loading_status_icon_container"><span class="wpv_loading_status_icon"></span></div><span class="wpv_loading_status_msg">Sjekker sikkerhetsstatus ... </span></div>');
		$.ajax({
			type: 'POST',
			url: scriptsajax.ajaxurl,  
			data: {
				action: 'wpvakt_dashboard_status'
			},
			success: function(data, textStatus, XMLHttpRequest) {
				status_container.html(data);
			},
			error: function(MLHttpRequest, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
	}
	
	

});