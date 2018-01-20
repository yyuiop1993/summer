		<!-- fixed13 start 友情链接-->
		<div class="fixed fixed13 bdd">
			<div class="fix13-title clearfix">
				<p>友情链接</p>
				<ul>
					<li class="current"><a >党群部门</a></li>
					<li><a >政府部门</a></li>
					<li><a >乡镇街道</a></li>
					<li><a >其他网站</a></li>
					
				</ul>
			</div>
			<div class="boxs">
				<div class="box clearfix current">
					<ul>
						<get table="links" termsid="1" visible="1" order="id DESC">
							<volist name="data" id="vo">
								<li><a href="{$vo.url}" target="_blank" title="{$vo.name}">{$vo.name}</a></li>
							</volist>
						</get>
					</ul>
				</div>
				<div class="box clearfix">
					<ul>
						<get table="links" termsid="2" visible="1" order="id DESC">
							<volist name="data" id="vo">
								<li><a href="{$vo.url}" target="_blank" title="{$vo.name}">{$vo.name}</a></li>
							</volist>
						</get>
					</ul>
				</div>
				<div class="box clearfix">
					<ul>
						<get table="links" termsid="3" visible="1" order="id DESC">
							<volist name="data" id="vo">
								<li><a href="{$vo.url}" target="_blank" title="{$vo.name}">{$vo.name}</a></li>
							</volist>
						</get>
					</ul>
				</div>
				<div class="box clearfix">
					<ul>
						<get table="links" termsid="4" visible="1" order="id DESC">
							<volist name="data" id="vo">
								<li><a href="{$vo.url}" target="_blank" title="{$vo.name}">{$vo.name}</a></li>
							</volist>
						</get>

					</ul>
				</div>
			</div>
		</div>
		<!-- fixed13 end -->