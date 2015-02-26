<?php
	add_shortcode('blockquote', 'blockquote_handler');

	function blockquote_handler($atts, $content=null, $code="") {
		if($atts['style'] == "style 1") {
			$style="1";
		} else if($atts['style'] == "style 2") {
			$style="2";
		} else {
			$style="1";
		}
	
	
		if($style=="2") {
			$return =  '<blockquote class="quote-style-big">';
			$return.=  $content;
			$return.=  '</blockquote>';
		} else {
			$return =  '<blockquote>';
			$return.=  $content;
			$return.=  '</blockquote>';
		}
		return $return;
	}
?>
