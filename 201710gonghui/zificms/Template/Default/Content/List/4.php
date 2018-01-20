<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1.0,user-scalable=no">
	<title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/base.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/product.css">
<body>
<template file="Content/header.php"/>
	<!-- breaknav nav -->
	<div class="content w min_w clearfix">
		<div class="con_l fl">
			<template file="Content/left.php"/>
		</div>
		<div class="con_r fr">
			<div class="title">
				产品中心
			</div>
			<div class="search">
				<form  name="formsearch" class="form" action="{:U('Search/Index/index')}" method="post">
					<input type="text"  name="q"  placeholder="请输入产品名称">
					<button ></button>
				</form>
			</div>
			<content action="lists" catid="$catid" order="id DESC" num="12" page="$page">

				<div class="inner">
					<ul class="clearfix">
						<volist name="data" id="vo">
							<li><a href="{$vo.url}" target="_blank"><img src="{$vo.thumb}" alt="{$vo.title}" ><span>{$vo.title}</span></a></li>
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
