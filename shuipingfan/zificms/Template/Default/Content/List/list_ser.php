<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1.0,user-scalable=no">
	<title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />
    <meta name="robots" content="noarchive">
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/base.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/news.css">
<body>
<template file="Content/header.php"/>
	<!-- breaknav nav -->
	<div class="content w min_w clearfix">
		<div class="con_l fl">
			
			<div class="caption">
				订单查询<br/>
				
			</div>
			<ul>
				<content action="category" catid="$catid" order="listorder ASC">
					<volist name="data" id="vo">
						<li><a href="{$vo.url}" <if condition="in_array($catid,explode(',',$vo['arrchildid']))"> class="hover"</if>  >{$vo.catname}</a></li>
					</volist>
				</content>
			</ul>
			<div class="contact">
				<a href="#"><img src="{$config_siteurl}statics/default/images/contact.jpg" alt="联系我们" title="联系我们"></a>
			</div>

		</div>
		<div class="con_r fr">
			<div class="title">
				订单查询
			</div>
			<div class="search">
				<form  name="formsearch" class="form" action="{:U('Index/lists?catid=9')}" method="post">
					<input type="text"  name="kw"  placeholder="请输出订单号">
					<button ></button>
				</form>
			</div>
			<?php
				$sql = 'SELECT * FROM lvyecms_proinfo  WHERE status=99 AND title= ' .$kw;
				$sql .= ' ORDER BY inputtime DESC';

				$data = 1;
			?>
			<get sql="$sql" page="$page" num="5">
				<div class="inner">
					<ul>
						<volist name="data" id="vo">
							<li>
								<div class="date fl">订<br/>单</div>
								<div class="news fr">
									<h3><a href="{$vo.url}">订单号：{$vo.title}</a></h3>
									<p>生产序列号：{$vo.scxlh}</p>
									<p>客户编码：{$vo.khbm}</p>
								</div>
							</li>
						</volist>
					</ul>
				</div>
				
		        <!-- <if condition=" !$data "> 
		           <div id="result" class="noResult">
		              <h3>抱歉，无法获取订单 "<em>{$kw}</em>" 信息</h3>
		          </div>
		        </if> -->
			</get>
		</div>
	</div>
<template file="Content/footer.php"/>	
