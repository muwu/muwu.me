<?php

	global $wp_query;
	
	if (isset($wp_query->post->ID)) {
		$page_id = $wp_query->post->ID;
	} else {
		$page_id =  false;
	}
	
	if(is_home()) {
		
		if('page' == get_option('show_on_front')) {
			if(is_front_page()) {
				$page_id = get_option('page_on_front');
			} else {
				$page_id = get_option('page_for_posts');
			}
		}
	}

	$sidebar = get_post_meta( $page_id, THEME_NAME.'_sidebar_select', true );
	if ( $sidebar=='' ) {
		$sidebar='default';
	}
	
	if(is_home()) {
		$postPageID = OT_page_id();
	} else {
		$postPageID = $post->ID;
	}
	
	$sidebarPosition = get_option ( THEME_NAME."_sidebar_position" ); 
	$sidebarPositionCustom = get_post_meta ( OT_page_id(), THEME_NAME."_sidebar_position", true ); 
	
	if( $sidebarPosition == "left" || ( $sidebarPosition == "custom" &&  $sidebarPositionCustom == "left") ) { 
		$sidebarClass=" left";
	} else if( $sidebarPosition == "right" || ( $sidebarPosition == "custom" &&  $sidebarPositionCustom == "right") ) { 
		$sidebarClass=" right";
	} else if ( $sidebarPosition == "custom" && !$sidebarPositionCustom ) { 
		$sidebarClass=" right";
	} else {
		$sidebarClass=" right";
	}
?>
					<!-- BEGIN .right-content -->
					<div class="sidebar-content<?php echo $sidebarClass;?>">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar) ) : ?>
						<?php endif; ?>
					<!-- END .right-content -->
					</div>
