<template file="Content/header.php"/>
<div class="con">
	<div class="left">
			<template file="Content/left.php"/>
	</div>
	<div class="right">
		<div class="tit"><h2>{:getCategory($catid,'catname')}</h2><span>当前位置：<a href="{$config_siteurl}">{$Config.sitename}</a> &gt; <navigate catid="$catid" space=" &gt; " /></span></div>
		<div class="nr">
			<div class="page">
				{$page}
			</div>
		</div>
	</div>
</div>
<template file="Content/footer.php"/>