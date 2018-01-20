<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"E:\freehost\zhidui0301\web/application/home\view\service\service_suc_list.html";i:1498617904;s:69:"E:\freehost\zhidui0301\web/application/home\view\Common\baseHome.html";i:1495526082;}*/ ?>
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
    
    

<div class="main">
    <div class="form_div">
        <form action="#" method="get" id="menu_list_search" class="layui-form layui-form-pane">
           　

            <div class="search_icon">
                <i class="layui-icon">&#xe615;</i>
            </div>
            
            <div class="layui-form-item">
                <label class="layui-form-label">标题：</label>
                <div class="layui-input-block">
                    <input type="text" name="keyword" lay-verify="title" autocomplete="off"  placeholder="请输入标题 ." class="layui-input">
                </div>
            </div>

            <button class="layui-btn layui-btn-danger" lay-submit lay-filter="menu_list_search" >搜索</button>
            
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
			      	<th>服务站名称</th>
                    <th>审核人</th>
                    <th>审核时间</th>
			      	<th>操作</th>
			    </tr> 
            </thead>
            <tbody>

                <?php foreach($list_data as $v): ?> 
				    <tr>
				        <td><?php echo $v['id']; ?></td>
				        <td><?php echo $v['title']; ?></td>
				        <td><?php echo $v['role_name']; ?></td>
                        <td>
                            <?php 
                            if($role_id == 2){
                                echo $v["username2"];
                            }else if($role_id == 3){
                                echo $v["username3"];
                            }else if($role_id == 4){
                                echo $v["username4"];
                            }else if($role_id == 5){
                                echo $v["username5"];
                            }else if($role_id == 6){
                                echo $v["username6"];
                            }else if($role_id == 7){
                                echo $v["username7"];
                            }else{

                            }
                             ?>
                        </td>
				        <td>
                            <?php 
                            if($role_id == 2){
                                echo date("Y-m-d",$v["time2"]);
                            }else if($role_id == 3){
                                echo date("Y-m-d",$v["time3"]);
                            }else if($role_id == 4){
                                echo date("Y-m-d",$v["time4"]);
                            }else if($role_id == 5){
                                echo date("Y-m-d",$v["time5"]);
                            }else if($role_id == 6){
                                echo date("Y-m-d",$v["time6"]);
                            }else if($role_id == 7){
                                echo date("Y-m-d",$v["time7"]);
                            }else{
                                
                            }
                             ?>
                        </td>
				        <td>
                            <a data-href="<?php echo url('service/service_suc_show',array('id'=>$v['id'])); ?>" class="add_new_tab" data-name="service_suc_show<?php echo $v['id']; ?>" data-text="<?php echo $v['title']; ?>" >查看详情</a>

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
