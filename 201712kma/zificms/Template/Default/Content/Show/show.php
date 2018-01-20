	<template file="Content/header.php"/>

	<!-- content start -->
	<div class="list_content clearfix">
		<div class="clearfix" style="height: 20px;background-color: #fff;">&nbsp;</div>
		
		<template file="Content/left.php"/>

		<div class="content-r fr">
			<div class="page-title clearfix">
				<span>{$title}</span>
			</div>

			<div class="page-title2 clearfix">
				<span>发布于：{$updatetime|date="Y-m-d H:i:s",###} &nbsp;&nbsp;&nbsp;&nbsp;浏览次数 : <em id="hit">0</em>次</span>
			</div>

			<div class="page-inner clearfix">
				{$content}
			</div>
			
			<div class="page_bottom clearfix">
				<span>下一篇 : </span>
				<pre target="1" msg="已经没有了" />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span>上一篇 : </span>
				<next target="1" msg="已经没有了" />
	        </div>


		</div>
	</div>


	<template file="Content/footer.php"/>
	

		

	<script type="text/javascript">
		$(function (){
			
			$.get("{$config_siteurl}api.php?m=Hits&catid={$catid}&id={$id}", function (data) {
			    $("#hit").html(data.views);
			}, "json");
		});
	</script> 