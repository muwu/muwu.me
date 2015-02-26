<?php require_once( '../../../../wp-load.php' );?>

<h2 class="light-title"></h2>
<a href="#" onclick="javascript:lightboxclose();" class="light-close"><span>&#10062;</span><?php _e("Close Window",THEME_NAME);?></a>

<div class="ot-slide-item">

	<span class="ot-last-image" rel="0"></span>
	<span class="next-image" rel="0"></span>	
	
	<div class="carousel-box">

		<a href="#" onclick="javascript:carousel('left');" class="carousel-left icon-text">&#59229;</a>
		<a href="#" onclick="javascript:carousel('right');" class="carousel-right icon-text">&#59230;</a>
		<div class="image-list">
			<ul id="ot-lightbox-thumbs"></ul>
		</div>
	</div>
	
	<span class="gallery-full-photo light-border">
		<a href="javascript:;" class="prev left-button" rel="0"><span class="icon-text">&#59225;</span></a>
		<a href="javascript:;" class="next right-button" rel="0"><span class="icon-text">&#59226;</span></a>
		<a href="javascript:;" class="full-hover">
			<span class="gal-last-image">
				<div class="loading waiter-portfolio">
					<img class="image-big-gallery gallery-image" rel="0" style="display:none;" src="#" alt="<?php the_title();?>" />
				</div>
			</span>
		</a>
	</span>
</div>
<div class="quote-block">
	<blockquote>
		<span id="ot-lightbox-content"></span>
	</blockquote>
</div>
