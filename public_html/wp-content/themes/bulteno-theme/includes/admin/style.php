<?php
global $orange_themes_managment;
$orangeThemes_slider_options= array(
 array(
	"type" => "navigation",
	"name" => "Style Settings",
	"slug" => "custom-styling"
),

array(
	"type" => "tab",
	"slug"=>'custom-styling'
),

array(
	"type" => "sub_navigation",
	"subname"=>array(
		array("slug"=>"font_style", "name"=>"Font Style"),
		array("slug"=>"page_style", "name"=>"Page Style"),
		array("slug"=>"page_colors", "name"=>"Page Colors")
		)
),

/* ------------------------------------------------------------------------*
 * PAGE FONT SETTINGS
 * ------------------------------------------------------------------------*/

 array(
	"type" => "sub_tab",
	"slug"=> 'font_style'
),

array(
	"type" => "row",

),

array(
	"type" => "google_font_select",
	"title" => "Font Style:",
	"id" => $orange_themes_managment->themeslug."_google_font_1",
	"sort" => "alpha",
	"info" => "Font previews You Can find here: <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",
	"default_font" => array('font' => "Arial", 'txt' => "(default)")
),

array(
	"type" => "close",

),

array(
	"type" => "save",
	"title" => "Save Changes"
),
   
array(
	"type" => "closesubtab"
),

/* ------------------------------------------------------------------------*
 * PAGE STYLE
 * ------------------------------------------------------------------------*/

 array(
	"type" => "sub_tab",
	"slug"=> 'page_style'
),


array(
	"type" => "row"
),
array(
	"type" => "title",
	"title" => "Page Layout"
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_page_layout",
	"radio" => array(
		array("title" => "Boxed", "value" => "enableboxed"),
		array("title" => "Stretched Width", "value" => "")
	),
	"std" => ""
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
 * PAGE COLORS
 * ------------------------------------------------------------------------*/

 array(
	"type" => "sub_tab",
	"slug"=> 'page_colors'
),


array(
	"type" => "row"
),
array(
	"type" => "title",
	"title" => "Page Colors"
),
   

array( 
	"type" => "color", 
	"id" => $orange_themes_managment->themeslug."_bg_color", 
	"title" => "Page Backgrund Color:",
	"std" => "fffff",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_page_layout", "value" => "enableboxed")
	)	
),

array( 
	"type" => "color", 
	"id" => $orange_themes_managment->themeslug."_page_color_scheme", 
	"title" => "Color Scheme:", 
	"std" => "B71616" 
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

$orange_themes_managment->add_options($orangeThemes_slider_options);
?>