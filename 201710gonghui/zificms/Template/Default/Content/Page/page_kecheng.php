	<template file="Content/header.php"/>

	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/page.css">

	<style type="text/css">

	.content{margin-bottom: 60px;}

	.yuyue{

		position: fixed;

		bottom: 0px;

	}

	.inner img{

		width:100%;

	}

	</style>

	<!-- content start -->

	

	<div class="hearder-top"><a href="/index.php"  class="bank"></a>{:getCategory($catid,'catname')}<span class="share"></span></div>

	<div class="gb_resLay" id="gb_resLay">

		<div class="gb_res_t"><span>分享到</span><i></i></div>

		<div class="bdsharebuttonbox">

			<ul class="gb_resItms">

				<li> <a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin" ></a>微信好友 </li>

				<li> <a title="分享到QQ好友" href="#" class="bds_sqq" data-cmd="sqq" ></a>QQ好友 </li>

				<li> <a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone" ></a>QQ空间 </li>

				<li> <a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq" ></a>腾讯微博 </li>

				<li> <a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina" ></a>新浪微博 </li>

				<li> <a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren" ></a>人人网 </li>

			</ul>



		</div>



		<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>

	</div>



	



	

		<div class="content kecheng clearfix">



			<div class="w">

			



				<!-- <div class="title">

					<h3>{$title}</h3>

					<p>{$updatetime|date="Y/m/d",###}</p>

				</div> -->

				<br>

				<br>

				<div class="inner clearfix">

					{$content}

				</div>



			</div>

			

			<!-- <div class="yuyue"><a href="/index.php?a=lists&catid=18" >课程预约</a></div> -->

			

		</div>





	<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery-1.7.2.min.js"></script>

	<script type="text/javascript" src="{$config_siteurl}statics/default/js/page.js"></script>

	<script type="text/javascript" src="{$config_siteurl}statics/default/js/share.js"></script>



	<!-- content end -->

	<template file="Content/footer.php"/>