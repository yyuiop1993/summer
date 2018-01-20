<?php if (!defined('THINK_PATH')) exit(); if (!defined('SHUIPF_VERSION')) exit(); ?>
<!doctype html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="edge" />
<meta charset="utf-8" />
<title>系统后台_<?php echo ($Config["sitename"]); ?></title>
<meta name="generator" content="ThinkPHP Shuipf" />
<link rel="stylesheet" href="/statics/css/pintuer.css">
<link rel="stylesheet" href="/statics/css/admin.css">
<script src="/statics/js/jquery.js"></script>
<script src="/statics/js/pintuer.js"></script>
<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "<?php echo ($config_siteurl); ?>",
	JS_ROOT: "<?php echo ($config_siteurl); ?>statics/js/"
};
</script>
<script src="<?php echo ($config_siteurl); ?>statics/js/wind.js"></script>
<script src="<?php echo ($config_siteurl); ?>statics/js/jquery.js"></script>



<script type="text/javascript">
if (window.parent !== window.self) {
	document.write = '';
	window.parent.location.href = window.self.location.href;
	setTimeout(function () {
		document.body.innerHTML = '';
	}, 0);
}
</script>
</head>
<body>





<div class="bg"></div>
<div class="container">
    <div class="line bouncein">
        <div class="xs6 xm4 xs3-move xm4-move">
            <div style="height:150px;"></div>
            <div class="media media-y margin-big-bottom">           
            </div>         
            <form action="<?php echo U('Public/tologin');?>" method="post">
            <div class="panel loginbox">
                <div class="text-center margin-big padding-big-top"><h1>后台管理中心</h1></div>
                <div class="panel-body" style="padding:30px; padding-bottom:10px; padding-top:10px;">
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="text" class="input input-big" name="username" placeholder="登录账号" data-validate="required:请填写账号" />
                            <span class="icon icon-user margin-small"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="password" class="input input-big" name="password" placeholder="登录密码" data-validate="required:请填写密码" />
                            <span class="icon icon-key margin-small"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field">
                            <input type="text" class="input input-big" name="code" placeholder="填写右侧的验证码" data-validate="required:请填写右侧的验证码" />
                           <img src="<?php echo U('Api/Checkcode/index','code_len=4&font_size=20&width=80&height=32&font_color=&background=');?>" alt="" width="80" height="32" class="passcode" id="code_img" style="height:43px;cursor:pointer;" onClick="refreshs()" />  
                                                   
                        </div>
                    </div>
                </div>
                <div style="padding:30px;"><input type="submit" class="button button-block bg-main text-big input-big" value="登录"></div>
            </div>
            </form>          
        </div>
    </div>
    <div class="bq">技术支持：<strong>智峰软件</strong> Copyright © 2017 <a href="http://www.zhifengchina.cn" target="_blank">www.zhifengchina.cn</a> All Rights Reserved. 服务电话：0539-8023377 QQ：<a href="http://wpa.qq.com/msgrd?v=3&uin=976545747&site=qq&menu=yes" target="_blank">976545747</a></div>
</div>


<script src="<?php echo ($config_siteurl); ?>statics/js/common.js"></script>
<script>
//刷新广告
function refreshs(){
	document.getElementById('code_img').src='<?php echo U('Api/Checkcode/index','code_len=4&font_size=20&width=130&height=50&font_color=&background=&refresh=1');?>&time='+Math.random();void(0);
}
$(function(){
	$('#verifycode').focus(function(){
		$('a.change_img').trigger("click");
	});
});
</script>
</body>
</html>