	<template file="Content/header.php"/>
	<style type="text/css">
	.content{margin-bottom: 60px;}
	.yuyue{
		position: fixed;
		bottom: 0px;
	}
	</style>
	
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/page.css">

	<div class="hearder-top"><a href="/index.php?a=lists&catid=19"  class="bank"></a>{$title}<span class="share"></span></div>

	<div class="content kecheng clearfix">

		<div class="w">
			{:getCategory($id,'description')}

			<div class="img"><img src="{$thumb}" alt="{$title}"></div>

			<div class="title">
				<h3>{$title}</h3>
				<p>{$updatetime|date="Y/m/d",###}</p>
			</div>

			<div class="inner clearfix">
				{$content}
			</div>

		</div>

		<!-- <div class="yuyue"><a href="/index.php?a=lists&catid=18&teacher={$id}" >预约课程</a></div> -->
		
	</div>



	<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/page.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/share.js"></script>

	<!-- content end -->
	<template file="Content/footer.php"/>
	<script type="text/javascript">
		$(function (){	
			$.get("{$config_siteurl}api.php?m=Hits&catid={$catid}&id={$id}", function (data) {
			    $("#hit").html(data.views);
			}, "json");
		});
	</script>