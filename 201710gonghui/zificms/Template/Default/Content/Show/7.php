	<template file="Content/header.php"/>
		<!-- content start -->
	<div class="content content-con  w">
		<div class="breaknav">
			当前位置：<a href="{$config_siteurl}">{$Config.sitename}</a> &gt; <navigate catid="$catid" space=" &gt; " />
		</div>	
		<div class="con  clearfix">
			
			<h4>{$title}</h4>
			<p class="date">发布时间 :{$updatetime} <i></i>&nbsp;&nbsp;&nbsp;&nbsp;浏览次数 : <i id="hit"></i>次&nbsp;&nbsp;&nbsp;&nbsp;</p>
			{$content}
		</div>
		<div class="clearfix"></div>
		<div class="bdsharebuttonbox bdshare-button-style0-16" data-bd-bind="1503457180422">分享到 : <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间">QQ空间</a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博">新浪微博</a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博">腾讯微博</a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信">微信</a><a href="#" class="bds_more" data-cmd="more"> 更多</a></div>
			<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
		<div class="content-page">
			<span>下一篇 : </span>
			<next target="1" msg="已经没有了" />
			<span>上一篇 : </span>
			<pre target="1" msg="已经没有了" />
		</div>
	</div>
	<!-- content end -->
	<template file="Content/footer.php"/>
	<script type="text/javascript">
		$(function (){	
			$.get("{$config_siteurl}api.php?m=Hits&catid={$catid}&id={$id}", function (data) {
			    $("#hit").html(data.views);
			}, "json");
		});
	</script>
