var fixed_menu = true;
window.jQuery = window.$ = jQuery;

//<![CDATA[
	jQuery(window).load(function(){
		"use strict";
		$("#status").fadeOut(); // will first fade out the loading animation
		$("#preloader").delay(350).fadeOut("slow"); // will fade out the white DIV that covers the website.
	})
//]]>

/* Custom Scripts */
function calculateScroll() {
	"use strict";
	var contentTop      =   [];
	var contentBottom   =   [];
	var winTop      =   $(window).scrollTop();
	var rangeTop    =   200;
	var rangeBottom =   500;
	$('.navmenu li.scrollable').find('a').each(function(){
		contentTop.push( $( $(this).attr('href') ).offset().top );
		contentBottom.push( $( $(this).attr('href') ).offset().top + $( $(this).attr('href') ).height() );
	})
	$.each( contentTop, function(i){
		if ( winTop > contentTop[i] - rangeTop && winTop < contentBottom[i] - rangeBottom ){
			$('.navmenu li.scrollable')
			.removeClass('active')
			.eq(i).addClass('active');
			
			$('#top .navmenu li').first().addClass('active');

			jQuery('.mobile_menu_wrapper').css({'display' : 'none'});			
		}
	})
};

function menu_update() {
	"use strict";
	if (jQuery(window).width() > 767) {
		jQuery('nav.navmenu li a').css({'line-height': jQuery('#logo').height() + 'px'});		
	} else {
		jQuery('nav.navmenu li a').css({'line-height': 'auto'});		
	}
}

function fullwidthslider() {
	"use strict";
	var full_slider_w = jQuery(window).width();
	if (jQuery(window).width() > 767) {
		var full_slider_h = jQuery(window).height();
	} 
	else {
		var full_slider_h = jQuery(window).width()*0.7;
	}
		
	jQuery('.full_slider .flexslider, .full_slider .flexslider li').css({'width': full_slider_w, 'height': full_slider_h});	
	jQuery('.full_slider, .full_slider .flexslider li img.slide_bg').attr('style', 'height: '+full_slider_h+'px');		
	jQuery('.full_slider').css({'min-height': full_slider_h + 'px'});
};

jQuery(document).ready(function() {
	"use strict";
	
	fullwidthslider();
	
	calculateScroll();
	
	//Fixed Menu
	if (jQuery('.fixed-menu').size() && fixed_menu == true) {		
		jQuery('.fixed-menu').append('<div class="fixed-menu-wrapper">'+jQuery('#top header').html()+'</div>');
		$('.fixed-menu .navmenu li').first().removeClass('active');
		jQuery('.fixed-menu').find('.menu').children('li').each(function(){
			jQuery(this).children('a').append('<div class="menu_fadder"/>');
		});
		var fixd_menu = setInterval(scrolled_menu, 10);
	}
	
	//MobileMenu
	jQuery('#top header').append('<a href="javascript:void(0)" class="menu_toggler"/>');
	jQuery('#top').append('<div class="mobile_menu_wrapper"><ul class="mobile_menu container"/></div>');	
	jQuery('.mobile_menu').html(jQuery('#top header').find('.navmenu').html());
	jQuery('.mobile_menu_wrapper').hide();
	jQuery('.menu_toggler').click(function(){
		jQuery('.mobile_menu_wrapper').slideToggle(300);
	});
		
	
	$(window).scroll(function(event) {
		calculateScroll();
	});
	
	$('.navmenu ul li.scrollable a, .mobile_menu ul li.scrollable a, .next_section, #logo a, .go_section, .logo-bottom a').click(function() {  
		$('html, body').animate({scrollTop: $(this.hash).offset().top - jQuery('#logo').height() - 38}, 1000);
		return false;
	});

		
	// prettyPhoto
	$("a[rel^='prettyPhoto'], .prettyPhoto").prettyPhoto();	
	
	$('a[data-rel]').each(function() {
		$(this).attr('rel', $(this).data('rel'));
	});
	
	//Iframe transparent
	$("iframe").each(function(){
		var ifr_source = $(this).attr('src');
		var wmode = "wmode=transparent";
		if(ifr_source.indexOf('?') != -1) {
		var getQString = ifr_source.split('?');
		var oldString = getQString[1];
		var newString = getQString[0];
		$(this).attr('src',newString+'?'+wmode+'&'+oldString);
		}
		else $(this).attr('src',ifr_source+'?'+wmode);
	});
	
	jQuery('.full_slider .flexslider li img.slide_bg').each(function(){
		jQuery(this).parent().attr('style', 'background-image:url('+$(this).attr('src')+');');		
	});
			
	jQuery('.full_slider .flexslider').flexslider({
        slideshow: true,
		slideshowSpeed: 3000,
		animation: "fade",
		controlNav: true,
		pauseOnHover: false,
		directionNav: false

    });
	
	
	// contact form
	jQuery("#ajax-contact-form").submit(function() {
		var str = $(this).serialize();		
		$.ajax({
			type: "POST",
			url: "contact_form/contact_process.php",
			data: str,
			success: function(msg) {
				// Message Sent - Show the 'Thank You' message and hide the form
				if(msg == 'OK') {
					var result = '<div class="notification_ok">Your message has been sent. Thank you!</div>';
					jQuery("#fields").hide();
				} else {
					var result = msg;
				}
				jQuery('#note').html(result);
			}
		});
		return false;
	});
	
	
	menu_update();	
			
});

jQuery(window).load(function(){
	"use strict";
		
	fullwidthslider();
	
	menu_update();
	
	jQuery('.full_slider').removeClass('preloader');
	jQuery('.next_section').removeClass('hide');
});


jQuery(window).resize(function(){	
	"use strict";
	
	fullwidthslider();
	
	menu_update();
			
});

function scrolled_menu() {
	
	if (jQuery(window).scrollTop() > (jQuery(window).height() - jQuery('#logo').height() - 39)) {
		jQuery('.fixed-menu').addClass('fixed_show');
	} else {
		jQuery('.fixed-menu').removeClass('fixed_show');
	}
};



jQuery(document).ready(function () {
	"use strict";
	$('ul.portfolio-menu').on('click', 'li:not(.active)', function() {  
		$(this).addClass('active').siblings().removeClass('active')
	});
	
	$('ul.news-tab').on('click', 'li:not(.active)', function() {  
		$(this).addClass('active').siblings().removeClass('active')  
	  .parents('div.news-tab-wrap').find('div.box').eq($(this).index()).fadeIn(1500).siblings('div.box').hide();
	  });
	
	 // Video Box Size
	 function video_preview_size() {
		 "use strict";
		 jQuery('.video-block').each(function(){
		 	var video_w = $(this).find('.video_bg').width();
		 	var video_h = $(this).find('.video_bg').height();
		 	
		 	jQuery('.video-block .video_preview a').css({'width': video_w + 'px', 'height': video_h + 'px'});	
		 	jQuery(".video-block iframe").width(video_w);
	        jQuery(".video-block iframe").height(video_h);			
		 });	
	 }
	 jQuery(window).resize(function(){	
		 	video_preview_size();		
		 });
	 jQuery(window).load(function(){
		
		//See video
	 	jQuery('.btn-load-video').click(function() {
	 		jQuery('.video_preview').replaceWith(video_url);
	 		jQuery('.video_bg').hide();	
	 		jQuery(this).hide();
	 		video_preview_size();	
	 	});
	 	
	 	video_preview_size();

	 });
	 
});
