<template file="Content/header.php"/>
<div class="con">
	<div class="left">
		<template file="Content/left.php"/>
	</div>
	<div class="right">
		<div class="tit"><h2>{:getCategory($catid,'catname')}</h2><span>当前位置：<a href="{$config_siteurl}">{$Config.sitename}</a> &gt; <navigate catid="$catid" space=" &gt; " /></span></div>
		<div class="nr lnr">
			<content action="lists" catid="$catid" order="id DESC" num="12" page="$page">
				<div class="pro">
					<ul>
						<volist name="data" id="vo">
							<li>
								<a href="{$vo.url}">
									<div class="pic"><img src="{$vo.thumb}" alt="{$vo.title}"></div>
									<p>{$vo.title}</p>
								</a>
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
	</div>
</div>
<template file="Content/footer.php"/>