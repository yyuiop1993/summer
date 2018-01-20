<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php if( isset($SEO['title']) && !empty($SEO['title']) ): echo ($SEO['title']); endif; echo ($SEO['site_title']); ?></title>
<meta name="description" content="<?php echo ($SEO['description']); ?>" />
<meta name="keywords" content="<?php echo ($SEO['keyword']); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/default/wap/css/style.css">
<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/default/wap/css/swiper.min.css">
<script src='<?php echo ($config_siteurl); ?>statics/default/wap/js/swiper.min.js'></script>
</head>
<body>
	<!-- header start  -->
	<div class="header">
		 <div class="header_top">
	<div class="w">
		<div class="logo">
			<h1><a href="/"><img src="<?php echo ($config_siteurl); ?>statics/default/images/logo.png" alt=""></a></h1>
		</div>
		<div class="nav">
			<ul>
				<li class="current"><a href="/">网站首页</a></li>
				<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "category")){ $data = $content_tag->category(array('action'=>'category','catid'=>'0','order'=>'listorder ASC','num'=>'0','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if( in_array($catid,explode(',',$vo['arrchildid']))): ?>class="current"<?php endif; ?> ><a href=" <?php echo caturl($vo['catid']);?>  "><?php echo ($vo["catname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>

			</ul>

		</div>
	</div>
</div>
<div class="banner">
	<div class="flexslider">
		<ul class="slides">
			<li><img src="<?php echo ($config_siteurl); ?>statics/default/images/banner1.jpg" alt=""></li>
			<li><img src="<?php echo ($config_siteurl); ?>statics/default/images/banner2.jpg" alt=""></li>
			<li><img src="<?php echo ($config_siteurl); ?>statics/default/images/banner3.jpg" alt=""></li>
		</ul>
	</div>
</div>
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
						<span><img src="<?php echo ($config_siteurl); ?>statics/default/wap/images/span1.png" alt="脲甲醛缓释肥更可控" title="脲甲醛缓释肥更可控"></span>
						<p class="p1">脲甲醛缓释肥</p>
						<p class="p2">更可控</p>
					</a>
				</li>
				<li   class="swiper-slide">
					<a>
						<span><img src="<?php echo ($config_siteurl); ?>statics/default/wap/images/span2.png" alt="脲甲醛缓释肥更高效" title="脲甲醛缓释肥更高效"></span>
						<p class="p1">脲甲醛缓释肥</p>
						<p class="p2">更高效</p>
					</a>
				</li>
				<li  class="swiper-slide">
					<a>
						<span><img src="<?php echo ($config_siteurl); ?>statics/default/wap/images/span3.png" alt="脲甲醛缓释肥更环保" title="脲甲醛缓释肥更环保"></span>
						<p class="p1">脲甲醛缓释肥</p>
						<p class="p2">更环保</p>
					</a>
				</li>
				<li class="swiper-slide">
					<a>
						<span><img src="<?php echo ($config_siteurl); ?>statics/default/wap/images/span4.png" alt="脲甲醛缓释肥更安全" title="脲甲醛缓释肥更安全"></span>
						<p class="p1">脲甲醛缓释肥</p>
						<p class="p2">更安全</p>
					</a>
				</li>
				<li  class="swiper-slide">
					<a>
						<span><img src="<?php echo ($config_siteurl); ?>statics/default/wap/images/span5.png" alt="脲甲醛缓释肥更经济" title="脲甲醛缓释肥更经济"></span>
						<p class="p1">脲甲醛缓释肥</p>
						<p class="p2">更经济</p>
					</a>
				</li>
			</ul>
		</div>
		<div class="cl"></div>
		<div class="more">
			<a href="<?php echo caturl(7);?>">MORE +</a>
		</div>
	</div>
	<!-- fixed1 end  -->
	<!-- fixed2 start  -->
	<div class="fixed fixed2">
		<div class="w">
			<div class="li1 box">
				<h2><a href="<?php echo caturl(2);?>"><?php echo getCategory(2,'catname');?><span>ABOUT US</span></a></h2>
				<a href="<?php echo caturl(2);?>"><img src="<?php echo ($config_siteurl); ?>statics/default/wap/images/about.jpg" alt="关于我们" title="关于我们"></a>
				<p><?php echo cache('Config.about');?><a href="<?php echo caturl(2);?>  " class="more">[更多]</a></p>
				
			</div>
			<div class="li2 box">
				<h2><a href="<?php echo caturl(3);?>"><?php echo getCategory(3,'catname');?><span>NEWS</span></a></h2>
				<a href="<?php echo caturl(3);?>"><img src="<?php echo ($config_siteurl); ?>statics/default/wap/images/news.jpg" alt="新闻资讯" title="新闻资讯"></a>
				<ul>
					<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>'4','order'=>'id DESC','num'=>'5','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li>
								<div class="li_left"><?php echo ($k); ?></div>
								<div class="li_right">
									<a href="<?php echo geturl($vo);?>"><?php echo (str_cut($vo["title"],20)); ?></a>
									<span class="time"><?php echo (date("Y-m-d",$vo["inputtime"])); ?></span>
									<!-- <span >{xiao:$xiao['laiyuan']}</span> -->
								</div>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
				   

				</ul>
			</div>
			<div class="li3 box">
				<h2><a href="<?php echo caturl(5);?>"><?php echo getCategory(5,'catname');?><span>KNOWLEDGE</span></a></h2>
				<a href="<?php echo caturl(5);?>"><img src="<?php echo ($config_siteurl); ?>statics/default/wap/images/cases.jpg" alt="知识产权" title="知识产权"></a>
				<ul>
					<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>'5','order'=>'id DESC','num'=>'5','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>&gt;<a href="<?php echo geturl($vo);?>"><?php echo (str_cut($vo["title"],20)); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
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
						<?php $Position_tag = \Think\Think::instance("\Content\TagLib\Position"); if(method_exists($Position_tag, "position")){ $data = $Position_tag->position(array('action'=>'position','posid'=>'1','cat'=>'3',)); }; if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li  class="swiper-slide"><a href="<?php echo geturl($vo);?>"><img src="<?php echo ($vo["data"]["thumb"]); ?>" alt="<?php echo ($vo["data"]["title"]); ?>"><p><?php echo ($vo["data"]["title"]); ?></p></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="cl"></div>
		<div class="more">
			<a href="<?php echo caturl(4);?>">MORE +</a>
		</div>
	</div>
	<!-- fixed3 end  -->
	<!-- footer start  -->
	<div class="footer">
 				<div class="w">
			<div class="footer_left">
				<div class="copyright">
					<?php echo cache('Config.wap_powby');?>
					<br/>
					技术支持：<a href="http://www.zhifengchina.cn" target="_blank">智峰软件</a>
				</div>
			</div>
			<div class="footer_right">
				<img src="<?php echo ($config_siteurl); ?>statics/default/wap/images/ewm.jpg" alt="微信公众号" title="微信公众号">
			</div>
		</div>

<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/default/wap/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/default/wap/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/default/wap/js/base.js"></script>
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