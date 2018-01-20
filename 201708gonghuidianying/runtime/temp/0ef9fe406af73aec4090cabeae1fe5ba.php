<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"D:\www\201708gonghuidianying/application/home\view\role\role_edit.html";i:1495760820;s:71:"D:\www\201708gonghuidianying/application/home\view\Common\baseHome.html";i:1495526040;}*/ ?>
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

tr.title{font-weight: 700;}
td.title_list{margin-left: 10px; }
.title_list_div{width: 150px; float: left; padding: 4px 8px;}

.layui-table{
    margin-left: 50px;
    margin-right: 100px;
    width: 95%;
}
</style>

<!-- 每个页面独自的css -->
</head>

<body style="height:auto;">
    
    

<div class="main">

<span class="layui-breadcrumb">
    <a href="<?php echo url('role/role_list'); ?>">角色列表</a>
    <a><cite>角色编辑</cite></a>
</span>

    <fieldset class="layui-elem-field layui-field-title site-title">
        <legend><a name="nob"><?php echo $headArr['title']; ?></a></legend>
    </fieldset>

    <div class="add_div">

        <form class="layui-form" action="" id="role_from">
            
            <div class="layui-form-item">
                <label class="layui-form-label">名称：</label>
                <div class="layui-input-block">
                    <input type="text" name="role_name"  lay-verify="required" placeholder="请输入名称" autocomplete="off" class="layui-input role_name" value="<?php echo $data['role_name']; ?>">
                </div>
            </div>
            
            <hr>
            <div class="layui-form-item">
                <label class="layui-form-label">分配权限：</label>
                <div class="layui-input-block">
                    
                </div>
            </div>
            
            
                <table class="layui-table">
                        <colgroup>
                            <col>
                        </colgroup>

                            <foreach name="role_title_data" item="vo"> 
                            <?php foreach($role_title_data as $vo): ?> 
                            <tbody class="menu_list_input">
                                <tr class="title">
                                     <td class="title_list">
                                        <div class="title_list_div" >
                                        <input type="checkbox" lay-filter="menu_title"  name="" value="<?php echo $vo['id']; ?>" class="commodity" title="<?php echo $vo['menu_name']; ?>" >
                                        </div> 
                                    </td>
                                </tr>
                                
                                
                                <tr class="title_menu">
                                    <td class="title_list">
                                    <?php foreach($vo['menu'] as $v): ?> 
                                        <div class="title_list_div" >
                                        
                                        <?php if(in_array($v['id'],$role)): ?>
                                            <input type="checkbox" lay-filter="access" name="access[]" class="access" value="<?php echo $v['id']; ?>" checked="checked" title="<?php echo $v['menu_name']; ?>" >
                                        <?php else: ?>
                                            <input type="checkbox" lay-filter="access" name="access[]" class="access" value="<?php echo $v['id']; ?>" title="<?php echo $v['menu_name']; ?>"  >
                                        <?php endif; ?>

                                        
                                        </div> 
                                    <?php endforeach; ?>
                                    </td>
                                </tr>

                                
                            </tbody>
                            <?php endforeach; ?>

                            <tr>
                                <td align="center" height="35px"  colspan="2">
                                <input type="button" value="全选/取消" class="layui-btn" id="Select_btn">
                                </td>
                            </tr>
                    </table>
            

            

            <div class="layui-form-item" style="margin-top:40px;">
                <div class="layui-input-block">
                    <button type="button" class="layui-btn button_sub" >立即提交</button>
                </div>
            </div>
            
            <input type="hidden" value="<?php echo $data['role_id']; ?>" name="role_id" class="role_id" />
        
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

<script type="text/javascript">
$(function(){

layui.use(moudles, function(){  
    var form    = layui.form() //表单

    /*点击主菜单，设置下面所有的全选或者反选*/
    form.on('checkbox(menu_title)', function(data){
        //console.log(data.elem); //得到checkbox原始DOM对象
        //console.log(data.elem.checked); //是否被选中，true或者false
        //console.log(data.value); //复选框value值，也可以通过data.elem.value得到

        var _this = $(data.elem);
        if(_this.prop('checked')){
            _this.parents("tbody").find("input[type='checkbox']").prop("checked",true); 
        }else{
            _this.parents("tbody").find("input[type='checkbox']").prop("checked",false); 
        }
        form.render('checkbox')

    });  
    /*刚刚进来时候，如果子级全部选中那么父级也选中*/
    $(".menu_list_input").each(function(){
        var _this = $(this);
        var _parent_value = true;
        _this.find(".access").each(function(){
            if(!$(this).prop('checked')){
                _parent_value = false;
            }
        })
        if(_parent_value){
            _this.find(".commodity").prop("checked",true);
        }else{
            _this.find(".commodity").prop("checked",false);
        }
        form.render('checkbox')
    })

    //判断子菜单全选，主菜单自动选中
    form.on('checkbox(access)', function(data){
        //console.log(data.elem); //得到checkbox原始DOM对象
        //console.log(data.elem.checked); //是否被选中，true或者false
        //console.log(data.value); //复选框value值，也可以通过data.elem.value得到

        var _this = $(data.elem);
        if(_this.prop('checked')){
            /*点击之后是选中*/
            var _parent = _this.parents("td");
            var _parent_value = true;
            _parent.find(".access").each(function(){
                //console.log($(this).val());
                if(!$(this).prop('checked')){
                    _parent_value = false;
                }
            })
            if(_parent_value){
                _this.parents("tbody").find(".commodity").prop("checked",true);
            }else{
                _this.parents("tbody").find(".commodity").prop("checked",false);
            }
        //_this.parents("tbody").find("input[type='checkbox']").prop("checked","true");
        }else{
            _this.parents("tbody").find(".commodity").prop("checked",false);
        }
        form.render('checkbox')
    });

    //全选/取消按钮
    $("#Select_btn").click(function(){
        var flag = true;
        $(":checkbox").each(function(){
            if(!$(this).prop("checked")){
                flag =false;
                return false;
            }
        });

        if(flag){
            $(":checkbox").prop("checked",false);
        }else{
            $(":checkbox").prop("checked",true);
        }
        form.render('checkbox')
    });

})



    

    //ajax提交
    $(".button_sub").click(function(){
        var role_name =　$(".role_name").val();
    
        if(role_name==''){
            layer.alert("请填写名称!");
            return false;
        }
        
        $.post("<?php echo url('Role/role_edit_ajax'); ?>",$('#role_from').serialize(),function(data){
            //console.log(data);
            if(data.status){ 
                layer.alert(data.msg,function(){
                    window.location.href = "<?php echo url('role/role_edit', 'id='.$data['role_id']); ?>"
                });
            }else{
                layer.alert(data.msg); 
            }
        });

    });

});
</script>
