$(document).ready(function(){
	$(".tab_content:not(:first)").hide();
	$(".tabs li a").click(function(){
		$(".tabs li a").removeClass("active");
		$(this).addClass("active");
		$(".tab_content").hide();
		var activeTabs = $(this).attr("href");
		$(activeTabs).fadeIn();
		return false;
	});
});