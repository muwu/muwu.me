/* -------------------------------------------------------------------------*
 * 									GALLERY	
 * -------------------------------------------------------------------------*/

 			jQuery(document).ready(function($){	
				var adminUrl = ot.adminUrl;
				var gallery_id = ot.gallery_id;
				var type = window.location.hash.replace(/[^a-z]/g, '');
				if(type=="gallery" || type=="Sgallery" ||  type=="Wgallery") { 
					OT_gallery_click(adminUrl, gallery_id);
				} else {
					OT_gallery_live_click(adminUrl, gallery_id);
				}
			});
			
			function OT_gallery_click(adminUrl, gallery_id) {


				var opened_image = jQuery('.gallery-image').attr("rel");
				var active_thumb = jQuery(".image-list ul li");
				
				
				//if images loaded
				jQuery(".gallery-image").each(function() {
					if(jQuery(this).attr("src")=="") {
						jQuery(this).load(function(){
							jQuery(this).fadeIn('slow');
							//gallery
							jQuery(".waiter").removeClass("loading").addClass("loaded");
							//portfolio
							jQuery(".waiter-portfolio").removeClass("loading").addClass("loaded");
						});
					} else {
						jQuery(this).fadeIn('slow');
						//gallery
						jQuery(".waiter").removeClass("loading").addClass("loaded");
						//portfolio
						jQuery(".waiter-portfolio").removeClass("loading").addClass("loaded");
					}
				});
			
				
				jQuery.each(active_thumb, function() {
					jQuery(this).removeClass("active");
					if(jQuery(this).attr("rel") == opened_image) {
						jQuery(this).addClass("active");
					}

				});
				
				
				jQuery('.next, .prev, .next-image, .gal-thumbs').click(function() {	
					var ID = jQuery(this).closest('.ot-slide-item').attr("id");
					var clicked = jQuery(this);
					var next = jQuery(this).attr("rel");
					var opened_image = jQuery(this).closest('.ot-slide-item').find(".gallery-image").attr("rel");
					var total_img = jQuery(this).closest('.ot-slide-item').find('.ot-last-image').attr("rel");
			
					var waiter = clicked.closest('.ot-slide-item').find('.waiter');
					var waiterPorfolio = clicked.closest('.ot-slide-item').find('.waiter-portfolio');
					var image = clicked.closest('.ot-slide-item').find('.gallery-image');
					
					if( (parseInt(opened_image) < parseInt(total_img) || next!=parseInt(total_img)) && next!=0 && next!=opened_image) {
						waiter.removeClass("loaded");
						waiter.addClass("loading");
						waiterPorfolio.removeClass("loaded");
						waiterPorfolio.addClass("loading");
						
						jQuery.ajax({
							url:adminUrl,
							type:"POST",
							data:"action=load_next_image&gallery_id="+ID+"&next_image="+next,
							success:function(results) {
								image.attr("src", results);
								image.load(function(){
									waiter.removeClass("loading");
									waiter.addClass("loaded");
									waiterPorfolio.removeClass("loading");
									waiterPorfolio.addClass("loaded");
								});
							}
						});
					
					}

				});


				jQuery('.next').click(function() {
					OT_lightbox_slider(jQuery(this),"right");
					var opened_image = jQuery(this).closest('.ot-slide-item').find(".gallery-image").attr("rel");
					var total_img = jQuery(this).closest('.ot-slide-item').find('.ot-last-image').attr("rel");

					if(parseInt(total_img) > opened_image) {
						jQuery(this).closest('.ot-slide-item').find(".gallery-image").attr("rel", parseInt(opened_image)+1);
						jQuery(this).closest('.ot-slide-item').find(".prev").attr("rel", parseInt(jQuery(this).closest('.ot-slide-item').find(".prev").attr("rel"))+1);
					}	
					
					if(parseInt(total_img) > parseInt(jQuery(this).attr("rel"))) {
						jQuery(this).attr("rel", parseInt(jQuery(this).attr("rel"))+1);
						jQuery(this).closest('.ot-slide-item').find(".next-image").attr("rel", parseInt(jQuery(this).attr("rel"))); 
					}
					
				});	
				
				jQuery('.prev').click(function() {
					OT_lightbox_slider(jQuery(this),"left");
					var opened_image = jQuery(this).closest('.ot-slide-item').find(".gallery-image").attr("rel");
					
					if(parseInt(opened_image) > 1 && parseInt(opened_image) != jQuery(".next").attr("rel")) {
						jQuery(this).closest('.ot-slide-item').find(".next").attr("rel", parseInt(jQuery(this).closest('.ot-slide-item').find(".next").attr("rel"))-1);
						jQuery(this).closest('.ot-slide-item').find(".next-image").attr("rel", parseInt(jQuery(this).closest('.ot-slide-item').find(".next").attr("rel"))); 
					}
					if(parseInt(opened_image) > 1) {
						jQuery(this).attr("rel", parseInt(jQuery(this).attr("rel"))-1);
						jQuery(this).closest('.ot-slide-item').find(".gallery-image").attr("rel", parseInt(opened_image)-1);
					}
				});

				jQuery('#next-image').click(function() {
					var total_img = jQuery(this).closest('.ot-slide-item').find('.ot-last-image').attr("rel");
					var opened_image = jQuery(this).closest('.ot-slide-item').find(".gallery-image").attr("rel");
					
					if(parseInt(total_img) > opened_image) {
						jQuery(this).closest('.ot-slide-item').find(".gallery-image").attr("rel", parseInt(opened_image)+1);
						jQuery(this).closest('.ot-slide-item').find(".prev").attr("rel", parseInt(jQuery(this).closest('.ot-slide-item').find(".prev").attr("rel"))+1);
					}	
					
					if(parseInt(total_img) > parseInt(jQuery(this).attr("rel"))) {
						jQuery(this).attr("rel", parseInt(jQuery(this).attr("rel"))+1);
						jQuery(this).closest('.ot-slide-item').find(".next-image").attr("rel", parseInt(jQuery(this).attr("rel"))); 
						jQuery(this).closest('.ot-slide-item').find(".next").attr("rel", parseInt(jQuery(this).attr("rel"))); 
					}

				});
				
				jQuery('.gal-thumbs').click(function() {
					var next = jQuery(this).attr("rel");
					var total_img = jQuery(this).closest('.ot-slide-item').find('.ot-last-image').attr("rel");
					
					if(jQuery(this).attr("rel")!=total_img) { 
						jQuery(this).closest('.ot-slide-item').find(".next").attr("rel", parseInt(next)+1); 
						jQuery(this).closest('.ot-slide-item').find(".prev").attr("rel", parseInt(next)-1); 
						jQuery(this).closest('.ot-slide-item').find(".next-image").attr("rel", parseInt(next)+1); 
						jQuery(this).closest('.ot-slide-item').find(".gallery-image").attr("rel", parseInt(next)); 
					} else {
						jQuery(this).closest('.ot-slide-item').find(".next").attr("rel",total_img); 
						jQuery(this).closest('.ot-slide-item').find(".prev").attr("rel", parseInt(total_img)-1); 
						jQuery(this).closest('.ot-slide-item').find(".next-image").attr("rel", total_img); 
						jQuery(this).closest('.ot-slide-item').find(".gallery-image").attr("rel", parseInt(next)); 

					}
					if(jQuery(this).attr("rel")==1) { 
						jQuery(this).closest('.ot-slide-item').find(".prev").attr("rel", 0); 
						jQuery(this).closest('.ot-slide-item').find(".gallery-image").attr("rel", parseInt(next)); 
					}

				});
				
				
				jQuery('.next, .prev, .next-image, .gal-thumbs').click(function() {	
					var opened_image = jQuery(this).closest('.ot-slide-item').find('.gallery-image').attr("rel");
					var active_thumb = jQuery(".image-list ul li");

					jQuery.each(active_thumb, function() {
						jQuery(this).removeClass("active");
						if(jQuery(this).attr("rel") == opened_image) {
							jQuery(this).addClass("active");
						}

					});

				});
				
		
			}
			
			function OT_gallery_live_click(adminUrl, gallery_id) {

				var opened_image = jQuery('.gallery-image').attr("rel");
				var active_thumb = jQuery(".image-list ul li");
				
				//if images loaded
				jQuery(".gallery-image").each(function() {
					if(jQuery(this).attr("src")=="") {
						jQuery(this).load(function(){
							jQuery(this).fadeIn('slow');
							//gallery
							jQuery(".waiter").removeClass("loading").addClass("loaded");
							//portfolio
							jQuery(".waiter-portfolio").removeClass("loading").addClass("loaded");
						});
					} else {
						jQuery(this).fadeIn('slow');
						//gallery
						jQuery(".waiter").removeClass("loading").addClass("loaded");
						//portfolio
						jQuery(".waiter-portfolio").removeClass("loading").addClass("loaded");
					}
				});
				
				jQuery.each(active_thumb, function() {
					jQuery(this).removeClass("active");
					if(jQuery(this).attr("rel") == opened_image) {
						jQuery(this).addClass("active");
					}

				});
				
				
				jQuery('.next, .prev, .next-image, .gal-thumbs').live("click",function() {	
					var ID = jQuery(this).closest('.ot-slide-item').attr("id");
					var clicked = jQuery(this);
					var next = jQuery(this).attr("rel");
					var opened_image = jQuery(this).closest('.ot-slide-item').find(".gallery-image").attr("rel");
					var total_img = jQuery(this).closest('.ot-slide-item').find('.ot-last-image').attr("rel");
					var waiter = clicked.closest('.ot-slide-item').find('.waiter');
					var waiterPorfolio = clicked.closest('.ot-slide-item').find('.waiter-portfolio');
					var image = clicked.closest('.ot-slide-item').find('.gallery-image');
					
					if( (parseInt(opened_image) < parseInt(total_img) || next!=parseInt(total_img)) && next!=0 && next!=opened_image) {
						waiter.removeClass("loaded");
						waiter.addClass("loading");
						waiterPorfolio.removeClass("loaded");
						waiterPorfolio.addClass("loading");
						
						jQuery.ajax({
							url:adminUrl,
							type:"POST",
							data:"action=load_next_image&gallery_id="+ID+"&next_image="+next,
							success:function(results) {
								image.attr("src", results);
								image.load(function(){
									waiter.removeClass("loading");
									waiter.addClass("loaded");
									waiterPorfolio.removeClass("loading");
									waiterPorfolio.addClass("loaded");
								});
							}
						});
					
					}

				});


				jQuery('.next').live("click",function() {
					OT_lightbox_slider(jQuery(this),"right");
					var opened_image = jQuery(this).closest('.ot-slide-item').find(".gallery-image").attr("rel");
					var total_img = jQuery(this).closest('.ot-slide-item').find('.ot-last-image').attr("rel");

					if(parseInt(total_img) > opened_image) {
						jQuery(this).closest('.ot-slide-item').find(".gallery-image").attr("rel", parseInt(opened_image)+1);
						jQuery(this).closest('.ot-slide-item').find(".prev").attr("rel", parseInt(jQuery(this).closest('.ot-slide-item').find(".prev").attr("rel"))+1);
					}	
					
					if(parseInt(total_img) > parseInt(jQuery(this).attr("rel"))) {
						jQuery(this).attr("rel", parseInt(jQuery(this).attr("rel"))+1);
						jQuery(this).closest('.ot-slide-item').find(".next-image").attr("rel", parseInt(jQuery(this).attr("rel"))); 
					}
				});	
				
				jQuery('.prev').live("click",function() {
					OT_lightbox_slider(jQuery(this),"left");
					var opened_image = jQuery(this).closest('.ot-slide-item').find(".gallery-image").attr("rel");
					
					if(parseInt(opened_image) > 1 && parseInt(opened_image) != jQuery(".next").attr("rel")) {
						jQuery(this).closest('.ot-slide-item').find(".next").attr("rel", parseInt(jQuery(this).closest('.ot-slide-item').find(".next").attr("rel"))-1);
						jQuery(this).closest('.ot-slide-item').find(".next-image").attr("rel", parseInt(jQuery(this).closest('.ot-slide-item').find(".next").attr("rel"))); 
					}
					if(parseInt(opened_image) > 1) {
						jQuery(this).attr("rel", parseInt(jQuery(this).attr("rel"))-1);
						jQuery(this).closest('.ot-slide-item').find(".gallery-image").attr("rel", parseInt(opened_image)-1);
					}
				});

				jQuery('#next-image').live("click",function() {
					var opened_image = jQuery(this).closest('.ot-slide-item').find(".gallery-image").attr("rel");
					var total_img = jQuery(this).closest('.ot-slide-item').find('.ot-last-image').attr("rel");
					if(parseInt(total_img) > opened_image) {
						jQuery(this).closest('.ot-slide-item').find(".gallery-image").attr("rel", parseInt(opened_image)+1);
						jQuery(this).closest('.ot-slide-item').find(".prev").attr("rel", parseInt(jQuery(this).closest('.ot-slide-item').find(".prev").attr("rel"))+1);
					}	
					
					if(parseInt(total_img) > parseInt(jQuery(this).attr("rel"))) {
						jQuery(this).attr("rel", parseInt(jQuery(this).attr("rel"))+1);
						jQuery(this).closest('.ot-slide-item').find(".next-image").attr("rel", parseInt(jQuery(this).attr("rel"))); 
						jQuery(this).closest('.ot-slide-item').find(".next").attr("rel", parseInt(jQuery(this).attr("rel"))); 
					}

				});
				
				jQuery('.gal-thumbs').live("click",function() {
					var next = jQuery(this).attr("rel");
					var total_img = jQuery(this).closest('.ot-slide-item').find('.ot-last-image').attr("rel");
					if(jQuery(this).attr("rel")!=total_img) { 
						jQuery(this).closest('.ot-slide-item').find(".next").attr("rel", parseInt(next)+1); 
						jQuery(this).closest('.ot-slide-item').find(".prev").attr("rel", parseInt(next)-1); 
						jQuery(this).closest('.ot-slide-item').find(".next-image").attr("rel", parseInt(next)+1); 
						jQuery(this).closest('.ot-slide-item').find(".gallery-image").attr("rel", parseInt(next)); 
					} else {
						jQuery(this).closest('.ot-slide-item').find(".next").attr("rel",total_img); 
						jQuery(this).closest('.ot-slide-item').find(".prev").attr("rel", parseInt(total_img)-1); 
						jQuery(this).closest('.ot-slide-item').find(".next-image").attr("rel", total_img); 
						jQuery(this).closest('.ot-slide-item').find(".gallery-image").attr("rel", parseInt(next)); 

					}
					if(jQuery(this).attr("rel")==1) { 
						jQuery(this).closest('.ot-slide-item').find(".prev").attr("rel", 0); 
						jQuery(this).closest('.ot-slide-item').find(".gallery-image").attr("rel", parseInt(next)); 
					}

				});
				
				
				jQuery('.next, .prev, .next-image, .gal-thumbs').live("click",function() {	
					var opened_image = jQuery(this).closest('.ot-slide-item').find('.gallery-image').attr("rel");
					var active_thumb = jQuery(".image-list ul li");

					jQuery.each(active_thumb, function() {
						jQuery(this).removeClass("active");
						if(jQuery(this).attr("rel") == opened_image) {
							jQuery(this).addClass("active");
						}

					});

				});
				
		
			}
			
