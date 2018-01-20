$(document).ready(function(){
	// header banner 
  $('.flexslider').flexslider({
      directionNav: true,
      pauseOnAction: false,
      controlNav: "thumbnails"
      
  });
  // fixed1 文字上下滚动
  $("#scrollDiv").Scroll({line:1,speed:500,timer:3000,up:"but_up",down:"but_down"});
  // fixed2 banner 
  $('.flexslider1').flexslider({
      directionNav: true,
      pauseOnAction: false,
      pauseOnHover:true
      
  });
  //fixed7 风采
  $("#pic_list_1").cxScroll({direction:"right",speed:500,time:3000,plus:true,minus:true});
	//fixed8 相关链接
  $("#marquee1").kxbdMarquee({direction:"left",isEqual:false,loop:0,scrollAmount:1,scrollDelay:20});
});