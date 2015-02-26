<?php
	get_header();
	get_template_part(THEME_INCLUDES."top");
?>
<?php
	$blogBanner = get_option(THEME_NAME."_blog_banner");
	$blogBannerCode = get_option(THEME_NAME."_blog_banner_code");
?>
			<!-- BEGIN .content -->
			<div class="content">
				
				<!-- BEGIN .wrapper -->
				<div class="wrapper">
					
					<div class="content-holder">
						
						<!-- BEGIN .main-content -->
						<div class="main-content<?php OT_content_class(OT_page_id());?>">
	
							<h2 class="main-title very-first"><?php _e("Search Results for", THEME_NAME); echo " \"".remove_html($_GET['s'])."\"";?></h2>

							
							<?php 
								global $query_string; 
								$counter=1;
								
							?>
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								<?php
									$tag = get_post_meta ($post->ID, THEME_NAME."_tag", true );
									
									switch($tag) {
										case "New":
											$tagClass = "title-marker-green";
											$hClass = 'class="newtag"';
											break;
										case "Featured":
											$tagClass = "title-marker";
											$hClass = 'class="featuredtag"';
											break;
										case "Video":
											$tagClass = "title-marker-video";
											$hClass = 'class="videotag"';
											break;
										default: 
											$tagClass = false;
											$hClass = false;
											break;
									}
								
									$video = get_post_meta ($post->ID, THEME_NAME."_video", true );
									$video = OT_youtube_image($video);
									global $more; $more = false;							
								?>

								<?php if(!$video) { ?>
									<?php
										if(get_option(THEME_NAME."_image_size") == "custom") {
											$imageSizeSingle = get_post_meta ($post->ID, THEME_NAME."_image_size", true );
										} else {
											$imageSizeSingle = get_option(THEME_NAME."_image_size");
										}
										
										if(get_option(THEME_NAME."_show_first_thumb") == "on") {
											if($imageSizeSingle == "large") {
												$image = get_post_thumb($post->ID,650,500);
											} else {
												$image = get_post_thumb($post->ID,198,198);
											}
										} else {
											$class = "article-small-image";
										}
										
										if($image['show'] == false){
											$class = "article-no-image";
											$class2 = " article-big-thumb";
											$class3 = " featured-article-title";
										} elseif($imageSizeSingle == "large") {
											$class = "article-big-image";
											$class2 = " article-big-thumb";
											$class3 = " featured-article-title";
										} else {
											$class = "article-small-image";
										}
									?>
								<div <?php post_class("article-block".$class2); ?> id="post-<?php echo $post->ID; ?>">
									<?php
										if($image['show'] == true) {
									?>
										<a href="<?php the_permalink();?>" class="image-border image-hover">
											<span class="image-overlay"><span class="icon-text">&#128269;</span><?php _e("Read Full Article", THEME_NAME);?></span>
											<img src="<?php echo $image['src'];?>" alt="<?php the_title();?>" title="<?php the_title();?>" />
										</a>
									<?php } ?> 
									<div class="<?php echo $class;?>">
										<?php if((!$image['src'] || $image['show']==false) || $imageSizeSingle == "large") { ?>
											<div class="featured-article-title">
										<?php } ?>	
												<h2 <?php if($tag!="None") echo $hClass;?>>
													<?php if($tag!="None") { ?>
														<span class="<?php echo $tagClass;?>"><?php echo $tag;?></span>
													<?php } ?>
												<a href="<?php the_permalink();?>" class="ot-url"><?php the_title();?></a></h2>
												<div class="article-icons">
													<?php echo the_author_posts_link();?>
													<?php if ( comments_open() ) { ?><a href="<?php the_permalink();?>#comments"><span class="icon-text">&#59160;</span><?php comments_number(__('0 Comments', THEME_NAME), __('1 Comment', THEME_NAME), __('% Comments', THEME_NAME)); ?></a><?php } ?>
													<span><span class="icon-text">&#128340;</span><?php the_time("H:i, d.M Y");?></span>
												</div>
										<?php if((!$image['src'] || $image['show']==false) || $imageSizeSingle == "large") { ?>
											</div>
										<?php } ?>	
										<?php $content = get_the_content();?>
										<?php if(get_option(THEME_NAME."_show_first_pictures") == "off" || !get_option(THEME_NAME."_show_first_pictures")) { $content = remove_images($content); } ?>
										<?php if(get_option(THEME_NAME."_show_first_objects") == "off" || !get_option(THEME_NAME."_show_first_objects")) { $content = remove_objects($content);} ?>
										<p><?php echo WordLimiter($content,75);?></p>
										<div class="social-likes">
											<div class="soc-button-facebook"><a href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" class="ot-share"><span class="icon-text">&#62220;</span><?php _e("Share",THEME_NAME);?></a><span><span class="bullet">&nbsp;</span><?php echo OT_customFShare(get_permalink());?></span></div>
											<div class="soc-button-twitter"><a href="#" class="ot-tweet" data-hashtags="" data-url="<?php the_permalink();?>" data-via="<?php echo get_option(THEME_NAME.'_twitter_name');?>" data-text="<?php the_title();?>"><span class="icon-text">&#62217;</span><?php _e("Tweet",THEME_NAME);?></a><span><span class="bullet">&nbsp;</span><span class="count">0</span></span></div>
											<div class="soc-button-pinterest"><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php if($image['show'] == true) echo $image['src']; ?>&description=<?php the_title(); ?>" data-url="<?php the_permalink();?>" class="ot-pin"><span class="icon-text">&#62226;</span><?php _e("Pin",THEME_NAME);?></a><span><span class="bullet">&nbsp;</span><span class="count">0</span></span></div>
										</div>
										<a href="<?php the_permalink();?>#more-<?php echo $post->ID; ?>" class="read-more"><?php _e("READ MORE", THEME_NAME);?><span class="icon-text">&#10150;</span></a>
									</div>
								</div>
								<?php } else { ?>
								<?php $image = get_post_thumb($post->ID,650,500); ?>
									<div <?php post_class("article-video-block"); ?> id="post-<?php echo $post->ID; ?>">
										<a href="javascript:void(0);" rel="<?php echo $video;?>" class="image-border image-hover youtube-video-news">
											<span class="image-overlay"><span class="icon-text">&#9654;</span><?php _e("Play Video", THEME_NAME);?></span>
											<img src="<?php echo $image['src'];?>" alt="<?php the_title();?>" title="<?php the_title();?>" />
										</a>
										<div class="article-big-image">
											<div class="featured-article-title">
												<h2 <?php if($tag!="None") echo $hClass;?>>
													<?php if($tag!="None") { ?>
														<span class="<?php echo $tagClass;?>"><?php echo $tag;?></span>
													<?php } ?>
													<a href="<?php the_permalink();?>" class="ot-url"><?php the_title();?></a>
												</h2>
												<div class="article-icons">
													<?php echo the_author_posts_link();?>
													<?php if ( comments_open() ) { ?><a href="<?php the_permalink();?>#comments"><span class="icon-text">&#59160;</span><?php comments_number(__('0 Comments', THEME_NAME), __('1 Comment', THEME_NAME), __('% Comments', THEME_NAME)); ?></a><?php } ?>
													<span><span class="icon-text">&#128340;</span><?php the_time("H:i, d.M Y");?></span>
												</div>
											</div>
											<p><?php echo WordLimiter($content,75);?></p>
											<div class="social-likes">
												<div class="soc-button-facebook"><a href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" class="ot-share"><span class="icon-text">&#62220;</span><?php _e("Share",THEME_NAME);?></a><span><span class="bullet">&nbsp;</span><span class="count">0</span></span></div>
												<div class="soc-button-twitter"><a href="#" class="ot-tweet" data-hashtags="" data-url="<?php the_permalink();?>" data-via="<?php echo get_option(THEME_NAME.'_twitter_name');?>" data-text="<?php the_title();?>"><span class="icon-text">&#62217;</span><?php _e("Tweet",THEME_NAME);?></a><span><span class="bullet">&nbsp;</span><span class="count">0</span></span></div>
												<div class="soc-button-pinterest"><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php if($image['show'] == true) echo $image['src']; ?>&description=<?php the_title(); ?>" data-url="<?php the_permalink();?>" class="ot-pin"><span class="icon-text">&#62226;</span><?php _e("Pin",THEME_NAME);?></a><span><span class="bullet">&nbsp;</span><span class="count">0</span></span></div>
											</div>
											<a href="<?php the_permalink();?>#more-<?php echo $post->ID; ?>" class="read-more"><?php _e("READ MORE", THEME_NAME);?><span class="icon-text">&#10150;</span></a>
											<div class="clear-float"></div>
										</div>
									</div>
								<?php } ?>
								<?php if ($counter==8 && $blogBanner=="on") { ?>
									<div class="advert-block">
										<div class="banner468x60">
											<?php echo stripslashes($blogBannerCode);?>
										</div>
										<?php if (is_pagetemplate_active("template-contact.php")) { ?>
											<a href="<?php echo get_page_link(get_contact_page());?>" class="sponsored-advert"><span class="icon-text">&#9652;</span><?php _e("SPONSORED ADVERT", THEME_NAME);?><span class="icon-text">&#9652;</span></a>
										<?php } ?>
									</div>
								<?php } ?>
							<?php $counter++; ?>
							<?php endwhile; else: ?>
								<p><?php printf ( __('No posts were found', THEME_NAME)); ?></p>
							<?php endif; ?>
							<?php
								if (is_search()) {
									global $query_string;
										customized_nav_btns($paged, $wp_query->max_num_pages, $query_string);
								} else {
										customized_nav_btns($paged, $wp_query->max_num_pages);
								} 
							?>
					
						</div>	
<?php
	get_template_part(THEME_INCLUDES."sidebar");
	get_footer();
?>