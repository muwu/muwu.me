<?php
	/* -------------------------------------------------------------------------*
	 * 						SET DEFAULT VALUES BY THEME INSTALL					*
	 * -------------------------------------------------------------------------*/
	global $pagenow;
	
	// with activate istall option
	if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
		$theme_logo = get_template_directory_uri()."/images/logo.png";
		$theme_logo_f = get_template_directory_uri()."/images/logo-footer.png";
		$favicon = get_template_directory_uri()."/images/favicon.ico";

		
		//update_option(THEME_NAME."_logo", $theme_logo);
		update_option(THEME_NAME."_favicon", $favicon);
		update_option(THEME_NAME."_footer_logo", $theme_logo_f);
		update_option(THEME_NAME.'_sidebar_position', "custom");
		update_option(THEME_NAME.'_search', "on");
		update_option(THEME_NAME."_rss_url", get_bloginfo("rss_url"));
		update_option(THEME_NAME.'_image_size', "custom");
		update_option(THEME_NAME.'_about_author', "custom");
		update_option(THEME_NAME.'_show_first_thumb', "on");
		update_option(THEME_NAME.'_show_single_thumb', "on");
		update_option(THEME_NAME.'_slider_type', "5");
		update_option(THEME_NAME.'_page_layout', "enableboxed");
		update_option(THEME_NAME.'_bg_color', "ffffff");
		update_option(THEME_NAME.'_page_color_scheme', "B71616");
		update_option(THEME_NAME.'_footer_contact_info', "on");
		update_option(THEME_NAME.'_footer_phone', "2398-009-009");
		update_option(THEME_NAME.'_footer_address', "Leeds - Notts, NG20 8RY - UK");
		update_option(THEME_NAME.'_footer_mail', "support@page.com");
		update_option(THEME_NAME.'_footer_text_contact', "Vel vide timeam propriae et, graeco fabellas duo, vis at civibus suscipiantur definitionem. Id his vide.");
		update_option(THEME_NAME.'_footer_text_title', "In est dico explicari duo cibo justo errem nam audire");
		update_option(THEME_NAME.'_footer_text', "Omnes euripidis ut eam, dolorem partiendo mei cu. Ex nulla tantas ius, corrumpit hendrerit sadipscing eam in. Ubique luptatum et est, eum ei dicant graecis. Cu sumo labore offendit eum. Recteque qualisque eam no, an sint scriptorem nam. Pro atqui iisque atqui iisque impetus at, mei legendos instructior ei, at est novum dicunt complectitur. Mediocrem disputando sit eu, at verear praesent posidonium eam. Sea habemus mandamus te, sit alii delectus constituto no.");
		
		

	}
	
	

	


?>