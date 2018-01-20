<template file="Wap/top.php"/>
<div class="con">
	<div class="right">
		<div class="tit"><span>当前位置：<a href="{$config_siteurl}">首页</a>&gt;<navigate catid="$catid" space="&gt;" /></span></div>
		<div class="nr">
			<div class="show">
				<div class="showt">
					<h1>{$title}</h1>
					<div class="date">发布日期：{$updatetime}</div>
				</div>
				<div class="showc">
					<div class="detail">
					{$content}
					</div>
				</div>

				<div class="showb">
					<ul>
						
						<li class="prev">上一篇：<pre target="1" msg="已经没有了" /></li>						
						<li class="next">下一篇：<next target="1" msg="已经没有了" /></li>
					
					</ul>
				</div>
			</div>
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