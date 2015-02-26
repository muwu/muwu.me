<?php

	$cat = get_option( THEME_NAME."_bracking_news_cat");
	if ( get_option(THEME_NAME."-slide-order-set") != "1" ) {
		$order = "";
	} else {
		$order = "&orderby=menu_order&order=ASC";
	}
	$args = "cat=".$cat."&posts_per_page=4".$order;
	$my_query = new WP_Query($args);
	$myposts = get_posts( $args );	

	$counter = 1;


?>
		<div class="breaking">
			<span class="index"><?php _e("Breaking News", THEME_NAME);?></span>
			<div class="news">
				<div>
					<?php if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
						<div>
							<a href="<?php the_permalink();?>" class="title"><?php the_title();?></a>
							<span><?php echo WordLimiter(get_the_content(),20);?></span>
						</div>
					<?php endwhile; else: ?>
						<p><?php printf ( __('No posts where found', THEME_NAME)); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<a href="javascript:latestnews('left');" class="icon-text breaking-news-arrow">&#59225;</a>
			<a href="javascript:latestnews('right');" class="icon-text breaking-news-arrow">&#59226;</a>
		</div>			
