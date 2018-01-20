<template file="Content/header.php"/>

		<div class="banner">
			<img src="{$config_siteurl}statics/default/images/banner3.jpg" alt="">
		</div>
	</div>




	<!-- header end -->
	<!-- content start -->
	<div class="w content clearfix">

		<template file="Content/left.php"/>
		<div class="con-r fr">
			<div class="con-r-t">
				<h4>{$catname}</h4>
				<div class="breaknav">
					您当前的位置：<a href="#">首页</a>&nbsp;&gt;&nbsp;<span>{$catname}</span>
				</div>
			</div>

			<div class="main texlist-main">
				<ul>
					<content action="lists" catid="$catid" order="inputtime DESC" page="$page">
						<volist name="data" id="vo">
							<li><a href="{$vo.url}" target="_blank">{$vo.title}</a><span>{$vo.inputtime|date="Y-m-d",###}</span></li>
						</volist>
					</content>
				</ul>
				<div class="fenye">
					<ul>
			            {$pages}
			        </ul>
				</div>
			</div>
			
		</div>
	</div>
	<!-- content end -->

<template file="Content/footer.php"/>