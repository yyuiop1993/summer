<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap">
  <Admintemplate file="Common/Nav"/>
 <div class="h_a">添加广告</div>
  <form action="" method="post" name="myform" class="J_ajaxForm">
  <div class="table_full">
  <table class="table_form" width="100%" cellspacing="0">
  <tbody>
	<tr>
		<th width="150"><strong>广告名称：</strong></th>
		<td><input name="info[title]" id="title" class="input" type="text" size="30"></td>
	</tr>
	<tr>
		<th width="150"><strong>广告位置：</strong></th>
		<td><select name="info[type]" id="info[type]">
                            <option value="1">位置一</option>
			  <option value="2">位置二</option>	
			  <option value="3">位置三</option></select></td>
	</tr>	
	<tr>
		<th><strong>广告地址：</strong></th>
		<td><input name="info[url]" id="url" class="input" type="text" size="25"></td>
	</tr>
    <th><strong>广告图：</strong></th>
      <td><Form function="images" parameter="info[image],image,'',Links"/><span class="gray"> 双击可以查看图片！</span></td>
    </tr>
	<tr>
		<th><strong>是否启用：</strong></th>
		<td><label><input type="radio" name="info[status]" value="1"> 启用</label> <label><input type="radio" name="info[status]" value="0" checked=""> 不启用</label></td>
	</tr>	
	</tbody>
</table>
</div>
  <div class="btn_wrap">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
      </div>
    </div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/content_addtop.js"></script>
</body>
</html>