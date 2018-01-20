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
  <form name="myform" action="<?php echo U('Formguide/index');?>" method="post" class="J_ajaxForm">
  <div class="table_list">
  <table width="100%" border="0" cellpadding="5" cellspacing="1" class="tableClass">
      <thead>
        <tr>
          <td width="3%" align="center"><input type="checkbox" class="J_check_all" data-direction="y" data-checklist="J_check_y"></td>
          <td width="12%" align="left">名称(信息数)</td>
          <td width="20%" align="center">表名</td>
          <td  align="center">简介</td>
          <td width="12%" align="center">创建时间</td>
          <td width="35%" align="center">管理操作</td>
        </tr>
      </thead>
      <tbody>
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
          <td align="center"><input type="checkbox" class="J_check" data-yid="J_check_y" data-xid="J_check_x" name="formid[]" value="<?php echo ($vo["modelid"]); ?>"></td>
          <td><?php echo ($vo["name"]); ?><a href=" <?php echo U('Formguide/Index/index',array("formid"=>$vo['modelid'],));?>"  target="_blank">[访问前台]</a> (<?php echo ($vo["items"]); ?>)</td>
          <td align="center"><font color=blue><?php echo ($vo['tablename']); ?></font></td>
          <td align="center"><?php echo ($vo['description']); ?></td>
          <td align="center"><?php echo (date("Y-m-d H:i:s",$vo['addtime'])); ?></td>
          <td align="center">
          <a href="<?php echo U('Info/index',array('menuid'=>$_GET['menuid'],'formid'=>$vo['modelid']));?>" target="_blank">信息列表</a> | <a href="<?php echo U('Field/add',array('menuid'=>$_GET['menuid'],'formid'=>$vo['modelid']));?>"  target="_blank">添加字段</a> | <a href="<?php echo U('Field/index',array('menuid'=>$_GET['menuid'],'formid'=>$vo['modelid']));?>"  target="_blank">管理字段</a> | <a href="<?php echo U('Formguide/edit',array('menuid'=>$_GET['menuid'],'formid'=>$vo['modelid']));?>">修改</a> | 
          <?php if( $vo['disabled'] == 0 ): ?><a href="<?php echo U('Formguide/status',array('disabled'=>0,'menuid'=>$_GET['menuid'],'formid'=>$vo['modelid']));?>">禁用</a> | 
          <?php else: ?>
          <a href="<?php echo U('Formguide/status',array('disabled'=>1,'menuid'=>$_GET['menuid'],'formid'=>$vo['modelid']));?>"><font color="#FF0000">启用</font></a> |<?php endif; ?>
          <a href="javascript:confirmurl('<?php echo U('Formguide/delete',array('menuid'=>$_GET['menuid'],'formid'=>$vo['modelid']));?>','确认要删除 『 <?php echo ($vo["name"]); ?> 』 吗？')">删除</a> | <a href="javascript:call(<?php echo ($vo["modelid"]); ?>)"><font color=blue>调用</font></a>
          </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      </tbody>
    </table>
    <div class="p10">
        <div class="pages"> <?php echo ($Page); ?> </div>
      </div>
  </div>
  <div class="">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">删除</button>
      </div>
    </div>
  </form>
</div>
<script src="<?php echo ($config_siteurl); ?>statics/js/common.js?v"></script>
<script src="<?php echo ($config_siteurl); ?>statics/js/content_addtop.js"></script>
<script>
//调用
function call(id) {
	omnipotent("call", GV.DIMAUB+'index.php?a=public_call&m=Formguide&g=Formguide&formid=' + id, "调用方式", 1, '700px', '300px');
}
</script>
</body>
</html>