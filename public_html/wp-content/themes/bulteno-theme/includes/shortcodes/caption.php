<?php
	add_shortcode('caption', 'caption_handler');

	

	
	function caption_handler($atts, $content=null, $code="") {
	
		/* title */
		if(isset($atts["title"])) {
			$title_i = $atts["title"];
		} else {
			$title_i = "";
		}
		
		/* url */
		if(isset($atts["url"])) {
			$url_i = $atts["url"];
		} else {
			$url_i = "";
		}
		$blog_url = get_template_directory_uri();
			$return =  '		<a href="'.$url_i.'" class="image-border image-hover lightbox-photo" title="'.$title_i.'">
									<span class="image-caption">'.$title_i.'</span>
										<span class="image-overlay"><span class="icon-text">&#128269;</span>'.__("View Larger Photo",THEME_NAME).'</span>
										<img src="'.$blog_url.'/timthumb.php?src='.$url_i.'&amp;w=650&amp;h=500&amp;zc=1&amp;q=100" title="'.$title_i.'" alt="'.$title_i.'" /></span>
								</a>';


		return $return;
	}
	
?>