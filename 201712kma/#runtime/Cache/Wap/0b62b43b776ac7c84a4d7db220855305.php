<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php if( isset($SEO['title']) && !empty($SEO['title']) ): echo ($SEO['title']); endif; echo ($SEO['site_title']); ?></title>
<meta name="description" content="<?php echo ($SEO['description']); ?>" />
<meta name="keywords" content="<?php echo ($SEO['keyword']); ?>" />

<meta name="viewport" content="width=device-width">

<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/wap/css/base.css">
<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/wap/css/page.css">
<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/wap/css/jquery.mmenu.all.css" />

<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/wap/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/wap/js/layer_mobile/layer.js"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/wap/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/wap/js/jquery.mmenu.min.all.js"></script>


</head>
<body>

	<div class="header clearfix">
		<div class="header-left">
			<a href="#menu"><img src="<?php echo ($config_siteurl); ?>statics/wap/images/menu.png"></a>
		</div>
		<div class="header-right">
			<img src="<?php echo ($config_siteurl); ?>statics/wap/images/logo.png" >
		</div>
	</div>

	<nav id="menu">
		<ul>
			<li><a href="/index.php">首页</a></li>

			<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "category")){ $data = $content_tag->category(array('action'=>'category','catid'=>'0','num'=>'7','order'=>'listorder ASC','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if(in_array($catid,explode(',',$vo['arrchildid']))): ?>class="current"<?php endif; ?>><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["catname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>

		</ul>
	</nav>

<script type="text/javascript">
	var $orgMenu, $menu, $html;
	$html = $('html');
	$orgMenu = $('nav#menu').detach();
	updateMenu({});
	function updateMenu( opts ){
		var opened = false;
		var createMenu = function(){
			if ( $menu ){
				$menu.remove();
			}
			$menu = $orgMenu.clone().prependTo( 'body' ).mmenu( opts );
			if ( opened ){
				$menu.trigger( 'open.mm' );
			}
		}
		
		if ( $menu ){
			if ( $html.hasClass( 'mm-opened' ) ){
				opened = true;
				$menu.on( 'closed.mm', createMenu ).trigger( 'close.mm' );
			}else{
				createMenu();
			}
		}else{
			createMenu();
		}

	}

</script>
<style type="text/css">
	p img{
		width: auto;
		max-width: 100%;
	}
</style>
<div class="con">
	<!-- <div class="tit"><span>当前位置：<a href="<?php echo ($config_siteurl); ?>">首页</a>&gt;<?php  $arrparentid = array_filter(explode(',', getCategory($catid,"arrparentid") . ',' . $catid)); foreach ($arrparentid as $cid) { $parsestr[] = '<a href="' . getCategory($cid,'url') . '" >' . getCategory($cid,'catname') . '</a>'; } echo implode("&gt;", $parsestr);?></span></div> -->
	<div class="cont">
		<?php echo ($content); ?>
	</div>
</div>



<div class="bottom clearfix">
	<ul>
		<li><img src="<?php echo ($config_siteurl); ?>statics/wap/images/bicon1.png" alt="" /></li>
		<li><img src="<?php echo ($config_siteurl); ?>statics/wap/images/bicon2.png" alt="" /></li>
		<li><img src="<?php echo ($config_siteurl); ?>statics/wap/images/bicon3.png" alt="" /></li>
	</ul>
</div>



</body>
</html>