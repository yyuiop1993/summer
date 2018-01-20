<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<style>
.col-left{float:left}
.col-auto{overflow:hidden;_zoom:1;_float:left;}
.title-1{border-bottom:1px solid #eee; padding-left:5px}
.f14{font-size: 14px}
.lh28{line-height: 28px}
.blue,.blue a{color:#004499}
.gray4,a.gray4{color:#999}
.lh22{line-height: 22px}
</style>
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <form name="myform" action="{:U("Atadmin/delete")}" method="post" class="J_ajaxForm">
  <div class="table_list">
  <table width="100%" cellspacing="0">
      <thead>
        <tr>
          <td width="45" align="center"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x">全选</td>
          <td width="40" align="center">ID</td>
          <td width="70" align="center" >排序 </td>
          <td align="center">专题信息</td>
          <td width="200" align="center">管理操作</td>
      </tr>
      </thead>
      <tbody>
      <volist name="data" id="vo">
        <tr>
          <td align="center"><input type="checkbox" class="J_check" data-yid="J_check_y" data-xid="J_check_x" name="ids[]" value="{$vo.id}" id="att_{$vo.id}" /></td>
          <td align="center">{$vo.id}</td>
          <td align="center"><input name='listorders[{$vo.id}]' class="input mr5"  type='text' size='3' value='{$vo.listorder}'></td>
          <td ><div class="col-left mr10" style="width:146px; height:112px"><a href="{$vo.url}" target="_blank"><img src="{$vo.thumb}" width="146" height="112" style="border:1px solid #eee" align="left"></a></div>
<div class="col-auto">  
    <h2 class="title-1 f14 lh28 mb6 blue"><a href="{$vo.url}" target="_blank">{$vo.title}</a></h2>
    <div class="lh22">{$vo.title}</div>
<p class="gray4">创建人：<a href="#" class="blue">{$vo.username}</a>， 创建时间：{$vo.createtime|date="Y-m-d H:i:s",###}</p>
</div>
          </td>
          <td align="center">
          <a href='{:U("Special/Content/index",array('specialid'=>$vo['id']))}' onClick="javascript:openwinx('{:U("Special/Content/add",array('specialid'=>$vo['id']))}','')">添加信息</a></span> | 
<span style="height:22"><a href='{:U("Special/Content/index",array('specialid'=>$vo['id']))}' onClick="javascript:openwinx('{:U("Special/Content/import",array('specialid'=>$vo['id']))}','')">导入信息</a></span><br />
<span style="height:22"><a href='{:U("Special/Content/index",array('menuid'=>$_GET['menuid'],'specialid'=>$vo['id']))}'>管理信息</a></span> | 
<if condition=" $vo['elite'] ">
<span style="height:22"><a href='{:U("Special/Special/recommend",array('specialid'=>$vo['id']))}'><font color="red">取消推荐</font></a></span><br/>
<else />
<span style="height:22"><a href='{:U("Special/Special/recommend",array('specialid'=>$vo['id']))}'>推荐专题</a></span><br/>
</if>
<span style="height:22"><a href="{:U("Special/Special/edit",array('specialid'=>$vo['id']))}">修改专题</a></span> | 
<span style="height:22"><a href="{:U("Special/Special/delete",array('specialid'=>$vo['id']))}" onclick="return confirm('确认要删除 『 测试专题 』 吗？')">删除专题</a>
          </td>
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
        <button class="btn J_ajax_submit_btn" type="submit" data-action="{:U('Special/listorder')}">排序</button>
        <button class="btn J_ajax_submit_btn" type="submit" data-action="{:U('Special/delete')}">删除</button>
        <button class="btn J_ajax_submit_btn btn_submit" type="submit" data-action="{:U('Special/html')}">更新HTML</button>
      </div>
    </div>
  </form>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/content_addtop.js?v"></script>
</body>
</html>