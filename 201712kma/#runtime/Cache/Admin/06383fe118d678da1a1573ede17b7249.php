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
   <form action="<?php echo U('Pingtai/posthf');?>" method="post">
   <table width="100%" cellspacing="0">
         
            <tr width="100%">
              <td width="40%" >
                <table width="100%">       
                     <tr > <td  align="center" width="15%">序号</td>  <td  align="left" ><?php echo ($res["id"]); ?></td></tr>
                     <tr> <td  align="center" width="15%">主题</td>  <td  align="left" ><?php echo ($res["title"]); ?></td></tr>
                     <tr> <td  align="center" width="15%">姓名</td>  <td  align="left" ><?php echo ($res["name"]); ?></td></tr>
                     <tr> <td  align="center" width="15%">手机</td>  <td  align="left" ><?php echo ($res["phone"]); ?></td></tr>
                     <tr> <td  align="center" width="15%">邮箱</td>  <td  align="left" ><?php echo ($res["mail"]); ?></td></tr>
                     <tr> <td  align="center" width="15%">QQ</td>  <td  align="left" ><?php echo ($res["qq"]); ?></td></tr>
                     <tr> <td  align="center" width="15%">时间</td>  <td  align="left" ><?php echo (date('Y-m-d H:i:s',$res["add_time"])); ?></td></tr>
                     <tr> <td  align="center" width="15%">内容</td>  <td  align="left" ><?php echo ($res["cont"]); ?></td></tr>
                </table>
              </td>
              <td width="60%">
                  <div style="width: 100%;">
                      <div>
                          <strong style="display: block;">回复内容:</strong>
                          <textarea name="hf_cont" maxlength="255" style=" margin-top: 10px; width:400px;height:240px;"><?php echo ($res["hf_cont"]); ?></textarea>
                      </div>
                      <div style=" margin: 15px 0;">
                          <strong>是否显示</strong>
                          <label><input name="is_show" type="radio" value="1" <?php if($res['is_show'] == 1): ?>checked<?php endif; ?> />显示 </label> 
                          <label><input name="is_show" type="radio" value="0" <?php if($res['is_show'] == 0): ?>checked<?php endif; ?> />不显示 </label> 
                  </div>
              </td>
            </tr>
      </table>
       <input name='id' type="hidden" value="<?php echo ($res["id"]); ?>" />
       <input name='type' type="hidden" value="<?php echo ($res["type"]); ?>" />
       <input name='cl_time' type="hidden" value="<?php echo ($res["cl_time"]); ?>" />
      <div>
       <div style=" text-align: center; margin-top: 15px">
          <button class="btn btn_submit mr10 " type="submit">提交</button>
        </div>
      </div>
   </div>
  
  </form>
</div>
<script src="<?php echo ($config_siteurl); ?>statics/js/common.js"></script>
</body>
</html>