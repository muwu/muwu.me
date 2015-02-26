<?php
global $orange_themes_managment;
$orangeThemes_general_options= array(
 array(
	"type" => "navigation",
	"name" => "General",
	"slug" => "general"
),

array(
	"type" => "tab",
	"slug"=>'general'
),

array(
	"type" => "sub_navigation",
	"subname"=>array(
		array("slug"=>"page", "name"=>"General"), 
		array("slug"=>"blog", "name"=>"Blog"),
		array("slug"=>"home", "name"=>"Home"),
		array("slug"=>"gallery", "name"=>"Gallery"),
		array("slug"=>"contact", "name"=>"Contact/Footer"),
		array("slug"=>"banner_settings", "name"=>"Banners")
	)
),

/* ------------------------------------------------------------------------*
 * PAGE SETTINGS
 * ------------------------------------------------------------------------*/

 array(
	"type" => "sub_tab",
	"slug"=>'page'
),

array(
	"type" => "homepage_set_test",
	"title" => "Set up Your Homepage and post page!",
	"desc" => "	<p><b>You have not selected the correct template page for homepage.</b></p>
	<p>Please make sure, you choose template \"Homepage\".</p>
	<br/>
	<ul>
		<li>Current front page: <a href='".get_permalink(get_option('page_on_front'))."'>".get_the_title(get_option('page_on_front'))."</a></li>
		<li>Current blog page: <a href'".get_permalink(get_option('page_for_posts'))."'>".get_the_title(get_option('page_for_posts'))."</a></li>
	</ul>",
	"desc_2" => "<p><b>You have NOT enabled homepage.</b></p>
	<p>To use custom homepage, you must first create two <a href='".home_url()."/wp-admin/post-new.php?post_type=page'>new pages</a>, and one of them assign to \"<b>Homepage</b>\" template.Give each page a title, but avoid adding any text.</p>
	<p>Then enable homepage  in <a href='".home_url()."/wp-admin/options-reading.php'>wordpress reading settings</a> (See \"Front page displays\" option). Select your previously created pages from both dropdowns and save changes.</p>"
),
   
array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => "Add logo image"
),
   
array(
	"type" => "upload",
	"title" => "Add Header Logo Image",
	"id" => $orange_themes_managment->themeslug."_logo"
),   
array(
	"type" => "upload",
	"title" => "Add Footer Logo Image",
	"id" => $orange_themes_managment->themeslug."_footer_logo"
),
 
array(
	"type" => "close"
),
array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => "Favicon"
),
   
array(
	"type" => "upload",
	"title" => "Favicon",
	"info" => "Favicons are the small 16 pixel by 16 pixel pictures you see beside some URLs in your browser's address bar.",
	"id" => $orange_themes_managment->themeslug."_favicon"
),   

array(
	"type" => "close"
),
array(
	"type" => "row"
),

array(
	"type" => "checkbox",
	"title" => "Enable Search:",
	"id"=>$orange_themes_managment->themeslug."_search"
),

array(
	"type" => "close"
),

array(
	"type" => "save",
	"title" => "Save Changes"
),
   
array(
	"type" => "closesubtab"
),

/* ------------------------------------------------------------------------*
 * BLOG SETTINGS
 * ------------------------------------------------------------------------*/   
  
array(
	"type" => "sub_tab",
	"slug"=>'blog'
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => "Unit Settings"
),

array(
	"type" => "checkbox",
	"title" => "Show thumbnails in blog post list:",
	"id"=>$orange_themes_managment->themeslug."_show_first_thumb"
),

array(
	"type" => "checkbox",
	"title" => "Show thumbnail in open post/page:",
	"id"=>$orange_themes_managment->themeslug."_show_single_thumb"
),

array(
	"type" => "checkbox",
	"title" => "Show \"no image\" thumbnail, when no thumbnail is available:",
	"id"=>$orange_themes_managment->themeslug."_show_no_image_thumb"
),
array(
	"type" => "close"
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => "Blog Settings"
),

array(
	"type" => "checkbox",
	"title" => "Show pictures in post list page:",
	"id"=>$orange_themes_managment->themeslug."_show_first_pictures"
),

array(
	"type" => "checkbox",
	"title" => "Show other objects on post list page (videos etc.):",
	"id"=>$orange_themes_managment->themeslug."_show_first_objects"
),

array(
	"type" => "close"
),
array(
	"type" => "row"
),
array(
	"type" => "title",
	"title" => "Blog Page Image Size"
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_image_size",
	"radio" => array(
		array("title" => "Small:", "value" => "small"),
		array("title" => "Large:", "value" => "large"),
		array("title" => "Custom For Each Post:", "value" => "custom")
	),
	"std" => "small"
),

