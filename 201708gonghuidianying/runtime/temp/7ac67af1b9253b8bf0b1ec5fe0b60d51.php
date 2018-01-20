<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"E:\freehost\zhidui0301\web/application/wx\view\service\service_list.html";i:1496739670;s:67:"E:\freehost\zhidui0301\web/application/wx\view\Common\baseHome.html";i:1493860094;}*/ ?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="white" />

<head>
<!-- 引入icon -->
<link rel="icon" href="__IMG__/favicon.ico" />
<!-- 引入base.css -->
<link rel="stylesheet" href="__CSS__/base.css"/>

<script type="text/javascript" src="__JS__/layui/layui.js"></script>
<link rel="stylesheet" href="__JS__/layui/css/layui.css"/>

<!-- layer单独使用 -->
<script type="text/javascript" src="__JS__/layer/layer.js"></script>
<link rel="stylesheet" href="__JS__/layer/skin/default/layer.css"/>
<!-- 引入基础js和jquery -->
<script type="text/javascript" src="__JS__/jquery-2.1.4.min.js"></script>

<title><?php echo $headArr['title']; ?></title>
<meta name="keywords" content="<?php echo $headArr['keyword']; ?>"/>
<meta name="description" content="<?php echo $headArr['description']; ?>"/>



<link rel="stylesheet" href="__CSS__/service_list.css"/>
<style type="text/css">

</style>

<style type="text/css">

</style>
<!-- 每个页面独自的css -->
</head>

<body style="height:100%">

<div id="wrap">
    
<div class="back">
    <a href="<?php echo url('service/index'); ?>">&lt;返回</a>
    服务信息列表
</div>

<div class="content">
 
 
<table class="layui-table">
	<colgroup>
	    <col width="10%">
	    <col width="30%">
	    <col>
	    <col>
	    <col>
	</colgroup>
	<thead>
	    <tr>
	      <th>编号</th>
	      <th>标题</th>
	      <th>添加时间</th>
	      <th>操作</th>
	    </tr> 
	</thead>
	<tbody>
		<?php foreach($list_data as $v): ?> 
	    <tr>
	      	<td><?php echo $v['id']; ?></td>
	      	<td><?php echo $v['title']; ?></td>
	      	<td><?php echo date("Y-m-d",$v['add_time']); ?></td>

	      	<td>
	      		<?php if(($v['status2'] == 3) || ($v['status3'] == 2) || ($v['status4'] == 3) || ($v['status5'] == 3) || ($v['status6'] == 3)): ?>
                    <a href="<?php echo url('service/service_edit',array('id'=>$v['id'])); ?>">修改</a><br>
                <?php else: ?>
                    <a href="<?php echo url('service/service_show',array('id'=>$v['id'])); ?>">查看</a><br>
                <?php endif; if($v['status2'] == 2): ?>
                <a href="<?php echo url('service/service_show_view',array('id'=>$v['id'])); ?>" >审批信息</a>
                <?php endif; ?>
	      	</td>
	    </tr>
	   <?php endforeach; ?>
	</tbody>
	</table>
	<?php echo $list_data->render(); ?>
</div>

</div>


</body>
</html>

<script type="text/javascript">


</script>

<script type="text/javascript">

</script>
