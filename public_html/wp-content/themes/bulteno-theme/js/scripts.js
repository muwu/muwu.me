var featuredCurrent = 0;
var featuredSize = 810;

function latestnews(direction){
	var featuredElements = jQuery(".news > div > div").size();
	var featuredSize = jQuery('.breaking .news').width();
	if(featuredElements <= 1)return;
	
	if(direction == "right"){
		if(featuredCurrent+1 == featuredElements){
			featuredCurrent = 0;
			jQuery(".news > div").css("left","0px");
		}else{
			featuredCurrent++;
			jQuery(".news > div").css("left",featuredCurrent*featuredSize*(-1)+'px');
		}
	}else
	if(direction == "left"){
		if(featuredCurrent == 0){
			featuredCurrent = featuredElements-1;
			jQuery(".news > div").css("left",featuredCurrent*featuredSize*(-1)+'px');
		}else{
			featuredCurrent--;
			jQuery(".news > div").css("left",featuredCurrent*featuredSize*(-1)+'px');
		}
	}
}

var carouselSize = 0;
var carouselCurrent = 0;

function carousel(direction){
	var carouselElements = jQuery(".carousel-box .image-list ul > li").size();
	carouselSize = parseInt(jQuery(".carousel-box .image-list").css('width'))+6;
	if(carouselElements <= 7)return;
	var carouselCurrentTemp = Math.ceil(carouselElements/(7));
	
	if(direction == "right"){
		if(carouselCurrent+1 >= carouselCurrentTemp){
			carouselCurrent=0;
			jQuery(".carousel-box .image-list ul").css("left","0px");
		}else{
			carouselCurrent++;
			jQuery(".carousel-box .image-list ul").css("left",carouselCurrent*carouselSize*(-1)+'px');
		}
	}else
	if(direction == "left"){
		if(carouselCurrent <= 0){
			carouselCurrent=carouselCurrentTemp-1;
			jQuery(".carousel-box .image-list ul").css("left",carouselCurrent*carouselSize*(-1)+"px");
		}else{
			carouselCurrent--;
			jQuery(".carousel-box .image-list ul").css("left",carouselCurrent*carouselSize*(-1)+'px');
		}
	}
}


jQuery(document).scroll(function() {
	var position = jQuery(window).scrollTop();
	if(position <= 500) {
		jQuery("a.back-to-top").fadeOut('fast');
	}else{
		jQuery("a.back-to-top").fadeIn('fast');
	}
});

function lightboxclose(){
	jQuery(".lightbox .lightcontent").fadeOut('fast');
	jQuery(".lightbox").fadeOut('slow');
	jQuery("body").css('overflow', 'auto');
}

