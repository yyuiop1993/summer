<!-- footer start -->
	<div class="footer min_w">
		<div class="w clearfix">
			<div class="fl">
				<div class="link">
					<ul class="clearfix">
						
					</ul>
				</div>
				<div class="nav">
					<ul class="clearfix">
						<li><a href="">网站首页</a></li>
				    	<content action="category" catid="0"  order="listorder ASC" >
							<volist name="data" id="vo">
								<li><a href="{$vo.url}">{$vo.catname}</a></li>
							</volist>
						</content>
					</ul>
				</div>
				<div class="copyright">{:cache('Config.footerinfo')}</div>
			</div>
			<div class="fr">
				<p class="ewm ewm1 fl"><img src="{$config_siteurl}statics/default/images
				/ewm.jpg" alt="官方微信" title="官方微信"><span>官方微信</span></p>
				<p class="ewm ewm2 fl"><img src="{$config_siteurl}statics/default/images
				/ewm.jpg" alt="官方微博" title="官方微博"><span>官方微博</span></p>
			</div>
		</div>
	</div>
	<!-- footer end -->
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/index.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery.cxscroll.js"></script>
	<script>
		$("#pic_list_1").cxScroll({
			easing:"linear",
            step:1,
            accel:1000,//手动
            speed:1000,//自动
            time:2000,//自动滚动间隔
		});
	</script>
</body>
</html>