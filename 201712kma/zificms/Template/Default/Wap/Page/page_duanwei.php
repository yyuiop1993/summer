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
            <input type="text" id="card" name="card" class="required" placeholder="身份证号">
        </div>

        <div class="block clearfix">
            <button class="ContactSubmit">查询</button>
        </div>
	</div>


</div>
<template file="Wap/footer.php"/>

<script type="text/javascript">


function refreshs(){
    document.getElementById('code_img').src='<?php echo U('Api/Checkcode/index','type=gbook&code_len=4&font_size=20&width=100&height=30&font_color=&background=&refresh=1');?>&time='+Math.random();void(0);
}

$(function(){


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
        if( $(this).is('#card') ){
            if( value=="" ){
                $(this).css("border-color", "#b4130d")
                var errorMsg = '身份证不能为空';
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
        var numError = $(' .form .onError').length;
        
        if(numError){
            return false;
        }else{
            /**/

            var name = $("#name").val();
            var card = $("#card").val();

            var load_index =  layer.open({type: 2});
            $.ajax({
                type : "post",
                url : "{:U('Content/Gbook/findstudent')}",
                data : {
                    'name' : name,
                    'card' : card
                },
                async : true,
                success : function(data) {    
                    layer.close(load_index);
                    if (data.status == "-2") {
		                layer.open({content: '没有此用户',btn: '好'});
		            }else if (data.status == "-3") {
		                layer.open({content: '错误提交！',btn: '好'});
		            } else if(data.status == 1){
		                layer.open({content: '姓名：'+data.uname+'<br>段位：'+data.duanwei,btn: '好',yes:function(index){
                        	layer.close(index);
                            //window.location.reload();
                        }});
		            }  

                }
            });
        }
        return false;
    });
});
</script>
