<template file="Content/header.php"/>

	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/page.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/mobileSelect.css">

<style type="text/css">
	.content .box .btn button{
		line-height: 0px;
	}
</style>

	<div class="hearder-top"><a href="/index.php?a=lists&catid=1" class="bank"></a>工惠乐学{$catname}</div>
	<div class="content yuyue1 clearfix">
		<div class="box box1">
			<img src="{$config_siteurl}statics/default/images/yuyue1.png" alt="">
		</div>
		<div class="box box2">
			<div class="tit">
				<div class="w">
					必填
				</div>
			</div>
			<div class="w">


				<form name="myform" id="myform" action="/index.php?g=Formguide&amp;a=post" method="post" class="J_ajaxForms" enctype="multipart/form-data">
				<input type="hidden" name="formid" value="10">

					<ul>

						<li>
							<span>预约课程<i>*</i></span><span id="trigger33"  class="select">请选择</span>
							<input type="hidden" name="info[kecheng]" class="trigger33" >
						</li>

						<li>
							<span>教学地点</span>
							<input type="text" name="info[jiaoxuedidian]" class="jiaoxuedidian" placeholder="请填写教学地点"  >
						</li>
						
						<li>
							<span>教学点地址</span><!-- <span id="trigger2"  class="select">请选择</span> -->
							<input type="text" name="info[jiaoxueaddress]" class="jiaoxueaddress" placeholder="请填写教学点地址" >
						</li>

						<li><span>预约人姓名</span><input type="text" class="yy_name" name="info[yy_name]" placeholder="请填写姓名"></li>
						
						<li><span>预约人手机</span><input type="text" class="yuyuemobile" name="info[yuyuemobile]" placeholder="请填写手机号"></li>

						<li><span>预约人数</span><input type="text" class="yy_renshu" name="info[yy_renshu]" placeholder="请填写预约人数"></li>
						<li><span>预约单位</span><input type="text" class="yy_danwei" name="info[yy_danwei]" placeholder="请填写预约单位"></li>

						<!-- <li class="notice"><i>*</i>(每个人每个时间段只能报所有教学点的一门课程)</li> -->

						
						<li class="btn">
							<button type="submit" class="btn btn_submit">提交</button>
						</li>
					</ul>
				</form>


			</div>
		</div>
	</div>



	<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/mobileSelect.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/select.js"></script>
	<!-- content end -->
	<template file="Content/footer.php"/>
<script type="text/javascript">
$(".btn_submit").click(function(){

	var temp = $(".trigger33").val();
	if(temp==''){
		alert("请选择课程！");
		return false;
	}

	var temp = $(".jiaoxuedidian").val();
	if(temp==''){
		alert("请填写教学地点！");
		return false;
	}

	var temp = $(".jiaoxueaddress").val();
	if(temp==''){
		alert("请填写教学点地址！");
		return false;
	}

	var temp = $(".yy_name").val();
	if(temp==''){
		alert("请填写预约人姓名！");
		return false;
	}

	var temp = $(".yuyuemobile").val();
	if(temp==''){
		alert("请填写预约人手机！");
		return false;
	}

	var length = $(".yuyuemobile").val().length;
    if(length!=11){
        alert("请填写正确的手机号！");
        return false;
    }

	var temp = $(".yy_renshu").val();
	if(temp==''){
		alert("请填写预约人数！");
		return false;
	}

	var temp = $(".yy_danwei").val();
	if(temp==''){
		alert("请填写预约单位！");
		return false;
	}
});
</script>