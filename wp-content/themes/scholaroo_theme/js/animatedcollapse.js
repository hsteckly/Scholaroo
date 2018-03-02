jQuery(document).ready(function(){
	JQF.toggleMenu();
	jQuery(".mobileLink").addClass("ml_open");
});

var JQF = {};

JQF.toggleMenu = function() {
	
	var numItems = jQuery(".ml_1, .ml_2, .ml_3, .ml_4, .ml_5, .ml_6, .ml_7, .ml_8, .ml_9, .ml_10").length;
	for(var i=1; i <= numItems; i++){
		jQuery(".ml_" + i).css("display", "none");
	}
	
	
	jQuery(".mobileLink").click(function(){
		
		for(var i=1; i <= numItems; i++){
			jQuery(".ml_" + i).css("display", "none");
		}
	
		var currentID = jQuery(this).attr('id');
		
		if(jQuery("#" + currentID).hasClass("ml_open")){
			jQuery("." + currentID).slideDown('slow');
			jQuery(".mobileLink").removeClass("ml_open");
		}
		else {	
			jQuery(".mobileLink").addClass("ml_open");	
			jQuery("." + currentID).slideUp('slow');

		}
		
	});
	
	// Hide the mobile menu once a menu item has been clicked
	jQuery(".ml_1 li, .ml_1 li a").click(function(){
		jQuery(".mobileLink").removeClass("ml_open");
	
	});
	
}