<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
<meta name="description" content="{$SEO['description']}" />
<meta name="keywords" content="{$SEO['keyword']}" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="{$config_siteurl}statics/default/wap/css/style.css">
</head>
<body>
	<!-- header start  -->
	<div class="header">
		 <div class="header_top">
			<div class="w">
				<div class="logo">
					<h1><a href="/"><img src="{$config_siteurl}statics/default/images/logo.png" alt=""></a></h1>
				</div>
				<div class="nav">
					<ul>

						<li><a href="/">网站首页</a></li>

						<content action="category" catid="0"  order="listorder ASC" >
							<volist name="data" id="vo">
									<li <if condition="  in_array($catid,explode(',',$vo['arrchildid']))"> class="current"</if> ><a href=" {:caturl($vo['catid'])}  ">{$vo.catname}</a></li>
							</volist>
						</content>

					</ul>

				</div>
			</div>
		</div>
	</div>
	<!-- header end  -->