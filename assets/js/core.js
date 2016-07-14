var init = {

	newProduct : function(){
		$.getJSON("./prcs/homepage.php?do=getNewProduct",function(result){
			if (result['response']==1) {
				$.each(result['message'],function(a,b){
					$("<li style='transform: translate(-10%,-10%)'></li>").html('<img src="../uploads/'+b.picture+'" title="| <a href=#'+b.id_barang+'>'+b.merk +' '+b.type+'</a>"/>').appendTo(".bxslider");
				});
			}else {
				console.log("Something error on response : "+result['message']);
			}
		});
	},

	topProduct : function(){
		$.getJSON("./prcs/homepage.php?do=getTopProduct",function(result){
			if (result['response']==1) {
				$.each(result['message'],function(a,b){
					$("<li class='attr-content'></li>").html('<img src="../uploads/'+b.picture+'" ><span class="text"><h4>'+b.merk+' '+b.type+'</h4><p>'+b.spoiler.substr(0, 100) + "..."+'</p><a href="#'+b.id_barang+'">See detail >></a></span>').appendTo(".topProduct");
				});
			}else{
				console.log("Something error on response : "+result['message']);
			}
		});
	},

	lastViewProduct : function(){
		$.getJSON("./prcs/homepage.php?do=getLastviewProduct",function(result){
			if (result['response']==1) {
				$.each(result['message'],function(a,b){
					$("<li class='attr-content'></li>").html('<img src="../uploads/'+b.picture+'" ><span class="text"><h4>'+b.merk+' '+b.type+'</h4><p>'+b.spoiler.substr(0, 100) + "..."+'</p><a href="#'+b.id_barang+'">See detail >></a></span>').appendTo(".lastviewProduct");
				});
			}else{
				console.log("Something error on response : "+result['message']);
			}
		});
	},

	allProduct : function(p){
		$("#content-card").fadeOut("slow");
		$.ajax({
			method  : "GET",
			url     : "./prcs/homepage.php?do=getAllProduct",
			dataType: "json",
			data 	: { page : p}
		}).done(function(result){
			$("#content-card").empty();
			$.each(result['message']['data'],function(key,b){
				var a = $("<a href=#"+b.id_barang+" class='card-view-container'></a>");
				var div	= $('<div class="card-view inline" ></div>').html('<img src="../uploads/'+b.picture+'" width="210px" height="145px"><h2><strong>'+b.merk+" "+b.type+'</strong></h2><p>'+b.spoiler.substr(0, 100) + "..."+'</p>');
				$(div).appendTo(a);
				$(a).appendTo("#content-card");
			});
			var ul = $("<ul></ul>");
			$("<li class='page' data-action="+1+"><<</li>").appendTo(ul);
			for (var i = 1 ; i <= result['message']['totalPage'] ; i++) {
				var li = $("<li class='page' data-action="+i+">"+i+"</li>");
				if (i == result['message']['currentPage']) {$(li).addClass("active")}
				$(li).appendTo(ul);
			}
			$("<li class='page' data-action="+result['message']['totalPage']+">>></li>").appendTo(ul);
			$(ul).appendTo("#paging");
			$("#content-card").fadeIn("slow");
		});
	},


	search : function(key){

	},

	detailProduct : function(){

	}

}
