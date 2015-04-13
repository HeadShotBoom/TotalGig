$(function($){

	$(".sign-in-trigger").click(function(){
		$(".modal").hide();
		$(".fill-background").show(300);
		$("#sign-in-modal").show(200);
	});

	$(".sign-up-trigger").click(function(){
		$(".fill-background").show(300);
		$("#sign-up-modal").show(200);
	});

	$(".fill-background").click(function(){
		$(".modal").hide();
		$(".fill-background").hide();
	});
});