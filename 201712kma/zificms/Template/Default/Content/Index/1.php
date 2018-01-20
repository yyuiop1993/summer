<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />
	<link rel="shortcut icon" type="image/x-icon" href="{$config_siteurl}statics/default/images/favicon.ico" media="screen" />
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/base.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/index.css">
	<script  type="text/javascript">
		function SetHome(obj,url){try{obj.style.behavior="url(#default#homepage)";obj.setHomePage(url)}catch(e){if(window.netscape){try{netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect")}catch(e){alert("抱歉，此操作被浏览器拒绝！\n\n请在浏览器地址栏输入“about:config”并回车然后将[signed.applets.codebase_principal_support]设置为'true'")}}else{alert("抱歉，您所使用的浏览器无法完成此操作。\n\n您需要手动将【"+url+"】设置为首页。")}}}function AddFavorite(title,url){try{window.external.addFavorite(url,title)}catch(e){try{window.sidebar.addPanel(title,url,"")}catch(e){alert("抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请使用Ctrl+D进行添加")}}};
	</script>
</head>
<body>
	<!-- header start -->
	<div class="header">
		<div class="shortcut clearfix min-w">
			<div class="w">
				<div class="fl">欢迎访问河东区人民代表大会常务委员会&nbsp;&nbsp;&nbsp;&nbsp;<span id="time"></span></div>
				<div class="fr">
					<a href="javascript:void(0);" onclick="SetHome(this,location.href);" >设为首页</a>
					<span class="line">|</span>
					<a href="javascript:void(0);" onclick="AddFavorite('{:cache("Config.sitename")}',location.href)">加入收藏</a>
					<span class="line">|</span>
					<a href="{:getCategory(43,'url')}">联系我们</a>
				</div>
			</div>
		</div>
		<div class="head-bg min-w">
			<div class="bg"></div>
		</div>
		<div class="logo">
			<h1><a href="/">河东区人民代表大会常务委员会</a></h1>
		</div>
		<div class="head-nav w clearfix">
			<div class="nav" id="nav">
				<ul>
					<li class="li01"><a href="/" class="a1 current">首 页</a></li>
					<content action="category" catid="0" num='9'  order="listorder ASC" >
						<volist name="data" id="vo">
							<li class="li01"><a href="{$vo.url}" class="a1">{$vo.catname}</a>
								<if condition="strpos(getCategory($vo['catid'],'arrchildid'),',') and (substr_count(getCategory($vo['catid'],'arrchildid'),',') gt 1 )">
									<content action="category" catid="$vo['catid']"   order="listorder ASC" >    
										<ul>
											<volist name="data" id="vo1">
												<li><a href="{$vo1.url}">{$vo1.catname}</a></li>
											</volist>
										</ul>
									</content>
								</if>
							</li>
						</volist>
					</content>
					
				</ul>
			</div>
		</div>
	</div>
	<!-- header end -->
	<!-- fixed1 start -->
	<div class="fixed fixed1 w clearfix">
		<div class="fixed-l fl">
			<div class="flexslider">
				<ul class="slides">
					<position action="position" catid='2' posid="1"  num='5' >
		        		<volist name="data" id="vo">
							<li>
								<a href="{$vo.data.url}"><img src="{$vo.data.thumb}" alt=""></a>
								<span><a href="{$vo.data.url}">{$vo.data.title|str_cut=###,22}</a></span>
							</li>
						</volist>
					</position>
					
				</ul>
			</div>
		</div>
		<div class="fixed-c fl">
			<div class="tit">
				<a href="{:getCategory(2,'url')}">人大要闻</a>
			</div>
			<ul>
				<content action="lists" catid="2"  order="id DESC" num="9">
   					<volist name="data" id="vo">
   						<li><a href="{$vo.url}">{$vo.title|str_cut=###,22}</a><span>{$vo.updatetime|date="Y-m-d",###}</span></li>
					</volist>
				</content>	
			</ul>
		</div>
		<div class="fixed-r fr">
			<div class="xianfa">
				<a href="{:getCategory(55,'url')}"></a>
			</div>
			<div class="notice">
				<div class="tit"><a href="{:getCategory(42,'url')}" class="noti">通知公告</a><a href="{:getCategory(42,'url')}" class="more"><i class="c-red">+</i> 更多</a></div>
				<div class="list_lh">
					<ul>
						<content action="lists" catid="42"  order="id DESC" num="10">
							<volist name="data" id="vo">
								<li>
									<a href="{$vo.url}" target="_blank" class="a_blue">{$vo.title|str_cut=###,23}</a>
								</li>
							</volist>
						</content>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- fixed1 end -->
	<!-- fixed2 start -->
	<div class="fixed fixed2 w clearfix">
		<div class="fl">
			<div class="box1">
				<ul>
					<li class="li1">
						<a href="http://115.159.221.126/Linyi_hedongRD/login.aspx?Soft=5&;login"  target="_blank">
							<img src="{$config_siteurl}statics/default/images/pt1.jpg" alt="">
						</a>
					</li>
					<li>
						<a href="http://115.159.221.126/Linyi_hedongRD/login.aspx?Soft=1&;login" target="_blank">
							<img src="{$config_siteurl}statics/default/images/pt2.jpg" alt="">
						</a>
					</li>
					<li>
						<a href="http://115.159.221.126/Linyi_hedongRD/Web/DeputySpace.aspx"  target="_blank">
							<img src="{$config_siteurl}statics/default/images/pt3.jpg" alt="">
						</a>
					</li>
				</ul>
			</div>
			<div class="box2">
				<div class="fl box2-fl">
					<div class="tit"><a href="{:getCategory(4,'url')}" class="noti">监督工作</a><a href="{:getCategory(4,'url')}" class="more"><i class="c-red">+</i> 更多</a></div>
					<div class="tab">

						<content action="category" catid="4" num='3'  order="listorder desc" >
							<div class="hd">
								<volist name="data" id="vo" key='k'>
									<a class=" a1 <if condition="$k eq 1">cur</if>" href="{$vo.url}">{$vo.catname}</a>
								</volist>
							</div>
							
								<div class="bd">
									<volist name="data" id="vo" key='k'>
										<div class="bd-list  <if condition="$k eq 1">bd-list1</if>">
											<div class="special">
												<position action="position" posid="1" num='1' catid="$vo['catid']">
													<volist name="data" id="vo">
														<div class="pic">
															<a href="{$vo.data.url}"><img src="{$vo.data.thumb}" alt="{$vo.data.title}"></a>
														</div>
														<div class="text">
															<h4><a href="{$vo.data.url}">{$vo.data.title}</a></h4>
															<p><a href="{$vo.data.url}">{$vo.data.description|str_cut=###,32}【详细】</a></p>
														</div>
													</volist>
												</position>
											</div>
											<ul>
												<content action="lists" catid="$vo['catid']"  order="id DESC" num="7">
								   					<volist name="data" id="vo">
								   						<li><a href="{$vo.url}">{$vo.title|str_cut=###,20}</a><span>{$vo.updatetime|date="Y-m-d",###}</span></li>
													</volist>
												</content>	
											</ul>
										</div>
									</volist>
								</div>
						</content>
					</div>
				</div>				
				<div class="fr box2-fl">
					<div class="tit"><a href="{:getCategory(6,'url')}" class="noti">代表工作</a><a href="{:getCategory(6,'url')}" class="more"><i class="c-red">+</i> 更多</a></div>
					<div class="tab">

						<content action="category" catid="6" num='3'  order="listorder desc" >
							<div class="hd">
								<volist name="data" id="vo" key='k'>
									<a class=" a1 <if condition="$k eq 1">cur</if>" href="{$vo.url}">{$vo.catname}</a>
								</volist>
							</div>
							
								<div class="bd">
									<volist name="data" id="vo" key='k'>
										<div class="bd-list  <if condition="$k eq 1">bd-list1</if>">
											<div class="special">
												<position action="position" posid="1" num='1' catid="$vo['catid']">
													<volist name="data" id="vo">
														<div class="pic">
															<a href="{$vo.data.url}"><img src="{$vo.data.thumb}" alt="{$vo.data.title}"></a>
														</div>
														<div class="text">
															<h4><a href="{$vo.data.url}">{$vo.data.title}</a></h4>
															<p><a href="{$vo.data.url}">{$vo.data.description|str_cut=###,32}【详细】</a></p>
														</div>
													</volist>
												</position>
											</div>
											<ul>
												<content action="lists" catid="$vo['catid']"  order="id DESC" num="7">
								   					<volist name="data" id="vo">
								   						<li><a href="{$vo.url}">{$vo.title|str_cut=###,20}</a><span>{$vo.updatetime|date="Y-m-d",###}</span></li>
													</volist>
												</content>	
											</ul>
										</div>
									</volist>
								</div>
						</content>
					</div>
				</div>
			</div>
			<div class="box2">
				<div class="fl box2-fl">
					<div class="tit"><a href="{:getCategory(3,'url')}" class="noti">重大事项</a><a href="{:getCategory(3,'url')}" class="more"><i class="c-red">+</i> 更多</a></div>
					<div class="tab">
						<div class="bd">
							<div class="bd-list bd-list1">
								<ul>
									<content action="lists" catid="3"  order="id DESC" num="8">
					   					<volist name="data" id="vo">
					   						<li><a href="{$vo.url}">{$vo.title|str_cut=###,20}</a><span>{$vo.updatetime|date="Y-m-d",###}</span></li>
										</volist>
									</content>	
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="fr box2-fl">
					<div class="tit"><a href="{:getCategory(41,'url')}" class="noti">镇街人大</a><a href="{:getCategory(41,'url')}" class="more"><i class="c-red">+</i> 更多</a></div>
					<div class="tab">
						<div class="bd">
							<div class="bd-list bd-list1">
							    <position action="position" posid="1" num='1' catid="8">
							    	<volist name="data" id="vo">
										<div class="special">
											<div class="pic">
												<a href="{$vo.data.url}"><img src="{$vo.data.thumb}" alt=""></a>
											</div>
											<div class="text">
												<h4><a href="#">{$vo.data.title|str_cut=###,15}</a></h4>
												<p><a href="#">{$vo.data.description|str_cut=###,23}【详细】</a></p>
											</div>
										</div>
									</volist>
								</position>
								<ul>
									<content action="lists" catid="8"  order="id DESC" num="5">
					   					<volist name="data" id="vo">
					   						<li><a href="{$vo.url}">{$vo.title|str_cut=###,20}</a><span>{$vo.updatetime|date="Y-m-d",###}</span></li>
										</volist>
									</content>	
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="fr fixed2-fr">
			<div class="box1">
				<ul>
					<li><a href="{:getCategory(49,'url')}"><img src="{$config_siteurl}statics/default/images/img1.jpg" alt=""></a></li>
					<li><a href="{:getCategory(50,'url')}"><img src="{$config_siteurl}statics/default/images/img2.jpg" alt=""></a></li>
					<li><a href="{:getCategory(51,'url')}"><img src="{$config_siteurl}statics/default/images/img3.jpg" alt=""></a></li>
					<li><a href="{:getCategory(52,'url')}"><img src="{$config_siteurl}statics/default/images/img4.jpg" alt=""></a></li>
				</ul>
			</div>
			<div class="box2">
				<img src="{$config_siteurl}statics/default/images/khdewm.jpg" alt="">
			</div>
			<div class="box4">
				<div class="tit"><a href="{:getCategory(7,'url')}" class="noti">预算监督</a><a href="{:getCategory(7,'url')}" class="more"><i class="c-red">+</i> 更多</a></div>
				<div class="fixed2-fr-tab">
					<content action="category" catid="7" num="3"  order="listorder desc" >
						<div class="fr-tab-hd tab-w">
							<volist name="data" id="vo" key='k'>
								<a  <if condition="$k eq 1"> class="cur" </if>  href="{$vo.url}" >{$vo.catname}</a>
							</volist>
						</div>
						<div class="fr-tab-bd">
							<volist name="data" id="vo" key='k'>
								<ul <if condition="$k eq 1"> class="ul1" </if> >
									<content action="lists" catid="$vo['catid']"  order="id DESC" num="3">
										<volist name="data" id="vo">
											<li><a href="{$vo.url}">{$vo.title|str_cut=###,20}</a></li>
										</volist>
									</content>
								</ul>
							</volist>	
						</div>
					</content>
				</div>
			</div>
			<div class="box4">
				<div class="tit"><a href="{:getCategory(9,'url')}" class="noti">文献资料</a><a href="{:getCategory(9,'url')}" class="more"><i class="c-red">+</i> 更多</a></div>
				<div class="fixed2-fr-tab">
					<content action="category" catid="9" num="3"  order="listorder desc" >
						<div class="fr-tab-hd tab-w">
							<volist name="data" id="vo" key='k'>
								<a  <if condition="$k eq 1"> class="cur" </if>  href="{$vo.url}" >{$vo.catname}</a>
							</volist>
						</div>
						<div class="fr-tab-bd">
							<volist name="data" id="vo" key='k' >
								<ul <if condition="$k eq 1"> class="ul1" </if> >
									<content action="lists" catid="$vo['catid']"  order="id DESC" num="4">
										<volist name="data" id="vo">
											<li><a href="{$vo.url}">{$vo.title|str_cut=###,20}</a></li>
										</volist>
									</content>
								</ul>
							</volist>	
						</div>
					</content>
				</div>
			</div>

		</div>
	</div>
	<!-- fixed2 end -->
	<!-- link start -->
	<div class="link w clearfix">
		<div class="fl">
			<ul>
				<li class="li1"><a href="http://www.npc.gov.cn/" target="_blank"><img src="{$config_siteurl}statics/default/images/link1.jpg" alt=""></a></li>
				<li class="li2"><a href="http://www.sdrd.gov.cn/" target="_blank"><img src="{$config_siteurl}statics/default/images/link2.jpg" alt=""></a></li>
				<li class="li3"><a href="http://www.lyrenda.gov.cn/" target="_blank"><img src="{$config_siteurl}statics/default/images/link3.jpg" alt=""></a></li>
				<li class="li4"><a href="http://www.hedong.gov.cn/" target="_blank"><img src="{$config_siteurl}statics/default/images/link4.jpg" alt=""></a></li>
				<li class="li5"><a href="http://lyhdqfy.sdcourt.gov.cn/" target="_blank"><img src="{$config_siteurl}statics/default/images/link5.jpg" alt=""></a></li>
				<li class="li6"><a href="http://www.hdq.lyjc.gov.cn/main/main.aspx" target="_blank"><img src="{$config_siteurl}statics/default/images/link6.jpg" alt=""></a></li>
			</ul>
		</div>
		<div class="fr">
			<select name="rd1" onchange="if(value!=''){window.open(this.options[this.selectedIndex].value);}else{return(false);}">
				<option  value="">省级人大</option>
				<get table="links" termsid="1" visible="1" order="id DESC">
					<volist name="data" id="vo">
						<option  value="{$vo.url}">{$vo.name}</option>
					</volist>
				</get>
			</select>
			<select name="rd2" onchange="if(value!=''){window.open(this.options[this.selectedIndex].value);}else{return(false);}">
				<option value="">市级人大</option>
				<get table="links" termsid="2" visible="1" order="id DESC">
					<volist name="data" id="vo">
						<option  value="{$vo.url}">{$vo.name}</option>
					</volist>
				</get>
			</select>
			<select name="rd3" onchange="if(value!=''){window.open(this.options[this.selectedIndex].value);}else{return(false);}">
				<option value="">县级人大</option>
				<get table="links" termsid="3" visible="1" order="id DESC">
					<volist name="data" id="vo">
						<option  value="{$vo.url}">{$vo.name}</option>
					</volist>
				</get>
			</select>
		</div>
	</div>
	<!-- link end -->
	<!-- footer start -->
	<div class="footer clearfix min-w">
		<div class="w">
			<div class="govlogo fl"><a></a></div>
			<div class="copyright fl">
				{:cache('Config.footerinfo')}
			</div>
			<div class="findwrong fr"><a href="#"></a></div>
		</div>
	</div>
	<!-- footer end -->
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/scroll.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/base.js"></script>
	<script type="text/javascript">
		tick();
	</script>	
</body>
</html>