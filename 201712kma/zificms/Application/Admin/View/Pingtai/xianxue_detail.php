<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
   <Admintemplate file="Common/Nav"/>
   <div class="table_list">
   <form action="{:U('Pingtai/posthf')}" method="post">
   <table width="100%" cellspacing="0">
         
            <!-- <tr width="100%">
              <td width="100%" >
                <table width="100%">        -->
                 <tr> <td align="right" width="15%">序号</td>  <td  align="left" >{$res.id}</td></tr>
                 <tr> <td align="right" width="15%">姓名</td>  <td  align="left" >{$res.name}</td></tr>
                 <tr> <td align="right" width="15%">身份证</td>  <td  align="left" >{$res.card_num}</td></tr>
                 <tr> <td align="right" width="15%">姓名</td>  <td  align="left" >{$res.sex}</td></tr>
                 <tr> <td align="right" width="15%">出生日期</td>  <td  align="left" >{$res.birth}</td></tr>
                 <tr> <td align="right" width="15%">民族</td>  <td  align="left" >{$res.national}</td></tr>
                 <tr> <td align="right" width="15%">次数</td>  <td  align="left" >{$res.cishu}</td></tr>
                 <tr> <td align="right" width="15%">文化程度</td>  <td  align="left" >{$res.wenhua}</td></tr>
                 <tr> <td align="right" width="15%">职业</td>  <td  align="left" >{$res.zhiye}</td></tr>
                 <tr> <td align="right" width="15%">工作单位</td>  <td  align="left" >{$res.danwei}</td></tr>
                 <tr> <td align="right" width="15%">手机</td>  <td  align="left" >{$res.mobile}</td></tr>
                 <tr> <td align="right" width="15%">地址</td>  <td  align="left" >{$res.address}</td></tr>
                 <tr> <td align="right" width="15%">邮箱</td>  <td  align="left" >{$res.mail}</td></tr>
                 <tr> <td align="right" width="15%">QQ</td>  <td  align="left" >{$res.qq}</td></tr>
                 <tr> <td align="right" width="15%">献血量</td>  <td  align="left" >{$res.xianxueliang}</td></tr>
                 <tr> <td align="right" width="15%">时间</td>  <td  align="left" >{$res.add_time|date='Y-m-d H:i:s',###}</td></tr>

                <!-- </table>
              </td>
              <td width="60%">
                  <div style="width: 100%;">
                      <div>
                          <strong style="display: block;">回复内容:</strong>
                          <textarea name="hf_cont" maxlength="255" style=" margin-top: 10px; width:400px;height:240px;">{$res.hf_cont}</textarea>
                      </div>
                      <div style=" margin: 15px 0;">
                          <strong>是否显示</strong>
                          <label><input name="is_show" type="radio" value="1" <if condition="$res['is_show'] eq 1"> checked</if> />显示 </label> 
                          <label><input name="is_show" type="radio" value="0" <if condition="$res['is_show'] eq 0"> checked</if> />不显示 </label> 
                  </div>
              </td>

            </tr> -->
      </table>
       <input name='id' type="hidden" value="{$res.id}" />
       <input name='type' type="hidden" value="{$res.type}" />
       <input name='cl_time' type="hidden" value="{$res.cl_time}" />
      <div>
       <div style=" text-align: center; margin-top: 15px">
          <!-- <button class="btn btn_submit mr10 " type="submit">提交</button> -->
        </div>
      </div>
   </div>
  
  </form>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>
</body>
</html>