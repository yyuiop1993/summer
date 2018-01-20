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
			<div class="page-title clearfix">
				<span><?php echo ($title); ?></span>
			</div>

			<div class="page-title2 clearfix">
				<span>发布于：<?php echo (date("Y-m-d H:i:s",$updatetime)); ?> &nbsp;&nbsp;&nbsp;&nbsp;浏览次数 : <em id="hit">0</em>次</span>
			</div>

			<div class="page-inner clearfix">
				<?php echo ($content); ?>
			</div>
			
			<div class="page_bottom clearfix">
				<span>下一篇 : </span>
				<?php  $_pre_r = \Content\Model\ContentModel::getInstance(getCategory($catid,"modelid"))->where(array("catid"=>$catid,"status"=>99,"id"=>array("LT",$id)))->order(array("id" => "DESC"))->field("id,title,url")->find(); echo $_pre_r?"<a class=\"pre_a\" href=\"".$_pre_r["url"]."\" >".$_pre_r["title"]."</a>":"已经没有了"; ?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span>上一篇 : </span>
				<?php  $_pre_n = \Content\Model\ContentModel::getInstance(getCategory($catid,"modelid"))->where(array("catid"=>$catid,"status"=>99,"id"=>array("GT",$id)))->order(array("id" => "ASC"))->field("id,title,url")->find(); echo $_pre_n?"<a class=\"pre_a\" href=\"".$_pre_n["url"]."\" >".$_pre_n["title"]."</a>":"已经没有了"; ?>
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
	

		

	<script type="text/javascript">
		$(function (){
			
			$.get("<?php echo ($config_siteurl); ?>api.php?m=Hits&catid=<?php echo ($catid); ?>&id=<?php echo ($id); ?>", function (data) {
			    $("#hit").html(data.views);
			}, "json");
		});
	</script>