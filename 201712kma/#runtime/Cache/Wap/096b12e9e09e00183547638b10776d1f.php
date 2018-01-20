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
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <?php  $getMenu = isset($Custom)?$Custom:D('Admin/Menu')->getMenu(); if($getMenu) { ?>
<div class="nav">
  <?php
 if(!empty($menuReturn)){ echo '<div class="return"><a href="'.$menuReturn['url'].'">'.$menuReturn['name'].'</a></div>'; } ?>
  <ul class="cc">
    <?php
 foreach($getMenu as $r){ $app = $r['app']; $controller = $r['controller']; $action = $r['action']; ?>
    <li <?php echo $action==ACTION_NAME ?'class="current"':""; ?>><a href="<?php echo U("".$app."/".$controller."/".$action."",$r['parameter']);?>" <?php echo $r['target']?'target="'.$r['target'].'"':"" ?>><?php echo $r['name'];?></a></li>
    <?php
 } ?>
  </ul>
</div>
<?php } ?>
  <div class="h_a">温馨提示</div>
  <div class="prompt_text">
    <p>1、3G版本想不同栏目用不同的模板 请在下面进行修改</p>
    <p>2、请在修改栏目全部完成后，<a href="<?php echo U("public_cache");?>">清除缓存</a>，否则可能出现未知错误！</p>
    <p>3、模板请放在 shuipf\Template\模板主题\Wap 下</p>
    <p><a href="<?php echo U("Index/index");?>" target="_blank">访问手机版</a></p>
  </div>
  <form name="myform" action="<?php echo U("index");?>" method="post" class="J_ajaxForm">
  <div class="table_list">
    <table width="100%">
        <colgroup>
        <col width="38">
        <col width="55">
        <col>
        <col width="80">
        <col width="100">
         
        <col width="300">
        </colgroup>
        <thead>
          <tr>
            <td align='center'>排序</td>
            <td align='center'>栏目ID</td>
            <td>栏目名称</td>
            <td align='center'>栏目类型</td>
            <td>所属模型</td>
            <td align='center'>访问</td>
            <td align='center'>管理操作</td>
          </tr>
        </thead>
        <?php echo ($categorys); ?>
      </table>
    <div class="btn_wrap">
      <div class="btn_wrap_pd">
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">排序</button>
      </div>
    </div>
  </div>
  </div>
</form>
</div>
<script src="<?php echo ($config_siteurl); ?>statics/js/common.js"></script>
</body>
</html>