<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1.0,user-scalable=no">
	<title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/base.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/download.css">
</head>
<body>
<template file="Content/header.php"/>
	<!-- breaknav nav -->
	<div class="content w min_w clearfix">
		<div class="con_l fl">
			<template file="Content/left.php"/>
		</div>
		<div class="con_r fr">
			<div class="title">
				资料下载
			</div>
			<content action="lists" catid="$catid" order="id DESC" num="12" page="$page">
				<div class="inner">
					<ul>
						<volist name="data" id="vo">
							<li>
								<div class="img fl"><img src="{$vo.thunmb|default='/statics/default/images/download.gif'}" alt="{$vo.title}"></div>
								<div class="download fr">
									<h3><a href="{$vo.url}">{$vo.title}</a></h3>
									<p class="time">{$vo.inputtime|date="Y-m-d",###}</p>
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
	</div>
<template file="Content/footer.php"/>	
