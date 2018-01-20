<template file="Content/header.php"/>
	<!-- fixed1开始 -->
	<div class="fixed fixed1 w1 mg10">
		<div class="tit">
			<span>{:getCategory($catid,'catname')}</span>
			<span>当前位置：<a href="{$config_siteurl}">首页</a>&gt;<navigate catid="$catid" space="&gt;" /></span>
		</div>
		<div class="show">
			<div class="showt">
				<h1>{$title}</h1>
				<div class="date">发布日期：{$updatetime} 作者：{$username}</div>
			</div>
			<div class="cont">
				{$content}
			</div>	
			<div class="showb">
				<ul>
					<li class="prev">上一篇：<pre target="1" msg="已经没有了" /></li>						
					<li class="next">下一篇：<next target="1" msg="已经没有了" /></li>	
				</ul>
			</div>
		</div>
	</div>

	<!-- fixed4开始 -->
	<template file="Content/footer.php"/>