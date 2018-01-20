<template file="Wap/header.php"/>
<div class="con">
			
	<!-- <div class="tit"><span>当前位置：<a href="{$config_siteurl}">首页</a>&gt;<navigate catid="$catid" space="&gt;" /></span></div>		 -->

	<div class="fixed_title">
		<div class="title_t1">-&nbsp;{$catname}&nbsp;-</div>
	</div>
	
	<div class="pic-list">
		<content action="lists" catid="$catid" order="id DESC" num="12" page="$page">
			<div class="news">
				<ul>
					<volist name="data" id="vo">  
						<li>
							
							<a href="{:geturl($vo)}">
							<img src="{$vo.thumb}" alt="{$vo.title}">
							<span>{$vo.title}</span>
							</a>
							
						</li>
					</volist>
				</ul>
			</div>
			<div class="fenye"> 
				<ul>
					{$pages} 
				</ul> 
			</div>
		</content> 
	</div>
	
</div>

<template file="Wap/footer.php"/>