<?php
	add_shortcode('social', 'social_handler');
	

	function social_handler($atts, $content=null, $code="") {
	/* Icon */
	$icon=$atts["icon"];
	$link=$atts["link"];
	
	$content = '<a href="'.$link.'" class="icon-text social-icon" target="_blank">&#'.$icon.';</a>';
	return $content;
	}
	
?>