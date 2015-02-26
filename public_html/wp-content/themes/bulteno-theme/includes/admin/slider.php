<?php
global $orange_themes_managment;
$orangeThemes_slider_options= array(
 array(
	"type" => "navigation",
	"name" => "Slider Settings",
	"slug" => "sliders"
),

array(
	"type" => "tab",
	"slug"=>'sliders'
),

array(
	"type" => "sub_navigation",
	"subname"=>array(
		array("slug"=>"homepage_slider", "name"=>"Homepage Slider"),
		array("slug"=>"news_slider", "name"=>"Breaking News Slider"),
		)
),

/* ------------------------------------------------------------------------*
 * HOMEPAGE SLIDER SETTINGS
 * ------------------------------------------------------------------------*/

 array(
	"type" => "sub_tab",
	"slug"=> 'homepage_slider'
),

array(
	"type" => "row",

),

array(
	"type" => "title",
	"title" => "Slider Type"
),

array(
	"type" => "checkbox",
	"id" => $orange_themes_managment->themeslug."_slider_enable",
	"title" => "Enable Homepage Slider"
),
array(
	"type" => "close",

),

array(
	"type" => "row",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_slider_enable", "value" => "on")
	)

),
array(
	"type" => "title",
	"title" => "Slider Post Category",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_slider_enable", "value" => "on")
	)
),
array(
	"type" => "categories",
	"id" => $orange_themes_managment->themeslug."_slider5_cat",
	"taxonomy" => "category",
	"title" => "Set Slider Category",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_slider_enable", "value" => "on")
	)
),
array(
	"type" => "close",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_slider_enable", "value" => "on")
	)

),
array(
	"type" => "row",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_slider_enable", "value" => "on")
	)

),
array(
	"type" => "title",
	"title" => "Slide Effects",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_slider_enable", "value" => "on")
	)
),

array(
	"type" => "select",
	"title" => "Slide Direction",
	"id" => $orange_themes_managment->themeslug."_homepage_slide_direction",
	"options"=>array(
		array("slug"=>"default", "name"=>"Default"), 
		array("slug"=>"left", "name"=>"Left"),
		array("slug"=>"right", "name"=>"Right"),
		array("slug"=>"alternate", "name"=>"Alternate"),
		array("slug"=>"random", "name"=>"Random"),
		),
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_slider_enable", "value" => "on")
	)
),

array(
	"type" => "select",
	"title" => "Slide Effect",
	"id" => $orange_themes_managment->themeslug."_homepage_slide_effect",
	"options"=>array(
		array("slug"=>"default", "name"=>"Default"), 
		array("slug"=>"curtain", "name"=>"Curtain"),
		array("slug"=>"zipper", "name"=>"Zipper"),
		array("slug"=>"wave", "name"=>"Wave"),
		array("slug"=>"fountain", "name"=>"Fountain"),
		array("slug"=>"cascade", "name"=>"Cascade"),
		array("slug"=>"fade", "name"=>"Fade"),
		array("slug"=>"random", "name"=>"Random"),
		),
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_slider_enable", "value" => "on")
	)
),

array(
	"type" => "select",
	"title" => "Slide Delay",
	"id" => $orange_themes_managment->themeslug."_homepage_slide_delay",
	"options"=>array(
		array("slug"=>"default", "name"=>"Default"), 
		array("slug"=>"1000", "name"=>"1 second"),
		array("slug"=>"2000", "name"=>"2 second"),
		array("slug"=>"3000", "name"=>"3 second"),
		array("slug"=>"4000", "name"=>"4 second"),
		array("slug"=>"5000", "name"=>"5 second"),
		array("slug"=>"6000", "name"=>"6 second"),
		array("slug"=>"7000", "name"=>"7 second"),
		),
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_slider_enable", "value" => "on")
	)
),

