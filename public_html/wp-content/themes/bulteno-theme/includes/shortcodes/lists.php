<?php
	add_shortcode('list', 'list_handler');
	add_shortcode('item', 'list_handler');
	

	function list_handler($atts, $content=null, $code="") {

	
		if($code == "item") {
			/* Icon */
			$icon=$atts["icon"];

			if($icon && $icon!="hearts") {
				$icon = '<span class="icon-text">&#'.$icon.';</span>';
			} else if($icon=="hearts") {
				$icon = '<span class="icon-text">&'.$icon.';</span>';
			} else {
				$icon = false;
			}
		
			return '<li class="styled">'.$icon.$content.'</li>';
		} elseif($code == "list") {
			$content = '<ul>'.$content.'</ul>';
		}
		
		$content = do_shortcode($content);
		$content = remove_br($content);
		return $content;
	}
	
?>