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
  <form class="J_ajaxForm" action="<?php echo U("Field/listorder");?>" method="post">
  <div class="table_list">
  <table width="100%" cellspacing="0" >
        <thead>
          <tr>
            <td width="70" align='center'>排序</td>
            <td width="90">字段名</td>
            <td>别名</td>
            <td width="100">字段类型</td>
            <td width="30" align='center'>主表</td>
            <td width="30" align='center'>必填</td>
            <td width="30" align='center'>搜索</td>
            <td width="30" align='center'>排序</td>
            <td width="30" align='center'>投稿</td>
            <td width="100" align='center'>管理操作</td>
          </tr>
        </thead>
        <tbody class="td-line">
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td align='center'><input name='listorders[<?php echo ($vo["fieldid"]); ?>]' type='text' size='3' value='<?php echo ($vo["listorder"]); ?>' class='input'></td>
            <td><?php echo ($vo["field"]); ?></td>
            <td><?php echo ($vo["name"]); ?></td>
            <td><?php echo ($vo["formtype"]); ?></td>
            <td align='center'><?php if($vo['issystem'] == 1): ?><font color="blue">√</font><?php else: ?> <font color="red">╳</font><?php endif; ?></td>
            <td align='center'><?php if($vo['minlength'] == 1): ?><font color="blue">√</font><?php else: ?> <font color="red">╳</font><?php endif; ?></td>
            <td align='center'><?php if($vo['issearch'] == 1): ?><font color="blue">√</font><?php else: ?> <font color="red">╳</font><?php endif; ?></td>
            <td align='center'><?php if($vo['isorder'] == 1): ?><font color="blue">√</font><?php else: ?> <font color="red">╳</font><?php endif; ?></td>
            <td align='center'><?php if($vo['isadd'] == 1): ?><font color="blue">√</font><?php else: ?> <font color="red">╳</font><?php endif; ?></td>
            <td align='center'>
            <?php
 $operate = array(); if(\Libs\System\RBAC::authenticate('edit')){ $operate[] = '<a href="'.U("Field/edit",array("fieldid"=>$vo['fieldid'],"modelid"=>$vo['modelid'])).'">修改</a>'; } if(\Libs\System\RBAC::authenticate('disabled')){ if(in_array($vo['field'],$forbid_fields)){ $operate[] = '<font color="#BEBEBE"> 隐藏 </font>'; }else{ if($vo['disabled'] == 0){ $operate[] = '<a href="'.U("Field/disabled",array("fieldid"=>$vo['fieldid'],"modelid"=>$vo['modelid'],"disabled"=>0)).'">隐藏</a>'; }else{ $operate[] = '<a href="'.U("Field/disabled",array("fieldid"=>$vo['fieldid'],"modelid"=>$vo['modelid'],"disabled"=>1)).'"><font color="#FF0000">显示</font></a>'; } } } if(\Libs\System\RBAC::authenticate('delete')){ if(in_array($vo['field'],$forbid_delete)){ $operate[] = '<font color="#BEBEBE"> 删除</font>'; }else{ $operate[] = '<a class="J_ajax_del" href="'.U("Field/delete",array("fieldid"=>$vo['fieldid'],"modelid"=>$vo['modelid'])).'">删除</a>'; } } echo implode(' | ',$operate); ?>
            </td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
      </table>
  </div>
  <div class="btn_wrap">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">排序</button>
      </div>
    </div>
  </form>
</div>
<script src="<?php echo ($config_siteurl); ?>statics/js/common.js"></script>
</body>
</html>