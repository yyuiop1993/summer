<template file="Content/header.php"/>
	<!-- fixed1开始 -->
	<div class="fixed fixed1 w1 mg10">
		<div class="tit">
			<span>{:getCategory($catid,'catname')}</span>
			<span>当前位置：<a href="{$config_siteurl}">首页</a>&gt;<navigate catid="$catid" space="&gt;" /></span>
		</div>
		<div class="show">
			<div class="cont">
					{$content}
			</div>	
		</div>
	</div>
	<!-- fixed4开始 -->
<template file="Content/footer.php"/>