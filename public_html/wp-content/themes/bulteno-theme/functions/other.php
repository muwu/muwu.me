<?php

/* -------------------------------------------------------------------------*
 * 								CONTENT WIDTH								*
 * -------------------------------------------------------------------------*/
 
 if ( ! isset( $content_width ) ) 
    $content_width = 900;
	
/* -------------------------------------------------------------------------*
 * 									MAIN MENU								*
 * -------------------------------------------------------------------------*/
 
function add_menu_arrows($menu) {
	$c=0;
	$pos = strpos($menu,"</i>");
	while($pos !== false) {
		$pos_next_a = strpos($menu,"</i>",$pos + 1);
		$pos_next_ul = strpos($menu,"<ul",$pos + 1);

			
		if($pos_next_a > $pos_next_ul && $pos_next_ul > 0) {
			$insert_end = $pos + strlen("<span>");
			$insert_start = strrpos($menu,"<i",$insert_end-strlen($menu));
			$insert_start = strpos($menu,">",$insert_start) + strlen(">");
			
			$start = substr($menu,0,$insert_start);
			$end = substr($menu,$insert_start);
			$menu = $start."<span>".$end;
			
			$start = substr($menu,0,$insert_end);
			$end = substr($menu,$insert_end);
			$menu = $start."</span>".$end;
			
			$pos = $pos + strlen("<span></span>");
		}
		
		$pos = strpos($menu,"</i>",$pos + 1);
	}
	return $menu;
}

function remove_br($subject) {
	$subject = str_replace("<br/>", " ", $subject );
	$subject = str_replace("<br>", " ", $subject );
	$subject = str_replace("<br />", " ", $subject );
	return $subject;
}

function get_query_string_paged() {
	global $query_string;
	$pos = strpos($query_string,"paged=");
	if($pos !== false ) {
		$sub = substr($query_string,$pos);
		$posand = strpos($sub,"&");
		if ($posand == 0) {$paged = substr($sub,6);}
		else { $paged = substr($sub,6,$posand-6);}
		return $paged;
	}
	return 0;
}

function get_contact_page() {
	$pages = get_pages();
	foreach($pages as $p) {
		$meta = get_post_custom_values("_wp_page_template",$p->ID);
		if($meta[0] == "template-contact.php") {
			return $p->ID;
		}
	}
	return false;
}

function get_gallery_page() {
	$pages = get_pages();
	foreach($pages as $p) {
		$meta = get_post_custom_values("_wp_page_template",$p->ID);
		if($meta[0] == "template-gallery.php") {
			return $p->ID;
		}
	}
	return false;
}
function get_portfolio_page() {
	$pages = get_pages();
	foreach($pages as $p) {
		$meta = get_post_custom_values("_wp_page_template",$p->ID);
		if($meta[0] == "template-portfolio.php") {
			return $p->ID;
		}
	}
	return false;
}
function get_portfolio_page_2() {
	$pages = get_pages();
	foreach($pages as $p) {
		$meta = get_post_custom_values("_wp_page_template",$p->ID);
		if($meta[0] == "template-portfolio-style-2.php") {
			return $p->ID;
		}
	}
	return false;
}
function get_portfolio_page_3() {
	$pages = get_pages();
	foreach($pages as $p) {
		$meta = get_post_custom_values("_wp_page_template",$p->ID);
		if($meta[0] == "template-portfolio-style-3.php") {
			return $p->ID;
		}
	}
	return false;
}
function get_archive_page() {
	$pages = get_pages();
	foreach($pages as $p) {
		$meta = get_post_custom_values("_wp_page_template",$p->ID);
		if($meta[0] == "template-archive.php") {
			return $p->ID;
		}
	}
	return false;
}
function get_home_page() {
	$pages = get_pages();
	$pageID = array();
	foreach($pages as $p) {
		$meta = get_post_custom_values("_wp_page_template",$p->ID);
		if($meta[0] == "template-homepage.php") {
			$pageID[]=$p->ID;
		}
	}
	return $pageID;

}


