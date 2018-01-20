<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php if( isset($SEO['title']) && !empty($SEO['title']) ): echo ($SEO['title']); endif; echo ($SEO['site_title']); ?></title>
    <meta name="description" content="<?php echo ($SEO['description']); ?>" />
    <meta name="keywords" content="<?php echo ($SEO['keyword']); ?>" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo ($config_siteurl); ?>statics/default/images/favicon.ico" media="screen" />
	<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/default/css/base.css">
	<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/default/css/index.css">
	<script  type="text/javascript">
		function SetHome(obj,url){try{obj.style.behavior="url(#default#homepage)";obj.setHomePage(url)}catch(e){if(window.netscape){try{netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect")}catch(e){alert("抱歉，此操作被浏览器拒绝！\n\n请在浏览器地址栏输入“about:config”并回车然后将[signed.applets.codebase_principal_support]设置为'true'")}}else{alert("抱歉，您所使用的浏览器无法完成此操作。\n\n您需要手动将【"+url+"】设置为首页。")}}}function AddFavorite(title,url){try{window.external.addFavorite(url,title)}catch(e){try{window.sidebar.addPanel(title,url,"")}catch(e){alert("抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请使用Ctrl+D进行添加")}}};
	</script>
</head>
<body>
	<!-- header start -->
	<div class="header">
		<div class="shortcut clearfix min-w">
			<div class="w">
				<div class="fl">欢迎访问河东区人民代表大会常务委员会&nbsp;&nbsp;&nbsp;&nbsp;<span id="time"></span></div>
				<div class="fr">
					<a href="javascript:void(0);" onclick="SetHome(this,location.href);" >设为首页</a>
					<span class="line">|</span>
					<a href="javascript:void(0);" onclick="AddFavorite('<?php echo cache("Config.sitename");?>',location.href)">加入收藏</a>
					<span class="line">|</span>
					<a href="<?php echo getCategory(43,'url');?>">联系我们</a>
				</div>
			</div>
		</div>
		<div class="head-bg min-w">
			<div class="bg"></div>
		</div>
		<div class="logo">
			<h1><a href="/">河东区人民代表大会常务委员会</a></h1>
		</div>
		<div class="head-nav w clearfix">
			<div class="nav" id="nav">
				<ul>
					<li class="li01"><a href="/" class="a1 current">首 页</a></li>
					<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "category")){ $data = $content_tag->category(array('action'=>'category','catid'=>'0','num'=>'9','order'=>'listorder ASC','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="li01"><a href="<?php echo ($vo["url"]); ?>" class="a1"><?php echo ($vo["catname"]); ?></a>
								<?php if(strpos(getCategory($vo['catid'],'arrchildid'),',') and (substr_count(getCategory($vo['catid'],'arrchildid'),',') > 1 )): $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "category")){ $data = $content_tag->category(array('action'=>'category','catid'=>$vo['catid'],'order'=>'listorder ASC','num'=>'0','page'=>'0','pagefun'=>'page','return'=>'data',)); } ?><ul>
											<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo1["url"]); ?>"><?php echo ($vo1["catname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
										</ul><?php endif; ?>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					
				</ul>
			</div>
		</div>
	</div>
	<!-- header end -->
	<!-- fixed1 start -->
	<div class="fixed fixed1 w clearfix">
		<div class="fixed-l fl">
			<div class="flexslider">
				<ul class="slides">
					<?php $Position_tag = \Think\Think::instance("\Content\TagLib\Position"); if(method_exists($Position_tag, "position")){ $data = $Position_tag->position(array('action'=>'position','catid'=>'2','posid'=>'1','num'=>'5','order'=>'listorder desc',)); }; if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
								<a href="<?php echo ($vo["data"]["url"]); ?>"><img src="<?php echo ($vo["data"]["thumb"]); ?>" alt=""></a>
								<span><a href="<?php echo ($vo["data"]["url"]); ?>"><?php echo (str_cut($vo["data"]["title"],22)); ?></a></span>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					
				</ul>
			</div>
		</div>
		<div class="fixed-c fl">
			<div class="tit">
				<a href="<?php echo getCategory(2,'url');?>">人大要闻</a>
			</div>
			<ul>
				<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>'2','order'=>'updatetime DESC','num'=>'9','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["url"]); ?>"><?php echo (str_cut($vo["title"],22)); ?></a><span><?php echo (date("Y-m-d",$vo["updatetime"])); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>	
			</ul>
		</div>
		<div class="fixed-r fr">
			<div class="xianfa">
				<a href="<?php echo getCategory(55,'url');?>"></a>
			</div>
			<div class="notice">
				<div class="tit"><a href="<?php echo getCategory(42,'url');?>" class="noti">通知公告</a><a href="<?php echo getCategory(42,'url');?>" class="more"><i class="c-red">+</i> 更多</a></div>
				<div class="list_lh">
					<ul>
						<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>'42','order'=>'updatetime DESC','num'=>'10','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
									<a href="<?php echo ($vo["url"]); ?>" target="_blank" class="a_blue"><?php echo (str_cut($vo["title"],23)); ?></a>
								</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- fixed1 end -->
	<!-- fixed2 start -->
	<div class="fixed fixed2 w clearfix">
		<div class="fl">
			<div class="box1">
				<ul>
					<li class="li1">
						<a href="http://115.159.221.126/Linyi_hedongRD/login.aspx?Soft=5&;login"  target="_blank">
							<img src="<?php echo ($config_siteurl); ?>statics/default/images/pt1.jpg" alt="">
						</a>
					</li>
					<li>
						<a href="http://115.159.221.126/Linyi_hedongRD/login.aspx?Soft=1&;login" target="_blank">
							<img src="<?php echo ($config_siteurl); ?>statics/default/images/pt2.jpg" alt="">
						</a>
					</li>
					<li>
						<a href="http://115.159.221.126/Linyi_hedongRD/Web/DeputySpace.aspx"  target="_blank">
							<img src="<?php echo ($config_siteurl); ?>statics/default/images/pt3.jpg" alt="">
						</a>
					</li>
				</ul>
			</div>
			<div class="box2">
				<div class="fl box2-fl">
					<div class="tit"><a href="<?php echo getCategory(4,'url');?>" class="noti">监督工作</a><a href="<?php echo getCategory(4,'url');?>" class="more"><i class="c-red">+</i> 更多</a></div>
					<div class="tab">

						<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "category")){ $data = $content_tag->category(array('action'=>'category','catid'=>'4','num'=>'3','order'=>'listorder desc','page'=>'0','pagefun'=>'page','return'=>'data',)); } ?><div class="hd">
								<?php if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><a class=" a1 <?php if($k == 1): ?>cur<?php endif; ?>" href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["catname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
							</div>
							
								<div class="bd">
									<?php if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div class="bd-list  <?php if($k == 1): ?>bd-list1<?php endif; ?>">
											<div class="special">
												<?php $Position_tag = \Think\Think::instance("\Content\TagLib\Position"); if(method_exists($Position_tag, "position")){ $data = $Position_tag->position(array('action'=>'position','posid'=>'1','num'=>'1','catid'=>$vo['catid'],'order'=>'listorder DESC',)); }; if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="pic">
															<a href="<?php echo ($vo["data"]["url"]); ?>"><img src="<?php echo ($vo["data"]["thumb"]); ?>" alt="<?php echo ($vo["data"]["title"]); ?>"></a>
														</div>
														<div class="text">
															<h4><a href="<?php echo ($vo["data"]["url"]); ?>"><?php echo ($vo["data"]["title"]); ?></a></h4>
															<p><a href="<?php echo ($vo["data"]["url"]); ?>"><?php echo (str_cut($vo["data"]["description"],32)); ?>【详细】</a></p>
														</div><?php endforeach; endif; else: echo "" ;endif; ?>
											</div>
											<ul>
												<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>$vo['catid'],'order'=>'listorder DESC','num'=>'7','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["url"]); ?>"><?php echo (str_cut($vo["title"],20)); ?></a><span><?php echo (date("Y-m-d",$vo["updatetime"])); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>	
											</ul>
										</div><?php endforeach; endif; else: echo "" ;endif; ?>
								</div>
					</div>
				</div>				
				<div class="fr box2-fl">
					<div class="tit"><a href="<?php echo getCategory(6,'url');?>" class="noti">代表工作</a><a href="<?php echo getCategory(6,'url');?>" class="more"><i class="c-red">+</i> 更多</a></div>
					<div class="tab">

						<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "category")){ $data = $content_tag->category(array('action'=>'category','catid'=>'6','num'=>'3','order'=>'listorder desc','page'=>'0','pagefun'=>'page','return'=>'data',)); } ?><div class="hd">
								<?php if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><a class=" a1 <?php if($k == 1): ?>cur<?php endif; ?>" href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["catname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
							</div>
							
								<div class="bd">
									<?php if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div class="bd-list  <?php if($k == 1): ?>bd-list1<?php endif; ?>">
											<div class="special">
												<?php $Position_tag = \Think\Think::instance("\Content\TagLib\Position"); if(method_exists($Position_tag, "position")){ $data = $Position_tag->position(array('action'=>'position','posid'=>'1','num'=>'1','catid'=>$vo['catid'],'order'=>'listorder DESC',)); }; if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="pic">
															<a href="<?php echo ($vo["data"]["url"]); ?>"><img src="<?php echo ($vo["data"]["thumb"]); ?>" alt="<?php echo ($vo["data"]["title"]); ?>"></a>
														</div>
														<div class="text">
															<h4><a href="<?php echo ($vo["data"]["url"]); ?>"><?php echo ($vo["data"]["title"]); ?></a></h4>
															<p><a href="<?php echo ($vo["data"]["url"]); ?>"><?php echo (str_cut($vo["data"]["description"],32)); ?>【详细】</a></p>
														</div><?php endforeach; endif; else: echo "" ;endif; ?>
											</div>

											<ul>
												<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>$vo['catid'],'order'=>'updatetime DESC','num'=>'7','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["url"]); ?>"><?php echo (str_cut($vo["title"],20)); ?></a><span><?php echo (date("Y-m-d",$vo["updatetime"])); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>	
											</ul>

										</div><?php endforeach; endif; else: echo "" ;endif; ?>
								</div>
					</div>
				</div>
			</div>
			<div class="box2">
				<div class="fl box2-fl">
					<div class="tit"><a href="<?php echo getCategory(3,'url');?>" class="noti">重大事项</a><a href="<?php echo getCategory(3,'url');?>" class="more"><i class="c-red">+</i> 更多</a></div>
					<div class="tab">
						<div class="bd">
							<div class="bd-list bd-list1">
								<ul>
									<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>'3','order'=>'updatetime DESC','num'=>'8','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["url"]); ?>"><?php echo (str_cut($vo["title"],20)); ?></a><span><?php echo (date("Y-m-d",$vo["updatetime"])); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>	
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="fr box2-fl">
					<div class="tit"><a href="<?php echo getCategory(8,'url');?>" class="noti">镇街人大</a><a href="<?php echo getCategory(41,'url');?>" class="more"><i class="c-red">+</i> 更多</a></div>
					<div class="tab">
						<div class="bd">
							<div class="bd-list bd-list1">
							    <?php $Position_tag = \Think\Think::instance("\Content\TagLib\Position"); if(method_exists($Position_tag, "position")){ $data = $Position_tag->position(array('action'=>'position','posid'=>'1','num'=>'1','catid'=>'8','order'=>'updatetime DESC',)); }; if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="special">
											<div class="pic">
												<a href="<?php echo ($vo["data"]["url"]); ?>"><img src="<?php echo ($vo["data"]["thumb"]); ?>" alt=""></a>
											</div>
											<div class="text">
												<h4><a href="#"><?php echo (str_cut($vo["data"]["title"],15)); ?></a></h4>
												<p><a href="#"><?php echo (str_cut($vo["data"]["description"],23)); ?>【详细】</a></p>
											</div>
										</div><?php endforeach; endif; else: echo "" ;endif; ?>
								<ul>
									<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>'8','order'=>'updatetime DESC','num'=>'5','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["url"]); ?>"><?php echo (str_cut($vo["title"],20)); ?></a><span><?php echo (date("Y-m-d",$vo["updatetime"])); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>	
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="fr fixed2-fr">
			<div class="box1">
				<ul>
					<li><a href="<?php echo getCategory(49,'url');?>"><img src="<?php echo ($config_siteurl); ?>statics/default/images/img1.jpg" alt=""></a></li>
					<li><a href="<?php echo getCategory(50,'url');?>"><img src="<?php echo ($config_siteurl); ?>statics/default/images/img2.jpg" alt=""></a></li>
					<li><a href="<?php echo getCategory(51,'url');?>"><img src="<?php echo ($config_siteurl); ?>statics/default/images/img3.jpg" alt=""></a></li>
					<li><a href="<?php echo getCategory(52,'url');?>"><img src="<?php echo ($config_siteurl); ?>statics/default/images/img4.jpg" alt=""></a></li>
				</ul>
			</div>
			<div class="box2">
				<img src="<?php echo ($config_siteurl); ?>statics/default/images/khdewm.jpg" alt="">
			</div>
			<div class="box4">
				<div class="tit"><a href="<?php echo getCategory(7,'url');?>" class="noti">预算监督</a><a href="<?php echo getCategory(7,'url');?>" class="more"><i class="c-red">+</i> 更多</a></div>
				<div class="fixed2-fr-tab">
					<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "category")){ $data = $content_tag->category(array('action'=>'category','catid'=>'7','num'=>'3','order'=>'listorder desc','page'=>'0','pagefun'=>'page','return'=>'data',)); } ?><div class="fr-tab-hd tab-w">
							<?php if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><a  <?php if($k == 1): ?>class="cur"<?php endif; ?>  href="<?php echo ($vo["url"]); ?>" ><?php echo ($vo["catname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
						<div class="fr-tab-bd">
							<?php if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><ul <?php if($k == 1): ?>class="ul1"<?php endif; ?> >
									<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>$vo['catid'],'order'=>'updatetime DESC','num'=>'3','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["url"]); ?>"><?php echo (str_cut($vo["title"],20)); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
								</ul><?php endforeach; endif; else: echo "" ;endif; ?>	
						</div>
				</div>
			</div>
			<div class="box4">
				<div class="tit"><a href="<?php echo getCategory(9,'url');?>" class="noti">文献资料</a><a href="<?php echo getCategory(9,'url');?>" class="more"><i class="c-red">+</i> 更多</a></div>
				<div class="fixed2-fr-tab">
					<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "category")){ $data = $content_tag->category(array('action'=>'category','catid'=>'9','num'=>'3','order'=>'listorder desc','page'=>'0','pagefun'=>'page','return'=>'data',)); } ?><div class="fr-tab-hd tab-w">
							<?php if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><a  <?php if($k == 1): ?>class="cur"<?php endif; ?>  href="<?php echo ($vo["url"]); ?>" ><?php echo ($vo["catname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
						<div class="fr-tab-bd">
							<?php if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><ul <?php if($k == 1): ?>class="ul1"<?php endif; ?> >
									<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>$vo['catid'],'order'=>'updatetime DESC','num'=>'4','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["url"]); ?>"><?php echo (str_cut($vo["title"],20)); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
								</ul><?php endforeach; endif; else: echo "" ;endif; ?>	
						</div>
				</div>
			</div>

		</div>
	</div>
	<!-- fixed2 end -->
	<!-- link start -->
	<div class="link w clearfix">
		<div class="fl">
			<ul>
				<li class="li1"><a href="http://www.npc.gov.cn/" target="_blank"><img src="<?php echo ($config_siteurl); ?>statics/default/images/link1.jpg" alt=""></a></li>
				<li class="li2"><a href="http://www.sdrd.gov.cn/" target="_blank"><img src="<?php echo ($config_siteurl); ?>statics/default/images/link2.jpg" alt=""></a></li>
				<li class="li3"><a href="http://www.lyrenda.gov.cn/" target="_blank"><img src="<?php echo ($config_siteurl); ?>statics/default/images/link3.jpg" alt=""></a></li>
				<li class="li4"><a href="http://www.hedong.gov.cn/" target="_blank"><img src="<?php echo ($config_siteurl); ?>statics/default/images/link4.jpg" alt=""></a></li>
				<li class="li5"><a href="http://lyhdqfy.sdcourt.gov.cn/" target="_blank"><img src="<?php echo ($config_siteurl); ?>statics/default/images/link5.jpg" alt=""></a></li>
				<li class="li6"><a href="http://www.hdq.lyjc.gov.cn/main/main.aspx" target="_blank"><img src="<?php echo ($config_siteurl); ?>statics/default/images/link6.jpg" alt=""></a></li>
			</ul>
		</div>
		<div class="fr">
			<select name="rd1" onchange="if(value!=''){window.open(this.options[this.selectedIndex].value);}else{return(false);}">
				<option  value="">省级人大</option>
				 <?php  $cache = 0; $cacheID = to_guid_string(array('termsid'=>'1','visible'=>'1',)); if(0 && $_return = S( $cacheID ) ){ $data=$_return; }else{ $get_db = M(ucwords("links")); $get_db->order("updatetime DESC"); $data=$get_db->where(array('termsid'=>'1','visible'=>'1',))->limit(20)->select(); if(0){ S( $cacheID ,$data,$cache); }; } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option  value="<?php echo ($vo["url"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
			<select name="rd2" onchange="if(value!=''){window.open(this.options[this.selectedIndex].value);}else{return(false);}">
				<option value="">市级人大</option>
				 <?php  $cache = 0; $cacheID = to_guid_string(array('termsid'=>'2','visible'=>'1',)); if(0 && $_return = S( $cacheID ) ){ $data=$_return; }else{ $get_db = M(ucwords("links")); $get_db->order("updatetime DESC"); $data=$get_db->where(array('termsid'=>'2','visible'=>'1',))->limit(20)->select(); if(0){ S( $cacheID ,$data,$cache); }; } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option  value="<?php echo ($vo["url"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
			<select name="rd3" onchange="if(value!=''){window.open(this.options[this.selectedIndex].value);}else{return(false);}">
				<option value="">县级人大</option>
				 <?php  $cache = 0; $cacheID = to_guid_string(array('termsid'=>'3','visible'=>'1',)); if(0 && $_return = S( $cacheID ) ){ $data=$_return; }else{ $get_db = M(ucwords("links")); $get_db->order("updatetime DESC"); $data=$get_db->where(array('termsid'=>'3','visible'=>'1',))->limit(20)->select(); if(0){ S( $cacheID ,$data,$cache); }; } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option  value="<?php echo ($vo["url"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
		</div>
	</div>
	<!-- link end -->
	<!-- footer start -->
	<div class="footer clearfix min-w">
		<div class="w">
			<div class="govlogo fl"><a></a></div>
			<div class="copyright fl">
				<?php echo cache('Config.footerinfo');?>
			</div>
			<div class="findwrong fr"><a href="#"></a></div>
		</div>
	</div>
	<!-- footer end -->
	<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/default/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/default/js/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/default/js/scroll.js"></script>
	<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/default/js/base.js"></script>
	<script type="text/javascript">
		tick();
	</script>	
</body>
</html>