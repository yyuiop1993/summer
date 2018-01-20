/*
layui.config({
//base: '/lay/modules/', //你的模块目录
version: false, //一般用于更新组件缓存，默认不开启。设为true即让浏览器不缓存。也可以设为一个固定的值，如：201610,
debug: true, //用于开启调试模式，默认false，如果设为true，则JS模块的节点会保留在页面
base: '' //设定扩展的Layui组件的所在目录，一般用于外部组件扩展
});
*/

/*layui 模块化*/
var moudles = ['form', 'upload','laydate','layedit','flow','util',"element"];
layui.use(moudles, function(){  
	var form    = layui.form() //表单
	var upload  = layui.upload; //文件上传
	var laydate = layui.laydate; //日期时间选择
	var layedit = layui.layedit; //编辑器
	var flow    = layui.flow;  //流加载
	var util    = layui.util;  //工具块
	var element = layui.element(); //导航的hover效果、二级菜单等功能，需要依赖element模块

	/*右下角的点击到顶部*/
	util.fixbar();
	$(function() {

		$("a.add_new_tab").click(function(){
			var _this = $(this)
			var url = _this.attr("data-href");
			var name = _this.attr("data-name");
			var text = _this.attr("data-text");//_this.text();
			var n,h=0;

	        /*$.pjax({
	            url: url,
	            container: '#main',
	            show: 'fade',  //展现的动画，支持默认和fade, 可以自定义动画方式，这里为自定义的function即可
	            filter: function(){

	            },
	            callback: function(){
					
	            }
	        });*/
   
			if ($('#main_tab', window.parent.document).find("li").each(function(e, t) {
                   $(this).find("span").attr("data-name") === name && (h++, n = e)
            	}), 0 === h) {

                //console.log(1)

            	var html = "<span data-name="+name+">"+text+"</span>";
				html += '<i class="layui-icon layui-unselect layui-tab-close">&#x1006;</i>',
				parent.element.tabAdd("page-tab", {
					title: html,
					content: '<iframe src="' + url + '"></iframe>'
				});

                parent.element.tabChange("page-tab", $('#main_tab', window.parent.document).find("li").length - 1)
                //parent.index_load();
            } else {
               	//console.log(0)
				parent.element.tabChange("page-tab", n)
				
				/*刷新页面*/
				var ir = $('.layui-tab-content .layui-tab-item', window.parent.document).eq(n).find("iframe");
				ir.attr('src', ir.attr('src'));

				//parent.index_load();
            }
	

			
		});
	})

});