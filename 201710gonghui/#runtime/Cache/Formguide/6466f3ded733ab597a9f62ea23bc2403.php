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
  <div class="h_a">搜索</div>
  <form method="get" action="">
  <input type="hidden" value="Formguide" name="g">
  <input type="hidden" value="Info" name="m">
  <input type="hidden" value="index" name="a">
  <input type="hidden" value="1" name="search">
  <input type="hidden" value="<?php echo ($formid); ?>" name="formid">
    <div class="search_type cc mb10">
      <div class="mb10"> 
        <span class="mr20">时间：
        <input type="text" name="start_time" class="input length_2 J_date start_time" value="<?php echo ($_GET['start_time']); ?>" style="width:80px;">-
        <input type="text" name="end_time" class="input length_2 J_date end_time"  value="<?php echo ($_GET['end_time']); ?>" style="width:80px;">
        <select class="select_2" name="type"style="width:70px;">
          <option value="0" <?php if( $searchtype == '0' ): ?>selected<?php endif; ?>>不限</option>
          <option value="1" <?php if( $searchtype == '1' ): ?>selected<?php endif; ?>>IP</option>
		  <option value="2" <?php if( $searchtype == '2' ): ?>selected<?php endif; ?>>用户名</option>
        </select>
        关键字：
        <input type="text" class="input length_2" name="keyword" style="width:200px;" value="<?php echo ($keyword); ?>" placeholder="请输入关键字...">

        <button class="btn">搜索</button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button class="btn export" type="button">导出</button>
        </span>
      </div>
    </div>
  </form>
  <form name="myform" class="J_ajaxForm" action="<?php echo U('Info/delete');?>" method="post" >
  <div class="table_list">
  <table width="100%" border="0" cellpadding="5" cellspacing="1" class="tableClass">
      <thead>
        <tr>
          <td width="35" align="center"><input type="checkbox" class="J_check_all" data-direction="y" data-checklist="J_check_y"></td>
          <td width="40" align="center">id</td>
          <td align="left">用户名</td>
          <td width='250' align="center">用户ip</td>
          <td width='250' align="center">时间</td>
          <td width='250' align="center">操作</td>
        </tr>
      </thead>
      <tbody>
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
          <td align="center"><input type="checkbox" class="J_check" data-yid="J_check_y" data-xid="J_check_x" name="dataid[]" value="<?php echo ($vo["dataid"]); ?>"></td>
          <td align="center"><?php echo ($vo["dataid"]); ?></td>
          <td align="left"><?php echo ($vo["username"]); ?></td>
          <td align="center"><font color=blue><?php echo ($vo["ip"]); ?></font></td>
          <td align="center"><?php echo (date("Y-m-d H:i:s",$vo["datetime"])); ?></td>
          <td align="center"><a href="javascript:check('<?php echo ($formid); ?>', '<?php echo ($vo["dataid"]); ?>', '<?php echo ($vo["username"]); ?>');">查看</a> | <a href="<?php echo U('Info/delete',array('formid'=>$formid,'dataid'=>$vo['dataid']));?>;" class="J_ajax_del">删除</a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      </tbody>
    </table>
    <div class="p10">
        <div class="pages"> <?php echo ($Page); ?> </div>
      </div>
  </div>
  <div class="btn_wrap">
      <div class="btn_wrap_pd">       
        <label class="mr20"><input type="checkbox" class="J_check_all" data-direction="y" data-checklist="J_check_y">全选</label>      
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">删除</button>
        <input type="hidden"name="formid" value="<?php echo ($formid); ?>">
      </div>
    </div>
  </form>
</div>
<script src="<?php echo ($config_siteurl); ?>statics/js/common.js?v"></script>
<script src="<?php echo ($config_siteurl); ?>statics/js/content_addtop.js"></script>
<script type="text/javascript">
//详细信息查看
function check(id, did, title) {
	omnipotent("check", GV.DIMAUB+'index.php?a=public_view&m=Info&g=Formguide&formid=' + id +'&dataid='+did, '查看 ' + title+'---提交的信息', 1, '700px', '500px');
}

$(".export").click(function(){

    var url ="/index.php?g=Formguide&m=Info&a=export&formid=<?php echo ($formid); ?>&start_time="+$(".start_time").val()+"&end_time="+$(".end_time").val();
    window.open(url);
});
</script>
</body>
</html>