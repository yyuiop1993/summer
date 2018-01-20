<template file="Wap/header.php"/>

<div class="page_content">
	<div class="page_title">
		<!-- <img src="{$config_siteurl}statics/wap/images/page_title.png"> -->
		<h3>{$catname}</h3>
	</div>

	<div class="form">
        <div class="block clearfix">
            <input type="text" id="name" name="name" class="required" placeholder="姓名">
        </div>
        <div class="block clearfix">
            <input type="text" id="phone" name="phone" class="required" placeholder="手机号码">
        </div>
        <div class="block dropdown clearfix">
            <input type="text" id="type" name="type" class="type-btn required" placeholder="项目" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" readonly="" value="">
            <ul class="selectUl" aria-labelledby="dLabel">
                <li>会员课程</li>
                <li>拳馆加盟</li>
                <li>企业合作</li>
            </ul>
        </div>
        <div class="block clearfix">
            <input type="text" id="code" name="code" class="required" placeholder="验证码">
            <img src="/index.php?g=Api&m=Checkcode&type=gbook&code_len=4&font_size=20&width=100&height=30&font_color=&background=&refresh=1" onclick="refreshs()" style="cursor: pointer;" id="code_img" width="110" height="30" >
        </div>

        <div class="block clearfix">
            <textarea name="content" id="content" class="required" placeholder="留言" ></textarea>
        </div>
        <div class="block clearfix">
            <button class="ContactSubmit">提交</button>
        </div>
	</div>
	
	<div class="page_title">
		<!-- <img src="{$config_siteurl}statics/wap/images/page_title.png"> -->
		<h3>所在位置</h3>
	</div>
	<div id="allmap" class="clearfix"></div>

</div>



<div class="footer" style="margin-bottom: 70px;">
	{:cache('Config.footerinfo')}
</div>

<template file="Wap/footer.php"/>

<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=rPat5G5ttvaqWRZpASdwm1AHr0LV3tEp"></script>
<script type="text/javascript" src="{$config_siteurl}statics/default/js/dropdown.js"></script>
<script type="text/javascript">


function refreshs(){
    document.getElementById('code_img').src='<?php echo U('Api/Checkcode/index','type=gbook&code_len=4&font_size=20&width=100&height=30&font_color=&background=&refresh=1');?>&time='+Math.random();void(0);
}

$(function(){
    $(".selectUl li").click(function(){
        $("#type").val($(this).text());
        $('<span class="formtips onSuccess">'+okMsg+'</span>');

        $('#type').parent().find(".formtips").remove();
        $('#type').css("border-color", "#eaeaea")
        var okMsg = '';
        $('#type').parent().append('<span class="formtips onSuccess">'+okMsg+'</span>');

    });

     $('.form .required').blur(function(){
        var $parent = $(this).parent();
        $parent.find(".formtips").remove();
        var _value = $(this).val();
        value = $.trim(_value);
        
        if( $(this).is('#name') ){
            if( value=="" ){
                $(this).css("border-color", "#b4130d")
                var errorMsg = '姓名不能为空';
                $parent.append('<span class="formtips onError">'+errorMsg+'</span>');
            }else{
                $(this).css("border-color", "#eaeaea")
                var okMsg = '';
                $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
            }
        }        
        //phone
        if( $(this).is('#phone') ){
            if( value=="" ){
                $(this).css("border-color", "#b4130d")
                var errorMsg = '手机号码不能为空';
                $parent.append('<span class="formtips onError">'+errorMsg+'</span>');
            }else if( value!="" && !/^1[34578]\d{9}$/.test(value) ){
                $(this).css("border-color", "#b4130d")
                var errorMsg = '手机号码格式不正确';
                $parent.append('<span class="formtips onError">'+errorMsg+'</span>');
            }else{
                $(this).css("border-color", "#eaeaea")
                var okMsg = '';
                $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
            }
        }
        if( $(this).is('#type') ){
            if( value=="" ){
                $(this).css("border-color", "#b4130d")
                var errorMsg = '请选择项目';
                $parent.append('<span class="formtips onError">'+errorMsg+'</span>');
            }else{
                $(this).css("border-color", "#eaeaea")
                var okMsg = '';
                $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
            }
        }
        if( $(this).is('#code') ){
            if( value=="" ){
                $(this).css("border-color", "#b4130d")
                var errorMsg = '验证码不能为空';
                $parent.append('<span class="formtips onError">'+errorMsg+'</span>');
            }else{
                $(this).css("border-color", "#eaeaea")
                var okMsg = '';
                $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
            }
        }
        //content
        if( $(this).is('#content') ){
            if( value=="" ){
                $(this).css("border-color", "#b4130d")
                var errorMsg = '留言不能为空';
                $parent.append('<span class="formtips onError">'+errorMsg+'</span>');
            }else{
                $(this).css("border-color", "#eaeaea")
                var okMsg = '';
                $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
            }
        }

    }).focus(function(){
         $(this).css("border-color", "#b4130d")
    });
    /*点击提交*/
    $('.ContactSubmit').click(function(){
        
        var obj = $('.form');
        $('.form .required').trigger('blur');
        var numError = $('.form  .onError').length;
        
        if(numError){
            return false;
        }else{
            /**/

            var name = $("#name").val();
            var phone = $("#phone").val();
            var code = $("#code").val();
            var type = $("#type").val();
            var content = $("#content").val();

            var load_index =  layer.open({type: 2});
            $.ajax({
                type : "post",
                url : "{:U('Content/Gbook/postcontact')}",
                data : {
                    'name' : name,
                    'phone' : phone,
                    'content' :content,
                    'code' :code,
                    'type' :type
                },
                async : true,
                success : function(data) {    
                    layer.close(load_index);
                    if (data == "-1") {
                        layer.alert("验证码错误");
                        layer.open({content: '验证码错误',btn: '好'});
                    }else if (data == "-3") {
                        layer.alert("错误提交。");
                        layer.open({content: '错误提交。',btn: '好'});
                    }else if(data == 1){
                        //window.open("{:U('Content/Gbook/student_jump')}&id="+data); 
                        layer.open({content: '提交成功。请耐心等待我们的泰拳顾问与您联系。',btn: '好',yes:function(index){
                        	layer.close(index);
                            window.location.reload();
                        }});
                        
                    }
                }
            });
        }
        return false;
    });
});
</script>
<script type="text/javascript">
    
    // 百度地图API功能
    var map = new BMap.Map("allmap");
    var point = new BMap.Point(118.3599,35.110788);
    var navigationControl = new BMap.NavigationControl({
        // 靠左上角位置
        anchor: BMAP_ANCHOR_TOP_RIGHT,
        // LARGE类型
        type: BMAP_NAVIGATION_CONTROL_LARGE,
        // 启用显示定位
        enableGeolocation: true
    });
    map.addControl(navigationControl);
    map.centerAndZoom(point,12);
    // 创建地址解析器实例
    var myGeo = new BMap.Geocoder();
    // 将地址解析结果显示在地图上,并调整地图视野
    if (point) {
        map.centerAndZoom(point, 16);
        map.addOverlay(new BMap.Marker(point));
        // map.enableScrollWheelZoom(true);
    }else{
        alert("您选择地址没有解析到结果!");
    }


</script>