array(
	"type" => "close"
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => "Show \"About Author\" In Single Post/Page"
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_about_author",
	"radio" => array(
		array("title" => "Show:", "value" => "show"),
		array("title" => "Hide:", "value" => "hide"),
		array("title" => "Custom For Each Post/Page:", "value" => "custom")
	),
	"std" => "on"
),

array(
	"type" => "close"
),

array(
	"type" => "save",
	"title" => "Save Changes"
),

array(
	"type" => "closesubtab"
),

/* ------------------------------------------------------------------------*
 * HOME SETTINGS
 * ------------------------------------------------------------------------*/   
  
array(
	"type" => "sub_tab",
	"slug"=>'home'
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => "Homepage Block Settings"
),

array(
	"type" => "checkbox",
	"title" => "Enable News Block",
	"id" => $orange_themes_managment->themeslug."_homepage_news_block",
	"std" => "on"
),

array( 
	"type" => "select", 
	"id" => $orange_themes_managment->themeslug."_homepage_post_type_block",
	"title" => "Post Type:",
	"options"=>array(
		array("slug"=>"post", "name"=>"Post"), 
		array("slug"=>"gallery", "name"=>"Gallery"),
		array("slug"=>"all", "name"=>"All")
	),
	"class" => "otpost-type",

	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_homepage_news_block", "value" => "on")
	)
),
array(
	"type" => "categories",
	"id" => $orange_themes_managment->themeslug."_homepage_category_id",
	"taxonomy" => "category",
	"title" => "Set News Category",
	"class" => "ppid",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_homepage_news_block", "value" => "on")
	)
),
array(
	"type" => "categories",
	"id" => $orange_themes_managment->themeslug."_homepage_category_gid",
	"taxonomy" => "gallery-cat",
	"title" => "Set News Category",
	"class" => "gid",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_homepage_news_block", "value" => "on")
	)
),
array(
	"type" => "close"
),

array(
	"type" => "row"
),

array( 
	"type" => "input", 
	"id" => $orange_themes_managment->themeslug."_homepage_count", 
	"title" => "Latest Post Count On Homepage:",
	"std" => 10
),

array(
	"type" => "close"
),
array(
	"type" => "save",
	"title" => "Save Changes"
),

array(
	"type" => "closesubtab"
),

/* ------------------------------------------------------------------------*
 * CONTACT SETTINGS
 * ------------------------------------------------------------------------*/   

array(
	"type" => "sub_tab",
	"slug"=>'contact'
),
array(
	"type" => "row"
),
array(
	"type" => "title",
	"title" => "Contact Information"
),

array(
	"type" => "input",
	"title" => "Twitter Account Name:",
	"id" => $orange_themes_managment->themeslug."_twitter_name"
),

array(
	"type" => "checkbox",
	"title" => "Enable Contact Information",
	"id" => $orange_themes_managment->themeslug."_footer_contact_info",
	"std" => "off"
),

array(
	"type" => "input",
	"title" => "Phone:",
	"id" => $orange_themes_managment->themeslug."_footer_phone",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_footer_contact_info", "value" => "on")
	)
),
array(
	"type" => "input",
	"title" => "Address:",
	"id" => $orange_themes_managment->themeslug."_footer_address",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_footer_contact_info", "value" => "on")
	)
),
array(
	"type" => "input",
	"title" => "Mail:",
	"id" => $orange_themes_managment->themeslug."_footer_mail",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_footer_contact_info", "value" => "on")
	)
),
array(
	"type" => "textarea",
	"title" => "Contact Text:",
	"id" => $orange_themes_managment->themeslug."_footer_text_contact",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_footer_contact_info", "value" => "on")
	)
),

array(
	"type" => "close"
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => "Footer Text"
),

array(
	"type" => "input",
	"title" => "Footer Text Title:",
	"id" => $orange_themes_managment->themeslug."_footer_text_title"
),

array(
	"type" => "textarea",
	"title" => "Footer Text:",
	"id" => $orange_themes_managment->themeslug."_footer_text"
),

array(
	"type" => "close"
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => "Contact Form"
),

array(
	"type" => "input",
	"title" => "Contact Form E-mail:",
	"id" => $orange_themes_managment->themeslug."_contact_mail"
),

array(
	"type" => "close"
),


array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => "Social Networks and RSS"
),

array(
	"type" => "checkbox",
	"title" => "Social Networks Icons",
	"id" => $orange_themes_managment->themeslug."_social_footer",
	"std" => "off"
),


