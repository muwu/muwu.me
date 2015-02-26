<?php
remove_shortcode('googlemap');
add_shortcode('googlemap', 'googlemap_handler');

function googlemap_handler($atts, $content=null, $code="") {
	
	return "<div id=\"mapviewer\">
		<iframe id=\"map\" Name=\"map\" width='650' height='414' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='".($content)."&amp;iwloc=A&amp;output=embed'></iframe></div>";
}

?>