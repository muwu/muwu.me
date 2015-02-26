<?php
/*
Template Name: Homepage
*/	
?>
<?php get_header(); ?>
<?php get_template_part(THEME_INCLUDES.'top'); ?>
<?php
	wp_reset_query();
	global $post;

	$slider_enable = get_option(THEME_NAME."_slider_enable");
	
	//block
	$newsBlock = get_option(THEME_NAME."_homepage_news_block");
	$post_type_block = get_option(THEME_NAME."_homepage_post_type_block");
	$post_type_block = OT_post_type($post_type_block);

	
	if($post_type_block=="gallery") {
		$category_id = get_option(THEME_NAME."_homepage_category_gid");
		$term = get_term($category_id, "gallery-cat");

		$blockArgs=array(
			'post_type' => $post_type_block,
			'showposts' => 3,
			'tax_query' => array(
				array(
					'taxonomy' => "gallery-cat",
					'terms' => $term
				)
			)
		);
	} elseif($post_type_block=="post") {
		$category_id = get_option(THEME_NAME."_homepage_category_id");
		$blockArgs=array(
			'post_type' => $post_type_block,
			'showposts' => 3,
			'cat' => $category_id
		);
		
	} else {
		$blockArgs=array(
			'post_type' => $post_type_block,
			'showposts' => 3,
		);
	}
	

	
	//news
	$blogBanner = get_option(THEME_NAME."_blog_banner");
	$blogBannerCode = get_option(THEME_NAME."_blog_banner_code");
	$count = get_option(THEME_NAME."_homepage_count");
	
	if ( get_query_var('paged') ) {
		$paged = get_query_var('paged');
	} elseif ( get_query_var('page') ) {
		$paged = get_query_var('page');
	} else {
		$paged = 1;
	}
	
	$newsArgs = array('post_type' => 'post', 'paged' => $paged, 'posts_per_page' => $count);
	
	$myQueryBlock = new WP_Query($blockArgs);
	$myQueryNews = new WP_Query($newsArgs);
	

	$counter = 1;
