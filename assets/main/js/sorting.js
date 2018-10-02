$(window).load(function(){
	 var $container = $('.portfolio-list');
	// init
	$container.isotope({
		itemSelector : '.item'
	  });
  
	$('#filters').on( 'click', 'a', function() {
	  var filterValue = $(this).attr('data-filter');
	  $container.isotope({ filter: filterValue });
	});
	
	
	
});

jQuery(window).load(function(){		
	"use strict";	
	jQuery('.portfolio-list').isotope('reLayout');
	setTimeout("jQuery('.portfolio-list').isotope('reLayout')", 500);		
});
jQuery(window).resize(function(){
	"use strict";
	jQuery('.portfolio-list').isotope('reLayout');	
});
jQuery.fn.portfolio_addon = function(addon_options) {
	"use strict";
	//Set Variables
	var addon_el = jQuery(this),
		addon_base = this,
		img_count = addon_options.items.length,
		img_per_load = addon_options.load_count,
		$newEls = '',
		loaded_object = '',
		$container = jQuery('.portfolio-list');

	
	jQuery('.add-item').click(function(){
		$newEls = '';
		loaded_object = '';									   
		var loaded_images = $container.find('.added').size();
		if ((img_count - loaded_images) > img_per_load) {
			var now_load = img_per_load;
		} else {
			var now_load = img_count - loaded_images;
		}
		
		if ((loaded_images + now_load) == img_count) jQuery('.add-item').fadeOut('0', function() {
			$container.isotope('reLayout');
		});

		if (loaded_images < 1) {
			var i_start = 1;
			$container.isotope('reLayout');
		} else {
			var i_start = loaded_images+1;
			$container.isotope('reLayout');
		}

		if (now_load > 0) {
			// load more elements
			for (var i = i_start-1; i < i_start+now_load-1; i++) {
				loaded_object = loaded_object + '<div class="col-md-4 added item '+ addon_options.items[i].sortcategory +'"><a href="'+ addon_options.items[i].zoomurl +'" class="prettyPhoto" data-rel="prettyPhoto[portfolio55]"><span class="cover"></span><img src="'+ addon_options.items[i].src +'" alt="" /></a></div>';
			}			
				
				$newEls = jQuery(loaded_object);
				$container.isotope('insert', $newEls, function() {

				
				
				$("a[rel^='prettyPhoto'], .prettyPhoto").prettyPhoto();		
				$('a[data-rel]').each(function() {
					$(this).attr('rel', $(this).data('rel'));
				});		


					$('.portfolio-list').isotope('reLayout');	

			});			
		}
	});
}