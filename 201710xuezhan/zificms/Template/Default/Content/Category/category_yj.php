	<template file="Content/header.php"/>
	<!-- content start -->
	<div class="w clearfix">
		<div class="content list1-con clearfix">
			<div class="cont-r clearfix">
				<template file="Content/nav.php"/>
				<content action="lists" catid="$catid" order="id DESC" page="$page">
					<div class="boxs">
						<div class="box clearfix">
							<ul>
								<volist name="data" id="vo">
									<li><a href="{$vo.url}" target="_blank">{$vo.title}</a><span>{$vo.inputtime|date="Y-m-d",###}</span></li>
								</volist>
							</ul>
						</div>
						<div class="fenye">
							<ul>
					            {$pages}
					        </ul>
				        </div>
					</div>
				</content>
			</div>
		</div>
		<template file="Content/fw.php"/>
	</div>
	<!-- content end -->
	<template file="Content/footer.php"/>