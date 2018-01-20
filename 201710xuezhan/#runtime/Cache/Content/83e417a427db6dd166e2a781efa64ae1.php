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
<!-- 背景音乐 -->
<!-- <div class="bgsound" style="width:0;height:0;overflow:hidden">
	<embed bgsound src="<?php echo ($config_siteurl); ?>statics/default/images/ymsxd.mp3" loop="-1" hidden="true" autostart="true"> 
</div> -->
	<div class="flexslider">
		<ul class="slides">
			<li data-thumb="<?php echo ($config_siteurl); ?>statics/default/images/banner1.png">
				<img src="<?php echo ($config_siteurl); ?>statics/default/images/banner1.png" alt="" />
			</li>
			<li data-thumb="<?php echo ($config_siteurl); ?>statics/default/images/banner1.png">
				<img src="<?php echo ($config_siteurl); ?>statics/default/images/banner1.png" alt="" />
			</li>
			<li data-thumb="<?php echo ($config_siteurl); ?>statics/default/images/banner1.png">
				<img src="<?php echo ($config_siteurl); ?>statics/default/images/banner1.png" alt="" />
			</li>
		</ul>
	</div>

</div>



	<div class="w clearfix">
		<!-- fixed1 start -->
		<div class="fixed fixed1 clearfix">
			<div class="fl"><h4><a href="#" target="_blank">最新消息</a></h4></div>
			<div class="scrollbox">
			    <div id="scrollDiv">

			    	<ul>
			    		<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>'2','order'=>'inputtime DESC','num'=>'3','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li><a href="<?php echo ($vo["url"]); ?>" target="_blank"><?php echo ($vo["title"]); ?></a><span><?php echo (date("Y-m-d",$vo["inputtime"])); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
			       </ul>

			    </div>
			    <div class="scroltit">
			    	<div class="updown" id="but_up">&gt;</div>
			    	<div class="updown" id="but_down">&lt;</div>
			    </div>
			</div>
		</div>
		
		<!-- fixed1 end -->
		<!-- fixed2 start -->
		<div class="fixed fixed2 clearfix">
			<div class="box box1">
				<div class="flexslider1">
					<ul class="slides">

						<?php $Position_tag = \Think\Think::instance("\Content\TagLib\Position"); if(method_exists($Position_tag, "position")){ $data = $Position_tag->position(array('action'=>'position','posid'=>'1','num'=>'5',)); }; if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
									<a href="<?php echo ($vo["data"]["url"]); ?>"><img src="<?php echo ($vo["data"]["thumb"]); ?>" alt="<?php echo ($vo["data"]["title"]); ?>"></a>
									<span><a href="<?php echo ($vo["data"]["url"]); ?>"><?php echo ($vo["data"]["title"]); ?></a></span>
								</li><?php endforeach; endif; else: echo "" ;endif; ?>

					</ul>
				</div>
			</div>
			<div class="box box2">
				<div class="title clearfix">
					<h4><a href="javascript:void(0)" target="_blank">新闻中心</a></h4>
					<p><a href="<?php echo getCategory(2,'url');?>" target="_blank">MORE +</a></p>
				</div>
				<div class="lis clearfix">
					<ul>

						<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>'2','order'=>'inputtime DESC','num'=>'8','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li><a href="<?php echo ($vo["url"]); ?>" target="_blank"><?php echo ($vo["title"]); ?></a><span><?php echo (date("Y-m-d",$vo["inputtime"])); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>

					</ul>
				</div>
			</div>
			<div class="box box3">
				<div class="title clearfix">
					<h4><a href="javascript:void(0)" target="_blank"><?php echo getCategory(10,'catname');?></a></h4>
					<p><a href="<?php echo getCategory(10,'url');?>" target="_blank">MORE +</a></p>
				</div>
				<div class="lis clearfix">
					<ul>
						<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>'10','order'=>'inputtime DESC','num'=>'8','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li><a href="<?php echo ($vo["url"]); ?>" target="_blank"><?php echo ($vo["title"]); ?></a><span><?php echo (date("Y-m",$vo["inputtime"])); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
		</div>
		<!-- fixed2 end -->

		<!-- fixed3 start -->
		<div class="fixed fixed3 clearfix">
			<a href="http://new.lyblood.com" target="_blank"><img src="<?php echo ($config_siteurl); ?>statics/default/images/banner2.jpg" alt=""></a>
		</div>
		<!-- fixed3 end -->

		<!-- fixed4 start -->
		<div class="fixed fixed4 clearfix">
			<a href="/index.php?a=lists&catid=15" target="_blank" class="a1">预约献血</a>
			<a href="#" target="_blank" class="a2">献血结果查询</a>
			<a href="#" target="_blank" class="a3">用血报销指南</a>
			<a href="#" target="_blank" class="a4">献血指南</a>
			<a href="#" target="_blank" class="a5">招募志愿者</a>
		</div>
		<!-- fixed4 end -->
		<!-- fixed5 start -->
		<div class="fixed fixed5 clearfix">
			
			<div class="box box1">
				<div class="title clearfix">
					<h4><a href="#" target="_blank">血液库存</a></h4>
					<p><a href="#" target="_blank">MORE +</a></p>
				</div>
				<div class="bos clearfix">
					<div class="bo bo1">
						<p class="p1"><img src="<?php echo ($config_siteurl); ?>statics/default/images/xueliang1.png" alt=""></p>
						<p class="p2">A</p>
						<p class="p3">正常</p>
					</div>
					<div class="bo bo2">
						<p class="p1"><img src="<?php echo ($config_siteurl); ?>statics/default/images/xueliang1.png" alt=""></p>
						<p class="p2">B</p>
						<p class="p3">偏少</p>
					</div>
					<div class="bo bo3">
						<p class="p1"><img src="<?php echo ($config_siteurl); ?>statics/default/images/xueliang1.png" alt=""></p>
						<p class="p2">AB</p>
						<p class="p3">偏少</p>
					</div>
					<div class="bo bo4">
						<p class="p1"><img src="<?php echo ($config_siteurl); ?>statics/default/images/xueliang1.png" alt=""></p>
						<p class="p2">O</p>
						<p class="p3">偏少</p>
					</div>
					
				</div>
			</div>

			<div class="box box2">
				<div class="title">
					<h4><a href="#" target="_blank">献血者信息查询</a></h4>
					<p><a href="#" target="_blank">MORE +</a></p>
				</div>
				<div class="formBox">
					<form action="">
						<div class="form form1"><span>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名 :</span><input type="text"></div>
						<div class="form form2"><span>身份证号 :</span><input type="text"></div>
						<div class="form form3"><span>献血编号 :</span><input type="text"></div>
						
						<div class="form form4"><span>验证码：</span><input type="text">
						<img src="/index.php?g=Api&m=Checkcode&type=gbook&code_len=4&font_size=20&width=72&height=34&font_color=&background=" onclick="refreshs()" id="code_img" alt="">
						</div>

						<div class="form form5">
							<input type="submit" value="提交" class="sub">
							<input type="reset" value="重置" class="res">
						</div>
					</form>
				</div>
			</div>

			<div class="box box3 clearfix">
				<div class="fl">
					<p><img src="<?php echo ($config_siteurl); ?>statics/default/images/weixin.png" alt=""></p>
					<p>微信公众号</p>
					<p>扫一扫关注我们</p>
				</div>
				<div class="fr">
					<p><img src="<?php echo ($config_siteurl); ?>statics/default/images/weibo.png" alt=""></p>
					<p>新浪微博</p>
					<p><a href="#" target="_blank">+ 关注</a></p>
				</div>
			</div>
		</div>
		<!-- fixed5 end -->
		<!-- fixed6 start -->
		<div class="fixed fixed6 clearfix">
			<div class="box box1">
				
				<div class="title clearfix">
					<h4><a href="javascript:void(0)" target="_blank"><?php echo getCategory(11,'catname');?></a></h4>
					<p><a href="<?php echo getCategory(11,'url');?>" target="_blank">MORE +</a></p>
				</div>
				<div class="lis clearfix">
					<ul>
						<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>'11','order'=>'inputtime DESC','num'=>'8','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li><a href="<?php echo ($vo["url"]); ?>" target="_blank"><?php echo ($vo["title"]); ?></a><span><?php echo (date("Y-m",$vo["inputtime"])); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>

			</div>
			<div class="box box2">
				<div class="title clearfix">
					<h4><a href="javascript:void(0)" target="_blank"><?php echo getCategory(12,'catname');?></a></h4>
					<p><a href="<?php echo getCategory(12,'url');?>" target="_blank">MORE +</a></p>
				</div>
				<div class="lis clearfix">
					<ul>
						<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>'12','order'=>'inputtime DESC','num'=>'8','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li><a href="<?php echo ($vo["url"]); ?>" target="_blank"><?php echo ($vo["title"]); ?></a><span><?php echo (date("Y-m",$vo["inputtime"])); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
			<div class="box box3">
				<div class="title clearfix">
					<h4><a href="javascript:void(0)" target="_blank"><?php echo getCategory(13,'catname');?></a></h4>
					<p><a href="<?php echo getCategory(13,'url');?>" target="_blank">MORE +</a></p>
				</div>
				<div class="lis clearfix">
					<ul>
						<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>'13','order'=>'inputtime DESC','num'=>'8','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li><a href="<?php echo ($vo["url"]); ?>" target="_blank"><?php echo ($vo["title"]); ?></a><span><?php echo (date("Y-m",$vo["inputtime"])); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
		</div>
		<!-- fixed6 end -->
		<!-- fixed7 start -->
		<div class="fixed fixed7 clearfix">
			<div id="pic_list_1" class="scroll_horizontal">
				<div class="box">
					<ul class="list">

						<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); $count = $content_tag->count(array('action'=>'lists','catid'=>'14','num'=>'10','order'=>'inputtime DESC','page'=>$page,'thumb'=>'1','pagefun'=>'page','return'=>'data',)); $_page_ = page($count ,10,$page,array('isrule'=>'1',)); $GLOBALS["Total_Pages"] = $_page_->Total_Pages; $pages = $_page_->show("default"); $pagetotal = $_page_->Total_Pages; $totalsize = $_page_->Total_Size; if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>'14','num'=>'10','order'=>'inputtime DESC','page'=>$page,'thumb'=>'1','pagefun'=>'page','return'=>'data','count'=>$count,'limit'=>$_page_->firstRow.",".$_page_->listRows,)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
									<a href="<?php echo ($vo["url"]); ?>" target="_blank"><img src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>" title="<?php echo ($vo["title"]); ?>"></a>
									<span><a href="<?php echo ($vo["url"]); ?>" target="_blank"><?php echo ($vo["title"]); ?></a></span>
								</li><?php endforeach; endif; else: echo "" ;endif; ?>
					
					</ul>
				</div>
				<div class="plus"></div>
				<div class="minus"></div>
			</div>
		</div>
		<!-- fixed7 end -->

		


		<!-- fixed8 start -->
		<div class="fixed fixed8 clearfix">
			<div class="title clearfix">
				<h4><a href="#" target="_blank">相关链接</a></h4>
			</div>
			<div id="marquee1">
				<ul>
					 <?php  $cache = 0; $cacheID = to_guid_string(array('termsid'=>'7','visible'=>'1',)); if(0 && $_return = S( $cacheID ) ){ $data=$_return; }else{ $get_db = M(ucwords("links")); $get_db->order("id DESC"); $data=$get_db->where(array('termsid'=>'7','visible'=>'1',))->limit(20)->select(); if(0){ S( $cacheID ,$data,$cache); }; } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["url"]); ?>" target="_blank"><img src="<?php echo ($vo["image"]); ?>"></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					
				</ul>
			</div>
			<div class="select clearfix">
				<select name="" onchange="if(value!=''){window.open(this.options[this.selectedIndex].value);}else{return(false);}">
					 <?php  $cache = 0; $cacheID = to_guid_string(array('termsid'=>'2','visible'=>'1',)); if(0 && $_return = S( $cacheID ) ){ $data=$_return; }else{ $get_db = M(ucwords("links")); $get_db->order("id DESC"); $data=$get_db->where(array('termsid'=>'2','visible'=>'1',))->limit(20)->select(); if(0){ S( $cacheID ,$data,$cache); }; } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["url"]); ?>" ><a href="<?php echo ($vo["url"]); ?>" target="_blank" title="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></a></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
				<select name="" onchange="if(value!=''){window.open(this.options[this.selectedIndex].value);}else{return(false);}">
					 <?php  $cache = 0; $cacheID = to_guid_string(array('termsid'=>'3','visible'=>'1',)); if(0 && $_return = S( $cacheID ) ){ $data=$_return; }else{ $get_db = M(ucwords("links")); $get_db->order("id DESC"); $data=$get_db->where(array('termsid'=>'3','visible'=>'1',))->limit(20)->select(); if(0){ S( $cacheID ,$data,$cache); }; } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["url"]); ?>" ><a href="<?php echo ($vo["url"]); ?>" target="_blank" title="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></a></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
				<select name="" onchange="if(value!=''){window.open(this.options[this.selectedIndex].value);}else{return(false);}">
					 <?php  $cache = 0; $cacheID = to_guid_string(array('termsid'=>'4','visible'=>'1',)); if(0 && $_return = S( $cacheID ) ){ $data=$_return; }else{ $get_db = M(ucwords("links")); $get_db->order("id DESC"); $data=$get_db->where(array('termsid'=>'4','visible'=>'1',))->limit(20)->select(); if(0){ S( $cacheID ,$data,$cache); }; } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["url"]); ?>" ><a href="<?php echo ($vo["url"]); ?>" target="_blank" title="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></a></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
				<select name="" onchange="if(value!=''){window.open(this.options[this.selectedIndex].value);}else{return(false);}">
					 <?php  $cache = 0; $cacheID = to_guid_string(array('termsid'=>'5','visible'=>'1',)); if(0 && $_return = S( $cacheID ) ){ $data=$_return; }else{ $get_db = M(ucwords("links")); $get_db->order("id DESC"); $data=$get_db->where(array('termsid'=>'5','visible'=>'1',))->limit(20)->select(); if(0){ S( $cacheID ,$data,$cache); }; } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["url"]); ?>" ><a href="<?php echo ($vo["url"]); ?>" target="_blank" title="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></a></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
				
				<select name="" onchange="if(value!=''){window.open(this.options[this.selectedIndex].value);}else{return(false);}">
					 <?php  $cache = 0; $cacheID = to_guid_string(array('termsid'=>'6','visible'=>'1',)); if(0 && $_return = S( $cacheID ) ){ $data=$_return; }else{ $get_db = M(ucwords("links")); $get_db->order("id DESC"); $data=$get_db->where(array('termsid'=>'6','visible'=>'1',))->limit(20)->select(); if(0){ S( $cacheID ,$data,$cache); }; } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["url"]); ?>" ><a href="<?php echo ($vo["url"]); ?>" target="_blank" title="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></a></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>

				<select name="" onchange="if(value!=''){window.open(this.options[this.selectedIndex].value);}else{return(false);}">
					 <?php  $cache = 0; $cacheID = to_guid_string(array('termsid'=>'1','visible'=>'1',)); if(0 && $_return = S( $cacheID ) ){ $data=$_return; }else{ $get_db = M(ucwords("links")); $get_db->order("id DESC"); $data=$get_db->where(array('termsid'=>'1','visible'=>'1',))->limit(20)->select(); if(0){ S( $cacheID ,$data,$cache); }; } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["url"]); ?>" ><a href="<?php echo ($vo["url"]); ?>" target="_blank" title="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></a></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</div>
		</div>
		<!-- fixed8 end -->

	</div>





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

<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/default/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/default/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/default/js/jq_scroll.js"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/default/js/jquery.cxscroll.js"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/default/js/jquery.kxbdMarquee.js"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/default/js/index.js"></script>
<script type="text/javascript">
function refreshs(){
	document.getElementById('code_img').src='<?php echo U('Api/Checkcode/index','type=gbook&code_len=4&font_size=20&width=72&height=34&font_color=&background=&refresh=1');?>&time='+Math.random();void(0);
}

</script>