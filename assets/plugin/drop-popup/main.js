$(document).ready(function(){
	$(".fim-dropdown > a").click(function(){
        $('#navbarcontainer').css({'z-index': 100});
		$(".fim-dropdown").not($(this).parent()[0]).removeClass('active');

		$(this).parent().toggleClass('active');
		return false;
	});

	$(document).click(function(e){
        $('#navbarcontainer').css({'z-index': 98});
		that = e.target;
		if ($(that).closest(".fim-dropdown").length < 1 && !$(that).hasClass("fim-dropdown")) $(".fim-dropdown").removeClass('active');
	});


	$(window).on("load resize",function(){
		$(".fim-dropdown > .inner").each(function(){
			var src = $(this).parent().children("a");
			// Position of the popup
			var left = src.offset().left + src.outerHeight()/2 - $(this).outerWidth()/2;
			if (left + $(this).outerWidth() > $(window).width()) {
				left = $(window).width() - $(this).outerWidth();
			}
			if (left < 0) left = 0;

			$(this).css({
				left: left,
				top: top
			});
		});
	});
});
