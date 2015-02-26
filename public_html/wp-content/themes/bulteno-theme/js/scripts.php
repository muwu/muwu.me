<?php
	header("Content-type: text/javascript");
	require_once('../../../../wp-load.php');


?>
	//form validation
	function validateName(fld) {
			
		var error = "";
				
		if (fld.value === '' || fld.value === 'Nickname' || fld.value === 'Enter Your Name..' || fld.value === 'Your Name..') {
			error = "<?php printf ( __( 'You didn\'t enter Your First Name.' , THEME_NAME ));?>\n";
		} else if ((fld.value.length < 2) || (fld.value.length > 50)) {
			error = "<?php printf ( __( 'First Name is the wrong length.' , THEME_NAME ));?>\n";
		}
		return error;
	}
			
	function validateEmail(fld) {

		var error="";
		var illegalChars = /^[^@]+@[^@.]+\.[^@]*\w\w$/;
				
		if (fld.value === "") {
			error = "<?php printf ( __( 'You didn\'t enter an email address.' , THEME_NAME ));?>\n";
		} else if ( fld.value.match(illegalChars) === null) {
			error = "<?php printf ( __( 'The email address contains illegal characters.' , THEME_NAME ));?>\n";
		}

		return error;

	}
			
	function validateMessage(fld) {

		var error = "";
				
		if (fld.value === '') {
			error = "<?php printf ( __( 'You didn\'t enter Your message.' , THEME_NAME ));?>\n";
		} else if (fld.value.length < 3) {
			error = "<?php printf ( __( 'The message is to short.' , THEME_NAME ));?>\n";
		}

		return error;
	}

jQuery(document).ready(function($) {	
	jQuery(".panel .right-top-panel a.icon-text").click(function(){
		var parseid = $(this).attr('id');
		if(parseid == "sidebar-icon-popular"){
			jQuery(this).parent().parent().parent().children().eq(0).html("<?php _e("Popular Articles",THEME_NAME);?>");
			jQuery(this).addClass("active");
			jQuery("#sidebar-icon-comments").removeClass("active");
			jQuery("#sidebar-panel-comments").hide();
			jQuery("#sidebar-panel-popular").fadeIn('fast');
		}else
		if(parseid == "sidebar-icon-comments"){
			jQuery(this).parent().parent().parent().children().eq(0).html("<?php _e("Recent Comments",THEME_NAME);?>");
			jQuery(this).addClass("active");
			jQuery("#sidebar-icon-popular").removeClass("active");
			jQuery("#sidebar-panel-popular").hide();
			jQuery("#sidebar-panel-comments").fadeIn('fast');
		}
	});	
});	
