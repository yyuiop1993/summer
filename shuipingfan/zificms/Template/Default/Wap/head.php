<div class="header_top">
	<div class="w">
		<div class="logo">
			<h1><a href="/"><img src="{$config_siteurl}statics/default/images/logo.png" alt=""></a></h1>
		</div>
		<div class="nav">
			<ul>
				<li class="current"><a href="/">网站首页</a></li>
				<content action="category" catid="0"  order="listorder ASC" >
					<volist name="data" id="vo">
							<li <if condition="  in_array($catid,explode(',',$vo['arrchildid']))"> class="current"</if> ><a href=" {:caturl($vo['catid'])}  ">{$vo.catname}</a></li>
					</volist>
				</content>

			</ul>

		</div>
	</div>
</div>
<div class="banner">
	<div class="flexslider">
		<ul class="slides">
			<li><img src="{$config_siteurl}statics/default/images/banner1.jpg" alt=""></li>
			<li><img src="{$config_siteurl}statics/default/images/banner2.jpg" alt=""></li>
			<li><img src="{$config_siteurl}statics/default/images/banner3.jpg" alt=""></li>
		</ul>
	</div>
</div>