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
			<div class="title fl"><h2>{$catname}</h2></div>
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