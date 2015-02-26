<?php
	add_shortcode('doubleparagraphleft', 'doubleparagraphleft_handler');
	add_shortcode('doubleparagraphright', 'doubleparagraphright_handler');
	add_shortcode('thirdparagraphright', 'thirdparagraphright_handler');
	add_shortcode('thirdparagraphcenter', 'thirdparagraphcenter_handler');
	add_shortcode('thirdparagraphleft', 'thirdparagraphleft_handler');

	function doubleparagraphleft_handler($atts, $content=null, $code="") {
		$return = '<div class="double-paragraph-left"><p>'.do_shortcode($content).'</p></div>';
		return $return;
	}
	
	function doubleparagraphright_handler($atts, $content=null, $code="") {
		$return = '<div class="double-paragraph-right"><p>'.do_shortcode($content).'</p></div><div class="clear-float"></div>';
		return $return;
	}
	
	
	function thirdparagraphright_handler($atts, $content=null, $code="") {
		$return = '<div class="triple-paragraph-left"><p>'.do_shortcode($content).'</p></div>';
		return $return;
	}	
	
	function thirdparagraphcenter_handler($atts, $content=null, $code="") {
		$return = '<div class="triple-paragraph-middle"><p>'.do_shortcode($content).'</p></div>';
		return $return;
	}
	
	function thirdparagraphleft_handler($atts, $content=null, $code="") {
		$return = '<div class="triple-paragraph-right"><p>'.do_shortcode($content).'</p></div><div class="clear-float"></div>';
		return $return;
	}
?>
