<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"D:\www\201708gonghuidianying/application/home\view\admin\user_pwd.html";i:1495760340;s:71:"D:\www\201708gonghuidianying/application/home\view\Common\baseHome.html";i:1495526040;}*/ ?>
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

    <fieldset class="layui-elem-field layui-field-title site-title">
        <legend><a name="nob"><?php echo $headArr['title']; ?></a></legend>
    </fieldset>

    <div class="add_div">

        <form class="layui-form" action="" id="admin_form">
            

            
            
            <div class="layui-form-item">
                <label class="layui-form-label">旧密码：</label>
                <div class="layui-input-block">
                    <input type="password" name="old_password" lay-verify="required" placeholder="请输入旧密码" autocomplete="off" class="layui-input old_password" >
                </div>
            </div>
            
            
            <div class="layui-form-item">
                <label class="layui-form-label">新密码：</label>
                <div class="layui-input-block">
                    <input type="password" name="new_password" lay-verify="required" placeholder="请输入新密码" autocomplete="off" class="layui-input new_password" >
                </div>
            </div>
               
            <div class="layui-form-item">
                <label class="layui-form-label">确认密码：</label>
                <div class="layui-input-block">
                    <input type="password" name="confirm_password" lay-verify="required" placeholder="请输入确认密码" autocomplete="off" class="layui-input confirm_password" >
                </div>
            </div>

            <div class="layui-form-item" style="margin-top:40px;">
                <div class="layui-input-block">
                    <button type="button" class="layui-btn button_sub" >立即提交</button>
                </div>
            </div>
            <input type="hidden" value="<?php echo \think\Session::get('user_id'); ?>" name="admin_id" class="admin_id" />
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

    var old_password =　$(".old_password").val();
    var new_password =　$(".new_password").val();
    var confirm_password  =　$(".confirm_password").val();
    
    if(old_password.length<6){
        layer.alert("请填写至少6位数长度的旧密码!");
        return false;
    }

    if(new_password.length<6){
        layer.alert("请填写至少6位数长度的新密码!");
        return false;
    }

    if(confirm_password.length<6){
        layer.alert("请填写至少6位数长度的确认密码!");
        return false;
    }

    if(new_password==old_password){
        layer.alert("旧密码与新密码相同！");
        return false;
    }

    if(confirm_password!=new_password){
        layer.alert("新密码与确认密码不相同！");
        return false;
    }
    
    $.post("<?php echo url('admin/user_pwd_ajax'); ?>",$('#admin_form').serialize(), function(data){
        if(data.status==1){
            layer.alert(data.msg,function(){
                window.location.href = "<?php echo url('admin/user_pwd'); ?>";    
            }); 
        }else if(data.status==2){
            layer.alert(data.msg);
            $(".old_password").val('');
        }else if(data.status==0){
            layer.alert(data.msg);
        }
    });
    
});


</script>
