<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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
			<div class="message-inner clearfix">
				<div class="box box1">
					<div class="tit"><p>我要留言</p></div>
					<div class="inn" id="inn">
						<form action="<?php echo U('Content/Gbook/postgbook');?>"  onsubmit="return checkForm();"  method="post">
						<div class="form form1">
							<span>留言姓名:</span>
							<input type="text" name="name" id="name">
							<i>*</i>
						</div>
						<div class="form form2">
							<span>联系电话:</span>
							<input type="text" name="phone" id="phone">
							<i>*</i>
						</div>
						<div class="form form3">
							<span>E - mail:&nbsp;</span>
							<input type="text"  name="mail" id="mail">
							<i>*</i>
						</div>
						<div class="form form4">
							<span>联系Q&nbsp;Q:&nbsp;</span>
							<input type="text" name="qq" id="qq">
							<i>*</i>
						</div>
						<div class="form form5">
							<span>留言主题:</span>
							<input type="text" name="title" id="title">
							<i>*</i>
						</div>
						<div class="form form6">
							<span>留言内容:</span>
							<textarea name="cont" id="cont" ></textarea>
							<i>*</i>
						</div>
						<div class="form form7">
							<span>验 证 码:&nbsp;</span>
							<input type="text" name="yzm" id="yzm">
							<img src="<?php echo U('Api/Checkcode/index','type=gbook&code_len=4&font_size=20&width=80&height=32&font_color=&background=');?>" onClick="refreshs()" id="code_img"  alt="">
							<a onClick="refreshs()"  style="cursor: pointer;">看不清 换一张</a>
						</div>
						<div class="cl"></div>
						<div class="form form8">
							<input type="hidden" name="catid" value="<?php echo ($catid); ?>" />
							<input type="submit" name="submit" value="提&nbsp;&nbsp;&nbsp;交">
							<input type="reset" id="yigeform" value="重&nbsp;&nbsp;&nbsp;置">
						</div>
						</form>
					</div>
				</div>
				<div class="box box2">
					<div class="tit">
						<p>信件查询</p>
						<form method='post' action="<?php echo U('Content/Gbook/findmsg');?>">
							<div class="form" >
								<span>查询码：</span>
								<input type="text" name="cxm">
								<input type="hidden" name="catid" value="<?php echo ($catid); ?>" />
							</div>
							<button>查询</button>
						</form>	
					</div>
					 <?php  $_count_sql = "SELECT COUNT(*) as count FROM  zf_gbook  where status=1 and is_show=1  order by id desc"; $_sql = "select * from zf_gbook  where status=1 and is_show=1  order by id desc"; $cache = 0; $cacheID = to_guid_string(array($_sql,$page)); if($cache && $_return = S($cacheID)){ $count = $_return["count"]; }else{ $get_db = M(); $count = $get_db->query($_count_sql); $count = $count[0]["count"]; } $_page_ = page($count ,5,$page,array('isrule'=>'1',)); $pages = $_page_->show(); $GLOBALS["Total_Pages"] = $_page_->Total_Pages; $pagetotal = $_page_->Total_Pages; $totalsize = $_page_->Total_Size; if($cache && $_return){ $data = $_return["data"]; }else{ $data = $get_db->query($_sql." LIMIT ".$_page_->firstRow.",".$_page_->listRows." "); if($cache){ S($cacheID ,array("count"=>$count,"data"=>$data),$cache); }; } ?><ul>
							
								<li class="titli">
									<div class="left">
										<h5 class="fl1">类别</h5>
										<h5 class="fl2">标题</h5>
									</div>
									<div class="right">
										<h5>来信时间</h5>
										<h5>处理状态</h5>
										<h5>回复时间</h5>
									</div>
								</li>
								<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
									<div class="left">
										<p class="fl1"><?php echo (hz_get_type($vo["type"])); ?></p>
										<p class="fl2" style="width: 470px;"><a href="<?php echo U('Index/showgbook',array('id'=>$vo['cxm'],'catid'=>10));?>"><?php echo (str_cut($vo["title"],30)); ?></a></p>
									</div>
									<div class="right">
										<p><?php echo (date('Y-m-d',$vo["add_time"])); ?></p>
										<p><?php echo (hz_get_status($vo["status"])); ?></p>
										<p><?php echo (date('Y-m-d',$vo["cl_time"])); ?></p>
									</div>
								</li><?php endforeach; endif; else: echo "" ;endif; ?>
							
						</ul>
						<div class="fenye">
				          <ul>
				            <?php echo ($pages); ?>
				          </ul>
				        </div>
				</div>
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
<script>
//刷新广告
function refreshs(){
	
	document.getElementById('code_img').src='<?php echo U('Api/Checkcode/index','type=gbook&code_len=4&font_size=20&width=130&height=50&font_color=&background=&refresh=1');?>&time='+Math.random();void(0);
	}
	function checkForm() {
	    if ($("#name").val().trim().length == 0) {
	        $("#name").focus();
	        return false;
	    }
	    if ($("#phone").val().trim().length == 0) {
	        $("#phone").focus();
	        return false;
	    }
	    if ($("#mail").val().trim().length == 0) {
	        $("#mail").focus();
	        return false;
	    }
	    if ($("#qq").val().trim().length == 0) {
	        $("#qq").focus();
	        return false;
	    }
	    if ($("#title").val().trim().length == 0) {
	        $("#title").focus();
	        return false;
	    }
	    if ($("#cont").val().trim().length == 0) {
	        $("#cont").focus();
	        return false;
	    }
	    if ($("#yzm").val().trim().length == 0) {
	        $("#yzm").focus();
	        return false;
	    }
	}
</script>