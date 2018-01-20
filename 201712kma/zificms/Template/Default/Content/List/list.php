	<template file="Content/header.php"/>

	<!-- content start -->
	<div class="list_content clearfix">
		<div class="clearfix" style="height: 20px;background-color: #fff;">&nbsp;</div>
		<template file="Content/left.php"/>

		<div class="content-r fr">
			<div class="title clearfix">
				<span>{$catname}</span>
			</div>

			<content action="lists" catid="$catid" order="updatetime DESC" page="$page" num='9' >
				<div class="inner clearfix">
					<ul>
						<volist name="data" id="vo">
							<li>
								<a href="{$vo.url}"><img src="{$vo.thumb}" alt="{$vo.title}"></a>
								<a href="{$vo.url}" class="votitle">{$vo.title}</a>
								<p>{$vo.description|str_cut=###,46}....</p>
							</li>
						</volist>
					</ul>
				</div>
				<div class="fenye clearfix">
		          <ul>
		            {$pages}
		          </ul>
		        </div>	
			</content>

		</div>
	</div>


	<template file="Content/footer.php"/>