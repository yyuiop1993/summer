<template file="Wap/top.php"/>
<div class="con">
	<div class="right">
		<div class="tit"><span>当前位置：<a href="{$config_siteurl}">首页</a>&gt;<navigate catid="$catid" space="&gt;" /></span></div>
		<div class="nr">
			<div class="page">
				{$content}
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