jQuery(document).ready(function() {
	var carouselElements = jQuery(".carousel-box .image-list ul > li").size();
	jQuery(".carousel-box .image-list ul").css("width", (carouselElements*129)+"px");
	
	jQuery(".navi").after("<a href='#' class='show-menu-button icon-text'>&#9776;</a><div class='phone-menu-line'></div>");
	
	jQuery(".show-menu-button").click(function(){
		jQuery("body").toggleClass("showmenu");
	});
	
	jQuery(".youtube-video").click(function(){
		var videoid = jQuery(this).attr('rel');
		jQuery('<iframe>', {
			src: 'http://www.youtube.com/embed/'+videoid+'?rel=0&autoplay=1&theme=light',
			id:  'youtube_video_'+videoid,
			width: 650,
			height: 366,
			frameborder: 0,
			scrolling: 'no',
			allowfullscreen: 'yes'
		}).insertBefore(this);
		jQuery(this).hide();
	});	
	
	jQuery(".youtube-video-news").click(function(){
		var videoid = jQuery(this).attr('rel');
		jQuery('<iframe>', {
			src: 'http://www.youtube.com/embed/'+videoid+'?rel=0&autoplay=1&theme=light',
			id:  'youtube_video_'+videoid,
			width: 650,
			height: 500,
			frameborder: 0,
			scrolling: 'no',
			allowfullscreen: 'yes'
		}).insertBefore(this);
		jQuery(this).hide();
	});
		
	jQuery(".youtube-video-single").click(function(){
		var videoid = jQuery(this).attr('rel');
		jQuery('<iframe>', {
			src: 'http://www.youtube.com/embed/'+videoid+'?rel=0&autoplay=1&theme=light',
			id:  'youtube_video_'+videoid,
			width: 970,
			height: 640,
			frameborder: 0,
			scrolling: 'no',
			allowfullscreen: 'yes'
		}).insertBefore(this);
		jQuery(this).hide();
	});
	

	
	jQuery("#icon-brush").click(function(){
		if(jQuery(this).parent().attr('class') == "active"){
			jQuery(this).parent().attr("class","");
			jQuery(".farbtastic").hide();
		}else{
			jQuery(this).parent().attr("class","active");
		}
	});

	jQuery("a.back-to-top").css("display","none");

	jQuery("a[href='#top']").click(function() {
		jQuery("html, body").animate({ scrollTop: 0 }, "slow");
		return false;
	});
	
	jQuery(".width-changer").click(function(){
		if(jQuery(".boxed").hasClass("enableboxed")){
			jQuery(".change-width-stretched").css("display", "block");
			jQuery(".change-width-boxed").css("display", "none");
			jQuery("#bgcolor").css("display", "none");
			jQuery("body").css("background", "#fff");
		}else{
			jQuery(".change-width-stretched").css("display", "none");
			jQuery(".change-width-boxed").css("display", "block");
			jQuery("#bgcolor").css("display", "block");
		}
		jQuery(".boxed").toggleClass("enableboxed");
	});
	
	jQuery(".lightbox").click(function () {
		jQuery("body").css('overflow', 'auto');
		jQuery(".lightbox .lightcontent").fadeOut('fast');
		jQuery(".lightbox").fadeOut('slow');
    }).children().click(function(e) {
		return false;
	});

});

function getImgSize(imgSrc) {
    var newImg = new Image();

    newImg.onload = function() {
    var height = newImg.height;
    var width = newImg.width;
		alert ('The image size is '+width+'*'+height);
    }

    newImg.src = imgSrc; // this must be done AFTER setting onload
}



// IE7 & IE8 Fix

jQuery(document).ready(function() {
	jQuery(":last-child").addClass('last-child');
	jQuery(":first-child").addClass('first-child');
});





/* -------------------------------------------------------------------------*
 * 						GET BASE URL		
 * -------------------------------------------------------------------------*/
			
