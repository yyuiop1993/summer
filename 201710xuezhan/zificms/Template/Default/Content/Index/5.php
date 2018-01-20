<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1.0,user-scalable=no">
	<title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/base.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/jquery.zySlide.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/index.css">
</head>
<body>
	<!-- hearder start -->
	<div class="header min-w">
		<div class="w">
			<div class="logo"><h1><a href="#">热血沂蒙，爱心奉献</a></h1></div>
			<div class="nav clearfix">
				<ul>
					<li><a href="/">网站首页</a></li>
		        	<content action="category" catid="0" num="4"  order="listorder ASC" >
	    				<volist name="data" id="vo">
							<li><a href="{$vo.url}">{$vo.catname}</a></li>
						</volist>
					</content>
				</ul>
			</div>
		</div>
	</div>
	<!-- hearder end -->
		<!-- fixed1 start -->
		<div class="fixed fixed1 min-w">
			<div class="w">
				<div class="lead">
					<p>{:cache('Config.about')}</p>
				</div>
				<div class="title">
				</div>
				<div class="con clearfix">
					<div class="con-l fl">
						<ul>
							<position action="position" posid="1" catid="1" num='2'>
								<volist name="data" id="vo" key='k'>
									<li>
										<p><a href="{$vo.data.url}"><img src="{$vo.data.thumb}" alt="{$vo.data.title}"></a></p>
										<p><a href="{$vo.data.url}">{$vo.data.title|str_cut=###,18}</a></p>
									</li>
								</volist>
							</position>
						</ul>
					</div>
					<div class="con-r fr">
						<div id="marquee">
							<ul>
								<content action="lists" catid="1"  order="id DESC" num="10">
									<volist name="data" id="vo" key='k'>
										<li>
											<h4><a href="{$vo.url}">{$vo.title|str_cut=###,27}</a></h4>
											<p>{$vo.description|str_cut=###,100}<a href="{$vo.url}">【详细】</a></p>
										</li>
									</volist>
								</content>
								
							</ul>
						</div>
					</div>
				</div>
				<div class="more">
					<a href="{:getCategory(1,'url')}"></a>
				</div>
			</div>
		</div>
		<!-- fixed1 end -->
		<!-- fixed2 start -->
		<div class="fixed fixed2 min-w">
			<div class="w">
				<div class="title"></div>
				<div class="con clearfix">
					<ul>
						<content action="lists" catid="2"  order="id DESC" num="6">
							<volist name="data" id="vo" key='k'>
								<li class="lis li{$k}" data-scroll-reveal="enter left over 1s and move 70px ">{$vo.description|str_cut=###,110}
								<a href="{$vo.url}">【详细】</a></li>
								
							</volist>
						</content>
					</ul>
				</div>
				<div class="more"><a href="{:getCategory(2,'url')}"></a></div>
			</div>
		</div>
		<!-- fixed2 end -->
		<!-- fixed3 start -->
		<div class="fixed fixed3 min-w">
			<div class="w">
				<div class="title"></div>
				<div class="con clearfix">
					<ul>
						<content action="lists" catid="3"  order="id DESC" num="6">
							<volist name="data" id="vo" key='k'>
								<li class="lis li{$k}" data-scroll-reveal="enter left over 1s and move 70px ">
									<h4><a href="{$vo.url}">{$vo.title|str_cut=###,16}</a></h4>
									<p>{$vo.description|str_cut=###,55}<a href="{$vo.url}">[详细]</a></p>
									<i></i>
								</li>
							</volist>
						</content>
							
					</ul>
				</div>
				<div class="more"><a href="{:getCategory(3,'url')}"></a></div>
			</div>
		</div>
		<!-- fixed3 end -->
		<!-- fixed4 start -->
		<div class="fixed fixed4 min-w">
			<div class="w">
				<div class="title"></div>
				<div class="con">
					<div id="Slide1" class="zy-Slide">
						<!--prev:元素中的文本通常会保留空格和换行符。而文本也会呈现为等宽字体。-->
						<section class="prev"></section>
						<section class="next"></section>
						<ul>
							<!--alt + shift : 可以创建一个矩形选择区域-->
							<position action="position" posid="1" catid="4" num='8'>
								<volist name="data" id="vo" key='k'>
									<li><a href="{$vo.data.url}"><img src="{$vo.data.thumb}" alt="{$vo.data.title}" /><span>{$vo.data.title|str_cut=###,30}</span></a></li>
								</volist>
							</position>

						</ul>
					</div>
					<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery.min.js"></script>
					<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery.zySlide.js"></script>
					<script type="text/javascript" src="{$config_siteurl}statics/default/js/slide.js"></script>
				</div>
				<div class="more"><a href="{:getCategory(4,'url')}"></a></div>
			</div>
		</div>
		<!-- fixed4 end -->
		<!-- fixed5 start -->
		<!-- fixed5 end -->
		<!-- fixed6 start -->
		<!-- fixed6 end -->
		<!-- fixed7 start -->
		<!-- fixed7 end -->
		<!-- fixed8 start -->
		<!-- fixed8 end -->
	<!-- footer start -->
	<div class="footer min-w">
		<div class="w">
			{:cache('Config.footerinfo')}
		</div>
	</div>
	<!-- footer end -->
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery.kxbdMarquee.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/scrollReveal.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/index.js"></script>

</body>
</html>