<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"D:\www\201708gonghuidianying/application/home\view\admin\user_list.html";i:1493860080;s:71:"D:\www\201708gonghuidianying/application/home\view\Common\baseHome.html";i:1495526040;}*/ ?>
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
.menu_del{color: #192E32; text-decoration: underline;}
.menu_del:hover{color: #F50;}
</style>

<!-- 每个页面独自的css -->
</head>

<body style="height:auto;">
    
    
<div class="main">
    <div class="form_div">
        <form action="#" method="get" id="menu_list_search" class="layui-form layui-form-pane">
           　
            <input type="hidden" name="m" value="<?php echo $controller; ?>">
            <input type="hidden" name="a" value="<?php echo $action; ?>">
            
            <div class="search_icon">
                <i class="layui-icon">&#xe615;</i>
            </div>  
            
            <div class="layui-form-item">
                <label class="layui-form-label">登陆名：</label>
                <div class="layui-input-block">
                    <input type="text" name="keyword" lay-verify="title" autocomplete="off"  placeholder="请输入登陆名." class="layui-input">
                </div>
            </div>

            <button class="layui-btn layui-btn-danger" lay-submit lay-filter="menu_list_search" >搜索</button>
            
            <a href="<?php echo url('admin/user_add'); ?>" class="add_button" >添加新管理员</a>

        </form>
    </div>
    <div class="list_div" id="listDiv">
        <table class="layui-table">
            <colgroup>
                <col width="100">
                <col>
                <col>
                <col>
                <col>
                <col>
                <col>
            </colgroup>
            <thead>
                <tr>
                    <th>编号</th>
                    <th>登陆名</th>
                    <th>最后登录IP</th>
                    <th>最后登录时间</th>
                    <th>级别</th>
                    <th>是否可用</th>
                    <th>操作</th>
                </tr> 
            </thead>
            <tbody>

                <?php foreach($list_data as $v): ?> 
                    <tr>
                        <td><?php echo $v['admin_id']; ?></td>
                        <td><?php echo $v['username']; ?></td>
                        <td><?php if($v['last_login_ip'] == ''): ?> 无 <?php else: ?> <?php echo $v['last_login_ip']; endif; ?></td>
                        <td><?php if($v['last_login_time'] == ''): ?> 无 <?php else: ?> <?php echo date("Y-m-d",$v['last_login_time']); endif; ?></td>
                        <td><?php echo $v['role_name']; ?></td>
                        <td><?php if($v['status'] == '1'): ?> 可用 <?php else: ?> 禁用 <?php endif; ?></td>
                        <td>

                            <?php if(\think\Session::get('role_id') == '1'): ?>
                        	   <a href="<?php echo url('admin/user_edit'); ?>?id=<?php echo $v['admin_id']; ?>">修改</a>
                            <?php else: if(\think\Session::get('user_id') == $v['admin_id']): ?>
                                <a href="<?php echo url('admin/user_edit'); ?>?id=<?php echo $v['admin_id']; ?>">修改</a>
                                <?php endif; endif; ?>

                            <a data="<?php echo $v['admin_id']; ?>"  class="menu_del"  >删除</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
        <div class="page">
        	<?php echo $list_data->render(); ?>
        </div>
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
$(".menu_del").click(function(){
    var _this = $(this);
    var id = _this.attr("data");
    layer.confirm('您确定要删除吗？', {
        btn: ['确定','取消'] //按钮
    }, function(index){
        layer.close(index);    
        var id = _this.attr("data");
        var index_load = layer.load(2, {shade: 0.5});
        $.post("<?php echo url('admin/admin_del'); ?>",{id:id},function(data){
            layer.close(index_load); 
            if(data.status){
                layer.msg(data.msg,{icon: 1});  
                _this.parents("tr").remove();
            }else{
                layer.msg(data.msg,{icon: 2});   
            }
        });
    }, function(index){
        layer.close(index);    
    });
});
	
</script>
