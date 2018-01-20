<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"E:\freehost\zhidui0301\web/application/home\view\menu\menu_edit.html";i:1495761086;s:69:"E:\freehost\zhidui0301\web/application/home\view\Common\baseHome.html";i:1495526082;}*/ ?>
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
.layui-input-block > .layui-input{width: 300px;}

.layui-form-select{width: 170px;}

</style>

<!-- 每个页面独自的css -->
</head>

<body style="height:auto;">
    
    

<div class="main">

<span class="layui-breadcrumb">
    <a href="<?php echo url('menu/menu_list'); ?>">菜单管理</a>
    <a><cite><?php echo $headArr['title']; ?></cite></a>
</span>

    <fieldset class="layui-elem-field layui-field-title site-title">
        <legend><a name="nob"><?php echo $headArr['title']; ?></a></legend>
    </fieldset>

    <div class="add_div">

        <form class="layui-form" action="" id="menu_form">
            
            <div class="layui-form-item">
                <label class="layui-form-label">菜单名称：</label>
                <div class="layui-input-block">
                    <input type="text" name="menu_name"  lay-verify="required" placeholder="请输入菜单名称" autocomplete="off" class="layui-input menu_name" value="<?php echo $data['menu_name']; ?>">
                </div>
            </div>
            
            <div class="layui-form-item">
                <label class="layui-form-label">controlla：</label>
                <div class="layui-input-block">
                    <input type="text" name="cc" lay-verify="required" placeholder="请输入controlla名称" autocomplete="off" class="layui-input cc" value="<?php echo $data['c']; ?>">
                </div>
            </div>
            
            <div class="layui-form-item">
                <label class="layui-form-label">function：</label>
                <div class="layui-input-block">
                    <input type="text" name="aa" lay-verify="required" placeholder="请填写function名称" autocomplete="off" class="layui-input aa" value="<?php echo $data['a']; ?>">
                </div>
            </div>
            
            <div class="layui-form-item">
                <label class="layui-form-label">父级菜单：</label>
                <div class="layui-input-block">
                    <select name="fid" lay-verify="required">
                        <option value="0">一级菜单</option>
                        <?php foreach($menu as $v): if($data['fid'] == $v['id']): ?>
                                <option value="<?php echo $v['id']; ?>" selected ><?php echo $v['menu_name']; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $v['id']; ?>" ><?php echo $v['menu_name']; ?></option>
                            <?php endif; endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">是否显示</label>
                <div class="layui-input-block">
                    <?php if($data['shows'] == '1'): ?>
                        <input type="radio" name="shows" class="shows" value="1" title="开启" checked >
                        <input type="radio" name="shows" class="shows" value="0" title="关闭" >
                    <?php else: ?>
                        <input type="radio" name="shows" class="shows" value="1" title="开启"  >
                        <input type="radio" name="shows" class="shows" value="0" title="关闭" checked>
                    <?php endif; ?>
                </div>
            </div>

            <div class="layui-form-item" style="margin-top:40px;">
                <div class="layui-input-block">
                    <button type="button" class="layui-btn button_sub" >立即提交</button>
                </div>
            </div>
            <input type="hidden" value="<?php echo $data['id']; ?>" name="menu_id" class="menu_id" />
        </form>

    </div>
</div>

    
</body>
</html>

<script type="text/javascript">
/*赋予页面高度*/
$(function(){
    parent.index_close();
});
</script>

<script type="text/javascript" src="__JS__/DatePicker/WdatePicker.js"></script>
<script type="text/javascript">
var url = 0;
$(".button_sub").click(function(){

    var menu_name =　$(".menu_name").val();
    var fid =　$(".fid").val();
    var cc =　$(".cc").val();
    var aa =　$(".aa").val();
    var shows =　$(".shows").val();
    
    if(menu_name==''){
        layer.alert("请填写菜单名称!");
        return false;
    }
    if(fid){
        if(cc==''){
            layer.alert("请填写controller名称!");
            return false;
        }
        if(aa==''){
            layer.alert("请填写function名称!");
            return false;
        } 
    }
     
    $.post("<?php echo url('menu/ajax_menu_edit'); ?>",$('#menu_form').serialize(), function(data){
        
         if(data.status){
           	layer.alert(data.msg,function(){
                window.location.href = "<?php echo url('menu/menu_list'); ?>";    
            }); 
        }else{
            layer.alert(data.msg);
        }
    });
    
});


</script>
