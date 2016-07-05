$(document).ready(function(){

	$.getScript("../assets/js/core.js",function(){
		init.newProduct();
		init.topProduct();
	});


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
				$("#logo").css({"transform":"translateY(0)"});
				$("#login-form").css({'transform': 'translateY(20%)'});
			}else{
				navbar.css({
					'position'  : 'absolute',
					'top'		: '85%',
					'height'	: '15vh',
					'display'	: 'block'
				});
				$("#logo").css({"transform":"translateY(10%)"});
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
		},

		checkHash : function(){
			var hash = window.location.hash;
			var product = parseInt(hash.slice(1, hash.length));
			console.log("detect "+product);
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

	var slide = 1 ;
	setInterval(function(){
		if (slide==1) {
			$('.bxslider').bxSlider({
				mode: 'fade',
		  		captions: true,
		  		adaptiveHeightSpeed : 1000
			});
		}
		slide++;
	},1000);

	$(window).bind("hashchange",function(){
		go.checkHash();
	});

	$(".product").on('click',function(){
		var a = $(this).data("action");
		console.log("clicked"+a);
	});

	go.checkHash();

});
