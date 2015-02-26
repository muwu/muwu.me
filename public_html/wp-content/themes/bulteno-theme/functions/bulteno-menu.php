<?php

$prefix = THEME_NAME.'_';
$image = '<img src="'.get_bloginfo('template_url').'/images/control-panel-images/logo-orangethemes-1.png" width="11" height="15" />';
$sidebarPosition = get_option ( THEME_NAME."_sidebar_position" ); 
$aboutAuthor = get_option ( THEME_NAME."_about_author" ); 
$imageSize = get_option ( THEME_NAME."_image_size" );
$showSingleThumb = get_option ( THEME_NAME."_show_single_thumb" ); 
$similarPosts = get_option ( THEME_NAME."_similar_posts" ); 
$homeID = get_home_page();
$contactID = get_contact_page();
$galleryID = get_gallery_page();



if(isset($_GET['post'])) {
	$currentID = $_GET['post'];
} else {
	$currentID = 0;
}

global $box_array;

$box_array = array();

$box_array[] = array( 'id' => 'homepage-image-box', 'title' => ''.$image.' Slider Image', 'page' => 'post', 'context' => 'side', 'priority' => 'high', 'fields' => array(array('name' => 'Image url', 'std' => '', 'id' => $prefix. 'homepage_image', 'type'=> 'slider_image_box' ) ), 'size' => 60,'first' => 'yes'  );
$box_array[] = array( 'id' => 'video-box', 'title' => ''.$image.' Youtube Video URL', 'page' => 'post', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Video url', 'std' => '', 'id' => $prefix. 'video', 'type'=> 'text' ) ), 'size' => 10,'first' => 'no'  );
$box_array[] = array( 'id' => 'featured-tag-box', 'title' => ''.$image.' Featured Tag Box', 'page' => 'post', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Tag', 'std' => '', 'id' => $prefix. 'tag', 'type'=> 'tag_box' ) ), 'size' => 10,'first' => 'no'  );

if($currentID==$contactID || isset($_POST['post_type'])) {
	$box_array[] = array( 'id' => 'contact-map-box', 'title' => ''.$image.' Google Map Url', 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Map Url', 'std' => '', 'id' => $prefix. 'map', 'type'=> 'text' ) ), 'size' => 10,'first' => 'yes'  );
}

//gallery
$box_array[] = array( 'id' => 'gallery-type-box', 'title' => ''.$image.' Gallery Style', 'page' => 'gallery', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Gallery Style:', 'std' => '', 'id' => $prefix. 'gallery_style', 'type'=> 'gallery_style' ) ), 'size' => 10, 'first' => 'yes'  );


if($currentID!=$contactID && $currentID!=$galleryID || $currentID==0) {
	$box_array[] = array( 'id' => 'sidebar-select-box', 'title' => ''.$image.' Sidebar', 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Sidebar name:', 'std' => '', 'id' => $prefix. 'sidebar_select', 'type'=> 'sidebar_select_box' ) ), 'size' => 10, 'first' => 'yes'  );
}

if($currentID!=$contactID && $currentID!=$galleryID && !in_array($currentID, $homeID) || isset($_POST['post_type']) || $currentID==0) {
	$box_array[] = array( 'id' => 'video-box', 'title' => ''.$image.' Youtube Video URL', 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Video url', 'std' => '', 'id' => $prefix. 'video', 'type'=> 'text' ) ), 'size' => 10,'first' => 'no'  );

}

$box_array[] = array( 'id' => 'sidebar-select-post', 'title' => ''.$image.' Sidebar', 'page' => 'post', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Sidebar name:', 'std' => '', 'id' => $prefix. 'sidebar_select', 'type'=> 'sidebar_select_box' ) ), 'size' => 10, 'first' => 'no' );

if($sidebarPosition=="custom" && $currentID!=$contactID && $currentID!=$galleryID || $currentID==0) {
	$box_array[] = array( 'id' => 'sidebar-position-post', 'title' => ''.$image.' Sidebar Position', 'page' => 'post', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Sidebar position:', 'std' => '', 'id' => $prefix. 'sidebar_position', 'type'=> 'sidebar_position_box' ) ), 'size' => 10, 'first' => 'no' );
	$box_array[] = array( 'id' => 'sidebar-position-page', 'title' => ''.$image.' Sidebar Position', 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Sidebar position:', 'std' => '', 'id' => $prefix. 'sidebar_position', 'type'=> 'sidebar_position_box' ) ), 'size' => 10, 'first' => 'no' );
}

if($aboutAuthor=="custom" && !in_array($currentID, $homeID) && $currentID!=$contactID && $currentID!=$galleryID || $currentID==0) {
	$box_array[] = array( 'id' => 'about-author-post', 'title' => ''.$image.' About Author', 'page' => 'post', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'About Author:', 'std' => '', 'id' => $prefix. 'about_author', 'type'=> 'about_author_box' ) ), 'size' => 10, 'first' => 'no' );
	$box_array[] = array( 'id' => 'about-author-page', 'title' => ''.$image.' About Author', 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'About Author:', 'std' => '', 'id' => $prefix. 'about_author', 'type'=> 'about_author_box' ) ), 'size' => 10, 'first' => 'no' );
}

if($similarPosts=="custom") {
	$box_array[] = array( 'id' => 'similar-post', 'title' => ''.$image.' Related Posts', 'page' => 'post', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Related Posts:', 'std' => 'hide', 'id' => $prefix. 'similar_posts', 'type'=> 'about_author_box' ) ), 'size' => 10, 'first' => 'no' );
}

if($showSingleThumb=="on" && !in_array($currentID, $homeID) && $currentID!=$galleryID || isset($_POST['post_type']) || $currentID==0) {
	$box_array[] = array( 'id' => 'show-image-post', 'title' => ''.$image.' Show Image In Single Post / News Page', 'page' => 'post', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Image:', 'std' => '', 'id' => $prefix. 'show_single_image', 'type'=> 'about_author_box' ) ), 'size' => 10, 'first' => 'no' );
	$box_array[] = array( 'id' => 'show-image-page', 'title' => ''.$image.' Show Image In Single Page / News Page', 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Image:', 'std' => '', 'id' => $prefix. 'show_single_image', 'type'=> 'about_author_box' ) ), 'size' => 10, 'first' => 'no' );
}

if($imageSize=="custom") {
	$box_array[] = array( 'id' => 'image-size-post', 'title' => ''.$image.' Image Size', 'page' => 'post', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Image Size:', 'std' => 'small', 'id' => $prefix. 'image_size', 'type'=> 'image_size_box' ) ), 'size' => 10, 'first' => 'no' );
	if($currentID!=$contactID && $currentID!=$galleryID && !in_array($currentID, $homeID) || isset($_POST['post_type']) || $currentID==0) {
		$box_array[] = array( 'id' => 'image-size-post', 'title' => ''.$image.' Image Size', 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Image Size:', 'std' => 'small', 'id' => $prefix. 'image_size', 'type'=> 'image_size_box' ) ), 'size' => 10, 'first' => 'no' );
	}
}

//homepage 
if(in_array($currentID, $homeID) || isset($_POST['post_type'])) {
}

// Add meta box
function add_sticky_box() {
	global $box_array;
	
	foreach ($box_array as $box) {
		add_meta_box($box['id'], $box['title'], 'sticky_show_box', $box['page'], $box['context'], $box['priority'], array('content'=>$box, 'first'=>$box['first'], 'size'=>$box['size']));
	}

}

function sticky_show_box( $post, $metabox) {
	show_box_funtion($metabox['args']['content'], $metabox['args']['first'], $metabox['args']['size']);
}

// Callback function to show fields in meta box
function show_box_funtion($fields, $first='no', $width='60') {
	global $post;

	if($first=="yes") {
		echo '<input type="hidden" name="sticky_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
	}
	echo '<table class="form-table">';

	foreach ($fields['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		//$post_num = htmlentities($_GET['post']);
		echo '<tr>','<th style="width:',$width,'%"><label for="', $field['id'], '">', $field['name'], '</label></th>','<td>';
		switch ($field['type']) {
			case 'text_currency':
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" ', $meta ? ' ' : '', ' value="', $meta ? remove_html_slashes($meta) : remove_html_slashes($field['std']), '"/> ' .get_option(THEME_NAME.'_currency_category');
				break;
			case 'text_length_unit':
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" ', $meta ? ' ' : '', ' value="', $meta ? remove_html_slashes($meta) : remove_html_slashes($field['std']), '"/> ' .get_option(THEME_NAME.'_length_unit');
				break;
			case 'text_displacement_unit':
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" ', $meta ? ' ' : '', ' value="', $meta ? remove_html_slashes($meta) : remove_html_slashes($field['std']), '"/> ' .get_option(THEME_NAME.'_displacement_unit');
				break;
			case 'text':
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" ', $meta ? ' ' : '', ' value="', $meta ? remove_html_slashes($meta) : remove_html_slashes($field['std']), '"/> ';
				break;
			case 'slider_image_box':
				echo '<input class="upload input-text-1" type="text" name="', $field['id'], '" id="', $field['id'], '" value="',  $meta ? remove_html_slashes($meta) :  remove_html_slashes($field['std']), '" style="width: 140px;"/>
						<div id="', $field['id'], '_button" class="upload-button upload-logo" style="width:100px; margin: 10px 0 0 15px;"><a class="pex-button"><img src="'.THEME_IMAGE_CPANEL_URL.'btn-browse-1.png"/></a></div>
						<script type="text/javascript">
							jQuery(document).ready(function($){ loadUploader(jQuery("div#', $field['id'], '_button"), "'.THEME_FUNCTIONS_URL.'upload-handler.php", "'.THEME_UPLOADS_URL.'");});
						</script>';
				break;
			case 'checkbox':
				echo '<input type="checkbox" value="1" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
				break;
			case 'sidebar_select_box':
				$sidebar_names = get_option( THEME_NAME."_sidebar_names" );
				$sidebar_names = explode( "|*|", $sidebar_names );

				echo '	<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
				echo "<option value=\"\">Default</option>";
					foreach ($sidebar_names as $sidebar_name) {
	
						if ( $meta == $sidebar_name ) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $sidebar_name != "" ) {
							echo "<option value=\"".$sidebar_name."\" ".$selected.">".$sidebar_name."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'category_select':
				global $wpdb;
				$data = get_terms( "category", 'parent=0&hide_empty=0' );	
		
				echo '	<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
				echo "<option value=\"\">Default (Latest Posts)</option>";
					foreach($data as $d) {
						if($meta == $d->term_id) { $selected=' selected'; } else { $selected=''; }
						echo "<option value=\"".$d->term_id."\" ".$selected.">".$d->name."</option>";
					}

				echo '	</select>';
				break;
			case 'sidebar_position_box':
				$positions = array('Right', 'Left');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $position) {
	
						if ( $meta == strtolower($position)) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".strtolower($position)."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'gallery_style':
				$positions = array('Default', 'LightBox');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $position) {
	
						if ( $meta == strtolower($position)) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".strtolower($position)."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'tag_box':
				$positions = array('None', 'New', 'Video', 'Featured');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $position) {
	
						if ( $meta == $position) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".$position."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'about_author_box':
				$positions = array('Show', 'Hide');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $position) {
	
						if ( $meta == strtolower($position)) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".strtolower($position)."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'image_size_box':
				$positions = array('Large', 'Small');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $position) {
	
						if ( $meta == strtolower($position)) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".strtolower($position)."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'textarea':
				echo '<textarea name="', $field['id'], '" id="', $field['id'], '" ', $meta ? ' ' : '', ' style="width:400px; height:100px;">', $meta ? remove_html_slashes($meta) : remove_html_slashes($field['std']), '</textarea>';
				break;
		}
		echo '<td>', '</tr>';
	}
	echo '</table>';
}

function save_data($fields) {
	global $post_id;

	foreach ($fields['fields'] as $field) {	
		$old = get_post_meta($post_id, $field['id'], true);
		if(isset($_POST[$field['id']])) {
			$new = $_POST[$field['id']];
			
			if ($new && $new != $old) {
				update_post_meta($post_id, $field['id'], $new);
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $field['id'], $old);
			}//else if closer
		}
	}//foreach closer
	
}

function save_numbers($fields) { 
	global $post_id;
	foreach ($fields['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
		if(!is_numeric($new)) { 
			$new = preg_replace("/[^0-9]/","",$new);
		}
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}//else if closer
	}//foreach closer

}

// Save data from meta box
function save_sticky_data($post_id) {
	global $box_array;
	
	// verify nonce
	if (isset($_POST['sticky_meta_box_nonce']) && !wp_verify_nonce($_POST['sticky_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}

	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	// check permissions
	if (isset($_POST['post_type']) && 'page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
	
	foreach ($box_array as $box) {
		save_data($box);
	}

} //function closer

	add_action('admin_menu', 'add_sticky_box');	
	add_action('save_post', 'save_sticky_data');

	
?>