array(
	"type" => "input",
	"title" => "Twitter Account Url:",
	"id" => $orange_themes_managment->themeslug."_twitter",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_social_footer", "value" => "on")
	)
),

array(
	"type" => "input",
	"title" => "Facebook Account Url:",
	"id" => $orange_themes_managment->themeslug."_facebook",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_social_footer", "value" => "on")
	)
),

array(
	"type" => "input",
	"title" => "Pinterest Account Url:",
	"id" => $orange_themes_managment->themeslug."_pinterest",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_social_footer", "value" => "on")
	)
),
array(
	"type" => "input",
	"title" => "Google+ Account Url:",
	"id" => $orange_themes_managment->themeslug."_googlepluss",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_social_footer", "value" => "on")
	)
),

array(
	"type" => "input",
	"title" => "Flickr Account Url:",
	"id" => $orange_themes_managment->themeslug."_flickr",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_social_footer", "value" => "on")
	)
),
array(
	"type" => "input",
	"title" => "Skype Account Url:",
	"id" => $orange_themes_managment->themeslug."_skype",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_social_footer", "value" => "on")
	)
),

array(
	"type" => "input",
	"title" => "Vimeo Account Url:",
	"id" => $orange_themes_managment->themeslug."_vimeo",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_social_footer", "value" => "on")
	)
),


array(
	"type" => "checkbox",
	"title" => "Show RSS Button",
	"id" => $orange_themes_managment->themeslug."_rss_button",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_social_footer", "value" => "on")
	)
	//"std" => "off"
),

array(
	"type" => "input",
	"title" => "RSS Url:",
	"id" => $orange_themes_managment->themeslug."_rss_url",
	"std" => get_bloginfo("rss_url"),
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_rss_button", "value" => "on")
	)

),

array(
	"type" => "close"
),

array(
	"type" => "save",
	"title" => "Save Changes"
),

array(
	"type" => "closesubtab"
),


/* ------------------------------------------------------------------------*
 * GALLERY SETTINGS
 * ------------------------------------------------------------------------*/   
array(
	"type" => "sub_tab",
	"slug"=>'gallery'
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title"=>'Gallery Settings'
),

array(
	"type" => "input",
	"title" => "Items per gallery page:",
	"id" => $orange_themes_managment->themeslug."_gallery_items",
	"number" => "yes",
	"std" => "8"
),

array(
	"type" => "close"
),

array(
	"type" => "save",
	"title" => "Save Changes"
),

array(
	"type" => "closesubtab"
),


/* ------------------------------------------------------------------------*
 * BANNER SETTINGS
 * ------------------------------------------------------------------------*/   

array(
	"type" => "sub_tab",
	"slug"=>'banner_settings'
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => "Banner Between News"
),

array(
	"type" => "checkbox",
	"title" => "Enable Banner",
	"id" => $orange_themes_managment->themeslug."_blog_banner",
	"std" => "off"
),

array(
	"type" => "textarea",
	"title" => "Banner HTML Code",
	"sample" => '<a href="#"><img src="'.get_template_directory_uri().'/images/no-banner-468x60.jpg" alt="" title=""/></a>',
	"id" => $orange_themes_managment->themeslug."_blog_banner_code",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_blog_banner", "value" => "on")
	)
),

array(
	"type" => "close"
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => "Select Pop Up Banner Type"
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_banner_type",
	"radio" => array(
		array("title" => "Off", "value" => "off"),
		array("title" => "Banner With Image", "value" => "image"),
		array("title" => "Banner With Text Or HTML Code", "value" => "text"),
		array("title" => "Banner With Image &amp; Text", "value" => "text_image")
	),
	"std" => "off"
),

array(
	"type" => "upload",
	"title" => "Add Banner Image",
	"id" => $orange_themes_managment->themeslug."_banner_image",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_banner_type", "value" => "image")
	)
),

array(
	"type" => "textarea",
	"title" => "Banner content",
	"info" => "You can copy also some HTML code here.",
	"id" => $orange_themes_managment->themeslug."_banner_text",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_banner_type", "value" => "text")
	)
),

array(
	"type" => "upload",
	"title" => "Add Banner Image",
	"id" => $orange_themes_managment->themeslug."_banner_text_image_img",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_banner_type", "value" => "text_image")
	)
),

array(
	"type" => "textarea",
	"title" => "Banner text",
	"info" => "You add only text.",
	"id" => $orange_themes_managment->themeslug."_banner_text_image_txt",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_banner_type", "value" => "text_image")
	)
),

array(
	"type" => "close"
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => "Banner Settings",
),