function getBaseURL() {
    var url = location.href;  // entire url including querystring - also: window.location.href;
    var baseURL = url.substring(0, url.indexOf('/', 14));


    if (baseURL.indexOf('http://localhost') != -1) {
        // Base Url for localhost
        var url = location.href;  // window.location.href;
        var pathname = location.pathname;  // window.location.pathname;
        var index1 = url.indexOf(pathname);
        var index2 = url.indexOf("/", index1 + 1);
        var baseLocalUrl = url.substr(0, index2);

        return baseLocalUrl + "/";
    }
    else {
        // Root Url for domain name
        return baseURL;
    }

}				
/* -------------------------------------------------------------------------*
 * 						CONTACT FORM EMAIL VALIDATION	
 * -------------------------------------------------------------------------*/
			
	function Validate() {

		var errors = "";
		var reason_name = "";
		var reason_mail = "";
		var reason_message = "";

		reason_name += validateName(document.getElementById('writecomment').u_name);
		reason_mail += validateEmail(document.getElementById('writecomment').email);
		reason_message += validateMessage(document.getElementById('writecomment').message);


		if (reason_name != "") {
			jQuery("#contact-name-error").text(reason_name).fadeIn(1000);
			jQuery(".comment-form-author input").addClass("error");
			jQuery("#contact-name-error").css({ 'display': 'block'});
			errors = "Error";
		} else {
			jQuery(".comment-form-author input").removeClass("error");
			jQuery("#contact-name-error").css({ 'display': 'none'});
		}


		if (reason_mail != "") {
			jQuery("#contact-mail-error").text(reason_mail).fadeIn(1000);
			jQuery(".comment-form-email input").addClass("error");
			jQuery("#contact-mail-error").css({ 'display': 'block'});
			errors = "Error";
		} else {
			jQuery(".comment-form-email input").removeClass("error");
			jQuery("#contact-mail-error").css({ 'display': 'none'});
		}
		
		if (reason_message != "") {
			jQuery("#contact-message-error").text(reason_message).fadeIn(1000);
			jQuery(".comment-form-text textarea").addClass("error");
			jQuery("#contact-message-error").css({ 'display': 'block'});
			errors = "Error";
		} else {
			jQuery(".comment-form-text textarea").removeClass("error");
			jQuery("#contact-message-error").css({ 'display': 'none'});
		}
		
		if (errors != ""){
			return false;
		} else {
			return true;
		}
		
		//document.getElementById("writecomment").submit(); return false;
	}
	
/* -------------------------------------------------------------------------*
 * 								AWEBER WIDGET VALIDATION	
 * -------------------------------------------------------------------------*/
			
	function Validate_aweber() {
		var errors = "";
		var reason_name = "";
		var reason_mail = "";


		reason_name += validateName(document.getElementById('aweber-form').u_name);
		reason_mail += validateEmail(document.getElementById('aweber-form').email);


		if (reason_name != "") {
			jQuery("#aweber-fail").css({ 'display': 'block'});
			errors = "Error";
		} else {
			jQuery("#aweber-fail").css({ 'display': 'none'});
		}

		if (reason_mail != "") {
			jQuery("#aweber-fail").css({ 'display': 'block'});
			errors = "Error";
		} else {
			jQuery("#aweber-fail").css({ 'display': 'none'});
		}
		
		
		if (errors != ""){
			return false;
		} else {
			return true;
		}
		
		//document.getElementById("aweber-form").submit(); return false;
	}
	

	function implode( glue, pieces ) {  
		return ( ( pieces instanceof Array ) ? pieces.join ( glue ) : pieces );  
	} 	

	
/* -------------------------------------------------------------------------*
 * 						SUBMIT CONTACT FORM	
 * -------------------------------------------------------------------------*/
 	jQuery(document).ready(function(jQuery){
		var adminUrl = ot.adminUrl;
		jQuery('#contact-submit').click(function() {
			if (Validate()==true) {
			var str = jQuery("#writecomment").serialize();
				jQuery.ajax({
					url:adminUrl,
					type:"POST",
					data:"action=footer_contact_form&"+str,
					success:function(results) {	
						jQuery(".contact-success-block").css({ 'display': 'block'});
						jQuery("#writecomment").css({ 'display': 'none'});
					
					}
				});
			}
		});
	});	
/* -------------------------------------------------------------------------*
 * 						SUBMIT AWEBER WIDGET FORM	
 * -------------------------------------------------------------------------*/
 	jQuery(document).ready(function(jQuery){
		var adminUrl = ot.adminUrl;
		jQuery('#aweber-submit').click(function() {
			if (Validate_aweber()==true) {
			var str = jQuery("#aweber-form").serialize();
			jQuery("#aweber-loading").css({ 'display': 'block'});
				jQuery.ajax({
					url:adminUrl,
					type:"POST",
					data:"action=aweber_form&"+str,
					success:function(results) {	
						if(results){
							jQuery("#aweber-loading").css({ 'display': 'none'});
							jQuery("#aweber-fail").css({ 'display': 'block'});
							jQuery("#aweber-fail span.ot-text").html(results);
						} else {
							jQuery("#aweber-form").css({ 'display': 'none'});
							jQuery("#aweber-success").css({ 'display': 'block'});
							jQuery("#aweber-loading").css({ 'display': 'none'});
						}
					}
				});
			}
		});
	});	


