<template file="Wap/top.php"/>
<div class="con">
	<div class="right">
		<div class="tit"><span>当前位置：<a href="{$config_siteurl}">首页</a>&gt;<navigate catid="$catid" space="&gt;" /></span></div>		
		<div class="nr">
		<content action="lists" catid="$catid" order="id DESC" num="1" page="$page">
				<div class="pro">
					<ul>
						<volist name="data" id="vo">  

						<li>
							<a href="{:geturl($vo)}">
								<div class="pic"><img src="{$vo.thumb}" alt="{$vo.title}"></div>
								<p>{$vo.title|str_cut=###,87}</p>
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
</div>

	<!-- footer start  -->
		<div class="footer">
			<template file="Wap/footer.php"/>
		</div>
	<!-- footer end  -->
	
</body>
</html>