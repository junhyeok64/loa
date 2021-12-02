$(".hover_div").hover(function(e) {
	var div_left = 0;
	var div_top = 0;
	switch($(this).data("tooltip")) {
		case "#engrave":
			/*var div_left = -700;
			var div_top = -1500;*/
		break;
		case "#about":
			var mql = window.matchMedia("screen and (max-width: 900px)");
			if (mql.matches) {
			    var div_left = -500;
				var div_top = -300;
			} else {
			    var div_left = -500;
				var div_top = -550;
			}
		break;
	}
	$($(this).data("tooltip")).css({
		left : e.pageX + 1 + div_left,
		top : e.pageY + 1 + div_top
	}).stop().show(100);
}, function() {
	$($(this).data("tooltip")).hide();
});


function search_info(nickname) {
	$.ajax({
		type : "POST",
		url  : "/loa/state/",
		data : {"mode":"search_info", "nickname":nickname},
		success : function(e) {
			//$("#user_info").html(e);
			$("#about").show();
			$("#collect_section").show();
			//$("#social_section").show();
			$("#user_info_sub").html(e);
			//$("#user_info").click();
			var target = $("#user_info");
			$("html, body").animate({scrollTop:target.offset().top})
		}
	})
}