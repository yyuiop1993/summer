<template file="Content/header.php"/>

	<div class="main clearfix">
		<div class="content clearfix" >
			<div class="contact_item contact_left">
                <h3>给我们留言</h3>
                <p>如果您希望进一步了解KMA泰拳，欢迎联系我们。我们的健身顾问会在第一时间和您取得联系。
                <br>
                <br>
                <br>热爱拳击的你，我们将为你提供适合您的能力测试，职业规划，实用而顶级的教练团队的课程打造；为您提供一线的赛事平台，让您在自己的人生战役中，赢得更多的比赛，战胜昨天的自我，I Fighting 就是现在！</p>
            </div>
            <div class="contact_item contact_center">
                <h3>联系我们</h3>
                <ul>
                    <li>
                        <img src="{$config_siteurl}statics/default/images/contact_icon1.png">
                        &nbsp;&nbsp;www.kmataiquan.com
                    </li>
                    <li>
                        <img src="{$config_siteurl}statics/default/images/contact_icon2.png">
                        &nbsp;&nbsp;186-5391-0515
                    </li>
                    <li>
                        <img src="{$config_siteurl}statics/default/images/contact_icon3.png">
                        &nbsp;&nbsp;临沂市上海路与孝河路交汇处IEC国际企业中心
                    </li>
                </ul>
            </div>
            <div class="contact_item contact_right">
                 <h3>留言板</h3>
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
            </div>
		</div>

        <div id="allmap" class="clearfix"></div>
	</div>


<template file="Content/footer.php"/>

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

     $('.contact_right .required').blur(function(){
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
        $('.contact_right .required').trigger('blur');
        var numError = $('.contact_right .form .onError').length;
        
        if(numError){
            return false;
        }else{
            /**/

            var name = $("#name").val();
            var phone = $("#phone").val();
            var code = $("#code").val();
            var type = $("#type").val();
            var content = $("#content").val();

            var load_index = layer.load(2, {shade: false});
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
                    }else if (data == "-3") {
                        layer.alert("错误提交。");
                    }else if(data == 1){
                        //window.open("{:U('Content/Gbook/student_jump')}&id="+data); 
                        layer.alert("提交成功。请耐心等待我们的泰拳顾问与您联系。",function(index){
                            layer.close(index);
                            window.location.reload();
                        });
                        
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
