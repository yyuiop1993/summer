<template file="Content/header.php"/>
	<!-- content start -->
	<div class="content w clearfix">
		<div class="content-l fl">
			<template file="Content/left.php"/>
		</div>
		<div class="content-r fr">
			<div class="title">
				<span>{$catname}</span>
			</div>
			<div class="message-inner clearfix">
				<div class="box box1">
					<div class="tit"><p>我要留言</p></div>
					<div class="inn" id="inn">
						<form action="{:U('Content/Gbook/postgbook')}"  onsubmit="return checkForm();"  method="post">
						<div class="form form1">
							<span>留言姓名:</span>
							<input type="text" name="name" id="name">
							<i>*</i>
						</div>
						<div class="form form2">
							<span>联系电话:</span>
							<input type="text" name="phone" id="phone">
							<i>*</i>
						</div>
						<div class="form form3">
							<span>E - mail:&nbsp;</span>
							<input type="text"  name="mail" id="mail">
							<i>*</i>
						</div>
						<div class="form form4">
							<span>联系Q&nbsp;Q:&nbsp;</span>
							<input type="text" name="qq" id="qq">
							<i>*</i>
						</div>
						<div class="form form5">
							<span>留言主题:</span>
							<input type="text" name="title" id="title">
							<i>*</i>
						</div>
						<div class="form form6">
							<span>留言内容:</span>
							<textarea name="cont" id="cont" ></textarea>
							<i>*</i>
						</div>
						<div class="form form7">
							<span>验 证 码:&nbsp;</span>
							<input type="text" name="yzm" id="yzm">
							<img src="{:U('Api/Checkcode/index','type=gbook&code_len=4&font_size=20&width=80&height=32&font_color=&background=')}" onClick="refreshs()" id="code_img"  alt="">
							<a onClick="refreshs()"  style="cursor: pointer;">看不清 换一张</a>
						</div>
						<div class="cl"></div>
						<div class="form form8">
							<input type="hidden" name="catid" value="{$catid}" />
							<input type="submit" name="submit" value="提&nbsp;&nbsp;&nbsp;交">
							<input type="reset" id="yigeform" value="重&nbsp;&nbsp;&nbsp;置">
						</div>
						</form>
					</div>
				</div>
				<div class="box box2">
					<div class="tit">
						<p>信件查询</p>
						<form method='post' action="{:U('Content/Gbook/findmsg')}">
							<div class="form" >
								<span>查询码：</span>
								<input type="text" name="cxm">
								<input type="hidden" name="catid" value="{$catid}" />
							</div>
							<button>查询</button>
						</form>	
					</div>
					<get sql="SELECT * FROM zf_gbook  WHERE status=1 AND is_show=1  ORDER BY id DESC" page="$page" num="5">
						<ul>
							
								<li class="titli">
									<div class="left">
										<h5 class="fl1">类别</h5>
										<h5 class="fl2">标题</h5>
									</div>
									<div class="right">
										<h5>来信时间</h5>
										<h5>处理状态</h5>
										<h5>回复时间</h5>
									</div>
								</li>
								<volist name="data" id="vo">
								<li>
									<div class="left">
										<p class="fl1">{$vo.type|hz_get_type}</p>
										<p class="fl2" style="width: 470px;"><a href="{:U('Index/showgbook',array('id'=>$vo['cxm'],'catid'=>10))}">{$vo.title|str_cut=###,30}</a></p>
									</div>
									<div class="right">
										<p>{$vo.add_time|date='Y-m-d',###}</p>
										<p>{$vo.status|hz_get_status}</p>
										<p>{$vo.cl_time|date='Y-m-d',###}</p>
									</div>
								</li>
							</volist>
							
						</ul>
						<div class="fenye">
				          <ul>
				            {$pages}
				          </ul>
				        </div>	
					</get>
				</div>
			</div>
			
		</div>
	</div>
	<!-- content end -->
	<template file="Content/footer.php"/>
<script>
//刷新广告
function refreshs(){
	
	document.getElementById('code_img').src='{:U('Api/Checkcode/index','type=gbook&code_len=4&font_size=20&width=130&height=50&font_color=&background=&refresh=1')}&time='+Math.random();void(0);
	}
	function checkForm() {
	    if ($("#name").val().trim().length == 0) {
	        $("#name").focus();
	        return false;
	    }
	    if ($("#phone").val().trim().length == 0) {
	        $("#phone").focus();
	        return false;
	    }
	    if ($("#mail").val().trim().length == 0) {
	        $("#mail").focus();
	        return false;
	    }
	    if ($("#qq").val().trim().length == 0) {
	        $("#qq").focus();
	        return false;
	    }
	    if ($("#title").val().trim().length == 0) {
	        $("#title").focus();
	        return false;
	    }
	    if ($("#cont").val().trim().length == 0) {
	        $("#cont").focus();
	        return false;
	    }
	    if ($("#yzm").val().trim().length == 0) {
	        $("#yzm").focus();
	        return false;
	    }
	}
</script>