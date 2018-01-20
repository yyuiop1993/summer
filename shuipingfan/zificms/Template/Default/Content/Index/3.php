<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/style.css">
</head>
<body>
	<!-- header开始 -->
	<div id="header">
		<div class="top">
			<div class="w">
				<div class="fl">欢迎访问时代三农网!!!</div>
				<div class="fr">
					<a href="{:getCategory(1,'url')}">关于我们</a>
					<span></span>
					<a href="/">网站首页</a>
					<span></span>
					<a href="{:getCategory(7,'url')}">联系我们</a>
				</div>
			</div>
		</div>
		<div class="logo-tel w">
			<h1><a href="#">时代三农网</a></h1>
			<h4>拥抱时代三农 普惠网络时代</h4>
			<div class="fr">
				<span>全国免费服务热线</span>
				<p>{:cache('Config.tel')}</p>
			</div>
			<div class="cl"></div>
		</div>
		<div class="nav">
			<ul class="w">
				<li class="li1">
					<a href="/">
						<p>网站首页</p>
						<span>HOME</span>
					</a>
				</li>			
				 <content action="category" catid="0"  order="listorder ASC" >
    				<volist name="data" id="vo">
						<li >
							<a href="{$vo.url}">
								<p>{$vo.catname}</p>
								<span>{$vo.encatname}</span>
							</a>
						</li>
					</volist>
				</content>
			</ul>
		</div>
	</div>
	<!-- header结束 -->
	<div class="cl"></div>
	<!-- flexslider开始 -->
	<div class="flexslider">
		<ul class="slides">
			<li>
				<a href="#"><img src="{$config_siteurl}statics/default/images/banner1.jpg"></a>
			</li>
			<li>
				<a href="#"><img src="{$config_siteurl}statics/default/images/banner1.jpg"></a>
			</li>
			<li>
				<a href="#"><img src="{$config_siteurl}statics/default/images/banner1.jpg"></a>
			</li>
		</ul>
	</div>
	<!-- flexslider结束 -->
	<!-- flexslider开始 -->
	<div class="wap_flexslider">
		<ul class="slides">
			<li>
				<a href="#"><img src="{$config_siteurl}statics/default/images/banner.jpg"></a>
			</li>
			<li>
				<a href="#"><img src="{$config_siteurl}statics/default/images/banner.jpg"></a>
			</li>
			<li>
				<a href="#"><img src="{$config_siteurl}statics/default/images/banner.jpg"></a>
			</li>
		</ul>
	</div>
	<!-- flexslider结束 -->
	<div class="cl h10"></div>
	<!-- fixed1开始 -->
	<div class="fixed fixed1 w">
		<div class="title">
			<div class="fl">
				<h2><a href="{:getCategory(1,'url')}">关于我们</a></h2>
				<span>ABOUT Us</span>
			</div>
			<div class="fr">
				<a href="{:getCategory(1,'url')}">MORE+</a>
			</div>
		</div>
		<div class="inner">
			<div class="fl">
				<a href="#"><img src="{$config_siteurl}statics/default/images/about.jpg"></a>
			</div>
			<div class="fr">
				{:cache("Config.about")}
			</div>
		</div>
	</div>
	<!-- fixed1结束 -->
	<div class="cl h10"></div>
	<!-- fixed2开始 -->
	<div class="fixed fixed2 w">
		<div class="fixed2_fl fl">
			<div class="title">
				<div class="fl">
					<h2><a href="{:getCategory(4,'url')}">畜牧业视频</a></h2>
					<span>VIDEO</span>
				</div>
				<div class="fr">
					<a href="{:getCategory(4,'url')}">MORE+</a>
				</div>
			</div>
			<div class="inner">
				<ul>
					<position action="position" posid="1" catid="4" num='6'>
						<volist name="data" id="vo" key='k'>
							<li class="li{$k}">
								<a href="{$vo.data.url}">
									<img src="{$vo.data.thumb}" alt='{$vo.data.title}'>
									<div class="piao"></div>
									<h5>{$vo.data.title}</h5>
								</a>
							</li>
						</volist>
					</position>
					
				</ul>
			</div>
		</div>
		<div class="fixed2_fr fr">
			<div class="title">
				<div class="fl">
					<h2><a href="{:getCategory(9,'url')}">畜牧业专题</a></h2>
					<span>SPECIAL</span>
				</div>
				<div class="fr">
					<a href="{:getCategory(9,'url')}">MORE+</a>
				</div>
			</div>
			<div class="inner">
				<ul>
				    <content action="lists" catid="9"  order="id DESC" num="3">
   						<volist name="data" id="vo" key='k'>
							<li class="li{$k}">
								<div class="text">
									<div class="fl">
										{$k}
									</div>
									<div class="fr">
										<h5><a href="{$vo.url}">{$vo.title}</a></h5>
										<p><a href="{$vo.url}">{$vo.description}</a></p>
									</div>
								</div>
								<div class="img">
									<a href="{$vo.url}"><img src="{$vo.thumb}" width="368"  height="151"></a>
								</div>
							</li>
						</volist>
					</content>			
				</ul>
			</div>
		</div>
	</div>
	<!-- fixed2结束 -->
	<div class="cl h10"></div>
	<!-- fixed3开始 -->
	<div class="fixed fixed3 w">
		<div class="fixed3_fl fl">
			<div class="title">
				<div class="fl">
					<h2><a href="{:getCategory(2,'url')}">新闻资讯</a></h2>
					<span>NEWS</span>
				</div>
				<div class="fr">
					<a href="{:getCategory(2,'url')}">MORE+</a>
				</div>
			</div>
			<div class="inner">
				<div class="news-top">
					 <position action="position" posid="1" catid='2'>
	        			<volist name="data" id="vo">
							<div class="fl">
								<a href="#"><img src="{$vo.data.thumb}"></a>
							</div>
							<div class="fr">
								<h3><a href="{$vo.data.url}">{$vo.data.title|str_cut=###,30}</a></h3>
								<p><a href="{$vo.data.url}">{$vo.data.description|str_cut=###,70}</a></p>
							</div>
						</volist>
					</position>
				</div>
				<div class="cl"></div>
				<div class="list">
					<ul>
					    <content action="lists" catid="2"  order="id DESC" num="5">
       						<volist name="data" id="vo">
								<li>
									<a href="{$vo.url}">>{$vo.title}</a>
									<span>[ {$vo.inputtime|date="Y-m-d",###} ]</span>
								</li>
							</volist>
						</content>
					</ul>
				</div>
			</div>
		</div>
		<div class="fixed3_fr fr">
			<div class="title">
				<div class="fl">
					<h2><a href="{:getCategory(3,'url')}">兽药技术</a></h2>
					<span>TECHNOLOGY</span>
				</div>
				<div class="fr">
					<a href="{:getCategory(3,'url')}">MORE+</a>
				</div>
			</div>
			<div class="inner">
				<div class="list">
					<ul>
						<content action="lists" catid="3"  order="id DESC" num="8">
       						<volist name="data" id="vo">
								<li>
									<a href="{$vo.url}">>{$vo.title}</a>
									<span>[ {$vo.inputtime|date="Y-m-d",###} ]</span>
								</li>
							</volist>
						</content>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- fixed3结束 -->
	<div class="cl"></div>
	<!-- fixed4开始 -->
	<div class="fixed fixed4 w">
		<div class="title">
			<div class="fl">
				<h2><a href="{:getCategory(5,'url')}">产品中心</a></h2>
				<span>PRODUCTS</span>
			</div>
			<div class="fr">
				<a href="{:getCategory(5,'url')}">MORE+</a>
			</div>
		</div>
		<div id="pic_list_1" class="scroll_horizontal">
			<div class="box">
				<ul class="list">
					<position action="position" posid="1" catid="5" num='10'>
						<volist name="data" id="vo">
							<li>
								<div class="li_fl fl">
									<a href="{$vo.data.url}" target="_blank">
										<img src="{$vo.data.thumb}" alt="{$vo.data.title}" >
										<span>{$vo.data.title}</span>
									</a>
								</div>
								<div class="li_fr fr"></div>
							</li>
						</volist>
					</position>
				</ul>
			</div>
		</div>
	</div>
	<!-- fixed4开始 -->
	<!-- footer start -->
	<div class="footer">
		<div class="w">
			<div class="link">
				<span>友情链接：</span>
				<get table="links" termsid="1" visible="1" order="id DESC">
					<volist name="data" id="vo">
							<a href="{$vo.url}" target="_blank">{$vo.name}</a>
							<em>|</em>
					</volist>
				</get>
			</div>
			<div class="footer_info">
				<div class="logo fl">
					<img src="{$config_siteurl}statics/default/images/logo1.png" alt="时代三农网" title="时代三农网">
				</div>
				<div class="copyright fl">
				{:cache('Config.footerinfo')}
				</div>
				<div class="weixin fr">
					<p class="img"><img src="{$config_siteurl}statics/default/images/weixin.jpg" alt="官方微信" title="官方微信"></p>
					<p>官方微信</p>
				</div>
				<div class="cl"></div>
			</div>
		</div>
		<div class="nav">
			<a href="/">网站首页</a>
 			<content action="category" catid="0"  order="listorder ASC" >
				<volist name="data" id="vo">
					<a href="{$vo.url}">{$vo.catname}</a>
				</volist>
			</content>
		</div>
	</div>
	<!-- footer end -->
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery.cxscroll.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.flexslider').flexslider({
				directionNav: true,
				pauseOnAction: false
			});
			$('.wap_flexslider').flexslider({
				directionNav: true,
				pauseOnAction: false
			});
			$(".fixed2_fr ul li").mouseenter(
			function(){
			 		$(this).children(".img").show();
			 		$(this).siblings().children(".img").hide();
				}
			);
			$("#pic_list_1").cxScroll({
				direction:"right",
				speed:1000,
				time:1500
			});
			$('.nav li').eq(8).children('a').attr('target','_blank');
		});
	
	</script>
</body>
</html>