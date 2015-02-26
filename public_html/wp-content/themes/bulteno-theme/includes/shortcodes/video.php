<?php
add_shortcode('video', 'video_handler');

function video_handler($atts, $content=null, $code="") {
	if(isset($atts['url'])) {
	$video = OT_youtube_image($atts['url']);
	$image = "http://img.youtube.com/vi/".$video."/0.jpg";
	$content ="
			<a href=\"javascript:void(0);\" rel=\"".$video."\" class=\"image-border image-hover youtube-video\">
				<span class=\"image-overlay\"><span class=\"icon-text\">&#9654;</span>".__("Play Video",THEME_NAME)."</span>
				<img src=\"".THEME_IMAGE_URL."px.gif\" style=\"background-image:url(".$image.")\" title=\"".__("Play",THEME_NAME)."\" alt=\"".__("Play",THEME_NAME)."\" /></a>
		</span>
	";

	} else {
		$content.= "No url attribute defined!";
	
	}
	return $content;
}

?>