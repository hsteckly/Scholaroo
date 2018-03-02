(function($) {
/* 

-----> rocketloader ------->

by: James Black;

usage: $(element).rocketloader({options},callback);

this will find all images container inside given element and preload the images. by default it will then fade them in. 

options:

transition [ true || false ] - whether to fade in the images or just show them as they load 
transition speed ['slow' || 'fast' || milliseconds] - speed of transition
hideImagesBeforePreload [ true || false ] - hide all image elements before preloading them.

defaults:

		transition: true,
		transitionSpeed: 'slow',
		hideImagesBeforePreload: true,
		transitionAllAtOnce: true





*/


	

	$.fn.rocketloader = function(options, callback) {
	
		$.fn.rocketloader.defaults = {
		transition: true,
		transitionSpeed: 'slow',
		hideImagesBeforePreload: true,
		transitionAllAtOnce: true
		};


	
	
		if($.isFunction(options))
		{
			callback = options;
			options = null;
		}
		
		options = $.extend($.fn.rocketloader.defaults, options);
		
		return this.each(function(){
		
			var image_loaded_count = 0;
			var number_of_images = $(this).find('img').length;
			var element = $(this);
			 $(this).find('img').each(function(){
			 	
			 	var img = new Image();
				var id = $(this);
				var path = $(this).attr('src');		
				var class_name = $(this).attr('class');
				var id_name = $(this).attr('id');
				$(img).load(function () {
		
					$(this).hide();
					id.replaceWith(this);
					if(options.transitionAllAtOnce)
					{
						image_loaded_count ++;
						if(image_loaded_count == number_of_images)
						{
						
							if(options.transition)
							{
							
								element.find('img').fadeIn(options.transitionSpeed);
								$.isFunction(callback) && callback();
							}
							else
							{
								element.find('img').show();
								$.isFunction(callback) && callback();

							}
						}
						
					}
					else
					{
						$(this).fadeIn('slow',function(){
			
					
						});
					}
      	
				}).error(function () {}).attr({
												src: path,
												id: id_name,
												class:class_name
										});


			 
			 });
		});
	
	}

})(jQuery);