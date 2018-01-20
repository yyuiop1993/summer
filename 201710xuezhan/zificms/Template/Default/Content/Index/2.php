<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/style.css">
</head>
<body>
	<!-- header start  -->
	<div class="header">
		<!-- 新增头部直通车部分开始 -->
		<div class="header_train">
			<div class="w">
				<div class="fl"><p>欢迎访问时代三农网！！！</p></div>
				<div class="fr">
					<ul class="fl">
						<li class="li1"><a href="/">返回首页</a></li>
						<li class="li2"><a href="javascript:AddFavorite(window.location,document.title)" class="a2">加入收藏</a>
							<script>
								function AddFavorite(sURL, sTitle)
								{
									try
									{
										window.external.addFavorite(sURL, sTitle);
									}
									catch (e)
									{
										try
										{
											window.sidebar.addPanel(sTitle, sURL, "");
										}
										catch (e)
										{
											alert("加入收藏失败，请使用Ctrl+D进行添加");
										}
									}
								}
								</script>
						</li>
						<li class="li3"><a href="/sitemaps.xml">网站地图</a></li>
						
					</ul>
					<p class="fr">全国免费服务热线：400-708-8309</p>
				</div>
			</div>
		</div>
		<!-- 新增头部直通车部分结束 -->
		<div class="cl"></div>
		<div class="header_top">
			<div class="w">
				<div class="logo fl">
					<h1><a href="#">史贝美脲甲醛缓释肥</a></h1>
				</div>
				<div class="nav fr">
					<ul>
						<li class="current"><a href="#">网站首页</a></li>
						 <content action="category" catid="0"  order="listorder ASC" >
            				<volist name="data" id="vo">
								<li ><a href="{$vo.url}">{$vo.catname}</a></li>
							</volist>
						</content>
					</ul>
					<!-- <div class="weixin fr">
						<img src="{$config_siteurl}statics/default/images/weixin.jpg" alt="微信公众号" title="微信公众号">
						<img src="{$config_siteurl}statics/default/images/ewm.png" alt="微信公众号" title="微信公众号" class="ewm">
					</div> -->
				</div>
			</div>
		</div>
		<div class="banner">
			<div class="flexslider">
				<ul class="slides">
					<li><img src="{$config_siteurl}statics/default/images/banner1.jpg" alt=""></li>
					<li><img src="{$config_siteurl}statics/default/images/banner2.jpg" alt=""></li>
					<li><img src="{$config_siteurl}statics/default/images/banner3.jpg" alt=""></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- header end  -->
	<div class="cl"></div>
	<!-- fixed1 start  -->
	<div class="fixed fixed1">
		<div class="title">
			<h2>产品优势</h2>
			<span>PRODUCT ADVANTAGE</span>
			<span class="line"></span>
		</div>
		<div class="inner w">
			<ul>
				<li class="li1">
					<a href="#">
						<span><img src="{$config_siteurl}statics/default/images/span1.png" alt="脲甲醛缓释肥更可控" title="脲甲醛缓释肥更可控"></span>
						<p class="p1">脲甲醛缓释肥</p>
						<p class="p2">更可控</p>
					</a>
				</li>
				<li class="li2">
					<a href="#">
						<span><img src="{$config_siteurl}statics/default/images/span2.png" alt="脲甲醛缓释肥更高效" title="脲甲醛缓释肥更高效"></span>
						<p class="p1">脲甲醛缓释肥</p>
						<p class="p2">更高效</p>
					</a>
				</li>
				<li class="li3">
					<a href="#">
						<span><img src="{$config_siteurl}statics/default/images/span3.png" alt="脲甲醛缓释肥更环保" title="脲甲醛缓释肥更环保"></span>
						<p class="p1">脲甲醛缓释肥</p>
						<p class="p2">更环保</p>
					</a>
				</li>
				<li class="li4">
					<a href="#">
						<span><img src="{$config_siteurl}statics/default/images/span4.png" alt="脲甲醛缓释肥更安全" title="脲甲醛缓释肥更安全"></span>
						<p class="p1">脲甲醛缓释肥</p>
						<p class="p2">更安全</p>
					</a>
				</li>
				<li class="li5">
					<a href="#">
						<span><img src="{$config_siteurl}statics/default/images/span5.png" alt="脲甲醛缓释肥更经济" title="脲甲醛缓释肥更经济"></span>
						<p class="p1">脲甲醛缓释肥</p>
						<p class="p2">更经济</p>
					</a>
				</li>
			</ul>
		</div>
		<div class="cl"></div>
		<div class="more">
			<a href="{:getCategory(7,'url')}">MORE +</a>
		</div>
	</div>
	<!-- fixed1 end  -->
	<div class="cl"></div>
	<!-- fixed2 start  -->
	<div class="fixed fixed2">
		<div class="w">
			<div class="li1 box">
				<h2><a href="{:getCategory(2,'url')}">关于我们<span>ABOUT US</span></a></h2>
				<p><a href="{:getCategory(2,'url')}"><img src="{$config_siteurl}statics/default/images/about.jpg" alt="关于我们" title="关于我们"></a></p>
				<p>{:cache('Config.about')}<a href="{:getCategory(2,'url')}" class="more">[更多]</a></p>
			</div>
			<div class="li2 box">
				<h2><a href="{:getCategory(3,'url')}">新闻资讯<span>NEWS</span></a></h2>
				<p><a href="{:getCategory(3,'url')}"><img src="{$config_siteurl}statics/default/images/news.jpg" alt="新闻资讯" title="新闻资讯"></a></p>
				<!-- <ul>
					<li>
						<div class="li_left fl">1</div>
						<div class="li_right fr">
							<a href="#">从农村电商到电商运营，如何做做的更好...</a>
							<span class="time">2015-03-30</span>
							<span >时代三农网</span>
						</div>
					</li>
					<li>
						<div class="li_left fl">2</div>
						<div class="li_right fr">
							<a href="#">最后的机会！农村土地确权权即将将结束...</a>
							<span class="time">2015-03-30</span>
							<span >金桥百信</span>
						</div>
					</li>
					<li>
						<div class="li_left fl">3</div>
						<div class="li_right fr">
							<a href="#">国务院关于加强和完善城乡社区治理的意...</a>
							<span class="time">2015-03-30</span>
							<span >李律师</span>
						</div>
					</li>
					<li>
						<div class="li_left fl">4</div>
						<div class="li_right fr">
							<a href="#">新补贴来了做做意这200个县可获得更多...</a>
							<span class="time">2015-03-30</span>
							<span >金桥百信</span>
						</div>
					</li>
					<li>
						<div class="li_left fl">5</div>
						<div class="li_right fr">
							<a href="#">农资电商时代已经到来，你还在跑市场吗...</a>
							<span class="time">2015-03-30</span>
							<span >李律师</span>
						</div>
					</li>
				</ul> -->
				<!-- 新闻列表修改部分开始 -->
				<ul>
			        <content action="lists" catid="3"  order="id DESC" num="8">
						<volist name="data" id="vo">
							<li>&gt;<a href="{$vo.url}">{$vo.title|str_cut=###,22}</a></li>
						</volist>
					</content>
				</ul>
				<!-- 新闻列表修改部分结束 -->
			</div>
			<div class="li3 box">
				<h2><a href="{:getCategory(5,'url')}">产品知识<span>KNOWLEDGE</span></a></h2>
				<p><a href="{:getCategory(5,'url')}"><img src="{$config_siteurl}statics/default/images/cases.jpg" alt="知识产权" title="知识产权"></a></p>
				<ul>
			        <content action="lists" catid="4"  order="id DESC" num="8">
						<volist name="data" id="vo">
							<li>&gt;<a href="{$vo.url}">{$vo.title|str_cut=###,22}</a></li>
						</volist>
					</content>
				</ul>
			</div>
		</div>
	</div>
	<!-- fixed2 end  -->
	<div class="cl"></div>
	<!-- fixed3 start  -->
	<div class="fixed fixed3">
		<div class="title">
			<h2>产品展示</h2>
			<span>PRODUCT DISPLAY</span>
			<span class="line"></span>
		</div>
		<div class="inner w">
			<div id="pic_list_1" class="scroll_horizontal">
				<div class="box">
					<ul class="list">
						 <position action="position" posid="1" cat="3">
							<volist name="data" id="vo">
								<li><a href="{$vo.data.url}" target="_blank"><img src="{$vo.data.thumb}" alt="{$vo.data.title|str_cut=###,10}"><p>{$vo.data.title}</p></a></li>
						    </volist>
						</position>
					</ul>
				</div>
			</div>
		</div>
		<div class="cl"></div>
		<div class="more">
			<a href="{:getCategory(4,'url')}">MORE +</a>
		</div>
	</div>
	<!-- fixed3 end  -->
	<div class="cl"></div>
	<!-- footer start  -->
	<div class="footer">
		<div class="w">
		<!-- 	<div class="footer_left fl">
				<div class="nav">
					<ul>
						<li class="li1"><a href="#">首页</a></li>
						<li class="li2"><a href="#">关于我们</a></li>
						<li class="li3"><a href="#">新闻资讯</a></li>
						<li class="li4"><a href="#">产品展示</a></li>
						<li class="li5"><a href="#">产品知识</a></li>
						<li class="li6"><a href="#">联系我们</a></li>
						<li class="li7"><a href="#">网站地图</a></li>
					</ul>
				</div>
				<div class="copyright">版权所有 © 2015 史贝美生态肥业  ALL RIGHTS RESERVED备案号：鲁ICP备111111号&nbsp;&nbsp;&nbsp;&nbsp;技术支持：<a href="#">智峰软件</a></div>
			</div>
			<div class="footer_right fr">
				<img src="{$config_siteurl}statics/default/images/ewm.jpg" alt="微信公众号" title="微信公众号">
			</div> -->
		<!-- 尾部修改部分开始 -->
			<div class="link">
				<ul>
					<li>友情链接：</li>
					<get table="links" termsid="1" visible="1" order="id DESC">
						<volist name="data" id="vo">
								<li><a href="{$vo.url}" target="_blank">{$vo.name}</a></li>
								<li>|</li>
						</volist>
					</get>

					<
				</ul>
			</div>
			<div class="copyright">
				<div class="copy_left fl">
					<div class="phone">
						<p>全国咨询热线</p>
						<p>{:cache('Config.tel')}</p>
					</div>
					<div class="nav">
						<ul>
							<li class="first"><a href="/">网站首页</a></li>
							<li>|</li>
							 <content action="category" catid="0"  order="listorder ASC" >
								<volist name="data" id="vo">
									<li ><a href="{$vo.url}">{$vo.catname}</a></li>
									<li>|</li>
								</volist>
							</content>

							<li><a href="#">网站地图</a></li>
						</ul>
					</div>
					<div class="address">
						{:cache('Config.footerinfo')}
					</div>
				</div>
				<div class="copy_right fr">
					<div class="bdsharebuttonbox"><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a></div>
					<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"2","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
					<div class="weixin">
						<p><img src="{$config_siteurl}statics/default/images/ewm.jpg" alt=""></p>
						<p>扫一扫关注我们</p>
					</div>
					<div class="gotop" id="gotop">
						<p><a href="#"></a></p>
						<p>返回顶部</p>
					</div>
				</div>
			</div>
		<!-- 尾部修改部分结束 -->
		</div>
	</div>
	<!-- footer end  -->
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery.flexslider-min.js"></script>
	<script src="{$config_siteurl}statics/default/js/jquery.cxscroll.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/base.js"></script>
	
</body>
</html>