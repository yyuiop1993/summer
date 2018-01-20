<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
	<meta name="keywords" content="{$SEO['keyword']}" />
    <meta name="description" content="{$SEO['description']}" />
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/base.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/index.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/page.css">
</head>
<body>


	<!-- header start -->
	<div class="header clearfix min-w">
		<div class="header-top clearfix">
			<div class="w">
				<div class="fl">您好！欢迎您访问临沂市中心血站官方网站！</div>
				<div class="fr clearfix">
					<a href="#" target="_blank" class="a1">献血热线</a>
					<a href="#" target="_blank" class="a2">会员服务</a>
					<a href="/index.php?a=lists&catid=8" target="_blank" class="a3">联系我们</a>
				</div>
			</div>
		</div>
		<div class="logo clearfix w">
			<div class="fl"><h1><a href="/" >临沂市中心血站</a></h1></div>
			<div class="form clearfix">
				<form  name="formsearch" class="form" action="{:U('Search/Index/index')}" method="post" onsubmit="return checksearch();">
					<input type="text" name="q" id="search" value="-请输入关键字试试-" onfocus="if (value =='-请输入关键字试试-'){value =''}"onblur="if (value ==''){value='-请输入关键字试试-'}">
					<button></button>
				</form>
			</div>
		</div>
		<div class="nav clearfix">
			<ul class="w">
				<li class="li1 <if condition="in_array($catid,explode(',',$vo['arrchildid']))"> current</if>"><a href="/index.php" >网站首页</a></li>
				
				<content action="category" catid="0" num='9'  order="listorder ASC" >
	                <volist name="data" id="vo">
	                    <li <if condition="in_array($catid,explode(',',$vo['arrchildid']))"> class="current"</if>><a href="{$vo.url}">{$vo.catname}</a></li>
	                </volist>
	            </content>

			</ul>
		</div>
	
	<script type="text/javascript">
		function checksearch(){
			if ($("#search").val().trim().length == 0) {
		        $("#search").focus();
		        return false;
		    }
		}
	</script>

	
	<!-- hearder end -->