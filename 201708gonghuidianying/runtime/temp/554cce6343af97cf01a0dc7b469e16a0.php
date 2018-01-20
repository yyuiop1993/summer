<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\www\201708gonghuidianying/application/home\view\login\login.html";i:1493860080;}*/ ?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<head>
<!-- 引入icon -->
<link rel="icon" href="__IMG__/favicon.ico" />
<!-- 引入base.css -->
<link rel="stylesheet" href="__CSS__/base.css"/>
<!-- 引入layui -->
<script type="text/javascript" src="__JS__/layui/layui.js"></script>
<link rel="stylesheet" href="__JS__/layui/css/layui.css"/>
<link rel="stylesheet" href="__CSS__/layui_user.css"/>
<!-- layer单独使用 -->
<script type="text/javascript" src="__JS__/layer/layer.js"></script>
<link rel="stylesheet" href="__JS__/layer/skin/default/layer.css"/>

<!-- 引入基础js和jquery -->
<script type="text/javascript" src="__JS__/jquery-2.1.4.min.js"></script>

<title><?php echo $headArr['title']; ?></title>
<meta name="keywords" content="<?php echo $headArr['keyword']; ?>"/>
<meta name="description" content="<?php echo $headArr['description']; ?>"/>

<link rel="stylesheet" href="__CSS__/login.css"/>
<style type="text/css">



</style>
<!-- 每个页面独自的css -->
</head>

<body>
<div id="wrap">
	<div class="back"></div>
	<div class="login_box">
		<h3>用户登录<span> login</span></h3>
		<ul>
			<li class="input_text"><input type="text" name="username" class="username" placeholder="请输入用户名" autocomplete="off"></li>
			<li class="input_text"><input type="password" name="password" class="password" placeholder="请输入密码" autocomplete="off"></li>
			<li class="input_text input_code">
				<input type="text" name="code" class="code" placeholder="请输入验证码" autocomplete="off" >
				<span>
					<img src="<?php echo url('Common/verify'); ?>" onclick="this.src='/index.php/home/common/verify?'+Math.random()" class="verify" >
				</span>
			</li>
			<li class="input_sub"><a class="button_sub">立即登陆</a></li>
		</ul>
	</div>

</div>


</body>
</html>
<!-- 引入基础js和jquery -->
<script type="text/javascript" src="__JS__/baseHome.js"></script>
<script type="text/javascript">
/*赋予页面高度*/
$(function(){

document.onkeydown = function(e){ 
    var ev = document.all ? window.event : e;
    if(ev.keyCode==13) {
        $('.button_sub').click();     
    }
}

$(".button_sub").click(function(){

	// console.log(code);
    var username = $(".username").val();
    var password = $(".password").val();
    var code = $(".code").val();

    if(username==''){
        layer.alert("请填写账号",{icon: 2});
        return false;
    }
    if(password==''){
        layer.alert("请填写密码",{icon: 2});
        return false;
    }

	if(code==''){
        layer.alert("请填写验证码",{icon: 2});
        return false;
    }
    
    
    $.post("<?php echo url('Login/do_login'); ?>",{username:username,password:password,code:code},function(data){
        
        if(data.status ==1){
            layer.alert(data.msg,{icon: 2},function(index){
                $(".code").val("");
                $(".verify").click();
                layer.close(index);
            });
        }else if(data.status ==2){
            layer.alert(data.msg,{icon: 2},function(index){
                $(".username").val("");
                $(".password").val("");
                $(".code").val("");
                $(".verify").click();
                layer.close(index);
            });
        }else if(data.status ==3){
            layer.alert(data.msg,{icon: 2},function(index){
                $(".username").val("");
                $(".password").val("");
                $(".code").val("");
                $(".verify").click();
                layer.close(index);
            });
        }else if(data.status ==0){
            window.location.href=data.jump_url;
        }
    });
});

});
</script>