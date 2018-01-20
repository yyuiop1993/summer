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
			<div class="main piclist-main">
				<ul>

					<content action="lists" catid="$catid" order="inputtime DESC" page="$page" thumb="1">
						<volist name="data" id="vo">
							<li>
								<a href="{$vo.url}" target="_blank"><img src="{$vo.thumb}" alt="{$vo.title}" title="{$vo.title}"></a>
								<span><a href="{$vo.url}" target="_blank">{$vo.title}</a></span>
							</li>
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

<template file="Content/footer.php"/>