(function($) {
/*

-----> rocketSlider ------->

by: James Black;

usage: The element must be a <ul> element. each banner must be contained inside an <li> HTML markup example - 

<ul class="banner_rotator">
	<li><img src="image1.jpg"/></li>
	<li><img src="image2.jpg"/></li>
	<li><img src="image3.jpg"/></li>
	<li><img src="image4.jpg"/></li>
	
</ul>


the plugin should look like this:

$('.banner_rotator').rocketslider({options},callback);

options are 

		transitionSpeed: milliseconds  - how fast should the banners rotate
		bannerFadeInSpeed: milliseconds - speed of the next banner fading in
		bannerFadeOutSpeed: milliseconds - speed of the current banner fading out 

callback runs each time a banner rotation occurs. 

*/ 
	$.fn.rocketslider = function(options, callback) {
		
		$.fn.rocketslider.defaults = {
		
			transitionSpeed: 3000,
			bannerFadeInSpeed: 500,
			bannerFadeOutSpeed: 500
		
		
		};
		
		if($.isFunction(options))
			{
				callback = options;
				options = null;
			}

		
		return this.each(function(){
			
			var element = $(this);
			
			
						
			
			options = $.extend($.fn.rocketslider.defaults, options);
			
			element.children('li').hide().css({
												position : 'absolute',
												listStyleType: 'none'
												});
			element.children('li').first().addClass('active').fadeIn(options.bannerFadeInSpeed);			
			
			setInterval(function()
			{
				var current_banner = element.find('.active');
				var next_banner = element.find('.active').next();
				var img_count = element.children('li').length;
			
				if(current_banner.index()+1 != img_count)
				{

					current_banner.fadeOut(options.bannerFadeOutSpeed,function(){
						current_banner.removeClass('active');
						next_banner.addClass('active');
					});

					next_banner.fadeIn(options.bannerFadeInSpeed);
				}
				else
				{
					current_banner.fadeOut(options.bannerFadeOutSpeed);
					
					next_banner = element.children('li').first();
					next_banner.fadeIn(options.bannerFadeInSpeed);
					
					element.children('li').first().addClass('active');
					element.children('li').last().removeClass('active');
				}
				
				// run callback
				$.isFunction(callback) && callback();
				
				
			},options.transitionSpeed);

			
			
			
		
		});
	
	}

})(jQuery);