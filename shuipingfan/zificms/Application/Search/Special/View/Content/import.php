<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="h_a">搜索</div>
  <form id="import" method="get" action="">
  <input type="hidden" value="Special" name="g">
  <input type="hidden" value="Content" name="m">
  <input type="hidden" value="import" name="a">
  <input type="hidden" value="{$specialid}" name="specialid">
  <input type="hidden" value="1" name="search">
    <div class="search_type cc mb10">
      <div class="mb10"> 
        <span class="mr20">
        模型：<select class="select_2" name="modelid" onChange="$('#import').submit()">
        <option value='' >选择内容模型</option>
        <volist name="models" id="vo">
          <option value='{$vo.modelid}' <if condition=" $modelid == $vo['modelid'] "> selected</if>>{$vo.name}</option>
        </volist>
        </select>
        <if condition="$modelid ">
        栏目：<select class="select_2" name="catid">
          <option value='' >选择栏目</option>
          <volist name="catList" id="vo">
          <option value="{$vo.catid}" <if condition=" $catid == $vo['catid'] "> selected</if>>{$vo['catname']}</option>
          </volist>
        </select>
        
        时间：
        <input type="text" name="start_time" class="input length_2 J_date" value="{$Think.get.start_time}" style="width:80px;">-<input type="text" class="input length_2 J_date" name="end_time" value="{$Think.get.end_time}" style="width:80px;">
        关键字：
        <input type="text" class="input length_2" name="keyword" style="width:200px;" value="{$keyword}" placeholder="请输入关键字...">
        </if>
        <button class="btn">搜索</button>
        </span>
      </div>
    </div>
  </form>
  <form class="J_ajaxForm" action="{:U('Content/import')}" method="post">
    <div class="table_list">
      <table width="100%">
        <colgroup>
        <col width="16">
        <col width="60">
        <col width="">
        <col width="80">
        <col width="90">
        <col width="140">
        </colgroup>
        <thead>
          <tr>
            <td><label><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></label></td>
            <td>ID</td>
            <td>标题</td>
            <td>点击量</td>
            <td>发布人</td>
            <td><span>发帖时间</span></td>
          </tr>
        </thead>
        <volist name="data" id="vo">
          <tr>
            <td><input type="checkbox" class="J_check" data-yid="J_check_y" data-xid="J_check_x" name="ids[]" value="{$vo.id}"></td>
            <td>{$vo.id}</td>
            <td><a href="{$vo.url}" target="_blank">{$vo.title}</a>
              <if condition=" $vo['thumb']!='' "> <img src="{$CurrentDomain}statics/images/icon/small_img.gif" title="标题图片"> </if>
              <if condition=" $vo['posid'] "> <img src="{$CurrentDomain}statics/images/icon/small_elite.gif" title="推荐位"> </if>
              <if condition=" $vo['islink'] "> <img src="{$CurrentDomain}statics/images/icon/link.png" title="转向地址"> </if></td>
            <td>{$vo.views}</td>
            <td><if condition=" $vo['sysadd'] ">{$vo.username}<else />
                <font color="#FF0000">{$vo.username}</font><img src="{$$CurrentDomain}statics/images/icon/contribute.png" title="会员投稿"></if></td>
            <td>{$vo.updatetime|date="Y-m-d H:i:s",###}</td>
          </tr>
        </volist>
      </table>
      <div class="p10"><div class="pages"> {$Page} </div> </div>
     
    </div>
    <div class="btn_wrap">
      <div class="btn_wrap_pd">
        <input type="hidden" value="{$specialid}" name="specialid">
        <input type="hidden" value="{$modelid}" name="modelid">
        <label class="mr20"><input type="checkbox" class="J_check_all" data-direction="y" data-checklist="J_check_y">全选</label>  
        <?php echo Form::select($types,0,"name='typeid'",'请选择所属分类'); ?> 
        <button class="btn J_ajax_submit_btn btn_submit" type="submit" >导入</button>
      </div>
    </div>
  </form>
</div>
<script src="{$CurrentDomain}statics/js/common.js?v"></script>
</body>
</html>