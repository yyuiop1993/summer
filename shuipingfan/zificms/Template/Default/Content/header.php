	<!-- header start -->
	<div class="header clearfix min_w">
		<div class="hi">
			<div class="w">
				<p class="fl">hi,欢迎访问济南优润机电设备有限公司</p>
				<p class="fr"><a href="/">返回首页</a>丨<a href="#">网站地图</a>丨<a href="{:getCategory(5,'url')}">联系我们</a></p>
			</div>
		</div>
    	<div class="logo">
    		<div class="w">
    			<h1 class="fl"><a href="/">济南优润机电设备有限公司</a></h1>
	        	<p class="fr">服务热线：<b>{:cache('Config.tel')}</b></p>
    		</div>
        </div>
	    <div class="menu">
        	<ul class="w">
	        	<li ><a href="/">网站首页</a></li>
	        	<li>|</li>
	            <content action="category" catid="0"  order="listorder ASC" >
    				<volist name="data" id="vo">
						<li <if condition=' $catid eq $vo["catid"] '> class="hover"</if> ><a href="{$vo.url}">{$vo.catname}</a></li>
						<li>|</li>
					</volist>
				</content>
       		</ul>
	    </div>
	</div>
	<!-- header start -->
	<!-- banner start -->
	<div class="flexslider min_w">
		<ul class="slides">
			<li><a href="#"><img src="{$config_siteurl}statics/default/images
			/banner1.jpg" alt="优润机电" title="济南优润机电"></a></li>
			<li><a href="#"><img src="{$config_siteurl}statics/default/images
			/banner1.jpg" alt="优润机电" title="济南优润机电"></a></li>
			<li><a href="#"><img src="{$config_siteurl}statics/default/images
			/banner1.jpg" alt="优润机电" title="济南优润机电"></a></li>
			<li><a href="#"><img src="{$config_siteurl}statics/default/images
			/banner1.jpg" alt="优润机电" title="济南优润机电"></a></li>
		</ul>
	</div>
	<!-- banner end -->
	<div class="clearfix"></div>
	<!-- breaknav start -->
	<div class="breaknav min_w ">
		<div class="w">
			当前位置：<a href="{$config_siteurl}">首页</a>&nbsp;&gt;&gt;&nbsp;<navigate catid="$catid" space="&gt;" />
		</div>
	</div>
	<!-- breaknav nav -->