/* -------------------------------------------------------------------------*
 * 						ADD CLASS TO COMMENT BUTTON					
 * -------------------------------------------------------------------------*/
jQuery(document).ready(function(){
	jQuery('#writecomment .form-submit input').addClass('button-blue');
	jQuery('.comment-reply-link').addClass('text-button');
	
});



/* -------------------------------------------------------------------------*
 * 								GALLERY	CATEGORY		
 * -------------------------------------------------------------------------*/
	jQuery(function() {
		// cache container
		var jQuerycontainer = jQuery('#gallery-full');
		var galleryCat = ot.galleryCat;

		jQuerycontainer.isotope({
			resizable: false,
			masonry: { columnWidth: jQuerycontainer.width() / 12 }
		});
	
		jQuery(window).smartresize(function(){
			jQuerycontainer.isotope({
				masonry: { columnWidth: jQuerycontainer.width() / 12 }
			});
		});
		
		if(galleryCat) {
			// initialize isotope
			jQuerycontainer.isotope({ 
				filter: "."+galleryCat 
			});

			var jQueryoptionSet = jQuery('#gallery-categories a');
				jQueryoptionSet.each(function(index) {
					jQuery(this).removeClass('active');
					if(jQuery(this).attr("data-option")=="."+galleryCat) {
						jQuery(this).addClass('active');
					}
				});				
		}

		jQuery('.portfolio-large-block img, .portfolio-small-block img, .opened-portfolio img').load(function(){

			jQuery('#gallery-full').isotope( 'reloadItems' ).isotope({ sortBy: 'original-order' });

		});
		
		// filter items when filter link is clicked
		jQuery('#gallery-categories a').click(function(){
			var jQuerythis = jQuery(this);
	
			var jQueryoptionSet = jQuerythis.parents('#gallery-categories');
				jQueryoptionSet.find('.active').removeClass('active');
				jQuerythis.addClass('active');
	  
		
		var selector = jQuerythis.attr('data-option');
		jQuerycontainer.isotope({ 
			filter: selector
		});
		  return false;
		});
		

 /* 					infinitescroll					*/	

 
		jQuerycontainer.infinitescroll({
			navSelector  : '.gallery-navi',    // selector for the paged navigation 
			nextSelector : '.gallery-navi a.next',  // selector for the NEXT link (to page 2)
			itemSelector : '#gallery-full .gallery-small-block,#gallery-full .portfolio-large-block,#gallery-full .portfolio-small-block,#gallery-full .opened-portfolio',     // selector for all items you'll retrieve
			animate      : true,
			loading: {
				finishedMsg: 'No more pages to load.',
				img: ot.imageUrl+'loading.gif'
			}
		},
			function(newElements) {
				jQuery(newElements).imagesLoaded(function(){
					
					//portfolio image load
					jQuery( ".gallery-image",newElements ).each(function() {
							jQuery(".gallery-image").fadeIn('slow');
							jQuery(".waiter-portfolio").removeClass("loading").addClass("loaded");
					
					});
					jQuerycontainer.isotope('insert', jQuery(newElements));	
				});  
				resizeTitleBg();
				
			}
		);
		
	});
	
	
	
function removeHash () { 
    var scrollV, scrollH, loc = window.location;
    if ("pushState" in history)
        history.pushState("", document.title, loc.pathname + loc.search);
    else {
        // Prevent scrolling by storing the page's current scroll offset
        scrollV = document.body.scrollTop;
        scrollH = document.body.scrollLeft;

        loc.hash = "";

        // Restore the scroll offset, should be flicker free
        document.body.scrollTop = scrollV;
        document.body.scrollLeft = scrollH;
    }
}

