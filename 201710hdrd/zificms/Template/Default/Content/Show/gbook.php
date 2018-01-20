	<template file="Content/header.php"/>
	<!-- content start -->
	<div class="content w clearfix">
		<div class="content-l fl">
			<template file="Content/left.php"/>
		</div>
		<div class="content-r fr">
			<div class="title">
				<span>留言回复</span>
			</div>
			<div class="content-inner clearfix">
				<div class="con-content" style="padding: 5px">
					<div id="wd_list">
						<div class="wen">
							 <span>留言标题：</span>
							 <div>
							 	{$res.title}
							 </div>
						</div>
						<div class="wen">
							 
							 <span>留言内容：</span>
							 <div>
							 	{$res.cont}
							 </div>
						</div>
						<div class="hf">
							<span style="float: left;">回复内容：</span>
							{$res.hf_cont|default='暂无回复内容'}
							<span style="margin-top:10px;width: 300px;" >回复时间：<em>{$res.cl_time|date='Y-m-d',###}</em></span>
						</div> 
					</div>
				</div>
				<div class="bdsharebuttonbox"><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间">QQ空间</a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博">新浪微博</a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博">腾讯微博</a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信">微信</a><a href="#" class="bds_more" data-cmd="more"> 更多</a></div>
				<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
				
			</div>
			
		</div>
	</div>
	<!-- content end -->
	<template file="Content/footer.php"/>
	