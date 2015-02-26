<?php
add_shortcode('button', 'button_handler');

function button_handler($atts, $content=null, $code="") {
	
	/* Color */
	$color=$atts["color"];
	$textColor=$atts["textcolor"];


	
	/* Size */
	$size=$atts["size"];
	

	/* Target */
	$target=$atts["target"];
	if(!isset($atts["target"]) || $atts["target"]=="blank") {
		$target="_blank";
	} else {
		$target="self";
	}

	/* link */
	if(isset($atts["link"])) {
		$link = $atts["link"];
	} else {
		$link = "#";
	}
	if($size=="small") {
		$return = '<a href="'.$link.'" class="button" style="background:#'.$color.'; color:#'.$textColor.';">'.$content.'</a>';
	} else {
		$return = '<a href="'.$link.'" class="'.$size.'-button" style="background:#'.$color.'; color:#'.$textColor.';">'.$content.'</a>';
	}
	return $return;
}

?>