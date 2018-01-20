	
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

// 列表下拉效果
$("#nav .li01").hover(function() {
	// var index = $(this).index();
	// alert(index);
	$(this).children("ul").stop().slideDown(300);
	$(this).children('a.a1').addClass("cur");
},function() {
	// var index = $(this).index();
	$(this).children("ul").stop().slideUp(300);
	$(this).children('a.a1').removeClass("cur");
});
//图片切换效果
$('.flexslider').flexslider({
	directionNav: true,
	pauseOnAction: false
});
// 文字上下滚动
// $(document).ready(function(){
// 	$('.list_lh li:even').addClass('lieven');
// })
// $(function(){
	$("div.list_lh").myScroll({
		speed:40, //数值越大，速度越慢
		rowHeight:31 //li的高度
	});
// });
// 鼠标经过切换效果
$(".fixed2 .fl .tab .hd a").mouseenter(
    function(){
        $(this).addClass("cur").siblings().removeClass("cur").parent(".hd").siblings(".bd").children(".bd-list").eq($(this).index()).fadeIn(0).siblings().fadeOut(0);
    }
);
$(".fr-tab-hd a").mouseenter(
    function(){
        $(this).addClass("cur").siblings().removeClass("cur").parent(".fr-tab-hd").siblings(".fr-tab-bd").children("ul").eq($(this).index()).fadeIn(0).siblings().fadeOut(0);
    }
);
