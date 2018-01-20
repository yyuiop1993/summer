<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"E:\freehost\zhidui0301\web/application/wx\view\service\service_show_view.html";i:1495531922;s:67:"E:\freehost\zhidui0301\web/application/wx\view\Common\baseHome.html";i:1493860094;}*/ ?>
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
    <a href="<?php echo url('service/service_list'); ?>">&lt;返回</a>
    服务信息列表
</div>

<div class="content">

<?php if(is_array($view_data) || $view_data instanceof \think\Collection || $view_data instanceof \think\Paginator): if( count($view_data)==0 ) : echo "" ;else: foreach($view_data as $key=>$v): ?>
<table class="layui-table" style="margin-top: 10px;">
    <colgroup>
        <col width="100">
        <col>
    </colgroup>
    <thead>
    </thead>
    <tbody>
        <tr>
            <th>部门：</th>
            <td><?php echo $v['role_name']; ?></td>
        </tr>
        <tr>
            <th>是否通过</th>
            <td>
                <?php if($v['view_status'] == '2'): ?>
                通过
                <?php else: ?>驳回
                <?php endif; ?>
            </td>
            
        </tr>
        <tr>
            <th>审批意见</th>
            <td>
                <?php echo $v['view_content']; ?>
            </td>
        </tr>

        <tr>
            <th>审核时间</th>
            <td>
                <?php echo date('Y-m-d',$v['add_time']); ?>
            </td>
        </tr>

    </tbody>
</table>
<?php endforeach; endif; else: echo "" ;endif; ?>


</div>

</div>


</body>
</html>

<script type="text/javascript">


</script>

<script type="text/javascript">

</script>
