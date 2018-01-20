<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
<meta name="description" content="{$SEO['description']}" />
<meta name="keywords" content="{$SEO['keyword']}" />

<meta name="viewport" content="width=device-width">

<link rel="stylesheet" href="{$config_siteurl}statics/wap/css/base.css">
<link rel="stylesheet" href="{$config_siteurl}statics/wap/css/page.css">
<link rel="stylesheet" href="{$config_siteurl}statics/wap/css/jquery.mmenu.all.css" />

<script type="text/javascript" src="{$config_siteurl}statics/wap/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/wap/js/layer_mobile/layer.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/wap/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/wap/js/jquery.mmenu.min.all.js"></script>


</head>
<body>

	<div class="header clearfix">
		<div class="header-left">
			<a href="#menu"><img src="{$config_siteurl}statics/wap/images/menu.png"></a>
		</div>
		<div class="header-right">
			<img src="{$config_siteurl}statics/wap/images/logo.png" >
		</div>
	</div>

	<nav id="menu">
		<ul>
			<li><a href="/index.php">首页</a></li>

			<content action="category" catid="0" num='7'  order="listorder ASC" >
                <volist name="data" id="vo">
                    <li <if condition="in_array($catid,explode(',',$vo['arrchildid']))"> class="current"</if>><a href="{$vo.url}">{$vo.catname}</a></li>
                </volist>
            </content>

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