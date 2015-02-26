<?php
	wp_reset_query();
	$aboutAuthor = get_option(THEME_NAME."_about_author");
	$aboutAuthorSingle = get_post_meta( $post->ID, THEME_NAME."_about_author", true ); 
	$singleImage = get_post_meta( $post->ID, THEME_NAME."_single_image", true );
	$similarPosts = get_option(THEME_NAME."_similar_posts");
	$similarPostsSingle = get_post_meta( $post->ID, THEME_NAME."_similar_posts", true ); 
	
	$user_ID = get_the_author_meta('ID');
	$flickr = get_user_meta($user_ID, 'flickr', true);
	$vimeo = get_user_meta($user_ID, 'vimeo', true);
	$twitter = get_user_meta($user_ID, 'twitter', true);
	$facebook = get_user_meta($user_ID, 'facebook', true);
	$google = get_user_meta($user_ID, 'google', true);
	$pinterest = get_user_meta($user_ID, 'pinterest', true);
	$linkedin = get_user_meta($user_ID, 'linkedin', true);
	$skype = get_user_meta($user_ID, 'skype', true);
	
?>
			<!-- BEGIN .content -->
			<div class="content">
				
				<!-- BEGIN .wrapper -->
				<div class="wrapper">
						<?php
							$image = false;
							$video = get_post_meta ($post->ID, THEME_NAME."_video", true );
							$video = OT_youtube_image($video);
							if(get_option(THEME_NAME."_image_size") == "custom") {
								$imageSizeSingle = get_post_meta ($post->ID, THEME_NAME."_image_size", true );
							} else {
								$imageSizeSingle = get_option(THEME_NAME."_image_size");
							}
							if(get_option(THEME_NAME."_show_single_thumb") == "on"  && $singleImage=="show" || !$singleImage) {
								if($imageSizeSingle == "large") {
									$image = get_post_thumb($post->ID,970,640);
								} else {
									$image = get_post_thumb($post->ID,198,198);
								}
							}
							if(!$image['src'] || $image['show']==false) {
								$image = false;
							}
						?>
						
						<?php if(($image['show'] == true && $imageSizeSingle == "large") || $video) { ?>
							<span class="article-image">
							<?php if($video) { ?>
								<a href="javascript:void(0);" rel="<?php echo $video;?>" class="image-border image-hover youtube-video-single">
									<span class="image-overlay">
										<span class="icon-text">&#9654;</span><?php _e("Play Video", THEME_NAME);?></span>
										<img src="<?php echo $image['src'];?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
								</a>
							<?php } else { ?>
								<span class="image-border">
									<img src="<?php echo $image['src'];?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
								</span>
							<?php } ?>	
							</span>
						<?php } ?>	

					<div class="content-holder">
				
						<!-- BEGIN .main-content -->
						<div class="main-content<?php OT_content_class($post->ID);?>">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<div class="plain-text">
								<?php if($image['show'] == true && $imageSizeSingle != "large") { ?>
									<span class="image-border left padding-image-article"><img src="<?php echo $image['src'];?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></span>
								<?php } ?>	
								<?php if((!$image['src'] || $image['show']==false) || $imageSizeSingle == "large" || $video) { ?>
									<div class="featured-article-title">
								<?php } ?>								
									<h2<?php echo (((!$image['src'] || $image['show']==false) || $imageSizeSingle != "large" && !$video) ? ' class="small-image-title"' : false);?>><?php the_title(); ?></h2>
									<div class="article-icons">
										<?php echo the_author_posts_link();?>
										<?php if ( comments_open() ) { ?><a href="<?php the_permalink();?>#comments"><span class="icon-text">&#59160;</span><?php comments_number(__('0 Comments', THEME_NAME), __('1 Comment', THEME_NAME), __('% Comments', THEME_NAME)); ?></a><?php } ?>
										<span><span class="icon-text">&#128340;</span><?php the_time("H:i, d.M Y");?></span>
									</div>
								<?php if((!$image['src'] || $image['show']==false) || $imageSizeSingle == "large" || $video) { ?>
									</div>
								<?php } ?>	
								<?php the_content(); ?>
								
								<div class="social-likes">
									<div class="soc-button-facebook"><a href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" class="ot-share"><span class="icon-text">&#62220;</span><?php _e("Share",THEME_NAME);?></a><span><span class="bullet">&nbsp;</span><span class="count">0</span></span></div>
									<div class="soc-button-twitter"><a href="#" class="ot-tweet" data-hashtags="" data-url="<?php the_permalink();?>" data-via="<?php echo get_option(THEME_NAME.'_twitter_name');?>" data-text="<?php the_title();?>"><span class="icon-text">&#62217;</span><?php _e("Tweet",THEME_NAME);?></a><span><span class="bullet">&nbsp;</span><span class="count">0</span></span></div>
									<div class="soc-button-pinterest"><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php if($image['show'] == true) echo $image['src']; ?>&description=<?php the_title(); ?>" data-url="<?php the_permalink();?>" class="ot-pin"><span class="icon-text">&#62226;</span><?php _e("Pin",THEME_NAME);?></a><span><span class="bullet">&nbsp;</span><span class="count">0</span></span></div>
									<div class="soc-button-google"><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="ot-pluss"><span class="icon-text">&#62223;</span><?php _e("Google", THEME_NAME);?></a><span><span class="bullet">&nbsp;</span><?php echo OT_plusones(get_bloginfo('url'));?></span></div>
								</div>
								<div class="clear-float"></div>
							</div>
							
							<?php if($aboutAuthor == "show" || ($aboutAuthor=="custom" && $aboutAuthorSingle=="show")) { ?>
									
								<h2 class="main-title"><?php _e('About Author' , THEME_NAME ); ?></h2>
								<div class="plain-text">
									<span class="image-border about-author-image"><img src="<?php echo get_gravatar(get_the_author_meta('user_email'), '100', THEME_IMAGE_URL.'no-avatar-100x100.jpg', 'G', false, $atts = array() );?>" alt="<?php echo get_the_author_meta('display_name'); ?>" title="<?php echo get_the_author_meta('display_name'); ?>" /></span>
									<div class="about-author-content">
										<div class="social-icons right">
											<?php if($flickr) { ?><a href="<?php echo $flickr;?>" class="icon-text">&#62212;</a><?php } ?>
											<?php if($vimeo) { ?><a href="<?php echo $vimeo;?>" class="icon-text">&#62215;</a><?php } ?>
											<?php if($twitter) { ?><a href="<?php echo $twitter;?>" class="icon-text">&#62218;</a><?php } ?>
											<?php if($facebook) { ?><a href="<?php echo $facebook;?>" class="icon-text">&#62221;</a><?php } ?>
											<?php if($google) { ?><a href="<?php echo $google;?>" class="icon-text">&#62224;</a><?php } ?>
											<?php if($pinterest) { ?><a href="<?php echo $pinterest;?>" class="icon-text">&#62227;</a><?php } ?>
											<?php if($linkedin) { ?><a href="<?php echo $linkedin;?>" class="icon-text">&#62233;</a><?php } ?>
											<?php if($skype) { ?><a href="<?php echo $skype;?>" class="icon-text">&#62266;</a><?php } ?>
										</div>
										<h2><?php echo get_the_author_meta('display_name'); ?></h2>
										<p><?php echo get_the_author_meta('description'); ?></p>
										<div>
											<a href="<?php $user_info = get_userdata($user_ID); echo get_author_posts_url($user_ID, sanitize_title($user_info->user_login)); ?>" class="text-button"><span class="icon-text">&#9871;</span><?php _e('VIEW MORE ARTICLES' , THEME_NAME ); ?></a>
											<?php if(get_the_author_meta('user_url')) { ?>
												<a href="<?php echo get_the_author_meta('user_url'); ?>" class="text-button"><span class="icon-text">&#127758;</span><?php _e('VIEW WEBSITE' , THEME_NAME ); ?></a>
											<?php } ?>
											<?php if(get_the_author_meta('user_email')) { ?>
												<a href="mailto:<?php echo get_the_author_meta('user_email'); ?>" class="text-button"><span class="icon-text">&#9993;</span><?php _e('SEND AN E-MAIL' , THEME_NAME ); ?></a>
											<?php } ?>
										</div>
									</div>
									<div class="clear-float"></div>
								</div>

							<?php } ?>

							<?php wp_reset_query(); ?>
							<?php if ( comments_open() ) : ?>
								<h2 class="main-title" id="comments"><?php comments_number(__('No Comments', THEME_NAME), __('1 Comments', THEME_NAME), __('% Comments', THEME_NAME)); ?></h2>
								<?php comments_template(); // Get comments.php template ?>

							<?php endif; ?>
							<?php endwhile; else: ?>
								<p><?php  _e('Sorry, no posts matched your criteria.' , THEME_NAME ); ?></p>
							<?php endif; ?>
						</div>