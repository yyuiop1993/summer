<template file="Wap/header.php"/>
<style type="text/css">
	p img{
		width: auto;
		max-width: 100%;
	}
	
</style>
<div class="con">
	<!-- <div class="tit"><span>当前位置：<a href="{$config_siteurl}">首页</a>&gt;<navigate catid="$catid" space="&gt;" /></span></div> -->
	<div class="show_title">
		{$title}
	</div>
	<div class="show_title_msg">
		发布日期：{$updatetime}
		&nbsp;&nbsp;&nbsp;&nbsp;浏览次数 : <em id="hit">0</em>次 
	</div>
	<div class="cont">
		段位：{$duanwei}<br>
		{$content}
	</div>
</div>

<template file="Wap/footer.php"/>
<script type="text/javascript">
	$(function (){
		$.get("{$config_siteurl}api.php?m=Hits&catid={$catid}&id={$id}", function (data) {
		    $("#hit").html(data.views);
		}, "json");
	});
</script> 