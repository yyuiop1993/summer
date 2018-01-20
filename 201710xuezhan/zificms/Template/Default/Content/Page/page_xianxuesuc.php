<template file="Content/header.php"/>
	<!-- header start -->

	
	<!-- header end -->
	<!-- content start -->
	<div class="w content clearfix">
		<template file="Content/left.php"/>


		<div class="con-r fr">
			<div class="con-r-t">
				<h4>我要献血</h4>
				<div class="breaknav">
					您当前的位置：<a href="/">首页</a>&nbsp;&gt;&nbsp;<span>我要献血</span>
				</div>
			</div>


			<div class="main message form-main">
				<div class="explain">
					<p>尊敬的女士/先生： 您好！感谢您来参加献血。为了您和他人的健康，请您仔细阅读并完整填写各栏目项，如有疑问，我们的工作人员将随时为您解答。并承诺对您的相关信息严格保密！</p>
				</div>

				

				<div class="wliuyan">
					<div class="wliuyan_title">我要献血</div>
					<div class="wliuyan_con wliuyan_step wliuyan_step4" id="verifyCheck" >

					<form id="form_add">

						<div class="guide">
							<div class="m-progress-list">
								<span class="step-1 step finish"> <em class="u-progress-stage-bg"></em> <i class="u-stage-icon-inner">1 <em class="bg"></em></i> 
									<p class="stage-name">基本信息填写</p>
								</span>
								<span class="step-2 step finish">
									<em class="u-progress-stage-bg"></em> <i class="u-stage-icon-inner">2
										<em class="bg"></em></i> 
									<p class="stage-name">健康信息征询</p>
								</span>
								<span class="step-3 step finish">
									<em class="u-progress-stage-bg"></em>
									<i class="u-stage-icon-inner">
										3
										<em class="bg"></em>
									</i>
									<p class="stage-name">献血预约</p>
								</span>
								<span class="step-4 step finish">
									<em class="u-progress-stage-bg"></em>
									<i class="u-stage-icon-inner">
										4
										<em class="bg"></em>
									</i>
									<p class="stage-name">预约成功</p>
								</span>
								<span class="u-progress-placeholder"></span>
							</div>
							<div class="u-progress-bar total-steps-4">
								<div class="u-progress-bar-inner"></div>
							</div>
						</div>

						
						<div  class="form form4" style="display: block;">
							<div class="succ">
								<div class="succ-con">
									预约成功！依照预约时间去预约献血点献血<br>有任何问题请致电服务热线：7017011。
								</div>
							</div>
							<div class="inform">
								{$content}
							</div>
						</div>

					</form>
					</div>
					

				</div>
				
			</div>
			
		</div>
	</div>


<template file="Content/footer.php"/>

<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery-1.7.2.min.js"></script>
