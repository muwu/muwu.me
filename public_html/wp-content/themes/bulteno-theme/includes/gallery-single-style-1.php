<?php get_header(); ?>
<?php 
	wp_reset_query();
	$g = get_the_ID();
	global $query_string;
	$query_vars = explode('&',$query_string);
									
	foreach($query_vars as $key) {
		if(strpos($key,'page=') !== false) {
			$i = substr($key,8,12);
			break;
		}
	}
	
	if(!isset($i)) {
		$i = 1;
	}	
									
	$args = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => $g, 'order'=> 'ASC', 'orderby'=> 'menu_order' ); 
	$attachments = get_posts($args);
	
?>
			<!-- BEGIN .content -->
			<div class="content">
				
				<!-- BEGIN .wrapper -->
				<div class="wrapper">
					
					<div class="content-holder">
						<div class="main-content">
						
						<h2 class="main-title very-first"><?php the_title();?></h2>
						
						<div class="upper-title-right"><a href="<?php echo get_page_link(get_gallery_page());?>"><?php _e( 'Back to all Galleries' , THEME_NAME );?></a></div>
						
						<?php 
							if ($attachments) {
								$file = $attachments[$i-1]->guid;
								$count = count($attachments);
						?>

						
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							
								<div class="ot-slide-item" id="<?php echo $post->ID;?>">
									<span class="ot-last-image" rel="<?php echo $count;?>"></span>
									<span class="next-image" rel="<?php echo $i+1;?>"></span>
									<div class="carousel-box">
										<a href="javascript:;" onclick="javascript:carousel('left');" class="carousel-left icon-text">&#59229;</a>
										<a href="javascript:;" onclick="javascript:carousel('right');" class="carousel-right icon-text">&#59230;</a>
										<div class="image-list">
											<ul>
													<?php
														$c=0;
														foreach($attachments as $attachment) {
															if($c==0) {
																$fileBig = $attachment->guid;
															}
															$file = $attachment->guid;
													?>
													<li rel="<?php echo $c+1;?>">	
														<a href="javascript:;" rel="<?php echo $c+1;?>" class="gal-thumbs image-border image-hover">
															<span class="image-overlay"><span class="icon-text icon-alone">&#128269;</span></span>
															<img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=/<?php $imgs = explode("/wp-content/", $file); echo "wp-content/".$imgs[1];?>&amp;w=123&amp;h=86&amp;zc=1&amp;q=100" alt="<?php the_title();?>"/>
														</a>
													</li>	
													<?php
														$c++;
														}
													?>
											</ul>
										</div>
									</div>
									<span class="gallery-full-photo image-border">
										<a href="javascript:;" class="prev left-button icon-text" rel="<?php if($i>1) { echo $i-1; } else { echo $i-1; } ?>">&#59225;</a>
										<a href="javascript:;" class="next right-button icon-text" rel="<?php if($i<$count) { echo $i+1; } else { echo $i; } ?>">&#59226;</a>
										
										<a href="javascript:;" class="full-hover">
											<span class="gal-last-image">
												<div class="loading waiter">
													<img class="image-big-gallery gallery-image" rel="<?php echo $i;?>" style="display:none;" src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=/<?php $imgs = explode("/wp-content/", $fileBig); echo "wp-content/".$imgs[1];?>&amp;w=970&amp;h=0&amp;zc=1&amp;q=100" alt="<?php the_title();?>" />
												</div>
											</span>
										</a>
									</span>
								</div>
						<?php 
							if (get_the_content() != "") { 				
									add_filter('the_content','remove_images');
									add_filter('the_content','remove_objects');
										
						?>
							<div class="quote-block">
								<blockquote>
										<?php the_content();?>
								</blockquote>
							</div>
						<?php 
							} 
						?>

					
					<!-- END .full-content -->
						<?php endwhile; ?>
						<?php endif;?>
						<?php } else {
							_e( 'This gallery has no pictures!' , THEME_NAME );
						} ?>
</div>
			
<?php get_footer(); ?>