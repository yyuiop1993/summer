<div class="content-l fl">
			<h3>
				<!-- <if condition= "getCategory($catid,'parentid') eq 0">
		        	{:getCategory($catid,'catname')}
			    <else />
			        {:getCategory(getCategory($catid,'parentid'),'catname')}
			    </if> -->
			    <img src="{$config_siteurl}statics/default/images/content_title.png" />
			</h3>
			<div class="posi-img"><img src="{$config_siteurl}statics/default/images/content_icon.png" /></div>
			<ul>
				<li  <if condition="$catid eq 2"> class="current"</if>  >
					<a href="{:getCategory(2,'url')}" >
						{:getCategory(2,'catname')}<br>
						<span>Brief introduction</span>
					</a>
					
				</li>
				<li  <if condition="$catid eq 3"> class="current"</if>  >
					<a href="{:getCategory(3,'url')}" >
						{:getCategory(3,'catname')}<br>
						<span>Coach team</span>
					</a>
				</li>
				<li  <if condition="$catid eq 4"> class="current"</if>  >
					<a href="{:getCategory(4,'url')}" >
						{:getCategory(4,'catname')}<br>
						<span>Students elegant demeanour</span>
					</a>
					
				</li>

			</ul>	
		</div>