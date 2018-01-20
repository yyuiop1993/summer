


		<!-- fixed8 start -->
		<div class="fixed fixed8 clearfix">
			<div class="title clearfix">
				<h4><a href="#" target="_blank">相关链接</a></h4>
			</div>
			<div id="marquee1">
				<ul>
					<get table="links" termsid="7" visible="1" order="id DESC">
						<volist name="data" id="vo">
							<li><a href="{$vo.url}" target="_blank"><img src="{$vo.image}"></a></li>
						</volist>
					</get>
					
				</ul>
			</div>
			<div class="select clearfix">
				<select name="" onchange="if(value!=''){window.open(this.options[this.selectedIndex].value);}else{return(false);}">
					<get table="links" termsid="2" visible="1" order="id DESC">
						<volist name="data" id="vo">
							<option value="{$vo.url}" ><a href="{$vo.url}" target="_blank" title="{$vo.name}">{$vo.name}</a></option>
						</volist>
					</get>
				</select>
				<select name="" onchange="if(value!=''){window.open(this.options[this.selectedIndex].value);}else{return(false);}">
					<get table="links" termsid="3" visible="1" order="id DESC">
						<volist name="data" id="vo">
							<option value="{$vo.url}" ><a href="{$vo.url}" target="_blank" title="{$vo.name}">{$vo.name}</a></option>
						</volist>
					</get>
				</select>
				<select name="" onchange="if(value!=''){window.open(this.options[this.selectedIndex].value);}else{return(false);}">
					<get table="links" termsid="4" visible="1" order="id DESC">
						<volist name="data" id="vo">
							<option value="{$vo.url}" ><a href="{$vo.url}" target="_blank" title="{$vo.name}">{$vo.name}</a></option>
						</volist>
					</get>
				</select>
				<select name="" onchange="if(value!=''){window.open(this.options[this.selectedIndex].value);}else{return(false);}">
					<get table="links" termsid="5" visible="1" order="id DESC">
						<volist name="data" id="vo">
							<option value="{$vo.url}" ><a href="{$vo.url}" target="_blank" title="{$vo.name}">{$vo.name}</a></option>
						</volist>
					</get>
				</select>
				
				<select name="" onchange="if(value!=''){window.open(this.options[this.selectedIndex].value);}else{return(false);}">
					<get table="links" termsid="6" visible="1" order="id DESC">
						<volist name="data" id="vo">
							<option value="{$vo.url}" ><a href="{$vo.url}" target="_blank" title="{$vo.name}">{$vo.name}</a></option>
						</volist>
					</get>
				</select>

				<select name="" onchange="if(value!=''){window.open(this.options[this.selectedIndex].value);}else{return(false);}">
					<get table="links" termsid="1" visible="1" order="id DESC">
						<volist name="data" id="vo">
							<option value="{$vo.url}" ><a href="{$vo.url}" target="_blank" title="{$vo.name}">{$vo.name}</a></option>
						</volist>
					</get>
				</select>
			</div>
		</div>
		<!-- fixed8 end -->