/* -------------------------------------------------------------------------*
 * 								LIGHTBOX SLIDER
 * -------------------------------------------------------------------------*/
	function OT_lightbox_slider(el,side) {

		if(el.attr('rel')%8==0 && side == "right") {
			carousel('right');
		}	
		
		if(el.attr('rel')%7==0 && side == "left") {
			carousel('left');
		}
	
	}
 
/* -------------------------------------------------------------------------*
 * 								SOCIAL POPOUP WINDOW
 * -------------------------------------------------------------------------*/
	jQuery('.ot-share, .ot-tweet, .ot-pin, .ot-pluss').click(function(event) {
		var width  = 575,
			height = 400,
			left   = (jQuery(window).width()  - width)  / 2,
			top    = (jQuery(window).height() - height) / 2,
			url    = this.href,
			opts   = 'status=1' +
					 ',width='  + width  +
					 ',height=' + height +
					 ',top='    + top    +
					 ',left='   + left;

		window.open(url, 'twitter', opts);

		return false;
	});

/* -------------------------------------------------------------------------*
 * 								TWITTER BUTTON
 * -------------------------------------------------------------------------*/
	var API_URL = "http://cdn.api.twitter.com/1/urls/count.json",
		TWEET_URL = "https://twitter.com/intent/tweet";
    
	jQuery(".ot-tweet").each(function() {
		var elem = jQuery(this),
		// Use current page URL as default link
		url = encodeURIComponent(elem.attr("data-url") || document.location.href),
		// Use page title as default tweet message
		text = elem.attr("data-text") || document.title,
		via = elem.attr("data-via") || "",
		related = encodeURIComponent(elem.attr("data-related")) || "",
		hashtags = encodeURIComponent(elem.attr("data-hashtags")) || "";
		
		// Set href to tweet page
		elem.attr({
			href: TWEET_URL + "?hashtags=" + hashtags + "&original_referer=" +
					encodeURIComponent(document.location.href) + "&related=" + related +
					"&source=tweetbutton&text=" + text + "&url=" + url + "&via=" + via,
			target: "_blank"
		});

		// Get count and set it as the inner HTML of .count
		jQuery.getJSON(API_URL + "?callback=?&url=" + url, function(data) {
			elem.next("span").find(".count").html(data.count);
		});
	});
	
/* -------------------------------------------------------------------------*
 * 								PINIT BUTTON
 * -------------------------------------------------------------------------*/
	var API_URL = "http://api.pinterest.com/v1/urls/count.json";
	
	jQuery(".ot-pin").each(function() {
		var elem = jQuery(this),
		// Use current page URL as default link
		url = (elem.attr("data-url") || document.location.href);

		// Get count and set it as the inner HTML of .count
		jQuery.getJSON(API_URL + "?callback=?&url=" + url, function(data) {
			elem.next("span").find(".count").html(data.count);
		});
	});		
/* -------------------------------------------------------------------------*
 * 								FACEBOOK SHARE
 * -------------------------------------------------------------------------*/
function fbShare() {
	jQuery(".ot-share").each(function() {
		var button = jQuery(this);
		var link = jQuery(this).parent().parent().parent().find('a.ot-url').attr('href');
		if(!link) {
			link = document.URL;
		}
		//alert(link);
		jQuery.ajax({
			url:ot.adminUrl,
			type:"POST",
			data:"action=OT_customFShare&link="+link,
			success:function(results) {	
				button.parent().find('span.count').html(results);
			}
			
		});
	});	

}

addLoadEvent(fbShare);
/* -------------------------------------------------------------------------*
 * 								CUSTOM MENU
 * -------------------------------------------------------------------------*/
	jQuery(".navi .sub-menu").append('<li class="arrow first-child">&nbsp;</li>');

 
 
