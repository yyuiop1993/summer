<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
   <Admintemplate file="Common/Nav"/>
   <div class="table_list">
   <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td width="5%" align="center">序号</td>
            <td width="6%" align="center" >姓名</td>
            <td width="6%"  align="center" >手机号</td>
            <td width="6%"  align="center" >电子邮箱</td>
            <td width="6%"  align="center" >提交时间</td>
            <td width="6%"  align="center" >回复时间</td>
            <td width="20%" align="center">主题</td>
            <td width="5%" align="center">管理操作</td>
          </tr>
        </thead>
        <tbody>
        <foreach name="list" item="vo">
          <tr>
            <td width="5%" align="center">{$vo.id}</td>
            <td width="6%" align="center">{$vo.name}</td>
           
            <td width="6%" align="center">{$vo.phone}</td>
            <td width="6%" align="center" >{$vo.mail}</td>
            <td width="6%" align="center">{$vo.add_time|date='Y-m-d H:i:s',###}</td>
            <td width="6%" align="center">
              <if condition=" $vo['hf_cont'] == '' or  $vo['status'] neq 1">
                 <font style="color: #f00">未回复</font>
              <else />
                  {$vo.cl_time|date='Y-m-d H:i:s',###}
              </if>
            </td>
            <td width="20%" align="center">{$vo.title}</td>
            <td width="5%"  align="center">
                <a href="{:U("Pingtai/huifu",array("id"=>$vo[id]))}">回复</a> | 
                <a class="J_ajax_del" href="{:U('Pingtai/del',array('id'=>$vo['id']))}">删除</a>
            </td>
          </tr>
         </foreach>
        </tbody>
      </table>
      <div class="p10">
        <div class="pages"> {$Page} </div>
      </div>
   </div>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>
</body>
</html>