$(document).ready(function() {
	// public 选框选中
	$('.content  .boxs  input').click(function() {
		if(this.checked == true) {
			// console.log(1);
			$('.content  .boxs p a').disabled = false;
			$('.content  .boxs p a').css({'backgroundColor':'#1da8eb'});
			$('.content  .boxs button').disabled = false;
			$('.content  .boxs button').css({'backgroundColor':'#1da8eb'});
		}else {
			$('.content  .boxs p a').disabled = true;
			$('.content  .boxs p a').css({'backgroundColor':'#ccc'});
			$('.content  .boxs button').disabled = true;
			$('.content  .boxs button').css({'backgroundColor':'#ccc'});
		}
	});
	$('.content .title span').click(function() {
		$(this).addClass('current').siblings('span').removeClass('current');
		var index = $(this).index();
		$(".content  .boxs .box").eq(index).show().siblings('.box').hide();
		$('.content  .boxs button').disabled = true;
		$('.content  .boxs button').css({'backgroundColor':'#ccc'});
	});
	//课程分享按钮
	$('.hearder-top span.share').click(function(event) {
		// event.stopPropagation();

		if ( event && event.stopPropagation ) {
		　　// 因此它支持W3C的stopPropagation()方法
		　　
			event.stopPropagation();
			
		}else {

		　　//否则，我们需要使用IE的方式来取消事件冒泡
		　　
		window.event.cancelBubble = true;
		}

		$('#gb_resLay').slideDown();
		// console.log(1);
	});
	$(document).click(function(event) {
		// var targetId = event.target ? event.target.id : event.srcElement.id;
		// if( event.target != 'gb_resLay') {
		// 	console.log(1);
		// 	$('#gb_resLay').slideUp();
			
		// }
		var _con = $('#gb_resLay');   // 设置目标区域
		  if(!_con.is(event.target) && _con.has(event.target).length === 0){ // Mark 1
			//$('#divTop').slideUp('slow');   //滑动消失
			$('#gb_resLay').slideUp();          //淡出消失
		  }
	});
	//积分上下间歇性滚动
	$("#scrollDiv").Scroll({line:1,speed:500,timer:3000});
	
});