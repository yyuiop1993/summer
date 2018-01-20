<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />
	<link rel="shortcut icon" type="image/x-icon" href="{$config_siteurl}statics/default/images/favicon.ico" media="screen" />
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/base.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/page.css">
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
					<a href="javascript:void(0);" onclick="AddFavorite('{:cache("Config.sitename")}',location.href)">加入收藏</a>
					<span class="line">|</span>
					<a href="{:getCategory(43,'url')}">联系我们</a>
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
					<content action="category" catid="0" num='9'  order="listorder ASC" >
						<volist name="data" id="vo">
							<li class="li01"><a href="{$vo.url}" class="a1 <if condition=' $catid eq $vo["catid"] '> current</if>
">{$vo.catname}</a>
								<if condition="strpos(getCategory($vo['catid'],'arrchildid'),',') and (substr_count(getCategory($vo['catid'],'arrchildid'),',') gt 1 )">
									<content action="category" catid="$vo['catid']"   order="listorder ASC" >    
										<ul>
											<volist name="data" id="vo1">
												<li><a href="{$vo1.url}">{$vo1.catname}</a></li>
											</volist>
										</ul>
									</content>
								</if>
							</li>
						</volist>
					</content>
					
				</ul>
			</div>
		</div>
	</div>
	<!-- header end -->