<template file="Content/header.php"/>
	<!-- header start -->

	
	<!-- header end -->
	<!-- content start -->
	<div class="w content clearfix">
		<template file="Content/left.php"/>


		<div class="con-r fr">
			<div class="con-r-t">
				<h4>{:getCategory($catid,'catname')}</h4>
				<div class="breaknav">
					您当前的位置：<a href="/">首页</a>&nbsp;&gt;&nbsp;<span>{:getCategory($catid,'catname')}</span>
				</div>
			</div>


			<div class="main message form-main">
				<div class="explain">
					<p>尊敬的女士/先生： 您好！感谢您来参加献血。为了您和他人的健康，请您仔细阅读并完整填写各栏目项，如有疑问，我们的工作人员将随时为您解答。并承诺对您的相关信息严格保密！</p>
				</div>

				

				<div class="wliuyan">
					<div class="wliuyan_title">我要献血</div>
					<div class="wliuyan_con wliuyan_step wliuyan_step1" id="verifyCheck" >

					<form id="form_add">

						<div class="guide">
							<div class="m-progress-list">
								<span class="step-1 step on"> <em class="u-progress-stage-bg"></em> <i class="u-stage-icon-inner">1 <em class="bg"></em></i> 
									<p class="stage-name">基本信息填写</p>
								</span>
								<span class="step-2 step">
									<em class="u-progress-stage-bg"></em> <i class="u-stage-icon-inner">2
										<em class="bg"></em></i> 
									<p class="stage-name">健康信息征询</p>
								</span>
								<span class="step-3 step">
									<em class="u-progress-stage-bg"></em>
									<i class="u-stage-icon-inner">
										3
										<em class="bg"></em>
									</i>
									<p class="stage-name">献血预约</p>
								</span>
								<span class="step-4 step">
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

						

						<div class="form form1">
							<div class="message_con1">
								<div class="message_name fl">
									<div class="fl">身份证号：</div>
									<div class="fl">
									<!--  id="phone" -->
										<input id="card_num"  name="card_num" onblur="checkParseIdCard(this.value)" type="text" class="txt03 f-r3 required"  keycodes="tel" tabindex="2" data-valid="isNonEmpty||isPhone" data-error="身份证号不能为空||身份证号格式不正确" maxlength="18"/>
										<label class="focus valid"></label>
									</div>
									<span>*</span>
								</div>
								<div class="message_name fl w_mar">
									<div class="fl">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名 ：</div>
									<div class="fl">
										<input type="text" class="txt03 f-r3 required" name="name"  keycodes="tel" tabindex="2" data-valid="isNonEmpty" data-error="请输入您的姓名" maxlength="18"  />
										<label class="focus valid"></label>
									</div>
									<span>*</span>
								</div>
							</div>
							
							<div class="message_con1">
								<div class="message_name fl">
									<div class="fl">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别 ：</div>
									<div class="fl">
										<input type="text" id="sex" name="sex">
									</div>
									<span>*</span>
								</div>
								<div class="message_name fl w_mar">
									<div class="fl">出生年月：</div>
									<div class="fl">
										<input id="birth" name="birth" readonly="" type="text">
									</div>
									<span>*</span>
								</div>
							</div>

							<div class="message_btn">
								<input type="button" class="sjyz-one-next" value="下一步">
							</div>
						</div>

						<div class="form form2">
							<div class="ts">
								问卷调查有30多道题，为了健康献血我们一起仔细填写吧！
							</div>
							<ul>
								<li>
									<div class="wenti">1、近5天内是否服用过阿司匹林类药物？</div>
									<div class="xuanze">
										<label><input name="tfuyao" type="radio" value="是" />是 </label> 
										<label><input name="tfuyao" type="radio" value="否" />否</label> 
									</div>
								</li>
								<li>
									<div class="wenti">2、近1周内是否患感冒或有咳嗽、咽痛、流涕？是否患急性胃肠炎或有腹痛、腹泻？</div>
									<div class="xuanze">
										<label><input name="tganmao" type="radio" value="是" />是 </label> 
										<label><input name="tganmao" type="radio" value="否" />否</label> 
									</div>
								</li>
								<li>
									<div class="wenti">3、近半月内是否拔牙或做过其它小手术？</div>
									<div class="xuanze">
										<label><input name="tbaya" type="radio" value="是" />是 </label> 
										<label><input name="tbaya" type="radio" value="否" />否</label> 
									</div>
								</li>
								
							</ul>

							<div class="message_btn">
								<input class="sjyz-two-next" value="下一步">
							</div>
						</div>

						<div class="form form3"　>
							<div class="ts">
								您的身体符合献血规定，请您继续填写您的个人信息。
							</div>
							<div class="message_con1">
								<div class="message_name fl">
									<div class="fl">民　　族：</div>
									<div class="fl">
										<input name="national" class="national" id="national" type="text" value="" />
									</div>
									<span>*</span>
								</div>

								<div class="message_name fl">
									<div class="fl">献血次数：</div>
									<div class="fl">
										<select id="cishu" name="cishu" class="cishu">
											<option value="">请选择</option>
											<option value="初次" >初次</option>
											<option value="再次" >再次</option>
										</select>
									</div>
									<span>*</span>
								</div>
								<div class="message_name fl">
									<div class="fl">文化程度：</div>
									<div class="fl">
										<select name="wenhua" class="wenhua">
											<option value="">请选择</option>
											<option value="大学以上">大学以上</option>
											<option value="大学">大学</option>
											<option value="大专">大专</option>
											<option value="初中">初中</option>
											<option value="高中">高中</option>
											<option value="中专">中专</option>
											<option value="初中以下">初中以下</option>
										</select>
									</div>
									<span>*</span>
								</div>
							</div>
							<div class="message_con1">
								<div class="message_name fl">
									<div class="fl">职　　业：</div>
									<div class="fl">
										<select name="zhiye" class="zhiye">
											<option value="">请选择</option>
											<option value="工人">工人</option>
											<option value="农民">农民</option>
											<option value="军人">军人</option>
											<option value="公务员">公务员</option>
											<option value="教师">教师</option>
											<option value="学生">学生</option>
											<option value="职员">职员</option>
											<option value="医务人员">医务人员</option>
										</select>
									</div>
									<span>*</span>
								</div>
								<div class="message_name fl">
									<div class="fl">工作单位：</div>
									<div class="fl">
										<input type="text" class="danwei" name="danwei" value="">
									</div>
									<span>*</span>
								</div>
								<div class="message_name fl">
									<div class="fl">联系电话：</div>
									<div class="fl">
										<input type="text" class="mobile" name="mobile" value="">
									</div>
									<span>*</span>
								</div>
							</div>
							<div class="message_con1">
								<div class="message_name fl">
									<div class="fl">联系地址：</div>
									<div class="fl">
										<input type="text" name="address" class="address" value="">
									</div>
									<span>*</span>
								</div>
								
								<div class="message_name fl">
									<div class="fl">电子邮箱：</div>
									<div class="fl">
										<input type="text" name="mail" class="mail" value="">
									</div>
									<span>*</span>
								</div>
								<div class="message_name fl">
									<div class="fl">Q　　Q：</div>
									<div class="fl">
										<input type="text" name="qq" class="qq" value="">
									</div>
									<span>*</span>
								</div>
							</div>


							<div class="message_con2" style="padding-left: 30px;">
								<div class="wenti">本次献血量:</div>
								<div class="xuanze">
									<label><input name="xianxueliang" type="radio" value="200ml" />200ml</label> 
									<label><input name="xianxueliang" type="radio" value="300ml" />300ml</label>
									<label><input name="xianxueliang" type="radio" value="400ml" />400ml</label> 
								</div>
							</div>

							<div class="message_btn">
								<input class="sjyz-three-next" class="submit-input" value="提交">
							</div>

						</div>

						<div  class="form form4">
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
<script type="text/javascript" src="{$config_siteurl}statics/default/js/register.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/default/js/layer/layer.js"></script>