/* -------------------------------------------------------------------------*
 * 								GALLERY	LIGHTBOX
 * -------------------------------------------------------------------------*/
 
jQuery(".light-show").live("click", function(){
	var galID = jQuery(this).parent().attr('rel');
	var next = parseInt(jQuery(this).children("img").attr('rel'));
	
	if(!next) {
		next=1;
	}
	
	ot_lightbox_gallery(galID,next);
	return false;
});
 
function ot_lightbox_gallery(galID,next) {
	
	jQuery("h2.light-title").html("Loading..");
	jQuery(".lightbox").css('display', 'block');
	jQuery(".lightcontent-loading").fadeIn('slow');
	jQuery(".lightcontent").css('display', 'none');

	jQuery('.lightcontent').load(ot.themeUrl+'/includes/_lightbox-gallery.php', function() {
		window.location.hash = galID;
		

		var prev = next-1;
		
		
		ID = galID.replace(/[^0-9]/g, '');
		jQuery(".ot-slide-item").attr('id',ID);
		jQuery.ajax({
			url:ot.adminUrl,
			type:"POST",
			data:"action=OT_lightbox_gallery&gallery_id="+ID+"&next_image="+next,
			dataType: 'json',
			success:function(results) {
			
				jQuery(".gallery-image").attr("src", results['next']);
				jQuery(".gallery-image").load(function(){
					jQuery(".lightcontent-loading").css('display', 'none');
					jQuery("body").css('overflow', 'hidden');
					jQuery(".lightbox .lightcontent").delay(200).fadeIn('slow');
					jQuery("h2.light-title").html(results['title']);
					jQuery("#ot-lightbox-content").html(results['content']);
					jQuery(".gallery-image").attr('alt', results['title']);
				});
				
				jQuery.each(results.thumbs, function(k,v) {
					var li = '<li rel="'+(k+1)+'"><a href="javascript:;" rel="'+(k+1)+'" class="gal-thumbs image-border image-hover"><span class="image-overlay"><span class="icon-text icon-alone">&#128269;</span></span><img src="'+v+'" alt=""/></a></li>';	
					jQuery('#ot-lightbox-thumbs').append(li);
					
				});
				
				jQuery(".ot-last-image").attr('rel', results['total']);
				jQuery(".gallery-image").attr('rel', next);
				if(results['total']>=2) {
					jQuery(".next-image").attr('rel', next+1);
					jQuery(".gallery-full-photo .next").attr('rel', next+1);
				} else {
					jQuery(".next-image").attr('rel', next);
					jQuery(".gallery-full-photo .next").attr('rel', next);
				}
				jQuery(".gallery-full-photo .prev").attr('rel', prev);
				
				OT_gallery_click(ot.adminUrl, ID);
			

			}
		});
		
	});
	
}  


	var type = window.location.hash.replace(/[^a-z]/g, '');
	if(type=="gallery") {
		ot_lightbox_gallery(window.location.hash,1);
	}

/* -------------------------------------------------------------------------*
 * 								RESPONSIVE DESIGN
 * -------------------------------------------------------------------------*/
 
 	var iPhoneVertical = Array(null,320,ot.cssUrl+"responsive/phonevertical.css?"+Date());
	var iPhoneHorizontal = Array(321,767,ot.cssUrl+"responsive/phonehorizontal.css?"+Date());
	var iPad = Array(768,1000,ot.cssUrl+"responsive/ipad.css?"+Date());
	var dekstop = Array(1001,null,ot.cssUrl+"responsive/desktop.css?"+Date());
	
/* -------------------------------------------------------------------------*
 * 								addLoadEvent
 * -------------------------------------------------------------------------*/
	function addLoadEvent(func) {
		var oldonload = window.onload;
		if (typeof window.onload != 'function') {
			window.onload = func;
		} else {
			window.onload = function() {
				if (oldonload) {
					oldonload();
				}
			func();
			}
		}
	}
