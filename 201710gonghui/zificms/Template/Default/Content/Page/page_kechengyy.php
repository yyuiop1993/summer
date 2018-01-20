	<template file="Content/header.php"/>
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/base.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/page.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/mobileSelect.css">

	<!-- content start -->
	
	<div class="hearder-top"><a href="/index.php"  class="bank"></a>工惠乐学课程预约<span class="share"></span></div>


	<div class="content yuyue2 clearfix">

		<div class="box box1">
			<img src="{$config_siteurl}statics/default/images/yuyue2.png" alt="">
		</div>

		<div class="form">
			<form name="myform" id="myform" action="/index.php?g=Formguide&amp;a=post" method="post" class="J_ajaxForms" enctype="multipart/form-data">
  			<input type="hidden" name="formid" value="7">

				<div class="box box2">
					<div class="tit"><div class="w">必填</div></div>

					<div class="w">
						<ul>

							<li><span>预约科目</span><input type="text" name="info[taddress]" placeholder="请填写预约科目"></li>
							
							<li>
								<span>预约日期</span>
								<span id="trigger4" class="select">请选择</span>
								<input type="hidden" name="info[ydate]" class="trigger4" >
							</li>

							<li>
								<span>预约时间</span>
								<span id="trigger5" class="select">请选择</span>
								<input type="hidden" name="info[ytime]" class="trigger5" >
							</li>
							
							<!-- <li><span>上课地点</span><input type="text" name="info[didian]" placeholder="请填写具体地址"></li> -->
							<li><span>姓名</span><input type="text" name="info[yname]" placeholder="姓名"></li>
							<li><span>手机号码</span><input type="text" name="info[mobile]" placeholder="请填写手机号码"></li>
							<li><span>单位名称</span><input type="text" name="info[cname]" placeholder="请填写单位名称"></li>


							<!-- <li><span>人数</span><input type="text" name="info[renshu]" placeholder="人数需在30人以上"></li>
							<li>
								<span>企业所在区</span>
								<span id="trigger6" class="select">请选择</span>
								<input type="hidden" name="info[qu]" class="trigger6" >
							</li>

							<li class="bdn">
								<span>单位联系人</span>
								<input type="text" name="info[clianxi]" placeholder="请填写单位联系人名字">
							</li> -->

							<li class="btn">
								<input type="hidden" name="info[teacher]" class="teacher">
								<button type="submit">提交</button>
							</li>
							
						</ul>
					</div>
				</div>

				<!-- <div class="box box3">
					<div class="tit">
						<div class="w">
							选填
						</div>
					</div>
					<div class="w">
						<ul>
							<li><span>本课程受众组成</span><input type="text" name="info[zucheng]" placeholder="可选填"></li>
							<li><span>意向内容提示</span><input type="text" name="info[tishi]" placeholder="可选填"></li>
							<li><span>附件服务</span><input type="text" name="info[fujian]" placeholder="可选填"></li>
							<li class="btn">
								<input type="hidden" name="info[teacher]" class="teacher">
								<button type="submit">提交</button>
							</li>
						</ul>
					</div>
				</div> -->


			</form>
		</div>
		
	</div>
	

	<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery-1.7.2.min.js" ></script>
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/mobileSelect.min.js" ></script>
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/select.js" ></script>

	<!-- content end -->
	<template file="Content/footer.php"/>
	<script type="text/javascript">


function getQueryString(name) { 
var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i"); 
var r = window.location.search.substr(1).match(reg); 
if (r != null) return unescape(r[2]); return null; 
} 
// 调用方法
$(".teacher").val(getQueryString("teacher"));
</script>
