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
	<style type="text/css">
		.order { border: dotted 1px #ccc; margin-top: 20px; }
		.order li{ list-style: none; line-height:50px; height: 50px; border-bottom: dotted 1px #ccc; padding: 0 15px; }
		.order li span{ font-size: 14px; font-weight: bold;width: 100px; display: inline-block; }
		.order div{padding: 15px;}
		.order div span{font-size: 14px; font-weight: bold;}
	</style>
<body>
<template file="Content/header.php"/>
	<div class="content w min_w clearfix">
		<div class="con_l fl">
			<template file="Content/left.php"/>
		</div>
		<div class="con_r fr">
			<div class="title">
				合同号 : {$title} 详情
			</div>
			 <div class="order">
			 	<li><span>合同号：</span>{$title}</li>
			 	<li><span>合同编号：</span>{$hth}</li>
			 	<li><span>生产序列号：</span>{$scxlh}</li>
			 	<li><span>进度：</span>{$jind}</li>
			 	<li><span>客户编码:</span>{$khbm}</li>
			 	<if condition = "$jind eq '完成'">
				 	<li><span>发货时间：</span>{$inputtime|date='Y-m-d',###}</li>
				 	<li><span>物流公司：</span>{$wlgsw}</li>
				 	<li><span>物流单号：</span>{$wldh}</li>
				</if>
			 	<div> 
			 		<span>备注：</span>
			 		<div>
			 			{$content}
			 		</div>
			 	</div>
			 </div>
			
		</div>
	</div>
<template file="Content/footer.php"/>	
