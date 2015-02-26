<?php
add_action('widgets_init', create_function('', 'return register_widget("OT_gallery");'));

class OT_gallery extends WP_Widget {
	function OT_gallery() {
		 parent::WP_Widget(false, $name = THEME_FULL_NAME.' Latest Galleries');	
	}

	function form($instance) {
		 $title = esc_attr($instance['title']);
		 $count = esc_attr($instance['count']);
		 $color = esc_attr($instance['color']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php  printf ( __( 'Title:' , THEME_NAME )); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('count'); ?>"><?php  printf ( __( 'Item shown:' , THEME_NAME ));?> <input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" /></label></p>

        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['count'] = strip_tags($new_instance['count']);
		$instance['color'] = strip_tags($new_instance['color']);
		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
		$count = $instance['count'];
		$counter=1;
		if(!$count) $count=2;

		
		$args = array('post_type' => 'gallery', 'showposts' => $count);
		$my_query = new WP_Query($args);
		
		$totalCount = $my_query->found_posts;
        ?>
            <?php echo $before_widget;?>
				<div class="fadein">
					<?php echo $before_title.$title.$after_title; ?>
						<div>
						<?php if (is_pagetemplate_active("template-gallery.php")) { ?>
							<div class="right-top-panel">
								<a href="<?php echo get_page_link(get_gallery_page());?>"><?php _e("view all",THEME_NAME);?></a>
							</div>
						<?php } ?>
				
				
							<?php if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
							<?php
								global $post;
								$g = $post->ID;
								$image = get_post_thumb($g,70,70);
							?>
							
								<div class="sidebar-gallery" rel="gallery-<?php echo $g;?>">
									<a href="javascript:void(0);" class="image-border image-hover left light-show"><span class="image-overlay"><span class="icon-text icon-alone">&#128269;</span></span>
									<img src="<?php echo $image['src'];?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" rel="1"/></a>
									<div class="gallery-content">
										<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
										<p><?php echo wordLimiter(get_the_content(),20);?></p>
										<a href="<?php the_permalink();?>" class="read-more"><?php _e("VIEW GALLERY",THEME_NAME);?><span class="icon-text">&#10150;</span></a>
									</div>
								</div>
										
							<?php if($totalCount != $counter && $counter != $count) { ?>				
								<div class="sidebar-br-line"></div>
							<?php } ?>
				<?php $counter++; ?>
				<?php endwhile; ?>
				<?php endif; ?>	
						</div>
				</div>
				<?php echo $after_widget; ?>	
        <?php
	}
}
?>
