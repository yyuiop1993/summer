<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap">
  <Admintemplate file="Common/Nav"/>
  <div class="table_list">
    <table width="100%">
      <thead>
        <tr>      
          <td width="120">广告id</td>
          <td>广告名称</td>
          <td width="300">广告链接</td>
          <td width="300">创建时间</td>
		      <td width="100">状态</td>
          <td width="120">操作</td>
        </tr>
      </thead>
      <volist name="data" id="vo">
        <tr>
          <td>{$vo.id}</td>
          <td>{$vo.title}</td>
          <td>{$vo.url}</td>
          <td>{$vo.time}</td>
          <td>{$vo.status}</td>
          <td class="action"><a href="{:U('Ad/edit',array('id'=>$vo['id'],'isadmin'=>1 ))}">编辑</a>&nbsp; <a href="{:U('Ad/delete',array('id'=>$vo['id'],'isadmin'=>1 ))}">删除</a></td>
        </tr>
      </volist>
    </table>
    <div class="p10">
        <div class="pages"> {$Page} </div>
      </div>
  </div>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>