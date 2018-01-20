	<template file="Content/header.php"/>
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/page.css">

	
	<div class="hearder-top"><a href="/index.php" class="bank"></a>满意度调查问卷<span class="share"></span></div>
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

	<div class="content manyidu clearfix">
		<div class="box box1"><img src="{$config_siteurl}statics/default/images/manyidu.png" alt=""></div>
		<div class="w">

			<form name="myform" id="myform" action="/index.php?g=Formguide&amp;a=post" method="post" class="J_ajaxForms" enctype="multipart/form-data">
  			<input type="hidden" name="formid" value="8">

			<div class="box box2">
				<div class="star" id="star">
					<span class="select"></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
				<div class="line"></div>
				<script type="text/javascript">
					var spans = document.getElementById('star').getElementsByTagName('span');
					for(var i = 0; i < spans.length; i++){
						spans[i].index = i;
						spans[i].onclick = function() {
							// console.log(this.index);
							var _index = this.index;
							// console.log(_index);
							for(var k = 0; k < spans.length; k++){
								spans[k].className = "";
							}
							for(var j = 0; j <= _index; j++){
								spans[j].className = 'select';
							}
						}
					}
				</script>
			</div>

			<div class="box box3">
				<div class="inp inp1" id="inp1">
					<h4><span>1</span>您对工惠乐学的课堂安排是否满意</h4>
					<p>
						<label for="inp11"><input type="radio" name="info[anpai]" id='inp11' value="非常满意">A. 非常满意</label>
						<label for="inp12"><input type="radio" name="info[anpai]" id='inp12' value="一般">B. 一般</label>
						<label for="inp13"><input type="radio" name="info[anpai]" id='inp13' value="不满意">C. 不满意</label>
					</p>
				</div>

				<div class="inp inp2" id="inp2">
					<h4><span>2</span>您通过什么途径知道工惠乐学平台</h4>
					<p>
						<label for="inp21"><input type="radio" name="info[tujing]" id='inp21' value="工会官方公众号/文宣资料" >A. 工会官方公众号/文宣资料</label>
						<label for="inp22"><input type="radio" name="info[tujing]" id='inp22' value="朋友/同事推荐">B. 朋友/同事推荐</label>
						<label for="inp23"><input type="radio" name="info[tujing]" id='inp23' value="其他">C. 其他</label>
					</p>
				</div>

				<div class="inp inp3" id="inp3">
					<h4><span>3</span>工惠乐学课程种类丰富程度</h4>
					<p>
						<label for="inp31"><input type="radio" name="info[chengdu]" id='inp31' value="满意">A. 满意</label>
						<label for="inp32"><input type="radio" name="info[chengdu]" id='inp32' value="一般">B. 一般</label>
						<label for="inp33"><input type="radio" name="info[chengdu]" id='inp33' value="不满意">C. 不满意</label>
					</p>
				</div>

				<div class="inp inp4" id="inp4">
					<h4><span>4</span>工惠乐学课程与网上宣传的相符程度</h4>
					<p>
						<label for="inp41"><input type="radio" name="info[xiangfu]" id='inp41' value="满意">A. 满意</label>
						<label for="inp42"><input type="radio" name="info[xiangfu]" id='inp42' value="一般">B. 一般</label>
						<label for="inp43"><input type="radio" name="info[xiangfu]" id='inp43' value="不满意">C. 不满意</label>
					</p>
				</div>
			</div>


			<div class="box box4">
				<div class="bo1">
					您认为哪些还需改进（包括我们的服务、教学环境及其他学科服务）可以直接写下来，我们会尽快对您的一切意见或建议回复，谢谢！
				</div>
				<div class="bo2">
					<p class="p1">其他建议<span>(300字)</span></p>
					<p class="p2"><textarea name="info[jianyi]" id="" cols="30" rows="10" placeholder="请输入您的意见和建议"></textarea></p>
					<p class="p3"></p>
				</div>
				<div class="bo3">
					<button type="submit" id="btn" class="submit_btn">提 交</button>
				</div>

				
			</div>


			</form>
		</div>
	</div>

	<script type="text/javascript">
		
	</script>

	<script type="text/javascript">
				var inps1 = document.getElementById('inp1').getElementsByTagName('input');
				var inps2 = document.getElementById('inp2').getElementsByTagName('input');
				var inps3 = document.getElementById('inp3').getElementsByTagName('input');
				var inps4 = document.getElementById('inp4').getElementsByTagName('input');
				var btn = document.getElementById('btn');
				var txt = document.getElementById('txt');
				
				btn.onclick = function() {
					function checkRadio(obj) {
						for (var i = 0; i < obj.length; i++){
							if(obj[i].checked) {
								// console.log(i);
								return true;
							}
						}
					};
					// checkRadio(inps1);
					// console.log(checkRadio(inps1));
					if(!checkRadio(inps1)) {
						$("#inp11").focus();
						alert('请选择您的满意度评价。');
						return false;
					}

					if(!checkRadio(inps2)) {
						$("#inp21").focus();
						alert('请选择您的途径。');
						return false;
					}

					if(!checkRadio(inps3)) {
						$("#inp31").focus();
						alert('请选择您对课程的满意程度。');
						return false;
					}

					if(!checkRadio(inps4)) {
						$("#inp41").focus();
						alert('请选择相符程度。');
						return false;
					}
					
				};
					
			</script>

	<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/share.js"></script>
	<!-- content end -->
	<template file="Content/footer.php"/>