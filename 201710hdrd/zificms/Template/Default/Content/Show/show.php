	<template file="Content/header.php"/>
	<!-- content start -->
	<div class="content w clearfix">
		<div class="content-l fl">
			<template file="Content/left.php"/>
		</div>
		<div class="content-r fr">
			<div class="title">
				<span>{:getCategory($catid,'catname')}</span>
			</div>
			<div class="content-inner clearfix">
				<h4>{$title}</h4>
				<div class="date">发布时间 : <em>{$updatetime}</em>&nbsp;&nbsp;&nbsp;&nbsp;浏览次数 : <em id="hit">0</em>次&nbsp;&nbsp;&nbsp;&nbsp;</div>
				{$content}
				<div class="bdsharebuttonbox"><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间">QQ空间</a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博">新浪微博</a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博">腾讯微博</a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信">微信</a><a href="#" class="bds_more" data-cmd="more"> 更多</a></div>
				<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
				<div class="content-page">
					<span>下一篇 : </span>
					<pre target="1" msg="已经没有了" />
					<span>上一篇 : </span>
					<next target="1" msg="已经没有了" />
				</div>
			</div>
			
		</div>
	</div>
	<!-- content end -->
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery-1.7.2.min.js"></script>
	<template file="Content/footer.php"/>
	<script type="text/javascript">
		$(function (){
			
			$.get("{$config_siteurl}api.php?m=Hits&catid={$catid}&id={$id}", function (data) {
			    $("#hit").html(data.views);
			}, "json");
		});
	</script> 