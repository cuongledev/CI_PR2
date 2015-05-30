$(document).ready(function(){
    $("#top-bar ul:first").attr("id","menu-page-menu");
    $("#menu-page-menu li").hover(function(){//hover di chuot den
		$(this).find("ul:first").css('display','none').show(400);
	},function(){//hover di chuot ra
		$(this).find("ul:first").css('display','none')
	});
    $("<li><a href='"+baseUrl+"default/news/index'>Trang Chủ</a></li>").insertBefore("#menu-page-menu li:first");
    $("<li><a href='#'>Liên Hệ</a></li>").insertAfter("#menu-page-menu li:last");
    //$("#menu-page-menu li:first").insertBefore("<li><a href='#'>Trang Chu</a><li>");
    //$("<li><a href='#'>Trang Chu</a><li>").appendTo("#menu-page-menu");
});