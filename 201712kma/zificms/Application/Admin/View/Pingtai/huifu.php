<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
   <Admintemplate file="Common/Nav"/>
   <div class="table_list">
   <form action="{:U('Pingtai/posthf')}" method="post">
   <table width="100%" cellspacing="0">
         
            <tr width="100%">
              <td width="40%" >
                <table width="100%">       
                     <tr > <td  align="center" width="15%">序号</td>  <td  align="left" >{$res.id}</td></tr>
                     <tr> <td  align="center" width="15%">主题</td>  <td  align="left" >{$res.title}</td></tr>
                     <tr> <td  align="center" width="15%">姓名</td>  <td  align="left" >{$res.name}</td></tr>
                     <tr> <td  align="center" width="15%">手机</td>  <td  align="left" >{$res.phone}</td></tr>
                     <tr> <td  align="center" width="15%">邮箱</td>  <td  align="left" >{$res.mail}</td></tr>
                     <tr> <td  align="center" width="15%">QQ</td>  <td  align="left" >{$res.qq}</td></tr>
                     <tr> <td  align="center" width="15%">时间</td>  <td  align="left" >{$res.add_time|date='Y-m-d H:i:s',###}</td></tr>
                     <tr> <td  align="center" width="15%">内容</td>  <td  align="left" >{$res.cont}</td></tr>
                </table>
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
            </tr>
      </table>
       <input name='id' type="hidden" value="{$res.id}" />
       <input name='type' type="hidden" value="{$res.type}" />
       <input name='cl_time' type="hidden" value="{$res.cl_time}" />
      <div>
       <div style=" text-align: center; margin-top: 15px">
          <button class="btn btn_submit mr10 " type="submit">提交</button>
        </div>
      </div>
   </div>
  
  </form>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>
</body>
</html>