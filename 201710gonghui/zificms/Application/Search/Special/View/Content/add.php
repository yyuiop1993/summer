<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>添加新文章 - 系统后台 - {$Config.sitename} - by ShuipFCMS</title>
<Admintemplate file="Admin/Common/Cssjs"/>
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
.list-dot li a.close,.list-dot-othors li a.close{ background: url("{$CurrentDomain}statics/images/cross.png") no-repeat left 3px; display:block; width:16px; height:16px;position: absolute;outline:none;right:5px; bottom:5px}
.list-dot li a.close:hover,.list-dot-othors li a.close:hover{background-position: left -46px}
.list-dot-othors li{float:left;width:24%;overflow:hidden;}
</style>
</head>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
    <ul class="cc">
      <li class="current"><a href="{:U('Content/index', array('specialid'=>$specialid,'menuid'=>$_GET['menuid'])  )}">{$special.title}信息列表</a></li>
    </ul>
  </div>
  <div class="h_a">温馨提示</div>
  <div class="prompt_text"> 
    <p>请不要发布违反法律不允许的内容！</p>
   </div>
  <form name="myform" id="myform" action="{:U("Content/add")}" method="post" class="J_ajaxForms" enctype="multipart/form-data">
  <div class="col-right">
    <div class="table_full">
      <table width="100%">
         <tr>
          <td><div  style="text-align: center;"><input type='hidden' name='info[thumb]' id='thumb' value=''>
			<a href='javascript:void(0);' onclick="flashupload('thumb_images', '附件上传','thumb',thumb_images,'1,jpg|jpeg|gif|png|bmp,1,,,1','Special','8','<?php echo upload_key('1,jpg|jpeg|gif|png|bmp,1,,,1'); ?>');return false;">
			<img src='{$CurrentDomain}statics/images/icon/upload-pic.png' id='thumb_preview' width='135' height='113' style='cursor:hand' /></a>
                       <br/>  <input type="button" class="btn" onclick="crop_cut_thumb($('#thumb').val());return false;" value="裁减图片"> 
            <input type="button"  class="btn" onclick="$('#thumb_preview').attr('src','{$CurrentDomain}statics/images/icon/upload-pic.png');$('#thumb').val('');return false;" value="取消图片"><script type="text/javascript">
            function crop_cut_thumb(id){
	if ( id =='' || id == undefined ) { 
                      isalert('请先上传缩略图！');
                      return false;
                    }
                    var catid = $('input[name="info[catid]"]').val();
                    if(catid == '' ){
                        isalert('请选择栏目ID！');
                        return false;
                    }
                    Wind.use('artDialog','iframeTools',function(){
                      art.dialog.open(GV.DIMAUB+'index.php?a=public_imagescrop&m=Content&g=Contents&catid='+catid+'&picurl='+encodeURIComponent(id)+'&input=thumb&preview=thumb_preview', {
                        title:'裁减图片', 
                        id:'crop',
                        ok: function () {
                            var iframe = this.iframe.contentWindow;
                            if (!iframe.document.body) {
                                 alert('iframe还没加载完毕呢');
                                 return false;
                            }
                            iframe.uploadfile();
                            return false;
                        },
                        cancel: true
                      });
                    });
            };
</script>
                   </div></td>
        </tr>
        <tr>
          <td>发布时间</td>
        </tr>
        <tr>
          <td><?php echo Form::date('info[updatetime]',date('Y-m-d H:i:s'),1); ?></td>
        </tr>
      </table>
    </div>
  </div>
  <div class="col-auto">
    <div class="h_a">文章内容</div>
    <div class="table_full">
      <table width="100%">
            <tr>
              <th width="80">
                所属分类
               </th>
              <td><span class="must_red">*</span><?php echo Form::select($types,0,"name='info[typeid]'",'请选择所属分类'); ?></td>
            </tr>
            <tr>
              <th width="80">
                标题
               </th>
              <td><span class="must_red">*</span><input type="text" style="width:400px;" name="info[title]" id="title" value="" style="color:" class="input input_hd J_title_color" placeholder="请输入标题"/></td>
            </tr>
            <tr>
              <th width="80">
                关键词 
               </th>
              <td><input type='text' name='info[keywords]' id='keywords' value='' style='width:280px'   class='input' placeholder='请输入关键字'> 多关键词之间用空格隔开</td>
            </tr>
            <tr>
              <th width="80">
                转向链接 
               </th>
              <td><input type="text" name="linkurl" id="linkurl" value="" style="width:280px;"maxlength="255" disabled class="input length_3"> <input name="info[islink]" type="checkbox" id="islink" value="1" onclick="ruselinkurl();" > <font color="red">转向链接</font></td>
            </tr>
            <tr>
               <th width="80"> 
               摘要
               </th>
               <td><textarea name="info[description]" id="description" style='width:98%;height:46px;' ></textarea> </td>
             </tr>
             <tr>
              <th width="80">
                内容 
               </th>
              <td><span class="must_red">*</span><script type="text/plain" id="content" name="info[content]"></script><?php echo Form::editor('content','full','Special'); ?></td>
            </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="btn_wrap" style="z-index:999;text-align: center;">
    <div class="btn_wrap_pd">
      <input type="hidden" name="ajax" value="1" />
      <input type="hidden" name="info[specialid]" value="{$specialid}" />
      <button class="btn btn_submit J_ajax_submit_btn"type="submit">提交</button>
      <button class="btn J_ajax_close_btn"type="submit">关闭</button>
    </div>
  </div>
  </form>
</div>
<script type="text/javascript" src="{$CurrentDomain}statics/js/common.js?v"></script>
<script type="text/javascript" src="{$CurrentDomain}statics/js/content_addtop.js"></script>
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
            rules: {'info[typeid]':{required:1},'info[title]':{required:1},'info[content]':{editorcontent:true}},
            //验证未通过提示消息
            messages: {'info[typeid]':{required:'请选择分类'},'info[title]':{required:'请输入标题'},'info[content]':{editorcontent:'内容不能为空'}},
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
											name: '继续添加？',
											callback:function(){
												reloadPage(window);
												return true;
											},
											focus: true
										},{
											name: '关闭当前页面',
											callback:function(){
												window.close();
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