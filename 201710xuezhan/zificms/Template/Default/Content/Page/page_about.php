<template file="Content/header.php"/>
	

	<!-- header end -->
	<!-- content start -->
	<div class="w content about-con clearfix">
		<template file="Content/left.php"/>

		<div class="con-r fr">
			<div class="con-r-t">
				<h4>{$catname}</h4>
				<div class="breaknav">
					您当前的位置：<a href="/">首页</a>&nbsp;&gt;&nbsp;<span>{$title}</span>
				</div>
			</div>
			<div class="main about-main">
				<h3>{$title}</h3>
				{$content}
			</div>
		</div>
	</div>
	<!-- content end -->
	<!-- footer start -->

<template file="Content/footer.php"/>