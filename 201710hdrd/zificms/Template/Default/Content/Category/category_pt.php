	<template file="Content/header.php"/>
	<!-- content start -->
	<div class="content w clearfix">
		<div class="content-l fl">
			<template file="Content/left.php"/>
		</div>
		<div class="content-r fr">
			<div class="message-inner clearfix" >
			    <div class="box box2" style="margin-top: -10px;">
			        
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
										<p class="fl2" style="width: 480px;"><a href="{:U('Index/showgbook',array('id'=>$vo['cxm'],'catid'=>10))}">{$vo.title|str_cut=###,30}</a></p>
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