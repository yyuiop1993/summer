	<template file="Content/header.php"/>
	<!-- content start -->
	<div class="w clearfix">
		<div class="content pic-con clearfix">
			<template file="Content/left.php"/>
			<div class="cont-r fr clearfix">
				<template file="Content/nav.php"/>
				<content action="lists" catid="$catid" order="id DESC" page="$page">
					<div class="boxs">
						<div class="box clearfix">
							<ul>
								<volist name="data" id="vo">
									<li><a href="{$vo.url}"><img src="{$vo.thumb}" alt="{$vo.title}"><span>{$vo.title|str_cut=###,10}</span></a></li>
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