/* -------------------------------------------------------------------------*
 * 								WIDGET COUNTER								*
 * -------------------------------------------------------------------------*/
 
function widget_first_last_classes($params) {

	global $my_widget_num; // Global a counter array
	$this_id = $params[0]['id']; // Get the id for the current sidebar we're processing
	$arr_registered_widgets = wp_get_sidebars_widgets(); // Get an array of ALL registered widgets	

	if(!$my_widget_num) {// If the counter array doesn't exist, create it
		$my_widget_num = array();
	}

	if(!isset($arr_registered_widgets[$this_id]) || !is_array($arr_registered_widgets[$this_id])) { // Check if the current sidebar has no widgets
		return $params; // No widgets in this sidebar... bail early.
	}

	if(isset($my_widget_num[$this_id])) { // See if the counter array has an entry for this sidebar
		$my_widget_num[$this_id] ++;
	} else { // If not, create it starting with 1
		$my_widget_num[$this_id] = 1;
	}

	$class = 'class="widget-' . $my_widget_num[$this_id] . ' '; // Add a widget number class for additional styling options

	if($my_widget_num[$this_id] == 1) { // If this is the first widget
		$class .= 'first ';
	} elseif($my_widget_num[$this_id] == count($arr_registered_widgets[$this_id])) { // If this is the last widget
		$class .= 'last ';
	}

	$params[0]['before_widget'] = str_replace('class="', $class, $params[0]['before_widget']); // Insert our new classes into "before widget"

	return $params;

}

function orange_themes_follow() {
		echo "<!-- BEGIN .follow -->";
		echo "<div class=\"follow\">";
			echo "<p>Follow Orange Themes</p>";
			echo "<a href=\"http://themeforest.net/user/orange-themes?ref=orange-themes\" class=\"themeforest\" target=\"blank\">Theme Forest</a>";
			echo "<a href=\"http://twitter.com/#!/orangethemes\" class=\"twitter\" target=\"blank\">Twitter</a>";
			echo "<a href=\"http://www.orange-themes.com/\" class=\"orangethemes\" target=\"blank\">Orange-Themes.com</a>";
		echo "<!-- END .follow -->";
		echo "</div>";
	}	
	
function orange_themes_info_message($content) {
	?>
	<a href="javascript:{}" class="help"><img src="<?php echo THEME_IMAGE_CPANEL_URL; ?>ico-help-1.png" /></a>
	<i class="popup-help popup-help-hidden trans-1">
		<a href="javascript:{}" class="close"></a>
		<?php echo $content; ?>
	</i>
	<?php
}
	
$uploadsdir=wp_upload_dir();
define("THEME_UPLOADS_URL", $uploadsdir['url']);





/* -------------------------------------------------------------------------*
 * 							GRAVATAR SETTUP									*
 * -------------------------------------------------------------------------*/
 
function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
	$url = 'http://www.gravatar.com/avatar/';
	$url .= md5(strtolower(trim($email)));
	$url .= "?s=$s&d=$d&r=$r";
	if ( $img ) {
		$url = '<img src="' . $url . '"';
		foreach ( $atts as $key => $val )
			$url .= ' ' . $key . '="' . $val . '"';
		$url .= ' />';
	}
	return $url;
}


/* -------------------------------------------------------------------------*
 * 								GOOGLE + BUTTON								*
 * -------------------------------------------------------------------------*/
 
function OT_plusones($url) {
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, "https://clients6.google.com/rpc");
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
  $curl_results = curl_exec ($curl);
  curl_close ($curl);
  $json = json_decode($curl_results, true);
  return intval( $json[0]['result']['metadata']['globalCounts']['count'] );
}
/* -------------------------------------------------------------------------*
 * 								NEWS PAGE TITLE								*
 * -------------------------------------------------------------------------*/
 
