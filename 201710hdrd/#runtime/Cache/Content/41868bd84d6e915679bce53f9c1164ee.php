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
<div class="wrap ">
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
    <p>最好是有选择性的刷新，如果全部刷新，当信息量比较大的时候生成会比较久！</p>
  </div>
  <div class="h_a">刷新任务</div>
  <div class="table_full">
  <table width="100%" cellspacing="0">
      <form action="<?php echo U("Content/Createhtml/update_urls");?>" method="post" name="myform">
        <input type="hidden" name="dosubmit" value="1">
        <input type="hidden" name="type" value="lastinput">
        <thead>
          <tr>
            <th align="center" width="150">按照模型更新</th>
            <th align="center" width="386">选择栏目范围</th>
            <th align="center">选择操作内容</th>
          </tr>
        </thead>
        <tbody  height="200" class="nHover td-line">
          <tr>
            <th align="center" rowspan="6"><?php
 foreach($models as $_k=>$_v) { $model_datas[$_v['modelid']] = $_v['name']; } echo \Form::select($model_datas,$modelid,'name="modelid" size="2" style="height:200px; width:99%" onclick="change_model(this.value)"','不限制模型'); ?></th>
          </tr>
          <tr>
            <th align="center" rowspan="6">
            <select name='catids[]' id='catids'  multiple="multiple"  style="height:200px; width:99%" title="按住“Ctrl”或“Shift”键可以多选，按住“Ctrl”可取消选择">
                <option value='0' selected>不限栏目</option>
                  <?php echo ($string); ?>
              </select></th>
            <th><font color="red">每轮更新
              <input type="text" name="pagesize" value="10" class="input" size="4">
              条信息</font></th>
          </tr>
          <tr>
            <th>更新所有信息
              <input type="button" name="dosubmit1" value=" 开始更新 " class="btn" onClick="myform.type.value='all';myform.submit();"></th>
          </tr>
          <?php if( $modelid ): ?><tr>
            <th>更新最新发布的
              <input type="text" name="number" value="100" size="5" class="input">
              条信息
              <input type="button" class="btn" name="dosubmit2" value=" 开始更新 " onClick="myform.type.value='lastinput';myform.submit();"></th>
          </tr>
          <tr>
            <th>更新发布时间从
              <input type="text" name="fromdate" id="fromdate" value="" class="input J_date" size="8" />
              &nbsp; 到
              <input type="text" name="todate" id="todate" value="" size="10" class="input J_date" >
              &nbsp;的信息
              <input type="button" name="dosubmit3" value=" 开始更新 " class="btn" onClick="myform.type.value='date';myform.submit();"></th>
          </tr>
          <tr>
            <th>更新ID从
              <input type="text" name="fromid" value="0" class="input" size="8">
              到
              <input type="text" name="toid" size="8" class="input">
              的信息
              <input type="button" class="btn" name="dosubmit4" value=" 开始更新 " onClick="myform.type.value='id';myform.submit();"></th>
          </tr><?php endif; ?>
        </tbody>
      </form>
    </table>
  </div>
</div>
<script src="<?php echo ($config_siteurl); ?>statics/js/common.js"></script>
<script language="JavaScript">
	function change_model(modelid) {
		window.location.href=GV.DIMAUB+'index.php?a=update_urls&m=Createhtml&g=Content&modelid='+modelid;
	}
</script>
</body>
</html>