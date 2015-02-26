<?php

function get_post_thumb($post_id,$width,$height,$custom="image", $original="no") {		//universal thumb function

	$show_no_image = get_option(THEME_NAME."_show_no_image_thumb");

	$custom_image = get_post_custom_values($custom,$post_id);	//get custom field value
	$custom_image = $custom_image[0];
	
	if($custom_image == "" && $custom != "image") {
		$custom = THEME_NAME."_homepage_image";
		$custom_image = get_post_custom_values($custom,$post_id);	//get custom field value
		$src = $custom_image[0];
	}
	
	$meta = get_post_meta($post_id, "_thumbnail_id",true);		//get wordpress built in thumbnail value
	$first_from_post = get_first_image($post_id);				//get first image form post
	
	if($custom_image && $custom==THEME_NAME."_homepage_image") {		//built in thumb
		$custom = THEME_NAME."_homepage_image";
		$custom_image = get_post_custom_values($custom,$post_id);	//get custom field value
		$file = $custom_image[0];
		$src="";
		if($original=="no") {
			$src=get_template_directory_uri(); 
			$src.="/timthumb.php?src=";
			$src.=$file; $src.="&amp;w=$width&amp;h=$height&amp;zc=1&amp;q=100";
		} else {
			$src.=$file;
		}
		$show_image = true;		
		
	} elseif($meta) {		//built in thumb
		$file = site_url()."/wp-content/uploads/".get_post_meta($meta, "_wp_attached_file",true);
		$src="";
		if($original=="no") {
			$src=get_template_directory_uri(); 
			$src.="/timthumb.php?src=";
			$src.=$file; $src.="&amp;w=$width&amp;h=$height&amp;zc=1&amp;q=100";
		} else {
			$src.=$file;
		}
		$show_image = true;		
		
	} elseif($first_from_post != false && $custom!=THEME_NAME."_homepage_image") {		//first attached image
		$file = $first_from_post;
		if(strpos($file,"wp-content") !== false) {
			$pos = strpos($file,"/wp-content");
			$file = substr($file,$pos);
		}
		$src="";
		if($original=="no") {
			$src=get_template_directory_uri(); 
			$src.="/timthumb.php?src=";
			$src.=$file; $src.="&amp;w=$width&amp;h=$height&amp;zc=1&amp;q=100";
		} else {
			$src.=$file;
		}
		$show_image = true;	
		
	} else {		//no image
		$src = get_template_directory_uri().'/images/no-image-'.$width.'x'.$height.'.jpg';
		
		if($show_no_image == "on") {
			$show_image = true;
		} else {
			$show_image = false;
		}
	}
	
	return array("src"=>$src,"show"=>$show_image);
}

function add_image_thumb($content)	//add thumb in the begining of the post
{
	global $post;
	$img = get_post_thumb($post->ID,680,230);
	if($img['show'] != false) {
		if($img['src'] != "") {

			$img = '<a href="#" class="image-overlay-1 main-image"><span><img src="'.$img['src'].'" class="trans-1" alt="'.get_the_title().'"/></span></a>';
			return $img." ".$content;
		} else {
			return $content;
		}
	} else {
		return $content;
	}
}

function get_first_image($post_id)  {		//retrieves first post attachment, check if is image
	
	$args = array(
		'post_type' => 'attachment',
		'numberposts' => null,
		'post_status' => null,
		'post_parent' => $post_id
	);
	
	$attachments = get_posts($args);
	if ($attachments) {
		foreach ($attachments as $attachment) {
			if(is_image($attachment->guid)) {
				return $attachment->guid;
			}
		}
	}
	
	return false;  
}


function is_image($src) {		//check if src extension is image like
	$extensions = array('.jpg','.gif','.png');
	if(in_array(substr($src,-4),$extensions)) {
		return true;
	} else {
		return false;
	}
}

?>