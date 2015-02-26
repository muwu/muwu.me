<?php
	header("Content-type: text/css");
	require_once('../../../../wp-load.php');

	$bg = get_option(THEME_NAME."_bg");
	$color_1 = get_option(THEME_NAME."_bg_color");
	$color_2 = get_option(THEME_NAME."_page_color_scheme");
	
	$banner_type = get_option ( THEME_NAME."_banner_type" );
	
?>


body {
	background-color:#<?php echo $color_1 ;?>;
}

.header .navi .sub-menu li {
	background-color:#<?php echo $color_2;?>;
}

.header .navi li:hover > a {
	border-bottom:3px solid #<?php echo $color_2;?>;
}

.content h2 a:hover, .content h3 a:hover, .panel h3 a:hover, .read-more:hover, .header a.logo:hover, .article-icons a:hover, .pager a:hover, li.search input[type='submit']:hover, .back-to-top:hover, .carousel-box .carousel-left:hover, .carousel-box .carousel-right:hover, .upper-title-right a:hover, .sponsored-advert:hover, a.text-button:hover, .main-content div.about-author-content .social-icons a:hover, .plain-text .social-icons a:hover, .plain-text a:hover {
	color:#<?php echo $color_2;?>;
}

.navi > li:hover > a {
	color:#<?php echo $color_2;?>;
}

.content input[type='submit']:hover, .panel .tagcloud a:hover {
	background:#<?php echo $color_2;?>;
}

.sexyslider-control.active, h2 .title-marker, h2 .title-marker .right-arrow {
	background:#<?php echo $color_2;?>;
}

.carousel-box .image-list li.active .image-border img {
	border:5px solid #<?php echo $color_2;?>;
}


<?php
	if ( $banner_type == "image" ) {
	//Image Banner
?>
		#overlay { width:100%; height:100%; position:fixed;  _position:absolute; top:0; left:0; z-index:1001; background-color:#000000; overflow: hidden;  }
		#popup { display: none; position:absolute; width:auto; height:auto; z-index:1002; color: #000; font-family: Tahoma,sans-serif;font-size: 14px; }
		#baner_close { width: 22px; height: 25px; background: url(<?php echo get_template_directory_uri(); ?>/images/close.png) 0 0 repeat; text-indent: -5000px; position: absolute; right: -10px; top: -10px; }
<?php
	} else if ( $banner_type == "text" ) {
	//Text Banner
?>
		#overlay { width:100%; height:100%; position:fixed;  _position:absolute; top:0; left:0; z-index:1001; background-color:#000000; overflow: hidden;  }
		#popup { display: none; position:absolute; width:auto; height:auto; max-width:700px; z-index:1002; border: 1px solid #000; background: #e5e5e5 url(<?php echo get_template_directory_uri(); ?>/images/dotted-bg-6.png) 0 0 repeat; color: #000; font-family: Tahoma,sans-serif;font-size: 14px; line-height: 24px; border: 1px solid #cccccc; -moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px; text-shadow: #fff 0 1px 0; }
		#popup center { display: block; padding: 20px 20px 20px 20px; }
		#baner_close { width: 22px; height: 25px; background: url(<?php echo get_template_directory_uri(); ?>/images/close.png) 0 0 repeat; text-indent: -5000px; position: absolute; right: -12px; top: -12px; }
<?php 
	} else if ( $banner_type == "text_image" ) {
	//Image And Text Banner
?>
		#overlay { width:100%; height:100%; position:fixed;  _position:absolute; top:0; left:0; z-index:1001; background-color:#000000; overflow: hidden;  }
		#popup { display: none; position:absolute; width:auto; z-index:1002; color: #000; font-size: 11px; font-weight: bold; }
		#popup center { padding: 15px 0 0 0; }
		#baner_close { width: 22px; height: 25px; background: url(<?php echo get_template_directory_uri(); ?>/images/close.png) 0 0 repeat; text-indent: -5000px; position: absolute; right: -10px; top: -10px; }
<?php } ?>