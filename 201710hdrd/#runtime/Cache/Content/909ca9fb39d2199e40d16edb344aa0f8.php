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
  <table width="100%" cellspacing="0" >
      <thead>
        <tr>
          <td width="30">ID</td>
          <td width="50">所属模块</td>
          <td width="60">名称</td>
          <td width="50">生成静态</td>
          <td>URL示例</td>
          <td>URL规则</td>
          <td width="80" align='center'>管理操作</td>
        </tr>
      </thead>
      <tbody>
        <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?><tr>
          <td><?php echo ($r["urlruleid"]); ?></td>
          <td><?php echo ($Module[$r['module']]['name']); ?></td>
          <td><?php echo ($r["file"]); ?></td>
          <td><?php if($r['ishtml']): ?><font color="red">√</font><?php else: ?><font color="blue">×</font><?php endif; ?></td>
          <td><?php echo ($r["example"]); ?></td>
          <td><?php echo ($r["urlrule"]); ?></td>
          <td align='center'>
          <?php
 $op = array(); if(\Libs\System\RBAC::authenticate('edit')){ $op[] = '<a href="'.U('Urlrule/edit',array('urlruleid'=>$r['urlruleid'])).'">编辑</a>'; } if(\Libs\System\RBAC::authenticate('delete')){ $op[] = '<a class="J_ajax_del" href="'.U('Urlrule/delete',array('urlruleid'=>$r['urlruleid'])).'">删除</a>'; } echo implode(" | ",$op); ?>
          </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      </tbody>
    </table>
  </div>
</div>
<script src="<?php echo ($config_siteurl); ?>statics/js/common.js"></script>
</body>
</html>