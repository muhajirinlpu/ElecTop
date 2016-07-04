$(document).ready(function(){

	var init = {
		newProduct : function(){
			$.getJSON("./prcs/homepage.php?do=getNewProduct",function(result){
				if (result['response']==1) {
					$.each(result['message'],function(a,b){
						$("<li style='z-index=10000;transform: translate(-10%,-10%)'></li>").html('<img src="../uploads/'+b.picture+'" title="| <a href=#'+b.id_barang+'>'+b.merk +' '+b.type+'</a>"/>').appendTo(".bxslider");
					});
				}else {
					console.log("Something error on response : "+result['message']);
				}
			});	
		}
	}

	init.newProduct();

});
