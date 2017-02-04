$(document).ready(function(){
	$(".title.editInfoTitle").on("click", function(){
		var a = $(".editInfo").css("display");
		if(a != "block")
			return $(".editInfo").fadeIn(500);
		return $(".editInfo").fadeOut(300);
	});
	$(".showInfo").on("click", function(){
		var a = $(".profileInfo").css("display");
		if(a != "block")
			return $(".profileInfo").fadeIn(500);
		return $(".profileInfo").fadeOut(300);
	})
});