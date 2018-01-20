<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php if( isset($SEO['title']) && !empty($SEO['title']) ): echo ($SEO['title']); endif; echo ($SEO['site_title']); ?></title>
<meta name="description" content="<?php echo ($SEO['description']); ?>" />
<meta name="keywords" content="<?php echo ($SEO['keyword']); ?>" />

<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/wap/css/base.css">
<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/wap/css/index.css">
<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/wap/css/jquery.mmenu.all.css" />


</head>
<body>
	<!-- header start  -->
	<div class="header-bg"></div>
	<div class="header clearfix">
		<div class="header-left">
			<a href="#menu"><img src="<?php echo ($config_siteurl); ?>statics/wap/images/menu.png"></a>
		</div>
		<div class="header-right">
			<img src="<?php echo ($config_siteurl); ?>statics/wap/images/logo.png" >
		</div>
	</div>
	<!-- header end  -->


	<nav id="menu">
		<ul>
			<li><a href="/index.php">首页</a></li>
			<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "category")){ $data = $content_tag->category(array('action'=>'category','catid'=>'0','num'=>'7','order'=>'listorder ASC','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if(in_array($catid,explode(',',$vo['arrchildid']))): ?>class="current"<?php endif; ?>><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["catname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</nav>


	<div class="flexslider clearfix">
        <ul class="slides">

            <li data-thumb="<?php echo ($config_siteurl); ?>statics/wap/images/banner1.jpg">
                <img src="<?php echo ($config_siteurl); ?>statics/wap/images/banner1.jpg" alt="" />
            </li>

            <li data-thumb="<?php echo ($config_siteurl); ?>statics/wap/images/banner2.jpg">
                <img src="<?php echo ($config_siteurl); ?>statics/wap/images/banner2.jpg" alt="" />
            </li>
            
        </ul>
    </div>




    <div class="fixed fixed1">

    	<a href="/index.php"><div class="tbox tbox1">
    		<img src="<?php echo ($config_siteurl); ?>statics/wap/images/ticon1.png">
    		<div class="tbox_cn">拳馆简介</div>
    		<div class="tbox_en">ABOUT US</div>
    	</div></a>

    	<a href="/index.php?a=lists&catid=2"><div class="tbox tbox1">
    		<img src="<?php echo ($config_siteurl); ?>statics/wap/images/ticon3.png">
    		<div class="tbox_cn">教练阵容</div>
    		<div class="tbox_en">COACH LINEUP</div>
    	</div></a>

    	<a href="/index.php?a=lists&catid=3"><div class="tbox tbox1">
    		<img src="<?php echo ($config_siteurl); ?>statics/wap/images/ticon2.png">
    		<div class="tbox_cn">学员风采</div>
    		<div class="tbox_en">STUDENT</div>
    	</div></a>
    </div>
    



    <div class="fixed fixed2 clearfix" style="margin-bottom: 0;">
    	<div class="fixed_title">
    		<div class="title_t1">课程分类</div>
    		<div class="title_t2">-&nbsp;CURRICULUM&nbsp;-</div>
    	</div>

        
        <div class="flexslider flexslider2 clearfix">
            <ul class="slides">

                <li data-thumb="<?php echo ($config_siteurl); ?>statics/wap/images/class3.png">
                    <img src="<?php echo ($config_siteurl); ?>statics/wap/images/class3.png" alt="" />
                </li>

                <li data-thumb="<?php echo ($config_siteurl); ?>statics/wap/images/class4.png">
                    <img src="<?php echo ($config_siteurl); ?>statics/wap/images/class4.png" alt="" />
                </li>
                
                <li data-thumb="<?php echo ($config_siteurl); ?>statics/wap/images/class5.png">
                    <img src="<?php echo ($config_siteurl); ?>statics/wap/images/class5.png" alt="" />
                </li>
            </ul>
        </div>
    </div>
 	

	<!-- fixed1 end  -->
	<!-- fixed2 start  -->
	<div class="fixed fixed3" style="margin-bottom: 80px;">
		<div class="fixed_title">
    		<div class="title_t1">KMA全球频道</div>
    		<div class="title_t2">-&nbsp;与您国际化同行&nbsp;-</div>
    	</div>

    	<div class="world">
    		<img src="<?php echo ($config_siteurl); ?>statics/wap/images/world.png"
    		>
    		<div class="point-area" style="top: 13.8%;left: 69%;position: absolute; width: 80px; height: 80px; visibility: visible; opacity: 1;">
	            <p class="point-name" style="position: absolute; top: 30px; left: 50px;">临沂</p>
	            <a class="point point-dot"></a>
	            <div class="point point-10"></div>
	            <div class="point point-40"></div>
	            <div class="point point-70"></div>

        	</div>
    	</div>

    	

	</div>



	

 

<div class="bottom clearfix">
	<ul>
		<li><a href="/index.php"><img src="<?php echo ($config_siteurl); ?>statics/wap/images/bicon1.png" alt="" /></a></li>
		<li><a href="/index.php?g=Wap&a=lists&catid=5"><img src="<?php echo ($config_siteurl); ?>statics/wap/images/bicon2.png" alt="" /></a></li>
		<li><a href="/index.php?g=Wap&a=lists&catid=6"><img src="<?php echo ($config_siteurl); ?>statics/wap/images/bicon3.png" alt="" /></a></li>
	</ul>
</div>



</body>
</html>

<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/wap/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/wap/js/layer_mobile/layer.js"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/wap/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/wap/js/jquery.mmenu.min.all.js"></script>

	
	

<script>
$(function(){
    $('.flexslider').flexslider({
        animation: "slide", 
        directionNav: true,
        //pauseOnAction: false,
        controlNav: "true"
    });
   
});

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