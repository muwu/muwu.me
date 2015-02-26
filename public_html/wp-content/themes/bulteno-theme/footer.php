<?php
	$social_footer = get_option(THEME_NAME."_social_footer");
	$logoFooter = get_option(THEME_NAME."_footer_logo");
	
	$twitter = get_option(THEME_NAME."_twitter");
	$facebook = get_option(THEME_NAME."_facebook");
	$googlepluss = get_option(THEME_NAME."_googlepluss");
	$pinterest = get_option(THEME_NAME."_pinterest");
	$flickr = get_option(THEME_NAME."_flickr");
	$vimeo = get_option(THEME_NAME."_vimeo");
	$skype = get_option(THEME_NAME."_skype");

	$contactInfo = get_option(THEME_NAME."_footer_contact_info");
	$footerPhone = get_option(THEME_NAME."_footer_phone");
	$footerAddress = get_option(THEME_NAME."_footer_address");
	$footerMail = get_option(THEME_NAME."_footer_mail");
	$footerTextContact = get_option(THEME_NAME."_footer_text_contact");
	
	$footerTextTitle = get_option(THEME_NAME."_footer_text_title");
	$footerText = get_option(THEME_NAME."_footer_text");

	if ( get_option( THEME_NAME."_rss_button" ) == "on" ) {							
		$rss = get_option(THEME_NAME."_rss_url");	
		if($rss == "") {
			$rss = get_bloginfo("rss_url");
		}
	} else { 
		$rss = false; 
	}	

	
	// pop up banner
	$banner_type = get_option ( THEME_NAME."_banner_type" );
	
	$banner_fly_in = get_option ( THEME_NAME."_banner_fly_in" );
	$banner_fly_out = get_option ( THEME_NAME."_banner_fly_out" );
	$banner_start = get_option ( THEME_NAME."_banner_start" );
	$banner_close = get_option ( THEME_NAME."_banner_close" );
	$banner_overlay = get_option ( THEME_NAME."_banner_overlay" );
	$banner_views = get_option ( THEME_NAME."_banner_views" );
	$banner_timeout = get_option ( THEME_NAME."_banner_timeout" );
	
	$banner_text_image_img = get_option ( THEME_NAME."_banner_text_image_img" ) ;
	$banner_image = get_option ( THEME_NAME."_banner_image" );
	$banner_text = stripslashes ( get_option ( THEME_NAME."_banner_text" ) );
	
	if ( $banner_type == "image" ) {
	//Image Banner
		$cookie_name = substr ( md5 ( $banner_image ), 1,6 );
	} else if ( $banner_type == "text" ) { 
	//Text Banner
		$cookie_name = substr ( md5 ( $banner_text ), 1,6 );
	} else if ( $banner_type == "text_image" ) { 
	//Image And Text Banner
		$cookie_name = substr ( md5 ( $banner_text_image_img ), 1,6 );
	} else {
		$cookie_name = "popup";
	}

	if ( !$banner_start) {
		$banner_start = 0;
	}
	
	if ( !$banner_close) {
		$banner_close = 0;
	}
	
	if ( $banner_overlay == "on") {
		$banner_overlay = "true";
	} else {
		$banner_overlay = "false";
	}
	
	//slider settings
	$slider_enable = get_option(THEME_NAME."_slider_enable");
	$homepage_slider_direction = get_option(THEME_NAME."_homepage_slide_direction");
	$homepage_slider_effect = get_option(THEME_NAME."_homepage_slide_effect");
	$homepage_slider_delay = get_option(THEME_NAME."_homepage_slide_delay");
	$homepage_slider_strips = get_option(THEME_NAME."_homepage_slide_strip_count");
	$homepage_slider_strip_speed = get_option(THEME_NAME."_homepage_slide_strip_speed");
	$homepage_slider_title_speed = get_option(THEME_NAME."_homepage_slide_title_speed");
	?>

				
					</div>
					
				<!-- END .wrapper -->
				</div>
				
			<!-- BEGIN .content -->
			</div>
			
			<!-- BEGIN .footer -->
			<div class="footer">
				
				<!-- BEGIN .wrapper -->
				<div class="wrapper">
					
					<div class="top-section">
					
						<?php if($logoFooter) { ?> 
							<a href="<?php echo home_url(); ?>" class="logo"><img src="<?php echo $logoFooter; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" /></a>
						<?php } else { ?>
							<a href="<?php echo home_url(); ?>" class="logo"><?php bloginfo('name'); ?></a>
						<?php } ?> 
						
						<?php if ($social_footer == "on") { ?>
								<div class="social-icons">
									<?php if($flickr) { ?><a href="<?php echo $flickr;?>" class="icon-text">&#62212;</a><?php } ?>
									<?php if($vimeo) { ?><a href="<?php echo $vimeo;?>" class="icon-text">&#62215;</a><?php } ?>
									<?php if($twitter) { ?><a href="<?php echo $twitter;?>" class="icon-text">&#62218;</a><?php } ?>
									<?php if($facebook) { ?><a href="<?php echo $facebook;?>" class="icon-text">&#62221;</a><?php } ?>
									<?php if($googlepluss) { ?><a href="<?php echo $googlepluss;?>" class="icon-text">&#62224;</a><?php } ?>
									<?php if($pinterest) { ?><a href="<?php echo $pinterest;?>" class="icon-text">&#62227;</a><?php } ?>
									<?php if($skype) { ?><a href="<?php echo $skype;?>" class="icon-text">&#62266;</a><?php } ?>
									<?php if($rss) { ?><a href="<?php echo $rss;?>" class="icon-text">&#59194;</a><?php } ?>
								</div>
						<?php } ?>
						
						<div class="clear-float"></div>
					</div>
							
						<?php			
							if ( function_exists( 'register_nav_menus' )) {
								$args = array(
									'container' => '',
									'theme_location' => 'ot-menu-1',
									'items_wrap' => '<ul class="%2$s" >%3$s</ul>',
									'depth' => 1,
									"echo" => false
								);
											
								if(has_nav_menu('ot-menu-1')) {
										
						?>
							<div class="menu-section">
								<?php echo add_menu_arrows(wp_nav_menu($args));?>
							</div>
						<?php			
								} 


							}
						?>
					
					<div class="middle-section">
						<?php if($footerTextTitle|| $footerText) { ?>
							<div class="foot-middle-left">
								<h2><?php echo $footerTextTitle;?></h2>
								<p><?php echo $footerText;?></p>
							</div>
						<?php } ?>
						<?php			
							if ( function_exists( 'register_nav_menus' )) {
								$args = array(
									'container' => '',
									'theme_location' => 'ot-menu-2',
									'items_wrap' => '<ul class="%2$s" >%3$s</ul>',
									'depth' => 1,
									"echo" => false
								);
											
								if(has_nav_menu('ot-menu-2')) {
										
						?>
							<div class="foot-middle-center">
								<h2><?php echo OT_et_theme_menu_name("ot-menu-2");?>:</h2>
								<?php echo add_menu_arrows(wp_nav_menu($args));?>
							</div>
						<?php			
								} 


							}
						?>

						<div class="foot-middle-right">
						<?php if($contactInfo=="on") { ?>
							<h2><?php _e('Contact Us',THEME_NAME);?></h2>
							<?php if($footerTextContact) { ?><p><?php echo $footerTextContact;?></p><?php } ?>
							<ul>
								<?php if($footerPhone) { ?><li class="icon-phone"><?php echo $footerPhone;?></li><?php } ?>
								<?php if($footerAddress) { ?><li class="icon-pin"><?php echo $footerAddress;?></li><?php } ?>
								<?php if($footerMail) { ?><li class="icon-mail"><a href="mailto:<?php echo $footerMail;?><"><?php echo $footerMail;?></a></li><?php } ?>
							</ul>
						<?php } ?>
						</div>
						
						<div class="clear-float"></div>
					</div>
					
					<div class="bottom-section">
						<div class="orange-themes-design right"><p>DESIGNED &amp; DEVELOPED BY <a href="http://orange-themes.com" target="_blank"><img src="<?php echo THEME_IMAGE_URL;?>orange-themes.png" alt="Orange Themes" title="Orange Themes" /></a></p></div>
						<p>Copyright <?php echo date('Y');?> <a href="http://happy-wheels-2-full.com" target="_blank">Happy wheels full game</a> All Rights Reserved</p>
					</div>
					
				<!-- END .wrapper -->
				</div>
				
			<!-- END .footer -->
			</div>
			
		<!-- END .boxed -->
		</div>
			
		<div class="lightbox">
			<div class="lightcontent-loading">
				<h2 class="light-title"><?php _e("Loading..", THEME_NAME);?></h2>
				<a href="#" onclick="javascript:lightboxclose();" class="light-close"><span>&#10062;</span><?php _e("Close Window", THEME_NAME);?></a>
				<div class="loading-box">
					<h3><?php _e("Loading, Please Wait!", THEME_NAME);?></h3>
					<span><?php _e("This may take a second or two.", THEME_NAME);?></span>
					<span class="loading-image"><img src="<?php echo THEME_IMAGE_URL;?>loading.gif" title="" alt="" /></span>
				</div>
			</div>
			<div class="lightcontent"></div>
		</div>
<?php
			//pop up banner
			if ( $banner_type != "off" ) {
		?>
		
		<script type="text/javascript">
		<!--
		
		jQuery(document).ready(function($){
			$('#popup_content').popup( {
				starttime 			 : <?php echo $banner_start; ?>,
				selfclose			 : <?php echo $banner_close; ?>,
				popup_div			 : 'popup',
				overlay_div	 		 : 'overlay',
				close_id			 : 'baner_close',
				overlay				 : <?php echo $banner_overlay; ?>,
				opacity_level		 : 0.7,
				overlay_cc			 : false,
				centered			 : true,
				top	 		   		 : 130,
				left	 			 : 130,
				setcookie 			 : true,
				cookie_name	 		 : '<?php echo $cookie_name;?>',
				cookie_timeout 	 	 : <?php echo $banner_timeout; ?>,
				cookie_views 		 : <?php echo $banner_views ; ?>,
				floating	 		 : true,
				floating_reaction	 : 700,
				floating_speed 		 : 12,
				<?php 
					if ( $banner_fly_in != "off") { 
						echo "fly_in : true,
						fly_from : '".$banner_fly_in."', "; 
					} else {
						echo "fly_in : false,";
					}
				?>
				<?php 
					if ( $banner_fly_out != "off") { 
						echo "fly_out : true,
						fly_to : '".$banner_fly_out."', "; 
					} else {
						echo "fly_out : false,";
					}
				?>
				popup_appear  		 : 'show',
				popup_appear_time 	 : 0,
				confirm_close	 	 : false,
				confirm_close_text 	 : 'Do you really want to close?'
			} );
		});
		-->
		</script>
		<?php } ?>
		<?php if ( is_page_template ( 'template-homepage.php' )  && $slider_enable) { ?>
				<script type="text/javascript">
				  jQuery(document).ready(function($){
					$('#slider').SexySlider({
						navigation: '#navigation',
						control: '#control',
						width  : 970,
						height : 285,
						autopause : false,
						<?php if($homepage_slider_strips && $homepage_slider_strips!="default") { echo "strips : ".$homepage_slider_strips.","; }?>
						<?php if($homepage_slider_delay && $homepage_slider_delay!="default") { echo "delay : ".$homepage_slider_delay.","; }?>
						<?php if($homepage_slider_strip_speed && $homepage_slider_strip_speed!="default") { echo "stripSpeed : ".$homepage_slider_strip_speed.","; }?> 
						<?php if($homepage_slider_title_speed && $homepage_slider_title_speed!="default") { echo "titleSpeed : ".$homepage_slider_title_speed.","; }?> 
						<?php if($homepage_slider_direction && $homepage_slider_direction!="default") { echo "direction : '".$homepage_slider_direction."',"; }?> 
						<?php if($homepage_slider_effect && $homepage_slider_effect!="default") { echo "effect : '".$homepage_slider_effect."'"; }?> 
					});
				  });
				</script>
		<?php } ?>
	<?php wp_footer(); ?>
	<!-- END body -->
	</body>
<!-- END html -->
</html>