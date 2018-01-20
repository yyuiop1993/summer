<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <form method="post" action="{:U('tongji')}">
    <input type="hidden" value="{$catid}" name="catid">
    <input type="hidden" value="0" name="steps">
    <input type="hidden" value="1" name="search">
      <div class="search_type cc mb10">
        <div class="mb10"> 
          <span class="mr20">时间：
          <input type="text" name="start_time" class="input length_2 J_date" value="{$Think.get.start_time}" style="width:80px;">-<input type="text" class="input length_2 J_date" name="end_time" value="{$Think.get.end_time}" style="width:80px;">
          <button class="btn">查询</button>
          </span>
        </div>
      </div>
  </form>
  <form class="J_ajaxForm" action="" method="post">
    <div class="table_list">
      <table width="50%">
        <colgroup>
        
        <col width="15">
        <col width="10">
        </colgroup>
        <thead>
          <tr>
            <td align="left"><span>文章区域</span></td>
            <td align="left">发布数量</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>九曲镇</td>
            <td>{$jiuqu_num}</td>
          </tr>
          <tr>
            <td>凤凰岭镇</td>
            <td>{$fhl_num}</td>
          </tr>
          <tr>
            <td>汤河镇</td>
            <td>{$tanghe_num}</td>
          </tr>

          <tr>
            <td>相公镇</td>
            <td>{$xianggong_num}</td>
          </tr>
            <tr>
            <td>八湖镇</td>
            <td>{$bahu_num}</td>
          </tr>
                    <tr>
            <td>郑旺镇</td>
            <td>{$zhengwang_num}</td>
          </tr>
          <tr>
            <td>太平镇</td>
            <td>{$taiping_num}</td>
          </tr>

          <tr>
            <td>汤头镇</td>
            <td>{$tangtou_num}</td>
          </tr>


        </tbody>
      </table>
      
     
    </div>
    
  </form>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>

</body>
</html>