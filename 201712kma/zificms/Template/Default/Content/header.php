<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />

    <link rel="stylesheet" href="{$config_siteurl}statics/default/css/base.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/default/css/index.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/default/css/page.css">
</head>
	
	
<style type="text/css">
	
</style>

<body>
	<div class="header clearfix">
	    <div class="nav">
	        <div class="logo fl">
	            <a href="/index.php"><img class="" src="/statics/default/images/logo.png"></a>
	        </div>
	        
	         <ul class="nav-list fr">

	            <li><a href="/index.php" >首页</a></li>
	            
	            <content action="category" catid="0" num='7'  order="listorder ASC" >
	                <volist name="data" id="vo">
	                    <li <if condition="in_array($catid,explode(',',$vo['arrchildid']))"> class="current"</if>><a href="{$vo.url}">{$vo.catname}</a></li>
	                </volist>
	            </content>

	        </ul>

	    </div>
	</div>
