<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1.0,user-scalable=no">
	<title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/base.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/about.css">
<body>
<template file="Content/header.php"/>
	<div class="content w min_w clearfix">
		<div class="con_l fl">
			<template file="Content/left.php"/>
		</div>
		<div class="con_r fr">
			<div class="title">
				{$title}
			</div>
			<div class="date">发布日期：{$updatetime} 作者：{$username}</div>
			<div class="inner">
				{$content}
			</div>
			<div style="" class="h_down">
				<span>资料下载:</span>
				<volist name="mdown" id="vo">
       			 <a href="{$vo.fileurl}" target="_blank">{$vo.filename}下载</a><br/>
       			</volist>
			</div>
			
			<div class="showb">
				<ul>
					<li class="prev">上一资料：<pre target="1" msg="已经没有了" /></li>						
					<li class="next">下一资料：<next target="1" msg="已经没有了" /></li>	
				</ul>
			</div>
		</div>
	</div>
<template file="Content/footer.php"/>	
