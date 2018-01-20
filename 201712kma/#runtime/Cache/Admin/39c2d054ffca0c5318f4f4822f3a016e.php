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
  <form method='post'  class="J_ajaxForm"  action="<?php echo U('Config/extend');?>">
  <input type="hidden" name="action" value="add"/>
  <div class="h_a">添加扩展配置项</div>
  <div class="table_list">
    <table cellpadding="0" cellspacing="0" class="table_form" width="100%">
      <tbody>
        <tr>
          <td width="50">键名:</td>
          <td><input type="text" class="input" name="fieldname" value=""> 注意：只允许英文、数组、下划线</td>
        </tr>
        <tr>
          <td>名称:</td>
          <td><input type="text" class="input" name="setting[title]" value=""></td>
        </tr>
        <tr>
          <td>类型:</td>
          <td><select name="type" onChange="extend_type(this.value)">
              <option value="input" >单行文本框</option>
              <option value="select" >下拉框</option>
              <option value="textarea" >多行文本框</option>
              <option value="radio" >单选框</option>
              <option value="password" >密码输入框</option>
            </select></td>
        </tr>
        <tr>
          <td>提示:</td>
          <td><input type="text" class="input length_4" name="setting[tips]" value=""></td>
        </tr>
        <tr>
          <td>样式:</td>
          <td><input type="text" class="input length_4" name="setting[style]" value=""></td>
        </tr>
        <tr class="setting_radio" style="display:none">
          <td>选项:</td>
          <td><textarea name="setting[option]" disabled="true" style="width:380px; height:150px;">选项名称1|选项值1</textarea> 注意：每行一个选项</td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="btn_wrap_pd"><button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">添加</button></div>
  </form>
  <div class="h_a">扩展配置 ，用法：模板调用标签：{:cache('Config.键名')}，PHP代码中调用：cache('Config.键名');</div>
  <div class="table_full">
    <form method='post'   id="myform" class="J_ajaxForm"  action="<?php echo U('Config/extend');?>">
      <table width="100%"  class="table_form">
        <?php if(is_array($extendList)): $i = 0; $__LIST__ = $extendList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $setting = unserialize($vo['setting']); ?>
        <tr>
          <th width="200"><?php echo ($setting["title"]); ?> <a href="<?php echo U('Config/extend',array('fid'=>$vo['fid'],'action'=>'delete'));?>" class="J_ajax_del" title="删除该项配置" style="color:#F00">X</a><span class="gray"><br/>键名：<?php echo ($vo["fieldname"]); ?></span></th>
          <th class="y-bg">
          <?php switch($vo["type"]): case "input": ?><input type="text" class="input" style="<?php echo ($setting["style"]); ?>"  name="<?php echo ($vo["fieldname"]); ?>" value="<?php echo ($Site[$vo['fieldname']]); ?>"><?php break;?>
             <?php case "select": ?><select name="<?php echo ($vo["fieldname"]); ?>">
             <?php if(is_array($setting['option'])): $i = 0; $__LIST__ = $setting['option'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rs): $mod = ($i % 2 );++$i;?><option value="<?php echo ($rs["value"]); ?>" <?php if( $Site[$vo['fieldname']] == $rs['value'] ): ?>selected<?php endif; ?>><?php echo ($rs["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
             </select><?php break;?>
             <?php case "textarea": ?><textarea name="<?php echo ($vo["fieldname"]); ?>" style="<?php echo ($setting["style"]); ?>"><?php echo ($Site[$vo['fieldname']]); ?></textarea><?php break;?>
             <?php case "radio": if(is_array($setting['option'])): $i = 0; $__LIST__ = $setting['option'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rs): $mod = ($i % 2 );++$i;?><input name="<?php echo ($vo["fieldname"]); ?>" value="<?php echo ($rs["value"]); ?>" type="radio"  <?php if( $Site[$vo['fieldname']] == $rs['value'] ): ?>checked<?php endif; ?>> <?php echo ($rs["title"]); endforeach; endif; else: echo "" ;endif; break;?>
             <?php case "password": ?><input type="password" class="input" style="<?php echo ($setting["style"]); ?>"  name="<?php echo ($vo["fieldname"]); ?>" value="<?php echo ($Site[$vo['fieldname']]); ?>"><?php break; endswitch;?>
           <span class="gray"> <?php echo ($setting["tips"]); ?></span>
          </th>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      </table>
      <div class="btn_wrap">
        <div class="btn_wrap_pd">
          <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script src="<?php echo ($config_siteurl); ?>statics/js/common.js?v"></script>
<script>
function extend_type(type){
	if(type == 'radio' || type == 'select'){
		$('.setting_radio').show();
		$('.setting_radio textarea').attr('disabled',false);
	}else{
		$('.setting_radio').hide();
		$('.setting_radio textarea').attr('disabled',true);
	}
}
</script>
</body>
</html>