<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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


	<div class="main clearfix">
		<div class="content" style="width: 1000px;padding: 0 100px;">
			<div class="content_title"><?php echo ($title); ?></div><!-- <?php echo getCategory($catid,'catname');?> -->
			<div class="inner">
				<?php echo ($content); ?>
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