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
  <div class="h_a">附件配置</div>
  <div class="table_full">
    <form method='post'   id="myform" class="J_ajaxForm"  action="<?php echo U('Config/attach');?>">
      <table cellpadding=0 cellspacing=0 width="100%" class="table_form" >
      <tr>
        <th width="140">网站存储方案:</th>
        <th><?php echo \Form::select($dirverList,$Site['attachment_driver'],'name="attachment_driver"'); ?> <em>存储方案请放在 Libs/Driver/Attachment/ 目录下</em></th>
      </tr>
      <tr>
        <th width="140">允许上传附件大小:</th>
        <th><input type="text" class="input" name="uploadmaxsize" id="uploadmaxsize" size="10" value="<?php echo ($Site["uploadmaxsize"]); ?>"/>
          <span class="gray">KB</span></th>
      </tr>
      <tr>
        <th width="140">允许上传附件类型:</th>
        <th><input type="text" class="input" name="uploadallowext" id="uploadallowext" size="50" value="<?php echo ($Site["uploadallowext"]); ?>"/>
        <span class="gray">多个用"|"隔开</span></th>
      </tr>
       <tr >
        <th width="140">前台允许上传附件大小:</th>
        <th><input type="text" class="input" name="qtuploadmaxsize" id="uploadmaxsize" size="10" value="<?php echo ($Site["qtuploadmaxsize"]); ?>"/>
          <span class="gray">KB</span></th>
      </tr>
      <tr >
        <th width="140">前台允许上传附件类型:</th>
        <th><input type="text" class="input" name="qtuploadallowext" id="uploadallowext" size="50" value="<?php echo ($Site["qtuploadallowext"]); ?>"/>
        <span class="gray">多个用"|"隔开</span></th>
      </tr>
      <tr>
        <th width="140">保存远程图片过滤域名:</th>
        <th><input type="text" class="input" name="fileexclude" id="fileexclude" style="width:314px;" value="<?php echo ($Site["fileexclude"]); ?>"/>
        <span class="gray">多个用"|"隔开，域名以"/"结尾，例如：http://www.abc3210.com/</span></th>
      </tr>
      <tr>
        <th width="140">FTP服务器地址:</th>
        <th><input type="text" class="input" name="ftphost" id="ftphost" size="30" value="<?php echo ($Site["ftphost"]); ?>"/> FTP服务器端口: <input type="text" class="input" name="ftpport" id="ftpport" size="5" value="<?php echo ($Site["ftpport"]); ?>"/></th>
      </tr>
      <tr>
        <th width="140">FTP上传目录:</th>
        <th><input type="text" class="input" name="ftpuppat" id="ftpuppat" size="30" value="<?php echo ($Site["ftpuppat"]); ?>"/> 
        <span class="gray">"/"表示上传到FTP根目录</span></th>
      </tr>
      <tr>
        <th width="140">FTP用户名:</th>
        <th><input type="text" class="input" name="ftpuser" id="ftpuser" size="20" value="<?php echo ($Site["ftpuser"]); ?>"/></th>
      </tr>
      <tr>
        <th width="140">FTP密码:</th>
        <th><input type="password" class="input" name="ftppassword" id="ftppassword" size="20" value="<?php echo ($Site["ftppassword"]); ?>"/></th>
      </tr>
      <tr>
        <th width="140">FTP是否开启被动模式:</th>
        <th><input name="ftppasv" type="radio" value="1"  <?php if( $Site['ftppasv'] == '1' ): ?>checked<?php endif; ?> /> 开启 <input name="ftppasv" type="radio" value="0" <?php if( $Site['ftppasv'] == '0' ): ?>checked<?php endif; ?> /> 关闭</th>
      </tr>
      <tr>
        <th width="140">FTP是否使用SSL连接:</th>
        <th><input name="ftpssl" type="radio" value="1"  <?php if( $Site['ftpssl'] == '1' ): ?>checked<?php endif; ?> /> 开启 <input name="ftpssl" type="radio" value="0" <?php if( $Site['ftpssl'] == '0' ): ?>checked<?php endif; ?> /> 关闭</th>
      </tr>
      <tr>
        <th width="140">FTP超时时间:</th>
        <th><input type="text" class="input" name="ftptimeout" id="ftptimeout" size="5" value="<?php echo ($Site["ftptimeout"]); ?>"/>
        <span class="gray">秒</span></th>
      </tr>
      <tr>
        <th width="140">是否开启图片水印:</th>
        <th><input class="radio_style" name="watermarkenable" value="1" <?php if($Site['watermarkenable'] == '1' ): ?>checked<?php endif; ?> type="radio">
          启用&nbsp;&nbsp;&nbsp;&nbsp;
          <input class="radio_style" name="watermarkenable" value="0" <?php if($Site['watermarkenable'] == '0' ): ?>checked<?php endif; ?>  type="radio">
          关闭 </th>
      </tr>
      <tr>
        <th width="140">水印添加条件:</th>
        <th>宽
          <input type="text" class="input" name="watermarkminwidth" id="watermarkminwidth" size="10" value="<?php echo ($Site["watermarkminwidth"]); ?>" />
          X 高
          <input type="text" class="input" name="watermarkminheight" id="watermarkminheight" size="10" value="<?php echo ($Site["watermarkminheight"]); ?>" />
          PX</th>
      </tr>
      <tr>
        <th width="140">水印图片:</th>
        <th><input type="text" name="watermarkimg" id="watermarkimg" class="input" size="30" value="<?php echo ($Site["watermarkimg"]); ?>"/>
          <span class="gray">水印存放路径从网站根目录起</span></th>
      </tr>
      <tr>
        <th width="140">水印透明度:</th>
        <th><input type="text" class="input" name="watermarkpct" id="watermarkpct" size="10" value="<?php echo ($Site["watermarkpct"]); ?>" />
          <span class="gray">请设置为0-100之间的数字，0代表完全透明，100代表不透明</span></th>
      </tr>
      <tr>
        <th width="140">JPEG 水印质量:</th>
        <th><input type="text" class="input" name="watermarkquality" id="watermarkquality" size="10" value="<?php echo ($Site["watermarkquality"]); ?>" />
          <span class="gray">水印质量请设置为0-100之间的数字,决定 jpg 格式图片的质量</span></th>
      </tr>
      <tr>
        <th width="140">水印位置:</th>
        <th>
        <div class="locate">
						<ul class="cc" id="J_locate_list">
							<li class="<?php if($Site['watermarkpos'] == '1' ): ?>current<?php endif; ?>"><a href="" data-value="1">左上</a></li>
							<li class="<?php if($Site['watermarkpos'] == '2' ): ?>current<?php endif; ?>"><a href="" data-value="2">中上</a></li>
							<li class="<?php if($Site['watermarkpos'] == '3' ): ?>current<?php endif; ?>"><a href="" data-value="3">右上</a></li>
							<li class="<?php if($Site['watermarkpos'] == '4' ): ?>current<?php endif; ?>"><a href="" data-value="4">左中</a></li>
							<li class="<?php if($Site['watermarkpos'] == '5' ): ?>current<?php endif; ?>"><a href="" data-value="5">中心</a></li>
							<li class="<?php if($Site['watermarkpos'] == '6' ): ?>current<?php endif; ?>"><a href="" data-value="6">右中</a></li>
							<li class="<?php if($Site['watermarkpos'] == '7' ): ?>current<?php endif; ?>"><a href="" data-value="7">左下</a></li>
							<li class="<?php if($Site['watermarkpos'] == '8' ): ?>current<?php endif; ?>"><a href="" data-value="8">中下</a></li>
							<li class="<?php if($Site['watermarkpos'] == '9' ): ?>current<?php endif; ?>"><a href="" data-value="9">右下</a></li>
						</ul>
						<input id="J_locate_input" name="watermarkpos" type="hidden" value="<?php echo ($Site["watermarkpos"]); ?>">
					</div>
        </th>
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
<script>
$(function(){
	//水印位置
	$('#J_locate_list > li > a').click(function(e){
		e.preventDefault();
		var $this = $(this);
		$this.parents('li').addClass('current').siblings('.current').removeClass('current');
		$('#J_locate_input').val($this.data('value'));
	});
});
</script>
</body>
</html>