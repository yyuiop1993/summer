<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
  <div id="home_toptip"></div>
  <h2 class="h_a">系统信息</h2>
  <div class="home_info">
    <ul>
      <volist name="server_info" id="vo">
        <li> <em>{$key}</em> <span>{$vo}</span> </li>
      </volist>
    </ul>
  </div>


  <h2 class="h_a">授权信息</h2>
  <div class="home_info">
    <ul>
      
        <li> <em>客服电话：</em> <span>0539-8023377</span> </li>
        <li> <em>联系QQ：</em> <span><a href="http://wpa.qq.com/msgrd?v=3&uin=976545747&site=qq&menu=yes" target="_blank">976545747</a></span> </li>
        <li> <em>官方网站：</em> <span><a href="http://www.zhifengchina.cn" target="_blank">www.zhifengchina.cn</a></span> </li>
      
    </ul>
  </div>


  </form>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script> 


</body>
</html>