function news_page_title() {
	if(!is_archive() && !is_category()) {
		$title = get_the_title(OT_page_id());
	} else if(is_category()) {
		$category = get_category( get_query_var( 'cat' ) );
		$cat_id = $category->cat_ID;
		$catName = get_category($cat_id )->name;
		
		$title =  __("Category", THEME_NAME)." \"".$catName."\"";
	} else if (is_author()) {
		$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
		$title = __("Posts From", THEME_NAME). " ".$curauth->display_name;
	} else if(is_archive()) {
		$title = __("Archive", THEME_NAME);
	}
	echo $title;
}

/* -------------------------------------------------------------------------*
 * 							CONTENT CLASS							*
 * -------------------------------------------------------------------------*/
 
function OT_content_class($id) {
	$sidebarPosition = get_option ( THEME_NAME."_sidebar_position" ); 
	$sidebarPositionCustom = get_post_meta ( $id, THEME_NAME."_sidebar_position", true ); 
	
	if( $sidebarPosition == "left" || ( $sidebarPosition == "custom" &&  $sidebarPositionCustom == "left") ) { 
		$contentClass = " right";
	} else if( $sidebarPosition == "right" || ( $sidebarPosition == "custom" &&  $sidebarPositionCustom == "right") ) { 
		$contentClass = " left";
	} else if ( $sidebarPosition == "custom" && !$sidebarPositionCustom ) { 
		$contentClass = " left";
	} else {
		$contentClass = " left";
	}
	echo $contentClass;
}
/* -------------------------------------------------------------------------*
 * 							SPLIT CLASS							*
 * -------------------------------------------------------------------------*/
 
function OT_split_class($id) {
	$sidebarPosition = get_option ( THEME_NAME."_sidebar_position" ); 
	$sidebarPositionCustom = get_post_meta ( $id, THEME_NAME."_sidebar_position", true ); 
	
	if( $sidebarPosition == "left" || ( $sidebarPosition == "custom" &&  $sidebarPositionCustom == "left") ) { 
		$contentClass = "left";
	} else if( $sidebarPosition == "right" || ( $sidebarPosition == "custom" &&  $sidebarPositionCustom == "right") ) { 
		$contentClass = "right";
	} else if ( $sidebarPosition == "custom" && !$sidebarPositionCustom ) { 
		$contentClass = "right";
	} else {
		$contentClass = "right";
	}
	echo $contentClass;
}

/* -------------------------------------------------------------------------*
 * 							GET PAGE ID										*
 * -------------------------------------------------------------------------*/
 
function OT_page_id() {
	global $wp_query;
	if(is_home()) {
		$page_id = $wp_query->post->ID;
		if('page' == get_option('show_on_front')) {
			if(is_front_page()) {
				$page_id = get_option('page_on_front');
			} else {
				$page_id = get_option('page_for_posts');
			}
		}
	} else {
		if(isset($wp_query->post->ID)) { 
			$page_id = $wp_query->post->ID;
		}
	}
	
	if(isset($page_id)) { 
		return $page_id;
	}
}

/* -------------------------------------------------------------------------*
 * 							UPDATE POST VIEW COUNT							*
 * -------------------------------------------------------------------------*/
 
function OT_setPostViews() {
	global $post;
	if(isset($post)) {
		$postID = $post->ID;
		$count_key = THEME_NAME.'_post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		
		if ( !is_admin() ) {
			if ( $count=='' ) {
				delete_post_meta($postID, $count_key);
				add_post_meta($postID, $count_key, '0');
			} elseif ( $count==0 ) {
				delete_post_meta($postID, $count_key);
				add_post_meta($postID, $count_key, '1');
			} elseif (isset($_COOKIE[THEME_NAME."_post_views_count_".$postID]) ) {
				if($_COOKIE[THEME_NAME."_post_views_count_".$postID] != "1") {
					$count++;
					update_post_meta($postID, $count_key, $count);
				}
			}
		
			setcookie(THEME_NAME."_post_views_count_".$postID, "1", time()+2678400); 
		}
	}
}

/* -------------------------------------------------------------------------*
 * 							GET POST VIEW COUNT								*
 * -------------------------------------------------------------------------*/
 
