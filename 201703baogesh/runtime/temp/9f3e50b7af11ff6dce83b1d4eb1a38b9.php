<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:56:"D:\www\baogesh/application/home\view\admin\user_add.html";i:1495760981;s:57:"D:\www\baogesh/application/home\view\Common\baseHome.html";i:1495526082;}*/ ?>
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
    <a href="<?php echo url('admin/user_list'); ?>">管理员管理</a>
    <a><cite>管理员添加</cite></a>
</span>

    <fieldset class="layui-elem-field layui-field-title site-title">
        <legend><a name="nob"><?php echo $headArr['title']; ?></a></legend>
    </fieldset>

    <div class="add_div">

        <form class="layui-form" action="" id="admin_form">
            
            <div class="layui-form-item">
                <label class="layui-form-label">登录名：</label>
                <div class="layui-input-block">
                    <input type="text" name="username"  lay-verify="required" placeholder="请输入登录名" autocomplete="off" class="layui-input username">
                </div>
            </div>
            
            <div class="layui-form-item">
                <label class="layui-form-label">密码：</label>
                <div class="layui-input-block">
                    <input type="password" name="password" lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input password">
                </div>
            </div>
            
            
            <div class="layui-form-item">
                <label class="layui-form-label">角色：</label>
                <div class="layui-input-block">
                    <select name="role_id" lay-verify="required">
                        <?php foreach($role_data as $v): ?> 
                            <option value="<?php echo $v['role_id']; ?>"><?php echo $v['role_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>


            <div class="layui-form-item" style="margin-top:40px;">
                <div class="layui-input-block">
                    <button type="button" class="layui-btn button_sub" >立即提交</button>
                </div>
            </div>

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

    var username =　$(".username").val();
    var password =　$(".password").val();
    var role_id  =　$(".role_id").val();
    
    if(username==''){
        layer.alert("请填写登录名!",{icon: 1});
        return false;
    }
    if(password.length<6){
        layer.alert("请填写至少6位数长度的密码!");
        return false;
    }
    if(role_id==''){
        layer.alert("请选择角色!");
        return false;
    } 
    
     
    $.post("<?php echo url('admin/ajax_admin_add'); ?>",$('#admin_form').serialize(), function(data){
        
         if(data.status){
           	layer.alert(data.msg,function(){
                window.location.href = "<?php echo url('admin/user_list'); ?>";    
            }); 
        }else{
            layer.alert(data.msg);
        }
    });
    
});


</script>
