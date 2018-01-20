	<template file="Content/header.php"/>
	<!-- content start -->
	<div class="content w clearfix">
		<div class="content-l fl">
			<template file="Content/left.php"/>
		</div>
		<div class="content-r fr">
			<div class="title">
				<span>{$catname}</span>
			</div>
			<content action="lists" catid="$catid"  order="updatetime DESC" page="$page">
				<div class="inner">
					<ul>
						<volist name="data" id="vo">
							<li><a href="{$vo.url}">{$vo.title}</a><span>[ {$vo.updatetime|date="Y-m-d",###} ]</span></li>
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
	<!-- content end -->
	<template file="Content/footer.php"/>