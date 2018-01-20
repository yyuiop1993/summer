
<div class="caption">
	{:getCategory($catid,'catname')}<br/>
	{:getCategory($catid,'encatname')}
</div>
<ul>
	<content action="category" catid="$catid" order="listorder ASC">
		<volist name="data" id="vo">
			<li><a href="{$vo.url}" <if condition="in_array($catid,explode(',',$vo['arrchildid']))"> class="hover"</if>  >{$vo.catname}</a></li>
		</volist>
	</content>
</ul>
<div class="contact">
	<a href="#"><img src="{$config_siteurl}statics/default/images/contact.jpg" alt="联系我们" title="联系我们"></a>
</div>
