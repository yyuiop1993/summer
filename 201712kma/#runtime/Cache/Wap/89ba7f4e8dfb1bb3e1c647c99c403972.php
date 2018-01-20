<?php if (!defined('THINK_PATH')) exit(); if (!defined('SHUIPF_VERSION')) exit(); ?>
<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>系统后台 - <?php echo ($Config["sitename"]); ?> - by LvyeCMS</title>
<?php if (!defined('SHUIPF_VERSION')) exit(); ?><link href="<?php echo ($config_siteurl); ?>statics/css/admin_style.css" rel="stylesheet" />
<link href="<?php echo ($config_siteurl); ?>statics/js/artDialog/skins/default.css" rel="stylesheet" />
<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "<?php echo ($config_siteurl); ?>",
	JS_ROOT: "<?php echo ($config_siteurl); ?>statics/js/"
};
</script>
<script src="<?php echo ($config_siteurl); ?>statics/js/wind.js"></script>
<script src="<?php echo ($config_siteurl); ?>statics/js/jquery.js"></script>
</head>
<body class="J_scroll_fixed">
<style>
.pop_nav{
	padding: 0px;
}
.pop_nav ul{
	border-bottom:1px solid #266AAE;
	padding:0 5px;
	height:25px;
	clear:both;
}
.pop_nav ul li.current a{
	border:1px solid #266AAE;
	border-bottom:0 none;
	color:#333;
	font-weight:700;
	background:#F3F3F3;
	position:relative;
	border-radius:2px;
	margin-bottom:-1px;
}

</style>
<div class="wrap J_check_wrap">
  <?php  $getMenu = isset($Custom)?$Custom:D('Admin/Menu')->getMenu(); if($getMenu) { ?>
<div class="nav">
  <?php
 if(!empty($menuReturn)){ echo '<div class="return"><a href="'.$menuReturn['url'].'">'.$menuReturn['name'].'</a></div>'; } ?>
  <ul class="cc">
    <?php
 foreach($getMenu as $r){ $app = $r['app']; $controller = $r['controller']; $action = $r['action']; ?>
    <li <?php echo $action==ACTION_NAME ?'class="current"':""; ?>><a href="<?php echo U("".$app."/".$controller."/".$action."",$r['parameter']);?>" <?php echo $r['target']?'target="'.$r['target'].'"':"" ?>><?php echo $r['name'];?></a></li>
    <?php
 } ?>
  </ul>
</div>
<?php } ?>
  <div class="pop_nav">
    <ul class="J_tabs_nav">
      <li class="current"><a href="javascript:;;">[<font color='red'><?php echo ($data["catname"]); ?></font>]的3G版本基本属性</a></li>
      
    </ul>
  </div>
  <form class="J_ajaxForms" name="myform" id="myform" action="<?php echo U("Wap/edit");?>" method="post">
    <div class="J_tabs_contents">
      <div>
        <div class="h_a">基本属性</div>
        <div class="table_full">
          <table width="100%" class="table_form ">
            <?php if($data['child']): ?><tr id="fmmb">
              <th width="200">3G版栏目首页模板：</th>
              <td><select name="setting[wapcategory_template]" id="wapcategory_template">
                  <option value="category<?php echo C("TMPL_TEMPLATE_SUFFIX")?>" selected>默认栏目首页：category<?php echo C("TMPL_TEMPLATE_SUFFIX")?></option>
                  <?php if(is_array($tp_category)): $i = 0; $__LIST__ = $tp_category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo); ?>" <?php if($data['setting']['wapcategory_template'] == $vo ): ?>selected<?php endif; ?>><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
                <span class="gray">新增模板以category_x <?php echo C("TMPL_TEMPLATE_SUFFIX")?>形式 请放在Wap目录</span>
                </td>
            </tr>
            <?php else: ?>
            <tr>
              <th width="200">3G版栏目列表：</th>
              <td><select name="setting[waplist_template]" id="wap_template">
                  <option value="list<?php echo C("TMPL_TEMPLATE_SUFFIX")?>" selected>默认列表页：list<?php echo C("TMPL_TEMPLATE_SUFFIX")?></option>
                  <?php if(is_array($tp_list)): $i = 0; $__LIST__ = $tp_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo); ?>" <?php if($data['setting']['waplist_template'] == $vo ): ?>selected<?php endif; ?>><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
                <span class="gray">新增模板以list_x<?php echo C("TMPL_TEMPLATE_SUFFIX")?>形式</span></td>
            </tr>
            <tr  id="plmb">
              <th width="200">3G版栏目内容页：</th>
              <td><select name="setting[wapshow_template]" id="wapshow_template">
                  <option value="show<?php echo C("TMPL_TEMPLATE_SUFFIX")?>" selected>默认内容页：show<?php echo C("TMPL_TEMPLATE_SUFFIX")?></option>
                  <?php if(is_array($tp_show)): $i = 0; $__LIST__ = $tp_show;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo); ?>" <?php if($data['setting']['wapshow_template'] == $vo ): ?>selected<?php endif; ?>><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
                <span class="gray">新增模板以show_x<?php echo C("TMPL_TEMPLATE_SUFFIX")?>形式</span></td>
            </tr><?php endif; ?>
             
          </table>
        </div>
      </div>
       
       
       
      </div>
    </div>
    <div class="btn_wrap">
      <div class="btn_wrap_pd">
         
        <input name="catid" type="hidden" value="<?php echo ($data["catid"]); ?>">
        <button class="btn btn_submit mr10 " type="submit">提交</button>
      </div>
    </div>
  </form>
