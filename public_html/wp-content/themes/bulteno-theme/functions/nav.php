<?php
function custom_nav_btn_links($search=0, $page_num) {
	$pageURL = 'http://';
	$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	if ($search == "") {
	$pos = strpos($pageURL,"/page/");
	$len = strlen($pageURL);
		if($pos > 0) {
			$pos = strpos($pageURL,"/page/");
			$pageURL = substr($pageURL, 0, $pos);
			return htmlentities($pageURL."/page/".$page_num);
		}
		if (substr($pageURL,$len-1) == "/") return htmlentities($pageURL."page/".$page_num);
		else return htmlentities($pageURL."/page/".$page_num);
	}
	else {
		$pos = strpos($pageURL,"&paged=");
		$len = strlen($pageURL);
		if($pos > 0) {
			$pos = strpos($pageURL,"&paged=");
			$pageURL = substr($pageURL, 0, $pos);
			return htmlentities($pageURL."&paged=".$page_num);
		}
		if (substr($pageURL,$len-1) == "/") return htmlentities($pageURL."&paged=".$page_num);
		else return htmlentities($pageURL."&paged=".$page_num);
	}
}

/* -------------------------------------------------------------------------*
 * 								BLOG PAGE BUTTONS							*
 * -------------------------------------------------------------------------*/
 
function customized_nav_btns($page_num,$max_num_pages,$search=0) {

	if($page_num == ''){$page_num = '1';}
	if($max_num_pages > 1 ){
					
		$adjacents = 1;
		$page=$page_num;
		$lastpage=$max_num_pages;
		$lpm1 = $lastpage - 1;	
		$pagination = "";
		$next = $page + 1;
		$prev = $page - 1;
		
			
		if($lastpage > 1)
		{

			//previous button
			if ($page <= $lastpage && $page > 1) 
				$pagination.= "<a class=\"left\" href=\"".custom_nav_btn_links($search, $prev)."\"><span class=\"icon-text\">&#59229;</span><font>".__("Prev",THEME_NAME)."</font></a>";
			else
				$pagination.= "<a class=\"left\" href=\"#\"><span class=\"icon-text\">&#59229;</span><font>".__("Prev",THEME_NAME)."</font></a>";

		
	
			//next button
			if ($page >= 1 && $lastpage > $page) 
				$pagination.= "<a class=\"right\" href=\"".custom_nav_btn_links($search, $next)."\"><font>".__("Next",THEME_NAME)."</font><span class=\"icon-text\">&#59230;</span></a>";	
			else
				$pagination.= "<a class=\"right\" href=\"#\"><font>".__("Next",THEME_NAME)."</font><span class=\"icon-text\">&#59230;</span></a>";	



		}
		if ( get_option( THEME_NAME."_rss_button" ) == "on" ) {							
			$rss = get_option(THEME_NAME."_rss_url");	
			if($rss == "") {
				$rss = get_bloginfo("rss_url");
			}
		} else { 
			$rss = false; 
		}	
		?>								
							<div class="pager">
								<?php echo $pagination;?>
								<div class="paginator-block">
									<div><a href="#top"><?php _e("TOP",THEME_NAME);?></a><a href="<?php home_url();?>"><?php _e("HOME",THEME_NAME);?></a></div>
									<?php if($rss){ ?><div><a href="<?php echo $rss;?>" target="_blank"><?php _e("SUBSCRIBE",THEME_NAME);?></a></div><?php } ?> 
								</div>
							</div>
		<?php
	}
}

/* -------------------------------------------------------------------------*
 * 								GALLERY PAGE BUTTONS						*
 * -------------------------------------------------------------------------*/
 
function gallery_nav_btns($page_num,$max_num_pages,$search=0) {

	if($page_num == '' && $page_num == 0){ $page_num = '1'; }
	
	if($max_num_pages > 1 ){
		?>
		<div class="gallery-navi">
					

						<?php
							if($page_num < 4 OR $max_num_pages < 8) {
								$start = 1;
								if($max_num_pages >= 7 ) {$end = 7;}
								else $end = $max_num_pages;
							}
							else {
								if($page_num + 3 > $max_num_pages) {
									$end = $max_num_pages;
									$start = $end - 7;
								}
								else {
									$start = $page_num - 3;
									$end = $page_num + 3;
								}
							}
							
							for($i = $start; $i <= $end; $i++) {
								?><!--<a <?php if($i == $page_num) {?> class="active" <?php } else { ?> class="default" <?php } ?> href="<?php echo custom_nav_btn_links($search, $i); ?>"><span><?php echo $i;?></span></a>--><?php
							}	
						?>
						
						<a href="<?php if ($page_num < $max_num_pages) {$new_page = $page_num + 1;} else {$new_page = $page_num;} echo custom_nav_btn_links($search, $new_page);?>" class="next"> </a>
						<!--<a href="<?php if ($page_num > 1) { $new_page = $page_num - 1;} else {$new_page = 1;} echo custom_nav_btn_links($search, $new_page); ?>" class="prev"><?php printf ( __( 'Previous' , THEME_NAME ));?></a>-->
		</div>
		<?php
	}
}
?>