?>

			<!-- BEGIN .content -->
			<div class="content">
				
				<!-- BEGIN .wrapper -->
				<div class="wrapper">
					
					<?php 
						if($slider_enable) { 
							get_template_part(THEME_SLIDERS."slider", 1); 
						}
					?>
					<?php if($newsBlock=="on") { ?>
						<div class="tripple-articles">
							<?php if ($myQueryBlock->have_posts()) : while ($myQueryBlock->have_posts()) : $myQueryBlock->the_post(); ?>
							<?php $image = get_post_thumb($myQueryBlock->post->ID,310,130);?>
								<div>
									<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
									<a href="<?php the_permalink();?>" class="image-border image-hover">
										<span class="image-overlay">
											<span class="icon-text">&#128269;</span>
											<?php _e("Read Full Article", THEME_NAME);?>
										</span>
										<img src="<?php echo $image["src"];?>" alt="<?php the_title();?>" title="<?php the_title();?>" /></a>
								</div>
							<?php endwhile; else: ?>
								<p><?php  _e( 'No posts where found' , THEME_NAME);?></p>
							<?php endif; ?>	
						</div>
					<?php } ?>
					<div class="content-holder">
						<div class="main-content <?php OT_content_class(OT_page_id());?>">
							<?php if ($myQueryNews->have_posts()) : while ($myQueryNews->have_posts()) : $myQueryNews->the_post(); ?>
								<?php
									$tag = get_post_meta ($myQueryNews->post->ID, THEME_NAME."_tag", true );
									
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
								
									$video = get_post_meta ($myQueryNews->post->ID, THEME_NAME."_video", true );
									$video = OT_youtube_image($video);
									global $more; $more = false;							
								?>

								<?php if(!$video) { ?>
									<?php
										if(get_option(THEME_NAME."_image_size") == "custom") {
											$imageSizeSingle = get_post_meta ($myQueryNews->post->ID, THEME_NAME."_image_size", true );
										} else {
											$imageSizeSingle = get_option(THEME_NAME."_image_size");
										}
										
										if(get_option(THEME_NAME."_show_first_thumb") == "on") {
											if($imageSizeSingle == "large") {
												$image = get_post_thumb($myQueryNews->post->ID,650,500);
											} else {
												$image = get_post_thumb($myQueryNews->post->ID,198,198);
											}
										} else {
											$class = "article-small-image";
										}
										
										if($image['show'] == false){
											$class = "article-no-image";
											$class2 = " article-big-thumb";
										} elseif($imageSizeSingle == "large") {
											$class = "article-big-image";
											$class2 = " article-big-thumb";
										} else {
											$class = "article-small-image";
											$class2 = false;
										}
									?>
								<div <?php post_class("article-block".$class2); ?> id="post-<?php echo $myQueryNews->post->ID ?>">
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
											<div class="soc-button-facebook"><a href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" class="ot-share"><span class="icon-text">&#62220;</span><?php _e("Share",THEME_NAME);?></a><span><span class="bullet">&nbsp;</span><span class="count">0</span></span></div>
											<div class="soc-button-twitter"><a href="#" class="ot-tweet" data-hashtags="" data-url="<?php the_permalink();?>" data-via="<?php echo get_option(THEME_NAME.'_twitter_name');?>" data-text="<?php the_title();?>"><span class="icon-text">&#62217;</span><?php _e("Tweet",THEME_NAME);?></a><span><span class="bullet">&nbsp;</span><span class="count">0</span></span></div>
											<div class="soc-button-pinterest"><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php if($image['show'] == true) echo $image['src']; ?>&description=<?php the_title(); ?>" data-url="<?php the_permalink();?>" class="ot-pin"><span class="icon-text">&#62226;</span><?php _e("Pin",THEME_NAME);?></a><span><span class="bullet">&nbsp;</span><span class="count">0</span></span></div>
										</div>
										<a href="<?php the_permalink();?>#more-<?php the_ID(); ?>" class="read-more"><?php _e("READ MORE", THEME_NAME);?><span class="icon-text">&#10150;</span></a>
									</div>
								</div>
								<?php } else { ?>
								<?php $image = get_post_thumb($myQueryNews->post->ID,650,500); ?>
									<div <?php post_class("article-video-block"); ?> id="post-<?php echo $myQueryNews->post->ID; ?>">
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
													<a href="<?php the_permalink();?>" class="ot-url"><?php the_title();?></a></h2>
												<div class="article-icons">
													<?php echo the_author_posts_link();?>
													<?php if ( comments_open() ) { ?><a href="<?php the_permalink();?>#comments"><span class="icon-text">&#59160;</span><?php comments_number(__('0 Comments', THEME_NAME), __('1 Comment', THEME_NAME), __('% Comments', THEME_NAME)); ?></a><?php } ?>
													<span><span class="icon-text">&#128340;</span><?php the_time("H:i, d.M Y");?></span>
												</div>
											</div>
											<?php $content = get_the_content();?>
											<?php if(get_option(THEME_NAME."_show_first_pictures") == "off" || !get_option(THEME_NAME."_show_first_pictures")) { $content = remove_images($content); } ?>
											<?php if(get_option(THEME_NAME."_show_first_objects") == "off" || !get_option(THEME_NAME."_show_first_objects")) { $content = remove_objects($content);} ?>
											<p><?php echo WordLimiter($content,75);?></p>
											<div class="social-likes">
												<div class="soc-button-facebook"><a href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" class="ot-share"><span class="icon-text">&#62220;</span><?php _e("Share",THEME_NAME);?></a><span><span class="bullet">&nbsp;</span><span class="count">0</span></span></div>
												<div class="soc-button-twitter"><a href="#" class="ot-tweet" data-hashtags="" data-url="<?php the_permalink();?>" data-via="<?php echo get_option(THEME_NAME.'_twitter_name');?>" data-text="<?php the_title();?>"><span class="icon-text">&#62217;</span><?php _e("Tweet",THEME_NAME);?></a><span><span class="bullet">&nbsp;</span><span class="count">0</span></span></div>
												<div class="soc-button-pinterest"><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php if($image['show'] == true) echo $image['src']; ?>&description=<?php the_title(); ?>" data-url="<?php the_permalink();?>" class="ot-pin"><span class="icon-text">&#62226;</span><?php _e("Pin",THEME_NAME);?></a><span><span class="bullet">&nbsp;</span><span class="count">0</span></span></div>
											</div>
											<a href="<?php the_permalink();?>#more-<?php echo $myQueryNews->post->ID; ?>" class="read-more"><?php _e("READ MORE", THEME_NAME);?><span class="icon-text">&#10150;</span></a>
											<div class="clear-float"></div>
										</div>
									</div>
								<?php } ?>
								<?php if ($counter==7 && $blogBanner=="on") { ?>
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
								<p><?php  _e( 'No posts where found' , THEME_NAME);?></p>
							<?php endif; ?>	

							<?php customized_nav_btns($paged, $myQueryNews->max_num_pages); ?>
							
						</div>
						
<?php get_template_part(THEME_INCLUDES."sidebar"); ?>
<?php get_footer(); ?>