</div>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/js/common.js?v"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/js/content_addtop.js"></script>
<script type="text/javascript">
 

$(function(){
	 
	
    Wind.use('validate', 'ajaxForm', 'artDialog', function () {
        var form = $('form.J_ajaxForms');
        //ie处理placeholder提交问题
        if ($.browser.msie) {
            form.find('[placeholder]').each(function () {
                var input = $(this);
                if (input.val() == input.attr('placeholder')) {
                    input.val('');
                }
            });
        }
        //表单验证开始
        form.validate({
			//是否在获取焦点时验证
			onfocusout:false,
			//是否在敲击键盘时验证
			onkeyup:false,
			//当鼠标掉级时验证
			onclick: false,
            //验证错误
            showErrors: function (errorMap, errorArr) {
				//errorMap {'name':'错误信息'}
				//errorArr [{'message':'错误信息',element:({})}]
				try{
					$(errorArr[0].element).focus();
					art.dialog({
						id:'error',
						icon: 'error',
						lock: true,
						fixed: true,
						background:"#CCCCCC",
						opacity:0,
						content: errorArr[0].message,
						cancelVal: '确定',
						cancel: function(){
							$(errorArr[0].element).focus();
						}
					});
				}catch(err){
				}
            },
            //验证规则
            rules: {
				"info[modelid]":{
					required:true
				},
				"info[catname]":{
					required:true
				},
				"info[catdir]":{
					required:true
				}
			},
            //验证未通过提示消息
            messages: {
				"info[modelid]":{
					required:"所属模型不能为空！"
				},
				"info[catname]":{
					required:"栏目名称不能为空！"
				},
				"info[catdir]":{
					required:"栏目目录不能为空！"
				}
			},
            //给未通过验证的元素加效果,闪烁等
            highlight: false,
            //是否在获取焦点时验证
            onfocusout: false,
            //验证通过，提交表单
            submitHandler: function (forms) {
                $(forms).ajaxSubmit({
                    url: form.attr('action'), //按钮上是否自定义提交地址(多按钮情况)
                    dataType: 'json',
                    beforeSubmit: function (arr, $form, options) {
                        
                    },
                    success: function (data, statusText, xhr, $form) {
                        if(data.status){
							//添加成功
							Wind.use("artDialog", function () {
							    art.dialog({
							        id: "succeed",
							        icon: "succeed",
							        fixed: true,
							        lock: true,
							        background: "#CCCCCC",
							        opacity: 0,
							        content: data.info,
									button:[
										{
											name: '去更新缓存',
											callback:function(){
												window.location.href = "<?php echo U('Wap/public_cache');?>";
												return true;
											},
											focus: true
										},{
											name: '返回3G版栏目管理页',
											callback:function(){
												window.location.href = "<?php echo U('Wap/index');?>";
												return true;
											}
										}
									]
							    });
							});
						}else{
							isalert(data.info);
						}
                    }
                });
            }
        });
    });
});
</script>
</body>
</html>