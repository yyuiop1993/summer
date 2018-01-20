<template file="Content/header.php"/>

<link rel="stylesheet" href="{$config_siteurl}statics/default/css/base.css">

<link rel="stylesheet" href="{$config_siteurl}statics/default/css/page.css">

<link rel="stylesheet" href="{$config_siteurl}statics/default/css/mobileSelect.css">

	



	<div class="hearder-top"><a href="/index.php"  class="bank"></a>工惠乐学{:getCategory(15,'catname')}</div>

	<div class="content teacher clearfix">

		<div class="box box1">

			<img src="{$config_siteurl}statics/default/images/teacher.png" alt="">

		</div>

		<div class="form">

			<form name="myform" id="myform" action="/index.php?g=Formguide&amp;a=post" method="post" class="J_ajaxForms" enctype="multipart/form-data">

				<div class="box box2">

					<div class="tit">

						<div class="w">

							必填

						</div>

					</div>

					<div class="w">

						<input type="hidden" name="formid" value="6">

						<ul>

							<li><span>姓名</span><input type="text" name="info[name]" class="name" placeholder="真实姓名"></li>

							

							<li>

								<span>性别</span><span id="trigger7" class="select">请选择</span>

								<input type="hidden" name="info[sex]" class="trigger7" >

							</li>



							<li>

								<span>年龄</span>

								<input type="text" name="info[shengri]" class="shengri" placeholder="请填写年龄" >

							</li>



							<li><span>身份证号</span><input type="text" class="card" name="info[card]" placeholder="请填写18位身份证号码"></li>





							<li><span>民族</span><input type="text" class="minzu" name="info[minzu]" placeholder="请填写民族"></li>

							<li><span>特长</span><input type="text" class="techang" name="info[techang]" placeholder="请填写你的特长"></li>

							

						

							<li>

								<span>文化程度</span><span id="trigger9" class="select">请选择</span>

								<input type="hidden" name="info[wenhua]" class="trigger9" >

							</li>



							<li>

								<span>政治面貌</span><span id="trigger10" class="select">请选择</span>

								<input type="hidden" name="info[zhengzhi]" class="trigger10" >

							</li>



							



							<li><span>现任职务</span><input type="text" class="zhiwu" name="info[zhiwu]" placeholder="请填写你的现任职务"></li>



							



							<li><span>应聘科目</span><input type="text" class="code" name="info[code]" placeholder="请填写你的应聘科目"></li>

							

							<li><span>手机</span><input type="text" class="yuyuemobile" name="info[yuyuemobile]" placeholder="请填写你的11位手机号码"></li>

							

							<li><span>电子邮箱</span><input type="text" class="email" name="info[email]" placeholder="请填写你的常用电子邮箱"></li>

							

							

						</ul>



						<p>主要文体活动经历（可提供的课程、教育背景、所学专业、参加团队或协会、活动内容、获奖情况等）</p>

						<p><textarea name="info[jingli]" class="jingli" cols="30" rows="10" placeholder="请填写活动经历"></textarea></p>



						

						<p class="btn"><button type="submit" class="btn_submit">提交</button></p>



					</div>



				</div>

			</form>

		</div>

		

	</div>

	<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery-1.7.2.min.js" ></script>

	<script type="text/javascript" src="{$config_siteurl}statics/default/js/mobileSelect.min.js" ></script>

	<script type="text/javascript" src="{$config_siteurl}statics/default/js/select.js" ></script>







<!-- content end -->

<template file="Content/footer.php"/>

<script type="text/javascript">

$(".btn_submit").click(function(){



	var temp = $(".name").val();

	if(temp==''){

		alert("请填写姓名！");

		return false;

	}

	var temp = $(".trigger7").val();

	if(temp==''){

		alert("请选择性别！");

		return false;

	}



	var temp = $(".shengri").val();

	if(temp==''){

		alert("请填写年龄！");

		return false;

	}



	var temp = $(".card").val();

	if(temp==''){

		alert("请填写身份证号！");

		return false;

	}

    var length = $(".card").val().length;
    if(length!=15){
        if(length!=18){
           alert("请填写正确的身份证号！");
            return false; 
        }
    }

	var temp = $(".minzu").val();

	if(temp==''){

		alert("请填写民族！");

		return false;

	}



	var temp = $(".techang").val();

	if(temp==''){

		alert("请填写特长！");

		return false;

	}



	var temp = $(".trigger9").val();

	if(temp==''){

		alert("请选择文化程度！");

		return false;

	}



	var temp = $(".trigger10").val();

	if(temp==''){

		alert("请选择政治面貌！");

		return false;

	}



	var temp = $(".zhiwu").val();

	if(temp==''){

		alert("请填写职务！");

		return false;

	}





	var temp = $(".code").val();
	if(temp==''){
		alert("请选择应聘科目！");
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



	var temp = $(".email").val();

	if(temp==''){

		alert("请填写电子邮箱！");

		return false;

	}



	var temp = $(".jingli").val();

	if(temp==''){

		alert("请填写活动经历！");

		return false;

	}



});

</script>