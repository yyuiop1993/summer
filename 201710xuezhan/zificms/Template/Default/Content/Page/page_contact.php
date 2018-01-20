<template file="Content/header.php"/>
<style type="text/css">
	#code_img{
		cursor: pointer;
	}
</style>

	<!-- header end -->
	<!-- content start -->
	<div class="w content about-con clearfix">
		<template file="Content/left.php"/>

		



		<div class="con-r fr">
			
			<div class="con-r-t">
				<h4>{$catname}</h4>
				<div class="breaknav">
					您当前的位置：<a href="/">首页</a>&nbsp;&gt;&nbsp;<span>{$catname}</span>
				</div>
			</div>


			<!-- 留言列表 -->
			<div class="main message-list form-main mylist">
				<div class="explain">
					<p>有问必答的答复是一种指导性意见 ，不具有法定效力。具体问题要通过法定途径（诉讼、复议、信访等）解决。 您的来信我们将在一定的时限内由相关科室或转交相关部门处理并通过网上反馈处理结果。不属于我中心工作范围，管理人员不予处理及告知。您咨询的一般问题将在5个工作日内给予答复，复杂的问题将在一个月内，最迟三个月。</p>
					<a href="javascript:;" class="mybtn">我要留言</a>
				</div>

				<div class="tit">
					<p>信件查询</p>
					<form method="post" action="/index.php?m=Gbook&a=findmsg">
						<div class="form">
							<span>查询码：</span>
							<input type="text" name="cxm">
							<input type="hidden" name="catid" value="43">
						</div>
						<button>查询</button>
					</form>	
				</div>


				<get sql="SELECT * FROM zf_gbook  WHERE status=1 AND is_show=1  ORDER BY id DESC" page="$page" num="5">
					<ul>
						<volist name="data" id="vo">
							<li class="titli">
								
								<div class="title">
									<a href="{:U('Index/showgbook',array('id'=>$vo['cxm'],'catid'=>10))}">
										<h3>留言标题：	{$vo.title}</h3><!-- |str_cut=###,30 -->
										<span>{$vo.add_time|date='Y-m-d H:i:s',###}</span>
									</a>
								</div>
								<div class="center">
									{$vo.cont}
								</div>
								<div class="reply">
									回复：{$vo.hf_cont}
								</div>

							</li>
						
						</volist>
						
					</ul>
					<div class="fenye">
			            {$pages}
			        </div>	
				</get>


				
						

			</div>



			<!-- 我要留言 -->
			<div class="main message form-main  myform" style="display: none">
				<div class="explain">
					<p>有问必答的答复是一种指导性意见 ，不具有法定效力。具体问题要通过法定途径（诉讼、复议、信访等）解决。 您的来信我们将在一定的时限内由相关科室或转交相关部门处理并通过网上反馈处理结果。不属于我中心工作范围，管理人员不予处理及告知。您咨询的一般问题将在5个工作日内给予答复，复杂的问题将在一个月内，最迟三个月。</p>
				</div>
				<div class="wliuyan">
					<div class="wliuyan_title ">我要留言</div>
					<div class="wliuyan_con">

						<form action="/index.php?m=Gbook&a=postgbook"  onsubmit="return checkForm();"  method="post">

							<div class="message_con1">
								<div class="message_name fl">
									<div class="fl">留言姓名：</div>
									<div class="fl">
										<input type="text" name="name" id="xingming" value=""></div>
									<span>*</span>
								</div>
								<div class="message_name fl w_mar">
									<div class="fl">联系电话：</div>
									<div class="fl">
										<input type="text" name="phone" id="tel" value=""></div>
									<span>*</span>
								</div>
							</div>
							<div class="message_con1">
								<div class="message_name fl">
									<div class="fl">E  -  mail  ：</div>
									<div class="fl">
										<input type="text" name="mail" id="email" value=""></div>
									<span>*</span>
								</div>
								<div class="message_name fl w_mar">
									<div class="fl">联系Q Q：</div>
									<div class="fl">
										<input type="text" name="qq" id="qq" value=""></div>
									<span>*</span>
								</div>
							</div>
							<div class="message_zhuti">
								<div class="fl">留言主题：</div>
								<div class="fl">
									<input type="text" name="title" id="zhuti" value=""></div>
								<span>*</span>
							</div>
							<div class="message_zhuti2">
								<div class="fl">留言内容：</div>
								<div class="fl">
									<textarea name="cont" rows="" id="content" cols=""></textarea>
								</div>
								<span class="xing">*</span>
							</div>
							<div class="message_zhuti2" style="display: none;">
								<div class="fl">回复内容：</div>
								<div class="fl">
									<textarea name="data[huifu]" rows="" id="huifu" cols=""></textarea>
								</div>

							</div>

							<!-- <div class="message_zhuti" style="display: none;">
								<div class="fl">查询码：</div>
								<div class="fl">
									<input type="text" name="data[cxm]" id="cxm" value=""></div>
							</div> -->

							<div class="yanzheng">
								<div class="fl">验  证  码 ：</div>
								<div class="fl">

									<input type="text" name="yzm" id="yzm" value=""></div>

								<span class="fl">

									<img src="/index.php?g=Api&m=Checkcode&type=gbook&code_len=4&font_size=20&width=100&height=34&font_color=&background=" onclick="refreshs()" id="code_img" alt="">
								

									<input type="button" onclick="refreshs()" name="" id="hyz" value="换一张">
								</div>
							</div>
							<div class="message_btn">
								<div class="fl">
									<input type="hidden" name="catid" value="{$catid}" />
									<input type="submit" name="submit" id="" value="提交"></div>
								<div class="fr">
									<input type="reset" name="" id="" value="重置"></div>
							</div>
						</form>
					</div>

				</div>
			</div>





		</div>


	</div>
	<!-- content end -->
	<!-- footer start -->

<template file="Content/footer.php"/>
<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
$(function(){
	$(".mybtn").click(function(){
		$(".mylist").hide();
		$(".myform").show();
	});
});

function refreshs(){
	
	document.getElementById('code_img').src='<?php echo U('Api/Checkcode/index','type=gbook&code_len=4&font_size=20&width=72&height=34&font_color=&background=&refresh=1');?>&time='+Math.random();void(0);
}


	function checkForm(){
		if($("#xingming").val().trim().length==0){
			$("#xingming").focus();
			return false;
		}

		if($("#del").val().trim().length==0){
			$("#del").focus();
			return false;
		}

		if($("#email").val().trim().length==0){
			$("#email").focus();
			return false;
		}

		if($("#qq").val().trim().length==0){
			$("#qq").focus();
			return false;
		}

		if($("#zhuti").val().trim().length==0){
			$("#zhuti").focus();
			return false;
		}

		if($("#content").val().trim().length==0){
			$("#content").focus();
			return false;
		}
	}
</script>