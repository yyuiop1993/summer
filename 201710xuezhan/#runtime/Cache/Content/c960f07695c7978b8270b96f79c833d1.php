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
  <form name="myform" class="J_ajaxForm" action="<?php echo U("item");?>" method="post">
    <div class="table_list"> 
    <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td width="10%" align="left"><input type="checkbox" value="" id="check_box" class="J_check_all" data-direction="x" data-checklist="J_check_x">全选</td>
            <td width="10%"  align="left">排序</td>
            <td width="10%"  align="left">ID</td>
            <td width=""  align="left">标题</td>
            <td width="15%" align="center">栏目名称</td>
            <td width="15%" align="center">发表时间</td>
            <td width="15%" align="center">管理操作</td>
          </tr>
        </thead>
        <tbody>
          <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
              <td align="left"><input type="checkbox" name="items[]" value="<?php echo ($vo["id"]); ?>-<?php echo ($vo["modelid"]); ?>" class="J_check" data-yid="J_check_y" data-xid="J_check_x"></td>
              <td align="left"><input name='listorders[<?php echo ($vo["catid"]); ?>-<?php echo ($vo["id"]); ?>]' type='text' size='3' value='<?php echo ($vo["listorder"]); ?>' class="input"></td>
              <td align="left"><?php echo ($vo["id"]); ?></td>
              <td align="left"><?php echo ($vo["data"]["title"]); ?> </td>
              <td align="center"><?php echo getCategory($vo['catid'],'catname');?></td>
              <td align="center"><?php echo (date("Y-m-d H:i:s",$vo["data"]["inputtime"])); ?></td>
              <td align="center">
              <a href="<?php echo ($vo["data"]["url"]); ?>" target="_blank">原文</a> | 
              <a onClick="javascript:openwinx('<?php echo U("Content/edit",array("catid"=>$vo['catid'],"id"=>$vo['id'] ));?>','')" href="javascript:;">原文编辑</a>
              <?php
 if(\Libs\System\RBAC::authenticate('item_manage')){ ?>
               | <a href="javascript:item_manage(<?php echo ($vo["id"]); ?>,<?php echo ($vo["posid"]); ?>, <?php echo ($vo["modelid"]); ?>,'<?php echo ($vo["data"]["title"]); ?>')">信息管理</a>
              <?php
 } ?>
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
        <button class="btn btn_submit mr10 J_ajax_submit_btn" data-action="<?php echo U("Content/Position/public_item_listorder");?>" type="submit">排序</button>
        <button class="btn mr10 J_ajax_submit_btn" type="submit">移出</button>
        <input type="hidden" value="<?php echo ($posid); ?>" name="posid">
      </div>
    </div>
  </form>
</div>
<script src="<?php echo ($config_siteurl); ?>statics/js/common.js"></script>
<script type="text/javascript">
//信息管理
function item_manage(id, posid, modelid, name) {
    Wind.use("artDialog", "iframeTools", function () {
        art.dialog.open(GV.DIMAUB + "index.php?a=item_manage&m=Position&g=Content&id=" + id + "&modelid=" + modelid + "&posid=" + posid, {
            title: '修改--' + name,
            id: 'edit',
            lock: true,
            fixed: true,
            background: "#CCCCCC",
            opacity: 0
        });
    });
}
</script>
</body>
</html>