function OT_getPostViews($postID){
    $count_key = THEME_NAME.'_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
   
   if( $count=='' ){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
	
    return $count;
}
/* -------------------------------------------------------------------------*
 * 								SIDEBAR CLASS								*
 * -------------------------------------------------------------------------*/
 
function OT_sidebarClass(){
	wp_reset_query();
	$sidebarPosition = get_option ( THEME_NAME."_sidebar_position" ); 
	$sidebarPositionCustom = get_post_meta ( OT_page_id(), THEME_NAME."_sidebar_position", true ); 
	if($sidebarPosition=="left" || ( $sidebarPosition == "custom" &&  $sidebarPositionCustom == "left") ) { $pageBlock = ' reversed-sidebar'; } 
    echo $pageBlock;
}


/* -------------------------------------------------------------------------*
 * 								POST TYPE								*
 * -------------------------------------------------------------------------*/
 
	function OT_post_type($post_type) {
		switch ($post_type) {
			case "blog":
				$post_type="post";
				break;
			case "gallery":
				$post_type="gallery";
				break;
			case "all":
				$post_type=array("post","gallery");
				break;
			default:
				$post_type="post";
		}
		return $post_type;
	}

 /* -------------------------------------------------------------------------*
 * 						ADD CUSTOM TEXT FORMATTING BUTTONS					*
 * -------------------------------------------------------------------------*/
global $orangethemes_buttons;
$orangethemes_buttons=array("orangethemessocial","orangethemesbutton", "orangethemesspacer", "orangethemesquote", "|",
			 "orangethemeslists", "|",
			 "orangethemesgallery", "orangethemesportfolio", "orangethemescaption", "orangethemesvideo", "orangethemesmap", "|", "orangethemesparagraph", "orangethemesparagraph2", "|","orangethemesbreak");

function add_orangethemes_buttons() {
   if ( get_user_option('rich_editing') == 'true') {
     add_filter('mce_external_plugins', 'add_orangethemes_btn_tinymce_plugin');
     add_filter('mce_buttons_3', 'register_orangethemes_buttons');
   }
}

function register_orangethemes_buttons($buttons) {
	global $orangethemes_buttons;
		
   array_push($buttons, implode(",",$orangethemes_buttons));
   return $buttons;
}

function add_orangethemes_btn_tinymce_plugin($plugin_array) {
	global $orangethemes_buttons;
	
	foreach($orangethemes_buttons as $btn){
		$plugin_array[$btn] = THEME_ADMIN_URL.'buttons-formatting/editor-plugin.js';
	}
	return $plugin_array;

}
 
 
 /* ------------------------------------------------------------------------*
 * 							OTHER THEMES									*
 * -------------------------------------------------------------------------*/
 
 function other_themes () {
?>
		<!-- BEGIN more-orange-themes -->
		<div class="more-orange-themes">

			<div class="header">
				<img src="<?php echo THEME_IMAGE_MTHEMES_URL; ?>title-more-themes.png" alt="" width="447" height="23" />
				<p>
					<a href="http://www.themeforest.net/user/orange-themes/portfolio?ref=orange-themes" class="btn-1" target="_blank"><span><u class="themeforest">Check our portfolio at themeforest.net</u></span></a>
					<a href="http://www.twitter.com/#!/orangethemes" class="btn-1" target="_blank"><span><u class="twitter">Follow us on twitter</u></span></a>
					<a href="http://www.orange-themes.com" class="btn-1" target="_blank"><span><u class="orangethemes">Orange-themes.com</u></span></a>
				</p>
			</div>

			<?php 
				$xml = theme_get_latest_theme_version(THEME_NOTIFIER_CACHE_INTERVAL); 
				foreach ( $xml->item as $entry ) {
				$title = explode("Private: ", $entry->title);
			?>
			
			<!-- BEGIN .item -->
			<div class="item">
				<div class="image">
					<a href="<?php echo $entry->purchase; ?>"><img src="<?php echo $entry->image; ?>" /></a>
				</div>
				<div class="text">
					<h2><a href="<?php echo $entry->purchase; ?>"><?php echo $title[1]; ?></a></h2>
					<p><?php echo $entry->content; ?></p>
					<p class="link"><a href="<?php echo $entry->demo; ?>" target="_blank">Demo website</a></p>
					<p class="link"><a href="<?php echo $entry->purchase; ?>" target="_blank">Purchase at ThemeForest.net</a></p>
					<?php if ( $entry->html ) { ?>
						<p class="link"><a href="<?php echo $entry->html; ?>" target="_blank">HTML version</a></p>
					<?php } ?>
				</div>
			<!-- END .item -->
			</div>
			<?php } ?> 
			
		<!-- END more-orange-themes -->
		</div>
<?php
	
}

/* -------------------------------------------------------------------------*
 * 							COUNT ATTACHMENTS								*
 * -------------------------------------------------------------------------*/
 
function OT_attachment_count($post_id = false) {
	global $post;
    //Get all attachments
    $attachments = get_posts( array(
        'post_type' => 'attachment',
        'posts_per_page' => -1
    ) );

    $att_count = 0;
    if ( $attachments ) {
        foreach ( $attachments as $attachment ) {
            // Check for the post type based on individual attachment's parent
            if ( 'gallery' == get_post_type($attachment->post_parent) && $post_id == $attachment->post_parent ) {
                $att_count = $att_count + 1;
            } else if ('gallery' == get_post_type($attachment->post_parent) && $post_id == false) {
				$att_count = $att_count + 1;
			}
        }
    }
	 return $att_count;
}

/* -------------------------------------------------------------------------*
 * 							CHECK PAGE TEMPLATE								*
 * -------------------------------------------------------------------------*/
 
function is_pagetemplate_active($pagetemplate = '') {
	global $wpdb;
	$sql = "select meta_key from $wpdb->postmeta where meta_key like '_wp_page_template' and meta_value like '" . $pagetemplate . "'";
	$result = $wpdb->query($sql);
	if ($result) {
		return TRUE;
	} else {
		return FALSE;
	}
}
/* -------------------------------------------------------------------------*
 * 								HEX -> RGB								*
 * -------------------------------------------------------------------------*/
 
function OTHexToRGB($hex) {
		$hex = ereg_replace("#", "", $hex);
		$color = array();
 
		if(strlen($hex) == 3) {
			$color['r'] = hexdec(substr($hex, 0, 1) . $r);
			$color['g'] = hexdec(substr($hex, 1, 1) . $g);
			$color['b'] = hexdec(substr($hex, 2, 1) . $b);
		}
		else if(strlen($hex) == 6) {
			$color['r'] = hexdec(substr($hex, 0, 2));
			$color['g'] = hexdec(substr($hex, 2, 2));
			$color['b'] = hexdec(substr($hex, 4, 2));
		}
 
		return $color;
}

/* -------------------------------------------------------------------------*
 * 							PRASE SHORTCODE									*
 * -------------------------------------------------------------------------*/
 
function parse_shortcode_content( $content ) {

   /* Parse nested shortcodes and add formatting. */
    $content = trim( do_shortcode( shortcode_unautop( $content ) ) );

    /* Remove '' from the start of the string. */
    if ( substr( $content, 0, 4 ) == '' )
        $content = substr( $content, 4 );

    /* Remove '' from the end of the string. */
    if ( substr( $content, -3, 3 ) == '' )
        $content = substr( $content, 0, -3 );

    /* Remove any instances of ''. */
    $content = str_replace( array( '<p></p>' ), '', $content );
    $content = str_replace( array( '<p>  </p>' ), '', $content );

    return $content;
}

/* -------------------------------------------------------------------------*
 * 								GET GOOGLE FONTS							*
 * -------------------------------------------------------------------------*/
 
function OT_get_google_fonts($sort = "alpha") {

	$font_list = get_option(THEME_NAME."_google_font_list");
	$font_list_time = get_option(THEME_NAME."_google_font_list_update");
	$now = time();
	$interval = 41600;
	
	if(!$font_list || (( $now - $font_list_time ) > $interval)) {
		$url = "https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyCpatq_HIaUbw1XUxVAellP4M1Uoa6oibU&sort=" . $sort;
		$result = json_response( $url );

			$font_list = array();
			foreach ( $result->items as $font ) {

				$font_list[] .= $font->family;
				
			}
			
		update_option(THEME_NAME."_google_font_list",$font_list);
		update_option(THEME_NAME."_google_font_list_update",time());
	}
		
	return $font_list;
	
}
/* -------------------------------------------------------------------------*
 * 								JSON RESPONSE								*
 * -------------------------------------------------------------------------*/
 
if ( ! function_exists( 'json_response' ) )	{

	function json_response( $url )	{
			$args = array(
				 'timeout' => '10',
				 'redirection' => '10',
				 'sslverify' => false // for localhost
			);
			
			# Parse the given url
			$raw = wp_remote_get( $url, $args );
			if ($raw && $raw['body']) {	
				$decoded = json_decode( $raw['body'] );
				
				return $decoded;
			}
	}

}
/* -------------------------------------------------------------------------*
 * 								USER COMMENT COUNT							*
 * -------------------------------------------------------------------------*/
 
function OT_user_comment_count( $user_id )	{
	global $wpdb;
	$where = 'WHERE comment_approved = 1 AND user_id = ' . $user_id ;
	$comment_count = $wpdb->get_var(
		"SELECT COUNT( * ) AS total
			FROM {$wpdb->comments}
			{$where}
		");

	return $comment_count;
}
/* -------------------------------------------------------------------------*
 * 								MENU NAME						*
 * -------------------------------------------------------------------------*/
 
function OT_et_theme_menu_name( $theme_location ) {
	if( ! $theme_location ) return false;
 
	$theme_locations = get_nav_menu_locations();
	if( ! isset( $theme_locations[$theme_location] ) ) return false;
 
	$menu_obj = get_term( $theme_locations[$theme_location], 'nav_menu' );
	if( ! $menu_obj ) $menu_obj = false;
	if( ! isset( $menu_obj->name ) ) return false;
 
	return $menu_obj->name;
}


/* -------------------------------------------------------------------------*
 * 							COMMENT FORMATION								*
 * -------------------------------------------------------------------------*/
 
 
function orangethemes_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
   ?>
	
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	
	<div class="comment-block">
			<span class="image-border comment-avatar"><img src="<?php echo get_avatar_url(get_avatar( $comment, 60));?>"  alt="" title="" /></span>
			<div class="commment-content" id="comment-<?php comment_ID() ?>">
				<span class="right time-stamp"><span class="icon-text">&#128340;</span><?php printf(__(' %2$s, %1$s', THEME_NAME), get_comment_date("d.M Y"), get_comment_time("G:i"));?></span>
				<h3><a href="<?php if(comment_author_url()) { echo comment_author_url();} else { echo "#"; } ?>"><?php printf(__('%1$s', THEME_NAME), get_comment_author_link());?></a>
				<?php if($comment->user_id == get_the_author_meta('ID')) { ?>
					<font><span class="icon-text">&#9733;</span><?php _e("Author", THEME_NAME);?></font>
				<?php } ?>
				</h3>
				<?php if ($comment->comment_approved == '0') : ?>
				<em style="padding-left:50px;"><?php printf ( __( 'Your comment is awaiting moderation.' , THEME_NAME ));?></em>
				<br />
				<?php endif; ?>
				<?php comment_text(); ?>
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => '<span class="icon-text">&#59154;</span>'.( __( 'reply comment' , THEME_NAME )).''))) ?>
			</div>
			<div class="clear-float"></div>
	</div>

<?php
       }
	   
add_action('init', 'add_orangethemes_buttons');


add_filter('dynamic_sidebar_params','widget_first_last_classes');
add_theme_support('automatic-feed-links' ); 
add_filter('wp', 'OT_setPostViews');


?>