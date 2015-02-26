<?php
remove_shortcode('gallery');
add_shortcode('gallery', 'gallery_handler');
function gallery_handler($atts, $content=null, $code="") {
	if(isset($atts['url'])) {
		if(substr($atts['url'],-1) == '/') {
			$atts['url'] = substr($atts['url'],0,-1);
		}
		$vars = explode('/',$atts['url']);
		$slug = $vars[count($vars)-1];
		$page = get_page_by_path($slug,'OBJECT','gallery');
		if(is_object($page)) {
			$id = $page->ID;
			if(is_numeric($id)) {
				$content.=	'<div class="gallery-shortcode">';
					$content.= '<h3><a href="'.$atts['url'].'"><span class="icon-text">&#128247;</span>'.$page->post_title.'</a></h3>';
						$content.= '<div class="gallery-previews" rel="gallery-'.$id.'">';
						$args = array( 'post_type' => 'attachment', 'numberposts' => 4, 'post_status' => null, 'post_parent' => $id, 'order' => 'ASC', 'orderby'=> 'menu_order'); 
						$attachments = get_posts($args);
						$counter = 1;
						if ($attachments) {
							foreach($attachments as $attach) {
								$file = $attach->guid;
								$img = get_template_directory_uri().'/timthumb.php?src=/';
								$imgs = explode("/wp-content/", $file);
								$img.= 'wp-content/'.$imgs[1].'&amp;w=80&amp;h=80&amp;zc=1&amp;q=100';
								
								$content.= '<a href="'.$atts['url'].'/'.$counter.'" class="image-border-inverse image-hover light-show"><span class="image-overlay"><span class="icon-text icon-alone">&#128269;</span></span><img src="'.$img.'" rel="'.$counter.'" alt="'.$page->post_title.'" title="'.$page->post_title.'" /></a>';
									
								$counter++;
							}
						} else {
							$content.= "Gallery is empty";
						}
					$content.=	'<a href="'.$atts['url'].'" class="image-border-inverse image-hover"><span class="view-all-photos"><span class="icon-text">&#128247;</span><font>'.__("View all photos",THEME_NAME).'</font></span></a>';
					$content.=	'</div>
									<p>'.wordLimiter($page->post_content,23).'</p>';
					$content.= '
						</div>';
			} else {
				$content.= "Incorrect URL attribute defined";
			}
		} else {
			$content.= "Incorrect URL attribute defined";
		}
		
	} else {
		$content.= "No url attribute defined!";
	
	}
	return $content;
}


?>
