<?php if (!defined('THINK_PATH')) exit(); if (!defined('SHUIPF_VERSION')) exit(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>单页编辑 - 系统后台 - <?php echo ($Config["sitename"]); ?> - by LvyeCMS</title>
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
<script type="text/javascript">
    var catid = "<?php echo ($catid); ?>";
</script>
<style type="text/css">
.col-auto {
	overflow: hidden;
	_zoom: 1;
	_float: left;
	border: 1px solid #c2d1d8;
}
.col-right {
	float: right;
	width: 210px;
	overflow: hidden;
	margin-left: 6px;
	border: 1px solid #c2d1d8;
}

body fieldset {
	border: 1px solid #D8D8D8;
	padding: 10px;
	background-color: #FFF;
}
body fieldset legend {
    background-color: #F9F9F9;
    border: 1px solid #D8D8D8;
    font-weight: 700;
    padding: 3px 8px;
}
.list-dot{ padding-bottom:10px}
.list-dot li,.list-dot-othors li{padding:5px 0; border-bottom:1px dotted #c6dde0; font-family:"宋体"; color:#bbb; position:relative;_height:22px}
.list-dot li span,.list-dot-othors li span{color:#004499}
.list-dot li a.close span,.list-dot-othors li a.close span{display:none}
.list-dot li a.close,.list-dot-othors li a.close{ background: url("<?php echo ($config_siteurl); ?>statics/images/cross.png") no-repeat left 3px; display:block; width:16px; height:16px;position: absolute;outline:none;right:5px; bottom:5px}
.list-dot li a.close:hover,.list-dot-othors li a.close:hover{background-position: left -46px}
.list-dot-othors li{float:left;width:24%;overflow:hidden;}
</style>
</head>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
    <ul class="cc">
      <li class="current"><a href="javascript:;;">单页管理</a></li>
      <li><a href="<?php echo ($category['url']); ?>" target="_blank">点击访问</a></li>
    </ul>
  </div>
  <form name="myform" id="myform" action="<?php echo U("add");?>" method="post" class="J_ajaxForms" enctype="multipart/form-data">
    <div class="col-auto">
      <div class="h_a">单页内容</div>
    <div class="table_full">
      <table width="100%">
         <tr>
              <th width="80">
                标题 
               </th>
              <td><span class="must_red">*</span><input type="text" style="width:400px;color:<?php echo ($info["style_color"]); ?>;font-weight: <?php echo ($info["style_font_weight"]); ?>;" name="info[title]" id="title" value="<?php echo ($info["title"]); ?>" class="input input_hd J_title_color" placeholder="请输入标题" onkeyup="strlen_verify(this, 'title_len', 160)">
                <input type="hidden" name="style_font_weight" id="style_font_weight" value="<?php echo ($info["style_color"]); ?>">
                    <span class="color_pick J_color_pick"><em style="background:<?php echo ($info["style_color"]); ?>;" class="J_bg"></em></span><input type="hidden" name="style_color" id="style_color" class="J_hidden_color" value="<?php echo ($info["style_font_weight"]); ?>"><img src="/statics/images/icon/bold.png" width="10" height="10" onclick="input_font_bold()" style="cursor:hand"></td>
            </tr>
            <tr>
              <th width="80">
                关键词 
               </th>
              <td><input type="text" name="info[keywords]" id="keywords" value="<?php echo ($info["keywords"]); ?>" style="width:280px" class="input" placeholder="请输入关键字"> 多关键词之间用空格隔开</td>
            </tr>
            <?php if(is_array($extendList)): $i = 0; $__LIST__ = $extendList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
              <th width="80">
                <?php echo ($vo["setting"]["title"]); ?>
               </th>
              <td>
              <?php switch($vo["type"]): case "input": ?><input type="text" class="input" style="<?php echo ($vo["setting"]["style"]); ?>"  name="extend[<?php echo ($vo["fieldname"]); ?>]" value="<?php echo ($extend[$vo['fieldname']]); ?>" placeholder="<?php echo ($vo["setting"]["tips"]); ?>"><?php break;?>
                 <?php case "textarea": ?><textarea name="extend[<?php echo ($vo["fieldname"]); ?>]" style="<?php echo ($vo["setting"]["style"]); ?>" placeholder="<?php echo ($vo["setting"]["tips"]); ?>"><?php echo ($extend[$vo['fieldname']]); ?></textarea><?php break;?>
                 <?php case "password": ?><input type="password" class="input" style="<?php echo ($vo["setting"]["style"]); ?>"  name="extend[<?php echo ($vo["fieldname"]); ?>]" value="<?php echo ($extend[$vo['fieldname']]); ?>" placeholder="<?php echo ($vo["setting"]["tips"]); ?>"><?php break;?>
                 <?php case "radio": if(is_array($vo['setting']['option'])): $i = 0; $__LIST__ = $vo['setting']['option'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rs): $mod = ($i % 2 );++$i;?><label><input name="extend[<?php echo ($vo["fieldname"]); ?>]" value="<?php echo ($rs["value"]); ?>" type="radio"  <?php if( $extend[$vo['fieldname']] == $rs['value'] ): ?>checked<?php endif; ?>> <?php echo ($rs["title"]); ?></label><?php endforeach; endif; else: echo "" ;endif; break;?>
                 <?php case "checkbox": if(is_array($vo['setting']['option'])): $i = 0; $__LIST__ = $vo['setting']['option'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rs): $mod = ($i % 2 );++$i;?><label><input name="extend[<?php echo ($vo["fieldname"]); ?>][]" value="<?php echo ($rs["value"]); ?>" type="checkbox"  <?php if( in_array($rs['value'],$extend[$vo['fieldname']]) ): ?>checked<?php endif; ?>> <?php echo ($rs["title"]); ?></label><?php endforeach; endif; else: echo "" ;endif; break; endswitch;?>
              </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            <tr>
              <th width="80">
                内容正文 
               </th>
              <td><span class="must_red">*</span><div id='content_tip'></div><script type="text/plain" id="content" name="info[content]"><?php echo ($info["content"]); ?></script><?php echo Form::editor('content','full','contents',$catid,1); ?></td>
            </tr>
        </tbody>
      </table>
    </div>
</div>
  <div class="btn_wrap" style="z-index:999;text-align: center;">
    <div class="btn_wrap_pd">
      <input type="hidden" name="ajax" value="1" />
      <input type="hidden" name="info[catid]" value="<?php echo ($catid); ?>" />
      <button class="btn btn_submit J_ajax_submit_btn"type="submit">提交</button>
    </div>
  </div>
  <input type="hidden" name="catid" value="<?php echo ($catid); ?>"/>
  </form>
</div>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/js/common.js?v"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/js/content_addtop.js"></script>
<script type="text/javascript"> 
$(function () {
	$(".J_ajax_close_btn").on('click', function (e) {
	    e.preventDefault();
	    Wind.use("artDialog", function () {
	        art.dialog({
	            id: "question",
	            icon: "question",
	            fixed: true,
	            lock: true,
	            background: "#CCCCCC",
	            opacity: 0,
	            content: "您确定需要关闭当前页面嘛？",
	            ok:function(){
					setCookie("refersh_time",1);
					window.close();
					return true;
				}
	        });
	    });
	});
    Wind.use('validate', 'ajaxForm', 'artDialog', function () {
		//javascript
        //编辑器
            //editorcontent = new baidu.editor.ui.Editor(editor_config_content);
            //editorcontent.render( 'content' );
            //增加编辑器验证规则
            jQuery.validator.addMethod('editorcontent',function(){
                try{editorcontent.sync();}catch(err){};
                return editorcontent.hasContents();
            });
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
            rules: {'info[title]':{required:1},'info[content]':{editorcontent:true}},
            //验证未通过提示消息
            messages: {'info[title]':{required:'请输入标题'},'info[content]':{editorcontent:'内容不能为空'}},
            //给未通过验证的元素加效果,闪烁等
            highlight: false,
            //是否在获取焦点时验证
            onfocusout: false,
            //验证通过，提交表单
            submitHandler: function (forms) {
				var dialog = art.dialog({id: 'loading',fixed: true,lock: true,background: "#CCCCCC",opacity: 0,esc:false,title: false});
                $(forms).ajaxSubmit({
                    url: form.attr('action'), //按钮上是否自定义提交地址(多按钮情况)
                    dataType: 'json',
                    beforeSubmit: function (arr, $form, options) {
                        
                    },
                    success: function (data, statusText, xhr, $form) {
						dialog.close();
                        if(data.status){
							setCookie("refersh_time",1);
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
											name: '确定',
											callback:function(){
												reloadPage(window);
												return true;
											},
											focus: true
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