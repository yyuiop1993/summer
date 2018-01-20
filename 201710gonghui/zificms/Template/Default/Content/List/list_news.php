	<template file="Content/header.php"/>
	<!-- content start -->
	<div class="content news-con">
		<content action="lists" catid="$catid" order="id DESC" page="$page">
			<div class="inner w">
				<ul>
					<volist name="data" id="vo">
						<li>
							<div class="date">
								<i>{$vo.inputtime|date="d",###}</i>
								<span>{$vo.inputtime|date="Y-m",###}</span>
							</div>
							<div class="news">
								<h3><a href="{$vo.url}"><i></i>{$vo.title|str_cut=###,12}</a></h3>
								<p><a href="{$vo.url}">{$vo.description|str_cut=###,30}</a></p>
							</div>
						</li>
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
