	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1.0,user-scalable=no">
	<title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/base.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/page.css">
</head>
<body>
	<!-- header start -->
	<div class="header clearfix">
		<div class="w clearfix">
			<div class="nav-but fl"><button></button></div>
			<div class="title fl"><h2>搜索</h2></div>
			<div class="search fr"><button></button></div>
		</div>
		<div id="nav_page">
			<ul>
				<li ><a  href="/">网站首页 <span class="close"></span></a></li>
	            <content action="category" catid="0" num='7'  order="listorder ASC" >
	                <volist name="data" id="vo">
	                    <li <if condition="  in_array($catid,explode(',',$vo['arrchildid']))"> class="current"</if>><a href="{$vo.url}">{$vo.catname}</a></li>
	                </volist>
	            </content>
			</ul>
		</div>
	</div>
	<!-- header end -->
	<!-- search start -->
	<div class="search-box">
		<form  name="formsearch" class="form" action="{:U('Search/Index/index')}" method="post" onsubmit="return checksearch();" >
			<button></button>
			<input type="text" name="q"  id="search"  placeholder="请输入您要搜索的内容">
		</form>
	</div>
	<script type="text/javascript">
		function checksearch(){
			if ($("#search").val().trim().length == 0) {
		        $("#search").focus();
		        return false;
		    }
		}
	</script>
	<!-- search end -->
	<!-- content start -->
	<div class="content news-con">
		
			<div class="inner w">
				<ul>
					 <volist name="result" id="vo">
						<li>
							<div class="date">
								<i>{$vo.inputtime|date="d",###}</i>
								<span>{$vo.inputtime|date="Y-m",###}</span>
							</div>
							<div class="news">
								<h3><a href="{$vo.url}"><i></i>{$vo.title|str_cut=###,12}</a></h3>
								<p><a href="{$vo.url}">{$vo.description|str_cut=###,30}</a></p>
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
		    <if condition=" !$result "> 
	           <div id="result" class="noResult">
	              <h3>抱歉，找不到与 "<em>{$keyword}</em>" 相符的信息</h3>
	          </div>
	        </if>
	</div>
	<!-- content end -->
	<template file="Content/footer.php"/>
