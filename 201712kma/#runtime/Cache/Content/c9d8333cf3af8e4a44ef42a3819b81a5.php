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
  <div class="h_a">模型属性</div>
  <form action="<?php echo U("Models/edit");?>" method="post" class="J_ajaxForm" >
    <div class="table_full">
      <table width="100%"  class="table_form">
        <tr>
          <th width="120">模型名称：</th>
          <td class="y-bg"><input type="text" class="input" name="name" id="name" size="30" value="<?php echo ($data["name"]); ?>" /></td>
        </tr>
        <tr>
          <th>模型表键名：</th>
          <td class="y-bg"><input type="text" class="input" name="tablename" id="tablename" size="30" value="<?php echo ($data["tablename"]); ?>" /></td>
        </tr>
        <tr>
          <th>描述：</th>
          <td class="y-bg"><input type="text" class="input" name="description" id="description" value="<?php echo ($data["description"]); ?>"  size="30"/></td>
        </tr>
      </table>
    </div>
    <div class="">
      <div class="btn_wrap_pd">
         <input type="hidden" value="<?php echo ($data["modelid"]); ?>" name="modelid" />
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">修改</button>
      </div>
    </div>
  </form>
</div>
<script src="<?php echo ($config_siteurl); ?>statics/js/common.js?v"></script>
</body>
</html>