<template file="Content/header.php"/>
<!-- 背景音乐 -->
<!-- <div class="bgsound" style="width:0;height:0;overflow:hidden">
	<embed bgsound src="{$config_siteurl}statics/default/images/ymsxd.mp3" loop="-1" hidden="true" autostart="true"> 
</div> -->
	<div class="flexslider">
		<ul class="slides">
			<li data-thumb="{$config_siteurl}statics/default/images/banner1.png">
				<img src="{$config_siteurl}statics/default/images/banner1.png" alt="" />
			</li>
			<li data-thumb="{$config_siteurl}statics/default/images/banner1.png">
				<img src="{$config_siteurl}statics/default/images/banner1.png" alt="" />
			</li>
			<li data-thumb="{$config_siteurl}statics/default/images/banner1.png">
				<img src="{$config_siteurl}statics/default/images/banner1.png" alt="" />
			</li>
		</ul>
	</div>

</div>



	<div class="w clearfix">
		<!-- fixed1 start -->
		<div class="fixed fixed1 clearfix">
			<div class="fl"><h4><a href="#" target="_blank">最新消息</a></h4></div>
			<div class="scrollbox">
			    <div id="scrollDiv">

			    	<ul>
			    		<content action="lists" catid="2" order="inputtime DESC" num="3">
		   					<volist name="data" id="vo" key='k'>
								<li><a href="{$vo.url}" target="_blank">{$vo.title}</a><span>{$vo.inputtime|date="Y-m-d",###}</span></li>
							</volist>
						</content>
			       </ul>

			    </div>
			    <div class="scroltit">
			    	<div class="updown" id="but_up">&gt;</div>
			    	<div class="updown" id="but_down">&lt;</div>
			    </div>
			</div>
		</div>
		
		<!-- fixed1 end -->
		<!-- fixed2 start -->
		<div class="fixed fixed2 clearfix">
			<div class="box box1">
				<div class="flexslider1">
					<ul class="slides">

						<position action="position" posid="1" num='5'>
							<volist name="data" id="vo" >
								<li>
									<a href="{$vo.data.url}"><img src="{$vo.data.thumb}" alt="{$vo.data.title}"></a>
									<span><a href="{$vo.data.url}">{$vo.data.title}</a></span>
								</li>
							</volist>
						</position>

					</ul>
				</div>
			</div>
			<div class="box box2">
				<div class="title clearfix">
					<h4><a href="javascript:void(0)" target="_blank">新闻中心</a></h4>
					<p><a href="{:getCategory(2,'url')}" target="_blank">MORE +</a></p>
				</div>
				<div class="lis clearfix">
					<ul>

						<content action="lists" catid="2" order="inputtime DESC" num="8">
		   					<volist name="data" id="vo" key='k'>
								<li><a href="{$vo.url}" target="_blank">{$vo.title}</a><span>{$vo.inputtime|date="Y-m-d",###}</span></li>
							</volist>
						</content>

					</ul>
				</div>
			</div>
			<div class="box box3">
				<div class="title clearfix">
					<h4><a href="javascript:void(0)" target="_blank">{:getCategory(10,'catname')}</a></h4>
					<p><a href="{:getCategory(10,'url')}" target="_blank">MORE +</a></p>
				</div>
				<div class="lis clearfix">
					<ul>
						<content action="lists" catid="10" order="inputtime DESC" num="8">
		   					<volist name="data" id="vo" key='k'>
								<li><a href="{$vo.url}" target="_blank">{$vo.title}</a><span>{$vo.inputtime|date="Y-m",###}</span></li>
							</volist>
						</content>
					</ul>
				</div>
			</div>
		</div>
		<!-- fixed2 end -->

		<!-- fixed3 start -->
		<div class="fixed fixed3 clearfix">
			<a href="http://new.lyblood.com" target="_blank"><img src="{$config_siteurl}statics/default/images/banner2.jpg" alt=""></a>
		</div>
		<!-- fixed3 end -->

		<!-- fixed4 start -->
		<div class="fixed fixed4 clearfix">
			<a href="/index.php?a=lists&catid=15" target="_blank" class="a1">预约献血</a>
			<a href="#" target="_blank" class="a2">献血结果查询</a>
			<a href="#" target="_blank" class="a3">用血报销指南</a>
			<a href="#" target="_blank" class="a4">献血指南</a>
			<a href="#" target="_blank" class="a5">招募志愿者</a>
		</div>
		<!-- fixed4 end -->
		<!-- fixed5 start -->
		<div class="fixed fixed5 clearfix">
			
			<div class="box box1">
				<div class="title clearfix">
					<h4><a href="#" target="_blank">血液库存</a></h4>
					<p><a href="#" target="_blank">MORE +</a></p>
				</div>
				<div class="bos clearfix">
					<div class="bo bo1">
						<p class="p1"><img src="{$config_siteurl}statics/default/images/xueliang1.png" alt=""></p>
						<p class="p2">A</p>
						<p class="p3">正常</p>
					</div>
					<div class="bo bo2">
						<p class="p1"><img src="{$config_siteurl}statics/default/images/xueliang1.png" alt=""></p>
						<p class="p2">B</p>
						<p class="p3">偏少</p>
					</div>
					<div class="bo bo3">
						<p class="p1"><img src="{$config_siteurl}statics/default/images/xueliang1.png" alt=""></p>
						<p class="p2">AB</p>
						<p class="p3">偏少</p>
					</div>
					<div class="bo bo4">
						<p class="p1"><img src="{$config_siteurl}statics/default/images/xueliang1.png" alt=""></p>
						<p class="p2">O</p>
						<p class="p3">偏少</p>
					</div>
					
				</div>
			</div>

			<div class="box box2">
				<div class="title">
					<h4><a href="#" target="_blank">献血者信息查询</a></h4>
					<p><a href="#" target="_blank">MORE +</a></p>
				</div>
				<div class="formBox">
					<form action="">
						<div class="form form1"><span>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名 :</span><input type="text"></div>
						<div class="form form2"><span>身份证号 :</span><input type="text"></div>
						<div class="form form3"><span>献血编号 :</span><input type="text"></div>
						
						<div class="form form4"><span>验证码：</span><input type="text">
						<img src="/index.php?g=Api&m=Checkcode&type=gbook&code_len=4&font_size=20&width=72&height=34&font_color=&background=" onclick="refreshs()" id="code_img" alt="">
						</div>

						<div class="form form5">
							<input type="submit" value="提交" class="sub">
							<input type="reset" value="重置" class="res">
						</div>
					</form>
				</div>
			</div>

			<div class="box box3 clearfix">
				<div class="fl">
					<p><img src="{$config_siteurl}statics/default/images/weixin.png" alt=""></p>
					<p>微信公众号</p>
					<p>扫一扫关注我们</p>
				</div>
				<div class="fr">
					<p><img src="{$config_siteurl}statics/default/images/weibo.png" alt=""></p>
					<p>新浪微博</p>
					<p><a href="#" target="_blank">+ 关注</a></p>
				</div>
			</div>
		</div>
		<!-- fixed5 end -->
		<!-- fixed6 start -->
		<div class="fixed fixed6 clearfix">
			<div class="box box1">
				
				<div class="title clearfix">
					<h4><a href="javascript:void(0)" target="_blank">{:getCategory(11,'catname')}</a></h4>
					<p><a href="{:getCategory(11,'url')}" target="_blank">MORE +</a></p>
				</div>
				<div class="lis clearfix">
					<ul>
						<content action="lists" catid="11" order="inputtime DESC" num="8">
		   					<volist name="data" id="vo" key='k'>
								<li><a href="{$vo.url}" target="_blank">{$vo.title}</a><span>{$vo.inputtime|date="Y-m",###}</span></li>
							</volist>
						</content>
					</ul>
				</div>

			</div>
			<div class="box box2">
				<div class="title clearfix">
					<h4><a href="javascript:void(0)" target="_blank">{:getCategory(12,'catname')}</a></h4>
					<p><a href="{:getCategory(12,'url')}" target="_blank">MORE +</a></p>
				</div>
				<div class="lis clearfix">
					<ul>
						<content action="lists" catid="12" order="inputtime DESC" num="8">
		   					<volist name="data" id="vo" key='k'>
								<li><a href="{$vo.url}" target="_blank">{$vo.title}</a><span>{$vo.inputtime|date="Y-m",###}</span></li>
							</volist>
						</content>
					</ul>
				</div>
			</div>
			<div class="box box3">
				<div class="title clearfix">
					<h4><a href="javascript:void(0)" target="_blank">{:getCategory(13,'catname')}</a></h4>
					<p><a href="{:getCategory(13,'url')}" target="_blank">MORE +</a></p>
				</div>
				<div class="lis clearfix">
					<ul>
						<content action="lists" catid="13" order="inputtime DESC" num="8">
		   					<volist name="data" id="vo" key='k'>
								<li><a href="{$vo.url}" target="_blank">{$vo.title}</a><span>{$vo.inputtime|date="Y-m",###}</span></li>
							</volist>
						</content>
					</ul>
				</div>
			</div>
		</div>
		<!-- fixed6 end -->
		<!-- fixed7 start -->
		<div class="fixed fixed7 clearfix">
			<div id="pic_list_1" class="scroll_horizontal">
				<div class="box">
					<ul class="list">

						<content action="lists" catid="14"  num="10" order="inputtime DESC" page="$page" thumb="1">
							<volist name="data" id="vo">
								<li>
									<a href="{$vo.url}" target="_blank"><img src="{$vo.thumb}" alt="{$vo.title}" title="{$vo.title}"></a>
									<span><a href="{$vo.url}" target="_blank">{$vo.title}</a></span>
								</li>
							</volist>
						</content>
					
					</ul>
				</div>
				<div class="plus"></div>
				<div class="minus"></div>
			</div>
		</div>
		<!-- fixed7 end -->

		<template file="Content/fw.php"/>

	</div>





<template file="Content/footer.php"/>

<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/default/js/jq_scroll.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery.cxscroll.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery.kxbdMarquee.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/default/js/index.js"></script>
<script type="text/javascript">
function refreshs(){
	document.getElementById('code_img').src='<?php echo U('Api/Checkcode/index','type=gbook&code_len=4&font_size=20&width=72&height=34&font_color=&background=&refresh=1');?>&time='+Math.random();void(0);
}

</script>