<template file="Content/header.php"/>
<link rel="stylesheet" href="{$config_siteurl}statics/default/css/page.css">

	<div class="hearder-top"><a href="/index.php" class="bank"></a>{$catname}</div>
	<div class="content huodong clearfix">
		<div class="boxs">
		
			<!-- <div class="box .box1"><img src="{$image}" alt=""></div> -->

			<content action="lists" catid="$catid" order="listorder DESC" page="$page">
			<div class="box box2 clearfix">
				<ul>

					<volist name="data" id="vo" >
						
						<li>
							<a href="{$vo.url}" >
								<img src="{$vo.thumb}" alt="{$vo.title}">
								<span>{$vo.title}</span><!-- {$vo.inputtime|date="Y-m-d",###} -->
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


	<!-- content end -->

<template file="Content/footer.php"/>