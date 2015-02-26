<?php

	$google_font_1 = get_option(THEME_NAME."_google_font_1");
	$favicon = get_option(THEME_NAME."_favicon");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!-- BEGIN html -->
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

	<!-- BEGIN head -->
	<head>
		<!-- Title -->
		<title>
			<?php
				if ( is_single() ) { single_post_title(); print ' | '; bloginfo('name'); }      
				elseif ( is_home() || is_front_page() ) { bloginfo('name'); print ' | '; bloginfo('description'); }
				elseif ( is_page() ) { single_post_title(''); print ' | '; bloginfo('description'); }
				elseif ( is_search() ) { bloginfo('name'); print ' | Search results ' . esc_html($s); }
				elseif ( is_404() ) { bloginfo('name'); print ' | Page not found'; }
				else { bloginfo('name'); wp_title('-'); }
			?>
		</title>

		<!-- Meta Tags -->
		<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		
		<!-- Favicon -->
		<?php 
			if($favicon) {
		?>
			<link rel="shortcut icon" href="<?php echo $favicon;?>" type="image/x-icon" />
		<?php } else { ?>
			<link rel="shortcut icon" href="<?php echo THEME_IMAGE_URL; ?>favicon.ico" type="image/x-icon" />
		<?php } ?>
		
		<link rel="apple-touch-icon" href="<?php echo THEME_IMAGE_URL; ?>apple-touch-icon.png" />
		<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="<?php printf( __( '%s latest posts', THEME_NAME), esc_html( get_bloginfo('name'), 1 ) ); ?>" />
		<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', THEME_NAME), esc_html( get_bloginfo('name'), 1 ) ); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<?php if($google_font_1 && $google_font_1!="Arial") { ?>
			<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=<?php echo str_replace(" ", "+", $google_font_1);?>" type="text/css" />
		<?php } ?>	

		<?php wp_head(); ?>	
	<!-- END head -->
	</head>
	
	<!-- BEGIN body -->
	<body <?php body_class(); ?>>

		<?php get_template_part(THEME_INCLUDES."banners");?>