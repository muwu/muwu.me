<?php
add_action('widgets_init', create_function('', 'return register_widget("OT_triple_box");'));

class OT_triple_box extends WP_Widget {
	function OT_triple_box() {
		 parent::WP_Widget(false, $name = THEME_FULL_NAME.' Popular Posts & Commets');	
	}

	function form($instance) {
		 $count = esc_attr($instance['count']);
		 $comentcount = esc_attr($instance['comentcount']);

        ?>
          			<p><label for="<?php echo $this->get_field_id('count'); ?>"><?php printf ( __( 'Post count:' , THEME_NAME )); ?> <input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" /></label></p>
          			<p><label for="<?php echo $this->get_field_id('comentcount'); ?>"><?php printf ( __( 'Comment count:' , THEME_NAME )); ?> <input class="widefat" id="<?php echo $this->get_field_id('comentcount'); ?>" name="<?php echo $this->get_field_name('comentcount'); ?>" type="text" value="<?php echo $comentcount; ?>" /></label></p>
        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['count'] = strip_tags($new_instance['count']);
		$instance['comentcount'] = strip_tags($new_instance['comentcount']);
		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
		$count = $instance['count'];
		$comentcount = $instance['comentcount'];
		
		if(!$comentcount) $comentcount = 4;
		if(!$count) $count = 4;
		$widget_id = $args['widget_id'];

        ?>

		<?php echo $before_widget; ?>
			<div class="fadein">
				<h2><?php _e("Popular Articles", THEME_NAME);?></h2>
					<div>
						<div class="right-top-panel">
							<a href="javascript:void(0);" id="sidebar-icon-popular" class="icon-text active">&#9733;</a>
							<a href="javascript:void(0);" id="sidebar-icon-comments" class="icon-text icon-padding">&#59160;</a>
						</div>
			
						<div id="sidebar-panel-popular">
							<?php
								add_filter( 'posts_where', 'filter_where' );
								$args=array(
									'posts_per_page' => $count,
									'order' => 'DESC',
									'orderby'	=> 'meta_value_num',
									'meta_key'	=> THEME_NAME.'_post_views_count',
									'post_type'=> 'post'
								);
								$the_query = new WP_Query($args);
								$myposts = get_posts( $args );	
								$count_total = count($myposts);
								$counter = 1;
								remove_filter( 'posts_where', 'filter_where' );
							?>
							<?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
							<?php $image = get_post_thumb($the_query->post->ID,300,111); ?>	
								
								<div class="sidebar-article-big">
									<?php if($image['show']==true) { ?>
										<a href="<?php the_permalink();?>" class="image-border image-hover">
											<span class="image-overlay"><span class="icon-text">&#128269;</span><?php _e("Read Full Article",THEME_NAME);?></span>
											<img src="<?php echo $image['src'];?>" alt="<?php the_title();?>" title="<?php the_title();?>" />
										</a>
									<?php } ?>
									<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
									<p><?php echo wordLimiter(get_the_content(),30);?></p>
									<a href="<?php the_permalink();?>" class="read-more"><?php _e("READ MORE",THEME_NAME);?><span class="icon-text">&#10150;</span></a>
								</div>
									
								<?php if($count_total!=$counter && $count!=$counter) { ?>
									<div class="sidebar-br-line"></div>
								<?php } ?>
								<?php $counter++; ?>
							<?php endwhile; else: ?>
								<p><?php _e( 'No posts where found' , THEME_NAME );?></p>
							<?php endif; ?>	

						</div>
			
						<div id="sidebar-panel-comments" style="display:none;">
						<?php
							$args =	array(
								'status' => 'approve', 
								'order' => 'DESC',
								'number' => $comentcount
							);	
											
							$comments = get_comments($args);
							$totalCount = count($comments);
							$counter = 1;
										
							foreach($comments as $comment) {
							if($comment->user_id && $comment->user_id!="0") {
								$authorName = get_the_author_meta('display_name',$comment->user_id );
							} else {
								$authorName = $comment->comment_author;
							}		
						?>
							<div class="sidebar-comment">
								<span class="image-border left">
									<img src="<?php echo get_gravatar($comment->comment_author_email , '60', THEME_IMAGE_URL.'no-avatar-60x60.jpg', 'G', false, $atts = array() );?>" alt="<?php echo $authorName; ?>" title="<?php echo $authorName; ?>" />
								</span>
								<div class="comment-content">
									<h3><a href="<?php echo get_page_link($comment->comment_post_ID);?>#comment-<?php echo $comment->comment_ID;?>"><?php echo $authorName; ?></a></h3>
									<p><?php echo wordLimiter($comment->comment_content, 10);?></p>
									<a href="<?php echo get_page_link($comment->comment_post_ID);?>#comment-<?php echo $comment->comment_ID;?>" class="read-more"><?php _e("VIEW ARTICLE",THEME_NAME);?><span class="icon-text">&#10150;</span></a>
								</div>
							</div>

							<?php if($counter!=$comentcount && $totalCount!=$counter) { ?>
								<div class="sidebar-br-line"></div>
							<?php } ?>
							<?php $counter++; ?>
						<?php } ?>
										
						</div>
					</div>
				</div>	
							

							
				
					<?php echo $after_widget; ?>

        <?php
	}
}
?>