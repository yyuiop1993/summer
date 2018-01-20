<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
<meta name="description" content="{$SEO['description']}" />
<meta name="keywords" content="{$SEO['keyword']}" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="{$config_siteurl}statics/default/wap/css/style.css">
<link rel="stylesheet" href="{$config_siteurl}statics/default/wap/css/swiper.min.css">
<script src='{$config_siteurl}statics/default/wap/js/swiper.min.js'></script>
</head>
<body>
	<!-- header start  -->
	<div class="header">
		 <template file="Wap/head.php"/>
	</div>
	<!-- header end  -->
	<!-- fixed1 start  -->
	<div class="fixed fixed1">
		<div class="title">
			<h2>产品优势</h2>
			<span>PRODUCT ADVANTAGE</span>
			<span class="line"></span>
		</div>
		<div class="inner  swiper-container">
			<ul class="swiper-wrapper">
				<li  class="swiper-slide">
					<a>
						<span><img src="{$config_siteurl}statics/default/wap/images/span1.png" alt="脲甲醛缓释肥更可控" title="脲甲醛缓释肥更可控"></span>
						<p class="p1">脲甲醛缓释肥</p>
						<p class="p2">更可控</p>
					</a>
				</li>
				<li   class="swiper-slide">
					<a>
						<span><img src="{$config_siteurl}statics/default/wap/images/span2.png" alt="脲甲醛缓释肥更高效" title="脲甲醛缓释肥更高效"></span>
						<p class="p1">脲甲醛缓释肥</p>
						<p class="p2">更高效</p>
					</a>
				</li>
				<li  class="swiper-slide">
					<a>
						<span><img src="{$config_siteurl}statics/default/wap/images/span3.png" alt="脲甲醛缓释肥更环保" title="脲甲醛缓释肥更环保"></span>
						<p class="p1">脲甲醛缓释肥</p>
						<p class="p2">更环保</p>
					</a>
				</li>
				<li class="swiper-slide">
					<a>
						<span><img src="{$config_siteurl}statics/default/wap/images/span4.png" alt="脲甲醛缓释肥更安全" title="脲甲醛缓释肥更安全"></span>
						<p class="p1">脲甲醛缓释肥</p>
						<p class="p2">更安全</p>
					</a>
				</li>
				<li  class="swiper-slide">
					<a>
						<span><img src="{$config_siteurl}statics/default/wap/images/span5.png" alt="脲甲醛缓释肥更经济" title="脲甲醛缓释肥更经济"></span>
						<p class="p1">脲甲醛缓释肥</p>
						<p class="p2">更经济</p>
					</a>
				</li>
			</ul>
		</div>
		<div class="cl"></div>
		<div class="more">
			<a href="{:caturl(7)}">MORE +</a>
		</div>
	</div>
	<!-- fixed1 end  -->
	<!-- fixed2 start  -->
	<div class="fixed fixed2">
		<div class="w">
			<div class="li1 box">
				<h2><a href="{:caturl(2)}">{:getCategory(2,'catname')}<span>ABOUT US</span></a></h2>
				<a href="{:caturl(2)}"><img src="{$config_siteurl}statics/default/wap/images/about.jpg" alt="关于我们" title="关于我们"></a>
				<p>{:cache('Config.about')}<a href="{:caturl(2)}  " class="more">[更多]</a></p>
				
			</div>
			<div class="li2 box">
				<h2><a href="{:caturl(3)}">{:getCategory(3,'catname')}<span>NEWS</span></a></h2>
				<a href="{:caturl(3)}"><img src="{$config_siteurl}statics/default/wap/images/news.jpg" alt="新闻资讯" title="新闻资讯"></a>
				<ul>
					<content action="lists" catid="4"  order="id DESC" num="5">
						<volist name="data" id="vo" key='k'>
							<li>
								<div class="li_left">{$k}</div>
								<div class="li_right">
									<a href="{:geturl($vo)}">{$vo.title|str_cut=###,20}</a>
									<span class="time">{$vo.inputtime|date="Y-m-d",###}</span>
									<!-- <span >{xiao:$xiao['laiyuan']}</span> -->
								</div>
							</li>
						</volist>
					</content>
				   

				</ul>
			</div>
			<div class="li3 box">
				<h2><a href="{:caturl(5)}">{:getCategory(5,'catname')}<span>KNOWLEDGE</span></a></h2>
				<a href="{:caturl(5)}"><img src="{$config_siteurl}statics/default/wap/images/cases.jpg" alt="知识产权" title="知识产权"></a>
				<ul>
					<content action="lists" catid="5"  order="id DESC" num="5">
						<volist name="data" id="vo">
							<li>&gt;<a href="{:geturl($vo)}">{$vo.title|str_cut=###,20}</a></li>
						</volist>
					</content>
				</ul>
			</div>
		</div>
	</div>
	<!-- fixed2 end  -->
	<!-- fixed3 start  -->
	<div class="fixed fixed3">
		<div class="title">
			<h2>产品展示</h2>
			<span>PRODUCT DISPLAY</span>
			<span class="line"></span>
		</div>
		<div class="inner w">
			<div id="pic_list_1">
				<div class="box swiper-container">
					<ul class="list swiper-wrapper">
						<position action="position" posid="1" cat="3">
							<volist name="data" id="vo">
								<li  class="swiper-slide"><a href="{:geturl($vo)}"><img src="{$vo.data.thumb}" alt="{$vo.data.title}"><p>{$vo.data.title}</p></a></li>	
							</volist>
						</position>
					</ul>
				</div>
			</div>
		</div>
		<div class="cl"></div>
		<div class="more">
			<a href="{:caturl(4)}">MORE +</a>
		</div>
	</div>
	<!-- fixed3 end  -->
	<!-- footer start  -->
	<div class="footer">
 		<template file="Wap/footer.php"/>
	</div>
	<!-- footer end  -->

<script>
	window.onload=function(){ 
		new Swiper('.swiper-container', {
			pagination: '.swiper-pagination',
			slidesPerView:2,
			paginationClickable: false,
			spaceBetween: 30,
			freeMode:true,
			autoplay:3000
		});
	} 
</script>	
</body>
</html>