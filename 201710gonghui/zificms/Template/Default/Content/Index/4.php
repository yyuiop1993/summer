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
	<div class="header clearfix min_w">
		<div class="hi">
			<div class="w">
				<p class="fl">hi,欢迎访问济南优润机电设备有限公司</p>
				<p class="fr"><a href="/">返回首页</a>丨<a href="#">网站地图</a>丨<a href="{:getCategory(5,'url')}">联系我们</a></p>
			</div>
		</div>
    	<div class="logo">
    		<div class="w">
    			<h1 class="fl"><a href="/">济南优润机电设备有限公司</a></h1>
	        	<p class="fr">服务热线：<b>0539-7026518</b></p>
    		</div>
        </div>
	    <div class="menu">
        	<ul class="w">
	        	<li class="hover"><a href="/">网站首页</a></li>
	        	<li>|</li>
	        	<content action="category" catid="0"  order="listorder ASC" >
    				<volist name="data" id="vo">
						<li><a href="{$vo.url}">{$vo.catname}</a></li>
						<li>|</li>
					</volist>
				</content>
       		</ul>
	    </div>
	</div>
	<!-- header start -->
	<!-- banner start -->
	<div class="flexslider min_w">
		<ul class="slides">
			<li><a href="#"><img src="{$config_siteurl}statics/default/images
			/banner1.jpg" alt="优润机电" title="济南优润机电"></a></li>
			<li><a href="#"><img src="{$config_siteurl}statics/default/images
			/banner1.jpg" alt="优润机电" title="济南优润机电"></a></li>
			<li><a href="#"><img src="{$config_siteurl}statics/default/images
			/banner1.jpg" alt="优润机电" title="济南优润机电"></a></li>
			<li><a href="#"><img src="{$config_siteurl}statics/default/images
			/banner1.jpg" alt="优润机电" title="济南优润机电"></a></li>
		</ul>
	</div>
	<!-- banner end -->
	<!-- fixed1 tart -->
	<div class="fixed fixed1 w clearfix min_w">
		<div class="box">
	    	<div class="upimg"></div>
	        <p>订单查询</p>
	        <span>产品订单在线查询服务</span>
	        <a href="{:getCategory(9,'url')}" target='_blank' >点击查询</a>
	    </div>
	    <div class="box">
	    	<div class="upimg up2"></div>
	        <p>产品信息查询</p>
	        <span>产品信息在线查询服务</span>
	        <a href="{:getCategory(2,'url')}">点击查询</a>
	    </div>
	    <div class="box">
	    	<div class="upimg up3"></div>
	        <p>下载中心</p>
	        <span>下载产品手册、软件及驱动</span>
	        <a href="{:getCategory(4,'url')}">点击下载</a>
	    </div>
	    <div class="box">
	    	<div class="upimg up4"></div>
	        <p>研发与服务</p>
	        <span>公司新产品、设备及专利产品</span>
	        <a href="{:getCategory(10,'url')}">点击查询</a>
	    </div>
	    <div class="box" style="margin-right:0">
	    	<div class="upimg up5"></div>
	        <p>销售网络</p>
	        <span>公司产品销售网络，远销海外</span>
	        <a href="{:getCategory(11,'url')}">点击查询</a>
	    </div>
	</div>
	<!-- fixed1 end -->
	<!-- fixed2 tart -->
	<div class="fixed fixed2 w min_w">
		<div class="title"><a href="{:getCategory(1,'url')}">关于我们<br/><span>ABOUT US</span></a></div>
		<div class="about clearfix">
			<div class="fl">
				{:cache('Config.about')}
				<p class="more"><a href="{:getCategory(1,'url')}">详情</a></p>
			</div>
			<div class="fr">
				<div class="flexslider">
					<ul class="slides">
						<li><a href="#"><img src="{$config_siteurl}statics/default/images
						/about1.jpg" alt="优润机电" title="济南优润机电"></a></li>
						<li><a href="#"><img src="{$config_siteurl}statics/default/images
						/about1.jpg" alt="优润机电" title="济南优润机电"></a></li>
						<li><a href="#"><img src="{$config_siteurl}statics/default/images
						/about1.jpg" alt="优润机电" title="济南优润机电"></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- fixed2 end -->
	<!-- fixed3 tart -->
	<div class="fixed fixed3 min_w">
		<div class="w">
			<div class="title"><a href="{:getCategory(2,'url')}">产品中心<br/><span>PRODUCT CENTER</span></a></div>
			<div id="pic_list_1" class="scroll_horizontal">
				<div class="box">
					<ul class="list">
						 <position action="position" posid="1" catid='2'>
	        				<volist name="data" id="vo">
								<li>
									<a href="{$vo.data.url}" target="_blank"><img src="{$vo.data.thumb}" alt="{$vo.data.title}">
										<span>{$vo.data.title}</span>
									</a>
								</li>
							</volist>
						</position>
					</ul>
				</div>
				<div class="plus"></div>
				<div class="minus"></div>
			</div>
			<div class="more">
				<a href="{:getCategory(2,'url')}">查看更多&gt;&gt;</a>
			</div>
		</div>
	</div>
	<!-- fixed3 end -->
	<!-- fixed4 tart -->
	<div class="fixed fixed4 w min_w">
		<div class="title"><a href="#">新闻中心<br/><span>NEWS</span></a></div>
		<div class="news clearfix">
			<div class="news_l fl">
				<position action="position" posid="1" catid="3" num='1'>
					<volist name="data" id="vo" key='k'>
						<p class="img"><img src="{$vo.data.thumb|default=$config_siteurl}statics/default/images
						/news.jpg" alt=""></p>
						<h3><a href="{$vo.data.url}">{$vo.data.title}</a></h3>
						<p class="p1">{$vo.data.inputtime|date="Y-m",###}</p>
						<p class="p2">{$vo.data.description|str_cut=###,27}</p>
					</volist>
				</position>
			</div>

			<div class="fr">
				<content action="lists" catid="3"  order="id DESC" num="3">
   					<volist name="data" id="vo" key='k'>
						<div class="box box1 clearfix">
							<div class="date fl">{$vo.inputtime|date="d",###}<span>{$vo.inputtime|date="Y-m",###}</span></div>
							<div class="inner fr">
								<h3><a href="{$vo.url}">{$vo.title}</a></h3>
								<p>{$vo.description|str_cut=###,47}</p>
							</div>
						</div>
					</volist>
				</content>
			</div>
		</div>
	</div>
	<!-- fixed4 end -->
	<!-- fixed5 tart -->
	<!-- fixed5 end -->
	<!-- footer start -->
	<div class="footer min_w">
		<div class="w clearfix">
			<div class="fl">
				<div class="link">
					<ul class="clearfix">
						<li>友情链接:</li>
						<get table="links" termsid="1" visible="1" order="id DESC">
							<volist name="data" id="vo">
								<li><a href="{$vo.url}" target="_blank">{$vo.name}</a></li>
							</volist>
						</get>
					</ul>
				</div>
				<div class="nav">
					<ul class="clearfix">
						<li><a href="">网站首页</a></li>
				    	<content action="category" catid="0"  order="listorder ASC" >
							<volist name="data" id="vo">
								<li><a href="{$vo.url}">{$vo.catname}</a></li>
							</volist>
						</content>
					</ul>
				</div>
				<div class="copyright">{:cache('Config.footerinfo')}</div>
			</div>
			<div class="fr">
				<p class="ewm ewm1 fl"><img src="{$config_siteurl}statics/default/images
				/ewm.jpg" alt="官方微信" title="官方微信"><span>官方微信</span></p>
				<p class="ewm ewm2 fl"><img src="{$config_siteurl}statics/default/images
				/ewm.jpg" alt="官方微博" title="官方微博"><span>官方微博</span></p>
			</div>
		</div>
	</div>
	<!-- footer end -->
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/index.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery.cxscroll.js"></script>
	<script>
		$("#pic_list_1").cxScroll({
			easing:"linear",
            step:1,
            accel:1000,//手动
            speed:1000,//自动
            time:2000,//自动滚动间隔
		});
	</script>
</body>
</html>