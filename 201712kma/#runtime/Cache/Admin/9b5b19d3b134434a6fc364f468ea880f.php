<?php if (!defined('THINK_PATH')) exit(); if (!defined('SHUIPF_VERSION')) exit(); ?>
<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>系统后台 - <?php echo ($Config["sitename"]); ?> - by LvyeCMS</title>
<?php if (!defined('SHUIPF_VERSION')) exit(); ?><link href="<?php echo ($config_siteurl); ?>statics/css/admin_style.css" rel="stylesheet" />
<link href="<?php echo ($config_siteurl); ?>statics/js/artDialog/skins/default.css" rel="stylesheet" />
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
</head>
<body>
<div class="wrap">
  <div id="home_toptip"></div>
  <h2 class="h_a">系统信息</h2>
  <div class="home_info">
    <ul>
      <?php if(is_array($server_info)): $i = 0; $__LIST__ = $server_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li> <em><?php echo ($key); ?></em> <span><?php echo ($vo); ?></span> </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>


  <h2 class="h_a">授权信息</h2>
  <div class="home_info">
    <ul>
      
        <li> <em>客服电话：</em> <span>0539-8023377</span> </li>
        <li> <em>联系QQ：</em> <span><a href="http://wpa.qq.com/msgrd?v=3&uin=976545747&site=qq&menu=yes" target="_blank">976545747</a></span> </li>
        <li> <em>官方网站：</em> <span><a href="http://www.zhifengchina.cn" target="_blank">www.zhifengchina.cn</a></span> </li>
      
    </ul>
  </div>


  </form>
</div>
<script src="<?php echo ($config_siteurl); ?>statics/js/common.js"></script> 


</body>
</html>