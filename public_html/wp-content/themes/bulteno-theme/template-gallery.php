<?php
/* Template Name: Photo Gallery */
?>
<?php get_header(); ?>
<?php get_template_part(THEME_INCLUDES.'top'); ?>

<?php
	wp_reset_query();
	$paged = get_query_string_paged();
	$posts_per_page = get_option(THEME_NAME.'_gallery_items');

	if($posts_per_page == "") {
		$posts_per_page = get_option('posts_per_page');
	}
	
	$my_query = new WP_Query(array('post_type' => 'gallery', 'posts_per_page' => $posts_per_page, 'paged'=>$paged));  
	$categories = get_terms( 'gallery-cat', 'orderby=name&hide_empty=0' );

?>
			
			<!-- BEGIN .content -->
			<div class="content">
				
				<!-- BEGIN .wrapper -->
				<div class="wrapper">
					
					<div class="content-holder">
						<div class="main-content">
							
							<h2 class="main-title very-first"><?php the_title();?></h2>
							
							<div class="upper-title-right" id="gallery-categories">
								<?php _e('Sort by category:', THEME_NAME); ?>
								<a href="#filter" class="active" data-option="*"><?php _e('All categories', THEME_NAME); ?></a>
								<?php foreach ($categories as $category) { ?>
									<a href="#filter" data-option=".<?php echo $category->slug;?>"><?php echo $category->name;?></a>
								<?php } ?>
							</div>
							
							<div class="gallery-grid">
								
								<div id="gallery-full">
									<?php 

																					
										$args = array(
											'post_type'     	=> 'gallery',
											'post_status'  	 	=> 'publish',
											'showposts' 		=> -1
										);

										$myposts = get_posts( $args );	
										$count_total = count($myposts);

										$counter=1;	
									?>
									<?php if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
									<?php $src = get_post_thumb($post->ID,475,370); ?>
									<?php $term_list = wp_get_post_terms($post->ID, 'gallery-cat'); ?>
									<?php $gallery_style = get_post_meta ( $post->ID, THEME_NAME."_gallery_style", true ); ?>
									
									<div class="gallery-small-block<?php foreach ($term_list as $term) { echo " ".$term->slug; } ?>" rel="gallery-<?php the_ID(); ?>">
										<a href="<?php the_permalink();?>" class="image-border image-hover<?php if($gallery_style=="lightbox") { echo " light-show"; } ?>">
											<span class="gallery-info">
												<h2><?php the_title();?></h2>
												<p><?php echo WordLimiter(get_the_content(),20);?></p>
											</span>
											<span class="image-overlay">
												<span class="icon-text">&#128269;</span><?php _e("View Gallery", THEME_NAME);?>
											</span>
											<img src="<?php echo $src["src"]; ?>" alt="<?php the_title();?>" title="<?php the_title();?>" />
										</a>
									</div>
									
									<?php 
										if ( $paged != 0 ) {
											$a = ($paged-1)*$posts_per_page;
										} else {		
											$a = 1;
										}
									?>
												
									<?php $counter++; ?>
									<?php endwhile; ?>
									<?php else : ?>
										<h2 class="title"><?php _e( 'No galleries were found' , THEME_NAME );?></h2>
									<?php endif; ?>
									
									
								</div>
								<div class="clear-float"></div>
							</div>
								<?php gallery_nav_btns($paged, $my_query->max_num_pages); ?>	
						</div>

<?php get_footer(); ?>