<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"E:\freehost\zhidui0301\web/application/home\view\service\export.html";i:1495527046;s:69:"E:\freehost\zhidui0301\web/application/home\view\Common\baseHome.html";i:1495526082;s:67:"E:\freehost\zhidui0301\web/application/home\view\Common\system.html";i:1493860088;}*/ ?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<head>
<!-- 引入icon -->
<link rel="icon" href="__IMG__/favicon.ico" />
<!-- 引入base.css -->
<link rel="stylesheet" href="__CSS__/base.css"/>
<!-- 引入layui -->
<script type="text/javascript" src="__JS__/layui/layui.js"></script>
<link rel="stylesheet" href="__JS__/layui/css/layui.css"/>
<link rel="stylesheet" href="__CSS__/layui_user.css"/>
<!-- layer单独使用 -->
<script type="text/javascript" src="__JS__/layer/layer.js"></script>
<link rel="stylesheet" href="__JS__/layer/skin/default/layer.css"/>

<!-- 引入基础js和jquery -->
<script type="text/javascript" src="__JS__/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="__JS__/jquery-pjax-master/jquery.pjax.js"></script>
<script type="text/javascript" src="__JS__/baseHome.js"></script>

<script language="javascript" type="text/javascript" src="__JS__/My97DatePicker/WdatePicker.js"></script>

<title><?php echo $headArr['title']; ?></title>
<meta name="keywords" content="<?php echo $headArr['keyword']; ?>"/>
<meta name="description" content="<?php echo $headArr['description']; ?>"/>

<link rel="stylesheet" href="__CSS__/baseHome.css"/>

<link rel="stylesheet" href="__CSS__/curd.css"/>
<style type="text/css">

</style>

<!-- 每个页面独自的css -->
</head>

<body style="height:auto;">
    
    

<div class="map_form">

        <form action="#" method="get"  class="layui-form">
           　
            <input type="hidden" name="m" value="<?php echo $controller; ?>">
            <input type="hidden" name="a" value="<?php echo $action; ?>">
            <input type="hidden" name="type" value="export">
            
            <div class="layui-form-item">
                <label class="layui-form-label">开始日期：</label>
                <div class="layui-input-inline">
                    <input type="text" name="start_date" onClick="WdatePicker()" lay-verify="title" autocomplete="off"  placeholder="请选择开始日期" require="" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">结束日期：</label>
                <div class="layui-input-inline">
                    <input type="text" name="end_date" onClick="WdatePicker()" lay-verify="title" autocomplete="off"  placeholder="请选择结束日期" require=""  class="layui-input">
                </div>
            </div>

            <div class="form_item layui-form-item" style="display: none;">
                <label class="form_label layui-form-label">故障位置：</label>
                <div class="input_block layui-input-block">
                    <div class="layui-input-inline">
	<select  name="system_main" class="system_main" lay-filter="system_main">
		<option value ="0">请选择</option>
	</select>
</div>

<div class="layui-input-inline" style="margin-left: 20px;">
	<select  name="system_part" class="system_part" lay-filter="system_part">
		<option value ="0">请选择</option>
	</select>
</div>


<script type="text/javascript">
var form;
var system_main = "<?php echo $data['system_main']; ?>";
var system_part = "<?php echo $data['system_part']; ?>";


layui.use(['form'], function(){  
    form = layui.form();


    $(function(){
    	if(system_main){
			
			$.post("/index.php/home/Common/get_system_main",{cid:system_main},function(data){

				$(".system_main").html(data);
				form.render('select');
			})
			
			$.post("/index.php/home/Common/get_system_part",{id:system_main,cid:system_part},function(data){
				if(data){
					$(".system_part").html(data);
					form.render('select');
				}else{
					$(".system_part").html('<option value ="">请选择</option>');
					form.render('select');
				}
			});

		}else{
			$.post("/index.php/home/Common/get_system_main",{cid:0},function(data){
				$(".system_main").html(data);
				form.render('select');
			})
		}
    });

    form.on('select(system_main)', function(data){
	 	console.log(data.elem); //得到select原始DOM对象
	 	console.log(data.value); //得到被选中的值
	 	console.log(data.othis); //得到美化后的DOM对象

	 	var id = data.value;
	 	$.post("/index.php/home/Common/get_system_part",{id:id,cid:0},function(data){
			if(data){
				$(".system_part").html(data);
				form.render('select');
			}else{
				$(".system_part").html('<option value ="">请选择</option>');
				form.render('select');
			}

		});

	});    

});

</script>
                </div>
            </div>

            <div class="form_item layui-form-item">
                <label class="form_label layui-form-label"></label>
                <div class="input_block layui-input-block">
                    <button class="layui-btn layui-btn-danger" lay-submit class="menu_list_search" lay-filter="menu_list_search" >导出</button>
                </div>
            </div>
            
            
            <!-- <a href="<?php echo url('admin/user_add'); ?>" class="add_button" >添加新管理员</a> -->

        </form>

</div>


    
</body>
</html>

<script type="text/javascript">
/*赋予页面高度*/
$(function(){
    parent.index_close();
});
</script>


<script type="text/javascript">

</script>
