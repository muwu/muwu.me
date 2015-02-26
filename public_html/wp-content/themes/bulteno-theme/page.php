<?php 

	$sidebarPosition = get_option ( THEME_NAME."_sidebar_position" ); 
	$sidebarPositionCustom = get_post_meta ( OT_page_id(), THEME_NAME."_sidebar_position", true ); 
	
	get_header();
	get_template_part(THEME_INCLUDES."top");
	
	if( $sidebarPosition == "left" || ( $sidebarPosition == "custom" &&  $sidebarPositionCustom == "left") ) { 
		get_template_part(THEME_INCLUDES."sidebar");
	}
	
	get_template_part(THEME_INCLUDES."page","single");

	if( $sidebarPosition == "right" || ( $sidebarPosition == "custom" &&  $sidebarPositionCustom == "right") ) { 
		get_template_part(THEME_INCLUDES."sidebar");
	}
	if( $sidebarPosition == "custom" && !$sidebarPositionCustom ) { 
		get_template_part(THEME_INCLUDES."sidebar");
	}
	
	get_footer(); 

?>