array(
	"type" => "select",
	"title" => "Start Time",
	"id" => $orange_themes_managment->themeslug."_banner_start",
	"options"=>array(
		array("slug"=>"0", "name"=>"0 Secconds"), 
		array("slug"=>"5", "name"=>"5 Secconds"),
		array("slug"=>"10", "name"=>"10 Secconds"),
		array("slug"=>"15", "name"=>"15 Secconds"),
		array("slug"=>"20", "name"=>"20 Secconds"),
		array("slug"=>"25", "name"=>"25 Secconds"),
		array("slug"=>"30", "name"=>"30 Secconds"),
		array("slug"=>"60", "name"=>"1 Minute"),
		array("slug"=>"120", "name"=>"2 Minute"),
		array("slug"=>"180", "name"=>"3 Minute"),

		),
	"std" => "off"
),

array(
	"type" => "select",
	"title" => "Close Time",
	"id" => $orange_themes_managment->themeslug."_banner_close",
	"options"=>array(
		array("slug"=>"0", "name"=>"Off"), 
		array("slug"=>"5", "name"=>"5 Secconds"),
		array("slug"=>"10", "name"=>"10 Secconds"),
		array("slug"=>"15", "name"=>"15 Secconds"),
		array("slug"=>"20", "name"=>"20 Secconds"),
		array("slug"=>"25", "name"=>"25 Secconds"),
		array("slug"=>"30", "name"=>"30 Secconds"),
		array("slug"=>"60", "name"=>"1 Minute"),
		array("slug"=>"120", "name"=>"2 Minute"),
		array("slug"=>"180", "name"=>"3 Minute"),

		),
	"std" => "off"
),

array(
	"type" => "select",
	"title" => "Fly In From",
	"id" => $orange_themes_managment->themeslug."_banner_fly_in",
	"options"=>array(
		array("slug"=>"off", "name"=>"Off"), 
		array("slug"=>"top", "name"=>"Top"),
		array("slug"=>"top-left", "name"=>"Top Left"),
		array("slug"=>"top-right", "name"=>"Top Right"),
		array("slug"=>"left", "name"=>"Left"),
		array("slug"=>"bottom", "name"=>"Bottom"),
		array("slug"=>"bottom-left", "name"=>"Bottom Left"),
		array("slug"=>"bottom-right", "name"=>"Bottom Right"),
		),
	"std" => "off"
),

array(
	"type" => "select",
	"title" => "Fly Out To",
	"id" => $orange_themes_managment->themeslug."_banner_fly_out",
	"options"=>array(
		array("slug"=>"off", "name"=>"Off"), 
		array("slug"=>"top", "name"=>"Top"),
		array("slug"=>"top-left", "name"=>"Top Left"),
		array("slug"=>"top-right", "name"=>"Top Right"),
		array("slug"=>"left", "name"=>"Left"),
		array("slug"=>"bottom", "name"=>"Bottom"),
		array("slug"=>"bottom-left", "name"=>"Bottom Left"),
		array("slug"=>"bottom-right", "name"=>"Bottom Right"),
		),
	"std" => "off"
),

array(
	"type" => "select",
	"title" => "Show Banner after",
	"info" => "How many times site may be viewed until the popup will be shown again",
	"id" => $orange_themes_managment->themeslug."_banner_views",
	"options"=>array(
		array("slug"=>"0", "name"=>"0 Click"), 
		array("slug"=>"1", "name"=>"1 Click"),
		array("slug"=>"2", "name"=>"2 Clicks"),
		array("slug"=>"2", "name"=>"3 Clicks"),
		array("slug"=>"4", "name"=>"4 Clicks"),
		array("slug"=>"5", "name"=>"5 Clicks"),
		array("slug"=>"10", "name"=>"10 Clicks"),
		array("slug"=>"20", "name"=>"20 Clicks"),
		),
	"std" => "off"
),

array(
	"type" => "select",
	"title" => "How offen show the banner",
	"id" => $orange_themes_managment->themeslug."_banner_timeout",
	"options"=>array(
		array("slug"=>"0", "name"=>"One time per visit"), 
		array("slug"=>"1", "name"=>"Once a day"), 
		array("slug"=>"2", "name"=>"Once in 2 days"),
		array("slug"=>"3", "name"=>"Once in 3 days"),
		),
	"std" => "off"
),

array(
	"type" => "checkbox",
	"title" => "Enable Background Overlay:",
	"id" => $orange_themes_managment->themeslug."_banner_overlay",
	"std" => "off"
),

array(
	"type" => "close"
),

array(
	"type" => "save",
	"title" => "Save Changes"
),

array(
	"type" => "closesubtab"
),

array(
	"type" => "closetab"
)
 
 );


$orange_themes_managment->add_options($orangeThemes_general_options);
?>