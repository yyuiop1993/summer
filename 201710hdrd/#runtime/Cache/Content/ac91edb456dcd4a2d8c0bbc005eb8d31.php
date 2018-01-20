<?php if (!defined('THINK_PATH')) exit();?>	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php if( isset($SEO['title']) && !empty($SEO['title']) ): echo ($SEO['title']); endif; echo ($SEO['site_title']); ?></title>
    <meta name="description" content="<?php echo ($SEO['description']); ?>" />
    <meta name="keywords" content="<?php echo ($SEO['keyword']); ?>" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo ($config_siteurl); ?>statics/default/images/favicon.ico" media="screen" />
	<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/default/css/base.css">
	<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/default/css/page.css">
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
					<li class="li01"><a href="/" class="a1 ">首 页</a></li>
					<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "category")){ $data = $content_tag->category(array('action'=>'category','catid'=>'0','num'=>'9','order'=>'listorder ASC','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="li01"><a href="<?php echo ($vo["url"]); ?>" class="a1 <?php if( $catid == $vo["catid"] ): ?>current<?php endif; ?>
"><?php echo ($vo["catname"]); ?></a>
								<?php if(strpos(getCategory($vo['catid'],'arrchildid'),',') and (substr_count(getCategory($vo['catid'],'arrchildid'),',') > 1 )): $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "category")){ $data = $content_tag->category(array('action'=>'category','catid'=>$vo['catid'],'order'=>'listorder ASC','num'=>'0','page'=>'0','pagefun'=>'page','return'=>'data',)); } ?><ul>
											<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo1["url"]); ?>"><?php echo ($vo1["catname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
										</ul><?php endif; ?>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					
				</ul>
			</div>
		</div>
	</div>
	<!-- header end -->
	<!-- content start -->
	<div class="content w clearfix">
		<div class="content-l fl">
			<div class="content-l fl">
		<h3>
			<?php if(getCategory($catid,'parentid') == 0): echo getCategory($catid,'catname');?>
		    <?php else: ?>
		        <?php echo getCategory(getCategory($catid,'parentid'),'catname'); endif; ?>

		</h3>
		<ul>
			<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "category")){ $data = $content_tag->category(array('action'=>'category','catid'=>$catid,'order'=>'listorder ASC','num'=>'0','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li  <?php if(in_array($catid,explode(',',$vo['arrchildid']))): ?>class="current"<?php endif; ?>  ><a href="<?php echo ($vo["url"]); ?>" ><?php echo ($vo["catname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>	
</div>


		</div>
		<div class="content-r fr">
			<div class="title">
				<span><?php echo ($catname); ?></span>
			</div>
			<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); $count = $content_tag->count(array('action'=>'lists','catid'=>$catid,'order'=>'updatetime DESC','page'=>$page,'num'=>'0','pagefun'=>'page','return'=>'data',)); $_page_ = page($count ,0,$page,array('isrule'=>'1',)); $GLOBALS["Total_Pages"] = $_page_->Total_Pages; $pages = $_page_->show("default"); $pagetotal = $_page_->Total_Pages; $totalsize = $_page_->Total_Size; if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>$catid,'order'=>'updatetime DESC','page'=>$page,'num'=>'0','pagefun'=>'page','return'=>'data','count'=>$count,'limit'=>$_page_->firstRow.",".$_page_->listRows,)); } ?><div class="inner">
					<ul>
						<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["title"]); ?></a><span>[ <?php echo (date("Y-m-d",$vo["updatetime"])); ?> ]</span></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<div class="fenye">
		          <ul>
		            <?php echo ($pages); ?>
		          </ul>
		        </div>
		</div>
	</div>
	<!-- content end -->
		<!-- footer start -->
	<div class="footer clearfix min-w">
		<div class="w">
			<div class="govlogo fl"><a href="#"></a></div>
			<div class="copyright fl">
				<?php echo cache('Config.footerinfo');?>
			</div>
			<div class="findwrong fr"><a href="#"></a></div>
		</div>
	</div>
	<!-- footer end -->
	<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/default/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/default/js/base.js"></script>
	<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/default/js/index.js">
	<script type="text/javascript">
		tick();
	</script>
</body>
</html>