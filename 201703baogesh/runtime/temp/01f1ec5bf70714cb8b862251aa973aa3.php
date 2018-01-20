<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"D:\www\baogesh/application/home\view\service\service_user_list.html";i:1495270772;s:57:"D:\www\baogesh/application/home\view\Common\baseHome.html";i:1495270790;}*/ ?>
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
<script type="text/javascript" src="__JS__/baseHome.js"></script>
<script language="javascript" type="text/javascript" src="__JS__/My97DatePicker/WdatePicker.js"></script>

<title><?php echo $headArr['title']; ?></title>
<meta name="keywords" content="<?php echo $headArr['keyword']; ?>"/>
<meta name="description" content="<?php echo $headArr['description']; ?>"/>

<link rel="stylesheet" href="__CSS__/baseHome.css"/>

<link rel="stylesheet" href="__CSS__/curd.css"/>
<style type="text/css">
.layui-table{
    width: 98%;
}
</style>

<!-- 每个页面独自的css -->
</head>

<body style="height:auto;">
    
    

<div class="main">
    <div class="form_div" style="display: none">
        <form action="#" method="get" id="menu_list_search" class="layui-form layui-form-pane">
           　
            <input type="hidden" name="m" value="<?php echo $controller; ?>">
            <input type="hidden" name="a" value="<?php echo $action; ?>">
            <input type="hidden" name="type" value="export">
            <!-- <div class="search_icon">
                <i class="layui-icon">&#xe615;</i>
            </div>   -->
            
            <!-- <div class="layui-form-item">
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
        
            <button class="layui-btn layui-btn-danger" lay-submit lay-filter="menu_list_search" >导出</button> -->
            
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
			      	<th>状态</th>
                    <th>添加时间</th>
			      	<th>操作</th>
			    </tr> 
            </thead>
            <tbody>

                <?php foreach($list_data as $v): ?> 
				    <tr>
				        <td><?php echo $v['id']; ?></td>
				        <td><?php echo $v['title']; ?></td>
				        <td><?php echo $v['user_name']; ?></td>
                        <td>
                            <?php if($v['status'] == '1'): ?>待审核<br/><?php endif; if($v['status'] == '2'): ?>信息员已通过<br/><?php endif; if($v['status'] == '3'): ?>信息员已驳回<br/><?php endif; if($v['support_status'] == '2'): ?>售后服务部已通过<br/><?php endif; if($v['support_status'] == '3'): ?>售后服务部已驳回<br/><?php endif; if($v['tech_status'] == '2'): ?>技术部已通过<br/><?php endif; if($v['tech_status'] == '3'): ?>技术部已驳回<br/><?php endif; if($v['leader_status'] == '2'): ?>分管领导已通过<?php endif; if($v['leader_status'] == '3'): ?>分管领导已驳回<?php endif; ?>
                        </td>
                        <td><?php echo date("Y-m-d",$v['add_time']); ?></td>

				        <td>
                        <?php if(($v['status'] != 2) || ($v['support_status'] != 2) || ($v['tech_status'] != 2) || ($v['leader_status'] != 2)): ?>
                            <a href="<?php echo url('service/service_user_edit',array('id'=>$v['id'])); ?>">修改</a>
                        <?php else: ?>
                            <a href="<?php echo url('service/service_user_show',array('id'=>$v['id'])); ?>">查看</a>
                        <?php endif; ?>
                        </td>

				    </tr>
				<?php endforeach; ?>

            </tbody>
        </table>
        <?php echo $show; ?>
    </div>

</div>


    
</body>
</html>

<script type="text/javascript">
/*赋予页面高度*/
$(function(){
    //$("body").css("height","auto");

    //var height =  $(window).height()-$(".head_box").height()
    //$(".content").height(height);
    //$("#main_tab").height(height-2);
    //$(".layui-nav.layui-nav-tree").height(height-2);

   // var dh=$(window).height();//网页可视区高度
    
    //$(".middle_left").scroll(function() {
        //var hidtop=$(document).scrollTop();//网页被卷去的高度
        //console.log(hidtop);
    //});
});
</script>

<script type="text/javascript">

</script>
