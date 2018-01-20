<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1.0,user-scalable=no">
	<title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/base.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/index.css">
</head>
<body>
	<!-- header start -->
	<div class="header clearfix">
		<div class="w clearfix">
			<div class="logo fl"><a href="#"><img src="{$config_siteurl}statics/default/images/logo.png" alt="四季盟约"></a></div>
			<div class="phone fl"><img src="{$config_siteurl}statics/default/images/phone-num.png"  alt="电话"></div>
			<div class="nav-but fr"><button></button></div>
		</div>
		<div id="nav_page">
			<ul>
				<li class='current' ><a  href="/">网站首页 <span class="close"></span></a></li>
	            <content action="category" catid="0" num='7'  order="listorder ASC" >
	                <volist name="data" id="vo">
	                    <li <if condition="  in_array($catid,explode(',',$vo['arrchildid']))"> class="current"</if>><a href="{$vo.url}">{$vo.catname}</a></li>
	                </volist>
	            </content>
			</ul>
		</div>
	</div>
	<!-- header end -->
	<!-- fixed1 start -->
	<div class="fixed fixed1">
		<div class="flexslider">
			<ul class="slides">
				<li><a href="#"><img src="{$config_siteurl}statics/default/images/banner1.jpg" alt=""></a></li>
				<li><a href="#"><img src="{$config_siteurl}statics/default/images/banner1.jpg" alt=""></a></li>
				<li><a href="#"><img src="{$config_siteurl}statics/default/images/banner1.jpg" alt=""></a></li>
			</ul>
		</div>
	</div>
	<!-- fixed1 end -->
	<!-- fixed2 start -->
	<div class="fixed fixed2">
		<div class="w">
			<div class="scrollbox">
			    <div id="scrollDiv">
			        <ul>
			        	<position action="position" posid="1" num="3" catid='2'>
			        		<volist name="data" id="vo" >
				           	 <li><a href="{$vo.data.url}">{$vo.data.title}</a><span>{$vo.data.inputtime|date="Y-m",###}</span></li>
				           	</volist>
				        </position>
			        </ul>
			    </div>
			</div>
		</div>
	</div>
	<!-- fixed2 end -->
	<!-- fixed3 start -->
	<div class="fixed fixed3">
		<div class="w clearfix">
			<div class="box box1">
				<a href="{:getCategory(1,'url')}">
					<p class="p1">公司简介</p>
					<p class="p2">ABOUT US</p>
				</a>
			</div>
			<div class="box box2">
				<a href="{:getCategory(2,'url')}">
					<p class="p1">新闻资讯</p>
					<p class="p2">ABOUT US</p>
				</a>
			</div>
			<div class="box box3">
				<a href="{:getCategory(10,'url')}">
					<p class="p1">荣誉资质</p>
					<p class="p2">ABOUT US</p>
				</a>
			</div>
		</div>
	</div>
	<!-- fixed3 end -->
	<!-- fixed4 start -->
	<div class="fixed fixed4">
		<div class="w">
			<a href="{:getCategory(3,'url')}" class='a1'><img src="{$config_siteurl}statics/default/images/product.jpg" alt=""></a>
			<a href="{:getCategory(10,'url')}" class='a2'><img src="{$config_siteurl}statics/default/images/join.jpg" alt=""></a>
		</div>
	</div>
	<!-- fixed4 end -->
	<!-- footer start -->
	<div class="footer">
		<div class="copyright">{:cache('Config.footerinfo')}</div>
		<div class="footer-nav clearfix">
			<ul>
				<li class="lis li1"><a href="/">首页</a></li>
				<li class="lis li2"><a href="tel:4000075588	">咨询</a></li>
				<li class="lis li3"><a href="{:getCategory(3,'url')}">产品</a></li>
				<li class="lis li4"><a href="{:getCategory(1,'url')}">简介</a></li>
			</ul>
		</div>
	</div>
	<!-- footer end -->
	<script  type="text/javascript" src="{$config_siteurl}statics/default/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/jq_scroll.js" ></script>
	<script  type="text/javascript" src="{$config_siteurl}statics/default/js/base.js"></script>
	<script  type="text/javascript" src="{$config_siteurl}statics/default/js/index.js"></script>

</body>
</html>