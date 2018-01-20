	<template file="Content/header.php"/>
	<!-- content start -->
	<div class="content product-con">
		<template file="Content/left.php"/>
		<content action="lists" catid="$catid" order="id DESC" page="$page">
			<div class="inner">
				<ul class="clearfix">
					<volist name="data" id="vo">
						<li><a href="{$vo.url}"><img src="{$vo.thumb}" alt=""><span>{$vo.title|str_cut=###,12}</span></a></li>
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
	<!-- content end -->
	<template file="Content/footer.php"/>