<?php

	$cat = get_option( THEME_NAME."_slider5_cat");
	if ( get_option(THEME_NAME."-slide-order-set") != "1" ) {
		$order = "";
	} else {
		$order = "&orderby=menu_order&order=ASC";
	}
	$args = "cat=".$cat."&posts_per_page=5".$order;
	$my_query = new WP_Query($args);
	$myposts = get_posts( $args );	

	$counter = 1;


?>
					<!-- BEGIN .slider-fifth -->
					<div class="slider">
						<div id="slider">
							<?php if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
							<?php $image = get_post_thumb($post->ID,970,285,THEME_NAME.'_slider_image'); ?>
							<img src="<?php echo $image['src'];?>" alt="&lt;a href=&quot;<?php the_permalink();?>&quot;&gt;<?php the_title();?>"/>
							<?php endwhile; else: ?>
								<p><?php printf ( __('No posts where found', THEME_NAME)); ?></p>
							<?php endif; ?>
						</div>

						<div id="navigation"></div>

						<div id="control"></div>
					<!-- END .slider-fifth -->
					</div>
