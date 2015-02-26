<?php
	add_action( 'get_header', 'orange_themes_scripts');
	
	function orange_themes_scripts() { 
		global $wp_styles;
		$slider_enable = get_option(THEME_NAME."_slider_enable");
		$banner_type = get_option ( THEME_NAME."_banner_type" );
		
		wp_enqueue_style("style", get_template_directory_uri()."/style.css", Array());
		wp_enqueue_style("reset", THEME_CSS_URL."reset.css", Array());
		wp_enqueue_style("main-stylesheet", THEME_CSS_URL."main-stylesheet.css", Array());
		wp_enqueue_style("shortcodes", THEME_CSS_URL."shortcode.css", Array());
		wp_enqueue_style("lightbox", THEME_CSS_URL."lightbox.css", Array());
		wp_enqueue_style("style-responsive", THEME_CSS_URL."responsive/desktop.css", Array());
		wp_enqueue_style('ie-only-styles', THEME_CSS_URL.'ie-transparecy.css');
		$wp_styles->add_data('ie-only-styles', 'conditional', 'lt IE 9');

		
		wp_enqueue_style("fonts", THEME_CSS_URL."fonts.php", Array());
		wp_enqueue_style("ot-dynamic-css", THEME_CSS_URL."dynamic-css.php", Array());
 
		wp_enqueue_script("jquery");
		wp_enqueue_script("cookies" , THEME_JS_URL."admin/jquery.cookie.js", Array('jquery'), "1.0");
		
		if($banner_type) {
			wp_enqueue_script("banner" , THEME_JS_URL."jquery.floating_popup.1.3.min.js", Array('jquery'), "1.0");
		}
		
		wp_enqueue_script("responsive" , THEME_JS_URL."orange-themes-responsive.js", Array('jquery'), "1.4");
		wp_enqueue_script("isotope" , THEME_JS_URL."jquery.isotope.min.js", Array('jquery'), "1.5.19");
		wp_enqueue_script("lightbox" , THEME_JS_URL."lightbox.js", Array('jquery'), "1.0");
		
		if($slider_enable) { 
			wp_enqueue_script("sexyslider" , THEME_JS_URL."jquery.sexyslider.min.js", Array('jquery'), "1.0");
		}
		
		wp_enqueue_script("infinitescroll" , THEME_JS_URL."jquery.infinitescroll.min.js", Array('jquery'), '');
		
		if ( is_singular() ) wp_enqueue_script( "comment-reply" );
		
		wp_enqueue_script("ot-gallery" , THEME_JS_URL."ot_gallery.js", Array('jquery'), "1.0");
		wp_enqueue_script("ot-scripts" , THEME_JS_URL."scripts.js", Array('jquery'), "1.0", true);
		wp_enqueue_script("ot-dynamic-scripts" , THEME_JS_URL."scripts.php", Array('jquery'), "1.0");
		
		$post_type = get_post_type();
		if($post_type=="gallery") {
			$gallery_id =get_the_ID();
		} else { 
			$gallery_id = false;
		}
		
		wp_localize_script('ot-scripts','ot',
			array(
				'adminUrl' => admin_url("admin-ajax.php"),
				'gallery_id' => $gallery_id,
				'galleryCat' => get_query_var('gallery-cat'),
				'imageUrl' => THEME_IMAGE_URL,
				'cssUrl' => THEME_CSS_URL,
				'themeUrl' => THEME_URL
			)
		);
		
	}
	
?>