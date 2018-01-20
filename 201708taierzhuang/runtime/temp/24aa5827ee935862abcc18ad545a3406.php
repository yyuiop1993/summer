<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"D:\www\201708gonghuidianying/application/home\view\service\service_list.html";i:1495525920;s:71:"D:\www\201708gonghuidianying/application/home\view\Common\baseHome.html";i:1495526040;}*/ ?>
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
    
    

<div class="main" id="main">
    <div class="form_div">
        <form action="#" method="get" id="menu_list_search" class="layui-form layui-form-pane">
            
            <input type="hidden" name="m" value="<?php echo $controller; ?>">
            <input type="hidden" name="a" value="<?php echo $action; ?>">
            <input type="hidden" name="type" value="export">
            
            <!-- <div class="search_icon">
                <i class="layui-icon">&#xe615;</i>
            </div>   -->
            
            <div class="layui-form-item">
                <label class="layui-form-label">开始日期：</label>
                <div class="layui-input-block">
                    <input type="text" name="start_date" onClick="WdatePicker()" lay-verify="title" autocomplete="off"  placeholder="请选择开始日期：" require="" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">结束日期：</label>
                <div class="layui-input-block">
                    <div class="layui-input-block" style="margin-left: 0px;">
                    <input type="text" name="end_date" onClick="WdatePicker()" lay-verify="title" autocomplete="off"  placeholder="请选择结束日期：" require=""  class="layui-input">
                </div>
                </div>
            </div>
            

            <button class="layui-btn layui-btn-danger" lay-submit lay-filter="menu_list_search" >导出</button>
            
            <!-- <a href="<?php echo url('admin/user_add'); ?>" class="add_button" >添加新管理员</a> -->

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
            </colgroup>
            <thead>
                <tr>
			      	<th>编号</th>
			      	<th>标题</th>
			      	<th>用户名</th>
                    <th>服务站名称</th>
			      	<th>添加时间</th>
			      	<th>操作</th>
			    </tr> 
            </thead>
            <tbody>

                <?php foreach($list_data as $v): ?> 
				    <tr>
				        <td><?php echo $v['id']; ?></td>
				        <td><?php echo $v['title']; ?></td>
				        <td><?php echo $v['username']; ?></td>
                        <td><?php echo $v['role_name']; ?></td>
				        <td><?php echo date("Y-m-d",$v['add_time']); ?></td>
				        <td>
                            <a data-href="<?php echo url('service/service_list_show',array('id'=>$v['id'])); ?>" class="add_new_tab" data-name="service_show<?php echo $v['id']; ?>" data-text="<?php echo $v['title']; ?>" >查看详情</a>
                            <?php if(\think\Session::get('role_id') == 1): ?>
                            <a data="<?php echo $v['id']; ?>"  class="menu_del"  >删除</a>
                            <?php endif; ?>
                        </td>
				    </tr>
				<?php endforeach; ?>

            </tbody>
        </table>
        <?php echo $list_data->render(); ?>
        <div style="height: 30px; clear: both;">&nbsp;</div>
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
        $.post("<?php echo url('service/service_del'); ?>",{id:id},function(data){
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
