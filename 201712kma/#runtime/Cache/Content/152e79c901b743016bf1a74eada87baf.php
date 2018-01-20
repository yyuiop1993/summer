<?php if (!defined('THINK_PATH')) exit();?>	<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title><?php if( isset($SEO['title']) && !empty($SEO['title']) ): echo ($SEO['title']); endif; echo ($SEO['site_title']); ?></title>
    <meta name="description" content="<?php echo ($SEO['description']); ?>" />
    <meta name="keywords" content="<?php echo ($SEO['keyword']); ?>" />

    <link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/default/css/base.css">
    <link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/default/css/index.css">
    <link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/default/css/page.css">
</head>
	
	
<style type="text/css">
	
</style>

<body>
	<div class="header clearfix">
	    <div class="nav">
	        <div class="logo fl">
	            <a href="/index.php"><img class="" src="/statics/default/images/logo.png"></a>
	        </div>
	        
	         <ul class="nav-list fr">

	            <li><a href="/index.php" >首页</a></li>
	            
	            <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "category")){ $data = $content_tag->category(array('action'=>'category','catid'=>'0','num'=>'7','order'=>'listorder ASC','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if(in_array($catid,explode(',',$vo['arrchildid']))): ?>class="current"<?php endif; ?>><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["catname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>

	        </ul>

	    </div>
	</div>


	<!-- content start -->
	<div class="list_content clearfix">
		<div class="clearfix" style="height: 20px;background-color: #fff;">&nbsp;</div>
		<div class="content-l fl">
			<h3>
				<!-- <?php if(getCategory($catid,'parentid') == 0): echo getCategory($catid,'catname');?>
			    <?php else: ?>
			        <?php echo getCategory(getCategory($catid,'parentid'),'catname'); endif; ?> -->
			    <img src="<?php echo ($config_siteurl); ?>statics/default/images/content_title.png" />
			</h3>
			<div class="posi-img"><img src="<?php echo ($config_siteurl); ?>statics/default/images/content_icon.png" /></div>
			<ul>
				<li  <?php if($catid == 2): ?>class="current"<?php endif; ?>  >
					<a href="<?php echo getCategory(2,'url');?>" >
						<?php echo getCategory(2,'catname');?><br>
						<span>Brief introduction</span>
					</a>
					
				</li>
				<li  <?php if($catid == 3): ?>class="current"<?php endif; ?>  >
					<a href="<?php echo getCategory(3,'url');?>" >
						<?php echo getCategory(3,'catname');?><br>
						<span>Coach team</span>
					</a>
				</li>
				<li  <?php if($catid == 4): ?>class="current"<?php endif; ?>  >
					<a href="<?php echo getCategory(4,'url');?>" >
						<?php echo getCategory(4,'catname');?><br>
						<span>Students elegant demeanour</span>
					</a>
					
				</li>

			</ul>	
		</div>

		<div class="content-r fr">
			<div class="title clearfix">
				<span><?php echo ($catname); ?></span>
			</div>

			<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); $count = $content_tag->count(array('action'=>'lists','catid'=>$catid,'order'=>'updatetime DESC','page'=>$page,'num'=>'9','pagefun'=>'page','return'=>'data',)); $_page_ = page($count ,9,$page,array('isrule'=>'1',)); $GLOBALS["Total_Pages"] = $_page_->Total_Pages; $pages = $_page_->show("default"); $pagetotal = $_page_->Total_Pages; $totalsize = $_page_->Total_Size; if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>$catid,'order'=>'updatetime DESC','page'=>$page,'num'=>'9','pagefun'=>'page','return'=>'data','count'=>$count,'limit'=>$_page_->firstRow.",".$_page_->listRows,)); } ?><div class="inner clearfix">
					<ul>
						<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
								<a href="<?php echo ($vo["url"]); ?>"><img src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>"></a>
								<a href="<?php echo ($vo["url"]); ?>" class="votitle"><?php echo ($vo["title"]); ?></a>
								<p><?php echo (str_cut($vo["description"],46)); ?>....</p>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<div class="fenye clearfix">
		          <ul>
		            <?php echo ($pages); ?>
		          </ul>
		        </div>

		</div>
	</div>


	

<div class="footer clearfix">
    <div class="footer_box">
        <div class="footer_left">
            <img class="left_logo" src="<?php echo ($config_siteurl); ?>statics/default/images/logo2.png">
            <div class="footer_left_code">
                <img src="<?php echo ($config_siteurl); ?>statics/default/images/code1.png">
                <img src="<?php echo ($config_siteurl); ?>statics/default/images/code2.png">
                <img src="<?php echo ($config_siteurl); ?>statics/default/images/code3.png">
            </div>
        </div>
        <div class="footer_right">
            <ul class="footer_nav">
                <li><a href="/index.php" >首页</a></li>
                <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "category")){ $data = $content_tag->category(array('action'=>'category','catid'=>'0','num'=>'7','order'=>'listorder ASC','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["catname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            
            <?php echo cache('Config.footerinfo');?>
            
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/default/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/default/js/layer/layer.js"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/default/js/jquery.flexslider-min.js"></script>
<script type="text/javascript">
/*隐藏电脑端段位查询*/
    $(".nav li").each(function(){
        if($(this).find("a").text()=='段位查询'){
            $(this).hide();
        }
    });
    $(".footer_nav li").each(function(){
        if($(this).find("a").text()=='段位查询'){
            $(this).hide();
        }
    });
</script>