<template file="Content/header.php"/>	
	<!-- fixed1开始 -->
	<div class="fixed fixed1 w1 mg10">
		<div class="tit">
			<span>{:getCategory($catid,'catname')}</span>
			<span>当前位置：<a href="{$config_siteurl}">首页</a>&gt;<navigate catid="$catid" space="&gt;" /></span>
		</div>
		<content action="lists" catid="$catid" order="id DESC" num="12" page="$page">	
		<div class="video">
			<ul>
				<volist name="data" id="vo">
					<li>
						<a href="{$vo.url}">
							<img src="{$vo.thumb}" alt="{$vo.title}">
							<div class="piao"></div>
							<h5>{$vo.title}</h5>
						</a>
					</li>
				</volist>		
			</ul>
			<div class="cl"></div>
			<div class="fenye">
	          <ul>
	            {$pages}
	          </ul>
	        </div>
		</div>
		</content>
	</div>

	<!-- fixed4开始 -->
<template file="Content/footer.php"/>