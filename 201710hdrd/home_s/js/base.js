	
function showLocale(objD){
	var str;
	var yy = objD.getYear();
	if(yy<1900) yy=yy+1900;
	var MM=objD.getMonth()+1;
	if(MM<10) MM='0'+MM;
	var dd=objD.getDate();
	if(dd<10) dd='0'+dd;
	var hh=objD.getHours();
	if(hh<10) hh='0'+hh;
	var mm=objD.getMinutes();
	if(mm<10) mm='0'+mm;
	var ss = objD.getSeconds();
	if(ss<10) ss='0'+ ss;
	var ww = objD.getDay();
	if  (ww==0)  ww="星期日";
	if  (ww==1)  ww="星期一";
	if  (ww==2)  ww="星期二";
	if  (ww==3)  ww="星期三";
	if  (ww==4)  ww="星期四";
	if  (ww==5)  ww="星期五";
	if  (ww==6)  ww="星期六";
	str=yy+"-"+MM+"-"+ dd +"&nbsp;&nbsp;"+ hh + ":" + mm + ":" + ss +"&nbsp;&nbsp;"+ww;
	return(str);
}

function tick(){
	var today;
	today=new Date();
	document.getElementById("time").innerHTML=showLocale(today);
	window.setTimeout("tick()", 1000);
}
// tick();
$('.flexslider').flexslider({
	directionNav: true,
	pauseOnAction: false
});
// var spans = $("#news span");
// var inns = $("#news .inn");
// for(var i = 0; i < spans.length; i++){
// // 	spans[i].onclick = function() {
// // 		// for(var j = 0; j < spans.length; j++){
// // 		// 	spans[j].className = "";
// // 		// }
// // 		// this.className = "hover";
// // 		this.fadeIn().stop().sibling('span').fadeOut();
// // 	};

//  }
$("#news span").click(function(){
	$(this).addClass('hover').siblings('span').removeClass('hover');
	var index = $(this).index();
	$("#news .inn").eq(index).show().siblings('.inn').hide();
	// $("#news .inn").eq(index).fadeIn().siblings('.inn').fadeOut();

});
$("#jobs #tit li").mouseover(function(){
	$(this).addClass('hover').siblings('li').removeClass('hover');
	var index = $(this).index();
	$("#jobs .boxs").eq(index).show().siblings('.boxs').hide();
	// $("#news .inn").eq(index).fadeIn().siblings('.inn').fadeOut();
});
$("#marquee1").kxbdMarquee({
	direction:"left"
});

$(".LinksTop ul li").mouseenter(
	function(){
		$(this).addClass("hover").siblings().removeClass("hover");
		$(this).parent().parent().siblings(".LinksBot").show().children().eq($(this).index()).fadeIn(0).siblings().fadeOut(0);

	}
);
$(".top_about dl").mouseleave(
	function(){
		$(this).removeClass("cur").children("dd").stop().hide();
	}
);
	
