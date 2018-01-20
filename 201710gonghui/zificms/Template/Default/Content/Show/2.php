<template file="Content/header.php"/>
<div class="con">
	<div class="left">
		<template file="Content/left.php"/>
	</div>
	<div class="right">
		<div class="tit"><h2>{:getCategory($catid,'catname')}</h2><span>当前位置：<a href="{$config_siteurl}">{$Config.sitename}</a> &gt; <navigate catid="$catid" space=" &gt; " /></span></div>
		<div class="nr">
			<div class="show">
				<div class="showt">
					<h1>{$title}</h1>
					<div class="date">发布日期：{$updatetime}  作者：{$username}</div>
				</div>
				<div class="showc">
					<div class="detail">
					{$content}
					</div>
					<div class="fenx">
						<div class="fenx-r">
						<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
	<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
						</div>

					</div>
				</div>
				<div class="showb">
					<ul>		
						<li class="prev">上一篇：<pre target="1" msg="已经没有了" /></li>						
						<li class="next">下一篇：<next target="1" msg="已经没有了" /></li>						
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<template file="Content/footer.php"/>