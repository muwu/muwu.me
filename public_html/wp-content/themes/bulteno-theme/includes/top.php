<?php
	$page_layout = get_option(THEME_NAME."_page_layout");
	$logo = get_option(THEME_NAME.'_logo');		
	$search = get_option(THEME_NAME.'_search');		

?>
		<a href="#top" class="back-to-top"><span class="icon-text">&#59231;</span><?php _e("Back To Top", THEME_NAME);?></a>

		
			
		<!-- BEGIN .boxed -->
		<div class="<?php echo $page_layout;?> boxed">

			<!-- BEGIN .header -->
			<div class="header">
				<!-- BEGIN .wrapper -->
				<div class="wrapper">
				
					<?php
						if(get_option( THEME_NAME."_bracking_news")=="on") { 
							get_template_part(THEME_SLIDERS."slider","bracking");
						}
					?>
					<div class="logo-space">
						<div>
							<?php if($logo) { ?>
								<a href="<?php echo home_url(); ?>" class="logo">
									<img src="<?php echo $logo;?>" alt="<?php bloginfo('name'); ?>"/>
								</a>
							<?php } else { ?>
								<a href="<?php echo home_url(); ?>" class="logo"><?php bloginfo('name'); ?></a>
							<?php } ?>
							
							<?php if(get_bloginfo('description')) { ?>
								<p><?php bloginfo('description'); ?></p>
							<?php } ?>
						</div>
					</div>

								<?php	
		
									if($search=="on") { 
										$items_wrap ='<ul class="%2$s navi" >%3$s<li class="search"><form method="get" action="'.get_home_url().'" name="searchform"><input type="text" value="" placeholder="Search Something.."  name="s" id="s"/><input type="submit" value="&#128269;" /></form></li></ul>';
									} else {
										$items_wrap = '<ul class="%2$s navi" >%3$s</ul>';
									}
									
									if ( function_exists( 'register_nav_menus' )) {
										$args = array(
											'container' => '',
											'theme_location' => 'top-menu',
											"link_before" => '<i>',
											"link_after" => '</i>' ,
											'items_wrap' => $items_wrap,
											'depth' => 3,
											"echo" => false
										);
										
										
										if(has_nav_menu('top-menu')) {

											echo add_menu_arrows(wp_nav_menu($args));		
				
										} else {
											echo "<ul class=\"navi\"><li class=\"navi-none\"><a href=\"".admin_url("nav-menus.php") ."\">Please set up ".THEME_FULL_NAME." menu!</a></li></ul>";
										}
										
										

									}
								?>
					
					
				<!-- END .wrapper -->
				</div>
				
			<!-- END .header -->
			</div>