<script type="text/javascript">


$(document).ready(function() {
	//安全设置 手机号码下一步
	$(".sjyz-one-next").click(function(){
		if(!verifyCheck._click()) return;
		$(this).parents(".message_btn").parents(".form1").next(".form2").show();
		$(this).parents(".message_btn").parents(".form1").hide();
		$(this).parents(".message_btn").parents(".form1").siblings(".guide").children(".m-progress-list").children(".step-1").addClass("finish").siblings(".step-2").addClass("on");
		$(this).parents(".message_btn").parents(".form1").siblings(".guide").parents(".wliuyan_con").addClass("wliuyan_step2").removeClass("wliuyan_step1");
	})	
	$(".sjyz-two-next").click(function(){

		var val=$('input:radio[name="tfuyao"]:checked').val();
        if(val==null){
            layer.alert('请选择问题1', {icon: 2,})
            return false;
        }
        var val=$('input:radio[name="tganmao"]:checked').val();
        if(val==null){
            layer.alert('请选择问题2', {icon: 2,})
            return false;
        }

        var val=$('input:radio[name="tbaya"]:checked').val();
        if(val==null){
            layer.alert('请选择问题3', {icon: 2,})
            return false;
        }

		if(!verifyCheck._click()) return;

		$(this).parents(".message_btn").parents(".form2").hide();

		$(this).parents(".message_btn").parents(".form2").next(".form3").show();
		$(this).parents(".message_btn").parents(".form2").siblings(".guide").children(".m-progress-list").children(".step-2").addClass("finish").siblings(".step-3").addClass("on");
		$(this).parents(".message_btn").parents(".form2").siblings(".guide").parents(".wliuyan_con").addClass("wliuyan_step3").removeClass("wliuyan_step2");

	})	
	$(".sjyz-three-next").click(function(){

		if($(".national").val().trim().length==0){
			layer.alert('请填写民族！', {icon: 2,})
			return false;
		}

		if($(".cishu").val().trim().length==0){
			layer.alert('请选择献血次数！', {icon: 2,})
			return false;
		}

		if($(".wenhua").val().trim().length==0){
			layer.alert('请选择文化程度！', {icon: 2,})
			return false;
		}
		
		if($(".zhiye").val().trim().length==0){
			layer.alert('请选择职业！', {icon: 2,})
			return false;
		}

		if($(".danwei").val().trim().length==0){
			layer.alert('请填写单位！', {icon: 2,})
			return false;
		}

		if($(".mobile").val().trim().length!=11){
			layer.alert('请填写正确的联系电话！', {icon: 2,})
			return false;
		}

		if($(".address").val().trim().length==0){
			layer.alert('请填写联系地址！', {icon: 2,})
			return false;
		}

		if($(".mail").val().trim().length==0){
			layer.alert('请填写电子邮箱！', {icon: 2,})
			return false;
		}

		if($(".qq").val().trim().length==0){
			layer.alert('请填写QQ！', {icon: 2,})
			return false;
		}

		var val=$('input:radio[name="xianxueliang"]:checked').val();
        if(val==null){
            layer.alert('请选择献血量！', {icon: 2,})
            return false;
        }

		if(!verifyCheck._click()) return;
		var _this = $(this);
		$.post("{:U('Gbook/ajax_add')}",$('#form_add').serialize(), function(data){
   			
   			if(data.status == '-1'){
   				layer.alert(data.message);
   				return false;
   			}else if(data.status == 1){
   				//window.location.href="/index.php?a=lists&catid=16";
	            _this.parents(".message_btn").parents(".form3").next(".form4").show();
				_this.parents(".message_btn").parents(".form3").hide();
				_this.parents(".message_btn").parents(".form3").siblings(".guide").children(".m-progress-list").children(".step-3").addClass("finish").siblings(".step-4").addClass("on");
				_this.parents(".message_btn").parents(".form3").siblings(".guide").parents(".wliuyan_con").addClass("wliuyan_step4").removeClass("wliuyan_step3");
				return false;
	        }else{
	            layer.alert(data.message);
	            return false;
	        }

	    });

		

	})		
	// 安全设置 点击展开收起效果	
	$(".Safety dt em").click(function(){
		$(this).parents("dt").next("dd").toggle().siblings("dd").hide();
	})			
})


	function checkParseIdCard(val) {

	    var msg = checkIdcard(val); 
	    if (msg != "验证通过!") {
	        alert(msg);
	        return;
	    } 
	    var birthdayValue;
	    var sexId;
	    var sexText;
	    var age; 

	    if (15 == val.length){ //15位身份证号码
	        birthdayValue = val.charAt(6) + val.charAt(7);
	        if (parseInt(birthdayValue) < 10) {
	            birthdayValue = '20' + birthdayValue;
	        }
	        else {
	            birthdayValue = '19' + birthdayValue;
	        }
	        birthdayValue = birthdayValue + '-' + val.charAt(8) + val.charAt(9) + '-' + val.charAt(10) + val.charAt(11);
	        if (parseInt(val.charAt(14) / 2) * 2 != val.charAt(14)) {
	            sexId = "1";
	            sexText = "男";
	        }
	        else {
	            sexId = "2";
	            sexText = "女";
	        }
	    }
	    if (18 == val.length) { //18位身份证号码
	        birthdayValue = val.charAt(6) + val.charAt(7) + val.charAt(8) + val.charAt(9) + '-' + val.charAt(10) + val.charAt(11) + '-' + val.charAt(12) + val.charAt(13);
	        if (parseInt(val.charAt(16) / 2) * 2 != val.charAt(16)) {
	            sexId = "1";
	            sexText = "男";
	        }
	        else {
	            sexId = "2";
	            sexText = "女";
	        }
	    }
	     //年龄
	    var dt1 = new Date(birthdayValue.replace("-", "/"));
	    var dt2 = new Date();
	    var age = dt2.getFullYear() - dt1.getFullYear();
	    var m = dt2.getMonth() - dt1.getMonth();
	    if (m < 0)
	        age--; 
	    //alert(birthdayValue+sexId+sexText+age);
	    // console.log(sexText);
	    // console.log(birthdayValue);
	 //    document.form1.sex.value=sexText;
		// document.form1.birth.value=birthdayValue;
		$("#sex").val(sexText);
		$("#birth").val(birthdayValue);
		
	} 

	function checkIdcard(idcard) {
	    var Errors = new Array(
			"验证通过!",
			"身份证号码位数不对!",
			"身份证号码出生日期超出范围或含有非法字符!",
			"身份证号码校验错误!",
			"身份证地区非法!"
		);
	    var area = { 11: "北京", 12: "天津", 13: "河北", 14: "山西", 15: "内蒙古", 21: "辽宁", 22: "吉林", 23: "黑龙江", 31: "上海", 32: "江苏", 33: "浙江", 34: "安徽", 35: "福建", 36: "江西", 37: "山东", 41: "河南", 42: "湖北", 43: "湖南", 44: "广东", 45: "广西", 46: "海南", 50: "重庆", 51: "四川", 52: "贵州", 53: "云南", 54: "西藏", 61: "陕西", 62: "甘肃", 63: "青海", 64: "宁夏", 65: "新疆", 71: "台湾", 81: "香港", 82: "澳门", 91: "国外" }
	    var idcard, Y, JYM;
	    var S, M;
	    var idcard_array = new Array();
	    idcard_array = idcard.split("");
	    //地区检验 
	    if (area[parseInt(idcard.substr(0, 2))] == null) return Errors[4];
	    //身份号码位数及格式检验 
	    switch (idcard.length) {
	        case 15:
	            if ((parseInt(idcard.substr(6, 2)) + 1900) % 4 == 0 || ((parseInt(idcard.substr(6, 2)) + 1900) % 100 == 0 && (parseInt(idcard.substr(6, 2)) + 1900) % 4 == 0)) {
	                ereg = /^[1-9][0-9]{5}[0-9]{2}((01|03|05|07|08|10|12)(0[1-9]|[1-2][0-9]|3[0-1])|(04|06|09|11)(0[1-9]|[1-2][0-9]|30)|02(0[1-9]|[1-2][0-9]))[0-9]{3}$/; //测试出生日期的合法性 
	            } else {
	                ereg = /^[1-9][0-9]{5}[0-9]{2}((01|03|05|07|08|10|12)(0[1-9]|[1-2][0-9]|3[0-1])|(04|06|09|11)(0[1-9]|[1-2][0-9]|30)|02(0[1-9]|1[0-9]|2[0-8]))[0-9]{3}$/; //测试出生日期的合法性 
	            }
	            if (ereg.test(idcard)) return Errors[0];
	            else return Errors[2];
	            break;
	        case 18:
	            //18位身份号码检测 
	            //出生日期的合法性检查  
	            //闰年月日:((01|03|05|07|08|10|12)(0[1-9]|[1-2][0-9]|3[0-1])|(04|06|09|11)(0[1-9]|[1-2][0-9]|30)|02(0[1-9]|[1-2][0-9])) 
	            //平年月日:((01|03|05|07|08|10|12)(0[1-9]|[1-2][0-9]|3[0-1])|(04|06|09|11)(0[1-9]|[1-2][0-9]|30)|02(0[1-9]|1[0-9]|2[0-8])) 
	            if (parseInt(idcard.substr(6, 4)) % 4 == 0 || (parseInt(idcard.substr(6, 4)) % 100 == 0 && parseInt(idcard.substr(6, 4)) % 4 == 0)) {
	                ereg = /^[1-9][0-9]{5}19[0-9]{2}((01|03|05|07|08|10|12)(0[1-9]|[1-2][0-9]|3[0-1])|(04|06|09|11)(0[1-9]|[1-2][0-9]|30)|02(0[1-9]|[1-2][0-9]))[0-9]{3}[0-9Xx]$/; //闰年出生日期的合法性正则表达式 
	            } else {
	                ereg = /^[1-9][0-9]{5}19[0-9]{2}((01|03|05|07|08|10|12)(0[1-9]|[1-2][0-9]|3[0-1])|(04|06|09|11)(0[1-9]|[1-2][0-9]|30)|02(0[1-9]|1[0-9]|2[0-8]))[0-9]{3}[0-9Xx]$/; //平年出生日期的合法性正则表达式 
	            }
	            if (ereg.test(idcard)) {
	            /*测试出生日期的合法性 */
	               /* 计算校验位 */
	                S = (parseInt(idcard_array[0]) + parseInt(idcard_array[10])) * 7
		+ (parseInt(idcard_array[1]) + parseInt(idcard_array[11])) * 9
		+ (parseInt(idcard_array[2]) + parseInt(idcard_array[12])) * 10
		+ (parseInt(idcard_array[3]) + parseInt(idcard_array[13])) * 5
		+ (parseInt(idcard_array[4]) + parseInt(idcard_array[14])) * 8
		+ (parseInt(idcard_array[5]) + parseInt(idcard_array[15])) * 4
		+ (parseInt(idcard_array[6]) + parseInt(idcard_array[16])) * 2
		+ parseInt(idcard_array[7]) * 1
		+ parseInt(idcard_array[8]) * 6
		+ parseInt(idcard_array[9]) * 3;
	                Y = S % 11;
	                M = "F";
	                JYM = "10X98765432";
	                M = JYM.substr(Y, 1); //判断校验位 
	                if (M == idcard_array[17]) return Errors[0]; //检测ID的校验位 
	                else return Errors[3];
	            }
	            else return Errors[2];
	            break;
	        default:
	            return Errors[1];
	            break;
	    }
	} 

	
	</script>