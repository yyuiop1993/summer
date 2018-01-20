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
    <div class="h_a">站点配置</div>
    <div class="table_full">
    <form method='post'   id="myform" class="J_ajaxForm"  action="<?php echo U('Config/index');?>">
      <table cellpadding=0 cellspacing=0 width="100%" class="table_form" >
      
       <tr>
	     <th width="140">站点名称:</th>
	     <td><input type="text" class="input"  name="sitename" value="<?php echo ($Site["sitename"]); ?>" size="40"></td>
      </tr>
      <tr>
	     <th width="140">网站访问地址:</th>
	     <td><input type="text" class="input"  name="siteurl" value="<?php echo ($Site["siteurl"]); ?>" size="40"> <span class="gray"> 请以“/”结尾</span></td>
      </tr>
      <tr>
	     <th width="140">附件访问地址:</th>
	     <td><input type="text" class="input"  name="sitefileurl" value="<?php echo ($Site["sitefileurl"]); ?>" size="40"> <span class="gray"> 非上传目录设置</span></td>
      </tr>
      <tr>
	     <th width="140">联系邮箱:</th>
	     <td><input type="text" class="input"  name="siteemail" value="<?php echo ($Site["siteemail"]); ?>" size="40"> </td>
      </tr>
      <tr>
	     <th width="140">网站关键字:</th>
	     <td><input type="text" class="input"  name="sitekeywords" value="<?php echo ($Site["sitekeywords"]); ?>" size="40"> </td>
      </tr>
      <tr>
	     <th width="140">网站简介:</th>
	     <td><textarea name="siteinfo" style="width:380px; height:150px;"><?php echo ($Site["siteinfo"]); ?></textarea> </td>
      </tr>
      <tr>
	     <th width="140">后台指定域名访问:</th>
	     <td><select name="domainaccess" id="domainaccess" >
            <option value="1" <?php if($Site['domainaccess'] == '1' ): ?>selected<?php endif; ?>>开启指定域名访问</option>
            <option value="0" <?php if($Site['domainaccess'] == '0' ): ?>selected<?php endif; ?>>关闭指定域名访问</option>
          </select> <span class="gray"> （该功能需要配合“域名绑定”模块使用，需要在域名绑定模块中添加域名！）</span></td>
      </tr>
      <tr>
	     <th width="140">是否生成首页:</th>
	     <td><select name="generate" id="generate" onChange="generates(this.value);">
            <option value="1" <?php if($Site['generate'] == '1' ): ?>selected<?php endif; ?>>生成静态</option>
            <option value="0" <?php if($Site['generate'] == '0' ): ?>selected<?php endif; ?>>不生成静态</option>
          </select></td>
      </tr>
      <tr>
	     <th width="140">首页URL规则:</th>
	     <td>
         <div style="<?php if( $Site['generate'] == 0 ): ?>display:none<?php endif; ?>" id="index_ruleid_1"><?php echo Form::select($IndexURL[1], $Site['index_urlruleid'], 'name="index_urlruleid" '.($Site['generate'] ==0 ?"disabled":"").' id="index_urlruleid"');?> <span class="gray"> 注意：该URL规则只有当首页模板中标签有开启分页才会生效。</span></div>
         <div style="<?php if( $Site['generate'] == 1 ): ?>display:none<?php endif; ?>" id="index_ruleid_0"><?php echo Form::select($IndexURL[0], $Site['index_urlruleid'], 'name="index_urlruleid" '.($Site['generate'] ==1 ?"disabled":"").' id="index_urlruleid"');?> <span class="gray"> 注意：该URL规则只有当首页模板中标签有开启分页才会生效。</span></div>
         </td>
      </tr>
      <tr>
	     <th width="140">首页模板:</th>
	     <td><select name="indextp" id="indextp">
            <?php if(is_array($indextp)): $i = 0; $__LIST__ = $indextp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo); ?>" <?php if($Site['indextp'] == $vo): ?>selected<?php endif; ?>><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
          </select>
	     <span class="gray"> 新增模板以index_x<?php echo C("TMPL_TEMPLATE_SUFFIX")?>形式</span></td>
      </tr>
      <tr>
	     <th width="140">TagURL规则:</th>
	     <td><?php echo Form::select($TagURL, $Site['tagurl'], 'name="tagurl" id="tagurl"', 'TagURL规则选择');?></td>
      </tr>
      <tr>
	     <th width="140">验证码类型:</th>
	     <td><select name="checkcode_type">
         	<option value="0" <?php if($Site['checkcode_type'] == '0' ): ?>selected<?php endif; ?>>数字字母混合</option>
            <option value="1" <?php if($Site['checkcode_type'] == '1' ): ?>selected<?php endif; ?>>纯数字</option>
            <option value="2" <?php if($Site['checkcode_type'] == '2' ): ?>selected<?php endif; ?>>纯字母</option>
          </select></td>
      </tr>
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
<script type="text/javascript">
function generates(genid){
	//生成静态
	if(genid == 1){
		$("#index_ruleid_1").show();
		$("#index_ruleid_1 select").attr("disabled",false);
		$("#index_ruleid_0").hide();
		$("#index_ruleid_0 select").attr("disabled","disabled");
	}else{
		$("#index_ruleid_0").show();
		$("#index_ruleid_0 select").attr("disabled",false);
		$("#index_ruleid_1").hide();
		$("#index_ruleid_1 select").attr("disabled","disabled");
	}
}
</script>
</body>
</html>