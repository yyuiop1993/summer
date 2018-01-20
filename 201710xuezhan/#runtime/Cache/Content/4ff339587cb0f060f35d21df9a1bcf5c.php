<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php if( isset($SEO['title']) && !empty($SEO['title']) ): echo ($SEO['title']); endif; echo ($SEO['site_title']); ?></title>
	<meta name="keywords" content="<?php echo ($SEO['keyword']); ?>" />
    <meta name="description" content="<?php echo ($SEO['description']); ?>" />
	<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/default/css/base.css">
	<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/default/css/index.css">
	<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/default/css/page.css">
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
				<form  name="formsearch" class="form" action="<?php echo U('Search/Index/index');?>" method="post" onsubmit="return checksearch();">
					<input type="text" name="q" id="search" value="-请输入关键字试试-" onfocus="if (value =='-请输入关键字试试-'){value =''}"onblur="if (value ==''){value='-请输入关键字试试-'}">
					<button></button>
				</form>
			</div>
		</div>
		<div class="nav clearfix">
			<ul class="w">
				<li class="li1 <?php if(in_array($catid,explode(',',$vo['arrchildid']))): ?>current<?php endif; ?>"><a href="/index.php" >网站首页</a></li>
				
				<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "category")){ $data = $content_tag->category(array('action'=>'category','catid'=>'0','num'=>'9','order'=>'listorder ASC','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if(in_array($catid,explode(',',$vo['arrchildid']))): ?>class="current"<?php endif; ?>><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["catname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>

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

		<div class="banner">
			<img src="<?php echo ($config_siteurl); ?>statics/default/images/banner3.jpg" alt="">
		</div>
	</div>




	<!-- header end -->
	<!-- content start -->
	<div class="w content clearfix">

		<div class="con-l fl">
			<div class="con-l-t"><a href="<?php echo getCategory($catid,'url');?>" ><?php echo getCategory($catid,'catname');?></a></div>
			<div class="con-l-b">
				<p>0539-7017017</p>
				<ul class="u1">
					<li>地址：临沂市北城新区沂蒙路北路</li>
					<li>传真：0539-7017015</li>
				</ul>
				<ul class="u2">
					<li class="li1"><a href="/index.php?a=lists&catid=15" target="_blank">预约献血</a></li>
					<li class="li2"><a href="#" target="_blank">献血查询</a></li>
					<li class="li3"><a href="#" target="_blank">用血报销指南</a></li>
					<li class="li4"><a href="#" target="_blank">献血指南</a></li>
					<li class="li5"><a href="#" target="_blank">招募志愿者</a></li>
				</ul>
			</div>
		</div>
		<div class="con-r fr">
			<div class="con-r-t">
				<h4><?php echo ($catname); ?></h4>
				<div class="breaknav">
					您当前的位置：<a href="#">首页</a>&nbsp;&gt;&nbsp;<span><?php echo ($catname); ?></span>
				</div>
			</div>

			<div class="main texlist-main">
				<ul>
					<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); $count = $content_tag->count(array('action'=>'lists','catid'=>$catid,'order'=>'inputtime DESC','page'=>$page,'num'=>'0','pagefun'=>'page','return'=>'data',)); $_page_ = page($count ,0,$page,array('isrule'=>'1',)); $GLOBALS["Total_Pages"] = $_page_->Total_Pages; $pages = $_page_->show("default"); $pagetotal = $_page_->Total_Pages; $totalsize = $_page_->Total_Size; if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>$catid,'order'=>'inputtime DESC','page'=>$page,'num'=>'0','pagefun'=>'page','return'=>'data','count'=>$count,'limit'=>$_page_->firstRow.",".$_page_->listRows,)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["url"]); ?>" target="_blank"><?php echo ($vo["title"]); ?></a><span><?php echo (date("Y-m-d",$vo["inputtime"])); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<div class="fenye">
					<ul>
			            <?php echo ($pages); ?>
			        </ul>
				</div>
			</div>
			
		</div>
	</div>
	<!-- content end -->

	<div class="footer clearfix min-w">
		<div class="foot-t w clearfix">
			<div class="box box1">
				<h4>咨询电话：</h4>
				<p>0539-7017017</p>
			</div>
			<div class="box box2">
				<p class="p1">临沂市中心血站</p>
				<p>地址：临沂市北城新区沂蒙路北路146号&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;邮编：276000</p>
				<p>传真：0539-7017017</p>
			</div>
			<div class="box box3">
				<div class="fl"><img src="<?php echo ($config_siteurl); ?>statics/default/images/ewm.png" alt=""></div>
				<div class="fr"><span>临沂市中心血站</span><br>
				<span>微信二维码</span></div>
			</div>
		</div>
		<div class="foot-b clearfix">
			临沂市中心血站&nbsp;&nbsp;&nbsp;&nbsp;版权所有&nbsp;&nbsp;&nbsp;&nbsp;鲁ICP备111111111号&nbsp;&nbsp;&nbsp;&nbsp;技术支持：<a href="#" target="_blank">智峰软件</a>
		</div>	
	</div>

</body>
</html>