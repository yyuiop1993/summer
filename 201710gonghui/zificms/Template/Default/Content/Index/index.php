<template file="Content/header.php"/>

<link rel="stylesheet" href="{$config_siteurl}statics/default/css/index.css">



<div class="hearder"></div>

<div class="content clearfix">

	<div class="w">

		<ul>

			<li class="li0"><a href="/index.php?a=lists&catid=1" >预约报名</a></li>

			<li class="li1"><a href="/index.php?a=lists&catid=11" >{:getCategory(11,'catname')}</a></li>

			<li class="li2"><a href="/index.php?a=lists&catid=12" >{:getCategory(12,'catname')}</a></li>

			<li class="li3"><a href="/index.php?a=lists&catid=19" >{:getCategory(19,'catname')}</a></li>

			<li class="li4"><a href="/index.php?a=lists&catid=15" >{:getCategory(15,'catname')}</a></li>

			<li class="li5"><a href="/index.php?a=lists&catid=16" >{:getCategory(16,'catname')}</a></li>

			<li class="li6"><a href="/index.php?a=lists&catid=17" >{:getCategory(17,'catname')}</a></li>

		</ul>

	</div>

</div>



<template file="Content/footer.php"/>