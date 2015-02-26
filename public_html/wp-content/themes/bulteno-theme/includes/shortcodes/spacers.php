<?php
	add_shortcode('spacer', 'spacer_handler');

	function spacer_handler($atts, $content=null, $code="") {
	
			
		if($atts['style']) {
			return '<div class="breaking-line br-style-'.$atts['style'].'">&nbsp;</div>';
		}else {
			return '<div class="breaking-line br-style-1">&nbsp;</div>';
		}
	}
?>