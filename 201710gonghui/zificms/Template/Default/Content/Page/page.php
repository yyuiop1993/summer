	<template file="Content/header.php"/>
	<!-- content start -->
	<div class="w clearfix">
		<div class="content content-con clearfix">
			<template file="Content/left.php"/>
			<div class="cont-r fr clearfix">
				<template file="Content/nav.php"/>
				<div class="boxs">
					<div class="inner">
						<div class="clearfix">
							{$content}
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<template file="Content/fw.php"/>
	</div>
	<!-- content end -->
	<template file="Content/footer.php"/>
	<script type="text/javascript">
		$(function (){	
			$.get("{$config_siteurl}api.php?m=Hits&catid={$catid}&id={$id}", function (data) {
			    $("#hit").html(data.views);
			}, "json");
		});
	</script>