$(document).ready(function(){

	$.getJSON("./prcs/homepage.php?do=getNewProduct",function(result){
		$.each(result['message'],function(a,b){
			$("<li class='image'></li>").html('<img src="../assets/images/'+b.picture+'" style="width:400px;height:200px;"/><p class="flex-caption"><b>'+b.merk+'</b><br>'+b.type+'</p>').appendTo(".slides");
		});
	});

});