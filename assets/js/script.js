//This file is for frontend ( display script )

$(document).ready(function(){

	var navbar = $("#nav-container");
	var height = $(window).height();

	var go = {
		initNavbar : function(stmt){
			if (stmt == "float") {
				navbar.css({
					'position'  : 'fixed',
					'top'		: '0',
					'height'	: '8%'/*,
					'display'	: 'none'*/
				});
				/*navbar.fadeIn(500);*/
				$("#login-form").css({'transform': 'translateY(20%)'});
			}else{
				navbar.css({
					'position'  : 'absolute',
					'top'		: '85%',
					'height'	: '15vh',
					'display'	: 'block'
				});
				$("#login-form").css({'transform': 'translateY(70%)'});
			}
		},

		showSearch : function(stmt){
			if (stmt == "show") {
				$(".search-container").css({
					'right'		: '0',
					'transition': '0.5s'
				});
			}else{
				$(".search-container").css({
					'right'		: '-25%',
					'transition': '0.5s'
				});
			}
		}

	}

	$(window).scroll(function(e){
		var scroll = $(window).scrollTop();
		if ( scroll >= height) {
			go.initNavbar("float");
			go.showSearch("show");
		}else{
			go.initNavbar("real");
			go.showSearch("hide");
		}
	});

});
