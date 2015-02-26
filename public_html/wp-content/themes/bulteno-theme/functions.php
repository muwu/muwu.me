<?php
	define("THEME_NAME", 'bulteno');
	define("THEME_FULL_NAME", 'Bulteno');
	
	define("THEME_FUNCTIONS", "functions/");
	define("THEME_INCLUDES", "includes/");
	define("THEME_SLIDERS", THEME_INCLUDES."sliders/");
	define("THEME_SHORTCODES", THEME_INCLUDES."shortcodes/");
	define("THEME_WIDGETS", THEME_INCLUDES."widgets/");
	define("THEME_ADMIN_INCLUDES", THEME_INCLUDES."admin/");
	define("THEME_CACHE", "cache/");
	define("THEME_SCRIPTS", "js/");
	define("THEME_CSS", "css/");

	define("THEME_URL", get_template_directory_uri());

	define("THEME_CSS_URL",THEME_URL."/css/");
	define("THEME_CSS_ADMIN_URL",THEME_URL."/css/admin/");
	define("THEME_JS_URL",THEME_URL."/js/");
	define("THEME_JS_ADMIN_URL",THEME_URL."/js/admin/");
	define("THEME_JPLAYER_URL",THEME_URL."/js/jplayer/");
	define("THEME_IMAGE_URL",THEME_URL."/images/");
	define("THEME_IMAGE_CPANEL_URL",THEME_IMAGE_URL."/control-panel-images/");
	define("THEME_IMAGE_MTHEMES_URL",THEME_IMAGE_URL."/more-themes-images/");
	define("THEME_FUNCTIONS_URL",THEME_URL."/functions/");
	define("THEME_SHORTCODES_URL",THEME_URL."/includes/shortcodes/");
	define("THEME_ADMIN_URL",THEME_URL."/includes/admin/");

	get_template_part(THEME_FUNCTIONS."aweber_api/aweber_api");
	get_template_part(THEME_FUNCTIONS."init");
	get_template_part(THEME_INCLUDES."widgets/init");
	get_template_part(THEME_INCLUDES."shortcodes/init");
	get_template_part(THEME_INCLUDES."theme-config");
	get_template_part(THEME_INCLUDES."/admin/notifier/update-notifier");
	//get_template_part(THEME_INCLUDES."/admin/notifier/theme-notifier");
	
?>