array(
	"type" => "select",
	"title" => "Slide Strip Count",
	"id" => $orange_themes_managment->themeslug."_homepage_slide_strip_count",
	"options"=>array(
		array("slug"=>"default", "name"=>"Default"), 
		array("slug"=>"10", "name"=>"10"),
		array("slug"=>"15", "name"=>"15"),
		array("slug"=>"20", "name"=>"20"),
		array("slug"=>"25", "name"=>"25"),
		array("slug"=>"30", "name"=>"30"),
		array("slug"=>"35", "name"=>"35"),
		array("slug"=>"40", "name"=>"40"),
		array("slug"=>"50", "name"=>"50"),
		array("slug"=>"60", "name"=>"60"),
		array("slug"=>"70", "name"=>"70"),
		),
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_slider_enable", "value" => "on")
	)
),

array(
	"type" => "select",
	"title" => "Slide Strip Speed",
	"id" => $orange_themes_managment->themeslug."_homepage_slide_strip_speed",
	"options"=>array(
		array("slug"=>"default", "name"=>"Default"), 
		array("slug"=>"100", "name"=>"0.1 second"),
		array("slug"=>"200", "name"=>"0.2 second"),
		array("slug"=>"300", "name"=>"0.3 second"),
		array("slug"=>"400", "name"=>"0.4 second"),
		array("slug"=>"500", "name"=>"0.5 second"),
		array("slug"=>"600", "name"=>"0.6 second"),
		array("slug"=>"700", "name"=>"0.7 second"),
		array("slug"=>"800", "name"=>"0.8 second"),
		array("slug"=>"900", "name"=>"0.9 second"),
		array("slug"=>"1000", "name"=>"1 second"),
		),
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_slider_enable", "value" => "on")
	)
),

array(
	"type" => "select",
	"title" => "Slide Title Speed",
	"id" => $orange_themes_managment->themeslug."_homepage_slide_title_speed",
	"options"=>array(
		array("slug"=>"default", "name"=>"Default"), 
		array("slug"=>"100", "name"=>"0.1 second"),
		array("slug"=>"200", "name"=>"0.2 second"),
		array("slug"=>"300", "name"=>"0.3 second"),
		array("slug"=>"400", "name"=>"0.4 second"),
		array("slug"=>"500", "name"=>"0.5 second"),
		array("slug"=>"600", "name"=>"0.6 second"),
		array("slug"=>"700", "name"=>"0.7 second"),
		array("slug"=>"800", "name"=>"0.8 second"),
		array("slug"=>"900", "name"=>"0.9 second"),
		array("slug"=>"1000", "name"=>"1 second"),
		),
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_slider_enable", "value" => "on")
	)
),

array(
	"type" => "close",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_slider_enable", "value" => "on")
	)

),
array(
	"type" => "row",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_slider_enable", "value" => "on")
	)

),
array(
	"type" => "title",
	"title" => "Slide Order",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_slider_enable", "value" => "on")
	)
),
array(
	"type" => "slide_order",
	"title" => "Slide Order",
	"cat" => $orange_themes_managment->themeslug."_slider5_cat",
	"count" => 5,
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_slider_enable", "value" => "on")
	)
),
array(
	"type" => "close",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_slider_enable", "value" => "on")
	)

),

array(
	"type" => "save",
	"title" => "Save Changes"
),
   
array(
	"type" => "closesubtab"
),


/* ------------------------------------------------------------------------*
 * BRAKING NEWS SLIDER
 * ------------------------------------------------------------------------*/

array(
	"type" => "sub_tab",
	"slug"=> 'news_slider'
),

array(
	"type" => "row",

),

array(
	"type" => "title",
	"title" => "Breaking News Slider"
),

array(
	"type" => "checkbox",
	"id" => $orange_themes_managment->themeslug."_bracking_news",
	"title" => "Enable Breaking News Slider"
),
array(
	"type" => "close",

),

array(
	"type" => "row",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_bracking_news", "value" => "on")
	)

),
array(
	"type" => "title",
	"title" => "Slider Post Category",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_bracking_news", "value" => "on")
	)
),
array(
	"type" => "categories",
	"id" => $orange_themes_managment->themeslug."_bracking_news_cat",
	"taxonomy" => "category",
	"title" => "Set Slider Category",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_bracking_news", "value" => "on")
	)
),
array(
	"type" => "close",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_bracking_news", "value" => "on")
	)

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