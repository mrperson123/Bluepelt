// Mobile menu
var hwindow = jQuery(window).height();

jQuery(function(){
	jQuery("#mobile-menu ul li").each(function(){
		if(jQuery(this).hasClass("menu-item-has-children")){
			jQuery("<span class='mobile-menu-subbutton' />").html('<i class="fa fa-caret-up" aria-hidden="true"></i>').appendTo(this);
		}
	})
});

jQuery(function(){
	jQuery("#mobile-menu-button").click(function(){
		jQuery("#mobile-menu-main").toggle();
		jQuery("#mobile-menu-main").height(hwindow);
		var menuheight 		= jQuery("#mobile-menu").height();
		var holderheight 	= jQuery("#mobile-menu-holder").height();
		if(menuheight > holderheight){
			jQuery("#mobile-menu-holder").css("overflow-y", "scroll");
		}
		jQuery("#mobile-menu-bg").fadeTo(500, 1);
		jQuery("#mobile-menu-holder").animate({
		  left: '0px'
		}, 500);
		jQuery("body").css("overflow-y", "scroll");
	})
});

jQuery(function(){
	jQuery("#mobile-menu-bg").click(function(){
		jQuery("#mobile-menu-bg").fadeTo(500, 0);
		jQuery("#mobile-menu-holder").animate({
		  left: '-250px'
		}, 500);
		setTimeout(function(){
			jQuery("#mobile-menu-main").toggle();
			jQuery("body").css("overflow-y", "visible");
		}, 600);
		  
	})
});

jQuery(function(){
	jQuery("#mobile-menu ul li span.sub-open").click(function(){
		if(jQuery(this).hasClass("opened")){
			jQuery(this).prev(".submenu").slideToggle();
			jQuery(this).html('<i class="fa fa-caret-up" aria-hidden="true"></i>');
			jQuery(this).removeClass("opened");
		}else{
			jQuery(this).prev(".submenu").slideToggle();
			jQuery(this).html('<i class="fa fa-caret-down" aria-hidden="true"></i>');
			jQuery(this).addClass("opened");
		}

	})
});