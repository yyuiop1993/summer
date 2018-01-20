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
   <div class="table_list">
   <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td width="5%" align="center">序号</td>
            <td width="6%" align="center" >姓名</td>
            <td width="6%"  align="center" >手机号</td>
            <td width="6%"  align="center" >类型</td>
            <td width="20%" align="center">内容</td>
            <td width="6%"  align="center" >提交时间</td>
            <td width="5%" align="center">管理操作</td>
          </tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
            <td width="5%" align="center"><?php echo ($vo["id"]); ?></td>
            <td width="6%" align="center"><?php echo ($vo["name"]); ?></td>
            <td width="6%" align="center"><?php echo ($vo["phone"]); ?></td>
            <td width="6%" align="center" ><?php echo ($vo["type"]); ?></td>
            <td width="20%" align="center"><?php echo ($vo["content"]); ?></td>
            <td width="6%" align="center"><?php echo (date('Y-m-d H:i:s',$vo["add_time"])); ?></td>
            
            <td width="5%"  align="center">
                <!-- <a href="<?php echo U("Pingtai/huifu",array("id"=>$vo[id]));?>">回复</a> |  -->
                <a class="J_ajax_del" href="<?php echo U('Pingtai/del',array('id'=>$vo['id']));?>">删除</a>
            </td>
            
          </tr><?php endforeach; endif; ?>
        </tbody>
      </table>
      <div class="p10">
        <div class="pages"> <?php echo ($Page); ?> </div>
      </div>
   </div>
</div>
<script src="<?php echo ($config_siteurl); ?>statics/js/common.js"></script>
</body>
</html>