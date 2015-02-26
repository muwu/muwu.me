<?php
add_action('widgets_init', create_function('', 'return register_widget("OT_latest_posts");'));

class OT_latest_posts extends WP_Widget {
	function OT_latest_posts() {
		 parent::WP_Widget(false, $name = THEME_FULL_NAME.' Latest Posts');	
	}

	function form($instance) {
		 $type = esc_attr($instance['type']);
		 $title = esc_attr($instance['title']);
		 $count = esc_attr($instance['count']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php printf ( __( 'Title:' , THEME_NAME )); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>

			
			<p><label for="<?php echo $this->get_field_id('count'); ?>"><?php printf ( __( 'Post count:' , THEME_NAME ));?> <input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" /></label></p>
			
			<p><label for="<?php echo $this->get_field_id('type'); ?>"><?php printf ( __( 'Type:' , THEME_NAME ));?>
			<select name="<?php echo $this->get_field_name('type'); ?>" style="width: 100%; clear: both; margin: 0;">
					<option value="1" <?php if($type==1)  {echo 'selected="selected"';} ?>>With Image</option>
					<option value="2" <?php if($type==2)  {echo 'selected="selected"';} ?>>Without Image</option>
			</select>
			
			</label></p>
		
        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['count'] = strip_tags($new_instance['count']);
		$instance['type'] = strip_tags($new_instance['type']);

		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
		$count = $instance['count'];
		$type = $instance['type'];

		$args=array(
			'posts_per_page'=> $count
		);
		$the_query = new WP_Query($args);
		$counter = 1;
		
		$totalCount = $the_query->found_posts;
		
		$blogID = get_option('page_for_posts');
		

?>		
	<?php echo $before_widget; ?>
		<div class="fadein">
			<?php echo $before_title.$title.$after_title; ?>
			<div>
				<?php if($blogID && $blogID!="0") { ?>
					<div class="right-top-panel">
						<a href="<?php echo get_page_link(get_option('page_for_posts'));?>"><?php _e("view all",THEME_NAME);?></a>
					</div>
				<?php } ?>
				<?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
				<?php 	
					if(get_option(THEME_NAME."_image_size") == "custom") {
						$imageSizeSingle = get_post_meta ($the_query->post->ID, THEME_NAME."_image_size", true );
					} else {
						$imageSizeSingle = get_option(THEME_NAME."_image_size");
					}
					
					if($imageSizeSingle == "large") {
						$image = get_post_thumb($the_query->post->ID,300,111);
						$class="big";
					} else {
						$image = get_post_thumb($the_query->post->ID,107,129);
						$class="small";
					}
				?>
				<?php 
					if($image['show']!=true || $type==2){
						$class="big";
					} 
				?>
					<div class="sidebar-article-<?php echo $class;?>">
						<?php if($image['show']==true && $type!=2){ ?>
							<a href="<?php the_permalink();?>" class="image-border image-hover"><span class="image-overlay"><span class="icon-text">&#128269;</span><?php _e("Read More",THEME_NAME);?></span><img src="<?php echo $image['src'];?>" alt="<?php the_title();?>" title="<?php the_title();?>" /></a>
						<?php } ?>
						<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
						<p><?php echo wordLimiter(get_the_content(),25);?></p>
						<a href="<?php the_permalink();?>" class="read-more"><?php _e("READ MORE",THEME_NAME);?><span class="icon-text">&#10150;</span></a>
					</div>			
				<?php if($totalCount != $counter && $counter != $count) { ?>				
					<div class="sidebar-br-line"></div>
				<?php } ?>
				
				<?php $counter++;?>
				<?php endwhile; else: ?>
					<p><?php  _e( 'No posts where found' , THEME_NAME);?></p>
				<?php endif; ?>
			</div>
		</div>
	<?php echo $after_widget; ?>
		
	
      <?php
	}
}
?>
