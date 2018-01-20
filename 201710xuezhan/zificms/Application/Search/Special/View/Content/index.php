<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  	<div class="return"><a href="{:U("Special/Special/index",array('menuid'=>$_GET['menuid']))}">返回专题管理</a></div>
    <ul class="cc">
      <li class="current"><a href="{:U("Special/Content/index",array('specialid'=>$specialid,'menuid'=>$_GET['menuid']))}">专题信息管理</a></li>
      <li><a href="javascript:;;" onClick="javascript:openwinx('{:U("Special/Content/import",array('specialid'=>$specialid))}','')">信息导入</a></li>
    </ul>
  </div>
  <div class="mb10">
		<a href="javascript:;;" onClick="javascript:openwinx('{:U("Content/add",array("specialid"=>$specialid))}','')" class="btn"><span class="add"></span>添加信息</a>
  </div>
  <form name="myform" action="{:U("Atadmin/delete")}" method="post" class="J_ajaxForm">
  <div class="table_list">
  <table width="100%" cellspacing="0">
      <thead>
        <tr>
          <td width="45" align="center"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x">全选</td>
          <td width="43" align='center'>排序</td>
          <td width="60" align='center'>ID</td>
          <td>标题</td>
          <td width="120" align='center'>所属分类</td>
          <td width="90" align='center'>发布人</td>
          <td width="120" align='center'>更新时间</td>
          <td width="200" align='center'>管理操作</td>
      </tr>
      </thead>
      <tbody>
      <volist name="data" id="vo">
        <tr>
          <td align="center"><input type="checkbox" class="J_check" data-yid="J_check_y" data-xid="J_check_x" name="ids[]" value="{$vo.id}" id="att_{$vo.id}" /></td>
          <td align="center"><input name='listorders[{$vo.id}]' class="input mr5"  type='text' size='3' value='{$vo.listorder}'></td>
          <td align="center">{$vo.id}</td>
          <td><a href="{$vo.url}" title="{$vo.title}" target="_blank">{$vo.title}</a>
          <if condition=" $vo['thumb']!='' "> <img src="{$config_siteurl}statics/images/icon/small_img.gif" title="标题图片"> </if>
          </td>
          <td align="center">{$types[$vo['typeid']]}</td>
          <td align="center">{$vo.username}</td>
          <td align="center">{$vo.updatetime|date="Y-m-d H:i:s",###}</td>
          <td align="center"><a href="javascript:;;" onClick="javascript:openwinx('{:U("Special/Content/edit",array('id'=>$vo['id']))}','')">修改</a> | <a href="{:U("Special/Content/delete",array('id'=>$vo['id']))}" onclick="return confirm('确认要删除 『 {$vo.title} 』 吗？')">删除</a></td>
        </tr>
      </volist>
      </tbody>
    </table>
    <div class="p10">
        <div class="pages"> {$Page} </div>
      </div>
  </div>
  <div class="btn_wrap">
      <div class="btn_wrap_pd">
        <label class="mr20"><input type="checkbox" class="J_check_all" data-direction="y" data-checklist="J_check_y">全选</label> 
        <button class="btn J_ajax_submit_btn" type="submit" data-action="{:U('Content/listorder')}">排序</button>
        <button class="btn J_ajax_submit_btn" type="submit" data-action="{:U('Content/delete')}">删除</button>
        <button class="btn J_ajax_submit_btn btn_submit" type="submit" data-action="{:U('Content/html')}">更新HTML</button>
      </div>
    </div>
  </form>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/content_addtop.js?v"></script>
<script>
setCookie('refersh_time', 0);
function refersh_window() {
    var refersh_time = getCookie('refersh_time');
    if (refersh_time == 1) {
        window.location.reload();
    }
}
setInterval(function(){
	refersh_window()
}, 3000);
</script>
</body>
</html>