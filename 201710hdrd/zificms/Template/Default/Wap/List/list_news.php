<template file="Wap/top.php"/>
<div class="con">
	<div class="right">
			<div class="tit"><span>当前位置：<a href="{$config_siteurl}">首页</a>&gt;<navigate catid="$catid" space="&gt;" /></span></div>		
			<div class="nr">
			<content action="lists" catid="$catid" order="id DESC" num="12" page="$page">
				<div class="news">
					<ul>
						<volist name="data" id="vo">  
							<li><a href="{:geturl($vo)}">{$vo.title}</a><span>{$vo.inputtime|date="Y-m-d",###}</span></li>
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
</div>
<!-- footer start  -->
<div class="footer">
		<template file="Wap/footer.php"/>
</div>
<!-- footer end  -->
</body>
</html>