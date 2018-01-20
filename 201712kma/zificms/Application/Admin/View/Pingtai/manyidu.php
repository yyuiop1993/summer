<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  
  <!-- <div class="h_a">搜索</div>
  <form method="get" action="">

  <input type="hidden" value="Admin" name="g">
  <input type="hidden" value="Pingtai" name="m">
  <input type="hidden" value="xianxue_list" name="a">
  <input type="hidden" value="1" name="search">

    <div class="search_type cc mb10">
      <div class="mb10"> 
        <span class="mr20">时间：
        <input type="text" name="start_time" class="input length_2 J_date start_time" value="{$Think.get.start_time}" style="width:80px;">-
        <input type="text" name="end_time" class="input length_2 J_date end_time"  value="{$Think.get.end_time}" style="width:80px;">
        <select class="select_2" name="type"style="width:70px;">
          <option value="1" <if condition=" $searchtype == '1' "> selected</if>>姓名</option>
          <option value="2" <if condition=" $searchtype == '2' "> selected</if>>手机号</option>
          <option value="3" <if condition=" $searchtype == '3' "> selected</if>>身份证</option>
        </select>
        关键字：
        <input type="text" class="input length_2" name="keyword" style="width:200px;" value="{$keyword}" placeholder="请输入关键字...">

        <button class="btn">搜索</button>　　　
        
        <button class="btn export" type="button">导出</button>
        </span>
      </div>
    </div>
  </form> -->

   <div class="table_list">
   <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td width="5%" align="center">序号</td>
            <td width="6%" align="center">ip</td>
            <td width="6%" align="center">医护人员健康征询及相关问题的解答</td>
            <td width="6%" align="center">献血食品</td>
            <td width="6%" align="center">医护人员对个人隐私及相关权利的尊重</td>
            <td width="6%" align="center">医护人员履行献血前告知义务及遵循知情同意原则</td>
            <td width="6%" align="center">医护人员的服务态度</td>
            <td width="8%" align="center">医护人员的言谈举止</td>
            <td width="6%" align="center">医护人员全程情感交流沟通</td>
            <td width="6%" align="center">献血前血液生理知识及献血后注意事项的讲解</td>
            <td width="6%" align="center">献血纪念品</td>
            <td width="8%" align="center">提交时间</td>
            <!-- <td width="5%" align="center">管理操作</td> -->
          </tr>
        </thead>
        <tbody>
        <foreach name="list" item="vo">
          <tr>
            <td width="5%" align="center">{$vo.id}</td>
            <td width="6%" align="center">{$vo.ip}</td>
            <td width="6%" align="center">{$vo.wentijieda}</td>
            <td width="6%" align="center">{$vo.shipin}</td>
            <td width="6%" align="center">{$vo.quanlizunzhong}</td>
            <td width="6%" align="center">{$vo.zhiqingyuanze}</td>
            <td width="6%" align="center">{$vo.fuwutaidu}</td>
            <td width="6%" align="center">{$vo.yantanjuzhi}</td>
            <td width="6%" align="center">{$vo.jiaoliugoutong}</td>
            <td width="6%" align="center">{$vo.jiangjie}</td>
            <td width="6%" align="center">{$vo.jinianpin}</td>
            <td width="8%" align="center">{$vo.add_time|date='Y-m-d H:i:s',###}</td>
            <!-- <td width="5%" align="center">
              <a href='{:U("Pingtai/xianxue_detail",array("id"=>$vo[id]))}'>查看详情</a> | 
              <a href="{:U('Pingtai/xianxue_del',array('id'=>$vo['id']))}" class="J_ajax_del">删除</a>
            </td> -->
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

<script type="text/javascript">
  $(".export").click(function(){

    var url ="/index.php?g=Admin&m=Pingtai&a=export&start_time="+$(".start_time").val()+"&end_time="+$(".end_time").val();
    window.open(url);
});

</script>