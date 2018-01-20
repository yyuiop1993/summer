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
				<input type="hidden" name="formid" value="4">

					<ul>

						<li>
							<span>预约课程<i>*</i></span><span id="trigger3"  class="select">请选择</span>
							<input type="hidden" name="info[kecheng]" class="trigger3" >
						</li>

						<li style="display: none;" class="li_item">
							<span>教学地点</span><!-- <span id="trigger1"  class="select">请选择</span> -->
							<input type="text" name="info[jiaoxuedidian]" class="trigger1" readonly="readonly" >
						</li>

						<li style="display: none;" class="li_item">
							<span>教学点地址</span><!-- <span id="trigger2"  class="select">请选择</span> -->
							<input type="text" name="info[jiaoxueaddress]" class="trigger2" readonly="readonly" >
						</li>

						<li><span>预约人姓名</span><input type="text" name="info[yy_name]" class="yy_name" placeholder="请填写预约人姓名"></li>

						<li><span>手机号</span><input type="text" name="info[yuyuemobile]" class="yuyuemobile" placeholder="请填写手机号"></li>

                        <li><span>身份证号</span><input type="text" name="info[shenfenzheng]" class="shenfenzheng" placeholder="请填写身份证号"></li>

                        <li><span>所在单位</span><input type="text" name="info[danwei]" class="danwei" placeholder="请填写所在单位"></li>

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


   


	var temp = $(".trigger3").val();
	if(temp==''){
		alert("请选择课程！");
		return false;
	}
	var temp = $(".yy_name").val();
	if(temp==''){
		alert("请填写预约人姓名！");
		return false;
	}

	var temp = $(".yuyuemobile").val();
	if(temp==''){
		alert("请填写手机号！");
		return false;
	}
    var length = $(".yuyuemobile").val().length;

    if(length!=11){
        alert("请填写正确的手机号！");
        return false;
    }

    var temp = $(".shenfenzheng").val();
    if(temp==''){
        alert("请填写身份证号！");
        return false;
    }
    var length = $(".shenfenzheng").val().length;
    if(length!=15){
        if(length!=18){
           alert("请填写正确的身份证号！");
            return false; 
        }
    }
    

    var temp = $(".danwei").val();
    if(temp==''){
        alert("请填写所在单位！");
        return false;
    }

});
</script>