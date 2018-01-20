			<div class="cont-l">
				<h3>
					<if condition= "getCategory($catid,'parentid') eq 0">
			        	{:getCategory($catid,'catname')}
				    <else />
				        {:getCategory(getCategory($catid,'parentid'),'catname')}
				    </if>
				</h3>
				<ul>
					<content action="category" catid="$catid" order="listorder ASC">
						<volist name="data" id="vo">
							<li  <if condition="in_array($catid,explode(',',$vo['arrchildid']))"> class="current"</if>  ><a href="{$vo.url}" ><span>&gt;&gt;</span>{$vo.catname}</a></li>
						</volist>
					</content>
				</ul>
			</div>