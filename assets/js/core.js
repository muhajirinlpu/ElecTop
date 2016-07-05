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
					$("<li class='attr-content'></li>").html('<img src="../uploads/'+b.picture+'" ><span class="text"><h4>'+b.merk+' '+b.type+'</h4><p>'+b.spoiler+'</p><a href="#'+b.id_barang+'">See detail >></a></span>').appendTo(".topProduct");
				});
			}else{
				console.log("Something error on response : "+result['message']);
			}
		});
	},

	lastViewProduct : function(){

	},

	allProduct : function(){

	},

	detailProduct : function(){

	},

	search : function(key){

	}

}

