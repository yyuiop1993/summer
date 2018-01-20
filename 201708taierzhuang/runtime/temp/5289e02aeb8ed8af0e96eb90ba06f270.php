<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"/www/wwwroot/tez.lyzfrj.com/application/admin/view/index/main.html";i:1503546006;s:71:"/www/wwwroot/tez.lyzfrj.com/application/admin/view/Common/baseHome.html";i:1504101306;}*/ ?>
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

<style>
td:first-child{
	text-align: right;
}
</style>

<!-- 每个页面独自的css -->
</head>

<body style="height:100%;">
    
    


<div class="main">
	<table class="layui-table" lay-skin="line">
	<colgroup>
		<col width="150">
	<col>
	</colgroup>
		<thead>
			<tr >
				<th colspan="2">网站信息</th>
			</tr> 
		</thead>
		<tbody>
			
			<tr>
				<td>当前时间：</td>
				<td><a class="time"><?php echo date("Y-m-d H:i:s");?></a></td>
			</tr>

			<tr>
				<td>当前域名：</td>
				<td><?php echo $domain; ?></td>
			</tr>
			
			
			<tr>
				<td>运行环境：</td>
				<td><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
			</tr>


			<tr>
				<td>技术支持：</td>
				<td><a href="http://www.zhifengchina.cn" target="_blank">www.zhifengchina.cn</a></td>
			</tr>
		</tbody>
	</table>
</div>




    
</body>
</html>

<script type="text/javascript">
/*赋予页面高度*/
$(function(){
    //parent.index_close();
});
</script>

<script type="text/javascript">

var height =  $("body").height()
$("body").height(height-10);

$(function(){ 
	setInterval("getTime();",1000); //每隔一秒执行一次 
}) 
//取得系统当前时间 
function getTime(){ 
	var myDate = new Date(); 
	//var date = myDate.toLocaleDateString(); 
	var year  = myDate.getFullYear();
    var month = myDate.getMonth() + 1;
    if(month<10){month = "0"+month}
    var day   = myDate.getDate();

	var hours   = myDate.getHours(); 
	var minutes = myDate.getMinutes(); 
	var seconds = myDate.getSeconds(); 
	$(".time").html(year+"-"+month+"-"+day+" "+hours+":"+minutes+":"+seconds); //将值赋给div 
} 
</script>
