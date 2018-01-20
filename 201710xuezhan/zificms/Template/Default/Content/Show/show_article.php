<template file="Content/header.php"/>

		<div class="banner">
			<img src="{$config_siteurl}statics/default/images/banner3.jpg" alt="">
		</div>
	</div>




	<!-- header end -->
	<!-- content start -->
	<div class="w content about-con clearfix">
		
		<template file="Content/left.php"/>

		<div class="con-r fr">
			<div class="con-r-t">
				<h4>{:getCategory($catid,'catname')}</h4>
				<div class="breaknav">
					您当前的位置：<a href="#">首页</a>&nbsp;&gt;&nbsp;<span>{:getCategory($catid,'catname')}</span>
				</div>
			</div>
			<div class="main article-main">
				<h3>{$title}</h3>
				<div class="info">
					<div class="fl">
						发表时间：{$updatetime|date="Y-m-d H:i:s",###}&nbsp;&nbsp;&nbsp;&nbsp;作者：{$author}&nbsp;&nbsp;&nbsp;&nbsp;点击量：<i id="hit"></i>
					</div>
					<div class="fr">
						<span>分享到</span>
						<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
						<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
					</div>
				</div>

				{$content}


				<div class="article-link">
					<div class="fl">
						上一篇：<pre catid="$catid" id="$id" target="1" msg="已经没有了" />
					</div>
					<div class="fl">
						下一篇：<next catid="$catid" id="$id" target="1" msg="已经没有了" />
					</div>
				</div>


			</div>
		</div>
	</div>

	<template file="Content/footer.php"/>
<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
		$(function (){	
			$.get("{$config_siteurl}api.php?m=Hits&catid={$catid}&id={$id}", function (data) {
			    $("#hit").html(data.views);
			}, "json");
		});
	</script>