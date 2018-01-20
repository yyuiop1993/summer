	<template file="Content/header.php"/>
	<!-- content start -->
	<div class="content content-con">
		<div class="w">
			<div class="ntit">
				{$title}
			</div>
			<div class="ndate">发布日期：{$updatetime}</div>
			<div>
				{$content}
			</div>
			<div class="clearfix"></div>
			<p class="prev"><span>上一篇：</span><pre target="1" msg="已经没有了" /></p>
			<p class="next"><span>下一篇：</span><next target="1" msg="已经没有了" /></p>
		</div>	
		
	</div>
	<!-- content end -->
	<template file="Content/footer.php"/>