<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"D:\www\201708taierzhuang/application/wx\view\index\index.html";i:1503909517;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $headArr['title']; ?></title>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	

	<link rel="stylesheet" href="__CSS__/style.css">
	<script type="text/javascript" src="__JS__/jquery.js"></script>
	<script type="text/javascript" src="__JS__/layer_mobile/layer.js"></script>

</head>
<body>
	<div class="top">
		<img src="__IMG__/top.png" alt="">
	</div>

	<form action="#" id="form">
		<p>为方便广大群众购票，请准确提供以下信息</p>
		<div class="form">
			姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名<input type="text" class="name" name="name" placeholder="请输入身份证件姓名">
		</div>
		<div class="form">
			联系电话<input type="text" class="mobile" name="mobile" placeholder="请输入联系电话">
		</div>
		<div class="form">
			身份证号<input type="text" class="card" name="card" placeholder="请输入身份证号">
		</div>
		<div class="form">
			购票数量<input type="number" class="number" name="number" placeholder="请输入购票数量(最大不能超过2)">
		</div>
		<div class="form">
			工作单位<input type="text" class="work_unit" name="work_unit" placeholder="请输入工作单位">
		</div>
		<button type="button" class="submit_">确认提交</button>
	</form>

</body>
</html>


<script type="text/javascript">	
$(function(){

    

	$(".submit_").click(function(){
		var _this = $(this);

		/*验证姓名*/
	    var name = $(".name").val();
	    if(name.length==0){
	    layer.open({ content:'请填写姓名！',btn: '好'});
	      	return false; 
	    }
	    /*验证手机号*/
	    var mobile = $(".mobile").val();
	    if(mobile.length!=0 && mobile.length!=11 ){
	     	layer.open({ content:'请输入有效的手机号码！',btn: '好'});
	     	return false; 
	    }
	    var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
        if(!myreg.test(mobile)) { 
            layer.open({ content:'请输入有效的手机号码！',btn: '好'});
            return false; 
        } 
        /*验证身份证*/
        var card = $(".card").val();
       	if(!IdentityCodeValid(card)){
       		layer.open({ content:'请输入正确的身份证号！',btn: '好'});
             return false; 
       	}
       	/*验证购票数量*/
       	var number = $(".number").val();
       	if (!isNaN(number) && (number-0) ==0) {
		 　layer.open({ content:'请输入购票数量!',btn: '好'});
            return false; 
		} 
		if ((number-0)>2) {
		 　layer.open({ content:'购票数量最大不能超过2!',btn: '好'});
            return false; 
		}
       	/*验证工作单位*/
		var work_unit = $(".work_unit").val();
       	if (work_unit.length==0) {
		 　layer.open({ content:'请输入工作单位!',btn: '好'});
            return false; 
		} 　
	
	    
	    $.post("<?php echo url('index/submit'); ?>",$("#form").serialize(), function(data){

	    	if(data.status == 10001){
	        	layer.open({ content: data.msg,btn: '好'});
	        	return false;
	        }else if(data.status == 10002){
	        	layer.open({ content: data.msg,btn: '好'});
	        	return false;
	        }else if(data.status == 10003){
                layer.open({ content: data.msg,btn: '好'});
                return false;
            }else if(data.status == 10004){
                layer.open({ content: data.msg,btn: '好'});
                return false;
            }else if(data.status == 10005){
                layer.open({ content: data.msg,btn: '好'});
                return false;
            }else if(data.status == 10006){
                layer.open({ content: data.msg,btn: '好'});
                return false;
            }else if(data.status == 1){
                
                layer.open({ content: data.msg,btn: '好',yes:function(){
                    window.location.reload();
                }});

            }

	    });

	});

});




 function IdentityCodeValid(code) { 
    var city={11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古",21:"辽宁",22:"吉林",23:"黑龙江 ",31:"上海",32:"江苏",33:"浙江",34:"安徽",35:"福建",36:"江西",37:"山东",41:"河南",42:"湖北 ",43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆",51:"四川",52:"贵州",53:"云南",54:"西藏 ",61:"陕西",62:"甘肃",63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外 "};
    var tip = "";
    var pass= true;
    
    if(!code || !/^\d{6}(18|19|20)?\d{2}(0[1-9]|1[12])(0[1-9]|[12]\d|3[01])\d{3}(\d|X)$/i.test(code)){
        tip = "身份证号格式错误";
        pass = false;
    }else if(!city[code.substr(0,2)]){
        tip = "地址编码错误";
        pass = false;
    }else{
        //18位身份证需要验证最后一位校验位
        if(code.length == 18){
            code = code.split('');
            //∑(ai×Wi)(mod 11)
            //加权因子
            var factor = [ 7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2 ];
            //校验位
            var parity = [ 1, 0, 'X', 9, 8, 7, 6, 5, 4, 3, 2 ];
            var sum = 0;
            var ai = 0;
            var wi = 0;
            for (var i = 0; i < 17; i++)
            {
                ai = code[i];
                wi = factor[i];
                sum += ai * wi;
            }
            var last = parity[sum % 11];
            if(parity[sum % 11] != code[17]){
                tip = "校验位错误";
                pass =false;
            }
        }
    }	

    //if(!pass) alert(tip);
    	return pass;
}
</script>


<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
wx.config({
    debug: false,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: ['hideOptionMenu','onMenuShareTimeline','onMenuShareAppMessage']
});
    wx.ready(function () {
        //wx.hideOptionMenu();
        
        wx.onMenuShareTimeline({
            title: '又发福利！浪漫七夕，工会请你看电影！', // 分享标题
            link: 'http://dybm.lyzfrj.com/index.php/wx/index/jump', // 分享链接
            imgUrl: 'http://dybm.lyzfrj.com/public/test.jpg', // 分享图标
            success: function () { 
                // 用户确认分享后执行的回调函数
            },
            cancel: function () { 
                // 用户取消分享后执行的回调函数
            }
        });
        
        wx.onMenuShareAppMessage({
            title: '又发福利！浪漫七夕，工会请你看电影！', // 分享标题
            desc: '又发福利！浪漫七夕，工会请你看电影！', // 分享描述
            link: 'http://dybm.lyzfrj.com/index.php/wx/index/jump', // 分享链接
            imgUrl: 'http://dybm.lyzfrj.com/public/test.jpg', // 分享图标
            //type: 'link', // 分享类型,music、video或link，不填默认为link
            //dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
            success: function () { 
                // 用户确认分享后执行的回调函数
            },
            cancel: function () { 
                // 用户取消分享后执行的回调函数
            }
        });
        
    });
</script>


